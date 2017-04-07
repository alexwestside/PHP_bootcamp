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
?>