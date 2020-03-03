<?php
  require_once('../configuration/Database.php');
  require_once '../users/queryclasses/Reservation.php';
  require_once '../users/queryclasses/GetReservations.php';
  include '../includes/head.php';
  include '../includes/sidebar.php';
?>
    <h1 class="text-center">
        Reservation Title.
    </h1>
  <?php
  if($cat_id === '1')
  {
    include_once('reservation_details/cat_one.php');
  }
  else if($cat_id === '2')
  {
    include_once('reservation_details/cat_two.php');
  }
 else if($cat_id === '3')
  {
    include_once('reservation_details/cat_three.php');
  }
  else if($cat_id === '4')
  {
    include_once('reservation_details/cat_four.php');
  }
 
  include_once('../includes/footer.php');
  ?>