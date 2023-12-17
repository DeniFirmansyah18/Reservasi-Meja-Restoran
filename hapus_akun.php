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

//menerima id_akun
$id_akun = (int)$_GET['id_akun'];

if (delete_akun($id_akun) > 0 ) {
    echo "<script>
            alert ('Data Akun Berhasil Dihapus');
            document.location.href = 'crud_modal.php';
            </script>";
} else {
    echo "<script>
            alert ('Data Akun Berhasil Dihapus');
            document.location.href = 'crud_modal.php';
            </script>";
}