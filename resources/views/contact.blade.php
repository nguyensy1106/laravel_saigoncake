@EXTENDS('layouts.master')
@section('content') 
    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Liên Hệ</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"> Liên Hệ </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Contact Us  -->
    <div class="contact-box-main">
        <div class="container">
            @if (Session::has('flash_message'))
                    <div class="alert alert-success">{{ Session::get('flash_message') }}</div>
                @endif
            <div class="row">
                <div class="col-lg-8 col-sm-12">
                    <div class="contact-form-right">
                        <h2>Liên Hệ Với Chúng Tôi</h2>
                        <p>Chúng tôi luôn sẵn sàng lắng nghe mọi ý kiến đóng góp của bạn về cửa hàng để giúp chúng tôi có thể mang lại phục vụ tốt nhất dành cho bạn.Nếu bạn có bất cứ câu hỏi nào, xin vui lòng điền vào form mẫu dưới đây. Chúng tôi sẽ cố gắng phản hồi bạn nhanh nhất có thể.</p>
                        <form action="{{ route('post_contact') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Họ Tên" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="email" placeholder="Email" id="email" class="form-control" name="email" required >
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="subject" name="subject" placeholder="Tiêu Đề (subject)" required >
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea class="form-control" id="message" name="content" placeholder="Nội Dung Phản Hồi" rows="4"  required></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="submit-button text-center">
                                        <button class="btn hvr-hover" name="gui" type="submit">Gửi</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
				<div class="col-lg-4 col-sm-12">
                    <div class="contact-info-left">
                        <h2>Thông Tin Liên Hệ</h2>
                        <ul>
                            <li>
                                <p><i class="fas fa-map-marker-alt"></i>Địa Chỉ: 18A Phan Văn Trị, Phường 10<br>Quận Gò Vấp,<br> TP Hồ Chí Minh</p>
                            </li>
                            <li>
                                <p><i class="fas fa-phone-square"></i>Phone: <a href="tel:+84824591678">+84824591678</a></p>
                            </li>
                            <li>
                                <p><i class="fas fa-envelope"></i>Email: <a href="mailto:nguyensy111222@gmail.com">nguyensy111222@gmail.com</a></p>
                            </li>
                        </ul>
                    </div>
                    <div class="mt-2">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.710003772845!2d106.67024091462312!3d10.833490392282869!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317529a99befa405%3A0x486e66b931a76615!2zMThBIMSQLiBQaGFuIFbEg24gVHLhu4ssIFBoxrDhu51uZyAxMCwgR8OyIFbhuqVwLCBUaMOgbmggcGjhu5EgSOG7kyBDaMOtIE1pbmgsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1604246969183!5m2!1svi!2s" width="350" height="400" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Cart -->
@endsection