<?php
abstract class House
{
    abstract function getHouseName();
    abstract function getHouseMotto();
    abstract function getHouseSeat();

    public function introduce()
    {
        return print "House " . $this->getHouseName() . " of " . $this->getHouseSeat() . " : \"" .$this->getHouseMotto() . "\"\n";
    }
}
?>