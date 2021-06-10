-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 
-- Generation Time: Jun 10, 2021 at 01:41 PM
-- Server version: 8.0.21
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `s112`
--

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `question_id` int NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer2` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer3` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `answer4` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_id`, `content`, `answer1`, `answer2`, `answer3`, `answer4`) VALUES
(1, 'Czy chciałbyś pewnego dnia założyć rodzinę?', 'Zdecydowanie tak', 'Raczej tak', 'Raczej nie', 'Zdecydowanie nie'),
(2, 'Czy jesteś osobą religijną?', 'Zdecydowanie tak', 'Raczej tak', 'Raczej nie', 'Zdecydowanie nie'),
(3, 'Czy kiedykolwiek rozważyłbyś otwarte małżeństwo? To znaczy\r\ntakie, w którym możecie sypiać z innymi ludźmi?', 'Zdecydowanie tak', 'Raczej tak', 'Raczej nie', 'Zdecydowanie nie'),
(4, 'Czy gdyby Twój partner chciał nazwać Wasze pierwsze dziecko imieniem\r\njakiejś osoby, która dla niego ważna, ale Ty uważałbyś/uważałabyś to imię\r\nza okropne czy wciąć zgodziłbyś/zgodziłabyś się na takie imię?', 'Zdecydowanie tak', 'Raczej tak', 'Raczej nie', 'Zdecydowanie nie'),
(5, 'Czy uważasz, że większość kłótni jest spowadowana tym, że ludzie nie\r\nmyślą logicznie?', 'Zdecydowanie tak', 'Raczej tak', 'Raczej nie', 'Zdecydowanie nie'),
(6, 'Czy byłbyś gotów zaryzykować własne życie, aby protestować przeciwko\r\nnieprawiedliwym, totalitarnym rządom?', 'Zdecydowanie tak', 'Raczej tak', 'Raczej nie', 'Zdecydowanie nie'),
(7, 'Czy uważasz, że ogólnie kapitalizm uczynił świat lepszym miejscem?', 'Zdecydowanie tak', 'Raczej tak', 'Raczej nie', 'Zdecydowanie nie'),
(8, 'Jak bardzo dbasz o porządek w swoim mieszkaniu/pokoju?', 'Zawsze mam idealny porządek', 'Czasami zdarza mi się nie myśleć o sprzątaniu przez jakiś czas', 'Jestem raczej bałaganiarzem', 'Jestem totalnym bałaganiarzem, zupełnie nie dbam o porządek\r\nw mieszkaniu/pokoju'),
(9, 'Jesteś weganinem lub wegetarianinem?', 'Tak', 'Nie', NULL, NULL),
(10, 'Czy uważasz, że homoseksualizm jest grzechem lub jest niemoralny?', 'Zdecydowanie tak', 'Raczej tak', 'Raczej nie', 'Zdecydowanie nie'),
(11, 'Jak często myjesz zęby?', 'Po każdym posiłku lub częściej', 'Dwa razy dziennie', 'Raz dziennie', 'Rzadziej niż raz dziennie'),
(12, 'Jak bardzo chętny byłbyś, aby spotkać na żywo osobę poznaną\r\nna LoveOnClick?', 'Bardzo chętny, nie miałbym nic przeciwko temu', 'Raczej chętny', 'Raczej sceptyczny, najpierw chciałbym lepiej poznać tę osobę', 'Zupełnie niechętny, nie zakładam takiej możliwości'),
(13, 'Czy dotrzymujesz swoich obietnic?', 'Tak, zawsze', 'Raczej tak, w miarę możliwości', 'Nie, nie przywiązuję do tego większej wagi', NULL),
(14, 'Czy palnie papierosów cię obrzydza?', 'Zdecydowanie tak', 'Raczej tak', 'Raczej nie', 'Zdecydowanie nie'),
(15, 'Czy klaskasz w dłonie gdy samolot ląduje?', 'Tak', 'Nie', NULL, NULL),
(16, 'Czy uważasz, że w Polsce jest potrzeba bardziej restrykcyjnego dostępu do broni?', 'Tak', 'Nie', NULL, NULL),
(17, 'Czy mógłbyś spotykać się z kimś kto nie wierzy w działanie szczepionek?', 'Tak', 'Cholera, nie ma opcji', NULL, NULL),
(18, 'Czy przejmujesz się zmianami klimatu?', 'Tak', 'Raczej tak', 'Nie', 'Raczej nie'),
(19, 'Czy uważasz siebie za aktywistę?', 'Tak', 'Nie', NULL, NULL),
(20, 'Czy względy rodzinne są dla ciebie ważne podczas poszukiwania nowej pracy?', 'Oczywiście, jak najbardziej!', 'Niekoniecznie', NULL, NULL),
(21, 'Czy mógłbyś spotykać się z kimś kto pali e-papierosy?', 'Tak', 'Nie', NULL, NULL),
(22, 'Jak czujesz się kiedy twoi znajomi dzielą się swoim związkiem na mediach społecznościowych?', 'Cieszę się ich szczęściem', 'Szczerze to jestem trochę zazdrosny', 'Zupełnie nie zwracam na to uwagi', NULL),
(23, 'Co myślisz o rozmawiania o polityce ze swoją rodziną?', 'To ważna kwestia', 'O nie, wszystko tylko nie to', '', NULL),
(24, 'Seks pod prysznicem?', 'Jak najbardziej', 'Nie, dzięki', '', NULL),
(25, 'Czy pizza znajduje się na liście twoich 5 ulubionych dań?', 'O yeah..', 'Nope', '', NULL),
(26, 'O co \'pierwsze\' jesteś najbardziej podekscytowany po pandemii?', 'Pierwsza randka', 'Pierwszy pocałunek', 'Pierwsze spotkanie z przyjaciółmi/rodziną', NULL),
(27, 'Czy mógłbyś spotykać się z kimś kto nie głosuje w wyborach państwowych?', 'Tak, jak najbardziej', 'Raczej nie', NULL, NULL),
(28, 'Czy odwołałbyś randkę z kimś kto nie chciał zaszczepić się przeciwko COVID-19?', 'Tak', 'Nie', NULL, NULL),
(29, 'Czy jest dla Ciebie istotne, aby twój partner / twoja partnerka podzielali twoje poglądy polityczne?', 'Tak', 'Nie', NULL, NULL),
(30, 'Seks w miejscu publiczny?', 'Jak najbardziej', 'Nie, dzięki', NULL, NULL),
(31, 'Seks przed kamerą?', 'Jak najbardziej', 'Nie, dzięki', NULL, NULL),
(32, 'Czy zdecydowałbyś / zdecydowałabyś się na zbliżenie seksualne z dwoma osobami na raz, tak zwany \'trójkącik\'?', 'Jak najbardziej', 'Nie, dzięki', NULL, NULL),
(33, 'Wolne media są dla mnie sprawą..', 'bardzo ważną', 'całkiem ważną', 'raczej mało ważną', NULL),
(34, 'Czy odpowiadasz na maile zawodowe w weekend?', 'Tak, zawsze odpowiadam na maile w przeciągu kilku godzin', 'Staram się, różnie wychodzi', 'Nie, weekend to czas dla mnie oraz moich najbliższych', NULL),
(35, 'Czy brałeś kiedyś udział w proteście?', 'Tak', 'Nie', '', NULL),
(36, 'Jak czułbyś się gdyby Twój partner zarabiał więcej od Ciebie?', 'Zazdrosny', 'Obojętny', 'Szczęśliwy', 'Wściekły'),
(37, 'Co sądzisz na temat wspólnego konta bankowego w poważnych związku?', 'Wolę posiadać osobne konto', 'Wolę posiadać współdzielone konto', '', ''),
(38, 'Czy lubisz używać zabawek seksualnych ze swoim partnerem?', 'Tak', 'Nie', '', ''),
(39, 'Czy zamieszkałbyś / zamieszkałabyś ze swoim partnerem przed ślubem?', 'Tak', 'Tylko jeśli bylibyśmy zaręczeni', 'Nie', NULL),
(40, 'Czy na pierwsze spotkanie wolałbyś / wolałabyś spotkanie grupowe czy randkę jeden na jeden?', 'Spotkanie grupowe, wtedy nie ma takiej presji', 'Jeden na jeden, wolę lepiej poznać drugą osobę', NULL, NULL),
(41, 'Czy oszczędzasz aktualnie pieniądze, żeby kupić nowy dom lub samochód?', 'Tak', 'Nie', NULL, NULL),
(42, 'Seks w samochodzie?', 'Jak najbardziej', 'Nie, dzięki', NULL, NULL),
(43, 'Seks w lesie?', 'Jak najbardziej', 'Nie, dzięki', NULL, NULL),
(44, 'Kiedy miał miejsce Twój ostatni stosunek seksulany?', 'Kilka dni temu', 'W ciągu ostatnich dwóch miesięcy?', 'W ciągu ostatniego roku', 'Ponad roku temu'),
(45, 'Czy zaakceptowałbyś / zaakceptowałabyś fantazję erotyczną swojego partnera nawet gdyby Tobie nie przypadła ona do gustu?', 'Tak', 'Raczej tak', 'Raczej nie', 'Zdecydowanie nie');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `firstname` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `lastname` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `birth_date` date NOT NULL,
  `province` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `sex` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `email`, `password`, `birth_date`, `province`, `sex`, `description`) VALUES
(4, 'Klaudia', 'Malinowska', 'mailna@smp.com', '$2y$10$rYAqD1AjVuB8jsSeMT.jMeGiTBwhiYfq17Ekq1uyfuyW478Jkxa.S', '2001-02-14', 'lubuskie', 'kobieta', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'),
(7, 'Simon', 'Simonovsky', 'sample@smp.com', '$2y$10$wJkSLzdaB/Q2fAWlA.e35OKugBuN0Ah4ujdYH7gC8qzn7G49gLGL6', '2001-10-16', 'lodzkie', 'mężczyzna', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer lobortis justo non orci euismod, ut porta nisi auctor. Nunc eget rutrum justo. Curabitur viverra arcu vel turpis posuere cursus.'),
(11, 'Maciej', 'Boczek', 'boczek@smp.pl', '$2y$10$nfFG8FkKZh0uQNYsa.JJDumqSnanFV6v.p3PEmR5fCE.PBxgGuZG.', '1997-02-04', 'lubelskie', 'mężczyzna', 'Opowiedz coś o sobie'),
(12, 'Kamil', 'Smalec', 'smalec@smp.com', '$2y$10$/vQ3gm6ZImAP1vMvisPt8eHAey0JSLbrso3Lh4T44W2B0MwlQ6qYe', '1999-06-14', 'lubuskie', 'mężczyzna', 'Opowiedz coś o sobie'),
(14, 'Marcin', 'Marcinowski', 'marcinowski@smp.com', '$2y$10$gw4cm4N0ALmAoCDQz.vIGuOI3YSu4/BzvpX/0YiTifB.W0n/W1gFm', '2002-05-21', 'warminsko-mazurskie', 'mężczyzna', 'orem ipsum dolor sit amet, consectetur adipiscing elit. Donec non bibendum orci. Mauris pellentesque tincidunt mattis. Cras lobortis metus ut velit ullamcorper malesuada. Nunc mauris massa, porttitor vitae lacus a, lobortis imperdiet felis.'),
(15, 'Otto', 'Normalverbraucher', 'otto@smp.com', '$2y$10$1pwtyafr5Q9WvO/q2k5wb.BB/65zBmLPwPrkOOB1.Q.5q/XgGvr0u', '2005-06-03', 'pomorskie', 'mężczyzna', 'Opowiedz coś o sobie'),
(16, 'Daniel', 'Lolek', 'dsadasd@gmail.com', '$2y$10$u3IXLwjgTtFZo9rcZhmPqebPVtVDCEf.k5shnHuSIDrYqTrL7edEO', '1997-06-05', 'warminsko-mazurskie', 'mężczyzna', 'Witam w mojej kuchni'),
(17, 'kuku', 'ryku', 'qwert@gmail.com', '$2y$10$FEPePFIJHIhcoOWq4cK.GOsETSOs7W5X7xtyta8CdAXCzLctBV/ZK', '2000-06-01', 'lodzkie', 'kobieta', 'Opowiedz coś o sobiesadsadsadsadsajhokasdksahdlksajdlksajdlk;sajdlksajdlkasjdlkasjdlkasjdlkasjdlkasjdlkasjdlkasjdlkasjdlkasjdlkasjdlkasjdlkasjldkjaslkdjlkasjdlkasjdlkasjdlkasjdlkasjdlkjaskldjaksljdklasjdlkasjdlkasjdlkasjdlkasjdlksajdlkasjdklasjdlkasjdlkasjdlkasjlkdjaslkdjlkasjdlkasjdlkas'),
(18, 'Lee', 'Baran', 'qwerty@gmail.com', '$2y$10$9oC6C8QLuf0teJMN/vI6he9xa/J2LxKkPe.Z1ju5e5wK.6bnZd1Su', '1992-04-30', 'zachodniopomorskie', 'mężczyzna', 'Opowiedz coś o sobie'),
(19, 'Mateusz', 'Kociuba', 'kociuba@smp.com', '$2y$10$y4xGEYLrkPySkhokBmQAbu4IJ..JZZOO3AqW2sa0RMSfNyNta4Kku', '1999-06-05', 'malopolskie', 'mężczyzna', 'Jo jest kociba'),
(20, 'Waldermar', 'Kiepski', 'waldek@polsat.com', '$2y$10$1fAsswu3P8BbQUC4xeTIZOmLXjocLz6Kqz1xYMyKOS2XSXiOZUK.6', '1997-06-26', 'lubuskie', 'mężczyzna', 'Hej, jestem Waldek ze Świata Według Kiepskich'),
(21, 'Jasiu', 'Czech', 'czechumennakompie@gmail.com', '$2y$10$KfPcbFgZAAGOf6.Wux4ju.DW63CWcaioQmuzeHkcKqpSp4RhApw2W', '9999-09-09', 'slaskie', 'mężczyzna', 'Hej'),
(22, 'Marianna', 'Kubsik', 'makapaka@wp.pl', '$2y$10$hk7wj2aO/nDd1TI9TrzVLeKAxILVofHfXtJNjIFBmx2PKyVJxBlL2', '2021-09-21', 'malopolskie', 'mężczyzna', 'cześć jestem Maka i lubie grać w lige i cska i pizzke jesc tesz lubię'),
(23, 'Wikta', 'Kwak', 'dupa@dupa.pl', '$2y$10$z3L7DHRp2YdRSAcr1iypGuWCtINidpzRbbUZ4EYRtDrZjcNLU54by', '2000-11-21', 'zachodniopomorskie', 'kobieta', 'lubie konie kaczki i ziolo'),
(24, 'SzymonKoks', 'Dziekan', 'dziekanAGH@student.agh.edu.pl', '$2y$10$bBq65osYieU.tIrFQMBPo.E7vmg226evT/s85ywFXN8EishtHQByq', '2000-01-27', 'slaskie', 'mężczyzna', 'skladam lego nie lubie pilki noznej i motorow narty lubie i piwo \r\nmam p1 na eastcie'),
(25, 'Małcin', 'Bendarz', 'lubie@ciebie.pl', '$2y$10$Fusa3q54MLZIa3bSkQZoBuWxasQXL2T93qCNlj9uFB8LrrAxFmoMO', '2001-02-22', 'malopolskie', 'mężczyzna', 'Lubie grac w lola'),
(26, 'Maks', 'Kowaleuro', 'babaHassan@gmail.com', '$2y$10$TahMYccDUGxV7fOnAM.opOD3MjFAEVnpHBC9.WclMJ1us8pjrD.3C', '2000-09-23', 'malopolskie', 'mężczyzna', 'Potrafię aktywować pewne specyficzne czujniki. A i jestem gejem elo'),
(27, 'Andrzej', 'Jajszczyk', 'ajajo@gmail.com', '$2y$10$d0GC9CaVVZq/Sw/2W4WJQeh9AovklfOHIcxcP7DfLnGUzOsbshDUy', '1997-07-07', 'mazowieckie', 'mężczyzna', 'sadfadsfasdf'),
(28, 'Bartosh', 'Barny', 'dziekanwietu@siema.pl', '$2y$10$r7WI1v/8HMMCyHYKaVo57u1g9SMY59GWYWHC4N9CdtBDF4rXBztHW', '0001-12-22', 'malopolskie', 'Nie ujawniono', 'Teleinformatyk 12 zb'),
(29, 'Maryla', 'Marylowska', 'maryla@smp.com', '$2y$10$boJoVnm8e9wOSX883xArtubyRVizhWuIupfCHwCQ7K7KCZIL7zWr2', '2000-02-15', 'warminsko-mazurskie', 'kobieta', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ut aliquam leo. Suspendisse non ante sit amet tortor interdum sollicitudin nec in tellus. Fusce cursus et velit ac feugiat. Pellentesque mollis sapien id mi tincidunt, quis vestibulum enim volutpat. Integer eu erat quis diam scelerisque scelerisque.'),
(30, 'szymon', 'bobrowski', 'sz@o.pl', '$2y$10$tXhqWPKhWPpyd12pMiSmGO887qu5eXn/5DRWMhIB9jI5Y1lCcxQOq', '1232-12-12', 'lubuskie', 'mężczyzna', 'asdasdasd'),
(31, 'Jan', 'Kowalski', 'janek@wp.pl', '$2y$10$anldpfozy.5xhJZtyZjUY.HFK6EfnWf1JH1EvZHhK.XLzsRcuhPtm', '1997-10-09', 'mazowieckie', 'Nie ujawniono', 'pozdrawiam wszystkich cieplutko <3'),
(32, 'sf', 'sf', 'sf@op.pl', '$2y$10$q8YygVXHfJ.yZLwyEf3YKuGtzwYxcld4qoHrjw5vzQTY/.DVSFWmu', '2021-06-24', 'zachodniopomorskie', 'mężczyzna', 'Opowiedz coś o sobsie'),
(33, 'Koyki', 'Kotki', 'kotki@kotki.com', '$2y$10$Wvh4QwQkHQUYZF6t2RecQewvHmzZiJlnqBJ8h3dv2dr1aV/Dup6ze', '2000-07-10', 'malopolskie', 'kobieta', 'Lubię kotki'),
(34, 'sadasd', 'asdasdasd', 'qwe@gmail.com', '$2y$10$IgyJ4jUgqobUhsbxeTScKuGwK0DAvijazyYBO4OLE28dEjmFukyqa', '1994-04-26', 'warminsko-mazurskie', 'kobieta', 'Opowiedz coś o sobie'),
(35, 'Lolllll', 'Loelele', 'qwer@gmail.com', '$2y$10$HNtCI0UvcUlRedJExGSww.iElP0IJDGY4Jj8nt3Qmo5pCIHD1gCSO', '1966-06-01', 'podkarpackie', 'mężczyzna', 'Opowiedz coś o sobiessadasdas'),
(36, 'Dawid', 'lolek', 'qaz@gmail.com', '$2y$10$MEL1G/RrhMmCXvqKrc4WqOadBYLskW6RpMtQxSWSXOXBE7EEUQa7W', '1986-06-10', 'warminsko-mazurskie', 'kobieta', 'Opowiedz coś o sobiesadasda'),
(37, 'poiu', 'asdasd', 'poiu@gmail.com', '$2y$10$x4quWecp4sIzhzObovh0.uluz6rbGCprOVLzr/2KLJYbHDTQiTHF6', '2001-02-01', 'dolnoslaskie', 'kobieta', 'Opowiedz coś o sobiesadasdasd'),
(38, 'lololol', 'sadsadasd', 'lkjh@gmail.com', '$2y$10$6TdeY3m1tTj0RAWUIRllQeijPfJ9VglV1n/e554IBYzsktlSVf5zS', '2000-02-01', 'warminsko-mazurskie', 'mężczyzna', 'Opowiedz coś o sobiesdaasdasdasd'),
(39, 'qweqweqwe', 'qweqweq', 'lol@gmail.com', '$2y$10$7F87Elg/DTqTB7u/qu7RrOSx//6.ZKHyC4IudoNnZZ6ijB4DinbRG', '0003-03-02', 'warminsko-mazurskie', 'mężczyzna', 'Opowiedz coś o sobiedsaasdas'),
(40, 'asdasd', 'asdasd', 'asdasdas@gmail.com', '$2y$10$jA.m/imNiPGnRngGhvpWauwSuqSoeve0N9N8Nbj8xiUcHwD/IzvPC', '0004-03-02', 'swietokrzyskie', 'kobieta', 'Opowiedz coś o sobiesadasd'),
(41, 'wqeqwe', 'qweqweq', 'loll@gmail.com', '$2y$10$z7XORUYtizLy77P57yXW3uwXfvVTBOIr2ybB.VXvtxB5708e.CJgO', '0324-04-02', 'warminsko-mazurskie', 'mężczyzna', 'Opowiedz coś o sobiesadasdasd'),
(42, 'Tesla', 'Tesla', 'test@smp.com', '$2y$10$zJww.6al4Ts2yMwObaquo.QRgV29/Nq/3hcwKMrX7DqzhH6dFRw9u', '2017-07-05', 'slaskie', 'mężczyzna', 'Opowiedz coś o sobie'),
(43, 'Looool', 'Loool', 'krak@gmail.com', '$2y$10$fDvY.RiKxErpm6nLWEmCIuRRGUNgka1iBnumgrh/FmnXVcfmZMraq', '0004-03-02', 'wielkopolskie', 'mężczyzna', 'Opowiedz coś o sobiesadasda'),
(44, 'sadasd', 'asdasd', 'lololo@gmail.com', '$2y$10$v5bPAfNiTcbQ4eiTGzZF5OZwCXBBgxAIQBXd5J09bHvlz6Mk/eCAi', '0003-02-02', 'slaskie', 'kobieta', 'Opowiedz coś o sobiesadasd'),
(45, 'sadasdasd', 'asdasd', 'lolol@gmail.com', '$2y$10$xuKU.8njTXso93wfMdxafubKrCERdQNP6Pig.hq7o2D3rqtw5igp.', '1997-03-02', 'warminsko-mazurskie', 'mężczyzna', 'Opowiedz coś o sobiedsaasd'),
(46, 'dsadas', 'asdasd', 'dsadas@gmail.com', '$2y$10$OpoOtKkH4c.VC5m8opt4XuaisJpTew60NWu62LDunhQ6fmiDRARKK', '3124-02-02', 'slaskie', 'mężczyzna', 'Opowiedz coś o ssdadsaobie'),
(47, 'Maciek', 'Maćkowski', 'maciek@smp.com', '$2y$10$KrHolaNXnHskoVIEmDjRUOEz5J2I5TtF9Qv5nksXw64ZBBDGfAmEK', '2010-02-03', 'kujawsko-pomorskie', 'mężczyzna', 'Opowiedz coś o sobiedsdas'),
(48, 'Kamil', 'Kamilowski', 'kamilowski@smp.com', '$2y$10$wBH3Cps.TSFe12LwSHOmxurIQQY7y0uOiEnldmk7iurOipqwzy9AC', '1997-03-27', 'warminsko-mazurskie', 'mężczyzna', 'Opowiedz coś o sobie'),
(49, 'Janina', 'Loel', 'janin@gmail.com', '$2y$10$1zVljNt0oyYXy5Cntt/nfOE2hlc6TaZfQUlLcNvkNq/Q2AqqZ9vfC', '0004-03-02', 'lubuskie', 'kobieta', 'wsadsadasdasdasdasdasdasd'),
(50, 'Jan', 'Kowalski', 'lolek@gmail.com', '$2y$10$b7Pfgc5/iJ/VUEbnZ4quTuoEnwdLFl9Er9i1tbAVM5z.0U4RGHGKS', '1997-07-23', 'warminsko-mazurskie', 'mężczyzna', 'Jestem studentem teleiformatyki');

-- --------------------------------------------------------

--
-- Table structure for table `user_answers`
--

CREATE TABLE `user_answers` (
  `answer_id` int NOT NULL,
  `user_id` int NOT NULL,
  `question_id` int NOT NULL,
  `own_answer` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `partner_desired_answer` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `question_importance` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_answers`
--

INSERT INTO `user_answers` (`answer_id`, `user_id`, `question_id`, `own_answer`, `partner_desired_answer`, `question_importance`) VALUES
(7, 5, 5, 'A', 'B', 8),
(8, 18, 8, 'A', 'A', 6),
(9, 18, 43, 'B', 'B', 6),
(10, 18, 40, 'A', 'A', 10),
(11, 18, 7, 'A', 'B', 10),
(12, 18, 28, 'A', 'A', 6),
(13, 18, 24, 'D', 'C', 1),
(14, 18, 38, 'A', 'B', 10),
(15, 18, 21, 'A', 'A', 6),
(16, 18, 39, 'D', 'C', 1),
(17, 18, 34, 'A', 'B', 10),
(18, 18, 26, 'A', 'A', 6),
(19, 18, 36, 'D', 'C', 1),
(20, 18, 27, 'A', 'C', 5),
(21, 18, 35, 'B', 'C', 8),
(22, 18, 41, 'B', 'D', 3),
(23, 18, 13, 'B', 'C', 9),
(24, 18, 15, 'A', 'C', 5),
(27, 18, 32, 'B', 'C', 9),
(28, 18, 42, 'A', 'B', 8),
(29, 18, 29, 'A', 'B', 4),
(30, 18, 17, 'D', 'D', 9),
(31, 18, 11, 'A', 'A', 9),
(32, 18, 22, 'D', 'B', 6),
(33, 18, 33, 'B', 'B', 3),
(34, 18, 20, 'A', 'B', 8),
(35, 18, 45, 'B', 'B', 3),
(36, 18, 31, 'B', 'B', 1),
(37, 18, 44, 'A', 'B', 10),
(38, 18, 4, 'A', 'B', 8),
(39, 18, 25, 'A', 'B', 4),
(79, 18, 10, 'D', 'D', 10),
(80, 18, 12, 'B', 'A', 1),
(83, 18, 23, 'A', 'A', 10),
(84, 18, 14, 'D', 'C', 1),
(85, 18, 37, 'A', 'A', 10),
(86, 18, 30, 'D', 'C', 1),
(87, 18, 3, 'A', 'A', 10),
(88, 18, 16, 'D', 'C', 1),
(90, 18, 9, 'D', 'D', 10),
(93, 18, 18, 'D', 'C', 10),
(94, 18, 19, 'A', 'A', 1),
(95, 29, 8, 'B', 'A', 6),
(96, 29, 26, 'B', 'C', 6),
(97, 29, 5, 'B', 'A', 6),
(98, 29, 43, 'A', 'B', 6),
(99, 29, 14, 'C', 'C', 6),
(100, 29, 33, 'B', 'A', 6),
(101, 29, 38, 'C', 'B', 6),
(102, 29, 32, 'A', 'A', 6),
(103, 29, 22, 'A', 'C', 6),
(104, 29, 45, 'C', 'B', 6),
(105, 29, 3, 'A', 'B', 10),
(106, 29, 27, 'B', 'B', 9),
(107, 29, 25, 'B', 'A', 2),
(108, 29, 19, 'B', 'A', 5),
(109, 29, 6, 'A', 'B', 4),
(110, 29, 28, 'A', 'A', 3),
(111, 29, 2, 'B', 'B', 8),
(112, 29, 1, 'B', 'A', 6),
(113, 29, 23, 'B', 'C', 4),
(114, 29, 16, 'A', 'B', 8),
(115, 29, 10, 'A', 'B', 6),
(116, 29, 20, 'A', 'A', 8),
(117, 29, 30, 'A', 'C', 2),
(118, 11, 20, 'A', 'B', 6),
(119, 11, 18, 'B', 'A', 6),
(120, 11, 21, 'A', 'A', 6),
(121, 11, 3, 'B', 'C', 2),
(122, 11, 23, 'B', 'C', 8),
(123, 11, 36, 'B', 'A', 4),
(124, 11, 43, 'A', 'B', 8),
(125, 11, 9, 'B', 'A', 6),
(126, 11, 17, 'A', 'A', 6),
(127, 11, 35, 'D', 'B', 3),
(128, 11, 14, 'B', 'A', 6),
(129, 11, 39, 'B', 'A', 4),
(130, 11, 41, 'B', 'A', 6),
(131, 11, 11, 'C', 'B', 6),
(132, 11, 40, 'B', 'C', 7),
(133, 11, 6, 'A', 'B', 6),
(134, 11, 7, 'A', 'B', 6),
(135, 11, 37, 'B', 'A', 6),
(136, 11, 1, 'C', 'B', 6),
(137, 11, 28, 'B', 'B', 5),
(138, 11, 32, 'A', 'B', 6),
(139, 11, 24, 'B', 'A', 6),
(140, 11, 8, 'A', 'A', 6),
(141, 11, 10, 'B', 'C', 6),
(142, 11, 13, 'A', 'B', 6),
(143, 11, 45, 'B', 'A', 6),
(144, 11, 33, 'B', 'A', 6),
(145, 11, 34, 'B', 'C', 6),
(146, 11, 26, 'C', 'B', 3),
(147, 11, 4, 'A', 'B', 4),
(148, 11, 12, 'A', 'B', 6),
(149, 11, 31, 'A', 'A', 6),
(150, 11, 15, 'A', 'B', 6),
(151, 11, 16, 'C', 'C', 6),
(152, 11, 38, 'C', 'C', 6),
(153, 11, 19, 'B', 'D', 6),
(154, 11, 5, 'C', 'B', 6),
(155, 11, 42, 'A', 'A', 6),
(156, 11, 27, 'B', 'B', 5),
(157, 11, 44, 'B', 'C', 6),
(158, 11, 30, 'A', 'B', 6),
(159, 11, 22, 'A', 'B', 6),
(160, 11, 2, 'C', 'B', 4),
(161, 11, 25, 'B', 'A', 3),
(162, 11, 29, 'A', 'B', 6),
(163, 29, 15, 'A', 'B', 2),
(164, 29, 29, 'B', 'A', 3),
(165, 29, 44, 'A', 'B', 7),
(166, 29, 42, 'C', 'B', 2),
(167, 29, 36, 'D', 'B', 2),
(168, 29, 37, 'B', 'A', 8),
(169, 29, 21, 'C', 'B', 3),
(170, 29, 18, 'B', 'A', 6),
(171, 29, 4, 'C', 'A', 9),
(172, 29, 13, 'A', 'B', 7),
(173, 29, 34, 'B', 'A', 2),
(174, 29, 7, 'B', 'D', 7),
(175, 29, 12, 'B', 'A', 5),
(176, 29, 9, 'A', 'C', 3),
(177, 29, 17, 'B', 'A', 8),
(178, 29, 41, 'B', 'B', 5),
(179, 29, 31, 'B', 'A', 7),
(180, 29, 24, 'A', 'C', 9),
(181, 20, 41, 'A', 'B', 8),
(182, 20, 29, 'C', 'A', 3),
(183, 20, 25, 'B', 'A', 7),
(184, 20, 13, 'C', 'B', 3),
(185, 20, 30, 'B', 'A', 2),
(186, 20, 35, 'A', 'C', 7),
(187, 20, 32, 'C', 'A', 6),
(188, 20, 40, 'C', 'A', 6),
(189, 20, 43, 'B', 'A', 8),
(190, 20, 15, 'A', 'A', 7),
(191, 31, 43, 'D', 'D', 6),
(192, 31, 5, 'B', 'B', 6),
(193, 31, 23, 'B', 'B', 6),
(194, 31, 10, 'A', 'A', 6),
(195, 31, 21, 'B', 'B', 6),
(196, 31, 11, 'A', 'A', 6),
(197, 31, 14, 'C', 'C', 6),
(198, 31, 13, 'D', 'D', 6),
(199, 31, 20, 'B', 'B', 6),
(200, 32, 15, 'B', 'A', 5),
(201, 32, 38, 'B', 'B', 7),
(202, 32, 18, 'A', 'A', 6),
(203, 32, 27, 'C', 'C', 7),
(204, 32, 6, 'A', 'A', 7),
(205, 32, 5, 'D', 'C', 9),
(206, 32, 35, 'C', 'C', 5),
(207, 32, 16, 'C', 'C', 8),
(208, 32, 9, 'B', 'B', 6),
(209, 32, 22, 'B', 'A', 8),
(210, 33, 28, 'C', 'C', 4),
(211, 33, 18, 'B', 'A', 8),
(212, 33, 40, 'B', 'B', 3),
(213, 33, 36, 'D', 'D', 10),
(214, 33, 23, 'B', 'B', 8),
(215, 33, 31, 'A', 'A', 7),
(216, 33, 11, 'A', 'C', 5),
(217, 33, 27, 'B', 'B', 6),
(218, 33, 7, 'B', 'B', 8),
(219, 33, 35, 'B', 'B', 10),
(220, 20, 34, 'A', 'C', 5),
(221, 20, 16, 'B', 'A', 2),
(222, 20, 21, 'B', 'B', 6),
(223, 20, 20, 'B', 'A', 6),
(224, 20, 10, 'A', 'B', 6),
(225, 20, 27, 'B', 'B', 6),
(226, 20, 5, 'A', 'A', 6),
(227, 20, 22, 'B', 'B', 6),
(228, 20, 8, 'B', 'B', 6),
(229, 20, 38, 'A', 'A', 6),
(230, 24, 5, 'D', 'D', 8),
(231, 24, 32, 'A', 'A', 3),
(232, 24, 19, 'A', 'A', 8),
(233, 24, 25, 'B', 'B', 2),
(234, 24, 28, 'C', 'C', 6),
(235, 24, 8, 'B', 'B', 6),
(236, 24, 39, 'A', 'A', 10),
(237, 49, 34, 'A', 'B', 5),
(238, 49, 7, 'B', 'B', 9),
(239, 49, 30, 'B', 'A', 9),
(240, 49, 28, 'B', 'B', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`(100));

--
-- Indexes for table `user_answers`
--
ALTER TABLE `user_answers`
  ADD PRIMARY KEY (`answer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `question_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `user_answers`
--
ALTER TABLE `user_answers`
  MODIFY `answer_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=241;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
