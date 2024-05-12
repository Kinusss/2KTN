<?php

namespace App\Http\Controllers;

use App\Models\ChuDe;
use App\Models\BaiViet;
use App\Models\NguoiDung;
use App\Models\SanPham;
use App\Models\LoaiSanPham;
use App\Models\HangSanXuat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Gloudemans\Shoppingcart\Facades\Cart;
use Socialite;

class HomeController extends Controller
{
	public function getGoogleLogin()
	{
		return Socialite::driver('google')->redirect();
	}
	public function getGoogleCallback()
	{
		try
		{
			$user = Socialite::driver('google')
				->setHttpClient(new \GuzzleHttp\Client(['verify' => false]))
				->stateless()
				->user();
		}
		catch(Exception $e)
		{
			return redirect()->route('user.dangnhap')->with('warning', 'Lỗi xác thực. Xin vui lòng thử lại!');
		}
		
		$existingUser = NguoiDung::where('email', $user->email)->first();
		if($existingUser)
		{
			// Nếu người dùng đã tồn tại thì đăng nhập
			Auth::login($existingUser, true);
			return redirect()->route('user.home');
		}
		else
		{
			// Nếu chưa tồn tại người dùng thì thêm mới
			$newUser = NguoiDung::create([
				'name' => $user->name,
				'email' => $user->email,
				'phone' => $user->phone,
				'username' => Str::before($user->email, '@'),
				'password' => Hash::make('larashop@2023'), // Gán mật khẩu tự do
			]);
			
			// Sau đó đăng nhập
			Auth::login($newUser, true);
			return redirect()->route('user.home');
		}
	}
	
	public function getFacebookLogin()
	{
		return Socialite::driver('facebook')->redirect();
	}
	public function getFacebookLoginCallback()
	{
		try
		{
			$user = Socialite::driver('facebook')
				->setHttpClient(new \GuzzleHttp\Client(['verify' => false]))
				->stateless()
				->user();
		}
		catch(Exception $e)
		{
			return redirect()->route('user.dangnhap')->with('warning', 'Lỗi xác thực. Xin vui lòng thử lại!');
		}
		
		$existingUser = NguoiDung::where('email', $user->email)->first();
		if($existingUser)
		{
			// Nếu người dùng đã tồn tại thì đăng nhập
			Auth::login($existingUser, true);
			return redirect()->route('user.home');
		}
		else
		{
			// Nếu chưa tồn tại người dùng thì thêm mới
			$newUser = NguoiDung::create([
				'name' => $user->name,
				'email' => $user->email,
				'username' => Str::before($user->email, '@'),
				'password' => Hash::make('larashop@2023'), // Gán mật khẩu tự do
			]);
			
			// Sau đó đăng nhập
			Auth::login($newUser, true);
			return redirect()->route('user.home');
		}
	}

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getHome()
    {
        $loaisanpham = LoaiSanPham::all();
		$hangsanxuat = HangSanXuat::all();
		$sanpham = SanPham::all();
		$baiviet = BaiViet::all();
		return view('frontend.home', compact('loaisanpham', 'hangsanxuat', 'sanpham', 'baiviet'));
    }
	
	public function getSanPham($tenloai_slug = '')
	{
		// Lấy tất cả các loại sản phẩm cho menu
		$loaisanpham = LoaiSanPham::all();

		// Lấy sản phẩm dựa trên loại đã chọn
		if ($tenloai_slug == '') {
			$sanpham = SanPham::paginate(15);
			$selectedCategory = null; // Đánh dấu là chưa chọn loại sản phẩm cụ thể
		} else {
			$selectedCategory = LoaiSanPham::where('tenloai_slug', $tenloai_slug)->first();

			// Xử lý trường hợp không tìm thấy loại sản phẩm
			if (!$selectedCategory) {
				abort(404); // Hoặc hiển thị thông báo lỗi
			}

			// Lấy danh sách sản phẩm dựa trên loại sản phẩm và sử dụng phương thức paginate
			$sanpham = SanPham::where('loaisanpham_id', $selectedCategory->id)->paginate(16);
		}

		// Chuyển dữ liệu đến view
		return view('frontend.sanpham', compact('sanpham', 'loaisanpham', 'selectedCategory'));
	}
	
	public function getSanPham_ChiTiet($tenloai_slug = '', $tensanpham_slug = '')
	{
		$sanpham = SanPham::where('tensanpham_slug', $tensanpham_slug)
                    ->whereHas('loaisanpham', function ($query) use ($tenloai_slug) {
                        $query->where('tenloai_slug', $tenloai_slug);
                    })
                    ->first();

		if (!$sanpham) {
			abort(404); // Trang không tồn tại nếu không tìm thấy sản phẩm
		}

		return view('frontend.sanpham_chitiet', compact('sanpham'));
	}
	
	public function getBaiViet($tenchude_slug = '')
	{
		if(empty($tenchude_slug))
		{
			$title = 'Tin tức';
			$baiviet = BaiViet::where('kichhoat', 1)
				->where('kiemduyet', 1)
				->orderBy('created_at', 'desc')
				->paginate(6);
		}
		else
		{
			$chude = ChuDe::where('tenchude_slug', $tenchude_slug)
				->firstOrFail();
			$title = $chude->tenchude;
			$baiviet = BaiViet::where('kichhoat', 1)
				->where('kiemduyet', 1)
				->where('chude_id', $chude->id)
				->orderBy('created_at', 'desc')
				->paginate(6);
		}
		return view('frontend.baiviet', compact('title', 'baiviet'));
	}
	
	public function getBaiViet_ChiTiet($tenchude_slug = '', $tieude_slug = '')
	{
		$tieude_id = explode('.', $tieude_slug);
		$tieude = explode('-', $tieude_id[0]);
		$baiviet_id = $tieude[count($tieude) - 1];
		
		$baiviet = BaiViet::where('kichhoat', 1)
			->where('kiemduyet', 1)
			->where('id', $baiviet_id)
			->firstOrFail();
		if(!$baiviet) abort(404);
		// Cập nhật lượt xem
		$daxem = 'BV' . $baiviet_id;
		if(!session()->has($daxem))
		{
			$orm = BaiViet::find($baiviet_id);
			$orm->luotxem = $baiviet->luotxem + 1;
			$orm->save();
			session()->put($daxem, 1);
		}
		$baivietcungchuyemuc = BaiViet::where('kichhoat', 1)
			->where('kiemduyet', 1)
			->where('chude_id', $baiviet->chude_id)
			->where('id', '!=', $baiviet_id)
			->orderBy('created_at', 'desc')
			->take(4)->get();
		return view('frontend.baiviet_chitiet', compact('baiviet', 'baivietcungchuyemuc'));
	}
	
	public function getGioHang()
	{
		if(Cart::count() > 0)
		{
			return view('frontend.giohang');
		}
		else
		{
			return view('frontend.giohangrong');
		}
	}
	
	public function getGioHang_Them($tensanpham_slug = '', Request $request)
	{
		// Số lượng mặc định là 1
		$quantity = 1;

		// Kiểm tra xem request có chứa số lượng hợp lệ không và cập nhật nếu có
		if ($request->has('quantity') && is_numeric($request->quantity) && $request->quantity > 0) {
			$quantity = $request->quantity;
		}

		$sanpham = SanPham::where('tensanpham_slug', $tensanpham_slug)->first();

		Cart::add([
			'id' => $sanpham->id,
			'name' => $sanpham->tensanpham,
			'price' => $sanpham->dongia,
			'qty' => $quantity, // Sử dụng số lượng đã xác định
			'weight' => 0,
			'options' => [
				'image' => $sanpham->hinhanh
			]
		]);

		return redirect()->back()->with('success', 'Thêm giỏ hàng thành công.');
	}

	
	public function getGioHang_Xoa($row_id)
	{
		Cart::remove($row_id);
		
		return redirect()->route('frontend.giohang');
	}
	
	public function getGioHang_Giam($row_id)
	{
		$row = Cart::get($row_id);
		
		// Nếu số lượng là 1 thì không giảm được nữa
		if($row->qty > 1)
		{
			Cart::update($row_id, $row->qty - 1);
		}
		
		return redirect()->route('frontend.giohang');
	}
	
	public function getGioHang_Tang($row_id)
	{
		$row = Cart::get($row_id);
		
		// Không được tăng vượt quá 10 sản phẩm
		if($row->qty < env('SHOP_MAX'))
		{
			Cart::update($row_id, $row->qty + 1);
		}
		return redirect()->route('frontend.giohang');
	}
	
	public function postGioHang_CapNhat(Request $request)
	{
		foreach($request->qty as $row_id => $quantity)
		{
			if($quantity <= 0)
				Cart::update($row_id, 1);
			else if($quantity > env('SHOP_MAX'))
				Cart::update($row_id, env('SHOP_MAX'));
			else
				Cart::update($row_id, $quantity);
		}

		return redirect()->route('frontend.giohang');
	}
	
	public function getTuyenDung()
	{
		return view('frontend.tuyendung');
	}
	
	public function getLienHe()
	{
		
		return view('frontend.lienhe');
	}
	
	// Trang đăng ký dành cho khách hàng
	public function getDangKy()
	{
		return view('user.dangky');
	}
	
	// Trang đăng nhập dành cho khách hàng
	public function getDangNhap()
	{
		return view('user.dangnhap');
	}
	
	public function getTimKiem(Request $request, $tenloai_slug = '')
	{
		// Lấy tất cả các loại sản phẩm cho menu
    $loaisanpham = LoaiSanPham::all();

    // Xử lý tìm kiếm
    $search = $request->query('search');

    if ($search) {
        // Nếu có thông tin tìm kiếm
        $sanpham = SanPham::where('tensanpham', 'LIKE', "%$search%");

        // Nếu có loại sản phẩm được chọn
        if ($tenloai_slug != '') {
            $selectedCategory = LoaiSanPham::where('tenloai_slug', $tenloai_slug)->first();

            // Xử lý trường hợp không tìm thấy loại sản phẩm
            if (!$selectedCategory) {
                abort(404); // Hoặc hiển thị thông báo lỗi
            }

            // Lọc theo loại sản phẩm
            $sanpham = $sanpham->where('loaisanpham_id', $selectedCategory->id);
        } else {
            $selectedCategory = null; // Đánh dấu là chưa chọn loại sản phẩm cụ thể
        }

        $sanpham = $sanpham->paginate(16);
    } else {
        // Nếu không có thông tin tìm kiếm, thực hiện giống như phương thức getSanPham
        if ($tenloai_slug == '') {
            $sanpham = SanPham::paginate(15);
            $selectedCategory = null; // Đánh dấu là chưa chọn loại sản phẩm cụ thể
        } else {
            $selectedCategory = LoaiSanPham::where('tenloai_slug', $tenloai_slug)->first();

            // Xử lý trường hợp không tìm thấy loại sản phẩm
            if (!$selectedCategory) {
                abort(404); // Hoặc hiển thị thông báo lỗi
            }

            $sanpham = SanPham::where('loaisanpham_id', $selectedCategory->id)->paginate(16);
        }
    }

    // Chuyển dữ liệu đến view
    return view('frontend.timkiem', compact('sanpham', 'loaisanpham', 'selectedCategory'));
	}
}
