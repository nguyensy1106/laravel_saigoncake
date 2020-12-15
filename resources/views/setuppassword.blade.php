@EXTENDS('layouts.master')
@section('content')
	     <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Đổi Mật Khẩu</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->
<!-------menu---------->
 <div class="cart-box-main">
    <div class="container">
        <div class="row"> 
            <div class="col-4">
            </div>
            <div class="col-4">
                <div class="form-group">
                    <h1 style="margin-left: 40px">NHẬP MẬT KHẨU MỚI</h1>
                </div>
                <form action="{{ route('setuppassword')}}" method="post" accept-charset="utf-8">
                    @csrf
                    <div class="form-group">
                        <div class="row">
                            <div class="col-10">
                                @if (Session::has('flash_message_error'))
                                    <div class="alert alert-danger">
                                        {{  Session::get('flash_message_error') }}
                                    </div>
                                @endif
                                <input type="password" class="form-control" name="newpassword" id="newpassword" placeholder="Mật Khẩu Mới">
                            </div>
                            <div class="col-2">
                                <label></label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-10">
                                <input type="password" class="form-control" name="confirmpassword" id="confirmpassword" placeholder="Xác Nhận Mật Khẩu">
                            </div>
                            <div class="col-2">
                                <label id="labelpassword"></label>
                            </div>
                        </div>                       
                    </div>  
                    <div class="form-group">
                        <div class="row">
                            <div class="col-10">
                                <button class="btn btn-block" style="background-color: red; color: white" type="submit" >Đặt Lại</button>
                            </div>
                            <div class="col-2">
                                
                            </div>
                         </div>     
                        
                    </div>
                </form>
            </div>
            <div class="col-4">
            </div>
        </div>
    </div>
 </div>
 <script>
     $(document).ready(function(){
        $("#confirmpassword").keyup(function(){
            var confirmpassword = $(this).val();
            var newpassword = $('#newpassword').val();
            if(confirmpassword != '')
            {
                var _token = $('input[name="_token"]').val(); // token để mã hóa dữ liệu
                //alert(_token);
                $.ajax({
                    url:"{{ route('password') }}", 
                    method:"POST", // phương thức gửi dữ liệu.
                    data:{
                        confirmpassword: confirmpassword,
                        newpassword: newpassword,
                         _token:_token
                    },
                    success:function(data){ 
                        $('#labelpassword').html(data);
                    }
                });
            }
        });
    });
 </script>
 @endsection