<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('db_sepedamotor')) {
            Schema::create('db_sepedamotor', function (Blueprint $table) {
                $table->bigIncrements('id_sepeda_motor');
                $table->string('nama_produk', 150);
                $table->text('spesifikasi');
                $table->unsignedInteger('jumlah_produk')->default(0);
                $table->unsignedBigInteger('harga_produk')->default(0);
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('db_sepedamotor');
    }
};
