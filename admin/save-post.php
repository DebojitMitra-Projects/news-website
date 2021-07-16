<?php
include 'config.php';
if(isset($_FILES['fileToUpload'])){

    $error=array();
    $file_name=$_FILES['fileToUpload']['name'];
    $file_size=$_FILES['fileToUpload']['size'];
    $file_tmp=$_FILES['fileToUpload']['tmp_name'];
    $file_type=$_FILES['fileToUpload']['type'];
    
    /*Here we had to use two variable i.e $file_ext_temp and $file_ext because The problem is, that end function requires a reference, because it modifies the internal representation of the array (i.e. it makes the current element pointer point to the last element)*/
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

session_start();
$title=mysqli_real_escape_string($conn,$_POST['post_title']);
$description=mysqli_real_escape_string($conn,$_POST['postdesc']);
$category=mysqli_real_escape_string($conn,$_POST['category']);
$date=date("d M, y");
$author=$_SESSION['user_id'];

$sql = "INSERT INTO `post`(`title`,`description`,`category`,`post_date`,`author`,`post_img`) VALUES ('$title','$description','$category','$date','$author','$file_name');";
$sql .= "UPDATE `category` SET post = post + 1 WHERE `category_id` = '$category'";
$result = mysqli_multi_query($conn, $sql);
if ($result) {
    header('location: https://localhost/news/admin/post.php');
}else {
    die("Query failed");
}


?>