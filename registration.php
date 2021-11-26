<?php
if (session_status()!==PHP_SESSION_ACTIVE)session_start();
    include 'connect.php';
     
?>

<!DOCTYPE html>

<html>

<head>

    <title>Register</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>

<body>

<div class="back">
<div class="div-center">


<div class="container align-items-center" style="width: 50%">
     <form action="process_registration.php" method="post">
     <div class="form-group">
        <h2>Register</h2>

        <?php if (isset($_SESSION['reg_error'])) { ?>

            <p style="color:red"><?php echo $_SESSION['reg_error']; ?></p>

        <?php } ?>


            <input type="text" class="form-control" name="studno" placeholder="Student Number" required><br>

         
            <input type="text"  class="form-control" name="firstname" placeholder="First Name" required><br>

            <input type="text"  class="form-control" name="lastname" placeholder="Last Name" required><br>

            <input type="text"  class="form-control" name="email" placeholder="E-Mail" required><br>



        <!-- Dropdown list with dummy data -->
        <select name="campus"  class="form-control" id="campus">
        <?php
            
            $query="select * from campus order by campusName";

            $result=mysqli_query($conn,$query) or die(mysqli_error($conn));

           // $row=mysqli_fetch_array($result);

            foreach($result as $row){
               // echo $row['pointsAvailable']  ;
                echo '<option value="'.$row['campusId'] .'">'.$row['campusName'].'</option>';
            }

        ?>

       
            
            
        </select>


       
        <input type="text"  class="form-control" name="uname" placeholder="Username" require><br>

       
        <input type="password"  class="form-control" name="password" placeholder="Password"><br> 

        <button type="submit" class="btn btn-primary">Register</button>

        </div>
     </form>

     <p> Already have an account? <a href="index.php"> click here </a> to login</p>

        </div>
        </div>
        </div>
</body>

</html>


