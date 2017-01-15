-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Gen 15, 2017 alle 13:14
-- Versione del server: 10.1.16-MariaDB
-- Versione PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ospedale`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `camere`
--

CREATE TABLE `camere` (
  `IDCamera` int(10) UNSIGNED NOT NULL,
  `PostiLetto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `camere`
--

INSERT INTO `camere` (`IDCamera`, `PostiLetto`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 18),
(8, 20),
(9, 28),
(10, 22);

-- --------------------------------------------------------

--
-- Struttura della tabella `dottori`
--

CREATE TABLE `dottori` (
  `IDDottore` int(200) UNSIGNED NOT NULL,
  `Nome` varchar(100) NOT NULL,
  `Cognome` varchar(100) NOT NULL,
  `DatadiNascita` date NOT NULL,
  `Telefono` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `dottori`
--

INSERT INTO `dottori` (`IDDottore`, `Nome`, `Cognome`, `DatadiNascita`, `Telefono`) VALUES
(1, 'Mario', 'Rossi', '1994-04-01', '3200001'),
(2, 'Claudio', 'Biondi', '1994-04-02', '3200002'),
(3, 'Paolo', 'Verdi', '1994-04-03', '3200003'),
(4, 'Pippo', 'Baudo', '1994-04-04', '3200004'),
(5, 'Chiara', 'Alba', '1994-04-05', '3200005'),
(6, 'Pietro', 'Biondi', '1994-04-20', '3200006'),
(8, 'Damiano', 'Criscione', '1992-04-10', '3200008'),
(9, 'Federica', 'Greco', '1995-12-27', '3200009'),
(10, 'Michele', 'Napoli', '1993-08-04', '3200010'),
(11, 'Marco', 'Catania', '1994-04-05', '3200011');

-- --------------------------------------------------------

--
-- Struttura della tabella `prenotazioni`
--

CREATE TABLE `prenotazioni` (
  `IDPrenotazione` int(10) UNSIGNED NOT NULL,
  `Confermata` tinyint(1) DEFAULT '0',
  `DataInizio` date NOT NULL,
  `DataFine` date NOT NULL,
  `IDCamera` int(11) NOT NULL,
  `IDDottore` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `prenotazioni`
--

INSERT INTO `prenotazioni` (`IDPrenotazione`, `Confermata`, `DataInizio`, `DataFine`, `IDCamera`, `IDDottore`) VALUES
(10, 1, '2016-11-20', '2016-11-25', 6, 6),
(12, 1, '2016-11-20', '2016-11-25', 5, 3),
(13, 1, '2016-12-15', '2016-12-20', 2, 2),
(16, 1, '2017-01-20', '2017-01-22', 8, 8),
(20, 1, '2016-11-02', '2016-11-03', 8, 3),
(23, 1, '2017-01-25', '2017-01-26', 1, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE `utenti` (
  `IDUtente` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`IDUtente`, `Username`, `Password`) VALUES
(1, 'root', 'root'),
(2, 'pietro', 'pietro'),
(3, 'mario', 'user3'),
(4, 'user', 'user');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `camere`
--
ALTER TABLE `camere`
  ADD PRIMARY KEY (`IDCamera`),
  ADD KEY `IDCamere` (`IDCamera`);

--
-- Indici per le tabelle `dottori`
--
ALTER TABLE `dottori`
  ADD PRIMARY KEY (`IDDottore`);

--
-- Indici per le tabelle `prenotazioni`
--
ALTER TABLE `prenotazioni`
  ADD PRIMARY KEY (`IDPrenotazione`);

--
-- Indici per le tabelle `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`IDUtente`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `camere`
--
ALTER TABLE `camere`
  MODIFY `IDCamera` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT per la tabella `dottori`
--
ALTER TABLE `dottori`
  MODIFY `IDDottore` int(200) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT per la tabella `prenotazioni`
--
ALTER TABLE `prenotazioni`
  MODIFY `IDPrenotazione` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT per la tabella `utenti`
--
ALTER TABLE `utenti`
  MODIFY `IDUtente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
