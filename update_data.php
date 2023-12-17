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

$tittle = 'Ubah Data';

include 'layout/header.php';

//mengambil id_pemesanan
$id_pemesanan = (int)$_GET['id_pemesanan'];

$pemesanan = select("SELECT * FROM pemesanan WHERE id_pemesanan = $id_pemesanan")[0];

//check data
if (isset($_POST['update'])) {
    if (update_pemesanan($_POST) > 0 ) {
        echo "<script>
                alert ('Data Pemesanan Berhasil Diupdate');
                document.location.href = 'crud.php';
            </script>";
    } else {
        echo "<script>
                alert ('Data Pemesanan Gagal Diupdate');
                document.location.href = 'crud.php';
            </script>";
    }
}

?>
    
    <div class="container mt-5">
        <h1>Ubah Data</h1>
        <hr>

        <form action="" method="post">
            <input type="hidden" name="id_pemesanan" value="<?= $pemesanan['id_pemesanan']; ?>">

            <div class="mb-3">
                <label for="nama" class="form-label">Nama Customer</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= $pemesanan['nama']; ?>" placeholder="Masukkan nama anda" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= $pemesanan['email']; ?>" placeholder="Masukkan email anda" required>
            </div>

            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah Meja</label>
                <input type="number" class="form-control" id="jumlah" name="jumlah" value="<?= $pemesanan['jumlah']; ?>" placeholder="Masukkan jumlah meja yang dipesan" required>
            </div>

            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal Pemesanan</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= $pemesanan['tanggal']; ?>" required>
            </div>

            <button type="submit" name="update" class="btn btn-primary" style="float: right;">Update Data</button>
        </form>
    </div>

<?php include 'layout/footer.php'; ?>