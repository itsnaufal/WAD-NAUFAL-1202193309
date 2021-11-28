<?php
require_once 'naufal_koneksi.php';
if (isset($_SESSION['logged_in'])) {
    header('location: index.php');
}
$alert = '';
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $no_hp = $_POST['no_hp'];
    $password = $_POST['password'];
    $insert = mysqli_query($conn, "INSERT INTO users VALUES ('','$nama','$email','$password','$no_hp')");
    if ($insert) {
        $alert = "Berhasil Mendaftar mang! gaskeun login";
        $_SESSION['message'] = $alert;
        header("Location: naufal_register.php");
        exit();
    } else {
        $alert = "Gagal Registrasina mang ceuk deui!";
        $_SESSION['message'] = $alert;
        header("Location: naufal_register.php");
        exit();
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/stylesheet.css">
</head>
<body class="body-default">

<?php
include 'naufal_navbar.php';
if (isset($_SESSION['message'])) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        ' . $_SESSION["message"] . '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    unset($_SESSION['message']);
}
?>

<div class="container h-100 align-content-center p-5">
    <div class="row justify-content-center d-flex h-100">
        <div class="col-6  justify-content-center align-middle">
            <div class="card">
                <div class="card-header text-center bg-transparent border-0 mt-4">
                    <h3 class="text-decoration-none">Daftar - EAD TRAVEL</h3>
                </div>
                <div class="card-body px-5">
                    <form action="naufal_register.php" method="post">
                        <div class="form-group mb-3">
                            <label for="nama">Nama</label>
                            <input type="text" required class="form-control" name="nama" id="nama" placeholder="Masukkan Nama Lengkap">
                        </div>
                        <div class="form-group mb-3">
                            <label for="e-mail">E-mail</label>
                            <input type="email" required class="form-control" name="email" id="e-mail" placeholder="Masukkan Alamat Email">
                        </div>
                        <div class="form-group mb-3">
                            <label for="no_hp">Nomor Handphone</label>
                            <input type="number" required class="form-control" name="no_hp" id="no_hp" placeholder="Masukkan Nomor Handphone">
                        </div>
                        <div class="form-group mb-3">
                            <label for="pw">Kata Sandi</label>
                            <input type="password" required class="form-control" name="password" id="pw" placeholder="Buat Kata sandi Anda">
                        </div>
                        <div class="form-group mb-3">
                            <label for="pwconfirm">Konfirmasi Kata Sandi</label>
                            <input type="password" required class="form-control" name="pwconfirm" id="pwconfirm" placeholder="Masukkan Konfirmasi Kata Sandi">
                        </div>
                        <div class="form-group mb-3 text-center ">
                            <div class="d-grid gap-2 col-4 mx-auto">
                                <button class="btn btn-primary" name="submit" type="submit">Daftar</button>
                            </div>

                        </div>
                        <div class="form-group mb-3 text-center">
                        <p class="d-inline">Dah ada akun? </p><a href="naufal_login.php" class="">Gaskeun login mang!</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
    include 'naufal_footer.php';
    ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>
<script !src="">
    var new_password = document.getElementById("pw")
        , confirm_password = document.getElementById("pwconfirm");

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
