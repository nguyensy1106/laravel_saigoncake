@EXTENDS('admin.layouts.master')
@section('content')
     <div class="content-wrapper">
	    <!-- Content Header (Page header) -->
	    <section class="content-header">
	      <div class="container-fluid">
	        <div class="row mb-2">
	          <div class="col-sm-6">
	            <h1>Tạo Sản Phẩm</h1>
	          </div>
	          <div class="col-sm-6">
	            <ol class="breadcrumb float-sm-right">
	              <li class="breadcrumb-item"><a href="#">Home</a></li>
	              <li class="breadcrumb-item active">Tạo Sản Phẩm</li>
	            </ol>
	          </div>
	        </div>
	      </div><!-- /.container-fluid -->
	    </section>
	    <!-- Main content -->
	    <section class="content">
		     <form  action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
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
				                    	<label >Sản Phẩm</label>
				                    	<input type="text" class="form-control" id="name" name="name" placeholder="">
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
						              	<label >Loại Sản Phẩm</label>
						                 <select class="custom-select form-control-border" name="category_id">
						                 		<option selected >Chọn Loại Sản Phẩm</option>
						                 	@foreach($data as $category)
						                    	<option value="{{  $category->id }}">{{  $category->name_category }}</option>
						                    @endforeach
						                  </select>
						          	</div>
				                  	<div class="form-group">
						              	<label >Tình Trạng</label>
						                <div class="custom-control custom-switch">
						                    <input type="checkbox" class="custom-control-input" id="customSwitch1" name="status" checked>
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
				             		<div class="form-group">
				                    	<label >Mô Tả</label>
				                    	<textarea id="summernote" name="description"></textarea>
				                  	</div>
				                  	<div class="form-row">
									    <div class="col">
									    	<label >Giá Thực</label>
									      	<input type="text" class="form-control" name="price_sell">
									    </div>
									    <div class="col">
									    	<label >Giá Sau Khi Giảm</label>
									      	<input type="text" class="form-control" name="price_discount">
									    </div>
									</div>
				                </div>
				                 <!-- /.card-body -->
				                <div class="card-footer">
				                  <button type="submit" class="btn btn-primary">Thêm Sản Phẩm</button>
				                </div>
				            </div>
				            <!-- /.card --> 	
             		</div>
            </form>
	    </section>
	    <!-- /.content -->
  	</div>
@endsection