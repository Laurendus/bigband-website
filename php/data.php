<?php

    class noten{

        function folder_contents($pieceName) {
            $d = dir($pieceName);
            $arrayAt = 0;
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
        function delete_piece($deleteDirName) {
            $delFiles = $this->folder_contents($deleteDirName);

            for ($i=0; $i < sizeof($delFiles); $i++) {
                unlink($delFiles[$i]);
            }
            if(rmdir($deleteDirName)) {
                echo "Successfully deleted " . $deleteDirName . "!";
            }
        }
    }
