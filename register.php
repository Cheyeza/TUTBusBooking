<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>TUTBusBooking-System</title>

</head>
<script>


function validateForm() 
{
var serror=document.getElementById("serror");
var nerror=document.getElementById("nerror");
var snerror=document.getElementById("snerror");
var eerror=document.getElementById("eerror");


if(document.forms["form"]["student number"].value==""&&
 document.forms["form"]["name"].value==""&&
 document.forms["form"]["surname"].value==""&&
 document.forms["form"]["email"].value=="")
{

serror.innerHTML="<span style='color:red;''>"+" This field should not be empty *</span>"
nerror.innerHTML="<span style='color:red;''>"+" This field should not be empty *</span>"
snerror.innerHTML="<span style='color:red;''>"+" This field should not be empty *</span>"
eerror.innerHTML="<span style='color:red;''>"+" This field should not be empty *</span>"

return false;

}else
{

//registering student number
var studNo=document.forms["form"]["studNo"].value;


if(studNo=="")
{

   serror.innerHTML="<span style='color:red;''>"+" field should not be empty *</span>";
  return false;

}
else if(!studNo.match(/[a-zA-Z][a-zA-Z ]+[a-zA-Z]$/))
{
serror.innerHTML="<span style='color:red;''>"+" field should contain alphabetical characters.*</span>";
return false;

}else
{

serror.innerHTML="";  
}
//registering name

var name=document.forms["form"]["name"].value;


if(name=="")
{

   nerror.innerHTML="<span style='color:red;''>"+" This field should not be empty *</span>";
  return false;

}else if(!name.match(/^[a-zA-Z]*$/))
{
nerror.innerHTML="<span style='color:red;''>"+" This field should contain alphabetical characters.*</span>";
return false;

}else
{

nerror.innerHTML=""; 
}
//registering surname


var surname=document.forms["form"]["surname"].value;


if(surname=="")
{

   serror.innerHTML="<span style='color:red;''>"+" This field should not be empty *</span>";
  return false;

}
else if(!surname.match(/[a-zA-Z][a-zA-Z ]+[a-zA-Z]$/))
{
serror.innerHTML="<span style='color:red;''>"+" field should contain alphabetical characters.*</span>";
return false;

}else
{

serror.innerHTML="";  
}

//registering email


var email=document.forms["form"]["email"].value;

if(email=="")
{

   error.innerHTML="<span style='color:red;''>"+" field should not be empty *</span>";
  return false;

}
else
if(!((email.indexOf(".") > 0) && (email.indexOf("@") > 0)) ||/[^a-zA-Z0-9.@_-]/.test(email))
{
error.innerHTML="<span style='color:red;''>"+" Invalid email.*</span>";

return false;
}else if(email.slice(-3)!="com" && email.slice(-5)!="ac.za" && email.slice(-6)!="gov.za" && email.slice(-3)!="org" && email.slice(-5)!="co.za")
{
  error.innerHTML="<span style='color:red;''>"+" Invalid email.*</span>";

return false;
}
else
{
error.innerHTML="";
}
// adding password and password verification
var passd=document.forms["form"]["pwd"].value;
var vpassd=document.forms["form"]["cpwd"].value;


var cerrormessage=document.getElementById("cerrorpass");
var pass=document.getElementById("pwd").value;

if(pass=="")
{

   errormessage.innerHTML="<span style='color:red;''>"+" field should not be empty *</span>";
  return false;

}else
{
errormessage.innerHTML="";
}
//contain atleast 1 lowercase

if(!pass.match(/^(?=.*[a-z])/))
{
  errormessage.innerHTML="<span style='color:red;''>"+" Password should contain atleast 1 lowercase alphabetical character.*</span>";
return false;
}
else
{
errormessage.innerHTML="";
}
//contain atleast 1 uppercase
if(!pass.match(/^(?=.*[A-Z])/))
{
  errormessage.innerHTML="<span style='color:red;''>"+" Password should contain atleast 1 uppercase alphabetical character.*</span>";
return false;
}
else
{
errormessage.innerHTML="";
}
//contain atleast 1 numeric
if(!pass.match(/^(?=.*[0-9])/))
{
  errormessage.innerHTML="<span style='color:red;''>"+" Password should contain atleast 1 numeric character.*</span>"
return false;
}
else
{
errormessage.innerHTML="";
}
//contain special character
if(!pass.match(/^(?=.*[!@#\$%\^&\*])/))
{
  errormessage.innerHTML="<span style='color:red;''>"+" Password should contain special character.*</span>";
return false;
}
else
{
errormessage.innerHTML="";
}
//contain 8 or more characters
if(!pass.match(/^(?=.{8,})/))
{
  errormessage.innerHTML="<span style='color:red;''>"+" Password shouldcontain 8 or more characters.*</span>";
return false;
}
else
{
errormessage.innerHTML="";
}
//confirm password
//step 1
if(vpassd==""){

cerrormessage.innerHTML="<span style='color:red;''>"+" confirm Password.*</span>";
return false;   
}else
{

cerrormessage.innerHTML="";
}




if(vpassd!=passd){

errormessage.innerHTML="<span style='color:red;''>"+" Password doesn't match.*</span>"
cerrormessage.innerHTML="<span style='color:red;''>"+" Password doesn't match.*</span>"
return false;   
}else
{
errormessage.innerHTML=""
cerrormessage.innerHTML=""
  }
 }
}
</script>

<body>
    <div>
        <nav class="navbar navbar-light navbar-expand-md fixed-top shadow navigation-clean" style="background-color: rgb(237,14,0);color: rgb(255,255,255);opacity: 0.80;">
            <div class="container"><a class="navbar-brand" href="index.php" style="font-family: Asap, sans-serif;font-weight: normal;">TUTBB-System&nbsp;<i class="fa fa-calendar"></i>&nbsp;</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div
                    class="collapse navbar-collapse" id="navcol-1" style="font-size: 17px;font-family: 'Advent Pro', sans-serif;">
                    <ul class="nav navbar-nav ml-auto" style="color: rgb(255,255,255);">
                        <li class="nav-item" role="presentation"><a class="nav-link" href="index.php" style="color: rgb(255,255,255);font-weight: normal;font-family: Asap, sans-serif;"><i class="fa fa-home"></i>&nbsp;Login&nbsp;</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link border rounded-0" href="login.php" style="color: rgb(240,62,51);font-family: Asap, sans-serif;background-color: #ffffff;"><i class="fa fa-laptop"></i>&nbsp;Home</a></li>
                        <li class="nav-item border rounded-0 border-white"
                            role="presentation"><a class="nav-link border-white" href="register.php" style="color: rgb(255,255,255);font-family: Asap, sans-serif;"><i class="fa fa-laptop"></i>&nbsp;Register</a></li>
                    </ul>
            </div>
    </div>
    </nav>
    </div>
    <div class="row login-form">
        <div class="col-md-4 offset-md-4" style="padding-top: 131px;">
            <h2 class="text-center shadow-sm form-heading" style="font-family: Asap, sans-serif;font-weight: normal;color: rgb(240,62,51);">Registering Form &nbsp;<i class="fa fa-pencil"></i></h2>
            <form class="text-white border-white shadow custom-form" action="index.php" name="form" onsubmit="return validateForm();" method="post">
                <div class="col">
                    <h1 style="font-size: 16px;font-family: Asap, sans-serif;color: rgb(240,62,51);font-style: italic;">Student Details </h1>
                </div>
                <hr style="background-color: #f03e33;">
                <div class="form-group"><input class="form-control" type="text" name="studNo" id="name" placeholder="Student No" required  style="font-family: Asap, sans-serif;"><span id="nerror"></span></div>
                <div class="form-group"><input class="form-control" type="text" name="name" id="name" placeholder="Firstname" required style="font-family: Asap, sans-serif;"><span id="nerror"></span></div>
                <div class="form-group"><input class="form-control" type="text" name="surname"  id="surname" placeholder="Lastname" required style="font-family: Asap, sans-serif;"><span id="serror"></span></div>
                <div class="form-group"><input class="form-control" type="email" name="email" id="email" placeholder="Email" required style="font-family: Asap, sans-serif;"><span id="error"></span></div>
                <div class="form-group"><input class="form-control" type="password" name="password" id="pwd" placeholder="Password" required style="font-family: Asap, sans-serif;"><span id="errorpass"></span></div>
                <div class="form-group"><input class="form-control" type="password" name="Vpassword" id="vpwd" placeholder="Confirm Password" required style="font-family: Asap, sans-serif;"><span id="cerrorpass"></span></div>
                <button class="btn btn-light btn-block btn-sm submit-button" name="register" type="submit" style="background-color: rgb(240,62,51);font-weight: normal;font-family: Asap, sans-serif;font-size: 16px;">Register</button></form>
      
   
      </div>
        </div>
       
        
</body>


</html>






















