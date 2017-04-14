<?php
abstract class Fighter
{
    public $_soldier;

    public function __construct($_soldier)
    {
        $this->_soldier = $_soldier;
    }

    abstract public function fight($target);

    public function __get($name)
    {
        return ($this->$name);
    }

}
?>
