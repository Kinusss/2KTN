@extends('layouts.frontend')

@section('title', 'Sản phẩm chi tiết')

@section('content')
	<nav aria-label="breadcrumb" class="w-100 float-left">
  <ol class="breadcrumb parallax justify-content-center" data-source-url="{{ asset('public/Customer/img/banner/parallax.jpg') }}" style="background-image: url(&quot;img/banner/parallax.jpg&quot;); background-position: 50% 0.809717%;">
    <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">Trang chủ</a></li>
    <li class="breadcrumb-item" href="{{ route('frontend.sanpham') }}">Sản Phẩm</li>
	<li class="breadcrumb-item active" aria-current="page">{{ $sanpham->tensanpham }}</li>
  </ol>
</nav>
	<div class="product-deatils-section float-left w-100">
		<div class="container">
			<div class="row">
				<div class="left-columm col-lg-5 col-md-5">
					<div class="product-large-image tab-content">
						<div class="tab-pane active" id="product-01" role="tabpanel" aria-labelledby="product-tab-01">
							<div class="single-img img-full">
								<a href="{{ env('APP_URL') . '/storage/app/' . $sanpham->hinhanh }}"><img src="{{ env('APP_URL') . '/storage/app/' . $sanpham->hinhanh }}" class="img-fluid zoomImg" alt=""></a>
							</div>
						</div>
					</div>
				</div>
				<div class="right-columm col-lg-7 col-md-7">
					<div class="product-information">
					<h4 class="product-title text-capitalize float-left w-100"><a href="product-details.html" class="float-left w-100">{{ $sanpham->tensanpham }}</a></h4>
					<div class="description">
					{{ $sanpham->motasanpham }}
					</div>
					<div class="rating">
						<div class="product-ratings d-inline-block align-middle">
							@for ($i = 1; $i <= 5; $i++)
								<span class="fa fa-stack">
									<i class="material-icons off {{ $i <= $sanpham->rating ? 'active' : '' }}">star</i>
								</span>
							@endfor
						</div>
						<a href="#" class="review-down">Đánh giá của khách hàng</a>
					</div>
																<div class="price float-left w-100 d-flex">
												<div class="regular-price">{{ number_format($sanpham->dongia, 0, ',', '.') }}<small>đ</small></div>
											</div>
					<form method="post" action="{{ route('frontend.giohang.them', ['tensanpham_slug' => $sanpham->tensanpham_slug]) }}">
						@csrf
						<div class="btn-cart d-flex align-items-center float-left w-100"> 
							<label for="quantity">Số lượng:</label>
							<input id="quantity" name="quantity" value="1" type="number" min="1" max="10">
							<button type="submit" class="btn btn-primary btn-cart m-0">
								<i class="material-icons">shopping_cart</i> Thêm vào giỏ hàng
							</button>
						</div>
					</form>
					</div>

				</div>
			</div>
		</div>
	</div>
	<div class="product-tab-area float-left w-100">
	<div class="container">
					<div class="tabs">
					<ul class="nav nav-tabs justify-content-start">
						<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#product-tab1" id="tab1"><div class="tab-title">Mô tả sản phẩm</div></a></li>
						<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#product-tab2" id="tab2"><div class="tab-title">Đánh giá (1)</div></a></li>
					</ul>
				</div>
					<div class="tab-content float-left w-100">
					  <div class="tab-pane active" id="product-tab1" role="tabpanel" aria-labelledby="tab1">
							<div class="description">
							{{ $sanpham->motasanpham }}							
							</div>
					  </div>
					  <div class="tab-pane" id="product-tab2" role="tabpanel" aria-labelledby="tab2">
					  	<div class="reviews-tab  float-left w-100">
							<div class="ttreview-tab float-left w-100 p-30">
							  <h2>Đánh giả của khách hàng</h2>
							  <div class="rating float-left w-100">
													<div class="product-ratings d-inline-block align-middle">
														<span class="fa fa-stack"><i class="material-icons">star</i></span>
													   <span class="fa fa-stack"><i class="material-icons">star</i></span>
													   <span class="fa fa-stack"><i class="material-icons">star</i></span>
													   <span class="fa fa-stack"><i class="material-icons off">star</i></span>
													   <span class="fa fa-stack"><i class="material-icons off">star</i></span>
													</div>
													</div>
							  <div class="review-title float-left w-100"><span class="user">admin</span> <span class="date">– February 14, 2019</span></div>
							  <div class="review-desc  float-left w-100">Sản phẩm ok </div>
							</div>
							  <form action="#" class="rating-form float-left w-100">
                                    <h5>Thêm đánh giá của bạn</h5>
<div class="rating">
	<div class='rating-stars text-left'>
    <ul id='stars'>
		<li class='star' title='Poor' data-value='1'>
	<i class="material-icons">star</i>
		</li>
		<li class='star' title='Fair' data-value='2'>
	<i class="material-icons">star</i>
		</li>
		<li class='star' title='Good' data-value='3'>
	<i class="material-icons">star</i>
		</li>
		<li class='star' title='Excellent' data-value='4'>
	<i class="material-icons">star</i>
		</li>
		<li class='star' title='WOW!!!' data-value='5'>
	<i class="material-icons">star</i>
		</li>
    </ul>
	</div>
	<div class='success-box'>
    <div class='clearfix'></div>
    <div class='text-message text-success'></div>
    <div class='clearfix'></div>
	</div>
	</div>                                   
		<div class="row d-block">
		
		<div class="col-sm-6 float-left form-group">
			<label>Họ tên <span class="required">*</span></label>
			<input type="text" value="{{ Auth::user()->name ?? '' }}" disabled >
		</div>
		<div class="col-sm-6 float-left form-group">
			<label>Email <span class="required">*</span></label>
			<input type="email" value="{{ Auth::user()->email ?? '' }}" disabled>
		</div>
		<div class="col-sm-12 float-left form-group">
			<label for="r-textarea">Đánh giá của bạn</label>
			<textarea name="review" id="r-textarea" cols="30" rows="10" class="w-100"></textarea>
		</div>
		</div>
			<input type="submit" class="btn btn-primary submit" value="Submit Review">
	</form>
</div>
</div>
	</div>
	</div>
	</div>
@endsection