-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2020 at 12:47 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `evoting`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fullname`, `email`, `password`, `username`) VALUES
(1, 'admin', 'adamin@gmail.com', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `contestants`
--

CREATE TABLE `contestants` (
  `id` int(11) NOT NULL,
  `matric` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `faculty` varchar(10) NOT NULL,
  `department` varchar(50) NOT NULL,
  `post` varchar(50) NOT NULL,
  `level` varchar(5) NOT NULL,
  `cgp` varchar(10) NOT NULL,
  `email` varchar(200) NOT NULL,
  `profileImage` varchar(500) NOT NULL,
  `manifestos` varchar(300) NOT NULL,
  `validation` varchar(15) NOT NULL DEFAULT 'DEACTIVATE',
  `OrgName` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contestants`
--

INSERT INTO `contestants` (`id`, `matric`, `password`, `fullname`, `faculty`, `department`, `post`, `level`, `cgp`, `email`, `profileImage`, `manifestos`, `validation`, `OrgName`) VALUES
(1, '17/0000', 'ibnqayyimpros', 'Basheeroh Akinpelu', 'Science', 'Computer Science', 'president', '200', '4.50', 'Basheeroh22@gmail.com', '17/0000_BRO AYO 2.jpg', 'All i know is money, so if you vote for me you go pay ooooo', 'activate', ''),
(2, 'sfsdfsdf', '1234567', 'sfsfsfef', 'sdfweret', 'sfwefewrf', 'V President', '300', '2.00', 'tesleemn902@gmail.com', 'sfsdfsdf_solution-3696900_1280.png', 'nkjsdhfnkjndkfjvkjjhndfk', 'activate', '');

-- --------------------------------------------------------

--
-- Table structure for table `countersv`
--

CREATE TABLE `countersv` (
  `id` int(11) NOT NULL,
  `votercount` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countersv`
--

INSERT INTO `countersv` (`id`, `votercount`) VALUES
(10, 'Ibraheem for President'),
(11, ''),
(12, 'Basheeroh Akinpelu for president'),
(13, ''),
(14, 'Basheeroh Akinpelu for president'),
(15, 'sfsfsfef for V President'),
(16, '');

-- --------------------------------------------------------

--
-- Table structure for table `idvoterscount`
--

CREATE TABLE `idvoterscount` (
  `id` int(11) NOT NULL,
  `voterID` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `idvoterscount`
--

INSERT INTO `idvoterscount` (`id`, `voterID`) VALUES
(9, '3005'),
(12, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `contestantReg` varchar(20) NOT NULL DEFAULT 'deactivate ',
  `voting` varchar(20) NOT NULL DEFAULT 'deactivate ',
  `voterReg` varchar(20) NOT NULL DEFAULT 'deactivate '
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `contestantReg`, `voting`, `voterReg`) VALUES
(1, 'activated', 'activated', 'deactivated');

-- --------------------------------------------------------

--
-- Table structure for table `postreg`
--

CREATE TABLE `postreg` (
  `id` int(11) NOT NULL,
  `post` varchar(100) NOT NULL,
  `date` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `postreg`
--

INSERT INTO `postreg` (`id`, `post`, `date`) VALUES
(7, 'president', ''),
(8, 'V President', '');

-- --------------------------------------------------------

--
-- Table structure for table `votelogin`
--

CREATE TABLE `votelogin` (
  `id` int(11) NOT NULL,
  `matric` varchar(11) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `faculty` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `votelogin`
--

INSERT INTO `votelogin` (`id`, `matric`, `password`, `email`, `faculty`, `department`) VALUES
(1, 'test', 'test', 'test@gmail.com', 'fos', 'computer science'),
(2, '17/0000', 'test', 'tescode@gmail.com', 'sdfweret', 'test');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `contestants`
--
ALTER TABLE `contestants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`matric`),
  ADD UNIQUE KEY `fullname` (`fullname`);
ALTER TABLE `contestants` ADD FULLTEXT KEY `manifesto` (`email`);

--
-- Indexes for table `countersv`
--
ALTER TABLE `countersv`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `idvoterscount`
--
ALTER TABLE `idvoterscount`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `voterID` (`voterID`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `postreg`
--
ALTER TABLE `postreg`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `post` (`post`);

--
-- Indexes for table `votelogin`
--
ALTER TABLE `votelogin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `matric` (`matric`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contestants`
--
ALTER TABLE `contestants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `countersv`
--
ALTER TABLE `countersv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `idvoterscount`
--
ALTER TABLE `idvoterscount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `postreg`
--
ALTER TABLE `postreg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `votelogin`
--
ALTER TABLE `votelogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
