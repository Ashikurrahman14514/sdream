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
    <script>
    function fileValidation(){
    var fileInput = document.getElementById('inputsm');
    var filePath = fileInput.value;
    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
    if(!allowedExtensions.exec(filePath)){
        alert('Sorry, only JPG, JPEG, PNG files are allowed.');
        fileInput.value = '';
        return false;
    }else{
        //Image preview
        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imagePreview').innerHTML = '<img src="'+e.target.result+'"/>';
            };
            reader.readAsDataURL(fileInput.files[0]);
        }
    }
}
</script>

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
             ?>&city=<?php echo $user_city;
             ?>&village=<?php echo $user_village;
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
            <?php 
              include("post_php.php");
              ?>
            <form method="POST" action="" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="inputsm">Image upload</label>
                    <input class="form-control input-sm" id="inputsm" name="image" type="file" required="1" onchange="return fileValidation()">
                </div>
                <div id="imagePreview"></div>

                <div class="form-group">
                    <label for="inputdefault">Title</label>
                    <input class="form-control" id="inputdefault" type="text" name="title" placeholder="Write a title . . . . . . "
                        maxlength="150">
                </div>
                <div class="form-group">
                    <label for="alsjdfsalf">Discription</label>
                    <textarea class="form-control" name="content" id="alsjdfsalf" rows="7" placeholder="Write discription . . . . . ."></textarea>
                </div>
                <div class="form-group">
                    <input name="upload" class="btn btn-primary pull-right" type="submit" value="Post to timeline">
                </div>



            </form>

        </div>
    </div>

    <div class="jumbotron jumbotron-fluid">

        <div class="container">
            <?php
function timeline(){
global $user_id;
    global $con;        
        $get_post = "SELECT * FROM `posts` WHERE `user_id`='$user_id' ORDER BY 1 DESC LIMIT 10";
                    $runs_post=mysqli_query($con,$get_post);
                    while($run_post=mysqli_fetch_array($runs_post)) {

                        $post_id        =$run_post['post_id'];
                        $user_id        =$run_post['user_id'];
                        $post_date      =$run_post['post_date'];
                        $post_image     =$run_post['post_image'];
                        $post_title     =$run_post['post_title'];
                        $post_content   =substr($run_post['post_content'],0,150);

                        
                    $user2="SELECT * FROM `users` WHERE id ='$user_id' AND posts='yes'";
                    $run_user=mysqli_query($con,$user2);
                    $row_user=mysqli_fetch_array($run_user);

                        $user_firstname     =$row_user['firstname'];
                        $user_lastname      =$row_user['lastname'];
                        $user_image         =$row_user['image'];


                        echo"<div class='jumbotron jumbotron-fluid pt-0 mb-2'>
                            <div class='container'>
                        <div class='post row py-4'>
                                <div class='col-3 col-sm-2 col-md-2 col-lg-1 col-xl-1'>
                                    <img src='img/$user_image' width='60' height='60'>
                                </div>
                                <div class='col-4 col-sm-7 col-md-8 col-lg-9 col-xl-9 px-0'>
                                    <h6>$user_firstname $user_lastname</h6>                     
                                    <p>$post_date</p>
                                </div>
                                <div class='col-5 col-sm-3 col-md-2 col-lg-2 col-xl-2 px-0'>
                                    <p>UID:$user_id</p>
                                    <p>PID:$post_id</p>
                                </div>
                                <p ><img src='postimg/$post_image' class='img-fluid'></p>
                                <h6 class='mx-1 my-1'><strong>$post_title</strong></h6>
                                <p class='mx-1 my-1'>$post_content</p>
                               
                            </div>
                            <div class='btn-group btn-block'>
                            
                            <a href='delete_post.php?post_id=$post_id' class='btn btn-outline-danger' role='button' aria-pressed='true'>Delete</a>   
                            <a href='single_post.php?post_id=$post_id' class='btn btn-outline-secondary' role='button' aria-pressed='true'>Comment</a>
                            <a href='single_post.php?post_id=$post_id' class='btn btn-outline-info' role='button' aria-pressed='true'>Full view</a>
                            </div>
                            </div>
                            </div>

                            ";
                            include("delete_post.php");

                    }
                }
    timeline();
    ?>
        </div>

    </div>

</body>
<script src="bootstrap4/jquery.js"></script>
<script src="bootstrap4/popper.js"></script>
<script src="bootstrap4/bootstrap4.js"></script>

</html>