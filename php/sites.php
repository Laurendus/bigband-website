<?php

    switch($section) {
        case "":
            include("websites/startseite.php");
            break;
        case "startseite":
            include("websites/startseite.php");
            break;
        case "instrumente":
            include("websites/instrumente.php");
            break;
        case "musikstuecke":
            include("websites/musikstuecke.php");
            break;
        case "impressum":
            include("websites/impressum.php");
            break;
        case "login":
            include("websites/login.php");
            break;
        case "logout":
            include("websites/logout.php");
            break;
        case "register":
            include("websites/register.php");
            break;
        case 'abixs':
            include("websites/musik_abixs.php");
            break;
        case 'upload':
            include("websites/upload.php");
            break;
        default:
            include("websites/404.php");
            break;
    }