<?php

    class noten{

        function folder_contents($fileDirectory) {
            $d = dir($fileDirectory);
            $arrayAt = 0;
            $contents;
            while (($file = $d->read()) !== false){
                $contents[$arrayAt]= $file;
                $arrayAt++;
            }                   //directory namen in array speichern
            unset($contents[0]);   //directory '.' entfernen
            unset($contents[1]);   //directory '..' entfernen
            sort($contents);       //array alphabetisch sortieren
            $d->close();        //fileDirectory schliessen
            return $contents;
        }
        function delete_piece($dirName) {
            $files = noten::folder_contents($dirName);

            for ($i=0; $i < sizeof($files); $i++) {
                unlink($files[$i]);
            }
            if(rmdir($dirName)) {
                echo "Successfully deleted " . $dirName . "!";
            }
        }
    }

 ?>
