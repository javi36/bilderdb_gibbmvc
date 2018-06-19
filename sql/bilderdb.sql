-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 19. Jun 2018 um 22:18
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
(32, 'javi@test.ch', '42cd695e0d73e3d0b5774bcb2a0a5f09', 'Javi');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bilder`
--

CREATE TABLE `bilder` (
  `bilderID` int(11) NOT NULL,
  `gid` int(11) NOT NULL,
  `benutzerBildName` varchar(100) COLLATE utf8_german2_ci DEFAULT NULL,
  `bildPfad` varchar(100) COLLATE utf8_german2_ci DEFAULT NULL,
  `thumbnailName` varchar(100) COLLATE utf8_german2_ci DEFAULT NULL,
  `bildName` varchar(100) COLLATE utf8_german2_ci NOT NULL,
  `thumbnailPfad` varchar(100) COLLATE utf8_german2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

--
-- Daten für Tabelle `bilder`
--

INSERT INTO `bilder` (`bilderID`, `gid`, `benutzerBildName`, `bildPfad`, `thumbnailName`, `bildName`, `thumbnailPfad`) VALUES
(39, 72, '', 'C:/xampp/htdocs/m151/bilderdb_gibbmvc/uploadedImages/32asdf/1529438270', '1529438205', '1529438270', 'C:/xampp/htdocs/m151/bilderdb_gibbmvc/uploadedImages/32asdf/thumbnail/1529438205');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `galerie`
--

CREATE TABLE `galerie` (
  `gid` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_german2_ci NOT NULL,
  `beschreibung` varchar(200) COLLATE utf8_german2_ci DEFAULT NULL,
  `fk_bid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

--
-- Daten für Tabelle `galerie`
--

INSERT INTO `galerie` (`gid`, `name`, `beschreibung`, `fk_bid`) VALUES
(72, 'asdf', 'sfdgdf', 32);

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
-- Indizes für die Tabelle `bilder`
--
ALTER TABLE `bilder`
  ADD PRIMARY KEY (`bilderID`),
  ADD KEY `gid` (`gid`);

--
-- Indizes für die Tabelle `galerie`
--
ALTER TABLE `galerie`
  ADD PRIMARY KEY (`gid`),
  ADD KEY `fk_bid` (`fk_bid`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `benutzer`
--
ALTER TABLE `benutzer`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT für Tabelle `bilder`
--
ALTER TABLE `bilder`
  MODIFY `bilderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT für Tabelle `galerie`
--
ALTER TABLE `galerie`
  MODIFY `gid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `bilder`
--
ALTER TABLE `bilder`
  ADD CONSTRAINT `bilder_ibfk_1` FOREIGN KEY (`gid`) REFERENCES `galerie` (`gid`) ON DELETE CASCADE;

--
-- Constraints der Tabelle `galerie`
--
ALTER TABLE `galerie`
  ADD CONSTRAINT `galerie_ibfk_1` FOREIGN KEY (`fk_bid`) REFERENCES `benutzer` (`bid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
