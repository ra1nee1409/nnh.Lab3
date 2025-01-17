<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class nnhLoaiSPTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('_nnh__loaisanpham')->insert([
            'nnhMaloai'=>'L001',
            'nnhTenLoai'=>'Cây Văn phong',
            'nnhTrangThai' => 0
        ]);
    }
}
