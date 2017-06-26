<?php

class Vertex {

    private $_x;
    private $_y;
    private $_z;
    private $_w = 1.00;
    private $_color;
    static $verbose = FALSE;

    static function doc()
    {
        return file_get_contents('Vertex.doc.txt');
    }

    function __construct($arg)
    {
        $this->_x = $arg['x'];
        $this->_y = $arg['y'];
        $this->_z = $arg['z'];
        if ($arg['w'] != NULL)
            $this->_w = $arg['w'];

        if ($arg['color'] != NULL)
            $this->_color = $arg['color'];
        else if (self::$verbose == TRUE)
            $this->_color = new Color( array('red' => 255, 'green' => 255, 'blue' => 255) );

        if (self::$verbose == TRUE) {
            printf("VERTEX( x: %.2f, y: %.2f, z:%.2f, w:%.2f, %s ) constructed\n",
                $this->_x, $this->_y, $this->_z, $this->_w , $this->_color);
        }
    }

    function __destruct()
    {
        if (self::$verbose == TRUE) {
            if ($this->_color == NULL)
                $this->_color = new Color( array('red' => 255, 'green' => 255, 'blue' => 255) );
            printf("VERTEX( x: %.2f, y: %.2f, z:%.2f, w:%.2f, %s ) destructed\n",
                $this->_x, $this->_y, $this->_z, $this->_w , $this->_color);
        }
    }

    function __toString()
    {
        if (self::$verbose == TRUE)
            return sprintf("VERTEX( x: %.2f, y: %.2f, z:%.2f, w:%.2f, %s )",
                $this->_x, $this->_y, $this->_z, $this->_w , $this->_color);
        else
            return sprintf("VERTEX( x: %.2f, y: %.2f, z:%.2f, w:%.2f )",
                $this->_x, $this->_y, $this->_z, $this->_w);
    }

    public function get()
    {
        return array('x' => $this->_x, 'y' => $this->_y, 'z'=> $this->_z,
            'w' => $this->_w, 'color' => $this->_color);
    }
}
?>