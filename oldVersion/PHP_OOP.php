01. PHP treats objects in the same way as references or handles, meaning that each variable contains an object reference rather than a copy of the entire object. See Objects and References 


02. class auloloading
purpose: define classes in different php file and call them aumatically when needed wiothout including the file which contain the class defination.
__autoload();

03. <?php
function __autoload($class_name) {
    include $class_name . '.php';
}

$obj  = new MyClass1();
$obj2 = new MyClass2(); 
?> 

04. constructor and destructor.

void __construct ([ mixed $args = "" [, $... ]] )

<?php
class BaseClass {
   function __construct() {
       print "In BaseClass constructor\n";
   }
}

class SubClass extends BaseClass {
   function __construct() {
       parent::__construct();
       print "In SubClass constructor\n";
   }
}

class OtherSubClass extends BaseClass {
    // inherits BaseClass's constructor
}

// In BaseClass constructor
$obj = new BaseClass();

// In BaseClass constructor
// In SubClass constructor
$obj = new SubClass();

// In BaseClass constructor
$obj = new OtherSubClass();
?> 


***** Note:  Parent constructors are not called implicitly if the child class defines a constructor. In order to run a parent constructor, a call to parent::__construct() within the child constructor is required. If the child does not define a constructor then it may be inherited from the parent class just like a normal class method (if it was not declared as private). 

05. inheritance
class derived_class extends baseClass{
}


06.The Scope Resolution Operator (also called Paamayim Nekudotayim) or in simpler terms, the double colon, is a token that allows access to static, constant, and overridden properties or methods of a class. 

07. 
<?php
class SimpleClass
{
    // property declaration
    public $var = 'a default value';

    // method declaration
    public function displayVar() {
        echo $this->var;
    }
}
?> 


03. class member variables are callded property/field/attributes. they are declared by public/private/protected followed by variable 


08. const CONSTANT = 'Noovs';
use self::CONSTANT to use it
or ClassName::CONSTANT;

09. Because static methods are callable without an instance of the object created, the pseudo-variable $this is not available inside the method declared as static. 


10.   Abstract Class
PHP 5 introduces abstract classes and methods. Classes defined as abstract may not be instantiated, and any class that contains at least one abstract method must also be abstract. Methods defined as abstract simply declare the method's signature - they cannot define the implementation

11. Object Interface
interface: define function as list to used by a class;
interface iTemplate
{
    public function setVariable($name, $var);
    public function getHtml($template);
}

// Implement the interface
// This will work
class Template implements iTemplate
{
    private $vars = array();
  
    public function setVariable($name, $var)
    {
        $this->vars[$name] = $var;
    }
  
    public function getHtml($template)
    {
        foreach($this->vars as $name => $value) {
            $template = str_replace('{' . $name . '}', $value, $template);
        }
 
        return $template;
    }
}

12. Traits: it is used to establish multiple inheritance
<?php
class Base {
    public function sayHello() {
        echo 'Hello ';
    }
}

trait SayWorld {
    public function sayHello() {
        parent::sayHello();
        echo 'World!';
    }
}

class MyHelloWorld extends Base {
    use SayWorld;
}

$o = new MyHelloWorld();
$o->sayHello();
?> 



13.  Overloading/ Dynamically created method and properties

Note: 

None of the arguments of these magic methods can be passed by reference. 



Note: 

PHP's interpretation of "overloading" is different than most object oriented languages. Overloading traditionally provides the ability to have multiple methods with the same name but different quantities and types of arguments. 


###### 

14.   Magic Methods 
The function names __construct(), __destruct(), __call(), __callStatic(), __get(), __set(), __isset(), __unset(), __sleep(), __wakeup(), __toString(), __invoke(), __set_state(), __clone() and __debugInfo() are magical in PHP classes. You cannot have functions with these names in any of your classes unless you want the magic functionality associated with them.


serialize() checks if your class has a function with the magic name __sleep(). If so, that function is executed prior to any serialization. It can clean up the object and is supposed to return an array with the names of all variables of that object that should be serialized. If the method doesn't return anything then NULL is serialized and E_NOTICE is issued. 

15. Final Keywords
PHP 5 introduces the final keyword, which prevents child classes from overriding a method by prefixing the definition with final. If the class itself is being defined final then it cannot be extended. 
Note:  Properties cannot be declared final, only classes and methods may be declared as final. 

16. Object Cloning/Duplicate
When an object is cloned, PHP 5 will perform a shallow copy of all of the object's properties. Any properties that are references to other variables will remain references. 
void __clone ( void )

17. Comparing Objects 

When using the comparison operator (==), object variables are compared in a simple manner, namely: Two object instances are equal if they have the same attributes and values, and are instances of the same class. 

When using the identity operator (===), object variables are identical if and only if they refer to the same instance of the same class. 

An example will clarify these rules. 


Example #1 Example of object comparison in PHP 5


*** Objects and references 

One of the key-points of PHP 5 OOP that is often mentioned is that "objects are passed by references by default". This is not completely true. This section rectifies that general thought using some examples. 


19. **** Object Serialization 

Serializing objects - objects in sessions 

serialize() returns a string containing a byte-stream representation of any value that can be stored in PHP. unserialize() can use this string to recreate the original variable values. Using serialize to save an object will save all variables in an object. The methods in an object will not be saved, only the name of the class. 

In order to be able to unserialize() an object, the class of that object needs to be defined. That is, if you have an object of class A and serialize this, you'll get a string that refers to class A and contains all values of variables contained in it. If you want to be able to unserialize this in another file, an object of class A, the definition of class A must be present in that file first. This can be done for example by storing the class definition of class A in an include file and including this file or making use of the spl_autoload_register() function. 




<?php
// classa.inc:
  
  class A {
      public $one = 1;
    
      public function show_one() {
          echo $this->one;
      }
  }
  
// page1.php:

  include("classa.inc");
  
  $a = new A;
  $s = serialize($a);
  // store $s somewhere where page2.php can find it.
  file_put_contents('store', $s);

// page2.php:
  
  // this is needed for the unserialize to work properly.
  include("classa.inc");

  $s = file_get_contents('store');
  $a = unserialize($s);

  // now use the function show_one() of the $a object.  
  $a->show_one();
?>  

If an application is using sessions and uses session_register() to register objects, these objects are serialized automatically at the end of each PHP page, and are unserialized automatically on each of the following pages. This means that these objects can show up on any of the application's pages once they become part of the session. However, the session_register() is removed since PHP 5.4.0. 

It is strongly recommended that if an application serializes objects, for use later in the application, that the application includes the class definition for that object throughout the application. Not doing so might result in an object being unserialized without a class definition, which will result in PHP giving the object a class of __PHP_Incomplete_Class_Name, which has no methods and would render the object useless. 

So if in the example above $a became part of a session by running session_register("a"), you should include the file classa.inc on all of your pages, not only page1.php and page2.php. 

Beyond the above advice, note that you can also hook into the serialization and unserialization events on an object using the __sleep() and __wakeup() methods. Using __sleep() also allows you to only serialize a subset of the 
