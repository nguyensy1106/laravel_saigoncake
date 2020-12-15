@EXTENDS('layouts.master')
@section('content')
<link rel="stylesheet" href="http://bootswatch.com/united/bootstrap.min.css"/>

<script src="http://code.jquery.com/jquery-3.1.1.js"></script>

<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">
  .img-fluid {
   height:250px;
}
</style>
<style>
@import url('https://fonts.googleapis.com/css?family=Montserrat:200,400,600,700,800');
.coupon-popup-sec { margin: 30px auto;color: #fff; padding: 0; width: 550px; position: relative;font-family: 'Montserrat', sans-serif;text-transform: uppercase;}
.coupon-popup-sec h1,h2,h3,h4,h5 {margin: 0;}
.coupon-popup-sec .coupon-content { margin: 0px; padding: 90px 0; float: left; width: 100%; box-sizing: border-box;}
.coupon-popup-sec .coupon-content .coupon-brdr-sec1 {width: 38%;float: left; padding: 36.5px 0;box-sizing: border-box;text-align: center;background: #ff0000;}
.coupon-popup-sec .coupon-content .coupon-brdr-sec2 {padding: 70px 0;background: #000;}
.coupon-popup-sec .coupon-content .coupon-brdr-sec1 h2 {font-size: 68px;font-weight: 800;}
.coupon-popup-sec .coupon-content .coupon-brdr-sec1 h3 {font-size: 29px;}
.coupon-popup-sec .coupon-content p {font-size: 17px;font-weight: 600;letter-spacing: 0.5px}
.coupon-popup-sec .coupon-content h4 {font-size: 25px;font-weight: 600;padding-bottom: 30px;}
.coupon-popup-sec .coupon-content .coupon-brdr-sec1 h5 {font-size: 18px;}
.coupon-popup-sec .coupon-content .coupon-brdr-sec2 .code-now-btn {cursor: pointer;font-size: 27px;text-transform: uppercase;font-weight: 600;color: #fff;margin: 0 0 10px 0;padding: 15px 25px; clear: both;border: 0px;background: #ff0000;font-family: 'Montserrat', sans-serif;}
.coupon-popup-sec .coupon-content .coupon-brdr-sec2 .code-now-btn:hover { background: #00ae4d; }
.coupon-popup-sec .coupon-content .coupon-brdr-sec2 .code-now-btn:focus, .coupon-popup-sec .coupon-cls-btn:focus { outline: none; }
.coupon-popup-sec .coupon-cls-btn { font-size: 14px; line-height: 18px; width: 28px; height: 28px; -webkit-border-radius: 50%; border-radius: 50%; background: #FFF; position: absolute; right: -14px; top: -14px; border: 0px; -webkit-box-shadow: 0 0 2px 0 rgba(0,0,0,0.27); box-shadow: 0 0 2px 0 rgba(0,0,0,0.27); cursor: pointer;}
.popup-graybox {position: fixed;width: 100%;top: 0;left: 0;height: 100vh;z-index: 99999;text-align: center;align-items: center;display: flex;box-sizing: border-box;overflow: auto;}
.coupon-popup-sec .coupon-cls-btn:hover {background: #ff0000;color: #fff;}
.coupon-popup-sec .coupon-content {background: #000;-webkit-box-shadow: 0px 10px 20px 0px rgba(50, 50, 50, 0.52);-moz-box-shadow: 0px 10px 20px 0px rgba(50, 50, 50, 0.52);box-shadow: 0px 10px 20px 0px rgba(50, 50, 50, 0.52);}
.coupon-popup-sec .coupon-content .main_content{width: 100%;float: left; margin-bottom: 30px;}
@media only screen and (max-width:640px) {
.coupon-popup-sec { width: 90%; }
}
@media only screen and (max-width:480px) {
.coupon-popup-sec .coupon-content .coupon-brdr-sec1 h2 {font-size: 42px;}
.coupon-popup-sec .coupon-content .coupon-brdr-sec1 h3 {font-size: 19px;}
.coupon-popup-sec .coupon-content .coupon-brdr-sec1 h5 {font-size: 16px;}
.coupon-popup-sec .coupon-content .coupon-brdr-sec2 .code-now-btn {font-size: 16px;}
.coupon-popup-sec .coupon-content .coupon-brdr-sec2 {padding: 54px 0;}
.coupon-popup-sec .coupon-content {padding: 45px 0 30px 0;}
.coupon-popup-sec .coupon-content h4 {font-size: 18px;letter-spacing: 0.5px;}
}
@media only screen and (max-width:425px) {
.coupon-popup-sec .coupon-content .coupon-brdr-sec1 {width: 45%;padding: 23.5px 0;}
.coupon-popup-sec .coupon-content .coupon-brdr-sec2 {padding: 46px 0;}
.coupon-popup-sec .coupon-content p {font-size: 12px;}
.coupon-popup-sec .coupon-content h4 {font-size: 16px;padding-bottom: 15px;}
.coupon-popup-sec .coupon-content .coupon-brdr-sec2 .code-now-btn {font-size: 14px;letter-spacing: 0.5px;padding: 10px 15px;}
.coupon-popup-sec .coupon-content {padding: 30px 0 20px 0;}
}
</style>




<div class="modal fade" id="memberModal" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">
<section class="popup-graybox">
 @foreach($coupon as $value_coupon)
<div class="coupon-popup-sec" >
  <div class="coupon-content" style="background: #000 url({{ asset('image/freetrial_popup.jpg')}}) no-repeat top left;background-size: cover;">
    <h4 style="color: white">Chương Trình Khuyến Mãi Của Cửa Hàng</h4>
      <div class="main_content">
         <div class="coupon-brdr-sec1">
            <p data-edit="text" >Nhập Code</p>
            <h2 data-edit="text" style="font-size: 30px;font-weight: 300; border: 1px dashed; margin-top: 20px;  font-weight: bolder;">{{ $value_coupon->coupon_code }}</h2>
         </div>
         <div class="coupon-brdr-sec2">

           <button class="code-now-btn" data-edit="button" onclick="location.reload();" >Mua Hàng</button>
         </div>
      </div>
    @if($value_coupon->coupon_condition == 1)
          <p>  Giảm {{ $value_coupon->coupon_money }} % trên tổng hóa đơn</p>
    @else
        <p>  Giảm {{ number_format($value_coupon->coupon_money) }}đ trên tổng hóa đơn </p>
    @endif
  </div>
</div>
@endforeach
</section>
</div>
<script>
    function Set_Cookie(name, value, expires, path, domain, secure) {
        var today = new Date();
        today.setTime(today.getTime());
        var expires_date = new Date(today.getTime() + (expires));
        document.cookie = name + "=" + escape(value) +
        ((expires) ? ";expires=" + expires_date.toGMTString() : "") +
        ((path) ? ";path=" + path : "") +
        ((domain) ? ";domain=" + domain : "") +
        ((secure) ? ";secure" : "");
    }

    function Get_Cookie(name) {
        var start = document.cookie.indexOf(name + "=");
        var len = start + name.length + 1;
        if ((!start) &&
            (name != document.cookie.substring(0, name.length))) {
            return null;
    }
    if (start == -1) return null;
    var end = document.cookie.indexOf(";", len);

    if (end == -1) end = document.cookie.length;
    return unescape(document.cookie.substring(len, end));

}


function Delete_Cookie(name, path, domain) {

    if (Get_Cookie(name)) document.cookie = name + "=" +

        ((path) ? ";path=" + path : "") +

    ((domain) ? ";domain=" + domain : "") +

    ";expires=Mon, 11-November-1989 00:00:01 GMT";

}

$(document).ready(function () {
   if (Get_Cookie('sinhthanh') == null) {
       Set_Cookie('sinhthanh', 'sinhthanh Popunder', '1', '/', '', '');
       $('#memberModal').modal('show');

   }
});

</script>
	<!-- Start Slider -->
   <!--  @can('isAdmin')
        Admin
    @elsecan('isEmployee')
        Emp
    @elsecan('isGuest')
        Guest
    @endcan -->
    <div id="slides-shop" class="cover-slides">
        <ul class="slides-container">
            <li class="text-center">
                <img src="{{ asset('client/images/banner03.jpg') }}" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Shop Cake Sài Gòn<br></strong></h1>
                            <p class="m-b-40"></p>
                            <p><a class="btn hvr-hover" href="{{ route('shop') }}">Shop New</a></p>
                        </div>
                    </div>
                </div>
            </li>
            <li class="text-center">
                <img src="{{ asset('client/images/banner02.jpg') }}" alt="">
                <div class="container">
                    
                </div>
            </li>
            <li class="text-center">
                <img src="{{ asset('client/images/banner01.jpg') }}" alt="">
                <div class="container">
                </div>
            </li>
        </ul>
        <div class="slides-navigation">
            <a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
            <a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
        </div>
    </div>
    <!-- End Slider -->

   <!-- Start Categories  -->
    <div class="categories-shop">
        <div class="container">
            <div class="row">
                @foreach( $category as $value_category)
	                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
	                    <div class="shop-cat-box">
	                        <img class="img-fluid" src="{{ asset( $value_category-> url_image) }}" alt=""/>
	                        <a class="btn hvr-hover" href="{{ route('shopdetail',['slug' => $value_category->slug ]) }}">{{ $value_category->name_category }}</a>
	                    </div>
	                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- End Categories -->

    <!-- Start Products  -->
    <div class="products-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1>Sản Phẩm Của Shop</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="special-menu text-center">
                        <div class="button-group filter-button-group">
                            <button class="active" data-filter="*">Tất Cả</button>
                            <button data-filter=".top-featured">Nổi Bật</button>
                            <button data-filter=".best-seller">Bán Chạy</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row special-list">
            	@foreach( $product as $value_product)
                <div class="col-lg-3 col-md-6 special-grid <?php if( $value_product->id %2 == 0 ){ echo "top-featured"; } else { echo "best-seller"; } ?>">
                    <div class="products-single fix">
                        <div class="box-img-hover">
                            <div class="type-lb">
                                <p class="sale">
                                    @if($value_product->price_discount < $value_product->price_sell)
                                        Giảm {{ round(($value_product->price_sell-$value_product->price_discount)/$value_product->price_sell*100) }}%
                                    @endif
                                </p>
                            </div>
                            <img src="{{ asset($value_product->url_image) }}" with="600px" height="200px" alt="Image">
                            <div class="mask-icon">
                                <ul>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                    <li>
                                        <a data-toggle="tooltip" data-placement="right" title="Add to Wishlist" 
                                        @foreach ($wishlist as $key => $value_wishlist) 
                                                @if($value_wishlist->id_product == $value_product->id)
                                                    href="{{ route('remove_heart_red', ['id'=>$value_product->id]) }}"
                                                @endif
                                        @endforeach
                                        href="{{ route('wishlist_product', ['slug'=>$value_product->slug]) }}"
                                         >
                                       
                                        <i class="far fa-heart" style=" 
                                                @foreach ($wishlist as $value_wishlist)
                                                    @if($value_wishlist->id_product == $value_product->id)
                                                        color: red;
                                                    @endif
                                                @endforeach
                                        "></i>
                                        </a>
                                    </li>                   
                                </ul>
                                <a class="cart" href="{{ route('productdetail', ['slug'=>$value_product->slug]) }}">Chi Tiết</a>
                            </div>
                        </div>
                        <div class="why-text">
                            <h4>{{ $value_product->name_product }}</h4>
                            @if( $value_product->price_sell == $value_product->price_discount )
                            	<h5 style="text-align:right;"> {{ number_format($value_product->price_discount) }} ₫</h5>
             				@else
             					<h5><strike>{{ number_format($value_product->price_sell) }} ₫</strike></h5>
                            	<h5 style="text-align:right;">{{ number_format($value_product->price_discount) }} ₫</h5>
             				@endif
                            
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- End Products  -->

 	<!-- Start Blog  -->
    <div class="latest-blog">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1>Blog Mới Nhất</h1>
                    </div>
                </div>
            </div>
            <div class="row">
              @foreach($blog as $data_blog)
                <div class="col-md-6 col-lg-4 col-xl-4">
                    <div class="blog-box" >
                        <div class="blog-img">
                            <img class="img-fluid" src="{{ asset($data_blog->url_image) }}" alt="" />
                        </div>
                        <div class="blog-content">
                            <div class="title-blog">
                                <a href="{{ route('blog.detail', ['slug'=>$data_blog->slug])}}">
                                    <h3> {{ $data_blog->name_blog }}</h3>
                                    <p>{{ $data_blog->introduct }}</p>
                                </a>
                            </div>
                            <ul class="option-blog">
                                <li><a href="#"><i class="far fa-heart"></i></a></li>
                                <li><a href="#"><i class="fas fa-eye"></i></a></li>
                                <li><a href="#"><i class="far fa-comments"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
              @endforeach
            </div>
            </div>
        </div>
    </div>
    <!-- End Blog  -->

@endsection