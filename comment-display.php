<?php 
    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true) {
        echo "<div class='d-flex jumbotron-fluid'>
        <div class='container'>
            <h1 class='display-4'>Please Sign in to Comment</h1>
            <p class='lead'>Or Sign Up to Create Your account</p>
        </div>
        </div>";
}else {
        echo'<div class="col-md-13">
        <h1 class="py-2 ">Post Your Comment Here</h1>
    
        <form action="save-comment.php?postid='.$post_id.'" method="POST">
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Type Your Comment</label>
                <textarea class="form-control" name="comment" id="comment" rows="3"
                    style="margin-top: 0px; margin-bottom: 0px; height: 80px; width: 700px;"></textarea>
                <input type="hidden" name="commentid" value="">
            </div>
            <button type="submit" class="btn btn-success my-2">Post Comment</button>
        </form>
    </div>';
    }

?>
