-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Wrz 05, 2023 at 01:40 PM
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
-- Database: `wypiekarnia`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `aktualizacje`
--

CREATE TABLE `aktualizacje` (
  `id` int(11) NOT NULL,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci NOT NULL,
  `date` text NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aktualizacje`
--

INSERT INTO `aktualizacje` (`id`, `name`, `date`, `description`) VALUES
(1, 'Informację', '2020-12-10', 'Aktualizacja obejmuje dodanie formularzy zamówieniowych, oraz kilku innych opcji dotyczących interface\'u naszego sklepu'),
(2, 'System U/R/L', '2021-02-10', 'Aktualizacja obejmuje rozpoczęcie pracy nad systemem umożliwiającym działania na kontach użytkownika i logowanie'),
(3, 'Podsumowanie', '2021-02-28', 'Aktualizacja obejmuje dodanie skryptu PHP który po wypełnieniu formularza z zamówieniem, podsumowuje zamówienie'),
(4, 'Zaawansowany CSS', '2021-03-14', 'Aktualizacja obejmuje dodanie zaawansowanych akruszy stylów css i pewnych usprawnień'),
(5, 'JS Fantazja', '2021-03-22', 'Aktualizacja obejmuje dodanie skryptów JS, w celu dodania trochę fantazji do naszej aplikacji'),
(6, 'System Logowania', '2021-04-17', 'Aktualizacja obejmuje stworzenie pełnego systemu (U/R/L), który działa i dodanie panelu konta użytkownika'),
(7, 'System Logowania(aktualizacja)', '2021-04-25', 'Aktualizacja obejmuje dodanie więcej opcji panelu użytkownika</br> takich jak np. (wylogowanie, usuwanie, czy nieskończona jeszcze możliwość edycji danych konta)'),
(8, 'Usprawnienie', '2021-04-30', 'Aktualizacja obejmuje tytułowe usprawnienie połączeń między skryptami PHP,</br> i dodanie zabezpieczeń na poziomie systemu (U/R/L) i innych'),
(9, 'Analiza', '2021-05-24', 'Aktualizacja obejmuje szczegółową analizę całego systemu \"Wypiekarni\"</br> oraz naprawienie znalezionych błędów i zabezpieczeń'),
(10, 'Kontrolki', '2021-05-31', 'Aktualizacja obejmuje dodanie plików kontrolnych,</br> które pełnią funkcję informacyjną dla użytkownika,</br> oraz usprawniają niektóre procesy w aplikacji'),
(11, 'Siła PHP', '2022-07-27', 'Dziś jeszcze mocniej zastosowaliśmy PHP i wprowadziliśmy jeszcze więcej modyfikacji do naszego serwisu'),
(12, 'Zewnętrzne informacje', '2022-07-30', 'Aktualizacja obejmuje przebudowanie całego systemu naszej aplikacji</br> w taki sposób aby kod był napisany w API(MODULARNO-PROCEDURALNYM)'),
(13, 'Aktualizacja Bazy', '2022-08-25', 'W tej aktualizacji zmieniliśmy strukturę naszej bazy danych'),
(14, 'Ożywienie zamówień', '2022-10-28', 'W tej aktualizacji w końcu udało nam się ukończyć budowę pełnego systemu tworzenia zamówień</br> z obsługą rodzajów produktów (system: \"ADIO\") przy dodawaniu do bazy zamówienia.'),
(15, 'Prace Naprawcze', '2022-11-04', 'Właśnie wyszła nowa aktualizacja która naprawia min.</br> zabezpieczenie przed zaznaczeniem wielu checkboxów,</br> oraz przygotowujemy się do uruchomienia koszyka'),
(16, 'Ostatnie Poprawki', '2022-11-05', 'W tej aktualizacji dodaliśmy podstawową funkcjonalność koszyka mianowicie wyświetlenie zamówionych produktów.</br> Dodatkowo zmieniliśmy logo naszej aplikacji </br> Pozdrawiamy Twórcy :-)'),
(17, 'System zamówień ukończony', '2022-12-19', 'W tej aktualizacji dodaliśmy możliwość ręcznego aktywowania zamówień przez użytkownika,</br> w celu lepszej automatyzacji pracy naszego sklepu.</br> Naprawiliśmy też kilka błędów związanych z koszykiem'),
(18, 'Następny Update', '2023-01-05', 'W tej aktualizacji przebudowywujemy naszą aplikację, a właściwie silnik łączący się z bazą danych,</br> na silnik oparty o bibliotekę PDO która usprawni pracę nad serwisem.'),
(19, 'Chwila na oddech', '2023-01-09', 'W tej aktualizacji chwilowo wstrzymujemy pracę nad naszą aplikacją<br> dopóki nie naprawimy jednego błędu związanego z koszykiem.</br> Oraz chcieliśmy poinformować o tym że zaistniała pierwsza opcja kontaktu z nami w zakładce kontakt.</br> Pozdrawiamy Twórcy  :-)'),
(20, 'Remoncik', '2023-01-19', 'W tej aktualizacji naprawiliśmy dogłębnie błędy, które się ostatnio pojawiły,</br> oraz naprawiliśmy też powtarzające się elementy arkuszy stylów css.</br> Pozdrawiamy Twórcy ;-)'),
(21, 'Zmiany', '2023-02-19', 'W tej aktualizacji poddaliśmy formatowaniu pliki z podsumowaniem zamówień \"Nowe Funkcje\",</br> oraz wyłączyliśmy \"tymczasowo\" dostęp do koszyka w ramach jego napraw.</br> Pozdrawiamy Twórcy :-)'),
(22, 'Proces Naprawczy', '2023-03-20', 'W tej Aktualizacji naprawiliśmy szczególne błędy znajdujące się w kodzie naszej aplikacji.</br>Dodatkowo zoptymalizowaliśmy całą aplikację aby jej kod był bardziej dla nas czytelny.</br>Pozdrawiamy Twórcy :-)'),
(23, 'Nowe Funkcje', '2023-08-05', 'W tej aktualizacji naprawiliśmy krytyczne błędy w kodzie formulaży zamówień oraz</br> zaktualizowano ikony serwisu wraz z aktualizacją silnika JQuery.</br> Usunięto też rozwijane menu i poddano je elastyzacji.</br> Wprowadzono też ogólny porządek w kodzie naszego sklepu.</br>Pozdrawiamy Twórcy :-)'),
(24, 'Ogólne Usprawnienia', '2023-08-11', 'W tej aktualizacji naprawiliśmy składnię kodu naszego sklepu i przekształciliśmy delikatnie </br> kody skryptów JS na bardziej optymalne dla czytania. </br>Dostosowaliśmy też skalowalność w pionie naszego serwisu, przypominamy o możliwości </br> proponowania zmian i kontaktu z nami w zakładce kontakt. </br> Pozdrawiamy Twórcy :-)'),
(25, 'Zmiana Zabezpieczeń', '2023-08-14', 'W tej aktualizacji naprawiliśmy zabezpieczenia funkcji naszego sklepu oraz silnik wyświetlający </br> login zalogowanego użytkownika w menu, jeśli użytkownik nie jest zalogowany </br> to wyświetlić napis \'Zaloguj się\'. </br> Zastosowano również lepszą czytelność kodu oraz dodano walidację </br> numeru telefonu, wszędzie tam gdzie to jest możliwe. </br> Pozdrawiamy Twórcy :-)'),
(26, 'Nowe Zarządzanie', '2023-09-05', 'Ta aktualizacja obejmuje dodanie zewnętrznej aplikacji do sterowania </br> zdarzeniami wypiekarni np. (Aktualizacje, Produkty itd). </br> Zmieniliśmy też logo naszego sklepu które ma symbolizować połączenie 2 aplikacji w jeden serwis oto one: </br> <img id=\'k\' src=\'logo.png\'/> </br> Przerobiliśmy też cały system plików wypiekarni, aby był bardziej zoptymalizowany pod nowe technologie. </br> Pozdrawiamy twórcy :-)');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klijeci`
--

CREATE TABLE `klijeci` (
  `id` int(11) NOT NULL,
  `imie` text NOT NULL,
  `nazwisko` text NOT NULL,
  `mail` text NOT NULL,
  `telefon` text NOT NULL,
  `logi` text NOT NULL,
  `haslo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `klijeci`
--

INSERT INTO `klijeci` (`id`, `imie`, `nazwisko`, `mail`, `telefon`, `logi`, `haslo`) VALUES
(1, 'Janusz', 'Kowalski', 'jkowalski@wp.pl', '12121212', 'jkowalski56', 'qwerty');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `produkty`
--

CREATE TABLE `produkty` (
  `id` int(11) NOT NULL,
  `Nazwa` text NOT NULL,
  `Cena` float NOT NULL,
  `Masa` int(11) NOT NULL,
  `Skladniki` text NOT NULL,
  `Opis` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `produkty`
--

INSERT INTO `produkty` (`id`, `Nazwa`, `Cena`, `Masa`, `Skladniki`, `Opis`) VALUES
(1, 'Tort Urodzinowy', 50, 1000, 'Biszkopt, Krem, owoce, Kruszona Czekolada', 'Tort na żądanie, kolorowy i dla ludzi w każdym wieku'),
(2, 'Tort dla Smakoszy', 20, 1000, 'Biszkopt Kakaowy, Krem z Gożkiej czekolady, Owoce, Kruszona Biała Czekolada', 'Tort jaki chcesz i specjalnie dla ciebie'),
(3, 'Tort Jubileuszowy', 30, 1000, 'Biszkopt, Krem, Dużo owoców ', 'Tort Elegancki i wystrojny na specjalną okazję'),
(4, 'Tort Ślubny', 40, 1000, 'Biszkopt, Krem, Owoce, Posypka z biszkoptów moczonych w Weskey', 'Pyszny tort z dodatkami'),
(5, 'Ciasto Drożdżowe', 15, 1000, 'Drożdże, jajka, owoce, kruszonka', 'Pyszny drożdżowiec jak u babci'),
(6, 'Ciasto Sernik', 20, 1000, 'Ser twarogowy, białka z jajek, cukier', 'Przepyszny serniczek jak u mamy'),
(7, 'Ciasto Browne', 25, 1000, 'Czekolada Mleczna, masło, jajka, mleko, maliny, czekolada', 'Czekoladowe niebo w gębie'),
(8, 'Ciasto dziecięce', 30, 1000, 'Biszkopt kakaowy, krem malinowy, galaretka truskawkowa', 'Najlepsze dla dzieci bo dzieci to lubią'),
(9, 'Tarta jabłkowa na mlecznym kremie', 35, 1000, 'Ciasto tartowe, krem mleczno-budyniowy, jabłka', 'Pyszna tarta jabłkowa na każde spotkanie'),
(10, 'Tarta wiosenna', 30, 1000, 'Ciasto tartowe, owoce(Truskawki i Borówki), krem budyniowy z czekoladą białą ', 'Pyszna tarta, na randki i spotkania z przyjaciółmi'),
(11, 'Tarta czekoladowo-orzechowa', 25, 1000, 'Ciasto tartowe, Krem czekoladowy, orzechy w karmelu', 'Pyszna tarta na jesienne wieczory'),
(12, 'Tarta malinowa', 20, 1000, 'Ciasto tartowe, krem mleczno-czekoladowy, maliny', 'Przepyszna tarta na spotkania'),
(13, 'Ciasteczka Amerykańskie', 5, 100, 'Mąka, masło, jajka, mleko, czekolada', 'Amerykańskie ciasteczka COCO'),
(14, 'Ciasteczka Ziarna w Karmelu', 5, 100, 'karmel, ziarna', 'Na przekąske bardzo dobre'),
(15, 'Ciasteczka owsiane z bakaliami', 7, 100, 'ziarna owsa, jajka, bakalie', 'Pyszne i zdrowe ciasteczka'),
(16, 'Ciasteczka Cantuccini', 6, 150, 'Mąka, mleko, jajka, czekolada', 'Pyszne i lekkie Cantuccini po włosku'),
(17, 'Bułka Przenna', 0.8, 100, 'Mleko, mąka, jajka', 'Pyszne, świeże bułeczki tylko u nas'),
(18, 'Bułka Kajzerka', 0.8, 100, '...', '...'),
(19, 'Bułka Razowa', 0.8, 100, 'Mąka, jajka, mleko, zakwas, ziarna', 'Pyszna i zdrowa bułeczka razowa'),
(20, 'Bułka Ziarnista', 0.8, 100, 'Mąka, jajka, mleko, ziarna', 'Pyszna bułeczka z ziarnami'),
(21, 'Babeczka Czekoladowa Biała', 9, 100, 'Babeczka kakaowa z polana białączekoladą', '...'),
(22, 'Babeczka Czekoladowa Czarna', 7, 100, 'Babeczka z polana czarną czekoladą', '...'),
(23, 'Babeczka Malinowa\r\n', 5, 100, 'Babeczka, polewa lukrowa, maliny', 'babeczka polana lukrem i posypana malinami'),
(24, 'Babeczka Sezonowa', 8, 100, 'Ciasto kruche małe, krem, owoce, żelatyna', 'babeczka modyfikowana sezonowo\r\n');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `relacje`
--

CREATE TABLE `relacje` (
  `id` int(11) NOT NULL,
  `id_klijenta` text NOT NULL,
  `id_produktu` text NOT NULL,
  `status` text NOT NULL,
  `data zamówienia` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zamowienia`
--

CREATE TABLE `zamowienia` (
  `id` int(11) NOT NULL,
  `nazwa_produkt` text NOT NULL,
  `ilosc` int(11) NOT NULL,
  `dat` date NOT NULL,
  `godzina` time NOT NULL,
  `mail` text NOT NULL,
  `telefon` int(11) NOT NULL,
  `kom` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aktualizacje`
--
ALTER TABLE `aktualizacje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `klijeci`
--
ALTER TABLE `klijeci`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `produkty`
--
ALTER TABLE `produkty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `relacje`
--
ALTER TABLE `relacje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `zamowienia`
--
ALTER TABLE `zamowienia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
