<?php
session_start();
if ($_SESSION)
{
    foreach ($_SESSION as $item => $val)
        $_SESSION[$item] = NULL;
}
?>