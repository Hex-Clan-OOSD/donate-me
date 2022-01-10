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
    <?php require APPROOT . '/views/inc/admin_navbar.php';?>
    
    <section class="colored-section bg-light text-dark" id="Home">

      <div class="card card-image">
        <img class="verify-img" src="<?php echo URLROOT;?>/images/donate-img.jpg" alt="pic" />
      </div>
      <br>
      <h1>Pending Donations</h1>
      <div class="card">
        <div class="card1">
          <div>
            <div class="row">
              <div class= "col-lg-6">
                <h3>Thrishali Madhushika</h3>
                <br>
                <h6>No.118, Nilawadana Road, Homagama, </h6>
                <h6>Colombo 08</h6>
                <h6>071 92 54 679</h6>
                <br>
                <h5>Request: Request 01 </h5>
                <p>
                It is a long established fact that a reader will be distracted by the 
                readable content of a page when looking at its layout. The point of using 
                Lorem Ipsum is that it has a more-or-less normal distribution of letters, 
                as opposed
                </p>
                <h5>Donate Amount:  </h5> <p>Rs. 5000</p>
                <h5>Donate Item:  </h5> <p>-</p>
              </div>
              <div class= "col-lg-6 ">
                  <img class="img-bill" src="<?php echo URLROOT;?>../images/bill.jpg" alt="don-pic">
                  
                  <div>
                    <br>
                    <button type="button" class="btn btn-primary btn-block">Accept</button>
                    
                    <br>
                  </div>
                  <div>
                  <button type="button" class="btn btn-warning btn-block">Decline</button>
                  </div>
              </div>

            </div>
            
            
          </div>
          <hr>
        </div>
        <div class="card1">
          <div>
            <div class="row">
              <div class= "col-lg-6">
                <h3>Thrishali Madhushika</h3>
                <br>
                <h6>No.118, Nilawadana Road, Homagama, </h6>
                <h6>Colombo 08</h6>
                <h6>071 92 54 679</h6>
                <br>
                <h5>Request: Request 01 </h5>
                <p>
                It is a long established fact that a reader will be distracted by the 
                readable content of a page when looking at its layout. The point of using 
                Lorem Ipsum is that it has a more-or-less normal distribution of letters, 
                as opposed
                </p>
                <h5>Donate Amount:  </h5> <p>-</p>
                <h5>Donate Item:  </h5> <p>Grocery Items</p>
              </div>
              <div class= "col-lg-6 ">
                  <img class="img-bill" src="<?php echo URLROOT;?>../images/bill.jpg" alt="don-pic">
                  
                  <div>
                    <br>
                    <button type="button" class="btn btn-primary btn-block">Verify</button>
                    
                    <br>
                  </div>
                  <div>
                  <button type="button" class="btn btn-warning btn-block">Decline</button>
                  </div>
              </div>

            </div>
            
            
          </div>
          <hr>
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