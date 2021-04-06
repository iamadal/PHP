
 <?php
 $a = 1234; // decimal number
 $a = -123; // a negative number
 $a = 0123; // octal number (equivalent to 83 decimal)
 $a = 0x1A; // hexadecimal number (equivalent to 26 decimal)
 $a = 0b11111111; // binary number (equivalent to 255 decimal) 
 ?> 

 Warning 
Prior to PHP 7, if an invalid digit was given in an octal integer (i.e. 8 or 9), the rest of the number was ignored. Since PHP 7, a parse error is emitted. 

<!-- Integre overflow 32 bit -->
<?php
$large_number = 2147483647;
var_dump($large_number);                     // int(2147483647)

$large_number = 2147483648;
var_dump($large_number);                     // float(2147483648)

$million = 1000000;
$large_number =  50000 * $million;
var_dump($large_number);                     // float(50000000000)
?> 


<!-- Integre overflow 64 bit -->

<?php
$large_number = 9223372036854775807;
var_dump($large_number);                     // int(9223372036854775807)

$large_number = 9223372036854775808;
var_dump($large_number);                     // float(9.2233720368548E+18)

$million = 1000000;
$large_number =  50000000000000 * $million;
var_dump($large_number);                     // float(5.0E+19)
?> 




<?php
var_dump(25/7);         // float(3.5714285714286) 
var_dump((int) (25/7)); // int(3)
var_dump(round(25/7));  // float(4) 
?> 

Warning 
Never cast an unknown fraction to integer, as this can sometimes lead to unexpected results. 

