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

    <nav class="navbar fixed-top navbar-dark" style="background:#5A6268;border-bottom:50Px;">
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
     <section  class="mt-4 "> 
       <div class="jumbotron jumbotron-fluid">
        <div class="container">
        <div class="row">
            <div class="col-lg-6">
            <div class="text-center bg-primary text-white py-1"><h2>Send</h2></div>
            <?php function send(){
                global $user_id;
                global $con;
$send_msg="SELECT * FROM `message` WHERE `sender_id`='$user_id' ORDER BY 1 DESC LIMIT 10";
$run_msg=mysqli_query($con,$send_msg);
$count_msg=mysqli_num_rows($run_msg);
while ($row_msg=mysqli_fetch_array($run_msg)) {
    $msg_contant=$row_msg['message'];
    $msg_date=$row_msg['send_time'];
    $res_id=$row_msg['receiver_id'];

    $res="SELECT * FROM `users` WHERE `id`='$res_id'";
    $res_msgr=mysqli_query($con,$res);
    $row_res=mysqli_fetch_array($res_msgr);
    $res_namef=$row_res['firstname'];
    $res_namel=$row_res['lastname'];

echo"<p class='mb-2'>$msg_contant <strong><a href='x_user.php?u_id=$res_id' class='btn-outline-success px-0' aria-pressed='true'>: $res_namef $res_namel</a></strong></p>";
}
}
send();?>
            </div>
            <div class="col-lg-6">
            <div class="text-center bg-success text-white py-1"><h2>Received</h2></div>
            <?php function resiver(){
                global $user_id;
                global $con;
$send_msg="SELECT * FROM `message` WHERE `receiver_id`='$user_id' ORDER BY 1 DESC LIMIT 10";
$run_msg=mysqli_query($con,$send_msg);
$count_msg=mysqli_num_rows($run_msg);
while ($row_msg=mysqli_fetch_array($run_msg)) {
    $msg_contant=$row_msg['message'];
    $msg_date=$row_msg['send_time'];
    $res_id=$row_msg['sender_id'];

    $res="SELECT * FROM `users` WHERE `id`='$res_id'";
    $res_msgr=mysqli_query($con,$res);
    $row_res=mysqli_fetch_array($res_msgr);
    $res_namef=$row_res['firstname'];
    $res_namel=$row_res['lastname'];

echo"<p class='mb-2'>$msg_contant <strong><a href='x_user.php?u_id=$res_id' class='btn-outline-primary px-0' aria-pressed='true'>: $res_namef $res_namel</a></strong></p>";
}
}
resiver();?>
            </div>
        </div>
    </div>
</div>
 </section> 
</body>
<script src="bootstrap4/jquery.js"></script>
<script src="bootstrap4/popper.js"></script>
<script src="bootstrap4/bootstrap4.js"></script>

</html>