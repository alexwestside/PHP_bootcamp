#!/usr/bin/php
<?php
if ($argc > 1)
{
    $line = implode(" ", $argv);
    $line = explode(" ", $line);
    unset($line[0]);
    $n = count($line);
    $i = 0;
    while (++$i <= $n) {
        if (is_numeric($line[$i]))
            $num[] = $line[$i];
        else if (ctype_alpha($line[$i]))
            $alpha[] = $line[$i];
        else
            $other[] = $line[$i];
    }
    sort($num, SORT_STRING);
    sort($alpha, SORT_STRING | SORT_FLAG_CASE);
    sort($other, SORT_STRING | SORT_FLAG_CASE);
    $line = array_merge($alpha, $num, $other);
    $n = count($line);
    foreach ($line as $s)
        print ($s) . "\n";
}
else
    return ;
?>