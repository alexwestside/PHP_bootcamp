<?php

require_once 'Ship.class.php';
require_once 'Laser.class.php';

class Hand_Of_The_Emperor extends Ship
{
    public function doc()
    {
        return (file_get_contents("Scout.doc.txt"));
    }

    function __construct($x, $y, $team)
    {
        parent::__construct(array(
            'name' => "Hand_Of_The_Emperor",
            'size' => "4x1",
            'sprite' => "~/ships/Hand_Of_The_Emperor.png",
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