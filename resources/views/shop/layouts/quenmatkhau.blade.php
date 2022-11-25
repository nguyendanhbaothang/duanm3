<!DOCTYPE HTML>
<html>
<head>
<title>Đăng nhập</title>
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
		       <h1>Email</h1>
			<div class="header-bottom">
				<div class="header-right w3agile">

					<div class="header-left-bottom agileinfo">

					 <form action="{{route('quenmatkhau')}}" method="post">
                        @csrf
						<input type="text" placeholder="Email"  name="email">


						<input type="submit" value="Gửi">
					</form>
                    <br>

				</div>
				</div>
			</div>
		</div>
</div>
</body>
</html>
