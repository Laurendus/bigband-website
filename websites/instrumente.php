<h1>Instrumente</h1>

<?php
    if (!$authorization->isUserLoggedIn())  {
        echo '
        <p>Sie sind nicht eingeloggt. <a href="index.php?section=login">Hier einloggen</a></p>';
    } else {
        echo '
            <p>Diese Seite befindet sich noch im Aufbau! Bitte schaut doch mal bei &#9758; <a href="index.php?section=musikstuecke">Musikst&uuml;cke</a> &#9756; nach! &#9786;</p>';
    }
?>
