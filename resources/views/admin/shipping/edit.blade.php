@EXTENDS('admin.layouts.master')
@section('content')
     <div class="content-wrapper">
	    <!-- Content Header (Page header) -->
	    <section class="content-header">
	      <div class="container-fluid">
	        <div class="row mb-2">
	          <div class="col-sm-6">
	            <h1>Sửa Phí Vận Chuyển</h1>
	          </div>
	          <div class="col-sm-6">
	            <ol class="breadcrumb float-sm-right">
	              <li class="breadcrumb-item"><a href="#">Home</a></li>
	              <li class="breadcrumb-item active">Sửa Phí Vận Chuyển</li>
	            </ol>
	          </div>
	        </div>
	      </div><!-- /.container-fluid -->
	    </section>
	    <!-- Main content -->
	    <section class="content">
		     <form  action="{{ route('shipping.update', ['id'=>$data->id]) }}" method="post" enctype="multipart/form-data">
		     	@csrf
                <div class="card-body">
                  	<div class="form-group">
                    	<label >Địa Chỉ Vận Chuyển</label>
                    	<input type="text" class="form-control" id="district_name"name="district_name" value="{{ $data->district_name}}">
                  	</div>
                  	<div class="form-group">
                    	<label >Phí Vận Chuyển</label>
                    	<input type="text" class="form-control" id="money" name="money" value="{{ $data->money }}">
                  	</div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Cập Nhật Phí Vận Chuyển</button>
                </div>
            </form>
	    </section>
	    <!-- /.content -->
  	</div>
@endsection