<?php
    include('../../koneksi/koneksi.php');

    $id_produk= $_GET["id_produk"];
    $delProduk = "DELETE FROM produk WHERE id_produk='$id_produk'";
    $resultProduk = mysqli_query($koneksi,$delProduk);

    if($resultProduk){
        echo"<script>alert('Daftar Berhasil DiHapus !')</script>";
        echo"<script type='text/javascript'>window.location='produkview.php'</script>";
    }else{
        echo"<script>alert('Daftar Gagal DiHapus !')</script>";
        echo"<script type='text/javascript'>window.location='produkview.php'</script>";
    }
?>