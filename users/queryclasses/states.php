<?php
function getStates($dbObj)
{

  $stateQuery = "SELECT * FROM states";
  $stmt = $dbObj->dbconnector->prepare($stateQuery);
  $stmt->execute();
  $result = $stmt->get_result(); 
  
    $Allrows = $result->fetch_all(MYSQLI_ASSOC);
    return $Allrows;
}