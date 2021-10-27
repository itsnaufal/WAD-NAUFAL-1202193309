    <?php includes "data.php";
    if(!isset($_POST['date'])){
        echo "ERROR";
        exit;
    }else{
        $id = rand(1,99);
        $name = $_POST['name'];
        $in = date('m-d-Y H:i:s', strtotime($_POST['date'].$_POST['time']));
        $dura = "+".$_POST['duration']." hours";
        $out = date('m-d-Y H:i:s',strtotime($dura,strtotime($_POST['date'].$_POST['time'])));
        $type = $gedung[$_POST['type']][1];
        $phone = $_POST['phone'];
        $price = $_POST['duration']*$gedung[$_POST['type']][2];
        $add1 = 0;
        $add2 = 0;
        $add3 = 0;
    
    }
    if(isset($_POST['catering'])){
        $catering = $_POST['catering'];
        $add1 = $layanan[$catering][1];
    }
    if(isset($_POST['decor'])){
        $decor = $_POST['decor'];
        $add2 = $layanan[$decor][1];
    }
    if(isset($_POST['sound'])){
        $sound = $_POST['sound'];
        $add3 = $layanan[$sound][1];
    }
        $total = $price + $add1 + $add2 + $add3;
        

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
            <div class="container mt-5">
                <center>
                    <h2>Thank You <?php echo $name;?> for Reserving</h2>
                    <h3>Please double check your reservation details</h3>
                </center>
                <table class="table table-bordered table-stripped mt-3">
                        <th>Booking Number</th>
                        <th>Name</th>
                        <th>Check-In</th>
                        <th>Check-Out</th>
                        <th>Building Type</th>
                        <th>Phone Number</th>
                        <th>Service</th>
                        <th>Total Price</th>
                    </thead>
                    <tbody class="bg-light">
                        <td><?php echo $id;?></td>
                        <td><?php echo $name;?></td>
                        <td><?php echo $in;?></td>
                        <td><?php echo $out;?></td>
                        <td><?php echo $type;?></td>
                        <td><?php echo $phone;?></td>
                        <td><?php 
                        if(isset($POST['catering'])){
                            echo "<li>".$layanan[$catering][2]."</li>";
                        }
                        if(isset($POST['decor'])){
                            echo "<li>".$layanan[$decor][2]."</li>";
                        }
                        if(isset($POST['sound'])){
                            echo "<li>".$layanan[$sound][2]."</li>";
                        }?>
                        </td>
                        <td><?php echo "$".$total;?></td>
                    </tbody>
                </table>
            </div>
        </section>

        <!-- FOOTER -->
        <footer class>
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