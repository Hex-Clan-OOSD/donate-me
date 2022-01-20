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
        <img class="verify-img" src="<?php echo URLROOT;?>/images/donate-img.jpg" alt="pic" />
      </div>
      <br>
      <h1>Pending Donations</h1>
      <div class="card">
        <?php foreach($data as $donation) : ?>
          <form action="<?php echo URLROOT;?>/donations/confirmdonation/<?php echo $donation->donationId?>" method="post">
          <div class="card1">
              <div>
                <div class="row">
                  <div class= "col-lg-6">
                    <h3><?php echo $donation->first_name.' '?><?php echo $donation->last_name ?></h3>
                    <br>
                    <h6><?php echo $donation->address_line_1 ?>, </h6>
                    <h6><?php echo $donation->address_line_2 ?></h6>
                    <h6><?php echo $donation->city_town ?></h6>
                    <h6><?php echo $donation->state ?></h6>
                    <h6><?php echo $donation->phone_number?></h6>
                    <br>
                    <h5>Request: Request <?php echo $donation->donationId ?> </h5>
                    <p>
                    <?php echo $donation->description ?> 
                    </p>
                    <h5>Donate Amount:  </h5> <p>Rs. <?php echo $donation->amount ?> </p>
                   
                  </div>
                  <div class= "col-lg-6 ">
              
                      <img class="img-bill" src="<?php echo URLROOT;?>/upload-images/donations/<?php echo $donation->donationFileName?>" alt="don-pic">
                      
                      <div>
                        <br>
                        <button type="submit" name="donation-button" value="accept" class="btn btn-primary btn-block">Accept</button>
                        
                        <br>
                      </div>
                      <div>
                      <button type="submit" name="donation-button" value="reject" class="btn btn-warning btn-block">Decline</button>
                      </div>
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