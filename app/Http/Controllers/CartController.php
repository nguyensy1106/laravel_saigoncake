<?php

namespace App\Http\Controllers;

use App\Classes\NL_Checkout;
use App\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    public function addtocart(Request $request, $slug)
    {
    	$product = Product::where('slug', $slug)->first();

    	if( !$product ) {
            abort(404);
        }
        $productID = $product->id;

        $cart = session()->get('cart');
        //////////////////////////
        if(!$cart) {
            if(isset($request->quantity)){
                 $cart = [
                        $slug => [
                            "id"=>$product->id,
                            "name" => $product->name_product,
                            "slug" => $product->slug,
                            "quantity" => $request->quantity,
                            "price" => $product->price_discount,
                            "photo" => $product->url_image
                        ]
                ];
                session()->put('cart', $cart);
                 return view('cart');
                //dd($cart);
                //return redirect()->back()->with('success', 'Product added to cart successfully!');

            }else{
                $cart = [
                        $slug => [
                            "id"=>$product->id,
                            "name" => $product->name_product,
                            "slug" => $product->slug,
                            "quantity" => 1,
                            "price" => $product->price_discount,
                            "photo" => $product->url_image
                        ]
                ];
                session()->put('cart', $cart);
                return view('cart');
                //dd($cart);
                //return redirect()->back()->with('success', 'Product added to cart successfully!');
            }
        }

        ////////////////////////
        if(isset($cart[$slug])) {
            if(isset($request->quantity)){
                 $cart[$slug]['quantity']=$cart[$slug]['quantity']+$request->quantity;
                session()->put('cart', $cart);
                return view('cart');
                //return redirect()->back()->with('success', 'Product added to cart successfully!');
            }else{
                $cart[$slug]['quantity']++;
                session()->put('cart', $cart);
                return view('cart');
                //return redirect()->back()->with('success', 'Product added to cart successfully!');
            }
        }

        //gio hang ton tai, add theo quantity
        if(isset($request->quantity)){
            $cart[$slug] = [
                "id"=>$product->id,
                "name" => $product->name_product,
                "slug" => $product->slug,
                "quantity" =>$request->quantity ,
                "price" => $product->price_discount,
                "photo" => $product->url_image
            ];
            session()->put('cart', $cart);
            return view('cart');
            //return redirect()->back()->with('success', 'Product added to cart successfully!');
        }else{
            $cart[$slug] = [
                "id"=>$product->id,
                "name" => $product->name_product,
                "slug" => $product->slug,
                "quantity" => 1,
                "price" => $product->price_discount,
                "photo" => $product->url_image
            ];
            session()->put('cart', $cart);
            return view('cart');
            //return redirect()->back()->with('success', 'Product added to cart successfully!');
        }


   }

   public function updatecart(Request $request, $slug)
   {
        $cart = session()->get('cart');
        $cart[$slug]['quantity']=$request->quantity;
        session()->put('cart', $cart);
        return view('cart');
   }

   	public function addtocartplus($slug)
   	{
   		$cart = session()->get('cart');
   		$cart[$slug]['quantity']=$cart[$slug]['quantity']+1;
        session()->put('cart', $cart);
        return view('cart');
   	}

   	public function addtocartminus($slug)
   	{
   		$cart = session()->get('cart');
   		$cart[$slug]['quantity']=$cart[$slug]['quantity']-1;
        session()->put('cart', $cart);
        return view('cart');
   	}

    public function showcart()
    {
    	return view('cart');
    }

    public function deletecart($slug)
    {
            $cart = session()->get('cart');
            if(isset($cart[$slug])) {
                unset($cart[$slug]);
                session()->put('cart',$cart);
            }
       return view('cart');
    }

}
