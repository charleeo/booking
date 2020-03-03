<?php
  header("Content-type:application/json;charset=utf-8");
  require('../../configuration/Database.php');
  require('../queryclasses/User.php');
  $userObject = new User();
  if(isset($_POST))
  {
    $error = false;
    $success = false;
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmpassword'];
    $hashpassword = password_hash($password, PASSWORD_DEFAULT);
    $name = $_POST['name'];
    $user = $userObject->checkIfAUserExist($email);
    $result = $user->num_rows;
    if(empty($name) || empty($email) || empty($password))
    {
      $data['content'] = "All the fields are required";
      $error = true;
      $success = false;
      $data['response'] = 'error';
    }
    else if($result > 0)
    {
      $data['content'] = 'This email address is already taken';
      $error = true;
      $success = false;
      $data['response'] = 'error';
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
      $data['content'] = 'Enter a valid email';
      $error = true;
      $success = false;
      $data['response'] = 'error';
    }
   else if($password !== $confirmPassword)
    {
      $data['content'] = 'Password do not match';
      $error = true;
      $success = false;
      $data['response'] = 'error';
    }
    
    else
    {
      $data['response'] = 'success';
      $data['content'] = "Record created";
      $userObject->registerUser($name, $email, $hashpassword);
    }
    echo json_encode($data);
  }