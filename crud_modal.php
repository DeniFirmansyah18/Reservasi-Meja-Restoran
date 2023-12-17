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

$tittle = 'Daftar Akun';

include 'layout/header.php';

$data_akun = select("SELECT * FROM akun");

$id_akun = $_SESSION['id_akun'];
$data_bylogin = select("SELECT * FROM akun WHERE id_akun = $id_akun");

//konfirmasi
if (isset($_POST['tambah'])) {
    if (create_akun($_POST) > 0 ) {
        echo "<script>
                alert ('Data Akun Berhasil Ditambahkan');
                document.location.href = 'crud_modal.php';
            </script>";
    } else {
        echo "<script>
                alert ('Data Akun Gagal Ditambahkan');
                document.location.href = 'crud_modal.php';
            </script>";
    }
}

if (isset($_POST['ubah'])) {
    if (update_akun($_POST) > 0 ) {
        echo "<script>
                alert ('Data Akun Berhasil Diubah');
                document.location.href = 'crud_modal.php';
            </script>";
    } else {
        echo "<script>
                alert ('Data Akun Gagal Diubah');
                document.location.href = 'crud_modal.php';
            </script>";
    }
}

?>
    
    <div class="container mt-5">
        <h1><i class="fas fa-list"></i>Data Akun</h1>
        <hr>

        <?php if ($_SESSION['level'] == 1) : ?>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTambah"><i class="fas fa-plus-circle"></i>
          Tambah
        </button>
        <?php endif; ?>

        <table class="table table-bordered table-striped mt-3" id="table">
            <thead>
              <tr>
                <th><center>No</center></th>
                <th><center>Nama</center></th>
                <th><center>Username</center></th>
                <th><center>Email</center></th>
                <th><center>Password</center></th>
                <th><center>Opsi</center></th>
              </tr>
            </thead>

            <tbody>
            <?php $no = 1; ?>
            <!-- tampil seluruh data -->
            <?php if ($_SESSION['level'] == 1) : ?>
              <?php foreach ($data_akun as $akun): ?>
              <tr>
                <td><?= $no++; ?></td>
                <td><?= $akun['nama']; ?></td>
                <td><?= $akun['username']; ?></td>
                <td><?= $akun['email']; ?></td>
                <td>Password Terkunci</td>
                <td class="text-center">
                <button type="button" class="btn btn-primary mb-1" data-toggle="modal" data-target="#modalUbah"><i class="fas fa-plus-edit"></i>
                  Ubah
                </button>
                <button type="button" class="btn btn-danger mb-1" data-toggle="modal" data-target="#modalHapus"><i class="fas fa-trash-alt"></i>
                  Hapus
                </button>
                </td>
              </tr>
              <?php endforeach; ?>
              <?php else : ?>
              <!-- tampil seluruh data -->
              <?php foreach ($data_bylogin as $akun): ?>
              <tr>
                <td><?= $no++; ?></td>
                <td><?= $akun['nama']; ?></td>
                <td><?= $akun['username']; ?></td>
                <td><?= $akun['email']; ?></td>
                <td>Password Terkunci</td>
                <td class="text-center">
                    <button type="button" class="btn btn-success mb-1" data-toggle="modal" 
                    data-target="#modalUbah"><i class="fas fa-edit"></i>Ubah</button>
                </td>
              </tr>
              <?php endforeach; ?>
              <?php endif; ?>
            </tbody>
        </table>
    </div>

<!-- Modal Tambah -->

<!-- Modal -->
<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
            <div class="mb-3">
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="level">Level</label>
                <select name="level" id="level" class="form-control" required>
                    <option value="">-- pilih level --</option>
                    <option value="1">Admin</option>
                    <option value="2">Operator Pemesanan</option>
                    <option value="3">Operator Pelanggan</option>
                </select>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
        <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Update -->
<?php foreach ($data_akun as $akun): ?>
<div class="modal fade" id="modalUbah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ubah Akun</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
            <input type="hidden" name="id_akun" value="<?= $akun['id_akun']; ?>">

            <div class="mb-3">
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control" value="<?= $akun['nama']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" class="form-control" value="<?= $akun['username']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="<?= $akun['email']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="password">Password <small>(Masukkan password baru/lama)</small></label>
                <input type="password" name="password" id="password" class="form-control" required minlength="6">
            </div>

            <?php if ($_SESSION['level'] == 1) : ?>
            <div class="mb-3">
                <label for="level">Level</label>
                <select name="level" id="level" class="form-control" required>
                    <?php $level  = $akun['level']; ?>
                    <option value="1" <?= $level == '1' ? 'selected' : null ?>>Admin</option>
                    <option value="2" <?= $level == '2' ? 'selected' : null ?>>Operator Pemesanan</option>
                    <option value="3" <?= $level == '3' ? 'selected' : null ?>>Operator Pelanggan</option>
                </select>
            </div>
            <?php else : ?>
            <input type="hidden" name="level" value="<?= $akun['level']; ?>">
            <?php endif; ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
        <button type="submit" name="ubah" class="btn btn-success">Ubah</button>
      </div>
      </form>
    </div>
  </div>
</div>
<?php endforeach; ?>

<!-- Modal Hapus -->
<?php foreach ($data_akun as $akun): ?>
<div class="modal fade" id="modalHapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Akun</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Apakah anda yakin menghapus data : <?= $akun['nama']; ?>?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
        <a href="hapus_akun.php?id_akun=<?= $akun['id_akun']; ?>" class="btn btn-danger">Hapus</a>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>

<?php include 'layout/footer.php'; ?>