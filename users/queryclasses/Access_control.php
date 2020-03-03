<?php
function mergeLoginUserWithBusinessRecords($dbObj,$user_id, $business_id)
{
  $sql = "SELECT `users`.id, `business_records`.`business_id` FROM users INNER JOIN business_records ON business_records.user_id = users.id WHERE users.id = ? AND business_records.business_id = ? ";
    $stmt = $dbObj->dbconnector->prepare($sql);
    $stmt->bind_param("ii", $user_id, $business_id);
    $stmt->execute();
    $stmt = $stmt->get_result();
    if($stmt->num_rows > 0)
    {
      return $result  = $stmt->fetch_assoc();
    } 
}

function checkIfAUserAlreadyHasABusinessRecord($dbObj, $user_id)
{
  $sql = "SELECT business_id, user_id FROM business_records Where business_records.user_id = ? ";
  $stmt = $dbObj->dbconnector->prepare($sql);
  if(!$stmt)
  {
    return "Error ".$dbObj->dbconnector->error;
    exit();
  }
  if(!$stmt->bind_param('i', $user_id))
  {
    return "Error ".$dbObj->dbconnector->error;
    exit();
  }
  if(!$stmt->execute())
  {
    return "Error ".$dbObj->dbconnector->error;
    exit();
  }
  $stmt_result = $stmt->get_result();
  if(!$stmt_result)
  {
    return "Error ".$dbObj->dbconnector->error;
    exit();
  }
  if($stmt_result->num_rows > 0)
  {
   return $result = $stmt_result->fetch_assoc();
  }
  else
  {
    return "No record found";
  }
}
