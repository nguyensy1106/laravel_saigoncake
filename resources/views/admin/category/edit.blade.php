@EXTENDS('admin.layouts.master')
@section('content')
	<div class="content-wrapper">
	    <!-- Content Header (Page header) -->
	    <section class="content-header">
	      <div class="container-fluid">
	        <div class="row mb-2">
	          <div class="col-sm-6">
	            <h1>Tạo Nhóm Sản Phẩm</h1>
	          </div>
	          <div class="col-sm-6">
	            <ol class="breadcrumb float-sm-right">
	              <li class="breadcrumb-item"><a href="#">Home</a></li>
	              <li class="breadcrumb-item active">Tạo Nhóm Sản Phẩm</li>
	            </ol>
	          </div>
	        </div>
	      </div><!-- /.container-fluid -->
	    </section>
	    <!-- Main content -->
	    <section class="content">
		     <form  action="{{ route('category.update', ['slug'=>$data_category->slug]) }}" method="post" enctype="multipart/form-data">
		     	@csrf
		     	<div class="row">
			     	<div class="col-6">
		                <div class="card-body">
		                  <div class="form-group">
		                    <label >Tên Loại Sản Phẩm</label>
		                    <input type="text" class="form-control" id="name" name="name" placeholder="" value=" {{ $data_category->name_category }} ">
		                  </div>
		                  <div class="form-group">
		                    <label >Hình Ảnh</label>
		                    <div class="input-group">
		                      <div class="custom-file">
		                        <input type="file" class="custom-file-input" name="url_image">
		                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
		                      </div>
		                    </div>
		                  </div>
		                  <div class="form-group">
		                    <label >Tình Trạng</label>
		                    <div class="custom-control custom-switch">
		                      <input type="checkbox" class="custom-control-input" id="customSwitch1" name="status" <?php if($data_category->status==1){ echo "checked";} ?> >
		                      <label class="custom-control-label" for="customSwitch1">Ẩn/Hiện</label>
                    		</div>
		                  </div>
		                </div>
		                <!-- /.card-body -->
		                <div class="card-footer">
		                  <button type="submit" class="btn btn-primary">Cập Nhật</button>
		                </div>
		            </div>
		            <div class="col-6">
		            	<div class="card-body">
		            		<img src="{{ asset($data_category->url_image) }}" alt="" width="600px" height="400px">
		            	</div>
		            </div>
		        </div>
            </form>
	    </section>
	    <!-- /.content -->
  	</div>
@endsection