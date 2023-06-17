<?php

include_once "../models/user.php";
include_once "../models/userType.php";
include_once "../controller/addUserController.php";
$userTypes = userType::getAllUserAdmin();



if (isset($_GET["id"])) {
    $userId = $_GET["id"];
    $user = user::getUserById($userId);
}

if (!$user) {
    echo "Add New User";
    exit();
}


//<link rel="stylesheet" href="../form.css">
?>
<link rel="stylesheet" href="../form.css">
<html>
<body>
    <h2>Update Data</h2>
    <?php if ($user): ?>
        <form method="post" action="../controller/addUserController.php" onsubmit="return validateForm()">
    <label for="fullname">Full Name:</label>
    <input type="text" id="fullname" name="fullname" value="<?php echo $user->getFullName(); ?>">
    <br><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="<?php echo $user->getEmail(); ?>">
    <br><br>

    <label for="dob">Date of Birth:</label>
    <input type="date" id="dob" name="dob" value="<?php echo $user->getDOB(); ?>">

    <label for="usertype">User Type:</label>
    <select id="usertype" name="usertype">
        <option value="">Select User Type</option>
        <?php
        foreach ($userTypes as $id => $name) {
            echo '<option value="' . $id . '">' . $name . '</option>';
        }
        ?>
    </select>
    <br>
    <br>
    <input type="hidden" name="id" value="<?php echo $userId; ?>">
    <input type="submit" name="submit" value="Update">
</form>

    <?php endif; ?>
    


    <script>
        function validateForm() {
            var fullname = document.getElementById('fullname').value;
            var email = document.getElementById('email').value;
            var dob = document.getElementById('dob').value;
            var usertype = document.getElementById('usertype').value;
            var message = document.getElementById('message');

            // Check if all form fields are filled
            if (fullname == '' || email == '' || dob == '' || usertype == '') {
                alert('Please fill all the fields');
                return false;
            }

            return true;
        }
    </script>
</body>
</html>