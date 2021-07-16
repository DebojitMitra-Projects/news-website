<?php
session_start();
//Condition is set for normal user they cannot delete if role is 0 i.e. Normal User
if($_SESSION['user_role']==0){
    header('location: https://localhost/news/admin/post.php');
}
?>

<?php
$user_id = $_GET['id'];
include 'config.php';

$sql = "DELETE FROM `user` WHERE `user_id`='$user_id'";
$result =mysqli_query($conn,$sql) or die ("Can't Delete the Record");

header('location: https://localhost/news/admin/users.php');


?>