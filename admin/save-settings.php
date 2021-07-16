<?php
include 'header.php';
include "config.php";
if(empty($_FILES['logo']['name'])){
    $file_name=$_POST['old_logo']; 
}else {
    $error=array();

    $file_name=$_FILES['logo']['name'];
    $file_size=$_FILES['logo']['size'];
    $file_tmp=$_FILES['logo']['tmp_name'];
    $file_type=$_FILES['logo']['type'];
 
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
        move_uploaded_file($file_tmp,"images/".$file_name);
    }else {
        print_r($error);
        die("Image Upload Failed");
    }
}
$site_name=mysqli_real_escape_string($conn,$_POST['website_name']);
//$newlogo=mysqli_real_escape_string($conn,$_POST['old_logo']);
$footer_desc=mysqli_real_escape_string($conn,$_POST['footer_desc']);


$sql="UPDATE `settings` SET `websitename`='$site_name',`logo`='$file_name',`footerdesc`='$footer_desc'";
$result=mysqli_query($conn,$sql);

if ($result) {
    header('location: https://localhost/news/admin/settings.php');
}
?>