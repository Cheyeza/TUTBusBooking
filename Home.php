<?php

    if (session_status()!==PHP_SESSION_ACTIVE) session_start();
    $_SESSION['booking_error'] = null;
    if (!isset($_SESSION['studNo']))
    {
        header("Location: index.php");
    }
    include 'connect.php';

    $query="select * from student where studNo='".$_SESSION['studNo']."'";
    $result=mysqli_query($conn,$query);
    $row=mysqli_fetch_array($result);
    $rowCount = 0;
?>

<html>
<meta charset="UTF-8">
<meta name="viewport"
content="width=device.width,initial-scale=1">
<link rel="stylesheet"
href="https://www.w3schools.com/w3css/3/w3.css">
    <head>
        <title>Home</title>
        
            </head>
               
    <body>

    <?php include 'navigation.html'; ?>
    

    <div class="container">
    
        <div class="slideshow-container">

            <div class="mySlides">
              <div class="numbertext">1 / 3</div>
              <img src="img/stabus.jpeg" style="width:100%">
              <div class="text">Caption Text</div>
            </div>
            
            <div class="mySlides">
              <div class="numbertext">2 / 3</div>
              <img src="img/Amogelang 1.jpeg" style="width:100%">
              <div class="text">Caption Two</div>
            </div>
            
            <div class="mySlides">
              <div class="numbertext">3 / 3</div>
              <img  src="img/mathafeng.jpeg" style="width:100%">
              <div class="text">Caption Three</div>
            </div>
            
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
            
            </div>
            <br>
            
            <div style="text-align:center">
              <span class="dot" onclick="currentSlide(1)"></span> 
              <span class="dot" onclick="currentSlide(2)"></span> 
              <span class="dot" onclick="currentSlide(3)"></span> 
            </div>
            
            <script>
            var slideIndex = 1;
            showSlides(slideIndex);
            
            function plusSlides(n) {
              showSlides(slideIndex += n);
            }
            
            function currentSlide(n) {
              showSlides(slideIndex = n);
            }
            
            function showSlides(n) {
              var i;
              var slides = document.getElementsByClassName("mySlides");
              var dots = document.getElementsByClassName("dot");
              if (n > slides.length) {slideIndex = 1}    
              if (n < 1) {slideIndex = slides.length}
              for (i = 0; i < slides.length; i++) {
                  slides[i].style.display = "none";  
              }
              for (i = 0; i < dots.length; i++) {
                  dots[i].className = dots[i].className.replace(" active", "");
              }
              slides[slideIndex-1].style.display = "block";  
              dots[slideIndex-1].className += " active";
            }
            </script>
         
        </div>  
        <?php include 'footer_bottom.html'; ?> 
</body>
</html>