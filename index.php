<?php
  require_once('configuration/Database.php');
  require_once 'users/queryclasses/Reservation.php';
  require_once 'users/queryclasses/GetReservations.php';
  include 'includes/head.php';
  include 'includes/nav2.php';
?>
<div class="home">
  <?php displayMessage() ?>
    <h1 class="text-light">
      welcome to easy booking. <br> <span class="text-danger">
        We make all your online bookings seamless and painless
      </span> 
    </h1>
    <h3 class="text-info mt-4">
    Your hotels, your tranportation system, your events and your cenima all now have an online booking solution
    </h3>
    <div class="row mt-4">
      <div class="col-md-4 offset-md-4">
        <h2 class="jumbotron bg-info text-light text-center " >Learn How It Works Here </h2>
      </div>
    </div>
</div>
<hr>
<h4 class="text-center text-info" >Our Clients</h4> <hr>
<div class="row m-3">

  <?php foreach($business_info as $business){ ?>
    <div class="col-md-4">

      <p class="text-center">
        <a href="profiles/index.php?business=<?php echo $business['business_id']?>" class="text-secondary" title='View their page here for details'>
        <img src="images/business_images/business_image1.jpg" alt="business details" width="200px"> </a> <br>
        <a href="profiles/index.php?business=<?php echo $business['business_id']?>" class="text-secondary" title="view their page here for details">
        <?php echo $business['business_name']; ?> &nbsp; <i class="far fa-eye text-info"></i>
      </a>
      </p>
    </div>
  <?php } ?>
  </div>
<?php
// include 'includes/about.php';
// include 'includes/careers.php';
include 'includes/footer.php';
?>
