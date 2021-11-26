<!DOCTYPE html>
<html>
<?php
    $conn = mysqli_connect("localhost","root","","Booking");
    
    // Check connection
    if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }
     
      if(!isset($_SESSION)) 
      { 
          session_start(); 
          $username=$_SESSION['username'];
          $userId=$_SESSION['userId'];
      }

      $qry="SELECT * from location where userId='$userId'";
      $res=mysqli_query($conn,$qry);
    
      $data=mysqli_fetch_array($res);



    ?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>TUTBusBooking-System</title>
    </head>

<body style="font-family: 'Advent Pro', sans-serif;">
    <div>
        <nav class="navbar navbar-light navbar-expand-md sticky-top shadow navigation-clean" style="background-color: rgb(237,14,0);color: rgb(255,255,255);opacity: 0.80;">
            <div class="container"><a class="navbar-brand" href="logout.php" style="font-family: Asap, sans-serif;font-weight: normal;">&nbsp;<i class="fa fa-arrow-circle-left"></i>&nbsp;</a><a class="navbar-brand" href="#" style="font-family: Asap, sans-serif;font-weight: normal;">Booking&nbsp;<i class="fa fa-calendar"></i>&nbsp;</a>
                <button
                    data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navcol-1" style="font-size: 17px;font-family: 'Advent Pro', sans-serif;">
                        <ul class="nav navbar-nav ml-auto" style="color: rgb(255,255,255);"></ul>
                    </div>
            </div>
        </nav>
    </div>

    <?PHP

$query="SELECT * from user where username='$username'";
$result=mysqli_query($conn,$query);

//$rows=mysqli_num_rows($result);



if ($rows>0) {
  
  ?>

<div class="container-fluid main-panel" style="padding-top: 142px;">
<div class="row">
<?php
      while ($rows=mysqli_fetch_array($result)) {
    ?>
<div class="col d-flex justify-content-center align-items-center">
  <div data-bs-hover-animate="bounce" class="login-panel" style="padding-top: 0px;height: 850px;width: 601px;">
      <div class="col" style="color: rgb(240,62,51);">
          <h1 class="text-center"><i class="material-icons border rounded-circle" style="font-size: 119px;opacity: 1;color: rgb(240,62,51);padding-top: 0px;margin-top: 26px;">vpn_key</i></h1>
          <h1 class="text-center" style="font-family: Asap, sans-serif;"><?php echo $rows['surname'].' '. $rows['name'];?></h1>
          <hr style="background-color: #f03e33;">
          <tr>
                         
                      </tr><br><br>
                      <?php echo $message;?>
          <div class="table-responsive">
              <table class="table">
                  <thead style="background-color: #f03e33;">
                      <tr>
                          <th style="color: rgb(255,255,255);font-family: Asap, sans-serif;font-weight: normal;"><i class="fa fa-user"></i>&nbsp;Personal Details</th>
                      </tr>
                  </thead>
                  <tbody>
                  <tr>
                          <td style="font-family: Asap, sans-serif;">userId :&nbsp;<?php echo $rows['userId'];?></td>
                      </tr>
                      <tr>
                          <td style="font-family: Asap, sans-serif;">username :&nbsp;<?php echo $rows['username'];?></td>
                      </tr>
                      <tr>
                          <td style="font-family: Asap, sans-serif;">password :&nbsp;<?php echo $rows['password'];?></td>
                      </tr>
                      <tr>
                          <td style="font-family: Asap, sans-serif;">studNo :&nbsp;<?php echo $rows['studentNo'];?></td>
                      </tr>
                      
                  </tbody>
              </table>
          </div>
         
                  <div class="table-responsive">
              <table class="table">
                  <thead>
                      <tr></tr>
                  </thead>
                  <tbody>
                      
                      <tr>
                          <td><a class="btn btn-sm" role="button" href="bookings.php?edt=<?php echo $rows['userId'];?>" style="font-family: Asap, sans-serif;background-color: rgb(240,62,51);color: rgb(255,255,255);">View Booked Trips&nbsp;<i class="fa fa-list-alt"></i></a></td>
                        </tr>
                  </tbody>
              </table>
          </div>
                  <?php
    
  }
  ?>
              </table>

              <?php
}else{
  ?>
  
  <?php
} ?>
          </div>
      </div>
      <div></div>
  </div>
</div>
</div>
</div>

</body>

</html>