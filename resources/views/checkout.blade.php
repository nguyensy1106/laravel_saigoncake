@EXTENDS('layouts.master')
@section('content') 
    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Checkout</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active">Checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->
    <!-- Start Cart  -->
    <div class="cart-box-main">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-6 mb-3">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="odr-box">
                                <div class="title-left">
                                    <h3>Giỏ Hàng Của Bạn</h3>
                                </div>
                                    <?php $total = 0;?>
                                    @foreach( (array) session('cart') as $id=>$detail)
                                        <?php $total+=$detail['price']*$detail['quantity'] ?>   
                                    @endforeach
                                    <!-- end_togntien -->
                                @foreach(session('cart') as $id => $detail)
                                 <!-- echo session -->
                                <div class="rounded p-2 ">
                                    <div class="media mb-2 border-bottom">
                                        <div class="media-body"> 
                                            <a href="detail.html">{{ $detail['name'] }}</a>
                                            <div class="small text-muted">
                                            Price: {{ number_format($detail['price']) }}₫ <span class="mx-2">|</span> 
                                            Qty:   {{ $detail['quantity'] }}<span class="mx-2">|</span> 
                                            Subtotal: {{ number_format($detail['price']*$detail['quantity']) }}₫</div>
                                        </div>
                                    </div>                                 
                                </div>
                                @endforeach
                               <!-- end session -->
                            </div>
                        
                            <div class="odr-box mb-3">
                                 <div class="col-12">
                                    <div class="coupon-box">
                                        <div class="input-group input-group-sm">
                                            <input class="form-control" placeholder="Mã Giảm Giá" aria-label="Coupon code" name="coupon_code" type="text" id="coupon">
                                            <div class="input-group-append">
                                                <button class="btn btn-theme" id="submit_coupon" type="submit">Áp Dụng</button>
                                            </div>
                                        </div>
                                        <div class="mt-2" id="labelerror"></div>
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12">
        <form action="{{ route('postcheckout')}}" method="post">
             @csrf
                            <div class="order-box">
                                <div class="title-left">
                                    <h3>Đơn Đặt Hàng Của Bạn</h3>
                                </div>
                                <div class="d-flex">
                                    <div class="ml-auto font-weight-bold">Tổng</div>
                                </div>
                                <hr class="my-1">
                                <div class="d-flex">
                                    <h4>Tạm Tính</h4>
                                    <div class="ml-auto font-weight-bold"> 
                                        {{ number_format($total) }}
                                    </div>₫
                                </div>
                                <div class="d-flex">
                                    <h4>Phí Vận Chuyển</h4>
                                    <div class="ml-auto font-weight-bold" id="labelfee">
                                        0
                                    </div>₫
                                </div>
                                <div class="d-flex">
                                    <h4>Giảm Giá</h4>
                                    <div class="ml-auto font-weight-bold" id="labelcoupon">
                                        0
                                    </div>₫
                                </div>
                                <hr>
                                <div class="d-flex gr-total">
                                    <h5>Tổng Tiền Thanh Toán</h5>
                                    <div class="ml-auto h5" id="labeltotal">  {{ number_format($total) }}</div>₫
                                </div>
                                fee<input type="text" name="fee" id="inputFee" value="0">
                                coupon<input type="text" name="coupon" id="inputCoupon" value="0">
                                total<input type="text" name="total" id="inputTotal" value="0">
                                idFee<input type="text" name="idfee" id="idFee">
                                idcoupon<input type="text" name="idcoupon" id="idCoupon">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-6 mb-3">
                    <div class="checkout-address">
                        <div class="title-left">
                            <h3>Địa Chỉ Thanh Toán: </h3>
                        </div>
                            <div class="mb-3">
                                <label for="phone">Số Điện Thoại *</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="phone" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-row">
                                    <div class="col">
                                     <label >Địa Chỉ Cụ Thể *</label>
                                <input type="text" class="form-control" name="address_ship" required>
                                    </div>
                                    <div class="col">
                                       <label > Quận/Huyện *</label>
                                        <select class="custom-select mr-sm-2" name="district" id="district" required>
                                            <option value="">Chọn Quận/Huyện</option>
                                            @foreach($shipping as $data_shipping)
                                            <option value="{{ $data_shipping->id }}">
                                                {{ $data_shipping->district_name }}
                                            </option>
                                            @endforeach
                                      </select>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="address">Ngày Giao *</label>
                                 <?php
                                    $date_min=date_create(date("Y-m-d"));
                                    $songay=2;
                                    date_modify($date_min,"+$songay days");   
                                ?>
                             <input type="date" class="form-control" name="date_ship" min="<?php echo date_format($date_min,"Y-m-d"); ?>"  max="" placeholder="" required>

                            </div>
                             <div class="mb-3">
                                <label >Ghi Chú</label>
                                <textarea class="form-control" name="note"></textarea>
                            </div>
                            <hr class="mb-4">
                    </div>
                    <div class="odr-box">
                        <div class="checkout-address">
                            <div class="title-left">
                                <h3>Hình Thức Thanh Toán: </h3>
                            </div>
                            <div class="custom-control custom-radio broder-box ">
                                <input id="debit" name="payment" type="radio" class="custom-control-input" required value="1">
                                <label class="custom-control-label" for="debit">Thanh Toán Tiền Mặt Sau Khi Nhận Hàng</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input id="paypal" name="payment" type="radio" class="custom-control-input" required value="2" >
                                <label class="custom-control-label" for="paypal">Thanh Toán Ngân Lượng</label>
                                <!-- ///////////////// -->
                                
                            </div>    
                        </div> 
                    </div>
                    <div class="col-12 d-flex shopping-box mt-3">
                        <input type="submit" class="btn ml-auto hvr-hover" name="tieptucthanhtoan" value="Đặt Hàng">
                    </div>
                </div>
            </div>
          </form>
        </div>
    </div>
    <!-- End Cart -->
<script >
////AJAX/////
$(document).ready(function(){

         $("#district").change(function(){
            var districtID = $(this).val();
            var coupon = $('#inputCoupon').val();
           /* alert(query);*/
            if(districtID != '') //kiểm tra khác rỗng thì thực hiện đoạn lệnh bên dưới
            {
                var _token = $('input[name="_token"]').val(); // token để mã hóa dữ liệu
                //alert(_token);
                $.ajax({
                    url:"{{ route('transportation_fee') }}", 
                    method:"POST", // phương thức gửi dữ liệu.
                    dataType: 'json',
                    cache: false,
                    data:{
                        districtID: districtID,
                        coupon: coupon,
                         _token:_token
                    },
                    success:function(data){ //dữ liệu nhận về 
                        $('#labelfee').html("+" + data.fee); //nhận dữ liệu dạng html và gán vào cặp thẻ có id 
                        $('#labeltotal').html(data.total);
                        ////////////////////
                         $('#idFee').val(data.idfee);
                        $('#inputFee').val(data.fee);
                        $('#inputTotal').val(data.total);
                    }
                });
            }
        });

        /////////////////////////////
         $("#submit_coupon").click(function(){
            var coupon = $('#coupon').val();
            var districtID = $('#district').val();
            if(coupon != '') //kiểm tra khác rỗng thì thực hiện đoạn lệnh bên dưới
            {
                var _token = $('input[name="_token"]').val(); // token để mã hóa dữ liệu
                $.ajax({
                    url:"{{ route('postcoupon') }}", 
                    method:"POST", // phương thức gửi dữ liệu.
                    dataType: 'json',
                    cache: false,
                    data:{
                       districtID: districtID,
                        coupon:coupon,
                         _token:_token
                    },
                    success:function(data){ //dữ liệu nhận về 
                        /*$('#labelfee').html(data.fee); */
                        $('#labelcoupon').html("-" + data.coupon);
                        $('#labeltotal').html(data.total);
                        $('#labelerror').html(data.error);
                        ////////////////
                        $('#inputFee').val(data.fee);
                        $('#idCoupon').val(data.idcoupon);
                        $('#inputCoupon').val(data.coupon);
                        $('#inputTotal').val(data.total);
                    }
                });
            }
        });
});
</script>
@endsection

