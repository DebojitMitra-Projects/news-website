<?php 
                session_start();
                    include 'config.php';
                    $post_id =$_GET['postid'];
                   
                    if ($_SERVER['REQUEST_METHOD']=='POST'){ 
                        $comment=mysqli_real_escape_string($conn,$_POST['comment']);
                        $commentBy=$_SESSION['viewer_id'];
                        $sql1="INSERT INTO `comments` (`comment_content`, `comment_pid`,  `commentBy_vid`, `date`) VALUES ('$comment', '$post_id', '$commentBy', current_timestamp())";
                        $result1=mysqli_query($conn,$sql1) or die('Query Failed');
                        header('location:https://localhost/news/single.php?id='.$post_id.'');
                }

                ?>