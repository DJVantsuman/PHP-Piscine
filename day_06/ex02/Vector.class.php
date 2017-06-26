<?php

require_once 'Vertex.class.php';
require_once 'Color.class.php';

class Vector
{
    private $_x;
    private $_y;
    private $_z;
    private $_w = 0.0;
    private $_dest;
    private $_orig;
    static $verbose = FALSE;

    function __construct($arg)
    {
        $this->_dest = $arg['dest'];
        $this->_orig = $arg['orig'];
        if ($this->_orig)
        {
            $this->_x = abs($this->_dest->get('x')) + abs($this->_orig->get('x'));
            $this->_y = abs($this->_dest->get('y')) + abs($this->_orig->get('y'));
            $this->_z = abs($this->_dest->get('z')) + abs($this->_orig->get('z'));
            if ($this->_dest->get('x') < 0)
                $this->_x = -$this->_x;
            if ($this->_dest->get('y') < 0)
                $this->_y = -$this->_y;
            if ($this->_dest->get('z') < 0)
                $this->_z = -$this->_z;
        }
        else{
            $this->_x = $this->_dest->get('x');
            $this->_y = $this->_dest->get('y');
            $this->_z = $this->_dest->get('z');
        }
        if (self::$verbose == TRUE)
            printf("Vector( x:%.2f, y:%.2f, z:%.2f, w:%.2f ) constructed\n", $this->_x, $this->_y, $this->_z, $this->_w);
    }

    function __destruct()
    {
        if (self::$verbose == TRUE)
            printf("Vector( x:%.2f, y:%.2f, z:%.2f, w:%.2f ) constructed\n", $this->_x, $this->_y, $this->_z, $this->_w);
    }

    function magnitude()
    {
        return sqrt(pow($this->_x, 2) + pow($this->_y, 2) + pow($this->_z, 2));
    }

    function normalize()
    {
        $vertex = new Vertex(array('x' => ($this->_x * (1/$this->magnitude())), 'y' => ($this->_y * (1/$this->magnitude())), 'z' => ($this->_z * (1/$this->magnitude()))));
        return new Vector(array('dest' => $vertex));
    }

    function add($vector)
    {
        $dest = new Vertex(array('x' => $this->_x + $vector->_x, 'y' => $this->_y + $vector->_y, 'z' => $this->_z + $vector->_z));
        return new Vector(array('dest' => $dest));
    }

    function sub($vector)
    {
        $dest = new Vertex(array('x' => $this->_x - $vector->_x, 'y' => $this->_y - $vector->_y, 'z' => $this->_z - $vector->_z));
        return new Vector(array('dest' => $dest));
    }

    function opposite()
    {
        $dest = new Vertex(array('x' => -$this->_x, 'y' => -$this->_y, 'z' => -$this->_z));
        return new Vector(array('dest' => $dest));
    }

    function __toString()
    {
        return sprintf("Vector( x:%.2f, y:%.2f, z:%.2f, w:%.2f )", $this->_x, $this->_y, $this->_z, $this->_w);
    }

    function doc()
    {
        return file_get_contents('Vector.doc.txt');
    }
}
?>