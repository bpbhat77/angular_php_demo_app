<?php
	$json_file_in = file_get_contents('feedback.json');
	if (!$json_file_in) {
		file_put_contents('feedback.json', "[]");
		$json_file_in = file_get_contents('feedback.json');
	}

	if ($_POST['update'] == 'true') {
		$name = $_POST['name'];
		$comment = $_POST['comment'];
		$json_update = "{\"name\":\"$name\",\"comment\":\"$comment\"},";
		$return_data = str_replace("[", "[$json_update", $json_file_in);
		$return_data = str_replace(",]", "]", $return_data);
		file_put_contents('feedback.json', $return_data);
	} else {
		$return_data = $json_file_in;
	}
	echo json_encode($return_data);
?>