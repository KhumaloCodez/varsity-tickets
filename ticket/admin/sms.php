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

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript">
   $(document).ready(function(){
      $("#phone").submit(function() 
      {
          var phone_no = $('#phone_no').val();
          
          if(phone_no != '')
          {
              
              $.post("sendcode.php", { phone_no: phone_no },
          		    function(data) 
          		    {
          	           $(".result").html(data);
            	    }, 
            	    "html"
              );
      		 
          }
          
          return false;
      });
   });
</script>
<h5>
<div class = "result"></div>
<p>Enter your phone number below, and we will send you a verification code to that phone number.</p>
<h5><form id = "phone" method  = "POST" action = ""> </h5>
        <label for = "phone">Phone number</label>
        <input name = "phone" type = "text" id = "phone_no" />
        <input name = "submit" type = "submit" value = "Send Verification Code" />
</form>
</h5>
<p>Enter Verification Code received to the phone number specified above in the form below.</p>

<form id = "verification" method  = "POST" action = "verify.php">
<label for = "code">Verification Code</label>
<input name = "code" type = "text" id = "code" />
<input name = "submit" type = "submit" value = "Verify" />
</form>
