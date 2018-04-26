-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 26. Apr 2018 um 14:08
-- Server-Version: 10.1.30-MariaDB
-- PHP-Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `bilderdb`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `benutzer`
--

CREATE TABLE `benutzer` (
  `bid` int(11) NOT NULL,
  `email` varchar(200) COLLATE utf8_german2_ci NOT NULL,
  `passwort` varchar(200) COLLATE utf8_german2_ci NOT NULL,
  `nickname` varchar(50) COLLATE utf8_german2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

--
-- Daten für Tabelle `benutzer`
--

INSERT INTO `benutzer` (`bid`, `email`, `passwort`, `nickname`) VALUES
(1, 'irina@deck.ch', '42cd695e0d73e3d0b5774bcb2a0a5f09', 'irina'),
(3, 'jmartinezalvarez0@gmail.com', '42cd695e0d73e3d0b5774bcb2a0a5f09', 'javi'),
(4, 'test@test.ch', '42cd695e0d73e3d0b5774bcb2a0a5f09', 'Test'),
(5, 'saturn.buergi@gmail.com', '42cd695e0d73e3d0b5774bcb2a0a5f09', 'needToRoll'),
(27, 'test@xn--kjldfsa-b1a.ch', '42cd695e0d73e3d0b5774bcb2a0a5f09', 'Test'),
(28, 'hahha@haha.ch', '42cd695e0d73e3d0b5774bcb2a0a5f09', 'hahha'),
(29, 'sd@sf.cs', '42cd695e0d73e3d0b5774bcb2a0a5f09', 'adsf');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `benutzer`
--
ALTER TABLE `benutzer`
  ADD PRIMARY KEY (`bid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `benutzer`
--
ALTER TABLE `benutzer`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
