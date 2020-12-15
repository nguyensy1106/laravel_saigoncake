@EXTENDS('layouts.master')
@section('content') 
<style type="text/css" media="screen">
.img-fluid {
    max-width: 100%;
    height: 200px;
}
</style>
	  <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h2>Tìm Kiếm</h2>
                </div>
                <div class="col-lg-6">
	                <h2 class="float-right">Có {{count($data)}} kết quả được tìm thấy</h2>
	            </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Shop Page  -->
    <div class="shop-box-inner">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-sm-12 col-xs-12 shop-content-right">
                    <div class="right-product-box">
                        <div class="product-categorie-box">
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade show active" id="grid-view">
                                    <div class="row">
                                    @foreach($data as $product)
                                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                            <div class="products-single fix">
                                                <div class="box-img-hover">
                                                    <div class="type-lb">
                                                        <p class="sale">Sale</p>
                                                    </div>
                                                    <img src="{{ asset($product->url_image) }}" class="img-fluid" alt="Image">
                                                    <div class="mask-icon">
                                                        <ul>
                                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                                            <li><a href="" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                                        </ul>
                                                        <a class="cart"  href="{{ route('productdetail', ['slug'=>$product->slug]) }}">Chi Tiết</a>
                                                    </div>
                                                </div>
                                                <div class="why-text">
                                                   <h4>{{ $product->name_product }}</h4>
                                                    <h5><strike>{{ $product->price_sell }}</strike></h5>
                                                    <h5 style="text-align:right;">{{ $product->price_discount }}</h5>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    <!-- endforeach san pham -->
                                    </div> 
                                    <div class="row">
                                        <div class="col-4"></div>
                                        <div class="col-4">{{ $data->links() }} </div> 
                                        <div class="col-4"></div> 
                                    </div>                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-sm-12 col-xs-12 sidebar-shop-left">
                    <div class="product-categori">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection