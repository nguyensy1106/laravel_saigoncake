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
                      <a class="nav-link active" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Ngân Lượng</a>
                    </li>
                    <li class="nav-item" style="width: 200px; text-align: center;">
                      <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill" href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">Tiền Mặt</a>
                    </li>
                	</ul>
              </div>
              <div class="card-body">
                	<div class="tab-content" id="custom-tabs-four-tabContent">

                  	<div class="tab-pane fade show active" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">                      
                      <div class="card-body p-0">
                         @if( count($data_nganluong) > 0)
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
                                @foreach($data_nganluong as $nganluong)
                                  <tr>
                                      <td>
                                          <a href="{{ route('orderdetail',['id'=>$nganluong->id])}}">
                                             #{{ $nganluong->code_order}}
                                          </a>
                                      </td>
                                      <td>
                                          {{ $nganluong->created_at}}
                                      </td>
                                      <td>
                                          {{ $nganluong->user->name }}
                                      </td>
                                      <td>
                                        {{ number_format($nganluong->money_pay) }}₫
                                      </td> 
                                      <td >
                                          @if($nganluong->status_shipping == 1) 
                                              <span class="badge badge-danger">Đơn Hàng Mới</span>
                                          @elseif($nganluong->status_shipping == 2)
                                              <span class="badge badge-success">Đã Xác Nhận</span>
                                          @elseif($nganluong->status_shipping == 3)
                                                <span class="badge badge-info">Đang Giao</span>
                                          @elseif($nganluong->status_shipping == 4)
                                              <span class="badge badge-primary">Đã Giao</span>
                                          @else
                                          <span class="badge badge-warning">Đã Hủy</span>
                                          @endif
                                      </td>
                                      <td >
                                        @if($nganluong->payment == 1)
                                           Tiền Mặt 
                                        @else
                                            Ngân Lượng
                                        @endif                                        
                                      </td>
                                      <td class="project-state">
                                          @if($nganluong->status_payment == 1)
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
                        @if( count($data_tienmat) > 0)
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
                                @foreach($data_tienmat as $tienmat)
                                  <tr>
                                      <td>
                                          <a href="{{ route('orderdetail',['id'=>$tienmat->id])}}">
                                             #{{ $tienmat->code_order}}
                                          </a>
                                      </td>
                                      <td>
                                          {{ $tienmat->created_at}}
                                      </td>
                                      <td>
                                          {{ $tienmat->user->name }}
                                      </td>
                                      <td>
                                        {{ number_format($tienmat->money_pay) }}₫
                                      </td> 
                                      <td >
                                          @if($tienmat->status_shipping == 1) 
                                              <span class="badge badge-danger">Đơn Hàng Mới</span>
                                          @elseif($tienmat->status_shipping == 2)
                                              <span class="badge badge-success">Đã Xác Nhận</span>
                                          @elseif($tienmat->status_shipping == 3)
                                                <span class="badge badge-info">Đang Giao</span>
                                          @elseif($tienmat->status_shipping == 4)
                                              <span class="badge badge-primary">Đã Giao</span>
                                          @else
                                          <span class="badge badge-warning">Đã Hủy</span>
                                          @endif
                                      </td>
                                      <td >
                                        @if($tienmat->payment == 1)
                                           Tiền Mặt 
                                        @else
                                            Ngân Lượng
                                        @endif                                        
                                      </td>
                                      <td class="project-state">
                                          @if($tienmat->status_payment == 1)
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