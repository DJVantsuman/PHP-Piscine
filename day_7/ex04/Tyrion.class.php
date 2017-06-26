<?php

class Tyrion
{
    public function sleepWith($obj)
    {
        if (get_class($obj) == "Jaime")
            print ("Not even if I'm drunk !". PHP_EOL);
        if (get_class($obj) == "Sansa")
            print ("Let's do this.". PHP_EOL);
        if (get_class($obj) == "Cersei")
            print ("Not even if I'm drunk !". PHP_EOL);
    }
}
?>