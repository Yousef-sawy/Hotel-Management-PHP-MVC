<!DOCTYPE html>
<html>
<head>
    <title>User Registration Form</title>
    <link rel="stylesheet" href="../form.css">
</head>
<body>
    <h2>User Registration Form</h2>
    
    <?php
    require_once "../models/userType.php";
	$userTypes = userType::getAllUserTypes();
    ?>
    
    <form method="post" action="" onsubmit="return validateForm()">
        <label for="fullname">Full Name:</label>
        <input type="text" id="fullname" name="fullname" required>
        <br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br><br>

        <label for="dob">Date of Birth:</label>
        <input type="date" id="dob" name="dob" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br><br>

        <label for="cpassword">Confirm Password:</label>
        <input type="password" id="cpassword" name="cpassword" required>
        <br>
        <span id='message'></span>
        <br>



        <label for="usertype">User Type:</label>
        <select id="usertype" name="usertype" required>
            <option value="">Select User Type</option>
            <?php
            foreach ($userTypes as $id => $name) {
                echo '<option value="' . $id . '">' . $name . '</option>';
            }
            ?>
        </select>
        <br><br>

        <input type="submit" name="submit" value="Register">
    </form>
    <p>Already have an account? <a href="loginController.php">Login</a></p>

    <script>
        function validateForm() {
            var fullname = document.getElementById('fullname').value;
            var email = document.getElementById('email').value;
            var dob = document.getElementById('dob').value;
            var password = document.getElementById('password').value;
            var cpassword = document.getElementById('cpassword').value;
            var usertype = document.getElementById('usertype').value;
            var message = document.getElementById('message');
            // Check if password and confirm password match
            if (password != cpassword) {
                message.style.color = 'red';
                message.innerHTML = 'Passwords do not match.';
                return false;
            } else {
                message.style.color = 'green';
                message.innerHTML = 'Passwords match!';
            }
            // Check if all form fields are filled
            if (fullname == '' || email == '' || dob == '' || password == '' || cpassword == '' || usertype == '') {
                alert('Please fill all the fields');
                return false;
            }

            return true;
        }
    </script>
</body>
</html>