<?php 
include ("../../koneksi/koneksi.php");

$queryProduk = "SELECT * FROM produk";
$resultProduk = mysqli_query($koneksi, $queryProduk);
?>

<style>
    .table td, .table th {
    text-align: center;  /* Tengah horizontal */
    vertical-align: middle; /* Tengah vertikal */
}
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="d-flex">
    <?php require_once('../../layouts/sidebar.php'); ?>
    <div class="flex-grow-1">
        <nav class="navbar navbar-expand-lg navbar-light bg-light px-3">
            <a class="navbar-brand" href="#">Daftar Produk</a>
        </nav>

        <div class="container-fluid p-4">
            <a href="produkadd.php" class="btn btn-dark mb-3 float-end">Tambah Produk</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID Produk</th>
                        <th>Nama Produk</th>
                        <th>Deskripsi</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($dataProduk = mysqli_fetch_assoc($resultProduk)): ?>
                        <tr>
                            <td><?= htmlspecialchars($dataProduk['id_produk']) ?></td>
                            <td><?= htmlspecialchars($dataProduk['nama_produk']) ?></td>
                            <td><?= htmlspecialchars($dataProduk['deskripsi']) ?></td>
                            <td>Rp <?= number_format($dataProduk['harga'], 0, ',', '.') ?></td>
                            <td><?= htmlspecialchars($dataProduk['stok']) ?></td>
                            <td>
                                <img src="/clothing/admin/img/<?= htmlspecialchars($dataProduk['gambar']); ?>" alt="Gambar Produk" width="100">
                            </td>
                            <td>
                                <a href="produkedit.php?id_produk=<?= $dataProduk['id_produk'] ?>" class="btn btn-warning btn-sm">
                                    Edit
                                </a>
                                <a href="produkdelete.php?id_produk=<?= $dataProduk['id_produk'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">
                                    Hapus
                                </a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
