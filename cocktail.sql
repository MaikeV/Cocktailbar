-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 20. Dez 2017 um 22:28
-- Server-Version: 10.1.28-MariaDB
-- PHP-Version: 7.1.11

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
  `Allergenic` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `t_additive`
--

INSERT INTO `t_additive` (`A_ID`, `Allergenic`) VALUES
(1, 'Gluten'),
(2, 'Laktose');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `t_cocktail`
--

CREATE TABLE `t_cocktail` (
  `C_ID` int(11) NOT NULL,
  `U_ID` int(11) NOT NULL,
  `Recipename` varchar(256) NOT NULL,
  `CocktailPic` varchar(256) DEFAULT NULL,
  `Recipe` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `t_cocktail`
--

INSERT INTO `t_cocktail` (`C_ID`, `U_ID`, `Recipename`, `CocktailPic`, `Recipe`) VALUES
(6, 12, 'Test', '', 'TestTest'),
(7, 12, 'TestCocktail', '', 'TestTestTest'),
(8, 12, 'TestCocktail2', '', 'TestTestTest'),
(9, 12, 'TestCocktail3', '', 'TestTestTest'),
(10, 12, 'TestCocktail4', '', 'TestTestTest'),
(11, 12, 'Test', '', 'TestTest'),
(12, 12, 'TestCocktail5', '', 'TestTestTest'),
(13, 12, 'TestCocktailMitBild', 'colosseum.jpg', 'Hier steht etwas');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `t_contains`
--

CREATE TABLE `t_contains` (
  `I_ID` int(11) NOT NULL,
  `C_ID` int(11) NOT NULL,
  `UN_ID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `t_contains`
--

INSERT INTO `t_contains` (`I_ID`, `C_ID`, `UN_ID`, `Quantity`) VALUES
(14, 12, 1, 3),
(17, 12, 4, 4),
(17, 13, 1, 3),
(15, 13, 2, 4);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `t_has`
--

CREATE TABLE `t_has` (
  `A_ID` int(11) NOT NULL,
  `I_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `t_has`
--

INSERT INTO `t_has` (`A_ID`, `I_ID`) VALUES
(2, 26),
(2, 34);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `t_ingredient`
--

CREATE TABLE `t_ingredient` (
  `I_ID` int(11) NOT NULL,
  `Ingredient` varchar(256) NOT NULL,
  `Alcohol` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `t_ingredient`
--

INSERT INTO `t_ingredient` (`I_ID`, `Ingredient`, `Alcohol`) VALUES
(14, 'Rum', 1),
(15, 'Vodka', 1),
(17, 'Zitrone', 0),
(18, 'Zucker', 0),
(19, 'Tequila', 1),
(26, 'Sahne', 0),
(34, 'Milch', 0);

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
(7, 'Teeloeffel'),
(8, 'Essloeffel');

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
(11, 'Patrick', 'Piernikarczyk', '753692ec36adb4c794c973945eb2a99c1649703ea6f76bf259abb4fb838e013e', 'Pini', 'patrick-piernikarczyk@gmx.net', ''),
(12, 'Mike', 'Henning', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08', 'mhenn', 'mikeianhenning93@gmail.com', '');

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
  ADD KEY `I_ID` (`I_ID`),
  ADD KEY `UN_ID` (`UN_ID`);

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
  ADD PRIMARY KEY (`I_ID`);

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
  MODIFY `A_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `t_cocktail`
--
ALTER TABLE `t_cocktail`
  MODIFY `C_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT für Tabelle `t_ingredient`
--
ALTER TABLE `t_ingredient`
  MODIFY `I_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT für Tabelle `t_unit`
--
ALTER TABLE `t_unit`
  MODIFY `UN_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT für Tabelle `t_user`
--
ALTER TABLE `t_user`
  MODIFY `U_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
  ADD CONSTRAINT `t_contains_ibfk_2` FOREIGN KEY (`I_ID`) REFERENCES `t_ingredient` (`I_ID`),
  ADD CONSTRAINT `t_contains_ibfk_3` FOREIGN KEY (`UN_ID`) REFERENCES `t_unit` (`UN_ID`);

--
-- Constraints der Tabelle `t_has`
--
ALTER TABLE `t_has`
  ADD CONSTRAINT `t_has_ibfk_1` FOREIGN KEY (`A_ID`) REFERENCES `t_additive` (`A_ID`),
  ADD CONSTRAINT `t_has_ibfk_2` FOREIGN KEY (`I_ID`) REFERENCES `t_ingredient` (`I_ID`);

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
