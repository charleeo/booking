<?php
class Verify{
  public function __construct(){
    $this->dbObj =  new Database;
    } 
  public function verifyBusiness($bName, $email, $phone, $cacNumber, $lga, $states, $details, $address, $user_id)
  {
   
    $this->bName = $bName;
    $this->email = $email;
    $this->cacNumber = $cacNumber;
    $this->lga = $lga;
    $this->states = $states;
    $this->details = $details;
    $this->address = $address;
    $this->phone = $phone;
    $this->user_id = $user_id;
    $sql = "INSERT INTO business_records(business_name, business_email, business_phone, business_details, business_address, cac_number, user_id, state_id, lga_id) VALUES (?,?,?,?,?,?,?,?,?)";
    $stmt = $this->dbObj->dbconnector->prepare($sql);
    if($stmt === false)
    {
      echo " Error ". $this->dbObj->dbconnector->error;
      exit();
    }
    if(!$stmt->bind_param('ssssssiii', $bName,$email,$phone, $details,$address,$cacNumber, $user_id, $states,$lga))
    {
      echo " Error ". $this->dbObj->dbconnector->error;
      exit();
      
    }
    
    if(!$stmt->execute())
    {
      echo " Error ". $this->dbObj->dbconnector->error;
      exit();
    }
    
    else
    {
      echo true;
    }
  }
  
  public function getBusinessInfo()
  {
    $sql = "SELECT *  FROM business_records";
    $stmt = $this->dbObj->dbconnector->prepare($sql);
    if(!$stmt)
    {
      echo " Error ". $this->dbObj->dbconnector->error;
      exit();
      
    }
    if(!$stmt->execute())
    {
      echo " Error ". $this->dbObj->dbconnector->error;
      exit();
    }
    $result = $stmt->get_result();    
    return $result;
  }
  public function getBusinessInfoToEdit($business_id)
  {
    $sql = "SELECT *  FROM business_records WHERE business_id =  ? ";
    $stmt = $this->dbObj->dbconnector->prepare($sql);
    if(!$stmt)
    {
      echo " Error ". $this->dbObj->dbconnector->error;
      exit();
      
    }
    if(!$stmt->bind_param('i', $business_id))
    {

      echo " Error ". $this->dbObj->dbconnector->error;
      exit();
    }
    if(!$stmt->execute())
    {
      echo " Error ". $this->dbObj->dbconnector->error;
      exit();
    }
    $result = $stmt->get_result();    
    if($result->num_rows > 0)
    {
      $allRecords  = $result->fetch_assoc();
      return $allRecords;
    }
    else
    {
      return "No record found";
    }
  }

  public function updateBusiness($bName, $email, $phone, $cacNumber, $lga, $states, $details, $address, $business_id)
  {
    $sql = "UPDATE business_records SET business_name=?, business_email=?, business_phone=?, business_details=?, business_address=?, cac_number=?,  state_id=?, lga_id=? WHERE business_id =?";
    $stmt = $this->dbObj->dbconnector->prepare($sql);
    if($stmt === false)
    {
      echo " Error ". $this->dbObj->dbconnector->error;
      exit();
    }
    if(!$stmt->bind_param('ssssssiii', $bName,$email,$phone, $details,$address,$cacNumber,  $states,$lga, $business_id))
    {
      echo " Error ". $this->dbObj->dbconnector->error;
      exit();
      
    }
    
    if(!$stmt->execute())
    {
      echo " Error ". $this->dbObj->dbconnector->error;
      exit();
    }
    
    else
    {
      echo true;
    }
  }
}