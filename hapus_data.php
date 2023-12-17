<?php

session_start();
//membatasi halaman sebelum login
if (!isset($_SESSION["login"])) {
    echo "<script>
            alert('login terlebih dahulu');
            document.location.href = 'login.php';
          </script>";
  exit;
}

include 'config/app.php';

//menerima id_pemesanan
$id_pemesanan = (int)$_GET['id_pemesanan'];

if (delete_pemesanan($id_pemesanan) > 0 ) {
    echo "<script>
            alert ('Data Pemesanan Berhasil Dihapus');
            document.location.href = 'crud.php';
            </script>";
} else {
    echo "<script>
            alert ('Data Pemesanan Berhasil Dihapus');
            document.location.href = 'crud.php';
            </script>";
}