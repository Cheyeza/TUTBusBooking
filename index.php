<?php
if (session_status()!==PHP_SESSION_ACTIVE)session_start();
$_SESSION['reg_error'] = null;
?>

<!DOCTYPE html>

<html>

<head>
    <title>LOGIN</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
</head>

<body>

<div class="back">
<div class="div-center">


<div class="container align-items-center" style="width: 50%">


     <form action="process_login.php" method="post" >
     <div class="form-group">
        <h2>LOGIN</h2>

        <?php if (isset($_SESSION['login_error'])) { ?>

            <p class="error"><?php echo $_SESSION['login_error']; ?></p>

        <?php } ?>

        <div class="input-group" style="margin: 10px">
           <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
           <input type="text" class="form-control" name="uname" placeholder="Username" required><br>   
        </div>

        <div class="input-group" style="margin: 10px">
            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            <input type="password" class="form-control" name="password" placeholder="Password"><br> 
        </div>

       
        <button type="submit" class="btn btn-primary">Login</button>
        </div>
     </form>
     <p> No account? <a href="registration.php"> click here </a> to register</p>
     
        
</div>

        </div>
        </div>
</body>

</html>


