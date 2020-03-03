  <form action="users/actions/category_two.php" method="POST">
  <div class="row">
      <div class="col-md-6 offset-md-3">
        <?php echo ((isset($_GET['cat_two_error_message']))?'<p class="text-center alert-danger" id="display-error_2">'. $_GET['cat_two_error_message'].'</p>': '') ?>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div class="form-group">
          <label for="termina_name">Terminal Name <span class="text-danger">*</span></label>
          <input type="text" name="terminals" class="form-control" value="<?php echo echoSession('terminal')?>" placeholder="eg Ajah/zuba">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div class="form-group">
          <label for="location_one">Destination One Name <span class="text-danger">*</span></label>
          <input type="text" name="destination_one" class="form-control" value="<?php echo echoSession('dst1')?>" placeholder="this could either be the depature or the arrival terminal">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div class="form-group">
          <label for="location_two">Destination Two Name <span class="text-danger">*</span></label>
          <input type="text" name="destination_two" class="form-control" value="<?php echo echoSession('dst2')?>"placeholder="this could either be the depature or the arrival terminal">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div class="form-group">
          <label for="price_to">Price from destiantion one to destination two (&#8358;) <span class="text-danger">*</span></label>
          <input type="text" class="form-control" name="price_to_two" value="<?php echo echoSession('dst1p')?>" placeholder="&#8358;">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div class="form-group">
          <label for="price_to_one">Price from destiantion two to destiantion one (&#8358;) <span class="text-danger">*</span></label>
          <input type="text" class="form-control" name="price_to_one" value="<?php echo echoSession('dst2p')?>" placeholder="&#8358;">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div class="form-group">
          <label for="to_and_fro">Price To and Fro  (&#8358; optional)</label>
          <input type="text" class="form-control" name="price_to_and_fro" value="<?php echo echoSession('ptf')?>" placeholder="&#8358;">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div class="form-group">
          <label for="destination_one_address">Destination One Detailed Address <span class="text-danger">*</span></label>
          <input type="text" name="destination_one_address" value="<?php echo echoSession('dst1a')?>" class="form-control" placeholder="eg 15, suites 5, Abuja/ Zuba park">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div class="form-group">
          <label for="destination_two_address">Destination Two Detailed Address <span class="text-danger">*</span></label>
          <input type="text" name="destination_two_address" value="<?php echo echoSession('dst2a')?>" class="form-control" placeholder="eg 15, suites 5, Abuja/Zuba park">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div class="form-group">
          <label for="departure_time">Departure Periods  <span class="text-danger">*</span></label>
            <select name="departure_times[]" class="form-control"  multiple id="departure_times">
            <?php foreach($departure_time as $time){ ?>
              <option
              <?php
               if(!empty($_SESSION['dept']))
                      foreach($_SESSION['dept'] as $dept)
                        if($dept == $time) echo 'selected';               
              ?>
              value="<?php echo $time ?>"><?php echo $time.'AM' ?></option>
            <?php } ?>
          </select>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div class="form-group">
          <input type="submit" name="category-two" value="Create Terminal" class="form-control btn btn-secondary">
        </div>
      </div>
    </div>
    <input type="hidden" name="category_id" value="2">
  </form>
  