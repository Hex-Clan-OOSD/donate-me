<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous" />
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/home_styles.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/add_style.css" />
    <title>Donation</title>
    <?php require APPROOT . '/views/inc/favicon.php'; ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <?php require APPROOT . '/views/inc/request_navbar.php'; ?>

    <div class="card" id="title">
        <h2>Details</h2>
        <?php flash('request_added') ?>
        <?php flash('request_add_err') ?>
    </div>

    <div class="card">
        <div>
            <div style="padding-right: 5%; padding-left: 5%;">
                <div class="form-row">
                    <h3><?php echo $data['request']->first_name.' '.$data['request']->last_name?></h3>
                </div>

                <div class="form-row">
                    <h5> Amount : Rs.</h5>
                    <h5><?php echo $data['request']->total_amount?></h5>
                </div>

                <div>
                    <h3> Description </h3>
                    <h6 style="text-align: justify;"><?php echo $data['request']->description?></h6>
                    <div class="card">
                        <img class="bill"
                            src="<?php echo URLROOT; ?>/upload-images/requests/<?php echo $data['request']->filename?>"
                            alt="pic" />
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="card">

        <div>
            <div style="padding-right: 5%; padding-left: 5%;">
                <form action="<?php echo URLROOT; ?>/donations/adddonation/<?php echo $data['request']->requestId?>"
                    method="post" enctype="multipart/form-data">
                    
                    <div class="form-row">
                        <div class="col">
                            <label for="amount" class="formTitle">Amount in Rupees</label>
                            <input type="text"
                                class="form-control <?php echo (!empty($data['amount_err'])) ? 'is-invalid' : ''; ?>"
                                placeholder="Donation Amount" name="amount" value="<?php echo $data['amount'] ?>">
                            <span class="invalid-feedback"><?php echo $data['amount_err'] ?></span>
                        </div>
                    </div>
                    <br>
                    <div>
                        <p>Upload Evidence</p>
                        <input type="file" name="evidence-image" id="evidence-image" />

                        <!-- <button type="button" id="browse" class="btn btn-primary">Upload</button> -->
                    </div>

                    <br>


                    <button type="button" class="btn btn-primary" data-toggle="modal"
                        data-target="#exampleModal">Submit</button>
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Submit Confirmation</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Do you want to submit?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button class="btn btn-primary button-submit" type="submit">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>

        <!-- Button trigger modal -->


        <!-- Modal -->


        <script>
            $(document).ready(function () {
                $('input[id^=file]').hide();
                $('#browse').click(function () {
                    $('input[id^=file]').click();
                })
            });
        </script>

        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
        </script>
</body>

</html>