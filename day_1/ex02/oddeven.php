#!/usr/bin/php
<?php
$stdin = fopen('php://stdin', 'r');
for (;1;)
{
    echo "Enter a number: ";
    $n = fread(STDIN, 8192);
    $n = rtrim($n);
    if (feof(STDIN))
    {
        echo "^D\n";
        exit(0);
    }
    if (is_numeric($n))
    {
        if ($n % 2 == 0)
            echo "The number $n is even";
        else
            echo "The number $n is odd";
    }
    else
        echo "'$n' is not a number";
    echo "\n";
}
fclose($stdin);
?>