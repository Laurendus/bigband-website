<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Register</h1>

    <?php
        if(isset($_SESSION['userID']) == TRUE & $_SESSION['userLevel'] == 1) {                 //Ist der Benutzer bereits eingeloggt?
            $username = $authorization->getUserName();
            //echo "Du bist bereits eingeloggt! :D <a href='index.php?section=logout' alt='Ausloggen'>(Ausloggen)</a>";
            echo "Hallo " . $username .  "! Du bist eingeloggt und hast entsprechende User-Rechte! :D";
        } else {
            echo "Du hast keine entsprechenden Rechte dazu! ";
        }

        if(isset($_POST['registrieren'])) {
                $userName = $_POST['userName'];                         //empfangen des Benuzernamens
                $password = $_POST['password'];                         //empfangen des passworts
                $userLevel = $_POST['userLevel'];                       //empfangen des userLevels

                $registration->newUser($userName, $password, $userLevel);
            }
    ?>

    <form action="index.php?section=register" method="POST">
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
                    Userlevel:
                </td>
                <td>
                    <input type="text" name="userLevel" placeholder="Userlevel" required />
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    (0=Default 1=Admin 2=Moderator 3= User)
                <td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="registrieren" value="Registrieren" />
                </td>
            </tr>
        </table>
    </form>
    </body>
</html>
