<?php

require_once 'Ship.class.php';
require_once 'Laser.class.php';

class Ork_N_Roll extends Ship
{
    public function doc()
    {
        return (file_get_contents("Scout.doc.txt"));
    }

    function __construct($x, $y, $team)
    {
        parent::__construct(array(
            'name' => "Ork_N_Roll",
            'size' => "4x1",
            'sprite' => "~/ships/OrkNRoll.png",
            'hp' => 5,
            'engine' => 15,
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