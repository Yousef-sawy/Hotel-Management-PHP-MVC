<?php
include_once "../models/user.php";
include_once "../models/userType.php";




if (isset($_POST['submit'])) {
    // Retrieve form data
    $id = $_POST['id'];
    $fullName = $_POST['fullname'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $userTypeId = $_POST['usertype'];
    
    // Create a new User object
    $user = user::getUserById($id);
    
    if ($user) {
        // Update the user properties
        $user->setFullName($fullName);
        $user->setDOB($dob);
        $user->setEmail($email);
        $user->setUserTypeObj($userTypeId);
        
        // Save the updated user record
        $user->updateRecord();
    }
    
    // Redirect to the user list page
    header('Location: ../admin/user.php');
    exit();
}

// Check if the delete button was clicked
if (isset($_GET["delete"])) {
    // Create a new user object
    $user = new user($_GET["id"]);
    // Delete the user record from the database
    $user->deleteRecord();
    // No need to redirect anywhere
    header("Location: ../admin/user.php");
    exit();
}


if(isset($_POST['add'])) {
    $FullName = $_POST['fullName'];
    $Email = $_POST['email'];
    $Password = $_POST['password'];
    $DOB =$_POST['dob'];
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
        header('Location: ../admin/user.php');
        exit();
    }    
}
?>



