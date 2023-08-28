<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">

<?php
    require '_functions.php';

    $conn = db_connect();

    if(!$conn)
        die("Oh Shoot!! Connection Failed");

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["signup"])) //Checking if the sign up button is clicked
    {
        
        // grabbing information from the sign up using post method

        $fullName = $_POST["firstName"] . " " . $_POST["lastName"];
        $username = $_POST["username"];
        $password = $_POST["password"]; 
        $stdno = $_POST["studentno"];
        $university = $_POST["university"];
        $role = 'Student';
       

        
       
        $sqls = "select * from users where user_name = '$username' ";
        $resultss = mysqli_query($conn, $sqls);
        $rows = mysqli_num_rows($resultss);
        if($rows > 0){ //if username exists it must display this error message below
            ?>
                    <script>
                    window.alert('This username already exists, try another one');
                    window.location.href="../../index.php";
                </script>

            <?php

         }else  // if username doesn't exist then save the record to db
        {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users` (`user_fullname`, `studentno`, `University`, `user_name`, `user_password`,`role`, `user_created`) VALUES ('$fullName', '$stdno', '$university', '$username', '$hash', '$role', current_timestamp());";

            $result = mysqli_query($conn, $sql);
            
            if($result){
                ?>
                <script>
                window.alert('You have successfully registered, you may now login');
                window.location.href="../../index.php";
             </script>

             <?php
            }
                
        }

        
    }

?>