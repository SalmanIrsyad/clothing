<?php
include '../koneksi/koneksi.php';

$query = "SELECT id_produk, nama_produk, deskripsi, harga, gambar FROM produk";
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/docs/5.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link rel="icon" href="logo1.png">
    <title>Adorn Amble - Beranda</title>
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
        .h2sid{
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
    <header>
        <!-- Carousel -->
        <div id="demo" class="carousel slide" data-bs-ride="carousel">
            <!-- Indicators/dots -->
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
            </div>
            <!-- The slideshow/carousel -->
            <div class="carousel-inner align-items-center">
                <div class="carousel-item active">
                    <img src="C1.png" alt="C1" style="width: 100%; height: auto; object-fit: cover;">
                </div>
                <div class="carousel-item">
                    <img src="C2.png" alt="C2" style="width: 100%; height: auto; object-fit: cover;">
                </div>
                <div class="carousel-item">
                    <img src="C3.png" alt="C3" style="width: 100%; height: auto; object-fit: cover;">
                </div>
            </div>
            <!-- Left and right controls/icons -->
            <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    </header>
    <marquee class="marq" direction="left" style="background-color: black;">
        <div class="m1" style="color: white;">
            Discount Up to 50% at offline store
        </div>
        <div class="m2" style="color: white;">
            Don't forget to come
        </div>
    </marquee>
    <!-- Navbar -->
    <ul class="nav nav-underline d-flex justify-content-center">
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="index.html">Beranda</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="tentang.html">Tentang Kami</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="transaksi.html">Transaksi</a>
        </li>
    </ul>
    <!-- Layout -->
    <div class="layout">
        <!-- Sidebar -->
        <aside class="sidebar">
            <a href="index.html" class="logo-container">
                <img src="logo1.png" alt="logo1" class="brand-image" style="width: 150px;">
            </a>
            <h2 class="h2sid">Kategori</h2>
            <ul>
                <li><a href="atasan.html">Hoodie and Tshirt</a></li>
                <li><a href="bawahan.html">Pants</a></li>
            </ul>
        </aside>
        <!-- /.sidebar -->

        <!-- Content -->
        <div class="content">
            <div class="container text-left">
                <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php while ($row = mysqli_fetch_assoc($result)) : ?> 
                    <div class="col">
                        <div class="card h-100">
                            <img src="../admin/img/<?php echo htmlspecialchars($row['gambar']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($row['nama_produk']); ?>">
                            <div class="card-body">
                                <h5 class="card-title"> <?php echo htmlspecialchars($row['nama_produk']); ?> </h5>
                                <p class="card-text"> <?php echo htmlspecialchars($row['deskripsi']); ?> </p>
                                <div class="fs-5 mb-6">
                                    <span>Rp<?php echo number_format($row['harga'], 0, ',', '.'); ?></span>
                                </div>
                            </div>
                            <div class="card-footer bg-transparent">
                                <div class="d-grid gap-2">
                                    <a href="detail.php?id_produk=<?php echo $row['id_produk']; ?>" class="btn btn-dark">Lihat Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
                </div>
            </div>
        </div>
        <!-- /.content -->
    </div>
    <!-- /.layout -->
    <!-- Footer -->
        <footer class=" footer flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
            <div class="container ">
                <div class="col-md-4 d-flex align-items-center">
                    <a href="index.html" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
                    <img src="logo2.png" alt="" width="100px">
                    </a>
                    <span class="mb-3 mb-md-0 text-muted">© 2024 Adorn Amble</span>
                </div> 
            </div>    
        </footer>
    
</body>
</html> 