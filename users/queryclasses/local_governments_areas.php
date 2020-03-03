<?php
  require('../../configuration/Database.php');
function getLGAs($dbObj, $state_id)
{

  $stateQuery = " SELECT lga.*, states.state_id FROM lga 
  left join states on lga.state_id = states.state_id 
   WHERE lga.state_id = ? ";
  $stmt = $dbObj->dbconnector->prepare($stateQuery);
  $stmt->bind_param('i',$state_id);
  $stmt->execute();
  $result = $stmt->get_result(); 
  
    $Allrows = $result->fetch_all(MYSQLI_ASSOC);
    return $Allrows;
}

  $state_id = Database::checkInput($_GET['states']);
  $selected = Database::checkInput($_GET['selected']);  $dbObj = new Database();
  $regions = getLGAs($dbObj, $state_id);
  
  ob_start();
  ?>
  
  <option value="">Select Local Government</option>
  <?php
  foreach ($regions as $region):
  ?>
  <option value="<?php echo $region['lga_id'];?>"
  <?php 
  echo (($selected == $region['lga_id'])?' selected' : '');?>>
  <?php echo $region['lga_name']; ?></option>
  <?php endforeach; 
  echo ob_get_clean();
  ?>