#!/usr/bin/php
<?php

if ($argc == 2)
{
    if (file_exists($argv[1]))
    {
        $line = file_get_contents($argv[1]);
        print (preg_replace_callback('/<a.*<\/a>/s',
            function ($matches)
            {
                return (preg_replace_callback('/(title=")([^"]+)|(>.*?<)/',
                    function ($matches)
                    {
                        return ($matches[1] . strtoupper($matches[2]) . strtoupper($matches[3]));
                    },
                    $matches[0]));
            },
            $line));
    }
}
else
    return ;
?>