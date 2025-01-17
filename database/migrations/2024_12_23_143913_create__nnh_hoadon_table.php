<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('_nnh_hoadon', function (Blueprint $table) {
            $table->id();
            $table->string('nnhMaHoaDon',255)->unique();
            $table->bigInteger('nnhMakhachhang')->references('id')->on('nnhkhachhang');
            $table->date('nnhNgayHoaDon');
            $table->string('nnhHotenKhachHang',255);
            $table->string('nnhEmail',255);
            $table->string('nnhDienThoai',255);
            $table->string('nnhDiaChi',255);
            $table->float('nnhTongGiaTri');
            $table->tinyInteger('nnhTrangThai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_nnh_hoadon');
    }
};
