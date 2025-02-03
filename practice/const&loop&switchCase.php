<?php
echo "<h1>Constent</h1> <br>";
define("pi",3.142);
echo pi ;

echo "<h1>While Loop</h1> <br>";
$a = 1;
while($a<=10){
    echo "hello";
    echo "<br>";
    $a=$a+1;
}

echo "<h1>Total with While Loop</h1>";
$total = 0;
$a=1;
while($a<=10){
    $total=$total+$a;
    $a++;
}
echo $total;

echo "<h1>Switch CAse</h1>";

$day = "Monday";
switch($day)
{
    case "Monday":
        echo($day."<br>");
        break;
    case "Tuesday":
        echo($day."<br>");
        break; 
    case "Wednesday":
        echo($day."<br>");
        break;
    case "Wednesday":
        echo($day."<br>");
        break; 
    case "Thursday":
        echo($day."<br>");
        break;   
    case "Friday":
        echo($day."<br>");
        break;   
            

    default:
        echo("Your day is incorrect");           
}

?>