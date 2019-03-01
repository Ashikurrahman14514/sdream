<?php
include("includes/db_connection.php");

if(isset($_GET['user_id'])){

    $user_id    =$_GET['user_id'];
    $post_id    =$_GET['post_id'];

    $check_email="SELECT * FROM `like` WHERE `user_id`='$user_id' AND `post_id`='$post_id'";
    $run_email=mysqli_query($con,$check_email);

    $check =mysqli_num_rows($run_email);
    
    if ($check==1){
    echo"<script>window.open('vote_v.php','_self')</script>";
    
    }else {
            $delete_post="INSERT INTO `like`(`user_id`,`post_id`,`user_like`) VALUES ('$user_id','$post_id','1')";
    $run_delete=mysqli_query($con,$delete_post);

    if ($run_delete) {
         echo"<script>window.open('vote_p.php','_self')</script>";
        
        
    }else {
        echo"<script>window.open('vote_v.php','_self')</script>";
    }
        }

   

}

?>