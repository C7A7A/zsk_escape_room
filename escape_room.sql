-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 05 Gru 2018, 22:21
-- Wersja serwera: 10.1.35-MariaDB
-- Wersja PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `escape_room`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `escape_rooms`
--

CREATE TABLE `escape_rooms` (
  `ID_Escape_Room` int(10) UNSIGNED NOT NULL,
  `Name` varchar(45) DEFAULT NULL,
  `Description` longtext,
  `Time` int(10) UNSIGNED DEFAULT NULL,
  `Price` int(10) UNSIGNED DEFAULT NULL,
  `Amount` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `escape_rooms`
--

INSERT INTO `escape_rooms` (`ID_Escape_Room`, `Name`, `Description`, `Time`, `Price`, `Amount`) VALUES
(1, 'Hannibal', 'Na środkowym wschodzie USA, doszło do serii brutalnych morderstw na kobietach, których odnalezione zwłoki pozbawione są skóry. Po raz kolejny okazuje się, że jedyną osobą która może naprowadzić policję na trop zabójcy jest doktor Lecter. Zafascynowany tym podobieństwem, dotychczas zamknięty w sobie doktor, otwiera się przed nią. Ona zaś przełamuje swój strach, mając nadzieję, że Lecter pomoże jej odnaleźć sprawcę morderstw.', 90, 40, '2 - 5'),
(2, 'Joker', 'Szalony Joker powraca do miasta Gotham, aby zemścić się na Batmanie. Starszego herosa może ocalić tylko jego następca Terry McGinnis. Szalony Joker powraca do miasta Gotham, aby zemścić się na Batmanie. Starszego herosa może ocalić tylko jego następca Terry McGinnis. Szalony Joker powraca do miasta Gotham, aby zemścić się na Batmanie. Starszego herosa może ocalić tylko jego następca Terry McGinnis.', 120, 40, '2 - 6'),
(3, 'Game Over', 'Anonymous – globalna, zdecentralizowana grupa aktywistów sprzeciwiająca się ograniczaniu wolności obywatelskich, korupcji, konsumpcjonizmowi, cenzurze, fair use, katolickiej etyce seksualnej, wpływowi Kościoła katolickiego na życie publiczne oraz łamaniu praw zwierząt. W 2012 roku magazyn „Time” zaliczył ich do 100 najbardziej wpływowych osób na świecie. Czasami określani są mianem „haktywistów”. Czasami określani są mianem „haktywistów”.', 75, 35, '2 - 4'),
(4, 'Klątwa Czarnobrodego', 'Czarnobrody zapragnął sprawdzić jak jest w piekle. W tym celu nakazał zapalić w ładowni swojego statku siarkę, a w toksycznym dymie wytrzymał najdłużej z całej załogi. Czarnobrody podobno, aby wyglądać straszniej, na brodę wiązał czerwone wstążki, do kapelusza przyczepiał zapalone lonty, a na ramieniu nosił sześć załadowanych pistoletów. Zdarzało się, że odpalał działa za pomocą swojej uprzednio podpalonej brody.', 60, 25, '2 - 4');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `messages`
--

CREATE TABLE `messages` (
  `ID_Message` int(10) UNSIGNED NOT NULL,
  `ID_User` int(10) UNSIGNED DEFAULT NULL,
  `Subject` varchar(45) DEFAULT NULL,
  `Message` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `messages`
--

INSERT INTO `messages` (`ID_Message`, `ID_User`, `Subject`, `Message`) VALUES
(1, 12, 'Temat', 'content'),
(2, 12, 'Temat2', 'Content2'),
(3, 12, 'Temat3', 'Content3'),
(4, 12, '12312', '3123');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `reservations`
--

CREATE TABLE `reservations` (
  `ID_Reservation` int(10) UNSIGNED NOT NULL,
  `ID_User` int(10) UNSIGNED DEFAULT NULL,
  `ID_Escape_Room` int(10) UNSIGNED DEFAULT NULL,
  `Date` varchar(40) DEFAULT NULL,
  `Time` varchar(25) DEFAULT NULL,
  `Amount` int(10) UNSIGNED DEFAULT NULL,
  `Price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `reservations`
--

INSERT INTO `reservations` (`ID_Reservation`, `ID_User`, `ID_Escape_Room`, `Date`, `Time`, `Amount`, `Price`) VALUES
(2, 12, 4, '17  Grudzien 2018', '12:00 - 13:00', 3, 75),
(3, 12, 2, '8  Luty 2019', '12:00 - 13:30', 3, 120),
(4, 12, 2, '5  Luty 2019', '10:00 - 11:30', 5, 200),
(5, 12, 3, '5 Lipiec 2019', '18:00 - 19:30', 5, 175),
(6, 12, 4, '17 Grudzień 2018', '15:00 - 16:00', 3, 75),
(7, 12, 4, '17 Grudzień 2018', '12:00 - 13:00', 2, 50),
(8, 12, 4, '17 Grudzień 2018', '13:30 - 14:30', 4, 100),
(9, 12, 4, '17 Grudzień 2018', '13:30 - 14:30', 4, 100),
(10, 12, 4, '17 Grudzień 2018', '16:30 - 17:30', 3, 75),
(11, 12, 4, '17 Grudzień 2018', '18:00 - 19:00', 4, 100),
(12, 12, 2, '6 Grudzień 2018', '9:30 - 11:30', 5, 200),
(19, 12, 2, '6 Grudzień 2018', '17:00 - 18:00', 5, 200),
(20, 12, 2, '17 Grudzień 2018', '9:30 - 11:30', 4, 160),
(21, 12, 2, '17 Grudzień 2018', '9:30 - 11:30', 4, 160),
(22, 12, 2, '17 Grudzień 2018', '9:30 - 11:30', 4, 160),
(23, 12, 2, '17 Grudzień 2018', '9:30 - 11:30', 4, 160),
(24, 12, 2, '17 Grudzień 2018', '12:00 - 14:00', 3, 120),
(25, 12, 2, '17 Grudzień 2018', '14:30 - 16:30', 4, 160),
(26, 12, 2, '13 Grudzień 2018', '17:00 - 18:00', 6, 240);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `ID_User` int(10) UNSIGNED NOT NULL,
  `Email` varchar(45) DEFAULT NULL,
  `Pass` varchar(60) DEFAULT NULL,
  `Name` varchar(20) DEFAULT NULL,
  `Accepted` tinyint(1) UNSIGNED DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`ID_User`, `Email`, `Pass`, `Name`, `Accepted`) VALUES
(12, 'test@gmail.com', '$2y$10$gOu2l4PCRz4mw5MD.5Lm7uck2T1HMidB8MxhTlitOSdxBYaY887A6', 'Test', 0),
(13, 'mateuszczajka99@interia.pl', '$2y$10$CtQU8bsTXeXdtCE1jQ4UUeTu3IcwJBDwieVV0aXlf6c5xugCYrIKq', 'Mateusz Czajka', 0),
(14, 'mateusz@mail.com', '$2y$10$Sb0gGNtdMJ7rqIboUeL5V.nJXKKQVEGtrlBmhUmqa7/SgrYW6EPVy', 'Mateusz', 0);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `escape_rooms`
--
ALTER TABLE `escape_rooms`
  ADD PRIMARY KEY (`ID_Escape_Room`);

--
-- Indeksy dla tabeli `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`ID_Message`),
  ADD KEY `ID_User` (`ID_User`);

--
-- Indeksy dla tabeli `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`ID_Reservation`),
  ADD KEY `ID_User` (`ID_User`,`ID_Escape_Room`),
  ADD KEY `ID_Escape_Room` (`ID_Escape_Room`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID_User`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `escape_rooms`
--
ALTER TABLE `escape_rooms`
  MODIFY `ID_Escape_Room` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `messages`
--
ALTER TABLE `messages`
  MODIFY `ID_Message` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `reservations`
--
ALTER TABLE `reservations`
  MODIFY `ID_Reservation` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `ID_User` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`ID_User`) REFERENCES `users` (`ID_User`);

--
-- Ograniczenia dla tabeli `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`ID_User`) REFERENCES `users` (`ID_User`),
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`ID_Escape_Room`) REFERENCES `escape_rooms` (`ID_Escape_Room`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
