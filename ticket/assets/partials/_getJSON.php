<?php
    // Events JSON
    $rtSql = "Select * from events";
    $resultrtSql = mysqli_query($conn, $rtSql);
    $arr = array();
    if(mysqli_num_rows($resultrtSql))
        while($row = mysqli_fetch_assoc($resultrtSql))
            $arr[] = $row;
        $eventsJson = json_encode($arr);
    
    // students JSON
    $ctSql = "Select * from users where role = 'Student'";
    $resultctSql = mysqli_query($conn, $ctSql);
    $arr = array();
    if(mysqli_num_rows($resultctSql))
        while($row = mysqli_fetch_assoc($resultctSql))
            $arr[] = $row;
    $studentsJson = json_encode($arr);
    
    

    // university JSON
    $busSql = "Select * from university";
    $resultBusSql = mysqli_query($conn, $busSql);
    $arr = array();
    while($row = mysqli_fetch_assoc($resultBusSql))
        $arr[] = $row;
    $universityJson = json_encode($arr);

    // Booking JSON
    $bookingSql = "Select * from bookings";
    $resultBookingSql = mysqli_query($conn, $bookingSql);
    $arr = array();
    while($row = mysqli_fetch_assoc($resultBookingSql))
        $arr[] = $row;
    $bookingJson = json_encode($arr);

   
        
    // Admin JSON
    $adminSql = "SELECT * from users where role = 'Admin' ";
    $resultAdminSql = mysqli_query($conn, $adminSql);
    $arr = array();
    while($row = mysqli_fetch_assoc($resultAdminSql))
        $arr[] = $row;
    $adminJson = json_encode($arr);

    //Earning JSON
    // $result = mysqli_query($conn, 'SELECT SUM(booked_amount) AS value_sum FROM bookings'); 
    // $row = mysqli_fetch_assoc($result); 
    // $sum = $row['value_sum'];
    // echo $sum;
    // $earningJson = json_encode($sum);

?>