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
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/signup_styles.css" />
</head>

<body class="hero-image">
    <div style="padding-left: 15%; padding-top:50px; width:40%;margin-bottom:20px;">
        <h2 class="text-left">Add New Admin User</h2>
    </div>
    <div style="margin-right: 3%; padding-left: 15%; width: 45%;">
        
            <div class="form-row">
                <div class="col">
                    <label for="first_name" class="formTitle">First Name</label>
                    <input type="text"
                        class="form-control"
                        placeholder="First Name" name="first_name">

                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <label for="last_name" class="formTitle">Last Name</label>
                    <input type="text"
                        class="form-control"
                        placeholder="Last Name" name="last_name">
                </div>
            </div>

            <div class="form-row">
                <div class="col">
                    <label for="email" class="formTitle">Email</label>
                    <input type="text"
                        class="form-control"
                        placeholder="xyz@abc.com" name="email">
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <label for="password" class="formTitle">Password </label>
                    <input type="password"
                        class="form-control"
                        placeholder="******" name="password">
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <label for="confirm_password" class="formTitle">Confirm Password </label>
                    <input type="password"
                        class="form-control"
                        placeholder="******" name="confirm_password">
                </div>
            </div>

            <div class="form-row">
                <div class="col">
                    <label for="phone_number" class="formTitle">Phone number</label>
                    <input type="text"
                        class="form-control"
                        placeholder="Phone Number" name="phone_number">
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <label for="address_line_1" class="formTitle">Address Line 1</label>
                    <input type="text"
                        class="form-control"
                        placeholder="Address Line 1" name="address_line_1">
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <label for="address_line_2" class="formTitle">Address Line 2</label>
                    <input type="text"
                        class="form-control"
                        placeholder="Address line 2" name="address_line_2">
                </div>
            </div>
            <div class="form-row">
                <div class="col-7">
                    <label for="city_town" class="formTitle">City or Town</label>
                    <input type="text"
                        class="form-control"
                        placeholder="City or Town" name="city_town">
                </div>
                <div class="col">
                    <label for="postal_code" class="formTitle">Postal Code</label>
                    <input type="text"
                        class="form-control"
                        placeholder="Postal Code" name="postal_code">
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <label for="state" class="formTitle">State</label>
                    <input type="text"
                        class="form-control"
                        placeholder="State" name="state">
                </div>
            </div>
            <button class="btn btn-lg btn-success btn-block" type="submit" style="margin-top: 10px; margin-bottom: 10px;">Add</button>
        </form>
        <br>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>
</body>

</html>