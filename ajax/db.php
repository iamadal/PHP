<?php
  define('DB_NAME','emp');
  define('DB_PASS',5576);
  define('DB_HOST','localhost');
  define('DB_USER','root');

     $con = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
  if($con === false){ die("ERROR: Could not connect. " . mysqli_connect_error()); }
?>