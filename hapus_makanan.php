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

//menerima id_makanan
$id_makanan = (int)$_GET['id_makanan'];

if (delete_makanan($id_makanan) > 0 ) {
    echo "<script>
            alert ('Data makanan Berhasil Dihapus');
            document.location.href = 'makanan.php';
            </script>";
} else {
    echo "<script>
            alert ('Data makanan Berhasil Dihapus');
            document.location.href = 'makanan.php';
            </script>";
}