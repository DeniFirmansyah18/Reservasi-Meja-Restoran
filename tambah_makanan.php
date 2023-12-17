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

$tittle = 'Tambah Data Makanan';

include 'layout/header.php';

//check data
if (isset($_POST['tambah'])) {
    if (create_makanan($_POST) > 0 ) {
        echo "<script>
                alert ('Data makanan Berhasil Ditambahkan');
                document.location.href = 'makanan.php';
            </script>";
    } else {
        echo "<script>
                alert ('Data makanan Gagal Ditambahkan');
                document.location.href = 'makanan.php';
            </script>";
    }
}

?>
    
    <div class="container mt-5">
        <h1>Tambah Data Makanan</h1>
        <hr>

        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama makanan</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan makanan anda" required>
            </div>

            <div class="mb-3">
                <label for="deskripsi_makanan" class="form-label">Deskripsi makanan</label>
                <input type="text" class="form-control" id="deskripsi_makanan" name="deskripsi_makanan" placeholder="Masukkan deskripsi makanan" required>
            </div>

            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" class="form-control" id="harga" name="harga" placeholder="Masukkan harga" required>
            </div>

            <div class="mb-3">
                <label for="foto" class="form-label">Foto</label>
                <input type="file" class="form-control" id="foto" name="foto" placeholder="Masukkan foto" onchange="previewImg()">

                <img src="" alt="" class="img-thumbnail img-preview mt-2" width="200px">
            </div>

            <button type="submit" name="tambah" class="btn btn-primary" style="float: right;">Tambah Data</button>
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