<?php
  require_once('../configuration/Database.php');
  require_once '../users/queryclasses/states.php';
  require_once '../users/queryclasses/User.php';
  require_once('../configuration/business_id.php');
  
  $dbObj = new Database();
  login_error_redirect(is_logged_in());  
  $states = getStates($dbObj);
  include '../includes/head.php';  include '../includes/sidebar.php';
?>
  <h4 class="text-center text-secondary" id="text-content">
      Create A reservation
  </h4>
  <div class="row">
    <div class="col-md-4 offset-md-4">
      <h6 class="alert alert-info ">Note: All Fields Marked with <span class="text-danger">*</span> are required</h6>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6 offset-md-3">
      <div class="form-group">
        <label for="reservation_category">Reservation Category <span class="text-danger">*</span></label>
        <select name="reservation-category" id="reservation-category" class="form-control">
          <option value="">Select reservation category</option>
          <?php foreach($reservationCategory as $key => $reservation) { ?>
            <option value="<?php echo $key ?>"><?php echo $reservation ?></option>
            <?php } ?>
          </select>
        </div>
      </div>
    </div>
    <!-- The main forms start from here -->
<div id="category_one">
  <?php include_once  'categories/category_one.php' ?>
</div>


<div id="category_two">
  <?php include_once 'categories/category_two.php' ?>
</div>


<div id="category_three">
  <?php include_once 'categories/category_three.php' ?>
</div>

<div id="category_four">
  <?php include_once 'categories/category_four.php' ?>
</div>
<?php
include '../includes/footer.php';
?>
</div>
