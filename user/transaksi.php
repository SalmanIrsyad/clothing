<?php
session_start();
include '../koneksi/koneksi.php'; // Pastikan koneksi database tersedia

// Ambil data keranjang dari sesi
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
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
                    <th>Gambar</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Ukuran</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php $total = 0; ?>
                <?php foreach ($cart as $id_produk => $produk) : ?>
                    <tr>
                        <td><img src="<?php echo $produk['gambar']; ?>" width="100"></td>
                        <td><?php echo $produk['nama']; ?></td>
                        <td>Rp<?php echo number_format($produk['harga']); ?></td>
                        <td><?php echo $produk['jumlah']; ?></td>
                        <td><?php echo $produk['ukuran']; ?></td>
                        <td>Rp<?php echo number_format($produk['harga'] * $produk['jumlah']); ?></td>
                    </tr>
                    <?php $total += $produk['harga'] * $produk['jumlah']; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="d-flex justify-content-end">
            <h3>Total Belanja: Rp<?php echo number_format($total); ?></h3>
        </div>
        <form action="proses_checkout.php" method="post">
            <div class="mb-3">
                <label for="shippingMethod">Metode Pengiriman</label>
                <select class="form-select" name="shippingMethod">
                    <option value="5000">Standar - Rp.5000</option>
                    <option value="8000">Expres - Rp.8000</option>
                    <option value="10000">Next-Day - Rp.10.000</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Bayar</button>
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
