<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\Models\Admin;
use App\Models\product;
use App\Models\category;
use App\Models\User;

class adminController extends Controller
{
    public function dashboard()
    {
        $category=category::count();
        $product=product::count();
        $user=User::count();

        // $cat=category::get();
        $pro=DB::table('category')
        ->select('category.cat_name', DB::raw('(SELECT COUNT(*) FROM product WHERE category.cid = product.cat_id) as product_count'))
        ->get();            
        return view('admin-panel.dashboard')->with(compact('category','product','user','pro'));
    }
    public function viewuser(Request $request){
        $userSearch=$request['usersearch']??"";
        if ($userSearch != "") {            
            $users=User::where('name','LIKE',"%$userSearch%")->orWhere('email','LIKE',"%$userSearch%")->paginate(1);            
        }
        else {
            $users=User::paginate(1);            
        }        
        return view('admin-panel.viewuser')->with(compact('users','userSearch'));
    }
    

    public function login()
    {
        return view('admin-panel/login');
    }

    public function adminLogin(Request $request){
            $admin=$request->validate([
            "email"=>"required|email",
            "password"=>"required",
        ]);            
        // $login=Admin::all();
            
        if (Auth::attempt($admin)) {
            return redirect ()->route('dashboard');
        }
        else {
            return redirect ('admin-panel/login')->with('adminlogin','login unsuccessfully');
            
        }
        
    }
    
    public function adminlogout(){        
        Auth::logout();
        return view ('admin-panel.login');

    }

    public function usershow($id){
        $show=User::find($id);
        return view('admin-panel.usershow')->with(compact('show'));
    }
    
    public function userdelete($id){
        $delete=User::find($id);
        
        if (!is_null($delete)) {
            $delete->delete();    
            return redirect('admin-panel/view/user')->with('deleteuser','User Successfully deleted');
        }
        else {
            return redirect('admin-panel/view/user');
            
        }

    }

    // public function search(Request $request){
    //     $search=$request->input('search');

    //     $query=product::join('category','cat_id','=','category.cid')
    //     ->where('pro_name','like','%'.'$search'.'%')->get();

    //     return view('admin-panel.search')->with(compact('query'));
    // }
}
