-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Ago 21, 2019 alle 12:40
-- Versione del server: 10.1.34-MariaDB
-- Versione PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hlab`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `apparecchi`
--

CREATE TABLE `apparecchi` (
  `id` int(11) NOT NULL,
  `nome` varchar(99) NOT NULL,
  `inventario` int(11) NOT NULL,
  `posizione` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `cordoni`
--

CREATE TABLE `cordoni` (
  `id` int(11) NOT NULL,
  `barcode` varchar(28) NOT NULL,
  `nome_cord` varchar(99) NOT NULL,
  `cognome_cord` varchar(99) NOT NULL,
  `nascita_cord` date NOT NULL,
  `nome_madre` varchar(99) NOT NULL,
  `cognome_madre` varchar(99) NOT NULL,
  `nascita_madre` date NOT NULL,
  `ospedale` varchar(99) NOT NULL,
  `arrivo` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `cordoni`
--

INSERT INTO `cordoni` (`id`, `barcode`, `nome_cord`, `cognome_cord`, `nascita_cord`, `nome_madre`, `cognome_madre`, `nascita_madre`, `ospedale`, `arrivo`) VALUES
(1, '0', 'ewrh', 'wtherth', '2019-01-24', '', '', '0000-00-00', 'srtnjre', '2019-01-07'),
(2, '0', 'ewrh', 'wtherth', '2019-01-24', 'shn', 'ewrh', '2019-01-12', 'srtnjre', '2019-01-07'),
(3, '0', 'sdg', 'gdf', '2019-01-11', 'wqet rr', 'e jhy', '2019-01-09', 'sdht rt', '2019-01-18'),
(4, '0', 'asd', 'asd', '2019-08-09', 'fdsa', 'fdsa', '2019-08-10', 'fdsadsf', '2019-08-19'),
(5, 'sdfs', '22', '22', '2019-08-10', 'dsfg', 'gdsfgds', '2019-08-08', 'fgsd ', '2019-08-08');

-- --------------------------------------------------------

--
-- Struttura della tabella `criotank`
--

CREATE TABLE `criotank` (
  `id` int(11) NOT NULL,
  `modello` varchar(89) NOT NULL,
  `stato` varchar(89) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `criotank_sacche`
--

CREATE TABLE `criotank_sacche` (
  `id_sacca` int(11) NOT NULL,
  `id_tank` int(11) NOT NULL,
  `aliquota` int(11) NOT NULL,
  `mL` int(11) NOT NULL,
  `id_pz` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `esami`
--

CREATE TABLE `esami` (
  `id` int(11) NOT NULL,
  `id_campione` varchar(11) NOT NULL,
  `data_test` date NOT NULL,
  `operatore` varchar(98) NOT NULL,
  `DNA` varchar(20) NOT NULL,
  `locus_A` varchar(20) NOT NULL,
  `locus_B` varchar(20) NOT NULL,
  `locus_C` varchar(20) NOT NULL,
  `locus_DRB` varchar(20) NOT NULL,
  `locus_DQA` varchar(20) NOT NULL,
  `locus_DQB` varchar(20) NOT NULL,
  `locus_DPB` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `esami`
--

INSERT INTO `esami` (`id`, `id_campione`, `data_test`, `operatore`, `DNA`, `locus_A`, `locus_B`, `locus_C`, `locus_DRB`, `locus_DQA`, `locus_DQB`, `locus_DPB`) VALUES
(5, 'DEP310prob', '2018-08-07', 'Thorwald', '0', '1', '1', '', '1', '1', '51', '5'),
(6, 'DEP310M', '2018-08-07', 'Thorwald', '0', '1:02', '2:02', '', '01:02', '01:02', '01:02', '01:02'),
(7, '', '2019-08-21', '', '0', ',,,,,,', ',,,,,,', '10,21,21,21,10,10,10', ',,,,,,', ',,,,,,', ',,,,,,', ',,,,,,'),
(8, 'sdfs', '2019-08-21', '', '', '', '', '20', '', '', '', '');

-- --------------------------------------------------------

--
-- Struttura della tabella `famiglie`
--

CREATE TABLE `famiglie` (
  `id` int(11) NOT NULL,
  `nome` varchar(99) NOT NULL,
  `cognome` varchar(99) NOT NULL,
  `nascita` date NOT NULL,
  `id_famiglia` varchar(99) NOT NULL,
  `grado` varchar(99) NOT NULL,
  `prelievo` varchar(99) NOT NULL,
  `arrivo` date NOT NULL,
  `barcode` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `famiglie`
--

INSERT INTO `famiglie` (`id`, `nome`, `cognome`, `nascita`, `id_famiglia`, `grado`, `prelievo`, `arrivo`, `barcode`) VALUES
(2, 'pinca', 'pruasa', '0000-00-00', 'DEP310', 'madre', 'SIT', '2018-08-02', 'DEP310M'),
(3, '', '', '0000-00-00', '', '', '', '2018-12-14', 'dep'),
(4, 'ewrh', 'wtherth', '2019-01-24', '', '', '2019-01-07', '2019-01-21', 'erh');

-- --------------------------------------------------------

--
-- Struttura della tabella `fogli_lavoro`
--

CREATE TABLE `fogli_lavoro` (
  `id` int(11) NOT NULL,
  `id_campione` varchar(99) NOT NULL,
  `locus` varchar(99) NOT NULL,
  `metodica` varchar(99) NOT NULL,
  `estrazione` varchar(99) NOT NULL,
  `lotto_estr` varchar(99) NOT NULL,
  `lotto_metod` varchar(99) NOT NULL,
  `tipologia` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `fogli_lavoro`
--

INSERT INTO `fogli_lavoro` (`id`, `id_campione`, `locus`, `metodica`, `estrazione`, `lotto_estr`, `lotto_metod`, `tipologia`) VALUES
(5, 'DEP222', 'DRB*LR', 'ssp_lr', '', '', '', ''),
(7, 'fjh', 'A*LR,B*LR', 'ssp_lr', '', '', '', ''),
(11, 'DEP800P', '', '', 'no', '', '', 'padre'),
(12, 'DEP800M', '', '', 'no', '', '', 'madre'),
(14, 'DEP800P', 'B*LR,C*LR', 'ssp_lr', 'dna_auto', '', '', '');

-- --------------------------------------------------------

--
-- Struttura della tabella `linfociti`
--

CREATE TABLE `linfociti` (
  `id` int(11) NOT NULL,
  `id_campione` int(11) NOT NULL,
  `nome` varchar(99) NOT NULL,
  `cognome` varchar(99) NOT NULL,
  `data_test` date NOT NULL,
  `operatore` varchar(99) NOT NULL,
  `valore1` text NOT NULL,
  `valore2` text NOT NULL,
  `valore3` text NOT NULL,
  `valore4` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `log_prodotti`
--

CREATE TABLE `log_prodotti` (
  `id` int(11) NOT NULL,
  `lotto` int(11) NOT NULL,
  `quota` int(11) NOT NULL,
  `data` date NOT NULL,
  `valore` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `prodotti`
--

CREATE TABLE `prodotti` (
  `id` int(11) NOT NULL,
  `data_carico` date NOT NULL,
  `data_scarico` date NOT NULL DEFAULT '0000-00-00',
  `prodotto` text NOT NULL,
  `quota` int(11) NOT NULL,
  `tipologia` varchar(99) NOT NULL,
  `operatore_carico` text NOT NULL,
  `operatore_scarico` text NOT NULL,
  `lotto` text NOT NULL,
  `scadenza` date NOT NULL DEFAULT '0000-00-00',
  `view` int(3) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `prodotti`
--

INSERT INTO `prodotti` (`id`, `data_carico`, `data_scarico`, `prodotto`, `quota`, `tipologia`, `operatore_carico`, `operatore_scarico`, `lotto`, `scadenza`, `view`) VALUES
(1, '2018-12-03', '0000-00-00', 'A*02', 6, 'ssp_hr', '', '', '1G9', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `schede`
--

CREATE TABLE `schede` (
  `id` int(11) NOT NULL,
  `nome_d` varchar(99) NOT NULL DEFAULT 'nnn',
  `cognome_d` varchar(99) NOT NULL DEFAULT 'nnn',
  `nascita_d` date NOT NULL,
  `telefono` varchar(11) NOT NULL,
  `id_famiglia` varchar(99) NOT NULL,
  `patologia` varchar(99) NOT NULL,
  `barcode` varchar(10) NOT NULL,
  `arrivo` date NOT NULL,
  `grado` varchar(99) NOT NULL,
  `prelievo` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `schede`
--

INSERT INTO `schede` (`id`, `nome_d`, `cognome_d`, `nascita_d`, `telefono`, `id_famiglia`, `patologia`, `barcode`, `arrivo`, `grado`, `prelievo`) VALUES
(21, 'Prova', 'oriva', '2018-08-08', '333 33 33 3', 'DEP310', 'TINU', 'DEP310prob', '0000-00-00', '', ''),
(22, 'Prova', 'Prova c', '1990-01-13', '', 'DEP001', 'Nessuna', 'DEP001 F P', '0000-00-00', '', '');

-- --------------------------------------------------------

--
-- Struttura della tabella `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user` varchar(99) NOT NULL,
  `pass` text NOT NULL,
  `other` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `user`
--

INSERT INTO `user` (`id`, `user`, `pass`, `other`) VALUES
(4, 'Thorwald', 'c4n4r1n0', 'admin');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `apparecchi`
--
ALTER TABLE `apparecchi`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `cordoni`
--
ALTER TABLE `cordoni`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `criotank`
--
ALTER TABLE `criotank`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `criotank_sacche`
--
ALTER TABLE `criotank_sacche`
  ADD PRIMARY KEY (`id_sacca`);

--
-- Indici per le tabelle `esami`
--
ALTER TABLE `esami`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `famiglie`
--
ALTER TABLE `famiglie`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `fogli_lavoro`
--
ALTER TABLE `fogli_lavoro`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `linfociti`
--
ALTER TABLE `linfociti`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `log_prodotti`
--
ALTER TABLE `log_prodotti`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `prodotti`
--
ALTER TABLE `prodotti`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `schede`
--
ALTER TABLE `schede`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `apparecchi`
--
ALTER TABLE `apparecchi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `cordoni`
--
ALTER TABLE `cordoni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT per la tabella `criotank`
--
ALTER TABLE `criotank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `criotank_sacche`
--
ALTER TABLE `criotank_sacche`
  MODIFY `id_sacca` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `esami`
--
ALTER TABLE `esami`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT per la tabella `famiglie`
--
ALTER TABLE `famiglie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT per la tabella `fogli_lavoro`
--
ALTER TABLE `fogli_lavoro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT per la tabella `linfociti`
--
ALTER TABLE `linfociti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `log_prodotti`
--
ALTER TABLE `log_prodotti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `prodotti`
--
ALTER TABLE `prodotti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la tabella `schede`
--
ALTER TABLE `schede`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT per la tabella `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
