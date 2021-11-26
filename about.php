<?php

    if (session_status()!==PHP_SESSION_ACTIVE) session_start();

    if (!isset($_SESSION['studNo']))
    {
        header("Location: index.php");
    }
    include 'connect.php';
   
?>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport"
content="width=device.width,initial-scale=1">
<link rel="stylesheet">
    <title>About Us</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<?php include 'navigation.html'; ?>   
<div  class="page_heading">
      
    
      <h1>About Us </h1>
      
</div>
<p>The TUT Bus Booking System was developed to simplify trips for students,
   whereby students won't have to fight in order to get the available bus, </p>
  <p>   in this way students will also be able to practice the covid-19 regulation rules.
    This system allows students to register online, login and simply book their next trip</p>
   <p>  by selecting their location, the destination campus and the departure time.</p>

</body>  


</html>
<br>
