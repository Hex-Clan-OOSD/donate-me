<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
    integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous" />
  
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo URLROOT;?>./css/home_styles.css" />

  <title>HexClan</title>
</head>

<body>

<?php require APPROOT . '/views/inc/request_navbar.php';?>

  <!-- Home Section -->
  <section class="colored-section bg-light text-dark" id="Home">

  <div class="card1 card">
    <div class="card-bod">
      <div class="row">
      <div class= "col-lg-6">
      <h4><?php echo $data['date'] ?></h4>
      <h2><?php echo $data['message']?></h2>
      <h3><?php echo $data['name'] ?></h3>
      </div>
      <div class= "pic col-lg-6">
        <img class="request-pic" src="<?php echo URLROOT;?>./images/homepic.png" alt="donate">
      </div>
      </div>
    </div>
  </div>

  <div class="card text-center">
    <div class="card-header">
      <h5 class="card-title"><h3>Requests</h3></h5>
      <p class="card-text">Lorem ipsum dolor sit amet,incididunt ut labore et dolore magna aliqua. </p>
      <a href="<?php echo URLROOT ?>/requests/add" class="btn btn-primary"><i class="fa fa-pencil"></i> Create New</a>
    </div>
  </div>

    
  </section>




  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
  </script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
  </script>

</body>

</html>