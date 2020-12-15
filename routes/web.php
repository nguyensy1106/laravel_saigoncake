<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::middleware(['auth','checkEmployee'])->prefix('admin/index')->group(function () {
    
    Route::get('/',[
        'as' => 'admin',
        'uses' => 'AdminStatisticalController@index'
    ]);
});

/*

checkRole = la KH hay la ng quan tri (admin, emp)
checkAdmin = chuc nang 1-2-3-4
checkEmploy = chuc nang 4

@if($user->role == 1) == @can('isAdmin') ->>2 thang giong nhau
*/
Route::middleware(['auth','checkAdmin'])->prefix('admin/category')->group(function () {
    
    Route::get('/',[
    	'as' => 'category.index',
    	'uses' => 'CategoryController@index'
    ]);
    Route::get('new',[
    	'as' => 'category.new',
    	'uses' => 'CategoryController@create'
    ]);
    Route::post('store',[
        'as' => 'category.store',
        'uses' => 'CategoryController@store'
    ]);
    Route::get('edit/{slug}',[
        'as' => 'category.edit',
        'uses' => 'CategoryController@edit'
    ]);
    Route::post('update/{slug}',[
        'as' => 'category.update',
        'uses' => 'CategoryController@update'
    ]);

    /*Route::get('destroy/{id}',[
        'as' => 'category.destroy',
        'uses' => 'CategoryController@destroy'
    ]);*/
    
});

Route::middleware(['auth','checkAdmin'])->prefix('admin/product')->group(function () {

    Route::get('/',[
    	'as' => 'product.index',
    	'uses' => 'ProductController@index'
    ]);
     Route::get('new',[
    	'as' => 'product.new',
    	'uses' => 'ProductController@create'
    ]);
    Route::post('store',[
        'as' => 'product.store',
        'uses' => 'ProductController@store'
    ]);
    Route::get('edit/{slug}',[
        'as' => 'product.edit',
        'uses' => 'ProductController@edit'
    ]);
    Route::post('update/{slug}',[
        'as' => 'product.update',
        'uses' => 'ProductController@update'
    ]);

});

Route::middleware(['auth','checkAdmin'])->prefix('admin/blog')->group(function () {

    Route::get('/',[
    	'as' => 'blog.index',
    	'uses' => 'BlogController@index'
    ]);
    Route::get('new',[
    	'as' => 'blog.new',
    	'uses' => 'BlogController@create'
    ]);
    Route::post('store',[
        'as' => 'blog.store',
        'uses' => 'BlogController@store'
    ]);
    Route::get('edit/{slug}',[
    	'as' => 'blog.edit',
    	'uses' => 'BlogController@edit'
    ]);
    Route::post('update/{slug}',[
        'as' => 'blog.update',
        'uses' => 'BlogController@update'
    ]);

});

Route::middleware(['auth','checkEmployee'])->prefix('admin/contact')->group(function () {

    Route::get('/',[
        'as' => 'contact.index',
        'uses' => 'ContactController@index'
    ]);
    Route::get('/{id}',[
        'as' => 'contact.edit',
        'uses' => 'ContactController@edit'
    ]);
     Route::get('update/{id}',[
        'as' => 'contact.update',
        'uses' => 'ContactController@update'
    ]);

});

Route::middleware(['auth','checkAdmin'])->prefix('admin/coupon')->group(function () {

    Route::get('/',[
        'as' => 'coupon.index',
        'uses' => 'CouponController@index'
    ]);
    Route::get('new',[
        'as' => 'coupon.new',
        'uses' => 'CouponController@create'
    ]);
    Route::post('store',[
        'as' => 'coupon.store',
        'uses' => 'CouponController@store'
    ]);
    Route::get('destroy/{id}',[
        'as' => 'coupon.destroy',
        'uses' => 'CouponController@destroy'
    ]);
    Route::get('edit/{id}',[
        'as' => 'coupon.edit',
        'uses' => 'CouponController@edit'
    ]);
    Route::post('update/{id}',[
        'as' => 'coupon.update',
        'uses' => 'CouponController@update'
    ]);

});

Route::middleware(['auth','checkAdmin'])->prefix('admin/shipping')->group(function () {

    Route::get('/',[
        'as' => 'shipping.index',
        'uses' => 'ShippingController@index'
    ]);
    Route::get('new',[
        'as' => 'shipping.new',
        'uses' => 'ShippingController@create'
    ]);
    Route::post('store',[
        'as' => 'shipping.store',
        'uses' => 'ShippingController@store'
    ]);
    Route::get('edit/{id}',[
        'as' => 'shipping.edit',
        'uses' => 'ShippingController@edit'
    ]);
    Route::post('update/{id}',[
        'as' => 'shipping.update',
        'uses' => 'ShippingController@update'
    ]);
    Route::get('destroy/{id}',[
        'as' => 'coupon.destroy',
        'uses' => 'CouponController@destroy'
    ]);

});

Route::prefix('admin')->group(function () {
    Route::middleware(['auth','checkEmployee'])->get('customer',[
        'as' => 'show_customer',
        'uses' => 'UserController@show_customer'
    ]);

    Route::middleware(['auth','checkEmployee'])->get('customer/detail/{id}',[
        'as' => 'customer_detail',
        'uses' => 'UserController@customer_detail'
    ]);

    Route::middleware(['auth','checkEmployee'])->post('customer/update/{id}',[
        'as' => 'update_customer',
        'uses' => 'UserController@update_customer'
    ]);

    Route::middleware(['auth','checkAdmin'])->get('employee',[
        'as' => 'show_employee',
        'uses' => 'UserController@show_employee'
    ]);

     Route::middleware(['auth','checkAdmin'])->get('employee/new',[
        'as' => 'new_employee',
        'uses' => 'UserController@new_employee'
    ]);

     Route::middleware(['auth','checkAdmin'])->post('employee/store',[
        'as' => 'store_employee',
        'uses' => 'UserController@store_employee'
    ]);

    Route::middleware(['auth','checkAdmin'])->get('employee/detail/{id}',[
        'as' => 'employee_detail',
        'uses' => 'UserController@employee_detail'
    ]);

    Route::middleware(['auth','checkAdmin'])->post('employee/update/{id}',[
        'as' => 'update_employee',
        'uses' => 'UserController@update_employee'
    ]);
});    

Route::middleware(['auth','checkEmployee'])->prefix('admin/order')->group(function () {

    Route::get('/',[
        'as' => 'order.index',
        'uses' => 'OrderController@index'
    ]);

    Route::get('unpaid',[
        'as' => 'order.unpaid',
        'uses' => 'OrderController@orderunpaid'
    ]);
      
    Route::get('detail/{id}',[
        'as' => 'orderdetail',
        'uses' => 'OrderController@detail'
    ]);

    Route::get('xacnhan/{id}',[
        'as' => 'xacnhan',
        'uses' => 'OrderController@xacnhan'
    ]);

    Route::get('giaohang/{id}',[
        'as' => 'giaohang',
        'uses' => 'OrderController@giaohang'
    ]);

    Route::get('dagiao/{id}',[
        'as' => 'dagiao',
        'uses' => 'OrderController@dagiao'
    ]);

    Route::get('huydon/{id}',[
        'as' => 'huydon',
        'uses' => 'OrderController@huydon'
    ]);
    Route::get('xacnhanthanhtoan/{id}',[
        'as' => 'xacnhanthanhtoan',
        'uses' => 'OrderController@xacnhanthanhtoan'
    ]);
    

});
//////////////////////////////////////////////////////////////

	Route::get('/', function () {
	    return view('index');
	})->name('index');

	Route::get('shop',[
	    	'as' => 'shop',
	    	'uses' => 'PagesController@shop'
	]);

	Route::get('ve-chung-toi',[
	    	'as' => 'aboutus',
	    	'uses' => 'PagesController@about_us'
	]);

	Route::get('lien-he',[
	    	'as' => 'show_contact',
	    	'uses' => 'PagesController@show_contact'
	]);

    Route::post('post-lien-he',[
            'as' => 'post_contact',
            'uses' => 'PagesController@post_contact'
    ]);

     Route::get('account',[
            'as' => 'account',
            'uses' => 'PagesController@account'
    ]);

    Route::get('myaccount',[
            'as' => 'myaccount',
            'uses' => 'PagesController@myaccount'
    ]);

    Route::get('myorder',[
            'as' => 'myorder',
            'uses' => 'PagesController@myorder'
    ]);

    Route::get('myorder/remove/{code}',[
            'as' => 'remove_order',
            'uses' => 'PagesController@remove_order'
    ]);

    Route::get('myorder/payment/{code}',[
            'as' => 'payment_order',
            'uses' => 'PagesController@payment_order'
    ]);

    Route::get('myorder/{code}',[
            'as' => 'detail_order',
            'uses' => 'PagesController@detail_order'
    ]);

    Route::get('nganluong',[
            'as' => 'nganluong',
            'uses' => 'PagesController@nganluong'
    ]);

    Route::post('update_myaccount/{id}',[
            'as' => 'update_myaccount',
            'uses' => 'PagesController@update_myaccount'
    ]);

	Route::get('blog',[
	    	'as' => 'blog',
	    	'uses' => 'PagesController@blog'
	]);

	Route::get('blog/{slug}',[
	    	'as' => 'blog.detail',
	    	'uses' => 'PagesController@blog_detail'
	]);

	Route::get('shop/{slug}',[
	    	'as' => 'shopdetail',
	    	'uses' => 'PagesController@shop_detail'
	]);

	Route::get('product/{slug}',[
	    	'as' => 'productdetail',
	    	'uses' => 'PagesController@product_detail'
	]);

    Route::middleware(['auth'])->post('postcommnet/{id}',[
        'as' => 'postcommnet',
        'uses' => 'PagesController@postcommnet'
    ]);

    Route::get('postsearch',[
        'as' => 'postsearch',
        'uses' => 'PagesController@postsearch'
    ]);

    Route::get('my-wishlist',[
        'as' => 'show_wishlist',
        'uses' => 'WishlistProductController@show_wishlist'
    ]);

    Route::get('wishlist/{slug}',[
            'as' => 'wishlist_product',
            'uses' => 'WishlistProductController@wishlist_product'
    ]);

    Route::get('wishlist/remove/{id}',[
            'as' => 'remove_wishlist',
            'uses' => 'WishlistProductController@remove_wishlist'
    ]);

     Route::get('heartred/remove/{id}',[
            'as' => 'remove_heart_red',
            'uses' => 'WishlistProductController@remove_heart_red'
    ]);

	/////////////giỏ hàng//////////////////
	Route::get('cart',[
		'as' => 'cart.show',
		'uses' => 'CartController@showcart'
	]);

	Route::post('cart/{slug}',[
    'as' => 'cart.add',
    'uses' => 'CartController@addtocart'
	]);

    Route::post('updatecart/{slug}',[
    'as' => 'updatecart',
    'uses' => 'CartController@updatecart'
    ]);

	Route::get('cartplus/{slug}',[
    'as' => 'cartplus.add',
    'uses' => 'CartController@addtocartplus'
	]);

	Route::get('cartminus/{slug}',[
    'as' => 'cartminus.add',
    'uses' => 'CartController@addtocartminus'
	]);

	Route::get('cart/delete/{slug}',[
    'as' => 'cart.delete',
    'uses' => 'CartController@deletecart'
	]);

    Route::get('checkout', function (){
        return view('checkout');
    })->name('checkout');

    Route::post('postcheckout',[
        'as' => 'postcheckout',
        'uses' => 'CheckoutController@postcheckout'
    ]);

    Route::get('success/nganluong',[
        'as' => 'success_nganluong',
        'uses' => 'CheckoutController@success_nganluong'
    ]);


/////////////login-sign/////////////////
	Route::get('login', function () {
    	return view('login');
	})->name('login');

	Route::post('register',[
		'as' => 'register',
    	'uses' => 'AccountController@register'
	]);

	Route::post('checklogin',[
		'as' => 'checklogin',
    	'uses' => 'AccountController@checklogin'
	]);

    Route::get('logout',[
        'as' => 'logout',
        'uses' => 'AccountController@logout'
    ]);

    Route::get('login/reset',[
        'as' => 'resetpassword',
        'uses' => 'AccountController@resetpassword'
    ]);

    Route::post('login/change',[
        'as' => 'changepassword',
        'uses' => 'AccountController@changepassword'
    ]);

    Route::get('change/password',[
            'as' => 'show_exchangepassword',
            'uses' => 'AccountController@show_exchangepassword'
    ]);

    Route::post('post/password',[
            'as' => 'postpassword',
            'uses' => 'AccountController@postpassword'
    ]);

    Route::get('formsetup/password',[
            'as' => 'formsetuppassword',
            'uses' => 'AccountController@formsetuppassword'
    ]);

    Route::post('postsetup/password',[
            'as' => 'setuppassword',
            'uses' => 'AccountController@setuppassword'
    ]);


//////////////AJAX/////////////////////
    Route::post('password',[
        'as' => 'password',
        'uses' => 'AjaxController@password'
    ]);

    Route::post('email',[
        'as' => 'email',
        'uses' => 'AjaxController@email'
    ]);
    Route::post('phone',[
        'as' => 'phone',
        'uses' => 'AjaxController@phone'
    ]);
    Route::post('transportationFee',[
        'as' => 'transportation_fee',
        'uses' => 'AjaxController@transportationFee'
    ]);
    Route::post('postcoupon',[
        'as' => 'postcoupon',
        'uses' => 'AjaxController@postcoupon'
    ]);
    Route::post('postdatecoupon',[
        'as' => 'postdatecoupon',
        'uses' => 'AjaxController@postdatecoupon'
    ]);
    Route::post('postcouponcode',[
        'as' => 'postcouponcode',
        'uses' => 'AjaxController@postcouponcode'
    ]);
    Route::post('search_ajax',[
        'as' => 'search_ajax',
        'uses' => 'AjaxController@search_ajax'
    ]);
    Route::post('postprovince',[
        'as' => 'postprovince',
        'uses' => 'AjaxController@postprovince'
    ]);
     Route::get('postdistrict',[
        'as' => 'postdistrict',
        'uses' => 'AjaxController@postdistrict'
    ]);








