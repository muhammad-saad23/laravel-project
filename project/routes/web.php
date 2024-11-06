<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\adminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FrontedController;
// middleware
use App\Http\Middleware\adminlogin;



// Route::get('/', function () {
//     return view('fronted.home');
// });

Route::controller(FrontedController::class)->group(function (){
    Route::prefix('/')->group(function(){

        
        Route::get('','home')->name('home');
        // register
        // login
        Route::middleware(['user_login'])->group(function(){
            Route::get('register','register')->name('register');
            Route::post('register','registerCreate');
            Route::get('login','login')->name('login');
            Route::post('login','loginCreate');
        });
        Route::get('logout','logout')->name('logout');        

        Route::get('category/{cat_id}','productDisplay')->name('productdisplay');
        Route::get('product/{pid}','product')->name('product');
        // search
        Route::get('search','search')->name('search');
        // add to cart
        Route::get('cart','cart')->name('cart');
        Route::post('cart','addtocart');
        Route::get('delete/cart/{id}','DeleteCart')->name('delCart');
        Route::post('update/cart/{id}','updateCart')->name('updateCart');
        Route::get('checkout','checkout')->name('checkout');
    });
});

// Route::get('/admin-panel/dashboard', function () {
//     return view('admin-panel.dashboard');
// });

Route::controller(adminController::class)->group(function (){
    Route::prefix('admin-panel')->group(function(){

        Route::middleware(['admin_guest'])->group(function(){
            Route::get('/login','login')->name('AdminLogin');
            Route::post('/login','adminLogin')->name('admin.login');
        });
        
        Route::middleware(['admin_login'])->group(function(){
            Route::get('/dashboard','dashboard')->name('dashboard');
            Route::get('/view/user','viewuser')->name('viewuser');        
            Route::get('/view/show/{id}','usershow')->name('showuser');        
            Route::get('/view/delete/{id}','userdelete')->name('deleteuser');        
            Route::get('/view/order','orderdisplay')->name('orderdisplay');        
            Route::get('/logout','adminlogout')->name('Adminlogout');
        });
        
        
        // admin login
        // search
        // Route::get('/search','search')->name('search');        
        
    });
});

Route::controller(CategoryController::class)->group(function (){
   Route::prefix('admin-panel')->group(function(){

    Route::middleware(['admin_login'])->group(function(){
        Route::get('/category','category')->name('Addcategory');
        Route::post('/category','categoryCreate');   
        Route::get('/view/category','categoryView')->name('viewcategory');   
        Route::get('/view/category/delete/{id}','categoryDelete')->name('catDel');   
        Route::get('/view/category/show/{id}','categoryShow')->name('catShow');   
        Route::get('/view/category/edit/{id}','categoryEdit')->name('catEdit');   
        Route::post('/view/category/update/{id}','categoryUpdate')->name('catUpdate');   
    });

   });

});

Route::controller(ProductController::class)->group(function(){
    Route::prefix('admin-panel')->group(function (){

        Route::middleware(['admin_login'])->group(function(){            
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
    

});
