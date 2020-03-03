<?php
  require_once('../configuration/Database.php');
  require_once '../users/queryclasses/Reservation.php';
  require_once '../users/queryclasses/GetReservations.php';
  // login_error_redirect(is_logged_in());  
  include '../includes/head.php';  include '../includes/sidebar.php';
?>
  <h4 class="text-center text-secondary">
      All Reservations Categories
  </h4>
  <div class="row mb-3 ">
    <?php if($result->num_rows > 0) { 
      $result = $result->fetch_assoc();
      ?>
    <div class="col-md-6">
        <a href="profiles/reservations_category_view.php?cat_id=1" class="text-secondary">
          <img src="<?php echo $result['suite_image'] ?>" alt="suite details" width="150px">
          <?php echo Database::checkInput($result['suite_name']) ?>
        </a>
    </div>
    <?php } if($result2->num_rows > 0) { 
      $result2 = $result2->fetch_assoc(); ?>
    <div class="col-md-6">
      <a href="profiles/reservations_category_view.php?cat_id=2" class="text-secondary">
      <img src="<?php echo $result2['terminal_image'] ?>" alt="Terminals And Routes" width="150px">
        <?php echo Database::checkInput($result2['terminal_name']) ?>
      </a>
    </div>
    <?php } ?>
  </div>

  <div class="row ">
  <?php if($result3->num_rows > 0) { 
      $result3 = $result3->fetch_assoc();
      ?>
    <div class="col-md-6">
      <a href="profiles/reservations_category_view.php?cat_id=3" class="text-secondary">
        <img src="<?php echo $result3['event_image'] ?>" alt="Events" width="150px">
        <?php echo Database::checkInput($result3['event_host']) ?>
      </a>
    </div>
  <?php } if($result4->num_rows > 0) { 
          $result4 = $result4->fetch_assoc(); ?>
    <div class="col-md-6">
        <a href="profiles/reservations_category_view.php?cat_id=4" class="text-secondary">
        <img src="<?php echo $result4['cenima_image'] ?>" alt="Cenima" width="150px"/>
          <?php echo Database::checkInput($result4['event_name']) ?>
        </a>
      <?php } ?>
    </div>
  </div>
<?php
include '../includes/footer.php';
?>
</div>
