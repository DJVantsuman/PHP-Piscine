#!/usr/bin/php
<?php
    if ($argc > 1)
    {
        $arr = array();
            $arr = array_merge($arr, explode(' ', preg_replace('/\s\s+/', ' ', trim($argv[1]))));
        for ($i = 1; $arr[$i]; $i++)
            echo "$arr[$i] ";
        echo "$arr[0]\n";
    }
?>