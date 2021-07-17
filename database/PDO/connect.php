<?php  
try{
 $conn = new PDO("mysql:host=localhost;dbname=crud","root","55716");
 echo 'Successful';
}catch(PDOException $err){
	$err->getMessage();
}