<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "clothing";

$koneksi = mysqli_connect($servername, $username, $password, $database);

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

define('BASE_URL', '/clothing/')
?>
