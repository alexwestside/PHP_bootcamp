#!/usr/bin/php
<?php
if ($argc == 2)
{
    $res = 0;
    sscanf($argv[1], "%f %c %f %s", $num1, $op, $num2, $line);
    if (!is_numeric($num1) || !is_numeric($num2) || !ctype_print($op) || $line)
        return (print ("Syntax Error")."\n");
    else
    {
        if ($op == "+" || $op == "-" || $op == "%" || $op == "/" || $op == "*")
        {
            if (($op == "/" || $op == "%") && $num2 == 0)
                return (print ("Divine by zero!!!")."\n");
            $op == "+" ? $res = $num1 + $num2 : 0;
            $op == "-" ? $res = $num1 - $num2 : 0;
            $op == "*" ? $res = $num1 * $num2 : 0;
            $op == "/" ? $res = $num1 / $num2 : 0;
            $op == "%" ? $res = $num1 % $num2 : 0;
            print ($res)."\n";
        }
        else
            return (print ("Syntax Error")."\n");
    }
}
else
    print ("Incorrect number of parametrs!")."\n";
?>