<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhGiaSanPham extends Model
{
    use HasFactory;
	
	protected $table = 'danhgiasanpham';
	
	protected $fillable = [
		'sanpham_id',
		'nguoidung_id',
		'binhluan',
		'danhgia',
		'tinhtrang',
	];
	
	public function SanPham(): BelongsTo
	{
		return $this->belongsTo(SanPham::class, 'sanpham_id', 'id');
	}
}
