<?php 



?>


<!doctype html>
<html lang="en">

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- <meta http-equiv="Content-Security-Policy"
      content="default-src *; style-src 'self' 'unsafe-inline'; script-src 'self' 'unsafe-inline' 'unsafe-eval'; img-src 'self' data:"> -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Cyber Links</title>
  </head>
  <body>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
      <h5 class="my-0 mr-md-auto font-weight-normal"><a style="color:#212529;" href="/vulnapp/home">Cyber Links</a></h5>
      <nav class="my-2 my-md-0 mr-md-3">
        <img class="rounded-circle" <?php if($_SESSION['avatar']==NULL){ ?> src="https://api.adorable.io/avatars/285/abott@adorable.png" <?php }else{ ?> src="/vulnapp/public/images/<?=$_SESSION['avatar']?>" <?php } ?> alt=""
          style="height: 32px; width: 32px;">
        <a class="p-2 text-dark" href="/vulnapp/profile/<?=$_SESSION['username']?>"><?=$_SESSION['name']?></a>
      </nav>
      <a class="btn btn-outline-primary" href="/vulnapp/signout">Sign out</a>
    </div>

    <main role="main" class="container">
      <form method="post" class="mt-2 mt-md-0">
        <input name="post_content" maxlength="150" class="form-control mr-sm-2" type="text" placeholder="New link..." aria-label="Search">
        <button name="share" class="btn btn-success my-2" type="submit">Post</button>
        <select name="post_status" id="inputGroupSelect01">
          <option value="public">Public</option>
          <option value="private">Private</option>
        </select>
      </form>
      <div class="my-3 p-3 bg-white rounded shadow-sm">
        <h6 class="border-bottom border-gray pb-2 mb-0">Recent links</h6>
        <!-- <div class="media text-muted pt-3">
          <img class="rounded-circle mr-2" src="https://api.adorable.io/avatars/285/abott@adorable.png" alt=""
            style="height: 32px;">
          <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <span class="d-block text-gray-dark"><strong><a style="color:#6c757d;" href="#">Nguyen Anh Tien</a></strong><span>&nbsp;@userA</span></span>
            Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris
            condimentum nibh, ut fermentum massa justo sit amet risus.
          </p>
          <small class="ml-2">
            <a href="#">12 Likes</a>
            <br>
            <a href="#" class="text-muted">Report</a>
          </small>
        </div> -->
        <?php require_once("home_posts/posts.php"); ?>
      <!--   <div class="media text-muted pt-3">
          <img class="rounded-circle mr-2" src="https://api.adorable.io/avatars/285/deptrai@adorable.png" alt=""
            style="height: 32px;">
          <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <span class="d-block text-gray-dark"><strong><a style="color:#6c757d;" href="#">Nguyen Anh Tien</a></strong><span>&nbsp;@userA</span></span>
            Private link! Only followers can see.
          </p>
          <small class="ml-2">
            <a href="#">12 Likes</a>
            <br>
            <a href="#" class="text-muted">Report</a>
          </small>
        </div> -->
        <!-- <div class="media text-muted pt-3">
          <img class="rounded-circle mr-2" src="https://api.adorable.io/avatars/285/khanhact@adorable.png" alt=""
            style="height: 32px;">
          <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <span class="d-block text-gray-dark"><strong><a style="color:#6c757d;" href="#">Nguyen Anh Tien</a></strong><span>&nbsp;@userA</span></span>
            Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris
            condimentum nibh, ut fermentum massa justo sit amet risus.
          </p>
          <small class="ml-2">
            <a href="#">12 Likes</a>
            <br>
            <a href="#" class="text-muted">Report</a>
          </small>
        </div> -->
        <small class="d-block text-right mt-3">
          <a href="#">All links</a>
        </small>
      </div>
    </main>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
      crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
      crossorigin="anonymous"></script>
  </body>

</html>
