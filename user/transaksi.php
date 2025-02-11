<?php
session_start();
include '../koneksi/koneksi.php';

// Pastikan pengguna sudah login
if (!isset($_SESSION['id_user'])) {
    echo "Silakan login terlebih dahulu.";
    exit;
}

$id_user = $_SESSION['id_user'];

// Ambil produk yang ada di keranjang sementara (bisa dari session atau database)
$query = "SELECT p.id_produk, p.nama_produk, p.harga, c.jumlah 
          FROM cart c 
          JOIN produk p ON c.id_produk = p.id_produk 
          WHERE c.id_user = $id_user";
$result = mysqli_query($koneksi, $query);

$total_harga = 0;
$produk_list = [];

while ($row = mysqli_fetch_assoc($result)) {
    $total_harga += $row['harga'] * $row['jumlah'];
    $produk_list[] = $row;
}

// Jika tombol checkout ditekan
if (isset($_POST['checkout'])) {
    $tanggal_pemesanan = date('Y-m-d H:i:s');
    $status = 'menunggu';

    // Simpan pesanan ke tabel pesanan
    $query_pesanan = "INSERT INTO pesanan (id_user, total_harga, status, tanggal_pemesanan) 
                      VALUES ('$id_user', '$total_harga', '$status', '$tanggal_pemesanan')";
    mysqli_query($koneksi, $query_pesanan);
    $id_pesanan = mysqli_insert_id($koneksi);

    // Simpan detail pesanan
    foreach ($produk_list as $produk) {
        $id_produk = $produk['id_produk'];
        $jumlah = $produk['jumlah'];
        $harga = $produk['harga'];

        $query_detail = "INSERT INTO detail_pesanan (id_pesanan, id_produk, jumlah, harga) 
                         VALUES ('$id_pesanan', '$id_produk', '$jumlah', '$harga')";
        mysqli_query($koneksi, $query_detail);
    }

    // Hapus produk dari cart setelah checkout
    mysqli_query($koneksi, "DELETE FROM cart WHERE id_user = $id_user");

    echo "Pesanan berhasil dibuat!";
    exit;
}

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="icon" href="logo1.png">
    <title>Adorn Amble - Checkout</title>
    <style>
        .marq {
            padding-top: 30px;
            padding-bottom: 30px;
            margin-bottom: -10px;
        }
        .m1 {
            font-family: 'Times New Roman', Times, serif;
            font-size: 35px;
            font-weight: bold;
            color: white;
            padding-bottom: 5px;
            text-align: center;
        }
        .m2 {
            font-family: 'Times New Roman', Times, serif;
            font-size: 20px;
            color: white;
            padding-bottom: 5px;
            text-align: center;
        }
        .nav {
            border: 1px solid black;
            border-radius: 0px;
            padding: 10px;
            list-style-type: none;
            display: flex;
            justify-content: center;
        }
        .nav-item {
            margin: 0 10px;
        }
        .nav-link {
            color: black;
            font-size: x-large;
            font-weight: bold;
            text-decoration: none;
            padding: 5px 10px;
            border: 1px solid transparent;
            border-radius: 5px;
        }
        .nav-link:hover {
            background-color: #e2e6ea;
            border-color: black;
        }
        .layout {
            display: flex;
            margin-top: 20px;
        }
        .sidebar {
            margin-top: -20px;
            width: 20%;
            background-color: #000;
            color: #fff;
            padding: 1em;
        }
        .sidebar ul {
            border-top: 1px solid #fff;
            padding-bottom: 0.5em;
            list-style-type: none;
            padding: 0;
        }
        .sidebar ul li {
            margin: 1em 0;
        }
        .sidebar ul li a {
            color: #fff;
            text-decoration: none;
            display: block;
            padding: 0.5em;
            border-radius: 5px;
        }
        .sidebar ul li a:hover {
            background-color: #444;
        }
        .h2sid {
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            font-weight: bold;
        }
        .logo-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 90px;
        }
        .content {
            width: 100%;
            padding: 1em;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <ul class="nav nav-underline d-flex justify-content-center">
        <li class="nav-item"><a class="nav-link" href="index.php">Beranda</a></li>
        <li class="nav-item"><a class="nav-link" href="tentang.php">Tentang Kami</a></li>
        <li class="nav-item"><a class="nav-link" href="transaksi.php">Transaksi</a></li>
    </ul>
    
    <!-- Layout -->
    <div class="container mt-4">
        <h1 class="display-5 fw-bolder">CHECKOUT</h1>
        <hr>
        <table class="table">
            <thead>
                <tr>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($produk_list as $produk) : ?>
                <tr>
                    <td><?= htmlspecialchars($produk['nama_produk']); ?></td>
                    <td><?= number_format($produk['harga'], 0, ',', '.'); ?></td>
                    <td><?= $produk['jumlah']; ?></td>
                    <td><?= number_format($produk['harga'] * $produk['jumlah'], 0, ',', '.'); ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <p>Total Harga: Rp <?= number_format($total_harga, 0, ',', '.'); ?></p>
            <form method="POST">
                <button class="btn btn-outline-dark flex-shrink-0" type="submit" name="checkout" id="checkout" >Checkout</button>
            </form>
    </div>

    <!-- Footer -->
    <footer class="footer flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <div class="container">
            <div class="col-md-4 d-flex align-items-center">
                <a href="index.html" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
                    <img src="logo2.png" alt="" width="100px">
                </a>
                <span class="mb-3 mb-md-0 text-muted">&copy; 2023 Adorn Amble</span>
            </div>
        </div>
    </footer>
</body>
</html>
