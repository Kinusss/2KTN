@extends('layouts.frontend')

@section('title', 'Hồ sơ khách hàng')

@section('content')
	 <nav aria-label="breadcrumb" class="w-100 float-left">
        <ol class="breadcrumb parallax justify-content-center" data-source-url="{{ asset('public/Customer/img/banner/parallax.jpg') }}" style="background-image: url(&quot;img/banner/parallax.jpg&quot;); background-position: 50% 0.809717%;">
            <li class="breadcrumb-item"><a href="{{route('frontend.home')}}">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Hồ sơ cá nhân</li>
        </ol>
    </nav>
 <div class="main-content w-100 float-left blog-list">
        <div class="container">
            <div class="row">

                <div class="products-grid col-xl-9 col-lg-8 order-lg-2">
                    <div class="row">
                        <div class="col-lg-12 order-lg-last account-content">
                            <h4>Chỉnh sửa thông tin cá nhân</h4>
                           		<form action="{{ route('user.hosocanhan') }}" method="post" class="needs-validation" novalidate>


                                <!-- End .row -->
                             
                                <div class="form-group required-field">
									<label class="form-label" for="name">Họ và tên</label>
									<input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $nguoidung->name }}" required />
									@error('name')
									<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
									@enderror
								</div>
								 <div class="form-group required-field">
									<label class="form-label" for="name">Số điện thoại</label>
									<input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ $nguoidung->phone }}" required />
									@error('phone')
									<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
									@enderror
								</div>
                                <div class="form-group required-field">
                                    <label class="form-label" for="email">Địa chỉ email</label>
									<input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $nguoidung->email }}" required />
									@error('email')
									<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
									@enderror
                                </div>

                              
                                <!-- End .form-group -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="change-password-checkbox" value="1">
                                    <label class="custom-control-label " for="change-password-checkbox">Thay đổi mật khẩu</label>
                                </div>
                                <!-- End .custom-checkbox -->

                                <div id="account-change-password" class="">
                                    <h4>Thay đổi mật khẩu</h4>
									<div class="form-group required-field">
                                    	<div class="col-12">
												<label class="form-label" for="password">Mật khẩu mới</label>
											<div class="password-toggle">
												<input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Bỏ trống nếu muốn giữ nguyên mật khẩu cũ." />
												
											</div>
										</div>
									@error('password')
											<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
									@enderror
										</div>
										<div class="form-group required-field">
									<div class="col-12">
											<label class="form-label" for="password-confirm">Xác nhận mật khẩu mới</label>
										<div class="password-toggle">
											<input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password-confirm" name="password_confirmation" placeholder="Bỏ trống nếu muốn giữ nguyên mật khẩu cũ." />
										</div>
										</div>
										@error('password_confirmation')
										<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
										@enderror
									</div>
                                    <!-- End .row -->
                                </div>
                                <!-- End #account-chage-pass -->

                                <div class="form-footer d-flex justify-content-between align-items-center">
                                    <a href="{{route('frontend.home')}}"><i class="material-icons">navigate_before</i>Quay lại</a>

                                    <div class="form-footer-right">
                                        <button class="btn btn-primary mt-3 mt-sm-0" type="submit"><i class="ci-check-circle me-2"></i>cập nhật thông tin</button>
                                    </div>
                                </div>
								@csrf
                                <!-- End .form-footer -->
                            </form>
                        </div>
                    </div>
                </div>
				<div class="sidebar col-xl-3 col-lg-3 order-lg-1">
					<div class="sidebar-product left-sidebar w-100 float-left">
					<div class="title">
					<a data-toggle="collapse" href="#sidebar-product" aria-expanded="false" aria-controls="sidebar-product" class="d-lg-none block-toggler">sale products</a>
					</div>
					<div id="sidebar-product" class="collapse w-100 float-left">
					<div class="sidebar-block sale products">
					
					<h3 class="widget-title">Giỏ hàng của bạn</h3>
					@if(Cart::count() > 0)
						@foreach(Cart::content() as $value)
							<div class="product-layouts">
								<div class="product-thumb">
									<div class="image col-sm-4 float-left">
										<a href="#">
											<img src="{{ env('APP_URL') . '/storage/app/' . $value->options->image }}" alt="01"/></a></div>
									<div class="thumb-description col-sm-8 text-left float-left">
										<div class="caption">
											<h4 class="product-title text-capitalize"><a href="product-details.html">{{ $value->name }}</a></h4>
										</div>
										<div class="price">
											<div class="regular-price">{{ number_format($value->price, 0, ',', '.') }}<small>đ</small></div>
											<div class="regular-price">x {{ $value->qty }}</div>
										</div>
									</div>
								</div>
							</div>
						@endforeach
					@else
						Chưa có sản phẩm
					@endif
					</div>
					</div>
					</div>
				</div>

            </div>
        </div>
    </div>
@endsection