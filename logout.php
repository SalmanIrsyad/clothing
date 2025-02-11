<?php
session_start(); // Mulai sesi

if (isset($_SESSION['username'])) {
    session_unset(); // Hapus semua variabel sesi
    session_destroy(); // Hapus sesi
    setcookie(session_name(), '', time() - 3600, '/'); // Hapus cookie sesi

    // Redirect langsung ke login.php setelah logout
    header("Location: ./login.php");
    exit;
} else {
    // Jika tidak ada sesi, langsung arahkan ke login.php
    header("Location: ./login.php");
    exit;
}
?>
