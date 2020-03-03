  <?php
  require('../configuration/Database.php');
  $dbObj = new Database();
  require_once('../users/queryclasses/User.php');
  require_once('../users/queryclasses/Access_control.php');
  login_error_redirect(is_logged_in());
  require('../configuration/business_id.php');
  include '../includes/head.php';  include '../includes/sidebar.php';
?>
    <h1 class="text-center text-secondary">
      <!-- Only show this button if the user as not created business information -->
      <?php if(!mergeLoginUserWithBusinessRecords($dbObj, is_logged_in(), $business_id)){ ?>
      <a href="profiles/verify_business.php" class="text-secondary">Verify Your Business</a>
      <?php } else { ?>
      <a href="profiles/edit_verified_business.php?business_id=<?php echo $business_id ?>" class="text-secondary">Edit Your Business</a>
      <?php } ?> ||
      <a href="profiles/create_reservation.php" class="text-secondary">Create A Reservation</a>
  </h1>
        <?php displayMessage() ?>
  </div>
<?php
  include '../includes/footer.php';
?>
  </div>
</div>
