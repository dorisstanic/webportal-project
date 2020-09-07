-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2020 at 12:47 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pwa`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `datum` varchar(32) NOT NULL,
  `naslov` varchar(255) NOT NULL,
  `sazetak` text NOT NULL,
  `tekst` text NOT NULL,
  `slika` varchar(64) NOT NULL,
  `kategorija` varchar(64) NOT NULL,
  `arhiva` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `datum`, `naslov`, `sazetak`, `tekst`, `slika`, `kategorija`, `arhiva`) VALUES
(83, '05.06.2020.', 'The standard Lorem Ipsum passage, used since the 1500s', 'The standard Lorem Ipsum passage, used since the 1500s', 'The standard Lorem Ipsum passage, used since the ', '2.jpg', 'kultura', 0),
(85, '05.06.2020.', 'The standard Lorem Ipsum passage, used since the 1500s', 'The standard Lorem Ipsum passage, used since the 1500s', 'The standard Lorem Ipsum passage, used since the ', '3.jpg', 'kultura', 0),
(86, '05.06.2020.', 'The standard Lorem Ipsum passage, used since the 1500s', 'The standard Lorem Ipsum passage, used since the 1500s', 'The standard Lorem Ipsum passage, used \'since\' the ', '4.jpg', 'kultura', 0),
(87, '05.06.2020.', 'The standard Lorem Ipsum passage, used since the 1500s', 'The standard Lorem Ipsum passage, used since the 1500s', 'The standard Lorem Ipsum passage, used \'since\' the ', '5.jpg', 'kultura', 0),
(90, '05.06.2020.', 'The standard Lorem Ipsum passage, used since the 1500s', 'The standard Lorem Ipsum passage, used since the 1500s', 'The standard Lorem Ipsum passage, used \'since\' the ', '6.jpg', 'politika', 0),
(91, '05.06.2020.', 'NOVI UDARAC ZA ‘UDARAČA‘ RUJEVICE! OSIJEK ODREDIO MAKSIMALNU MOGUĆU KAZNU GREZDI: TO JE NEDOPUSTIVO', 'Čelništvo kluba zauzelo je stav da je Grezdina reakcija bila neprimjerena i nedopustiva za sportaša', '\"Sukladno svom disciplinskom pravilniku, a nakon incidenta na riječkoj Rujevici po svršetku susreta polufinala Kupa Hrvatske, Nogometni klub Osijek izrekao je novčanu kaznu svom prvotimcu Erosu Grezdi. Iako je u obrazloženju svoga postupka naš napadač naveo kako je bio isprovociran od strane suparničkog igrača i vrijeđan na nacionalnoj osnovi, čelništvo NK Osijek zauzelo je stav da je Grezdina reakcija bila neprimjerena i nedopustiva za jednog sportaša. Stoga mu je izrečena maksimalna, dakle najveća dopuštena klupska kazna u takvim i sličnim situacijama. Konkretno je riječ o uskraćivanju 20 posto njegovih primanja u idućih godina dana.\", objavio je NK Osijek priopćenje na ovu temu', 'Screen+Shot+2020-04-27+at+23.58.57.png', 'politika', 0),
(94, '06.06.2020.', 'Krastavac i limun riješit će vas vrećica ispod očiju u par minuta', 'Tamne kolutove i vrećice pod očima šminka teško prekriva, no dio su svakodnevice za ljude koji balansiraju između posla, obitelji i kućanskih obveza. Ipak, postoji način da ih sakrijete', 'Možda niste znali, ali podočnjaci i vrećice nisu samo rezultat umora, a neki od uzroka mogli bi vas iznenaditi. Ako vam je dosadio umoran pogled iz ogledala koji gledate svakog jutra, iskušajte neki od ovih savjeta.\r\n<br>\r\n<b>Zašto nastaju podočnjaci</b><br>\r\n\r\nNe spavate dovoljno\r\n\r\nTo je svima dobro poznato, no znate li na koji način nastaju podočnjaci? Nedostatak sna uzrokuje proširenje krvnih žila pod kožom, a to rezultira tamnom bojom. Stoga se, za početak, dobro naspavajte.\r\n<br>\r\nPoložaj spavanja\r\n<br>\r\nUz nedostatak sna, nastanku podočnjaka može doprinijeti i položaj u kojem spavate. Ako su podočnjaci veći tijekom jutra, razlog može biti nakupljanje tekućina tijekom sna. Pokušajte staviti pod glavu još jedan jastuk kako ne biste djelovali otečeno.\r\n<br>\r\nSunce\r\n<br>\r\nPretjerano izlaganje suncu može uzrokovati pigmentaciju kože oko očiju, pa zato djeluje tamnije.', 'thinkstockphotos-483838705.jpg', 'kultura', 0),
(95, '06.06.2020.', 'The standard Lorem Ipsum passage, used since the 1500s', 'The standard Lorem Ipsum passage, used since the 1500sThe standard Lorem Ipsum passage, used since the 1500s', 'The standard Lorem Ipsum passage, used since the 1500sThe standard Lorem Ipsum passage, used since the 1500sThe standard Lorem Ipsum passage, used since the 1500s', '1.jpg', 'politika', 0),
(99, '08.06.2020.', 'he standard Lorem Ipsum passage, used since the 1500s', 'sada', 'af', 'fine-art-photography1-1024x717.jpg', 'politika', 0),
(100, '08.06.2020.', 'Nešto', 'nešto', 'nešto', 'IMG_20200229_112752.jpg', 'politika', 0),
(113, '08.06.2020.', 'Lorem ipsumLore', 'Lorem ipsumLorem ipsumLorem ipsumv', 'Lorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsum', 'IMG_20200404_181826.jpg', 'kultura', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
