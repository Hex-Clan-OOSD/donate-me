<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    
    <title>Login</title>
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
    integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn"
    crossorigin="anonymous"
  />
  <link rel="stylesheet" href="<?php echo URLROOT;?>/css/login_styles.css"/>
  </head>
  <body >
    
<form class="form-signin signin-form" method="GET" action="login.php">
  <h1 class="main-title">Donate me</h1>
  <h3 class="h4 mb-3 font-weight-normal">Sign in to Continue</h3>
  <label for="inputEmail" class="sr-only">Email</label>
  <input type="email" id="inputEmail" class="form-control" placeholder="Email" required autofocus name="email">
  <div class="spacer">

  </div>
  <label for="inputPassword" class="sr-only">Password</label>
  <input type="password" id="inputPassword" class="form-control" placeholder="Password" required name="password">
  <div class="spacer">

  </div>
  <button class="btn btn-lg btn-primary btn-block" type="submit" >Sign in</button>

</form>


<script
src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
crossorigin="anonymous"
></script>
<script
src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF"
crossorigin="anonymous"
></script>

  </body>
</html>