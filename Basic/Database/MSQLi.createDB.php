<?php
 /* 
  * MYSQLi OOP Interface
  * 01. Creating Databse
  *
  *
  *
  *
  *
  */

$username = "";
$password = "";


if($_SERVER["REQUEST_METHOD"] === "POST"){
    $username = trim($_POST['admin']);
    $password = trim($_POST['admin_pass']);
}

if(empty($username)){
	$username = "Please inset username";
} 

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
		<input type="text" name="admin" placeholder="username"><br><?php echo $username; ?>
	    <input type="text" name="admin_pass" placeholder="password"><br>
	    <input type="submit" value="Action">
	    <p></p>
	</form>
</body>
</html>

<style>
	* {box-sizing: border-box; outline:0px; padding: 5px; margin: 5px}

</style>

