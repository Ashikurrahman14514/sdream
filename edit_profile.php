<?php
session_start();
include("includes/db_connection.php");
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
             ?>"><i class="fa fa-home fa-lg" aria-hidden="true"></i></a></li>
             <li style='list-style: none;'><a style="color:white;" href="city.php?country=<?php echo $user_country;
             ?>&city=<?php echo $user_city;
             ?>"><i class="fa fa-building fa-lg"></i></a></li>
            <li style='list-style: none;'><a style="color:white;" href="village.php?country=<?php echo $user_country;
             ?>&city=<?php echo $user_city;
             ?>&village=<?php echo $user_village;
             ?>"><i  class="fa fa-child fa-lg"></i></a></li>
             <li style='list-style: none;'><a style="color:white;" href="my_message.php?"<i  class="fa fa-envelope fa-lg"></i></a></li>
            <li style='list-style: none;'><a style="color:white;" href="profile.php"><i class="fa fa-address-book fa-lg	"
            aria-hidden="true"></i></a></li>
        </div>
    </nav>

<div class="jumbotron jumbotron-fluid">
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
            $user_password    =$row['password'];
            $user_country     =$row['country'];
            $user_city        =$row['city'];
            $user_village     =$row['village'];
            $user_gender      =$row['gender'];
            $user_birthday    =$row['birthday'];
            $user_last_login  =$row['last_login'];
            $user_reg_date    =$row['reg_date'];

            ?>

        <div class="jumbotron ">
            <h1>Edit Profile</h1>
            <hr/>
            <form action="#" method="post" enctype="multipart/form-data">
                <fieldset>
                    <!-- Your profile photo -->
                    <div>
                        <label for="photo">Your profile photo</label>
                        <input class="p-1 border border-info" type="file" required="required" name="photo" id="photo" />
                    </div>
                    <!-- Your first name -->
                    <div>
                        <label for="first_name">Your first name :</label>
                        <input class="my-2 ml-2 " type="text" name="first_name" id="first_name" required="required" value="<?php echo $user_firstname?>"/>
                    </div>
                    <!-- Your last name -->
                    <div>
                        <label for="last_name">Your last name :</label>
                        <input class="ml-2 my-2" type="text" name="last_name" id="last_name" required="required" value="<?php echo $user_lastname?>"/>
                    </div>
                    <!--password-->
                    <div>
                        <label for="new_password">New Password :</label>
                        <input class="ml-2 my-2" type="text" name="new_password" id="new_password" required="required" value="<?php echo $user_password?>"/>
                    </div>
                     <!-- city -->
                    <div>
                        <label class="" for="city_name">New City :</label>
                        <input class="ml-5 my-2" type="text" name="city_name" id="city_name" required="required" value="<?php echo $user_city?>"/>
                    </div>
                    <!--village name-->
                    <div>
                        <label class="" for="village_name">New Village :</label>
                        <input class="ml-4 my-2" type="text" name="village_name" id="village_name" required="required" value="<?php echo $user_village?>"/>
                    </div>
                   
                    <!--birthday-->
                    <div>
                        <label for="new_birthday">Your Birthday :</label>
                        <input class="ml-3 my-2" type="date" name="new_birthday" id="new_birthday" required="required" value="<?php echo $user_birthday?>"/>
                    </div>
                        <!-- Gender -->
                    <div>
                        <label  for="edit_gender">Your Gender :</label>
                        <select class="ml-4 my-2" name="edit_gender" id="edit_gender">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        
                        </select>
                    </div>
                    <div>
                        <input class="btn btn-info ml-5 my-2 " id="submit" name="update" type="submit" value="Update" />
                    </div>
                </fieldset>
            </form>
            
                <?php 
                if (isset($_POST["update"])) {
                $edit_first_name =$_POST["first_name"];
                $edit_last_name =$_POST["last_name"];
                $new_password =$_POST["new_password"];
                $edit_city_name =$_POST["city_name"];
                $edit_village_name =$_POST["village_name"];
                $edit_new_birthday =$_POST["new_birthday"];
                $edit_gender =$_POST["edit_gender"];




                $edit_image =$_FILES["photo"]["name"];
                $edit_image_tmp=$_FILES["photo"]["tmp_name"];
                $edit_size=$_FILES["photo"]["size"];
                $edit_error=$_FILES["photo"]["error"];
                $edit_type=$_FILES["photo"]["type"];
                $fileExt2 = explode('.',$edit_image);
                $fileActualExt2 = strtolower(end($fileExt2));
                $allowed2 = array('jpg','jpeg','png','pdf');

     if (in_array($fileActualExt2,$allowed2)) {
        if ($edit_error === 0) {
            if ($edit_size < 5000000) {
                $fileNewName2 =uniqid('',true).".".$fileActualExt2;
                move_uploaded_file($edit_image_tmp,"img/$fileNewName2");

                
                $update =" UPDATE `users` SET `firstname`='$edit_first_name',`lastname`='$edit_last_name',`password`='$new_password',`city`='$edit_city_name',`village`='$edit_village_name',`birthday`='$edit_new_birthday',`gender`='$edit_gender',`image`='$fileNewName2' WHERE `id`='$user_id'";

                $run_edit =mysqli_query($con,$update);
                
                    if ($run_edit){
                        echo"<script>alert('Your Profile Updated !')</script>";
                        echo"<script>window.open('profile.php','_self')</script>";
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
        </div>
    </div>
</div>

</body>
<script src="bootstrap4/jquery.js"></script>
<script src="bootstrap4/popper.js"></script>
<script src="bootstrap4/bootstrap4.js"></script>

</html>