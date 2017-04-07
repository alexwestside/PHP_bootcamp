#!/usr/bin/php
<?php
$line = implode(" ", $argv);
$line = preg_split("/ +/", $line);
unset($line[0]);
$line = array_values($line);
$n = count($line);
$i = 0;
while($i++ < $n)
{
    $tmp = explode(":", $line[$i]);
    if ($tmp[0] == $line[0])
    {
        print ($tmp[1]);
        break ;
    }
}
?>