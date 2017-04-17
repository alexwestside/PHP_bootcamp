<?php
session_start();
require_once 'GameZone.class.php';
require_once 'Ship.class.php';
require_once 'Scout.class.php';
require_once 'Site.class.php';
require_once 'DB.class.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
if (!isset($_GET) || !isset($_SESSION))
  return ;
DB::init();
$gz = Site::loadGameZone();
if ($gz->countShips == 0 || !isset($gz->ships))
{
    echo "No more ships";
    return;
}

if (key_exists('move', $_GET) && $gz->countShips != 0)
{
  $gz->moveCurShip();
}
if (key_exists('fire', $_GET) && $_GET['fire'] == 'fire' && $gz->countShips != 0)
{
  $gz->fireFromCurrent();
}
if (key_exists('rot', $_GET) && $gz->countShips != 0 && isset($gz->ships))
{
  $gz->rotCurShip($_GET['rot']);
}
if (key_exists('spend', $_GET) && $gz->countShips != 0)
{
  $gz->spendPointsCurShip($_GET['spend']);
}
if (key_exists('skip', $_GET) && $_GET['skip'] == 'skip' && $gz->countShips != 0)
{
  $gz->curShipSkipPhase();
}

Site::saveGameZone($gz);
if ($gz->countShips == 0 || !isset($gz->ships))
  echo "No more ships";
else
  echo $gz->ships[$gz->curShip];
  ?>
