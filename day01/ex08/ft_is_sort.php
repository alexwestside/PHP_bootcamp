<?php
function ft_is_sort($tab)
{
    $temp = $tab;
    sort($temp);
    return ($temp == $tab ? 1 : 0);
}
?>