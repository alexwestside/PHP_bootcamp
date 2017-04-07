#!/usr/bin/php
<?php
if ($argc > 1)
{
    $line = preg_replace("/[ \t]+/", " ", $argv[1]);
    $line = trim($line);
    print ($line)."\n";
}
else
    return ;
?>