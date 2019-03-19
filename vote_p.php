<?php
session_start();
include("includes/db_connection.php");
include("function.php");
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ashikshetu</title>

    <link rel="stylesheet" href="style/style2.css">
    <link rel="stylesheet" href="bootstrap4/bootstrap4.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>

    <nav class="navbar  navbar-fixed-top navbar-dark" style="background:#5A6268;border-bottom:50Px;">
        <div class="container">

   <?php 
            $userprofile =$_SESSION['email'];
            $get_user    ="SELECT * FROM `users` WHERE `email`='$userprofile'";
           
            $run_user  =mysqli_query($con,$get_user);
          
            $row = mysqli_fetch_array($run_user);
            

            $user_id          =$row['id'];
            $user_image       =$row['image'];
            $user_firstname   =$row['firstname'];
            $user_lastname    =$row['lastname'];
            $user_email       =$row['email'];
            $user_country     =$row['country'];
            $user_city        =$row['city'];
            $user_village     =$row['village'];
            $user_gender      =$row['gender'];
            $user_birthday    =$row['birthday'];
            $user_last_login  =$row['last_login'];
            $user_reg_date    =$row['reg_date'];

            ?>
           <li style='list-style: none;'><a style="color:white;" href="home.php?country=<?php echo $user_country;
           ?>&uid=<?php echo $user_id;
             ?>"><i class="fa fa-home fa-lg" aria-hidden="true"></i></a></li>
             <li style='list-style: none;'><a style="color:white;" href="city.php?country=<?php echo $user_country;
             ?>&city=<?php echo $user_city;
             ?>&uid=<?php echo $user_id;
             ?>"><i class="fa fa-building fa-lg"></i></a></li>
            <li style='list-style: none;'><a style="color:white;" href="village.php?country=<?php echo $user_country;
             ?>&city=<?php echo $user_city;
             ?>&village=<?php echo $user_village;
             ?>&uid=<?php echo $user_id;
             ?>"><i  class="fa fa-child fa-lg"></i></a></li>
             <li style='list-style: none;'><a style="color:white;" href="my_message.php?"<i  class="fa fa-envelope fa-lg"></i></a></li>
            <li style='list-style: none;'><a style="color:white;" href="profile.php"><i class="fa fa-address-book fa-lg	"
            aria-hidden="true"></i></a></li>
        </div>
    </nav>

    <div class="jumbotron jumbotron-fluid">
        
        <div class="container">
             <div class='alert alert-success py-4'>
             
                    <h2>Vote complited!</h2>
            </div>

        </div>
       
    </div>

</body>
<script src="bootstrap4/jquery.js"></script>
<script src="bootstrap4/popper.js"></script>
<script src="bootstrap4/bootstrap4.js"></script>

</html>