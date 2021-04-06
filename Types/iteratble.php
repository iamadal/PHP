<?php

function foo(iterable $iterable) {
    foreach ($iterable as $value) {
        // ...
    } 
}

?>

<?php

function foo(iterable $iterable = []) {
    // ...
}

?> 

<?php

function bar(): iterable {
    return [1, 2, 3];
}

?> 


<?php

function gen(): iterable {
    yield 1;
    yield 2;
    yield 3;
}

?> 

<?php

interface Example {
    public function method(array $array): iterable;
}

class ExampleImplementation implements Example {
    public function method(iterable $iterable): array {
        // Parameter broadened and return type narrowed.
    }
}

?>

<?php
class Foo {
     public $a = 1;
     public $b = "Helo";
 };

$bar = new Foo;

 foreach($bar as $elm) {
     echo $elm . ' ';
 }

?> 
 prints 1 Hello
 Even
<?php
 $bar = new stdClass
foreach($bar as $elm) {
     echo $elm . ' ';
 }
?>

