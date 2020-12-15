@EXTENDS('layouts.master')
@section('content')
	<style type="text/css" media="screen">
    .quantity-box input {
        width:100px;
    }
    .img-fluid {
        max-width: 220px;
        height: 200px;
    }
</style> 
<script>
function removeproduct() {
	return confirm("Bạn Có Muốn Xóa Sản Phẩm Khỏi Giỏ Hàng Không?");
  	//confirm("Bạn Có Muốn Xóa Sản Phẩm Khỏi Giỏ Hàng Không?");
}
</script>
<!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Giỏ Hàng</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active">Giỏ Hàng</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Cart  -->
@if(session('cart'))
       <div class="cart-box-main">
            <div class="container">
	                <div class="row">
	                    <div class="col-lg-12">
	                        <div class="table-main table-responsive">
	                        	<?php $total = 0;?>
                    			@foreach( (array) session('cart') as $id=>$detail)
                    				<?php $total+=$detail['price']*$detail['quantity'] ?>	
                    			@endforeach
	                            <table class="table">
	                                <thead>
	                                    <tr>
	                                        <th>Hình Ảnh</th>
	                                        <th>Tên Sản Phẩm</th>
	                                        <th>Giá</th>
	                                        <th>Số Lượng</th>
	                                        <th>Tổng</th>
	                                        <th>Cập Nhật</th>
	                                        <th>Xóa</th>
	                                    </tr>
	                                </thead>
	                                <tbody>
	                                  @foreach(session('cart') as $id => $detail)
	                                    <tr>
	                                        <td class="thumbnail-img">
	                                            <a href="#">
	    											<img class="img-fluid" src="{{ asset($detail['photo']) }}"/>
	    										</a>
	                                        </td>
	                                        <td class="name-pr">
	                                            <a href="#">
	    											{{ $detail['name']}}
	    										</a>
	                                        </td>
	                                        <td class="price-pr">
	                                            <p>{{ number_format($detail['price']) }} ₫</p>
	                                        </td>
	                                        <form action="{{ route('updatecart', ['slug'=>$detail['slug']])}}" method="post">
	                                        	@csrf
		                                        <td class="quantity-box">
		                                            <a href="{{ route('cartminus.add', ['slug'=>$detail['slug']]) }}" >
	                                                	<i class="fas fa-minus"></i>
	                                            	</a>
	                                            		<input type="text" name="quantity" value="{{ $detail['quantity'] }}">
	                                              	<a href="{{ route('cartplus.add', ['slug'=>$detail['slug']]) }}" >
	                                                	<i class="fas fa-plus"></i>
	                                            	</a>
		                                        </td>

		                                        <td class="total-pr">
		                                            <p>{{ number_format($detail['price']*$detail['quantity']) }} ₫</p>
		                                        </td>
		                                        <td>
		                                        	<button type="submit" class="btn btn-primary">Cập Nhật</button>
		                                    	</td>
		                                    </form>
		                                        <td class="remove-pr">
		                                        	
		                                                <a href="{{ route('cart.delete', ['slug'=>$detail['slug'] ]) }}" onclick="return removeproduct()"><button class="btn btn-danger" type="button"><i class="fas fa-times"></i></button>
		                                                </a>
		                              	
		                                        </td>
	                                    </tr>
	                                   @endforeach
	                                </tbody>
	                            </table>
	                        </div>
	                    </div>
	                </div>

	                <div class="row my-5">
	                    <div class="col-lg-6">
	                        <div class="row d-flex shopping-box">
	                            <div class="col" style="text-align: right;">
	                                 <button class="ml-auto bg-primary btn hvr-hover"><a href="{{ route('index') }}" >Mua Tiếp </a></button>
	                            </div>
	                             <div class="col">
	                               
	                            </div>
	                        </div>
	                    </div>
	                   
	                    <div class="col-lg-6 col-sm-6">
	                        <div class="order-box">
	                                <h3>Đơn Hàng</h3>
	                                <div class="d-flex">
	                                    <h1>Tổng Cộng</h1>
	                                    <div class="ml-auto font-weight-bold">{{ number_format($total) }} ₫</div>
	                                </div>
	                        </div>
	                    </div>
	                </div>
            	</form>
                <div class="row my-5">
                    <div class="col-lg-8 col-sm-12"></div>
                    <div class="col-lg-4 col-sm-12"></div>
                    <div class="col-12 d-flex shopping-box">
                        <a href="{{ route('checkout') }}" class="ml-auto btn hvr-hover">Thanh Toán</a> 
                    </div>
                </div>
            </div>
        </div>
 @else
 	<div class="cart-box-main">
        <div class="container">
  			@if (Session::has('flash_message'))
                    <div class="alert alert-success">{{ Session::get('flash_message') }}</div>
                @endif
           	<h2>Khong co san pham nao trong gio hang</h2>
    	</div>
    </div>
@endif
            
    <!-- End Cart -->
@endsection