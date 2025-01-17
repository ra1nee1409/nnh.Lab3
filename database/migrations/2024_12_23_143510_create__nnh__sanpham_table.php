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
        Schema::create('_nnh__sanpham', function (Blueprint $table) {
            $table->id();
            $table->string('nnhMaSanPham', 255)->unique();
            $table->string('nnhTenSanPham', 255);
            $table->string('nnhHinhAnh', 255)->nullable();
            $table->integer('nnhSoLuong');
            $table->float('nnhDonGia', 10, 2); // 10 số, 2 chữ số thập phân
            $table->biginteger('nnhMaloai')->references('id')->on('_nnh__loaisanpham');
            $table->tinyinteger('nnhTrangThai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_nnh__sanpham');
    }
};
