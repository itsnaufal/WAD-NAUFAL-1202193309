<?php
require_once 'db_connection.php';
$sql = "SELECT * FROM buku_table";
$res = $conn->query($sql);
$status = false;
if (mysqli_num_rows($res) > 0) {
    $status = true;
}
?>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/stylesheet.css">

    <title>EAD Library</title>
  </head>
  <body>

    <!-- NAVBAR -->
    <div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <img src="./assets/img/logo-ead.png" alt="" width="150" height="40" class="d-inline-block align-text-top">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                        <a class="nav-link" href="naufal_tambah.php"><button class="btn btn-primary">Tambah Buku</button></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>


    <!-- CONTENT -->
    <section class="container mt-5 mb-5">
      <div class="row">
          <?php
            if ($status) {
                while ($item = $res->fetch_assoc()) {
                    echo '
                        <div class="col-lg-4 col-md-4 col-sm-12 mb-5">
                            <div class="card h-100 border-0 shadow">
                                <div class="card-img-top" style="overflow: hidden; height: 500px;">
                                    <img src="assets/img/' . $item["gambar"] . '" alt="" style="max-width: 100%;object-position: center;object-fit: cover">
                                </div>
                                <div class="card-body">
                                    <div class="row col-12">
                                        <h3>' . $item["judul_buku"] . '</h3>
                                    </div>
                                    <div class="row">
                                        <div class="col-10">
                                            <p>' . $item["deskripsi"] . '</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-center">
                                    <a class="btn btn-primary" href="naufal_detail.php?id_buku=' . $item["id_buku"] . '">Tampilkan lebih lanjut</a>
                                </div>
                            </div>
                        </div>
                ';
                }
            } else {
                echo '
                <div class="col-12">
                    <center>
                        <div style="margin-top: 150px;">
                            <h3>Belum ada buku!</h3>
                            <p>Silahkan tambahkan buku</p>
                        </div>
                      </center>
                </div>
            ';
            }
          ?>
      </div>
    </section>


    <!-- FOOTER -->
        <footer class="" style="background: #F0F0F0; margin-top: 280px;">
        <center>
            <div style="padding-top: 25px; padding-bottom: 10px">
                <img src="./assets/img/logo-ead.png" alt="" width="150" height="40" class="mb-3">
                <h4>Perpustakaan EAD</h4>
                <p>© Naufal_1202193309</p>
            </div>
            </div>
        </center>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
