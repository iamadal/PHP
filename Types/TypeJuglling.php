<?php
$foo = "1";  // $foo is string (ASCII 49)
$foo *= 2;   // $foo is now an integer (2)
$foo = $foo * 1.3;  // $foo is now a float (2.6)
$foo = 5 * "10 Little Piggies"; // $foo is integer (50)
$foo = 5 * "10 Small Pigs";     // $foo is integer (50)
?> 




<?php
$a    = 'car'; // $a is a string
$a[0] = 'b';   // $a is still a string
echo $a;       // bar
<?php
$foo = 10;   // $foo is an integer
$bar = (boolean) $foo;   // $bar is a boolean
?> 


The casts allowed are: 
◦ (int), (integer) - cast to int 
◦ (bool), (boolean) - cast to bool 
◦ (float), (double), (real) - cast to float 
◦ (string) - cast to string 
◦ (array) - cast to array 
◦ (object) - cast to object 
◦ (unset) - cast to NULL 


<?php
$foo = (int) $bar;
$foo = ( int ) $bar;
?> 



<?php
$binary = (binary) $string;
$binary = b"binary string";
?> 


<?php
$foo = 10;            // $foo is an integer
$str = "$foo";        // $str is a string
$fst = (string) $foo; // $fst is also a string

// This prints out that "they are the same"
if ($fst === $str) {
    echo "they are the same";
}
?> 

// Converting to Boolean

When converting to bool, the following values are considered false: 
◦  the boolean false itself  
◦  the integers 0 and -0 (zero)  
◦  the floats 0.0 and -0.0 (zero)  
◦  the empty string, and the string "0"  
◦  an array with zero elements  
◦  the special type NULL (including unset variables)  
◦ SimpleXML objects created from attributeless empty elements, i.e. elements which have neither children nor attributes. 

<?php
var_dump((bool) "");        // bool(false)
var_dump((bool) 1);         // bool(true)
var_dump((bool) -2);        // bool(true)
var_dump((bool) "foo");     // bool(true)
var_dump((bool) 2.3e5);     // bool(true)
var_dump((bool) array(12)); // bool(true)
var_dump((bool) array());   // bool(false)
var_dump((bool) "false");   // bool(true)
?> 


// Converting to Int

<?php

// You may expected these
var_dump(0x7fffffffffffffff);                // int(9223372036854775807)
var_dump(0x7fffffffffffffff + 1);            // float(9.2233720368548E+18)
var_dump((int)(0x7fffffffffffffff + 1));     // int(9223372036854775807)
var_dump(0x7fffffffffffffff + 1 > 0);        // bool(true)
var_dump((int)(0x7fffffffffffffff + 1) > 0); // bool(true)
var_dump((int)'9223372036854775807');        // int(9223372036854775807)
var_dump(9223372036854775808);               // float(9.2233720368548E+18)
var_dump((int)'9223372036854775808');        // int(9223372036854775807)
var_dump((int)9223372036854775808);          // int(9223372036854775807)

 // But actually, it likes these
var_dump(0x7fffffffffffffff);                // int(9223372036854775807)
var_dump(0x7fffffffffffffff + 1);            // float(9.2233720368548E+18)
var_dump((int)(0x7fffffffffffffff + 1));     // int(-9223372036854775808)   <-----
var_dump(0x7fffffffffffffff + 1 > 0);        // bool(true)
var_dump((int)(0x7fffffffffffffff + 1) > 0); // bool(false)                 <-----
var_dump((int)'9223372036854775807');        // int(9223372036854775807)
var_dump(9223372036854775808);               // float(9.2233720368548E+18)
var_dump((int)'9223372036854775808');        // int(9223372036854775807)
var_dump((int)9223372036854775808);          // int(-9223372036854775808)   <-----

?>


<?php

 var_dump(010); // int(8) NOT int(010) 
var_dump(0x10); // int(16) NOT int(0x10) 
var_dump(0b10); // int(2) NOT int(0b10) 
?>



// Convereting to the float

<?php
$a = 1.23456789;
$b = 1.23456780;
$epsilon = 0.00001;

if(abs($a-$b) < $epsilon) {
    echo "true";
}
?> 




// Converting to the string

<?php 
\\Example # 10 Simple Syntax - Solution for the last "echo" line.

class people {
     public $john = "John Smith";
     public $jane = "Jane Smith";
     public $robert = "Robert Paulsen";

     public $smith = "Smith";
 }

$people = new people();

 echo "$people->john then said hello to $people->jane.".PHP_EOL;
 echo "$people->john's wife greeted $people->robert.".PHP_EOL;
 echo "$people->robert greeted the two $people->smiths"; 
 \\Won't work 
 \\Outputs: Robert Paulsen greeted the two 

 /**Solution:**\

 echo "$people->robert greeted the two $people->smith\x08s"; 

 \\Will work
 \\Outputs: Robert Paulsen greeted the two Smiths

 ?> 



 // convertig to array

 <?php

class A {
    private $B;
    protected $C;
    public $D;
    function __construct()
    {
        $this->{1} = null;
    }
}

var_export((array) new A());
?> 


// Converting to object

<?php
$obj = (object) array('1' => 'foo');
var_dump(isset($obj->{'1'})); // outputs 'bool(true)' as of PHP 7.2.0; 'bool(false)' previously
var_dump(key($obj)); // outputs 'string(1) "1"' as of PHP 7.2.0; 'int(1)' previously
?> 












