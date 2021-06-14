-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2018 at 09:45 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `id` int(11) NOT NULL,
  `ime_prezime` varchar(250) DEFAULT NULL,
  `email` varchar(250) NOT NULL,
  `lozinka` varchar(250) NOT NULL,
  `tip_korisnika` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id`, `ime_prezime`, `email`, `lozinka`, `tip_korisnika`) VALUES
(1, 'Marko Markovic', 'marko@gmail.com', '123qwe', '1'),
(2, 'Jovan', 'joca@gmail.com', '1234fr', '2'),
(3, 'Jovana', 'radakovic@gmail.com', '17b2bd012e969fd1df82c6ccdd3f8a35', '1'),
(4, 'UZY', 'uzy@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2'),
(5, 'uzy', 'u@gmail.com', '202cb962ac59075b964b07152d234b70', '1');

-- --------------------------------------------------------

--
-- Table structure for table `strane`
--

CREATE TABLE `strane` (
  `id_strana` int(11) NOT NULL,
  `naslov` varchar(250) NOT NULL,
  `sadrzaj` text NOT NULL,
  `autor` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `strane`
--

INSERT INTO `strane` (`id_strana`, `naslov`, `sadrzaj`, `autor`) VALUES
(1, 'Moj prvi post 5', 'sdfsdfsdfsdfsd\r\nf\r\nsdf\r\nsdf', '2'),
(2, 'sdfsdfsdf', 'asdfadsfdf\r\nas\r\nd\r\nasd\r\nas\r\nd', '5'),
(3, 'Post Uzahir', 'zxcZXZXZXZXZXZXZXZXZX', '7'),
(4, 'post korisnika 5', 'asdasdasdasd', ''),
(5, 'dfgfdgdfgdfgdfvxcv x vxfgbsdftg', 'sdftghbrther5gewrtb dfhgdhgd hg\r\ndf\r\nhg\r\n dfhg', '5');

-- --------------------------------------------------------

--
-- Table structure for table `tip_korisnika`
--

CREATE TABLE `tip_korisnika` (
  `id` int(11) NOT NULL,
  `naziv` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tip_korisnika`
--

INSERT INTO `tip_korisnika` (`id`, `naziv`) VALUES
(1, 'Administrator'),
(2, 'Moderator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `strane`
--
ALTER TABLE `strane`
  ADD PRIMARY KEY (`id_strana`);

--
-- Indexes for table `tip_korisnika`
--
ALTER TABLE `tip_korisnika`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `strane`
--
ALTER TABLE `strane`
  MODIFY `id_strana` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tip_korisnika`
--
ALTER TABLE `tip_korisnika`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
