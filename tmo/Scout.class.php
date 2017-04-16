<?php
/**
 *
 */

require_once 'Ship.class.php';
require_once 'Laser.class.php';

class Scout extends Ship
{
  public function doc()
  {
    return (file_get_contents("Scout.doc.txt"));
  }

  function __construct($x, $y, $team)
  {
    parent::__construct(array(
      'name' => "Scout",
      'size' => "4x1",
      'sprite' => "http://i.imgur.com/XcnM09t.png",
      'hp' => 5,
      'engine' => 10,
      'handling' => 4,
      'shield' => 0,
      'xpos' => $x,
      'ypos' => $y,
      'team' => $team,
      'weapons' => (new Laser())
    ));
  }
}

 ?>
