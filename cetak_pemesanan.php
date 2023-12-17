<?php

$tittle = 'Cetak Pemesanan';

include 'layout/header.php';

$data_pemesanan = select("SELECT * FROM pemesanan ORDER BY id_pemesanan DESC");

?>
    
    <div class="container mt-5">
        <h1><i class="fas fa-list"></i>Cetak Struk Pemesanan</h1>
        <hr>

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
                <td width="10%" class="text-center">
                    <a href="proses_cetak.php?id_pemesanan=<?= $pemesanan['id_pemesanan']; ?>" class="btn btn-success"><i class="fas fa-print"></i>Cetak</a>
                </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
        </table>
    </div>

<?php include 'layout/footer.php'; ?>