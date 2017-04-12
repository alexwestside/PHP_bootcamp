<?php
require_once 'Color.class.php';
class Vertex
{
    private $_x = 0;
    private $_y = 0;
    private $_z = 0;
    private $_w = 0;
    static $verbose = false;
    private $_color = 0;

    function __construct(array $arg)
    {
        if (isset($arg['x']) && isset($arg['y']) && isset($arg['z']))
        {
            $this->_x = $arg['x'];
            $this->_y = $arg['y'];
            $this->_z = $arg['z'];
        }
        $this->_w = isset($arg['w']) ? $arg['w'] : 1.0;
        $this->_color = isset($arg['color']) ? $arg['color'] : new Color(array('red' => 255, 'green' => 255, 'blue' => 255));
        Vertex::$verbose == true ? print $this ." constructed\n" : 0;
    }

    function __destruct()
    {
        Vertex::$verbose == true ? print $this ." destructed\n" : 0;
    }

    public function __toString()
    {
        if (!Vertex::$verbose)
            return (sprintf("Vertex( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f )", $this->_x, $this->_y, $this->_z, $this->_w));
        else
            return (sprintf("Vertex( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f, %s )", $this->_x, $this->_y, $this->_z, $this->_w, $this->_color));
    }

    public function doc()
    {
        return ($str = "\n" . file_get_contents("Vertex.doc.txt") . "\n");
    }

    public function __get($name)
    {
        return ($this->$name);
    }

    public function __set($name, $value)
    {
        return ($this->$name = $value);
    }
}
?>