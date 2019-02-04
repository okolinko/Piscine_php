#!/usr/bin/php
<?php
function is_alpha($str)
{
    $str = str_split(strtolower($str));
    foreach ($str as $c)
    {
        if (ord($c) < 97 || ord($c) > 122)//сверяю на символы
            return (false);
    }
    return (true);
}

function sort_array($str_a, $str_b)
{
    $str_a = strtolower($str_a);
    $str_b = strtolower($str_b);
    if (is_alpha($str_a))
        $flag_a = 1;
    else if (is_numeric($str_a))
        $flag_a = 2;
    else
        $flag_a = 3;
    if (is_alpha($str_b))
        $flag_b = 1;
    else if (is_numeric($str_b))
        $flag_b = 2;
    else
        $flag_b = 3;
    if ($flag_a != $flag_b)
        return ($flag_a - $flag_b);
    return (strcmp($str_a, $str_b));
}

function sort_len($str_a, $str_b)
{
    $i = 0;
    while ($i < strlen($str_a) && $i < strlen($str_b))
    {
        if (sort_array($str_a[$i], $str_b[$i]) > 0)
            return (true);
        else if (sort_array($str_a[$i], $str_b[$i]) < 0)
            return (false);
        $i++;
    }
    if ($i < strlen($str_a))
        return (True);
    else if ($i < strlen($str_b))
        return (false);
    return ;
}

function ft_split($text)
{
    $tmp = explode(" ", $text);
    $res = array_filter($tmp, 'strlen');
    sort($res);
    return($res);
}

$tab = $argv;
$array = array();//создаём масив
unset($tab[0]);//удаляет переменную
$tab = array_values($tab);//возвращает массив и заново индексирует возвращаемый массив числовыми индексами
foreach ($tab as $key => $value)
{
    $array = array_merge($array, ft_split($value));//Сливает массивы в один
}
usort($array, "sort_len");
foreach ($array as $value)
{
    echo $value."\n";
}
?>
