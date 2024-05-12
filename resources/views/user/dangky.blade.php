<!-- Register modal -->
<div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<form method="post" action="{{ route('register') }}" class="needs-validation" novalidate>
			@csrf
			<div class="modal-content">
				<div class="modal-header text-center">
					<h4 class="modal-title w-100 font-weight-medium text-left">Đăng ký</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body mx-3">
					<div class="md-form mb-4">
						<input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="Họ tên" required />
						@error('name')
						<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
						@enderror
					</div>
					<div class="md-form mb-4">
						<input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="Địa chỉ email" required />
						@error('email')
						<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
						@enderror
					</div>
					<div class="md-form mb-4">
						<input type="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}" placeholder="Số điện thoại" required />
						@error('phone')
						<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
						@enderror
					</div>
					<div class="md-form mb-4">
						<input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Mật khẩu" required />
						@error('password')
						<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
						@enderror
					</div>
					<div class="md-form mb-4">
						<input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password-confirm" name="password_confirmation" placeholder="Xác nhận mật khẩu" required />
						@error('password_confirmation')
						<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
						@enderror
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
					<button class="btn btn-primary" type="submit">Đăng ký</button>
				</div>
		</form>
	</div>
</div>
</div>