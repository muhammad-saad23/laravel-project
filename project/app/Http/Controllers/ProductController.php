<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\category;
use App\Models\product;

class ProductController extends Controller
{
    public function product(){
        $cat=category::all();
        return view('admin-panel/product')->with(compact('cat'));
    }

    public function productCreate(Request $request){
        $request->validate([
           "product_name"=>"required",
           "product_price"=>"required",
           "category_name"=>"required",
           "product_description"=>"required",
           "product_image"=>"required|mimes:png,jpg,jpeg|max:50000",
        ]);

        $product=new product();
        $proImage=$request->file('product_image')->getClientOriginalName();
        $pro_path=$request->file('product_image')->move(public_path('images'),$proImage);

        $product->pro_name=$request['product_name'];
        $product->pro_price=$request['product_price'];
        $product->cat_id=$request['category_name'];
        $product->pro_des=$request['product_description'];
        $product->pro_image=$proImage;
        $product->save();
        
        return redirect('admin-panel/product')->with('product','Product Add Successfully');
    }


    public function productView(Request $request){
        // search
        $search=$request['search'] ??"" ;
        // if ($search != "") {
        //     $pro_view=product::join('category','cat_id','=','category.cid')
        //     ->where('pro_name','LIKE',"%$search%")->orWhere('cat_name','LIKE',"%$search%")->paginate(2);                                

        // }
        // else{
        //     $pro_view=product::join('category','cat_id','=','category.cid')->paginate();        
        // }
        
        // $query=product::query();
        // filter        
        $categories=category::all();
        $filter=product::query();
        if ($request->ajax()) {

            if (empty($request->category)) {
                $pro_view=$filter->get();                                
            }
            else {
                $pro_view=$filter->join('category','cat_id','=','category.cid')
                ->where(['cat_id'=>$request->category])->get();                
            }
                            
            return response()->json(['products'=>$pro_view]);
        }
        elseif($search != ""){                
               $pro_view=$filter->join('category','cat_id','=','category.cid')
               ->where('pro_name','LIKE',"%$search%")
               ->orWhere('cat_name','LIKE',"%$search%")
               ->paginate(2);
        }
        $pro_view=$filter->paginate();
        return view('admin-panel/view_pro')->with(compact('pro_view','search','categories'));
        
    }


    public function productDelete($id){
        $delete=product::find($id);
        if (!is_null($delete)) {
            $path='images/'.$delete->pro_image;
            if (file_exists($path)) {
                File::delete($path);
            }
            $delete->delete();
            return redirect('admin-panel/view/product')->with('delete','Product Delete Successfully');
        }
        else{
            return redirect('admin-panel/view/product');

        }
    }
    

    public function productShow($id){
        $show=product::join('category','cat_id','=','category.cid')->find($id);
        return view('admin-panel/pro_show')->with(compact('show'));
    }

    
    public function productEdit($id){        
        $edit=product::join('category','cat_id','=','category.cid')->findOrFail($id);
        $cat=category::all();
        // echo($edit);
        return view('admin-panel/pro_update')->with(['pro_edit'=>$edit])->with(compact('cat'));
    }


    public function productUpdate($id ,Request $request){
        $request->validate([
            "product_name"=>"required",
            "product_price"=>"required",
            "category_name"=>"required",
            "product_description"=>"required",
            "product_image"=>"required|mimes:png,jpg,jpeg|max:50000",
         ]);
 
         $update=product::join('category','cat_id','=','category.cid')->findOrFail($id);
        // $update=product::findOrFail($id);

         $destination='images/'.$update->pro_image;
         if (file_exists($destination)) {
            File::delete($destination);
         }

         $UpdateImage=$request->file('product_image')->getClientOriginalName();
         $update_path=$request->file('product_image')->move(public_path('images'),$UpdateImage);
 
         $update->pro_name=$request['product_name'];
         $update->pro_price=$request['product_price'];
         $update->cat_id=$request['category_name'];
         $update->pro_des=$request['product_description'];
         $update->pro_image=$UpdateImage;
         $update->save();

         return redirect('/admin-panel/view/product')->with('update','Product Update Successfully');
    }

    // public function productFilter(Request $request){
    //     $categories=category::all();
    //     $filter=product::query();
    //     if ($request->has('cat_id')) {
    //         $filter->where('category_id',$request->filter);
    //     }
    //     $products=$filter->get();
    //     return view('admin-panel.view_pro')->with(compact('categories','products'));
    // }
}
