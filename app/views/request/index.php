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

  <nav class="nav navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="" alt="" width="30" height="24" class="d-inline-block align-text-top">
        DONATE ME
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="">Donates</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href=""><i class="fa fa-bell"></i></a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
              data-toggle="dropdown" aria-expanded="false">
              <i class="fa fa-user"><?php echo $_SESSION['first_name']?></i>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="#">Recent Donates</a>
              <a class="dropdown-item" href="#">Settings</a>
              <a>
                <hr class="dropdown-divider"></a>
              <a class="dropdown-item" href="<?php echo URLROOT ?>/users/signout">Logout</a>
            </div>
          </li>

        </ul>

      </div>
    </div>
  </nav>

  <!-- Home Section -->
  <section class="colored-section bg-light text-dark" id="Home">

  <div class="card1 card">
    <div class="card-bod">
      <div class="row">
      <div class= "col-lg-6">
      <h3>Monday, 22nd November 2021,</h3>
      <h2>Good Morning!</h2>
      <h2>Chamod</h2>
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
      <a href="#" class="btn btn-primary"><i class="fa fa-pencil"></i> Create New</a>
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