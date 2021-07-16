<?php
session_start();
//Condition is set for normal user they cannot delete if role is 0 i.e. Normal User
if($_SESSION['user_role']==0){
    header('location: https://localhost/news/admin/post.php');
}
?>

<?php
if (isset($_GET['id'])) {
    $category_id=$_GET['id'];
    include 'config.php';
    $sql="DELETE FROM `category` WHERE `category_id`='$category_id'";
    $result=mysqli_query($conn,$sql) or die("Can't Delete The Record");
    header('location: https://localhost/news/admin/category.php');
}



?>