<?php
session_start();
include './koneksi/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($koneksi, trim($_POST['email']));
    $password = trim($_POST['password']);

    // Query untuk mendapatkan data user
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($koneksi, $query);
    $user = mysqli_fetch_assoc($result);

    // Cek apakah user ditemukan dan password cocok
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['id_user'] = $user['id_user'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        // Redirect sesuai role
        if ($user['role'] == 'admin') {
            header("Location: admin/home.php");
        } else {
            header("Location: user/index.php");
        }
        exit();
    } else {
        $error = "Email atau Password salah!";
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .login, .image { min-height: 100vh; }
        .bg-image { background-image: url('img/login.jpg'); background-size: cover; background-position: center; }
        .bg-color { background: white; }
    </style>
</head>
<body bgcolor="black">
    <div class="container">
        <div class="row g-0">
            <div class="col-md-6 d-none d-md-flex bg-image"></div>
            <div class="col-md-6 bg-color border rounded p-4 shadow-sm">
                <div class="login d-flex align-items-center py-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-10 col-xl-7 mx-auto">
                                <p style="font-size: 75px;"><b>Login</b></p>
                                <p class="text-muted mb-4">Akses lebih cepat, belanja lebih nyaman!</p>
                                <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
                                <form method="POST" >
                                    <div class="mb-3">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control" required class="form-control rounded-pill shadow-sm px-4">
                                    </div>
                                    <div class="mb-3">
                                        <label>Password</label>
                                        <input type="password" name="password" class="form-control" required class="form-control rounded-pill shadow-sm px-4">
                                    </div>
                                    <button type="submit" class="btn btn-dark w-100 rounded-pill shadow-sm">Login</button>
                                </form>   
                                <br>
                                <p class="mt-3 text-center" style="color: black;">
                                    Sudah punya akun? <a href="registrasi.php" class="text-dark">Registrasi di sini</a>
                                </p>
                                <br>
                                <hr>
                                <div class="text-center">
                                    <img src="img/logo2.png" width="150px" class="d-block mx-auto" alt="">
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
