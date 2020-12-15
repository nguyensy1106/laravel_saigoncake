<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class BlogController extends Controller
{
   /* public function __construct() {
       $this->middleware('auth');
    }*/
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Blog::all();
        return view('admin.blog.index', compact( 'data' ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         return view('admin.blog.add');
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

         if(!$request->url_image) {

            Blog::create([
                'name_blog' => $request->name,
                'introduct' => $request->introduct,
                'description' => $request->description,
                'slug' => Str::slug( $request->name, '-' ),
                'status' => $status,
                'id_user' => Auth::id()
            ]);

        }else{

            Blog::create([
                'name_blog' => $request->name,
                'introduct' => $request->introduct,
                'description' => $request->description,
                'url_image' => $file->move( 'upload/blog', $file->getClientOriginalName() ),
                'slug' => Str::slug( $request->name, '-' ),
                'status' => $status,
                'id_user' => Auth::id()
            ]);
        }

       

        \Session::flash('flash_message', 'Thêm Thành Công.');  
        
        //cũ : return redirect('articles');
        return redirect()->route('blog.index');
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
        $data = Blog::where('slug', $slug)->first();
        return view('admin.blog.edit', compact( 'data' ));

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
         if($request->status == 'on'){
            $status=1;
        }else{
            $status=2;
        }
        $new_slug = Str::slug( $request->name, '-' );

        Blog::where('slug',$slug)->update(['name_blog'=>$request->name, 'introduct'=>$request->introduct, 'description'=>$request->description, 'slug'=>$new_slug, 'status'=>$status, 'id_user'=>Auth::id()]);

        if( $request->url_image ) {

            $file = $request->file( 'url_image' )->move( 'upload/blog', $request->file( 'url_image' )->getClientOriginalName());
            
            Blog::where('slug',$slug)->update(['url_image'=>$file]); 

        }

        \Session::flash('flash_message', 'Cập Nhật Thành Công.'); 
        return redirect()->route('blog.index');
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
