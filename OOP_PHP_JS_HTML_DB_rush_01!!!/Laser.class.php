<?php
/**
 *
 */
class Laser
{
  public $cost = 3;

  function __construct()
  {
  }

  public function fire($x, $y, $rot, $gz, $cur)
  {
    $delta = ($rot == 0) ? 1 : -1;
    for ($i=0; $i < 90 * $delta; $i += $delta)
    {
      if (($hitted = $gz->getElem($x + $i, $y)) && $hitted != $cur)
      {
        $dmg = $this->dice($this->range($i));
        return array(array('ship' => $hitted, 'dmg' => $dmg));
      }
    }
    return Null;
  }

  private function range($i)
  {
    if ($i <= 30)
      return 4;
    if ($i <= 60)
      return 5;
    if ($i <= 90)
      return 6;
    return 0;
  }

  private function dice($num)
  {
    if (rand(0, 6) >= $num)
    {
      return 2;
    }
    else
      return 0;
  }
}

 ?>
