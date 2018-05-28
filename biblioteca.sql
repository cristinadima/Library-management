-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2018 at 08:51 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `biblioteca`
--

-- --------------------------------------------------------

--
-- Table structure for table `autori`
--

CREATE TABLE `autori` (
  `id_autor` int(11) NOT NULL,
  `nume` varchar(20) NOT NULL,
  `prenume` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `autori`
--

INSERT INTO `autori` (`id_autor`, `nume`, `prenume`) VALUES
(1, 'Creanga', 'Ion'),
(2, 'Rebreanu', 'Liviu'),
(3, 'Preda', 'Marin'),
(4, 'Ispirescu', 'Petre'),
(5, 'Eminescu', 'Mihai'),
(6, 'Bacovia', 'George');

-- --------------------------------------------------------

--
-- Table structure for table `carti`
--

CREATE TABLE `carti` (
  `ISBN` int(11) NOT NULL,
  `Titlu` varchar(50) NOT NULL,
  `Editura` varchar(40) NOT NULL,
  `Categorie` varchar(40) NOT NULL,
  `Limba` varchar(40) NOT NULL,
  `id_autor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `carti`
--

INSERT INTO `carti` (`ISBN`, `Titlu`, `Editura`, `Categorie`, `Limba`, `id_autor`) VALUES
(1234, 'Harap-Alb', 'Litera', 'Poveste', 'Romana', 1),
(2345, 'Ion', 'Polirom', 'Romane', 'Romana', 2),
(3456, 'Morometii', 'Litera', 'Romane', 'Romana', 3),
(4567, 'Basme', 'Rao', 'Basme', 'Romana', 4),
(6789, 'Delirul', 'Humanitas', 'Romane', 'Romana', 3),
(7654, 'Opere', 'Rao', 'Poezii', 'Romana', 6),
(8765, 'Floare albastra', 'Polirom', 'Poezii', 'Romana', 5),
(9876, 'Luceafarul', 'Humanitas', 'Poezii', 'Romana', 5);

-- --------------------------------------------------------

--
-- Table structure for table `cititori`
--

CREATE TABLE `cititori` (
  `id_cititor` int(11) NOT NULL,
  `nume` varchar(25) NOT NULL,
  `prenume` varchar(25) NOT NULL,
  `varsta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cititori`
--

INSERT INTO `cititori` (`id_cititor`, `nume`, `prenume`, `varsta`) VALUES
(100, 'Dima', 'Cristina', 22),
(101, 'Lupu', 'Maria', 14),
(102, 'Anghel', 'Andreea', 22),
(103, 'Diaconu', 'Florin', 17),
(104, 'Pavel', 'Marian', 18);

-- --------------------------------------------------------

--
-- Table structure for table `imprumuturi`
--

CREATE TABLE `imprumuturi` (
  `id_imprumut` int(11) NOT NULL,
  `id_cititor` int(11) NOT NULL,
  `ISBN` int(11) NOT NULL,
  `data_imprumut` date NOT NULL,
  `data_returnare` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `imprumuturi`
--

INSERT INTO `imprumuturi` (`id_imprumut`, `id_cititor`, `ISBN`, `data_imprumut`, `data_returnare`) VALUES
(10, 101, 1234, '2018-03-01', '2018-04-01'),
(11, 103, 4567, '2018-03-07', '2018-04-06'),
(12, 103, 7654, '2018-04-02', '2018-05-01'),
(13, 102, 3456, '2018-05-09', '2018-06-08'),
(14, 104, 9876, '2018-05-07', '2018-06-06'),
(15, 104, 2345, '2018-04-05', '2018-05-06'),
(16, 102, 6789, '2018-05-11', '2018-05-10'),
(1000, 101, 1234, '2018-06-09', '2018-07-08');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `parola` varchar(50) NOT NULL,
  `rol` varchar(25) NOT NULL,
  `id_cititor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `parola`, `rol`, `id_cititor`) VALUES
(1, 'carte', 'admin', 100),
(2, 'carte', 'user', 101),
(3, 'carte', 'user', 102),
(4, 'carte', 'user', 103),
(5, 'carte', 'user', 104);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `autori`
--
ALTER TABLE `autori`
  ADD PRIMARY KEY (`id_autor`);

--
-- Indexes for table `carti`
--
ALTER TABLE `carti`
  ADD PRIMARY KEY (`ISBN`),
  ADD KEY `id_autor` (`id_autor`);

--
-- Indexes for table `cititori`
--
ALTER TABLE `cititori`
  ADD PRIMARY KEY (`id_cititor`);

--
-- Indexes for table `imprumuturi`
--
ALTER TABLE `imprumuturi`
  ADD PRIMARY KEY (`id_imprumut`),
  ADD KEY `id_cititor` (`id_cititor`),
  ADD KEY `ISBN` (`ISBN`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cititor` (`id_cititor`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carti`
--
ALTER TABLE `carti`
  ADD CONSTRAINT `carti_ibfk_1` FOREIGN KEY (`id_autor`) REFERENCES `autori` (`id_autor`);

--
-- Constraints for table `imprumuturi`
--
ALTER TABLE `imprumuturi`
  ADD CONSTRAINT `imprumuturi_ibfk_1` FOREIGN KEY (`id_cititor`) REFERENCES `cititori` (`id_cititor`),
  ADD CONSTRAINT `imprumuturi_ibfk_2` FOREIGN KEY (`ISBN`) REFERENCES `carti` (`ISBN`);

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`id_cititor`) REFERENCES `cititori` (`id_cititor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
