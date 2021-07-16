<?php include 'header.php'; ?>
    <div id="main-content">
      <div class="container">
        <div class="row">
            <div class="col-md-8">
                <?php
                include 'config.php';
                if(isset($_GET['search'])){
                $search_term=mysqli_real_escape_string($conn,$_GET['search']);
                ?>

                <h2 class="page-heading">Search Results: <?php echo $search_term; ?></h2>
                
                
                <!-- post-container -->
                <div class="post-container">
                  
                <?php
               if (isset($_GET['page'])) {
                   $page=$_GET['page'];
               }else {
                   $page=1;
               }
               //offset calculation
                $limit=3;
                $offset=($page-1)*$limit;
                $sql="SELECT * FROM `post` LEFT JOIN `user` ON post.author=user.user_id LEFT JOIN `category` ON post.category=category.category_id WHERE post.title LIKE '%{$search_term}%' OR post.description LIKE '%{$search_term}%' LIMIT {$offset},{$limit}";
                $result = mysqli_query($conn,$sql) or die("Query Failed");
                if (mysqli_num_rows($result)>0){ 
                    while($row=mysqli_fetch_assoc($result)){
                ?>

                    <div class="post-content">
                        <div class="row">
                            <div class="col-md-4">
                                <a class="post-img" href="single.php"><img src="admin/upload/<?php echo $row['post_img']; ?>" alt=""/></a>
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
                                    <a class='read-more pull-right' href='single.php'>read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php 
                        } 
                    }else {
                        echo "<h2>No Result Found.</h2>";
                    }  
                    }
                    ?>
                    <ul class='pagination'>
                    <?php
                     $sql1="SELECT * FROM `post` LEFT JOIN `user` ON post.author=user.user_id LEFT JOIN `category` ON post.category=category.category_id WHERE post.title LIKE '%{$search_term}%' OR post.description LIKE '%{$search_term}%'";
                     $result1 = mysqli_query($conn,$sql1) or die("Query Failed");
                     $totalRecords=mysqli_num_rows($result1);
                     $limit=3;
                     $totalPages=ceil($totalRecords/$limit);
                     if ($page>1) {
                        echo '<li><a href="search.php?search='.$search_term.'&page='.($page-1).'">Prev</a></li>';
                       }
                     for ($i=1; $i<=$totalPages ; $i++) {
                        if ($i==$page) {
                            $active="active";
                         }else {
                             $active="";
                         } 
                         echo '<li class="'.$active.'"><a href="search.php?search='.$search_term.'&page='.$i.'">'.$i.'</a></li>';
                     }
                     if ($page<$totalPages) {
                        echo '<li><a href="search.php?search='.$search_term.'&page='.($page+1).'">Next</a></li>';
                    } 
                    
                    ?>
                    </ul>
                </div><!-- /post-container -->
           
            </div>
            <?php include 'sidebar.php'; ?>
        </div>
      </div>
    </div>
<?php include 'footer.php'; ?>
