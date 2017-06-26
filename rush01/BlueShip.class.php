<?php
class BlueShip extends Ships
{
    public $speed = 1;
    public $life = 300;

    public function image($d)
    {
        switch ($this->direction){
            case 1:
                $this->img= 'img/ship_green_1.png';
                $this->pw = 135;
                $this->ph = 120;
                break;
            case 2:
                $this->img= 'img/ship_green_2.png';
                $this->pw = 135;
                $this->ph = 120;
                break;
            case 3:
                $this->img= 'img/ship_green_3.png';
                $this->pw = 135;
                $this->ph = 120;
                break;
            case 4:
                $this->img= 'img/ship_green_4.png';
                $this->pw = 120;
                $this->ph = 135;
                break;
        }
    }
}
?>