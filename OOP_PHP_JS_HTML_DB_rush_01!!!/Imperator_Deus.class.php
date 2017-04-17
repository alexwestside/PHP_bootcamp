<?php

require_once 'Ship.class.php';
require_once 'Laser.class.php';

class Imperator_Deus extends Ship
{
    public function doc()
    {
        return (file_get_contents("Scout.doc.txt"));
    }

    function __construct($x, $y, $team)
    {
        parent::__construct(array(
            'name' => "Imperator_Deus",
            'size' => "7x2",
            'sprite' => "~/ships/Imperator_Deus.png",
            'hp' => 8,
            'engine' => 10,
            'handling' => 5,
            'shield' => 2,
            'xpos' => $x,
            'ypos' => $y,
            'team' => $team,
            'weapons' => (new Laser())
        ));
    }
}
?>