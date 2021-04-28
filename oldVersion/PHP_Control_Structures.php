01. if (expr)
  statement

02. <?php
if ($a > $b) {
  echo "a is greater than b";
} else {
  echo "a is NOT greater than b";
}
?> 


03. <?php
if ($a > $b) {
    echo "a is bigger than b";
} elseif ($a == $b) {
    echo "a is equal to b";
} else {
    echo "a is smaller than b";
}
?> 


04. Alternative syntax for control structures 
PHP offers an alternative syntax for some of its control structures; namely, if, while, for, foreach, and switch. In each case, the basic form of the alternate syntax is to change the opening brace to a colon (:) and the closing brace to endif;, endwhile;, endfor;, endforeach;, or endswitch;, respectively.

<?php if ($a == 5): ?>
A is equal to 5
<?php endif; ?> 




?>  



Note: 

Mixing syntaxes in the same control block is not supported. 


Warning 
Any output (including whitespace) between a switch statement and the first case will result in a syntax error. For example, this is invalid: 



Whereas this is valid, as the trailing newline after the switch statement is considered part of the closing ?> and hence nothing is output between the switch and case: 




<?php switch ($foo): ?>
<?php case 1: ?>
    ...
<?php endswitch ?> 




03. while (expr)
    statement


04.   <?php
$i = 0;
do {
    echo $i;
} while ($i > 0);
?> 

05.  for (expr1; expr2; expr3)
    statement


06.   foreach 

(PHP 4, PHP 5)

The foreach construct provides an easy way to iterate over arrays. foreach works only on arrays and objects, and will issue an error when you try to use it on a variable with a different data type or an uninitialized variable. There are two syntaxes: 



foreach (array_expression as $value)
    statement
foreach (array_expression as $key => $value)
    statement



The first form loops over the array given by array_expression. On each iteration, the value of the current element is assigned to $value and the internal array pointer is advanced by one (so on the next iteration, you'll be looking at the next element). 

The second form will additionally assign the current element's key to the $key variable on each iteration. 

It is possible to customize object iteration. 




Note: 

In PHP 5, when foreach first starts executing, the internal array pointer is automatically reset to the first element of the array. This means that you do not need to call reset() before a foreach loop. 

As foreach relies on the internal array pointer in PHP 5, changing it within the loop may lead to unexpected behavior. 

In PHP 7, foreach does not use the internal array pointer. 



In order to be able to directly modify array elements within the loop precede $value with &. In that case the value will be assigned by reference. 




<?php
$arr = array(1, 2, 3, 4);
foreach ($arr as &$value) {
    $value = $value * 2;
}
// $arr is now array(2, 4, 6, 8)
unset($value); // break the reference with the last element
?>  


Referencing $value is only possible if the iterated array can be referenced (i.e. if it is a variable). The following code won't work: 




<?php
foreach (array(1, 2, 3, 4) as &$value) {
    $value = $value * 2;
}
?>  


Warning 
Reference of a $value and the last array element remain even after the foreach loop. It is recommended to destroy it by unset(). 




Note: 

foreach does not support the ability to suppress error messages using '@'. 



You may have noticed that the following are functionally identical: 




<?php
$arr = array("one", "two", "three");
reset($arr);
while (list(, $value) = each($arr)) {
    echo "Value: $value<br />\n";
}

foreach ($arr as $value) {
    echo "Value: $value<br />\n";
}
?>  


The following are also functionally identical: 




<?php
$arr = array("one", "two", "three");
reset($arr);
while (list($key, $value) = each($arr)) {
    echo "Key: $key; Value: $value<br />\n";
}

foreach ($arr as $key => $value) {
    echo "Key: $key; Value: $value<br />\n";
}
?>  


Some more examples to demonstrate usage: 




<?php
/* foreach example 1: value only */

$a = array(1, 2, 3, 17);

foreach ($a as $v) {
    echo "Current value of \$a: $v.\n";
}

/* foreach example 2: value (with its manual access notation printed for illustration) */

$a = array(1, 2, 3, 17);

$i = 0; /* for illustrative purposes only */

foreach ($a as $v) {
    echo "\$a[$i] => $v.\n";
    $i++;
}

/* foreach example 3: key and value */

$a = array(
    "one" => 1,
    "two" => 2,
    "three" => 3,
    "seventeen" => 17
);

foreach ($a as $k => $v) {
    echo "\$a[$k] => $v.\n";
}

/* foreach example 4: multi-dimensional arrays */
$a = array();
$a[0][0] = "a";
$a[0][1] = "b";
$a[1][0] = "y";
$a[1][1] = "z";

foreach ($a as $v1) {
    foreach ($v1 as $v2) {
        echo "$v2\n";
    }
}

/* foreach example 5: dynamic arrays */

foreach (array(1, 2, 3, 4, 5) as $v) {
    echo "$v\n";
}
?>  



Unpacking nested arrays with list() 

(PHP 5 >= 5.5.0)

PHP 5.5 added the ability to iterate over an array of arrays and unpack the nested array into loop variables by providing a list() as the value. 

For example: 




<?php
$array = [
    [1, 2],
    [3, 4],
];

foreach ($array as list($a, $b)) {
    // $a contains the first element of the nested array,
    // and $b contains the second element.
    echo "A: $a; B: $b\n";
}
?>  

The above example will output:


A: 1; B: 2
A: 3; B: 4



You can provide fewer elements in the list() than there are in the nested array, in which case the leftover array values will be ignored: 




<?php
$array = [
    [1, 2],
    [3, 4],
];

foreach ($array as list($a)) {
    // Note that there is no $b here.
    echo "$a\n";
}
?>  

The above example will output:


1
3


07. declare



08. Require
require is identical to include except upon failure it will also produce a fatal E_COMPILE_ERROR level error. In other words, it will halt the script whereas include only emits a warning (E_WARNING) which allows the script to continue. 

See the include documentation for how this works. 


The require_once statement is identical to require except PHP will check if the file has already been included, and if so, not include (require) it again. 





*** problem: Use of declare keywords
