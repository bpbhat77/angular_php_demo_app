<!DOCTYPE html>
<!-- Todd Pickell -->
<!-- Case Study-->
<!-- CISS298 Web Programming -->
<!-- September 30 2013 -->
<html>
	<head>
		<title>Cougar Inn login</title>
	</head>
	<body>
		<? php
			session_start();
			if (isset($_SESSION['error_message'])) {
				echo "<p>".$_SESSION['error_message']."</p>";
			}
		?>
		<form action="logincustomer.php" method="post">
			<p>
				User Name: <input type="text" name="user_name"/>
				<br>Password: <input type="password" name = "password"/>
			</p>
			<p><input type="submit" name="submit" value="Submit"/></p>
		</form>
	</body>
</html>