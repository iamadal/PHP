<?php
/**
 * 01. PHP Super global Variables - Build in variable and they are available in all scopes
 * 02. $GLOBAL
 * 03. $_SERVER
 * 04. $_COOKIE
 * 05. $_SESSION
 * 06. $_REQUEST
 * 07. $_POST
 * 08. $_GET
 * 09. $_FILES
 * 10. NOTE: Those variables Ordering is very Important.
 * 11. REGISTER GLOBALS(Deprecated);
 * 
 */
?>

<?php
// Using $_GET here is preferred
echo $_GET['animal'];

// For $animal to exist, register_globals must be on
// DO NOT DO THIS
echo $animal;

// This applies to all variables, so $_SERVER too
echo $_SERVER['PHP_SELF'];

// Again, for $PHP_SELF to exist, register_globals must be on
// DO NOT DO THIS
echo $PHP_SELF;
?> 

<?php
// Superglobal $Globsl
function test() {
    $foo = "local variable";

    echo '$foo in global scope: ' . $GLOBALS["foo"] . "\n";
    echo '$foo in current scope: ' . $foo . "\n";
}

$foo = "Example content";
test();
?>


<?php
echo $_SERVER['SERVER_NAME'];
?> 



<?php

echo <<<END
<!DOCTYPE html>
 <meta charset="UTF-8" />
 <title>\$_SERVER</title>
 <style>
     table {
         border-collapse: collapse;
     }
     td {
         border: 1px solid #999;
         padding: 3px;
     }
 </style>
 <table>
END;

 foreach ($_SERVER as $k => $v) {
     $key = htmlentities($k);
     $value = htmlentities($v);
     echo "\n\t<tr>\n\t\t<td>$key\n\t\t<td>$value\n";
 }
 echo "</table>";
?> 



<?php
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
       foo_fetch_stuff()
       break;
 }
# TEST THIS USING CURL -X GET
 ?>


?>