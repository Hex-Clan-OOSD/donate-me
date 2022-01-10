<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
    integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous" />

  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/home_styles.css" />
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/user_reg.css" />

  <title>HexClan</title>
  <?php require APPROOT . '/views/inc/favicon.php'; ?>
</head>

<body>
  <?php require APPROOT . '/views/inc/admin_navbar.php'; ?>
  <section class="colored-section bg-light text-dark" id="Home">

    <div class="card card-image">
      <img class="verify-img" src="<?php echo URLROOT; ?>/images/User_verification.jpg" alt="pic" />
    </div>
    <br>
    <h1>Pending User Verifications</h1>
    <?php for ($i=0; $i <sizeOf($data); $i+=2) {?>
    <div class="row">
      <div class="col-lg-6">
        <div class="card">
          <div class="card1">
            <form action="<?php echo URLROOT;?>/users/verifyUser/<?php echo $data[$i]->id; ?>" method="post">
              <div class="card-in">
                <div>
                  <h3><?php echo $data[$i]->first_name." ".$data[$i]->last_name;?></h3>
                  <br>
                  <h5><?php echo $data[$i]->address_line_1." ".$data[$i]->address_line_2;?></h5>
                  <h5><?php echo $data[$i]->city_town;?></h5>
                  <h5><?php echo $data[$i]->state;?></h5>
                  <h5><?php echo $data[$i]->postal_code;?></h5>
                  <h5><?php echo $data[$i]->phone_number;?></h5>
                </div>
                <br>
                <div class="row">
                  <div class="col-lg-6">
                    <button type="submit" name="accept-button" value="decline"
                      class="btn btn-danger btn-block">Decline</button>
                  </div>
                  <div class="col-lg-6">
                    <button type="submit" name="accept-button" value="confirm"
                      class="btn btn-success btn-block">Verify</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <?php if(sizeof($data)<$i+1):?>
      <div class="col-lg-6">
        <div class="card">
          <div class="card1">
            <form action="<?php echo URLROOT;?>/users/verifyUser/<?php echo $data[$i+1]->id; ?>" method="post">
            <div class="card-in">
              <div>
                <h3><?php echo $data[$i+1]->first_name." ".$data[$i]->last_name;?></h3>
                <br>
                <h5><?php echo $data[$i+1]->address_line_1." ".$data[$i]->address_line_2;?></h5>
                <h5><?php echo $data[$i+1]->city_town;?></h5>
                <h5><?php echo $data[$i+1]->state;?></h5>
                <h5><?php echo $data[$i+1]->postal_code;?></h5>
                <h5><?php echo $data[$i+1]->phone_number;?></h5>
              </div>
              <br>
              <div class="row">
                <div class="col-lg-6">
                  <button type="submit" name="accept-button" value="decline"
                    class="btn btn-danger btn-block">Decline</button>
                </div>
                <div class="col-lg-6">
                  <button type="submit" name="accept-button" value="confirm"
                    class="btn btn-success btn-block">Verify</button>
                </div>
              </div>
            </div>
            </form>
          </div>
        </div>
      </div>
      <?php else: ?>
      <?php endif; ?>

    </div>
    <?php };?>


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