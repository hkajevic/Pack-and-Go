-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 06, 2021 at 05:04 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pack&go`
--

-- --------------------------------------------------------

--
-- Table structure for table `offer`
--

DROP TABLE IF EXISTS `offer`;
CREATE TABLE IF NOT EXISTS `offer` (
  `title` varchar(45) NOT NULL,
  `idOffer` int(11) NOT NULL,
  `phone` varchar(20) NOT NULL DEFAULT '0600298333',
  `price` int(11) NOT NULL,
  `location` varchar(100) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `transport` enum('Avion','Bez','Brod','Autobus') NOT NULL,
  `accomodation` enum('Nekategorizovan','1 zvezdica','2 zvezdice','3 zvezdice','4 zvezdice','5 zvezdica') NOT NULL,
  `category` enum('Planina','More','Selo','Grad') NOT NULL,
  `allinclusive` tinyint(4) NOT NULL,
  `insurance` tinyint(4) NOT NULL,
  `guide` tinyint(4) NOT NULL,
  `breakfast` tinyint(4) NOT NULL,
  `lunch` tinyint(4) NOT NULL,
  `dinner` tinyint(4) NOT NULL,
  `trips` tinyint(4) NOT NULL,
  `internet` tinyint(4) NOT NULL,
  `AC` tinyint(4) NOT NULL,
  `owner` int(11) NOT NULL,
  `status` enum('Odoborena','Na cekanju') NOT NULL,
  `published` datetime NOT NULL,
  `description` varchar(1000) NOT NULL,
  `pictures` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`idOffer`),
  KEY `id_owner` (`owner`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `offer`
--

INSERT INTO `offer` (`title`, `idOffer`, `phone`, `price`, `location`, `startDate`, `endDate`, `transport`, `accomodation`, `category`, `allinclusive`, `insurance`, `guide`, `breakfast`, `lunch`, `dinner`, `trips`, `internet`, `AC`, `owner`, `status`, `published`, `description`, `pictures`) VALUES
('Zlatibor - 5 dana', 1, '0600298333', 220, 'Zlatibor', '2021-06-01', '2021-06-05', 'Bez', '1 zvezdica', 'Planina', 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 'Odoborena', '2021-05-25 18:07:31', 'Planina Zlatibor – planina zlatnih borova, blago zaobljenih vrhova i visova, sa najvišim vrhom Tornikom 1496m, nalazi se u jugozapadnom delu Srbije, na oko 200km od Beograda. Prosečna nadmorska visina zlatiborskog područja iznosi oko 1000m i omogućava uživanje gostiju u blagotvornoj klimi i prirodnim lepotama.', 'http://localhost/offerpictures/1/zlatibor1.jpg;http://localhost/offerpictures/1/zlatibor2.jpg;http://localhost/offerpictures/1/zlatibor3.jpg'),
('Kopaonik vikend', 2, '0600298335', 305, 'Kopaonik', '2021-07-16', '2021-07-18', 'Bez', '4 zvezdice', 'Planina', 0, 0, 0, 0, 0, 0, 0, 0, 1, 3, 'Odoborena', '2021-05-24 18:56:04', 'Turistički centar Kopaonik aktivan je i van zimske sezone i predstavlja jednu od omiljenih destinacija za rekreaciju i odmor tokom toplijeg perioda godine. Uglavnom se uživa u aktivnostima kao što su šetnja, planinarenje,a u ponudi su i škole tenisa, košarke i jahanja. Brojni tereni vrhunskih kvaliteta dostupni su za sportske pripreme pa se tako i vi možete rekreirati na mestima gde se pripremaju srpski reprezentativci. ', 'http://localhost/offerpictures/2/kopaonik1.jpg;http://localhost/offerpictures/2/kopaonik2.jpg;http://localhost/offerpictures/2/kopaonik3.jpg;http://localhost/offerpictures/2/kopaonik4.jpg'),
('Moskva jesen', 3, '0600298336', 720, 'Moskva', '2021-06-30', '2021-07-01', 'Avion', '3 zvezdice', 'Grad', 0, 1, 0, 1, 0, 0, 0, 1, 0, 1, 'Na cekanju', '0000-00-00 00:00:00', 'Moskva je specifična. Drugačija od bilo koje druge destinacije za koje se turisti odlučuju kada krenu na put kroz Evropu. Atrakcije i znamenitosti u Moskvi koje treba videti je gotovo ludo nabrajati jer ih ima toliko da je možda čak bolji savet prosto šetati kroz ovaj ogromni grad i uživati.', 'http://localhost/offerpictures/3/moskva.jpg'),
('Prag vikend', 4, '0600298333', 120, 'Prag', '2021-07-11', '2021-07-14', 'Autobus', '2 zvezdice', 'Grad', 0, 0, 0, 0, 0, 0, 1, 0, 0, 5, 'Odoborena', '2021-05-22 18:56:14', 'Zvuči jako izazovno turu po Pragu pretvoriti u turu praških pivnica i uživati u vrhunskim češkom pivu, svinjskim kolenicama i kobasicama ali Prag ima još jako puno toga da ponudi.\r\n\r\n                    Za posetioce koji imaju samo jedan dan za posetu Pragu neizbežno je videti Praški dvorac, Karlov most i Starogradski trg. Već za tri dana mogu se lepo obići sve glavne atrakcije Praga.', 'http://localhost/offerpictures/4/prag1.jpg;http://localhost/offerpictures/4/prag2.jpg;http://localhost/offerpictures/4/prag3.jpg'),
('Stara planina - vikendica', 5, '0600298331', 60, 'Stara planina', '2021-03-24', '2021-03-26', 'Bez', '2 zvezdice', 'Planina', 0, 0, 0, 0, 0, 1, 0, 0, 0, 8, 'Odoborena', '2021-05-21 18:56:19', 'Beskonačni krajolici netaknute prirode, prostrani planinski pašnjaci i guste šume bogate plodovima i lekovitim biljem, slikovita sela i zanimljiv folklor – to je slika Stare planine, jednog od najlepših i najautentičnijih prirodnih rezervata Srbije, u kojem se nalazi i najviši planinski vrh ove zemlje, Midžor na 2.169 metara nadmorske visine.', 'http://localhost/offerpictures/5/stara_planina1.jpg;http://localhost/offerpictures/5/stara_planina2.jpg'),
('Pariz vikend', 6, '0600298330', 205, 'Pariz', '2021-06-18', '2021-06-20', 'Autobus', '3 zvezdice', 'Grad', 0, 0, 0, 0, 1, 0, 0, 0, 0, 5, 'Odoborena', '2021-05-20 18:56:24', 'Pariz – Poznat kao “grad svetlosti”, jedan je od najpoznatijih turističkih centara Evrope, ali i u svetu. Grad ljubavi i romantike, grad umetnika, burnog noćnog života, visoke mode i izuzetne kuhinje nikoga ne ostavlja ravnodušnim. Popnite se na vrh Ajfelove kule ili zvonik katedrale Notre Dame de Paris odakle je provirivao Kvazimodo; prošetajte najpoznatijom avenijom Evrope - Jelisejskim poljima i obližnjim ulicama koje odišu luksuzom i otmenošću; provozajte se brodićem po Seni i mahnite Kipu slobode; ili se pak nasmešite Mona Lisi u muzeju Luvr, nezaobilaznoj atrakciji za milione posetilaca iz celog sveta. Versaj, veličanstveni dvorac Luja XIV, čuven po svojoj lepoti I događajima koji su se tu odigrali I njenu Galeriju ogledala nikako ne propustite. I da, pokušajte da se ne izgubite šetajući takozvanim “zelenim tepihom” dvorskog parka, razgledajući sve fontane I skulpture napravljene u slavu i veličanje Lujeve vladavine.', 'http://localhost/offerpictures/6/pariz1.jpg'),
('London 3 dana', 7, '0600298337', 650, 'London', '2021-08-01', '2021-08-03', 'Avion', '3 zvezdice', 'Grad', 1, 0, 1, 1, 0, 1, 0, 0, 0, 5, 'Odoborena', '2021-05-19 18:56:28', 'Zadivljujuća arhitektura i bogata kulturna ponuda nekada carskog grada Beča čine ga jednom od omiljenih turističkih destinacija u svetu. Velika četvorka - Hajdn, Mocart, Betoven i Šubert čini ga gradom muzike. Beč nije samo grad valcera, prelepih dvoraca i bogatih muzejskih kolekcija već i mesto u kome se možete opustiti uz zaher tortu, uživati u pogledu sa velikog panoramskog točka ili posetiti po mnogima najbolji zoološki vrt u Evropi.', 'http://localhost/offerpictures/7/london1.jpg;http://localhost/offerpictures/7/london2.jpg;http://localhost/offerpictures/7/london3.jpg'),
('Beč vikend', 8, '0600298334', 190, 'Beč', '2021-07-23', '2021-07-25', 'Autobus', '2 zvezdice', 'Grad', 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 'Odoborena', '2021-05-18 23:30:00', 'Zadivljujuća arhitektura i bogata kulturna ponuda nekada carskog grada Beča čine ga jednom od omiljenih turističkih destinacija u svetu. Velika četvorka - Hajdn, Mocart, Betoven i Šubert čini ga gradom muzike. Beč nije samo grad valcera, prelepih dvoraca i bogatih muzejskih kolekcija već i mesto u kome se možete opustiti uz zaher tortu, uživati u pogledu sa velikog panoramskog točka ili posetiti po mnogima najbolji zoološki vrt u Evropi.', 'http://localhost/offerpictures/8/bec1.png'),
('Rim 4 dana', 9, '0600298334', 240, 'Rim', '2021-06-01', '2021-06-05', 'Avion', '3 zvezdice', 'Grad', 0, 0, 1, 0, 0, 0, 0, 0, 0, 5, 'Odoborena', '2021-05-17 23:30:00', 'Rim je glavni grad Italije i južnoitalijanske regije Lacio poznat i kao Večni grad. Centar je bogate antičke kulture, od koje je ostalo mnogo spomenika. Grad se nalazi u donjem toku reke Tiber, u neposrednoj blizini Sredozemnog mora i jedan je od najvećih centara Mediterana. U sklopu gradskog područja Rima nalazi se i Vatikan, crkvena država i sedište rimokatoličke crkve i Pape.', 'http://localhost/offerpictures/9/rim1.jpg;http://localhost/offerpictures/9/rim2.jpg;http://localhost/offerpictures/9/rim3.jpg'),
('Barselona vikend', 10, '0600298333', 250, 'Barselona', '2021-06-01', '2021-06-03', 'Brod', 'Nekategorizovan', 'Grad', 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 'Odoborena', '2021-05-17 21:30:00', 'Barselona je jedan od najposećenijih gradova u Evropi a osim “klasičnih” turista često je posećuju i poslovni ljudi koji često dolaze na sajmove i konferencije. Za najveći evropski grad na mediteranu se kaže da ima sve.', 'http://localhost/offerpictures/10/barselona1.jpg;http://localhost/offerpictures/10/barselona2.jpg'),
('Madrid 3 dana', 11, '0600298333', 200, 'Madrid', '2021-07-16', '2021-07-19', 'Autobus', '5 zvezdica', 'Grad', 1, 0, 0, 0, 0, 0, 0, 0, 0, 5, 'Odoborena', '2021-05-16 18:56:28', 'Madrid je glavni i najveći grad Kraljevine Španije i treći grad po veličini u Evropi. Nalazi se u srcu Iberijskog poluostrva, na pola puta između Atlantika i Sredozemlja. Poznat je po svojoj modernoj arhitekturi, neboderima, velelepnim palatama, prostranim trgovima, bogatim muzejima i parkovima. Takođe je i prestonica dobrog provoda i važi za grad koji nikada ne spava. Nezaobilazne znamenitosti Madrida su najveća evropska Kraljevska palata, Gran Via ulica čuvena i kao španski Brodvej, Plaza Mayor, grandiozni trg Puerta del Sol, muzej Prado, jedan od najznačajnijih svetskih muzeja, kao i park Retiro koji predstavlja najlepšu zelenu oazu grada i omiljeno mesto za odmor. Madrid je temperamentna metropola gde se sudaraju tredicionalno i moderno, pa se kaže da nigde u svetu proslost nije tako blizu sadašnjosti.', 'http://localhost/offerpictures/11/madrid1.jpeg;http://localhost/offerpictures/11/madrid2.jpg'),
('Rudno', 12, '0600298332', 100, 'Rudno', '2021-06-09', '2021-06-15', 'Bez', 'Nekategorizovan', 'Selo', 0, 1, 1, 1, 0, 0, 0, 1, 1, 9, 'Na cekanju', '0000-00-00 00:00:00', 'Rudno – vazdušna banja sa nadmorskom visinom od 1100 m., nalazi se izmedju dva predivna manastira: manastira Studenice (osnovan je krajem 12. veka kao glavna Zadužbina rodonačelnika dinastije Nemanjića, Stefana Nemanje.) i manastira Gradac (podignut je 1268. godine a zadužbina je Jelene Anžujske, žene kralja Uroša.) na obroncima planine Radočelo i severno je podgorje planine Golije (planina pod zaštitom UNESCO-a), gde je jedan od centara parka prirode Golija i prirodnog rezervata Golija – Studenica.', 'http://localhost/offerpictures/12/rudno1.jpg;http://localhost/offerpictures/12/rudno2.jpg'),
('Kanarska Ostrva Hotel Lux', 13, '0600298330', 1000, 'Kanarska Ostrva', '2021-07-09', '2021-07-19', 'Avion', '5 zvezdica', 'More', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 'Odoborena', '2021-05-13 10:45:51', 'Kanarska ostrva se nalaze u Atlantskom okeanu naspram afričke obale i sastoje se od šest manjih, nenaseljenih, i sedam većih, naseljenih, ostrva – Tenerife, Gran Kanaria (Gran Canaria), Lancarote (Lanzarote), La Palma,  Gomero (La Gomera), Ej Jero (El Hierro), Fuerteventura.', 'http://localhost/offerpictures/13/kanarskaostrva1.jpg;http://localhost/offerpictures/13/kanarskaostrva2.jpg;http://localhost/offerpictures/13/kanarskaostrva3.jpg;http://localhost/offerpictures/13/kanarskaostrva4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `surname` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `jmbg` char(13) DEFAULT NULL,
  `pib` char(9) DEFAULT NULL,
  `location` varchar(45) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `role` enum('ADMIN','VIP','AGENCIJA','IZDAVAC') NOT NULL,
  `agency_verified` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`idUser`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  UNIQUE KEY `jmbg_UNIQUE` (`jmbg`),
  UNIQUE KEY `pib_UNIQUE` (`pib`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`idUser`, `name`, `surname`, `username`, `password`, `email`, `jmbg`, `pib`, `location`, `phone`, `role`, `agency_verified`) VALUES
(1, 'Filip Travel', 'Mica Mitrovic', 'Filip_Travel', '123qwe', 'filiptravel@gmail.com', NULL, '101111222', 'Beograd', '0611133556', 'AGENCIJA', 1),
(2, 'Darko', 'Mitrovic', 'Darko123', 'lozinka123', 'darko123@gmail.com', '2007988444455', NULL, 'Novi Sad', '062455678', 'IZDAVAC', NULL),
(3, 'Zoran', 'Jovanovic', 'ZoranJov', 'lozinka123', 'zoki@gmail.com', '2305977112233', NULL, 'Nis', '061335556', 'IZDAVAC', NULL),
(4, 'Andrija', 'Antic', 'anticAndrija', '123qwe', 'anticandrija@gmail.com', NULL, NULL, NULL, NULL, 'VIP', NULL),
(5, 'Travel Serbia', 'Petar Petrovic', 'Travel_Serbia_1', '123qwe', 'travelserbia@gmail.com', NULL, '102342235', 'Beograd', '061 1231231', 'AGENCIJA', 1),
(6, 'Marko', 'Markovic', 'marko1234', '12345', 'marko1233@gmail.com', NULL, NULL, NULL, NULL, 'ADMIN', NULL),
(7, 'Ivona', 'Stojanovic', 'speedy_i99', '12345', 'stojanovic.i@hotmail.com', NULL, NULL, NULL, NULL, 'VIP', NULL),
(8, 'Uros', 'Stankovic', 'urosBoy00', 'lozinka123', 'urosboy00@gmail.com', '2305977112276', NULL, 'Budilovina', '061335522', 'IZDAVAC', NULL),
(9, 'Nikola', 'Divnic', 'nidza99', 'lozinka123', 'nikolica99@hotmail.com', '1234321234323', NULL, 'Varvarin', '0654333454', 'IZDAVAC', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

DROP TABLE IF EXISTS `wishlist`;
CREATE TABLE IF NOT EXISTS `wishlist` (
  `iduser` int(11) NOT NULL,
  `idoffer` int(11) NOT NULL,
  PRIMARY KEY (`idoffer`,`iduser`),
  KEY `user_idx` (`iduser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`iduser`, `idoffer`) VALUES
(4, 1),
(4, 2),
(4, 3),
(4, 6),
(7, 3),
(7, 7);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `offer`
--
ALTER TABLE `offer`
  ADD CONSTRAINT `id_owner` FOREIGN KEY (`owner`) REFERENCES `user` (`idUser`);

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `offer_id` FOREIGN KEY (`idoffer`) REFERENCES `offer` (`idOffer`),
  ADD CONSTRAINT `user_id` FOREIGN KEY (`iduser`) REFERENCES `user` (`idUser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
