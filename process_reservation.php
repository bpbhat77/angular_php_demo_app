<?php
	function get_reservations_from_db() {
		$return_data = null;
		$conn = mysqli_connect('localhost', 'root', 'bitnami');
		if ($conn) {
			error_log("Connected to DB sucessfully.", 0);
			if (mysqli_select_db($conn, "hotel");) {
				error_log("Selected hotel DB sucessfully.");
				$get_reservations = "SELECT * FROM `hotel`.`reservations`;";
				$reservations = mysqli_query($conn, $get_reservations);
				if ($reservations) {
					error_log("Reservations retrieved form DB successfully.", 0);
					$return_data = $reservations;
				} else {
					error_log("Failed to retrieve reservations from DB!", 0);
				}
			} else {
				error_log("Failed to select hotel DB!", 0);
			}
		} else {
			error_log("Failed to connect to DB!", 0);
		}
		mysqli_close($conn);
		return $return_data;
	}

	function persist_reservation_to_db() {
		$conn = mysqli_connect('localhost', 'root', 'bitnami');
		if ($conn) {
			error_log("Connected to DB sucessfully.", 0);
			if (mysqli_select_db($conn, "hotel");) {
				error_log("Selected hotel DB sucessfully.");
				$confirmation = uniqid();
				$persist_reservation = "INSERT INTO  `hotel`.`reservations` (
					`Name` ,
					`Contact` ,
					`Checkin` ,
					`Checkout` ,
					`Room Type` ,
					`Confirmation`
					)
					VALUES ("
					$name,
					$contact,
					$checkin,
					$checkout,
					$roomtype,
					$confirmation_number"
					);";
				if (mysqli_query($conn, $persist_reservation)) {
					error_log("Reservation persisted to DB successfully.", 0);
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
	}

	$update = $_POST['update'];
	if ($update == 'true') {
		$name = $_POST['name'];
		$contact = $_POST['contact'];
	    $checkin = $_POST['checkin'];
	    $checkout = $_POST['checkout'];
     	$roomtype = $_POST['roomtype'];
		persist_reservation_to_db();
	}

	$return_data = get_reservations_from_db();
	echo json_encode($return_data);
?>