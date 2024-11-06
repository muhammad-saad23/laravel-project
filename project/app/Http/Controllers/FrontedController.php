<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\cast;
use App\Models\category;
use App\Models\product;
use App\Models\User;
use App\Models\cart;
use App\Models\order;
use App\Models\order_item;

class FrontedController extends Controller
{
    public function home(){
        $display_cat=category::all();
 

        return view('fronted.home')->with(compact('display_cat'));
        
    }

    public function productDisplay($id){        
        
            $category=category::where('cat_name',$id)->first();
            $display_pro=product::join('category','cat_id','=','category.cid')
            ->where('cat_id',$category->cid)            
            ->paginate();        
        return view('fronted/product')->with(compact('category','display_pro'));
    }

    public function register(){
        return view('fronted/register');
    }

    public function registerCreate(Request $request){
        $request->validate([
            "name"=>"required",
            "email"=>"required|email",
            "password"=>"required",
        ]);

        $register=new User();
        $register->name=$request['name'];
        $register->email=$request['email'];
        $register->password=$request['password'];

        if ($register->save()) {

            return redirect ('login');            
        }
        

    }

    public function login(){
        return view('fronted/login');
    }

    public function loginCreate(Request $request){
        
        $request->validate([
            "email"=>"required|email",
            "password"=>"required",
        ]);
        // $user=User::where('email',$request->input('email'))
        // ->where('password',$request->input('password'))
        // ->first();

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user=Auth::User();
                session()->put('id',$user->id);
                session()->put('name',$user->name);
                session()->put('email',$user->email);
                session()->put('password',$user->password);
                return redirect ('/')->with('success','login successfully');
        }
        else {
            return redirect ('login')->with('login','login unsuccessfully');
            
        }
    }

    public function logout(){
        session()->forget('id');
        session()->forget('email');
        session()->forget('password');
        return redirect('/login');
    }

    public function product($pid){
        $pro=product::join('category','cat_id','=','category.cid')->find($pid);
        return view('fronted/pro')->with(compact('pro'));
    }

    public function search(Request $request){
        $query=$request['search']??""; 
        if ($query!= "") {
            # code...
            $result=product::join('category','cat_id','=','category.cid')
            ->where('cat_name','LIKE', '%'.$query.'%')
            ->orWhere('pro_name','LIKE', '%'.$query.'%')
            ->orWhere('pro_des','LIKE', '%'.$query.'%')
            ->paginate();
            
        }          
        else {
            $result=product::join('category','cat_id','=','category.cid')->paginate();
        }
        return view('fronted/search')->with(compact('result'));

    }

    

    public function addtocart(Request $request){
             
        if (session()->has('id')) {
            # code...
            $item=new cart;
            $item->product_id=$request['id'];
            $item->quantity=$request['quantity'];
            $item->user_id=session()->get('id');
            $item->save();            
            return redirect('cart')->with('updatecart','Item add into cart');
        }
        else {
            
            return redirect('login')->with('login','Please login first');
        }
        
    }
    public function cart(){
        $cartitem=DB::table('product')->join('cart','cart.product_id','product.pid')
        ->select(DB::raw('CAST(product.pro_price AS SIGNED) as total_price'),'product.pro_price','product.pro_name','product.pro_image','cart.*')        
        ->where('cart.user_id',session()->get('id'))
        ->get();
        
        return view('fronted.add-to-cart')->with(compact('cartitem'));
    }    

    public function DeleteCart($id){
        $delitem=cart::find($id);
        if (!is_null($delitem)) {
            $delitem->delete();
            return redirect('cart')->with('deletecart','Item deleted');            
        }
        else {
            return redirect('cart');            
            
        }
    }

    public function updateCart(Request $request,$id){
             
        if (session()->has('id')) {
            # code...
            $item=cart::find($id);
            $item->quantity=$request['quantity'];
            $item->update();            
            return redirect()->back()->with('updatecart','Items updated');
        }
        else {
            
            return redirect('login')->with('login','Please login first');
        }
        
    }

    public function checkout(Request $request){

        if (session()->has('id')) {
            $order=new order();
            $order->status="pending";
            $order->customer_id=session()->get('id');
            $order->customer_name=session()->get('name');
            $order->bill=$request['bill'];
            if ($order->save()) {

                $carts=cart::where('user_id',session()->get('id'))->get();

                foreach ($carts as $items) {
                    $product=product::find($items->product_id);
                    $orderItem=new order_item();
                    $orderItem->product_id=$items->product_id;
                    $orderItem->quantity=$items->quantity;
                    $orderItem->price=$product->pro_price;
                    $orderItem->orderid=$order->id;
                    $orderItem->save();
                    $items->delete();
                }
            }
            return redirect()->back()->with('updatecart','Your Order has been successfully');
        }
        else {            
            return redirect('login')->with('login','Please login first');
        }
    }
    
}
