<?php
include 'config.php';
$page=basename($_SERVER['PHP_SELF']);
switch ($page) {
    case "single.php":
        if(isset($_GET['id'])){
            $sql_title="SELECT * FROM `post` WHERE `post_id` = {$_GET['id']}";
            $result_title=mysqli_query($conn,$sql_title) or die("Query FAiled");
            $row_title=mysqli_fetch_assoc($result_title);
            $page_title=$row_title['title'];
        }else {
            $page_title="No Title Found";
        }
        break;
    
    case "category.php":
        if(isset($_GET['catid'])){
            $sql_title="SELECT * FROM `category` WHERE `category_id` = {$_GET['catid']}";
            $result_title=mysqli_query($conn,$sql_title) or die("Query FAiled");
            $row_title=mysqli_fetch_assoc($result_title);
            $page_title=$row_title['category_name']." News";
        }else {
            $page_title="No Title Found";
        }
        break;
    case "author.php":
        if(isset($_GET['aid'])){
            $sql_title="SELECT * FROM `user` WHERE `user_id` = {$_GET['aid']}";
            $result_title=mysqli_query($conn,$sql_title) or die("Query FAiled");
            $row_title=mysqli_fetch_assoc($result_title);
            $page_title="News By " .$row_title['first_name']. " " .$row_title['last_name'] ;
        }else {
            $page_title="No Title Found";
        }
        break;
    case "search.php":
        if(isset($_GET['search'])){
            $page_title=$_GET['search'];
        }else {
            $page_title="No Title Found";
        }
        break;
    default:
            $page_title="News_Site";
        break;                    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo $page_title; ?></title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.css">
    <!-- Custom stlylesheet -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<!-- HEADER -->
<div id="header">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
                    <?php
                        include 'config.php';
                        $sql="SELECT * FROM `settings`";
                        $result=mysqli_query($conn,$sql);
                        $row=mysqli_fetch_assoc($result);
                        $logo=$row['logo'];
                    ?>

            <!-- LOGO -->
            <div class=" col-md-offset-4 col-md-4">
                <a href="index.php" id="logo"><img src="admin/images/<?php echo $logo; ?>"></a>
            </div>
            <!-- /LOGO -->

        </div>
    </div>
</div>

<!-- /HEADER -->
<!-- Menu Bar -->

<div id="menu-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
              <?php
              include 'config.php';
              if (isset($_GET['catid'])) {
                $cat_id=$_GET['catid'];
              }else {
                $active="";
              }

              $sql="SELECT * FROM `category` WHERE `post`>0";
              $result=mysqli_query($conn,$sql) or die("Query Failed: Category");
              if(mysqli_num_rows($result)>0){
              ?>
                <ul class='menu'>
                <li><a class="" href="index.php">Home</a></li>
                  <?php while($row=mysqli_fetch_assoc($result)){
                       if (isset($_GET['catid'])) {
                            if ($row['category_id']==$cat_id) {
                                $active="active";
                            }else {
                                $active="";
                        }
                    }
                      echo '<li><a class="'.$active.'" href="category.php?catid='.$row['category_id'].'">'.$row['category_name'].'</a></li>';
                  }
                  ?>
                  <?php session_start(); 
                  
                  if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true) {
                      echo '<a href="signinForm.php" class="btn btn-success">Sign In</a>
                            <a href="signupForm.php" class="btn btn-success">Sign Up</a>';
                  }else {
                      echo '<p class="text-light" style="color:red;">Welcome : '.$_SESSION['username'].'</p>
                            <a href="signoutForm.php" class="btn btn-success">Sign Out</a>';
                  }
                  
                  ?>
                  
                    
           
                </ul>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<!-- /Menu Bar -->

