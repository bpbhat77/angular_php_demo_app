<!-- Todd Pickell -->
<!-- Case Study-->
<!-- CISS298 Web Programming -->
<!-- September 30 2013 -->
<!-- feedback.php -->
<?php
  //get json from file
  if (!file_exists('feedback.json')) {
    file_put_contents('feedback.json', json_encode("{'feedback' : [{ }] }", JSON_UNESCAPED_UNICODE);
  }
  $json_file_in = file_get_contents('feedback.json');
  $json_data = json_decode($json_file, true);

  //update json with incoming data
  $json_data['feedback'][][$_POST['name']] = $_POST['comment'];

  //write json back to file
  file_put_contents('feedback.json', json_encode($json_data, JSON_UNESCAPED_UNICODE);
  //return updated json to calling code
  echo $json_data;
?>