-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 14. Dez 2017 um 14:21
-- Server-Version: 10.1.26-MariaDB
-- PHP-Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `cocktail`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `t_additive`
--

CREATE TABLE `t_additive` (
  `A_ID` int(11) NOT NULL,
  `Allergenic` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `t_cocktail`
--

CREATE TABLE `t_cocktail` (
  `C_ID` int(11) NOT NULL,
  `U_ID` int(11) NOT NULL,
  `Alcohol` tinyint(1) NOT NULL DEFAULT '1',
  `Recipename` varchar(256) NOT NULL,
  `CocktailPic` varchar(256) DEFAULT NULL,
  `Recipe` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `t_contains`
--

CREATE TABLE `t_contains` (
  `I_ID` int(11) NOT NULL,
  `C_ID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `t_has`
--

CREATE TABLE `t_has` (
  `A_ID` int(11) NOT NULL,
  `I_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `t_ingredient`
--

CREATE TABLE `t_ingredient` (
  `I_ID` int(11) NOT NULL,
  `Ingredient` varchar(256) NOT NULL,
  `UN_ID` int(11) NOT NULL,
  `U_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `t_rated`
--

CREATE TABLE `t_rated` (
  `U_ID` int(11) NOT NULL,
  `C_ID` int(11) NOT NULL,
  `Text` text NOT NULL,
  `Rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `t_unit`
--

CREATE TABLE `t_unit` (
  `UN_ID` int(11) NOT NULL,
  `Description` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `t_unit`
--

INSERT INTO `t_unit` (`UN_ID`, `Description`) VALUES
(1, 'ml'),
(2, 'l'),
(3, 'dl'),
(4, 'g'),
(5, 'mg'),
(6, 'kg'),
(7, 'Teelöffel'),
(8, 'Esslöffel');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `t_user`
--

CREATE TABLE `t_user` (
  `U_ID` int(11) NOT NULL,
  `Firstname` varchar(50) NOT NULL,
  `Lastname` varchar(50) NOT NULL,
  `Password` varchar(300) NOT NULL,
  `Username` varchar(25) NOT NULL,
  `Mail` varchar(100) NOT NULL,
  `Picture` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `t_user`
--

INSERT INTO `t_user` (`U_ID`, `Firstname`, `Lastname`, `Password`, `Username`, `Mail`, `Picture`) VALUES
(10, 'Maike', 'Voss', '753692ec36adb4c794c973945eb2a99c1649703ea6f76bf259abb4fb838e013e', 'Maike', 'maike.voss@gmx.de', ''),
(11, 'Patrick', 'Piernikarczyk', '753692ec36adb4c794c973945eb2a99c1649703ea6f76bf259abb4fb838e013e', 'Pini', 'patrick-piernikarczyk@gmx.net', '');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `t_additive`
--
ALTER TABLE `t_additive`
  ADD PRIMARY KEY (`A_ID`);

--
-- Indizes für die Tabelle `t_cocktail`
--
ALTER TABLE `t_cocktail`
  ADD PRIMARY KEY (`C_ID`),
  ADD KEY `U_ID` (`U_ID`);

--
-- Indizes für die Tabelle `t_contains`
--
ALTER TABLE `t_contains`
  ADD KEY `C_ID` (`C_ID`),
  ADD KEY `I_ID` (`I_ID`);

--
-- Indizes für die Tabelle `t_has`
--
ALTER TABLE `t_has`
  ADD KEY `A_ID` (`A_ID`),
  ADD KEY `I_ID` (`I_ID`);

--
-- Indizes für die Tabelle `t_ingredient`
--
ALTER TABLE `t_ingredient`
  ADD PRIMARY KEY (`I_ID`),
  ADD KEY `UN_ID` (`UN_ID`),
  ADD KEY `U_ID` (`U_ID`);

--
-- Indizes für die Tabelle `t_rated`
--
ALTER TABLE `t_rated`
  ADD KEY `C_ID` (`C_ID`),
  ADD KEY `U_ID` (`U_ID`);

--
-- Indizes für die Tabelle `t_unit`
--
ALTER TABLE `t_unit`
  ADD PRIMARY KEY (`UN_ID`);

--
-- Indizes für die Tabelle `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`U_ID`),
  ADD UNIQUE KEY `Username` (`Username`),
  ADD UNIQUE KEY `Mail` (`Mail`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `t_additive`
--
ALTER TABLE `t_additive`
  MODIFY `A_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `t_cocktail`
--
ALTER TABLE `t_cocktail`
  MODIFY `C_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `t_ingredient`
--
ALTER TABLE `t_ingredient`
  MODIFY `I_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `t_unit`
--
ALTER TABLE `t_unit`
  MODIFY `UN_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT für Tabelle `t_user`
--
ALTER TABLE `t_user`
  MODIFY `U_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `t_cocktail`
--
ALTER TABLE `t_cocktail`
  ADD CONSTRAINT `t_cocktail_ibfk_1` FOREIGN KEY (`U_ID`) REFERENCES `t_user` (`U_ID`),
  ADD CONSTRAINT `t_cocktail_ibfk_2` FOREIGN KEY (`U_ID`) REFERENCES `t_user` (`U_ID`);

--
-- Constraints der Tabelle `t_contains`
--
ALTER TABLE `t_contains`
  ADD CONSTRAINT `t_contains_ibfk_1` FOREIGN KEY (`C_ID`) REFERENCES `t_cocktail` (`C_ID`),
  ADD CONSTRAINT `t_contains_ibfk_2` FOREIGN KEY (`I_ID`) REFERENCES `t_ingredient` (`I_ID`);

--
-- Constraints der Tabelle `t_has`
--
ALTER TABLE `t_has`
  ADD CONSTRAINT `t_has_ibfk_1` FOREIGN KEY (`A_ID`) REFERENCES `t_additive` (`A_ID`),
  ADD CONSTRAINT `t_has_ibfk_2` FOREIGN KEY (`I_ID`) REFERENCES `t_ingredient` (`I_ID`);

--
-- Constraints der Tabelle `t_ingredient`
--
ALTER TABLE `t_ingredient`
  ADD CONSTRAINT `t_ingredient_ibfk_1` FOREIGN KEY (`U_ID`) REFERENCES `t_user` (`U_ID`),
  ADD CONSTRAINT `t_ingredient_ibfk_2` FOREIGN KEY (`UN_ID`) REFERENCES `t_unit` (`UN_ID`);

--
-- Constraints der Tabelle `t_rated`
--
ALTER TABLE `t_rated`
  ADD CONSTRAINT `t_rated_ibfk_1` FOREIGN KEY (`C_ID`) REFERENCES `t_cocktail` (`C_ID`),
  ADD CONSTRAINT `t_rated_ibfk_2` FOREIGN KEY (`U_ID`) REFERENCES `t_user` (`U_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
