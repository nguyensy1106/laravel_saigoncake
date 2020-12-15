<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetail;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order_all = Order::orderBy('id', 'desc')->get();
        $order_new = Order::where('status_shipping',1)->get();
        $order_xuly = Order::where('status_shipping',2)->get();
        $order_danggiao = Order::where('status_shipping',3)->get();
        $order_dagiao= Order::where('status_shipping',4)->get();
        return view('admin.order.index', compact('order_new', 'order_xuly', 'order_danggiao', 'order_dagiao', 'order_all'));
    }

    public function orderunpaid()
    {
        $data_nganluong = Order::where('status_payment', 1)->where('payment', 2)->get();
        $data_tienmat = Order::where('status_payment', 1)->where('payment', 1)->get();
        return view('admin.order.order_unpaid', compact('data_nganluong', 'data_tienmat'));
    }

    public function detail($id)
    {
        $order = Order::where('id', $id)->first();
        $orderdetail = OrderDetail::where('order_id', $id)->get();
        return view('admin.order.detail', compact('order', 'orderdetail')); 
    }
    
    public function xacnhan($id)
    {
        Order::where('id', $id)->update(['status_shipping'=> 2]);
        \Session::flash('flash_message', 'Đơn Hàng Đã Được Xác Nhận.');
        return redirect()->back();
    }

    public function giaohang($id)
    {
        Order::where('id', $id)->update(['status_shipping'=> 3]);
        \Session::flash('flash_message', 'Đơn Hàng Chuyển Sang Trạng Thái Giao Hàng.');
        return redirect()->back();
    }

    public function dagiao($id)
    {
        Order::where('id', $id)->update(['status_shipping'=> 4]);
        \Session::flash('flash_message', 'Đơn Hàng Chuyển Sang Trạng Thái Đã Giao.');
        return redirect()->back();
    }

    public function huydon($id)
    {
        Order::where('id', $id)->update(['status_shipping'=> 5]);
        \Session::flash('flash_message_error', 'Đơn Hàng Chuyển Sang Trạng Thái Đã Hủy.');
        return redirect()->back();
    }

     public function xacnhanthanhtoan($id)
    {
        Order::where('id', $id)->update(['status_payment'=> 2]);
        \Session::flash('flash_message', 'Đơn Hàng Chuyển Sang Trạng Thái Đã Thanh Toán.');
        return redirect()->back();
    }

}
