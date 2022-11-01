-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 01 Lis 2022, 17:50
-- Wersja serwera: 10.4.13-MariaDB
-- Wersja PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `wypiekarnia`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klijeci`
--

CREATE TABLE `klijeci` (
  `id` int(11) NOT NULL,
  `imie` text COLLATE utf8mb4_polish_ci NOT NULL,
  `nazwisko` text COLLATE utf8mb4_polish_ci NOT NULL,
  `mail` text COLLATE utf8mb4_polish_ci NOT NULL,
  `telefon` text COLLATE utf8mb4_polish_ci NOT NULL,
  `logi` text COLLATE utf8mb4_polish_ci NOT NULL,
  `haslo` text COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `klijeci`
--

INSERT INTO `klijeci` (`id`, `imie`, `nazwisko`, `mail`, `telefon`, `logi`, `haslo`) VALUES
(1, 'Janusz', 'Kowalski', 'jkowalski@gmail.com', '123456789', 'jkowalski56', 'qwerty');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `produkty`
--

CREATE TABLE `produkty` (
  `id` int(11) NOT NULL,
  `Nazwa` text COLLATE utf8_polish_ci NOT NULL,
  `Cena` text COLLATE utf8_polish_ci NOT NULL,
  `Masa` text COLLATE utf8_polish_ci NOT NULL,
  `Składniki` text COLLATE utf8_polish_ci NOT NULL,
  `Opis` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `produkty`
--

INSERT INTO `produkty` (`id`, `Nazwa`, `Cena`, `Masa`, `Składniki`, `Opis`) VALUES
(1, 'Tort Urodzinowy', '50zł', '1Kg', 'Biszkopt, Krem, owoce, Kruszona Czekolada', 'Tort na żądanie, kolorowy i dla ludzi w każdym wieku'),
(2, 'Tort dla Smakoszy', '20zł', '1Kg', 'Biszkopt Kakaowy, Krem z Gożkiej czekolady, Owoce, Kruszona Biała Czekolada', 'Tort jaki chcesz i specjalnie dla ciebie'),
(3, 'Tort Jubileuszowy', '30zł', '1Kg', 'Biszkopt, Krem, Dużo owoców ', 'Tort Elegancki i wystrojny na specjalną okazję'),
(4, 'Tort Ślubny', '40zł', '1Kg', 'Biszkopt, Krem, Owoce, Posypka z biszkoptów moczonych w Weskey', 'Pyszny tort z dodatkami'),
(5, 'Ciasto Drożdżowe', '15zł', '1Kg', 'Drożdże, jajka, owoce, kruszonka', 'Pyszny drożdżowiec jak u babci'),
(6, 'Ciasto Sernik', '20zł', '1Kg', 'Ser twarogowy, białka z jajek, cukier', 'Przepyszny serniczek jak u mamy'),
(7, 'Ciasto Browne', '25zł', '1Kg', 'Czekolada Mleczna, masło, jajka, mleko, maliny, czekolada', 'Czekoladowe niebo w gębie'),
(8, 'Ciasto dziecięce', '30zł', '1Kg', 'Biszkopt kakaowy, krem malinowy, galaretka truskawkowa', 'Najlepsze dla dzieci bo dzieci to lubią'),
(9, 'Tarta jabłkowa na mlecznym kremie', '35zł', '1Kg', 'Ciasto tartowe, krem mleczno-budyniowy, jabłka', 'Pyszna tarta jabłkowa na każde spotkanie'),
(10, 'Tarta wiosenna', '30zł', '1Kg', 'Ciasto tartowe, owoce(Truskawki i Borówki), krem budyniowy z czekoladą białą ', 'Pyszna tarta, na randki i spotkania z przyjaciółmi'),
(11, 'Tarta czekoladowo-orzechowa', '25zł', '1Kg', 'Ciasto tartowe, Krem czekoladowy, orzechy w karmelu', 'Pyszna tarta na jesienne wieczory'),
(12, 'Tarta malinowa', '20zł', '1Kg', 'Ciasto tartowe, krem mleczno-czekoladowy, maliny', 'Przepyszna tarta na spotkania'),
(13, 'Babeczka Sezonowa', '8zł', '100gr', 'Ciasto kruche małe, krem, owoce, żelatyna', 'babeczka modyfikowana sezonowo'),
(14, 'Ciasteczka z czekoladą (Amerykańskie)', '5zł', '100gr', 'Mąka, masło, jajka, mleko, czekolada', 'Amerykańskie ciasteczka COCO'),
(15, 'Ciasteczka Ziarna w Karmelu', '5zł', '100gr', 'karmel, ziarna', 'Na przekąske bardzo dobre'),
(16, 'Ciasteczka owsiane z bakaliami', '7zł', '100gr', 'ziarna owsa, jajka, bakalie', 'Pyszne i zdrowe ciasteczka'),
(17, 'Ciasteczka Cantuccini', '6zł', '150gr', 'Mąka, mleko, jajka, czekolada', 'Pyszne i lekkie Cantuccini po włosku'),
(18, 'Bułka Przenna', '0,60gr', '1szt', 'Mleko, mąka, jajka', 'Pyszne, świeże bułeczki tylko u nas'),
(19, 'Bułka Kajzerka', '0.80gr', '1szt', '...', '...'),
(20, 'Bułka Razowa', '0,90gr', '1szt', 'Mąka, jajka, mleko, zakwas, ziarna', 'Pyszna i zdrowa bułeczka razowa'),
(21, 'Bułka Ziarnista', '0,50gr', '1szt', 'Mąka, jajka, mleko, ziarna', 'Pyszna bułeczka z ziarnami');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `relacje`
--

CREATE TABLE `relacje` (
  `id` int(11) NOT NULL,
  `id klijenta` text COLLATE utf8_polish_ci NOT NULL,
  `id produktu` text COLLATE utf8_polish_ci NOT NULL,
  `status` text COLLATE utf8_polish_ci NOT NULL,
  `data zamówienia` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zamowienia`
--

CREATE TABLE `zamowienia` (
  `id` int(11) NOT NULL,
  `nazwa_produkt` text NOT NULL,
  `ilosc` text NOT NULL,
  `dat` date NOT NULL,
  `godzina` time NOT NULL,
  `mail` text NOT NULL,
  `telefon` int(11) NOT NULL,
  `kom` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `klijeci`
--
ALTER TABLE `klijeci`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `produkty`
--
ALTER TABLE `produkty`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `relacje`
--
ALTER TABLE `relacje`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `klijeci`
--
ALTER TABLE `klijeci`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `produkty`
--
ALTER TABLE `produkty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT dla tabeli `relacje`
--
ALTER TABLE `relacje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
