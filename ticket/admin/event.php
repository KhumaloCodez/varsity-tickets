<!-- Show these admin pages only when the admin is logged in -->
<?php  require '../assets/partials/_admin-check.php';   ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events</title>
        <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/d8cfbe84b9.js" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <!-- CSS -->
    <?php 
        require '../assets/styles/admin.php';
        require '../assets/styles/admin-options.php';
        $page="event";
    ?>
</head>
<body>
    <!-- Requiring the admin header files -->
    <?php require '../assets/partials/_admin-header.php';?>

    <!-- Add, Edit and Delete Buses -->
    <?php
        /*
            1. Check if an admin is logged in
            2. Check if the request method is POST
        */
        if($loggedIn && $_SERVER["REQUEST_METHOD"] == "POST")
        {
            if(isset($_POST["submit"])) // Checks if submit buttons is clicked
            {
                
                // Should be validated client-side
                $university = $_POST["university"];
                $eventName = $_POST["eventName"];
                $date = $_POST["date"];
                $time = $_POST["time"];
                $dateCreated = date('Y-m-d');
                $price = $_POST["price"];
		$ticketAvailable = $_POST["ticketAvailable"];
        
                $uni_exists = exist_university($conn,$university,$eventName); //calling exist_university to check whether the university is exixsting or not
                $uni_added = false;
        
                if(!$uni_exists) //If university doesn't exists, save record to database
                {
                    
                    $sql = "INSERT INTO `events`(`eventName`, `ticketPrice`, `university`, `eventDate`, `eventTime`, `date_created`, `ticketAvailable`) VALUES ('$eventName','$price', '$university', '$date', '$time', '$dateCreated', '$ticketAvailable' )"; //Insert record to database

                    $result = mysqli_query($conn, $sql);

                    if($result)
                        $uni_added = true;
                }
    
                if($uni_added)
                {
                    // Show success alert
                    echo '<div class="my-0 alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Successful!</strong> Event Information Added
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                    
                }
                else{
                    
                    // Show error alert
                    echo '<div class="my-0 alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> Event already exists
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                }
            }
            if(isset($_POST["edit"]))
            {
                // EDIT event
                $eventName = strtoupper($_POST["eventName"]);
                $id = $_POST["id"];
                $id_if_uni_exists = exist_university($conn, $events);
                
                if(!$id_if_uni_exists || $id == $id_if_uni_exists)
                {
                    $updateSql = "UPDATE `events` SET `eventName` = '$eventName' WHERE `events`.`id` = $id;";
    
                    $updateResult = mysqli_query($conn, $updateSql);
                    $rowsAffected = mysqli_affected_rows($conn);
                    
                    $messageStatus = "danger";
                    $messageInfo = "";
                    $messageHeading = "Error!";

                    if(!$rowsAffected)
                    {
                        $messageInfo = "No Edits Administered!";
                    }
    
                    elseif($updateResult)
                    {
                        // Show success alert
                        $messageStatus = "success";
                        $messageHeading = "Successfull!";
                        $messageInfo = "Event details Edited";
                    }
                    else{
                        // Show error alert
                        $messageInfo = "Your request could not be processed due to technical Issues from our part. We regret the inconvenience caused";
                    }
                    
                    // MESSAGE
                    echo '<div class="my-0 alert alert-'.$messageStatus.' alert-dismissible fade show" role="alert">
                    <strong>'.$messageHeading.'</strong> '.$messageInfo.'
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                }
                else 
                {
                    // If event details already exists
                    echo '<div class="my-0 alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> University details already exists
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                }

            }
            if(isset($_POST["delete"]))
            {
                // DELETE event
                $id = $_POST["id"];
                $bus_no = get_from_table($conn, "events", "id", $id, "eventName");
                // Delete the bus with id => id
                $deleteSql = "DELETE FROM `events` WHERE `events`.`id` = $id";

                $deleteResult = mysqli_query($conn, $deleteSql);
                $rowsAffected = mysqli_affected_rows($conn);
                $messageStatus = "danger";
                $messageInfo = "";
                $messageHeading = "Error!";

                if(!$rowsAffected)
                {
                    $messageInfo = "Record Doesnt Exist";
                }

                elseif($deleteResult)
                {   
                    // echo $num;
                    // Show success alert
                    $messageStatus = "success";
                    $messageInfo = "Event Details deleted";
                    $messageHeading = "Successfull!";

                    
                }
                else{
                    // Show error alert
                    $messageInfo = "Your request could not be processed due to technical Issues from our part. We regret the inconvenience caused";
                }
                // Message
                echo '<div class="my-0 alert alert-'.$messageStatus.' alert-dismissible fade show" role="alert">
                <strong>'.$messageHeading.'</strong> '.$messageInfo.'
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
        }
        ?>
        <?php
            $resultSql = "SELECT * FROM `events` ORDER BY date_created DESC";
                            
            $resultSqlResult = mysqli_query($conn, $resultSql);

            if(!mysqli_num_rows($resultSqlResult)){ ?>
                <!-- Buses are not present -->
                <div class="container mt-4">
                    <div id="noCustomers" class="alert alert-dark " role="alert">
                        <h1 class="alert-heading">No Event  Found!!</h1>
                        <p class="fw-light">Be the first person to add one!</p>
                        <hr>
                        <div id="addCustomerAlert" class="alert alert-success" role="alert">
                                Click on <button id="add-button" class="button btn-sm"type="button"data-bs-toggle="modal" data-bs-target="#addModal">ADD <i class="fas fa-plus"></i></button> to add a Event!
                        </div>
                    </div>
                </div>
            <?php }
            else { ?>             
            <!-- If Buses are present -->
            <section id="bus">
                <div id="head">
                    <h4>List of Events</h4>
                </div>
                <div id="bus-results">
                    <div>
                        <button id="add-button" class="button btn-sm" type="button"data-bs-toggle="modal" data-bs-target="#addModal">Add Event <i class="fas fa-plus"></i></button>
                    </div>
                    
                    <table class="table table-hover table-bordered">
                        <thead>
                            <th>#</th>
                            <th>Event Name</th>
                            <th>Ticket Price</th>
                            <th>University</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Actions</th>
                        </thead>
                        <?php
                            $ser_no = 0;
                            while($row = mysqli_fetch_assoc($resultSqlResult))
                            {   
                                $ser_no++;
                                
                                $id = $row["id"];
                                $name = $row["eventName"];
                                $price = $row["ticketPrice"]; 
                                $uni = $row["university"]; 
                                $date = $row["eventDate"]; 
                                $time = $row["eventTime"];
                                
                                $sql = "SELECT * FROM `university` WHERE uniID = $uni";
                            
                                $result = mysqli_query($conn, $sql);
                                while($row1 = mysqli_fetch_assoc($result))
                                {  
                                            $abbr = $row1['abbr'];
                                }
                        ?>
                        <tr>
                            <td>
                                <?php
                                    echo $ser_no;
                                ?>
                            </td>
                            <td>
                                <?php
                                    echo $name;
                                ?>
                            </td>
                            <td>
                                <?php
                                    echo $price;
                                ?>
                            </td>
                            <td>
                                <?php
                                    echo $abbr;
                                ?>
                            </td>
                            <td>
                                <?php
                                    echo $date;
                                ?>
                            </td>
                            <td>
                                <?php
                                    echo $time;
                                ?>
                            </td>
                            <td>
                            <button class="button edit-button " data-link="<?php echo $_SERVER['REQUEST_URI']; ?>" data-id="<?php 
                                                echo $id;?>" data-busno="<?php 
                                                echo $eventName;?>"
                                                >Edit</button>
                                            <button class="button delete-button" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="<?php 
                                                echo $id;?>">Delete</button>
                            </td>
                        </tr>
                        <?php 
                        }
                    ?>
                    </table>
                </div>
            </section>
            <?php } ?> 
        </div>
    </main>
    <!-- All Modals Here -->
    <!-- Add University Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Event</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="addBusForm" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST">
                            <div class="mb-3">
                                <label for="busnumber" class="form-label">Event Name</label><br>

                                </span>
                                <input type="text" class="form-control" id="busnumber" name="eventName" required>
                                <span id="error" class="error">
                            </div>
                            <div class="mb-3">
                                <label for="busnumber" class="form-label">University</label><br>

                                </span>
                                <select  class="form-control" id="busnumber" name="university" required>
                             <?php 
                                $query="SELECT * FROM `university` order by uniName";

                                $result=$conn->query($query);



                                while($row1=$result->fetch_array()){

                                echo "<option value='" .$row1['uniID']. "'>" . $row1['uniName']. "</option>";

                                }
                                ?>
                            </select>
                                <span id="error" class="error">
                            </div>
                            <div class="mb-3">
                                <label for="busnumber" class="form-label">Event Date</label><br>

                                </span>
                                <input type="date" class="form-control" id="busnumber" name="date" value="<?php echo date('Y/m-d/') ?> ">
                                <span id="error" class="error">
                            </div>
                            <div class="mb-3">
                                <label for="busnumber" class="form-label">Event Time</label><br>

                                </span>
                                <input type="time" class="form-control" id="busnumber" name="time" required>
                                <span id="error" class="error">
                            </div>
                            <div class="mb-3">
                                <label for="busnumber" class="form-label">Ticket Price</label><br>

                                </span>
                                <input type="number" class="form-control" id="busnumber" name="price" required>
                                <span id="error" class="error">
                            </div>
			     <div class="mb-3">
                                <label for="busnumber" class="form-label">Ticket Available</label><br>

                                </span>
                                <input type="number" class="form-control" id="busnumber" name="ticketAvailable" required>
                                <span id="error" class="error">
                            </div>
                            <button type="submit" class="btn btn-success" name="submit">Submit</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <!-- Add Anything -->
                    </div>
                    </div>
                </div>
        </div>
        <!-- Delete Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-exclamation-circle"></i></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h2 class="text-center pb-4">
                    Are you sure?
                </h2>
                <p>
                    Do you really want to delete this event? <strong>This process cannot be undone.</strong>
                </p>
                <!-- Needed to pass id -->
                <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" id="delete-form"  method="POST">
                    <input id="delete-id" type="hidden" name="id">
                </form>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" form="delete-form" name="delete" class="btn btn-danger">Delete</button>
            </div>
            </div>
        </div>
    </div>
    <!-- External JS -->
    <script src="../assets/scripts/admin_bus.js"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>