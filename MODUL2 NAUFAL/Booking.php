<!-- PHP DATA ARRAY -->

<?php include "data.php";
if(!isset($_GET['id'])){
    $id=1;
}else{
    $id=$_GET['id'];
};
?>

<!DOCTYPE html>
<html>
<head>
    <!-- TITLE -->
	<title>ESD VENUE RESERVATION</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
		integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"/>
    <!-- CSS & BOOTSTRAP -->
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>

</head>

<body>
	<!-- NAVBAR -->
	<nav class="navbar navbar-expand-sm navbar-dark bg-dark text-white d-flex justify-content-center">
        <section class="d-flex justify-content-center">
		<div class="container-fluid d-flex justify-content-center">
			<a class="navbar-brand text-success" href="#"></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span></button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item"><a class="nav-link" href="home.php">Home</a></li>
					<li class="nav-item"><a class="nav-link" href="booking.php">Booking</a>
					</li>
				</ul>
			</div>
		</div>
        </section>
	</nav>

    <!-- CONTENT -->
    <section class="mb-5 pb-5">
        <div class="container mt-3">
            <center>
                <p class="text text-white bg-dark py-2">Reserve your venue now</p>
            </center>
            <div class="row my-1 mx-1 mx-auto">
                <div class="container my-3" style="border:1px solid #F3F3F3; border-radius: 5px;">
                    <div class="row py-3 px-3">
                        <div class="col-lg my-auto">
                            <?php 
                                echo "<img src='".$gedung[$id][4]."' style='max-height:250px' id='image'/>";
                            ?>
                        </div>
                        <div class="col-lg">
                            <!-- name,id, bisa diganti -->
                            <form class="form" action="mybooking.php" id="form" method="post">
                                <label for="name">Name</label>
                                <!-- NAMA -->
                                <input type="text" name="name" class="form-control py-2" id="name" value="Naufal_1202193309" readonly>
                                <label for="date" class="py-2">Event Date</label>
                                <input class="form-control py-2" type="date" name="date" id="date" placeholder="mm/dd/yyyy" required>
                                <label for="time" class="py-2">Start Time</label>
                                <input class="form-control py-2" type="time" name="time" id="time" placeholder="--:-- --" required>
                                <label for="lama" class="py-2">Duration Hour(s)</label>
                                <input class="form-control py-2" type="number" name="duration" id="lama" placeholder="0" required>
                                <label for="type" class="py-2">Building Type</label>
                                <select class="form-control py-2" name="type" id="type" onchange="myFunction()" required>
                                    <option value="">Choose..</option>
                                    <option value="<?php echo $gedung[0][0]; ?>"><?php echo $gedung[0][1]; ?></option>
                                    <option value="<?php echo $gedung[1][0]; ?>"><?php echo $gedung[1][1]; ?></option>
                                    <option value="<?php echo $gedung[2][0]; ?>"><?php echo $gedung[2][1]; ?></option>
                                </select>
                                <script>
                                    function myFunction() {
                                        var x = document.getElementById("type").value;
                                        var building = <?php echo json_encode($gedung); ?>;
                                        var y = building[x][4];
                                        document.getElementById("image").src = y;}
                                </script>
                                <label for="phone" class="py-2">Phone Number</label>
                                <input class="form-control py-2" type="number" name="phone" id="phone" placeholder="08xxxxxx" required>
                                
                                <p class="mb-0 pt-3">Add Service(s)</p>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="catering" value="0" id="layanan1">
                                    <label class="form-check-label" for="layanan1">Catering $700</label></div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="decor" value="1" id="layanan2">
                                    <label class="form-check-label" for="layanan2">Decoration $450</label></div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="sound" value="2" id="layanan3">
                                    <label class="form-check-label" for="layanan3">Sound system $250</label></div>
                                    <input class="form-control btn-primary mt-3" type="submit" value="Book">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <!-- FOOTER -->
    <footer>
        <section class="bg-light mt-5">
            <div class="container py-2">
                <center>
                    <p class="pt-2">© Created by: Naufal_1202193309</p>
                </center>
            </div>
        </section>
    </footer>
</body>
</html>