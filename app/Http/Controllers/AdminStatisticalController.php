<?php

namespace App\Http\Controllers;

use App\User;
use App\Product;
use App\Classes\Date;
use App\Order;
use App\OrderDetail;
use Illuminate\Http\Request;

class AdminStatisticalController extends Controller
{
    //
    public function index()
    {
    	$data_product = Product::all();
    	//total hoa don moi
    	$totalNewOrder = Order::where('status_shipping', 1)->count();

    	//total khach hang
    	$totalCustomer = User::where('role', 3)->count();

    	//total doanh thu trong thang
    	$totalTransaction = Order::where('status_shipping', 4)->whereMonth('created_at', date('m'))
        ->sum('money_pay');

        //total san pham
    	$totalProduct = Product::where('status', 1)->count();

    	// tat ca cac ngay trong thang
    	$listDay = Date::getlistDayInMonth();

    	/////thong ke trang thai don hang	
    	$data_default = Order::where('status_shipping', 1)->select('id')->count();
    	$data_process = Order::where('status_shipping', 3)->select('id')->count();
    	$data_success = Order::where('status_shipping', 4)->select('id')->count();
    	$data_cancel = Order::where('status_shipping', 5)->select('id')->count();


    	$status_transaction = [
    		[
    			'Tiếp Nhận', $data_default, false
    		],
    		[
    			'Vận Chuyển', $data_process, false
    		],
    		[
    			'Hoàn Tất', $data_success, false
    		],
    		[
    			'Hủy Bỏ', $data_cancel, false
    		],	
    	];

    	//doanh theo thang
    	$transactionMonth = Order::where('status_shipping', 4)
    		->whereMonth('created_at', date('m'))
    		->select(\DB::raw('sum(money_pay) as totalMoney'), 
    			\DB::raw('DATE(created_at) day'))
    		->groupBy('day')
    		->get()->toArray();
    	$arrtransactionMonth = [];
    	foreach ($listDay as $day) {
    		$total = 0;
    		foreach ($transactionMonth as $key => $revenue ) {
    			if($revenue['day'] == $day) {
    				$total = $revenue['totalMoney'];
    				break;
    			}
    		}
    		$arrtransactionMonth[] = (int)$total;
    	}
    	//so hoa don tung ngay
    	$totalOrderInMonth = Order::where('status_shipping', 4)
    		->whereMonth('created_at', date('m'))
    		/*->whereDay('created_at',06)*/
    		->select(\DB::raw('count(id) as totalOrder'), 
    			\DB::raw('DATE(created_at) day'))
    		->groupBy('day')
    		->get()->toArray();
    	
    	$arrtotalOrderInMonth = [];
    	foreach ($listDay as $day) {
    		$sl = 0;
    		foreach ($totalOrderInMonth as $key => $value ) {
    			if($value['day'] == $day) {
    				$sl = $value['totalOrder'];
    				break;
    			}
    		}
    		$arrtotalOrderInMonth[] = (int)$sl;
    	}
    	//// san pham ban chay
    	$topSelling = OrderDetail::whereYear('created_at', date('Y'))
    		->select(\DB::raw('sum(quantity) as totalquantity'), 
    				\DB::raw('product_id as idproduct')
    			)
    		->groupBy('idproduct')
    		->orderBy('totalquantity', 'desc')
    		->limit(8)
    		->get()->toArray();
    	/// don hang moi nhat
    	$order_new = Order::orderBy('id','desc')->limit(10)->get();
    	 

    	
    	$view_data = [
    		'totalNewOrder'         => $totalNewOrder,
    		'totalCustomer'			=> $totalCustomer,
    		'totalProduct'			=> $totalProduct,
    		'totalTransaction'		=> $totalTransaction,
    		'status_transaction' 	=> json_encode($status_transaction),
    		'listDay' 				=> json_encode($listDay),
    		'arrtransactionMonth' 	=> json_encode($arrtransactionMonth),
    		'arrtotalOrderInMonth'	=> json_encode($arrtotalOrderInMonth),
    		'topSelling'			=> $topSelling
    	];
    	return view('admin.index', $view_data, compact('data_product', 'order_new'));
    }
}
