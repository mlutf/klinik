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
      <form method="POST">
    <?php
    include "koneksi.php";
    if(isset($_POST['simpan'])){
        mysqli_query($con,"insert into tb_rekamedis values('','$_POST[nama_pasien]','$_POST[keluhan]','$_POST[tgl]','$_POST[nama_dokter]')");
        echo "<script>alert('Tersimpan')</script>";
        echo "<script>document.location.href='?rekamedis';</script>";
    }
    if(isset($_GET['hapus'])){
        mysqli_query($con,"delete from tb_rekamedis where id='$_GET[id]'");
        echo "<script>alert('Terhapus')</script>";
        echo "<script>document.location.href='?rekamedis';</script>";
    }
    if(isset($_GET['edit'])){
        $ed=mysqli_query($con,"select * from tb_rekamedis where id='$_GET[id]'");
        $edit=mysqli_fetch_array($ed);
    }
    if(isset($_POST['update'])){
        mysqli_query($con, "update tb_rekamedis set nama_pasien='$_POST[nama_pasien]',keluhan='$_POST[keluhan]',tgl='$_POST[tgl]',nama_dokter='$_POST[nama_dokter]' where id='$_GET[id]'");
        echo "<script>alert('Data Terubah');</script>";
        echo "<script>document.location.href='?rekamedis';</script>";
    }
    ?>
    <div class="container-fluid mt-3">
        <h1>Rekamedis</h1>
        <div class="d-grid gap-2 col-3 mb-3">
            <button class="btn btn-primary" type="button">Tambah Data</button>
        </div>
        <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Nama Pasien  :</label>
            <div class="col-sm-10">
            <input type="text" name="nama_pasien" value="<?php echo @$edit['nama_pasien']?>" style="width: 400px;" class="form-control" id="staticEmail">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Keluhan  :</label>
            <div class="col-sm-10">
            <input type="text" name="keluhan" value="<?php echo @$edit['keluhan']?>" style="width: 400px;" class="form-control" id="staticEmail">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Tanggal  :</label>
            <div class="col-sm-10">
            <input type="date" name="tgl" value="<?php echo @$edit['tgl']?>" style="width: 400px;" class="form-control" id="staticEmail">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Nama Dokter  :</label>
            <div class="col-sm-10">
            <input type="text" name="nama_dokter" value="<?php echo @$edit['nama_dokter']?>" style="width: 400px;" class="form-control" id="staticEmail">
            </div>
        </div>
        <?php
        if(isset($_GET['edit'])) { ?>
            <input type="submit" class="btn btn-warning" name="update" value="update">
        <?php } else { ?>
            <input type="submit" class="btn btn-success" name="simpan" value="simpan">
        <?php } ?>
    </div>
    <div class="row justify-content-end">
           <div class="col-4">
        <div class="input-group">
            
        <input type="text" class="form-control" name="tcari" placeholder="Search"  aria-describedby="button-addon2">
        <button class="col-3 btn btn-primary" name="cari" type="submit" id="button-addon2">Cari</button>
        </div>    
        </div>
        <div class="container-sm">
        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">id</th>
                <th scope="col">Nama Pasien</th>
                <th scope="col">Keluham</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Nama Dokter</th>
                <th scope="col">Action</th>
                </tr>
            </thead>

            <tbody>
                <?php
                include "koneksi.php";
                if(isset($_POST['cari'])){
                    $sql = mysqli_query($con,"select * from tb_rekamedis where nama_pasien like '%$_POST[tcari]%'");
                }else{
                $sql = mysqli_query($con,"select * from tb_rekamedis");
                }
                $no=0;
                while($data=mysqli_fetch_array($sql)){
                    $no++;
                
                ?>
                <tr>
                <td><?php echo $data['id']?></td>
                <td><?php echo $data['nama_pasien']?></td>
                <td><?php echo $data['keluhan']?></td>
                <td><?php echo $data['tgl']?></td>
                <td><?php echo $data['nama_dokter']?></td>
                <td>
                    <a href="?rekamedis&hapus&id=<?php echo $data['id']?>" class="btn btn-danger">Hapus</a>
                    <a href="?rekamedis&edit&id=<?php echo $data['id']?>" class="btn btn-success">Edit</a>
                </td>
                </tr>
                <?php } ?>
               
            </tbody>
        </table>
        </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

      </form>
  </body>
</html>