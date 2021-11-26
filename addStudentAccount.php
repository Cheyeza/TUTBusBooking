<?php

if (session_status()!==PHP_SESSION_ACTIVE)session_start();

if (!isset($_SESSION['studNo']))
{
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>TUTBusBookikng-System</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<script>

    
function validateForm() 
{
var deserror=document.getElementById("deserror");
var camperror=document.getElementById("camperror");
var lerror=document.getElementById("lerror");
var campNameerror=document.getElementById("campNameerror");
var timeerror=document.getElementById("timeerror");

//var campusNameerror=document.getElementById("campusNameerror");


var errormessage=document.getElementById("errorpass");
//var ierror=document.getElementById("ierror");

if(
 document.forms["form"]["location"].value==""&&
 document.forms["form"]["campusName"].value==""&&
 document.forms["form"]["destination"].value==""&&
 document.forms["form"]["time"].value==""&&
 )
{


lerror.innerHTML="<span style='color:red;''>"+" Please select the campus you are located at *</span>"
campNameerror.innerHTML="<span style='color:red;''>"+" Please select the campus name *</span>"
camperror.innerHTML="<span style='color:red;''>"+" field should not be empty *</span>"
timeerror.innerHTML="<span style='color:red;''>"+" Please select a time slot*</span>"


return false;


}else
{


//campus
var location=document.forms["form"]["location"].value;

if(campus=="")
{

   lerror.innerHTML="<span style='color:red;''>"+" Please select your location *</span>";
  return false;


 }else
    {

     lerror.innerHTML="";  
    }


}

//Destination campus
var destination=document.forms["form"]["destination"].value;

if(destination=="")
{

   deserror.innerHTML="<span style='color:red;''>"+" Please select your destination campus *</span>";
  return false;


 }else
    {

     deserror.innerHTML="";  
    }


}

//Time
var time=document.forms["form"]["time"].value;

if(time=="")
{

   timeerror.innerHTML="<span style='color:red;''>"+" Please select a time slot *</span>";
  return false;


 }else
    {

     timeerror.innerHTML="";  
    }


}

//campus
var campus=document.forms["form"]["campus"].value;

if(campus=="")
{

   camperror.innerHTML="<span style='color:red;''>"+" field should be selected *</span>";
  return false;


 }else
    {

     camperror.innerHTML="";  
    }


}


//campusName

var campusName=document.forms["form"]["campusName"].value;


if(campusName)=="")
{

    campNameerror.innerHTML="<span style='color:red;''>"+" Please select the campus name *</span>";
  return false;

}
else if(!campusName.match(/[a-zA-Z][a-zA-Z ]+[a-zA-Z ]$/))
{
    campNameerror.innerHTML="<span style='color:red;''>"+" field should contain alphabetical characters.*</span>";
return false;

}else
{

    campNameerror.innerHTML="";  
}

}
}
</script>
<body>
    <div>
        <nav class="navbar navbar-light navbar-expand-md fixed-top shadow navigation-clean" style="background-color: rgb(237,14,0);color: rgb(255,255,255);opacity: 0.80;">
            <div class="container"><a class="navbar-brand" href="index.php" style="font-family: Asap, sans-serif;font-weight: normal;">For easy travelling,select and book your next trip&nbsp;<i class="fa fa-calendar"></i>&nbsp;</a>
                <div
                    class="collapse navbar-collapse" id="navcol-1" style="font-size: 17px;font-family: 'Advent Pro', sans-serif;">
                    <ul class="nav navbar-nav ml-auto" style="color: rgb(255,255,255);">
                        <li class="nav-item" role="presentation"><a class="nav-link" href="profileDash.php" style="color: rgb(255,255,255);font-weight: normal;font-family: Asap, sans-serif;">&nbsp;Back&nbsp;</a></li>
                        
                    </ul>
            </div>
    </div>
    </nav>
    </div>
    <div class="row login-form">
        <div class="col-md-4 offset-md-4" style="padding-top: 131px;">
            <h2 class="text-center shadow-sm form-heading" style="font-family: Asap, sans-serif;font-weight: normal;color: rgb(240,62,51);">Booking Form &nbsp;<i class="fa fa-pencil"></i></h2>
            <form class="text-white border-white shadow custom-form" action="login.php" name="form" onsubmit="return validateForm();" method="post">
       <div class="col">
            <h1 style="font-size: 16px;font-family: Asap, sans-serif;color: rgb(240,62,51);font-style: italic;">Select Your Trip</h1>
        </div>
        <hr style="background-color: #f03e33;">
<!-- Dropdown list with dummy data -->
    <select name="location"  class="form-control dropdown-menu" id="location">
        <?php
            
            $query="select * from campus";

            $result=mysqli_query($conn,$query) or die(mysqli_error($conn));

            foreach($result as $row){
                echo '<option value="'.$row['campusId'] .'">'.$row['campusName'].'</option>';
            }

        ?>

    

    
    
    <div class="form-group"><select  class="form-control" name="campusName"  style="display: none;font-family: Asap, sans-serif;" id="campusName">
    </select></div>

   </label></div> 
   
         <button class="btn btn-light btn-block btn-sm submit-button" name="NEXT" type="submit" style="background-color: rgb(240,62,51);font-weight: normal;font-family: Asap, sans-serif;font-size: 16px;">NEXT</button></form>
         </div>
         </div>
       
         </body>

</html>
 

<?php

include 'connect.php';


$studNo=$_POST['studNo'];
$name=$_POST['name'];
$surname=$_POST['surname'];
$email=$_POST['email'];


// $............=$_POST['account'];
//$password=md5($_POST['password']);


//doing the account login page

$query="select * from student where email='$email'";

$result=mysqli_query($conn,$query) or die(mysqli_error($conn));

$row=mysqli_fetch_array($result);

if($row['email']==$email)
{

 echo '<script type="text/javascript">alert("Email Account exists, Please login"); window.location = "login.php";</script>';

}
else
{

$sql="INSERT INTO account(studentNo,name,surname,email)
	VALUES('$studNo','$name','$surname','$email')";

	if(mysqli_query($conn,$sql))
	{

	echo '<script type="text/javascript">alert("You have successfully created your account"); window.location = "index.php";</script>';

	}
	else{

	  die("<h3>account creation was unsuccessful </h3>".mysqli_error($conn));

	}


      }
?>



















