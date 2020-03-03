<?php
class User{
  public $dbObj, $name,$email, $phone, $password, $profile_photo ;
  public function __construct(){
     
    $this->dbObj =  new Database;
    } 
  
  public function registerUser($name, $email, $password)
  {
   
    $this->name = $name;
    $this->email = $email;
    $this->password = $password;
    $sql = "INSERT INTO users(name, email, password) VALUES (?,?,?)";
    $stmt = $this->dbObj->dbconnector->prepare($sql);
    if($stmt  && $stmt->bind_param('sss', $name,$email,$password)  && $stmt->execute())
    {
      echo "Success";
    }
    
    else
    {
      echo "Error ". $this->dbObj->dbconnector->error;
    }
  } 
   public function checkIfAUserExist($email){
    $this->email = $email;
    $sql = "SELECT *  FROM USERS WHERE email = ? ";
    $stmt = $this->dbObj->dbconnector->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();    
    return $result;
  }
  public function getUserInfo($user_id)
  {
    $sql = "SELECT `users`.*, `business_records`.`business_id` FROM users INNER JOIN business_records ON business_records.user_id = users.id WHERE users.id = ? ";
    $stmt = $this->dbObj->dbconnector->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt = $stmt->get_result();
    if($stmt->num_rows > 0)
    {
      return $result  = $stmt->fetch_assoc();
    }    
  }
}