<?php
$db = new PDO("mysql:host=localhost;dbname=db","root","55761910");
function insert($id,$username,$password,$db){
    $m = $db->prepare("INSERT INTO login (id,username,pswd) VALUES (?,?,?) ");
    $p = $m->execute(array($id,$username,md5($password)));
}

insert(6,"Samsusssssa","988",$db);