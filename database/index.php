<?php
   $user = "root";
   $pass = 55761910;
   $dbh = new PDO('mysql:host=localhost;dbname=mp', $user, $pass);
   if($dbh){
	   echo 'Connected';
   } else {
	   echo 'Disconnected';
   }
   
   $dbh->query('INSERT INTO Name VALUES('Ada'));
   
     foreach($dbh->query('SELECT * from std') as $row) {
		 echo "<br/>";
        print_r($row);
    }
    $dbh = null;