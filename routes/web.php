<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogoutController;

// -------------------------- collection --------------------------

Route::controller(App\Http\Controllers\Frontend\FrontendController::class)->group(function(){
    Route::get('/','index');
    Route::get('/collection','category');
    Route::get('/collection/{category_slug}','product')->middleware('auth');
    Route::get('/collection/{category_slug}/{product_slug}','productView')->middleware('auth');
    Route::get('/new-arrival','arrivalProduct')->middleware('auth');
    Route::get('/new-featured','newFeatured')->middleware('auth');
    Route::get('/search','productSearch');
});

// -------------------------- Profile User --------------------------
Route::controller(App\Http\Controllers\Frontend\UserDetailController::class)->group(function(){
    Route::get('profile','veiwProfile')->middleware('auth');
    Route::post('profile/store','profileUpdate');
    Route::get('change-password','createPassword'); //can also put the middleware in controller to protect the route
    Route::post('change-password','passwordStore');

});


// -------------------------- filter route -------------------------------
Route::get('/collection/{category_slug}/filter',[App\Http\Controllers\Frontend\FrontendController::class, 'filterBrand']);

// -------------------------- Add to cart or wishlist --------------------------

Route::middleware('auth')->group(function(){

    // -------------------------- add to wishlist --------------------------

    Route::post('/collection/add_to_wishlist',[App\Http\Controllers\Frontend\WishlistController::class,'addToWishlist']);
    Route::get('/wishlist',[App\Http\Controllers\Frontend\WishlistController::class,'index']);
    Route::get('/wishlist/remove/{wishlist_id}',[App\Http\Controllers\Frontend\WishlistController::class,'removeWishlist']);
    Route::get('/wishlist/count',[App\Http\Controllers\Frontend\WishlistController::class,'countWishlist']);

    // -------------------------- add to cart --------------------------

    Route::post('/collection/add_to_cart',[App\Http\Controllers\Frontend\CartController::class,'addToCart']);
    Route::get('/cart/count',[App\Http\Controllers\Frontend\CartController::class,'countCart']);

    Route::get('/cart',[App\Http\Controllers\Frontend\CartController::class,'viewCart']);
    Route::get('/cart/remove/{cart_id}',[App\Http\Controllers\Frontend\CartController::class,'removeCart']);
    Route::post('/cart/update',[App\Http\Controllers\Frontend\CartController::class,'updateQty']);

    // -------------------------- checkout --------------------------

    Route::get('/checkout',[App\Http\Controllers\Frontend\CheckoutController::class,'checkout']);
    Route::post('/checkout/store',[App\Http\Controllers\Frontend\CheckoutController::class,'placeOrder']);
    Route::post('/checkout/online',[App\Http\Controllers\Frontend\CheckoutController::class,'placeOrderOnline']);
    Route::get('/thank-to',[App\Http\Controllers\Frontend\CheckoutController::class,'thankYou']);

    // -------------------------- order --------------------------

    Route::get('/order',[App\Http\Controllers\Frontend\OrderController::class,'index']);
    Route::get('/order/{orderId}',[App\Http\Controllers\Frontend\OrderController::class,'view']);


});

Auth::routes();
// -------------------------- logout route --------------------------
Route::post('/user/logout', [LogoutController::class, 'userLogout'])->name('user.logout')->middleware('auth');



// dashboard route
Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function(){
    Route::get('dashboard',[App\Http\Controllers\Admin\DashboardController::class, 'index']);
    Route::post('logout', [LogoutController::class, 'adminLogout'])->name('admin.logout');


    // ---------------------------------------User route---------------------------------
    Route::controller(App\Http\Controllers\Admin\UserController::class)->group(function(){
        Route::get('user','index');
        Route::get('user/create','create');
        Route::post('user/store','store');
        Route::get('user/{id}/edit','edit');
        Route::put('user/{id}/update','update');
        Route::get('user/{id}/delete','delete');
    });

    // ---------------------------------------Setting route---------------------------------

    Route::get('setting',[App\Http\Controllers\Admin\SettingController::class,'index'])->name('setting.index');
    Route::post('setting/store',[App\Http\Controllers\Admin\SettingController::class,'store']);

    // ---------------------------------------Category route---------------------------------

    Route::controller(App\Http\Controllers\Admin\CategoryController::class)->group(function(){
        Route::get('/category','index');
        Route::get('/category/create','create');
        Route::post('/category','store');
        Route::get('/category/{category}/edit','edit');
        Route::put('/category/{category}','update');
        Route::get('/category/{id}/delete','delete');
    });
    // ---------------------------------------Brand route---------------------------------

    Route::get('/brands',[App\Http\Controllers\Admin\BrandController::class,'index']);
    Route::get('/brands/create',[App\Http\Controllers\Admin\BrandController::class,'create']);
    Route::post('/brands/store',[App\Http\Controllers\Admin\BrandController::class,'store']);
    Route::get('/brands/{id}/delete',[App\Http\Controllers\Admin\BrandController::class,'delete']);
    Route::get('/brands/{brand}/edit',[App\Http\Controllers\Admin\BrandController::class,'edit']);
    Route::put('/brands/{brand}',[App\Http\Controllers\Admin\BrandController::class,'update']);

    // ---------------------------------------Products route---------------------------------

    Route::controller(App\Http\Controllers\Admin\ProductController::class)->group(function(){
        Route::get('/products','index');
        Route::get('/products/create','create');
        Route::post('/products','store');
        Route::get('/products/{id}/delete','delete');
        Route::get('/products/{id}/edit','edit');
        Route::put('/products/{id}','update');
        Route::get('/products-images/{image_id}/delete','destroyImage');

        Route::post('/products-color/{pro_color_id}','updateProColor');
        Route::get('/products-color/{get_del_id}/delete','deleteProColor');
    });

       // ---------------------------------------Color route---------------------------------

    Route::controller(App\Http\Controllers\Admin\ColorController::class)->group(function(){
        Route::get('/colors','index');
        Route::get('/colors/create','create');
        Route::post('/colors','store');
        Route::get('/colors/{id}/delete','delete');
        Route::get('/colors/{id}/edit','edit');
        Route::put('/colors/{id}','update');
    });

    // ---------------------------------------Slide route---------------------------------

    Route::controller(App\Http\Controllers\Admin\SlideController::class)->group(function(){
        Route::get('/slides','index');
        Route::get('/slides/create','create');
        Route::post('/slides','store');
        Route::get('/slides/{id}/delete','delete');
        Route::get('/slides/{id}/edit','edit');
        Route::put('/slides/{id}','update');
    });

    // ---------------------------------------Order route---------------------------------

    Route::controller(App\Http\Controllers\Admin\OrderController::class)->group(function(){
        Route::get('/order','index');
        Route::get('/order/{orderId}','view');
        Route::put('/order/view/{orderId}','updateOrderStatus');
        Route::get('/invoice/{orderId}/generate-invoice','generateInvoice');
        Route::get('/invoice/{orderId}','viewInvoice');
        Route::get('/invoice/{orderId}/mail','mailInvoice');
    });

});

