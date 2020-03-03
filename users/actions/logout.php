<?php
  require('../../configuration/Database.php');
  require('../queryclasses/User.php');
  unset($_SESSION['user_id']);
  $message = "Logged Out Successful";
  header('Location: ../../index.php?message='.urlencode($message));