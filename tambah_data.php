<?php

//session_start();
//membatasi halaman sebelum login
//if (!isset($_SESSION["login"])) {
//    echo "<script>
//            alert('login terlebih dahulu');
//            document.location.href = 'login.php';
//          </script>";
//  exit;
//}

$tittle = 'Tambah Data';

include 'layout/header.php';

//check data
if (isset($_POST['tambah'])) {
    if (create_pemesanan($_POST) > 0 ) {
        echo "<script>
                alert ('Data Pemesanan Berhasil Ditambahkan');
                document.location.href = 'crud.php';
            </script>";
    } else {
        echo "<script>
                alert ('Data Pemesanan Gagal Ditambahkan');
                document.location.href = 'crud.php';
            </script>";
    }
}

?>
    
    <div class="container mt-5">
        <h1>Tambah Data</h1>
        <hr>

        <form action="" method="post">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Customer</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama anda" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email anda" required>
            </div>

            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah Meja</label>
                <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Masukkan jumlah meja yang dipesan" required>
            </div>

            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal Pemesanan</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal" required>
            </div>

            <button type="submit" name="tambah" class="btn btn-primary" style="float: right;">Tambah Data</button>
        </form>
    </div>

<?php include 'layout/footer.php'; ?>