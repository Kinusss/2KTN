@extends('layouts.app')

@section('content')
	<div class="content">
		<div class="container">
			<div class="page-title">
				<h3>Trang chủ</h3>
			</div>
			
			            <div class="content">
                <div class="container">

                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-6 mt-3">
                            <div class="card">
                                <div class="content">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="icon-big text-center">
                                                <i class="teal fas fa-shopping-cart"></i>
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="detail">
                                                <p class="detail-subtitle">Đơn hàng</p>
                                               <span class="number">{{ $SoLuongDonHang }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6 mt-3">
                            <div class="card">
                                <div class="content">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="icon-big text-center">
                                                <i class="olive fas fa-cube"></i>
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="detail">
                                                <p class="detail-subtitle">Số lượng sản phẩm</p>
                                                 <span class="number">{{ $SoLuongSanPham }}</span>
                                            </div>
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
						<div class="col-sm-6 col-md-6 col-lg-6 mt-3">
                            <div class="card">
                                <div class="content">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="icon-big text-center">
                                                <i class="violet fas fa-folder"></i>
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="detail">
                                                <p class="detail-subtitle">Số lượng bài viết</p>
                                                 <span class="number">{{ $SoLuongBaiViet }}</span>
                                            </div>
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6 mt-3">
                            <div class="card">
                                <div class="content">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="icon-big text-center">
                                                <i class="orange fas fa-money-bill-alt"></i>
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="detail">
                                                <p class="detail-subtitle">Tổng doanh thu</p>
                                                <span class="number">{{ number_format($TongDoanhThu, 0, ',', '.') }}<small>đ</small></span>
                                            </div>
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
					<div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="content">
                                            <div class="head">
                                                <h5 class="mb-0">Thống kê doanh thu theo năm</h5>
                                                <p class="text-muted">Dữ liệu bán hàng năm hiện tại</p>
                                            </div>
                                            <div class="canvas-wrapper">
                                                <canvas class="chart" id="salesChart"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		</div>
	</div>
	<script>
        // Lấy dữ liệu từ Laravel controller và chuyển đổi nó thành mảng JavaScript
        var doanhThuData = <?php echo json_encode($doanhThuData); ?>;
        
        // Lấy thẻ canvas
        var ctx = document.getElementById('salesChart').getContext('2d');

        // Tạo biểu đồ
        var salesChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: doanhThuData.labels,
        datasets: [{
            label: 'Doanh Thu',
            data: doanhThuData.values,
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});



    </script>
@endsection
