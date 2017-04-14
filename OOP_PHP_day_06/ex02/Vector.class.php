<?php
require_once 'Vertex.class.php';
require_once 'Color.class.php';

class Vector
{
    private $_x = 0;
    private $_y = 0;
    private $_z = 0;
    private $_w = 0;
    public static $verbose = false;

    public function __construct(array $arg)
    {
        if (isset($arg['x']) && isset($arg['y']) && isset($arg['z']))
        {
            $this->_x = $arg['x'];
            $this->_y = $arg['y'];
            $this->_z = $arg['z'];
            $this->_w = 0.0;
        }
        else if (isset($arg['dest']) || (isset($arg['dest']) && isset($arg['orig'])))
        {
            $dest = $arg['dest'];
            if (!isset($arg['orig']))
                $orig = new Vertex(array('x' => 0, 'y' => 0, 'z' => 0, 'w' => 1));
            else
                $orig = $arg['orig'];
            $this->_x = $dest->_x - $orig->_x;
            $this->_y = $dest->_y - $orig->_y;
            $this->_z = $dest->_z - $orig->_z;
            $this->_w = 0.0;
        }
        Vector::$verbose == true ? print $this . " constructed\n" : 0;
    }

    public function __destruct()
    {
        Vector::$verbose == true ? print $this . " destructed\n" : 0;
    }

    public function __toString()
    {
        return (sprintf("Vector( x:%.2f, y:%.2f, z:%.2f, w:%.2f )", $this->_x, $this->_y, $this->_z, $this->_w));
    }

    public function doc()
    {
        return ($str = "\n" . file_get_contents("Vector.doc.txt") . "\n");
    }

    public function __get($name)
    {
        return ($this->$name);
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function magnitude()
    {
        return ($magnitude = sqrt(pow($this->_x, 2) + pow($this->_y, 2) + pow($this->_z, 2)));
    }

    public function normalize()
    {
        $new_magnitude = $this->magnitude();
        $new_x = $this->_x / $new_magnitude;
        $new_y =  $this->_y / $new_magnitude;
        $new_z = $this->_z / $new_magnitude;
        return (new Vector(array('x' => $new_x, 'y' => $new_y, 'z' => $new_z)));
    }

    public function add(Vector $arg)
    {
        $new_x = $this->_x + $arg->_x;
        $new_y = $this->_y + $arg->_y;
        $new_z = $this->_z + $arg->_z;
        return (new Vector(array('x' => $new_x, 'y' => $new_y, 'z' => $new_z)));
    }

    public function sub(Vector $arg)
    {
        $new_x = $this->_x - $arg->_x;
        $new_y = $this->_y - $arg->_y;
        $new_z = $this->_z - $arg->_z;
        return (new Vector(array('x' => $new_x, 'y' => $new_y, 'z' => $new_z)));
    }

    public function opposite()
    {
        $new_x = -$this->_x;
        $new_y = -$this->_y;
        $new_z = -$this->_z;
        return (new Vector(array('x' => $new_x, 'y' => $new_y, 'z' => $new_z)));
    }

    public function scalarProduct($mult)
    {
        $new_x = $this->_x * $mult;
        $new_y = $this->_y * $mult;;
        $new_z = $this->_z * $mult;;
        return (new Vector(array('x' => $new_x, 'y' => $new_y, 'z' => $new_z)));
    }

    public function dotProduct(Vector $arg)
    {
        $scale_x = $this->_x * $arg->_x;
        $scale_y = $this->_y * $arg->_y;
        $scale_z = $this->_z * $arg->_z;
        $dop_p = $scale_x + $scale_y + $scale_z;
        return ($dop_p);
    }

    public function cos(Vector $arg)
    {
        $scale_x = $this->_x * $arg->_x;
        $scale_y = $this->_y * $arg->_y;
        $scale_z = $this->_z * $arg->_z;
        $magn_this = sqrt(pow($this->_x, 2) + pow($this->_y, 2) + pow($this->_z, 2));
        $magn_arg = sqrt(pow($arg->_x, 2) + pow($arg->_y, 2) + pow($arg->_z, 2));
        $cos = ($scale_x + $scale_y + $scale_z) / ($magn_this * $magn_arg);
        return ($cos);
    }

    public function crossProduct(Vector $rhs)
    {
        $cross_x = $this->_y * $rhs->_z - $this->_z * $rhs->_y;
        $cross_y = $this->_z * $rhs->_x - $this->_x * $rhs->_z;
        $cross_z = $this->_x * $rhs->_y - $this->_y * $rhs->_x;
        return (new Vector(array('x' => $cross_x, 'y' => $cross_y, 'z' => $cross_z)));
    }
}
?>