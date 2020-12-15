
@EXTENDS('admin.layouts.master')
@section('content')
  
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Thống Kê </h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $totalNewOrder }}</h3>

                <p>Đơn Hàng Mới</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{ route('order.index') }}" class="small-box-footer">Chi Tiết<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $totalCustomer }}</h3>

                <p>Khách Hàng</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{ route('show_customer') }}" class="small-box-footer">Chi Tiết <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ number_format($totalTransaction) }}<sup style="font-size: 20px">đ</sup></h3>

                <p>Doanh Thu Trong Tháng</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">Chi Tiết <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ $totalProduct }}</h3>

                <p>Sản Phẩm</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="{{ route('product.index') }}" class="small-box-footer">Chi Tiết <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-8 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="row">
                <figure class="highcharts-figure1">
                  <div id="container2" data-list-day="{{ $listDay }}" data-money="{{ $arrtransactionMonth }}" data-order="{{ $arrtotalOrderInMonth }}">
                  </div> 
                </figure>
              </div>  
            </div>
            <!-- /.card -->

            <!-- TO DO List -->
             <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Đơn Hàng Mới Nhất</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>Mã Hóa Đơn</th>
                      <th>Khách Hàng</th>
                      <th>Tổng Tiền</th>
                      <th>Tình Trạng</th>
                      <th>Thanh Toán</th>
                      <th>Ngày Đặt</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach($order_new as $new)
                      <tr>
                        <td><a href="{{ route('orderdetail',['id'=>$new->id])}}">{{ $new->code_order }}</a></td>
                        <td>{{ $new->user->name }}</td>
                        <td>{{ number_format($new->money_pay) }}</td>
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
                        <td>{{ $new->created_at->format('Y-m-d') }}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <a href="{{ route('order.index') }}" class="btn btn-sm btn-secondary float-right">Tất Cả Đơn Hàng</a>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-4 connectedSortable">

            <!-- Map card -->
            <div class="card">
              <!-- /.card-header -->
              <div class="card-header">
                  <div class="col-md-12">
                    <div class="chart-responsive">
                      <figure class="highcharts-figure">
                          <div id="container" data-json='{{ $status_transaction }}'></div>
                      </figure>
                    </div>
                    <!-- ./chart-responsive -->
                  </div>
                  <!-- /.col -->
                  <!-- /.col -->
                <!-- /.row -->
              </div>
              <!-- /.card-body -->
              <!-- /.footer -->
            </div>
             <div class="card">
              <div class="card-header">
                <h3 class="card-title">Sản Phẩm Bán Chạy Nhất</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <ul class="products-list product-list-in-card pl-2 pr-2">
                  @foreach($topSelling as $productTop)
                    @foreach($data_product as $product) 
                      @if($product->id == $productTop['idproduct'])
                        <li class="item">
                          <div class="product-img">
                            <img src="{{ asset($product->url_image) }}" alt="Product Image" class="img-size-50">
                          </div>
                          <div class="product-info">
                            <a href="javascript:void(0)" class="product-title">{{ $product->name_product }}</a>
                            <span class="product-description">
                              Đã bán {{ $productTop['totalquantity'] }} sản phẩm
                            </span>
                          </div>
                        </li>
                      @endif
                    @endforeach
                  @endforeach
                  <!-- /.item -->
                </ul>
              </div>
              <!-- /.card-body -->
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection

