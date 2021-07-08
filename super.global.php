<?php
/**
 * An associative array of variables passed to the current script via the URL parameters (aka. query string). Note that the array is not only populated for GET requests, but rather for all requests with a query string. 
 * $HTTP_GET_VARS contains the same initial information, but is not a superglobal. (Note that $HTTP_GET_VARS and $_GET are different variables and that PHP handles them as such) 
 */
?>

<?php
// Print_r = Human readable information about a variables
print_r($_GET); // Print all and get type using var_dump()
if($_GET["a"] === "") echo "a is an empty string\n";
if($_GET["a"] === false) echo "a is false\n";
if($_GET["a"] === null) echo "a is null\n";
if(isset($_GET["a"])) echo "a is set\n";
if(!empty($_GET["a"])) echo "a is not empty";
?>









<?php
/**
 * Holds uploaded files information
 */
function incoming_files() {
     $files = $_FILES;
     $files2 = [];
     foreach ($files as $input => $infoArr) {
         $filesByInput = [];
         foreach ($infoArr as $key => $valueArr) {
             if (is_array($valueArr)) { // file input "multiple"
                 foreach($valueArr as $i=>$value) {
                     $filesByInput[$i][$key] = $value;
                 }
             }
             else { // -> string, normal file input
                 $filesByInput[] = $infoArr;
                 break;
             }
         }
         $files2 = array_merge($files2,$filesByInput);
     }
     $files3 = [];
     foreach($files2 as $file) { // let's filter empty & errors
         if (!$file['error']) $files3[] = $file;
     }
     return $files3;
 }

$tmpFiles = incoming_files();
?>







<?php
/**
 * Contain $_POST,$_GET and $_COOKIE
 * We can change THE paresing odeder in php.ini
 */
?>

<?php 
  function add_or_change_parameter($parameter, $value) 
  { 
   $params = array(); 
   $output = "?"; 
   $firstRun = true; 
   foreach($_GET as $key=>$val) 
   { 
    if($key != $parameter) 
    { 
     if(!$firstRun) 
     { 
      $output .= "&"; 
     } 
     else 
     { 
      $firstRun = false; 
     } 
     $output .= $key."=".urlencode($val); 
    } 
   } 
   if(!$firstRun) 
    $output .= "&"; 
   $output .= $parameter."=".urlencode($value); 
   return htmlentities($output); 
  } 
?> 














