<?php

$connection = mysqli_connect(
  'localhost', 'root', 'pass', 'crud'
);

// for testing connection
#if($connection) {
#  echo 'database is connected';
#}

?>
