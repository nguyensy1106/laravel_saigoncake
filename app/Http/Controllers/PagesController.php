<?php

namespace App\Http\Controllers;

use App\Classes\NL_Checkout;
use App\Order;
use App\Wishlist;
use App\OrderDetail;
use App\Province;
use App\District;
use App\Ward;
use App\User;
use App\Category;
use App\Product;
use App\Blog;
use App\Contact;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
     public function shop()
    {
        /*$id=18;
        $product = Product::find($id);
        echo $product->category->name_category;*/
        if(isset($_GET['sort_by'])){
            $sort_by = $_GET['sort_by'];
            if($sort_by == 'price_asc'){
               $data_product = Product::where('status', 1)->orderBy('price_discount','ASC')->paginate(6)->appends(request()->query());
            }elseif($sort_by == 'price_desc'){
                $data_product = Product::where('status', 1)->orderBy('price_discount','DESC')->paginate(6)->appends(request()->query());
            }elseif($sort_by == 'name_az'){
                $data_product = Product::where('status', 1)->orderBy('name_product','ASC')->paginate(6)->appends(request()->query());
            }elseif($sort_by == 'name_za'){
                $data_product = Product::where('status', 1)->orderBy('name_product','DESC')->paginate(6)->appends(request()->query()); 
            }
        }elseif(isset($_GET['start_price']) && isset($_GET['end_price'])){
              $start_price = $_GET['start_price'];
              $end_price = $_GET['end_price'];
              $data_product = Product::where('status', 1)->whereBetween('price_discount',[$start_price,$end_price])->orderBy('price_discount','ASC')->paginate(6)->appends(request()->query());
        }else{
             $data_product = Product::where('status', 1)->orderBy('id','DESC')->paginate(6);
        }
        $data_category = Category::all();
        $count = Product::all()->count();
        $wishlist = Wishlist::where('id_user', Auth::id())->get();
        return view( 'shop', compact( 'data_category', 'data_product', 'count', 'wishlist') );
    }

      public function blog()
    {
        $data_blog = Blog::paginate(3);
        $data_blogpp = Blog::inRandomOrder()->limit(4)->get();
        return view( 'blog', compact( 'data_blog', 'data_blogpp') );
    }

     public function about_us()
    {
        return view('aboutus');
    }

     public function show_contact()
    {
        return view('contact');
    }

    public function post_contact(Request $request)
    {
        Contact::create([
            'email' => $request->email,
            'name' => $request->name,
            'subject' => $request->subject,
            'content' => $request->content,
            'status' => 1
        ]);
         \Session::flash('flash_message', 'Liên hệ của bạn đã được gửi đến shop.');  
        
        //cũ : return redirect('articles');
        return redirect()->back();

    }


     public function blog_detail($slug)
    {
        $blog = Blog::where( 'slug', $slug )->first();
        return view( 'blogdetail', compact( 'blog') );
    }

    public function shop_detail( $slug )
    {
        $data_category = Category::all();
        $category = Category::where( 'slug', $slug )->first();
        $category_id=$category->id;
         if(isset($_GET['sort_by'])){
            $sort_by = $_GET['sort_by'];
            if($sort_by == 'price_asc'){
               $data_product = Product::with('category')->where('category_id',$category_id)->where('status', 1)->orderBy('price_discount','ASC')->paginate(6)->appends(request()->query());
            }elseif($sort_by == 'price_desc'){
                $data_product = Product::with('category')->where('category_id',$category_id)->where('status', 1)->orderBy('price_discount','DESC')->paginate(6)->appends(request()->query());
            }elseif($sort_by == 'name_az'){
                $data_product = Product::with('category')->where('category_id',$category_id)->where('status', 1)->orderBy('name_product','ASC')->paginate(6)->appends(request()->query());
            }elseif($sort_by == 'name_za'){
                $data_product = Product::with('category')->where('category_id',$category_id)->where('status', 1)->orderBy('name_product','DESC')->paginate(6)->appends(request()->query()); 
            }

        }elseif(isset($_GET['start_price']) && isset($_GET['end_price'])){

              $start_price = $_GET['start_price'];
              $end_price = $_GET['end_price'];
              $data_product = Product::with('category')->where('category_id',$category_id)->whereBetween('price_discount',[$start_price,$end_price])->where('status', 1)->orderBy('price_discount','ASC')->paginate(6)->appends(request()->query());

        }else{
                $data_product = Product::where( 'category_id', $category_id)->where('status', 1)->paginate(6);
            }
        $count = Product::all()->count();
        $wishlist = Wishlist::where('id_user', Auth::id())->get();
        return view( 'shopdetail', compact( 'data_product', 'category', 'data_category', 'count', 'wishlist' ) );
    }

    public function product_detail($slug)
    {
        $data_product = Product::where('slug', $slug)->first();
        $data_wishlist = Wishlist::where('id_user', Auth::id())->where('id_product', $data_product->id)->get();
        $data_product_tt = Product::where('slug', '<>', $slug)
                        ->where('category_id', $data_product->category_id)
                        ->get();
        $data_comment = Comment::where('id_product', $data_product->id)->orderBy('id','desc')->get();
       return view( 'productdetail', compact( 'data_product', 'data_product_tt', 'data_comment', 'data_wishlist') );
    }

    public function postcommnet(Request $request, $id)
    {
        $id_product = $id;
        Comment::create([
            'id_user' => Auth::id(),
            'id_product' => $id_product,
            'comment' => $request->comment
        ]);
        return redirect()->back();
    }

    public function postsearch(Request $request)
    {
        $keyword = $request->keyword;
        $data = Product::where('name_product', 'LIKE','%'.$keyword.'%')->paginate(9);
        return view('search', compact('data'));
    }

    public function account()
    {
        return view('account');
    }

    public function myaccount()
    {
        $data_province = Province::all();
        $data_district = District::all();
        $data_ward = Ward::all();
        $data_user = User::where('id',Auth::id())->first();
        return view('my_account', compact( 'data_user', 'data_province', 'data_district', 'data_ward'));
    }

    public function update_myaccount(Request $request, $id)
    {
        User::where('id',$id)->update([
            'name'=>$request->fullname, 'gender'=>$request->gender, 
            'birthday'=>$request->datebirth, 'address'=>$request->address, 
            'phone'=>$request->phone, 'id_province'=>$request->province, 
            'id_district'=>$request->district, 'id_ward'=>$request->ward
        ]);

        if( $request->has('image') ) {

            $file = $request->file( 'image' )->move( 'upload/user', $request->file( 'image' )->getClientOriginalName());
            
            User::where('id',$id)->update(['url_avatar'=>$file]); 

        }

        \Session::flash('flash_message', 'Cập Nhật Tài Khoản Thành Công.'); 
        return redirect()->back();
    }

    public function nganluong()
    {
        return view('nganluong');
    }

    public function myorder()
    {
        $data_xacnhan = Order::where('id_customer',Auth::id())->where('status_shipping', 1)->get();
        $data_danglam = Order::where('id_customer',Auth::id())->where('status_shipping', 2)->get();
        $data_danggiao = Order::where('id_customer',Auth::id())->where('status_shipping', 3)->get();
        $data_dagiao= Order::where('id_customer',Auth::id())->where('status_shipping', 4)->get();
        $data_dahuy= Order::where('id_customer',Auth::id())->where('status_shipping', 5)->get();
        return view('myorder', compact('data_xacnhan', 'data_danglam', 'data_danggiao', 'data_dagiao', 'data_dahuy'));
    }

    public function remove_order($code)
    {
        Order::where('code_order', $code)->update(['status_shipping'=>5]);
        return redirect()->back(); 
    }

    public function detail_order($code)
    {
        $data_order = Order::where('code_order', $code)->first();
        $data_orderdetail = OrderDetail::where('order_id', $data_order->id)->get();
        return view('myorder_detail', compact('data_order', 'data_orderdetail'));
    }

    public function payment_order($code)
    {
            $data = Order::where('code_order', $code)->first();
            include(app_path() . '/Functions/config.php');
            $receiver=RECEIVER;
            //912cb80577e7425b61f1739cbd32c58b
            //Mã đơn hàng 
            $order_code=$data->code_order;
            //Khai báo url trả về 
            $return_url= route('success_nganluong');
            // Link nut hủy đơn hàng
            $cancel_url= route('cart.show');  
            $notify_url = $_SERVER['HTTP_REFERER']. "/success.php";
            //Giá của cả giỏ hàng 
            /*$txh_name =$_POST['txh_name'];*/  
            $txt_email ='';    
            $txt_phone ='';    
            $price =(int)$data->money_pay;     
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
