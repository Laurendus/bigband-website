<?php
    switch ($section) {
        case '':
            echo "<script>currentlyActive = 'startseite';</script>";
            break;
        case 'startseite':
            echo "<script>currentlyActive = 'startseite';</script>";
            break;
        case 'instrumente':
            echo "<script>currentlyActive = 'instrumente';</script>";
            break;
        case 'musikstuecke':
            echo "<script>currentlyActive = 'musikstuecke';</script>";
            break;
        case 'impressum':
            echo "<script>currentlyActive = 'impressum';</script>";
            break;
        case 'login':
            echo "<script>currentlyActive = 'login';</script>";
            break;
        case 'logout':
            echo "<script>currentlyActive = 'logout';</script>";
            break;
        case 'register':
            echo "<script>currentlyActive = 'register';</script>";
            break;
        case 'upload':
            echo "<script>currentlyActive = 'upload';</script>";
            break;

        default:
            echo "<script>currentlyActive = '';</script>";
            break;
    }
