<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nnh_hoa_don_model extends Model
{
    use HasFactory;
    protected $table ="_nnh_hoadon";
    
    // Đảm bảo không sử dụng timestamps nếu bạn không có cột created_at và updated_at
    public $timestamps = false;
     // Các cột có thể được gán giá trị đại diện cho các trường trong bảng
   protected $fillable = [
    'nnhMaHoaDon',
    'nnhMakhachhang',
    'nnhNgayHoaDon',
    'nnhHotenKhachHang',
    'nnhEmail',
    'nnhDienThoai',
    'nnhDiaChi',
    'nnhTongGiaTri',
    'nnhTrangThai',
];
}
