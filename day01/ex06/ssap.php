#!/usr/bin/php
<?php
function ft_split($str)
{
    $split = trim($str);
    $split = rtrim($split);
    $split = explode(" ", $split);
    asort($split);
    $split = array_filter($split);
    $split = array_values($split);
    return ($split);
}
$i = 0;
$line = NULL;
while ($argc--)
    $line = $line." ".$argv[++$i];
$i = -1;
$line = ft_split($line);
$num = count($line);
while (++$i < $num)
    print($line[$i])."\n";
?>