#!/usr/bin/php
<?php
if ($argc > 1)
{
    $per = "/[ \t\r]+/";
    echo trim(preg_replace($per, " ", $argv[1]))."\n";
}
