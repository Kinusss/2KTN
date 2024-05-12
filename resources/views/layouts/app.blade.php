<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name', 'Laravel') }}</title>
	<link rel="shortcut icon" type="image/x-icon" href="{{ asset('public/Admin/img/cartlon.png') }}">
    <link href="{{ asset('public/Admin/vendor/fontawesome/css/fontawesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/Admin/vendor/fontawesome/css/solid.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/Admin/vendor/fontawesome/css/brands.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/Admin/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/Admin/css/master.css') }}" rel="stylesheet">
    <link href="{{ asset('public/Admin/vendor/flagiconcss/css/flag-icon.min.css') }}" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <div class="wrapper">
        <nav id="sidebar" class="active">
            <div class="sidebar-header">
                <img src="{{ asset('public/Admin/img/logoAdmin.png') }}" alt="bootraper logo" class="app-logo">
            </div>
            <ul class="list-unstyled components text-secondary">
                <li>
                    <a href="{{ route('admin.home') }}"><i class="fas fa-home"></i> Trang Chủ</a>
                </li>
                <li>
                    <a href="{{ route('admin.loaisanpham') }}"><i class="fas fa-cubes"></i> Loại Sản Phẩm</a>
                </li>
				<li>
                    <a href="{{ route('admin.hangsanxuat') }}"><i class="fas fa-chart-bar"></i> Hãng Sản Xuất</a>
                </li>
				<li>
                    <a href="{{ route('admin.sanpham') }}"><i class="fas fa-cube"></i> Sản Phẩm</a>
                </li>
				<li>
                    <a href="{{ route('admin.tinhtrang') }}"><i class="fas fa-clipboard-list"></i> Tình Trạng</a>
                </li>
				<li>
                    <a href="{{ route('admin.donhang') }}"><i class="fas fa-money-bill-alt"></i> Đơn Hàng</a>
                </li>
				<li>
                    <a href="#authmenu" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle no-caret-down"><i class="fas fa-user-shield"></i> Quản lý bài viết</a>
                    <ul class="collapse list-unstyled" id="authmenu">
                        <li>
                            <a href="{{ route('admin.chude') }}"><i class="fas fa-folder"></i> Chủ đề</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.baiviet') }}"><i class="fas fa-file"></i> Bài viết</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.binhluanbaiviet') }}"><i class="fas fa-comments"></i> Bình luận bài viết</a>
                        </li>
                    </ul>
                </li>
				<li>
                    <a href="{{ route('admin.nguoidung') }}"><i class="fas fa-user-friends"></i> Tài Khoản</a>
                </li>
            </ul>
        </nav>
        <div id="body" class="active">
            <!-- navbar navigation component -->
            <nav class="navbar navbar-expand-lg navbar-white bg-white">
                <button type="button" id="sidebarCollapse" class="btn btn-light">
                    <i class="fas fa-bars"></i><span></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                            <div class="nav-dropdown">
                                <a href="#" id="nav2" class="nav-item nav-link dropdown-toggle text-secondary" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-user"></i> <span>{{ Auth::user()->name }}</span> <i style="font-size: .8em;" class="fas fa-caret-down"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end nav-link-menu">
                                    <ul class="nav-list">
                                        <li><a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
										<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
											@csrf
										</form>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- end of navbar navigation -->
            @yield('content')
        </div>
    </div>
    <script src="{{ asset('public/Admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('public/Admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('public/Admin/vendor/chartsjs/Chart.min.js') }}"></script>
    <script src="{{ asset('public/Admin/js/dashboard-charts.js') }}"></script>
    <script src="{{ asset('public/Admin/js/script.js') }}"></script>
	@yield('javascript')
</body>

</html>
