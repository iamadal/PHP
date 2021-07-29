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

  $m = new mysqli("localhost","root","5576");

  // Error Handling

  if($m->connect_error){
  	 die( "Failed to connect");
  } else {
  	echo "Connected with Localhost<br>";
  }


// QUERY

  $sql = "SHOW DATABASES";

  // $result = ($m->query($sql));
  // var_dump($result);

  // return value from query TRUE is Success and FALSE if fail

  // mysqli_result Object ( [current_field] => 0 [field_count] => 1 [lengths] => [num_rows] => 6 [type] => 0 )



// Create Database
  $sqlCreateDB = "CREATE DATABASE mydb";

  if($m->query($sqlCreateDB) === TRUE){
  	 echo "Database Created - Creating Tables";
  } else {
  	 echo "Database exists<br>";
  }


  // Create Table - But close connection and connect using database name



 

$con = new mysqli("localhost","root","5576","mydb");

$create_table = "CREATE TABLE `users` (
	`ID` INT(10) NOT NULL,
	`username` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`password` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`state` VARCHAR(50) NOT NULL DEFAULT 'p' COLLATE 'latin1_swedish_ci',
	`role` VARCHAR(20) NOT NULL DEFAULT 'user' COLLATE 'latin1_swedish_ci',
	`joined` DATE NOT NULL DEFAULT current_timestamp(),
	PRIMARY KEY (`ID`) USING BTREE
)
COLLATE='latin1_swedish_ci'
ENGINE=InnoDB
";

    
    if($con->query($create_table) === TRUE){
    	echo "Created Successfully<br>";
    } else {
    	echo "Table exist<br> " . $m->error;
    }

  // Adding Super user - using prepared statements is preferred. 
  // Prepare a Query and Insert IT
  // Prepare and Bind using ? placement operator
  /*
   * 01. Prepare Statement  stmt = $con->prepare(query)
   * 02. Bind Parameters then set parameter values $stmt = $con->bind_param  and place values
   * 03. Execute Query $stmt->execute() again set param and excute
   * 04. Bind result to a variable
   * 05. fetch value
   * 06. Print Result
   * 07. i - integer  d -double , s - string , b - blob
   *
   */

   stmt = $con->prepare(INSERT INTO users(username,password,state,role) VALUES(?,?,?,?) );
    

   $add_admin = "INSERT INTO users(username,password,state,role)" ;
  

  $con->close(); // close connection



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