#!/usr/bin/php
<?php
function ft_split($text)
{
   $tmp = explode(" ", $text);
   $res = array_filter($tmp, 'strlen');
   sort($res);
   return($res);
}
?>