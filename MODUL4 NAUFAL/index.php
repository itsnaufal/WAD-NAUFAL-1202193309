<?php
require_once 'naufal_koneksi.php';
if (isset($_POST['btn_logout'])) {
    session_destroy();
    $alert = "Logout Berhasil";
    $_SESSION['message'] = $alert;
    header('Location: naufal_login.php');
    exit();
}
if (isset($_POST['btn_add'])) {
    if (!isset($_SESSION['logged_in'])) {
        $alert = "Login heula mang biar akrab xixi";
        $_SESSION['message'] = $alert;
        header('location: naufal_login.php');
        exit();
    } else {
        $user_id = $_SESSION['id'];
        $nama_tempat = $_POST['nama_tempat'];
        $lokasi = $_POST['lokasi'];
        $harga = $_POST['harga'];
        $tanggal = $_POST['tanggal'];
        if (mysqli_query($conn, "INSERT INTO bookings VALUES ('','$user_id','$nama_tempat','$lokasi','$harga','$tanggal')")) {
            $alert = "Berhasil memesan tiket mang!";
            $_SESSION['message'] = $alert;
            header("Location: index.php");
            exit();
        } else {
            $alert = "Eleuh gagal cobian deui mang!";
            $_SESSION['message'] = $alert;
            header("Location: index.php");
            exit();
        }
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EAD TRAVEL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/stylesheet.css">
    <!-- Pixel Code for https://socialproofo.com/demo/ -->
    <script async src="https://socialproofo.com/demo/pixel/cwqog9s93wwp46qv8x7z9qhx8wud2gnz"></script>
    <!-- END Pixel Code -->
</head>

<body>
    <?php
    include 'naufal_navbar.php';
    if (isset($_SESSION['message'])) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <p class="text-center"> ' . $_SESSION["message"] . ' </p>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
        unset($_SESSION['message']);
    }
    $wisata = array(
        array("image" => "raja.jpg", "nama_tempat" => "Raja Ampat", "lokasi" => "Papua", "deskripsi" => "Kepulauan Raja Ampat merupakan rangkaian empat gugusan pulau yang berdekatan dan berlokasi di barat bagian Kepala Burung Pulau Papua. Secara administrasi, gugusan ini berada di bawah Kabupaten Raja Ampat, Provinsi Papua Barat.", "harga" => 7000000),
        array("image" => "bromo.jpg", "nama_tempat" => "Gunung Bromo", "lokasi" => "Malang", "deskripsi" => "Kepulauan Raja Ampat merupakan rangkaian empat gugusan pulau yang berdekatan dan berlokasi di barat bagian Kepala Burung Pulau Papua. Secara administrasi, gugusan ini berada di bawah Kabupaten Raja Ampat, Provinsi Papua Barat.", "harga" => 2000000),
        array("image" => "tanah.jpg", "nama_tempat" => "Tanah Lot", "lokasi" => "Bali", "deskripsi" => "Kepulauan Raja Ampat merupakan rangkaian empat gugusan pulau yang berdekatan dan berlokasi di barat bagian Kepala Burung Pulau Papua. Secara administrasi, gugusan ini berada di bawah Kabupaten Raja Ampat, Provinsi Papua Barat.", "harga" => 5000000)
    ); ?>

    <div class="container h-100 align-content-center p-5">
        <div class="row justify-content-center d-flex h-100">
            <div class="col-12">
                <div class="card rounded-0 border-0">
                    <div class="card-header bg-success text-center p-4">
                        <div class="card-title">
                            <h1>EAD TRAVEL</h1>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="row px-3">
                            <?php
                            $i = 1;
                            foreach ($wisata as $tiket) {
                            ?>
                                <div class="col-4 p-0">
                                    <div class="card h-100 rounded-0">
                                        <div class="card-img-top" style="overflow: hidden; height: 300px">
                                            <img src="assets/img/<?php echo $tiket['image'] ?>" alt="" class="h-100">
                                        </div>
                                        <div class="card-body">
                                            <div class="card-title">
                                                <h5><?php echo $tiket['nama_tempat'] ?>, <?php echo $tiket['lokasi'] ?></h5>
                                            </div>
                                            <div class="card-text">
                                                <p><?php echo $tiket['deskripsi'] ?></p>
                                            </div>
                                            <div class="card-text">
                                                <strong>
                                                    <p>Rp. <?php echo $tiket['harga'] ?></p>
                                                </strong>
                                            </div>
                                        </div>
                                        <div class="card-footer text-center">
                                            <form action="index.php" method="post">



                                                <div class="modal fade" id="modaltgl<?= $i ?>" tabindex="-1" aria-labelledby="modaltglx" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="modalFooterLabel">Tanggal Perjalanan</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="index.php" method="post">
                                                                    <input type="hidden" name="nama_tempat" value="<?php echo $tiket['nama_tempat'] ?>">
                                                                    <input type="hidden" name="lokasi" value="<?php echo $tiket['lokasi'] ?>">
                                                                    <input type="hidden" name="harga" value="<?php echo $tiket['harga'] ?>">
                                                                    <input type="date" name="tanggal" class="form-control mb-3" required>
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <button class="btn btn-block btn-primary" name="btn_add" type="submit">
                                                                        Tambahkan ke
                                                                        Keranjang
                                                                    </button>

                                                                </form>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="d-grid gap-2">

                                                    <button class="btn btn-block btn-primary" data-bs-toggle="modal" data-bs-target="#modaltgl<?= $i++ ?>">
                                                        Pesan Tiket
                                                    </button>
                                                </div>


                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <?php
        include 'naufal_footer.php';
        ?>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>