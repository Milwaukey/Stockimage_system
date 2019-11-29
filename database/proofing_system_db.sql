-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 29, 2019 at 11:37 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proofing_system_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tcards`
--

CREATE TABLE `tcards` (
  `cardID` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `ibanCode` char(18) NOT NULL,
  `expirationDate` char(4) NOT NULL,
  `ccv` char(3) NOT NULL,
  `totalAmountPaid` decimal(7,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tcities`
--

CREATE TABLE `tcities` (
  `cityID` int(11) NOT NULL,
  `cityName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tcities`
--

INSERT INTO `tcities` (`cityID`, `cityName`) VALUES
(1, 'København'),
(2, 'Aarhus'),
(3, 'Odense'),
(4, 'Skalborg'),
(5, 'Esbjerg'),
(6, 'Vejle'),
(7, 'Roskilde'),
(8, 'Viborg'),
(9, 'Svendborg'),
(10, 'Hillerød'),
(11, 'Frederikshavn'),
(12, 'Borød'),
(13, 'Nyborg'),
(14, 'Hvidovre'),
(15, 'Horsens'),
(16, 'Kastrup'),
(17, 'Ærøskøbing'),
(18, 'Hobro'),
(19, 'Haderslev'),
(20, 'Højby'),
(21, 'Dragør'),
(22, 'Lemvig'),
(23, 'Nykøbing Falster'),
(24, 'Nykøbing Mors'),
(25, 'Sorø'),
(26, 'Kolding'),
(27, 'Hjørring'),
(28, 'Søborg'),
(29, 'Aalborg'),
(30, 'Kokkedal'),
(31, 'Sønderborg'),
(32, 'Albertslund'),
(33, 'Randers'),
(34, 'Solrød Strand'),
(35, 'Vejen'),
(36, 'Ringe'),
(37, 'Herlev'),
(38, 'Odder'),
(39, 'Næstved'),
(40, 'Kongens Lyngby'),
(41, 'Helsinge'),
(42, 'Skanderborg'),
(43, 'Rødovre'),
(44, 'Frederiksberg'),
(45, 'Helsingør'),
(46, 'Allerød'),
(47, 'Skive'),
(48, 'Glostrup'),
(49, 'Ishøj'),
(50, 'Brøndby'),
(51, 'Frederikssund'),
(52, 'Holbæk'),
(53, 'Rudkøbing'),
(54, 'Kirke Hvalsø'),
(55, 'Tønder'),
(56, 'Haslev'),
(57, 'Holte'),
(58, 'Ikast'),
(59, 'Taastrup'),
(60, 'Rønde'),
(61, 'Rønne'),
(62, 'Støvring'),
(63, 'Vallensbæk Strand'),
(64, 'Bogense'),
(65, 'Vordingborg'),
(66, 'Tranebjerg'),
(67, 'Slagelse'),
(68, 'Aabybro'),
(69, 'Aabenraa'),
(70, 'Varde'),
(71, 'Ringsted'),
(72, 'Byrum'),
(73, 'Ballerup'),
(74, 'Aars'),
(75, 'Ringkøbing'),
(76, 'Hinnerup'),
(77, 'Kerteminde'),
(78, 'Farum'),
(79, 'Greve'),
(80, 'Herning'),
(81, 'Struer'),
(82, 'Grindsted'),
(83, 'Grenaa'),
(84, 'Fredericia'),
(85, 'Store Heddinge'),
(86, 'Hørsholm'),
(87, 'Assens'),
(88, 'Maribo'),
(89, 'Køge'),
(90, 'Frederiksværk'),
(91, 'Stenløse'),
(92, 'Thisted'),
(93, 'Kalundborg'),
(94, 'Holstebro'),
(95, 'Charlottenlund'),
(96, 'Brønderslev'),
(97, 'Silkeborg'),
(98, 'Hedensted'),
(99, 'Middelfart');

-- --------------------------------------------------------

--
-- Table structure for table `tgalleries`
--

CREATE TABLE `tgalleries` (
  `galleryID` int(11) NOT NULL,
  `photographerID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `numberOfPhotos` smallint(6) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tpayments`
--

CREATE TABLE `tpayments` (
  `paymentID` int(11) NOT NULL,
  `cardID` int(11) DEFAULT NULL,
  `photoID` int(11) DEFAULT NULL,
  `payDate` date NOT NULL,
  `payTime` time NOT NULL,
  `amountPaid` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tphotographers`
--

CREATE TABLE `tphotographers` (
  `photographerID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(60) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tphotographers`
--

INSERT INTO `tphotographers` (`photographerID`, `name`, `surname`, `email`, `password`) VALUES
(1, 'Sune', 'Henriksen', 'sr@gmail.com', '$2y$10$9ZT/GbfZ6W9CPPubeLjbOONXO4HwsZOY/Uqh44kKcXMIRwyj2T9wa'),
(2, 'Signe', 'Firewheel', 'sf@gmail.com', '$2y$10$0rPK0uUEcSP0ltzlFFzfPuxo0ayWQuhcPJp7AEuqSMh7fU8x.xw3u');

-- --------------------------------------------------------

--
-- Table structure for table `tphotos`
--

CREATE TABLE `tphotos` (
  `photoID` int(11) NOT NULL,
  `galleryID` int(11) DEFAULT NULL,
  `format` varchar(5) NOT NULL,
  `hDimension` mediumint(9) NOT NULL,
  `vDimension` mediumint(9) NOT NULL,
  `resolution` int(11) NOT NULL,
  `filesize` mediumint(9) NOT NULL,
  `price` decimal(5,2) DEFAULT 0.00,
  `photoFile` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tusers`
--

CREATE TABLE `tusers` (
  `userID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `signupDate` date DEFAULT NULL,
  `deleteDate` date DEFAULT NULL,
  `totalMonetaryPaid` decimal(5,2) DEFAULT 0.00,
  `streetName` varchar(50) NOT NULL,
  `streetNumber` varchar(5) NOT NULL,
  `zipcode` char(4) NOT NULL,
  `cityID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tusers`
--

INSERT INTO `tusers` (`userID`, `name`, `surname`, `email`, `username`, `password`, `signupDate`, `deleteDate`, `totalMonetaryPaid`, `streetName`, `streetNumber`, `zipcode`, `cityID`) VALUES
(1, 'Charles', 'Darwin', 'cd@gmail.com', 'Evolution', '$2y$10$0sHdlftGDudJBw2DGZ7GHeLHddyEL.tijZFYTxKrGBr8MU8AZu1ei', '2019-11-29', NULL, '0.00', 'Lygten', '16', '2400', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tcards`
--
ALTER TABLE `tcards`
  ADD PRIMARY KEY (`cardID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `tcities`
--
ALTER TABLE `tcities`
  ADD PRIMARY KEY (`cityID`);

--
-- Indexes for table `tgalleries`
--
ALTER TABLE `tgalleries`
  ADD PRIMARY KEY (`galleryID`),
  ADD KEY `photographerID` (`photographerID`);

--
-- Indexes for table `tpayments`
--
ALTER TABLE `tpayments`
  ADD PRIMARY KEY (`paymentID`),
  ADD KEY `cardID` (`cardID`),
  ADD KEY `photoID` (`photoID`);

--
-- Indexes for table `tphotographers`
--
ALTER TABLE `tphotographers`
  ADD PRIMARY KEY (`photographerID`);

--
-- Indexes for table `tphotos`
--
ALTER TABLE `tphotos`
  ADD PRIMARY KEY (`photoID`),
  ADD KEY `galleryID` (`galleryID`);

--
-- Indexes for table `tusers`
--
ALTER TABLE `tusers`
  ADD PRIMARY KEY (`userID`),
  ADD KEY `cityID` (`cityID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tcards`
--
ALTER TABLE `tcards`
  MODIFY `cardID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tcities`
--
ALTER TABLE `tcities`
  MODIFY `cityID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `tgalleries`
--
ALTER TABLE `tgalleries`
  MODIFY `galleryID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tpayments`
--
ALTER TABLE `tpayments`
  MODIFY `paymentID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tphotographers`
--
ALTER TABLE `tphotographers`
  MODIFY `photographerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tphotos`
--
ALTER TABLE `tphotos`
  MODIFY `photoID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tusers`
--
ALTER TABLE `tusers`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tcards`
--
ALTER TABLE `tcards`
  ADD CONSTRAINT `tcards_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `tusers` (`userID`);

--
-- Constraints for table `tgalleries`
--
ALTER TABLE `tgalleries`
  ADD CONSTRAINT `tgalleries_ibfk_1` FOREIGN KEY (`photographerID`) REFERENCES `tphotographers` (`photographerID`);

--
-- Constraints for table `tpayments`
--
ALTER TABLE `tpayments`
  ADD CONSTRAINT `tpayments_ibfk_1` FOREIGN KEY (`cardID`) REFERENCES `tcards` (`cardID`),
  ADD CONSTRAINT `tpayments_ibfk_2` FOREIGN KEY (`photoID`) REFERENCES `tphotos` (`photoID`);

--
-- Constraints for table `tphotos`
--
ALTER TABLE `tphotos`
  ADD CONSTRAINT `tphotos_ibfk_1` FOREIGN KEY (`galleryID`) REFERENCES `tgalleries` (`galleryID`);

--
-- Constraints for table `tusers`
--
ALTER TABLE `tusers`
  ADD CONSTRAINT `tusers_ibfk_1` FOREIGN KEY (`cityID`) REFERENCES `tcities` (`cityID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
