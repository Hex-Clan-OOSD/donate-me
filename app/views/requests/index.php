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
  <?php require APPROOT . '/views/inc/favicon.php';?>
</head>

<body>
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

  <div class="card2 card text-center">
    <div class="card-header">
      <h5 class="card-title"><h3>Need Help!</h3></h5>
      <p class="card-text">Do you need something to do and you don't have money? Don't worry! There are so many people to help. </p>
      <a href="<?php echo URLROOT ?>/requests/add" class="btn btn-primary"><i class="fa fa-pencil"></i> Create New Request</a>
    </div>
  </div>

  <div class="card3 card">
    <div class="card-header">
      <h3>Recent Requests</h3>
    </div>
    <?php foreach($data['requests'] as $request) : ?>
    <div class="card-body">
      <blockquote class="blockquote mb-0">
        <h5><?php echo $request->title;?></h5>
        <br>
        <div class="row text-muted">
          <div class="col-lg-6">
            <h6>Total Amount: <?php echo $request->total_amount;?></h6>
          </div>
          <div class="col-lg-6">
            <h6>Amount Collected: <?php echo $request->collected_amount;?></h6>
          </div>
        </div>
        <br>
        <h6 class="text-muted"> 
        <?php echo $request->description?>
        </h6>
        <br>
        <h6 class="text-muted">Request by <?php echo $request->first_name." ".$request->last_name;?></h6>
        <a href="" class="btn btn-outline-secondary btn-sm">See more...</a>
        <hr>
        
      </blockquote>
    </div>
    <?php endforeach; ?>
    <div class="card-body text-muted text-right">
      <a href="" class="btn btn-dark">See more Requests</a>
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