<?php
/**
 *
 */
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
class GameZone
{
  public $ships = array();
  public $curShip = 0;
  public $curTeam = 0;
  public $countShips = 0;
  private $_xsize = 150;
  private $_ysize = 100;

  public function doc()
  {
    return file_get_contents("GameZone.doc.txt");
  }

  function __construct($player_num)
  {
    if ($player_num == 2)
    {
        for ($i=0; $i < 10; $i++) {
            $this->addToField(new Scout(0, $i + 3, 0));
        }
        for ($i=0; $i < 10; $i++) {
            $this->addToField(new Scout(146, $i + 89, 1));
        }
    }
    else if ($player_num == 3)
    {
        for ($i=0; $i < 10; $i++) {
            $this->addToField(new Scout(0, $i + 3, 0));
        }
        for ($i=0; $i < 10; $i++) {
            $this->addToField(new Scout(146, $i + 89, 1));
        }
        for ($i=0; $i < 10; $i++) {
            $this->addToField(new Scout(0, $i + 89, 2));
        }
    }
    else if ($player_num == 4)
    {
        for ($i=0; $i < 10; $i++) {
            $this->addToField(new Scout(0, $i + 3, 0));
        }
        for ($i=0; $i < 10; $i++) {
            $this->addToField(new Scout(146, $i + 89, 1));
        }
        for ($i=0; $i < 10; $i++) {
            $this->addToField(new Scout(0, $i + 89, 2));
        }
        for ($i=0; $i < 10; $i++) {
            $this->addToField(new Scout(146, $i + 3, 3));
        }
    }
  }

  public function addToField($ship)
  {
    $this->ships[] = $ship;
    $this->countShips += 1;
  }

  public function getElem($x, $y)
  {
    if (isset($this->ships))
    {
      foreach ($this->ships as $current)
      {
        if ($current->occupy($x, $y))
        return ($current);
      }
    }
    return Null;
  }

  public function elimination()
  {
    if (isset($this->ships))
    {
      foreach ($this->ships as $key => $current)
      {
        if ($current->outOfBorders($this->_xsize, $this->_ysize))
        {
          array_splice($this->ships, $key, 1);
          if (($this->countShips -= 1) == 0)
          unset($this->ships);
        }
        if ($current->getHp() == 0)
        {
          array_splice($this->ships, $key, 1);
          if (($this->countShips -= 1) == 0)
          unset($this->ships);
        }
      }

    }
  }

  public function curShipSkipPhase()
  {
    if (isset($this->ships) && $this->countShips != 0)
    {
      if (($this->ships[$this->curShip]->skipPhase()) == "last_phase")
      {
        $this->nextShip();
      }
    }
  }

  public function nextShip()
  {
    if (isset($this->ships))
    {
      if ($this->ships[$this->curShip]->nothingToDo())
      {
        if ($this->countShips == 1)
        {
          $this->curShip = 0;
          $this->ships[$this->curShip]->resetPP();
          return ;
        }
        $this->curShip += 1;
        if ($this->curShip >= $this->countShips)
        $this->curShip = 0;
        $this->ships[$this->curShip]->resetPP();
      }
    }
  }

  public function moveCurShip()
  {
    if ($this->countShips != 0 && isset($this->ships))
    {
      if ($this->ships[$this->curShip]->rot == 180)
        $this->ships[$this->curShip]->move(-1, 0);
      else if ($this->ships[$this->curShip]->rot == 0)
        $this->ships[$this->curShip]->move(1, 0);
      else if ($this->ships[$this->curShip]->rot == 90)
        $this->ships[$this->curShip]->move(0, -1);
      else if ($this->ships[$this->curShip]->rot == 270)
        $this->ships[$this->curShip]->move(0, 1);
      $this->elimination();
      $this->nextShip();
    }
  }

  public function rotCurShip($side)
  {
    $this->ships[$this->curShip]->rotship($side);
    $this->elimination();
    $this->nextShip();
  }

  public function fireFromCurrent()
  {
    if (isset($this->ships) && $this->countShips > 0)
    {
      $arr = $this->ships[$this->curShip]->fire($this);
      if ($arr != Null)
      {
        foreach ($arr as $ship_dmg)
        {
          $this->ships[array_search($ship_dmg['ship'], $this->ships)]->receiveDamage($ship_dmg['dmg']);
        }
      }
      $this->elimination();
      $this->nextShip();
    }
  }

  public function spendPointsCurShip($target)
  {
    if (isset($this->ships) && $this->countShips != 0)
    {
      $this->ships[$this->curShip]->SpendPoints($target);
    }
  }

  public function printgz()
  {
    echo "<table>\n";
    for ($j = 0; $j < $this->_ysize; $j++)
    {
      echo "<tr>\n";
      for ($i = 0; $i < $this->_xsize; $i++)
      {
        if (($cur = $this->getElem($i, $j)))
        {
          if ($cur->isAnker($i, $j))
          {
              echo "<td class=\"rotate".$cur->rot." ".($this->ships[$this->curShip] == $cur ? " red" : "")."\"colspan='".$cur->getSizeX()."' rowspan='".$cur->getSizeY()."'><img src='".$cur->getSprite()."'></td>\n";
          }
        }
        else
        {
          echo "<td></td>\n";
        }
      }
      echo "</tr>\n";
    }
    echo "</table>\n";
  }

  public function printControls($user_team)
  {
    if (!isset($this->ships))
    {
      echo "<b>GAME IS OVER</b>";

    }
    if ($user_team != $this->ships[$this->curShip]->team)
    {
      echo "<b>Wait for team ".$this->ships[$this->curShip]->team." move</b>";
      return ;
    }
    if ($this->ships[$this->curShip]->phase == 0)
    {
      echo <<<EOL
        <h1>Stage 1: Spend Points</h1>
       <input type="button" name="spend" value="move" >
       <br>
       <input type="button" name="spend" value="shields" >
       <br>
       <input type="button" name="spend" value="weapons" >
       <br>
       <input type="button" name="spend" value="repair" >
       <br>
       <input type="button" name="skip" value="skip" >
       <br>
EOL;
    }
    if ($this->ships[$this->curShip]->phase == 1)
    {
      echo <<<EOL
      <h1>Stage 2: Move</h1>
       <input type="button" name="move" value="forward" >
       <br>
       <input type="button" name="rot" value="left" >
       <br>
       <input type="button" name="rot" value="right" >
       <br>
       <input type="button" name="skip" value="skip" >
       <br>
EOL;
    }
    if ($this->ships[$this->curShip]->phase == 2)
    {
      echo <<<EOL
      <h1>Stage 3: Attack! Attack!</h1>
       <br>
       <input type="button" name="fire" value="fire" >
       <br>
       <input type="button" name="skip" value="skip" >
       <br>
EOL;
    }

  }
}

 ?>
