<?php
  $name = $_SCOPE['name'];
  $contact = $_SCOPE['contact'];
  $checkin = $_SCOPE['checkin'];
  $checkout = $_SCOPE['checkout'];
  $roomtype = $_SCOPE['roomtype'];
  $string = "[{\"name\":\"$name\",\"contact\":\"$contact\",\"checkin\":\"$checkin\",\"checkout\":\"$checkout\",\"roomtype\":\"$roomtype\"}]";
  echo json_encode($string);
?>