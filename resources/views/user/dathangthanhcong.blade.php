@extends('layouts.frontend')
@section('title', 'Hoàn tất đặt hàng')
@section('content')
	</nav>
	</div>
	</div>
	</div>
	</header>
		<nav aria-label="breadcrumb" class="w-100 float-left">
  <ol class="breadcrumb parallax justify-content-center" data-source-url="{{ asset('public/Customer/img/banner/parallax.jpg') }}" style="background-image: url(&quot;img/banner/parallax.jpg&quot;); background-position: 50% 0.809717%;">
    <li class="breadcrumb-item active"><a href="{{ route('frontend.home') }}">Trang chủ</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Hoàn tất đặt hàng</li>

  </ol>
</nav>
 <div class="order-inner float-left w-100">     
 <div class="container">
 <div class="row">
	<div id="order-confirmation" class="card float-left w-100 mb-10">
		<div class="card-block p-20">
				<h3 class="card-title text-success">Đơn hàng của bạn đã được xác nhận</h3>
				<p>Một email đã được gửi tới địa chỉ mail của bạn {{ Auth::user()->email }}.</p>
		</div>
	</div>


          </div>
        </div>
      </div>
@endsection