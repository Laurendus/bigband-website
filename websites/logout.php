<?php

    if($authorization->isUserLoggedIn() === TRUE) {
        $authorization->logout();
        echo '<script>isUserLoggedIn = false;</script>'
         . '<script src="javascript/navigation.js"></script>';
        header('Location: index.php?section=startseite');

    } else {
        echo "Du bist nicht eingeloggt!";
    }


?>
