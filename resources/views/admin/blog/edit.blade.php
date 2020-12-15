@EXTENDS('admin.layouts.master')
@section('content')
     <div class="content-wrapper">
	    <!-- Content Header (Page header) -->
	    <section class="content-header">
	      <div class="container-fluid">
	        <div class="row mb-2">
	          <div class="col-sm-6">
	            <h1>Chỉnh Sửa Blog</h1>
	          </div>
	          <div class="col-sm-6">
	            <ol class="breadcrumb float-sm-right">
	              <li class="breadcrumb-item"><a href="#">Home</a></li>
	              <li class="breadcrumb-item active">Chỉnh Sửa Blog</li>
	            </ol>
	          </div>
	        </div>
	      </div><!-- /.container-fluid -->
	    </section>
	    <!-- Main content -->
	    <section class="content">
		     <form  action="{{ route('blog.update', [ 'slug'=>$data->slug ]) }}" method="post" enctype="multipart/form-data">
		     	@csrf
		     	<div class="row">
		     		<div class="col-6">
		     			 <div class="card card-primary">
				              	<div class="card-header">
				                	<h3 class="card-title"></h3>
				              	</div>
				              <!-- /.card-header -->
				             	<div class="card-body">
				                  	<div class="form-group">
				                    	<label >Tên Blog</label>
				                    	<input type="text" class="form-control" id="name" name="name" placeholder="" value="{{ $data->name_blog }}">
				                  	</div>
				                  	<div class="form-group">
				                    	<label >Lời Giới Thiệu</label>
				                    	<input type="text" class="form-control" name="introduct" placeholder="" value="{{ $data->introduct }}">
				                  	</div>
				                  	<div class="form-group">
				                    	<label >Nội Dung</label>
				                    	<textarea id="summernote" name="description">{{ $data->description }}</textarea>
				                  	</div>
				                  	<div class="form-group">
						              	<label >Tình Trạng</label>
						                <div class="custom-control custom-switch">
						                    <input type="checkbox" class="custom-control-input" id="customSwitch1" name="status" <?php if( $data->status == 1 ){ echo "checked"; } ?> >
						                    <label class="custom-control-label" for="customSwitch1">Ẩn/Hiện</label>
				                    	</div>
						          	</div>
				                </div>
				                 <!-- /.card-body -->
				            </div>
				            <!-- /.card -->
                	</div>
                <!-- /.card-body -->
             		<div class="col-6">
				             <div class="card card-success">
				              	<div class="card-header">
				                	<h3 class="card-title"></h3>
				              	</div>
				              <!-- /.card-header -->
				             	<div class="card-body">
				             		<img src="{{ asset($data->url_image) }}" alt="" width="550px" height="300px">
				             		<div class="form-group">
				                    	<label >Hình Ảnh</label>
				                    	<div class="input-group">
				                      		<div class="custom-file">
				                        		<input type="file" class="custom-file-input" name="url_image">
				                        		<label class="custom-file-label" for="exampleInputFile">Choose file</label>
				                      		</div>
				                    	</div>
				                  	</div>
				                </div>
				                 <!-- /.card-body -->
				                <div class="card-footer">
				                  <button type="submit" class="btn btn-primary">Thêm Blog</button>
				                </div>
				            </div>
				            <!-- /.card --> 	
             		</div>
            </form>
	    </section>
	    <!-- /.content -->
  	</div>
@endsection