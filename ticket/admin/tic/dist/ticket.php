<?php
session_start();
  require '../../../assets/partials/_functions.php';   
  
    $conn = db_connect();

 $userID = $_SESSION['user_id'];
 
  $sql = "SELECT * FROM `users` WHERE user_id = $userID ";
   $sqlres = mysqli_query($conn, $sql);
                               while($rows = mysqli_fetch_assoc($sqlres))
                               {
                                $fname = $rows['user_fullname'];
                                $studno = $rows['studentno'];
                               }

?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Ticket</title>
  <meta name="viewport" content="width=device-width, initial-scale=1"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->

<link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

 <?php
        $bookingID = $_GET['id'];
            $resultSql = "SELECT * FROM `bookings` WHERE bookingID = $bookingID";
                            
            $resultSqlResult = mysqli_query($conn, $resultSql);


	    
                            while($row = mysqli_fetch_assoc($resultSqlResult))
                            {   
                              
                                $eventID = $row["eventID"];
				$bookingID = $row["bookingID"];
				$university = $row['university'];

                                $res = "SELECT * FROM `events` WHERE id = $eventID ";
                                $result = mysqli_query($conn, $res);
                               while($row1 = mysqli_fetch_assoc($result))
                               {
                                $name = $row1['eventName'];
                                $date = $row1['eventDate'];
                                $time = $row1['eventTime'];
                                $price = $row1['ticketPrice'];
				
				
				 $rr = "SELECT * FROM `university` WHERE uniID = $university ";
                                $re = mysqli_query($conn, $rr); 
                                 while($row2 = mysqli_fetch_assoc($re))
                               {
                                 $uniname = $row2['uniName'];
                               
                                
                        ?>
<div class="ticket">
	<div class="left">
		<!--<div class="image"> 
			<p class="admit-one"> -->
				<!--<span>TICKET</span>
				<span>TICKET</span>
				<span>TICKET</span> -->
				<img src="back.jpeg" width="250" height="300" >
			<!--</p>
			<div class="ticket-number">
				<p>
					#20030220
				</p>
			</div>
		</div>  -->
		<div class="ticket-info">
			<p class="date">
				<span>Event Date</span>
				<span class="june-29"><?php echo $date; ?></span>
				<span>Event Date</span>
			</p>
			<div class="show-name">
				<h2><?php echo $name; ?></h2>
				
			</div>
			<div class="time">
				<p>Time: <?php echo $time; ?></p>
				<p>Ticket Price <span>:</span> R<?php echo $price; ?></p>
			</div>
			<p class="location"><span><?php echo $uniname; ?></span>
				<span class="separator"><i class="far fa-smile"></i></span><span></span>
			</p>
		</div>
	</div>
	<div class="right">
		<p class="admit-one">
			<!--<span>TICKET</span>
			<span>TICKET</span>
			<span>TICKET</span> -->
		</p>
		<div class="right-info-container">
			<div class="show-name">
				<h1><?php echo $fname;  ?></h1>
			</div>
			<div class="time">
				<p>Time:<?php echo $time; ?></p>
			</div>
			<div class="barcode">

			</div>
			<p class="ticket-number">
				Student Number
			</p>
			<p class="ticket-number">
				<?php echo $studno;  ?>
			</p>
		</div>
		<button class="button" onclick="window.print();"> Print </button>
	</div>
	
</div>

<?php
       }
    }
}

?>
 <style>
 hr.new3 {
  border-top: 3px dotted red;
}
.button {
  background-color: blue;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
 </style>

<hr class="new3" >


<!-- partial -->
  <script  src="./script.js"></script>
 

</body>

</html>
