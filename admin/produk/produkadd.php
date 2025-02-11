<?php 
include ("../../koneksi/koneksi.php");

if(isset($_POST['submit'])) {
    $id_produk = mysqli_real_escape_string($koneksi, $_POST["id_produk"]);
    $nama_produk = mysqli_real_escape_string($koneksi, $_POST["nama_produk"]);
    $deskripsi = mysqli_real_escape_string($koneksi, $_POST["deskripsi"]);
    $harga = mysqli_real_escape_string($koneksi, $_POST["harga"]);
    $stok = mysqli_real_escape_string($koneksi, $_POST["stok"]);
    
    // Upload Gambar
    $gambar = $_FILES["gambar"]["name"];
    $tmp_name = $_FILES["gambar"]["tmp_name"];
    $upload_dir = __DIR__ . "/img/"; // Menyimpan di dalam folder img di direktori saat ini
    $target_file = $upload_dir . basename($gambar);
    
    // Pastikan folder ada
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    // Cek apakah file berhasil diupload
    if (move_uploaded_file($tmp_name, $target_file)) {
        $insertProduk = "INSERT INTO produk (id_produk, nama_produk, deskripsi, harga, stok, gambar) 
                         VALUES ('$id_produk', '$nama_produk', '$deskripsi', '$harga', '$stok', '$gambar')";
        $queryProduk = mysqli_query($koneksi, $insertProduk);

        if($queryProduk){
            echo "<script>alert('Data Produk Berhasil Disimpan!'); window.location='produkview.php';</script>";
        } else {
            echo "<script>alert('Gagal menyimpan data produk!');</script>";
        }
    } else {
        echo "<script>alert('Gagal mengupload gambar! Periksa izin folder.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="d-flex">
    <?php require_once('../../layouts/sidebar.php'); ?>
    <div class="flex-grow-1">
        <nav class="navbar navbar-expand-lg navbar-light bg-light px-3">
            <a class="navbar-brand" href="#">Tambah Produk</a>
        </nav>

        <div class="container-fluid p-4">
            <div class="container">
                <h3>Tambah Produk Baru</h3>
                <hr>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="id_produk" class="form-label">ID Produk</label>
                        <input type="text" class="form-control" id="id_produk" name="id_produk" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama_produk" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" id="nama_produk" name="nama_produk" required>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi Produk</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga Produk</label>
                        <input type="number" class="form-control" id="harga" name="harga" required>
                    </div>
                    <div class="mb-3">
                        <label for="stok" class="form-label">Stok Produk</label>
                        <input type="number" class="form-control" id="stok" name="stok" required>
                    </div>
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Upload Gambar</label>
                        <input type="file" class="form-control" id="gambar" name="gambar" required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-dark">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
