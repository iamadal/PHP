<?php
 /*
  * 01. When nothing is passed to input field the $_POST Global Object Hold nothing returned an empty array Array() 
  * 02. 
  *  
  *  
  *  
  *  
  *  
  */


// Define empty variable

$username = "";
$password = "";


$pass_err = "";
$user_err = "";


// var_dump(empty($username));  // RETURN 1 - Means it is empty ELSE 0
// var_dump(!empty($username));  // RETURN 0 - Means it is empty ELSE 1
                        
// Use ternary Conditional operator to add class to and element
// (Condition) ? (Statement1 - if treu ) : (Statement2 - if false);


 
 if($_SERVER['REQUEST_METHOD'] ==='POST'){
 	// READ Values from Form
 	$username = trim($_POST['txt_user']);
 	$password = trim($_POST['txt_pass']);
 	
 	if((empty($username))){
 		$user_err = "Please enter username";
 	}
 	if(empty($password) || strlen($password) < 8){
 		$pass_err = "Please enter password(must be 8 character)";
 	}
 	// Successful form
 	if(!empty($username) && !empty($password) && strlen($password) >= 8){
 		echo 'Form Successful';
 		
 		// Connect Db and Query -> Set Session and Track Users

 		$conn = new mysqli("localhost","root","5576","mydb");
 		if($conn->connect_error){
 			die('Failed to connect');
 		} else {
 			echo 'Error Name: ' . $conn->error;
 		}
        
        echo $username . " " . password_hash($password, PASSWORD_DEFAULT);
        // Prepare Query

        $sqls = "INSERT INTO users(username,PASSWORD) VALUES(? , ?) ";

        $stmt = $conn->prepare($sqls);  // We can handle errors using if .. else 
        


        $stmt->bind_param("ss",$param_user,$param_pass);                   // We can handle Error with if .. else 

        var_dump($stmt);
        // read from FORM
        $param_pass = $password;
        $param_user = $username;

        // execute query -  we can execute query as many times as we want
 		
 		$stmt->execute();

 


 	}
 }


 ?>



 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 	<title>Form Validation - Server Side</title>
 </head>
 <body>
 	   <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
 	   	  <div class="wrap">
            <!-- On Resubmission. form data will be removed. to keep it place value -->
 	   	  	<input type="text"     name="txt_user" placeholder="username" value=" <?php echo (empty($username)) ? "" : $username ?>" class=" <?php echo (  !empty($user_err)  ) ? 'error' : ''; ?>   "><br><span class="alert"><?php echo $user_err; ?></span><br>
 	   	  	<input type="password" name="txt_pass" placeholder="password" class=" <?php echo (!empty($pass_err)  ) ? 'error' : ''; ?>   "><br><span class="alert"><?php echo $pass_err; ?></span><br>
 	   	  	<input type="radio"> Pushme me 
 	   	  	<input type="submit">
 	   	  	  
 	   	  </div>
 	   </form>
 </body>
 </html>


 <style>
 	* {box-sizing: border-box; padding: 5px; margin: 5px; outline: 0;}
 	
 	.error { border: 1px solid red;}
 	.alert { color: red;}
 </style>