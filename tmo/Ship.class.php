<?php
/**
 *
 */
class Ship
{
  public $name;
  public $sizeX;
  public $sizeY;
  public $sprite;
  public $hp;
  private $_curHp;
  public $engine;
  public $curPP;
  public $handling;
  public $shield;
  private $_curSh;
  public $weapons;
  private $_curWP = 0;
  public $xpos;
  public $ypos;
  public $team;
  public $rot;
  public $phase;
  public $dist = 0;
  public $stationar;

  public function doc()
  {
    return (file_get_contents("Ship.doc.txt"));
  }

  function __construct(array $args)
  {
    if (!isset($args['name']) ||
        !isset($args['size']) ||
        !isset($args['sprite']) ||
        !isset($args['hp']) ||
        !isset($args['engine']) ||
        !isset($args['handling']) ||
        !isset($args['shield']) ||
        !isset($args['xpos']) ||
        !isset($args['ypos']) ||
        !isset($args['team']) ||
        !isset($args['weapons']))
    {
      echo "wrong ship construction";
      return ;
    }
    $this->name = $args['name'];
    $size_arr = explode('x', $args['size']);
    $this->sizeX = intval($size_arr[0]);
    $this->sizeY = intval($size_arr[1]);
    $this->sprite = $args['sprite'];
    $this->hp = $args['hp'];
    $this->_curHp = $this->hp;
    $this->engine = $args['engine'];
    $this->curPP = $args['engine'];
    $this->handling = $args['handling'];
    $this->shield = $args['shield'];
    $this->_curSh = $this->shield;
    $this->weapons = $args['weapons'];
    $this->xpos = $args['xpos'];
    $this->ypos = $args['ypos'];
    $this->team = $args['team'];
    if ($this->team % 2 == 0)
      $this->rot = 0;
    else
      $this->rot = 180;
    $this->phase = 0;
    $this->stationar = True;
  }

  public function outOfBorders($xsize, $ysize)
  {
    if ($this->xpos < 0 || $this->ypos < 0)
      return True;
    else if ($this->xpos + $this->sizeX > $xsize ||
        $this->ypos + $this->sizeY > $ysize)
      return True;
    else
      return False;
  }

  public function occupy($x, $y)
  {
    if ($x >= $this->xpos && $x < $this->xpos + $this->sizeX &&
        $y >= $this->ypos && $y < $this->ypos + $this->sizeY)
        return (True);
    else
      return False;
  }

  public function receiveDamage($dmg)
  {
    $this->_curHp -= $dmg;
    if ($this->_curHp <= 0)
      $this->_curHp = 0;
  }

  public function getSizeX()
  {
    return ($this->sizeX);
  }

  public function getSizeY()
  {
    return ($this->sizeY);
  }

  public function getSprite()
  {
    return ($this->sprite);
  }

  public function getHp()
  {
    return ($this->_curHp);
  }

  public function isAnker($x, $y)
  {
    if ($x === $this->xpos && $y === $this->ypos)
      return True;
    else
      return False;
  }

  public function move($x, $y)
  {
    echo ($this->dist);
    if ($this->dist > 0 && $this->phase == 1)
    {
      $this->xpos += $x;
      $this->ypos += $y;
      $this->dist -= 1;
      if ($this->dist == 0)
        $this->stationar = True;
      else if ($this->dist != 0)
        $this->stationar = False;
    }
  }

  public function __toString()
  {
    return "[team: ".$this->team."][(ship) name: ".$this->name."<br> hp: ".
    $this->_curHp."<br> shield: ".$this->_curSh."<br> PP: ".$this->curPP."<br>\n dist:".
    $this->dist."<br> phase =".$this->phase."<br> WP: <br>".$this->_curWP.(($this->stationar) ? "stationar" : "in move");
  }

  public function fire($gz)
  {
    if ($this->_curWP >= $this->weapons->cost && $this->phase == 2)
    {
      $arr = $this->weapons->fire($this->xpos, $this->ypos, $this->rot, $gz, $this);
      $this->_curWP -= $this->weapons->cost;
      return $arr;
    }
  }

  public function resetPP()
  {
    $this->curPP = $this->engine;
  }

  public function rotShip($side)
  {
    if ($this->stationar == True && $this->phase == 1)
    {
      if ($side == "left")
      {
        if (($this->rot += 90) >= 360)
          $this->rot = 0;
      }
      else if ($side == "right")
      {
        if (($this->rot -= 90) <= -90)
        $this->rot = 270;
      }
      $tmp = $this->sizeX;
      $this->sizeX = $this->sizeY;
      $this->sizeY = $tmp;
    }
  }

  public function nothingToDo()
  {
    if ($this->phase == 2 && $this->_curWP == 0)
      return True;
    else
      return False;
  }

  public function skipPhase()
  {
    if ($this->phase == 0)
    {
      $this->curPP = $this->engine;
      $this->phase = 1;
      return Null;
    }
    else if ($this->phase == 1)
    {
      $this->dist = 0;
      $this->phase = 2;
      return Null;
    }
    else if ($this->phase == 2)
    {
      $this->_curWP = 0;
      return "last_phase";
    }
  }

  public function SpendPoints($target)
  {
    if ($this->curPP <= 0)
      $this->phase = 1;
    if ($this->phase != 0)
      return ;
    if ($target == "move" && $this->curPP >= 1)
    {
      $this->curPP -= 1;
      $this->dist += rand(0, 6);
    }
    else if ($target == "shields" && $this->curPP >= 1)
    {
      if ($this->_curSh < $this->shield)
      {
        $this->curPP -= 1;
        $this->_curSh += 1;
      }
    }
    else if ($target == "weapons" && $this->curPP >= 1)
    {
      $this->curPP -= 1;
      $this->_curWP += rand(0, 6);
    }
    else if ($target == "repair" && $this->curPP >= 1)
    {
      if ($this->_curHp < $this->hp)
      {
        $this->curPP -= 1;
        if (rand(0, 6) == 6)
        {
          $this->_curHp = $this->hp;
        }
      }
    }
  }
}

 ?>
