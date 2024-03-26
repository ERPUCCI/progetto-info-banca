-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mar 26, 2024 alle 11:08
-- Versione del server: 10.4.28-MariaDB
-- Versione PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banca`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `contobancario`
--

CREATE TABLE `contobancario` (
  `IBAN` varchar(27) NOT NULL,
  `saldo` float NOT NULL,
  `CF` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `transazione`
--

CREATE TABLE `transazione` (
  `ID` int(11) NOT NULL,
  `somma` float NOT NULL,
  `IBAN_MIT` varchar(27) NOT NULL,
  `IBAN_RIC` varchar(27) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE `utente` (
  `CF` varchar(16) NOT NULL,
  `indirizzo` varchar(50) NOT NULL,
  `DDN` date NOT NULL,
  `telefono` int(13) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `contobancario`
--
ALTER TABLE `contobancario`
  ADD PRIMARY KEY (`IBAN`),
  ADD KEY `CF` (`CF`);

--
-- Indici per le tabelle `transazione`
--
ALTER TABLE `transazione`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `IBAN_MIT` (`IBAN_MIT`),
  ADD KEY `IBAN_RIC` (`IBAN_RIC`);

--
-- Indici per le tabelle `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`CF`);

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `contobancario`
--
ALTER TABLE `contobancario`
  ADD CONSTRAINT `contobancario_ibfk_1` FOREIGN KEY (`CF`) REFERENCES `utente` (`CF`);

--
-- Limiti per la tabella `transazione`
--
ALTER TABLE `transazione`
  ADD CONSTRAINT `transazione_ibfk_1` FOREIGN KEY (`IBAN_MIT`) REFERENCES `contobancario` (`IBAN`),
  ADD CONSTRAINT `transazione_ibfk_2` FOREIGN KEY (`IBAN_RIC`) REFERENCES `contobancario` (`IBAN`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
