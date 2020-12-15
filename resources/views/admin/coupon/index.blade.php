@EXTENDS('admin.layouts.master')
@section('content')
<style type="text/css">
    .projects .table-avatar img, .projects img.table-avatar {
    border-radius: 2%;
    width: 5rem;
}
</style>
 <script>
	function removecoupon() {
		return confirm("Bạn Có Muốn Xóa Mã Khuyến Mãi Không?");
	}

	function addcoupon() {
	  window.location.replace("{{ route('coupon.new')}}");
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
              Mã Giảm Giá
            </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <button class="btn btn-primary" onclick="addcoupon()">Tạo Mã</button>
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
	                            <table class="table table-striped projects">
						            <thead>
						                  <tr>
						                      <th style="width: 30%">
						                        	Tên mã giảm giá
						                      </th>
						                      <th style="width: 10%">
						                      		Mã giảm giá
						                      <th style="width: 10%">
						                          Số lượng mã
						                      </th>
						                      <th style="width: 20%">
						                      	Hình thức giảm giá
						                      </th>
						                      <th style="width: 10%">
						                      	Số giảm
						                      </th>
						                      <th style="width: 10%">
						                         Ngày Hiện Hành
						                      </th>
						                      <th style="width: 10%">
						                         Ngày Kết Thúc
						                      </th>
						                      <th style="width: 10%">
						                         
						                      </th>
						                  </tr>
						            </thead>
						            <tbody>
						            	@foreach($data as $coupon)
						                  <tr>
						                      <td>
						                      		<a href="{{ route('coupon.edit',['id'=>$coupon->id])}}">{{$coupon->coupon_name}}</a>
						                      </td>
						                      <td>
						                        	{{$coupon->coupon_code}}
						                      </td>
						                      <td>
						                        	{{$coupon->coupon_number}}
						                      </td>
						                      @if($coupon->coupon_condition == 1)
						                      		<td>Giảm theo %</td>
						                      		<td>Giảm {{$coupon->coupon_money}} %</td>
						                      @else
						                      		<td>Giảm theo tiền</td>
						                      		<td>Giảm {{$coupon->coupon_money}} đ</td>
						                      @endif
						                      <td>{{$coupon->date_current}}</td>
						                      <td>{{$coupon->date_expiration}}</td>
						                      <td>
						                      	<a href="{{ route('coupon.destroy',['id'=>$coupon->id])}}" onclick="return removecoupon()"><button class="btn btn-danger" type="submit"><i class="fas fa-times"></i></button></a>
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