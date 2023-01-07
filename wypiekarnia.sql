-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 07 Sty 2023, 21:47
-- Wersja serwera: 10.4.25-MariaDB
-- Wersja PHP: 8.1.10

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
-- Struktura tabeli dla tabeli `aktualizacje`
--

CREATE TABLE `aktualizacje` (
  `id` int(11) NOT NULL,
  `Nazwa` text CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci NOT NULL,
  `Data` date DEFAULT NULL,
  `Opis` text CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `aktualizacje`
--

INSERT INTO `aktualizacje` (`id`, `Nazwa`, `Data`, `Opis`) VALUES
(1, 'Informację', '2020-12-10', 'Aktualizacja obejmuje dodanie formularzy zamówieniowych, oraz kilku innych opcji dotyczących interfaceu naszego sklepu'),
(2, 'System U/R/L', '2021-02-10', 'Aktualizacja obejmuje rozpoczęcie pracy nad systemem umożliwiającym daiałania na kontach urzytkownika i logowanie'),
(3, 'Podsumowanie', '2021-02-28', 'Aktualizacja obejmuje dodanie skryptu PHP który po wypełnieniu formularza z zamówieniem, podsumowuje zamówienia'),
(4, 'Zaawansowany CSS', '2021-03-14', 'Aktualizacja obejmuje dodanie zaawansowanych akruszy stylów css i dodanie pewnych usprawnień'),
(5, 'JS Fantazja', '2021-03-22', 'Aktualizacja obejmuje dodanie kodów JavaScriptu, w celu dodania trochę fantazji do naszej strony'),
(6, 'System Logowania', '2021-04-17', 'Aktualizacja obejmuje stworzenie pełnego systemu U/R/L, który działa i dodanie panelu konta urzytkownika'),
(7, 'System Logowania(aktualizacja)', '2021-04-25', 'Aktualizacja obejmuje dodanie więcej opcji panelu użytkownika takich jak np. (wylogowanie, usuwanie, czy nieskończona jeszcze możliwość edycji danych konta)'),
(8, 'Usprawnienie', '2021-04-30', 'Aktualizacja obejmuje tytułowe usprawnienie połączeń między skryptami PHP i dodanie zabezpieczeń na poziomie systemu U/R/L i innych'),
(9, 'Analiza', '2021-05-24', 'Aktualizacja obejmuje szczegułową analize całego systemu Wypiekarni oraz naprawienie znalezionych błędów i zabezpieczeń'),
(10, 'Kontrolki', '2021-05-31', 'Aktualizacja obejmuje dodanie plików kontrolnych, które pełnią funkcję informacyjną dla użytkownika'),
(11, 'Siła PHP', '2022-07-27', 'Dziś jeszcze mocniej zastosowaliśmy PHP, i wprowadziliśmy jeszcze więcej modyfikacji do naszego serwisu'),
(12, 'Zewnętrzne informacje', '2022-07-30', 'Aktualizacja obejmuje przebudowanie całego systemu naszej witryny w taki sposób aby kod był napisany w systemie MODULARNO-PROCEDURALNYM'),
(13, 'Aktualizacja Bazy', '2022-08-25', 'W tej aktualizacji zmieniliśmy strukturę naszej bazy danych'),
(14, 'Ożywienie zamówień', '2022-10-28', 'W tej aktualizacji w końcu udało nam się ukończyć budowę pełnego systemu tworzenia zamówień z obsługą rodzajów produktów(ADIO) przy dodawaniu do bazy zamówienia.'),
(15, 'Prace Naprawcze', '2022-11-04', 'Właśnie wyszła nowa aktualizacja która naprawia min. zabezpieczenie przed zaznaczeniem wielu checkboxów, oraz przygotowujemy się do uruchomienia koszyka'),
(16, 'Ostatnie Poprawki', '2022-11-05', 'W tej aktualizacji dodaliśmy podstawową funkcjonalność koszyka mianowicie wyświetlenie zamówionych produktów. <br> Dodatkowo zmieniliśmy logo naszej strony \r\n z: <br><img id=\'k\' src=\'img/icon.png\'/><br> na: <br><img id=\'k\' src=\'ic.png\'/>'),
(17, 'System zamówień ukończony', '2022-12-19', 'W tej aktualizacji dodaliśmy możliwość ręcznego aktywowania zamówień przez użytkownika,<br> w celu lepszej automatyzacji pracy naszego sklepu. <br> Naprawiliśmy też kilka błędów związanych z koszykiem'),
(18, 'Następny Ubdate', '2023-01-05', 'W tej aktualizacji przebudowywujemy naszą aplikację, a właściwie silnik łączący się z bazą danych,<br> na silnik oparty o bibliotekę PDO która usprawni pracę nad serwisem.');

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
(1, 'Janusz', 'Kowalski', 'jkowalski@wp.pl', '123123123', 'jkowalski56', 'qwerty'),
(2, 'kot', 'dusiciel', 'kotd@gmail.com', '456456456', 'kotidu2137', 'qwerty');

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
(13, 'Ciasteczka z czekoladą (Amerykańskie)', '5zł', '100gr', 'Mąka, masło, jajka, mleko, czekolada', 'Amerykańskie ciasteczka COCO'),
(14, 'Ciasteczka Ziarna w Karmelu', '5zł', '100gr', 'karmel, ziarna', 'Na przekąske bardzo dobre'),
(15, 'Ciasteczka owsiane z bakaliami', '7zł', '100gr', 'ziarna owsa, jajka, bakalie', 'Pyszne i zdrowe ciasteczka'),
(16, 'Ciasteczka Cantuccini', '6zł', '150gr', 'Mąka, mleko, jajka, czekolada', 'Pyszne i lekkie Cantuccini po włosku'),
(17, 'Bułka Przenna', '0,60gr', '1szt', 'Mleko, mąka, jajka', 'Pyszne, świeże bułeczki tylko u nas'),
(18, 'Bułka Kajzerka', '0.80gr', '1szt', '...', '...'),
(19, 'Bułka Razowa', '0,90gr', '1szt', 'Mąka, jajka, mleko, zakwas, ziarna', 'Pyszna i zdrowa bułeczka razowa'),
(20, 'Bułka Ziarnista', '0,50gr', '1szt', 'Mąka, jajka, mleko, ziarna', 'Pyszna bułeczka z ziarnami'),
(21, 'Babeczka Czekoladowa Biała', '9zł', '100gr', 'Babeczka kakaowa z polana białączekoladą', '...'),
(22, 'Babeczka Czekoladowa Czarna', '7zł', '100gr', 'Babeczka z polana czarną czekoladą', '...'),
(23, 'Babeczka Malinowa\r\n', '5zł', '100gr', 'Babeczka, polewa lukrowa, maliny', 'babeczka polana lukrem i posypana malinami'),
(24, 'Babeczka Sezonowa', '8zł', '100gr', 'Ciasto kruche małe, krem, owoce, żelatyna', 'babeczka modyfikowana sezonowo\r\n');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `relacje`
--

CREATE TABLE `relacje` (
  `id` int(11) NOT NULL,
  `id_klijenta` text COLLATE utf8_polish_ci NOT NULL,
  `id_produktu` text COLLATE utf8_polish_ci NOT NULL,
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
-- Indeksy dla tabeli `aktualizacje`
--
ALTER TABLE `aktualizacje`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `aktualizacje`
--
ALTER TABLE `aktualizacje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT dla tabeli `klijeci`
--
ALTER TABLE `klijeci`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `produkty`
--
ALTER TABLE `produkty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

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
