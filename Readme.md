# Praktikum 8: Pemrograman Web - CRUD dengan PHP dan MySQL

## Deskripsi Proyek
Proyek ini adalah implementasi sederhana dari aplikasi CRUD (Create, Read, Update, Delete) menggunakan PHP dan MySQL. Aplikasi mengelola data barang dengan fitur tambah, lihat, ubah, dan hapus data.

## Struktur Proyek
```
lab8_php_database/
│
├── gambar/
│   ├── hp_samsung.jpg
│   ├── hp_xiaomi.jpg
│   └── hp_oppo.jpg
│
├── koneksi.php
├── index.php
├── tambah.php
├── ubah.php
├── hapus.php
└── style.css
```

## Prasyarat
- XAMPP (atau server web lokal lainnya)
- PHP 7.4 atau lebih baru
- MySQL
- Web Browser

## Instalasi

### 1. Persiapan Database
1. Buka phpMyAdmin
2. Buat database baru dengan nama `latihan1`
3. Jalankan query SQL berikut:
```sql
CREATE TABLE data_barang (
    id_barang INT(10) AUTO_INCREMENT PRIMARY KEY,
    kategori VARCHAR(30),
    nama VARCHAR(30),
    gambar VARCHAR(100),
    harga_beli DECIMAL(10,0),
    harga_jual DECIMAL(10,0),
    stok INT(4)
);

INSERT INTO data_barang (kategori, nama, gambar, harga_beli, harga_jual, stok) VALUES 
('Elektronik', 'HP Samsung Android', 'hp_samsung.jpg', 2000000, 2400000, 5),
('Elektronik', 'HP Xiaomi Android', 'hp_xiaomi.jpg', 1000000, 1400000, 5),
('Elektronik', 'HP OPPO Android', 'hp_oppo.jpg', 1800000, 2300000, 5);
```

### 2. Konfigurasi Koneksi
Periksa file `koneksi.php` dan sesuaikan dengan pengaturan database Anda:
```php
$host = "localhost";
$user = "root";
$pass = "";
$db = "latihan1";
```

### 3. Jalankan Proyek
1. Salin folder proyek ke direktori `htdocs` XAMPP
2. Jalankan Apache dan MySQL di XAMPP Control Panel
3. Buka browser dan akses: `http://localhost/lab8_php_database/`

## Fitur Utama
- Tambah data barang baru
- Lihat daftar barang
- Edit data barang
- Hapus data barang
- Upload gambar barang

## Teknologi yang Digunakan
- PHP Native
- MySQL
- Bootstrap 5
- HTML5
- CSS3

## Tangkapan Layar

### Halaman Utama
![Halaman Utama](assets/depan.png)

### Tambah Barang
![Tambah Barang](assets/tambah.png)

### Ubah Barang
![Ubah Barang](assets/ubah.png)

## Kontributor
- Nama Lengkap: M'HALFIRZZHATULLAH
- NIM: 312310548
- Dosen Pengampu: Agung Nugroho, S.Kom., M.Kom

## Lisensi
Proyek ini dibuat untuk keperluan praktikum dan bersifat edukatif.

## Catatan Tambahan
- Pastikan folder `gambar/` memiliki izin tulis (write permission)
- Selalu backup database secara berkala
- Perhatikan keamanan dengan menerapkan validasi input

## Troubleshooting
- Jika koneksi database gagal, periksa konfigurasi di `koneksi.php`
- Pastikan semua file berada di direktori yang benar
- Periksa versi PHP dan ekstensi yang dibutuhkan

## Pengembangan Lanjutan
- Tambahkan validasi form yang lebih ketat
- Implementasikan fitur pencarian
- Buat sistem login sederhana