  <!-- Events and special programmes -->
  <div class="box-shadow">
    <form action="users/actions/category_three.php" method="POST"z>
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <?php echo ((isset($_GET['cat_three_error_message']))?'<p class="text-center alert-danger" id="display-error3">'. $_GET['cat_three_error_message'].'</p>': '') ?>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div class="form-group">
          <label for="event_name">Event Name <span class="text-danger">*</span></label>
          <input type="text" name="event_name" value="<?php echo echoSession('event_name') ?>" id="event_name" class="form-control" placeholder="enter the name of your event herer">
          <p id="event_name_error"></p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div class="form-group">
          <label for="event_host">Event Host <span class="text-danger">*</span></label>
          <input type="text" name="event_host" value="<?php echo echoSession('event_host') ?>" id="event_host" class="form-control">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div class="form-group">
          <label for="performing_artistes">Perfoming Artistes (optional)</label>
          <input type="text" name="performing_artistes" id="performing_artistes" value="<?php echo echoSession('artistes') ?>" class="form-control" placeholder="enter the names of the performing artistes if any">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div class="form-group">
          <label for="regular_price">Price For Regular (&#8358;) <span class="text-danger">*</span></label>
          <input type="text" name="regular_price" id="regular_price" value="<?php echo echoSession('regular') ?>"class="form-control" placeholder="enter the price per a regular participant">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div class="form-group">
          <label for="vip_price">Price For Vip (&#8358;) <span class="text-danger">*</span></label>
          <input type="text" name="vip_price" value="<?php echo echoSession('vip') ?>" id="vip_price" class="form-control"  placeholder="enter the price per vip">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div class="form-group">
          <label for="vvip_price">Price For VVip (optional &#8358;)</label>
          <input type="text" name="vvip_price" value="<?php echo echoSession('vvip') ?>" id="vvip_price" class="form-control" placeholder="enter the price per a vvip">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div class="form-group">
          <label for="table_price">Price For A Table (&#8358;) <span class="text-danger">*</span></label>
          <input type="text" name="table_price" value="<?php echo echoSession('table') ?>" id="table_price" class="form-control" placeholder="enter the price per table">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div class="form-group">
          <label for="special_table1">Special  Tables Name (optional)</label>
          <input type="text" name="special_table1" value="<?php echo echoSession('sptable') ?>" id="special_table1" autocomplete="false" class="form-control" placeholder="eg: table for 10, table for 2, table for 5 etc">
        </div>
      </div>
    </div>
    <div class="row" id="special_table_price_row" style="display:none">
        <div class="col-md-6 offset-md-3">
          <div class="form-group">
            <label for="special_table_price">&#8358; Special  Tables Prices (&#8358;) <span class="text-danger">*</span></label>
            <input type="text" name="special_table_price" value="<?php echo echoSession('sptableprice') ?>" id="special_table_price" class="form-control" placeholder="enter the special table amount here. with respect to the tables enetered above">
          </div>
        </div>
    </div>
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div class="form-group">
          <label for="event_duration">Event Kick-off time <span class="text-danger">*</span></label>
          <input type="date" class="form-control" name="event_duration" value="<?php echo echoSession('duration') ?>"id="event_duration">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div class="form-group">
          <label for="event_venue">Event Venue <span class="text-danger">*</span></label>
          <input type="text" name="event_venue" id="event_venue" value="<?php echo echoSession('venue') ?>" class="form-control">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div class="form-group">
          <label for="total_tickets">Total tickets on sales <span class="text-danger">*</span></label>
          <select name="total_tickets" id="total_tickets" class="form-control">
            <option value="">select maximum number of ticket to be sold</option>
            <?php for($i = 5; $i <= 7000; $i=$i+5){ ?>
              <option value="<?php echo $i ?>" <?php echo ((echoSession('tickets') == $i)?'selected': '') ?>><?php echo $i ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 offset-md-3">
          <div class="form-group">
            <label for="event_details">Event Description  <span class="text-danger">*</span></label>
            <textarea name="event_detail" id="" cols="30" rows="10" class="form-control" placeholder="What is your event all about. give the details here"><?php echo echoSession('details') ?></textarea>
          </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div class="form-group">
          <input type="submit" value="Create Your Event" name="create_category-3" id="event_id" class="form-control btn btn-secondary">
        </div>
      </div>
    </div>
    <input type="hidden" name="category_id" value="3">
  </form>
</div>