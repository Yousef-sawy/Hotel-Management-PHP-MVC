<?php
include_once "../models/booking.php";
include_once "../models/paymentMethod.php";
include_once "../models/user.php";

$booking = booking::getBookingList();
$payment = paymentMethod::getPaymentMethodList();



if (isset($_GET["delete"])) {
    // Create a new room object
    $booking = new booking($_GET["id"]);
    // Delete the room record from the database
    $booking->deleteRecord();
    // No need to redirect anywhere
    header("Location: ../admin/Booking.php");
    exit();
}


if (isset($_POST['submit'])) {
    // Retrieve the form data
    $id = $_POST['id'];
    $guest_id = $_POST["guest_id"];
    $booking_date = $_POST["booking_date"];
    $duration = $_POST["duration"];
    $check_in = $_POST["check_in"];
    $check_out = $_POST["check_out"];
    $rooms_booked = $_POST["rooms_booked"];
    $payment_type = $_POST["payment_type"];

    // Create a new roomType object
    $BookingPaymentMethodObj = new paymentMethod($payment_type);
    // Create a new room object
    $booking = new booking($id);

    $booking->setGuestIdObj($guest_id);
    $booking->setBookingDate($booking_date);
    $booking->setDurationOfStay($duration);
    $booking->setCheckInDate($check_in);
    $booking->setCheckOutDate($check_out);
    $booking->setTotalRoomsBooked($rooms_booked);
    
    $booking->setBookingPaymentMethodObj($payment_type);

    // Update the room record in the database
    $booking->updateRecord();

    header("Location: ../admin/Booking.php");
    exit();
}


if (isset($_POST["add"])) {
    $guestId = ($_POST["guest_id"]);
    $bookingDate = $_POST["booking_date"];
    $duration = $_POST["duration"];
    $checkInDate = $_POST["check_in"];
    $checkOutDate = $_POST["check_out"];
    $roomsBooked = $_POST["rooms_booked"];


    $paymentMethodId = new PaymentMethod($_POST["payment_type"]);
    $Guest = new user($_POST["guest_id"]);

    if (empty($error)) {
        $booking = new Booking("");
        $booking->setGuestIdObj($Guest);
        $booking->setBookingDate($bookingDate);
        $booking->setDurationOfStay($duration);
        $booking->setCheckInDate($checkInDate);
        $booking->setCheckOutDate($checkOutDate);
        $booking->setTotalRoomsBooked($roomsBooked);
        
        $booking->setBookingPaymentMethodObj($paymentMethodId);

        $booking->insertNewRecord();

        header("Location: ../admin/Booking.php");
        exit();
    }
}
if (isset($_POST["new"])) {
    $guestId = ($_POST["guest_id"]);
    $bookingDate = $_POST["booking_date"];
    $duration = $_POST["duration"];
    $checkInDate = $_POST["check_in"];
    $checkOutDate = $_POST["check_out"];
    $roomsBooked = $_POST["rooms_booked"];


    $paymentMethodId = new PaymentMethod($_POST["payment_type"]);
    $Guest = new user($_POST["guest_id"]);

    if (empty($error)) {
        $booking = new Booking("");
        $booking->setGuestIdObj($Guest);
        $booking->setBookingDate($bookingDate);
        $booking->setDurationOfStay($duration);
        $booking->setCheckInDate($checkInDate);
        $booking->setCheckOutDate($checkOutDate);
        $booking->setTotalRoomsBooked($roomsBooked);
        
        $booking->setBookingPaymentMethodObj($paymentMethodId);

        $booking->insertNewRecord();

        header("Location: ../main/booking.php");
        exit();
    }
}


























?>