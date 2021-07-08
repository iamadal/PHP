<?php

function foo_replace_data(){
	echo "PUT METHOD";
}

function foo_add_data(){
	echo "POST METHOD";
}

function foo_fetch_stuff(){
	echo "GET METHOD";
}

function foo_set_that_cookie(){
	echo "Foo HEAD";
}

switch ($_SERVER["REQUEST_METHOD"]){
    case "PUT":
        foo_replace_data();
        break;
    case "POST":
        foo_add_data();
        break;
    case "HEAD";
        foo_set_that_cookie();
        break;
    case "GET":
    default:
       foo_fetch_stuff();
       break;
 }


?>