<?php
session_start();
include_once "../models/user.php";
include_once "../view/regView.php";
include_once "../models/userType.php";




//Retrieve form inputs
if(isset($_POST['submit'])) {
    $FullName = $_POST['fullname'];
    $Email = $_POST['email'];
    $Password = $_POST['password'];
    $DOB =$_POST['dob'];
    $CPassword = $_POST['cpassword'];
    $UserType = $_POST['usertype'];


    if(empty($error)) {
        // Create a new user object
        $user = new user("");
        // Set user properties
        $user->setFullName($FullName);
        $user->setEmail($Email);
        $user->setPassword($Password);
        $user->setDOB($DOB);
        $user->setUserTypeObj($UserType);
        // Insert new user record
        $user->insertNewRecord();
        // Redirect to the view page or display a success message
        $_SESSION['user_id'] = $user->getId();
        // Redirect to the view page or display a success message
        header('Location: loginController.php');
        exit();
    }    
}

?>
