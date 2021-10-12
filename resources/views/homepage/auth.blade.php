<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Pengelolan Laboratorium</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="{{ asset('assets/img/icon.ico') }}" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="{{ asset('assets/js/plugin/webfont/webfont.min.js') }}"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ["{{ asset('assets/css/fonts.min.css') }}"]},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
	
	<!-- CSS Files -->
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/atlantis.css') }}">
</head>
<body class="login">
	<div class="wrapper wrapper-login">
		<div class="container container-login animated fadeIn">
			@if (session('success'))
				<div class="alert alert-success">{{ session('success') }}</div>
			@endif
			@if (session('failed'))
				<div class="alert alert-danger">{{ session('failed') }}</div>
			@endif
			<h3 class="text-center">Halaman Login</h3>
			<div class="login-form">
				<form action="{{ route('verify.login') }}" method="post">
					@csrf
					<div class="form-group form-floating-label">
						<input id="username" name="username" type="text" class="form-control input-border-bottom" required autocomplete="off">
						<label for="username" class="placeholder">Username</label>
					</div>
					<div class="form-group form-floating-label">
						<input id="password" name="password" type="password" class="form-control input-border-bottom" required>
						<label for="password" class="placeholder">Password</label>
						<div class="show-password">
							<i class="icon-eye"></i>
						</div>
					</div>
	
					<div class="form-action mb-3">
						<button type="submit" class="btn btn-primary btn-rounded btn-login">Login</button>
					</div>
					<div class="login-account">
						<span class="msg">Belum punya akun?</span>
						<a href="#" id="show-signup" class="link">Daftar</a>
					</div>
				</form>
			</div>
		</div>

		<div class="container container-signup animated fadeIn">
			<h3 class="text-center">Halaman Registrasi</h3>
			<div class="login-form">
				<form action="{{ route('register') }}" method="post">
					@csrf
					<div class="form-group form-floating-label">
						<input  id="fullname" name="fullname" type="text" class="form-control input-border-bottom @error('fullname') is-invalid @enderror" required value="{{ old('fullname') }}">
						<label for="fullname" class="placeholder">Fullname</label>
						@error('fullname')
							<small class="text text-danger">{{ $message }}</small>
						@enderror
					</div>
					<div class="form-group form-floating-label">
						<input  id="username" name="username" type="text" class="form-control input-border-bottom @error('username') is-invalid @enderror" required value="{{ old('username') }}">
						<label for="username" class="placeholder">Username</label>
						@error('username')
							<small class="text text-danger">{{ $message }}</small>
						@enderror
					</div>
					<div class="form-group form-floating-label">
						<input  id="email" name="email" type="email" class="form-control input-border-bottom @error('email') is-invalid @enderror" required value="{{ old('email') }}">
						<label for="email" class="placeholder">Email</label>
						@error('email')
							<small class="text text-danger">{{ $message }}</small>
						@enderror
					</div>
					<div class="form-group form-floating-label">
						<input  id="password" name="password" type="password" class="form-control input-border-bottom @error('password') is-invalid @enderror" required>
						<label for="password" class="placeholder">Password</label>
						<div class="show-password">
							<i class="icon-eye"></i>
						</div>
						@error('password')
							<small class="text text-danger">{{ $message }}</small>
						@enderror
					</div>
					<div class="form-group form-floating-label">
						<input  id="cpassword" name="cpassword" type="password" class="form-control input-border-bottom @error('cpassword') is-invalid @enderror" required>
						<label for="cpassword" class="placeholder">Confirm Password</label>
						<div class="show-password">
							<i class="icon-eye"></i>
						</div>
						@error('cpassword')
							<small class="text text-danger">{{ $message }}</small>
						@enderror
					</div>
					<div class="form-action">
						<a href="#" id="show-signin" class="btn btn-danger btn-link btn-login mr-3">Batal</a>
						<button type="submit" class="btn btn-primary btn-rounded btn-login">Daftar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script src="{{ asset('assets/js/core/jquery.3.2.1.min.js') }}"></script>
	<script src="{{ asset('assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
	<script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
	<script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
	<script src="{{ asset('assets/js/atlantis.min.js') }}"></script>
</body>
</html>