<?php include 'header.php'; ?>
    <div id="main-content">
      <div class="container">
        <div class="row">
            <div class="col-md-8">
                <!-- post-container -->
                <div class="post-container">
                
                <?php
                include 'config.php';
                $author_id=$_GET['aid'];
                $sql="SELECT `username` FROM user WHERE `user_id`='$author_id'";
                $result=mysqli_query($conn,$sql) or die('Query Failed:Display UserName');
                $row=mysqli_fetch_assoc($result);    
                ?>

                  <h2 class="page-heading"><?php echo $row['username']; ?></h2>
                    <div class="post-content">
                    <?php
                    if (isset($_GET['page'])) {
                       $page=$_GET['page'];
                    }else {
                        $page=1;
                    }
                    $limit=3;
                    $offset=($page-1)*$limit;
                    $sql1="SELECT * FROM `post` LEFT JOIN category ON post.category=category.category_id LEFT JOIN user ON post.author=user.user_id WHERE post.author=$author_id LIMIT {$offset},{$limit}";
                    $result1=mysqli_query($conn,$sql1) or die('Query Failed:Display Post');
                    if (mysqli_num_rows($result1)>0) {
                        while($row1=mysqli_fetch_assoc($result1)){
                    ?>
                        <div class="row">
                            <div class="col-md-4">
                                <a class="post-img" href="single.php?id=<?php echo $row1['post_id']; ?>"><img src="admin/upload/<?php echo $row1['post_img']; ?>" alt=""/></a>
                            </div>
                            <div class="col-md-8">
                                <div class="inner-content clearfix">
                                    <h3><a href='single.php?id=<?php echo $row1['post_id']; ?>'><?php echo $row1['title']; ?></a></h3>
                                    <div class="post-information">
                                        <span>
                                            <i class="fa fa-tags" aria-hidden="true"></i>
                                            <a href='category.php?catid=<?php echo $row1['category_id']; ?>'><?php echo $row1['category_name']; ?></a>
                                        </span>
                                        <span>
                                            <i class="fa fa-user" aria-hidden="true"></i>
                                            <a href='author.php?aid=<?php echo $row1['user_id']; ?>'><?php echo $row1['username']; ?></a>
                                        </span>
                                        <span>
                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                            <?php echo $row1['post_date']?>
                                        </span>
                                    </div>
                                    <p class="description">
                                    <?php echo substr($row1['description'],0,200).'....'; ?>
                                    </p>
                                    <a class='read-more pull-right' href='single.php?id=<?php echo $row1['post_id']; ?>'>read more</a>
                                </div>
                            </div>
                        </div>
                        <?php
                            }
                        }
                    ?>
                    </div>
                    
                    <?php
                    $sql2="SELECT * FROM `post` WHERE `author`='$author_id'";
                    $result2=mysqli_query($conn,$sql2) or die("Query Failed: Pagination Filed");
                    if (mysqli_num_rows($result2)>0) {
                        $row2=mysqli_fetch_assoc($result2);
                        $totalRecords=mysqli_num_rows($result2);
                        $totalPages=ceil($totalRecords/$limit);
                        echo "<ul class='pagination'>";
                        if ($page>1) {
                            echo '<li><a href="author.php?aid='.$row2['author'].'&page='.($page-1).'">Prev</a></li>';
                           }
                        for ($i=1; $i<=$totalPages ; $i++) { 
                            if ($page==$i) {
                                $active="active";
                            }else {
                                $active="";
                            }
                            echo "<li class='".$active."'><a href='author.php?aid=".$row2['author']."&page=".$i."'>".$i."</a></li>";                          
                        }
                        if ($page<$totalPages) {
                            echo '<li><a href="author.php?aid='.$row2['author'].'&page='.($page+1).'">Next</a></li>';
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
