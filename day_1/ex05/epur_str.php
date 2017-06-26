#!/usr/bin/php
<?php
if ($argc == 2)
{
    $line = preg_replace('/\s\s+/', ' ', trim($argv[1]));
    echo "$line\n";
}
?>