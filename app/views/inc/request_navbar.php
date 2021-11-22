<nav class="nav navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="" alt="" width="30" height="24" class="d-inline-block align-text-top">
        DONATE ME
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?php echo URLROOT ?>/requests">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="">Donates</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href=""><i class="fa fa-bell"></i></a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
              data-toggle="dropdown" aria-expanded="false">
              <i class="fa fa-user"><?php echo $_SESSION['first_name']?></i>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="#">Recent Donates</a>
              <a class="dropdown-item" href="#">Settings</a>
              <a>
                <hr class="dropdown-divider"></a>
              <a class="dropdown-item" href="<?php echo URLROOT ?>/users/signout">Logout</a>
            </div>
          </li>

        </ul>

      </div>
    </div>
  </nav>