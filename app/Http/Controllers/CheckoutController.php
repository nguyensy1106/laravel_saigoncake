<?php

namespace App\Http\Controllers;

use App\Coupon;
use App\Classes\NL_Checkout;
use App\Order;
use App\OrderDetail;
use Illuminate\Support\Str;
use Auth;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
	public function __construct() {
	   $this->middleware('auth');
	}

    public function postcheckout(Request $request)
    {
    	/*dd($request->idcoupon);*/
    	$cart = session()->get('cart');
        $total = 0 ;

        foreach ($cart as $id=>$details) {
            $total += $details['price'] * $details['quantity'];
       }

      	Order::create([
            'id_customer' => Auth::id(),
            'address_ship' => $request->address_ship,
            'phone' => $request->phone,
            'date_ship' => $request->date_ship,
            'money_subtotal'=>$total,
            'money_pay'=>$request->total,
            'note'=>$request->note,
            'payment'=>$request->payment,
            'status_payment'=>1,
            'status_shipping'=>1,
            'id_coupon'=>$request->idcoupon,
            'id_fee'=>$request->idfee
        ]);
        $ketqua=Order::orderBy('id','desc')->limit(1)->get();
        foreach ($ketqua as $value) {
             $id_order=$value->id;
         }
        ///////xóa sl mã giảm/////////
        if($request->idcoupon) { 
            $id_coupon = $request->idcoupon;
            $data_coupon = Coupon::where('id', $id_coupon)->first();
            $sl = $data_coupon->coupon_number - 1;
            Coupon::where('id', $id_coupon)->update(['coupon_number'=>$sl]);
        }
        ////////////////////////////////////
        //tạo code_order và update code_order
    	$string_ramdom = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    	$random = substr(str_shuffle(str_repeat($string_ramdom, 5)), 0, 2);
    	$year = date('Y');
    	$month = date('m');
    	$day = date('d');
    	$code = $random."".$year."".$month."".$day."HD".$id_order;
    	Order::where('id',$id_order)->update(['code_order'=>$code]);
    	////////////////
       foreach ($cart as $id=>$details) {
               OrderDetail::create([
                'order_id'=>$id_order,
                'product_id'=>$details['id'],
                'quantity'=>$details['quantity'],
                'price'=>$details['price']
            ]);
        }
        $ketqua_code=Order::orderBy('id','desc')->limit(1)->get();
        foreach ($ketqua_code as $value) {
             $order_code=$value->code_order;
         }
        session()->forget('cart');

        if($request->payment == 1){
            \Session::flash('flash_message', 'Đơn Hàng Của Bạn Đã Đặt Thành Công.');
            return redirect()->route('cart.show');
        }else{
            include(app_path() . '/Functions/config.php');
            $receiver=RECEIVER;
            //912cb80577e7425b61f1739cbd32c58b
            //Mã đơn hàng 
            /*$order_code='NL_'.time();*/
            //Khai báo url trả về 
            $return_url= route('success_nganluong');
            // Link nut hủy đơn hàng
            $cancel_url= route('cart.show');  
            $notify_url = $_SERVER['HTTP_REFERER']. "/success.php";
            //Giá của cả giỏ hàng 
            /*$txh_name =$_POST['txh_name'];*/  
            $txt_email =$request->email;    
            $txt_phone =$request->phone;    
            $price =(int)$request->total;     
            //Thông tin giao dịch
            $transaction_info="Thong tin giao dich";
            $currency= "vnd";
            $quantity=1;
            $tax=0;
            $discount=0;
            $fee_cal=0;
            $fee_shipping=0;
            $order_description="Thong tin don hang: ".$order_code;
            $buyer_info=$txt_email."*|*".$txt_phone;
            $affiliate_code="";
            //Khai báo đối tượng của lớp NL_Checkout
            $nl= new NL_Checkout();
            $nl->nganluong_url = NGANLUONG_URL;
            $nl->merchant_site_code = MERCHANT_ID;
            $nl->secure_pass = MERCHANT_PASS;
            //Tạo link thanh toán đến nganluong.vn
            $url= $nl->buildCheckoutUrlExpand($return_url, $receiver, $transaction_info, $order_code, $price, $currency, $quantity, $tax, $discount , $fee_cal,    $fee_shipping, $order_description, $buyer_info , $affiliate_code);
            //$url= $nl->buildCheckoutUrl($return_url, $receiver, $transaction_info, $order_code, $price);
            
            
            //echo $url; die;
            if ($order_code != "") {
                //một số tham số lưu ý
                //&cancel_url=http://yourdomain.com --> Link bấm nút hủy giao dịch
                //&option_payment=bank_online --> Mặc định forcus vào phương thức Ngân Hàng
                $url .='&cancel_url='. $cancel_url . '&notify_url='.$notify_url;
                //$url .='&option_payment=bank_online';
                
                echo '<meta http-equiv="refresh" content="0; url='.$url.'" >';
                //&lang=en --> Ngôn ngữ hiển thị google translate
            }

        }
        
    }

    public function success_nganluong(Request $request)
    {
        include(app_path() . '/Functions/config.php');
        $transaction_info =$_GET['transaction_info'];
        $order_code =$_GET['order_code'];
        $price =$_GET['price'];
        $payment_id =$_GET['payment_id'];
        $payment_type =$_GET['payment_type'];
        $error_text =$_GET['error_text'];
        $secure_code =$_GET['secure_code'];
        //Khai báo đối tượng của lớp NL_Checkout
        $nl= new NL_Checkout();
        $nl->merchant_site_code = MERCHANT_ID;
        $nl->secure_pass = MERCHANT_PASS;
        //Tạo link thanh toán đến nganluong.vn
        $checkpay= $nl->verifyPaymentUrl($transaction_info, $order_code, $price, $payment_id, $payment_type, $error_text, $secure_code);
        
        if ($checkpay) {    
            /*echo 'Payment success: <pre>'; */
            Order::where('code_order', $order_code)->update(['status_payment'=>2]);
            \Session::flash('flash_message', 'Đơn Hàng Của Bạn Đã Đặt Thành Công.');
            return redirect()->route('cart.show');    
            /*print_r($_GET);*/
        }else{
            echo "payment failed";
        }
    }
}
