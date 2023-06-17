<?php
include_once "../models/paymentMethod.php";

$PaymentMethod = paymentMethod::getPaymentMethodList();

if (isset($_GET["delete"])) {
    // Create a new user object
    $pay = new paymentMethod($_GET["id"]);
    // Delete the user record from the database
    $pay->deleteRecord();
    // No need to redirect anywhere
    header("Location: ../admin/paymentMethod.php");
    exit();
}

if(isset($_POST['add'])) {
    $PaymentMethod = $_POST['name'];

    if(empty($error)) {
        $pay = new paymentMethod("");
        $pay->setName($PaymentMethod);
        $pay->insertNewRecord();
        header('Location: ../admin/paymentMethod.php');
        exit();
    }    
}
?>