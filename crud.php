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

//membatasi halaman sebelum login
if ($_SESSION["level"] != 1 and $_SESSION["level"] != 2) {
      echo "<script>
              alert('Anda tidak mempunyai akses');
              document.location.href = 'crud_modal.php';
            </script>";
    exit;
}

$tittle = 'Daftar Pemesanan';

include 'layout/header.php';

$data_pemesanan = select("SELECT * FROM pemesanan ORDER BY id_pemesanan DESC");

?>
    
    <div class="container mt-5">
        <h1><i class="fas fa-list"></i>Data Pemesanan</h1>
        <hr>

        <a href="tambah_data.php" class="btn btn-primary mb-1"><i class="fas fa-plus-circle"></i>Tambah</a>

        <table class="table table-bordered table-striped mt-3" id="table">
            <thead>
              <tr>
                <th><center>No</center></th>
                <th><center>Nama</center></th>
                <th><center>Email</center></th>
                <th><center>Jumlah</center></th>
                <th><center>Tanggal</center></th>
                <th><center>Opsi</center></th>
              </tr>
            </thead>

            <tbody>
              <?php $no = 1; ?>
              <?php foreach ($data_pemesanan as $pemesanan): ?>
              <tr>
                <td><?= $no++; ?></td>
                <td><?= $pemesanan['nama']; ?></td>
                <td><?= $pemesanan['email']; ?></td>
                <td><?= $pemesanan['jumlah']; ?></td>
                <td><?= date('d/m/Y', strtotime($pemesanan['tanggal'])); ?></td>
                <td width="30%" class="text-center">
                    <a href="update_data.php?id_pemesanan=<?= $pemesanan['id_pemesanan']; ?>" class="btn btn-success"><i class="fas fa-edit"></i>Ubah</a>
                    <a href="cetak_pemesanan.php?id_pemesanan=<?= $pemesanan['id_pemesanan']; ?>" class="btn btn-primary"><i class="fas fa-print"></i>Cetak</a>
                    <a href="hapus_data.php?id_pemesanan=<?= $pemesanan['id_pemesanan']; ?>" class="btn btn-danger" onclick="return confirm('Apakah anda ingin melanjutkan.?');"><i class="fas fa-trash-alt"></i>Hapus</a>
                </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
        </table>
    </div>

<?php include 'layout/footer.php'; ?>