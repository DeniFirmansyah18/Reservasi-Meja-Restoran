<?php
// Mengambil id_pemesanan
include 'config/app.php';

$id_pemesanan = (int)$_GET['id_pemesanan'];

$data_pemesanan = select("SELECT * FROM pemesanan WHERE id_pemesanan = $id_pemesanan")[0];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restoranku</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body style="padding: 0 20;">
    <section class="content">
        <div class="row">
            <div class="span12">
                <table class="table">
                    <tbody>
                        <tr>
                            <td><h2><strong>No Struk </strong>#<?= $data_pemesanan['id_pemesanan']; ?> </h2></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
                <p><strong>Dari</strong></p>
                <address>
                    <strong>Restoranku</strong><br>
                    Jombang<br>
                    Kec. Jogoroto,<br>
                    Jawa Timur 61485<br>
                    Phone: (62) 85158050681<br>
                    Email: restoranku@gmail.com
                </address>
            </div>
            <div class="col-sm-4 invoice-col">
                <p><strong>Kepada</strong></p>
                <address>
                    <strong><?= $data_pemesanan['nama'] ?></strong><br>
                    Email: <?= $data_pemesanan['email'] ?>
                </address>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pelanggan</th>
                            <th>Email</th>
                            <th>Jumlah Meja</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?= $data_pemesanan['id_pemesanan'] ?></td>
                            <td><?= $data_pemesanan['nama']; ?></td>
                            <td><?= $data_pemesanan['email']; ?></td>
                            <td><?= $data_pemesanan['jumlah']; ?></td>
                            <td><?= date('d-m-Y', strtotime($data_pemesanan['tanggal'])); ?></td>
                        </tr>
                        <tr>
                            <td colspan="4"></td>
                            <td><b>*nb Belum termasuk PPN</b></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <script>
        window.onload = function() {
            window.print();
        }
    </script>
</body>
</html>
