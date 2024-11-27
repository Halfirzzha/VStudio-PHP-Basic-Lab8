-- Membuat database
CREATE DATABASE latihan1;

-- Gunakan database
USE latihan1;

-- Membuat tabel data_barang
CREATE TABLE data_barang (
    id_barang INT(10) AUTO_INCREMENT PRIMARY KEY,
    kategori VARCHAR(30),
    nama VARCHAR(30),
    gambar VARCHAR(100),
    harga_beli DECIMAL(10,0),
    harga_jual DECIMAL(10,0),
    stok INT(4)
);

-- Menambahkan data awal
INSERT INTO data_barang (kategori, nama, gambar, harga_beli, harga_jual, stok) VALUES 
('Elektronik', 'HP Samsung Android', 'hp_samsung.jpg', 2000000, 2400000, 5),
('Elektronik', 'HP Xiaomi Android', 'hp_xiaomi.jpg', 1000000, 1400000, 5),
('Elektronik', 'HP OPPO Android', 'hp_oppo.jpg', 1800000, 2300000, 5);