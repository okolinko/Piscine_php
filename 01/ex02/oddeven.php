#!/usr/bin/php
<?php
    echo "Enter a number: ";
    $line = trim(fgets(STDIN));//читает одну строку из потока ввода STDIN
    if (feof(STDIN))
    {
        echo "\n";
        exit(1);
    }
    if (is_numeric($line))
    {
        if ($line % 2 == 0)
            echo "The number $line is even\n";
        else
            echo "The number $line is odd\n";
    }
    else
        echo "'$line' is not a number\n";
?>