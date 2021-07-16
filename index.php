<?php include 'header.php'; ?>
<?php

//included SignUp and SignIn alert after Nav Bar

if (isset($_GET['unameErr']) && ($_GET['unameErr']=='true')): ?>
    <div class="alert alert-danger" role="alert">
     <p>User Name Does Not Exists Please Sign Up to create your account</p> 
    </div>
  
<?php elseif (isset($_GET['signupSuccess']) && ($_GET['signupSuccess']=='true')): ?>
    <div class="alert alert-success" role="alert">
     <p>Account Created successfully</p>
    </div>

<?php elseif (isset($_GET['passErr']) && ($_GET['passErr']=='true')): ?>
    <div class="alert alert-warning" role="alert">
     <p>Password do not match</p> 
    </div>

<?php endif; ?>


    <div id="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">

                    <!-- post-container -->
                    <div class="post-container">

                    <?php
                    include "config.php";
                    if (isset($_GET['page'])) {
                    $page=$_GET['page'];
                    }else {
                        $page=1;
                    }
                    //offset calculations 
                    $limit=4;
                    $offset=($page-1)*$limit;
                    $sql="SELECT * FROM `post` LEFT JOIN `category` ON post.category=category.category_id LEFT JOIN `user` ON post.author=user.user_id  ORDER BY `post_id` DESC LIMIT {$offset},{$limit}";
                    $result=mysqli_query($conn,$sql) or die("Query Failed");
                    
                    if(mysqli_num_rows($result)){
                        while($row=mysqli_fetch_assoc($result)){
                     ?>

                        <div class="post-content">
                            <div class="row">
                                <div class="col-md-4">
                                    <a class="post-img" href="single.php?id=<?php echo $row['post_id']; ?>"><img src="admin/upload/<?php echo $row['post_img']; ?>" alt=""/></a>
                                </div>
                                <div class="col-md-8">
                                    <div class="inner-content clearfix">
                                        <h3><a href='single.php?id=<?php echo $row['post_id']; ?>'><?php echo $row['title']; ?></a></h3>
                                        <div class="post-information">
                                            <span>
                                                <i class="fa fa-tags" aria-hidden="true"></i>
                                                <a href='category.php?catid=<?php echo $row['category_id']; ?>'><?php echo $row['category_name']; ?></a>
                                            </span>
                                            <span>
                                                <i class="fa fa-user" aria-hidden="true"></i>
                                                <a href='author.php?aid=<?php echo $row['user_id']; ?>'><?php echo $row['username']; ?></a>
                                            </span>
                                            <span>
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                                <?php echo $row['post_date']; ?>
                                            </span>
                                        </div>
                                        <p class="description">
                                        <?php echo substr($row['description'],0,200).'....'; ?>
                                        </p>
                                        <a class='read-more pull-right' href='single.php?id=<?php echo $row['post_id']; ?>'>read more</a>
                                    </div>
                                </div>
                            </div>   
                        </div>
                        <?php
                            }
                        }else {
                            echo "<h2>No Record Found</h2>";
                        }
                        ?>
                       
                         <?php
                //Here we have calculated the pagenation to show pagenation
                    $sql1="SELECT * FROM `post`";
                    $result1=mysqli_query($conn,$sql1);
                echo "<ul class='pagination admin-pagination'>";
                    if(mysqli_num_rows($result1)>0){
                       $totalRecords=mysqli_num_rows($result1);
                       $limit=4;
                       $totalPage=ceil($totalRecords/$limit);

                       if ($page>1) {
                        echo '<li><a href="index.php?page='.($page-1).'">Prev</a></li>';
                       }
                   
                    for($i=1; $i<=$totalPage; $i++){
                        if ($i==$page) {
                           $active="active";
                        }else {
                            $active="";
                        }
                        echo "<li class='".$active."'><a href='index.php?page=".$i."'>".$i."</a></li>";
                    }
                    if ($page<$totalPage) {
                        echo '<li><a href="index.php?page='.($page+1).'">Next</a></li>';
                    }   
                        echo " </ul>";
                    }
                ?>   
                    </div><!-- /post-container -->
                </div>
                <?php include 'sidebar.php'; ?>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>
