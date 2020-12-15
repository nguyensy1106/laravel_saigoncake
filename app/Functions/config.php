<?php

	header("Content-Type: text/html; charset=utf-8");
	define('NGANLUONG_URL', 'https://sandbox.nganluong.vn:8088/nl35/checkout.php');
	define('RECEIVER','nguyensy111222@gmail.com'); // Email tài khoản Ngân Lượng
	define('MERCHANT_ID', '49743'); // Mã kết nối
	define('MERCHANT_PASS', '912cb80577e7425b61f1739cbd32c58b'); // Mật khẩu kết nối 
?>

<!-- http://127.0.0.1:8000/checkout/success.php?
transaction_info=Thong+tin+giao+dich
&order_code=EG20201124HD14
&price=360000
&payment_id=19803244
&payment_type=2
&error_text=
&secure_code=025a05e82e83517962dbab45910a18ae
&token_nl=245291-5a5d624873203448dacc9b96e35db2bb -->