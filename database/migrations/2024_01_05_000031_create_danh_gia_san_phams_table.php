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
        Schema::create('danhgiasanpham', function (Blueprint $table) {
            $table->id();
			$table->foreignId('sanpham_id')->constrained('sanpham');
			$table->foreignId('nguoidung_id')->constrained('nguoidung');
			$table->string('binhluan');
			$table->double('danhgia', 3, 2 );
			$table->integer('tinhtrang')->default(0);
			$table->timestamps();
			$table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('danhgiasanpham');
    }
};
