<!DOCTYPE html>
<?php
    session_start();

    if(isset($_GET["section"])) {           //section
        $section = $_GET["section"];
    } else {
        $section = "";
    }
    $settings = parse_ini_file('settings.ini');
    require_once 'php/mysql.php';
    $authorization = new authorization();   //include class "authorization"
    $registration = new registration();     //include class "registration"

    require_once 'php/data.php';
    $noten = new noten();
?>

<html lang="de-DE">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>BigBand Syke</title>
        <link rel="stylesheet" type="text/css" href="css/main.css"> <!-- include main.css -->
        <link rel="stylesheet" type="text/css" href="css/nav.css">  <!-- include nav.css -->
        <link rel="stylesheet" type="text/css" href="css/style.css"><!-- include style.css -->
        <script>
            var currentlyActive = '';
            <?php
                if (!isset($_SESSION['userLevel'])) {
                    echo "var userLevel = 0;";
                } else {
                    echo "var userLevel = " . $_SESSION['userLevel'] . ";";
                }
                if (!isset($_SESSION['userID'])) {
                    echo "var isUserLoggedIn = 0;";
                } else {
                    echo "var isUserLoggedIn = 1;";
                }
             ?>
        </script>
        <?php
        include 'php/navigation.php';
        ?>
    </head>
    <body>
        <div id="wrapper">

            <header>
                <!-- <img src="../media/bigband-header.png" alt="BigBand Header" height="auto" width="auto"> -->
            </header>

            <nav id="nav">
                <?php //include 'php/nav.php'; ?>
                <script src="javascript/navigation.js"></script>
            </nav>

            <main>
                <?php
                    //echo $settings['db_name'] . "<br>";
                    //echo $settings['db_host'] . "<br>";
                    //echo $settings['db_user'] . "<br>";
                    //echo $settings['db_password'] .  "<br>";
                    //echo $settings['upload_path_noten'];
                 ?>
                <?php include 'php/sites.php'; ?>
            </main>
        </div>

        <footer>
            <?php
                include 'php/footer.php';
            ?>
        </footer>
    </body>
</html>
