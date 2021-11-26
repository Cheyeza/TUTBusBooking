<?php
if (session_status()!==PHP_SESSION_ACTIVE)session_start();
    include 'connect.php';

    $studNo=$_POST['studno'];
    $email=$_POST['email'];
    $username=$_POST['uname'];
    $surname=$_POST['lastname'];
    $password=$_POST['password'];
    $name=$_POST['firstname'];
    $campusId=$_POST['campus'];

    


    $query="select * from student s, user u where email='$email' or s.studNo='$studNo' or username='$username' ";

    $result=mysqli_query($conn,$query)or die(mysqli_error($conn));

    $row_cnt = mysqli_num_rows($result);
    echo $row_cnt;
    if($row_cnt > 0)
    {
        
        $_SESSION['reg_error'] = "Student No, Email or Username already exists.";
        echo "REG FAILED";
        header("Location: registration.php");
       
    }else{
       
        //sql for inserting student
        $insertStudent="INSERT INTO student(studNo,name,surname,email,campusId)
                 VALUES('$studNo','$name','$surname','$email',$campusId)";
    
        //executing sql to insert student
        mysqli_query($conn,$insertStudent);


        //sql inserting user
        $insertUser="INSERT INTO user(username,password,studNo)
                  VALUES('$username','".md5($password)."','$studNo')";

        //executing sql to insert user
        mysqli_query($conn,$insertUser);

        $_SESSION['studNo'] = $studNo;
        $_SESSION['reg_error'] = null;
        $_SESSION['login_error'] = null;
        header("Location: home.php");
    }
?>