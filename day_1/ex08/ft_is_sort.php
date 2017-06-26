<?php
    function ft_is_sort($arr)
    {
        $array = $arr;
        sort($array);
        if ($array == $arr)
            return 1;
        $array = $arr;
        rsort($array);
        if ($array == $arr)
            return 1;
        return 0;
    }