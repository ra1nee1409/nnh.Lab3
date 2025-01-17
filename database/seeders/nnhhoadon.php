<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class nnhhoadon extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Lấy danh sách khách hàng để tạo hóa đơn
        $khachHangIds = tta_KhachHang_model::all()->pluck('id')->toArray();

        // Tạo 10 hóa đơn mẫu
        for ($i = 0; $i < 10; $i++) {
            DB::table('_nnh_hoadon')->insert([
                'nnhMaHoaDon' => 'HD' . Str::random(8),  // Mã hóa đơn ngẫu nhiên
                'nnhMakhachhang' => $khachHangIds[array_rand($khachHangIds)], // Lấy một khách hàng ngẫu nhiên
                'nnhNgayHoaDon' => now()->subDays(rand(1, 30)),  // Ngày hóa đơn trong vòng 30 ngày qua
                'nnhHotenKhachHang' => 'Khách hàng ' . Str::random(5), // Tên khách hàng ngẫu nhiên
                'nnhEmail' => 'khachhang' . rand(1, 100) . '@gmail.com',  // Email ngẫu nhiên
                'nnhDienThoai' => '090' . rand(1000000, 9999999),  // Số điện thoại ngẫu nhiên
                'nnhDiaChi' => 'Địa chỉ ' . Str::random(10),  // Địa chỉ ngẫu nhiên
                'nnhTongGiaTri' => rand(100000, 1000000),  // Tổng giá trị hóa đơn ngẫu nhiên
                'nnhTrangThai' => rand(0, 1),  // Trạng thái hóa đơn (0 hoặc 1)
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
