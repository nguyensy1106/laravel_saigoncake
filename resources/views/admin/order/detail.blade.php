@EXTENDS('admin.layouts.master')
@section('content')
	 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>
            Quản Lý Đơn Hàng
            </h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->        
    <section class="content">
      <div class="container-fluid">
        @if (Session::has('flash_message'))
          <div class="alert alert-success">{{ Session::get('flash_message') }}</div>
        @endif
        @if (Session::has('flash_message_error'))
          <div class="alert alert-danger">{{ Session::get('flash_message_error') }}</div>
        @endif
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              
              <!-- /.card-header -->
              <div class="card-body">
                <div class="table">
                    <div class="row">
                        <div class="col-sm-12">
                             <div class="row">
                                <h3 class="card-title">Chi Tiết Đơn Hàng: 
                                	#{{ $order->code_order}} /
                                	{{ $order->created_at}}
                                </h3>
                             </div>
                             <div class="row mt-3">
                                  <table width="100%">
                                  <thead>
                                  	@foreach($orderdetail as $value)
	                                    <tr>
	                                      <td>
	                                      	<img src="{{ asset($value->product->url_image)}}" width="80px" height="80px">
	                                      </td>
	                                      <td>{{ $value->product->name_product}}</td>
	                                      <td style="text-align: right;">
	                                      	{{ number_format($value->price)}}₫ &nbsp; x &nbsp; {{ $value->quantity}} 
	                                      </td>
	                                      <td style="text-align: right;">
	                                      	{{ number_format($value->price*$value->quantity)}}₫
	                                      </td>
	                                    </tr>
	                                @endforeach
                                  </thead>
                                </table>
                             </div> 
                        </div>                      
                    </div>
                   
                    <div class="row mt-3">
                        <div class="col-sm-5">
                          <label for="">Ghi chú</label>
                           <textarea style="height: 82px; width:350px" class="form-control">
                           	 {{ $order->note}}
                           </textarea>
                        </div>
                        <div class="col-sm-7">
                           <table class="table table-borderless">
                            <tbody>
                              <tr style="text-align: right;">
                                <td>Tổng giá trị sản phẩm </td>
                                <td>{{ number_format($order->money_subtotal) }}₫</td>
                              </tr>
                               <tr style="text-align: right;">
                                <td>Mã khuyến mãi </td>
                                <td>-
                                  @if($order->id_coupon)
                                  	@if($order->coupon->coupon_condition == 1)
                                  		{{ number_format($order->money_subtotal*$order->coupon->coupon_money/100) }}
                                  	@else
                                  		{{ number_format($order->coupon->coupon_money) }}
                                  	@endif
                                  @else
                                      0
                                  @endif  
                                	₫
                                </td>
                              </tr>
                              <tr style="text-align: right;">
                                <td>Tiền Ship</td>
                                <td>+ {{ number_format($order->shipping->money) }}₫</td>
                              </tr>
                              <tr style="text-align: right;">
                                  <th>Số Tiền Phải Thanh Toán</th>
                                  <th>{{ number_format($order->money_pay) }}₫</th>
                              </tr>
                            </tbody>
                          </table>
                       </div>
                    </div> 

                    @if($order->status_shipping != 5)                    
                      <div class="row mt-3" style="border-top: 1px solid #ebeef0; padding-top:1em">
                            <div class="col-6">
                               <i class="fas fa-lg fa-check"
                                  <?php if($order->status_shipping <> 1){ echo 'style="color: #96bf48;"';} 
                                  ?> 
                                >
                               	
                               </i> 
                                <span>&nbsp XÁC NHẬN ĐƠN HÀNG</span>
                            </div>
                            <div class="col-6" style="text-align: right;">
                              @if($order->status_shipping == 1)
                                <a href="{{ route('xacnhan',['id'=>$order->id])}}"><button name="xacthuc" class="btn btn-primary">Xác thực</button></a>
                              @endif
                            </div>
                      </div>
                      <div class="row mt-3" style="border-top: 1px solid #ebeef0;  padding-top:1em">
                            <div class="col-6">
                               <i  
                               <?php if($order->status_payment == 2){ ?>
                                  class="fas fa-lg fa-check"  
                                style="color: #96bf48;"
                                <?php }else{ ?>
                                  class="far fa-lg fa-credit-card"
                                <?php } ?>
                               >  
                               </i>
                              @if($order->status_payment == 1)
                                <span>&nbsp THANH TOÁN {{ number_format($order->money_pay)}}₫ CHƯA CHẤP NHẬN</span>
                              @else
                                <span>&nbsp THANH TOÁN {{ number_format($order->money_pay)}}₫ ĐÃ CHẤP NHẬN</span>
                              @endif
                            </div>
                            <div class="col-6" style="text-align: right;">
                                <div >
                                  @if($order->status_payment == 1)
                                    <a href="{{ route('xacnhanthanhtoan',['id'=>$order->id])}}"><button name="xacnhanthanhtoan" class="btn btn-primary">Xác Nhận Thanh Toán</button></a>
                                  @endif
                                 </div>
                            </div>     
                      </div>
                      <div class="row mt-3" style="border-top: 1px solid #ebeef0;  padding-top:1em">
                            <div class="col-6">
                               <i  <?php  if($order->status_shipping>=3){ ?> class="fas fa-lg fa-check"  
                                style="color: #96bf48;" <?php }else{ ?> class="fas fa-lg fa-truck"  <?php }?> >
                                </i>
                                <span>&nbsp GIAO HÀNG</span>
                            </div>
                            <div class="col-6" style="text-align: right;">
                              @if($order->status_shipping < 3)
                                <a href="{{ route('giaohang',['id'=>$order->id])}}" ><button name="giaohang" class="btn btn-primary ">Giao Hàng</button></a>
                              @endif
                            </div>
                      </div>
                      <div class="row mt-3" style="border-top: 1px solid #ebeef0;  padding-top:1em">
                            <div class="col-6">
                              <i  <?php  if($order->status_shipping>=4){ ?> class="fas fa-lg fa-check"  
                                style="color: #96bf48;" <?php }else{ ?> class="fas fa-lg fa-calendar-check"  <?php }?> >
                              </i>
                                <span>&nbsp Đã Giao</span>
                            </div>
                            <div class="col-6" style="text-align: right;">
                              @if($order->status_shipping < 4)
                                <a href="{{ route('dagiao',['id'=>$order->id])}}"><button name="dagiao" class="btn btn-primary ">Đã Giao</button></a>
                              @endif 
                            </div>
                      </div>
                      <div class="row mt-3" style="border-top: 1px solid #ebeef0;  padding-top:1em">
                            <div class="col-6">
                               <i class="fas fa-lg fa-times"></i>
                                <span>&nbsp HỦY ĐƠN HÀNG</span>
                            </div>
                            <div class="col-6" style="text-align: right;">
                                <a href="{{ route('huydon',['id'=>$order->id])}}"><button name="huydon" class="btn btn-danger">Hủy Đơn Hàng</button></a>
                            </div>
                      </div>
                     @else
                      <div class="row" style="text-align: center;  padding-top:1em">
                              <div class="col-12">
                                  <div class="card card-body bg-danger">
                                      <p class="card-text">Đơn hàng này đã hủy</p>
                                  </div>
                              </div>
                      </div>
                      @endif

                     

                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-4">
            <div class="card">
                <ul class="list-group list-group-flush rounded ">
                    
                  <li class="list-group-item">
                      <label>Khách Hàng</label>
                      <img src="{{ asset($order->user->url_avatar)}}" class="rounded-circle" width="100px" height="100px" style="float: right;">
                      <div class="row mt-3">
                          <div class="col-12">
                            <a href="#">{{ $order->user->name}}</a>
                            <p>Số Điện Thoại: {{ $order->phone}}</p>
                          </div>
                      </div>
                  </li>
                  <li class="list-group-item">
                      <label>Thông Tin Giao Hàng</label>
                      <div class="row mt-3">
                          <div class="col-12">
                            <p>Ngày Giao Hàng: {{ $order->date_ship}} </p>
                            <p>Địa Chỉ Giao Hàng: {{ $order->address_ship}}</p>
                            <p></p>
                          </div>
                      </div>
                  </li>
                  <li class="list-group-item">
                       <label>Hình Thức Thanh Toán</label>
                        <p>
                          @if($order->payment == 1)
                            COD
                          @else
                            Ngân Lượng
                          @endif
                        </p>
                  </li>
                </ul>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection