<?php

require_once 'Ship.class.php';
require_once 'Laser.class.php';

class Sword_Of_Absolution extends Ship
{
    public function doc()
    {
        return (file_get_contents("Scout.doc.txt"));
    }

    function __construct($x, $y, $team)
    {
        parent::__construct(array(
            'name' => "Sword_Of_Absolution",
            'size' => "3x1",
            'sprite' => "~/ships/Sword_Of_Absolution.png",
            'hp' => 4,
            'engine' => 18,
            'handling' => 3,
            'shield' => 0,
            'xpos' => $x,
            'ypos' => $y,
            'team' => $team,
            'weapons' => (new Laser())
        ));
    }
}

?>