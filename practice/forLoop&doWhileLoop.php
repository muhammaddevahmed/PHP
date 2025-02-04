<?php
echo "<h1>For Loop</h1>";

for($i=0;$i <=10;$i++){
    echo($i.")Hello<br>");
}

echo "<h1>For Loop with Array</h1>";

$arr = ["Ali","Ahmed","Yaseen","Farooq","Hammad","Khan"];
for($i=0 ; $i <= count($arr)-1 ; $i++){
    echo($arr[$i]."<br>");
}

echo "<h1>Do While Loop</h1>";
$a = 1;
do {
    echo($a.")Hello<br>");
    $a++;
} while ($a <= 10);

?>