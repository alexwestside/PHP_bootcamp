<?php

class Tyrion extends Lannister
{
    public function getSize()
    {
        parent::getSize();
        print ("My name is Tyrion\n");
        return "Short";
    }
}

?>