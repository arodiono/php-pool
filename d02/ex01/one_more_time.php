#!/usr/bin/php
<?php

setlocale(LC_ALL, 'fr_FR');
date_default_timezone_set('Europe/Paris');

if ($argc == 2)
{
    if (preg_match("/^[A-Za-z]{1}[a-z]{1,7} [0-9]{1,2} [A-Za-z]{1}[a-zéû]{1,8} [0-9]{4} [0-9]{2}[:]{1}[0-9]{2}[:]{1}[0-9]{2}$/", $argv[1]))
    {
        $date = explode(" ", $argv[1]);
        $time = explode(":", $date[4]);
        $month = $date[2];
        $year = $date[3];
        $day = $date[1];
        switch ($month) {
            case "Janvier": $month = 1; break;
            case "janvier": $month = 1; break;
            case "Février": $month = 2; break;
            case "février": $month = 2; break;
            case "Mars": $month = 3; break;
            case "mars": $month = 3; break;
            case "Avril": $month = 4; break;
            case "avril": $month = 4; break;
            case "Mai": $month = 5; break;
            case "mai": $month = 5; break;
            case "Juin": $month = 6; break;
            case "juin": $month = 6; break;
            case "Juillet": $month = 7; break;
            case "juillet": $month = 7; break;
            case "Août": $month = 8; break;
            case "août": $month = 8; break;
            case "Septembre": $month = 9; break;
            case "septembre": $month = 9; break;
            case "Octobre": $month = 10; break;
            case "octobre": $month = 10; break;
            case "Novembre": $month = 11; break;
            case "novembre": $month = 11; break;
            case "Décembre": $month = 12; break;
            case "décembre": $month = 12; break;
            default: echo "Wrong Format\n"; exit(); break;
        }
        if (checkdate($month, $day, $year) == FALSE || $time[0] > 23 || $time[2] > 59 || $time[2] > 59)
        {
            echo "Wrong Format" . "\n";
            exit(1);
        }
        echo mktime($time[0], $time[1], $time[2], $month, $day, $year) . "\n";
    }
    else
        echo "Wrong Format" . "\n";
}
?>