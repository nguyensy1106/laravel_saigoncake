<?php

namespace App\Http\Controllers;

use App\Province;
use App\District;
use App\Ward;
use App\Product;
use App\Coupon;
use App\Shipping;
use App\User;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function password(Request $request)
    {
      $confirmpassword = $request->get('confirmpassword');
      $newpassword = $request->get('newpassword');
      if($confirmpassword == $newpassword) {
        echo '<i class="fas fa-lg fa-check"  
                                style="color: #96bf48;"></i>';
      } else{
        echo '<i class="fas fa-lg fa-times"  
                                style="color: red;"></i>';;
      }
    }

    public function email(Request $request)
    {
        if($request->get('query'))
        {
          	$query = $request->get('query');
          	if(filter_var($query, FILTER_VALIDATE_EMAIL)){
          		$data = User::where('email',$query)->first();
	           	if(!$data){
	           		echo " <small style='color:green' >Email này hợp lệ</small> ";
	           	}else{

	           		echo "<small style='color:red'>Email này đã được sử dụng</small>";
	           	}
          	}else{
          		echo "<small style='color:red'>Email chưa đúng cú pháp</small>";
          	}
           	
       	}
    }

     public function phone(Request $request)
    {
        if($request->get('query'))
        {
          	$query = $request->get('query');
          	if( strlen($query) == 10 && is_numeric($query) ){
          		$data = User::where('phone',$query)->first();
	           	if(!$data){
	           		echo "<small style='color:green' >Số điện thoại này hợp lệ</small> ";
	           	}else{

	           		echo "<small style='color:red'>Số điện thoại đã được đã tồn tại </small>";
	           	}
          	}else{
          		echo "<small style='color:red'>Số điện thoại phải có 10 kí tự số và không chứa kí tự chữ</small>";
          	}
           	
       	}
    }

     public function transportationFee(Request $request)
    {
          	$districtID = $request->get('districtID');
            $coupon = $request->get('coupon');
            $shipping = Shipping::where('id', $districtID)->first();
            $fee =  $shipping->money;
            $idfee = $shipping->id;
          	/*if( $districtID == 1) {
          		$fee = 10000;
          	} elseif($districtID == 2) {
          		$fee = 20000;
          	} else {
              $fee = 0;
            }*/
          	$subTotal = 0;
          	foreach( (array) session('cart') as $id => $cart ) {
          		$subTotal += $cart['price'] * $cart['quantity'];
            }
            $total = $subTotal + $fee - $coupon;
            $res = [
            	"fee" => $fee,
            	"total" => $total,
              "idfee"=> $idfee
            ];
      	echo json_encode($res);
    }
    public function postcoupon(Request $request)
    {
      $coupon_code = $request->get('coupon');
      $districtID = $request->get('districtID');
      if($districtID == ""){
        $fee = 0;
      } else {
        $shipping = Shipping::where('id', $districtID)->first();
        $fee = $shipping->money;
      }
      $subTotal = 0;
      foreach( (array) session('cart') as $id => $cart ) {
          $subTotal += $cart['price'] * $cart['quantity'];
      }
      $data = Coupon::where('coupon_code',$coupon_code)->first();
      $error="";
      $idcoupon="";
      if($data){
        $date_now = date('Y-m-d');
        $date_current = $data->date_current;
        $date_expiration = $data->date_expiration;
        if($data->coupon_number > 0){
          if($date_now >= $date_current && $date_now <= $date_expiration)
          {
             $idcoupon = $data->id;
            if($data->coupon_condition == 2)
            {
              $coupon = $data->coupon_money;
              $error="<p class='alert alert-success'>Áp Dụng Mã <b>".$coupon_code."</b> Thành Công. Giảm ".number_format($data->coupon_money)."đ Trên Tổng Hóa Đơn</>";
            }else{
              $coupon = $subTotal*$data->coupon_money/100;
              $error="<p class='alert alert-success'>Áp Dụng Mã <b>".$coupon_code."</b> Thành Công. Giảm ".$data->coupon_money."% Trên Tổng Hóa Đơn</>";
            }
          }else{
            $error="<p class='alert alert-danger'>Mã <b>".$coupon_code."</b> Đã Hết Hạn Sử Dụng.</p>";
            $coupon=0;
          }
        } else {
          $error="<p class='alert alert-danger'>Mã <b>".$coupon_code."</b> Đã Hết Lượt Sử Dụng</p>";
          $coupon=0;
        }
      } else {
          $error="<p class='alert alert-danger'>Mã <b>".$coupon_code."</b> Không Hợp Lệ</p>";
          $coupon=0;
      }
      $total = $subTotal - $coupon + $fee;
            $res = [
              "fee"=> $fee,
              "coupon" => $coupon,
              "idcoupon" => $idcoupon,
              "total" => $total,
              "error" => $error
            ];
        echo json_encode($res);
      
    }

    public function search_ajax(Request $request)
    {
      $data = $request->all();
      if($data['keyword']) {
        $product = Product::where('name_product', 'LIKE', '%'.$data['keyword'].'%')->get();
        $output = '<ul class="list-group"> ';
        foreach ($product as $key => $val) {
          $link = "/product/".$val->slug;
          $output .= '
            <li class="list-group-item"><a href="'.$link.'"><img width="70px" height="70px" src="'.$val->url_image.'">'.$val->name_product.'</a></li>
          ';
        }
         $output .= '</ul>';
         echo $output;
      }
      
    }

    public function postdatecoupon(Request $request)
    {
        $date_current = $request->get('date_current');
        $date_expiration = $request->get('date_expiration');
          if($date_current > $date_expiration)
        {
          echo "<small style='color:red'>Ngày Hết Hạn Phải Sau Hoặc Có Thể Trùng Với Ngày Hiện Hành</small>";
        }
    }

    public function postcouponcode(Request $request)
    {
        $coupon_code = $request->get('coupon_code');
        $data = Coupon::where('coupon_code', '=', $coupon_code)->first();
        if($data){
           echo "<p style='color:red'>Mã Code Đã Tồn Tại. Hãy Chọn Mã Code Khác</p>";
        }
    }

    public function postprovince(Request $request)
    {
      $provinceID = $request->get('provinceID');
      $data = District::where('_province_id', $provinceID)->get();
      $district = "";
      foreach ($data as $key => $val) {
        $district .= "<option value='".$val->id."'>".$val->_prefix." ".$val->_name."</option>";
      }
      $ward = "<option>Chọn Phường/Xã</option>";
       $res = [
              "district" => $district,
              "ward" => $ward
            ];
        echo json_encode($res);

    }

    public function postdistrict(Request $request)
    {
      $districtID = $request->get('districtID');
      $data = Ward::where('_district_id', $districtID)->get();
      foreach ($data as $key => $val) {
        echo "<option value='".$val->id."'>".$val->_prefix." ".$val->_name."</option>";
      }
    }

}
