<?php
if (session_status()!==PHP_SESSION_ACTIVE)session_start();
    include 'connect.php';

    $username=$_POST['uname'];
    $password=$_POST['password'];

    $query="select * from student s, user u where password='".md5($password)."' and username='$username' ";
    $result=mysqli_query($conn,$query);
    $row=mysqli_fetch_array($result);
    if($row !== null){
        $_SESSION['studNo'] = $row['studNo'];
        $_SESSION['login_error'] = null;
        header("Location: home.php");

    }else{
        echo 'user does not exist'; 
        $_SESSION['login_error'] = "Username or password is incorrect." ;
        header("Location: index.php");
    }

?>