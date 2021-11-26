<?php
    //This file is for opening connection to the database

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "booking";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: ".$conn->connect_error);
    }
   
?>
