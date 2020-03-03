<table class="table table-striped table-responsive table-sm">
  <thead class="thead-dark">
    <th >S/N</th>
    <th>Image</th>
    <th>Name</th>
    <th>Price</th>
    <th>Facililities</th>
    <th>Details</th>
    <th>Total Rooms</th>
    <th>Mark As Reserved</th>
    <th>Action</th>
  </thead>
  <tbody>
    <?php foreach($cat1 as $key => $one){ ?>
    <tr>
      <td><?php echo $key+1 ?></td>
      <td><?php echo $one['suite_name'] ?></td>
      <td>
        <img src="<?php echo $one['suite_image'] ?>" alt="Suite Details" width="90px">
      </td>
      <td><?php echo $one['price'] ?></td>
      <td>
        <?php 
        $facilities = explode(',',$one['facilities'] );
        if(count($facilities) > 0)
          foreach($facilities as $facility)
          echo $facility ."<br>";
        ?>
      </td>
      <td><?php echo $one['suite_details'] ?></td>
      <td><?php echo $one['suite_rooms'] ?></td>
      <td>
        <label for="reservation_status"> Reserved</label>
        <input type="checkbox" value="1" name="reservation_status">
      </td>
      <td  >
        <a href="reservations_category_edit.php?cat_id=<?php echo $one['hotels_id'] ?>" class="text-secondary"> <i class="fas fa-pen"></i> &nbsp;Edit</a> <br/>
        <a href="" class="text-danger"> <i class="fas fa-eraser"></i>Delete</a>
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>