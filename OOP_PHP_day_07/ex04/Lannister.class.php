<?php
abstract class Lannister
{
    public function sleepWith($who)
    {
        if ($who instanceof Lannister)
        {
            if (get_class($who) === "Cersei" && get_class($this) === "Jaime")
                return print "With pleasure, but only in a tower in Winterfell, then.\n";
            else
                return print "Not even if I'm drunk !\n";
        }
        else
            return print "Let's do this.\n";
    }
}
?>