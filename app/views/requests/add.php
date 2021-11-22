<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous" />
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>./css/home_styles.css" />
    <link rel="stylesheet" href="<?php echo URLROOT;?>./css/request_add_form_styles.css" />
    <title>Details</title>
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


                    <button class="btn btn-primary button-submit" type="submit">Submit</button>
            </div>
        </div>


        </form>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
        </script>
</body>

</html>