<?php
include '../koneksi/koneksi.php';

if (isset($_GET['id_produk'])) {
    $id_produk = intval($_GET['id_produk']);
    $query = "SELECT * FROM produk WHERE id_produk = $id_produk";
    $result = mysqli_query($koneksi, $query);

    if (!$result) {
        die("Query Error: " . mysqli_error($koneksi)); // Tambahkan ini untuk melihat error
    }

    if (mysqli_num_rows($result) > 0) {
        $produk = mysqli_fetch_assoc($result);
    } else {
        echo "Produk tidak ditemukan.";
        exit;
    }
} else {
    echo "ID Produk tidak diberikan.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/docs/5.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link rel="icon" href="logo1.png">
    <title>Adorn Amble - Detail 1</title>
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
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="index.php">Beranda</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="tentang.php">Tentang Kami</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="transaksi.php">Transaksi</a>
        </li>
    </ul>
    <!-- Layout -->
    <div class="layout">
        <!-- Content -->
        <div class="content">
            <section class="py-1">
                <div class="container px-2 px-lg-2 my-1">
                    <div class="row gx-4 gx-lg-5 align-items-center">
                        <div class="col-md-6">
                        <img src="../admin/img/<?php echo htmlspecialchars($produk['gambar']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($produk['nama_produk']); ?>">
                        </div>
                        <div class="col-md-6">
                            <h1 class="display-5 fw-bolder"><?php echo htmlspecialchars($produk['nama_produk']); ?></h1>
                            <div class="fs-5 mb-5">
                                <span>
                                <?php echo number_format($produk['harga'], 0, ',', '.'); ?></b>
                                </span>
                            </div>
                            <div class="mb-3">
                                <label for="sizeOptions" class="form-label">Size:</label>
                                <div id="sizeOptions">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="size" id="sizeSmall" value="S">
                                        <label class="form-check-label" for="sizeSmall">
                                            Small
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="size" id="sizeMedium" value="M">
                                        <label class="form-check-label" for="sizeMedium">
                                            Medium
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="size" id="sizeLarge" value="L">
                                        <label class="form-check-label" for="sizeLarge">
                                            Large
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="size" id="sizeXLarge" value="XL">
                                        <label class="form-check-label" for="sizeXLarge">
                                            Extra Large
                                        </label>
                                    </div>
                                </div>
                                <br>
                                <input class="form-control text-center mx-2" id="inputQuantity" type="number" value="1" style="max-width: 5rem"><br>
                                <button class="btn btn-outline-dark flex-shrink-0" type="button" onclick="addToCart()">
                                    <i class="bi-cart-fill me-1"></i>
                                    Masukan Keranjang
                                </button>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="mt-4">
                        <h5>Material:</h5>
                        <p>
                        <?php echo htmlspecialchars($produk['deskripsi']); ?>
                        </p>
                    </div>
                </div>
            </section>
             
        </div>
        
        <!-- /.content -->
    </div>
    <!-- /.layout -->
    <!-- Footer -->
        <footer class=" footer flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
            <div class="container ">
                <div class="col-md-4 d-flex align-items-center">
                    <a href="index.html" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
                    <img src="logo1.png" width="50" height="50">
                    </a>
                    <span class="mb-3 mb-md-0 text-muted">&copy; 2023 Adorn Amble</span>
                </div>
            </div>
        </footer>
        
</body>
</html>
