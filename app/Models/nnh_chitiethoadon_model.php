<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nnh_chitiethoadon_model extends Model
{
    use HasFactory;
    protected $table = "_nnh_cthoadon";
    protected $fillable = [
        'nnhHoaDonID', 
        'nnhSanPhamID', 
        'nnhSoLuongMua', 
        'nnhDonGiaMua', 
        'nnhThanhTien', 
        'nnhTrangThai',
    ];
}
