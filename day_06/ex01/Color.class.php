<?php

    class Color
    {
        public $red;
        public $green;
        public $blue;
        public $rgb;
        static $verbose = FALSE;

        function __construct($obj)
        {
            if ($obj['rgb'] != NULL) {
            $this->red = 0xFF & (intval($obj['rgb']) >> 0x10);
            $this->green = 0xFF & (intval($obj['rgb']) >> 0x8);
            $this->blue = 0xFF & intval($obj['rgb']);
        } else {
            $this->red = intval($obj['red']);
            $this->green = intval($obj['green']);
            $this->blue = intval($obj['blue']);
        }
            if (self::$verbose != FALSE)
                printf("Color( red: %3d, green: %3d, blue: %3d) constructed.\n" , $this->red, $this->green, $this->blue);
        }

        function __destruct()
        {
            if (self::$verbose != FALSE)
                printf("Color( red: %3d, green: %3d, blue: %3d) destructed.\n" , $this->red, $this->green, $this->blue);
        }

        static function doc()
        {
            return (file_get_contents('Color.doc.txt'));
        }

        function add($color)
        {
            return new Color(array('red' => $color->red + $this->red, 'green' => $color->green + $this->green, 'blue' => $color->blue + $this->blue));
        }

        function sub($color)
        {
            return new Color(array('red' => $this->red - $color->red, 'green' => $this->green - $color->green, 'blue' => $this->blue - $color->blue));

        }

        function mult($f)
        {
            return new Color(array('red' => $this->red * $f, 'green' => $this->green * $f, 'blue' => $this->blue * $f));

        }

        function __toString()
        {
            return sprintf("Color( red: %3d, green: %3d, blue: %3d)" , $this->red, $this->green, $this->blue);
        }
    }
?>