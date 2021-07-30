
<?php

$username = "";
$password = "";

$username = trim($_POST['username']);
$password = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);

echo $password;
// connect to database - no error handling

$conn = new mysqli("localhost","root","55761910","mydb");

mail("mdadalkahn@gmail.com","Sent from PHP");
   
?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
   <input type="text" name="username" placeholder="username"><br>
   <input type="text" name="password" placeholder="password"><br>
   <input type="submit">
</form>


<style>
		* {box-sizing: border-box; padding: 5px; margin: 5px; outline: 0;}
</style>

