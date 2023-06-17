<?php
session_start(); // start the session
include_once "../models/user.php";
include_once "../models/userType.php";


// check if user is logged in as an admin
if (isset($_SESSION['user_id'])) {
  $user = new user($_SESSION['user_id']);
  $userType = $user->getUserTypeObj()->getId();
  if ($userType != 2) {
      header('Location: loginController.php');
      exit();
  }
}
else {
  header('Location: ../admin/user.php');
  exit();
}

if (isset($_POST['logout'])) { // check if the logout button was clicked
  // Check the validity of the CSRF token here...

  // Unset session variables and destroy the session
  $_SESSION = array();
  session_destroy();

  // Redirect to the login page or homepage
  header('Location: loginController.php');
  exit();
}
?>
