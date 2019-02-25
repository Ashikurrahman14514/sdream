<?php 
$get_id=$_GET['post_id'];

$get_com="SELECT * FROM `comment` WHERE `post_id`='$get_id'  ORDER BY 1 DESC";

$run_com = mysqli_query($con,$get_com);

 while($row=mysqli_fetch_array($run_com)){
$com=$row['comment'];

$com_name=$row['comment_auther'];
$date=$row['date'];

echo"


<div>
<h5>$com_name</h5><span>$date</span>
<p>$com</p>
</div>
";
}

?>