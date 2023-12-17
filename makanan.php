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

if ($_SESSION["level"] != 1 and $_SESSION["level"] != 3) {
  echo "<script>
          alert('Anda tidak mempunyai akses');
          document.location.href = 'crud_modal.php';
        </script>";
exit;
}

$tittle = 'Daftar Makanan';

include 'layout/header.php';

$data_makanan = select ("SELECT * FROM makanan ORDER BY id_makanan DESC");

?>

<div class="container mt-5">
        <h1><i class="fas fa-list"></i>Data Makanan</h1>
        <hr>

        <a href="tambah_makanan.php" class="btn btn-primary mb-1" ><i class="fas fa-plus-circle"></i>Tambah</a>

        <table class="table table-bordered table-striped mt-3" id="table">
            <thead>
              <tr>
                <th><center>No</center></th>
                <th><center>Nama</center></th>
                <th><center>Deskripsi Makanan</center></th>
                <th><center>Harga</center></th>
                <th><center>Opsi</center></th>
              </tr>
            </thead>

            <tbody>
            <?php $no = 1; ?>
              <?php foreach ($data_makanan as $makanan): ?>
              <tr>
                <td><?= $no++; ?></td>
                <td><?= $makanan['nama']; ?></td>
                <td><?= $makanan['deskripsi_makanan']; ?></td>
                <td>Rp. <?= number_format($makanan['harga'],0,',','.'); ?></td>
                <td width="30%" class="text-center">
                    <a href="detail_makanan.php?id_makanan=<?= $makanan['id_makanan']; ?>" class="btn btn-secondary btn-sm"><i class="fas fa-eye"></i>Detail</a>
                    <a href="update_makanan.php?id_makanan=<?= $makanan['id_makanan']; ?>" class="btn btn-success btn-sm"><i class="fas fa-edit"></i>Ubah</a>
                    <a href="hapus_makanan.php?id_makanan=<?= $makanan['id_makanan']; ?>" 
                    class="btn btn-danger btn-sm" onclick="return confirm('Yakin untuk menghapus data.?');"><i class="fas fa-trash-alt"></i>Hapus</a>
                </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
        </table>
    </div>

<?php include 'layout/footer.php'; ?>