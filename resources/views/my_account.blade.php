@EXTENDS('layouts.master')
@section('content')
	     <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Cập Nhật Tài Khoản</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->
<!-------menu---------->
 <div class="cart-box-main">
    <div class="container">
    	@if (Session::has('flash_message'))
		    <div class="alert alert-success">{{ Session::get('flash_message') }}</div>
		@endif
        <form action="{{ route('update_myaccount', ['id'=>$data_user->id]) }}" method="post" enctype="multipart/form-data"> 
        	@csrf
			<div class="row"> 
				<div class="col-4">
					@if($data_user != "") 	
                    	<img class="preview-img" src="{{ asset($data_user->url_avatar)}}" alt="Preview Image" width="300" height="300"/>
                        <div class="form-group">
                        	<label>Đổi Hình Ảnh:</label>
                            <input class="form-control" type="file" name="image"/>
                            <span class="Error"></span>
                        </div>
					@else                   
                     	<img class="preview-img" src="http://simpleicon.com/wp-content/uploads/account.png" alt="Preview Image" width="200" height="200"/>
                      	<div class="form-group">
	                        <label>Chọn Hình Ảnh:</label>
	                        <input class="form-control" type="file" name="image"/>
                            <span class="Error"></span>
                        </div>
                    @endif
                    
                    	<a href="{{ route('show_exchangepassword')}}" class="btn btn-secondary">Đổi Mật Khẩu</a>
   				</div>
				<div class="col-8">
       					<div class="form-row">
						    <div class="form-group col-md-6">
						      <label for="fullname">Họ Tên :</label>
						      <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Full Name" value="{{ $data_user->name }}">
						    </div>
						    <div class="form-group col-md-6">
							    <label for="gender">Giới Tính :</label>
							    <select id="gender" name="gender" class="form-control">
							    @if($data_user->gender == 1)    
							        <option selected>Choose...</option>
							        <option value="1" selected>Nam</option>
							        <option value="2" >Nữ</option>
							    @elseif($data_user->gender == 2)
							    	<option selected>Choose...</option>
							        <option value="1" >Nam</option>
							        <option value="2" selected>Nữ</option>
							    @else
							    	<option selected>Choose...</option>
							        <option value="1" >Nam</option>
							        <option value="2" >Nữ</option>
							    @endif
							    </select>
							</div>
						</div>
						<div class="form-row">
						    <div class="form-group col-md-6">
						      <label for="inputEmail4">Email :</label>
						      <input type="email" class="form-control" id="inputEmail4" name="email" placeholder="Email" disabled="" value="{{ $data_user->email }}">
						    </div>
						    <div class="form-group col-md-6">
						      <label for="datebirth">Ngày Sinh :</label>
						      <input type="date" class="form-control" id="datebirth" name="datebirth" value="{{ $data_user->birthday }}">
							</div>
						</div>
						<div class="form-row">
						    <div class="form-group col-md-6">
						      <label for="address">Địa Chỉ : </label>
						      <input type="text" class="form-control" id="address"  name="address" placeholder="Địa Chỉ" value="{{ $data_user->address }}">
						    </div>
						    <div class="form-group col-md-6">
						      <label for="phone">Số Điện Thoại :</label>
						      <input type="text" class="form-control" id="phone" name="phone" placeholder="Số Điện Thoại" value="{{ $data_user->phone }}" >
						      <div id="labelphone"></div>
							</div>
						</div>
						  <div class="form-row">
							    <div class="form-group col-md-4">
							      <label for="province">Tỉnh/Thành :</label>
							      	<select id="province" name="province" class="form-control">
							      		 <option selected value="0">Chọn Tỉnh/Thành</option>
							      		 @foreach($data_province as $province)
							      		 	<option value="{{ $province->id }}" 
							      		 		<?php if($province->id == $data_user->id_province) {
							      		 			echo 'selected';
							      		 		}
							      		 		?> 
							      		 	>
							      		 		{{ $province->_name }}
							      		 	</option>
							      		 @endforeach
							      		
							      </select>
							    </div>
							    <div class="form-group col-md-4">
							      <label for="district">Quận/Huyện :</label>
							      <select id="district" name="district" class="form-control">
							        <option selected value="0">Chọn Quận/Huyện</option>
							       		 @foreach($data_district as $district)
							      		 	<option value="{{ $district->id }}" 
							      		 		<?php if($district->id == $data_user->id_district) {
							      		 			echo 'selected';
							      		 		}
							      		 		?> 
							      		 	>
							      		 	{{ $district->_prefix}}	{{ $district->_name }}
							      		 	</option>
							      		 @endforeach
							      </select>
							    </div>
							    <div class="form-group col-md-4">
							      <label for="ward">Phường/Xã :</label>
							       <select id="ward" name="ward" class="form-control">
							       		<option selected value="0">Chọn Phường/Xã</option>
							        		@foreach($data_ward as $ward)
							      		 	<option value="{{ $ward->id }}" 
							      		 		<?php if($ward->id == $data_user->id_ward) {
							      		 			echo 'selected';
							      		 		}
							      		 		?> 
							      		 	>
							      		 		{{ $ward->_prefix }}	{{ $ward->_name }}
							      		 	</option>
							      		 @endforeach
							      </select>
							    </div>
						  </div>
						  <div style="float: right;">
						  	<button type="submit" class="btn btn-primary" name="update">Cập Nhật Thông Tin Tài Khoản</button>
						  </div>
				</div>
       		</div>
    	</form>
	</div>
</div>
<script>
    $(document).ready(function(){
        $('#province').change(function(){
            var provinceID = $('#province').val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                    url:"{{ route('postprovince') }}", 
                    method:"POST",
                    dataType: 'json',
                    cache: false,
                    data:{
                        provinceID: provinceID,
                         _token:_token
                    },
                    success:function(data){  
                        $('#district').html(data.district);
                        $('#ward').html(data.ward);
                    }
                });
        });

        $('#district').change(function(){
            var districtID = $('#district').val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                    url:"{{ route('postdistrict') }}", 
                    method:"GET",
                    data:{
                        districtID: districtID,
                         _token:_token
                    },
                    success:function(data){  
                        $('#ward').html(data);
                    }
                });
        });

         $("#phone").keyup(function(){
            var query = $(this).val();
            if(query != '') {
                var _token = $('input[name="_token"]').val(); 
                $.ajax({
                    url:"{{ route('phone') }}", 
                    method:"POST", 
                    data:{
                        query:query,
                         _token:_token
                    },
                    success:function(data){ 
                        $('#labelphone').html(data); 
                    }
                });
            }
        });
    });

</script>
@endsection