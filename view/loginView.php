<!DOCTYPE html>
<html>
<head>
	<title>User Login Form</title>
	<link rel="stylesheet" href="../form.css">
	
</head>
<body>
	<h2>User Login Form</h2>
	
	
	
	<form method="post" action="../controller/loginController.php" onsubmit="return validateForm();">
		<label for="email">Email:</label>
		<input type="email" id="email" name="email" ><br><br>
		<label for="password">Password:</label>
		<input type="password" id="password" name="password" ><br><br>
		<input type="submit" name="submit" value="Login">
	</form>
	<script>
		function validateForm() {
			var email = document.getElementById('email').value;
			var password = document.getElementById('password').value;

			if (email === '' || password === '') {
				alert('Please fill in all fields.');
				return false;
			}

			return true;
		}
	</script>
	<p>Don't have an account? <a href="../controller/registerController.php">Register</a></p>
</body>
</html>
