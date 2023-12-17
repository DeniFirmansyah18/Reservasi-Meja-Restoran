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

$_SESSION = [];

session_unset();
session_destroy();
header("location: index.php");

?>