<?php
include("includes/db_connection.php");

if(isset($_POST["submit"])){
    $firstname=mysqli_real_escape_string($con,$_POST["firstname"]);
    $lastname =mysqli_real_escape_string($con,$_POST["lastname"]);
    $email    =mysqli_real_escape_string($con,$_POST["email"]);
    $password =mysqli_real_escape_string($con,$_POST["password"]);
    $password2=mysqli_real_escape_string($con,$_POST["password2"]);
    $country  =mysqli_real_escape_string($con,$_POST["country"]);
    $city     =mysqli_real_escape_string($con,$_POST["city"]);
    $village  =mysqli_real_escape_string($con,$_POST["village"]);
    $birthday =mysqli_real_escape_string($con,$_POST["birthday"]);
    $gender   =mysqli_real_escape_string($con,$_POST["gender"]);
    $status   ="unverifide";
    $ver_code =mt_rand();
    $posts    ="yes";
 
    if((strlen($password<6))||($password!=$password2)){
        echo"<script>alert('password should be minimum 6 characters! or password not match')</script>";
        exit();}
        $check_email="SELECT * FROM `users`  WHERE `email`='$email'";
        $run_email=mysqli_query($con,$check_email);
        $check =mysqli_num_rows($run_email);
        if ($check==1){
        echo "
        <div class='alert alert-danger mt-2'>
        <strong>Email already exist, please try another!</strong>
        </div>";
        exit();
        }
    $insert ="INSERT INTO `users`(`firstname`,`lastname`,`email`,`password`,`country`,`city`,`village`,`birthday`,`gender`,`status`,`ver_code`,`posts`,`image`,`reg_date`,`last_login`) VALUES ('$firstname','$lastname','$email','$password','$country','$city','$village','$birthday','$gender','$status','$ver_code','$posts','defeult.jpg',NOW(),NOW())";
    $query =mysqli_query($con,$insert); 

    if($query){
      echo" <div class='alert alert-success mt-2'>
        Hi,<strong> $firstname $lastname</strong>
        Congratulations.registration is almost complete.Please check your email (spam box) for final verification.
        </div>";
    }
    else{
        echo"
        <div class='alert alert-danger mt-2'>
        <strong>Registration failed.Try again!</strong>
        </div>
        ";
    }
    $to=$email;
    $subject="Verify your email address.";
    $message="<html>
    Hello <strong> $firstname $lastname ...</strong><a href='http://www.ashikshetu.com/verify.php?code=$ver_code'>Click To Verify Your Email</a>
    </html>";
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'From: <office@ashikshetu.com>' . "\r\n";
    mail($to,$subject,$message,$headers);


}
?>