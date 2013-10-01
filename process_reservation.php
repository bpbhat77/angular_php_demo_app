<!-- Todd Pickell -->
<!-- Case Study-->
<!-- CISS298 Web Programming -->
<!-- September 30 2013 -->
<!-- process_reservation.php -->
<? php
	$error_msg = "ERROR";
	$confirmation = "";
	error_log(" Name: " + $_POST['name'] +
			  " Contact: " + $_POST['contact'] +
			  " Checkin: " + $_POST['checkin'] +
			  " Checkout: " + $_POST['checkout'] +
			  " RoomType: " + $_POST['roomtype'], 0);

	$conn = mysqli_connect('localhost', 'root', 'bitnami');
	if ($conn) {
		error_log("Connected to DB sucessfully.", 0);
		if (mysqli_select_db($conn, "hotel");) {
			error_log("Selected hotel DB sucessfully.");
			
			$persist_reservation = "INSERT INTO  `hotel`.`reservations` (
				`Name` ,
				`Contact` ,
				`Checkin` ,
				`Checkout` ,
				`Room Type` ,
				`Confirmation` ,
				`index`
				)
				VALUES (
				" + $_SCOPE['name'] + ",
				" + $_SCOPE['contact'] + ",
				" + $_SCOPE['checkin'] + ",
				" + $_SCOPE['checkout'] + ",
				" + $_SCOPE['roomtype'] + ",
				" + $confirmation_number + ",
				" + $index_number + "
				);";
			if (mysqli_query($conn, $persist_reservation)) {
				error_log("Reservation persisted to DB successfully.", 0);
				$confirmation = "get number from somewhere";
			} else {
				error_log("Reservation failed to persist to DB!", 0);
			}
		} else {
			error_log("Failed to select hotel DB!", 0);
		}
	} else {
		error_log("Failed to connect to DB!", 0);
	}
	mysqli_close($conn);
	if ($confirmation == "") {
		$confirmation = $error_msg;
	}
	echo $confirmation
?>