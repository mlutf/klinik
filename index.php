<?php
@session_start();
include "koneksi.php";
if(isset($_POST['login'])){
$sql=mysqli_query($con,"select * from tb_dokter where username='$_POST[username]' and password='$_POST[password]'");
$data=mysqli_num_rows($sql);
if($data>=1){
    $_SESSION['username']=$_POST['username'];
    $_SESSION['password']=$_POST['password'];
    echo "<script>alert('selamat Datang');</script>";
    echo "<script>document.location.href='utama.php';</script>";
}else{
    echo "<script>alert('Username atau password salah');</script>";
    echo "<script>document.location.href='index.php';</script>";
}}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <title>Klinik</title>
  </head>
  <body>
<h1>Login Form</h1>
<form method="post">
<form class="d-flex justify-content-center">
  <div class="mb-3">
    <label class="form-label">Username</label>
    <input type="text" name="username" style="width: 400px;" class="form-control" placeholder="Masukkan Username">
  </div>
  <div class="mb-3">
    <label for="exampleDropdownFormPassword2" class="form-label">Password</label>
    <input type="password" class="form-control" style="width: 400px;" id="exampleDropdownFormPassword2" name="password" placeholder="Masukkan Password">
  </div>
  <div class="mb-3">
    <div class="form-check">
      <input type="checkbox" class="form-check-input" id="dropdownCheck2">
      <label class="form-check-label" for="dropdownCheck2">
        Remember me
      </label>
    </div>
  </div>
  <button type="submit" name="login" class="btn btn-primary">Login</button>
</form>
</body>
</html>