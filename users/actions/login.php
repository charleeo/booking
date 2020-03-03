<?php
  require('../../configuration/Database.php');
  require('../queryclasses/User.php');
  $error = '';
  $userObject = new User();
if(isset($_POST['login']))
{
  $email = Database::checkInput($_POST['email']);
  $password = Database::checkInput($_POST['password']);
  $user = $userObject->checkIfAUserExist($email);
  $user = $user->fetch_assoc();
  if(empty($password) || empty($email) )
  {
    $error= "All fields are required";
  }
  else if(!$user)
  {
    $error = "No User with this  record is found";
  }
  else if(!password_verify($password, $user['password']))
  {
    $error = "Invalid Credentials, please check your inputs";
  }
  if(!empty($error))
  {
    $_SESSION['password'] = $password;
    $_SESSION['email'] = $email;
    header("Location: ../../index.php?error=".$error);
  }
  else
  {
    $_SESSION['user_id'] = $user['id'];
    header('Location: ../../profiles/dashboard.php');
  }
}