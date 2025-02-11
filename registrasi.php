<?php
include 'koneksi/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $role = "user"; // Default role untuk user biasa

    // Hash password sebelum disimpan
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Gunakan prepared statement untuk keamanan
    $query = "INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($koneksi, $query);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssss", $username, $email, $hashed_password, $role);
        $execute = mysqli_stmt_execute($stmt);

        if ($execute) {
            header("Location: login.php"); // Redirect ke halaman login jika sukses
            exit();
        } else {
            $error = "Registrasi gagal: " . mysqli_stmt_error($stmt);
        }

        mysqli_stmt_close($stmt);
    } else {
        $error = "Gagal mempersiapkan query.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .login,
        .image {
            min-height: 100vh;
        }

        .bg-image {
            background-image: url('img/login.jpg');
            background-size: cover;
            background-position: center center;
        }
        .bg-color {
            background: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row g-0">
            <div class="col-md-6 d-none d-md-flex bg-image"></div>

            <div class="col-md-6 bg-color border rounded p-4 shadow-sm">
                <div class="login d-flex align-items-center py-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-10 col-xl-7 mx-auto">
                                <p style="font-size: 75px;"><b>Registrasi</b></p>
                                <?php if (isset($error)) : ?>
                                    <div class="alert alert-danger"><?= $error ?></div>
                                <?php endif; ?>
                                <p class="text-muted mb-4">Registrasi jika anda tidak memiliki akun!</p>
                                <form method="POST">
                                    <div class="mb-3">
                                        <input id="username" type="text" name="username" placeholder="Username" required class="form-control rounded-pill shadow-sm px-4">
                                    </div>
                                    <div class="mb-3">
                                        <input id="email" type="email" name="email" placeholder="Email address" required class="form-control rounded-pill shadow-sm px-4">
                                    </div>
                                    <div class="mb-3">
                                        <input id="password" type="password" name="password" placeholder="Password" required class="form-control rounded-pill shadow-sm px-4">
                                    </div>
                                    <button type="submit" class="btn btn-dark w-100 rounded-pill shadow-sm">Sign Up</button>
                                </form>
                                <p class="mt-3 text-center" style="color: black;">
                                    Sudah punya akun? <a href="login.php" class="text-dark">Login di sini</a>
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
