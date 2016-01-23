<h1>Upload</h1>
<?php
    if($_SESSION["userLevel"]>3) {
        echo "<p style='font-weight: bold;font-size: 20px;'>Sie haben nicht die benötigten Berechtigungen!</p>";
    } else {
        $fileDirectory = $settings['path_noten'];
        $files = $noten->folder_contents($fileDirectory);
        for ($i=0; $i < sizeof($files); $i++) {
            $new_files[$i] = str_replace("_", " ", $files[$i]);
        }
        if (isset($_POST['upload'])) {
            $musikstueck = $_POST['musikstueck'];
            $instrument = $_POST['instrument'];
            if ($_FILES['fileToUpload']['error'] !== UPLOAD_ERR_OK) {
                die("Upload failed with error " . $_FILES['fileToUpload']['error']);
            }
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mime = finfo_file($finfo, $_FILES['fileToUpload']['tmp_name']);
            $ok = false;
            if ($mime == 'application/pdf') {
                $ok = true;
            } else {
                die("Unknown/not permitted file type!");
            }
            if($ok == true) {
                if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $fileDirectory . "/" . $musikstueck . "/" . $musikstueck .  "-" . $instrument .  ".pdf")) {
                    echo "Erfolgreich hochgeladen!";
                } else {
                    echo "Unbekannter Fehler!";
                }
            }
            /*switch ($mime) {
               case 'image/jpeg':
               case 'application/pdf'
               //case etc....
                    $ok = true;
                    break;
               default:
                   die("Unknown/not permitted file type");
            }*/
        }
        if (isset($_POST['createDir'])) {
            $directory = $_POST['dirName'];
            $directory = str_replace(" " , "_" , $directory);           //replace " " with "_"
            if(!file_exists($fileDirectory . "/" . $directory)) {       //check if directory exists
                if(mkdir($fileDirectory . "/" . $directory,0755)) {     //create directory
                    echo "Musikstück erfolgreich angelegt!";
                    echo "
                    <script>
                        location.reload(true);
                    </script>
                    ";                                                  //Seite aktualisieren wegen Musikstückliste
                } else {
                    echo "Fehler beim Erstellen des Musikstücks! Bitte kontaktieren sie den Webmaster.";
                }
            } else {
                echo "Musikstück existiert bereits!";
            }
        }
}
 ?>

<div class="contentElement">
    <h3>Noten</h3>
    <form action="index.php?section=upload" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>
                    Musikst&uuml;ck:
                </td>

                <td>
                    <select name="musikstueck" required <?php if($_SESSION['userLevel']>2) {echo "disabled";} ?>>
                        <option value="">Bitte wählen...</option>
                        <?php
                            if($_SESSION['userLevel']<3) {
                                for ($i=0; $i < sizeof($files); $i++) {
                                    echo "<option value='" . $files[$i] . "'>" . $new_files[$i] . "</option>";
                                }
                            }
                         ?>
                    </select>
                </td>
            </tr>

            <tr>
                <td>
                    Instrument:
                </td>
                <td>
                    <input type="text" name="instrument" placeholder="Bitte eintragen..." required <?php if ($_SESSION['userLevel']>2) {echo "disabled";} ?>>
                </td>
                <td>
                </td>
            </tr>

            <tr>
                <td>
                </td>

                <td>
                    <input type="file" name="fileToUpload" id="fileToUpload" required <?php if ($_SESSION['userLevel']>2) {echo "disabled";} ?>>
                </td>
            </tr>

            <tr>
                <td>
                </td>
                <td>
                    <input type="submit" class="button" value="Upload" name="upload" <?php if ($_SESSION['userLevel']>2) {echo "disabled";} ?>>
                </td>
        </table>
    </form>
</div>
<div class="contentElement">
    <h3>Musikst&uuml;ck erstellen</h3>
    <table>
        <?php
        $files = $noten->folder_contents($settings["path_noten"]);

        for($i = 0; $i < sizeof($files); $i++) {
            $directoryName = str_replace("_"," ",$files[$i]);   //Unterstriche durch Leerzeichen ersetzen
            echo "<tr>";
            echo "<td>" . $directoryName . "</td>";
            echo "<td><button class='button' onclick='" . $noten->delete_piece($files[$i]) . "'>L&ouml;schen</button></td>";
            echo "</tr>";
        }
        ?>
    </table>

    <form action="index.php?section=upload" method="post">
        <table>
            <tr>
                <td>
                    <input type="text" name="dirName" placeholder="Bitte eintragen..." required <?php if ($_SESSION['userLevel']>2) {echo "disabled";} ?>>
                </td>
                <td>
                    <input type="submit" class="button" name="createDir" value="Erstellen" <?php if ($_SESSION['userLevel']>2) {echo "disabled";} ?>>
                </td>
            </tr>
        </table>
    </form>
</div>
