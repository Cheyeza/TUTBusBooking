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


    $sql = "INSERT INTO booking(scheduleId, studNo, confirmed) VALUES ($scheduleId, '".$_SESSION['studNo']."', 1) ;";

    mysqli_query($conn,$sql);
    header("Location: Home.php");
?>