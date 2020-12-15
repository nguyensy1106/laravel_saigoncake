@EXTENDS('layouts.master')
@section('content')
    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Về Chúng Tôi</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Về Chúng Tôi</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start About Page  -->
    <div class="about-box-main">
        <div class="container">
            <div class="row">
				<div class="col-lg-6">
                    <div class="banner-frame"> <img class="img-fluid" src="{{ asset('image/about-img.jpg') }}" alt="" />
                    </div>
                </div>
                <div class="col-lg-6">
                    <h2 class="noo-sh-title-top">Cửa hàng cake sài gòn</h2>
                    <p>Bánh kem Sài Gòn khởi nguồn từ năm 2019 là thương hiệu sản xuất và bán bánh với slogan "Bánh tươi mỗi ngày". Sản phẩm chủ lực của Bánh kem Sài Gòn là bánh kem. Trong mỗi dịp lễ hay sinh nhật, bánh kem của Bánh kem Sài Gòn luôn là một trong những lựa chọn hàng đầu, bởi độ ngọt vừa phải, mẫu bánh đẹp, giá thành hợp lý, phục vụ chu đáo, tận tình. Bên cạnh đó, đồng hành mỗi ngày của khách hàng là các sản phẩm bánh mỳ tươi dinh dưỡng, thơm ngon.</p>
                    <p>
                    Giờ đây, Bánh kem Sài Gòn không chỉ được biết đến là thương hiệu của các sản phẩm bánh ngon, sản phẩm tốt. Đằng sau thành công của Bánh kem Sài Gòn là đội ngũ nhân viên tâm huyết, luôn nỗ lực, chăm chỉ làm việc hết mình, cùng sự sáng tạo, miệt mài làm việc, không ngừng đam mê để có thể đưa ra những sản phẩm không chỉ ngon và đẹp mắt mà còn tốt cho sức khỏe cho khách hàng.
                    </p>
				</div>
            </div>
            <div class="row my-5">
                <div class="col-sm-6 col-lg-4">
                    <div class="service-block-inner">
                        <h3>Đáng tin cậy </h3>
                        <p>“Chữ TÍN tạo NIỀM TIN” Đến với Bánh kem Sài Gòn, chúng tôi tự tin rằng mình là một trong những Doanh nghiệp, nhà cung cấp bánh uy tín, chất lượng, an toàn nhất thị trường hiện tại.</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="service-block-inner">
                        <h3>Lắng nghe</h3>
                        <p>Để có thể phục vụ tốt hơn, mang đến những chiếc bánh ngon miệng đến tận tay quý khách nên chúng tôi mong muốn những ý kiến đóng góp từ chính bản thân bạn, những khách hàng của chúng tôi. </p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="service-block-inner">
                        <h3>Chuyên nghiệp</h3>
                        <p>Với đội ngũ nhân viên là những người trẻ trung, nhiệt huyết, tận tình với công việc, dày dặn kinh nghiệm. Tất cả nhân viên Bánh kem Sài Gòn luôn phục vụ khách hàng bằng cả tâm huyết nghề nghiệp và một thái độ nhiệt thành chắc chắn sẽ mang đến cho quý khách hàng sự an toàn và thoải mái nhất khi đến chúng tôi. </p>
                    </div>
                </div>
            </div>
            <div class="row my-4">
                <div class="col-12">
                    <h2 class="noo-sh-title">Thành Viên Của Cửa Hàng</h2>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="hover-team">
                        <div class="our-team"> <img src="{{ asset('image/img-1.jpg') }}" alt="" />
                            <div class="team-content">
                                <h3 class="title">Williamson</h3> <span class="post">Người Sáng Lập</span> </div>
                            <ul class="social">
                                <li>
                                    <a href="#" class="fab fa-facebook"></a>
                                </li>
                                <li>
                                    <a href="#" class="fab fa-twitter"></a>
                                </li>
                                <li>
                                    <a href="#" class="fab fa-google-plus"></a>
                                </li>
                                <li>
                                    <a href="#" class="fab fa-youtube"></a>
                                </li>
                            </ul>
                            <div class="icon"> <i class="fa fa-plus" aria-hidden="true"></i> </div>
                        </div>
                        <div class="team-description">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent urna diam, maximus ut ullamcorper quis, placerat id eros. Duis semper justo sed condimentum rutrum. Nunc tristique purus turpis. Maecenas vulputate. </p>
                        </div>
                        <hr class="my-0"> </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="hover-team">
                        <div class="our-team"> <img src="{{ asset('image/img-2.jpg') }}" alt="" />
                            <div class="team-content">
                                <h3 class="title">Kristiana</h3> <span class="post">Bếp Trưởng</span> </div>
                            <ul class="social">
                                <li>
                                    <a href="#" class="fab fa-facebook"></a>
                                </li>
                                <li>
                                    <a href="#" class="fab fa-twitter"></a>
                                </li>
                                <li>
                                    <a href="#" class="fab fa-google-plus"></a>
                                </li>
                                <li>
                                    <a href="#" class="fab fa-youtube"></a>
                                </li>
                            </ul>
                            <div class="icon"> <i class="fa fa-plus" aria-hidden="true"></i> </div>
                        </div>
                        <div class="team-description">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent urna diam, maximus ut ullamcorper quis, placerat id eros. Duis semper justo sed condimentum rutrum. Nunc tristique purus turpis. Maecenas vulputate. </p>
                        </div>
                        <hr class="my-0"> </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="hover-team">
                        <div class="our-team"> <img src="{{ asset('image/img-3.jpg') }}" alt="" />
                            <div class="team-content">
                                <h3 class="title">Steve Thomas</h3> <span class="post">CEO</span> </div>
                            <ul class="social">
                                <li>
                                    <a href="#" class="fab fa-facebook"></a>
                                </li>
                                <li>
                                    <a href="#" class="fab fa-twitter"></a>
                                </li>
                                <li>
                                    <a href="#" class="fab fa-google-plus"></a>
                                </li>
                                <li>
                                    <a href="#" class="fab fa-youtube"></a>
                                </li>
                            </ul>
                            <div class="icon"> <i class="fa fa-plus" aria-hidden="true"></i> </div>
                        </div>
                        <div class="team-description">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent urna diam, maximus ut ullamcorper quis, placerat id eros. Duis semper justo sed condimentum rutrum. Nunc tristique purus turpis. Maecenas vulputate. </p>
                        </div>
                        <hr class="my-0"> </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="hover-team">
                        <div class="our-team"> <img src="{{ asset('image/img-1.jpg') }}" alt="" />
                            <div class="team-content">
                                <h3 class="title">Williamson</h3> <span class="post">Nhân Viên Cửa Hàng</span> </div>
                            <ul class="social">
                                <li>
                                    <a href="#" class="fab fa-facebook"></a>
                                </li>
                                <li>
                                    <a href="#" class="fab fa-twitter"></a>
                                </li>
                                <li>
                                    <a href="#" class="fab fa-google-plus"></a>
                                </li>
                                <li>
                                    <a href="#" class="fab fa-youtube"></a>
                                </li>
                            </ul>
                            <div class="icon"> <i class="fa fa-plus" aria-hidden="true"></i> </div>
                        </div>
                        <div class="team-description">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent urna diam, maximus ut ullamcorper quis, placerat id eros. Duis semper justo sed condimentum rutrum. Nunc tristique purus turpis. Maecenas vulputate. </p>
                        </div>
                        <hr class="my-0"> </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End About Page -->
@endsection