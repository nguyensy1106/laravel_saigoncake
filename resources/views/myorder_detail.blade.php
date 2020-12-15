@EXTENDS('layouts.master')
@section('content')
<style type="text/css" media="screen">
 @import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');

 .card {
     position: relative;
     display: -webkit-box;
     display: -ms-flexbox;
     display: flex;
     -webkit-box-orient: vertical;
     -webkit-box-direction: normal;
     -ms-flex-direction: column;
     flex-direction: column;
     min-width: 0;
     word-wrap: break-word;
     background-color: #fff;
     background-clip: border-box;
     border: 1px solid rgba(0, 0, 0, 0.1);
     border-radius: 0.10rem
 }

 .card-header:first-child {
     border-radius: calc(0.37rem - 1px) calc(0.37rem - 1px) 0 0
 }

 .card-header {
     padding: 0.75rem 1.25rem;
     margin-bottom: 0;
     background-color: #fff;
     border-bottom: 1px solid rgba(0, 0, 0, 0.1)
 }

 .track {
     position: relative;
     background-color: #ddd;
     height: 7px;
     display: -webkit-box;
     display: -ms-flexbox;
     display: flex;
     margin-bottom: 60px;
     margin-top: 50px
 }

 .track .step {
     -webkit-box-flex: 1;
     -ms-flex-positive: 1;
     flex-grow: 1;
     width: 25%;
     margin-top: -18px;
     text-align: center;
     position: relative
 }

 .track .step.active:before {
     background: #FF5722
 }

 .track .step::before {
     height: 7px;
     position: absolute;
     content: "";
     width: 100%;
     left: 0;
     top: 18px
 }

 .track .step.active .icon {
     background: #ee5435;
     color: #fff
 }

 .track .icon {
     display: inline-block;
     width: 40px;
     height: 40px;
     line-height: 40px;
     position: relative;
     border-radius: 100%;
     background: #ddd
 }

 .track .step.active .text {
     font-weight: 400;
     color: #000
 }

 .track .text {
     display: block;
     margin-top: 7px
 }

 .itemside {
     position: relative;
     display: -webkit-box;
     display: -ms-flexbox;
     display: flex;
     width: 100%
 }

 .itemside .aside {
     position: relative;
     -ms-flex-negative: 0;
     flex-shrink: 0
 }

 .img-sm {
     width: 80px;
     height: 80px;
     padding: 7px
 }

 ul.row,
 ul.row-sm {
     list-style: none;
     padding: 0
 }

 .itemside .info {
     padding-left: 15px;
     padding-right: 7px
 }

 .itemside .title {
     display: block;
     margin-bottom: 5px;
     color: #212529
 }


 .btn-warning {
     color: #ffffff;
     background-color: #ee5435;
     border-color: #ee5435;
     border-radius: 1px
 }

 .btn-warning:hover {
     color: #ffffff;
     background-color: #ff2b00;
     border-color: #ff2b00;
     border-radius: 1px
 }	
</style>
 	<div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Thông Tin Đơn Hàng</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="my-account-box-main">
    	<div class="container">
		    <article class="card">
		        <header class="card-header"> Đơn Hàng </header>
		        <div class="card-body">
		            <h6>Mã Đơn Hàng: {{ $data_order->code_order }}</h6>
		            <article class="card">
		                <div class="card-body row">
		                    <div class="col"> <strong>Ngày Đặt:</strong> <br>
		                    	{{ date_format(date_create($data_order->created_at),'Y-m-d') }}
		                    </div>
		                    <div class="col"> <strong>Ngày Giao:</strong> <br>
		                    	{{ date_format(date_create($data_order->date_ship),'Y-m-d') }}
		                    </div>
		                    <div class="col"> <strong>Vận Chuyển:</strong> <br> 
		                    	{{ 	$data_order->address_ship }} <br> 
		                    	<i class="fa fa-phone"></i>  
		                    	<a href="#">{{ $data_order->phone }}</a>
		                    </div>
		                    <div class="col"> <strong>Thanh Toán:</strong> <br>
		                    	@if($data_order->payment == 1)
		                            Tiền mặt
		                        @else
		                            Ngân Lượng
		                        @endif
		                    </div>
		                    <div class="col"> <strong>Tình Trạng:</strong> <br> 
		                    	 @if($data_order->status_payment == 1)
		                            Chưa Thanh Toán
		                        @else
		                            Đã Thanh Toán
		                        @endif
		                    </div>
		                </div>
		            </article>
		            @if($data_order->status_shipping >=5 )
		            <div class="track">
		            	<div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Đã Hủy</span> </div>
		            </div>
		            @else
		            <div class="track">
		                <div class="step <?php  if($data_order->status_shipping > 1) echo 'active'; ?>"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Xác Nhận</span> </div>
		                <div class="step <?php  if($data_order->status_shipping > 2) echo 'active'; ?> "> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Đang Làm</span> </div>
		                <div class="step <?php  if($data_order->status_shipping >= 3) echo 'active'; ?>"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> Đang Giao </span> </div>
		                <div class="step <?php  if($data_order->status_shipping >= 4) echo 'active'; ?>"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Đã Giao</span> </div>
		            </div>
		            @endif
		            <hr>
		            <ul class="row">
		            	@foreach($data_orderdetail as $detail)
			                <li class="col-md-4">
			                    <figure class="itemside mb-3">
			                        <div class="aside">
			                        	<img src="{{ asset($detail->product->url_image)}}" class="img-sm border">
			                        </div>
			                        <figcaption class="info align-self-center">
			                            <p class="title">
			                            	{{ $detail->product->name_product}} <br>
			                            	<span> x {{ $detail->quantity}} </span> 
			                        	</p> 
			                        	<span class="text-muted">
			                        	 {{ number_format($detail->price)}}₫ 
			                        	</span>
			                        </figcaption>
			                    </figure>
			                </li>
			            @endforeach
		            </ul>
		            <hr>
		            <div class="row ">
		            	<div class="col-9">
		            	</div>
		            	<div class="col-3 ">
		            		<div class="row ">
		            			<div class="col-7">
		            				<p>Tổng Tiền Hàng</p>
		            			</div>
		            			<div class="col-5 text-right">
		            				{{ number_format($data_order->money_subtotal) }} ₫
		            			</div>
		            		</div>
		            		<div class="row">
		            			<div class="col-7">
		            				<p>Vận Chuyển</p>
		            			</div>
		            			<div class="col-5 text-right">
		            				+ {{ number_format($data_order->shipping->money) }} ₫
		            			</div>
		            		</div>
		            		@if($data_order->id_coupon)
		            		<div class="row">
		            			<div class="col-7">
		            				<p>Khuyến Mãi</p>
		            			</div>
		            			<div class="col-5 text-right">
		                           - @if($data_order->coupon->coupon_condition == 1)
		                                		{{ number_format($data_order->money_subtotal*$data_order->coupon->coupon_money/100) }}
		                                	@else
		                                		{{ number_format($data_order->coupon->coupon_money) }}
		                                	@endif ₫
		            			</div>
		            		</div>
		            		@endif
		            		<div class="row">
		            			<div class="col-7">
		            				<b>Tổng Thanh Toán</b>
		            			</div>
		            			<div class="col-5 text-right">
		            				<p style="color: red">
		            					{{ number_format($data_order->money_pay) }} ₫
		            				</p>
		            			</div>
		            		</div>
		            	</div>
		            </div>
		            <hr>
		            <div class="row">
		            	<div class="col">
		            		 <a href="#" class="btn btn-warning" data-abc="true"> <i class="fa fa-chevron-left"></i> Back </a>
		            	</div>
		            	<div class="col text-right">
		            		@if($data_order->payment == 2 && $data_order->status_payment == 1)
		            		<a href="{{ route('payment_order',['code'=>$data_order->code_order])}}" class="btn btn-primary" data-abc="true"> 
		            			Thanh toán ngay</a>
		            		@endif
		            		@if($data_order->status_shipping <= 1 )
		            		<a href="{{ route('remove_order', ['code'=>$data_order->code_order]) }}" class="btn btn-secondary" data-abc="true" onclick="return confirm('Bạn có muốn hủy đơn hàng này không?')">
		            		 Hủy đơn hàng</a>
		            		@endif
		            	</div>
		            </div>            	
		        </div>
		    </article>
		</div>
    </div>	
<script type="text/javascript">
	/*function remove_order() {
  		return alert("Bạn có muốn hủy đơn hàng này không!");
	}*/
</script>
@endsection
