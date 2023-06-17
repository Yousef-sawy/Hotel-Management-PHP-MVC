<?php
include_once "../models/roomType.php";
$roomTypeList = roomType::getRoomTypeList();

if(isset($_POST['add'])) {
    $category = $_POST['category'];

    if(empty($error)) {
        $roomType = new roomType("");
        $roomType->setCategory($category);
        $roomType->insertNewRecord();
        header('Location: ../admin/addRoomCategory.php');
        exit();
    }    
}
if (isset($_GET["delete"])) {
    // Create a new user object
    $roomType = new roomType($_GET["id"]);
    // Delete the user record from the database
    $roomType->deleteRecord();
    // No need to redirect anywhere
    header("Location: ../admin/addRoomCategory.php");
    exit();
}

?>