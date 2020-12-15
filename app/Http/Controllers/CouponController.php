<?php

namespace App\Http\Controllers;

use App\Coupon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Coupon::all();   
        return view('admin.coupon.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.coupon.add');   
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
        Coupon::create([
            'coupon_name'=>$request->coupon_name,
            'coupon_code'=>$request->coupon_code,
            'coupon_number'=>$request->coupon_number,
            'coupon_condition'=>$request->coupon_condition,
            'coupon_money'=>$request->coupon_money,
            'date_current'=>$request->date_current,
            'date_expiration'=>$request->date_expiration,
            'id_user' => Auth::id()
        ]);
        \Session::flash('flash_message', 'Thêm Mã Giảm Giá Thành Công.');  
        return redirect()->route('coupon.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function show(Coupon $coupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Coupon::where('id',$id)->first();
        return view('admin.coupon.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $coupon = Coupon::findOrFail($id);
        $coupon->update($request->all());
        \Session::flash('flash_message', 'Cập Nhật Mã Thành Công.');  
        return redirect()->route('coupon.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
         Coupon::where('id',$id)->delete();
        \Session::flash('flash_message', 'Xóa Mã Giảm Giá Thành Công.');  
        return redirect()->route('coupon.index');
    }
}
