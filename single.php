<?php include 'header.php'; ?>
<div id="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <?php
                $post_id=$_GET['id'];
                include 'config.php';
                $sql="SELECT * FROM `post` INNER JOIN `user` ON post.author=user.user_id INNER JOIN `category` ON post.category=category.category_id WHERE `post_id`='$post_id'";
                $result=mysqli_query($conn,$sql) or die("Query Failed");
                if(mysqli_num_rows($result)>0){
                    while($row=mysqli_fetch_assoc($result)){
                ?>


                <!-- post-container -->
                <div class="post-container">
                    <div class="post-content single-post">
                        <h3><?php echo $row['title']; ?></h3>
                        <div class="post-information">
                            <span>
                                <i class="fa fa-tags" aria-hidden="true"></i>
                                <a href='category.php?catid=<?php echo $row['category_id']; ?>'>
                                    <?php echo $row['category_name']; ?></a>
                            </span>
                            <span>
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <a
                                    href='author.php?aid=<?php echo $row['user_id']; ?>'><?php echo $row['username']; ?></a>
                            </span>
                            <span>
                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                <?php echo $row['post_date']; ?>
                            </span>
                        </div>
                        <img class="single-feature-image" src="admin/upload/<?php echo $row['post_img']; ?>" alt="" />
                        <p class="description">
                            <?php echo $row['description']; ?>
                        </p>
                    </div>
                </div>
                <?php
                        }
                    }
                ?>
                <!-- /post-container -->

                <!-- comment box start here -->
                <?php include 'comment-display.php'; ?>
                <!-- /comment box start here -->
              
                <?php
                    $noComment=false;
                    $sql1="SELECT * FROM `comments` LEFT JOIN `post` ON comments.comment_pid=post.post_id LEFT JOIN `visitor` ON comments.commentBy_vid=visitor.vid WHERE comment_pid='$post_id'";
                    $result1=mysqli_query($conn,$sql1);
                    if (mysqli_num_rows($result1)==0) {
                        $noComment=true;
                    }else {
                        while ($row1=mysqli_fetch_assoc($result1)) {
                ?>


            <!-- comment Display start here -->
                <div class="col-md-13">
                        <div class="d-flex">
                        

                        <div class="media-body">
                        <p class="fw-bold my-0"><img src="images/logo.png" alt="John Doe" class="me-3 rounded-circle"
                            style="width: 30px; height: 30px;" /><?php echo $row1['username']; ?></p>
                            <p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?php echo $row1['comment_content']; ?></p>
                        </div>
                    </div>
                </div>
            <!-- comment Display box start here -->

            <?php
            }
        }  
            ?>                

            </div>
            <?php include 'sidebar.php'; ?>
        </div>
    </div>
</div>

<?php
if ($noComment) {
   echo "<div class='d-flex jumbotron-fluid'>
   <div class='container'>
       <h2 class='display-4'>No Comments Posted Yet</h2>
       <p class='lead'>Be the first to post.</p>
   </div>
   </div>";
}
?>

<?php include 'footer.php'; ?>