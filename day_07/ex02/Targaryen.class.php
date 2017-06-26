<?php

class Targaryen
{
    function getBurned()
    {
        if ($this->resistsFire() == FALSE)
            return "burns alive";
        else
            return "emerges naked but unharmed";
    }

    public function resistsFire() {
        return FALSE;
    }
}
?>