<?php
include("koneksi.php");
$sql = 'SELECT * FROM data_barang';
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Data Barang</h1>
        <a href="tambah.php" class="btn btn-primary mb-3">Tambah Barang Baru</a>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Gambar</th>
                        <th>Nama Barang</th>
                        <th>Kategori</th>
                        <th>Harga Beli</th>
                        <th>Harga Jual</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($result): ?>
                        <?php while($row = mysqli_fetch_array($result)): ?>
                            <tr>
                                <td>
                                    <img src="gambar/<?= $row['gambar']; ?>" 
                                         alt="<?= $row['nama']; ?>" 
                                         style="max-width: 100px; max-height: 100px;">
                                </td>
                                <td><?= $row['nama']; ?></td>
                                <td><?= $row['kategori']; ?></td>
                                <td>Rp. <?= number_format($row['harga_beli'], 0, ',', '.'); ?></td>
                                <td>Rp. <?= number_format($row['harga_jual'], 0, ',', '.'); ?></td>
                                <td><?= $row['stok']; ?></td>
                                <td>
                                    <a href="ubah.php?id=<?= $row['id_barang']; ?>" class="btn btn-warning btn-sm">Ubah</a>
                                    <a href="hapus.php?id=<?= $row['id_barang']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                                </td>
                            </tr>
                        <?php endwhile; else: ?>
                            <tr>
                                <td colspan="7" class="text-center">Belum ada data</td>
                            </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>