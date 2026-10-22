<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('db_sepedamotor') && ! Schema::hasColumn('db_sepedamotor', 'gambar')) {
            Schema::table('db_sepedamotor', function (Blueprint $table) {
                $table->string('gambar')->nullable()->after('harga_produk');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('db_sepedamotor') && Schema::hasColumn('db_sepedamotor', 'gambar')) {
            Schema::table('db_sepedamotor', function (Blueprint $table) {
                $table->dropColumn('gambar');
            });
        }
    }
};
