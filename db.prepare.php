db.prepare.php
<?php
$db = new PDO("mysql:host=localhost;dbname=db","root","55761910");
$m = $db->prepare("INSERT INTO login (id,username,pswd) VALUES (2,?,?) ");
$p = $m->execute(array("Kooper",md5("mypassword")));
