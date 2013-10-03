<?php
  $name = $_POST['name'];
  $comment = $_POST['comment'];
  $string = "[{\"name\":\"$name\",\"comment\":\"$comment\"},{\"name\":\"Frederick\",\"comment\":\"Fix This Already!\"},{\"name\":\"Pablo\",\"comment\":\"This needs to work\"},{\"name\":\"Tomas\",\"comment\":\"Why is this not working\"}]";
  echo json_encode($string);
?>