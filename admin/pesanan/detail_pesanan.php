<?php
include '../../koneksi/koneksi.php';

if (!isset($_GET['id_pesanan'])) {
    echo "ID Pesanan tidak ditemukan.";
    exit;
}

$id_pesanan = intval($_GET['id_pesanan']);

$query = "SELECT p.nama_produk, dp.jumlah, dp.harga, (dp.jumlah * dp.harga) AS subtotal 
          FROM detail_pesanan dp
          JOIN produk p ON dp.id_produk = p.id_produk
          WHERE dp.id_pesanan = $id_pesanan";
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>Detail Pesanan</title>
</head>
<body>
    <h2>Detail Pesanan</h2>
    <table border="1">
        <tr>
            <th>Produk</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Subtotal</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <tr>
                <td><?= htmlspecialchars($row['nama_produk']); ?></td>
                <td><?= $row['jumlah']; ?></td>
                <td><?= number_format($row['harga'], 0, ',', '.'); ?></td>
                <td><?= number_format($row['subtotal'], 0, ',', '.'); ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
