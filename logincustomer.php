<!-- Todd Pickell -->
<!-- Case Study-->
<!-- CISS298 Web Programming -->
<!-- September 30 2013 -->
<? php
	if (isset($_POST['submit'])) {
		session_start();
		$name = $_POST['user_name'];
		$pw = $_POST['password'];
		$fn = "C:\data\student.txt"
	}
	if (file_exists($fn) && is_readable($fn)) {
		$arr_student = file($fn);
		for ($i=0; $i < count($arr_student); $i += 2) {
			if (trim($arr_student[$i]) == $name && trim($arr_student[$i + 1] == $pw)) {
				$_SESSION['student'] = $name;
				header("Location: main.php");
			}
		}
	}
	if (!isset($_SESSION['student'])) {
		$_SESSION['error_message'] = "Invalid username or password";
		header("Location: login.php");
	}