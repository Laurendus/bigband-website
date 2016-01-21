<h1>Musikst&uuml;cke</h1>
<?php
    if (!$authorization->isUserLoggedIn()) {
        echo '<p>Sie sind nicht eingeloggt. <a href="index.php?section=login">Hier einloggen</a></p>';
    } else {
        if (isset($_GET["musikstueck"])) {
            echo "<a href='index.php?section=musikstuecke'>zur&uuml;ck</a>";
            $musikstueck = $_GET["musikstueck"];
            include "php/noten.php";

        } else {
            $fileDirectory = $settings['path_noten'];
            $files = $noten->folder_contents($fileDirectory);

            echo "<ul>";
            for ($i=0; $i < sizeof($files); $i++) {
                $directoryName = str_replace("_"," ",$files[$i]);   //Unterstriche durch Leerzeichen ersetzen
                echo '<li><a href="index.php?section=musikstuecke&musikstueck=' . $files[$i] . '"">' . $directoryName . '</a></li>';    //links erstellen
            }
            echo "</ul>";
        }
    }

 ?>
