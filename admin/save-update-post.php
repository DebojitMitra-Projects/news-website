<?php
include 'header.php';
include "config.php";
if(empty($_FILES['new-image']['name'])){
    $file_name=$_POST['old-image']; 
}else {
    $error=array();

    $file_name=$_FILES['new-image']['name'];
    $file_size=$_FILES['new-image']['size'];
    $file_tmp=$_FILES['new-image']['tmp_name'];
    $file_type=$_FILES['new-image']['type'];
 
    $file_ext_temp=explode('.',$file_name);
    $file_ext=end($file_ext_temp);

    $extensions=array('jpg','jpeg','png');

    if (in_array($file_ext,$extensions) === false) {
        $error[]="This extension of is  not allowed, Please Choose a jpg,jpeg or png file.";
    }
    if ($file_size > 2097152) {
        $error[]="Please Upload the image of size 2mb or lower";
    }
    if (empty($error)==true) {
        move_uploaded_file($file_tmp,"upload/".$file_name);
    }else {
        print_r($error);
        die("Image Upload Failed");
    }
}
$id=mysqli_real_escape_string($conn,$_POST['post_id']);
$title=mysqli_real_escape_string($conn,$_POST['post_title']);
$description=mysqli_real_escape_string($conn,$_POST['postdesc']);
$category=mysqli_real_escape_string($conn,$_POST['category']);

$sql="UPDATE `post` SET `title`='$title',`description`='$description',`category`='$category',`post_img`='$file_name' WHERE `post_id`='$id'";
$result=mysqli_query($conn,$sql);

if ($result) {
    header('location: https://localhost/news/admin/post.php');
}
?>