<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Klinik</title>
  </head>
  <body>
      
      <?php
        include "koneksi.php";
        if(isset($_POST['simpan'])){
            mysqli_query($con,"insert into tb_petugas values('','$_POST[nama_petugas]','$_POST[jabatan]','$_POST[jk]','$_POST[no_hp]','$_POST[username]','$_POST[password]')");
            echo "<script>alert('Tersimpan')</script>";
            echo "<script>document.location.href='?petugas';</script>";
        }

        
        if(isset($_GET['hapus'])){
            mysqli_query($con,"delete from tb_petugas where id='$_GET[id]'");
            echo "<script>alert('Data terhapus');</script>";
            echo "<script>document.location.href='?petugas';</script>";
        }

        if(isset($_GET['edit'])){
            $ed=mysqli_query($con,"select * from tb_petugas where id='$_GET[id]'");
            $edit=mysqli_fetch_array($ed);
        }

        if(isset($_POST['update'])){
            mysqli_query ($con, "update tb_petugas set nama_petugas='$_POST[nama_petugas]',jabatan='$_POST[jabatan]',jk='$_POST[jk]',no_hp'$_POST[no_hp]',username='$_POST[username]',password='$_POST[password]' where id='$_GET[id]'");
             echo "<script>alert('Data Terubah');</script>";
             echo "<script>document.location.href='?petugas';</script>";
        }
        
        ?>
          
        <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
-->

    <h1>petugas</h1>

   
    <br>
    <br>        
    
      <br>
      <form method="post">
    <table class="table dark" >
        
        <tr>
            <td>Nama Petugas</td>
            <td>:</td>
            <td><input type="text" name="nama_petugas" value="<?php echo @$edit ['nama_petugas']?>"></td>
        </tr>
        <tr>
            <td>Jabatan</td>
            <td>:</td>
            <td><input type="text" name="jabatan" value="<?php echo @$edit ['jabatan']?>"></td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td><input type="text" name="jk" value="<?php echo @$edit ['jk']?>"></td>
        </tr>
        <tr>
            <td>Nomor HP</td>
            <td>:</td>
            <td><input type="text" name="no_hp" value="<?php echo @$edit ['no_hp']?>"></td>
        </tr>
        <tr>
            <td>Username</td>
            <td>:</td>
            <td><input type="text" name="username" value="<?php echo @$edit['username']?>"></td>
        </tr>
        <tr>
            <td>Password</td>
            <td>:</td>
            <td><input type="text" name="password" value="<?php echo @$edit['password']?>"></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td><?php
            if(isset($_GET['edit'])){ ?>
                <input class="btn btn-warning" type="submit" name="update" value="update">
            <?php } else { ?>
                <input class="btn btn-success" type="submit" name="simpan" value="simpan"></td>
            <?php } ?>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><input type="text" name="tcari"> <input type="submit" name="cari" value="cari"></td>
        </tr>
        </table>
            </form>
        
<form method="post">
        <table class="table table-striped" >
            
        <tr>
            <td>NO</td>
            <td>Nama Petugas</td>
            <td>Jabatan</td>
            <td>Jenis Kelamin</td>
            <td>Nomor HP</td>
            <td>username</td>
            <td>password</td>
            <td>Action</td>
        </tr> 
        <?php
        if(isset($_POST['cari'])){
            $sql=mysqli_query($con,"select * from tb_petugas where nama_petugas like '%$_POST[tcari]%'"); 
        }else{
            $sql=mysqli_query($con,"select * from tb_petugas");
        }
        $no=0;
        while($data=mysqli_fetch_array($sql)){ 
            $no++;
        ?>
        <tr>
            <td><?php echo $no ?></td>
            <td><?php echo $data['nama_petugas']?></td>
            <td><?php echo $data['jabatan']?></td>
            <td><?php echo $data['jk']?></td>
            <td><?php echo $data['no_hp']?></td>
            <td><?php echo $data['username']?></td>
            <td><?php echo $data['password']?></td>
            <td><a href="?petugas&menu&hapus&id=<?php echo $data['id']?>" class="btn btn-danger">Hapus</a>      <a href="?petugas&menu&edit&id=<?php echo $data['id']?>" class="btn btn-success">Edit</a></td>
           
        </tr>
        <?php } ?>
    </table>
    

        </form>
  </body>
</html>