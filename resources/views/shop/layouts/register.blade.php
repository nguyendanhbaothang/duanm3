<!DOCTYPE HTML>
<html>
<head>
<title>Đăng kí</title>
<script src="{{asset('shop/js/jquery.min.js')}}"></script>
<link href="{{asset('shop/css/style.css')}}" rel="stylesheet" type="text/css" media="all"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Classy Login form Responsive, Login form web template, Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700' rel='stylesheet' type='text/css'>
</head>
<body>
<div class="header">
		<div class="header-main">
		       <h1>Đăng kí tài khoản</h1>
			<div class="header-bottom">
				<div class="header-right w3agile">

					<div class="header-left-bottom agileinfo">

					 <form action="{{route('shop.checkregister')}}" method="post">
                        @csrf
					<input type="text"  value="Họ và Tên"  name="name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Họ và Tên';}"/>
					<input type="text"  value="Email" name="email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}"/>
					<input type="text"  value="Số điện thoại" name="phone" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Số điện thoại';}"/>
					<input type="text"  value="Mật khẩu" name="password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Mật khẩu';}"/>
					<input type="text"  value="Nhập lại mật khẩu" name="confirmpassword" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Nhập lại mật khẩu';}"/>
						<div class="remember">
			             {{-- <span class="checkbox1">
							   <label class="checkbox"><input type="checkbox" name="" checked=""><i> </i>Nhớ mật khẩu</label>
						 </span>
						 <div class="forgot">
						 	<h6><a href="#">Quên mật khẩu?</a></h6>
						 </div> --}}
						<div class="clear"> </div>
					  </div>

						<input type="submit"value="Đăng kí">
					</form>
                    <br>
                    <p class="mt-20">Bạn đã có tài khoản ?<a href="{{route('viewlogin')}}"> Đăng nhập</a></p>
					<div class="header-left-top">
						<div class="sign-up"> <h2>or</h2> </div>

					</div>
					<div class="header-social wthree">
							<a href="#" class="face"><h5>Facebook</h5></a>
							<a href="#" class="twitt"><h5>Twitter</h5></a>
						</div>
				</div>
				</div>
			</div>
		</div>
</div>
</body>
</html>
