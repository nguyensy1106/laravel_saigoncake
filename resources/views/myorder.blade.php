@EXTENDS('layouts.master')
@section('content')
<style type="text/css">
    .nav-pills .nav-link.active, .nav-pills .show>.nav-link {
    color: #fff;
    background-color: #007bff;
    font-size: 25px;
}
.nav-link1{
    display: block;
    padding: .5rem 4rem;
}
.tab-pane{
  font-size: 20px;
}
.nav-link{
  font-style: inherit;
  font-size: 18px;

</style>
 <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Lịch Sử Đơn Hàng</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

<div class="my-account-box-main">
    <div class="container">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link1 nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="order" aria-selected="true">Chờ Xác Nhận</a>
          </li>
          <li class="nav-item">
            <a class="nav-link1 nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Đang Xử Lý</a>
          </li>
          <li class="nav-item">
            <a class="nav-link1 nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Đang Giao</a>
          </li>
          <li class="nav-item">
            <a class="nav-link1 nav-link" id="pills-b-tab" data-toggle="pill" href="#pills-b" role="tab" aria-controls="pills-b" aria-selected="false">Đã Giao</a>
          </li>
           <li class="nav-item">
            <a class="nav-link1 nav-link" id="cancel-order-tab" data-toggle="pill" href="#cancel-order" role="tab" aria-controls="cancel-order" aria-selected="false">Đã Hủy</a>
          </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
              
              <div class="card-body p-0">
                 @if( count($data_xacnhan) > 0)
                <table class="table">
                  <thead>
                    <tr>
                      <th>Mã Đơn Hàng</th>
                      <th>Ngày Tạo</th>
                      <th>Tổng Thanh Toán</th>
                      <th>Thanh Toán</th>
                      <th>Tình Trạng</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($data_xacnhan as $xacnhan)
                    <tr>
                      <td>
                        <a style="color: blue" href="{{ route('detail_order',['code'=>$xacnhan->code_order])}}">
                          #{{ $xacnhan->code_order }}
                        </a>
                      </td>
                      <td>
                        {{ date_format(date_create($xacnhan->created_at),'Y-m-d') }}
                      </td>
                       <td>
                           {{ number_format($xacnhan->money_pay) }}₫
                       </td>
                       <td> 
                        @if($xacnhan->payment == 1)
                            Tiền mặt
                        @else
                            Ngân Lượng
                        @endif
                      </td>
                      <td>
                        @if($xacnhan->status_payment == 1)
                            Chưa Thanh Toán
                        @else
                            Đã Thanh Toán
                        @endif
                      </td>
                       <td>
                          @if($xacnhan->status_payment == 1 && $xacnhan->payment == 2)
                          <a href="{{ route('payment_order',['code'=>$xacnhan->code_order])}}"><button class="btn btn-primary" name="huydon">Thanh Toán Ngay</button></a>
                          @endif
                          <a href="{{ route('remove_order',['code'=>$xacnhan->code_order])}}"  onclick="return confirm('Bạn có muốn hủy đơn hàng này không?')"><button class="btn btn-danger" name="huydon">Hủy Đơn</button></a>
                       </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                @else
                 <h1 style="text-align: center;">Chưa Có Đơn Hàng</h1>
                @endif
              </div>

          </div>
          <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            
            <div class="card-body p-0">
              @if( count($data_danglam) > 0)
                <table class="table">
                  <thead>
                    <tr>
                     <th>Mã Đơn Hàng</th>
                      <th>Ngày Tạo</th>
                      <th>Tổng Thanh Toán</th>
                      <th>Thanh Toán</th>
                      <th>Tình Trạng</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($data_danglam as $danglam)
                    <tr>
                      <td>
                        <a style="color: blue" href="{{ route('detail_order',['code'=>$danglam->code_order])}}">
                          #{{ $danglam->code_order }}
                        </a>
                      </td>
                      <td>
                        {{ date_format(date_create($danglam->created_at),'Y-m-d') }}
                      </td>
                       <td>
                           {{ number_format($danglam->money_pay) }}₫
                       </td>
                       <td> 
                        @if($danglam->payment == 1)
                            Tiền mặt
                        @else
                            Ngân Lượng
                        @endif
                      </td>
                      <td>
                        @if($danglam->status_payment == 1)
                            Chưa Thanh Toán
                        @else
                            Đã Thanh Toán
                        @endif
                      </td>
                    </tr>
                    @endforeach                    
                  </tbody>
                </table>
                @else
                 <h1 style="text-align: center;">Chưa Có Đơn Hàng</h1>
                @endif
              </div>


          </div>
          <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
             <div class="card-body p-0">
                 @if( count($data_danggiao) > 0)
                  <table class="table">
                  <thead>
                    <tr>
                     <th>Mã Đơn Hàng</th>
                      <th>Ngày Tạo</th>
                      <th>Tổng Thanh Toán</th>
                      <th>Thanh Toán</th>
                      <th>Tình Trạng</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($data_danggiao as $danggiao)
                    <tr>
                      <td>
                        <a style="color: blue" href="{{ route('detail_order',['code'=>$danggiao->code_order])}}">
                          #{{ $danggiao->code_order }}
                        </a>
                      </td>
                      <td>
                        {{ date_format(date_create($danggiao->created_at),'Y-m-d') }}
                      </td>
                       <td>
                           {{ number_format($danggiao->money_pay) }}₫
                       </td>
                       <td> 
                        @if($danggiao->payment == 1)
                            Tiền mặt
                        @else
                            Ngân Lượng
                        @endif
                      </td>
                      <td>
                        @if($danggiao->status_payment == 1)
                            Chưa Thanh Toán
                        @else
                            Đã Thanh Toán
                        @endif
                      </td>
                    </tr>
                    @endforeach                    
                  </tbody>
                </table>
                @else
                 <h1 style="text-align: center;">Chưa Có Đơn Hàng</h1>
                @endif
              </div>

          </div>
          <div class="tab-pane fade" id="pills-b" role="tabpanel" aria-labelledby="pills-b-tab">
           
            <div class="card-body p-0">
               @if( count($data_dagiao) > 0)
                <table class="table">
                  <thead>
                    <tr>
                     <th>Mã Đơn Hàng</th>
                      <th>Ngày Tạo</th>
                      <th>Tổng Thanh Toán</th>
                      <th>Thanh Toán</th>
                      <th>Tình Trạng</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($data_dagiao as $dagiao)
                    <tr>
                      <td>
                        <a style="color: blue" href="{{ route('detail_order',['code'=>$dagiao->code_order])}}">
                          #{{ $dagiao->code_order }}
                        </a>
                      </td>
                      <td>
                        {{ date_format(date_create($dagiao->created_at),'Y-m-d') }}
                      </td>
                       <td>
                           {{ number_format($dagiao->money_pay) }}₫
                       </td>
                       <td> 
                        @if($dagiao->payment == 1)
                            Tiền mặt
                        @else
                            Ngân Lượng
                        @endif
                      </td>
                      <td>
                        @if($dagiao->status_payment == 1)
                            Chưa Thanh Toán
                        @else
                            Đã Thanh Toán
                        @endif
                      </td>
                    </tr>
                    @endforeach                    
                  </tbody>
                </table>
                @else
                 <h1 style="text-align: center;">Chưa Có Đơn Hàng</h1>
                @endif
              </div>

          </div>
          <div class="tab-pane fade" id="cancel-order" role="tabpanel" aria-labelledby="cancel-order-tab">

             <div class="card-body p-0">
              @if( count($data_dahuy) > 0)
                <table class="table">
                  <thead>
                    <tr>
                     <th>Mã Đơn Hàng</th>
                      <th>Ngày Tạo</th>
                      <th>Tổng Thanh Toán</th>
                      <th>Thanh Toán</th>
                      <th>Tình Trạng</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($data_dahuy as $dahuy)
                    <tr>
                      <td>
                        <a style="color: blue" href="{{ route('detail_order',['code'=>$dahuy->code_order])}}">
                          #{{ $dahuy->code_order }}
                        </a>
                      </td>
                      <td>
                        {{ date_format(date_create($dahuy->created_at),'Y-m-d') }}
                      </td>
                       <td>
                           {{ number_format($dahuy->money_pay) }}₫
                       </td>
                       <td> 
                        @if($dahuy->payment == 1)
                            Tiền mặt
                        @else
                            Ngân Lượng
                        @endif
                      </td>
                      <td>
                        @if($dahuy->status_payment == 1)
                            Chưa Thanh Toán
                        @else
                            Đã Thanh Toán
                        @endif
                      </td>
                    </tr>
                    @endforeach                    
                  </tbody>
                </table>
                @else
                 <h1 style="text-align: center;">Chưa Có Đơn Hàng</h1>
                @endif
              </div>
            

          </div>
        </div>
    </div>
</div>
@endsection