<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand navbar_link" href="index.php"><i class="fas fa-home"></i></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse " id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto ">
      <li class="nav-item active">
        <a class="nav-link navbar_link" href="index.php">Booking <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <ul class="navbar-nav navbar-center">
      <li class="nav-item active">
        <a class="nav-link navbar_link" href="index.php">About <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link navbar_link" href="index.php">Careers <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link navbar_link" href="index.php"> Vision <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <ul class="navbar-nav navbar-right ml-auto">
      <?php if(!is_logged_in()){ ?>
      <li class="menu-nav_item">
        <a class="nav-link navbar_link btn" data-toggle="modal" data-target="#registerModal">
            Register
        </a>
      </li>
      <li class="menu-nav_item">
        <a  class="nav-link navbar_link btn"  data-toggle="modal" data-target="#loginModal">
            Login
        </a>
      </li>
    </ul>
    <ul class="navbar-nav">
      <?php }
        if(is_logged_in()){
      ?>
      <li class="nav-item dropdown">
        <a class="nav-link navbar_link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Profiles
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="profiles/dashboard.php">Dashboard</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
          <a class="dropdown-item" href="users/actions/logout.php">Logout</a>
        </div>
      </li>
      <?php } ?>
    </ul>
    
  </div>
</nav>
<div class='container-fulid'>