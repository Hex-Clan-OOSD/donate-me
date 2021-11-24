<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous" />
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
    <title>HexClan</title>
    <?php require APPROOT . '/views/inc/favicon.php';?>
    <link rel="stylesheet" href="<?php echo URLROOT;?>./css/signup_styles.css" />
</head>

<body class="hero-image">
    <?php require APPROOT . '/views/inc/land_navbar.php';?>
    <div style="padding-left: 15%; padding-top:50px; width:40%;margin-bottom:20px;">
        <h2 class="text-left">Register</h2>
    </div>
    <div style="margin-right: 3%; padding-left: 15%; width: 35%;">
        <form action="<?php echo URLROOT;?>/users/register" method="post">
            <div class="form-row">
                <div class="col">
                    <label for="first_name" class="formTitle">First Name</label>
                    <input type="text"
                        class="form-control <?php echo (!empty($data['first_name_err'])) ? 'is-invalid' : ''; ?>"
                        placeholder="First Name" name="first_name" value="<?php echo $data['first_name']?>">
                    <span class="invalid-feedback"><?php echo $data['first_name_err']?></span>
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <label for="last_name" class="formTitle">Last Name</label>
                    <input type="text"
                        class="form-control <?php echo (!empty($data['last_name_err'])) ? 'is-invalid' : ''; ?>"
                        placeholder="Last Name" name="last_name" value="<?php echo $data['last_name']?>">
                    <span class="invalid-feedback"><?php echo $data['last_name_err']?></span>
                </div>
            </div>

            <div class="form-row">
                <div class="col">
                    <label for="email" class="formTitle">Email</label>
                    <input type="text"
                        class="form-control <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>"
                        placeholder="xyz@abc.com" name="email" <?php echo (!empty($data['email_err']))?'is_invalid':''?>
                        value="<?php echo $data['email']?>">
                    <span class="invalid-feedback"><?php echo $data['email_err']?></span>
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <label for="password" class="formTitle">Password </label>
                    <input type="password"
                        class="form-control <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>"
                        placeholder="******" name="password"
                        <?php echo (!empty($data['password_err']))?'is_invalid':''?>
                        value="<?php echo $data['password']?>">
                    <span class="invalid-feedback"><?php echo $data['password_err']?></span>
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <label for="confirm_password" class="formTitle">Confirm Password </label>
                    <input type="password"
                        class="form-control <?php echo (!empty($data['confirm_password_err'])) ? 'is-invalid' : ''; ?>"
                        placeholder="******" name="confirm_password"
                        <?php echo (!empty($data['confirm_password_err']))?'is_invalid':''?>
                        value="<?php echo $data['confirm_password']?>">
                    <span class="invalid-feedback"><?php echo $data['confirm_password_err']?></span>
                </div>
            </div>
            <button class="btn btn-lg btn-success btn-block" type="submit" style="margin-top: 10px;">Register</button>
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