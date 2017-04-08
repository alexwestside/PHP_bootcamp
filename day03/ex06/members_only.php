<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
$user = array("zaz" => "Ilovemylittleponey");
if ($_SERVER['PHP_AUTH_USER'] && $user[$_SERVER['PHP_AUTH_USER']] == $_SERVER['PHP_AUTH_PW'])
{
    $base64 = base64_encode(file_get_contents("../img/42.png"));
    echo "<html><body>Hello Zaz<br /><img src='data:image/png;" . "base64,$base64'" . "</body></html>";
}
else
{
    header("WWW-Authenticate: Basic realm=''Member area''");
    echo "<html><body>That area is accessible for members only</body></html>";
}
?>