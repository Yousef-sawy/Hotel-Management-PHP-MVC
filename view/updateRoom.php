<?php

include_once "../models/room.php";
include_once "../models/roomType.php";
include_once "../controller/roomController.php";



if (isset($_GET["id"])) {
    $roomId = $_GET["id"];
    $room = room::getRoomById($roomId);
}

if (!$room) {
    echo "Add New User";
    exit();
}



?>
<link rel="stylesheet" href="../form.css">
<html>
<body>
    <h2>Update Data</h2>
    <?php if ($room): ?>
        <form method="post" action="../controller/roomController.php" onsubmit="return validateForm()">
    <label for="Room Number">Room Number:</label>
    <input type="text"  name="room_number" value="<?php echo $room->getRoomNumber(); ?>">
    <br>
    <br>

    <label for="price">Price:</label>
    <input type="text"  name="price" value="<?php echo $room->getPrice(); ?>">
    <br>
    <br>

    <label for="room_type">Room Type:</label>
            <select name="room_type" required>
            <option value="">Select Room Type</option>
            <?php
            foreach ($roomTypeList as $roomType) {
                echo '<option value="' . $roomType->getId() . '">' . $roomType->getCategory() . '</option>';
            }
        ?>
            </select>
    <br>
    <br>
    <input type="hidden" name="id" value="<?php echo $roomId; ?>">
    <input type="submit" name="submit" value="Update">
</form>

    <?php endif; ?>
    


    
</body>
</html>