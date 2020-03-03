<?php
class Reservation{
  public function __construct()
  {
    $this->dbObj =  new Database;
  } 

  // category one is for hotels and lodges
  public function CreateCategoryOne($bus_id, $suite_name, $suite_cat,$cat_id, $suite_rooms,$details, $facilities, $price, $duration)
  {
    $sql = "INSERT INTO hotels_and_lodges(business_id, category_id, suite_name, suite_categories, suite_rooms, price, duration, facilities, suite_details) VALUES (?,?,?,?,?,?,?,?,?)";
    $stmt = $this->dbObj->dbconnector->prepare($sql);
    if($stmt === false)
    {
      echo " Error ". $this->dbObj->dbconnector->error;
      exit();
    }
    if(!$stmt->bind_param('iisssdsss', $bus_id,$cat_id,$suite_name, $suite_cat,$suite_rooms,$price, $duration, $facilities,$details))
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

  public function CreateCategoryTwo($cat_id, $bus_id, $terminal_name, $destination_one, $destination_two, $destination_one_price, $destination_two_price, $to_and_fro_price, $destination_one_address, $destination_two_address, $departure_periods)
  {
    $sql = "INSERT INTO transport_terminals(category_id, business_id, terminal_name,destination_one,destination_two,destination_one_price, destination_two_price, to_and_fro_price,destination_one_address, destination_two_address, departure_periods) VALUES (?,?,?,?,?,?,?,?,?,?,?) ";
    $stmt = $this->dbObj->dbconnector->prepare($sql);
    if(!$stmt)
    {
      echo " Error ". $this->dbObj->dbconnector->error;
      exit();
    }
    if(!$stmt->bind_param('iisssdddsss',$cat_id, $bus_id, $terminal_name, $destination_one, $destination_two, $destination_one_price, $destination_two_price, $to_and_fro_price, $destination_one_address, $destination_two_address, $departure_periods))
    {
      echo " Error ". $this->dbObj->dbconnector->error;
      exit();
    }
    if(!$stmt->execute())
    {
      echo " Error ". $this->dbObj->dbconnector->error;
      exit();

    }
    else return true;
  }

  public function CreateCategoryThree($event_name,$business_id,$event_host,$event_venue,$event_detail,$event_duration,$vip_price,$vvip_price,$table_price,$special_table1,$special_table_price, $cat_id,$regular_price,$total_tickets,$artistes )
  {
    $sql = "INSERT INTO events(event_name, business_id, event_host, venues,event_details, kick_off_time, vip_price, vvip_price, table_price, special_table, special_table_price, category_id, regular_price,total_tickets, artistes) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    $stmt = $this->dbObj->dbconnector->prepare($sql);
    if(!$stmt)
    {
      echo " Error ". $this->dbObj->dbconnector->error;
      exit();
    }
    if(!$stmt->bind_param('sissssdddsdidss',$event_name,$business_id,$event_host,$event_venue,$event_detail,$event_duration,$vip_price,$vvip_price,$table_price,$special_table1,$special_table_price, $cat_id,$regular_price,$total_tickets,$artistes ))
    {
      echo " Error ". $this->dbObj->dbconnector->error;
      exit();
    }
    if(!$stmt->execute())
    {
      echo " Error ". $this->dbObj->dbconnector->error;
      exit();

    }
    else return true;
  
  }
  public function CreateCategoryFour($cinema_name,$business_id,$movie_title,$cinema_venue,$event_detail,$event_duration,$vip_price,$vvip_price,$table_price,$special_table1,$special_table_price, $cat_id,$regular_price,$total_tickets)
  {
    $sql = "INSERT INTO cenima(event_name, business_id, movie_title, venues,event_details, kick_off_time, vip_price, vvip_price, table_price, special_table, special_table_price, category_id, regular_price,total_tickets) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    $stmt = $this->dbObj->dbconnector->prepare($sql);
    if(!$stmt)
    {
      echo " Error ". $this->dbObj->dbconnector->error;
      exit();
    }
    if(!$stmt->bind_param('sissssdddsdids',$cinema_name,$business_id,$movie_title,$cinema_venue,$event_detail,$event_duration,$vip_price,$vvip_price,$table_price,$special_table1,$special_table_price, $cat_id,$regular_price,$total_tickets))
    {
      echo " Error ". $this->dbObj->dbconnector->error;
      exit();
    }
    if(!$stmt->execute())
    {
      echo " Error ". $this->dbObj->dbconnector->error;
      exit();

    }
    else return true;
  
  }

  public function getBusinessId($user_id)
  {
    $sql = "SELECT business_id, business_name  FROM business_records WHERE user_id =  ? ";
    $stmt = $this->dbObj->dbconnector->prepare($sql);
    if(!$stmt)
    {
      echo " Error ". $this->dbObj->dbconnector->error;
      exit();
      
    }
    if(!$stmt->bind_param('i', $user_id))
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
}