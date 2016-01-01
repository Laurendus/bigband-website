<?php
    $fileDirectory = "noten/" . $musikstueck;
    $files = $noten->folder_contents($fileDirectory);

    echo "<ul>";
    for ($i=0; $i < sizeof($files); $i++) {
        //echo $files[$i] . "<br>";

        $fileName = str_replace($musikstueck,"",$files[$i]);
        $fileName = str_replace("-","",$fileName);
        $fileName = str_replace("_"," ",$fileName);
        //$fileName = str_replace("ue","&uuml;",$fileName);
        $fileName = str_replace("ae","&auml;",$fileName);
        $fileName = str_replace("oe","&ouml;",$fileName);
        $fileName = str_replace(".pdf","",$fileName);
        echo "<li><a href='php/file.php?pdfdir=" . $musikstueck . "&pdf=" . $files[$i] . "' target='_blank'>" . $fileName . "</a>";
    }
    echo "</ul>";
?>
<!--'<a href="websites/instrumente.php?musikstueck="' . $files[$i] . '>' . $directoryName . '</a>'-->
