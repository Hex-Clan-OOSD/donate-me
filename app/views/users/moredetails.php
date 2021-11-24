<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous" />
    <title>HexClan</title>
    
    <link rel="stylesheet" href="<?php echo URLROOT;?>./css/more_details_styles.css"/>
    <?php require APPROOT . '/views/inc/favicon.php';?>
</head>

<body class="hero-image">
    <?php require APPROOT . '/views/inc/land_navbar.php';?>

    <div style="padding-left: 15%; padding-top:50px; width:40%;margin-bottom:20px;">
        <h2 class="text-left">Add Other Details</h2>
    </div>

    <div style="margin-right: 3%; padding-left: 15%; width: 35%;" >
        <form action="<?php echo URLROOT;?>/users/moredetails" method="post">
            <div class="form-row">
                <div class="col">
                    <label for="phone_number" class="formTitle">Phone number</label>
                    <input type="text"
                        class="form-control <?php echo (!empty($data['phone_number_err'])) ? 'is-invalid' : ''; ?>"
                        placeholder="Phone Number" name="phone_number" value="<?php echo $data['phone_number']?>">
                    <span class="invalid-feedback"><?php echo $data['phone_number_err']?></span>
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <label for="address_line_1" class="formTitle">Address Line 1</label>
                    <input type="text"
                        class="form-control <?php echo (!empty($data['address_line_1_err'])) ? 'is-invalid' : ''; ?>"
                        placeholder="Address Line 1" name="address_line_1" value="<?php echo $data['address_line_1']?>">
                    <span class="invalid-feedback"><?php echo $data['address_line_1_err']?></span>
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <label for="address_line_2" class="formTitle">Address Line 2</label>
                    <input type="text"
                        class="form-control <?php echo (!empty($data['address_line_2_err'])) ? 'is-invalid' : ''; ?>"
                        placeholder="Address line 2" name="address_line_2" <?php echo (!empty($data['email_err']))?'is_invalid':''?>
                        value="<?php echo $data['address_line_2']?>">
                    <span class="invalid-feedback"><?php echo $data['address_line_2_err']?></span>
                </div>
            </div>
            <div class="form-row">
                <div class="col-7">
                    <label for="city_town" class="formTitle">City or Town</label>
                    <input type="text"
                        class="form-control <?php echo (!empty($data['city_town_err'])) ? 'is-invalid' : ''; ?>"
                        placeholder="City or Town" name="city_town"
                        <?php echo (!empty($data['city_town_err']))?'is_invalid':''?>
                        value="<?php echo $data['city_town']?>">
                    <span class="invalid-feedback"><?php echo $data['city_town_err']?></span>
                </div>
                <div class="col">
                    <label for="postal_code" class="formTitle">Postal Code</label>
                    <input type="text"
                        class="form-control <?php echo (!empty($data['postal_code_err'])) ? 'is-invalid' : ''; ?>"
                        placeholder="Postal Code" name="postal_code"
                        <?php echo (!empty($data['postal_code_err']))?'is_invalid':''?>
                        value="<?php echo $data['postal_code']?>">
                    <span class="invalid-feedback"><?php echo $data['postal_code_err']?></span>
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <label for="state" class="formTitle">State</label>
                    <input type="text"
                        class="form-control <?php echo (!empty($data['state_err'])) ? 'is-invalid' : ''; ?>"
                        placeholder="State" name="state"
                        <?php echo (!empty($data['state_err']))?'is_invalid':''?>
                        value="<?php echo $data['state']?>">
                    <span class="invalid-feedback"><?php echo $data['state_err']?></span>
                </div>
            </div>
            <button class="btn btn-lg btn-success btn-block" type="submit" style="margin-top:10px;">Next</button>
        </form>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>
</body>

</html>