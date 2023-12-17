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

$tittle = 'Detail Makanan';

include 'layout/header.php';

//mengambil id makanan
$id_makanan = (int)$_GET['id_makanan'];

//menampilkan data makanan
$makanan = select ("SELECT * FROM makanan WHERE id_makanan = $id_makanan")[0];

?>

<div class="container mt-5">
        <h1>Data <?= $makanan['nama']; ?></h1>
        <hr>

        <table class="table table-bordered table-striped mt-3">
            <tr>
                <td>Nama</td>
                <td>: <?= $makanan['nama']; ?></td>
            </tr>

            <tr>
                <td width="20%">Foto</td>
                <td>
                    <a href="img/<?= $makanan['foto']; ?>">
                        <img src="img/<?= $makanan['foto']; ?>" alt="makanan" width="20%">
                    </a>
                </td>
            </tr>

            <tr>
                <td>Deskripsi Makanan</td>
                <td>: <?= $makanan['deskripsi_makanan']; ?></td>
            </tr>

            <tr>
                <td>Harga</td>
                <td>: <?= $makanan['harga']; ?></td>
            </tr>
        </table>

        <a href="makanan.php" class="btn btn-secondary btn-sm" style="float: right;">Kembali</a>
    </div>

<?php include 'layout/footer.php'; ?>