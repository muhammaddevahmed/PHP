<?php
 function calculator($a,$b){
    echo "<h1>Calculator</h1>" ;
    $c = $a + $b;
    $d = $a - $b;
    $e = $a * $b;
    $f = $a / $b;
    $g = $a ** $b;
    $h = $a % $b;

    echo("The sum of " .$a. " and " .$b. " is : " .$c. "<br>" );
    echo("The difference of " .$a. " and " .$b. " is : " .$d. "<br>" );
    echo("The product of " .$a. " and " .$b. " is : " .$e. "<br>" );
    echo("The Quotient of " .$a. " and " .$b. " is : " .$f. "<br>" );
    echo("The exponent of " .$a. " and " .$b. " is : " .$g "<br>" );
    echo("The modulas  of " .$a. " and " .$b. " is : " .$h "<br>" );
 }
 calculator(20,15);

?>