<?php
    require 'assets/partials/_functions.php';
    $conn = db_connect();    

    if(!$conn) 
        die("Connection Failed");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Ticket Bookings</title>
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500&display=swap" rel="stylesheet">
    <!-- Font-awesome -->
    <script src="https://kit.fontawesome.com/d8cfbe84b9.js" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <!-- CSS -->
    <?php 
        require 'assets/styles/styles.php'
    ?>
</head>
<body>
    
    <header>
        <nav>
            <div>
                    <a href="#" class="nav-item nav-logo">Event Ticket Booking</a>
                    <!-- <a href="#" class="nav-item">Gallery</a> -->
            </div>
                
            <ul>
                <li><a href="#" class="nav-item">Home</a></li>
                
            </ul>
            <div>
                <a href="#" class="login nav-item" data-bs-toggle="modal" data-bs-target="#loginModal"><i class="fas fa-sign-in-alt" style="margin-right: 0.4rem;"></i>Login</a>
                <a href="#" class="login nav-item" data-bs-toggle="modal" data-bs-target="#registerModal"><i class="fas fa-user" style="margin-right: 0.4rem;"></i>Register</a>
            </div>
        </nav>
        
    </header>
    <!-- Login Modal -->
    <?php require 'assets/partials/_loginModal.php'; 
      require 'assets/partials/_RegisterModal.php'; 
        require 'assets/partials/_getJSON.php';

        $routeData = json_decode($eventsJson);
        $busData = json_decode($universityJson);
        $customerData = json_decode($studentsJson);
    ?>
    

    <section id="home">
       <!-- <div id="route-search-form">
            <h1>Event Ticket Booking System</h1>

            <p class="text-center">Welcome to Simple Ticket Booking System. Login now to manage  tickets and much more. OR, simply scroll down to check the Ticket status using Passenger Name Record (PNR number)</p>

            <center>
                <button class="btn btn-danger " data-bs-toggle="modal" data-bs-target="#loginModal">Administrator Login</button>
                
            </center>

            <br>
            <center>
            <a href="#pnr-enquiry"><button class="btn btn-primary">Scroll Down <i class="fa fa-arrow-down"></i></button></a>
            </center>  -->
            
        </div>
    </section>
    
        <section id="contact">
            <div id="contact-form">
                <h1>Contact Us</h1>
                <form action="">
                    <div>
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name">
                    </div>
                    <div>
                        <label for="email">Email Address</label>
                        <input type="email" name="email" id="email">
                    </div>
                    <div>
                        <label for="message">Message</label>
                        <textarea name="message" id="message" cols="30" rows="10"></textarea>
                    </div>
                    <div></div>
                </form>
            </div>
        </section>
        <footer>
        <p>
                        <i class="far fa-copyright"></i> <?php echo date('Y');?> - Varsity Event Ticket System
                        </p>
        </footer>
    </div>
    
     <!-- Option 1: Bootstrap Bundle with Popper -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <!-- External JS -->
    <script src="assets/scripts/main.js"></script>
</body>
</html>