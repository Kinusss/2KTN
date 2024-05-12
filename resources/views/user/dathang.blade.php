@extends('layouts.frontend')

@section('title', 'Thanh toán')

@section('content')
<nav aria-label="breadcrumb" class="w-100 float-left">
	<ol class="breadcrumb parallax justify-content-center" data-source-url="{{ asset('public/Customer/img/banner/parallax.jpg') }}" style="background-image: url(&quot;img/banner/parallax.jpg&quot;); background-position: 50% 0.809717%;">
		<li class="breadcrumb-item active"><a href="#">Trang chủ</a></li>
		<li class="breadcrumb-item active" aria-current="page">Thanh toán</li>

	</ol>
</nav>

<div class="checkout-inner float-left w-100">
	<div class="container">
		<div class="row">
			<div class="cart-block-left col-md-4 order-md-2 mb-4">
				<h4 class="d-flex justify-content-between align-items-center mb-3">
					<span>Giỏ hàng của bạn</span>
				</h4>
				<div class="list-group mb-3">
					@foreach(Cart::content() as $value)
					<div class="list-group-item d-flex justify-content-between lh-condensed">
						<div>
							<h6 class="my-0">{{ $value->name }}</h6>
						</div>
						<span class="text-muted">{{ number_format($value->price, 0, ',', '.') }}<small>đ</small></span>
						<span class="text-muted">x {{ $value->qty }}</span>
					</div>
					@endforeach
					<div class="list-group-item d-flex justify-content-between">
						<strong>Tổng tiền</strong>
						<strong>{{ Cart::priceTotal() }}<small>đ</small></strong>
					</div>
					<a href="#checkout" class="btn btn-primary btn-lg btn-primary" onclick="event.preventDefault();document.getElementById('checkout-form').submit();">Hoàn tất thanh toán</a>
					</ul>
					<!--<form class="card p-2">
<div class="input-group">
  <input type="text" class="form-control" placeholder="Promo code">
  <div class="input-group-append">
	<button type="submit" class="btn btn-secondary btn-primary">Redeem</button>
  </div>
</div>
</form>-->
				</div>
			</div>
			<div class="cart-block-right col-md-8 order-md-1">
				<h4 class="mb-3">Thông tin giao hàng</h4>
				<form id="checkout-form" method="post" action="{{ route('user.dathang') }}" class="needs-validation" novalidate="">
					@csrf
					<div class="row">
						<div class="col-md-12 mb-3">
							<label for="firstName">Họ tên <span class="required">*</span></label>
							<input class="form-control" type="text" id="HoVaTen" value="{{ Auth::user()->name ?? '' }}" disabled />
						</div>
					</div>

					<div class="mb-3">
						<label for="address">Địa chỉ<span class="required">*</span></label>
						<input class="form-control @error('diachigiaohang') is-invalid @enderror" type="text" id="diachigiaohang" name="diachigiaohang" required />
						@error('diachigiaohang')
						<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
						@enderror
					</div>

					<div class="mb-3">
						<label for="address">Số điện thoại<span class="required">*</span> </label>
						<input class="form-control @error('dienthoaigiaohang') is-invalid @enderror" type="text" id="dienthoaigiaohang" name="dienthoaigiaohang" required />
						@error('dienthoaigiaohang')
						<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
						@enderror
					</div>
					<hr class="mb-4">


				</form>
			</div>
		</div>
	</div>
</div>
@endsection