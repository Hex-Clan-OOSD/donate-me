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
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/setting_styles.css" />
    <title>Setting</title>
    <?php require APPROOT . '/views/inc/favicon.php';?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<?php require APPROOT . '/views/inc/request_navbar.php';?>
    <div class="container py-5">
    <div class="row">
        <div class="col-md-10">
            <h2 class="text-center mb-5">Settings</h2>
            <ul class="nav nav-fill">
                <a class="nav-item" href="#formChangePassword">Change Password</a>
                <a class="nav-item" href="#formChangeUserName">Change User Name</a>
                <a class="nav-item" href="#formChangeNumber">Change Phone Number</a>
            </ul>
            <hr class="mb-5">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <span class="anchor" id="formChangePassword"></span>

                    <!-- Change Password -->
                    <div class="card card-outline-secondary">
                        <div class="card-header">
                            <h3 class="mb-0">Change Password</h3>
                        </div>
                        <div class="card-body">
                            <form class="form" role="form" autocomplete="off">
                                <div class="form-group">
                                    <label for="inputPasswordOld">Current Password</label>
                                    <input type="password" class="form-control" id="inputPasswordOld" required="">
                                </div>
                                <div class="form-group">
                                    <label for="inputPasswordNew">New Password</label>
                                    <input type="password" class="form-control" id="inputPasswordNew" required="">
                                    <span class="form-text small text-muted">
                                            The password must be 8-20 characters, and must <em>not</em> contain spaces.
                                        </span>
                                </div>
                                <div class="form-group">
                                    <label for="inputPasswordNewVerify">Verify</label>
                                    <input type="password" class="form-control" id="inputPasswordNewVerify" required="">
                                    <span class="form-text small text-muted">
                                            To confirm, type the new password again.
                                        </span>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-lg float-right">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    

                </div>
                <div class="col-md-6 offset-md-3">
                    <span class="anchor" id="formChangeUserName"></span>
                    <hr class="mb-5">

                    <!-- Change User Name -->
                    <div class="card card-outline-secondary">
                        <div class="card-header">
                            <h3 class="mb-0">Change Username</h3>
                        </div>
                        <div class="card-body">
                            <form class="form" role="form" autocomplete="off">
                                <div class="form-group">
                                    <label for="inputName">New User Name</label>
                                    <input type="text" class="form-control" id="inputName" placeholder="New User Name">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-lg float-right">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                   

                </div>
                <div class="col-md-6 offset-md-3">
                    <span class="anchor" id="formChangeNumber"></span>
                    <hr class="mb-5">

                    <!-- form card change Phone Number-->
                    <div class="card card-outline-secondary">
                        <div class="card-header">
                            <h3 class="mb-0">Change Phone Number</h3>
                        </div>
                        <div class="card-body">
                            <form class="form" role="form" autocomplete="off">
                                <div class="form-group">
                                    <label for="inputPasswordOld">New Phone Number</label>
                                    <input type="password" class="form-control" id="inputPasswordOld" required="">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-lg float-right">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /form card change Phone Number -->

                

            </div>
            <!--/row-->
    
</div>
 <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
  </script>
</body>
</html>l