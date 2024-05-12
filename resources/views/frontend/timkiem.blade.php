@extends('layouts.frontend')

@section('title', 'Sản phẩm')

@section('content')
	<nav aria-label="breadcrumb" class="w-100 float-left">
	  <ol class="breadcrumb parallax justify-content-center" data-source-url="{{ asset('public/Customer/img/banner/parallax.jpg') }}" style="background-image: url(&quot;img/banner/parallax.jpg&quot;); background-position: 50% 0.809717%;">
		<li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
		<li class="breadcrumb-item active" aria-current="page">Sản phẩm</li>
	  </ol>
	</nav>	
		
	<div class="main-content w-100 float-left"> 
		<div class="container">
			<div class="row">
				<div class="content-wrapper col-xl-12 col-lg-12 order-lg-2">
				<div class="tab-content text-center products w-100 float-left category-col-5">
				<div class="tab-pane grid fade active" id="grid" role="tabpanel">
					<div class="row">
						@foreach ($loaisanpham as $lsp)
							<a href="{{ route('frontend.sanpham.phanloai', ['tenloai_slug' => $lsp->tenloai_slug]) }}" @if($selectedCategory == $lsp) class="font-weight-bold" @endif></a>
						@endforeach
						@forelse($sanpham as $sp)
						<div class="product-layouts col-lg-3 col-md-3 col-sm-6 col-xs-6">
							<div class="product-thumb">
								<div class="image zoom">
									<a href="{{ route('frontend.sanpham.chitiet', ['tenloai_slug' => $sp->loaisanpham->tenloai_slug, 'tensanpham_slug' => $sp->tensanpham_slug]) }}">
										<img src="{{ env('APP_URL') . '/storage/app/' . $sp->hinhanh }}"/>										
									</a>										
								</div>
								<div class="thumb-description">
									<div class="caption">
										<h4 class="product-title text-capitalize"><a href="{{ route('frontend.sanpham.chitiet', ['tenloai_slug' => $sp->loaisanpham->tenloai_slug, 'tensanpham_slug' => $sp->tensanpham_slug]) }}">{{ $sp->tensanpham }}</a></h4>
									</div>
									<div class="rating">
										<div class="product-ratings d-inline-block align-middle">
										<span class="fa fa-stack"><i class="material-icons">star</i></span>
									   <span class="fa fa-stack"><i class="material-icons">star</i></span>
									   <span class="fa fa-stack"><i class="material-icons">star</i></span>
									  <span class="fa fa-stack"><i class="material-icons off">star</i></span>
									  <span class="fa fa-stack"><i class="material-icons off">star</i></span>											   </div>
									</div>
									<div class="price">
										<span class="text-accent">{{ number_format($sp->dongia, 0, ',', '.') }}<small>đ</small></span>
									</div>
									<form method="post" action="{{ route('frontend.giohang.them', ['tensanpham_slug' => $sp->tensanpham_slug]) }}">
									@csrf
										<div class="button-wrapper">
											<div class="button-group">
												<button type="submit" class="btn btn-primary btn-cart"><i class="material-icons">shopping_cart</i></button>
											</div>										
										</div>
									</form>
								</div>
							</div>
						</div>
						@empty
							Không tìm thấy kết quả: <strong>{{ request()->query('search') }}</strong>
						@endforelse
					</div>
				</div>
				<div class="pagination-wrapper float-left w-100">
				<p>Showing 1 to 9 of 11 (2 Pages)</p>
				<nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span>
      </a>
    </li>
    <li class="page-item active"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span>
      </a>
    </li>
  </ul>
</nav>
				</div>
				</div>
				
			</div>
		</div>
		</div>
@endsection