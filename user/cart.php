<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_produk = $_POST['id_produk'];
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $jumlah = $_POST['jumlah'];
    $gambar = $_POST['gambar'];

    $_SESSION['cart'][$id_produk] = [
        "nama" => $nama,
        "harga" => $harga,
        "jumlah" => $jumlah,
        "gambar" => $gambar
    ];
}

header("Location: transaksi.php");
exit;
?>
