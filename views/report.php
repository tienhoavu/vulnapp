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
      <h5 class="my-0 mr-md-auto font-weight-normal">Cyber Links</h5>
      <nav class="my-2 my-md-0 mr-md-3">
        <img class="rounded-circle" src="https://api.adorable.io/avatars/285/abott@adorable.png" alt=""
          style="height: 32px;">
        <a class="p-2 text-dark" href="#">Nguyen Anh Tien</a>
      </nav>
      <a class="btn btn-outline-primary" href="#">Sign out</a>
    </div>

    <main role="main" class="container">
      <div class="jumbotron">
        <h3>Do you want to report?</h3>
        <blockquote class="blockquote">
          <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
          <footer class="blockquote-footer">Nguyen Anh Tien <cite title="Source Title">@vigov5</cite></footer>
        </blockquote>
        <h4 class="mb-3">Report</h4>

        <div class="d-block my-3">
          <div class="custom-control custom-radio">
            <input id="broken" name="type" type="radio" class="custom-control-input" checked required>
            <label class="custom-control-label" for="broken">Broken Link</label>
          </div>
          <div class="custom-control custom-radio">
            <input id="content" name="type" type="radio" class="custom-control-input" required>
            <label class="custom-control-label" for="content">Inappropriate Content</label>
          </div>
          <div class="custom-control custom-radio">
            <input id="paypal" name="type" type="radio" class="custom-control-input" required>
            <label class="custom-control-label" for="paypal">Spam</label>
          </div>
        </div>
        <a class="btn btn-lg btn-warning" href="#" role="button">Report</a>
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
