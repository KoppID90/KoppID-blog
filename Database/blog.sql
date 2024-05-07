-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2024. Máj 07. 21:30
-- Kiszolgáló verziója: 10.4.32-MariaDB
-- PHP verzió: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `blog`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `author`
--

CREATE TABLE `author` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `author`
--

INSERT INTO `author` (`id`, `name`, `status`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Varga Károly', 'active', 'vargakaresz@gmail.com', '7ded0844961f4342e5923b1333fd8511e7db12c93ec9d057cd84348b23dabdf7357c8e5337d8912602f9bed4e7dd53b3105f477b6c3fc02db5fc6e04679780ab', '2024-05-03 22:10:37', '2024-05-03 22:10:37'),
(2, 'Kovács Ádám', 'active', 'kovacsadam@gmail.com', '806eaba1a903add62e7516c13c40b5d320feadc255d68fa01dcce6372a81e392794fd64a299b21b733247e71a324875d70b9664981fa1fb7342f580e950f70a8', '2024-05-03 22:08:30', '2024-05-03 22:08:30'),
(3, 'Horváth Eszter', 'active', 'eszter.horvath@gmail.com', '859e412466ce543e5020855f31df761eda18cdfe3ce2fe0cc708286f32ed6c8d9f6ca30dcdeb7c0f8f04af7b7991826f3ecb1b448180b08a312568d9720e1f21', '2024-05-03 22:09:40', '2024-05-03 22:09:40'),
(4, 'Szabó Tamás ', 'active', 'szabotomi@gmail.com', 'b68c52f189fc5d1688f9c11864b24d4c55fac7923a562825cbc653ceeca858cddd7a0524e9e0c2fa3b31d89f873845a40d89f4aa01132410ca4168f3bfba749b', '2024-05-03 22:10:09', '2024-05-03 22:10:09');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `original_name` text NOT NULL,
  `extension` varchar(5) NOT NULL,
  `size` int(11) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `images`
--

INSERT INTO `images` (`id`, `name`, `original_name`, `extension`, `size`, `created_at`) VALUES
(34, 'ba311885122df555496024d3841f8bf5-a09b7306066255140ecf11f716ad023f', 'ciprus', 'jpg', 368085, '2024-05-03 22:19:20'),
(35, 'd7868a0964bee6ef03f3a4aff9215f77-e42d413fc1d07cfdfb3000124ff0cdcf', 'sicily', 'jpg', 669933, '2024-05-03 22:39:38'),
(37, 'd45c240d5626f2c7973f51a4fd843243-de885b03beef1529929c5148226546f6', 'kanari', 'jpg', 872062, '2024-05-03 22:45:29'),
(40, '06b7cd56cb4d29c3146c48d8d56a5bb0-9adccb91ac648984dbb28cf3e0a58bdc', 'svajc', 'jpg', 502061, '2024-05-04 17:10:18'),
(49, 'e414e15ea5dcc6b57155b705d00855c4-78e0361d66a672dda1d0ed6902a9221b', 'athen', 'jpg', 554300, '2024-05-07 21:11:56');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `published_at` date NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `post`
--

INSERT INTO `post` (`id`, `author_id`, `image_id`, `title`, `content`, `published_at`, `created_at`, `updated_at`) VALUES
(33, 1, 34, 'Ciprusi Kalandok: Egy Mediterrán Gyöngyszem Felfedezése', 'Ciprus egy érdekes keveréke a kultúrának, már csak fekvése miatt is. Politika földrajzilag Európához tartozik, de igen közel van Afrikához és Ázsiához is, így inkább Keletnek tekinthető. Ugyan török és görög fennhatóság alá tartozik, de ez a kis sziget megteremtette a saját önállóságát és karakterét.\r\n\r\nMindegy, hogy úgy ismeri, hogy a „bűnök szigete” vagy a szórakozás szigete, köszönhető az Agia Napáról elterjedt történeteknek, az ország fele belépett az Európai Unióba, és amit a turisták imádnak: ez Afrodité szigete és szülőhelye. Ciprus egyszerre  fogadja el és utasítja el a sztereotípiát. Egyik részét fejlesztik erősen, amiről megoszlanak a vélemények, attól függően kivel beszélgetünk, vagy „eladták az ország lelkét” vagy „elhozzák az országnak a gazdagságot”. Mindegy, hogy mi az igazság, mert amikor belépünk a turistaközpontokba, mint például Paphos, Limasol vagy Agia Napa, úgy érezzük, mintha magába a napos, forró Essexbe léptünk volna be, ahol vörösre égett angolok engedik el magukat egy jéghideg sör társaságában.\r\n\r\nÁm ha a kíváncsiságunk kivezet minket a városból, felfedezhetjük az Akamas- félsziget kis falvait vagy a mennyei aranyszínű tengerpartokat a Karias-félszigeten. Sétáljunk a csodálatos Troödos, Kyrenia vagy az Északi-parton és szippantsuk be mélyen a citrusfélék illatát Morfun, vagy másszunk fel egy középkori várba és élvezzük a szigetekre való kilátást onnan. Egy kényelmes cipővel, naptejjel és fürdőruhával a táskánkban olyan utunk lehet, amelyre még évekig emlékezni fogunk.', '2024-05-03', '2024-05-03 22:19:20', NULL),
(34, 2, 35, 'Varázslatos Szicília: Kulináris Élmények és Történelmi Csodák Szigete', 'Szicília nemcsak Olaszország, de a Földközi-tenger legnagyobb szigete is. Ráadásul a szigeten található Európa leghatalmasabb vulkánja az Etna. Mindezek mellett, ami szerintem mindenkinek eszébe jut a sziget kapcsán az a maffia. S bár a szicíliai maffia továbbra is létezik, félni nincs okuk a szigetre látogatóknak. Ahogy attól sem, hogy nem látunk szép és érdekes látnivalókat a szigeten.\r\n\r\nMár év elején elkezdtem szervezni a szicíliai utunkat, ugyanis most kivételesen nemcsak hárman, hanem hatan utaztunk. Emiatt volt több akadály is, de végül szerintem jól megoldottam mindent. Annak ellenére is, hogy épp akkor utaztunk, amikor a nagy reptéri bajok már javában megvoltak. Nekünk még szerencsénk is volt, mert odaútra \"csak\" félórás, visszaútra kétórás késéssel érkeztünk meg. Bár Budapesten a repülőgépen ülve egy pillanatra lefőttünk, mikor a pilóta bejelentette, hogy lekéstük az indulást, így 1,5 óra múlva tudunk újra felszállni. Végül nem kellett órákat kisgyerekekkel a gépen várakozni, úgy 30 perccel a tervezett indulás után felszálltunk és még a transzfer is megvárt minket a cataniai reptéren. Igaz angolul nem tudott a sofőr, de kedvesen kommunikált velünk olaszul. Egy óra alatt érkeztünk meg az első szállásunkhoz, ami Giardini Naxos településén volt. Ekkor már majdnem este 11 óra volt, de a gyerekek még jól bírták a kiképzést és a szállásadó is időben megérkezett, hogy átadja a lenyűgöző panorámával és hatalmas terasszal rendelkező lakást. Salvatore, a szállásadó jól és érthetően beszélt angolul, így mindent meg tudtam tőle kérdezni, amit akartam - a programok, illetve látnivalók terén is. A lakás szépen felújított és remek helyen van az üdülővárosban.', '2024-05-03', '2024-05-03 22:39:38', NULL),
(36, 3, 37, 'Tűz és Víz Szigete: Lanzarote Rejtett Kincsei', 'Lanzarote a Kanári-szigetek 4. legnagyobb szigete és a legkeletibb. A sziget hossza 60 km, szélessége 12 km, partvonala 213 km. Ebből strandolásra alkalmas kb. 16,5 km (homokos 10 km), a többi sziklás.\r\n\r\nA sziget vulkáni eredetű, és lenyűgöző természeti szépségeket tartogat. Az UNESCO 1993-ban bioszféra rezervátumnak nevezte ki. Itt úgy érezhetjük magunkat, mintha egy másik bolygón járnánk. Sokan Holdbéli és Mars-i tájnak is nevezik.\r\n\r\nLanzarotét nem a tömegturizmus jellemzi, sokkal kevesebben érkeznek ide, mint Tenerifére vagy Gran Canáriára, ezért a nyugodt pihenést kedvelőknek és a természet szeretőknek ajánljuk.\r\n\r\nA Timanfaya Nemzeti Parkot mindenképpen érdemes meglátogatni. A teljes terület vulkáni talajon terül el. A tűzhegyek az 1730-as években alakultak ki, amikor is a legaktívabb vulkántevékenység volt itt. Egyszerre mintegy 100 vulkán tört ki.\r\n\r\nLanzarote fővárosa Arrecife, amely jelentős kikötőváros is, itt nagyobb tengerjáró hajókat is látni. A sziget legnagyobb és legnépszerűbb üdülőhelye Puerto del Carmen. 5 km-es gyönyörű aranyhomokos tengerpart várja az ide utazókat.\r\n\r\nTovábbi jelentős üdülőhelyei Playa Blanca és Costa Teguise. Playa Blanca csendesebb, a nyugodtabb pihenésre vágyók válasszák. Ez a sziget legdélebbi üdülőhelye. Fehérhomokos strandja kék zászlós minősítéssel rendelkezik. Costa Tegise a sziget középső tengerparti részén helyezkedik el, emiatt jó kiindulópont a sziget felfedezéséhez. Itt is fehérhomokos tengerpartokat találhatunk.', '2024-05-03', '2024-05-03 22:45:29', NULL),
(40, 4, 40, 'Svájc Varázsa: A Csodálatos Alpesi Táj Megkapó Szépségei', 'Európa szívében, monumentális hegyvonulatok bűvöletében fekszik a kantonokra osztott Svájci Államszövetség. A szabályok oltalmába bújt országban tetten érhető a múlt értékeinek és a jelen kincseinek megóvása, melyhez politikai semlegesség, szárnyaló gazdaság és jólét társul. Ez az a hely, ahol tökéletes biztonságban csodálkozhatunk rá a természet erőire, a hegyvidékes táj szépségeire és a világháborúk szörnyűségeitől megmenekült klasszikus svájci városok egyediségére.\r\n\r\nEbben a lenyűgöző országban bármerre is induljunk, mindenhol káprázatos látnivalókba botlunk, csupán a különböző régiók eltérő nyelvhasználata tudatja velünk, mely területre is érkeztünk. Svájc nyugati felén, Genf környékén francia szót hallhatunk, délen a képeslapra illő szépséggel bíró Lugano közelében olaszt, délkeleten rétorománt, míg északon és az ország középső tájain a német nyelvet és annak különféle változatait használják. Az alábbiakban ez utóbbi térség leggyönyörűbb helyeit mutatom be, melyek garantáltan utazásra csábítanak!', '2024-05-04', '2024-05-04 17:10:18', NULL),
(49, 3, 49, 'Élő Történelem: Athén Kultúrája és Öröksége', 'Athén talán nem tartozik a legnépszerűbb és leglátogatottabb európai fővárosok közé, nyilván vannak olyan városok, melyek átfogóbb, komplexebb, sűrűbb és sokrétűbb élményt tudnak nyújtani, de ha a történelem nyomában járunk, akkor mindenképp itt kell kezdenünk utazásunkat, térben és időben egyaránt, hiszen Athén az európai kultúra bölcsője. \r\n\r\nItt alakult ki az első európai fejlett civilizáció, melyből kifejlődött az egész nyugati világ szellemisége, kultúrája és tudománya. Az ókori görög civilizáció olyan világszerte elterjedt és máig gyakorolt kulturális és társadalmi dolgokat adott a világnak, mint amilyen a színház intézménye, az olimpiai játékok vagy a demokrácia. Az alapműveltséghez tartozik, hogy legalább nagyvonalakban ismerjük az ógörög kultúrát, hiszen itt kezdődött minden. Innen indult az összes alaptudományág, mint amilyen a matematika, a fizika vagy az orvostan. Itt hozták létre a színházat, vele együtt a drámai műnemet és annak két alapvető műfaját, a tragédiát és a komédiát, valamint itt alakultak ki egyéb alapvető irodalmi műfajok is. Az ókori görög tudósok és filozófusok briliáns, korukat meghaladó megfigyeléseik, kísérleteik, tanaik és gondolataik mindmáig alapvetésnek számítanak szinte minden tudományágban. A görög mitológia pedig egy közkedvelt és kimeríthetetlen témakör, mely már számos művészt, festőt, szobrászt, írót, költőt, filmrendezőt és sorozatkészítőt megihletett. A később kialakult Római Birodalom ugyan sokkal hatalmasabb és befolyásosabb lett, mint előtte az ókori Görögország volt, de a rómaiak is mindent a görögöktől vettek át, a társadalmi rendszerüket, a művészetüket, a színházukat, az építészetüket, a politeizmusukat, majd mindezt a saját képükre formálták, és fejlesztették.', '2024-05-07', '2024-05-07 21:11:56', NULL);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `author`
--
ALTER TABLE `author`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT a táblához `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT a táblához `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
