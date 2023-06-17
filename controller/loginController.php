<?php
session_start();
include_once "../models/user.php";
include_once "../models/userType.php";
include_once "../view/loginView.php";




if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Email = $_POST['email'];
    $Password = $_POST['password'];


    $user = new user("");
    
    if (!empty($Email) && !empty($Password)) {
        // Check if email and password exist in the database
        if (user::isDataExists($Email, $Password)) {
            // Retrieve user object from the database
            $conn = DB::getConnection();
            $sql = "SELECT * FROM user WHERE email = '$Email'";
            $result = $conn->query($sql);
            $userInfoObj = $result->fetch_assoc(); 
    
            $user = new user($userInfoObj['id']);
            $userId = $user->getId();
            $_SESSION["user_id"] = $userId;
            // Check user type and redirect accordingly
            $userType = $user->getUserTypeObj()->getId();
            if ($userType == 1) {
                
                header('Location: ../main/index.php');
                exit();
            } elseif ($userType == 2) {
                header('Location: ../admin/user.php');
                exit();
            }
        }
    }
}
/*







if (!empty($Email) && !empty($Password)) {
        // Check if email and password exist in the database
        if (user::isDataExists($Email, $Password)) {
            // Retrieve user object from the database
            $conn = DB::getConnection();
            $sql = "SELECT * FROM user WHERE email = '$Email'";
            $result = $conn->query($sql);
            $userInfoObj = $result->fetch_assoc(); 
            
            

            $user = new user($userInfoObj['id']);
            $userId = $user->getId();
            $_SESSION["user_id"] = $userId;

            // Check user type and redirect accordingly
            $userType = $user->getUserTypeObj()->getId();
            if ($userType == 1) {
                header('Location: ../main/booking.php?user_id=' . $userId);
                exit();
            } elseif ($userType == 2) {
                header('Location: ../admin/user.php');
                exit();
            }
        }
    }























$_SESSION['user_id'] = $user->getUniqueId();

            $_SESSION['user_id'] = $user->getId(); // Store user ID in session

 $user_id = $user->getUniqueId();
                $booking_url = '../main/booking.php';
                $_SESSION['user_id'] = $user_id;
                header('Location: ' . $booking_url);
                
                //header('Location: ' . $booking_url);
                //$booking_url = '../main/booking.php?user_id=' . $user_id;
                //$index_url = '../main/index.php';
                // Store index URL in session variable
                //$_SESSION['index_url'] = $index_url;*/
?>


