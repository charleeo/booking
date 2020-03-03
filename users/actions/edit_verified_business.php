<?php
require_once('../../configuration/Database.php');
require('../queryclasses/Verify.php');
$verifiedBusiness = new Verify();
if(isset($_POST['update_my_business']))
{
  $email = Database::checkInput($_POST['email']);
  $business_phone = Database::checkInput($_POST['business_phone']);
  $description = Database::checkInput($_POST['description']);
  $business_id = Database::checkInput($_POST['business_id']);
  $business_name = Database::checkInput($_POST['business_name']);
  $business_address = Database::checkInput($_POST['business_address']);
  $states = Database::checkInput($_POST['states']);
  $local_government = Database::checkInput($_POST['local_government']);
  $registration_number = Database::checkInput($_POST['registration_number']);
  $error = '';
  if(empty($email) || empty($business_address) || empty($description)  || empty($business_name) || empty($states)  || empty($local_government) || empty($business_phone))
  {
    $error = "All fields with * are required ";
  }
  else if(!filter_var($email, FILTER_VALIDATE_EMAIL))
  {
    $error = "Please use a valid email address";
  }
  else if(!is_numeric($business_phone))
  {
    $error = "Please only numeric values can be used as phone number";
  }
  else if(strlen($business_name) < 2 || strlen($business_name) > 200)
  {
    $error = "character for the business name field should between 2 and 200";
  }
  else if(strlen($business_phone) < 9 || strlen($business_phone) > 16)
  {
    $error = "character for the business Phone field should between 9 and 16";
  }
  else if(strlen($business_address) < 10 || strlen($business_address) > 200)
  {
    $error = "character for the business address field should between 10 and 200";
  }
  if($error)
  {
    $_SESSION['email'] = $email;
    $_SESSION['business_id'] = $business_id;
    $_SESSION['business_phone'] = $business_phone;
    $_SESSION['business_address'] = $business_address;
    $_SESSION['business_name'] = $business_name;
    $_SESSION['local_government'] = $local_government;
    $_SESSION['states'] = $states;
    $_SESSION['registration_number'] = $registration_number;
    $_SESSION['description'] = $description;
    header("Location: ../../profiles/edit_verified_business.php?error_message=".urlencode($error));
  }
  else
  { 
    unset($_SESSION['email']);
    unset($_SESSION['business_phone']);
    unset($_SESSION['business_address']);
    unset($_SESSION['business_name']);
    unset($_SESSION['local_government']);
    unset($_SESSION['states']);
    unset($_SESSION['registration_number']);
    unset($_SESSION['description']);
    $message = "Verification information updated successfully";
    $verifiedBusiness->updateBusiness($business_name, $email, $business_phone,$registration_number,$local_government,$states,$description,$business_address,$business_id);
    header("Location: ../../profiles/dashboard.php?success_message=". urlencode($message));
  }
}
else echo"Not working";