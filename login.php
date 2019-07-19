<?php

include("includes/db_connection.php");
           
if(isset($_POST['login'])){
$email=mysqli_real_escape_string($con,$_POST['email']);
$password=mysqli_real_escape_string($con,$_POST['password']);

$select_user="SELECT * FROM `users`  WHERE `email`='$email'
AND `password`='$password'AND `status`='verifide'";

$query= mysqli_query($con,$select_user);
if (mysqli_num_rows($query) > 0){

    $_SESSION['email']=$email;
     $userprofile =$_SESSION['email'];
            $get_user    ="SELECT * FROM `users` WHERE `email`='$userprofile'";
           
            $run_user  =mysqli_query($con,$get_user);
          
            $row = mysqli_fetch_array($run_user);
            

            $user_id          =$row['id'];
            $user_image       =$row['image'];
            $user_firstname   =$row['firstname'];
            $user_lastname    =$row['lastname'];
            $user_email       =$row['email'];
            $user_password    =$row['password'];
            $user_country     =$row['country'];
            $user_city        =$row['city'];
            $user_village     =$row['village'];
            $user_gender      =$row['gender'];
            $user_birthday    =$row['birthday'];
            $user_last_login  =$row['last_login'];
            $user_reg_date    =$row['reg_date'];

    

    echo"<script>window.open('home.php?country=$user_country&city=$user_city&village=$user_village&uid=$user_id','_self')</script>";
}
    else{
        echo"<script>alert('Email or password incorrect,try again!')</script>";
    }
}
?>