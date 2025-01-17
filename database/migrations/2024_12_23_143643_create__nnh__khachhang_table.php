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
        Schema::create('_nnh__khachhang', function (Blueprint $table) {
            $table->id();
            $table->string('nnhMakhachhang',255)->unique();
            $table->string('nnhHotenkhachhang',255);
            $table->string('nnhEmail',255);
            $table->string('nnhDienThoai',255);
            $table->string('nnhDiaChi',255);
            $table->date('nnhNgayDK');
            $table->tinyInteger('nnhTrangThai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_nnh__khachhang');
    }
};
