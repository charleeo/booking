<?php
  require_once('../configuration/Database.php');
  require_once '../users/queryclasses/Reservation.php';
  require_once '../users/queryclasses/GetReservations.php';  
  include '../includes/head.php';
  include '../includes/sidebar.php';
?>
    <h1 class="text-center">
         All  Booking Categories For This Client.
    </h1>  
  <div class="row ml-3 ">
    <?php if($result->num_rows > 0) { 
      $result = $result->fetch_assoc();
      ?>
    <div class="col-md-3">
        <a href="profiles/reservations_details.php?cat_id=1&business=<?php echo $result['business_id'] ?>" class="text-secondary">
          <img src="<?php echo $result['suite_image'] ?>" alt="suite details" width="150px"> <br>
          Hotels And Lodges
        </a>
    </div>
    <?php } if($result2->num_rows > 0) { 
      $result2 = $result2->fetch_assoc(); ?>
    <div class="col-md-3">
      <a href="profiles/reservations_details.php?cat_id=2&business=<?php echo $result2['business_id'] ?>" class="text-secondary">
      <img src="<?php echo $result2['terminal_image'] ?>" alt="Terminals And Routes" width="150px"> <br>
        Transportation 
      </a>
    </div>
    <?php } ?>
  
    <?php if($result3->num_rows > 0) { 
      $result3 = $result3->fetch_assoc();
      ?>
    <div class="col-md-3">
        <a href="profiles/reservations_details.php?cat_id=3&business=<?php echo $result3['business_id'] ?>" class="text-secondary">
          <img src="<?php echo $result3['event_image'] ?>" alt="event details" width="150px"> <br>
          Events 
        </a>
    </div>
    <?php } if($result4->num_rows > 0) { 
      $result4 = $result4->fetch_assoc(); ?>
    <div class="col-md-3">
      <a href="profiles/reservations_details.php?cat_id=4&business=<?php echo $result4['business_id'] ?>" class="text-secondary">
      <img src="<?php echo $result4['event_image'] ?>" alt="Cenima Details" width="150px"> <br>
       Cenima
      </a>
    </div>
    <?php } ?>
  </div>
<?php include '../includes/footer.php';?>
</div>
