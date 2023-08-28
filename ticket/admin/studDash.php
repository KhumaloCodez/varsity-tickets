<!-- Show these admin pages only when the admin is logged in -->
<?php   require '../assets/partials/_admin-check.php';     ?>
   
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
        <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/d8cfbe84b9.js" crossorigin="anonymous"></script>
    <!-- CSS -->
    <?php
        require '../assets/styles/admin.php';
        require '../assets/styles/dashboard.php';
        $page="dashboard";
    ?>
</head>
<body>
    <!-- Requiring the admin header files -->
    <?php require '../assets/partials/_stud-header.php';
        require '../assets/partials/_getJSON.php';
    //  Will have access to variables 
    //     1. eventsJson
    //     2. universityJson
    //     3. adminJson
    //     4. bookingJSON
    //     4. studentsJSON
    $eventData = json_decode($eventsJson);
    $studentsData = json_decode($studentsJson);
    
    $universityData = json_decode($universityJson);
    $adminData = json_decode($adminJson);
    $bookingData = json_decode($bookingJson);
    
    $sql = "select * from bookings where userID = ".$_SESSION['user_id']." ";
    $results = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($results);

    ?>

            <section id="dashboard">
                
                <div id="status">
                    <div id="Booking" class="info-box status-item">
                        <div class="heading">
                            <h5>My Bookings</h5>
                            <div class="info">
                                <i class="fas fa-ticket-alt"></i>
                            </div>
                        </div>
                        <div class="info-content">
                            <p>Total Bookings</p>
                            <p class="num" data-target="<?php 
                                    echo $count;
                                ?>">
                                999
                            </p>
                        </div>
                        <a href="mybookings.php">View More <i class="fas fa-arrow-right"></i></a>
                    </div>
                    
                    <div id="user">
                    
                    <?php 
                            // Loop through Admin Data and show the admins in boxes other than the existing admin which is $user_id  == $_SESSION["user_id"]
                            foreach($adminData as $admin)
                            {
                                $adminArr = get_object_vars($admin);
                                if($adminArr["user_id"] == $user_id) 
                                    continue;
                                $username = $adminArr["user_name"];
                            ?>
                                <div class="info-box admin-item">
                                    <img src="../assets/img/user-profile-min.png" height="100px" alt="Profile Pic">
                                    <h4>Proof of Payment</h4>
                                    <p class="bio"></p>
                                    <a href="upload.php">Upload <i class="fas fa-arrow-right"></i></a>
                                </div>
								
								<div id="Route" class="info-box status-item">
                        <div class="heading">
                            <h5>Verify Ticket</h5>
                            <div class="info">
                                <i class="fas fa-road"></i>
                            </div>
                        </div>
                        <!--<div class="info-content">
                            <p>Total verifications</p>
                            <p class="num" data-target="<?php 
                                    echo count($eventData);
                                ?>">
                                999
                            </p>
                        </div>-->
                        <a href="sms.php">View More <i class="fas fa-arrow-right"></i></a>
                    </div>
                            <?php 
                            }
                        ?>
    
                    </div>
                    
                <!-- <h3>User</h3> -->
                
               
            </section>
                <footer>
                    <p>
                        
                        </p>
                </footer>
        </div>
    </main>
    <script src="../assets/scripts/admin_dashboard.js"></script>
</body>
</html>