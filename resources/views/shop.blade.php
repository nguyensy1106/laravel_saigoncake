@EXTENDS('layouts.master')
@section('content')
<style type="text/css" media="screen">
.img-fluid {
    max-width: 100%;
    height: 200px;
}
</style>
    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Cửa Hàng</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Shop Page  -->
    <div class="shop-box-inner">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-9 col-sm-12 col-xs-12 shop-content-right">
                    <div class="right-product-box">
                        <div class="product-item-filter row">
                            <div class="col-12 col-sm-8 text-center text-sm-left">
                                <div class="toolbar-sorter-right">
                                    <span>Sắp Xếp</span>
                                    <select id="sort" name="sort" class="selectpicker show-tick form-control">
                                        <option value="{{Request::url()}}?sort_by=none">Hình Thức Sắp Xếp</option>
                                        <option value="{{Request::url()}}?sort_by=price_asc">Sắp Xếp Giá Tăng Dần</option>
                                        <option value="{{Request::url()}}?sort_by=price_desc">Sắp Xếp Giá Giảm Dần</option>
                                        <option value="{{Request::url()}}?sort_by=name_az">Sắp Xếp Theo A-Z</option>
                                        <option value="{{Request::url()}}?sort_by=name_za">Sắp Xếp Theo Z-A</option>
                                    </select>
                                </div> 
                                <p>Có {{count($data_product)}} kết quả được tìm thấy</p>
                            </div>
                        </div>
                        <div class="product-categorie-box">
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade show active" id="grid-view">
                                    <div class="row">
                                    @foreach($data_product as $product)
                                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                            <div class="products-single fix">
                                                <div class="box-img-hover">
                                                    <div class="type-lb">
                                                        <p class="sale">
                                                             @if($product->price_discount < $product->price_sell)
                                                                Giảm {{ round(($product->price_sell-$product->price_discount)/$product->price_sell*100) }}%
                                                            @endif
                                                        </p>
                                                    </div>
                                                    <img src="{{ asset($product->url_image) }}" class="img-fluid" alt="Image">
                                                    <div class="mask-icon">
                                                        <ul>
                                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                                            <li><a data-toggle="tooltip" data-placement="right" title="Add to Wishlist"
                                                                @foreach ($wishlist as $key => $value_wishlist) 
                                                                     @if($value_wishlist->id_product == $product->id)
                                                                    href="{{ route('remove_heart_red', ['id'=>$product->id]) }}"
                                                                        @endif
                                                                @endforeach
                                                                href="{{ route('wishlist_product', ['slug'=>$product->slug]) }}">
                                                            <i class="far fa-heart" style=" 
                                                            @foreach ($wishlist as $value_wishlist)
                                                                @if($value_wishlist->id_product == $product->id)
                                                                    color: red;
                                                                @endif
                                                            @endforeach
                                                                "></i></a></li>
                                                        </ul>
                                                        <a class="cart"  href="{{ route('productdetail', ['slug'=>$product->slug]) }}">Chi Tiết</a>
                                                    </div>
                                                </div>
                                                <div class="why-text">
                                                   <h4>{{ $product->name_product }}</h4>
                                                    @if( $product->price_sell == $product->price_discount )
                                                        <h5 style="text-align:right;"> {{ number_format($product->price_discount) }} ₫</h5>
                                                    @else
                                                        <h5><strike>{{ number_format($product->price_sell) }} ₫</strike></h5>
                                                        <h5 style="text-align:right;">{{ number_format($product->price_discount) }} ₫</h5>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    <!-- endforeach san pham -->
                                    </div> 
                                    <div class="row">
                                        <div class="col-4"></div>
                                        <div class="col-4"> {{ $data_product->links() }} </div> <div class="col-4"></div> 
                                    </div>                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-sm-12 col-xs-12 sidebar-shop-left">
                    <div class="product-categori">
                        <div class="filter-sidebar-left">
                            <div class="title-left">
                                <h3>Danh Mục</h3>
                            </div>
                            <div class="list-group list-group-collapse list-group-sm list-group-tree" id="list-group-men" data-children=".sub-men">
                                <div class="list-group-collapse sub-men">
                                    <a class="list-group-item list-group-item-action" href="#sub-men1" data-toggle="collapse" aria-expanded="true" aria-controls="sub-men1">Loại Bánh <small class="text-muted">( {{ $count }} )</small>
                                </a>
                                    <div class="collapse show" id="sub-men1" data-parent="#list-group-men">
                                        @foreach( $data_category as $category )
                                        <div class="list-group">
                                            <a href="{{ route('shopdetail',['slug' => $category->slug ]) }}" class="list-group-item list-group-item-action">{{ $category->name_category }} <small class="text-muted">  </small></a>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="filter-price-left">
                            <div class="title-left">
                                <h3>Price</h3>
                            </div>
                            <div class="price-box-slider">
                                <form>
                                    <div class="row">
                                        <div class="col-2">
                                            <label>Từ:</label>
                                        </div>
                                        <div class="col-10">
                                            <input class="form-control" type="text" id="start_price" name="start_price" value="">
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-2">
                                            <label>Đến:</label>
                                        </div>
                                        <div class="col-10">
                                            <input class="form-control" type="text" id="end_price" name="end_price" value="" >
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col ">
                                            <button type="submit" id="submit_price" name="submit_price" class="btn btn-primary float-right">Lọc</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Shop Page -->
@endsection

