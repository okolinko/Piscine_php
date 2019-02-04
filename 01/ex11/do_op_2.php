#!/usr/bin/php
<?php
    if ($argc != 2)
    {
        echo "Incorrect Parameters\n";
        exit(1);
    }
    else
    {
        if (strpos($argv[1], "+") !== false)
            $tab = explode("+", $argv[1]);
        else if (strpos($argv[1], "-") !== false)
            $tab = explode("-", $argv[1]);
        else if (strpos($argv[1], "*") !== false)
            $tab = explode("*", $argv[1]);
        else if (strpos($argv[1], "/") !== false)
            $tab = explode("/", $argv[1]);
        else if (strpos($argv[1], "%") !== false)
            $tab = explode("%", $argv[1]);
    else
    {
        echo "Syntax Error\n";
        exit(2);
    }
    if (count($tab) != 2)
    {
        echo "Syntax Error\n";
        exit(2);
    }
    else
    {
        foreach ($tab as $value)
            $tab_2[] = trim($value);
        if (ctype_digit($tab_2[0]) && ctype_digit($tab_2[1]))//Проверяет наличие цифровых символов в строке
        {
            if (strpos($argv[1], "+") !== false)
                echo ($tab_2[0] + $tab_2[1]);
            if (strpos($argv[1], "-") !== false)
                echo ($tab_2[0] - $tab_2[1]);
            if (strpos($argv[1], "*") !== false)
                echo ($tab_2[0] * $tab_2[1]);
            if (strpos($argv[1], "/") !== false)
                echo ($tab_2[0] / $tab_2[1]);
            if (strpos($argv[1], "%") !== false)
                echo ($tab_2[0] % $tab_2[1]);
            echo "\n";
        }
        else
        {
            echo "Syntax Error\n";
            exit(2);
        }
    }
}
?>