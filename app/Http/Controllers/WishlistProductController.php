<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Product;
use App\Wishlist;
use Illuminate\Http\Request;

class WishlistProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show_wishlist()
    {
    	$data = Wishlist::where('id_user', Auth::id())->get();
    	return view('mywishlist', compact('data'));
    }

    public function wishlist_product($slug)
    {
    	$wishlist = Product::where('slug', $slug)->first();
    	Wishlist::create([
    		'id_user' => Auth::id(),
    		'id_product' => $wishlist->id
    	]);

    	return redirect()->route('show_wishlist');
    }

    public function remove_wishlist($id)
    {
    	
    	Wishlist::where('id', $id)->where('id_user', Auth::id())->delete();
    	\Session::flash('flash_message', 'Đã Xóa Sản Phẩm Khỏi Danh Sách Yêu Thích');  
    	return redirect()->back();
    }

    public function remove_heart_red($id)
    {
    	Wishlist::where('id_product', $id)->where('id_user', Auth::id())->delete();
    	return redirect()->back();
    }
}
