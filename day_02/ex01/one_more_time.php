#!/usr/bin/php
<?php
    if ($argc == 2)
    {
        date_default_timezone_set('UTC');
        $line = explode(' ', preg_replace('/\s\s+/', ' ', trim($argv[1])));
        if (count($line) == 5)
            $time = explode(':', $line[4]);
        else
        {
            echo "Wrong Format\n";
            exit(0);
        }
        if (count($time) == 3 && is_numeric(rtrim($time[0])) && is_numeric(rtrim($time[1])) && is_numeric(rtrim($time[2])))
        {
            if (strlen($time[0]) != 2 || strlen($time[1]) != 2 || strlen($time[2]) != 2)
            {
                echo "Wrong Format\n";
                exit(0);
            }
        }
        else
        {
            echo "Wrong Format\n";
            exit(0);
        }
        $mans = 0;
        $error = 0;
        if ($line[2] == "Janvier" || $line[2] == "janvier")
            $mans = 1;
        else if ($line[2] == "Février" || $line[2] == "février")
            $mans = 2;
        else if ($line[2] == "Mars" || $line[2] == "mars")
            $mans = 3;
        else if ($line[2] == "Avril" || $line[2] == "avril")
            $mans = 4;
        else if ($line[2] == "Mai" || $line[2] == "mai")
            $mans = 5;
        else if ($line[2] == "Juin" || $line[2] == "juin")
            $mans = 6;
        else if ($line[2] == "Juillet" || $line[2] == "juillet")
            $mans = 7;
        else if ($line[2] == "Août" || $line[2] == "août")
            $mans = 8;
        else if ($line[2] == "Septembre" || $line[2] == "septembre")
            $mans = 9;
        else if ($line[2] == "Octobre" || $line[2] == "octobre")
            $mans = 10;
        else if ($line[2] == "Novembre" || $line[2] == "novembre")
            $mans = 11;
        else if ($line[2] == "Décembre" || $line[2] == "décembre")
            $mans = 12;
        if (($line[0] == "Lundi" || $line[0] == "lundi") || ($line[0] == "Mardi" || $line[0] == "mardi") || ($line[0] == "Mercredi" || $line[0] == "mercredi") || ($line[0] == "Jeudi" || $line[0] == "jeudi") || ($line[0] == "Vendredi" || $line[0] == "vendredi") || ($line[0] == "Samedi" || $line[0] == "samedi") || ($line[0] == "Dimanche" || $line[0] == "dimanche"))
            $day = $line[0];
        else
        {
            echo "Wrong Format\n";
            exit(0);
        }
        if (!is_numeric(rtrim($line[3])) || strlen($line[3]) != 4 || !checkdate($mans, $line[1], $line[3]))
        {
            echo "Wrong Format\n";
            exit(0);
        }
            $time_sec = mktime($time[0], $time[1], $time[2], $mans, $line[1], $line[3], 1);
            echo "$time_sec\n";
    }
?>