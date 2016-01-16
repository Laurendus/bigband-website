-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 16. Jan 2016 um 00:39
-- Server-Version: 10.1.8-MariaDB
-- PHP-Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `bigband`
--
CREATE DATABASE IF NOT EXISTS `bigband` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_bin;
USE `bigband`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `crypt_users`
--

CREATE TABLE `crypt_users` (
  `userID` int(2) NOT NULL,
  `userLevel` int(1) NOT NULL DEFAULT '3',
  `username` varchar(256) COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(256) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Daten für Tabelle `crypt_users`
--

INSERT INTO `crypt_users` (`userID`, `userLevel`, `username`, `password`) VALUES
(1, 1, 'Laurens', '$2y$15$u/3S4nZ5V.L8xGT9MmFXhubdHNEAL4cyz5hlh1zxSWIJD3Qufmz5a'),
(2, 3, 'bigband', '$2y$15$FpheT9Fr.5BCCMMEn9tSa.0Rr/zXfQLuYGD/cPDfsddofEPHAYoLy'),
(3, 1, 'Moritz', '$2y$15$71DsfynSrnL83MHuiqI9M.Jk86vk5EhgfS2m8ep58WSSpYfNHT3XK'),
(4, 2, 'rÃ¶scher', '$2y$15$oRfuB7gJJvjCP9R93YNwtu3iHxMCEaabGZFXVP8uzJo4P/wzMyHFe'),
(5, 4, 'Frithjof', '$2y$15$bdpjoqJrNJWiD/99rcOl4.5iRq3heSN4kD4v1C10fvHJYU4FX1iYe'),
(6, 1, 'Admin', '$2y$15$94rLbcgFLwPT8O7Jn.Zc/.k5DyAXkg.Nky3ZBxsylTdrxjXxg1Zdy');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `crypt_users`
--
ALTER TABLE `crypt_users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `crypt_users`
--
ALTER TABLE `crypt_users`
  MODIFY `userID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
