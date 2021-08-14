<?php
 switch (trim($_SERVER['REQUEST_URI'])) {
 	case '/create':
 		echo "Add Mode";
 		break;
 		 	case '/ab/jobs':
 		echo "Add Mode for Jobs Selection";
 		add_part("m.php");
 		break;
 	
 	default:
 		echo "Restricted Area";
 		break;
 }


 function add_part($name){
 	 return include $name;
 }