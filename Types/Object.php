<?php
class foo
{
    function do_foo()
    {
        echo "Doing foo."; 
    }
}

$bar = new foo;
$bar->do_foo();
?> 







<?php
$obj = (object) array('1' => 'foo');
var_dump(isset($obj->{'1'})); // outputs 'bool(true)' as of PHP 7.2.0; 'bool(false)' previously
var_dump(key($obj)); // outputs 'string(1) "1"' as of PHP 7.2.0; 'int(1)' previously
?> 



<?php
$obj = (object) 'ciao';
echo $obj->scalar;  // outputs 'ciao'
?> 


another way to instantiate an empty generic php object:

<?php $dataObj = json_decode('{}'); ?> 




in php 7.2 this code works despite documentation said it gives false

<?php
 $obj = (object) array('1' => 'foo');

//output foo
echo $obj->{'1'};

?> 

<?php

/**
  * Used for checking empty objects/array
  * @uses How to check empty objects and array in php code
  * @author Aditya Mehrotra<aditycse@gmail.com>
  */

 /**
  * Empty class
  */
class EmptyClass {
     
 }

$obj = new stdClass();
//or any other class empty object 
$emptyClassObj = new EmptyClass();
$array = array();

 if (empty($array)) {
     echo 'array is empty'; //expected result
} else {
     echo 'array is not empty'; //unexpected result
}
 echo "<br>";

 if (empty($obj)) {
     echo 'object is empty'; //expected result
} else {
     echo 'object is not empty'; //unexpected result
}
 echo "<br>";

 if (empty($emptyClassObj)) {
     echo 'EmptyClass is empty'; //expected result
} else {
     echo 'EmptyClass is not empty'; //unexpected result
}
 echo "<br>";

//Result SET 1
 //array is empty      => expected result
 //object is not empty => ouch what happened
 //EmptyClass is not empty => ouch what happened

 /**
  * So what we do for checking empty object
  * @solution use any known property or check property count
  * Or you can use below method
  * Count function will not return 0 in empty object
  */

 //Below line print "Object count:1"
echo 'Object count:' . count($obj);

 echo "<br>";

/**
  * This function is used to get object item counts
  * @function getCount
  * @access public
  * @param object|array $var
  * @return integer
  */
function getCount($var) {
     $count = 0;
     if (is_array($var) || is_object($var)) {
         foreach ($var as $value) {
             $count++;
         }
     }
     unset($value);
     return $count;
 }

//Running code again with new logic
if (getCount($array) === 0) {
     echo 'array is empty'; //expected result
} else {
     echo 'array is not empty'; //unexpected result
}
 echo "<br>";

 if (getCount($obj) === 0) {
     echo 'object is empty'; //expected result
} else {
     echo 'object is not empty'; //unexpected result
}

 echo "<br>";

 if (getCount($emptyClassObj) === 0) {
     echo 'EmptyClass is empty'; //expected result
} else {
     echo 'EmptyClass is not empty'; //unexpected result
}

//Result SET 2
 //array is empty    => expected result  ##everything is all right
 //object is empty   => expected result  ##everything is all right
 //EmptyClass is empty   => expected result  ##everything is all right 



 <?php
   class myNumber
   {
     public $value;
   }

   $arrayOfMyNumbers = array();
   $arrayItem = new myNumber();
   for( $i = 0; $i<3; $i++ ) {
     $arrayItem->value = $i;
     $arrayOfMyNumbers[] = $arrayItem;
   }

   var_dump($arrayOfMyNumbers);
?>

 output:
 array(3) {
   [0]=>
   object(myNumber)#1 (1) {
     ["value"]=>
     int(4)
   }
   [1]=>
   object(myNumber)#1 (1) {
     ["value"]=>
     int(4)
   }
   [2]=>
   object(myNumber)#1 (1) {
     ["value"]=>
     int(4)
   }
 }

 
<?php
class myNumber
{
  public $value;
}

$arrayOfMyNumbers = array();
for( $i = 0; $i<3; $i++ ) {
  $arrayItem = new myNumber();
  $arrayItem->value = $i;
  $arrayOfMyNumbers[] = $arrayItem;
}

var_dump($arrayOfMyNumbers);
?>

output:
array(3) {
[0]=>
object(myNumber)#1 (1) {
  ["value"]=>
  int(0)
}
[1]=>
object(myNumber)#2 (1) {
  ["value"]=>
  int(1)
}
[2]=>
object(myNumber)#3 (1) {
  ["value"]=>
  int(2)
}
}

Notice how the creation of a new object ("$arrayItem = new myNumber();") must happen every time the for loop runs for this to work.
This took me forever to figure out, so I hope this helps someone else. 

<?php

echo json_encode([[]]), "\n";
// output: [[]]

echo json_encode([[]], JSON_FORCE_OBJECT), "\n";
// output: {"0":{}}

echo json_encode([(object)[]]), "\n";
// output: [{}]

echo json_encode([0=>"a", 1=>"b", 9=>"c"]), "\n";
// output: {"0":"a","1":"b","9":"c"}

echo json_encode([0=>"a", 1=>"b", 2=>"c"]), "\n";
// output: ["a","b","c"]

echo json_encode((object)[0=>"a", 1=>"b", 2=>"c"]), "\n";
// output: {"0":"a","1":"b","2":"c"}
?> 

<!--Example shows how to convert array to stdClass Object and how to access its value for display -->
<?php 
 $num = array("Garha","sitamarhi","canada","patna"); //create an array
$obj = (object)$num; //change array to stdClass object 

echo "<pre>";
print_r($obj); //stdClass Object created by casting of array 

$newobj = new stdClass();//create a new 
$newobj->name = "India";
$newobj->work = "Development";
$newobj->address="patna";

$new = (array)$newobj;//convert stdClass to array
echo "<pre>";
print_r($new); //print new object

 ##How deals with Associative Array

$test = [Details=>['name','roll number','college','mobile'],values=>['Naman Kumar','100790310868','Pune college','9988707202']];
$val = json_decode(json_encode($test),false);//convert array into stdClass object

echo "<pre>";
print_r($val);

 echo ((is_array($val) == true ?  1 : 0 ) == 1 ? "array" : "not an array" )."</br>"; // check whether it is array or not
echo ((is_object($val) == true ?  1 : 0 ) == 1 ? "object" : "not an object" );//check whether it is object or not 
?>


In PHP 7 there are a few ways to create an empty object:

<?php
 $obj1 = new \stdClass; // Instantiate stdClass object
$obj2 = new class{}; // Instantiate anonymous class
$obj3 = (object)[]; // Cast empty array to object

var_dump($obj1); // object(stdClass)#1 (0) {}
var_dump($obj2); // object(class@anonymous)#2 (0) {}
var_dump($obj3); // object(stdClass)#3 (0) {}
?>

 $obj1 and $obj3 are the same type, but $obj1 !== $obj3. Also, all three will json_encode() to a simple JS object {}:

<?php
echo json_encode([
     new \stdClass,
     new class{},
     (object)[],
 ]);
?>

 Outputs: [{},{},{}] 


 
<?php
$object = (object) [
  'propertyOne' => 'foo',
  'propertyTwo' => 42,
];
?> 


<?php
class stdObject {
     public function __construct(array $arguments = array()) {
         if (!empty($arguments)) {
             foreach ($arguments as $property => $argument) {
                 $this->{$property} = $argument;
             }
         }
     }

     public function __call($method, $arguments) {
         $arguments = array_merge(array("stdObject" => $this), $arguments); // Note: method argument 0 will always referred to the main class ($this).
         if (isset($this->{$method}) && is_callable($this->{$method})) {
             return call_user_func_array($this->{$method}, $arguments);
         } else {
             throw new Exception("Fatal error: Call to undefined method stdObject::{$method}()");
         }
     }
 }

// Usage.

$obj = new stdObject();
$obj->name = "Nick";
$obj->surname = "Doe";
$obj->age = 20;
$obj->adresse = null;

$obj->getInfo = function($stdObject) { // $stdObject referred to this object (stdObject).
     echo $stdObject->name . " " . $stdObject->surname . " have " . $stdObject->age . " yrs old. And live in " . $stdObject->adresse;
 };

$func = "setAge";
$obj->{$func} = function($stdObject, $age) { // $age is the first parameter passed when calling this method.
     $stdObject->age = $age;
 };

$obj->setAge(24); // Parameter value 24 is passing to the $age argument in method 'setAge()'.

 // Create dynamic method. Here i'm generating getter and setter dynimically
 // Beware: Method name are case sensitive.
foreach ($obj as $func_name => $value) {
     if (!$value instanceOf Closure) {

         $obj->{"set" . ucfirst($func_name)} = function($stdObject, $value) use ($func_name) {  // Note: you can also use keyword 'use' to bind parent variables.
             $stdObject->{$func_name} = $value;
         };

         $obj->{"get" . ucfirst($func_name)} = function($stdObject) use ($func_name) {  // Note: you can also use keyword 'use' to bind parent variables.
             return $stdObject->{$func_name};
         };

     }
 }

$obj->setName("John");
$obj->setAdresse("Boston");

$obj->getInfo();
?>



Do you remember some JavaScript implementations?

 // var timestamp = (new Date).getTime();

 Now it's possible with PHP 5.4.*;

<?php
class Foo
{
     public $a = "I'm a!";
     public $b = "I'm b!";
     public $c;
     
     public function getB() {
         return $this->b;
     }
     
     public function setC($c) {
         $this->c = $c;
         return $this;
     }
     
     public function getC() {
         return $this->c;
     }
 }

 print (new Foo)->a;      // I'm a!
print (new Foo)->getB(); // I'm b!
?>

 or

<?php
// $_GET["c"] = "I'm c!";
print (new Foo)
        ->setC($_GET["c"])
        ->getC(); // I'm c!
?> 




i would like to share a curious behavior on casted objects. Casting an object from a class with private/protected attributes results a stdClass with a private/protected attribute for get.
 Example:
<?PHP
class Foo{
  private $priv = 1;
  public $pub = 2;
  public function getSimple(){
   return (object)(array) $this; //the array cast is to force a stdClass result
  }
 }
$bar = new Foo();
var_dump($bar->getSimple();// output: object(stdClass)#3 (2) { ["priv:private"]=> int(1) ["pub"]=> int(2) }

var_dump($bar->getSimple()->priv);// output: NULL, not a Fatal Error
var_dump($bar->getSimple()->pub);// output: int(2)

$barSimple = $bar->getSimple();
$barSimple->priv = 10;
var_dump($barSimple->priv);// output: int(10)

?> 










