<?php
    session_start();
    if(!isset($_SESSION["userID"])){

        header('Location: ../index.php?section=login');

    } else {
        $settings = parse_ini_file('../settings.ini');
        function validation_check($eingabe) {
            global $settings;

            require_once("data.php");
            $noten = new data;

            $check = $noten->folder_contents("../" . $settings["path_noten"]);
            $okay = FALSE;
            for($i = 0; $i < sizeof($check); $i++) {
                if($eingabe == $check[$i]) {
                    $okay = TRUE;
                }
            }
            if($okay === TRUE) {
                return true;
            } else {
                return false;
            }
        }
        $pdfFolder = '../' . $settings["path_noten"] . '/';

        if (isset($_GET['pdfdir']) & validation_check($_GET['pdfdir'])) {

            $pdfDir = $_GET['pdfdir'] . "/";
            if (isset($_GET['pdf']) && basename($_GET['pdf']) == $_GET['pdf']) {

                $pdf = $pdfFolder.$pdfDir.$_GET['pdf'];
                if (file_exists($pdf) && is_readable($pdf)) {

                    header('Content-Type: application/pdf');
                    header('Content-length: '.filesize($pdf));
                    $file = @ fopen($pdf, 'rb');
                    if ($file) {

                        fpassthru($file);
                        fclose($file);
                        exit;
                    }
                }
            }
        }
    }
?>