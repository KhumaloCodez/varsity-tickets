<?php
    function db_connect()
    {
        $servername = 'localhost';
        $username = 'root';
        $password = '';
        $database = 'sbtbsphp';

        $conn = mysqli_connect($servername, $username, $password, $database);
        return $conn;
    }

    function exist_user($conn, $username)
    {
        $sql = "SELECT * FROM `users` WHERE user_name='$username'";
        
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if($num > 0){
            return true;
        }else{
            return false;
        }
        
    }

    function exist_routes($conn, $viaCities, $depdate, $deptime)
    {
        $sql = "SELECT * FROM `routes` WHERE route_cities='$viaCities' AND route_dep_date='$depdate' AND route_dep_time='$deptime'";

        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if($num)
        {
            $row = mysqli_fetch_assoc($result);
            
            return $row["id"];
        }
        return false;
    }

    function exist_customers($conn, $name, $phone)
    {
        $sql = "SELECT * FROM `customers` WHERE customer_name='$name' AND customer_phone='$phone'";

        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if($num)
        {
            $row = mysqli_fetch_assoc($result);   
            return $row["customer_id"];
        }
        return false;
    }

    function exist_university($conn, $university)
    {
        $sql = "SELECT * FROM `university` WHERE uniName='$university'";

        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if($num)
        {
            $row = mysqli_fetch_assoc($result);   
            return $row["uniName"];
        }
        return false;
    }
    function exist_event($conn, $university, $eventName)
    {
        $sql = "SELECT * FROM `events` WHERE university='$university' AND eventName = '$eventName' ";

        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if($num)
        {
            $row = mysqli_fetch_assoc($result);   
            return $row["eventName"];
        }
        return false;
    }

    function exist_booking($conn, $userID, $eventID)
    {
        $sql = "SELECT * FROM `bookings` WHERE userID=$userID AND eventID=$eventID";

        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if($num)
        {
            $row = mysqli_fetch_assoc($result);   
            return $row["bookingID"];
        }
        return false;
    }

    function bus_assign($conn, $busno)
    {
        $sql = "UPDATE buses SET bus_assigned=1 WHERE bus_no='$busno'";
        $result = mysqli_query($conn, $sql);
    }

    function bus_free($conn, $busno)
    {
        $sql = "UPDATE buses SET bus_assigned=0 WHERE bus_no='$busno'";
        $result = mysqli_query($conn, $sql);
    }

    function busno_from_routeid($conn, $id)
    {
        $sql = "SELECT * from routes WHERE id=$id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        if($row)
        {
            return $row["bus_no"];
        }
        return false;
    }


    function get_from_table($conn, $table, $primaryKey, $pKeyValue, $toget)
    {
        $sql = "SELECT * FROM $table WHERE $primaryKey='$pKeyValue'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        if($row)
        {
            return $row["$toget"];
        }
        return false;
    }
?>