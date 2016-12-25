<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="{{ URL::asset('images/favicon.ico')}}">
	<meta property=”fb:admins” content=”id_fb_cua_ban” />
	<title>Sinh viên Đà Nẵng !</title>
	<link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('css/bootstrap-theme.min.css')}}">
	<link rel="stylesheet" href="{{ URL::asset('css/style.css')}}">
</head>
<body>
	<script type="text/javascript">
		function isNumberKey(evt){
			var charCode = (evt.which) ? evt.which : event.keyCode;
			if(charCode == 59 || charCode == 46)
				return true;
			if (charCode > 31 && (charCode < 48 || charCode > 57))
				return false;
			return true;
		}
	</script>

	<script>
		window.fbAsyncInit = function() {
			FB.init({
				appId      : '778286405670333',
				xfbml      : true,
				version    : 'v2.7'
			});
		};

		(function(d, s, id){
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) {return;}
			js = d.createElement(s); js.id = id;
			js.src = "//connect.facebook.net/en_US/sdk.js";
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script>

	<div id="fb-root"></div>
	<script>(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.7&appId=778286405670333";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>

	<nav class="navbar navbar-inverse navbar-fixed-top" >
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="{{ url('/') }}">Sinh viên DaNang</a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">					
					<li><a href="{{ url('/confessions') }}">Confessions</a></li>
					<li><a href="{{ url('/thongbao') }}">Thông báo</a></li>
					<li><a href="{{ url('/lienhe') }}">Liên hệ</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Tìm kiếm  <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="{{ url('/search-nu') }}">Nữ</a></li>
							<li><a href="{{ url('/search-nam') }}">Nam</a></li>
							<li><a href="{{ url('/search-nangcao') }}">Tìm kiếm nâng cao</a></li>
						</ul>
					</li>															
				</ul>

				<a href="{{ url('/dangki') }}"><button type="button" class="btn btn-default navbar-btn navbar-right">Đăng kí</button></a>

				<form class="navbar-form navbar-right" style="padding-right: 35px;" action="{{ url('/search-sdt') }}" method="post">
					{{ csrf_field() }}
					<div class="form-group">
						<input required type="text" class="form-control" placeholder="Nhập số điện thoại" name="searchsdt" value="{{ old('searchsdt') }}" onkeypress=" return isNumberKey(event)">
					</div>
					<button type="submit" class="btn btn-default">Xem thông tin</button>
				</form>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>

	<!-- body -->
	<div class="bodybody">
		<div class="container-fluid">
			@yield('content')
		</div>
	</div>	
	<!-- end body -->

	<!-- footer -->	
	<nav class="navbar navbar-inverse navbar-bottom">
		<div class="container">
			<p style="color: white; margin: 15px auto; text-align: center">&copy; 2016 Sinh viên Đà Nẵng | henhosvdn@gmail.com</p>
		</div>
	</nav>
	<!-- end footer -->

	<!-- Scripts -->
	<script type="text/javascript" src="{{URL::asset('js/jquery-3.1.0.min.js')}}"></script>
	<script type="text/javascript" src="{{ URL::asset('js/bootstrap.min.js')}}"></script>
</body>
</html>
