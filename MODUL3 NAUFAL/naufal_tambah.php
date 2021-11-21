<?php
require_once "db_connection.php";
$user = "Naufal_1202193309";
if (isset($_POST['submit'])) {
    $judul_buku = $_POST['judul_buku'];
    $penulis_buku = $_POST['penulis_buku'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $deskripsi = $_POST['deskripsi'];
    $bahasa = $_POST['bahasa'];
    $tag = $_POST['tag'];
    $chk = "";
    foreach ($tag as $chk1) {
        $chk .= $chk1 . ",";
    }
    $temp = $_FILES['file_upload']['tmp_name'];
    $gambar = rand(0, 9999) . $_FILES['file_upload']['name'];
    $size = $_FILES['file_upload']['size'];
    $type = $_FILES['file_upload']['type'];
    $folder = "assets/img/";


    $sql = "INSERT INTO buku_table (judul_buku,penulis_buku,tahun_terbit,deskripsi,bahasa,tag,gambar) VALUES ('$judul_buku','$penulis_buku','$tahun_terbit','$deskripsi','$bahasa','$chk','$gambar')";
    $res = $conn->query($sql);
    if ($res) {
        if ($size < 20480000 and ($type == 'image/jpeg' or $type == 'image/png' or $type == 'image/jpg')) {
            move_uploaded_file($temp, $folder . $gambar);
        }
        header("Location: naufal_index.php");
    } else {
        echo "Error euy cek deui mang";
    }
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


    <!-- TAMBAH DATA -->
    <div class="container">
        <form action="naufal_tambah.php" method="post" enctype="multipart/form-data">

            <div class="row mt-5 pb-5 d-flex justify-content-center">
                <div class="col-lg-9 col-md-8 col-sm-12 shadow p-3 mb-5 bg-body rounded mt-5">
                    <h3 class="card-title text-center mt-4">Tambah Data Buku</h3>
                    <div class="card-body">

                        <!-- input Judul buku -->
                        <div class="form-group fw-bold mb-3">
                            <label for="judul_buku">Judul</label>
                            <input type="text" class="form-control" name="judul_buku" required id="judul_buku">
                        </div>

                        <!-- Input Penulis buku -->
                        <div class="form-group mb-3 fw-bold mb-3">
                            <label for="penulis_buku">Penulis</label>
                            <input type="text" class="form-control" value="<?= $user ?>" name="penulis_buku" required id="penulis_buku" readonly>
                        </div>

                        <!-- Input Penulis buku -->
                        <div class="form-group mb-3 fw-bold mb-3">
                            <label for="tahun_terbit">Tahun Terbit</label>
                            <input type="number" class="form-control" name="tahun_terbit" required id="tahun_terbit">
                        </div>

                        <!-- Input Deskripsi buku -->
                        <div class="form-group mb-3 fw-bold mb-3">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" class="form-control" rows="4"></textarea>
                        </div>


                        <!-- Input Bahasa -->
                        <div class="form-group" id="bahasa">
                            <label for="tag" class="col-sm-1 col-form-label"><b>Bahasa</b></label>

                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="bahasa" required id="bahasa_indonesia" value="Indonesia">
                                <label for="bahasa_indonesia" class="form-check-label">Indonesia</label>
                            </div>


                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input ml-3" name="bahasa" required id="bahasa_lainnya" value="Lainnya">
                                <label for="bahasa_lainnya" class="form-check-label">Lainnya</label>
                            </div>
                        </div>


                        <!-- input tag -->
                        <div class="form-group">
                            <label for="tag" class="col-sm-1 col-form-label"><b>Tag</b></label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="tag_pemograman" value="Pemograman" name="tag[]">
                                <label class="form-check-label" for="tag_pemograman">Pemrograman</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="tag_website" value="Website" name="tag[]">
                                <label class="form-check-label" for="tag_website">Website</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="tag_java" value="Java" name="tag[]">
                                <label class="form-check-label" for="tag_java">Java</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="tag_oop" value="OOP" name="tag[]">
                                <label class="form-check-label" for="tag_oop">OOP</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="tag_mvc" value="MVC" name="tag[]">
                                <label class="form-check-label" for="tag_mvc">MVC</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="tag_kalkulus" value="Kalkulus" name="tag[]">
                                <label class="form-check-label" for="tag_kalkulus">Kalkulus</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="tag_lainnya" value="Lainnya" name="tag[]">
                                <label class="form-check-label" for="tag_lainnya">Lainnya</label>
                            </div>

                            <!-- Input gambar -->
                            <label for="file_upload" class="col-sm-5 col-form-label"><b>Upload Gambar</b></label>
                            <div class="form-controll" id="file_upload">
                                <input type="file" class="custom-file-input" name="file_upload" id="customFile">
                            </div>
                            <!-- SUBMIT -->

                            <div class="mt-5 text-center">
                                <button type="submit" name="submit" class="btn btn-primary mr-1 px-5">TAMBAH</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
    </div>
    </form>
    </div>
    </div>

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


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script !src="">
        $(document).on('change', '.custom-file-input', function(event) {
            $(this).next('.custom-file-label').html(event.target.files[0].name);
        });
    </script>
</body>

</html>