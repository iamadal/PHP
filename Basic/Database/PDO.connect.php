<?php
$servername = "localhost";
$username   = "root";
$password   = "5576";

try {
     $conn = new PDO("mysql:host=$servername;dbname=dbs", $username, $password);
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     echo "Connected successfully";
} catch(PDOException $e) {
     echo "Connection failed: " . $e->getMessage();
}
?>


<?php
 /* 
  * PDO OOP Interface
  * 01. 
  *
  *
  *
  *
  *
  */

 

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>UI</title>
</head>
<body>
	<p>Create Database</p>
	
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
		<input type="text" name="db_name"><br>
	    <input type="text" name="db_pass"><br>
	    <input type="submit" value="Action">
	    <p><?php echo "Name:" . trim($_POST['db_pass']) . "Password:". trim($_POST['db_name']) ?></p>
	</form>
</body>
</html>

<style>
	* {box-sizing: border-box; outline:0px; padding: 5px; margin: 5px}

</style>