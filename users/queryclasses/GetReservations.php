<?php
class GetReservations
{
  public function __construct()
  {
    $this->dbObj =  new Database;
  } 

  public function getReservationInfo($table_name,$column_name, $business_id)
  {
    $sql = "SELECT *  FROM $table_name WHERE $column_name = ? ";
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
     $result = $stmt->get_result();    return $result;
  
  }
  

  public function BusinessRecords()
  {
    $sql = "SELECT *  FROM business_records ";
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
     
     if($result->num_rows > 0)
     {
       $result = $result->fetch_all(MYSQLI_ASSOC);
       return $result;
     }
     else return "No information";
  
  }
  
}
  // This is for the logged in users with business records
  $reservationObject = new Reservation();
  $buiness_id = $reservationObject->getBusinessId(is_logged_in());
  $buiness_id = (( is_logged_in())?  $buiness_id['business_id'] :returnUrl('business'));
  //  (( is_logged_in())?  $buiness_id['business_id'] : returnUrl('business'));
  // This second business id is the obtained from the url
  // $buiness_id2 = returnUrl('business');
  $getReservationObj = new GetReservations();
  $cat1 = $getReservationObj->getReservationInfo('hotels_and_lodges', 'business_id', $buiness_id)->fetch_all(MYSQLI_ASSOC);
  $cat2 = $getReservationObj->getReservationInfo('transport_terminals', 'business_id', $buiness_id)->fetch_all(MYSQLI_ASSOC);
  $cat3 = $getReservationObj->getReservationInfo('events', 'business_id', $buiness_id)->fetch_all(MYSQLI_ASSOC);
  $cat4 = $getReservationObj->getReservationInfo('cenima', 'business_id', $buiness_id)->fetch_all(MYSQLI_ASSOC);

  // This information here is for the non login users who wish to access a partcular business record page
  $buiness =  returnUrl('business');
  $cat1_index = $getReservationObj->getReservationInfo('hotels_and_lodges', 'business_id', $buiness)->fetch_all(MYSQLI_ASSOC);
  $cat2_index = $getReservationObj->getReservationInfo('transport_terminals', 'business_id', $buiness)->fetch_all(MYSQLI_ASSOC);
  $cat3_index = $getReservationObj->getReservationInfo('events', 'business_id', $buiness)->fetch_all(MYSQLI_ASSOC);
  $cat4_index = $getReservationObj->getReservationInfo('cenima', 'business_id', $buiness)->fetch_all(MYSQLI_ASSOC);
  
  // This helps return just a row from the reservation tables
  $result = $getReservationObj->getReservationInfo('hotels_and_lodges', 'business_id', $buiness_id);
  $result2 = $getReservationObj->getReservationInfo('transport_terminals', 'business_id', $buiness_id);
  $result3 = $getReservationObj->getReservationInfo('events', 'business_id', $buiness_id);
  $result4 = $getReservationObj->getReservationInfo('cenima', 'business_id', $buiness_id);
  
  // Returns all information pertaining to a business
  $business_info = $getReservationObj->BusinessRecords();
  $cat_id = returnUrl('cat_id');
  
  // These variables return the value of a row with a given id 
  $booking_id = returnUrl('booking');
  $cat_one_details = $getReservationObj->getReservationInfo('hotels_and_lodges', 'hotels_id', $booking_id)->fetch_assoc();
  $cat_two_details = $getReservationObj->getReservationInfo('transport_terminals', 'terminal_id', $booking_id)->fetch_assoc();
  $cat_three_details = $getReservationObj->getReservationInfo('events', 'event_id', $booking_id)->fetch_assoc();
  $cat_4_details = $getReservationObj->getReservationInfo('cenima', 'cenima_id', $booking_id)->fetch_assoc();
  
  
