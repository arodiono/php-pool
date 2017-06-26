<?php

class Color {

    static $verbose = FALSE;
    public $red;
    public $green;
    public $blue;
    public $rgb;

    static function doc() {
        return file_get_contents('Color.doc.txt');
    }

    function add($obj) {
        return new Color( array('red' => $this->red + $obj->red,
            'green' => $this->green + $obj->green, 'blue' => $this->blue + $obj->blue));
    }

    function sub($obj) {
        return new Color( array('red' => $this->red - $obj->red,
            'green' => $this->green - $obj->green, 'blue' => $this->blue - $obj->blue));
    }

    function mult($f) {
        return new Color( array('red' => $this->red * $f,
            'green' => $this->green * $f, 'blue' => $this->blue * $f));
    }

    function __construct($arg) {
        if ($arg['rgb'] != NULL) {
            $this->red = 0xFF & (intval($arg['rgb']) >> 0x10);
            $this->green = 0xFF & (intval($arg['rgb']) >> 0x8);
            $this->blue = 0xFF & intval($arg['rgb']);
        }
        else {
            $this->red = intval($arg['red']);
            $this->green = intval($arg['green']);
            $this->blue = intval($arg['blue']);
        }
        if (self::$verbose == TRUE) {
            printf("Color( red: %3d, green: %3d, red %3d ) constructed.\n", $this->red, $this->green, $this->blue);
        }
    }

    function __destruct() {
        if (self::$verbose == TRUE) {
            printf("Color( red: %3d, green: %3d, red %3d ) destructed.\n", $this->red, $this->green, $this->blue);
        }
    }

    function __toString() {
        return sprintf("Color( red: %3d, green: %3d, red %3d )", $this->red, $this->green, $this->blue);
    }
}

?>