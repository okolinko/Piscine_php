#!/usr/bin/php
<?php
    if ($argc > 1)
    {
        $line = trim($argv[1]);
        while ((strpos($line, "  ")) == TRUE)
            $line = str_replace("  ", " ", $line);
        echo "$line\n";
    }
?>