<?php
class UnholyFactory
{
    public $factory = array();
    public function absorb($soldier)
    {
        if ($soldier instanceof Fighter)
        {
            if (!in_array($soldier->_soldier, $this->factory))
            {
                print "(Factory absorbed a fighter of type " . $soldier->_soldier . ")\n";
                array_push($this->factory, $soldier->_soldier);
            }
            else
                print "(Factory already absorbed a fighter of type " . $soldier->_soldier . ")\n";
        }
        else
            print "(Factory can't absorb this, it's not a fighter)\n";
    }

    public function fabricate($rf)
    {
        if (in_array($rf, $this->factory)) {
            print "(Factory fabricates a fighter of type " . $rf . ")\n";
            $class = ucfirst(str_replace(' ', '', $rf));
            return (new $class);
        }
        else
        {
            print "(Factory hasn't absorbed any fighter of type llama)\n";
            return NULL;
        }
    }
}
?>