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
                <h1 style="text-align: center;">XÁC NHẬN MẬT KHẨU</h1>
                <form action="{{ route('postpassword')}}" method="post" accept-charset="utf-8">
                    @csrf
                    @if (Session::has('flash_message_error'))
                        <div class="alert alert-danger">
                            {{  Session::get('flash_message_error') }}
                        </div>
                    @endif
                    <div class="form-group">
                        <h3> Đễ giữ an toàn cho tài khoản của bạn, vui lòng xác minh danh tính bằng cách nhập lại mật khẩu</h3>
                        <input type="password" class="form-control" id="fullname" name="password" placeholder="Mật Khẩu Hiện Tại">
                    </div>  
                    <div class="form-group">       
                        <button class="btn btn-block" style="background-color: red; color: white" type="submit" >Tiếp Tục</button>
                    </div>
                </form>
            </div>
            <div class="col-4">
            </div>
        </div>
    </div>
 </div>
 @endsection