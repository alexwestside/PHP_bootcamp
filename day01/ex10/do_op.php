#!/usr/bin/php
<?php
if ($argc == 4)
{
    $res = 0;
    $num1 = intval(trim($argv[1]));
    $op = trim($argv[2]);
    $num2 = intval(trim($argv[3]));
    if (($op == "/" || $op == "%") && $num2 == 0)
        return (print ("Divine by zero!!!"));
    $op == "+" ? $res = $num1 + $num2 : 0;
    $op == "-" ? $res = $num1 - $num2 : 0;
    $op == "*" ? $res = $num1 * $num2 : 0;
    $op == "/" ? $res = $num1 / $num2 : 0;
    $op == "%" ? $res = $num1 % $num2 : 0;
    print($res)."\n";
}
else
    return (print ("Incorrect number of parametrs!"));
?>