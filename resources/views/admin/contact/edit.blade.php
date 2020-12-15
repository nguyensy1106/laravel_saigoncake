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
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Quản Lý Đơn Hàng</li>
            </ol>
          </div>
        </div>
        @if (Session::has('flash_message'))
          <div class="alert alert-success">{{ Session::get('flash_message') }}</div>
        @endif
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->        
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              
              <!-- /.card-header -->
              <div class="card-body">
                <div class="table">
                    <div class="row">
                        <div class="col-sm-12">
                             <div class="row">
                                <h3 class="card-title">Phản Hồi Của Khách Hàng</h3>
                             </div>
                        </div>                      
                    </div>
                    <div class="row mt-3">
                        <div class="col-sm-12">
                          <label for="">Tiêu Đề: </label>
                           <textarea style="height: 82px; width:100%px" class="form-control">
                              {{ $data->subject}}
                           </textarea>
                        </div>
                        <div class="col-sm-12 mt-3">
                          <label for="">Nội Dung: </label>
                           <textarea style="height:300px; width:100%px" class="form-control">
                              {{ $data->content}}
                           </textarea>
                        </div>
                    </div>
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
                      <div class="row mt-3">
                          <div class="col-12">
                            <p>Họ Tên:  {{ $data->name}} </p>
                            <p>Email:  {{ $data->email}} </p>
                             <p>Ngày Gửi:  {{ $data->created_at}}</p>
                          </div>
                      </div>
                       <div class="row mt-3">
                            <div class="col-12" style="text-align: right;">
                              <a href="mailto:{{ $data->email }}?subject=Reply: {{ $data->subject }}&body= {{ $data->name}}: {{ $data->content }} ">
                                <button type="submit" class="btn btn-success">Trả Lời</button>
                              </a>
                            </div>
                       </div>
                  </li>
                  <li class="list-group-item">
                     <div class="row mt-3">
                            <div class="col-6">
                              <i class="fas fa-lg fa-check" <?php if($data->status != 1){ echo 'style="color:#96bf48;"'; }?> ></i>
                                <span>&nbsp Đánh Dấu Đã Đọc 
                                </span>
                            </div>
                            <div class="col-6" style="text-align: right;">
                              @if( $data->status == 1)
                                <a href="{{ route('contact.update', ['id'=>$data->id])}}">
                                  <button type="submit" name="xacnhan" class="btn btn-primary">Chọn</button>
                                </a>
                              @endif
                            </div>
                      </div>
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