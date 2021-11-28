<?php
if (isset($_COOKIE['theme'])) {
    $bg = $_COOKIE['theme'];
} else {
    $bg = 'bg-default';
}
?>
<nav class="navbar navbar-expand-lg navbar-light bgnav <?php echo $bg ?>">
    <div class="container">
        <a class="navbar-brand navkiri" href="index.php"><img alt="" id="logo-nav"><b>EAD TRAVEL</b></a>
    </div>

    <div class="navkanan">
        <ul class="navbar-nav">
            <?php
            if (!isset($_SESSION['logged_in'])) {
            ?>
                <li class="nav-item">
                    <a class="nav-link" href="naufal_login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="naufal_register.php">Register</a>
                </li>
            <?php
            } else {
            ?>
                <li class="nav-item">
                    <a class="nav-link" href="naufal_bookings.php"><i class="fa fa-shopping-cart"></i></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle nav-link-lg nav-link-user" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" href="#">
                        <div class="d-sm-none d-lg-inline-block">Hai, <span class="text-primary text-dark"><?php echo $_SESSION['nama'] ?></span></div>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="naufal_profile.php?id=<?php echo $_SESSION['id'] ?>">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <form action="index.php" method="post">
                            <li><button class="dropdown-item" type="submit" name="btn_logout">Logout</button></li>
                        </form>
                    </ul>
                </li>
            <?php
            }
            ?>
        </ul>
    </div>
</nav>
