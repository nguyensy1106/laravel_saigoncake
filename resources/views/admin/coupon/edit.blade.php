@EXTENDS('admin.layouts.master')
@section('content')
     <div class="content-wrapper">
	    <!-- Content Header (Page header) -->
	    <section class="content-header">
	      <div class="container-fluid">
	        <div class="row mb-2">
	          <div class="col-sm-6">
	            <h1>Sửa Mã Giảm Giá</h1>
	          </div>
	        </div>
	      </div><!-- /.container-fluid -->
	    </section>
	    <!-- Main content -->
	    <section class="content">
		     <form  action="{{ route('coupon.update', ['id'=>$data->id])}}" method="post">
		     	@csrf
                <div class="card-body">
                  	<div class="form-group">
                    	<label >Tên Mã Giảm Giá</label>
                    	<input type="text" class="form-control" id="coupon_name" name="coupon_name" value="{{ $data->coupon_name}}">
                  	</div>
                  	<div class="form-group">
                    	<label >Mã Giảm Giá</label>
                    	<input type="text" class="form-control" id="coupon_code" name="coupon_code" value="{{ $data->coupon_code}}">
                      <div id="labelcouponcode"></div>
                  	</div>
                  	<div class="form-group">
                    	<label >Số Lượng</label>
                    	<input type="number" class="form-control" id="coupon_number" name="coupon_number" value="{{ $data->coupon_number}}">
                  	</div>
                  	<div class="form-group">
		              	<label >Tính Năng Mã</label>
		                <select class="form-control" id="coupon_condition" name="coupon_condition">
		                	<option>-- Chọn --</option>
                      @if($data->coupon_condition == 1)
                        <option value="1" selected>Giảm Theo Phầm Trăm</option>
                        <option value="2">Giảm Theo Tiền</option>
                      @else
                        <option value="1">Giảm Theo Phầm Trăm</option>
                        <option value="2" selected>Giảm Theo Tiền</option>
                      @endif
		                </select>
		          	</div>
		          	<div class="form-group">
                    	<label >Nhập Số % Hoặc Số Tiền Giảm</label>
                    	<input type="number" class="form-control" id="coupon_money" name="coupon_money" value="{{ $data->coupon_money}}">
                  	</div>
                  	<div class="form-row">
						<div class="col">
						  	<label >Ngày Hiện Hành</label>
                    		<input type="date" class="form-control" id="date_current" name="date_current" value="{{ date_format(date_create($data->date_current), 'Y-m-d')}}">
						</div>
						<div class="col">
						  	<label >Ngày Hết Hạn</label>
                    		<input type="date" class="form-control" id="date_expiration" name="date_expiration" value="{{ date_format(date_create($data->date_expiration), 'Y-m-d')}}">
                    		<div id="labelerror"></div>
						</div>
					</div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Cập Nhật Mã</button>
                </div>
            </form>
	    </section>
	    <!-- /.content -->
  	</div>

<script >
////AJAX/////
$(document).ready(function(){
  	$("#date_expiration").change(function(){
            var date_expiration = $(this).val();
            var date_current = $('#date_current').val();
            if(date_expiration != '') //kiểm tra khác rỗng thì thực hiện đoạn lệnh bên dưới
            {
                var _token = $('input[name="_token"]').val(); // token để mã hóa dữ liệu
                $.ajax({
                    url:"{{ route('postdatecoupon') }}", 
                    method:"POST", // phương thức gửi dữ liệu.
                    data:{
                       date_expiration: date_expiration,
                        date_current: date_current,
                         _token:_token
                    },
                    success:function(data){ //dữ liệu nhận về 
                        $('#labelerror').html(data); 
                    }
                });
            }
        });
    $("#coupon_code").keyup(function(){
            var coupon_code = $(this).val();
            if(coupon_code != '') //kiểm tra khác rỗng thì thực hiện đoạn lệnh bên dưới
            {
                var _token = $('input[name="_token"]').val(); // token để mã hóa dữ liệu
                $.ajax({
                    url:"{{ route('postcouponcode') }}", 
                    method:"POST", // phương thức gửi dữ liệu.
                    data:{
                       coupon_code: coupon_code,
                         _token:_token
                    },
                    success:function(data){ //dữ liệu nhận về 
                        $('#labelcouponcode').html(data); 
                    }
                });
            }
        });
});
</script>
@endsection