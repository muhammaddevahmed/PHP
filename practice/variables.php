<?php
echo ("hello world <br>") ;
echo "<h1>Variable Declaration</h1>";
//variable declaration

$name = "Ahmed";

echo $name."<br>";

//Checking DataType
var_dump($name);



//casting
echo "<h1>Casting And Data Types</h1>";
$a = 5; //int
$b = 3.6;  //float
$c = "hello"; //string
$d = true; //boolean

//checking Datatype and converting
var_dump($a);
echo "<br>";
var_dump($b);
echo "<br>";
var_dump($c);
echo "<br>";
var_dump($d);
echo "<br>";
$e = (string)$d;
var_dump($e);
echo "<br>";
$f = (string)$a;
var_dump($f);
echo "<br>";
$g = (string)$b;
var_dump($g);
echo "<br>";
$h = (int)$c;
var_dump($h);
echo "<br>";

//Math functions
echo "<h1>Maths Function</h1>";
$age = 23.6;
echo(round($age)); //round
$age = 23.6;
echo "<br>";
$arr = [34,65,72,33,22,90];
echo(min($arr)); //min
echo "<br>";
echo(max($arr));//max
echo "<br>";
$fun = pi(); //pi
echo($fun);
echo "<br>";
$ran = rand(1,150); //rand
echo($ran);
?>


