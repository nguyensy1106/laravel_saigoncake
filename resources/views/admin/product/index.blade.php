@EXTENDS('admin.layouts.master')
@section('content')
<style type="text/css">
    .projects .table-avatar img, .projects img.table-avatar {
    border-radius: 2%;
    width: 5rem;
}
</style>
 <script>
	function addproduct() {
	  window.location.replace("{{ route('product.new') }}");
	}
</script>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  	@if (Session::has('flash_message'))
      <div class="alert alert-success">{{ Session::get('flash_message') }}</div>
    @endif
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>
              Sản Phẩm 
            </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <button class="btn btn-primary" onclick="addproduct()">Tạo sản phẩm</button>
            </ol>
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
              </div>
	          <div class="card-body">
	                <div class="tab-content" id="custom-tabs-four-tabContent">
	                  	<div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
	                      <div class="card-body p-0">
	                            <table class="table table-striped projects" id="myTable">
						            <thead>
						                  <tr>
						                      <th style="width: 10%">
						                          ID
						                      </th>
						                      <th style="width: 20%">

						                      <th style="width: 30%">
						                          Tên Sản Phẩm
						                      </th>
						                      <th style="width: 20%">
						                      	Slug
						                      </th>
						                      <th style="width: 10%">
						                      	Tình Trạng
						                      </th>
						                      <th style="width: 10%" class="text-center">
						                         Người Tạo
						                      </th>
						                  </tr>
						            </thead>
						            <tbody>
						            	@foreach($data as $product)
						                  <tr>
						                      <td>
						                      	{{ $product->id }}
						                      </td>
						                      <td>
						                        <ul class="list-inline">
						                              <li class="list-inline-item">
						                                  <img alt="Avatar" class="table-avatar" src="{{ asset( $product->url_image ) }}">
						                              </li>
						                        </ul>
						                      </td>
						                      <td>
						                        <a href="{{ route( 'product.edit',[ 'slug'=>$product->slug ] ) }}">
						                        	{{ $product->name_product }}
						                        </a>
						                      </td>
						                      <td>
						                      		{{ $product->slug }}
						                      </td>
						                      <td>
						                      @if($product->status==1)
						                      		<span class="badge badge-primary">Hiện</span>
						                      	@else
						                      		<span class="badge badge-danger">Ẩn</span>
						                      	@endif

						                      </td>
						                      <td class="project_progress" style="text-align: center;">
						                   		  admin
						                      </td>
						                  </tr>
						              	@endforeach
						            </tbody>
						        </table>
	        				</div><!-- /.card-body -->
	       				</div>
	       			</div>
               </div>
              <!-- /.card -->
            </div>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection