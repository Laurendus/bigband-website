<?php

    if($authorization->isUserLoggedIn() === TRUE) {
        $authorization->logout();
        echo '<script>isUserLoggedIn = false;</script>'
         . '<script src="javascript/navigation.js"></script>';
        header('Location: /startseite');

    } else {
        echo "Du bist nicht eingeloggt!";
    }
