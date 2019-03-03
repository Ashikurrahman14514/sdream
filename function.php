<?php
function x_user(){
if (isset($_GET['u_id'])) {
global $con;

$user_id=$_GET['u_id'];
$select="SELECT * FROM `users` WHERE `id`='$user_id'";
$run=mysqli_query($con,$select);
$row=mysqli_fetch_array($run);


$id=$row['id'];
$image=$row['image'];
$namef=$row['firstname'];
$namel=$row['lastname'];
$country=$row['country'];
$city=$row['city'];
$gender=$row['gender'];
$birthday=$row['birthday'];


echo"<div class='container'>
            <div class='span'>
                
                <img src='img/$image' width='300'>
            </div>

            <div class='span' style='margin-top:10px;''>
                <h4><strong>Name: $namef $namel</strong></h4>                <h6><strong>Country: $country<strong></h6>
                <h6><strong>City: $city<strong></h6>
                <h6><strong>Gender: $gender<strong></h6>
                <h6><strong>Birthday: $birthday<strong></h6>
            </div>
            <div class='btn-group btn-block'>
                <a href='message.php?u_id=$id' class='btn btn-primary' role='button' aria-pressed='true'>Send a message</a>
            </div>
        </div>";
}    

}
function village(){

    
    global $con;

    if(isset($_GET['country'])) {
        $country=$_GET['country'];
        $city=$_GET['city'];
        $village=$_GET['village'];
    }
                    
                
        $get_post = "SELECT * FROM `posts` WHERE `user_country`='$country' AND`user_city`='$city' AND `user_village`='$village' AND `post_position`=1 ORDER BY 1 DESC LIMIT 20";
                    $runs_post=mysqli_query($con,$get_post);

                    while($run_post=mysqli_fetch_array($runs_post)) {

                        $post_id        =$run_post['post_id'];
                        $user_id        =$run_post['user_id'];
                        $post_date      =$run_post['post_date'];
                        $post_image     =$run_post['post_image'];
                        $post_title     =$run_post['post_title'];
                        $post_content   =substr($run_post['post_content'],0,150);

                    $like="SELECT post_id, SUM(`user_like`) AS user_like,sum(`user_unlike`)AS user_unlike FROM `like` WHERE `post_id`='$post_id' GROUP BY `post_id`";

                            
                    $run_like=mysqli_query($con,$like);
                    $row_like=mysqli_fetch_array($run_like);

                        $user_like =$row_like['user_like'];
                       $user_unlike  =$row_like['user_unlike'];


                        
                    $user2="SELECT * FROM `users` WHERE id ='$user_id' AND posts='yes'";
                    $run_user=mysqli_query($con,$user2);
                    $row_user=mysqli_fetch_array($run_user);

                        $user_firstname     =$row_user['firstname'];
                        $user_lastname      =$row_user['lastname'];
                        $user_image         =$row_user['image'];


                        echo"<div class='jumbotron jumbotron-fluid mb-2 py-3'>
                                <div class='container py-0'>
                                <div class='post row'>
                                <div class='col-3 col-sm-2 col-md-2 col-lg-1 col-xl-1'>
                                    <img src='img/$user_image' width='60' height='60'>
                                </div>
                                <div>
                                    <h6><a href='x_user.php?u_id=$user_id' class='btn-outline-success px-0' aria-pressed='true'>$user_firstname $user_lastname</a></h6>                     <p>$post_date</p>
                                </div>
                                <p ><img src='postimg/$post_image' class='img-fluid'></p>
                                <h6 class='mx-1 my-0'>
                                <strong>$post_title</strong></h6>
                                <p class='mx-1 my-1'>$post_content</p>
                                <a href='single_post.php?post_id=$post_id' class='badge badge-pill badge-dark'>. . more</a> 
                            </div>
                            <hr>
                            <div class='btn-group btn-block py-0'>
                            <a href='vote.php?user_id=$user_id&post_id=$post_id' class='btn btn-outline-success px-4' role='button' aria-pressed='true'>VOTE $user_like</a>
                            <a href='vato.php?user_id=$user_id&post_id=$post_id' class='btn btn-outline-danger px-4' role='button' aria-pressed='true'>VATO $user_unlike</a>
                            <a href='single_post.php?post_id=$post_id' class='btn btn-outline-secondary' role='button' aria-pressed='true'>Comment</a>
                            </div>
                            </div>
    </div>";


                    }
                }
function fullpost(){

                    if (isset($_GET['post_id'])) {
                    global $con;
                    $get_id=$_GET['post_id'];
                    $get_post="SELECT * FROM `posts` WHERE `post_id`=$get_id";
                    $runs_post=mysqli_query($con,$get_post);

                    while($run_post=mysqli_fetch_array($runs_post)) {

                        $post_id        =$run_post['post_id'];
                        $user_id        =$run_post['user_id'];
                        $post_date      =$run_post['post_date'];
                        $post_image     =$run_post['post_image'];
                        $post_title     =$run_post['post_title'];
                        $post_content   =$run_post['post_content'];

                        
                    $user2="SELECT * FROM `users` WHERE id ='$user_id' AND posts='yes'";
                    $run_user=mysqli_query($con,$user2);
                    $row_user=mysqli_fetch_array($run_user);

                        $user_firstname     =$row_user['firstname'];
                        $user_lastname      =$row_user['lastname'];
                        $user_image         =$row_user['image'];




                        $user_com           =$_SESSION['email']; 
                        $get_com     ="SELECT * FROM `users` WHERE `email`='$user_com'";
                        $run_com            =mysqli_query($con,$get_com);
                        $row_com            =mysqli_fetch_array($run_com);
                        $user_com_id        =$row_com['id'];
                        $user_com_firstname =$row_com['firstname'];
                        $user_com_lastname  =$row_com['lastname'];
                        


                        echo"<div class='post row mb-5'>
                                <div class='col-3 col-sm-2 col-md-2 col-lg-1 col-xl-1'>
                                    <img src='img/$user_image' width='60' height='60'>
                                </div>
                                <div class='col-4 col-sm-7 col-md-8 col-lg-9 col-xl-9 px-0'>
                                    <h6><a href='x_user.php?u_id=$user_id' class='btn-outline-success px-0' aria-pressed='true'>$user_firstname $user_lastname</a></h6>                     
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
                            ";
                            include('comment.php');
                            echo" 
                                 <form action='' method='post'> 
                                  <textarea class='my-2' name='comment' id='alsjdfsalf' rows='4' cols='50' placeholder='Write your comment' required='1'></textarea>
                                  <br/>
                                  <input class='mx-2' type='submit' name='reply' value='comment'/>
                            </form>";
                            if(isset($_POST['reply'])){

                                $comment =$_POST['comment'];
                                $insurt="INSERT INTO `comment`(`post_id`,`user_id`,`comment`,`comment_auther`,`date`) VALUES ('$get_id','$user_com_id','$comment','$user_firstname $user_lastname',NOW())";
                                $run=mysqli_query($con,$insurt);
                                echo'You reply was added !';
                            }
                            

                    }
                }
            }
function timeline(){

    global $con;

    if(isset($_GET['u_id'])) {
        $u_id=$_GET['u_id'];

    }
                    
                
        $get_post = "SELECT * FROM `posts` WHERE `user_id`='$u_id' ORDER BY 1 DESC LIMIT 10";
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
                                <a href='single_post.php?post_id=$post_id' class='badge badge-pill badge-dark'>. . more</a>
                               
                            </div>
                            <div class='btn-group btn-block'>
                            
                            <a href='delete_post.php?post_id=$post_id' class='btn btn-outline-info' role='button' aria-pressed='true'>Delete</a>
                            
                            <a href='single_post.php?post_id=$post_id' class='btn btn-outline-secondary' role='button' aria-pressed='true'>Comment</a>
                            </div>
                            </div>
                            </div>

                            ";
                            include("delete_post.php");

                    }
                }

function home(){

    
    global $con;

    if(isset($_GET['country'])) {
        $country=$_GET['country'];
    }
                    
                
        $get_post = "SELECT * FROM `posts` WHERE `user_country`='$country' AND `post_position`=1 ORDER BY 1 DESC LIMIT 20";
                    $runs_post=mysqli_query($con,$get_post);

                    while($run_post=mysqli_fetch_array($runs_post)) {

                        $post_id        =$run_post['post_id'];
                        $user_id        =$run_post['user_id'];
                        $post_date      =$run_post['post_date'];
                        $post_image     =$run_post['post_image'];
                        $post_title     =$run_post['post_title'];
                        $post_content   =substr($run_post['post_content'],0,150);

                        $like="SELECT post_id, SUM(`user_like`) AS user_like,sum(`user_unlike`)AS user_unlike FROM `like` WHERE `post_id`='$post_id' GROUP BY `post_id`";

                            
                    $run_like=mysqli_query($con,$like);
                    $row_like=mysqli_fetch_array($run_like);

                        $user_like =$row_like['user_like'];
                        $user_unlike      =$row_like['user_unlike'];


                        
                    $user2="SELECT * FROM `users` WHERE id ='$user_id' AND posts='yes'";
                    $run_user=mysqli_query($con,$user2);
                    $row_user=mysqli_fetch_array($run_user);

                        $user_firstname     =$row_user['firstname'];
                        $user_lastname      =$row_user['lastname'];
                        $user_image         =$row_user['image'];


                        echo"<div class='jumbotron jumbotron-fluid mb-2 py-3'>
                                <div class='container py-0'>
                                <div class='post row'>
                                <div class='col-3 col-sm-2 col-md-2 col-lg-1 col-xl-1'>
                                    <img src='img/$user_image' width='60' height='60'>
                                </div>
                                <div>
                                    <h6><a href='x_user.php?u_id=$user_id' class='btn-outline-success px-0' aria-pressed='true'>$user_firstname $user_lastname</a></h6>                     <p>$post_date</p>
                                </div>
                                <p ><img src='postimg/$post_image' class='img-fluid'></p>
                                <h6 class='mx-1 my-0'>
                                <strong>$post_title</strong></h6>
                                <p class='mx-1 my-1'>$post_content</p>
                                <a href='single_post.php?post_id=$post_id' class='badge badge-pill badge-dark'>. . more</a> 
                            </div>
                            <hr>
                            <div class='btn-group btn-block py-0'>
                            <a href='vote.php?user_id=$user_id&post_id=$post_id' class='btn btn-outline-success px-4' role='button' aria-pressed='true'>VOTE $user_like</a>
                            <a href='vato.php?user_id=$user_id&post_id=$post_id' class='btn btn-outline-danger px-4' role='button' aria-pressed='true'>VATO $user_unlike</a>
                            <a href='single_post.php?post_id=$post_id' class='btn btn-outline-secondary' role='button' aria-pressed='true'>Comment</a>
                            </div>
                            </div>
    </div>";

                    }
                }


function city(){

    global $con;

    if(isset($_GET['country'])) {
        $country=$_GET['country'];
        $city=$_GET['city'];
    }
                    
                
        $get_post = "SELECT * FROM `posts` WHERE `user_country`='$country' AND`user_city`='$city' AND `post_position`=1 ORDER BY 1 DESC LIMIT 20";
                    $runs_post=mysqli_query($con,$get_post);

                    while($run_post=mysqli_fetch_array($runs_post)) {

                        $post_id       =$run_post['post_id'];
                        $user_id        =$run_post['user_id'];
                        $post_date      =$run_post['post_date'];
                        $post_image     =$run_post['post_image'];
                        $post_title     =$run_post['post_title'];
                        $post_content   =substr($run_post['post_content'],0,150);

                        $like="SELECT post_id, SUM(`user_like`) AS user_like,sum(`user_unlike`)AS user_unlike FROM `like` WHERE `post_id`='$post_id' GROUP BY `post_id`";
        
                        $run_like=mysqli_query($con,$like);
                        $row_like=mysqli_fetch_array($run_like);

                        $user_like        =$row_like['user_like'];
                        $user_unlike      =$row_like['user_unlike'];
  position();
                        $user2="SELECT * FROM `users` WHERE id ='$user_id' AND posts='yes'";
                        $run_user=mysqli_query($con,$user2);
                        $row_user=mysqli_fetch_array($run_user);

                        $user_firstname     =$row_user['firstname'];
                        $user_lastname      =$row_user['lastname'];
                        $user_image         =$row_user['image'];

                        echo"<div class='jumbotron jumbotron-fluid mb-2 py-3'>
                            <div class='container py-0'>
                            <div class='post row'>
                            <div class='col-3 col-sm-2 col-md-2 col-lg-1 col-xl-1'>
                                <img src='img/$user_image' width='60' height='60'>
                            </div>
                            <div>
                                <h6><a href='x_user.php?u_id=$user_id' class='btn-outline-success px-0' aria-pressed='true'>$user_firstname $user_lastname</a></h6>                     <p>$post_date</p>
                            </div>
                            <p ><img src='postimg/$post_image' class='img-fluid'></p>
                            <h6 class='mx-1 my-0'>
                            <strong>$post_title</strong></h6>
                            <p class='mx-1 my-1'>$post_content</p>
                            <a href='single_post.php?post_id=$post_id' class='badge badge-pill badge-dark'>. . more</a> 
                            </div>
                            <hr>
                            <div class='btn-group btn-block py-0'>
                            <a href='vote.php?user_id=$user_id&post_id=$post_id' class='btn btn-outline-success px-4' role='button' aria-pressed='true'>VOTE $user_like</a>
                            <a href='vato.php?user_id=$user_id&post_id=$post_id' class='btn btn-outline-danger px-4' role='button' aria-pressed='true'>VATO $user_unlike</a>
                            <a href='single_post.php?post_id=$post_id' class='btn btn-outline-secondary' role='button' aria-pressed='true'>Comment</a>
                            </div>
                            </div>
                            </div>";
                    }
                }


include('vote.php');
function position(){
    global $con;
    global $post_id;
    $post_position="SELECT post_id, SUM(`user_like`) AS user_like,sum(`user_unlike`)AS user_unlike FROM `like` WHERE `post_id`='102' GROUP BY `post_id`";

     $runs_post_position =mysqli_query($con,$post_position);

    $run_post_position  =mysqli_fetch_array($runs_post_position);

        $user_likes        =$run_post_position['user_like']; 
        $user_unlikes        =$run_post_position['user_unlike'];
        if ($user_likes<=10 AND $user_unlikes>=5) {
            $position_change="UPDATE `posts` SET `post_position`= 2 WHERE `post_id`='$post_id'";

                $run_position =mysqli_query($con,$position_change);
        } elseif ($user_likes>=50 AND $user_unlikes<=20) {
            $position_change="UPDATE `posts` SET `post_position`= 2 WHERE `post_id`='$post_id'";

                $run_position =mysqli_query($con,$position_change);
        } elseif ($user_likes>=100 AND $user_unlikes>=40) {
            $position_change="UPDATE `posts` SET `post_position`= 3 WHERE `post_id`='$post_id'";
            
            $run_position =mysqli_query($con,$position_change);
        }
    }   

?>