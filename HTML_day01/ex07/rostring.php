#!/usr/bin/php
<?php
function ft_split($str)
{
    $split = trim($str);
    $split = explode(" ", $split);
    $split = array_filter($split);
    $split = array_values($split);
    return ($split);
}
if ($argc < 2)
    return ;
else
{
    $i = 0;
    $line = ft_split($argv[1]);
    $num = count($line);
    while (++$i < $num)
        print ($line[$i])." ";
    print ($line[0]);
}
?>