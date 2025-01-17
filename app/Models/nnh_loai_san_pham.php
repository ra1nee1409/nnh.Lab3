<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nnh_loai_san_pham extends Model
{
    use HasFactory;

    protected $table = '_nnh__loaisanpham';

    protected $fillable = ['nnhMaloai', 'nnhTenLoai', 'ttaTrangThai']; // Khai báo các cột có thể thao tác
}
