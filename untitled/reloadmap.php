<?php
session_start();
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
require_once 'GameZone.class.php';
require_once 'Ship.class.php';
require_once 'Scout.class.php';
require_once 'DB.class.php';
require_once 'Site.class.php';
if ($_GET && key_exists('reset', $_GET) && $_GET['reset'] == 'OK')
{
  header("Location: game.php");
  $_SESSION['gz'] = Null;
  return ;
}
DB::init();
if ($_GET && key_exists('controls', $_GET) && $_GET['controls'] == 'OK')
{
  $gz = Site::loadGameZone();
  $gz->printControls($_SESSION['team']);
  return ;
}
$gz = Site::loadGameZone();
$gz->elimination();
$gz->printgz();
Site::saveGameZone($gz);
 ?>
