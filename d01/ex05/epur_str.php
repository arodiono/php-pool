#!/usr/bin/php
<?php
if ($argc == 2)
    echo preg_replace('/\s\s+/', ' ', trim($argv[1])) . "\n";
?>