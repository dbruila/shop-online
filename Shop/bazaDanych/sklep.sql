-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 02 Lut 2021, 19:28
-- Wersja serwera: 10.1.32-MariaDB
-- Wersja PHP: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `sklep`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `adres`
--

CREATE TABLE `adres` (
  `idAdres` int(30) NOT NULL,
  `kraj` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `miasto` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ulica` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kodPoczt` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nrDomu` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `adres`
--

INSERT INTO `adres` (`idAdres`, `kraj`, `miasto`, `ulica`, `kodPoczt`, `nrDomu`) VALUES
(18, 'Bialorus', 'Brzesc', 'Lenina', '224000', '10'),
(27, 'Polska', 'Warszawa', 'Wroblewskiego', '', '1'),
(28, 'Polska', 'Biala Podlaska', 'Aleje Jerozolimskie', '', '45'),
(29, 'Polska', 'Wroclaw', 'Wroblewskiego', '11-444', '27');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `dostawa`
--

CREATE TABLE `dostawa` (
  `idDost` int(30) NOT NULL,
  `typDost` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `dostawa`
--

INSERT INTO `dostawa` (`idDost`, `typDost`) VALUES
(1, 'zabka'),
(2, 'paczkomat'),
(3, 'paczkomat');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `elementkoszyka`
--

CREATE TABLE `elementkoszyka` (
  `idElemKosz` int(30) NOT NULL,
  `idTow` int(30) NOT NULL,
  `iloscTow` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `elementkoszyka`
--

INSERT INTO `elementkoszyka` (`idElemKosz`, `idTow`, `iloscTow`) VALUES
(10, 5, 1),
(11, 2, 1),
(12, 5, 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `eplatnosc`
--

CREATE TABLE `eplatnosc` (
  `idPlatn` int(30) NOT NULL,
  `nrKarty` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imie` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nazwisko` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cvv` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `eplatnosc`
--

INSERT INTO `eplatnosc` (`idPlatn`, `nrKarty`, `imie`, `nazwisko`, `cvv`) VALUES
(1, '1111 1111 1111 1111', 'Darya', 'Bruila', '111'),
(2, '4444 4444 4444 4444', 'User4', 'Four', '444');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `konto`
--

CREATE TABLE `konto` (
  `idKont` int(30) NOT NULL,
  `imie` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nazwisko` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefon` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adres` int(11) NOT NULL,
  `idKosz` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `konto`
--

INSERT INTO `konto` (`idKont`, `imie`, `nazwisko`, `email`, `password`, `telefon`, `adres`, `idKosz`) VALUES
(27, 'Darya', 'Bruila', 'dbruila@mail.ru', '111111', '(375) 336-0833', 18, 0),
(36, 'User1', 'One', 'user1@gmail.com', 'user11', '(111) 111-1111', 27, 0),
(37, 'User2', 'Two', 'user2@gmail.com', 'user22', '(111) 111-1111', 28, 0),
(38, 'Darya', 'Four', 'user4@gmail.com', 'user44', '(444) 444-4444', 29, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `towar`
--

CREATE TABLE `towar` (
  `idTow` int(30) NOT NULL,
  `nazwaT` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cenaT` float NOT NULL,
  `opisT` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `statusT` tinyint(4) NOT NULL DEFAULT '1',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `towar`
--

INSERT INTO `towar` (`idTow`, `nazwaT`, `cenaT`, `opisT`, `statusT`, `image`) VALUES
(1, 'NIKE M2K TEKNO', 300, 'Nike M2K Tekno to nowoczesny but inspirowany linią Monarch i wzbogacony o detale inspirowane kosmosem. Klasyczna cholewka jest inspirowana oryginalnym Monarch. Ostre kąty i eleganckie linie naszytych nakładek tworzą futurystyczny wygląd, który kontrastuje z masywnym designem. Szczegóły: niesamowicie wygodna podeszwa środkowa z pianki dla śmiałego wyglądu z lat 90. inspirowana Monarch IV. Zniekształcone linie i klips na piętę z TPU nadają butowi futurystyczny wygląd.', 1, 'img/produkt1.jpg'),
(2, 'Legginsy W NSW LEGASEE LGNG 7', 150, 'Legginsy są wykonane z dżersejowej mieszanki z dużą zawartością bawełny. Model o zwężanej sylwetce. Szczegóły: elastyczny pas, płaskie szwy, kontrastowe logo marki.', 1, 'img/produkt2.jpg'),
(5, 'Top sportowy NIKE INDY', 125, 'Sportowa koszulka wykonana z technicznej dzianiny. Technologia Dri-fit odprowadza wilgoć z ciała i pozostawia skórę suchą. Szczegóły: cienkie nieregulowane ramiączka, cienkie wyjmowane miseczki.', 1, 'img/produkt3.jpg');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `adres`
--
ALTER TABLE `adres`
  ADD PRIMARY KEY (`idAdres`);

--
-- Indeksy dla tabeli `dostawa`
--
ALTER TABLE `dostawa`
  ADD PRIMARY KEY (`idDost`);

--
-- Indeksy dla tabeli `elementkoszyka`
--
ALTER TABLE `elementkoszyka`
  ADD PRIMARY KEY (`idElemKosz`),
  ADD KEY `idTow` (`idTow`),
  ADD KEY `idElemKosz` (`idElemKosz`);

--
-- Indeksy dla tabeli `eplatnosc`
--
ALTER TABLE `eplatnosc`
  ADD PRIMARY KEY (`idPlatn`);

--
-- Indeksy dla tabeli `konto`
--
ALTER TABLE `konto`
  ADD PRIMARY KEY (`idKont`),
  ADD KEY `adres` (`adres`),
  ADD KEY `idKont` (`idKont`);

--
-- Indeksy dla tabeli `towar`
--
ALTER TABLE `towar`
  ADD PRIMARY KEY (`idTow`),
  ADD KEY `idTow` (`idTow`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `adres`
--
ALTER TABLE `adres`
  MODIFY `idAdres` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT dla tabeli `dostawa`
--
ALTER TABLE `dostawa`
  MODIFY `idDost` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `elementkoszyka`
--
ALTER TABLE `elementkoszyka`
  MODIFY `idElemKosz` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT dla tabeli `eplatnosc`
--
ALTER TABLE `eplatnosc`
  MODIFY `idPlatn` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `konto`
--
ALTER TABLE `konto`
  MODIFY `idKont` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT dla tabeli `towar`
--
ALTER TABLE `towar`
  MODIFY `idTow` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `elementkoszyka`
--
ALTER TABLE `elementkoszyka`
  ADD CONSTRAINT `idTow` FOREIGN KEY (`idTow`) REFERENCES `towar` (`idTow`);

--
-- Ograniczenia dla tabeli `konto`
--
ALTER TABLE `konto`
  ADD CONSTRAINT `adres` FOREIGN KEY (`adres`) REFERENCES `adres` (`idAdres`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
