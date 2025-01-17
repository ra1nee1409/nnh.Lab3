<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class nnhsanpham extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("_nnh__sanpham")->insert([
            'nnhMaSanPham'=>'VP01',
            'nnhTenSanPham'=>'Cay phu quy',
            'nnhHinhAnh'=>'',
            'nnhSoLuong'=> 100,
            'nnhDonGia'=>699000,
            'nnhMaloai'=> 1,
            'nnhTrangThai'=> 0
        ]);
        DB::table("_nnh__sanpham")->insert([
            'nnhMaSanPham'=>'VP02',
            'nnhTenSanPham'=>'Cay dai phu quy',
            'nnhHinhAnh'=>'',
            'nnhSoLuong'=> 100,
            'nnhDonGia'=>199000,
            'nnhMaloai'=> 1,
            'nnhTrangThai'=> 0
        ]);
        DB::table("_nnh__sanpham")->insert([
            'nnhMaSanPham'=>'VP03',
            'nnhTenSanPham'=>'Cay Hanh Phuc',
            'nnhHinhAnh'=>'',
            'nnhSoLuong'=> 100,
            'nnhDonGia'=>899000,
            'nnhMaloai'=> 1,
            'nnhTrangThai'=> 0
        ]);
        DB::table("_nnh__sanpham")->insert([
            'nnhMaSanPham'=>'VP04',
            'nnhTenSanPham'=>'Cay van loc',
            'nnhHinhAnh'=>'',
            'nnhSoLuong'=> 100,
            'nnhDonGia'=>799000,
            'nnhMaloai'=> 1,
            'nnhTrangThai'=> 0
        ]);
        DB::table("_nnh__sanpham")->insert([
            'nnhMaSanPham'=>'PT001',
            'nnhTenSanPham'=>'Cay van loc',
            'nnhHinhAnh'=>'',
            'nnhSoLuong'=> 100,
            'nnhDonGia'=>150000,
            'nnhMaloai'=> 1,
            'nnhTrangThai'=> 0
        ]);
        DB::table("_nnh__sanpham")->insert([
            'nnhMaSanPham'=>'PT002',
            'nnhTenSanPham'=>'Cay truong sinh',
            'nnhHinhAnh'=>'',
            'nnhSoLuong'=> 100,
            'nnhDonGia'=>100000,
            'nnhMaloai'=> 3,
            'nnhTrangThai'=> 0
        ]);
        DB::table("_nnh__sanpham")->insert([
            'nnhMaSanPham'=>'PT003',
            'nnhTenSanPham'=>'Cay hanh phuc',
            'nnhHinhAnh'=>'',
            'nnhSoLuong'=> 100,
            'nnhDonGia'=>200000,
            'nnhMaloai'=> 3,
            'nnhTrangThai'=> 0
        ]);
        DB::table("_nnh__sanpham")->insert([
            'nnhMaSanPham'=>'PT004',
            'nnhTenSanPham'=>'Cay hoa nhai',
            'nnhHinhAnh'=>'',
            'nnhSoLuong'=> 100,
            'nnhDonGia'=>100000,
            'nnhMaloai'=> 3,
            'nnhTrangThai'=> 0
        ]);
    }
}
