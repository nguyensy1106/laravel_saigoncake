@EXTENDS('admin.layouts.master')
@section('content')
     <div class="content-wrapper">
	    <!-- Content Header (Page header) -->
	    <section class="content-header">
	      <div class="container-fluid">
	        <div class="row mb-2">
	          <div class="col-sm-6">
	            <h1>Tạo Phí Vận Chuyển</h1>
	          </div>
	          <div class="col-sm-6">
	            <ol class="breadcrumb float-sm-right">
	              <li class="breadcrumb-item"><a href="#">Home</a></li>
	              <li class="breadcrumb-item active">Tạo Phí Vận Chuyển</li>
	            </ol>
	          </div>
	        </div>
	      </div><!-- /.container-fluid -->
	    </section>
	    <!-- Main content -->
	    <section class="content">
		     <form  action="{{ route('shipping.store') }}" method="post" enctype="multipart/form-data">
		     	@csrf
                <div class="card-body">
                  	<div class="form-group">
                    	<label >Địa Chỉ Vận Chuyển</label>
                    	<input type="text" class="form-control" id="district_name"name="district_name" placeholder="">
                  	</div>
                  	<div class="form-group">
                    	<label >Phí Vận Chuyển</label>
                    	<input type="text" class="form-control" id="money" name="money" placeholder="">
                  	</div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Thêm Phí Vận Chuyển</button>
                </div>
            </form>
	    </section>
	    <!-- /.content -->
  	</div>
@endsection