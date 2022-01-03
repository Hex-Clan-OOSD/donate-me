<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
    integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous" />

  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo URLROOT;?>/css/landing_styles.css" />

  <title>HexClan</title>
  <?php require APPROOT . '/views/inc/favicon.php';?>
</head>

<body>

  <section class="colored-section bg-light text-dark">
    <div class="card card-image1">
      <img class="landing-img1" src="<?php echo URLROOT;?>../images/landing-img1.jpg" alt="pic" />
    </div>

    <div class="row">
      <div class="col-lg-6">
        <h2>For it is GIVING that we RECEIVE.!</h2>
        <br>
        <h4>Hello! </h4>
        <p>
          There are many variations of passages of Lorem Ipsum available,
          but the majority have suffered alteration in some form, by injected
          humour, or randomised words which don't look even slightly believable.
          If you are going to use a passage of Lorem Ipsum, you need to be sure
          there isn't anything embarrassing hidden in the middle of text. All the
          Lorem Ipsum generators on the Internet tend to repeat predefined chunks
          as necessary,
        </p>
        <br>
      </div>
      <div class="col-lg-6 ">
        <img class="landing-svg" src="<?php echo URLROOT;?>/images/landing_page_svg.png" alt="landing-pic">
      </div>
    </div>
    <div>
      <div>
        <div class="row">
          <div class="col-lg-6">
            <h4>Number of Requests we handled: 17 </h4>
          </div>
          <div class="col-lg-6 ">
            <h4>Amount Collected: $2973</h4>
          </div>
        </div>
      </div>
    </div>

    <div class="card requests-card">
      <div class="card-header">
      <h5 class="card-title">Recent Requests</h5>
      </div>
      <div class="card-body">
        
        <p class="card-text">Request 1</p>
        <hr>
        <p class="card-text">Request 2</p>
        <hr>
        <p class="card-text">Request 3</p>
        <hr>
        <p class="card-text">Request 4</p>
        <hr>
        <p class="card-text">Request 5</p>
        <hr>

      </div>
    </div>

    <div class="card card-image">
      <img class="landing-img2" src="<?php echo URLROOT;?>../images/landing-img2.jpg" alt="pic" />
    </div>

  </section>



  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
  </script>
</body>

</html>