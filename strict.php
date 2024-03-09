<!DOCTYPE html>
<html>
<body>
 
<?php declare(strict_types=1); // strict requirement
$number = 10;
$text = "20";
$result = $number + $text; 
echo "<br/>";
echo $result;
echo "<br/>";
function add(int $a, int $b) {
    return $a + $b;
}

echo add(5, 10); 
echo "<br/>";
//echo add(5, "10");
?>

</body>
</html>