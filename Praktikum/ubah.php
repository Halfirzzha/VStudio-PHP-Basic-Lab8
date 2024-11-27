<?php
error_reporting(E_ALL);
include_once 'koneksi.php';

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $harga_jual = $_POST['harga_jual'];
    $harga_beli = $_POST['harga_beli'];
    $stok = $_POST['stok'];
    $file_gambar = $_FILES['file_gambar'];
    $gambar = null;

    if ($file_gambar['error'] == 0) {
        $filename = str_replace(' ', '_', $file_gambar['name']);
        $destination = dirname(__FILE__) . '/gambar/' . $filename;
        if (move_uploaded_file($file_gambar['tmp_name'], $destination)) {
            $gambar = 'gambar/' . $filename;
        }
    }

    $sql = 'UPDATE data_barang SET ';
    $sql .= "nama = '{$nama}', kategori = '{$kategori}', ";
    $sql .= "harga_jual = '{$harga_jual}', harga_beli = '{$harga_beli}', stok = '{$stok}' ";
    
    if (!empty($gambar)) {
        $sql .= ", gambar = '{$gambar}' ";
    }
    
    $sql .= "WHERE id_barang = '{$id}'";
    $result = mysqli_query($conn, $sql);
    header('location: index.php');
}

$id = $_GET['id'];
$sql = "SELECT * FROM data_barang WHERE id_barang = '{$id}'";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die('Error: Data tidak tersedia');
}

$data = mysqli_fetch_array($result);

function is_select($var, $val) {
    return ($var == $val) ? 'selected="selected"' : '';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1 class="text-center mb-4">Ubah Barang</h1>
                <form method="post" action="ubah.php" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" name="nama" value="<?= $data['nama']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kategori</label>
                        <select class="form-select" name="kategori">
                            <option value="Komputer" <?= is_select('Komputer', $data['kategori']); ?>>Komputer</option>
                            <option value="Elektronik" <?= is_select('Elektronik', $data['kategori']); ?>>Elektronik</option>
                            <option value="Hand Phone" <?= is_select('Hand Phone', $data['kategori']); ?>>Hand Phone</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Harga Jual</label>
                        <input type="number" class="form-control" name="harga_jual" value="<?= $data['harga_jual']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Harga Beli</label>
                        <input type="number" class="form-control" name="harga_beli" value="<?= $data['harga_beli']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Stok</label>
                        <input type="number" class="form-control" name="stok" value="<?= $data['stok']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">File Gambar</label>
                        <input type="file" class="form-control" name="file_gambar">
                        <?php if (!empty($data['gambar'])): ?>
                            <small class="text-muted">Gambar saat ini: <?= $data['gambar']; ?></small>
                        <?php endif; ?>
                    </div>
                    <div class="text-center">
                        <input type="hidden" name="id" value="<?= $data['id_barang']; ?>">
                        <input type="submit" name="submit" value="Simpan" class="btn btn-primary">
                        <a href="index.php" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>