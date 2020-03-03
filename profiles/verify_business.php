<?php
  require_once('../configuration/Database.php');
  require_once('../users/queryclasses/states.php');
  require_once('../users/queryclasses/Access_control.php');
  $dbObj = new Database(); $states = getStates($dbObj);
  // Prevent non-login users or non-registered users from accessing this route
  login_error_redirect(is_logged_in());
  // Prevent the users from manually navigating to this route
  $business_record_allready_exist = checkIfAUserAlreadyHasABusinessRecord($dbObj, is_logged_in());
  if($business_record_allready_exist['user_id'] == is_logged_in() )
  {
    $_SESSION['error_message'] = "Your business records have already been verified";
    header("Location: ./dashboard.php");
  }
  include '../includes/head.php';  include '../includes/nav2.php';
?>
<hr>
<h3 class="text-center text-secondary" title="business verification">Business Verification</h3><hr>
<p class="text-secondary text-center">Note: All fields with <span class="text-danger">*</span> are required</p>
  <form action="users/actions/verify_business.php" method="POST">
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="email">Business Email Address <span class="text-danger">*</span></label>
          <input type="text" name="email" class="form-control" placeholder="Enter the email address of your business" value="<?php echo echoSession('email'); ?>">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="business_phone">Business Contact Phone Number <span class="text-danger">*</span></label>
          <input type="text" name="business_phone" class="form-control" value="<?php echo echoSession('business_phone'); ?>">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="business_name">Business Name <span class="text-danger">*</span></label>
          <input type="text" name="business_name" class="form-control" placeholder="e.g A & CO Suites LTD" value="<?php echo echoSession('business_name'); ?>">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="business_address">Business Address <span class="text-danger">*</span></label>
          <input type="text" name="business_address" class="form-control" placeholder="enter the contact address of your business" value="<?php echo echoSession('business_address') ?>">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="states">Where your business is located <span class="text-danger">*</span></label>
          <select name="states" id="states" class="form-control" >
            <option value="">select state</option>
            <!-- Loop through the states from the database -->
            <?php
              if(count($states) > 0)
              {
                foreach($states as $state)
                {
                  ?>
                <option value="<?php echo $state['state_id'] ?>"
                <?php echo (( isset($_SESSION['states'])  && $_SESSION['states']  == $state["state_id"])?"selected":""); ?>>
                <?php echo $state['state_name'] ?>
              </option>
              <?php
              }
            }
            else echo "<option>Not loaded yet</option>";
            ?>
          </select>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="local_government">Local goverment area <span class="text-danger">*</span></label>
          <select name="local_government" id="lga" class="form-control">
          </select>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="registration_number">CAC registration number (optional)</label>
          <input type="text" class="form-control" name="registration_number" 
          value="<?php echo echoSession('registration_number'); ?>">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="description">Business Activities <span class="text-danger">*</span></label>
          <textarea name="description" id="description" cols="30" rows="10" class="form-control" placeholder="State your business activities here"
          ><?php echo echoSession('description'); ?></textarea>
        </div>
      </div>
    </div>
    <div class="row ml-3">
      <div class="col-md-4 col-md-offset-3">
      </div>
        <div class="form-group">
          <button class="form-control btn-secondary flex-end" name="verify_my_business">Verify My Business</button>
        </div>
    </div>
    <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'] ?>">
  </form>
  <hr>
<?php
  include '../includes/footer.php';
?>