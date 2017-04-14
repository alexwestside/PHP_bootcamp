<?php
class Color
{
    public $red = 0;
    public $green = 0;
    public $blue = 0;
    public static $verbose = false;

    function __construct(array $arg)
    {
        if (isset($arg['rgb']))
        {
            $this->red = (intval($arg['rgb']) & 0xFF0000) >> 16;
            $this->green = (intval($arg['rgb']) & 0xFF00) >> 8 ;
            $this->blue = intval($arg['rgb']) & 0xFF;
        }
        else if (isset($arg['red']) && isset($arg['green']) && isset($arg['blue']))
        {
            $this->red = intval($arg['red']);
            $this->green = intval($arg['green']);
            $this->blue = intval($arg['blue']);
        }
        Color::$verbose == true ? print $this ." constructed.\n" : 0;
    }
    public function __toString()
    {
        return (sprintf("Color( red: %3d, green: %3d, blue: %3d )", $this->red, $this->green, $this->blue));
    }

    public static function doc()
    {
        return ($str = "\n" . file_get_contents("Color.doc.txt") . "\n");
    }

    public function __destruct()
    {
        Color::$verbose == true ? print $this ." destructed.\n" : 0;
    }

    public function add(Color $arg)
    {
        $new_red = $this->red + $arg->red;
        $new_green = $this->green + $arg->green;
        $new_blue = $this->blue + $arg->blue;
        return (new Color(array ('red' => $new_red, 'green' => $new_green, 'blue' => $new_blue)));
    }
    public function sub(Color $arg)
    {
        $new_red = $this->red - $arg->red;
        $new_green = $this->green - $arg->green;
        $new_blue = $this->blue - $arg->blue;
        return (new Color(array ('red' => $new_red, 'green' => $new_green, 'blue' => $new_blue)));
    }
    public function mult($mult)
    {
        $new_red = $this->red * $mult;
        $new_green = $this->green * $mult;
        $new_blue = $this->blue * $mult;
        return (new Color(array ('red' => $new_red, 'green' => $new_green, 'blue' => $new_blue)));
    }
}
?>