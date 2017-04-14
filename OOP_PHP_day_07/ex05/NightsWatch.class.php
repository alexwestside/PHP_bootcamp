<?php

class NightsWatch
{
    public function recruit($who)
    {
        if (in_array('IFighter', class_implements($who)))
            $who->fight();
    }

    public function fight()
    {
        return ;
    }
}
?>