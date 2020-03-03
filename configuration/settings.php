<?php
define('BASEURL', $_SERVER['DOCUMENT_ROOT'].'/bookme/');

function is_logged_in()
{
  if(isset($_SESSION['user_id']) && $_SESSION['user_id'] > 0){
   return  true ;  
  }
  return false;
}

function login_error_redirect($user_id)
{
  if(!is_logged_in())
  {
    $_SESSION['error_message'] = "Please login";
    header("Location: ../index.php");
  }
}
function displayMessage()
{
  if(isset($_SESSION['success_message']))
  {
    echo '<p class="alert alert-success text-center text-secondary">'. $_SESSION['success_message'].'</p>';
    unset($_SESSION['success_message']);
  }
  else if(isset($_SESSION['error_message']))
  {
    echo '<p class="alert alert-danger text-center text-secondary">'. $_SESSION['error_message'].'</p>';
    unset($_SESSION['error_message']);

  }
  else
  {
    echo '';
  }
}

$reservationCategory = [1 => 'Hotels', 2 => 'Transportation', 3 => 'Events', 4 => 'Cinema' ];
$hotelFacilities = ['Free Wifi', 'AC Filted', 'Swimming Pool', 'Sporting Activities', 'Weekend Entertainment', 'Break Fast', 'Lunch', 'Dinner'];
$suite_category = [1 => 'VIP', 2 => 'Singles', 3 => 'Family', 4  => "Louge", 5 => 'Halls', 6 => 'Double'];
$departure_time = ['5:30', '60:00', '60:30', '7:00', '7:30', '8:00', '8:30', '9:00', '9:30', '10:00', '10:30', '11:00', '11:30', '12:00'];

function formatNumber($a){
    if(preg_match("/^[0-9,]*$/", $a)){
        $a =str_replace(',', '', $a);
    }
    return $a;
}

function getError($error)
{
  if(!empty($error))
  {

     $error = $error;
  }
  else
  {
    $error = '';
  }
  return $error;
}

function echoSession($session)
{
  if(isset($_SESSION[$session]))
  {
    return $_SESSION[$session];
  }
  else return '';
}

function returnUrl($url)
{
  if(isset($_GET[$url])){
    return $_GET[$url];
  }
}

