-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Gostitelj: 127.0.0.1
-- Čas nastanka: 13. jan 2019 ob 22.23
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
  `naziv` varchar(500) COLLATE utf8_slovenian_ci NOT NULL,
  `steviloSprintov` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Odloži podatke za tabelo `projekt`
--

INSERT INTO `projekt` (`idProjekt`, `naziv`, `steviloSprintov`) VALUES
(23, 'Test', 3),
(24, 'TEST2', 1),
(26, 'ID3 odločitveno drevo - MOS', 1);

-- --------------------------------------------------------

--
-- Struktura tabele `sprint`
--

CREATE TABLE `sprint` (
  `idSprint` int(11) NOT NULL,
  `naziv` varchar(500) COLLATE utf8_slovenian_ci NOT NULL,
  `idProjekt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Odloži podatke za tabelo `sprint`
--

INSERT INTO `sprint` (`idSprint`, `naziv`, `idProjekt`) VALUES
(15, 'Sprint 1', 23),
(16, 'Sprint 1', 24),
(17, 'Sprint 1', 25),
(18, 'Sprint 2', 23),
(19, 'Sprint 1', 26),
(20, 'Sprint 3', 23);

-- --------------------------------------------------------

--
-- Struktura tabele `task`
--

CREATE TABLE `task` (
  `idTask` int(11) NOT NULL,
  `naziv` varchar(500) COLLATE utf8_slovenian_ci NOT NULL,
  `opis` varchar(500) COLLATE utf8_slovenian_ci NOT NULL,
  `rok_taska` date NOT NULL,
  `obtezitev` int(11) NOT NULL,
  `stanje` int(3) NOT NULL,
  `datoteka` varchar(100) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `idSprint` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Odloži podatke za tabelo `task`
--

INSERT INTO `task` (`idTask`, `naziv`, `opis`, `rok_taska`, `obtezitev`, `stanje`, `datoteka`, `idSprint`) VALUES
(3, 'TESTNI ', 'ZA TEST.', '2019-01-31', 4, 1, NULL, 15),
(4, 'testni task', 'Test, narejen za testiranje dodeljevanja taska uporabniku.', '2019-01-21', 4, 2, 'Razhroscevanje_2_Uros_Zagoranski.zip', 15),
(5, 'Taskec', 'Opis taska', '2019-01-23', 5, 3, 'Preoblikovanje_Uros_Zagoranski.zip', 15),
(6, 'Audi A6 Karavan', 'Opis taska 1', '2019-01-25', 8, 3, 'Uros_Zagoranski.zip', 15),
(9, 'Ogled vodičev', 'Ogled vodičev za izdelavo ID3 odločitvenega drevesa pri predmetu Modeli in odločitveni sistemi.', '2019-02-13', 2, 3, NULL, 19),
(10, 'Izbira okolja', 'Izbira primernega IDE-ja za izdelavo rešitve. Možnosti: Eclipse, IntelliJ, Visual Studio 2017, PHP Storm', '2019-02-14', 3, 2, NULL, 19),
(11, 'Vzpostavitev okolja', 'Vzpostavitev izbranega razvojnega okolja za začetek implementacije.', '2019-02-16', 5, 2, NULL, 19),
(12, 'Izbor knjižnic', 'Izbira knjižnic za pomoč pri izdelavi odločitvenega drevesa.', '2019-02-20', 4, 1, NULL, 19),
(13, 'Implementacija main-a', 'Implementacija zagonske metode v projektu (metoda main)', '2019-02-22', 7, 1, NULL, 19);

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
(7, 'Uroš', 'Zagoranski', 'uros.zagoranski@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
(8, 'Toni', 'Haramija', 'tonskikralju@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
(9, 'Test', 'Test', 'test@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
(10, 'Aljoša', 'Sikošek', 'aljosa.sikosek@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
(11, 'Gašper', 'Reher', 'reheru@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
(12, 'Gašper', 'Haložan', 'gasperh@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
(13, 'Marko', 'Zemljarič', 'marko.zemljaric@student.um.si', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
(14, 'Primož', 'Stopar', 'poljcanskikralj@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220');

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
-- Odloži podatke za tabelo `uporabnikhasprojekt`
--

INSERT INTO `uporabnikhasprojekt` (`idUporabnikHasProjekt`, `idProjekt`, `idUporabnik`) VALUES
(32, 23, 9),
(33, 23, 7),
(34, 24, 9),
(36, 23, 14),
(37, 26, 9);

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
  MODIFY `idProjekt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT tabele `sprint`
--
ALTER TABLE `sprint`
  MODIFY `idSprint` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT tabele `task`
--
ALTER TABLE `task`
  MODIFY `idTask` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT tabele `uporabnik`
--
ALTER TABLE `uporabnik`
  MODIFY `idUporabnik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT tabele `uporabnikhasprojekt`
--
ALTER TABLE `uporabnikhasprojekt`
  MODIFY `idUporabnikHasProjekt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
