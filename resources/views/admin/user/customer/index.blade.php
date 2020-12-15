@EXTENDS('admin.layouts.master')
@section('content')
<style type="text/css">
    .projects .table-avatar img, .projects img.table-avatar {
    border-radius: 2%;
    width: 5rem;
}
</style>
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
              Khách Hàng
            </h1>
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
	                            <table class="table table-striped projects">
						            <thead>
						                  <tr>
						                      <th>
						                        Tên Khách Hàng
						                      </th>
						                      <th>
						                      	Email
						                      </th>
						                      <th>
						                      	Địa Chỉ
						                      </th>
						                      <th>
						                      	Số Điện Thoại
						                      </th>
						                  </tr>
						            </thead>
						            <tbody>
						            	@foreach($data as $customer)
						                  <tr>
						                      <td>
						                      	<a href="{{ route('customer_detail', ['id'=>$customer->id]) }}">{{ $customer->name }}</a>	
						                      </td>
						                      <td>
						                        {{ $customer->email }}
						                      </td>
						                      <td>
						                        {{ $customer->address }}
						                      </td>
						                      <td>
						                      	{{ $customer->phone }}
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