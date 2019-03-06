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
            $user_password    =$row['password'];
            $user_country     =$row['country'];
            $user_city        =$row['city'];
            $user_village     =$row['village'];
            $user_gender      =$row['gender'];
            $user_birthday    =$row['birthday'];
            $user_last_login  =$row['last_login'];
            $user_reg_date    =$row['reg_date'];

            ?>
<?php
include("includes/db_connection.php");


   if (isset($_POST["upload"])) {
                global $con;
                global $user_id;
                global $user_village;
                global $user_city;
                
                $post_title =htmlspecialchars($_POST["title"]);
                $post_content =htmlspecialchars($_POST["content"]);  
                
                $post_image =$_FILES["image"]["name"];
                $post_image_tmp=$_FILES["image"]["tmp_name"];
                $post_size=$_FILES["image"]["size"];
                $post_error=$_FILES["image"]["error"];
                $post_type=$_FILES["image"]["type"];
                $fileExt = explode('.',$post_image);
                $fileActualExt = strtolower(end($fileExt));
                $allowed = array('jpg','jpeg','png','pdf');

     if (in_array($fileActualExt,$allowed)) {
        if ($post_error === 0) {
            if ($post_size < 5000000) {
                $fileNewName =uniqid('',true).".".$fileActualExt;
                move_uploaded_file($post_image_tmp,"postimg/$fileNewName");

                if ($fileNewName =='') {
                    echo"<div class='alert alert-danger mt-2'><strong>Emty input file</strong></div>";
                    exit();
                    }else{
                        $insert ="INSERT INTO `posts`(`user_id`, `user_village`, `user_city`, `user_country`, `post_title`, `post_content`, `post_date`, `display`, `post_position`, `post_image`) VALUES ('$user_id','$user_village','$user_city','$user_country','$post_title','$post_content',NOW(),'yes','1','$fileNewName')";
                            $query =mysqli_query($con,$insert); 
                        if($query){
                        echo" <div class='alert alert-success mt-2'>Your post complite</div>";
                        }
                        else{
                        echo"<div class='alert alert-danger mt-2'>
                        <strong>Registration failed,try again!</strong>
                        </div>";
                        }
                    }
            }else {
                echo"<div class='alert alert-danger mt-2'><strong>Your file is too big!</strong></div>";
            }
        }else {
            echo"<div class='alert alert-danger mt-2'><strong>There was an error uploading your files!</strong></div>";
        }
    }else {
        echo"<div class='alert alert-danger mt-2'>
        <strong>You cannot upload files for this type!</strong></div>";
    }

}
?>