#!/usr/bin/php
<?php
date_default_timezone_set('Europe/Kiev');
$fd = fopen("/var/run/utmpx", "r");
while ($line = fread($fd, 628))
{
    $arr = unpack("a256user/a4id/a32line/ipid/itype/I2time/a256host/i16pad", $line);
    $arr["type"] == 7 ? $user[$arr["line"]] = array("user" => $arr["user"], "time" => $arr["time1"]) : 0;
}
foreach ($user as $line => $item)
{
    $line = preg_replace('/[\x00-\x1F\x7F-\xFF]/', '', $line);
    $item = preg_replace('/[\x00-\x1F\x7F-\xFF]/', '', $item);
    $data = sprintf("%s  %s  %s \n", $item["user"], $line, date("M  j H:i", $item["time"]));
    print ($data);
}
?>