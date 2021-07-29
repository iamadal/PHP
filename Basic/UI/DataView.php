<?php
  $conn = new mysqli("localhost","root","5576","mydb");
  
  $result = $conn->query("SELECT username,role,state,joined FROM users",MYSQLI_USE_RESULT); // for big data
  
  $row = $result->fetch_array();

  foreach ($row as $key => $value) {
  	ec
  }


  var_dump($row);
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Data View</title>
</head>
<body>
	
</body>
</html>