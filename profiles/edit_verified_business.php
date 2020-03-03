<?php
  require_once('../configuration/Database.php');
  require_once('../users/queryclasses/Verify.php');
  require_once('../users/queryclasses/states.php');
  require_once('../users/queryclasses/Access_control.php');
  $dbObj = new Database(); $states = getStates($dbObj);
  $editVerifiedBusiness = new Verify();
    
  $business_id = ((isset($_GET['business_id']))? $_GET['business_id'] : $_SESSION['business_id'] );
  // Prevent non-login users from accessing this route manually
  login_error_redirect(is_logged_in());
  // Check if the login user is one trying to modify is business records
  $checkAccess = mergeLoginUserWithBusinessRecords($dbObj, is_logged_in(),$business_id);
  if(!$checkAccess)
  {
    $_SESSION['error_message'] = "Access denied, you don't have the permission to edit another person's records";
    header("Location: ./dashboard.php");
  }
  $business_info = ($editVerifiedBusiness->getBusinessInfoToEdit($business_id));
   
  include '../includes/head.php';  include '../includes/sidebar.php';
?>

<hr>
<h3 class="text-center text-secondary" title="business verification">Business Verification</h3><hr>
<p class="text-secondary text-center">Note: All fields with <span class="text-danger">*</span> are required</p>
  <form action="users/actions/edit_verified_business.php" method="POST">
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="email">Business Email Address <span class="text-danger">*</span></label>
          <input type="text" name="email" class="form-control" placeholder="Enter the email address of your business" value="<?php echo ((!empty($_SESSION['email']))? $_SESSION['email']: $business_info['business_email']);  ?>">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="business_phone">Business Contact Phone Number <span class="text-danger">*</span></label>
          <input type="text" name="business_phone" class="form-control" value="<?php echo ((!empty($_SESSION['business_phone']))?$_SESSION['business_phone'] : $business_info['business_phone']); ?>">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="business_name">Business Name <span class="text-danger">*</span></label>
          <input type="text" name="business_name" class="form-control" placeholder="e.g A & CO Suites LTD" value="<?php echo ((!empty($_SESSION['business_name']))?$_SESSION['business_name'] : $business_info['business_name']); ?>">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="business_address">Business Address <span class="text-danger">*</span></label>
          <input type="text" name="business_address" class="form-control" placeholder="enter the contact address of your business" value="<?php echo ((!empty($_SESSION['business_address']))?$_SESSION['business_address'] : $business_info['business_address']); ?>">
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
                <?php echo ((!empty($_SESSION['states'])  && ($_SESSION['states']  == $state["state_id"]) || $business_info['state_id'] == $state['state_id'] )?"selected":""); ?>>
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
          value="<?php echo ((!empty($_SESSION['registration_number']))?$_SESSION['registration_number'] : $business_info['cac_number']); ?>">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="description">Business Activities <span class="text-danger">*</span></label>
          <textarea name="description" id="description" cols="30" rows="10" class="form-control" placeholder="State your business activities here"
          ><?php echo ((!empty($_SESSION['description']))?$_SESSION['description'] : $business_info['business_details']); ?></textarea>
        </div>
      </div>
    </div>
    <div class="row ml-3">
      <div class="col-md-4 col-md-offset-3">
      </div>
      <input type="hidden" name="business_id" value="<?php echo $business_id ?>">
        <div class="form-group">
          <button class="form-control btn-secondary flex-end" name="update_my_business">Update My Business</button>
        </div>
    </div>
  </form>
  <hr>
<?php
  include '../includes/footer.php';
?>
