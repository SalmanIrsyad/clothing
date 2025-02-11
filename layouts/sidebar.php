<!-- Sidebar -->
<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark min-vh-100" style="width: 280px;">
    <a href="../admin/admin_dashboard.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <img src="../img/logo1.png" style="width: 150px;" alt="logo">
      <!-- <span class="fs-4">Adorn Amble</span> -->
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
          <a href="../home.php" class="nav-link text-white 
              <?php echo basename($_SERVER['PHP_SELF']) == '../home.php' ? 'active' : ''; ?>">
              Dashboard
          </a>
      </li>
      <li class="nav-item">
          <a href="produk/produkview.php" class="nav-link text-white 
              <?php echo basename($_SERVER['PHP_SELF']) == 'produk/produkview.php' ? 'active' : ''; ?>">
              Produk
          </a>
      </li>
      <li class="nav-item">
          <a href="../admin/pesanan.php" class="nav-link text-white 
              <?php echo basename($_SERVER['PHP_SELF']) == 'pesanan.php' ? 'active' : ''; ?>">
              Pesanan
          </a>
      </li>
      <li class="nav-item">
          <a href="../admin/detail_pesanan.php" class="nav-link text-white 
              <?php echo basename($_SERVER['PHP_SELF']) == 'detail_pesanan.php' ? 'active' : ''; ?>">
              Detail Pesanan
          </a>
      </li>
  </ul>

    <hr>
    <div class="dropdown">
      <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
        <strong>mdo</strong>
      </a>
      <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
        <li><a class="dropdown-item" href="#">New project...</a></li>
        <li><a class="dropdown-item" href="#">Settings</a></li>
        <li><a class="dropdown-item" href="#">Profile</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="#">Sign out</a></li>
      </ul>
    </div>
  </div>