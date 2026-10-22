-- Opsional: untuk membuat tabel di database baru dan mengisinya dengan data contoh.
-- Jika tabel db_sepedamotor sudah ada, CREATE TABLE IF NOT EXISTS tidak mengubah struktur tabel.
-- Import file ini akan memperbarui baris dengan ID 1-10 agar sama dengan daftar contoh.

CREATE TABLE IF NOT EXISTS `db_sepedamotor` (
  `id_sepeda_motor` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_produk` VARCHAR(150) NOT NULL,
  `spesifikasi` TEXT NOT NULL,
  `jumlah_produk` INT UNSIGNED NOT NULL DEFAULT 0,
  `harga_produk` BIGINT UNSIGNED NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_sepeda_motor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `db_sepedamotor`
(`id_sepeda_motor`, `nama_produk`, `spesifikasi`, `jumlah_produk`, `harga_produk`) VALUES
(1, 'Yamaha MX King 150', 'Motor bebek sport 150 cc dengan mesin 4-tak, pendingin cairan, sistem injeksi, dan transmisi manual 5-percepatan. Cocok untuk penggunaan harian dengan karakter berkendara sporty.', 8, 29425000),
(2, 'Honda Vario 160 CBS', 'Skuter matik 160 cc dengan mesin eSP+, sistem injeksi PGM-FI, panel meter digital, dan ruang penyimpanan praktis. Dirancang untuk perjalanan harian di perkotaan.', 12, 27800000),
(3, 'Honda BeAT CBS', 'Skuter matik ringan untuk mobilitas sehari-hari. Menggunakan mesin 110 cc, sistem injeksi PGM-FI, lampu depan LED, dan desain bodi ringkas yang mudah dikendarai.', 15, 18900000),
(4, 'Honda Scoopy Stylish', 'Skuter matik bergaya retro modern dengan mesin 110 cc, lampu LED, panel meter kombinasi, dan fitur pendukung untuk perjalanan dalam kota.', 7, 22800000),
(5, 'Yamaha NMAX 155 Connected', 'Skuter matik kelas 155 cc dengan posisi duduk santai, mesin berpendingin cairan, sistem injeksi, dan fitur konektivitas pada varian yang mendukung.', 6, 33175000),
(6, 'Honda PCX 160 CBS', 'Skuter matik premium bermesin 160 cc, dilengkapi sistem injeksi, desain bodi elegan, ruang kaki lega, dan bagasi luas untuk menunjang kenyamanan berkendara.', 5, 33425000),
(7, 'Yamaha Aerox 155', 'Skuter matik berdesain sporty dengan mesin 155 cc berpendingin cairan, sistem injeksi, dan karakter akselerasi yang responsif untuk penggunaan harian.', 9, 29900000),
(8, 'Suzuki Satria F150', 'Motor bebek hyper-underbone dengan mesin 150 cc, DOHC, sistem injeksi, dan transmisi manual 6-percepatan. Memiliki karakter sporty dan bobot relatif ringan.', 4, 29600000),
(9, 'Honda Supra X 125 FI', 'Motor bebek 125 cc dengan sistem injeksi bahan bakar, transmisi manual, dan posisi berkendara yang nyaman untuk aktivitas harian.', 10, 22000000),
(10, 'Honda CB150R Streetfire', 'Motor sport naked bermesin 150 cc, sistem injeksi PGM-FI, transmisi manual 6-percepatan, dan rangka yang mendukung pengendalian untuk perjalanan harian.', 3, 32000000)
ON DUPLICATE KEY UPDATE
  `nama_produk` = VALUES(`nama_produk`),
  `spesifikasi` = VALUES(`spesifikasi`),
  `jumlah_produk` = VALUES(`jumlah_produk`),
  `harga_produk` = VALUES(`harga_produk`);
