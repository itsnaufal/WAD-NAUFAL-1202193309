<?php
require_once 'naufal_koneksi.php';
if (isset($_SESSION['logged_in'])) {
    header('location: index.php');
}
$ingatuser = false;
if (isset($_POST['btn_login'])) {
    $email = $_POST['email'];
    $password = $_POST['pw'];
    $ingatuser = isset($_POST['remember_me']);
    $logged = mysqli_query($conn, "SELECT * from users WHERE email = '$email' AND password = '$password'");
    if ($logged->num_rows >= 1) {
        $data_user = $logged->fetch_array();
        if ($ingatuser) {
            setcookie('email', $email, time() + (60 * 60 * 24 * 5), '/');
            setcookie('password', $password, time() + (60 * 60 * 24 * 5), '/');
        }
        $_SESSION['nama'] = $data_user['nama'];
        $_SESSION['id'] = $data_user['id'];
        $_SESSION['logged_in'] = TRUE;
        $alert = "Login Berhasil mang!";
        $_SESSION['message'] = $alert;
        header('Location: index.php');
        exit();
    } else {
        $alert = "Atuh gening Logina Gagal, ceuk deui mang!";
        $_SESSION['message'] = $alert;
        header('Location: naufal_login.php');
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
    <title>Login - EAD TRAVEL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/stylesheet.css">
</head>

<body>

    <?php
    include 'naufal_navbar.php';
    if (isset($_SESSION['message'])) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    ' . $_SESSION["message"] . '
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
        unset($_SESSION['message']);
    }
    ?>
    <div class="container align-content-center p-5">
        <div class="row justify-content-center h-100">
            <div class="col-6  justify-content-center align-middle">
                <div class="card">
                    <div class="card-header text-center bg-transparent border-0 mt-4">
                        <h3 class="text-decoration-none">Login</h3>
                    </div>
                    <div class="card-body p-5">
                        <?php
                        if (isset($_COOKIE['email']) && isset($_COOKIE['password'])) {
                            $saved_email = $_COOKIE['email'];
                            $saved_password = $_COOKIE['password'];
                        } else {
                            $saved_email = "";
                            $saved_password = "";
                        }
                        ?>
                        <form action="naufal_login.php" method="post">
                            <div class="form-group mb-3">
                                <label for="e-mail">E-mail</label>
                                <input type="email" required class="form-control" placeholder="Masukkan alamat E-mail" name="email" id="e-mail" value="<?php echo $saved_email ?>">
                            </div>
                            <div class="form-group mb-3">
                                <label for="pw">Kata Sandi</label>
                                <input type="password" required class="form-control" name="pw" placeholder="Kata sandi Anda" id="pw" value="<?php echo $saved_password ?>">
                            </div>
                            <div class="form-group mb-3">
                                <input type="checkbox" class="form-check-inline" name="remember_me" id="remember_me" value="true">
                                <label for="remember_me">Remember Me</label>
                            </div>
                            <div class="form-group text-center mb-3">
                                <div class="d-grid gap-2 col-4 mx-auto">
                                <button class="btn btn-primary" name="btn_login" type="submit">Login</button>
                                </div>
                            </div>
                            <div class="form-group text-center">
                                <p class="d-inline">Belum Punya akun? </p><a href="naufal_register.php" class="">Register heula atuh mang!</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-5 pt-5">

        <?php
        include 'naufal_footer.php';
        ?>

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>
