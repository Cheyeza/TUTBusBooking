<?php

if (session_status()!==PHP_SESSION_ACTIVE)session_start();
$_SESSION['booking_error'] = null;
if (!isset($_SESSION['studNo']))
    {
        header("Location: index.php");
    }
include 'connect.php';
/*$campusName = $_POST['campusName'];
$campus_From = $_POST['campus_From'];
$destination = $_POST['destination'];
$time = $_POST['time'];*/

$campusId = $_POST['location'];
if(!isset($campusId)){
    header("Location: new_booking.php");
}


/*$query="select * from schedule s, campus c where campus_From='$campusName' 
and destination='$campusName' and time='$time' and c.campusId='$campusId' ";*/



?>
<!DOCTYPE html>
    <html>
        <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>Scheduled Trips</title>

        
        </head>
        <body>
        <?php include 'navigation.html'; ?>


    
        <div class="back">
<div class="div-center">
<div  class="page_heading">
      <div class="container">

          <h2 class="text-center">Destination</h2>
      </div>
</div>


        <div class="container align-items-center" style="width: 50%">

        <h1 style="font-size: 16px;font-family: Asap, sans-serif;color: rgb(240,62,51);font-style: italic;">Select Your Trip Destination And Time</h1>
        <?php
$query = "select * from view_schedule where location = $campusId and time > NOW() order by time";

$result=mysqli_query($conn,$query)or die(mysqli_error($conn));

$row_cnt = mysqli_num_rows($result);
   

        ?>
        <form action = "confirm.php" method = "POST">
    
        <select name="schedule"  class="form-control" id="schedule">
           
            <?php

                
                foreach($result as $row){
                    $disable = "";
                    if($row["bookings"] > 75){
                        $disable = "disabled";
                    }
                    echo '<option value="'.$row["scheduleId"].'"'. $disable .' >'.$row["destination"]. ', '.$row["time"].'</option>';
    
                }
    
            ?>
               
    </select>
<br>
<div class="col-md-10 text-center ">
    <button type="submit" class="btn btn-primary">Next</button>  
            </div>
        </form>
         </div></div></div>
         <?php include 'footer_fixed.html'; ?>
        </body>
</html> 