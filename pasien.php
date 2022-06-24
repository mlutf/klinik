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
        mysqli_query($con,"insert into tb_pasien values('','$_POST[nama_pasien]','$_POST[jk]','$_POST[tgl_lahir]','$_POST[alamat]','$_POST[no_hp]')");
        echo "<script>alert('Tersimpan')</script>";
        echo "<script>document.location.href='?pasien';</script>";
    }
    if(isset($_GET['hapus'])){
        mysqli_query($con,"delete from tb_pasien where id='$_GET[id]'");
        echo "<script>alert('Terhapus')</script>";
        echo "<script>document.location.href='?pasien';</script>";
    }
    if(isset($_GET['edit'])){
        $ed=mysqli_query($con,"select * from tb_pasien where id='$_GET[id]'");
        $edit=mysqli_fetch_array($ed);
    }
    if(isset($_POST['update'])){
        mysqli_query($con, "update tb_pasien set nama_pasien='$_POST[nama_pasien]',jk='$_POST[jk]',tgl_lahir='$_POST[tgl_lahir]',alamat='$_POST[alamat]',no_hp='$_POST[no_hp]' where id='$_GET[id]'");
        echo "<script>alert('Data Terubah');</script>";
        echo "<script>document.location.href='?pasien';</script>";
    }
    ?>
    <div class="container-fluid mt-3">
        <h1>Pasien</h1>
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
            <label for="staticEmail" class="col-sm-2 col-form-label">Nama Pasien  :</label>
            <div class="col-sm-10">
            <select class="form-select" id="floatingSelectGrid" name="jk" style="width: 400px;" class="form-control">
                        <?php
                        $jk=array("--Pilih Jenis Kelamin--","Laki-laki","Perempuan");
                        foreach($jk as $jk){
                        ?>
                        <option value="<?php echo @$jk ?>"<?php if($jk==@$edit['jk']) echo "selected='selected'"?>><?php echo @$jk ?></option>
                        <?php } ?>
                        
                    </select>
            </div>
        </div>
       
       
        <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Tanggal Lahir  :</label>
            <div class="col-sm-10">
            <input type="date" name="tgl_lahir" value="<?php echo @$edit['tgl_lahir']?>" style="width: 400px;" class="form-control" id="staticEmail">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Alamat  :</label>
            <div class="col-sm-10">
            <textarea name="alamat" type="text" class="form-control" cols="30" rows="10" style="width: 400px;" value="<?php echo @$edit['alamat']?>"></textarea>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-2 col-form-label">No HP :</label>
            <div class="col-sm-10">
            <input type="text" name="no_hp" value="<?php echo @$edit['no_hp']?>" style="width: 400px;" class="form-control" id="staticEmail">
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
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Tanggal Lahir</th>
                <th scope="col">Alamat</th>
                <th scope="col">No HP</th>
                <th scope="col">Action</th>
                </tr>
            </thead>

            <tbody>
                <?php
                include "koneksi.php";
                if(isset($_POST['cari'])){
                    $sql = mysqli_query($con,"select * from tb_pasien where nama_pasien like '%$_POST[tcari]%'");
                }else{
                $sql = mysqli_query($con,"select * from tb_pasien");
                }
                $no=0;
                while($data=mysqli_fetch_array($sql)){
                    $no++;
                
                ?>
                <tr>
                <td><?php echo $data['id']?></td>
                <td><?php echo $data['nama_pasien']?></td>
                <td><?php echo $data['jk']?></td>
                <td><?php echo $data['tgl_lahir']?></td>
                <td><?php echo $data['alamat']?></td>
                <td><?php echo $data['no_hp']?></td>
                <td>
                    <a href="?pasien&hapus&id=<?php echo $data['id']?>" class="btn btn-danger">Hapus</a>
                    <a href="?pasien&edit&id=<?php echo $data['id']?>" class="btn btn-success">Edit</a>
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