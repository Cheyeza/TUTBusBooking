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


<div  class="page_heading">
      <div class="container">

          <h2 class="text-center">New Booking</h2>
      </div>
</div>
<div class="container align-items-center" style="width: 50%">

<h1 style="font-size: 16px;font-family: Asap, sans-serif;color: rgb(240,62,51);font-style: italic;">Select departure location</h1>
               
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
<?php if (isset($_SESSION['booking_error'])) { ?>
        <div class="alert alert-danger" style="margin: 10px">
            <p><?php echo $_SESSION['booking_error']; ?></p>
        </div>
        <?php } ?>
        <br>
<div class="col-md-10 text-center ">
        <button type="submit" class="btn btn-primary">Next</button>
        
        </div>
    
        </form >
        </div></div></div>
        <?php include 'footer_fixed.html'; ?>
         </body>

</html>
 