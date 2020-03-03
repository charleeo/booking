<?php
require_once('../../configuration/Database.php');
require_once('../queryclasses/Reservation.php');
$reservationObj = new Reservation();
$business_id = $reservationObj->getBusinessId(is_logged_in());
$business_id =  $business_id['business_id'];
if(isset($_POST['category-two']))
{
  $error = '';
  $terminals = trim(Database::checkInput($_POST['terminals']));
  $destination_one = trim(Database::checkInput($_POST['destination_one']));
  $destination_two = trim(Database::checkInput($_POST['destination_two']));
  $price_to_one = trim(Database::checkInput(formatNumber($_POST['price_to_one'])));
  $price_to_two = trim(Database::checkInput($_POST['price_to_two']));
  $price_to_and_fro = trim(Database::checkInput($_POST['price_to_and_fro']));
  $destination_one_address = trim(Database::checkInput($_POST['destination_one_address']));
  $destination_two_address = trim(Database::checkInput($_POST['destination_two_address']));
  $departure_time = '';
  if(isset($_POST['departure_times']))
  {
    $departure_times = $_POST['departure_times'];
    $departure_time = implode(',', $departure_times);
  }
  // print_r($departure_time); exit;

  $reservation_category = trim(Database::checkInput($_POST['category_id']));
  // Validate the input fields for data consistency
  if(strlen($terminals) == '' || empty($departure_time) || strlen($price_to_one) == ''|| strlen($price_to_two) == ''|| empty($price_to_and_fro) || empty($destination_one) || strlen($destination_two) == '' || empty($destination_one_address) || empty($destination_two_address))
  {
    $error = "Please fill out all the required fields";
  }
  else if(!is_numeric($price_to_and_fro))
  {
    $error = "Please only numbers are allowed in the peice field";
  }
  if(!empty($error))
  {
    $_SESSION['dept'] = $departure_times;
    $_SESSION['dst1'] = $destination_one;
    $_SESSION['dst2'] = $destination_two;
    $_SESSION['dst1p'] = $price_to_one;
    $_SESSION['dst2p'] = $price_to_two;
    $_SESSION['dst1a'] = $destination_one_address;
    $_SESSION['dst2a'] = $destination_two_address;
    $_SESSION['ptf'] = $price_to_and_fro;
    $_SESSION['terminal'] = $terminals;
    header("Location: ../../profiles/create_reservation.php?cat_two_error_message=".urlencode( $error));
  }
  else
  {
    $reservationObj->CreateCategoryTwo($reservation_category,$business_id,$terminals,$destination_one,$destination_two,$price_to_one,$price_to_two,$price_to_and_fro,$destination_one_address,$destination_two_address,$departure_time);
     unset($_SESSION['terminal']);
     unset($_SESSION['ptf']);
     unset($_SESSION['dst2a']);
     unset($_SESSION['dst1a']);
     unset($_SESSION['dst1p']);
     unset($_SESSION['dst2p']);
     unset($_SESSION['dst2']);
     unset($_SESSION['dst1']);
     unset($_SESSION['dept']);
     $_SESSION['success_message'] = "Terminal  created successfully";
     header("Location: ../../profiles/dashboard.php");
  }
}
else
{
  echo "Invalid request please try again";
}