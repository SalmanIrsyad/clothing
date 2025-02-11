<?php 
include '../../koneksi/koneksi.php';

$query = "SELECT p.id_pesanan, u.nama AS nama_user, p.total_harga, p.status, p.tanggal_pemesanan 
          FROM pesanan p
          JOIN users u ON p.id_user = u.id_user
          ORDER BY p.tanggal_pemesanan DESC";
$result = mysqli_query($koneksi, $query);
?>
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
                        <th>ID Pesanan</th>
                        <th>Nama User</th>
                        <th>Total Harga</th>
                        <th>Status</th>
                        <th>Tanggal Pemesanan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                        <tr>
                            <td><?= $row['id_pesanan']; ?></td>
                            <td><?= htmlspecialchars($row['nama_user']); ?></td>
                            <td><?= number_format($row['total_harga'], 0, ',', '.'); ?></td>
                            <td><?= ucfirst($row['status']); ?></td>
                            <td><?= $row['tanggal_pemesanan']; ?></td>
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
