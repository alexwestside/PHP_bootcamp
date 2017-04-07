#!/usr/bin/php
<?php
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $argv[1]);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$data = curl_exec($curl);
preg_match_all('/<img src=[\'|"](.*?)[\'|"].*[$>]/', $data, $item);
if (strcmp(substr($argv[1], 0, 11), "http://www."))
    return ;
$dir = parse_url($argv[1], PHP_URL_HOST);
if (file_exists($dir))
    return ;
mkdir($dir);
$dir = realpath($dir);
$n = count($item[1]);
$i = -1;
while (++$i < $n)
{
    $item[1][$i] = preg_replace_callback('/^\//', function ($arr) {return ("http://www.42.fr".$arr[0]);}, $item[1][$i]);
    curl_setopt($curl, CURLOPT_URL, $item[1][$i]);
    $data = curl_exec($curl);
    $name = explode('/', $item[1][$i]);
    $name = $name[count($name) - 1];
    copy($item[1][$i], $dir.'/'.$name);
}
curl_close($curl);
?>