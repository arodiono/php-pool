<?php
abstract class Ships
{
    public $pos_x;
    public $pos_y;
    public $img;
    public $direction;
    public $pw;
    public $ph;
    public $speed = 1;
    public $life = 200;

    abstract public function image($d);
    public function __construct($x, $y, $d)
    {
        $this->pos_x = $x;
        $this->pos_y = $y;
        $this->direction = $d;
        $this->image($this->direction);
    }
    public function damage($n)
    {
        $this->life = $this->life - $n;
    }
    public function turn($i)
    {
        if ($i == 1)
        {
            $this->direction = $this->direction + 1;
            if ($this->direction === 5)
                $this->direction = 1;
            $this->image($this->direction);
        }
        if ($i == 2)
        {
            $this->direction = $this->direction - 1;
            if ($this->direction === 0)
                $this->direction = 4;
            $this->image($this->direction);
        }
    }

    public function move()
    {
        switch ($this->direction){
            case 1:
                $this->pos_x = $this->pos_x - $this->speed;
                break;
            case 2:
                $this->pos_y = $this->pos_y - $this->speed;
                break;
            case 3:
                $this->pos_x = $this->pos_x + $this->speed;
                break;
            case 4:
                $this->pos_y = $this->pos_y + $this->speed;
                break;
        }
    }
}