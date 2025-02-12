<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>404 | Liên kết không tồn tại!</title>
    <link href="{{ asset('public/Admin/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/Admin/css/error.css') }}" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <div class="page vertical-align text-center">
            <div class="page-content vertical-align-middle">
                <header>
                    <h1 class="animation-slide-top">404</h1>
                    <p>Liên kết không tồn tại !</p>
                </header>
                <p class="error-advise">Không thể tìm thấy trang bạn đang tìm kiếm.</p>
                <a class="btn btn-primary btn-round mb-5" href="{{ route('frontend.home') }}">QUAY VỀ TRANG CHỦ</a>
                <footer class="page-copyright">
                    <p>Bản quyền &copy; {{ date('Y') }} - {{ config('app.name', 'Laravel') }}™</p>
                </footer>
            </div>
        </div>
    </div>
    <script src="{{ asset('public/Admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('public/Admin/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
</body>

</html>