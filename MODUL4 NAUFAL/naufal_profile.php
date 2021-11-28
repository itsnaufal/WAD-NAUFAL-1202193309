<?php
require_once 'naufal_koneksi.php';
if (!isset($_SESSION['logged_in'])) {
    header('location: login.php');
}
if (isset($_POST['btn_logout'])) {
    session_destroy();
    $alert = "Logout Berhasil";
    $_SESSION['message'] = $alert;
    header('Location: naufal_login.php');
    exit();
}
if (isset($_GET['id'])) {
    if ($_GET['id'] == $_SESSION['id']) {
        $idlogged = $_GET['id'];
        $item = mysqli_query($conn, "SELECT * from users WHERE id = '$idlogged'");
        $name = $item->fetch_assoc();
    } else {
        header('location: naufal_profile.php?id=' . $_SESSION["id"]);
    }
} else {
    header("location: index.php");
    exit();
}
if (isset($_POST['btn_edit'])) {
    $id = $_SESSION['id'];
    $email = $_POST['email'];
    $nama = $_POST['nama'];
    $no_hp = $_POST['no_hp'];
    $password_baru = $_POST['pw'];
    if (isset($_POST['warna_navbar'])) {
        $warna_navbar = $_POST['warna_navbar'];
    } else {
        $warna_navbar = "bg-default";
    }
    if ($password_baru == "") {
        $update = mysqli_query($conn, "UPDATE users set nama = '$nama', email = '$email', no_hp = '$no_hp' WHERE id = $id");
    } else {
        $update = mysqli_query($conn, "UPDATE users set nama = '$nama', email = '$email', password = '$password_baru', no_hp = '$no_hp' WHERE id = $id");
    }
    setcookie("theme", $warna_navbar, time() + (86400 * 30), "/");
    if ($update) {
        $alert = "Berhasil Update Data";
        $_SESSION['message'] = $alert;
        $_SESSION['nama'] = $nama;
        header("Location: naufal_profile.php?id=" . $_SESSION["id"]);
        exit();
    } else {
        $alert = "Gagal Update Data";
        $_SESSION['message'] = $alert;
        header("Location: naufal_profile.php?id=" . $_SESSION["id"]);
        exit();
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile - EAD TRAVEL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/stylesheet.css">
</head>

<body class="">
    <?php
    include 'naufal_navbar.php';
    ?>

    <?php
    if (isset($_SESSION['message'])) {
        echo
        '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    ' . $_SESSION["message"] . '
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
        unset($_SESSION['message']);
    }
    ?>

    <div class="container h-100 align-content-center p-5">
        <div class="row justify-content-center d-flex h-100">
            <div class="col-10 mt-5">
                <div class="card border-0">
                    <div class="card-header border-0 bg-transparent text-center">
                        <h2>Profile</h2>
                    </div>
                    <div class="card-body">
                        <form action="naufal_profile.php?id=<?php echo $name["id"] ?>" method="post">
                            <div class="form-group row">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <p><?php echo $name["email"] ?></p>
                                    <input type="hidden" name="email" value="<?php echo $name["email"] ?>">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" required class="form-control form-inline" name="nama" id="nama" value="<?php echo $name["nama"] ?>">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label for="no_hp" class="col-sm-2 col-form-label">Nomor Handphone</label>
                                <div class="col-sm-10">
                                    <input type="number" required class="form-control form-inline" name="no_hp" id="no_hp" value="<?php echo $name["no_hp"] ?>">
                                </div>
                            </div>
                            <hr />
                            <div class="form-group row mb-4">
                                <label for="pw" class="col-sm-2 col-form-label">Kata Sandi</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control form-inline" placeholder="Kata Sandi" name="pw" id="pw">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label for="pwconfirm" class="col-sm-2 col-form-label">Konfirmasi Kata Sandi</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control form-inline" placeholder="Konfirmasi Kata Sandi" name="pwconfirm" id="pwconfirm">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label for="warna_navbar" class="col-sm-2 col-form-label">Warna Navbar</label>
                                <div class="col-sm-10">
                                    <select name="warna_navbar" class="form-select" id="warna_navbar">
                                        <option value="bg-default">Default TP</option>
                                        <option value="bg-light">Light Mode</option>
                                        <option value="bg-warning">Kuning telor mata sapi</option>
                                        <option value="bg-primary">Biru Persib</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group text-center">
                                <button class="btn btn-primary btn-block" type="submit" name="btn_edit">Simpan</button>
                                <a href="index.php" class="btn btn-warning btn-block" type="button">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    require 'naufal_footer.php';
    ?>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script !src="">
        var new_password = document.getElementById("pw"),
            confirm_password = document.getElementById("pwconfirm");

        function validatePassword() {
            if (new_password.value != confirm_password.value) {
                confirm_password.setCustomValidity("Passwordna beda mang, cek deui!");
            } else {
                confirm_password.setCustomValidity('');
            }
        }

        new_password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;
    </script>

</body>

</html>
