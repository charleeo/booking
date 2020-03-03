<?php
class Database{
  public $dbconnector; //Database connection handler
  public function __construct(){
      $this->dbconnector = new mysqli("127.0.0.1", "root", "", "booking");
      if($this->dbconnector->connect_error)
      {
         
          exit("Connection fails ".$this->dbconnector->connect_error);
      }else{
         return true;
      }
  }
  public static function checkInput($data){
    $data = strip_tags($data);
    $data = trim($data);
    $data = htmlspecialchars($data);
    $data = addslashes($data);
    return	$data;
  }
}
session_start();
require('settings.php');
?>
