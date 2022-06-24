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
            mysqli_query($con,"insert into tb_dokter values('','$_POST[nama_dokter]','$_POST[jk]','$_POST[alamat]','$_POST[tgl_lahir]','$_POST[spesialis]','$_POST[no_hp]','$_POST[email]','$_POST[username]','$_POST[password]','$_POST[klinik]')");
            echo "<script>alert('Tersimpan')</script>";
            echo "<script>document.location.href='?dokter';</script>";
        }

        
        if(isset($_GET['hapus'])){
            mysqli_query($con,"delete from tb_dokter where id='$_GET[id]'");
            echo "<script>alert('Data terhapus');</script>";
            echo "<script>document.location.href='?dokter';</script>";
        }

        if(isset($_GET['edit'])){
            $ed=mysqli_query($con,"select * from tb_dokter where id='$_GET[id]'");
            $edit=mysqli_fetch_array($ed);
        }

        if(isset($_POST['update'])){
            mysqli_query ($con, "update tb_dokter set nama_dokter='$_POST[nama_dokter]',jk='$_POST[jk]',alamat='$_POST[alamat]',tgl_lahir='$_POST[tgl_lahir]',specialis='$_POST[spesialis]',no_hp='$_POST[no_hp]',email='$_POST[email]',username='$_POST[username]',password='$_POST[password]',klinik='$_POST[klinik]' where id='$_GET[id]'");
             echo "<script>alert('Data Terubah');</script>";
             echo "<script>document.location.href='?dokter';</script>";
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
<div class="container-fluid">
    <center>  <h1>Dokter</h1></center>
  

   
    <br>
    <br>        
    
      <br>
      <form method="post">
    <table class="table dark" >
    <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Nama Dokter  </label>
            <div class="col-sm-10">
            <input  type="text" name="nama_dokter" value="<?php echo @$edit ['nama_dokter']?>" style="width: 400px;" class="form-control" id="staticEmail">
            </div>
        </div>
    <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Jenis Kelamin  </label>
            <div class="col-sm-10">
            <select style="width: 400px;" name="jk" class="form-control">
                <?php
                $jk=array("--Pilih Jenis Kelamin","laki-laki","perempuan");
                foreach($jk as $jk){
                ?>
                <option value="<?php echo @$jk ?>"<?php if(@$jk==@$edit['jk']) echo "selected='selected'"?>><?php echo @$jk ?></option>
                <?php } ?>
                
            </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Alamat  </label>
            <div class="col-sm-10">
            <textarea name="alamat" cols="50" rows="10" ><?php echo @$edit ['alamat']?></textarea>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Tanggal Lahir  </label>
            <div class="col-sm-10">
            <input type="date" name="tgl_lahir" value="<?php echo @$edit ['tgl_lahir']?>" style="width: 400px;" class="form-control" id="staticEmail">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Spesialis  </label>
            <div class="col-sm-10">
            <input   type="text" name="spesialis" value="<?php echo @$edit ['specialis']?>" style="width: 400px;" class="form-control" id="staticEmail">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Nomor HP</label>
            <div class="col-sm-10">
            <input  type="text" name="no_hp" value="<?php echo @$edit ['no_hp']?>" style="width: 400px;" class="form-control" id="staticEmail">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
            <input type="text" name="email" value="<?php echo @$edit ['email']?>" style="width: 400px;" class="form-control" id="staticEmail">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Username</label>
            <div class="col-sm-10">
            <input  type="text" name="username" value="<?php echo @$edit ['username']?>" style="width: 400px;" class="form-control" id="staticEmail">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
            <input  type="password" name="password" value="<?php echo @$edit ['password']?>" style="width: 400px;" class="form-control" id="staticEmail">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Klinik </label>
            <div class="col-sm-10">
            <select name="klinik" id=""  class="form-control" style="width: 400px;">
                    <option value="">Pilih Klinik</option>
                    <?php
                    $kl=mysqli_query($con,"select * from tb_klinik");
                    while($klinik=mysqli_fetch_array($kl)){
                        ?>
                        <option value="<?php echo @$klinik ['nama_klinik']?>"<?php if(@$edit['klinik']==@$klinik['nama_klinik']) echo "selected='selected'" ?>><?php echo @$klinik ['nama_klinik']?></option>
                   <?php } ?>
                   
                </select>
            </div>
        </div>
        
        <tr>
           
            <td><?php
            if(isset($_GET['edit'])){ ?>
                <input class="btn btn-warning" type="submit" name="update" value="update">
            <?php } else { ?>
                <input class="btn btn-success" type="submit" name="simpan" value="simpan"></td>
            <?php } ?>
        </tr>
        <div class="row justify-content-end">
           <div class="col-4">
        <div class="input-group">
            
        <input type="text" class="form-control" name="tcari" placeholder="Search"  aria-describedby="button-addon2">
        <button class="col-3 btn btn-primary" name="cari" type="submit" id="button-addon2">Cari</button>
        </div>    
        </div>
        </table>
            </form>
        
<form method="post">
        <table class="table table-striped" >
            
        <tr>
            <td>NO</td>
            <td>Nama Dokter</td>
            <td>Jenis Kelamin</td>
            <td>Alamat</td>
            <td>Tangal Lahir</td>
            <td>Specialis</td>
            <td>Nomor HP</td>
            <td>Email</td>
            <td>username</td>
            <td>password</td>
            <td>Klinik</td>
            <td>Action</td>
        </tr> 
        <?php
        if(isset($_POST['cari'])){
            $sql=mysqli_query($con,"select * from tb_dokter where nama_dokter like '%$_POST[tcari]%'"); 
        }else{
            $sql=mysqli_query($con,"select * from tb_dokter");
        }
        $no=0;
        while($data=mysqli_fetch_array($sql)){ 
            $no++;
        ?>
        <tr>
            <td><?php echo $no ?></td>
            <td><?php echo $data['nama_dokter']?></td>
            <td><?php echo $data['jk']?></td>
            <td><?php echo $data['alamat']?></td>
            <td><?php echo $data['tgl_lahir']?></td>
            <td><?php echo $data['specialis']?></td>
            <td><?php echo $data['no_hp']?></td>
            <td><?php echo $data['email']?></td>
            <td><?php echo $data['username']?></td>
            <td><?php echo $data['password']?></td>
            <td><?php echo $data['klinik']?></td>
            <td><a href="?dokter&menu&hapus&id=<?php echo $data['id']?>" class="btn btn-danger">Hapus</a>      <a href="?dokter&menu&edit&id=<?php echo $data['id']?>" class="btn btn-success">Edit</a></td>
           
        </tr>
        <?php } ?>
    </table>
    

        </form>
        </div>
  </body>
</html>