<?php

if (session_status()!==PHP_SESSION_ACTIVE)session_start();

if (!isset($_SESSION['studNo']))
{
    header("Location: index.php");
}
include "connect.php";
//require "home.php";
?>
<!DOCTYPE html>
<html>


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>New Booking</title>
  
</head>

<body>
    <!-- This is the navigation-->
<?php include 'navigation.html'; ?>
<div class="back">
<div class="div-center">


<div class="container align-items-center" style="width: 50%">
<h2 class="text-center shadow-sm form-heading" style="font-family: Asap, sans-serif;font-weight: normal;color: rgb(240,62,51);">Booking Form &nbsp;</h2>
<h1 style="font-size: 16px;font-family: Asap, sans-serif;color: rgb(240,62,51);font-style: italic;">Select Your Trip</h1>
               
<!-- Dropdown list with dummy data -->
<form action = "schedules.php" method = "POST">
    
    <select name="location"  class="form-control" id="location">
        <?php
            
            $query="select * from campus  where (select count(*) from schedule group by campus_From having campus_From = campusId) > 0 and  (select count(*) from schedule where time >NOW()) > 0 order by campusName;";

            $result=mysqli_query($conn,$query) or die(mysqli_error($conn));

            foreach($result as $row){
                echo '<option value="'.$row['campusId'] .'">'.$row['campusName'].'</option>';

            }

        ?>
            
</select>
<br>
        <button type="submit" class="btn btn-primary">Next</button>
        </div></div></div>
    
    
        </form >

  
         </body>

</html>
 