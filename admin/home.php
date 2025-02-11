<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Wrapper untuk Sidebar & Content -->
<div class="d-flex">
  
  <!-- Sidebar -->
  <?php require_once('../layouts/sidebar.php'); ?>

  <!-- Wrapper untuk konten utama -->
  <div class="flex-grow-1">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light px-3">
        <a class="navbar-brand" href="#">Home Admin</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
        </button>
        </nav>


    <!-- Main Content -->
    <div class="container-fluid p-4">
      <h1>Main Content</h1>
      <p>Selamat datang di <b>DASHBOARD ADMIN</b></p>
    </div>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
