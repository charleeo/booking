<table class="table table-striped table-responsive-md ">
  <thead class="thead-dark">
    <th >S/N</th>
    <th>Rooms Categories</th>
    <th>Image</th>
    <th>Price</th>
    <th>Details</th>
  </thead>
  <tbody>
    <?php foreach($cat1_index as $key => $one){ ?>
    <tr>
      <td><?php echo $key+1 ?></td>
      <td><?php echo $one['suite_name'] ?></td>
      <td>
        <a href="profiles/booking_details.php?booking=<?php echo $one['hotels_id'] ?>&cat_id=<?php echo $one['category_id'] ?>">
          <img src="<?php echo $one['suite_image'] ?>" alt="<?php echo $one['suite_name'] ?>" width="90px" title = 'Click here to view details'>
        </a>
      </td>
      <td><?php echo $one['price'] ?></td>
      <td>
        <a href="profiles/booking_details.php?booking=<?php echo $one['hotels_id']?>&cat_id=<?php echo $one['category_id'] ?>" class="text-success">
          <span for="reservation_status"> <i class="far fa-eye"></i> View Details</span>
        </a>
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>
