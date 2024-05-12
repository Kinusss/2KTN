<!doctype html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Đăng Nhập | 2KTN Watch Shop</title>
	<link href="{{ asset('public/Admin/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/Admin/css/auth.css') }}" rel="stylesheet">
	
</head>

<body>
    <div class="wrapper">
        <div class="auth-content">
            <div class="card">
                <div class="card-body text-center">
                    <div class="mb-4">
                        <img class="brand" src="{{ asset('public/Admin/img/logoAdmin.png') }}" alt="admin logo">
                    </div>
                    <h6 class="mb-4 text-muted">Đăng nhập tài khoản</h6>
                    <form method="POST" action="{{ route('login') }}">
						@csrf
                        <div class="mb-3 text-start">
                            <label class="form-label" for="email">Tài khoản</label>
							<input type="text" class="form-control {{ ($errors->has('email') || $errors->has('username')) ? 'is-invalid' : '' }}" id="email" name="email" value="{{ old('email') }}" placeholder="Email, Tên đăng nhập hoặc Điện thoại" required />
							@if($errors->has('email') || $errors->has('username'))
								<div class="invalid-feedback"><strong>{{ empty($errors->first('email')) ? $errors->first('username') : $errors->first('email') }}</strong></div>
							@enderror
                        </div>
                        <div class="mb-3 text-start">
                            <label class="form-label" for="password">Mật khẩu</label>
							<input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required />
							@error('password')
								<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
							@enderror
                        </div>
                        <div class="mb-3 text-start">
                            <div class="form-check">
                              <input type="checkbox" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} />
                              <label class="form-check-label" for="remember">
                                Ghi nhớ đăng nhập
                              </label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary shadow-2 mb-4">Đăng Nhập</button>
                    </form>
					@if (Route::has('password.request'))
						<p class="mb-2 text-muted">Quên mật khẩu? <a href="{{ route('password.request') }}">Reset</a></p>
					@endif
                    
                    <p class="mb-0 text-muted">Bạn không có tài khoản? <a href="{{ route('register') }}">Đăng Ký</a></p>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('public/Admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('public/Admin/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
	
</body>

</html>