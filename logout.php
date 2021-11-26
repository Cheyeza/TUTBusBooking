<?php
include 'connect.php';
    if (session_status()!==PHP_SESSION_ACTIVE)session_start();

    $_SESSION['studNo'] = null;
    header("Location: index.php");

    


?>