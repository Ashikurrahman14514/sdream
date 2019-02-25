<?php
include("includes/db_connection.php");

if(isset($_GET['code'])){
    $get_code =$_GET['code'];
    $get_user ="SELECT * FROM `users` WHERE `ver_code`='$get_code'";
    $run_user=mysqli_query($con,$get_user);
    $check_user=mysqli_num_rows($run_user);
    $row_user=mysqli_fetch_array($run_user);
    $user_id= $row_user['id'];

    if ($check_user==1){
        $update_user="UPDATE `users` SET `status`='verifide' WHERE `id`='$user_id'";
        $run_update=mysqli_query($con,$update_user);
        
        echo"<h2>Thanks, Your email is verifide</h2>Please<a href='http://www.ashikshetu.com'>Login to out website</a>";
    }else {
        echo"<h2>Sorry,Email not verifide, try again";
    }
}

?>