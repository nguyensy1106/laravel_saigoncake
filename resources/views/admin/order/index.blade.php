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
              Danh Sách Đơn Hàng
            </h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 col-sm-12">
            <div class="card card-primary card-outline card-outline-tabs">
              <div class="card-header p-0 border-bottom-0">
                	<ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                  <li class="nav-item" style="width: 200px; text-align: center;">
                    <a class="nav-link active" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Đơn Hàng Mới 
                      @if( count($order_new) > 0)
                        <span class="badge badge-pill badge-danger"> 
                          {{ count($order_new) }}
                        </span>
                      @endif
                   </a>
                  </li>
                  <li class="nav-item" style="width: 200px; text-align: center;">
                    <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill" href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">Đã Xác Nhận</a>
                  </li>
                  <li class="nav-item" style="width: 200px; text-align: center;">
                    <a class="nav-link" id="custom-tabs-four-settings-tab" data-toggle="pill" href="#custom-tabs-four-settings" role="tab" aria-controls="custom-tabs-four-settings" aria-selected="false">Đang Giao</a>
                  </li>
                  <li class="nav-item" style="width: 200px; text-align: center;">
                    <a class="nav-link" id="custom-tabs-four-giao-tab" data-toggle="pill" href="#custom-tabs-four-giao" role="tab" aria-controls="custom-tabs-four-giao" aria-selected="false">Đã Giao</a>
                  </li>
                  <li class="nav-item" style="width: 200px; text-align: center;">
                    <a class="nav-link " id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Tất Cả Đơn Hàng</a>
                  </li>
                	</ul>
              </div>
              <div class="card-body">
                	<div class="tab-content" id="custom-tabs-four-tabContent">
                  	<div class="tab-pane fade show active" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                      
                      <div class="card-body p-0">
                        @if( count($order_new) > 0)
                          <table class="table table-striped projects" style="text-align: center;">
                              <thead>
                                  <tr>
                                      <th>
                                          Mã Đơn Hàng
                                      </th>
                                      <th >
                                         Ngày Đặt
                                      </th>
                                      <th >
                                          Khách Hàng
                                      </th>
                                      <th>
                                          Tổng Tiền
                                      </th>
                                      <th>
                                          Trạng Thái Đơn Hàng
                                      </th>
                                      <th >
                                          Thanh Toán
                                      </th>
                                      <th >
                                        Trạng Thái Thanh Toán
                                      </th>
                                  </tr>
                              </thead>
                              <tbody>
                              	@foreach($order_new as $new)
                                  <tr>
                                      <td>
                                          <a href="{{ route('orderdetail',['id'=>$new->id])}}">
                                             #{{ $new->code_order}}
                                          </a>
                                      </td>
                                      <td>
                                         	{{ $new->created_at}}
                                      </td>
                                      <td>
                                         	{{ $new->user->name }}
                                      </td>
                                      <td>
                                       	{{ number_format($new->money_pay) }}₫
                                      </td> 
                                      <td >
                                          @if($new->status_shipping == 1) 
                                              <span class="badge badge-danger">Đơn Hàng Mới</span>
                                          @elseif($new->status_shipping == 2)
                                              <span class="badge badge-success">Đã Xác Nhận</span>
                                          @elseif($new->status_shipping == 3)
                                                <span class="badge badge-info">Đang Giao</span>
                                          @elseif($new->status_shipping == 4)
                                              <span class="badge badge-primary">Đã Giao</span>
                                          @else
                                          <span class="badge badge-warning">Đã Hủy</span>
                                          @endif
                                      </td>
                                      <td >
                                        @if($new->payment == 1)
                                           Tiền Mặt 
                                        @else
                                            Ngân Lượng
                                        @endif                                        
                                      </td>
                                      <td class="project-state">
                                          @if($new->status_payment == 1)
                                              <span class="badge badge-danger">Chờ Thanh Toán</span>
                                          @else
                                               <span class="badge badge-success">Đã Thanh Toán</span>
                                          @endif
                                      </td>                                     
                                  </tr>
                                @endforeach
                              </tbody>
                          </table>
                          @else
                            <div class=" text-center">
                                <i class="far fa-file-alt" style="font-size :100px"></i> 
                                <h2 class="note-title-empty mt-4">Không tìm thấy bất kỳ đơn hàng nào</h2>
                            </div>
                          @endif
                              
                      </div>
                  	</div>

                  	<div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">
                      <div class="card-body p-0">
                        @if( count($order_xuly) > 0 )
                          <table class="table table-striped projects" style="text-align: center;">
                              <thead>
                                  <tr>
                                      <th>
                                          Mã Đơn Hàng
                                      </th>
                                      <th >
                                         Ngày Đặt
                                      </th>
                                      <th >
                                          Khách Hàng
                                      </th>
                                      <th>
                                          Tổng Tiền
                                      </th>
                                      <th>
                                          Trạng Thái Đơn Hàng
                                      </th>
                                      <th >
                                          Thanh Toán
                                      </th>
                                      <th >
                                        Xác Nhận Thanh Toán
                                      </th>
                                  </tr>
                              </thead>
                              <tbody>
                                  @foreach($order_xuly as $xuly)
                                  <tr>
                                      <td>
                                          <a href="{{ route('orderdetail',['id'=>$xuly->id])}}">
                                             #{{ $xuly->code_order}}</a>
                                      </td>
                                      <td>
                                          {{ $xuly->created_at}}
                                      </td>
                                      <td>
                                          {{ $xuly->user->name }}
                                      </td>
                                      <td>
                                        {{ number_format($xuly->money_pay) }}₫
                                      </td> 
                                      <td >
                                          @if($xuly->status_shipping == 1) 
                                              <span class="badge badge-danger">Đơn Hàng Mới</span>
                                          @elseif($xuly->status_shipping == 2)
                                              <span class="badge badge-success">Đã Xác Nhận</span>
                                          @elseif($xuly->status_shipping == 3)
                                                <span class="badge badge-info">Đang Giao</span>
                                          @elseif($xuly->status_shipping == 4)
                                              <span class="badge badge-primary">Đã Giao</span>
                                          @else
                                          <span class="badge badge-warning">Đã Hủy</span>
                                          @endif
                                      </td>
                                      <td >
                                        @if($xuly->payment == 1)
                                           Tiền Mặt 
                                        @else
                                            Ngân Lượng
                                        @endif                                        
                                      </td>
                                      <td class="project-state">
                                          @if($xuly->status_payment == 1)
                                              <span class="badge badge-danger">Chờ Thanh Toán</span>
                                          @else
                                               <span class="badge badge-success">Đã Thanh Toán</span>
                                          @endif
                                      </td>                                     
                                  </tr>
                                @endforeach
                              </tbody>
                          </table>
                          @else
                              <div class=" text-center">
                                  <i class="far fa-file-alt" style="font-size :100px"></i> 
                                  <h2 class="note-title-empty mt-4">Không tìm thấy bất kỳ đơn hàng nào</h2>
                              </div>
                          @endif                               
                      </div>
                  	</div>

                  	<div class="tab-pane fade" id="custom-tabs-four-settings" role="tabpanel" aria-labelledby="custom-tabs-four-settings-tab">
                     <div class="card-body p-0">
                         @if( count($order_danggiao) > 0 )
                          <table class="table table-striped projects" style="text-align: center;">
                              <thead>
                                  <tr>
                                      <th>
                                          Mã Đơn Hàng
                                      </th>
                                      <th >
                                         Ngày Đặt
                                      </th>
                                      <th >
                                          Khách Hàng
                                      </th>
                                      <th> 
                                          Tổng Tiền
                                      </th>
                                      <th>
                                          Trạng Thái Đơn Hàng
                                      </th>
                                      <th >
                                          Thanh Toán
                                      </th>
                                      <th >
                                        Xác Nhận Thanh Toán
                                      </th>
                                  </tr>
                              </thead>
                              <tbody>
                               
                                 @foreach($order_danggiao as $danggiao)
                                  <tr>
                                      <td>
                                          <a href="{{ route('orderdetail',['id'=>$danggiao->id])}}">
                                             #{{ $danggiao->code_order}}
                                          </a>
                                      </td>
                                      <td>
                                          {{ $danggiao->created_at}}
                                      </td>
                                      <td>
                                          {{ $danggiao->user->name }}
                                      </td>
                                      <td>
                                        {{ number_format($danggiao->money_pay) }}₫
                                      </td> 
                                      <td >
                                          @if($danggiao->status_shipping == 1) 
                                              <span class="badge badge-danger">Đơn Hàng Mới</span>
                                          @elseif($danggiao->status_shipping == 2)
                                              <span class="badge badge-success">Đã Xác Nhận</span>
                                          @elseif($danggiao->status_shipping == 3)
                                                <span class="badge badge-info">Đang Giao</span>
                                          @elseif($danggiao->status_shipping == 4)
                                              <span class="badge badge-primary">Đã Giao</span>
                                          @else
                                          <span class="badge badge-warning">Đã Hủy</span>
                                          @endif
                                      </td>
                                      <td >
                                        @if($danggiao->payment == 1)
                                           Tiền Mặt 
                                        @else
                                            Ngân Lượng
                                        @endif                                        
                                      </td>
                                      <td class="project-state">
                                          @if($danggiao->status_payment == 1)
                                              <span class="badge badge-danger">Chờ Thanh Toán</span>
                                          @else
                                               <span class="badge badge-success">Đã Thanh Toán</span>
                                          @endif
                                      </td>                                     
                                  </tr>
                                @endforeach
                                
                              </tbody>
                          </table>
                        @else     
                           <div class=" text-center">
                              <i class="far fa-file-alt" style="font-size :100px"></i> 
                              <h2 class="note-title-empty mt-4">Không tìm thấy bất kỳ đơn hàng nào</h2>
                            </div>
                        @endif   
                      </div>
                  	</div>

                 	<div class="tab-pane fade" id="custom-tabs-four-giao" role="tabpanel" aria-labelledby="custom-tabs-four-giao-tab">
                     <div class="card-body p-0"> 
                       @if( count($order_dagiao) > 0 )
                          <table class="table table-striped projects" style="text-align: center;">
                              <thead>
                                  <tr>
                                      <th>
                                          Mã Đơn Hàng
                                      </th>
                                      <th >
                                         Ngày Đặt
                                      </th>
                                      <th >
                                          Khách Hàng
                                      </th>
                                      <th> 
                                          Tổng Tiền
                                      </th>   
                                      <th>
                                          Trạng Thái Đơn Hàng
                                      </th>
                                      <th >
                                          Thanh Toán
                                      </th>
                                      <th >
                                        Xác Nhận Thanh Toán
                                      </th>
                                  </tr>
                              </thead>
                              <tbody>
                               
                                  @foreach($order_dagiao as $dagiao)
                                  <tr>
                                      <td>
                                          <a href="{{ route('orderdetail',['id'=>$dagiao->id])}}">
                                             #{{ $dagiao->code_order}}
                                          </a>
                                      </td>
                                      <td>
                                          {{ $dagiao->created_at}}
                                      </td>
                                      <td>
                                          {{ $dagiao->user->name }}
                                      </td>
                                      <td>
                                        {{ number_format($dagiao->money_pay) }}₫
                                      </td> 
                                      <td >
                                          @if($dagiao->status_shipping == 1) 
                                              <span class="badge badge-danger">Đơn Hàng Mới</span>
                                          @elseif($dagiao->status_shipping == 2)
                                              <span class="badge badge-success">Đã Xác Nhận</span>
                                          @elseif($dagiao->status_shipping == 3)
                                                <span class="badge badge-info">Đang Giao</span>
                                          @elseif($dagiao->status_shipping == 4)
                                              <span class="badge badge-primary">Đã Giao</span>
                                          @else
                                          <span class="badge badge-warning">Đã Hủy</span>
                                          @endif
                                      </td>
                                      <td >
                                        @if($dagiao->payment == 1)
                                           Tiền Mặt 
                                        @else
                                            Ngân Lượng
                                        @endif                                        
                                      </td>
                                      <td class="project-state">
                                          @if($dagiao->status_payment == 1)
                                              <span class="badge badge-danger">Chờ Thanh Toán</span>
                                          @else
                                               <span class="badge badge-success">Đã Thanh Toán</span>
                                          @endif
                                      </td>                                     
                                  </tr>
                                @endforeach
                               
                              </tbody>
                           </table>
                           @else       
                              <div class=" text-center">
                                 <i class="far fa-file-alt" style="font-size :100px"></i> 
                                 <h2 class="note-title-empty mt-4">Không tìm thấy bất kỳ đơn hàng nào</h2>
                              </div>
                           @endif
                      </div>
                  	</div>

                  	<div class="tab-pane fade " id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                    	<div class="card-body p-0">
                         
                          <table class="table table-striped projects" style="text-align: center;">
                              <thead>
                                  <tr>
                                      <th>
                                          Mã Đơn Hàng
                                      </th>
                                      <th >
                                         Ngày Đặt
                                      </th>
                                      <th >
                                          Khách Hàng
                                      </th>
                                      <th>
                                          Tổng Tiền
                                      </th>
                                      <th>
                                          Trạng Thái Đơn Hàng
                                      </th>
                                      <th >
                                          Thanh Toán
                                      </th>
                                      <th >
                                        Xác Nhận Thanh Toán
                                      </th>
                                  </tr>
                              </thead>
                              <tbody>
                                 @foreach($order_all as $all)
                                  <tr>
                                      <td>
                                          <a href="{{ route('orderdetail',['id'=>$all->id])}}">
                                             #{{ $all->code_order}}
                                          </a>
                                      </td>
                                      <td>
                                          {{ $all->created_at}}
                                      </td>
                                      <td>
                                          {{ $all->user->name }}
                                      </td>
                                      <td>
                                        {{ number_format($all->money_pay) }}₫
                                      </td> 
                                      <td >
                                          @if($all->status_shipping == 1) 
                                              <span class="badge badge-danger">Đơn Hàng Mới</span>
                                          @elseif($all->status_shipping == 2)
                                              <span class="badge badge-success">Đã Xác Nhận</span>
                                          @elseif($all->status_shipping == 3)
                                                <span class="badge badge-info">Đang Giao</span>
                                          @elseif($all->status_shipping == 4)
                                              <span class="badge badge-primary">Đã Giao</span>
                                          @else
                                          <span class="badge badge-warning">Đã Hủy</span>
                                          @endif
                                      </td>
                                      <td >
                                        @if($all->payment == 1)
                                           Tiền Mặt 
                                        @else
                                            Ngân Lượng
                                        @endif                                        
                                      </td>
                                      <td class="project-state">
                                          @if($all->status_payment == 1)
                                              <span class="badge badge-danger">Chờ Thanh Toán</span>
                                          @else
                                               <span class="badge badge-success">Đã Thanh Toán</span>
                                          @endif
                                      </td>                                     
                                  </tr>
                                @endforeach
                              </tbody>
                          </table>
                    	</div>
                  	</div>
                	</div>
              </div>
              <!-- /.card -->
            </div>
          </div>
        </div>
        <!-- /.card -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection