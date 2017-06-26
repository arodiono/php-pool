<?php
class RedShip
{
    public $pos_x;
    public $pos_y;
    public $img;
    public $direction;
    public $pw;
    public $ph;
    public $speed = 1;
    public $life = 300;

    public function image($d)
    {
        switch ($this->direction){
            case 1:
                $this->img= 'img/ship_red_1.png';
                $this->pw = 135;
                $this->ph = 120;
                break;
            case 2:
                $this->img= 'img/ship_red_2.png';
                $this->pw = 135;
                $this->ph = 120;
                break;
            case 3:
                $this->img= 'img/ship_red_3.png';
                $this->pw = 135;
                $this->ph = 120;
                break;
            case 4:
                $this->img= 'img/ship_red_4.png';
                $this->pw = 120;
                $this->ph = 135;
                break;
        }
    }
    public function __construct($x, $y, $d)
    {
        $this->pos_x = $x;
        $this->pos_y = $y;
        $this->direction = $d;
        $this->image($d);
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
?>