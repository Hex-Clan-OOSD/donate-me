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
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/admin_add_styles.css" />
</head>

<body class="add-admin-image">
    <div class="content" >
    <div style="padding-left: 22%; padding-top:50px; width:55%;margin-bottom:20px;">
        <h2 class="text-left">Add New Admin User</h2>
    </div>
    <div style="margin-right: 3%; padding-left: 15%; width: 55%;">
    <?php flash('admin-user-added')?>
        <form action="<?php echo URLROOT;?>/users/addadmin" method="post">
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
            <button class="btn btn-lg btn-success btn-block" type="submit" style="margin-top: 10px; margin-bottom: 10px;">Add</button>
        </form>
        <br>
    </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>
</body>

</html>