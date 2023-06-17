<?php
include_once "../models/room.php";
$roomList = room::getRoomList();
$roomTypeList = roomType::getRoomTypeList();

if (isset($_POST['add'])) {
    // Retrieve the form data
    $roomNumber = $_POST['room_number'];
    $roomType = $_POST['room_type'];
    $price = $_POST['price'];
    // Create a new roomType object
    $roomCategoryObj = new roomType($roomType);
    // Create a new room object
    $roomObj = new room("");
    // Set the room category, price, and room number
    $roomObj->setRoomCategoryObj($roomCategoryObj);
    $roomObj->setPrice($price);
    $roomObj->setRoomNumber($roomNumber);
    // Insert the room into the database
    $roomObj->insertNewRecord();

    header("Location: ../admin/addRoom.php");
    exit();
}

if (isset($_GET["delete"])) {
    // Create a new room object
    $roomObj = new room($_GET["id"]);
    // Delete the room record from the database
    $roomObj->deleteRecord();
    // No need to redirect anywhere
    header("Location: ../admin/addRoom.php");
    exit();
}

if (isset($_POST['submit'])) {
    // Retrieve the form data
    $id = $_POST['id'];
    $roomNumber = $_POST['room_number'];
    $roomType = $_POST['room_type'];
    $price = $_POST['price'];
    // Create a new roomType object
    $roomCategoryObj = new roomType($roomType);
    // Create a new room object
    $roomObj = new room($id);
    // Set the room category, price, and room number
    $roomObj->setRoomCategoryObj($roomCategoryObj);
    $roomObj->setPrice($price);
    $roomObj->setRoomNumber($roomNumber);
    // Update the room record in the database
    $roomObj->updateRecord();

    header("Location: ../admin/addRoom.php");
    exit();
}




?>
