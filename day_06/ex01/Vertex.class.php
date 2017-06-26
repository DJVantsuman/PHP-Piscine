<?php
require_once 'Color.class.php';

    class Vertex
    {
        private $_x;
        private $_y;
        private $_z;
        private $_w = 1.00;
        private $_color;
        static $verbose = FALSE;

        function __construct($obj)
        {
            $this->_x = $obj['x'];
            $this->_y = $obj['y'];
            $this->_z = $obj['z'];
            if ($obj['w'] != NULL)
                $this->_w = $obj['w'];
            if ($obj['color'] != NULL)
                $this->_color = $obj['color'];
            else
                $this->_color = new Color( array('red' => 255, 'green' => 255, 'blue' => 255));
            if (self::$verbose == TRUE)
                printf("Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f, %s ) constructed.\n", $this->_x, $this->_y, $this->_z, $this->_w, $this->_color);
        }

        function __destruct()
        {
            if (self::$verbose == TRUE)
                printf("Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f, %s ) destructed.\n", $this->_x, $this->_y, $this->_z, $this->_w, $this->_color);
        }

        static function doc()
        {
            return (file_get_contents('Vertex.doc.txt'));
        }

        function __toString()
        {
            if (self::$verbose == TRUE)
                return sprintf("Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f, %s )", $this->_x, $this->_y, $this->_z, $this->_w, $this->_color);
            else
                return sprintf("Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f )", $this->_x, $this->_y, $this->_z, $this->_w);
        }
    }
?>