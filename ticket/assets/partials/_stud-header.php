<?php

    require '_functions.php';
    $conn = db_connect();

    // Getting user details
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM users WHERE user_id = $user_id";
    $result = mysqli_query($conn, $sql);
    if($row = mysqli_fetch_assoc($result))
    {
        $user_fullname = $row["user_fullname"];
        $user_name = $row["user_name"];
    }
?>

<!-- <header>
        <nav id="navbar">
            <ul>
                <li class="nav-item">
                    <?php 
                        echo $user_name;
                    ?>
                </li>
                <li class="nav-item">
                    <img class="adminDp" src="../assets/img/admin_pic.jpg" alt="Admin Profile Pic" width="22px" height="22px">
                </li>
            </ul>
        </nav>
    </header> -->
    <main id="container">
        <div id="sidebar">
            <h4><i class="fas fa-list"></i> Event System</h4>
            <div>
                <img class="adminDp" src="../assets/img/userav-min.png" height="125px" alt="Admin Profile Pic">
                <p>
                    <?php  echo '@'.$user_name;  ?>
                </p>
                <p>Student Panel</p>
            </div>
            <ul id="options">
                <li class="option <?php if($page=='dashboard'){ echo 'active';}?>"> 
                    <a href="./studDash.php">
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                    </a>
                </li>

                <li class="option <?php if($page=='booking'){ echo 'active';}?>">
                    <a href="./book.php">
                    <i class="fas fa-ticket-alt"></i> Make Bookings
                    </a>
                </li>
                
                <li class="option <?php if($page=='mybooking'){ echo 'active';}?>">
                    <a href="mybookings.php">
                    <i class="fas fa-ticket-alt"></i> My Bookings
                    </a>
                </li>

                
                <li class="option <?php if($page=='signup'){ echo 'active';}?>">
                    <a href="">
                    <i class="fas fa-user-lock"></i> Profile        
                    </a>
                </li>
            </ul>
        </div>
        <div id="main-content">
            <section id="welcome">
                <ul>
                    <li class="welcome-item">Welcome, 
                        <span id="USER">
                            <?php 
                                echo $user_fullname;
                            ?>
                        </span>
                    </li>
                    <li class="welcome-item">
                        <button id="logout" class="btn-sm">
                            <a href="../assets/partials/_logout.php">LOGOUT</a>
                        </button>
                    </li>
                </ul>
            </section>