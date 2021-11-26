<?php

    if (session_status()!==PHP_SESSION_ACTIVE)session_start();

    if (!isset($_SESSION['studNo']))
    {
        header("Location: index.php");
    }

    $scheduleId = $_POST['schedule'];
    if (!isset($scheduleId))
    {
        header("Location: bookings.php");
    }
    include 'connect.php';

    $query="select * from view_schedule where scheduleId =  $scheduleId";
    $result=mysqli_query($conn,$query);
     $row=mysqli_fetch_array($result);
?>

<html>
    <head>
        <title>Confirm Booking </title>
        
</head>

<body>
<?php include 'navigation.html'; ?>
<div class="back">
<div class="div-center">
<div class="container align-items-center" style="width: 50%">
<h2 class="text-center shadow-sm form-heading" style="font-family: Asap, sans-serif;font-weight: normal;color: rgb(240,62,51);">Confirm Trip &nbsp;</h2>
        
<?php
    echo "<p> Are you sure you want to book a trip from <strong>".$row["campus_from"]."</strong> to <strong>".$row["destination"]."</strong>  at <strong>".$row["time"]."</strong>? </p>"
?>

<form action="process_booking.php" method="POST">
    <input type="hidden" value="<?php echo $scheduleId; ?>" name="schedule"/>
    <button type="submit" class="btn btn-primary">Yes</button> 
</form>
</div></div></div>
</body>
</html>