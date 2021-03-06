<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
    integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous" />
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
  <title>HexClan</title>
  <?php require APPROOT . '/views/inc/favicon.php';?>
  <link rel="stylesheet" href="<?php echo URLROOT;?>/css/login_styles.css" />
</head>

<body class="hero-image">
<?php require APPROOT . '/views/inc/land_navbar.php';?>

<div class="card title">
  <div>
    <?php flash('not_sign_in')?>
    <h2 class="text-center">Sign in</h2>
  </div>
</div>

<div class="card">
  <div class="form">
    <form action="<?php echo URLROOT;?>/users/signin" method="post">

      <div class="form-row">
        <div class="col">
          <label for="email" class="formTitle">Email</label>
          <input type="text" class="form-control <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>"
            placeholder="xyz@abc.com" name="email"
            value="<?php echo $data['email']?>">
          <span class="invalid-feedback"><?php echo $data['email_err']?></span>
        </div>
      </div>
      <div class="form-row" style="padding-top: 10px;">
        <div class="col">
          <label for="password" class="formTitle">Password </label>
          <input type="password" class="form-control <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>"
            placeholder="******" name="password" 
            value="<?php echo $data['password']?>">
          <span class="invalid-feedback"><?php echo $data['password_err']?></span>
        </div>

      </div>
      <button class="btn btn-lg btn-success btn-block" type="submit" style="margin-top: 20px;">Sign in</button>
    </form>
  </div>
</div>



  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
  </script>
</body>

</html>