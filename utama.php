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

<form method="post">
    <table border="1" width="100%">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="?beranda">Beranda</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-link active" aria-current="page" href="?klinik">Klinik</a>
            <a class="nav-link active" href="?pasien">Pasien</a>
            <a class="nav-link active" href="?rekamedis">Rekamedis</a>
            <a class="nav-link active" href="?dokter">Dokter</a>
            <a class="nav-link active" href="?pemeriksaan">Pemeriksaan</a>
            <a class="nav-link active" href="?petugas">Petugas</a>
        </div>
        </div>
    </div>
    </nav>
        <tr>
            <td colspan="5" height="500px">
                <?php
                    if(isset($_GET['klinik'])){
                        include "klinik.php";
                    }elseif(isset($_GET['pasien'])){
                        include "pasien.php";
                    }elseif(isset($_GET['rekamedis'])){
                        include "rekamedis.php";
                    }elseif(isset($_GET['dokter'])){
                        include "dokter.php";
                    }elseif(isset($_GET['pemeriksaan'])){
                        include "pemeriksaan.php";
                    }elseif(isset($_GET['petugas'])){
                        include "petugas.php";
                    }else{
                        echo "<script>document.location.href='beranda.php;</script>";
                    }
                ?>
            </td>
        </tr>
    </table>
</form>
</body>
</html>