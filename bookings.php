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
        <title>Bookings</title>
        
            </head>
               
    <body>

    <?php include 'navigation.html'; ?>







        <div class="container">
        <h2 style="color: rgb(240,62,51);"> Hi, <?php echo $row['name'];?>  </h2>
    <!--slide show-->

        

        <?php
            $query="select * from view_bookings where studNo = '".$_SESSION['studNo']."'  order by time";
            $result=mysqli_query($conn,$query) or die(mysqli_error($conn));
            $rowCount = mysqli_num_rows($result);

            
            
            if($rowCount > 0){
        ?>
        <table class="table table-striped thead-dark table-condensed">
            <thead class="thead ">
                <tr>
                    <th>Departing From </th>
                    <th>Traveling To </th>
                    <th>Date</td>
                    <th>Time</td>
                    <th>Cancel</th>
                </tr>
            </thead>
            <tbody>

            <!-- dummy bookings-->
            <?php
                   
                    foreach($result as $row){
            ?>
                <tr>

               
            


            
                    <td><?php echo $row['departure']; ?> </td>
                    <td><?php echo $row['destination'] ?> </td>
                    <td><?php echo date_create($row['time'])->format('Y-m-d') ?> </td>
                    <td><?php echo date_create($row['time'])->format('H:i') ?> </td>
                  
                    <td>
                        <form method="POST" action="process_cancellation.php"> 
                            <input type="hidden" value="<?php echo $row['bookingId'];?>" name="bookingId"/>
                            <input class="btn btn-danger" type="submit" value="Cancel"/>
                        </form>
                    </td>
                </tr>
                <?php  }

                ?>
                
            <tbody>
        </table>
        <?php
            }
            else{


                ?>

<div class="alert alert-danger">
    <span colspan="14">You have no booked trips</span>
            </div>

<?php
            }
            ?>
        
        </div>
        <div>

</div>
<?php if($rowCount > 5) include 'footer_bottom.html'; else include 'footer_fixed.html' ;?>
    </body>
</html>
