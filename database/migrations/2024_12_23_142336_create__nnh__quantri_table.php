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
        Schema::create('Nnh_Quantri', function (Blueprint $table) {
            $table->id();
            $table->string('nnhTaiKhoan', 255)->unique();
            $table->string('nnhMatKhau',255);
            $table->tinyInteger('nnhTrangThai');
            $table->timestamps();
        });
    }
 
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Nnh_Quantri');
    }
};
