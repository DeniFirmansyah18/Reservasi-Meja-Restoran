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

$tittle = 'Ubah Data Makanan';

include 'layout/header.php';

//check data
if (isset($_POST['ubah'])) {
    if (update_makanan($_POST) > 0 ) {
        echo "<script>
                alert ('Data makanan Berhasil DiUbah');
                document.location.href = 'makanan.php';
            </script>";
    } else {
        echo "<script>
                alert ('Data makanan Gagal DiUbah');
                document.location.href = 'makanan.php';
            </script>";
    }
}

//ambil id_makanan dari url
$id_makanan = (int)$_GET['id_makanan'];

//query ambil data makanan
$makanan = select("SELECT * FROM makanan WHERE id_makanan = $id_makanan")[0];

?>
    
    <div class="container mt-5">
        <h1>Ubah Data Makanan</h1>
        <hr>

        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_makanan" value="<?= $makanan['id_makanan']; ?>">
            <input type="hidden" name="fotoLama" value="<?= $makanan['foto']; ?>">

            <div class="mb-3">
                <label for="nama" class="form-label">Nama makanan</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama anda" required value="<?= $makanan['nama']; ?>">
            </div>

            <div class="mb-3">
                <label for="deskripsi_makanan" class="form-label">deskripsi_makanan</label>
                <input type="text" class="form-control" id="deskripsi_makanan" name="deskripsi_makanan" placeholder="Masukkan deskripsi makanan" required value="<?= $makanan['deskripsi_makanan']; ?>">
            </div>

            <div class="mb-3">
                <label for="harga" class="form-label">harga</label>
                <input type="number" class="form-control" id="harga" name="harga" placeholder="Masukkan harga" required value="<?= $makanan['harga']; ?>">
            </div>

            <div class="mb-3">
                <label for="foto" class="form-label">Foto</label>
                <input type="file" class="form-control" id="foto" name="foto" placeholder="Masukkan foto" onchange="previewImg()">
                
                <img src="img/<?= $makanan['foto']; ?>" alt="" class="img-thumbnail img-preview mt-2" width="200px">
            </div>

            <button type="submit" name="ubah" class="btn btn-primary" style="float: right;">Update Data</button>
        </form>
    </div>

    <!-- preview image -->
    <script>
        function previewImg() {
            const foto = document.querySelector('#foto');
            const imgPreview = document.querySelector('.img-preview');

            const fileFoto = new FileReader();
            fileFoto.readAsDataURL(foto.files[0]);
            
            fileFoto.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }
    </script>

<?php include 'layout/footer.php'; ?>