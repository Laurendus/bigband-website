<?php
    $settings = parse_ini_file('settings.ini');
    static $_db;
// db_username  = bigband
// db_password  = bigband
// db_host      = localhost
// db_name      = bigband

class authorization {
    /*private static $_db_username    = "bigband";
    private static $_db_password    = "bigband";
    private static $_db_host        = "localhost";
    private static $_db_name        = "bigband";*/
    //private static $_db;

    /*function __construct() {
        try {
            self::$_db = new PDO("mysql:host=" . self::$_db_host . ";dbname=" . self::$_db_name,  self::$_db_username , self::$_db_password);
        } catch (PDOException $e) {
            echo "Datenbankverbindung gescheitert!";
            die();
        }
    }*/
    function __construct() {
        try {
            global $settings, $_db;
            $_db = new PDO("mysql:host=" . $settings['db_host'] . ";dbname=" . $settings['db_name'],  $settings['db_user'] , $settings['db_password']);
        } catch (PDOException $e) {
            echo "Datenbankverbindung gescheitert!";
            die();
        }
    }

    function isUserLoggedIn() {
        if(isset($_SESSION["userID"])){
            return true;
        }else{
            return false;
        }
    }

    function login($userName, $pw) {
        global $_db;

        $stmt = $_db->prepare('SELECT password FROM crypt_users WHERE username= :userName'); //userID aus Datenbank abrufen
            $stmt->bindParam(":userName", $userName);
            $stmt->execute();

            $userInfo = $stmt->fetch(PDO::FETCH_ASSOC);

        if(password_verify($pw, $userInfo['password'])) {
            $stmt = $_db->prepare('SELECT userID FROM crypt_users WHERE username= :userName');
                $stmt->bindParam(":userName", $userName);
                $stmt->execute();
                $userInfo = $stmt->fetch(PDO::FETCH_ASSOC);
            $_SESSION["userID"] = $userInfo['userID']; //userID in session speichern
            $stmt = $_db->prepare('SELECT userLevel FROM crypt_users WHERE userID = :userID');
                $stmt->bindParam(":userID", $_SESSION["userID"]);
                $stmt->execute();
                $userInfo = $stmt->fetch(PDO::FETCH_ASSOC);
            $_SESSION["userLevel"] = $userInfo['userLevel']; //userLevel in session speichern

            return true;
        } else {
            return false;
        }
    }

    function logout() {
        session_unset("userID");
        session_unset("userLevel");
    }

    function getUsername() {
        global $_db;
        $stmt = $_db ->prepare('SELECT username FROM crypt_users WHERE userID = :userID');
        $stmt->bindParam(":userID", $_SESSION["userID"]);
        $stmt->execute();

        $userName = $stmt->fetch(PDO::FETCH_ASSOC);
        return $userName['username'];
    }
}

class registration {
    /*private static $_db_username    = "bigband";
    private static $_db_password    = "bigband";
    private static $_db_host        = "localhost";
    private static $_db_name        = "bigband";
    private static $_db;*/

    function __construct() {
        try {
            global $settings, $_db;
            $_db = new PDO("mysql:host=" . $settings['db_host'] . ";dbname=" . $settings['db_name'],  $settings['db_user'] , $settings['db_password']);
        } catch (PDOException $e) {
            echo "Datenbankverbindung gescheitert!";
            die();
        }
    }

    function newUser($userName, $password, $userLevel) {
        global $_db;
        $options = [
            'cost' => 15,
        ];
        $pw = password_hash($password, PASSWORD_BCRYPT, $options);
        $stmt = $_db->prepare('INSERT INTO crypt_users (userLevel, username, password) VALUES (:userLevel, :userName, :password)');
        $stmt->bindParam(':userLevel', $userLevel);
        $stmt->bindParam(':userName', $userName);
        $stmt->bindParam(':password', $pw);
        $stmt->execute();
    }
}
