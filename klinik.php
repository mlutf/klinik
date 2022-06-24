<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
     
      <form action="" method="post">
      
      <?php
      include "koneksi.php";
        if(isset($_POST['simpan'])){
            mysqli_query($con,"insert into tb_klinik values('','$_POST[nama_klinik]')");
            echo "<script>alert('Tersimpan')</script>";
            echo "<script>document.location.href='?klinik';</script>";
        }
        if(isset($_GET['hapus'])){
            mysqli_query($con,"delete from tb_klinik where id_klinik='$_GET[id]'");
            echo "<script>alert('Data terhapus');</script>";
            echo "<script>document.location.href='?klinik';</script>";
        }
        if(isset($_GET['edit'])){
            $ed=mysqli_query($con,"select * from tb_klinik where id_klinik='$_GET[id]'");
            $edit=mysqli_fetch_array($ed);
        }
        if(isset($_POST['update'])){
            mysqli_query($con, "update tb_klinik set nama_klinik='$_POST[nama_klinik]' where id_klinik=$_GET[id]");
            echo "<script>alert('Data terubah');</script>";
            echo "<script>document.location.href='?klinik';</script>";
        }
    ?>
      <div class="container-fluid mt-3">
    <h1>Data Menu</h1>
        <div class="d-grid gap-2 col-3 mb-3">
            <button class="btn btn-primary" type="button">Tambah Data</button>
        </div>
        <div class="container">
            <div class="row-3">
                <div class="form-floating col-6 mb-3">
                    <input type="text" name="nama_klinik" class="form-control" id="floatingInput" placeholder="nama klinik" value="<?php echo @$edit['nama_klinik']?>">
                    <label for="floatingInput">nama klinik</label>
                </div>
                
                <div class=" col-6">
                <?php if(isset($_GET['edit'])){ ?>
                    <button type="submit" name="update" value="update" class="btn btn-outline-dark">Update</button>
                    <?php } else{?>
                <button type="submit" name="simpan" value="simpan" class="btn btn-outline-dark">Simpan</button>
                        <?php } ?>
            </div>
            </div>
        </div>
       
        <div class="row justify-content-end">
           <div class="col-4">
        <div class="input-group">
            
        <input type="text" class="form-control" name="tcari" placeholder="Search"  aria-describedby="button-addon2">
        <button class="col-3 btn btn-primary" name="cari" type="submit" id="button-addon2">Cari</button>
        </div>    
        </div>   
        <table class="table">
            <thead>
                <tr>
                <th scope="col">id klinik</th>
                <th scope="col">Klinik</th>
                <th scope="col">Action</th>
                </tr>
            </thead>

            <tbody>
                <?php
                
                
                if(isset($_POST['cari'])){
                    $sql = mysqli_query($con,"select * from tb_klinik where nama_klinik like '%$_POST[tcari]%'");
                }else{
                $sql = mysqli_query($con,"select * from tb_klinik");
                }
                $no=0;
                while($data=mysqli_fetch_array($sql)){
                    $no++;
                
                ?>
                <tr>
                
                <td><?php echo $data['id_klinik']?></td>
                <td><?php echo $data['nama_klinik']?></td>
                <td>
                    <a href="?klinik&hapus&id=<?php echo $data['id_klinik']?>" class="btn btn-danger">Hapus</a>
                    <a href="?klinik&edit&id=<?php echo $data['id_klinik']?>" class="btn btn-info">Edit</a>
                </td>
                </tr>
                <?php } ?>
               
            </tbody>
        </table>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    </form>
  </body>
</html>