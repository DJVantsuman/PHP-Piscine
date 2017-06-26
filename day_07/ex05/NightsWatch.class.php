<?php

class NightsWatch implements IFighter
{

    public function recruit($obj)
    {
        if (get_class($obj) == "JonSnow" || get_class($obj) == "SamwellTarly")
            $obj->fight();
    }

    public function fight() {

    }
}

?>