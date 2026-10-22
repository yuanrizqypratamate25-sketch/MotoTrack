<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SepedaMotor extends Model
{
    protected $table = 'db_sepedamotor';

    protected $primaryKey = 'id_sepeda_motor';

    public $timestamps = false;

    protected $fillable = [
        'nama_produk',
        'spesifikasi',
        'jumlah_produk',
        'harga_produk',
        'gambar',
    ];

    protected function casts(): array
    {
        return [
            'jumlah_produk' => 'integer',
            'harga_produk' => 'integer',
        ];
    }
}
