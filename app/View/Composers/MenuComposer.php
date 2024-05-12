<?php
 
namespace App\View\Composers;
 
use App\Models\LoaiSanPham;
use App\Models\ChuDe;
use Illuminate\View\View;
 
class MenuComposer
{
    /**
     * Create a new profile composer.
     */
    public function __construct() 
	{
		
	}
 
    /**
     * Bind data to the view.
     */
    public function compose(View $view): void
    {
		$menu_loaisanpham = LoaiSanPham::orderBy('tenloai')->get();
		$menu_chude = ChuDe::orderBy('tenchude')->get();
		
        $view->with('menu_loaisanpham', $menu_loaisanpham);
		$view->with('menu_chude', $menu_chude);
    }
}