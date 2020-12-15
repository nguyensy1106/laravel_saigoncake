@EXTENDS('admin.layouts.master')
@section('content')
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tạo Tài Khoản Nhân Viên</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <form action="{{ route('store_employee') }}" method="post">
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
                <input type="text" id="fullname" name="fullname" class="form-control" >
              </div>
              <div class="form-group">
                <label for="">Email</label>
                <input type="email" id="email" name="email" class="form-control">
              </div>
               <div class="form-group">
                <label for="">Mật Khẩu</label>
                <input type="password" id="password" name="password" class="form-control">
              </div>
              <div class="form-group">
                <label for="">Địa Chỉ</label>
                <input type="text" id="address" name="address" class="form-control">
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
                <input type="date" id="datebirth" name="datebirth" class="form-control" >
              </div>
              <div class="form-row">
                  <label for="">Giới Tính</label>
                  <select id="gender" name="gender" class="form-control custom-select">
                    <option disabled>Giới Tính</option>
                    <option value="1">Nam</option>
                    <option value="2">Nữ</option>
                  </select>
              </div>
              <div class="form-row mt-1">
                <label for="">Số Điện Thoại</label>
                <input type="text" id="phone" name="phone" class="form-control">
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <div class="row">
        <div class="col-6">
          
        </div>
        <div class="col-6" style="text-align: right;">
          <button type="submit" name="update" class="btn btn-success">Tạo Tài Khoản</button>
        </div>
      </div>
    </form>
    </section>
    <!-- /.content -->
  </div>
@endsection