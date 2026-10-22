<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SepedaMotorSeeder extends Seeder
{
    public function run(): void
    {
        // Data contoh untuk tugas. Harga/stok bukan penawaran resmi dan bisa diubah.
        // ID 1-2 yang sudah ada di database contoh akan diperbarui; ID 3-10 ditambahkan.
        $motors = [
            [
                'id_sepeda_motor' => 1,
                'nama_produk' => 'Yamaha MX King 150',
                'spesifikasi' => 'Motor bebek sport 150 cc dengan mesin 4-tak, pendingin cairan, sistem injeksi, dan transmisi manual 5-percepatan. Cocok untuk penggunaan harian dengan karakter berkendara sporty.',
                'jumlah_produk' => 8,
                'harga_produk' => 29425000,
            ],
            [
                'id_sepeda_motor' => 2,
                'nama_produk' => 'Honda Vario 160 CBS',
                'spesifikasi' => 'Skuter matik 160 cc dengan mesin eSP+, sistem injeksi PGM-FI, panel meter digital, dan ruang penyimpanan praktis. Dirancang untuk perjalanan harian di perkotaan.',
                'jumlah_produk' => 12,
                'harga_produk' => 27800000,
            ],
            [
                'id_sepeda_motor' => 3,
                'nama_produk' => 'Honda BeAT CBS',
                'spesifikasi' => 'Skuter matik ringan untuk mobilitas sehari-hari. Menggunakan mesin 110 cc, sistem injeksi PGM-FI, lampu depan LED, dan desain bodi ringkas yang mudah dikendarai.',
                'jumlah_produk' => 15,
                'harga_produk' => 18900000,
            ],
            [
                'id_sepeda_motor' => 4,
                'nama_produk' => 'Honda Scoopy Stylish',
                'spesifikasi' => 'Skuter matik bergaya retro modern dengan mesin 110 cc, lampu LED, panel meter kombinasi, dan fitur pendukung untuk perjalanan dalam kota.',
                'jumlah_produk' => 7,
                'harga_produk' => 22800000,
            ],
            [
                'id_sepeda_motor' => 5,
                'nama_produk' => 'Yamaha NMAX 155 Connected',
                'spesifikasi' => 'Skuter matik kelas 155 cc dengan posisi duduk santai, mesin berpendingin cairan, sistem injeksi, dan fitur konektivitas pada varian yang mendukung.',
                'jumlah_produk' => 6,
                'harga_produk' => 33175000,
            ],
            [
                'id_sepeda_motor' => 6,
                'nama_produk' => 'Honda PCX 160 CBS',
                'spesifikasi' => 'Skuter matik premium bermesin 160 cc, dilengkapi sistem injeksi, desain bodi elegan, ruang kaki lega, dan bagasi luas untuk menunjang kenyamanan berkendara.',
                'jumlah_produk' => 5,
                'harga_produk' => 33425000,
            ],
            [
                'id_sepeda_motor' => 7,
                'nama_produk' => 'Yamaha Aerox 155',
                'spesifikasi' => 'Skuter matik berdesain sporty dengan mesin 155 cc berpendingin cairan, sistem injeksi, dan karakter akselerasi yang responsif untuk penggunaan harian.',
                'jumlah_produk' => 9,
                'harga_produk' => 29900000,
            ],
            [
                'id_sepeda_motor' => 8,
                'nama_produk' => 'Suzuki Satria F150',
                'spesifikasi' => 'Motor bebek hyper-underbone dengan mesin 150 cc, DOHC, sistem injeksi, dan transmisi manual 6-percepatan. Memiliki karakter sporty dan bobot relatif ringan.',
                'jumlah_produk' => 4,
                'harga_produk' => 29600000,
            ],
            [
                'id_sepeda_motor' => 9,
                'nama_produk' => 'Honda Supra X 125 FI',
                'spesifikasi' => 'Motor bebek 125 cc dengan sistem injeksi bahan bakar, transmisi manual, dan posisi berkendara yang nyaman untuk aktivitas harian.',
                'jumlah_produk' => 10,
                'harga_produk' => 22000000,
            ],
            [
                'id_sepeda_motor' => 10,
                'nama_produk' => 'Honda CB150R Streetfire',
                'spesifikasi' => 'Motor sport naked bermesin 150 cc, sistem injeksi PGM-FI, transmisi manual 6-percepatan, dan rangka yang mendukung pengendalian untuk perjalanan harian.',
                'jumlah_produk' => 3,
                'harga_produk' => 32000000,
            ],
        ];

        DB::transaction(function () use ($motors): void {
            foreach ($motors as $motor) {
                $id = $motor['id_sepeda_motor'];
                unset($motor['id_sepeda_motor']);
                DB::table('db_sepedamotor')->updateOrInsert(
                    ['id_sepeda_motor' => $id],
                    $motor
                );
            }
        });
    }
}
