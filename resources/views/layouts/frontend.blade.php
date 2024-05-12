<!doctype html>
<html lang="en">
  <head>
  	<title>2KTN WatchShop</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('public/Customer/img/cartlon.png') }}">
	<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700,900" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,500,700,900" rel="stylesheet"> 
	
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">	
	<!-- Bootstrap core CSS -->
    <link href="{{ asset('public/Customer/vendor/bootstrap/css/bootstrap.css') }}" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('public/Customer/css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('public/Customer/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('public/Customer/css/owl-carousel.css') }}" rel="stylesheet">
	<link href="{{ asset('public/Customer/css/lightbox.css') }}" rel="stylesheet">
    <!-- Custom styles for this template -->
  </head>

  <body class="index layout2">
  	
	<header class="header-area header-sticky text-center header2">
	<div class="header-main-sticky">
	
	<div class="header-main-head">
	
    <div class="header-main">
	<div class="container">
		<div class="header-left text-center mx-auto d-inline-block">
			<div class="logo">
				<a href="{{ route('frontend.home') }}"><img src="{{ asset('public/Customer/img/logos/logoCus.png') }}" alt="NatureCircle"></a>	
			</div>		
		</div>
		<div class="header-middle float-left">
		<div class="leftmenu">
            <button id="menu"></button>
          </div>
		  <div class="menu">
		<!-- Navbar -->
		<nav class="navbar navbar-expand-lg navbar-light d-sm-none d-xs-none d-lg-block navbar-full">
		
		<!-- Navbar brand -->
		<a class="navbar-brand text-uppercase d-none" href="#">Navbar</a>
		
		<!-- Collapse button -->
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent2"
		aria-controls="navbarSupportedContent2" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>		</button>
		
		<!-- Collapsible content -->
		<div class="collapse navbar-collapse">
		
		<!-- Links -->
		<ul class="navbar-nav m-auto justify-content-center">
		<li class="nav-item dropdown active">
		<a class="nav-link text-uppercase" href="{{ route('frontend.home') }}">
			Trang Chủ
		  <span class="sr-only">(current)</span>        </a>
		</li>
		<li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle text-uppercase" href="{{ route('frontend.sanpham') }}">
			Sản Phẩm
		</a>
		<div class="dropdown-menu mega-menu v-2 z-depth-1 special-color py-3 px-3">
			<div class="sub-menu mb-xl-0 mb-4">
				<ul class="list-unstyled">
				@foreach ($menu_loaisanpham as $value)
					<li>
						<a class="menu-item pl-0" href="{{ route('frontend.sanpham.phanloai', ['tenloai_slug' => $value->tenloai_slug]) }}">
							{{ $value->tenloai }}               
						</a>                	
					</li>
				@endforeach
				</ul>
			</div>
		</div>
		</li>

		<li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle text-uppercase" href="{{ route('frontend.baiviet') }}">
			Tin Tức
		</a>
		<div class="dropdown-menu mega-menu v-2 z-depth-1 special-color py-3 px-3">
			<div class="sub-menu mb-xl-0 mb-4">
				<ul class="list-unstyled">
				@foreach ($menu_chude as $value)
					<li>
						<a class="menu-item pl-0" href="{{ route('frontend.baiviet.chude', ['tenchude_slug' => $value->tenchude_slug]) }}">
							{{ $value->tenchude }}               
						</a>                	
					</li>
				@endforeach
				</ul>
			</div>
		</div>
		</li>
		<li class="nav-item dropdown">   
		<a class="nav-link text-uppercase" href="{{ route('frontend.lienhe') }}">Liên Hệ</a>
		
		</li>
		</ul>
		<!-- Links -->
		</div>
		<!-- Collapsible content -->
		</nav>
	</div>
		</div>    
		  
		 
		
		<div class="header-right d-flex d-xs-flex d-sm-flex justify-content-end float-right">
		<div class="search-wrapper"> 
			<a>
				<i class="material-icons search">search</i>
				<i class="material-icons close">close</i>			
			</a>
			<form action="{{ route('frontend.timkiem') }}" class="search-form">
				<input type="text" name="search" class="form-control" placeholder="Search here" value="{{ request()->query('search') }}">
			</form>
		</div>
		<div class="user-info">
		<button type="button" class="btn">
		<i class="material-icons">perm_identity</i>		</button>
		<div id="user-dropdown" class="user-menu">
		<div>
			@guest
				<div><a href="my-account.html" class="text-capitalize">Chưa Đăng Nhập</a></div>
				<li><hr class="dropdown-divider"></li>
				@if (Route::has('register'))
				<div><a href="{{ route('user.dangnhap') }}" class="modal-view button" data-toggle="modal" data-target="#modalRegisterForm">Đăng Ký</a></div>
				@endif
				<div><a href="{{ route('user.dangnhap') }}" class="modal-view button" data-toggle="modal" data-target="#modalLoginForm">Đăng Nhập</a></div>
				
			@else
				<div><a href="{{ route('user.home') }}" class="text-capitalize">{{ Auth::user()->name }}</a></div>
				<li><hr class="dropdown-divider"></li>
				<div><a href="{{ route('logout') }}" class="modal-view button" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Đăng Xuất</a>
					<form id="logout-form" action="{{ route('logout') }}" method="post" class="d-none">
						@csrf
					</form>
				</div>
			@endguest
		</div>
		</div>
		</div>
		<div class="cart-wrapper">
			<button type="button" class="btn">
				<i class="material-icons">shopping_cart</i>
				<span class="ttcount">{{ Cart::count() ?? 0 }}</span>			
			</button>
			<div id="cart-dropdown" class="cart-menu">
				@if(Cart::count() > 0)
					<ul class="w-100 float-left">
						<li>
							@foreach(Cart::content() as $value)
							<table class="table table-striped">
								<tbody>
									<tr>
										<td class="text-center"><a href="#"><img src="{{ env('APP_URL') . '/storage/app/' . $value->options->image }}" alt="01" title="01"></a></td>
										<td class="text-left product-name"><a href="#">{{ $value->name }}</a> 						  	
											<div class="quantity float-left w-100">
												<span class="cart-qty">{{ $value->qty }} × </span>
												<span class="text-left price">{{ number_format($value->price, 0, ',', '.') }}<small>đ</small></span>					    
											</div>                          
										</td>
										<td class="text-center close"><a class="close-cart"><i class="material-icons">close</i></a></td>
									</tr>
								</tbody>
							</table>
							@endforeach
						</li>
						<li>
							<table class="table price mb-30">
								<tbody>
									<tr>
										<td class="text-left"><strong>Tổng cộng</strong></td>
										<td class="text-right"><strong>{{ Cart::priceTotal() }}<small>đ</small></strong></td>
									</tr>
								</tbody>
							</table>
						</li>
						<div class="buttons w-100 float-left">
							<a href="{{ route('frontend.giohang') }}" class="btn mt_10 btn-primary btn-rounded float-left">Xem giỏ hàng</a>
							<a href="{{ route('user.dathang') }}" class="btn mt_10 btn-primary btn-rounded float-right">Thanh toán</a>
						</div>
					</ul>
					
				@else	
					<ul class="w-100 float-left">
						<li>
							<table class="table price mb-30">
								<tbody>
									<tr>
										<td class="text-center"><strong>Chưa có sản phẩm trong giở hàng</strong></td>
									</tr>
								</tbody>
							</table>
						</li>
					</ul>
				@endif
			</div>
		</div>
		</div>
	</div>
	</div> 
	
	</div>
	</div>
	</header>
    <main>
		@yield('content')
    </main>

    <!-- Footer -->
	<div class="block-newsletter"> 
				
<footer class="page-footer font-small footer-default">
    <div class="container text-center text-md-left">
      <div class="row">
        <div class="col-md-3 footer-cms footer-column">
			<div class="ttcmsfooter">
				<div class="footer-logo"><img src="{{ asset('public/Customer/img/logos/logoCus.png') }}" alt="footer-logo"></div>
				<div class="footer-desc">Chào mừng đến cửa hàng đồng hồ </div>
				</div>
		</div>
        <div class="col-md-3 footer-column">
		<div class="title">
			<a href="#company" class="font-weight-normal text-capitalize mb-10" data-toggle="collapse" aria-expanded="false">CÔNG TY</a>		  </div>
			<ul id="company" class="list-unstyled collapse">
            <li>
				<a href="#">Tìm kiếm</a>            </li>
            <li>
				<a href="#">Sản phẩm mới</a>            </li>
            <li>
				<a href="{{ route('frontend.sanpham')}}">Bộ sưu tập nổi bật</a>            </li>
            <li>
				<a href="wishlist.html">Danh sách yêu thích</a>            </li>
			<li>
				<a href="blog-details.html">Thông tin cá nhân</a>		    </li>         
			</ul>
        </div>
        <div class="col-md-3 footer-column">
			<div class="title">
          <a href="#products" class="font-weight-normal text-capitalize mb-10" data-toggle="collapse" aria-expanded="false">Sản phẩm</a>		  </div>
          <ul id="products" class="list-unstyled collapse">
            <li>
              <a href="{{ route('frontend.baiviet')}}">Tin tức</a>            </li>
            <li>
              <a href="{{ route('frontend.lienhe')}}">Thông tin về chúng tôi</a>            </li>
            <li>
              <a href="{{ route('frontend.lienhe')}}">Liên hệ</a>            </li>
            <li>
              <a href="{{ route('user.home')}}">Tài khoản của tôi</a>            </li>
	<li>
		<a href="{{ route('frontend.lienhe')}}">Địa chỉ</a>            </li>         
			</ul>

        </div>
		
        <div class="col-md-3 footer-column">
		<div class="title">
          <a href="#information" class="font-weight-normal text-capitalize mb-10" data-toggle="collapse" aria-expanded="false">Thông tin shop</a>		  </div>
          <ul id="information" class="list-unstyled collapse">
            <li class="contact-detail links">
              <span class="address">
			  		<span class="icon"><i class="material-icons">location_on</i></span>
					<span class="data"> 69 Trần Hưng Đạo, Long Xuyên, An Giang</span>			  </span>            </li>
            <li class="links">
               <span class="contact">
			  		<span class="icon"><i class="material-icons">phone</i></span>
					<span class="data"><a href="tel:(99)55669999">+84 0123 456 888</a></span>			  </span>            </li>
            <li class="links">
               <span class="email">
			  		<span class="icon"><i class="material-icons">email</i></span>
					<span class="data"><a href="mailto:demo.store@gmail.com">demo.store@gmail.com</a></span>  </span>          </li>
          </ul>
        </div>
      </div>
    </div>
    <!-- Copyright -->
	<div class="footer-bottom-wrap">
		<div class="container">
		<div class="row">
		<div class="footer-copyright text-center py-3">
             Bản quyền &copy; {{ date('Y') }} - {{ config('app.name', 'Laravel') }}™
		</div>
		</div>
    </div>
	</div>
         <a href="#" id="goToTop" title="Back to top" class="btn-primary"><i class="material-icons arrow-up">keyboard_arrow_up</i></a> 


  </footer>
  <!-- Footer -->
  
@include('user.dangky')

@include('user.dangnhap')

<div class="compare-wrapper float-left w-100">
	<div class="compare-inner d-flex align-items-center p-20">
		<span class="close"><i class='material-icons'>
  close
</i></span>
		<div class="col-xs-12 col-sm-2 col-md-3 float-left d-flex align-items-center flex-column compare-left">
		<h2>compare products</h2>
		<div class="compare-btn">show all</div>
		</div>
		<div class="col-xs-12 col-sm-10 col-md-9 d-flex float-left align-items-center compare-right">
			<div class="compare-close-btn"></div>
			<div class="compare-products d-flex col-sm-7 col-lg-5">
			<div class="row">
				<div class="single-item col-sm-4 col-xs-4">
					<div class="remove"></div>
					<div class="image"><img src="{{ asset('public/Customer/img/products/dongho1.jpg') }}" class="img-fluid" alt=""></div>
				</div>
				<div class="single-item col-sm-4 col-xs-4">
					<div class="remove"></div>
					<div class="image"><img src="{{ asset('public/Customer/img/products/02.jpg') }}" class="img-fluid" alt=""></div>
				</div>
				<div class="single-item col-sm-4 col-xs-4">
					<div class="remove"></div>
					<div class="image"><img src="{{ asset('public/Customer/img/products/03.jpg') }}" class="img-fluid" alt=""></div>
				</div>
			</div>
			</div>
			<div class="buttons col-sm-5 col-lg-2">
				<div class="clear-btn btn btn-primary float-left w-100 mb-15">clear</div>
				<a href="compare.html" class="compare-btn btn btn-primary float-left w-100">compare</a>
			</div>
		</div>
	</div>
</div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
		<script src="{{ asset('public/Customer/js/jquery.min.js') }}"></script>
		<script src="{{ asset('public/Customer/js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('public/Customer/js/owl.carousel.min.js') }}"></script>
		<script src="{{ asset('public/Customer/js/custom.js') }}"></script>
		<script src="{{ asset('public/Customer/js/parallax.js') }}"></script>
		<script src="{{ asset('public/Customer/js/lightbox-2.6.min.js') }}"></script>
		<script src="{{ asset('public/Customer/js/ResizeSensor.min.js') }}"></script>
		<script src="{{ asset('public/Customer/js/theia-sticky-sidebar.min.js') }}"></script>
		<script src="{{ asset('public/Customer/js/inview.js') }}"></script>
		<script src="{{ asset('public/Customer/js/cookiealert.js') }}"></script>
		<script src="{{ asset('public/Customer/js/jquery.countdown.min.js') }}"></script>
		<script src="{{ asset('public/Customer/js/masonry.pkgd.min.js') }}"></script>
		<script src="{{ asset('public/Customer/js/imagesloaded.pkgd.min.js') }}"></script>
		<script src="{{ asset('public/Customer/js/jquery.zoom.min.js') }}"></script>
		<script src="{{ asset('public/Customer/js/jquery.lazy.min.js') }}"></script>
		<script src="{{ asset('public/Customer/js/jquery-ui.min.js') }}"></script>

		</body>
</html>