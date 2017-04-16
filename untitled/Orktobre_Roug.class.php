<?php

require_once 'Ship.class.php';
require_once 'Laser.class.php';

class Orktobre_Roug extends Ship
{
    public function doc()
    {
        return (file_get_contents("Scout.doc.txt"));
    }

    function __construct($x, $y, $team)
    {
        parent::__construct(array(
            'name' => "Orktobre_Roug",
            'size' => "2x1",
            'sprite' => "~/ships/Orktobre_Roug.png",
            'hp' => 4,
            'engine' => 19,
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