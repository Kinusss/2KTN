<!-- Login modal -->
<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<form method="post" action="{{ route('login') }}" class="needs-validation" novalidate>
			@csrf
			@if(session('warning'))
			<div class="alert alert-danger fs-base" role="alert">
				<i class="ci-close-circle me-2"></i>{{ session('warning') }}
			</div>
			@endif
			@if($errors->has('email') || $errors->has('username'))
			<div class="alert alert-danger fs-base" role="alert">
				<i class="ci-close-circle me-2"></i>{{ empty($errors->first('email')) ? $errors->first('username') : $errors->first('email') }}
			</div>
			@enderror
			<div class="modal-content">
				<div class="modal-header text-center">
					<h4 class="modal-title w-100 font-weight-medium text-left">Đăng nhập</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<div class="modal-body mx-3">
					<div class="md-form mb-4">
						<input type="text" class="form-control rounded-start {{ ($errors->has('email') || $errors->has('username')) ? 'is-invalid' : '' }}" id="email" name="email" value="{{ old('email') }}" placeholder="Email, Tên đăng nhập hoặc Điện thoại" required />
					</div>
					<div class="md-form mb-4">
						<input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Mật khẩu" required />
					</div>
					<div class="checkbox-link d-flex justify-content-between">
						<div class="left-col">
							<input type="checkbox" name="remember" id="remember_me" {{ old('remember') ? 'checked' : '' }}><label for="remember_me">Duy trì đăng nhập</label>
						</div>
						@if (Route::has('password.request'))
						<div class="right-col"><a href="{{ route('password.request') }}">Quên mật khẩu?</a></div>
						@endif
					</div>
				</div>

				<div class="modal-footer d-flex justify-content-center">
					<button class="btn btn-primary" type="submit">Đăng nhập</button>
				</div>
		</form>
	</div>

</div>
</div>