<?php
/**
 * Core API - Green University of Bangladesh
 * Author: Team-ARJ, CSE GUB
 * Design Patterns: Observer 
 * 
 */

 abstract class central{
     public abstract function connectSQL($name,$key);
     public abstract function adminLogin($name,$key);
     public abstract function usersLogin($name,$key);

     public  $accessPoint;
     public  $accessPurge;
 }

 interface dbConnection{
     public function checkPDO();
     public function checkPDI();
 }





 class process extends central{
     public function connectSQL($name,$key){ echo $name . $key; }   
     public function adminLogin($name,$key){ echo $name . $key; }   
     public function usersLogin($name,$key){ echo $name . $key; }   
 }
