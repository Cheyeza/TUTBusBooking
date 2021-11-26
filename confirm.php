<?php

    if (session_status()!==PHP_SESSION_ACTIVE)session_start();
    $_SESSION['booking_error'] = null;
    if (!isset($_SESSION['studNo']))
    {
        header("Location: index.php");
    }

    $scheduleId = $_POST['schedule'];
    if (!isset($scheduleId))
    {
        header("Location: new_booking.php");
    }
    include 'connect.php';

    $query="select * from view_schedule where scheduleId =  $scheduleId";
    $result=mysqli_query($conn,$query);
     $row=mysqli_fetch_array($result);

    $queryTimeExists="SELECT * from booking b left JOIN schedule s on s.scheduleId = b.scheduleId where b.studNo = '".$_SESSION['studNo']."' and s.time = '".$row['time']."'";
    $resultTimeExists=mysqli_query($conn,$queryTimeExists);
    $rowtimecount=mysqli_num_rows($resultTimeExists);
    if($rowtimecount > 0){
        $_SESSION['booking_error'] = "You already have a booking for " . date_create($row['time'])->format('Y-m-d'). " at " . date_create($row['time'])->format('H:i');
        header("Location: new_booking.php");
        exit();
    }
?>

<html>
    <head>
        <title>Confirm Booking </title>
        
</head>

<body>
<?php include 'navigation.html'; ?>
<div class="back">
<div class="div-center">
<div  class="page_heading">
      <div class="container">

          <h2 class="text-center">Confirm Trip</h2>
      </div>
</div>
<div class="container align-items-center" style="width: 50%">
       
<?php
    echo "<p> Are you sure you want to book a trip from <strong>".$row["campus_from"]."</strong> to <strong>".$row["destination"]."</strong>  at <strong>".$row["time"]."</strong>? </p>"
?>
<div class="col-md-10 text-center " >
<form action="process_booking.php" method="POST" style="display: inline;">
    <input type="hidden" value="<?php echo $scheduleId; ?>" name="schedule"/>
    
    <button type="submit" class="btn btn-primary">Yes</button> 

</form>
<form action="Home.php" method="POST" style="display: inline;">
  

    <button type="submit" class="btn btn-primary">No</button> 

</form>
</div></div></div></div>
<?php include 'footer_fixed.html'; ?>
</body>
</html>