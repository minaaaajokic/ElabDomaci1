-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2022 at 02:59 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `salonlepote`
--

-- --------------------------------------------------------

--
-- Table structure for table `klijent`
--

CREATE TABLE `klijent` (
  `klijentID` int(11) NOT NULL,
  `ime` varchar(50) DEFAULT NULL,
  `prezime` varchar(50) DEFAULT NULL,
  `brojTelefona` varchar(15) DEFAULT NULL,
  `loyalityClan` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `klijent`
--

INSERT INTO `klijent` (`klijentID`, `ime`, `prezime`, `brojTelefona`, `loyalityClan`) VALUES
(1, 'Sara', 'Jevtić', '0647186942', 1),
(2, 'Andreja', 'Lukić', '0602481425', 0),
(3, 'Marina', 'Vukosavljević', '0621472635', 0),
(4, 'Katarina', 'Dimitrijević', '0658547654', 1),
(5, 'Jelena', 'Milošević', '0621598275', 0),
(6, 'Tamara', 'Davidović', '0641238547', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tip`
--

CREATE TABLE `tip` (
  `tipID` int(11) NOT NULL,
  `naziv` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tip`
--

INSERT INTO `tip` (`tipID`, `naziv`) VALUES
(1, 'Hemijski piling'),
(2, 'Anti-age tretman'),
(3, 'Antistres masaža'),
(4, 'Terapeutska masaža'),
(5, 'Piling lica'),
(6, 'Mezoterapija'),
(7, 'Hidromasažna kada'),
(8, 'Sauna');

-- --------------------------------------------------------

--
-- Table structure for table `tretman`
--

CREATE TABLE `tretman` (
  `tretmanID` int(11) UNSIGNED NOT NULL,
  `zaposleniID` int(11) DEFAULT NULL,
  `klijentID` int(11) DEFAULT NULL,
  `tipID` int(11) DEFAULT NULL,
  `datum` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tretman`
--

INSERT INTO `tretman` (`tretmanID`, `zaposleniID`, `klijentID`, `tipID`, `datum`) VALUES
(1, 4, 2, 4, '2022-11-13'),
(2, 2, 3, 2, '2022-11-16'),
(3, 2, 4, 3, '2022-11-15'),
(4, 3, 1, 2, '2022-11-17'),
(5, 3, 5, 4, '2022-11-14'),
(28, 4, 2, 3, '2022-11-17'),
(29, 3, 5, 4, '2022-11-23'),
(30, 4, 4, 7, '2022-11-23'),
(31, 2, 6, 6, '2022-11-30'),
(33, 3, 6, 8, '2022-11-22'),
(34, 1, 3, 1, '2022-11-24');

-- --------------------------------------------------------

--
-- Table structure for table `zaposleni`
--

CREATE TABLE `zaposleni` (
  `zaposleniID` int(11) NOT NULL,
  `imeZap` varchar(50) DEFAULT NULL,
  `prezimeZap` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `zaposleni`
--

INSERT INTO `zaposleni` (`zaposleniID`, `imeZap`, `prezimeZap`, `username`, `password`) VALUES
(1, 'Svi', '', 'admin', 'admin'),
(2, 'Lana', 'Dedic', 'lana', 'lana'),
(3, 'Tijana', 'Markovic', 'tijana', 'tijana'),
(4, 'Mina', 'Arsic', 'mina', 'mina');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `klijent`
--
ALTER TABLE `klijent`
  ADD PRIMARY KEY (`klijentID`);

--
-- Indexes for table `tip`
--
ALTER TABLE `tip`
  ADD PRIMARY KEY (`tipID`);

--
-- Indexes for table `tretman`
--
ALTER TABLE `tretman`
  ADD PRIMARY KEY (`tretmanID`);

--
-- Indexes for table `zaposleni`
--
ALTER TABLE `zaposleni`
  ADD PRIMARY KEY (`zaposleniID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `klijent`
--
ALTER TABLE `klijent`
  MODIFY `klijentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tip`
--
ALTER TABLE `tip`
  MODIFY `tipID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tretman`
--
ALTER TABLE `tretman`
  MODIFY `tretmanID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `zaposleni`
--
ALTER TABLE `zaposleni`
  MODIFY `zaposleniID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
