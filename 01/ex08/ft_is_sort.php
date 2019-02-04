<?php
function ft_is_sort($array)
{
    $tmp = $array;
    sort($tmp);
    if (array_diff_assoc($tmp, $array) == null)//Вычисляет расхождение массивов с дополнительной проверкой индекса
        return (true);
    return (false);
}
?>