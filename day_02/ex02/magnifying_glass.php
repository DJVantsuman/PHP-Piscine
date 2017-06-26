#!/usr/bin/php
<?php
    if ($argc > 1)
    {
        $fp = fopen($argv[1], "a");
        $file = file_get_contents($argv[1]);
        for ($i = 0; $file[$i]; $i++)
        {
            if ($file[$i] == '<' && $file[$i + 1] == 'a')
            {
                while ($file[$i] != '>')
                    $i++;
                while ($file[$i] != '<')
                {
                    if (!ctype_upper($file[$i]))
                        $file[$i] = strtoupper($file[$i]);
                    $i++;
                }
            }
        }
        echo $file;
        fclose($fp);
    }
?>