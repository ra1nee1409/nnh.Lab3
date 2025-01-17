<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class nnhquantri extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            $nnhMatKhau = Hash::make('14092005');
    
            DB::table('nnh_quantri')->insert([
                'nnhTaiKhoan' => 'hieu1234@gmail.com',
                'nnhMatKhau' => $nnhMatKhau,
                'nnhTrangThai' => 0
            ]);
        
    }
}