DROP DATABASE IF EXISTS `bilderdb`;
CREATE DATABASE IF NOT EXISTS `bilderdb` DEFAULT CHARACTER SET utf8 COLLATE utf8_german2_ci;
USE 'bilderdb';


CREATE TABLE `benutzer` (
  `bid` int(11) NOT NULL,
  `nickname` varchar(50) COLLATE utf8_german2_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_german2_ci NOT NULL,
  `passwort` varchar(20) COLLATE utf8_german2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

