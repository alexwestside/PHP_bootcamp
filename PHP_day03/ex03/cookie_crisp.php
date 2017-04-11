<?php
if ($_GET['action'] == 'set')
    setcookie($_GET['name'], $_GET['value'], time() + 60 * 60 * 24 * 30, '/');
else if ($_GET['action'] == 'get')
    foreach ($_COOKIE as $_key => $value)
        echo $_GET[$_key] . $value . "\n";
else if ($_GET['action'] == 'del')
    setcookie($_GET['name'], "", time() - 1);
print_r($_COOKIE['name']);
?>