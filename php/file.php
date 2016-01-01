<?php
    session_start();
    if(!isset($_SESSION["userID"])){

        header('Location: ../index.php?section=login');

    } else {
        $pdfFolder = '../noten/';

        if (isset($_GET['pdfdir'])) {

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
