<?php  
try{
 $conn = new PDO("mysql:host=localhost;dbname=crud","root","5576");
 echo 'Successful';
}catch(PDOException $err){
	$err->getMessage();
}