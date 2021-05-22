-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 22, 2021 alle 19:19
-- Versione del server: 10.4.18-MariaDB
-- Versione PHP: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `homework`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `elementocarrello`
--

CREATE TABLE `elementocarrello` (
  `nome_utente` varchar(29) NOT NULL,
  `id_prodotto` int(11) NOT NULL,
  `quantita` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `ordini`
--

CREATE TABLE `ordini` (
  `nome_utente` varchar(255) NOT NULL,
  `n_ordine` int(11) NOT NULL,
  `prezzo_tot` float DEFAULT NULL,
  `id_prodotto` int(11) NOT NULL,
  `quantita` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `ordini`
--

INSERT INTO `ordini` (`nome_utente`, `n_ordine`, `prezzo_tot`, `id_prodotto`, `quantita`) VALUES
('antonio98', 1, 22.03, 4, 1),
('antonio98', 1, 22.03, 5, 1),
('antonio98', 1, 22.03, 8, 1),
('antonio98', 1, 22.03, 9, 3),
('antonio98', 1, 22.03, 10, 1),
('antonio98', 2, 8.05, 1, 4),
('antonio98', 2, 8.05, 4, 1),
('antonio98', 3, 18.95, 10, 5),
('cristian98', 1, 15.72, 1, 1),
('cristian98', 1, 15.72, 2, 3),
('cristian98', 1, 15.72, 3, 3),
('cristian98', 1, 15.72, 6, 1),
('cristian98', 2, 6.87, 3, 3),
('luca96', 1, 40.77, 1, 1),
('luca96', 1, 40.77, 2, 1),
('luca96', 1, 40.77, 3, 3),
('luca96', 1, 40.77, 9, 3),
('luca96', 1, 40.77, 10, 5),
('luca96', 2, 6.66, 7, 1),
('luca96', 2, 6.66, 8, 3),
('marco01', 1, 21.4, 1, 3),
('marco01', 1, 21.4, 2, 1),
('marco01', 1, 21.4, 3, 3),
('marco01', 1, 21.4, 7, 1),
('marco01', 1, 21.4, 9, 2),
('marco01', 2, 13.84, 3, 1),
('marco01', 2, 13.84, 4, 2),
('marco01', 2, 13.84, 7, 2),
('marco01', 2, 13.84, 10, 1),
('marco01', 3, 39.9, 9, 10);

-- --------------------------------------------------------

--
-- Struttura della tabella `prodotti`
--

CREATE TABLE `prodotti` (
  `id` int(11) NOT NULL,
  `titolo` varchar(100) DEFAULT NULL,
  `immagine` varchar(100) DEFAULT NULL,
  `prezzo` float DEFAULT NULL,
  `descrizione` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `prodotti`
--

INSERT INTO `prodotti` (`id`, `titolo`, `immagine`, `prezzo`, `descrizione`) VALUES
(1, 'Penne Barilla 1kg', '../ImgMHW2/barilla-penne-rigate-1kg.jpg', 1.29, 'Penne rigate Barilla confezione da 1kg'),
(2, 'Tagliolini De Cecco', '../ImgMHW2/tagliolini de cecco.jpg', 1.69, 'Tagliolini n.206 De Cecco lenta essiccazione 500g'),
(3, 'Hamburger di pollo AIA', '../ImgMHW2/hamburger di pollo AIA.jpg', 2.29, 'Hamburger di pollo AIA 300g'),
(4, 'Involtini Glorioso', '../ImgMHW2/involtini di pistacchio Glorioso.jpg', 2.89, 'Involtini di carne di manzo con granella di pistacchio 6pz'),
(5, 'Bastoncini Findus 6pz.', '../ImgMHW2/bastoncini findus.jpg', 1.49, 'Bastoncini Findus 6pz 150g'),
(6, 'Tonno Rio Mare', '../ImgMHW2/tonno rio mare.jpg', 2.49, 'Tonno Rio Mare in scatola 30g 4pz'),
(7, 'Iceberg Bonduelle', '../ImgMHW2/iceberg bonduelle.jpg', 0.99, 'Iceberg Bonduelle 200g'),
(8, 'Tofu Valsoia', '../ImgMHW2/tofu valsoia.jpg', 1.89, 'Tofu Valsoia 100% vegetale 250g'),
(9, 'Coca-Cola 1,5L', '../ImgMHW2/cocacola 1,5L.jpg', 3.99, 'Coca-Cola 6 bottiglie 1,5L'),
(10, 'Fanta 1,5L', '../ImgMHW2/fanta 1,5L.jpg', 3.79, 'Fanta orange 6 bottiglie 1,5L');

-- --------------------------------------------------------

--
-- Struttura della tabella `recensione`
--

CREATE TABLE `recensione` (
  `id_recensione` int(11) NOT NULL,
  `id_prodotto` int(11) DEFAULT NULL,
  `nome_utente` varchar(50) DEFAULT NULL,
  `commento` varchar(1024) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `recensione`
--

INSERT INTO `recensione` (`id_recensione`, `id_prodotto`, `nome_utente`, `commento`) VALUES
(27, 2, 'cristian98', 'La pasta De Cecco non delude mai! Ottima per farla con la salsa, melanzana fritta e ricotta salata!'),
(29, 3, 'cristian98', 'Ottimi da mangiare nella mafaldina durante la pausa pranzo.'),
(30, 1, 'cristian98', 'Mi aspettavo qualcosa in più. Ottimo prezzo comunque!'),
(31, 4, 'cristian98', 'Ero felice di mangiare involtini al pistacchio a pranzo ma mi sono dovuto ricredere. Pessimo prodotto.'),
(32, 5, 'cristian98', 'Capitan Findus non delude mai! '),
(33, 6, 'cristian98', 'Ottimo tonno in scatola da spezzare con un grissino!'),
(34, 7, 'cristian98', 'Da provare la combo Iceberg e Bastoncini Findus!'),
(35, 8, 'cristian98', 'Mi sentivo in colpa a mangiare carne di animali e quindi ho provato a diventare vegano, ma appena ho assaggiato questo prodotto mi sono sentito subito in dovere di ringraziare tutti gli allevatori per il lavoro che svolgono. Grazie ragazzi per riempire la mia tavola di carne!'),
(42, 10, 'cristian98', 'Ottimo prezzo e ottimo prodotto!'),
(50, 9, 'cristian98', 'Ottimo prodotto ma prezzo un po\' caro'),
(51, 2, 'antonio98', 'Mi aspettavo qualcosa di meglio...'),
(52, 6, 'antonio98', 'Mi piace. Voto 10!'),
(53, 4, 'antonio98', 'Meglio quelli del camion dei panini.'),
(54, 7, 'antonio98', 'Ottimo contorno ad un buon prezzo.'),
(55, 1, 'antonio98', 'La pasta migliore del mondo secondo me'),
(56, 9, 'antonio98', 'Ottimo gusto, il prodotto arriva ben conservato. '),
(58, 3, 'antonio98', 'Mi piace'),
(59, 8, 'antonio98', 'Non lo vuole nemmeno il mio cane..\n'),
(60, 10, 'antonio98', 'Arriva perfettamente conservato, segno di un ottimo servizio di trasporto!'),
(61, 5, 'antonio98', 'Perfetti per noi studenti in sessione!'),
(62, 2, 'luca96', 'A me piace veramente molto.'),
(63, 1, 'luca96', 'Pasta buona ma de Cecco non si batte'),
(66, 3, 'luca96', 'Ottima qualita\' della carne'),
(68, 4, 'luca96', 'Prodotto pessimo.'),
(69, 5, 'luca96', 'Si sente il sapore del mare!'),
(70, 6, 'luca96', 'Se lo poggi all\'orecchio senti il rumore delle onde! Prodotto freschissimo!'),
(71, 7, 'luca96', 'L\'ho dato da mangiare al mio coniglio e mi ha preso a schiaffi.'),
(72, 8, 'luca96', 'Non ho parole, solo insulti.'),
(73, 9, 'luca96', 'Il prezzo puo\' sembrare un po\' caro ma ne vale la pena!'),
(74, 10, 'luca96', 'FANTAstico!'),
(75, 1, 'marco01', 'Sono celiaco...'),
(76, 3, 'marco01', 'Ottimi da cucinare sulla piastra!'),
(78, 4, 'marco01', 'Deletate questo prodotto.'),
(79, 5, 'marco01', 'Il pesce migliore sul mercato!'),
(80, 6, 'marco01', 'Perfetto per uno spuntino.'),
(81, 7, 'marco01', 'Croccante al punto giusto.'),
(82, 8, 'marco01', 'Da piccolo ho mangiato la colla. Era piu\' buona.'),
(83, 9, 'marco01', 'Avrei preferito quella di 2 litri.'),
(84, 10, 'marco01', 'Preferisco la Pepsi.');

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE `utenti` (
  `ID` int(11) NOT NULL,
  `nome` varchar(30) DEFAULT NULL,
  `cognome` varchar(30) DEFAULT NULL,
  `indirizzo` varchar(60) DEFAULT NULL,
  `cellulare` varchar(15) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`ID`, `nome`, `cognome`, `indirizzo`, `cellulare`, `username`, `password`) VALUES
(10, 'Cristian', 'Cataldo', 'Via Orlando 30', '3668405202', 'admin', 'admin'),
(11, 'Marco', 'Barbagallo', 'Via litteri 40', '3334455666', 'marco01', 'fozzacatania!'),
(12, 'Cristian', 'Cataldo', 'Via Conca 15', '3668405200', 'cristian98', 'fastweb98!'),
(13, 'Antonio', 'Valastro', 'via Litteri 40', '3334455666', 'antonio98', 'fozzacatania!'),
(15, 'Luca', 'Rodolico', 'via Nino martoglio 17', '3334454567', 'luca96', 'catania!');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `elementocarrello`
--
ALTER TABLE `elementocarrello`
  ADD PRIMARY KEY (`nome_utente`,`id_prodotto`),
  ADD KEY `nomeUtente` (`nome_utente`);

--
-- Indici per le tabelle `ordini`
--
ALTER TABLE `ordini`
  ADD PRIMARY KEY (`nome_utente`,`n_ordine`,`id_prodotto`);

--
-- Indici per le tabelle `prodotti`
--
ALTER TABLE `prodotti`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `recensione`
--
ALTER TABLE `recensione`
  ADD PRIMARY KEY (`id_recensione`);

--
-- Indici per le tabelle `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `username` (`username`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `prodotti`
--
ALTER TABLE `prodotti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT per la tabella `recensione`
--
ALTER TABLE `recensione`
  MODIFY `id_recensione` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT per la tabella `utenti`
--
ALTER TABLE `utenti`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
