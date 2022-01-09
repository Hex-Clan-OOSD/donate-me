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
    <section class="colored-section bg-light text-dark">
        <div class="row">
            <div class="col-lg-6">
                <h1>My requests</h1>
                <hr class="myreq">
            </div>
            <div class="col-lg-6">
                <img class="myrequest-svg" src="<?php echo URLROOT;?>/images/myrequest.png" alt="req-svg">
            </div>
        </div>
        <div class="card1 card card-header">
            <div class="card-bod">
                <div class="row">
                    <div class="col-lg-6">
                        <h4 class="card-title">1. Request 01</h4>
                        <p>
                            Lorem Ipsum is simply dummy text of the printing
                            and typesetting industry. Lorem Ipsum has been the
                            industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and scrambled
                            it to make a type specimen book.
                        </p>
                        <button type="button" class="btn btn-dark">Edit </button>
                        <button type="button" class="btn btn-warning">Close</button>
                    </div>
                    <div class="myreq-detail col-lg-6">
                        <h6>Amount collected: $450</h6>
                        <br>
                        <h5>Donator's list: </h5>
                        <div class="don-list">
                            <p>Kamal Neel : $100</p>
                            <p>Madushan : $50</p>
                            <p>Aruni : $225</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card1 card card-header">
            <div class="card-bod">
                <div class="row">
                    <div class="col-lg-6">
                        <h4 class="card-title">2. Request 02</h4>
                        <p>
                            Lorem Ipsum is simply dummy text of the printing
                            and typesetting industry. Lorem Ipsum has been the
                            industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and scrambled
                            it to make a type specimen book.
                        </p>
                        <button type="button" class="btn btn-dark">Edit </button>
                        <button type="button" class="btn btn-warning">Close</button>
                    </div>
                    <div class="myreq-detail col-lg-6">
                        <h6>Amount collected: $450</h6>
                        <br>
                        <h5>Donator's list: </h5>
                        <div class="don-list">
                            <p>Kamal Neel : $100</p>
                            <p>Madushan : $50</p>
                            <p>Aruni : $225</p>
                        </div>


                    </div>
                </div>
            </div>
        </div>


    </section>



</body>

</html>