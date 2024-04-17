-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Apr 16, 2024 alle 17:35
-- Versione del server: 10.4.28-MariaDB
-- Versione PHP: 8.2.4

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

--
-- Dump dei dati per la tabella `contobancario`
--

INSERT INTO `contobancario` (`IBAN`, `saldo`, `CF`) VALUES
('admindenari', 500000000, 'ADMINTEST'),
('conto2', 2, 'ERPUCCIGANZO'),
('ERCONTON', 9999, 'ERPUCCIGANZO'),
('provaconto', 100, 'prova'),
('test', 23333, 'ERPUCCIGANZO'),
('test2', 222, 'ERPUCCIGANZO');

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

--
-- Dump dei dati per la tabella `transazione`
--

INSERT INTO `transazione` (`ID`, `somma`, `IBAN_MIT`, `IBAN_RIC`) VALUES
(1, 12, 'provaconto', 'test'),
(2, 20, 'conto2', 'ERCONTON'),
(7, 333, 'test', 'test2'),
(12, 12, 'test', 'test2');

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE `utente` (
  `CF` varchar(16) NOT NULL,
  `indirizzo` varchar(50) NOT NULL,
  `DDN` date NOT NULL,
  `telefono` bigint(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `utente`
--

INSERT INTO `utente` (`CF`, `indirizzo`, `DDN`, `telefono`, `email`, `password`) VALUES
('ADMINTEST', 'OVUNQUE', '0001-01-01', 666, 'SWAGAR@email.com', '5e8667a439c68f5145dd2fcbecf02209'),
('ERPUCCIGANZO', 'Catena', '2005-09-23', 3392212529, 'puccienea23@gmail.com', '25d55ad283aa400af464c76d713c07ad'),
('prova', 'nessuno', '2024-04-24', 333211223, 'nigmen@gmail.com', 'eb29c1cd133d60c65c29b63fe976d184');

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
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `transazione`
--
ALTER TABLE `transazione`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
