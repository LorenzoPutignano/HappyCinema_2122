-- phpMyAdmin SQL Dump
-- version 5.0.4deb2ubuntu5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Creato il: Dic 17, 2021 alle 10:06
-- Versione del server: 8.0.27-0ubuntu0.21.10.1
-- Versione PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cinema`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `admin_user`
--

CREATE TABLE `admin_user` (
  `id` int NOT NULL,
  `password` char(90) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dump dei dati per la tabella `admin_user`
--

INSERT INTO `admin_user` (`id`, `password`) VALUES
(2, 'b133a0c0e9bee3be20163d2ad31d6248db292aa6dcb1ee087a2aa50e0fc75ae2');

-- --------------------------------------------------------

--
-- Struttura della tabella `films`
--

CREATE TABLE `films` (
  `id_film` int NOT NULL,
  `titolo` varchar(40) DEFAULT NULL,
  `genere` varchar(30) DEFAULT NULL,
  `data_uscita` date DEFAULT NULL,
  `orario_0` time DEFAULT NULL,
  `orario_1` time DEFAULT NULL,
  `orario_2` time DEFAULT NULL,
  `descrizione` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `durata_film` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `img_film` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dump dei dati per la tabella `films`
--

INSERT INTO `films` (`id_film`, `titolo`, `genere`, `data_uscita`, `orario_0`, `orario_1`, `orario_2`, `descrizione`, `durata_film`, `img_film`) VALUES
(51, 'Mission: Impossible ', 'Azione', '1996-11-07', '16:30:00', '18:30:00', '20:30:00', 'Impossible è un film del 1996 diretto da Brian De Palma. A Praga, Jim Phelps (Jon Voight) e la sua squadra, tutti membri di una task force della CIA denominata Impossible Mission Force (IMF), hanno il delicato compito di fermare il furto', '110', 'mission mpossible.jpg'),
(53, 'Luca', 'Fantasy', '2021-12-11', '18:30:00', '19:30:00', '23:30:00', 'Luca vive delle esperienze indimenticabili insieme al suo nuovo migliore amico Alberto Ma entrambi nascondono un segreto sono delle creature marine provenienti da un mondo sotto la superficie dell acqua', '135', 'luca.jpg'),
(54, 'Titanic', 'Romantico Drammatico', '1997-10-24', '18:15:00', '20:15:00', '22:10:00', 'Il transatlantico Titanic considerato un gioiello tecnologico ed il più lussuoso piroscafo da crociera mai realizzato  salpa dall Inghilterra il dieci aprile del 1912 con oltre 1500 passeggeri a bordo per il suo viaggio inaugurale I viaggiatori sono collocati in tre classi riflesso delle differenze sociali', '195', 'titanic.jpg'),
(55, ' Spider-man No Way Home', 'Azione Avventura', '2021-11-21', '16:30:00', '19:20:00', '22:10:00', ' L identita dell Uomo Ragno viene rivelata a tutti e non riesce piu a separare la sua vita normale dalla vita da supereroe e quando chiede aiuto al Dottor Strange lo costringe a scoprire cosa significa veramente essere l Uomo Ragno', '148', 'spider-man.jpeg'),
(56, 'The Nun', 'Horror', '2018-10-10', '18:10:00', '19:10:00', '22:10:00', 'In un monastero di clausura in Romania una giovane suora si impicca chiedendo perdono al Signore Il Vaticano invia un prete dal passato burrascoso e un novizio per far luce sul oscuro mistero', '96', 'the_nun.jpg'),
(57, 'L incredibile Hulk', 'Azione', '2008-11-07', '17:30:00', '19:10:00', '22:10:00', 'Bruce Banner era uno scienziato ma un esposizione accidentale ai raggi gamma ha provocato  una mutazione genetica e sconvolto la sua esistenza Ogni qualvolta le emozioni lo assalgono Bruce si trasforma  in Hulk mostro verde dalla forza smisurata', '112', 'hulk.jpg');

-- --------------------------------------------------------

--
-- Struttura della tabella `prenotazioni`
--

CREATE TABLE `prenotazioni` (
  `id_prenotazione` int NOT NULL,
  `id_utente_cs` int DEFAULT NULL,
  `id_film_cs` int DEFAULT NULL,
  `n_posto` varchar(500) DEFAULT NULL,
  `orario_sc` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dump dei dati per la tabella `prenotazioni`
--

INSERT INTO `prenotazioni` (`id_prenotazione`, `id_utente_cs`, `id_film_cs`, `n_posto`, `orario_sc`) VALUES
(17, 47, 51, '1', '18:30:00'),
(18, 47, 51, '4', '18:30:00'),
(21, 47, 51, '1;2;3', '18:30:00'),
(22, 47, 51, '20;21', '18:30:00'),
(23, 47, 51, '22;23;24', '18:30:00'),
(27, 47, 53, '11', '23:30:00'),
(31, 47, 53, '32', '23:30:00'),
(35, 47, 53, '36;43;44', '23:30:00'),
(36, 47, 53, '21;28', '23:30:00'),
(37, 47, 53, '3;4', '19:30:00'),
(38, 47, 53, '29;30', '19:30:00'),
(39, 47, 51, '1;2', '16:30:00'),
(40, 47, 51, '10;11', '16:30:00'),
(41, 47, 51, '15', '16:30:00'),
(42, 47, 51, '23', '16:30:00'),
(43, 47, 51, '32', '16:30:00'),
(44, 47, 51, '25', '16:30:00'),
(45, 47, 51, '38', '16:30:00'),
(46, 47, 51, '28', '16:30:00'),
(47, 47, 51, '28', '16:30:00');

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE `utente` (
  `id_utente` int NOT NULL,
  `nome` varchar(30) DEFAULT NULL,
  `cognome` varchar(30) DEFAULT NULL,
  `email` char(50) DEFAULT NULL,
  `password` char(90) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dump dei dati per la tabella `utente`
--

INSERT INTO `utente` (`id_utente`, `nome`, `cognome`, `email`, `password`) VALUES
(42, 'Giovanni', 'Mansueto', 'giovamansu@gmail.com', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855'),
(43, 'Lorenzo', 'PTG', 'lorenzo@gmail.com', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855'),
(44, 'Giuseppe', 'giove', 'ciaobello@gmail.com', 'df5fc193f0fdc7521fff3e4b4d39b2788052d703eca997b2a22d5613ab9d2b73'),
(45, 'Antonio', 'ilgay', '2ilgay@gmail.com', '1f0ca711df81520887afe0dca099652a249e7eda60348be7327d432b02298652'),
(46, 'Nicola', 'Scattaglia', 'test@example.org', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225'),
(47, 'Giuseppe', 'Giove', 'giovegiuseppe@gmail.com', 'b133a0c0e9bee3be20163d2ad31d6248db292aa6dcb1ee087a2aa50e0fc75ae2'),
(48, 'Lorenzo', 'ano', 'ciao@gmail.com', 'b133a0c0e9bee3be20163d2ad31d6248db292aa6dcb1ee087a2aa50e0fc75ae2'),
(50, 'Christian', 'Lazzaro', 'lazz03@gmail.com', 'cf8276ca60061baf2611917c50717a2b1bcbff0c0d25e00b95ef667ab8f158f0');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`id_film`);

--
-- Indici per le tabelle `prenotazioni`
--
ALTER TABLE `prenotazioni`
  ADD PRIMARY KEY (`id_prenotazione`),
  ADD KEY `id_film_cs` (`id_film_cs`),
  ADD KEY `id_utente_cs` (`id_utente_cs`);

--
-- Indici per le tabelle `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`id_utente`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `films`
--
ALTER TABLE `films`
  MODIFY `id_film` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT per la tabella `prenotazioni`
--
ALTER TABLE `prenotazioni`
  MODIFY `id_prenotazione` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT per la tabella `utente`
--
ALTER TABLE `utente`
  MODIFY `id_utente` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `prenotazioni`
--
ALTER TABLE `prenotazioni`
  ADD CONSTRAINT `prenotazioni_ibfk_1` FOREIGN KEY (`id_film_cs`) REFERENCES `films` (`id_film`),
  ADD CONSTRAINT `prenotazioni_ibfk_2` FOREIGN KEY (`id_utente_cs`) REFERENCES `utente` (`id_utente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
