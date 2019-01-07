-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Gostitelj: 127.0.0.1
-- Čas nastanka: 07. jan 2019 ob 12.35
-- Različica strežnika: 10.1.37-MariaDB
-- Različica PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Zbirka podatkov: `scrumtable`
--

-- --------------------------------------------------------

--
-- Struktura tabele `projekt`
--

CREATE TABLE `projekt` (
  `idProjekt` int(11) NOT NULL,
  `naziv` varchar(500) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

-- --------------------------------------------------------

--
-- Struktura tabele `sprint`
--

CREATE TABLE `sprint` (
  `idSprint` int(11) NOT NULL,
  `naziv` varchar(500) COLLATE utf8_slovenian_ci NOT NULL,
  `idProjekt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

-- --------------------------------------------------------

--
-- Struktura tabele `task`
--

CREATE TABLE `task` (
  `idTask` int(11) NOT NULL,
  `naziv` varchar(500) COLLATE utf8_slovenian_ci NOT NULL,
  `opis` varchar(500) COLLATE utf8_slovenian_ci NOT NULL,
  `idSprint` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

-- --------------------------------------------------------

--
-- Struktura tabele `tiptask`
--

CREATE TABLE `tiptask` (
  `idTipTask` int(11) NOT NULL,
  `naziv` varchar(50) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

-- --------------------------------------------------------

--
-- Struktura tabele `uporabnik`
--

CREATE TABLE `uporabnik` (
  `idUporabnik` int(11) NOT NULL,
  `ime` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `priimek` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `geslo` varchar(50) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Odloži podatke za tabelo `uporabnik`
--

INSERT INTO `uporabnik` (`idUporabnik`, `ime`, `priimek`, `email`, `geslo`) VALUES
(1, 'Test', 'Test', 'test@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220');

-- --------------------------------------------------------

--
-- Struktura tabele `uporabnikhasprojekt`
--

CREATE TABLE `uporabnikhasprojekt` (
  `idUporabnikHasProjekt` int(11) NOT NULL,
  `idProjekt` int(11) NOT NULL,
  `idUporabnik` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Indeksi zavrženih tabel
--

--
-- Indeksi tabele `projekt`
--
ALTER TABLE `projekt`
  ADD PRIMARY KEY (`idProjekt`),
  ADD UNIQUE KEY `idProjekt` (`idProjekt`);

--
-- Indeksi tabele `sprint`
--
ALTER TABLE `sprint`
  ADD PRIMARY KEY (`idSprint`),
  ADD UNIQUE KEY `idSprint` (`idSprint`);

--
-- Indeksi tabele `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`idTask`),
  ADD UNIQUE KEY `idTask` (`idTask`);

--
-- Indeksi tabele `tiptask`
--
ALTER TABLE `tiptask`
  ADD PRIMARY KEY (`idTipTask`),
  ADD UNIQUE KEY `idTipTask` (`idTipTask`);

--
-- Indeksi tabele `uporabnik`
--
ALTER TABLE `uporabnik`
  ADD PRIMARY KEY (`idUporabnik`),
  ADD UNIQUE KEY `idUporabnik` (`idUporabnik`);

--
-- Indeksi tabele `uporabnikhasprojekt`
--
ALTER TABLE `uporabnikhasprojekt`
  ADD PRIMARY KEY (`idUporabnikHasProjekt`),
  ADD UNIQUE KEY `idUporabnikHasProjekt` (`idUporabnikHasProjekt`);

--
-- AUTO_INCREMENT zavrženih tabel
--

--
-- AUTO_INCREMENT tabele `projekt`
--
ALTER TABLE `projekt`
  MODIFY `idProjekt` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT tabele `sprint`
--
ALTER TABLE `sprint`
  MODIFY `idSprint` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT tabele `task`
--
ALTER TABLE `task`
  MODIFY `idTask` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT tabele `tiptask`
--
ALTER TABLE `tiptask`
  MODIFY `idTipTask` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT tabele `uporabnik`
--
ALTER TABLE `uporabnik`
  MODIFY `idUporabnik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT tabele `uporabnikhasprojekt`
--
ALTER TABLE `uporabnikhasprojekt`
  MODIFY `idUporabnikHasProjekt` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
