<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\adminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FrontedController;


// Route::get('/', function () {
//     return view('fronted.home');
// });

Route::controller(FrontedController::class)->group(function (){
    Route::prefix('/')->group(function(){

        Route::get('','home')->name('home');
        // register
        Route::get('register','register')->name('register');
        Route::post('register','registerCreate');
        // login
        Route::get('login','login')->name('login');
        Route::post('login','loginCreate');
        Route::get('login','logout')->name('logout');
    
        Route::get('category/{cat_id}','productDisplay')->name('productdisplay');
        Route::get('product/{pid}','product')->name('product');
        // search
        Route::get('search','search')->name('search');
        
    });
});

// Route::get('/admin-panel/dashboard', function () {
//     return view('admin-panel.dashboard');
// });

Route::controller(adminController::class)->group(function (){
    Route::prefix('admin-panel')->group(function(){

        Route::get('/dashboard','dashboard')->name('dashboard');
        // admin login
        Route::get('/login','login')->name('adminlogin');
        Route::post('/login','adminLogin');
        Route::get('/login','adminlogout')->name('Adminlogout');
        Route::get('/view/user','viewuser')->name('viewuser');        
        Route::get('/view/show/{id}','usershow')->name('showuser');        
        Route::get('/view/delete/{id}','userdelete')->name('deleteuser');        
        // search
        // Route::get('/search','search')->name('search');        
        
    });
});

Route::controller(CategoryController::class)->group(function (){
   Route::prefix('admin-panel')->group(function(){

       Route::get('/category','category')->name('Addcategory');
       Route::post('/category','categoryCreate');   
       Route::get('/view/category','categoryView')->name('viewcategory');   
       Route::get('/view/category/delete/{id}','categoryDelete')->name('catDel');   
       Route::get('/view/category/show/{id}','categoryShow')->name('catShow');   
       Route::get('/view/category/edit/{id}','categoryEdit')->name('catEdit');   
       Route::post('/view/category/update/{id}','categoryUpdate')->name('catUpdate');   
   });

});

Route::controller(ProductController::class)->group(function(){
    Route::prefix('admin-panel')->group(function (){

        Route::get('/product','product')->name('addproduct');
        Route::post('/product','productCreate');
        Route::get('/view/product','productView')->name('viewproduct');
        Route::get('/view/product/delete/{id}','productDelete')->name('proDel');
        Route::get('/view/product/show/{id}','productShow')->name('proShow');
        Route::get('/view/product/edit/{id}','productEdit')->name('proEdit');
        Route::post('/view/product/update/{id}','productUpdate')->name('proUpdate');
        // filter
        Route::get('/view/product/filter','productFilter')->name('profilter');
        

    });
    

});
