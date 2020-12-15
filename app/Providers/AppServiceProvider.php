<?php

namespace App\Providers;

use Auth;
use App\Coupon;
use App\Wishlist;
use App\User;
use App\Contact;
use App\Order;
use App\Category;
use App\Product;
use App\Blog;
use App\Shipping;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        view()->composer( 'index', function( $view ){
            $date_now = date('Y-m-d');
            $coupon = Coupon::where('date_current','<=',$date_now)->where('date_expiration','>=',$date_now)->limit(1)->get();
            $category = Category::where('status', 1)->get();
            $product = Product::where('status', 1)->inRandomOrder()->limit(16)->get();
            $blog = Blog::where('status', 1)->inRandomOrder()->limit(3)->get();
            $wishlist = Wishlist::where('id_user', Auth::id())->get();
            $view->with( 'wishlist', $wishlist );
            $view->with( 'category', $category );
            $view->with( 'product', $product );
            $view->with( 'blog', $blog );
            $view->with('coupon', $coupon);
        });
        view()->composer( 'checkout', function( $view ){
            $shipping = Shipping::all();
            $view->with( 'shipping', $shipping);
        });
        view()->composer( 'admin.layouts.slider', function( $view ){
            $user = User::where('id', Auth::id())->first();
            $neworder = Order::where('status_shipping', 1)->get();
            $contact = Contact::where('status', 1)->get();
            $view->with( 'neworder', $neworder);
            $view->with( 'contact', $contact);
            $view->with( 'user', $user);
        });
    }
}
