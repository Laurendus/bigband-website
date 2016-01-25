<h1>Login</h1>

<?php
    if($authorization->isUserLoggedIn() === TRUE) {                 //Ist der Benutzer bereits eingeloggt?
        $username = $authorization->getUserName();
        //echo "Du bist bereits eingeloggt! :D <a href='index.php?section=logout' alt='Ausloggen'>(Ausloggen)</a>";
        echo "Hallo " . $username .  "! Du bist bereits eingeloggt! :D - <a href='index.php?section=logout' alt='Ausloggen'>(Ausloggen)</a>";
    } else {
        if(isset($_POST['einloggen'])) {
            $userName = $_POST['userName'];
            $password = $_POST['password'];    //empfangen des passworts

            if($authorization->login($userName, $password) === TRUE) {  //war das login erfolgreich?
                //echo "Erfolgreich eingeloggt!";
                echo "<script>isUserLoggedIn = 1;"
                . "userLevel = " . $_SESSION['userLevel'] . ";</script>"
                . "<script src='javascript/navigation.js'></script>";

                header("Location: /startseite");
            } else {
                echo "Einloggen fehlgeschlagen!";
                //echo "<script>document.getElementById('')</script>";
            }
        }
    }
?>

<form action="/login" method="POST">
    <table>                                         <!-- Tabelle zur Eingabe der Logindaten -->
        <tr>
            <td>
                Benutzername:
            </td>
            <td>
                <input type="text" name="userName" placeholder="Benutzername" required autofocus/>
            </td>
        </tr>
        <tr>
            <td>
                Passwort:
            </td>
            <td>
                <input type="password" name="password" placeholder="Passwort" required />
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" name="einloggen" class="button" value="Einloggen" />
            </td>
        </tr>
    </table>
</form>
