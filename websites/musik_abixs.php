<?php
    if (!$authorization->isUserLoggedIn() && ($_SESSION['userLevel'] == 1 || $_SESSION['userLevel'] == 2)) {
        echo '<h1>Musikst&uuml;cke</h1>
        <p>Sie sind nicht eingeloggt. <a href="index.php?section=login">Hier einloggen</a></p>';

    } else {

        echo '<h1>Musik f&uuml;r AbiXS</h1>';

        /*if (isset($_GET["musikstueck"])) {
            echo "<a href='index.php?section=musikstuecke'>zur&uuml;ck</a>";
            $musikstueck = $_GET["musikstueck"];
            include "php/noten.php";

        } else {*/

            $fileDirectory = "abixs";
            $d = dir($fileDirectory);
            $arrayAt = 0;
            $files;
            while (($file = $d->read()) !== false){
                $files[$arrayAt]= $file;
                $arrayAt++;
            }                   //directory namen in array speichern
            unset($files[0]);   //directory '.' entfernen
            unset($files[1]);   //directory '..' entfernen
            sort($files);
            $d->close();


            echo "<ul>";
            for ($i=0; $i < (sizeof($files)); $i++) {
                $directoryName = str_replace("_"," ",$files[$i]);   //Unterstriche durch Leerzeichen ersetzen
                //echo '<li><a href="index.php?section=musikstuecke&musikstueck=' . $files[$i] . '"">' . $directoryName . '</a></li>';    //links erstellen
                echo "<li> <a href='/". $fileDirectory . "/" . $files[$i] . "' download>" . $files[$i] . "</a> </li>";
            }
            echo "</ul>";
        //}
    }


 ?>
