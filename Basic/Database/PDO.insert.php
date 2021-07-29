<?php 
  require_once("PDO.connect.php"); // connect to the database system


  ?>





<!-- Views -->
  <!DOCTYPE html>
  <html lang="en">
  <head>
  	<meta charset="UTF-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  	<title>Data Entry Demo</title>
  </head>
  <body>
  	  <?php echo '<p class="error">' . $error_code . '</p>' ?>
  	  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
          <table>
          	 <tr>
          	 	<td>Name</td>
          	 	<td><input type="text" name="username" placeholder="username"></td>
          	 </tr>
          	 <tr>
          	 	<td>Password</td>
          	 	<td><input type="Password" name="Password" placeholder="Password"></td>
          	 </tr>
          	 <tr>
          	 	<td></td>
          	 	<td><input type="submit"></td>
          	 </tr>
          </table>
  	  </form>
  </body>
  </html>

<style>
	* {outline:0;}
	.error {border: 1px solid red}
	input[type="password"],input[type="text"] {padding: 5px; background-color: #f0f0f0; border: 1px solid #f0f0f0; border-radius: 3px;}
   input[type="password"]:focus,input[type="text"]:focus {border: 1px solid red; transition: all 1s;}	
</style>