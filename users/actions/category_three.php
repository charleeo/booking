<?php
require_once('../../configuration/Database.php');
require_once('../queryclasses/Reservation.php');
$reservationObj = new Reservation();
$business_id = $reservationObj->getBusinessId(is_logged_in());
$business_id =  $business_id['business_id'];
if(isset($_POST['create_category-3']))
{
  $error = '';
  $event_name = trim(Database::checkInput($_POST['event_name']));
  $event_host = trim(Database::checkInput($_POST['event_host']));
  $artistes = trim(Database::checkInput($_POST['performing_artistes']));
  $regular_price = trim(Database::checkInput(formatNumber($_POST['regular_price'])));
  $vip_price = trim(Database::checkInput($_POST['vip_price']));
  $vvip_price = trim(Database::checkInput($_POST['vvip_price']));
  $table_price = trim(Database::checkInput($_POST['table_price']));
  $special_table1 = trim(Database::checkInput($_POST['special_table1']));
  $special_table_price = trim(Database::checkInput($_POST['special_table_price']));
  $event_duration = trim(Database::checkInput($_POST['event_duration']));
  $event_venue = trim(Database::checkInput($_POST['event_venue']));
  $total_tickets = trim(Database::checkInput($_POST['total_tickets']));
  $event_detail = trim(Database::checkInput($_POST['event_detail']));

  $cat_id = trim(Database::checkInput($_POST['category_id']));
  // Validate the input fields for data consistency
  if(strlen($event_detail) == '' || empty($total_tickets) || strlen($event_venue) == ''|| strlen($event_duration) == '' || strlen($table_price) == '' || empty($vvip_price) || empty($vip_price) || empty($regular_price) || empty($artistes) || empty($event_host) || empty($event_name))
  {
    $error = "Please fill out all the required fields";
  }
  else if(!empty($special_table1) && empty($special_table_price))
  {
    $error = "The special table price field is required";
  }
  else if(empty($special_table1) && !empty($special_table_price))
  {
    $error = "If the special table price is not empty, the special table field must not also be empty";
  }
  else if(!is_numeric($table_price) || !is_numeric($vip_price) || !is_numeric($special_table_price) || !is_numeric($vvip_price))
  {
    $error = "Please only numbers are allowed in the prices fields";
  }
  if(!empty($error))
  {
    $_SESSION['event_name'] = $event_name;
    $_SESSION['event_host'] = $event_host;
    $_SESSION['duration'] = $event_duration;
    $_SESSION['regular'] = $regular_price;
    $_SESSION['details'] = $event_detail;
    $_SESSION['tickets'] = $total_tickets;
    $_SESSION['venue'] = $event_venue;
    $_SESSION['vvip'] = $vvip_price;
    $_SESSION['vip'] = $vip_price;
    $_SESSION['table'] = $table_price;
    $_SESSION['sptable'] = $special_table1;
    $_SESSION['artistes'] = $artistes;
    $_SESSION['sptableprice'] = $special_table_price;
    header("Location: ../../profiles/create_reservation.php?cat_three_error_message=".urlencode( $error));
  }
  else
  {
    $reservationObj->CreateCategoryThree($event_name,$business_id,$event_host,$event_venue,$event_detail,$event_duration,$vip_price,$vvip_price,$table_price,$special_table1,$special_table_price, $cat_id,$regular_price,$total_tickets,$artistes );
     unset($_SESSION['event_name']);
     unset($_SESSION['event_host']);
     unset($_SESSION['duration']);
     unset($_SESSION['regular']);
     unset($_SESSION['details']);
     unset($_SESSION['tickets']);
     unset($_SESSION['venue']);
     unset($_SESSION['vvip']);
     unset($_SESSION['vip']);
     unset($_SESSION['table']);
     unset($_SESSION['sptable']);
     unset($_SESSION['artistes']);
     unset($_SESSION['sptableprice']);
     $_SESSION['success_message'] = "Event created successfully";
     header("Location: ../../profiles/dashboard.php");
  }
}
else
{
  echo "Invalid request please try again";
}