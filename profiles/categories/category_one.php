
    <form action="users/actions/category_one.php" method="POST">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <?php echo ((isset($_GET['cat_one_error_message']))?'<p class="text-center alert-danger" id="display-error">'. $_GET['cat_one_error_message'].'</p>': '') ?>
    </div>
  </div>
  <input type="hidden" name="reservation_category" value="1">
  <div class="row">
    <div class="col-md-6 offset-md-3">
      <div class="form-group">
        <label for="suite_name">Suite Name</label>
        <input type="text" class="form-control" require minlength="4" value="<?php echo echoSession('name') ?>" name="suite_name"
        placeholder="eg SUITE A, SUITE B2" id="suit_name">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6 offset-md-3">
      <div class="form-group">
        <label for="suite_category">Suite Category</label>
        <select name="suite_category" id="suit_category" class="form-control">
          <option value="">Select the suite category</option>
          <?php foreach($suite_category as $key => $category){?>
            <option <?php echo ((isset($_SESSION['cat']) && $_SESSION['cat'] == $key)?'selected': '') ?> value="<?php echo $key ?>"><?php echo $category ?></option>
            <?php } ?>
          </select>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div class="form-group">
          <label for="suite_category">Numbers of rooms</label>
          <select name="suite_rooms" id="room" class="form-control">
            <option value="">Select how many rooms a suite type has</option>
            <?php for($i =1; $i <= 200; $i++){?>
              <option  value="<?php echo $i ?>" <?php echo ((isset($_SESSION['room']) && $_SESSION['room'] == $i)?'selected': '') ?>><?php echo $i ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 offset-md-3">
          <div class="form-group">
            <label for="price">Price</label>
            <input type="text" name="price" value="<?php echo  echoSession('price');?>" class="form-control" placeholder="state how much a suite is worth per time">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 offset-md-3">
          <div class="form-group">
          <label for="duration">Duration</label>
          <input type="date" value="<?php echo echoSession('duration'); ?>" name="duration" class="form-control" placeholder="state how much time a suite reservation will be valid">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div class="form-group">
          <label for="">Hotel Facilities:</label> <br/>
          <?php foreach ($hotelFacilities as $value) { ?>
            <label for="hotel-facilities" ><?php echo $value ?> </label>
            <input type="checkbox" name="hotel_facilities[]" value="<?php echo $value ?>" 
            
            <?php
          // This simple logic helps to return the old inputs value from the check box array
          if(isset($_SESSION['facility']))
          foreach($_SESSION['facility'] as $fac)
          if($fac == $value) echo 'checked';
          else echo '';
          ?>>
          <!-- check box ends here -->
          &nbsp;
          <?php } ?>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div class="form-group">
          <label for="suite_details">Suite Description</label>
          <textarea  name="suite_details" id="suite_dtails" cols="30" rows="10" class="form-control" placeholder="give a brief description of the suite here"><?php echo echoSession('details') ?>
        </textarea>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6 offset-md-3">
      <div class="form-group">
        <input type="submit" value="POST" name="category-one" class="form-control btn btn-secondary" />
      </div>
    </div>
  </div>
</form>