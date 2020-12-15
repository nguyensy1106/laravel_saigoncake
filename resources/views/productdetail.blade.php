@EXTENDS('layouts.master')
@section('content')
<style type="text/css" media="screen">
    .w-100 {
    width: 100%!important;
    height: 550px;
}
.owl-carousel .owl-item img {
    width: 100%;
    height: 200px;
}
.nut{
    color: white;
}
</style>
    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Chi Tiết Sản Phẩm</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Shop Detail  -->
    <div class="shop-detail-box-main">
        <div class="container">
    <form action="{{ route('cart.add', ['slug'=>$data_product->slug])}}" method="post">
        @csrf 
            <div class="row">
                <div class="col-xl-5 col-lg-5 col-md-6">
                    <div id="carousel-example-1" class="single-product-slider carousel slide" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active"> <img class="d-block w-100" src="{{ asset($data_product->url_image) }}" alt="First slide"> </div>
                           
                        </div>
                        <a class="carousel-control-prev" href="#carousel-example-1" role="button" data-slide="prev"> 
						<i class="fa fa-angle-left" aria-hidden="true"></i>
						<span class="sr-only">Previous</span> 
					</a>
                        <a class="carousel-control-next" href="#carousel-example-1" role="button" data-slide="next"> 
						<i class="fa fa-angle-right" aria-hidden="true"></i> 
						<span class="sr-only">Next</span> 
					</a>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7 col-md-6">
                    <div class="single-product-details">
                        <h2>{{ $data_product->name_product }}</h2>
                        @if( $data_product->price_sell ==  $data_product->price_discount)
                            <h5>{{ $data_product->price_discount }} ₫</h5>
                        @else
                            <h5> <del>{{ $data_product->price_sell }} ₫ </del> {{ $data_product->price_discount }} ₫</h5>
                        @endif
                        <h4>Loại Bánh:</h4>
                        <p>{{ $data_product->category->name_category }}</p>
						<h4>Mô Tả:</h4>
						<p>{!! $data_product->description !!}</p>
						<ul>
							<li>
								<div class="form-group quantity-box">
									<label class="control-label">Số Lượng: </label>
									<input class="form-control" value="1" min="0" max="20" type="number" name="quantity">
								</div>
							</li>
						</ul>

						<div class="price-box-bar">
                            <div class="row">
    							<div class="col-3 cart-and-bay-btn" style="text-align: right;">
    								<button class="btn hvr-hover nut" type="submit" name="add_to_cart">Thêm Vào Giỏ Hàng</button>
    							</div>
        </form>
                                <div class="col-9">
                                    @if( count($data_wishlist) > 0)
                                        <a href="{{ route('remove_heart_red', ['id'=>$data_product->id]) }}" class="btn hvr-hover nut"><i class="fas fa-heart" style="color: red;"> Yêu Thích</i></a>
                                    @else
                                        <a href="{{ route('wishlist_product', ['slug'=>$data_product->slug]) }}" class="btn hvr-hover nut"><i class="fas fa-heart">Thêm Vào Yêu Thích</i></a>
                                    @endif   
                                    </form>
                                </div>
                            </div>
						</div>
                    </div>
                </div>
            </div>
			<div class="row my-5">
				<div class="card card-outline-secondary my-4" style="width: 100%">
					<div class="card-header">
						<h2>Nhận Xét Về Sản Phẩm</h2>
					</div>
					<div class="card-body">
                       @foreach($data_comment as $comment)
						<div class="media mb-3">
							<div class="media mr-2"> 
								 <img style=" border-radius: 50%; width:50px" src="{{ asset($comment->user->url_avatar)}}" >
							</div>
							<div class="media-body">
								<p>{{ $comment->comment}}</p>
								<small class="text-muted">Được đăng bởi: {{ $comment->user->name}} / {{ $comment->created_at}}</small>
							</div>
						</div>
						<hr>
                        @endforeach
                        <form action="{{ route('postcommnet', ['id'=>$data_product->id])}}" method="post" >
                           @csrf
                            <div class="media mb-2">
                                <div class="col-10">
                                    <textarea name="comment" style="width: 100%" required></textarea>
                                </div>
                                <div class="col-2">
                                   <button class="btn hvr-hover nut" type="submit" name="addcomment"> Gửi Bình Luận</button>
                                </div>    
                            </div>
                        </form>
					</div>
				  </div>
			</div>

            <div class="row my-5">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1>Sản Phẩm Tương Tự</h1>
                        <p></p>
                    </div>
                    <div class="featured-products-box owl-carousel owl-theme">
                        @foreach($data_product_tt as $tt)
                        <div class="item">
                            <div class="products-single fix">
                                <div class="box-img-hover">
                                    <img src="{{ asset($tt->url_image) }}" width="200px" height="200px" class="img-fluid" alt="Image">
                                    <div class="mask-icon">
                                        <ul>
                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>

                                            <li><a href="" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                            
                                        </ul>
                                        <a class="cart" href="{{ route('productdetail', ['slug'=>$tt->slug]) }}">Chi Tiết</a>
                                    </div>
                                </div>
                                <div class="why-text">
                                    <h4>{{ $tt->name_product }}</h4>
                                    @if( $tt->price_sell ==  $tt->price_discount)
                                        <h5>{{ $tt->price_discount }} ₫</h5>
                                    @else
                                         <h5><strike>{{ $tt->price_sell }}₫</strike></h5>
                                        <h5 style="text-align:right;">{{ $tt->price_discount }}₫</h5>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- End Cart -->
@endsection