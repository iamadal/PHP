
<?php
function database($host,$user,$password,$db_name){
     try { /*Try to connect to the Server*/
           $conn = new PDO("mysql:host=$host;dbname=$db_name",$user,$password);
           $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           /* execute your required operation*/
           $sql = "DROP TABLE crud_contact";
           $conn->exec($sql);
           /*end of our operation. if successful close the connection*/
     } catch(PDOException $err){
           $err->getMessage(); /*Error handling*/
     }
           $conn = null;
}

database("localhost","root","576","crud");