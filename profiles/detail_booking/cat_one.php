<h1 class="text-center"><?php echo $cat_one_details['suite_name'] ?> Details </h1>
<hr>

<div class="row ml-2 row-reverse">
  <div class="col-md-3">
    <p class="text-center"> Price Per Night </p>
    <h1 class="text-center text-info"> &#8358; <?php echo number_format($cat_one_details['price'] );?></h1>
  </div>
  <div class="col-md-6 ">
    <img src="<?php echo $cat_one_details['suite_image'] ?>" alt="<?php echo $cat_one_details['suite_name'] ?>" class="img img-thumbnail">
  </div>
  <div class="col-md-3">
    <h3 class="text-center">Available Rooms </h3>
    <hr>
    <h4 class="text-center text-info"><?php echo $cat_one_details['suite_rooms'] ?> Rooms Available</h4>
    <div class="jumbotron bg-info" title="book your favorite room here" style="cursor:pointer"><h4 class="text-light text-center">Book One Now</h4></div>
  </div>
</div>
<hr>
<div class="row">
  <div class="col-md-8">
  <h3 class="text-center"><?php echo $cat_one_details['suite_name'] ?> Details </h3>
  <hr>
  <p class="text-center"><?php echo $cat_one_details['suite_details'] ?></p>
  </div>
 
  <div class="col-md-4">
    <h3>Available Facilities </h3> <hr>
    <ol class="text-center">
    <?php 
    $facilities = explode(',',$cat_one_details['facilities'] );
    if(count($facilities) > 0)
      foreach($facilities as $facility){
    ?>
    <li><?php echo $facility ?></li>
    <?php } ?>
    </ol>
  </div>
</div>