<?php

    if (session_status()!==PHP_SESSION_ACTIVE)session_start();

    if (!isset($_SESSION['studNo']))
    {
        header("Location: index.php");
    }

    $bookingId = $_POST['bookingId'];
    if (!isset($bookingId))
    {
        header("Location: bookings.php");
    }
    include 'connect.php';

    $sql = "DELETE FROM booking where bookingId = $bookingId and studNo = '".$_SESSION['studNo']."'";

    
    


    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
        header("Location: bookings.php");
      } else {
        echo "Error deleting record: " . $conn->error;
      }
?>