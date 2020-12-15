<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data= Category::all();
        return view('admin.category.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         return view('admin.category.add');
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
        Category::create([
            'name_category'=>$request->name,
            'url_image'=>$file->move('upload/category', $file->getClientOriginalName()),
            'slug'=>Str::slug($request->name, '-'),
            'status'=>$status,
            'id_user' => Auth::id()
        ]);

        \Session::flash('flash_message', 'Thêm Thành Công.');  
        
        //cũ : return redirect('articles');
        return redirect()->route('category.index');
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
    public function edit($slug)
    {
        //
        $data_category=Category::where('slug',$slug)->first(); 
        return view('admin.category.edit',compact('data_category'));
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
        /*$request->status == 'on'*/
        if($request->status == 'on'){
            $status=1;
        }else{
            $status=2;
        }
        $new_slug = Str::slug( $request->name, '-' );

        Category::where('slug',$slug)->update( ['name_category'=>$request->name, 'slug'=>$new_slug, 'status'=>$status, 'id_user'=>Auth::id() ]);
        if( $request->url_image ) {

            $file = $request->file( 'url_image' )->move( 'upload/category', $request->file( 'url_image' )->getClientOriginalName());

            Category::where('slug',$slug)->update(['url_image'=>$file]); 

        }

        \Session::flash('flash_message', 'Cập Nhật Thành Công.'); 
        return redirect()->route('category.index');
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
