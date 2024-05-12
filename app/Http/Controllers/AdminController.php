<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DonHang;
use App\Models\SanPham;
use App\Models\BaiViet;
use App\Models\DonHang_ChiTiet;

class AdminController extends Controller
{
    public function getHome()
	{
		$SoLuongDonHang = DonHang::count();
		$SoLuongSanPham = SanPham::count();
		$SoLuongBaiViet = BaiViet::count();
		$TongDoanhThu = DonHang_Chitiet::sum(\DB::raw('soluongban * dongiaban'));
		
		$donHangChiTiet = DonHang_ChiTiet::all();

		$doanhThuData = [
    'labels' => [], // Nhãn trục x (có thể là các tháng, ngày, hoặc bất cứ điều gì phù hợp)
    'values' => [] // Dữ liệu doanh thu tương ứng
];

// Lấy dữ liệu các đơn hàng chi tiết của năm hiện tại
$donHangChiTiet = DonHang_ChiTiet::whereYear('created_at', date('Y'))->get();

// Tạo một mảng để lưu trữ doanh thu cho 12 tháng
for ($i = 1; $i <= 12; $i++) {
    $doanhThuData['labels'][] = "Tháng " . $i;
    $doanhThuData['values'][] = 0; // Đặt giá trị mặc định là 0 cho tất cả các tháng
}

// Tính tổng doanh thu từ dữ liệu đơn hàng chi tiết
foreach ($donHangChiTiet as $item) {
    $thang = date('n', strtotime($item->created_at));
    $doanhThuData['values'][$thang - 1] += ($item->soluongban * $item->dongiaban);
}




        return view('admin.home', [
            'SoLuongDonHang' => $SoLuongDonHang,
            'SoLuongSanPham' => $SoLuongSanPham,
			'SoLuongBaiViet' => $SoLuongBaiViet,
            'TongDoanhThu' => $TongDoanhThu,
			'doanhThuData' => $doanhThuData,
        ]);
	}
}
