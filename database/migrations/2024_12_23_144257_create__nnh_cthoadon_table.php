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
        Schema::create('_nnh_cthoadon', function (Blueprint $table) {
            $table->id();
            $table->integer('nnhHoaDonID')->reference('id')->on('nnhhoa_don');
            $table->integer('nnhSanPhamID')->reference('id')->on('nnhsan_pham');
            $table->integer('nnhSoLuongMua');
            $table->float('nnhDonGiaMua');
            $table->float('nnhThanhTien');
            $table->tinyInteger('nnhTrangThai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_nnh_cthoadon');
    }
};
