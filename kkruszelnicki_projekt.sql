-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Cze 08, 2023 at 06:38 PM
-- Wersja serwera: 10.4.28-MariaDB
-- Wersja PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projekt_mechanik`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `czynnosci`
--

CREATE TABLE `czynnosci` (
  `idc` int(11) NOT NULL,
  `z_id` int(11) NOT NULL,
  `materialy` varchar(200) NOT NULL,
  `czynnosc` varchar(300) NOT NULL,
  `czas` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `czynnosci`
--

INSERT INTO `czynnosci` (`idc`, `z_id`, `materialy`, `czynnosc`, `czas`) VALUES
(1, 1, 'Klocki hamulcowe, tarcze hamulcowe przednie', 'Wymiana klocków i tarcz hamulcowych z przodu', '01:00:00'),
(2, 2, 'Pióra wycieraczek', 'Wymiana piór wycieraczek', '00:05:00'),
(3, 2, 'Płyn do spryskiwaczy', 'Dolanie 3l płynu do spryskiwaczy', '00:05:00'),
(4, 2, 'Łata z blachy ba dach', 'Przyspawanie łaty w miejscu dziury na dachu', '00:40:00'),
(5, 3, 'Rozrusznik, akumulator, alternator, filtr powietrza, czujnik ciśnienia doładowania, świece żarowe, listwa wtryskowa, turbo sprężarka, filtr oleju, olej castrol 5W-40, filtr paliwa', 'Wymiana akumulatora, naprawa alternatora, wymiana rozrusznika, wymiana filtru powietrza, wymiana filtru paliwa, wymiana świec żarowych, turbo sprężarka po regeneracji, wymiana oleju oraz filtra oleju, wymiana listwy wtryskowej', '07:00:00'),
(6, 4, 'Żarówka H7', 'Wymiana żarówki H7', '00:15:00'),
(7, 4, 'Sprężyny amortyzatorów Volkswagen T6 przód', 'Wyjęcie przednich sprężyn amortyzatorów, wstawienie nowych, zmontowanie do samochodu', '02:30:00'),
(8, 4, 'Amortyzatory przednie Volkswagen T6 przód', 'Wymontowanie kolumny MCPERSONA i wstawienie nowych amortyzatorów z przodu', '02:00:00'),
(9, 5, 'Folia przyciemniająca 75%', 'Przyciemnianie szyb', '03:00:00'),
(10, 5, 'Turbo sprężarka GARRETT G47-1650 80, turbo sprężarka GARRETT G45-1350', 'Zamontowanie 2 turbo sprężarek oraz chłodniczki olejowej z przewodami, zamontowanie intercoler duży, strojenie turbin', '72:00:00'),
(11, 6, 'Turbo sprężarka Garrett GTX5533R GEN II Super Core', 'Wstawienie 2 nowych turbo sprężarek, kalibrowanie, zrobienie układu dolotowego', '48:00:00'),
(12, 6, 'Mild Pipe BMW S55 F80 F82 M3 M4 14-19', 'Zrobienie układu wydechowego', '03:00:00'),
(13, 6, 'Intercooler Mishimoto R-Line 600x300x100 Złoty', 'Wstawienie 2 dużych interpolerów', '02:00:00'),
(14, 6, 'Electronic Boost Controller Turbosmart EBOOST HP 60mm Sleeper + Elektrozawór', 'Założenie instalacji czujnika ciśnienia doładowania', '04:00:00'),
(15, 6, 'Blow Off Turbosmart BMW 135I 335I Z4 N54 Dual Port Kit', 'Zamontowanie blow offa', '01:00:00'),
(16, 6, 'Uniwersalny zestaw spływu i zasilania oleju Twin Turbo, zestaw odprowadzający olej z turbiny TurboWorks', 'Zamontowanie przewodów olejowych', '02:30:00'),
(17, 6, 'Zestaw do natrysku CO2 na Intercooler DEI', 'Zamontowanie NOS z wlotem do turbiny', '05:00:00');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `faktury`
--

CREATE TABLE `faktury` (
  `idf` int(11) NOT NULL,
  `z_id` int(11) NOT NULL,
  `data_wystawienia` date DEFAULT NULL,
  `koszt_netto` float DEFAULT NULL,
  `koszt_brutto` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faktury`
--

INSERT INTO `faktury` (`idf`, `z_id`, `data_wystawienia`, `koszt_netto`, `koszt_brutto`) VALUES
(1, 1, '2023-04-28', 380, 467.4),
(2, 2, '2017-02-10', 340, 418.2),
(3, 3, '0000-00-00', 0, 0),
(4, 4, '2023-06-01', 2029.9, 2496.78),
(5, 5, '0000-00-00', NULL, NULL),
(6, 6, '2023-06-02', 37820.6, 46519.3);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klienci`
--

CREATE TABLE `klienci` (
  `idk` int(11) NOT NULL,
  `nazwisko` varchar(30) NOT NULL,
  `adres` varchar(50) NOT NULL,
  `telefon` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `klienci`
--

INSERT INTO `klienci` (`idk`, `nazwisko`, `adres`, `telefon`) VALUES
(1, 'Jakub Pluskota', 'ul. Kilińskiego 54', 538629075),
(2, 'Maksymilan Andrzejak', 'al. Piastów 66', 784018177),
(4, 'Damian Kaczmarski', 'ul. Wojska Polskiego 31', 789292566),
(5, 'Tomasz Stasik', 'ul. Jaworzyńska 6', 885346248),
(6, 'Kacper Kruszelnicki', 'Plac. ks. Stanisława Staszica 15', 669212622);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `samochody`
--

CREATE TABLE `samochody` (
  `ids` int(11) NOT NULL,
  `k_id` int(11) NOT NULL,
  `marka` varchar(20) NOT NULL,
  `numer_rejestracyjny` varchar(8) NOT NULL,
  `pojemnosc_silnika` int(11) NOT NULL,
  `rok_produkcji` year(4) NOT NULL,
  `przebieg` int(10) UNSIGNED NOT NULL,
  `vin` varchar(17) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `samochody`
--

INSERT INTO `samochody` (`ids`, `k_id`, `marka`, `numer_rejestracyjny`, `pojemnosc_silnika`, `rok_produkcji`, `przebieg`, `vin`) VALUES
(1, 1, 'Volkswagen', 'FSL624AN', 1896, '2004', 335000, 'WVWZZZ1KZ5P002102'),
(2, 2, 'Fiat', 'ETM09EA', 1108, '1995', 680123, 'ZFA17600001056493'),
(3, 4, 'Opel', 'SD32F8AG', 2171, '2002', 400452, 'W0L0ZCF6881098369'),
(4, 5, 'Volkswagen', 'HPZC341', 1968, '2019', 119532, 'WV2ZZZ7HZBH057698'),
(5, 6, 'Isuzu', 'DL1312AC', 3179, '1998', 558442, 'JACCN57X6Y7D00130'),
(6, 1, 'BMW', 'FSL415AN', 2979, '2008', 213710, 'WBAWB71080P026944');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zlecenia`
--

CREATE TABLE `zlecenia` (
  `idz` int(11) NOT NULL,
  `k_id` int(11) NOT NULL,
  `sa_id` int(11) NOT NULL,
  `data` date NOT NULL,
  `problem` varchar(1000) NOT NULL,
  `zrealizowane` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='zlecenia';

--
-- Dumping data for table `zlecenia`
--

INSERT INTO `zlecenia` (`idz`, `k_id`, `sa_id`, `data`, `problem`, `zrealizowane`) VALUES
(1, 1, 1, '2023-04-28', 'Słaba skuteczność hamowania, bicie koła lewego', 1),
(2, 2, 2, '2017-02-09', 'Pióra wycieraczek, niski poziom płynu spryskiwaczy, dziura w dachu', 1),
(3, 4, 3, '2023-06-01', 'Problem z odpalaniem, objawy korozji', 0),
(4, 5, 4, '2023-05-09', 'Wadliwa żarówka H7, sprężyny amortyzatorów skrzypią, z amortyzatorów cieknie olej', 1),
(5, 6, 5, '2023-05-30', 'Dodanie 2 turbo sprężarek, przyciemnienie szyb, obniżenie samochodu, down pipe, pełen przelot, wyścigowe świece zapłonowe', 0),
(6, 1, 6, '2023-05-01', 'Podniesienie osiągów silnika', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zlecenia_magazynowe`
--

CREATE TABLE `zlecenia_magazynowe` (
  `idzm` int(11) NOT NULL,
  `f_id` int(11) NOT NULL,
  `nazwa` varchar(130) NOT NULL,
  `ilosc` int(11) NOT NULL,
  `cena` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `zlecenia_magazynowe`
--

INSERT INTO `zlecenia_magazynowe` (`idzm`, `f_id`, `nazwa`, `ilosc`, `cena`) VALUES
(1, 1, 'Komplet klocków hamulcowych VW przód', 1, 60.55),
(2, 1, 'Tarcze hamulcowe VW przód', 2, 230.48),
(3, 2, 'Pióra wycieraczek', 3, 50),
(4, 2, 'Baniak płynu do spryskiwaczy', 1, 20),
(5, 2, 'Blacha na dach', 1, 30),
(6, 3, 'Rozrusznik opel vectra C', 1, 250.3),
(7, 3, 'Akumulator', 1, 170),
(8, 3, 'Filtr powietrza 2.2CDTI', 1, 25),
(9, 3, 'Czujnik ciśnienia doładowania', 1, 180),
(11, 3, 'Regeneracja turbo sprężarki', 1, 1300),
(12, 3, 'Świeca żarowa 2.2CDTI', 4, 160),
(13, 3, 'Listwa wtryskowa', 1, 240.5),
(14, 3, 'Filtr oleju 650OE/01', 1, 19),
(15, 3, 'Olej castrol 5W-40', 1, 180),
(16, 3, 'Filtr paliwa 2.2CDTI', 1, 80),
(17, 4, 'Sprężyna amortyzatora Volkswagen T6 przód', 2, 290.76),
(18, 4, 'Amortyzatory Volkswagen T6 przód', 2, 1016.3),
(19, 4, 'Żarówka H7', 1, 2.3),
(20, 5, 'Turbo sprężarka GARRETT G47-1650 80', 1, 10570),
(21, 5, 'Turbo sprężarka GARRETT G45-1350', 1, 8475),
(22, 5, 'Folia przyciemniająca 75% rolka', 1, 2500),
(23, 6, 'Turbosprężarka Garrett GTX5533R GEN II Super Core', 2, 29860),
(24, 6, 'Mild Pipe BMW S55 F80 F82 M3 M4 14-19', 1, 6900),
(25, 6, 'Intercooler Mishimoto R-Line 600x300x100 Złoty', 2, 3200),
(26, 6, 'Electronic Boost Controller Turbosmart EBOOST HP 60mm Sleeper + Elektrozawór', 1, 4220),
(27, 6, 'Blow Off Turbosmart BMW 135I 335I Z4 N54 Dual Port Kit', 1, 2750),
(28, 6, 'Uniwersalny zestaw spływu i zasilania oleju Twin Turbo i zestaw odprowadzający olej z turbiny TurboWorks', 1, 400),
(29, 6, 'Zestaw do natrysku CO2 na Intercooler DEI', 1, 4900);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `czynnosci`
--
ALTER TABLE `czynnosci`
  ADD PRIMARY KEY (`idc`),
  ADD KEY `z_id` (`z_id`);

--
-- Indeksy dla tabeli `faktury`
--
ALTER TABLE `faktury`
  ADD PRIMARY KEY (`idf`),
  ADD KEY `z_id` (`z_id`);

--
-- Indeksy dla tabeli `klienci`
--
ALTER TABLE `klienci`
  ADD PRIMARY KEY (`idk`);

--
-- Indeksy dla tabeli `samochody`
--
ALTER TABLE `samochody`
  ADD PRIMARY KEY (`ids`),
  ADD KEY `k_id` (`k_id`);

--
-- Indeksy dla tabeli `zlecenia`
--
ALTER TABLE `zlecenia`
  ADD PRIMARY KEY (`idz`),
  ADD KEY `k_id` (`k_id`),
  ADD KEY `sa_id` (`sa_id`),
  ADD KEY `sa_id_2` (`sa_id`);

--
-- Indeksy dla tabeli `zlecenia_magazynowe`
--
ALTER TABLE `zlecenia_magazynowe`
  ADD PRIMARY KEY (`idzm`),
  ADD KEY `f_id` (`f_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `czynnosci`
--
ALTER TABLE `czynnosci`
  MODIFY `idc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `faktury`
--
ALTER TABLE `faktury`
  MODIFY `idf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `klienci`
--
ALTER TABLE `klienci`
  MODIFY `idk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `samochody`
--
ALTER TABLE `samochody`
  MODIFY `ids` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `zlecenia`
--
ALTER TABLE `zlecenia`
  MODIFY `idz` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `zlecenia_magazynowe`
--
ALTER TABLE `zlecenia_magazynowe`
  MODIFY `idzm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `czynnosci`
--
ALTER TABLE `czynnosci`
  ADD CONSTRAINT `praca` FOREIGN KEY (`z_id`) REFERENCES `zlecenia` (`idz`);

--
-- Constraints for table `faktury`
--
ALTER TABLE `faktury`
  ADD CONSTRAINT `wystawiona` FOREIGN KEY (`z_id`) REFERENCES `zlecenia` (`idz`);

--
-- Constraints for table `samochody`
--
ALTER TABLE `samochody`
  ADD CONSTRAINT `posiada` FOREIGN KEY (`k_id`) REFERENCES `klienci` (`idk`);

--
-- Constraints for table `zlecenia`
--
ALTER TABLE `zlecenia`
  ADD CONSTRAINT `do_naprawy` FOREIGN KEY (`sa_id`) REFERENCES `samochody` (`ids`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `złożył` FOREIGN KEY (`k_id`) REFERENCES `klienci` (`idk`);

--
-- Constraints for table `zlecenia_magazynowe`
--
ALTER TABLE `zlecenia_magazynowe`
  ADD CONSTRAINT `dotyczy` FOREIGN KEY (`f_id`) REFERENCES `faktury` (`idf`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
