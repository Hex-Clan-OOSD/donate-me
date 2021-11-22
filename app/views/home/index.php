<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
    integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous" />
    <link rel="stylesheet" href="<?php echo URLROOT;?>./css/home_styles.css" />
    
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
    
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
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false">
        <i class="fa fa-user"></i>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Recent Donates</a>
          <a class="dropdown-item" href="#">Settings</a>
          <a><hr class="dropdown-divider"></a>
          <a class="dropdown-item" href="#">Logout</a>
        </div>
      </li>
          
        </ul>

      </div>
    </div>
  </nav>

  <section class="colored-section bg-light text-white" id="Home" >

    <div class="row text-dark text-center">
      <div class="col-lg-6 ">
        <h2>Requests</h2>
      
    </div>
    <div class="col-lg-6" >
    <form class="d-flex">
      
        <button class="btn btn-primary" type="submit"><i class="fa fa-pencil"></i> Create New</button>
      </form>
    </div>
    </div>
  </section>



</body>
</html>