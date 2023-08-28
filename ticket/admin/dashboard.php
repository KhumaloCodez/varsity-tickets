<!-- Show these admin pages only when the admin is logged in -->
<?php   require '../assets/partials/_admin-check.php';     ?>
   
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
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
    <?php require '../assets/partials/_admin-header.php';
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
    

    ?>

            <section id="dashboard">
                
                <div id="status">
                    <div id="Booking" class="info-box status-item">
                        <div class="heading">
                            <h5>Bookings</h5>
                            <div class="info">
                                <i class="fas fa-ticket-alt"></i>
                            </div>
                        </div>
                        <div class="info-content">
                            <p>Total Bookings</p>
                            <p class="num" data-target="<?php 
                                    echo count($bookingData);
                                ?>">
                                999
                            </p>
                        </div>
                        <a href="bookings.php">View More <i class="fas fa-arrow-right"></i></a>
                    </div>
                    <div id="Bus" class="info-box status-item">
                        <div class="heading">
                            <h5>University</h5>
                            <div class="info">
                                <i class="fas fa-home"></i>
                            </div>
                        </div>
                        <div class="info-content">
                            <p>Total Universities</p>
                            <p class="num" data-target="<?php 
                                    echo count($universityData);
                                ?>">
                                999
                            </p>
                        </div>
                        <a href="./university.php">View More <i class="fas fa-arrow-right"></i></a>
                    </div>
                    <div id="Route" class="info-box status-item">
                        <div class="heading">
                            <h5>Events</h5>
                            <div class="info">
                                <i class="fas fa-road"></i>
                            </div>
                        </div>
                        <div class="info-content">
                            <p>Total Events</p>
                            <p class="num" data-target="<?php 
                                    echo count($eventData);
                                ?>">
                                999
                            </p>
                        </div>
                        <a href="event.php">View More <i class="fas fa-arrow-right"></i></a>
                    </div>
                    <div id="Customer" class="info-box status-item">
                        <div class="heading">
                            <h5>Students</h5>
                            <div class="info">
                                <i class="fas fa-users"></i>
                            </div>
                        </div>
                        <div class="info-content">
                            <p>Total Students</p>
                            <p class="num" data-target="<?php 
                                    echo count($studentsData);
                                ?>">
                                999
                            </p>
                        </div>
                        <a href="">View More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <!-- <h3>User</h3> -->
                <div id="user">
                    
                    <div id="Admin" class="info-box user-item">
                        <div class="heading">
                            <h5>Admins</h5>
                            <div class="info">
                                <i class="fas fa-user-lock"></i>
                            </div>
                        </div>
                        <div class="info-content">
                            <p>Total Admins</p>
                            <p class="num" data-target="<?php 
                                    echo count($adminData);
                                ?>">
                                999
                            </p>
                        </div>
                        <a href="#admin">View More <i class="fas fa-arrow-right"></i></a>
                    </div>

                      <div id="Earning" class="info-box user-item">
                        <div class="heading">
                            <h5>Earnings</h5>
                            <div class="info">
                                <i class="fas fa-dollar-sign"></i>
                            </div>
                        </div>
                        <div class="info-content">
                            <p>Total Earnings</p>
                            <p class="num" data-target="<?php  /*
                                    $result = mysqli_query($conn, 'SELECT SUM(booked_amount) AS value_sum FROM bookings'); 
                                    $row = mysqli_fetch_assoc($result); 
                                    $sum = $row['value_sum'];
                                    echo $sum; */
                                ?>">
                                999
                            </p>
                        </div>
                        <a href="#">View More <i class="fas fa-arrow-right"></i></a>
                    </div> 

                </div>
                <h4>Other Admin</h4>
                <div id="admin">
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
                                <h4><?php echo $username; ?></h4>
                                <p class="bio">Other Admin</p>
                            </div>
                        <?php 
                        }
                    ?>
                </div>
            </section>
                <footer>
                    <p>
                        <!--<i class="far fa-copyright"></i> <?php //echo date('Y');?> - Event Ticket System -->
                        </p>
                </footer>
        </div>
    </main>
    <script src="../assets/scripts/admin_dashboard.js"></script>
</body>
</html>