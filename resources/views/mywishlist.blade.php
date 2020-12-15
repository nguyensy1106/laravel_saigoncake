@EXTENDS('layouts.master')
@section('content')
<script>
function removeproduct() {
  confirm("Bạn Có Muốn Xóa Sản Phẩm Khỏi Danh Sách Yêu Thích?");
}
</script>
    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Sản Phẩm Yêu Thích</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Wishlist  -->
    <div class="wishlist-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-main table-responsive">
                        @if (Session::has('flash_message'))
                          <div class="alert alert-success">{{ Session::get('flash_message') }}</div>
                        @endif
                        @if( count($data) > 0 )
                        <table class="table">
                            <thead>
                                <tr>
                                    <th >Hình Ảnh</th>
                                    <th >Tên</th>
                                    <th >Giá</th>
                                    <th colspan="2"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $wishlist)
                                <tr>
                                    <td class="thumbnail-img">
                                        <a href="#">
    									   <img class="img-fluid" src="{{ asset($wishlist->product->url_image)}}" alt="" />
    								    </a>
                                    </td>
                                    <td class="name-pr">
                                        <a href="#">
    								      {{ $wishlist->product->name_product }}
    								    </a>
                                    </td>
                                    <td class="price-pr">
                                       {{ number_format($wishlist->product->price_discount) }}₫
                                    </td>
                                <form action="{{ route('cart.add', ['slug'=>$wishlist->product->slug]) }}" method="post" accept-charset="utf-8">
                                    @csrf
                                     <td class="add-pr">
                                        <button type="submit" class="btn hvr-hover nut" style="color: white">Thêm Vào Giỏ Hàng</button>
                                    </td>  
                                </form>
                                    <td class="remove-pr">
                                        <a href="{{ route('remove_wishlist', ['id'=> $wishlist->id]) }}" >
                                                <button class="btn btn-danger" onclick="removeproduct()"><i class="fas fa-times"></i></button>
                                            </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                       @else
                        <h1>Không Có Sản Phẩm</h1>
                       @endif                      
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Wishlist -->
@endsection