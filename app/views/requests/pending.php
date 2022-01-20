<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
    integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous" />
  
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo URLROOT;?>/css/home_styles.css" />

  <title>HexClan</title>
  <?php require APPROOT . '/views/inc/favicon.php';?>
</head>
<body>
    <?php require APPROOT . '/views/inc/admin_navbar.php';?>
    <section class="colored-section bg-light text-dark" id="Home">

      <div class="card card-image">
        <img class="verify-img" src="<?php echo URLROOT;?>/images/verification-img.jpg" alt="pic" />
      </div>
      <br>
      <h1>Pending Requests</h1>
      
      <div class="card">
        <?php foreach($data['requests'] as $request) : ?>
          <form action="<?php echo URLROOT;?>/requests/confirm/<?php echo $request->getRequestId() ?>" method="post">
            <div class="card1">
            <div>
              <div class="row">
                <div class= "col-lg-6">
                  <h3><?php echo $request->getRequestTitle();?></h3>
                  <br>
                  <h5>Rs: <?php echo $request->getTotalAmount();?></h5>
                  <p>Published by,</p>
                  
                  <h5><?php echo $request->getOwnerFullName() ?></h5>
                  <h5><?php echo $request->getOwnerPhoneNumber();?></h5>
                  <div>
                     <h5><?php echo $request->getOwnerAddress()?></h5>
                      <h5><?php echo $request->getOwnerCityTown()?></h5>
                      <h5><?php echo $request->getOwnerPostalCode()?></h5>
                      <h5><?php echo $request->getOwnerState()?></h5>
                  </div>
                </div>
                <div class= "col-lg-6">
                  <p>
                  <?php echo $request->getRequestDescription()?>
                  <img class="img-bill" src="<?php echo URLROOT;?>/upload-images/requests/<?php echo $request->getFileName();?>" alt="don-pic">
                  </p>
                </div>
              </div>
              <br>
              <div class="row">
                <div class= "col-lg-6">  
                  <button type="submit" value="decline" name="request-button" class="btn btn-danger btn-block">Decline</button>
                </div>
                <div class= "col-lg-6">
                  <button type="submit" value="confirm" name="request-button" class="btn btn-success btn-block">Verify</button>
                </div>
              </div>
            </div>
            <hr>
          </div>
          </form>
         <?php endforeach; ?>
        
       
      
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