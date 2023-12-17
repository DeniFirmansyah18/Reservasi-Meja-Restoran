<?php

//menampilkan database
function select ($query)
{
  //memanggil database
  global $db;

  $result = mysqli_query($db, $query);
  $rows = [];

  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}

//fungsi menambahkan data
function create_pemesanan ($post) {

  global $db;

  $nama   = $post['nama'];
  $email  = $post['email'];
  $jumlah = $post['jumlah'];
  $tanggal  = $post['tanggal'];

  //query tambah data
  $query = "INSERT INTO pemesanan VALUES(null, '$nama', '$email', '$jumlah', '$tanggal')";

  mysqli_query($db, $query);

  return mysqli_affected_rows($db);

}

//fungsi update data
function update_pemesanan ($post) {

  global $db;

  $id_pemesanan = $post['id_pemesanan'];
  $nama         = $post['nama'];
  $email        = $post['email'];
  $jumlah       = $post['jumlah'];
  $tanggal        = $post['tanggal'];

  //query update data
  $query = "UPDATE pemesanan SET nama = '$nama', email = '$email', jumlah = '$jumlah', tanggal = '$tanggal' WHERE id_pemesanan = $id_pemesanan ";

  mysqli_query($db, $query);

  return mysqli_affected_rows($db);

}

//fungsi hapus data
function delete_pemesanan($id_pemesanan) {

  global $db;

  //query hapus data
  $query = "DELETE FROM pemesanan WHERE id_pemesanan = $id_pemesanan";

  mysqli_query($db, $query);

  return mysqli_affected_rows($db);

}

//fungsi tambah data makanan
function create_makanan ($post) {

  global $db;

  $nama                     = $post['nama'];
  $foto                     = upload_file();
  $deskripsi_makanan        = $post['deskripsi_makanan'];
  $harga                    = $post['harga'];

  //check upload foto
  if (!$foto) {
    return false;
  }

  //query tambah data
  $query = "INSERT INTO makanan VALUES(null, '$nama', '$foto', '$deskripsi_makanan', '$harga')";

  mysqli_query($db, $query);

  return mysqli_affected_rows($db);

}

function update_makanan ($post) {

  global $db;

  $id_makanan                = $post['id_makanan'];
  $nama                      = $post['nama'];
  $fotoLama                  = $post['fotoLama'];
  $deskripsi_makanan         = $post['deskripsi_makanan'];
  $harga                     = $post['harga'];

  //check upload foto
  if ($_FILES['foto']['error'] == 4) {
    $foto = $fotoLama;
  } else {
    $foto = upload_file();
  }

  //query update data
  $query = "UPDATE makanan SET nama = '$nama', foto = '$foto', deskripsi_makanan = '$deskripsi_makanan', harga = '$harga'
  WHERE id_makanan = $id_makanan";

  mysqli_query($db, $query);

  return mysqli_affected_rows($db);

}

//fungsi upload file
function upload_file() {

  $namaFile   = $_FILES['foto']['name'];
  $ukuranFile = $_FILES['foto']['size'];
  $error      = $_FILES['foto']['error'];
  $tmpName    = $_FILES['foto']['tmp_name'];

  //check file format
  $extensifileValid = ['jpg', 'jpeg', 'png'];
  $extensifile = explode('.', $namaFile);
  $extensifile = strtolower(end($extensifile));

  //check format
  if (!in_array($extensifile, $extensifileValid)) {
    
    echo "<script>
            alert ('Format File Tidak Valid');
            document.location.href = 'tambah_makanan.php';
          </script>";
    die();
  }

  //check ukuran file maks 2MB
  if ($ukuranFile > 2048000) {
    echo "<script>
            alert ('Ukuran File Max 2 MB');
            document.location.href = 'tambah_makanan.php';
          </script>";
    die();
  }

  //generate nama file baru
  $namaFileBaru = uniqid();
  $namaFileBaru .= '.';
  $namaFileBaru .= $extensifile;

  //pindahkan file ke folder local
  move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
  return $namaFileBaru;

}

//fungsi hapus data makanan
function delete_makanan($id_makanan) {

  global $db;

  //ambil foto sesuai data
  $foto = select("SELECT * FROM makanan WHERE id_makanan = $id_makanan")[0];
  unlink("img/". $foto['foto']);

  //query hapus data
  $query = "DELETE FROM makanan WHERE id_makanan = $id_makanan";

  mysqli_query($db, $query);

  return mysqli_affected_rows($db);

}

function create_akun ($post) {

  global $db;

  $nama            = $post['nama'];
  $username        = $post['username'];
  $email           = $post['email'];
  $password        = $post['password'];
  $level           = $post['level'];

  //enkripsi password
  $password = password_hash($password, PASSWORD_DEFAULT);

  //query tambah data
  $query = "INSERT INTO akun VALUES(null, '$nama', '$username', '$email', '$password', '$level')";

  mysqli_query($db, $query);

  return mysqli_affected_rows($db);

}

function update_akun ($post) {

  global $db;

  $id_akun         = $post['id_akun'];
  $nama            = $post['nama'];
  $username        = $post['username'];
  $email           = $post['email'];
  $password        = $post['password'];
  $level           = $post['level'];

  //enkripsi password
  $password = password_hash($password, PASSWORD_DEFAULT);

  //query ubah data
  $query = "UPDATE akun SET nama = '$nama', username = '$username', email = '$email', 
  password = '$password', level = '$level' WHERE id_akun = $id_akun";

  mysqli_query($db, $query);

  return mysqli_affected_rows($db);

}

function delete_akun($id_akun) {

  global $db;

  //query hapus data
  $query = "DELETE FROM akun WHERE id_akun = $id_akun";

  mysqli_query($db, $query);

  return mysqli_affected_rows($db);

}