<?php
function auth(){
    header('WWW-Authenticate: Basic realm="Secret Stash"');
    header('HTTP/1.0 401 Unauthorized');
    exit;
}
 
/**
 * if $_SERVER['PHP_AUTH_USER'] is blank , then user not yet been promted for authenticate;
 */
if(!isset($_SERVER['PHP_AUTH_USER'])){
    auth();
}else{
    $db = new mysqli("localhost","root","55761910","db");
    $sm = $db->prepare("SELECT username,pswd From login WHERE username=? AND pswd=md5(?)");
    $sm->bind_param('ss',$_SERVER['PHP_AUTH_USER'],$_SERVER['PHP_AUTH_PW']);
    $sm->execute();
    $sm->store_result();
    if($sm->num_rows == 0) {
        auth();
    }
}