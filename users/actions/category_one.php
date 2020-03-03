<?php
require_once('../../configuration/Database.php');
require_once('../queryclasses/Reservation.php');
$reservationObj = new Reservation();
$business_id = $reservationObj->getBusinessId(is_logged_in());
$business_id =  $business_id['business_id'];
if(isset($_POST['category-one']))
{
  $error = '';
  $suite_name = trim(Database::checkInput($_POST['suite_name']));
  $suite_category = trim(Database::checkInput($_POST['suite_category']));
  $suite_rooms = trim(Database::checkInput($_POST['suite_rooms']));
  $price = trim(Database::checkInput(formatNumber($_POST['price'])));
  $reservation_duration = trim(Database::checkInput($_POST['duration']));
  $hotel_facility = '';
  if(isset($_POST['hotel_facilities']))
  {
    $hotel_facilities = $_POST['hotel_facilities'];
    $hotel_facility = implode(',', $hotel_facilities);
  }
  $suite_details = trim(Database::checkInput($_POST['suite_details']));
  $reservation_category = trim(Database::checkInput($_POST['reservation_category']));
  // Validate the input fields for data consistency
  if(strlen($suite_name) == '' || empty($suite_category) || strlen($suite_rooms) == ''|| strlen($price) == ''|| empty($reservation_duration) || empty($hotel_facility) || strlen($suite_details) == '')
  {
    $error = "Please fill out all the required fields";
  }
  else if(!is_numeric($price))
  {
    $error = "Please only numbers are allowed in the peice field";
  }
  if(!empty($error))
  {
    $_SESSION['name'] = $suite_name;
    $_SESSION['facility'] = $hotel_facilities;
    $_SESSION['room'] = $suite_rooms;
    $_SESSION['duration'] = $reservation_duration;
    $_SESSION['cat'] = $suite_category;
    $_SESSION['price'] = $price;
    $_SESSION['details'] = $suite_details;
    header("Location: ../../profiles/create_reservation.php?cat_one_error_message=".urlencode( $error));
  }
  else
  {
   $reservationObj->CreateCategoryOne($business_id,$suite_name,$suite_category,$reservation_category,$suite_rooms,$suite_details,$hotel_facility,$price,$reservation_duration);
     unset($_SESSION['name']);
     unset($_SESSION['facility']);
     unset($_SESSION['room']);
     unset($_SESSION['details']);
     unset($_SESSION['price']);
     unset($_SESSION['cat']);
     unset($_SESSION['duration']);
     $_SESSION['success_message'] = "Reservation created successfully";
     header("Location: ../../profiles/dashboard.php");
  }
}
else
{
  echo "Invalid request please try again";
}