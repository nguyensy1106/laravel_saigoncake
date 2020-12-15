<style type="text/css">
    .our-link ul li {
    border-right: 0px;
  }
</style>
<body>
    <!-- Start Main Top -->
    <div class="main-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                    <div class="our-link">
                        <ul>    
                            <li><a href="tel:0824591678"><i class="fas fa-headset"></i>Gọi Cho Shop: 0824591678</a></li>
                        </ul>
                    </div>
                    <div class="row">
                        <form action="{{ route('postsearch')}}" method="get" accept-charset="utf-8">
                            @csrf
                             <div class="input-group" style="width:400px; margin-left: 50px;">
                                <input type="text" class="form-control" id="keyword" placeholder="Search" name="keyword">
                                <button type="submit" class="btn btn-primary" name="" value="Search"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-8 col-md-6 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-9">
                            <div>
                                <ul style="float: right;">
                                    <li>
                                        <p style="color: white; text-align: center; margin-left: 4em ">WEBSITE CHỈ PHỤC VỤ NHU CẦU HỌC TẬP NÊN MỌI DỮ LIỆU, ĐƠN HÀNG LÀ ẢO VÀ SẼ BỊ XÓA</p>
                                    </li>
                                </ul>
                            </div>
                        </div>

                       
                        <div class="col-3 our-link">
                                @if(Auth::check())
                                     <ul style="float: right;">
                                      <li class="dropdown">
                                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" style="text-align: center; color: white"><i class="fa fa-user-circle" aria-hidden="true"> Tài Khoản </i></a>
                                            <ul class="dropdown-menu bg-dark" style="text-align: center" >
                                                <li><a style="color:white" href="{{ route('account')}}">Tài Khoản Của Tôi</a></li>
                                                <li><a style="color:white" href="{{ route('logout') }}">Đăng Xuất</a></li>
                                            </ul>
                                    </li>
                                </ul>
                                @else
                                <ul style="float: right;">
                                    <li><a href="{{ route('login') }}">Đăng Nhập | Đăng Kí</a></li>
                                </ul>
                                @endif
                        </div>
                    </div>                   
                </div>  
            </div>
    </div>
</div>
    <!-- End Main Top -->
<div class="row bg-dark">
    <div class="col-2">  </div>
    <div class="col-3" id="search_ajax"></div>
    <div class="col-5">  </div>
    <div class="col-2">  </div>
</div>
   <!-- Start Main Top -->
    <header class="main-header">
        <!-- Start Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
            <div class="container">
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                    <a class="navbar-brand" href="index.php"><img src="{{ asset('image/logo2.PNG') }}" class="logo" alt=""></a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="nav-item active"><a class="nav-link" href="{{ route('index') }}">Trang Chủ</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('aboutus') }}">Về Chúng Tôi</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('shop') }}">Sản Phẩm</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('show_contact') }}">Liên Hệ</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('blog') }}">Blog</a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->

                <!-- Start Atribute Navigation -->
                <div class="attr-nav">
                    <ul>
                        <li class="side-menu">
                            <a href=" {{ route('cart.show') }}">
                                <i class="fa fa-shopping-bag"></i>
                                <span class="badge">{{ count((array) session('cart')) }}</span>
                                <p>Giỏ Hàng</p>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- End Atribute Navigation -->
            </div>
        </nav>
        <!-- End Navigation -->
    </header>
    <!-- End Main Top -->
    <script >
////AJAX/////
$(document).ready(function(){

         $("#keyword").keyup(function(){
            var keyword = $(this).val(); //lấy gía trị ng dùng gõ
            //alert(keyword);
            if(keyword != '') //kiểm tra khác rỗng thì thực hiện đoạn lệnh bên dưới
            {
                var _token = $('input[name="_token"]').val(); // token để mã hóa dữ liệu
                //alert(_token);
                $.ajax({
                    url:"{{ route('search_ajax') }}", 
                    method:"POST", // phương thức gửi dữ liệu.
                    data:{
                        keyword: keyword,
                         _token:_token
                    },
                    success:function(data){ //dữ liệu nhận về 
                        $('#search_ajax').fadeIn();
                        $('#search_ajax').html(data);
                    }
                });
            }else{
                 $('#search_ajax').fadeOut();
            }
        });
});
</script>