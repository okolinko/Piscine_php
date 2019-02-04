#!/usr/bin/php
<?php
if ($argc != 2 || !file_exists($argv[1]))
    exit(1);
if (($file = file_get_contents($argv[1])))
{
    preg_match_all("/(<a.*title=)(\".*\")(.*>.*<\/a>)/i", $file, $mat);//Выполняет глобальный поиск шаблона в строке $file и записывает $mat
    foreach ($mat[2] as $val)
    {
        $upp = strtoupper($val);
        $file = str_replace($val, $upp, $file);//$val заменяет в $file на $upp
    }
    preg_match_all("/(<a[^<]*>)([^<]*<)/", $file, $mat);
    foreach ($mat[2] as $val)
    {
        $upp = strtoupper($val);
        $file = str_replace($val, $upp, $file);
    }
    echo $file."\n";
    exit(1);
}
?>