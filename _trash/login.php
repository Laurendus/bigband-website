<h1>Login</h1>

<?php
    if($authorization->isUserLoggedIn() === TRUE) {                 //Ist der Benutzer bereits eingeloggt?
        $username = $authorization->getUserName();
        //echo "Du bist bereits eingeloggt! :D <a href='index.php?section=logout' alt='Ausloggen'>(Ausloggen)</a>";
        echo "Hallo " . $username .  "! Du bist bereits eingeloggt! :D - <a href='index.php?section=logout' alt='Ausloggen'>(Ausloggen)</a>";
    } else {
        if(isset($_POST['einloggen'])) {
            $userName = $_POST['userName'];                //empfangen des Benuzernamens
            $salt = $authorization->getSalt($userName);
            $password = hash("sha512", "".$salt.$_POST['password']);    //empfangen des passworts (sha512 verschlüsselt)

            if($authorization->login($userName, $password) === TRUE) {  //war das login erfolgreich?
                //echo "Erfolgreich eingeloggt!";
                header("Location: index.php?sectionstartseite");
                if($_SESSION['userLevel'] == 1) {
                    echo '<script>userLevel = 1;</script>';
                }
                echo "<script>isUserLoggedIn = true;</script>"
                . "<script src='javascript/navigation.js'></script>";
            } else {
                echo "Einloggen fehlgeschlagen!";
                //echo "<script>document.getElementById('')</script>";
            }
        }
    }
?>

<form action="index.php?section=login" method="POST">
    <table>                                         <!-- Tabelle zur Eingabe der Logindaten -->
        <tr>
            <td>
                Benutzername:
            </td>
            <td>
                <input type="text" name="userName" placeholder="Benutzername" required />
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
                <input type="submit" name="einloggen" value="Einloggen" />
            </td>
        </tr>
    </table>
</form>
