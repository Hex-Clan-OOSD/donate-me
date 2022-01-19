<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="<?php echo URLROOT;?>/css/landing_styles.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
    integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous" />

  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">


  <title>HexClan</title>
  <?php require APPROOT . '/views/inc/favicon.php';?>
</head>

<body>
  <section class="colored-section bg-light text-dark">

    <div class="container">
      <div class="row row-cols-2 row-cols-lg-3 g-2 g-lg-3">
        <div class="col ">
          <div class="p-3 border detail-box1">
            <div class="row">
              <div class="col">
              <img src="https://img.icons8.com/ios-filled/50/000000/conference.png" alt="icon" />
              </div>
              <div class="col">
                <div class="title">Users</div>
                <div class="value"><?php echo $data['verified-users-count']?></div>
              </div>
            </div>
          </div>
          <br>
        </div>
        <div class="col ">
          <div class="p-3 border detail-box1">
            <div class="row">
              <div class="col">
              <img src="https://img.icons8.com/external-prettycons-solid-prettycons/60/000000/external-medical-medical-prettycons-solid-prettycons.png" alt="icon"/>
              </div>
              <div class="col">
                <div class="title">Requests</div>
                <div class="value"><?php echo $data['verified-requests-count']?></div>
              </div>
            </div>
          </div>
          <br>
        </div>
        <div class="col ">
          <div class="p-3 border detail-box1">
            <div class="row">
              <div class="col">
              <img src="https://img.icons8.com/ios-filled/50/000000/community-grants.png" alt="icon"/>
              </div>
              <div class="col">
                <div class="title">Donations</div>
                <div class="value"><?php echo $data['verified-donations-count']?></div>
              </div>
            </div>
          </div>
          <br>
        </div>
        <div class="col ">
          <div class="p-3 border detail-box2">
            <div class="row">
              <div class="col">
              <img
                  src="https://img.icons8.com/external-vitaliy-gorbachev-fill-vitaly-gorbachev/60/000000/external-people-social-media-vitaliy-gorbachev-fill-vitaly-gorbachev.png"
                  alt="icon" />
              </div>
              <div class="col">
                <div class="title">Pending Users</div>
                <div class="value"><?php echo $data['pending-users-count'] ?></div>
              </div>
            </div>
          </div>
          <br>
        </div>
        <div class="col ">
          <div class="p-3 border detail-box2">
            <div class="row">
              <div class="col">
              <img src="https://img.icons8.com/glyph-neue/64/000000/data-pending.png" alt="icon"/>
              </div>
              <div class="col">
                <div class="title">Pending Requests</div>
                <div class="value"><?php echo $data['pending-requests-count'] ?></div>
              </div>
            </div>
          </div>
          <br>
        </div>
        <div class="col ">
          <div class="p-3 border detail-box2">
            <div class="row">
              <div class="col">
              <img src="https://img.icons8.com/ios-filled/50/000000/charity.png" alt="icon"/>
              </div>
              <div class="col">
                <div class="title">Pending Donations</div>
                <div class="value"><?php echo $data['pending-donations-count']?></div>
              </div>
            </div>
          </div>
          <br>
        </div>

      </div>
    </div>
    <div class="card admin-image">
      <img class="admin-landing-img" src="<?php echo URLROOT;?>/images/admin-landing.jpg" alt="pic" />
    </div>
  </section>
</body>

</html>