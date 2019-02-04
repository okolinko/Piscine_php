#!/usr/bin/php
<?php
if ($argc > 1)
{
    $i = 1;
    $str = $argv[1];
    $tab = explode(" ", $str);
    $len = count($tab);
    while ($i < $len)
        echo $tab[$i++]." ";
    echo $tab[0]."\n";
}
?>