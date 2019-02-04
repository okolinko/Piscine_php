#!/usr/bin/php
<?php
    date_default_timezone_set('Europe/Kiev');
    $file = fopen("/var/run/utmpx", "r");
    $size_line = 628;
    while ($utmpx = fread($file, $size_line))
    {
        $unpack = unpack("a256login/a4id/a32line/iupid/iutype/I1timeentry", $utmpx);
        if ($unpack["utype"] == 7)
        {
            $res[] = $unpack;
            $lines[] = $unpack["line"];
        }
    }
    array_multisort($lines, $res);
    foreach ($res as $line)
    {
        echo $line['login']." ".$line['line']."  ".date("M j H:i", $line["timeentry"])."\n";
    }
?>