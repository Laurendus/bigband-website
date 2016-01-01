<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class authorization {
    private static $_db_username    = "bigband";
    private static $_db_password    = "bigband";
    private static $_db_host        = "localhost";
    private static $_db_name        = "bigband";
    private static $_db;

    function __construct() {
        try {
            self::$_db = new PDO("mysql:host=" . self::$_db_host . ";dbname=" . self::$_db_name,  self::$_db_username , self::$_db_password);
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

    function getUserLevel() {
        $stmt = self::$_db->prepare('SELECT userLevel FROM test_users WHERE userID = :userID'); //userLevel aus Datenbank abrufen
            $stmt->bindParam(":userID", $_SESSION["userID"]);
            $stmt->execute();

            $userLevel = $stmt->fetch(PDO::FETCH_ASSOC);
            $trueUserLevel = $userLevel['userLevel'];

            return $trueUserLevel;
    }

    function login($userName, $pw) {
        $stmt = self::$_db->prepare('SELECT userID FROM test_users WHERE username= :userName AND password= :pw'); //userID aus Datenbank abrufen
        $stmt->bindParam(":userName", $userName);
        $stmt->bindParam(":pw", $pw);
        $stmt->execute();

        if($stmt->rowCount() === 1) {
            $userId = $stmt->fetch(PDO::FETCH_ASSOC);
            $_SESSION["userID"] = $userId['userID']; //userID in session speichern

            $stmt = self::$_db->prepare('SELECT userLevel FROM test_users WHERE userID = :userID'); //userLevel aus Datenbank abrufen
            $stmt->bindParam(":userID", $_SESSION["userID"]);
            $stmt->execute();

            $userLevel = $stmt->fetch(PDO::FETCH_ASSOC);
            $trueUserLevel = $userLevel['userLevel'];
            $_SESSION["userLevel"] = $trueUserLevel; //userLevel in session speichern

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
        $stmt = self::$_db->prepare('SELECT username FROM test_users WHERE userID = :userID');
        $stmt->bindParam(":userID", $_SESSION["userID"]);
        $stmt->execute();

        $userName = $stmt->fetch(PDO::FETCH_ASSOC);
        $trueUserName = $userName['username'];
        return $trueUserName;
    }

    function getSalt($username) {
        $stmt = self::$_db->prepare('SELECT salt FROM test_users WHERE username= :userName');
        $stmt->bindParam(":userName", $username);
        $stmt->execute();

        $salt = $stmt->fetch(PDO::FETCH_ASSOC);
        $truesalt = $salt['salt'];
        return $truesalt;
    }
}

class registration {
    private static $_db_username    = "bigband";
    private static $_db_password    = "bigband";
    private static $_db_host        = "localhost";
    private static $_db_name        = "bigband";
    private static $_db;
    private static $_tb_name_users  = "test_users";

    function __construct() {
        try {
            self::$_db = new PDO("mysql:host=" . self::$_db_host . ";dbname=" . self::$_db_name,  self::$_db_username , self::$_db_password);
        } catch (PDOException $e) {
            echo "Datenbankverbindung gescheitert!";
            die();
        }
    }

    function newUser($userName, $password, $userLevel) {
        $bytes = openssl_random_pseudo_bytes(64);
        $salt = bin2hex($bytes);
        $stmt = self::$_db->prepare('INSERT INTO test_users (userLevel, username, password, salt) VALUES (:userLevel, :userName, :password, :salt)');
        $stmt->bindParam(':userLevel', $userLevel);
        $stmt->bindParam(':userName', $userName);
        $stmt->bindParam(':password', hash("sha512", $salt.$password));
        $stmt->bindParam(':salt', $salt);
        $stmt->execute();
    }
}
