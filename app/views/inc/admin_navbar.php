<nav class="nav navbar navbar-expand-lg navbar-dark bg-dark"
  style="padding-left: 15%;padding-right:15%;font-size:1rem;">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?php echo URLROOT ?>/pages/landinguser">
      <img src="<?php echo URLROOT;?>/images/logo.png" alt="" width="30" height="24"
        class="d-inline-block align-text-top" >
      DONATE ME
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
      <li class="nav-item">
          <a class="nav-link active" aria-current="page"  href="<?php echo URLROOT ?>/users/userverifications">User verifications</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page"  href="<?php echo URLROOT ?>/requests/pendingrequests">Pending requests</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="<?php echo URLROOT ?>/donations/pendingdonations">Pending donations</a>
        </li>
        <li class="nav-item dropdown" style="margin-left: 20px;">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
            data-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-user"><?php echo " ".$_SESSION['first_name']?></i>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="<?php echo URLROOT ?>/users/addadmin">Add admin user</a>
            <a class="dropdown-item" href="<?php echo URLROOT ?>/pages/settings">Settings</a>
            <a>
              <hr class="dropdown-divider"></a>
            <a class="dropdown-item" href="<?php echo URLROOT ?>/users/signout">Logout</a>
          </div>
        </li>

      </ul>

    </div>
  </div>
</nav>