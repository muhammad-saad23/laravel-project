<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\category;
use App\Models\product;
use App\Models\User;

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
            ->paginate(1);        
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
        $register->save();

        return redirect ('/');
    }

    public function login(){
        return view('fronted/login');
    }

    public function loginCreate(Request $request){
        $login=$request->validate([
            "email"=>"required|email",
            "password"=>"required",
        ]);
        
        if (Auth::attempt($login)) {
            return redirect ('/');
        }
        else {
            return redirect ('fronted/login')->with('login','login unsuccessfully');
            
        }
    }

    public function logout(){
        Auth::logout();
        return view('fronted/login');
    }

    public function product($pid){
        $pro=product::join('category','cat_id','=','category.cid')->find($pid);
        return view('fronted/pro')->with(compact('pro'));
    }

    public function search(Request $request){
        $query=$request['search'];            
        $result=product::join('category','cat_id','=','category.cid')
        ->where('cat_name','LIKE', '%'.$query.'%')
        ->orWhere('pro_name','LIKE', '%'.$query.'%')
        ->orWhere('pro_des','LIKE', '%'.$query.'%')
        ->paginate(1);

        return view('fronted/search')->with(compact('result'));

    }
}
