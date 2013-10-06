<?php
	$name = $_POST['name'];
	$contact = $_POST['contact'];
	$checkin = $_POST['checkin'];
	$checkout = $_POST['checkout'];
	$roomtype = $_POST['roomtype'];
	$json_file_in = "[]";
	$string = "{\"name\":\"$name\",\"contact\":\"$contact\",\"checkin\":\"$checkin\",\"checkout\":\"$checkout\",\"roomtype\":\"$roomtype\"},";
	$return_data = str_replace("[", "[$string", $json_file_in);
	$return_data = str_replace(",]", "]", $return_data);
	echo json_encode($return_data);
?>