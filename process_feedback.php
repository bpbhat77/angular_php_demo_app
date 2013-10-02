<!-- Todd Pickell -->
<!-- Case Study-->
<!-- CISS298 Web Programming -->
<!-- September 30 2013 -->
<!-- process_feedback.php -->
<?php

  if (!file_exists('feedback.json')) {
    file_put_contents('feedback.json', json_encode("[{\"name\":\"''\",\"comment\":\"''\" }]");
  }
  $json_file_in = file_get_contents('feedback.json');
  $json_data = json_decode($json_file, true);

  echo json_encode("[{\"name\":\"" + $_POST['name'] + "\",\"comment\":\"" + $_POST['comment'] + "\"}]");
  // $json_data[]['name'] = $_POST['name'];
  // $json_data[]['comment'] = $_POST['comment'];

  // file_put_contents('feedback.json', json_encode($json_data, JSON_UNESCAPED_UNICODE);

  // echo $json_data;
?>