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
            mysqli_query($con,"insert into tb_pemeriksaan values('','$_POST[nama_pasien]','$_POST[klinik]','$_POST[nama_dokter]','$_POST[tgl]','$_POST[hasil_penguji]','$_POST[biaya]')");
            echo "<script>alert('Tersimpan')</script>";
            echo "<script>document.location.href='?pemeriksaan';</script>";
        }

        
        if(isset($_GET['hapus'])){
            mysqli_query($con,"delete from tb_pemeriksaan where id='$_GET[id]'");
            echo "<script>alert('Data terhapus');</script>";
            echo "<script>document.location.href='?pemeriksaan';</script>";
        }

        if(isset($_GET['edit'])){
            $ed=mysqli_query($con,"select * from tb_pemeriksaan where id='$_GET[id]'");
            $edit=mysqli_fetch_array($ed);
        }

        if(isset($_POST['update'])){
            mysqli_query ($con, "update tb_pemeriksaan set nama_pasien='$_POST[nama_pasien]',klinik='$_POST[klinik]',nama_dokter='$_POST[nama_dokter]',tgl='$_POST[tgl]',hasil_penguji='$_POST[hasil_penguji]',biaya='$_POST[biaya]'
             where id='$_GET[id]'");
             echo "<script>alert('Data Terubah');</script>";
             echo "<script>document.location.href='?pemeriksaan';</script>";
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

    <h1>pemeriksaan</h1>

   
    <br>
    <br>        
    
      <br>
      <form method="post">
    <table class="table dark" >
        
        <tr>
            <td>Nama Pasien</td>
            <td>:</td>
            <td><input type="text" name="nama_pasien" value="<?php echo @$edit ['nama_pasien']?>"></td>
        </tr>
        <tr>
            <td>Klinik</td>
            <td>:</td>
            <td><input type="text" name="klinik" value="<?php echo @$edit ['klinik']?>"></td>
        </tr><tr>
            <td>Nama Dokter</td>
            <td>:</td>
            <td><input type="text" name="nama_dokter" value="<?php echo @$edit ['nama_dokter']?>"></td>
        </tr>
        <tr>
            <td>Tanggal</td>
            <td>:</td>
            <td><input type="date" name="tgl" value="<?php echo @$edit ['tgl']?>"></td>
        </tr>
        <tr>
            <td>Hasil Penguji</td>
            <td>:</td>
            <td><input type="text" name="hasil_penguji" value="<?php echo @$edit ['hasil_penguji']?>"></td>
        </tr>
        <tr>
            <td>Biaya</td>
            <td>:</td>
            <td><input type="text" name="biaya" value="<?php echo @$edit ['biaya']?>"></td>
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
            <td>Nama Pasien</td>
            <td>Klinik</td>
            <td>Nama Dokter</td>
            <td>Tanggal</td>
            <td>Hasil Pengujian</td>
            <td>Biaya</td>
            <td>Action</td>
        </tr> 
        <?php
        if(isset($_POST['cari'])){
            $sql=mysqli_query($con,"select * from tb_pemeriksaan where nama_pasien like '%$_POST[tcari]%'"); 
        }else{
            $sql=mysqli_query($con,"select * from tb_pemeriksaan");
        }
        $no=0;
        while($data=mysqli_fetch_array($sql)){ 
            $no++;
        ?>
        <tr>
            <td><?php echo $no ?></td>
            <td><?php echo $data['nama_pasien']?></td>
            <td><?php echo $data['klinik']?></td>
            <td><?php echo $data['nama_dokter']?></td>
            <td><?php echo $data['tgl']?></td>
            <td><?php echo $data['hasil_penguji']?></td>
            <td><?php echo $data['biaya']?></td>
            <td><a href="?pemeriksaan&menu&hapus&id=<?php echo $data['id']?>" class="btn btn-danger">Hapus</a>      <a href="?pemeriksaan&menu&edit&id=<?php echo $data['id']?>" class="btn btn-success">Edit</a></td>
           
        </tr>
        <?php } ?>
    </table>
    

        </form>
  </body>
</html>