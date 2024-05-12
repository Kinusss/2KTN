@extends('layouts.frontend')

@section('title', 'Giỏ hàng')

@section('content')
	<nav aria-label="breadcrumb" class="w-100 float-left">
	  <ol class="breadcrumb parallax justify-content-center" data-source-url="{{ asset('public/Customer/img/banner/parallax.jpg') }}" style="background-image: url(&quot;img/banner/parallax.jpg&quot;); background-position: 50% 0.809717%;">
		<li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
		<li class="breadcrumb-item active" aria-current="page">Giỏ hàng</li>
	  </ol>
	</nav>	
	<div class="cart-area table-area pt-110 pb-95 float-left w-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12 float-left cart-wrapper">
                <form action="{{ route('frontend.giohang.capnhat') }}" method="post">
                    @csrf
                    <div class="table-responsive">
                        <table class="table product-table text-center">
                            <thead>
                                <tr>
                                    <th class="table-remove text-capitalize">Xóa</th>
                                    <th class="table-image text-capitalize">Hình ảnh</th>
                                    <th class="table-p-name text-capitalize">Tên sản phẩm</th>
                                    <th class="table-p-price text-capitalize">Giá</th>
                                    <th class="table-p-qty text-capitalize">Số lượng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(Cart::content() as $value)
                                    <tr>
                                        <td class="table-remove">
											<a href="{{ route('frontend.giohang.xoa', ['row_id' => $value->rowId]) }}" onclick="return confirm('Bạn chắc chắn xóa sản phẩm này không?')">
												<i class="material-icons">delete</i>
											</a>
										</td>
                                        <td class="table-image"><a href="#"><img src="{{ env('APP_URL') . '/storage/app/' . $value->options->image }}"></a></td>
                                        <td class="table-p-name text-capitalize"><a href="#">{{ $value->name }}</a></td>
                                        <td class="table-p-price"><p>{{ number_format($value->price, 0, ',', '.') }}<small>đ</small></p></td>
                                        <td class="table-p-qty"><input value="{{ $value->qty }}" name="qty[{{ $value->rowId }}]" type="number"></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="table-bottom-wrapper">
                        <div class="table-update d-flex d-xs-block d-lg-flex d-sm-flex justify-content-end">
                            <button type="submit" class="btn-primary btn">Cập nhật giỏ hàng</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="table-total-wrapper d-flex justify-content-end pt-60 col-md-12 col-sm-12 col-lg-4 float-left  align-items-center">
                <div class="table-total-content">
                    <h2 class="pb-20">Tổng giỏ hàng</h2>
                    <div class="table-total-amount">
                        <div class="single-total-content d-flex justify-content-between float-left w-100">
                            <strong>Tổng tiền</strong>
                            <span class="c-total-price">{{ Cart::priceTotal() }}<small>đ</small></span>
                        </div>
                        <a href="{{ route('user.dathang') }}" class="btn btn-primary float-left w-100 text-center">Thanh toán</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
	
	