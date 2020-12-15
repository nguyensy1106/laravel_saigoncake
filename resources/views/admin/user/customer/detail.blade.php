@EXTENDS('admin.layouts.master')
@section('content')
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Chỉnh Sửa Tài Khoản</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <form action="{{ route('update_customer', ['id'=>$data->id])}}" method="post">
      @csrf
      <div class="row">
        <div class="col-md-8">
          <div class="card card-primary">
            <div class="card-header">
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="">Họ Tên</label>
                <input type="text" id="fullname" name="fullname" class="form-control" value="{{ $data->name}}">
              </div>
              <div class="form-group">
                <label for="">Email</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ $data->email }}" disabled>
              </div>
               <div class="form-group">
                <label for="">Địa Chỉ</label>
                <input type="text" id="address" name="address" class="form-control" value="{{ $data->address }}">
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
         <div class="col-md-4">
          <div class="card card-primary">
            <div class="card-header">
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-row">
                
                <label for="">Ngày Sinh</label>
                <input type="date" id="datebirth" name="datebirth" class="form-control" value="{{ $data->birthday}}">
              </div>
              <div class="form-row">
                  <label for="">Giới Tính</label>
                  <select id="gender" name="gender" class="form-control custom-select">
                    @if($data->gender == 1)
                    <option disabled>Giới Tính</option>
                    <option value="1" selected >Nam</option>
                    <option value="2">Nữ</option>
                    @elseif($data->gender == 2)
                    <option disabled>Giới Tính</option>
                    <option value="1" >Nam</option>
                    <option value="2" selected>Nữ</option>
                    @else
                    <option disabled selected>Giới Tính</option>
                    <option value="1" >Nam</option>
                    <option value="2" >Nữ</option>
                    @endif
                  </select>
              </div>
              <div class="form-row mt-1">
                <label for="">Số Điện Thoại</label>
                <input type="text" id="phone" name="phone" class="form-control" value="{{ $data->phone}}">
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <div class="row">
        <div class="col-6">
          <a href="#" class="btn btn-danger">Xóa Tài Khoản </a>
        </div>
        <div class="col-6" style="text-align: right;">
          <button type="submit" name="update" class="btn btn-success">Cập Nhật</button>
        </div>
      </div>
    </form>
    </section>
    <!-- /.content -->
  </div>
@endsection