<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Product::all();
        return view('admin.product.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data = Category::where( 'status', 1 )->get();
        return view( 'admin.product.add', compact( 'data' ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if($request->status == 'on'){
            $status=1;
        }else{
            $status=2;
        }
        $file = $request->file('url_image');
        Product::create([
            'name_product' => $request->name,
            'category_id' => $request->category_id,
            'url_image' => $file->move( 'upload/product', $file->getClientOriginalName() ),
            'slug' => Str::slug( $request->name, '-' ),
            'price_sell' => $request->price_sell,
            'price_discount' => $request->price_discount,
            'description' => $request->description,
            'status' => $status,
            'id_user' => Auth::id()
        ]);

        \Session::flash('flash_message', 'Thêm Thành Công.');  
        
        //cũ : return redirect('articles');
        return redirect()->route('product.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $slug )
    {
        $data_product = Product::where( 'slug', $slug )->first();
        $data_category = Category::all();
        return view('admin.product.edit', compact( 'data_product', 'data_category' ) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        //
         /*$request->status == 'on'*/
        if($request->status == 'on'){
            $status=1;
        }else{
            $status=2;
        }
        $new_slug = Str::slug( $request->name, '-' );

        Product::where('slug',$slug)->update(['name_product'=>$request->name, 'category_id'=>$request->category_id, 'price_sell'=>$request->price_sell, 'price_discount'=>$request->price_discount, 'description'=>$request->description, 'slug'=>$new_slug, 'status'=>$status, 'id_user'=>Auth::id()]);

        if( $request->url_image ) {

            $file = $request->file( 'url_image' )->move( 'upload/product', $request->file( 'url_image' )->getClientOriginalName());
            
            Product::where('slug',$slug)->update(['url_image'=>$file]); 

        }

        \Session::flash('flash_message', 'Cập Nhật Thành Công.'); 
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
