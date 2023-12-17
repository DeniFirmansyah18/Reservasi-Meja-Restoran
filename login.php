<?php
  session_start();

  include('config/app.php');

  //check tombol login
  if(isset($_POST['login'])) {
    //ambil input username dan password
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    //check username
    $result = mysqli_query($db, "SELECT * FROM akun WHERE username = '$username'");

    if (mysqli_num_rows($result) == 1) {
      //check password
      $hasil = mysqli_fetch_assoc($result);

      if (password_verify($password, $hasil['password'])) {
        $_SESSION['login']    = true;
        $_SESSION['id_akun']  = $hasil['id_akun'];
        $_SESSION['nama']     = $hasil['nama'];
        $_SESSION['username'] = $hasil['username'];
        $_SESSION['email']    = $hasil['email'];
        $_SESSION['level']    = $hasil['level'];

        //login benar
        header("location: crud.php");
        exit;
    }
  }
  //login salah
  $error = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="css/login-style.css">
    <link rel="icon" href="img/logo.png">
    <title>Login Page</title>
</head>

<body>

    <div class="container" id="container">
        <div class="form-container sign-in">
            <form action="" method="POST">
                <h1>Sign In</h1>
                <span>Masukkan Username Anda</span>
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <?php if (isset($error)) : ?>
                    <div class="alert alert-danger text-center">
                        <b>Username / Password Salah</b>
                    </div>
                <?php endif; ?>
                <button type="submit" name="login">Sign In</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back!</h1>
                    <p>Enter your personal details to use all of site features</p>
                    <button class="hidden" id="login">Sign In</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Hello, Friend!</h1>
                    <p>Login terlebih dahulu untuk dapat mengakses database!</p>
                </div>
            </div>
        </div>
    </div>

    <script src="js/login.js"></script>
</body>

</html>