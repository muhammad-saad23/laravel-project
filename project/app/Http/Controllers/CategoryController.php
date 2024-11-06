<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\category;

class CategoryController extends Controller
{
    public function category(){
        return view('admin-panel.category');
    }

    public function categoryCreate(Request $request){
        $request->validate([
            "category_name"=>"required",
            "category_description"=>"required",
            "category_image"=>"required|mimes:png,jpg,jpeg|max:50000",
        ]);

        $category=new category();

        $catImage=$request->file('category_image')->getClientOriginalName();
        $path=$request->file('category_image')->move(public_path('images/'),$catImage);

        $category->cat_name=$request['category_name'];
        $category->cat_des=$request['category_description'];
        $category->cat_image=$catImage;
        $category->save();
        
        return redirect('admin-panel/category')->with('category','Category Add Successfully');
    }

    public function categoryView(Request $request){
        $cat_search=$request['catsearch']??"";
        if ($cat_search != "") {
            $view=category::where('cat_name','LIKE',"%$cat_search%")->paginate();            
        }
        else {            
            $view=category::paginate();
        }
        return view('admin-panel/viewcategory')->with(compact('view','cat_search'));
    }

    public function categoryShow($id){
        $show=category::find($id);
        return view('admin-panel/cat_show')->with(compact('show'));
    }

    public function categoryDelete($id){
        $delete=category::find($id);
        if (!is_null($delete)) {
            $path='images/'.$delete->cat_image;
            $delete->delete();
            if (file_exists($path)) {
                File::delete($path);
            }
            return redirect('admin-panel/view/category')->with('delete','Category Successfully Deleted');
        }
        else{
            return redirect('admin-panel/view/category');

        }
    }

    

    public function categoryEdit($id){
        $edit=category::findOrFail($id);
        // dd($edit);
        return view('admin-panel/cat_update')->with(['cat_edit'=>$edit]);
    }


    public function categoryUpdate($id,Request $request){

        $request->validate([
            "category_name"=>"required",
            "category_description"=>"required",
            "category_image"=>"required|mimes:png,jpg,jpeg|max:50000",
        ]);

        $update= category::find($id);
        $des="images/".$update->cat_image;

        if (file_exists($des)) {
            File::delete($des);
        }   

        $catImage=$request->file('category_image')->getClientOriginalName();
        $path=$request->file('category_image')->move(public_path('images/'),$catImage);

        $update->cat_name=$request['category_name'];
        $update->cat_des=$request['category_description'];
        $update->cat_image=$catImage;
        $update->save();
        
        return redirect('admin-panel/view/category')->with('update','Category Update Successfully');
    }
    

}
