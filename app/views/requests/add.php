<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous" />
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/home_styles.css" />
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/request_add_form_styles.css" />
    <title>Details</title>
    <?php require APPROOT . '/views/inc/favicon.php';?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <?php require APPROOT . '/views/inc/request_navbar.php';?>

    <div class="card" id="title">
        <h2>Details</h2>
    </div>


    <div class="card">


        <div class="allign-items-center">


            <div style="padding-right: 5%; padding-left: 5%;">
                <form action="<?php echo URLROOT;?>/requests/add" method="post">
                    <?php flash('request_added')?>
                    <?php flash('request_add_err')?>
                    <div class="form-row">
                        <div class="col">
                            <label for="title" class="formTitle">Title</label>
                            <input type="text"
                                class="form-control <?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>"
                                placeholder="Title" name="title" value="<?php echo $data['title']?>">
                            <span class="invalid-feedback"><?php echo $data['title_err']?></span>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col">
                            <label for="amount" class="formTitle">Amount</label>
                            <input type="text"
                                class="form-control <?php echo (!empty($data['amount_err'])) ? 'is-invalid' : ''; ?>"
                                placeholder="Amount or Estimated Amount" name="amount"
                                value="<?php echo $data['amount']?>">
                            <span class="invalid-feedback"><?php echo $data['amount_err']?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea
                            class="form-control rounded-0 <?php echo (!empty($data['description_err'])) ? 'is-invalid' : ''; ?>"
                            rows="10" name="description" placeholder="Description"></textarea>
                        <span class="invalid-feedback"><?php echo $data['description_err']?></span>
                    </div>
                    <form method="get" action="">Upload Evidence
                        <input type="file" name="file1" id="file1" />
                        <!-- <button type="button" id="browse" class="btn btn-primary">Upload</button> -->
                    </form>




                    <button type="button" class="btn btn-primary" data-toggle="modal"
                        data-target="#exampleModal">Submit</button>
            </div>
        </div>

        <!-- Button trigger modal -->


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
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

        <!-- <script>
            $(document).ready(function () {
                $('input[id^=file]').hide();
                $('#browse').click(function () {
                    $('input[id^=file]').click();
                })
            });
        </script> -->

        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
        </script>
</body>

</html>