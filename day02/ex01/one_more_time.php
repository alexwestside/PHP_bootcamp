#!/usr/bin/php
<?php
date_default_timezone_set("Europe/Paris");
if ($argc == 2)
{
    if (preg_match("/^([A-Za-z]+) ([0-9]+){1,2} ([A-Za-z]+) ([0-9]+){4} ([0-9]+){2}:([0-9]+){2}:([0-9]+){2}$/", $argv[1]))
    {
        $argv[1] = preg_replace("/[Ll]undi/", "Monday", $argv[1]);
        $argv[1] = preg_replace("/[Mm]ardi/", "Tuesday", $argv[1]);
        $argv[1] = preg_replace("/[Mm]ercredi/", "Wednesday", $argv[1]);
        $argv[1] = preg_replace("/[Jj]eudi/", "Thursday", $argv[1]);
        $argv[1] = preg_replace("/[Vv]endredi/", "Friday", $argv[1]);
        $argv[1] = preg_replace("/[Ss]amedi/", "Saturday", $argv[1]);
        $argv[1] = preg_replace("/[Dd]imanche/", "Sunday", $argv[1]);
        $argv[1] = preg_replace("/[Jj]anvier/", "January", $argv[1]);
        $argv[1] = preg_replace("/[Ff]evrier/", "February", $argv[1]);
        $argv[1] = preg_replace("/[Mm]ars/", "March", $argv[1]);
        $argv[1] = preg_replace("/[Aa]vril/", "April", $argv[1]);
        $argv[1] = preg_replace("/[Mm]ai/", "May", $argv[1]);
        $argv[1] = preg_replace("/[Jj]uin/", "June", $argv[1]);
        $argv[1] = preg_replace("/[Jj]uillet/", "July", $argv[1]);
        $argv[1] = preg_replace("/[Aa]out/", "August", $argv[1]);
        $argv[1] = preg_replace("/[Ss]eptembre/", "September", $argv[1]);
        $argv[1] = preg_replace("/[Oo]ctobre/", "October", $argv[1]);
        $argv[1] = preg_replace("/[Nn]ovembre/", "November", $argv[1]);
        $argv[1] = preg_replace("/[Dd]ecembre/", "December", $argv[1]);
        return ( print ((strtotime($argv[1])) ? strtotime($argv[1])."\n" : ("Wrong Format")."\n"));
    }
    else
        print ("Wrong Format")."\n";
}
?>