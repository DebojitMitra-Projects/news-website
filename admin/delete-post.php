<?php
$post_id=$_GET['id'];
$post_category_id=$_GET['cat_id'];
$post_id = $_GET['id'];
include 'config.php';

$sql1="SELECT * FROM `post` WHERE `post_id`='$post_id'";
$result1=mysqli_query($conn,$sql1);
$row=mysqli_fetch_assoc($result1);

//this will delete the image file from the upload folder
unlink("upload/".$row['post_img']);


$sql = "DELETE FROM `post` WHERE `post_id`='$post_id';";
$sql .= "UPDATE `category` SET post = post - 1 WHERE `category_id` = '$post_category_id'";
$result =mysqli_multi_query($conn,$sql) or die ("Can't Delete the Record");

header('location: https://localhost/news/admin/post.php');


?>

