<?php
include_once "../models/booking.php";
include_once "../models/paymentMethod.php";
include_once "../controller/bookingController.php";

if (isset($_GET["id"])) {
    $bookingId = $_GET["id"];
    $book = booking::getBookingById($bookingId);

}
if (!$book) {
    echo "Booking not found";
    exit();
}
?>

<link rel="stylesheet" href="../form.css">
<html>
<head>
    <script>
    function validateForm() {
        var guestId = document.forms["bookingForm"]["guest_id"].value;
        var bookingDate = document.forms["bookingForm"]["booking_date"].value;
        var duration = document.forms["bookingForm"]["duration"].value;
        var checkInDate = document.forms["bookingForm"]["check_in"].value;
        var checkOutDate = document.forms["bookingForm"]["check_out"].value;
        var roomsBooked = document.forms["bookingForm"]["rooms_booked"].value;
        //var amount = document.forms["bookingForm"]["amount"].value;
        var paymentType = document.forms["bookingForm"]["payment_type"].value;

        if (guestId === "") {
            alert("Please enter the Guest ID.");
            return false;
        }

        if (bookingDate === "") {
            alert("Please select the Booking Date.");
            return false;
        }

        if (duration === "") {
            alert("Please enter the Duration of Stay.");
            return false;
        }

        if (checkInDate === "") {
            alert("Please select the Check-in Date.");
            return false;
        }

        if (checkOutDate === "") {
            alert("Please select the Check-out Date.");
            return false;
        }

        if (roomsBooked === "" || roomsBooked < 1) {
            alert("Please enter a valid number of Total Rooms Booked.");
            return false;
        }

        

        if (paymentType === "") {
            alert("Please select the Payment Type.");
            return false;
        }

        // Calculate the duration of stay
        var duration = (new Date(checkOutDate) - new Date(checkInDate)) / (1000 * 60 * 60 * 24);
        document.forms["bookingForm"]["duration"].value = duration;

        return true;
    }

    function calculateDuration() {
        var checkInDate = document.getElementById("check_in").value;
        var checkOutDate = document.getElementById("check_out").value;

        if (checkInDate && checkOutDate) {
            var duration = (new Date(checkOutDate) - new Date(checkInDate)) / (1000 * 60 * 60 * 24);
            document.getElementById("duration").value = duration;
        }
    }
    </script>
</head>
<body>
    <h2>Update Booking</h2>
    <?php if ($book): ?>
    <form method="post" id="bookingForm" action="../controller/bookingController.php" onsubmit="return validateForm()">
        
        <label for="guest_id">Guest ID:</label>
        <input type="text" name="guest_id" value="<?php echo $book->getGuestIdObj()->getId(); ?>">
        <br>
        <br>
        <label for="booking_date">Booking Date:</label>
        <input type="date" name="booking_date" value="<?php echo $book->getBookingDate(); ?>">
        <br>
        <br>
        <label for="duration">Duration of Stay (in days):</label>
        <input type="number" id="duration" name="duration" value="<?php echo $book->getDurationOfStay(); ?>" readonly>
        <br>
        <br>
        <label for="check_in">Check-in Date:</label>
        <input type="date" id="check_in" name="check_in" value="<?php echo $book->getCheckInDate(); ?>" onchange="calculateDuration()">
        <br>
        <br>
        <label for="check_out">Check-out Date:</label>
        <input type="date" id="check_out" name="check_out" value="<?php echo $book->getCheckOutDate(); ?>" onchange="calculateDuration()">
        <br>
        <br>
        <label for="rooms_booked">Total Rooms Booked:</label>
        <input type="number" name="rooms_booked" value="<?php echo $book->getTotalRoomsBooked(); ?>">
        <br>
        <br>
        <br>
        <br>
        <label for="payment_type">Payment type:</label>
        <select name="payment_type" required class="form-control">
            <option value="">Select Payment Method</option>
            <?php
            foreach ($payment as $pay) {
                echo '<option value="' . $pay->getId() . '">' .$pay->getName(). '</option>';
            }
            ?>
        </select>
        <br>
        <br>
        <input type="hidden" name="id" value="<?php echo $bookingId; ?>">
        <input type="submit" name="submit" value="Update">
    </form>
    <?php endif; ?>
</body>
</html>
