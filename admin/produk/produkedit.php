<?php
include ("../../koneksi/koneksi.php");

// Ambil data produk berdasarkan ID
if(isset($_GET['id_produk'])) {
    $id_produk = mysqli_real_escape_string($koneksi, $_GET['id_produk']);
    $queryProduk = "SELECT * FROM produk WHERE id_produk='$id_produk'";
    $resultProduk = mysqli_query($koneksi, $queryProduk);
    $dataProduk = mysqli_fetch_assoc($resultProduk);

    if (!$dataProduk) {
        echo "<script>alert('Produk tidak ditemukan!'); window.location='produkview.php';</script>";
        exit;
    }
} else {
    echo "<script>alert('ID Produk tidak valid!'); window.location='produkview.php';</script>";
    exit;
}

// Proses Update Data Produk
if(isset($_POST['submit'])) {
    $nama_produk = mysqli_real_escape_string($koneksi, $_POST["nama_produk"]);
    $deskripsi = mysqli_real_escape_string($koneksi, $_POST["deskripsi"]);
    $harga = mysqli_real_escape_string($koneksi, $_POST["harga"]);
    $stok = mysqli_real_escape_string($koneksi, $_POST["stok"]);

    // Cek apakah ada gambar baru
    if ($_FILES["gambar"]["name"]) {
        $gambar = $_FILES["gambar"]["name"];
        $tmp_name = $_FILES["gambar"]["tmp_name"];
        $upload_dir = __DIR__ . "/img/";
        $target_file = $upload_dir . basename($gambar);

        // Hapus gambar lama
        if (file_exists($upload_dir . $dataProduk['gambar'])) {
            unlink($upload_dir . $dataProduk['gambar']);
        }

        // Upload gambar baru
        if (move_uploaded_file($tmp_name, $target_file)) {
            $queryUpdate = "UPDATE produk SET nama_produk='$nama_produk', deskripsi='$deskripsi', harga='$harga', stok='$stok', gambar='$gambar' WHERE id_produk='$id_produk'";
        } else {
            echo "<script>alert('Gagal mengupload gambar!');</script>";
            exit;
        }
    } else {
        $queryUpdate = "UPDATE produk SET nama_produk='$nama_produk', deskripsi='$deskripsi', harga='$harga', stok='$stok' WHERE id_produk='$id_produk'";
    }

    if(mysqli_query($koneksi, $queryUpdate)) {
        echo "<script>alert('Produk berhasil diperbarui!'); window.location='produkview.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui produk!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="d-flex">
    <?php require_once('../../layouts/sidebar.php'); ?>
    <div class="flex-grow-1">
        <nav class="navbar navbar-expand-lg navbar-light bg-light px-3">
            <a class="navbar-brand" href="#">Edit Produk</a>
        </nav>

        <div class="container-fluid p-4">
            <div class="container">
                <h3>Edit Produk</h3>
                <hr>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="nama_produk" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="<?= htmlspecialchars($dataProduk['nama_produk']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi Produk</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required><?= htmlspecialchars($dataProduk['deskripsi']) ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga Produk</label>
                        <input type="number" class="form-control" id="harga" name="harga" value="<?= $dataProduk['harga'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="stok" class="form-label">Stok Produk</label>
                        <input type="number" class="form-control" id="stok" name="stok" value="<?= $dataProduk['stok'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Upload Gambar Baru (Opsional)</label>
                        <input type="file" class="form-control" id="gambar" name="gambar">
                        <p class="mt-2">Gambar saat ini:</p>
                        <img src="../../img/<?= htmlspecialchars($dataProduk['gambar']) ?>" alt="Gambar Produk" width="150">
                    </div>
                    <button type="submit" name="submit" class="btn btn-dark">Update Produk</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
