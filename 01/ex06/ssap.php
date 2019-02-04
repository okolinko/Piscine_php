#!/usr/bin/php
<?php
if ($argc > 1)
{
    $i = 1;
    while($i < $argc)
    {
        $str .= " ".$argv[$i]." ";
        $i++;
    }
    $line = trim($str);
    while ((strpos($line, "  ")) == TRUE)
    {
        $line = str_replace("  ", " ", $line);
    }
    $tab = explode(" ", $line);
    sort($tab);
    foreach ($tab as $elem)
        echo "$elem\n";
}
?>