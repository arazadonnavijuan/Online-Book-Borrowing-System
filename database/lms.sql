-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2025 at 02:14 PM
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
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `BookId` int(10) NOT NULL,
  `Author` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`BookId`, `Author`) VALUES
(3, 'Jay Prakash'),
(4, 'Jay Prakash'),
(5, 'x'),
(6, 'a1'),
(7, 'Bogart'),
(7, 'Kenneth'),
(8, 'Auer'),
(8, 'Davil J.'),
(9, 'Rob'),
(9, 'Williams'),
(10, 'Deiteil'),
(11, 'Sharma'),
(12, 'Barney Stinson'),
(13, 'Puri'),
(14, 'Manna'),
(15, 'Jindal U.C'),
(16, 'Prasad'),
(17, 'Aravind Alex'),
(17, 'Haldar Sibsankar'),
(18, 'Sandhu'),
(18, 'Singh'),
(19, 'Mark Zuckerberg');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `BookId` int(10) NOT NULL,
  `Title` varchar(50) DEFAULT NULL,
  `Publisher` varchar(50) DEFAULT NULL,
  `Year` varchar(50) DEFAULT NULL,
  `Availability` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`BookId`, `Title`, `Publisher`, `Year`, `Availability`) VALUES
(1, 'OS', 'PEARSON', '2006', 0),
(2, 'DBMS', 'TARGET67', '2010', 0),
(3, 'TOC', 'NITC', '2018', 4),
(4, 'TOC', 'NITC', '2018', 1),
(5, 'DAA', 'y', '2014', 0),
(6, 'DSA', 'X', '2010', 10),
(7, 'Discrete Structures', 'Pearson', '2010', 10),
(8, 'Database Processing', 'Prentice Hall', '2013', 12),
(9, 'Computer System Architecture', 'Prentice Hall', '2015', 5),
(10, 'C: How to program', 'Prentice Hall', '2009', 3),
(11, 'Atomic and Nuclear Systems', 'Pearson India ', '2017', 13),
(12, 'The PlayBook', 'Stinson', '2010', 11),
(13, 'General Theory of Relativity', 'Pearson India ', '2012', 5),
(14, 'Heat and Thermodynamics', 'Pearson', '2013', 9),
(15, 'Machine Design', 'Pearson India ', '2012', 5),
(16, 'Nuclear Physics', 'Pearson India ', '1998', 7),
(17, 'Operating System', 'Pearson India ', '1990', 7),
(18, 'Theory of Machines', 'Pearson', '1992', 12),
(19, 'The Facebook', 'Mark Zuckerberg', '2004', 999);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `M_Id` int(10) NOT NULL,
  `RollNo` varchar(50) DEFAULT NULL,
  `Msg` varchar(255) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`M_Id`, `RollNo`, `Msg`, `Date`, `Time`) VALUES
(1, 'b160111cs', 'Your request for BookId: 1  has been accepted', '2018-10-15', '23:47:40'),
(2, 'B160158CS', 'Your request for BookId: 1  has been accepted', '2018-10-15', '23:47:50'),
(3, 'B160158CS', 'Your request for BookId: 2  has been rejected', '2018-10-15', '23:47:58'),
(4, 'b160632cs', 'Your request for BookId: 3  has been accepted', '2018-10-16', '16:54:29'),
(5, 'b160511cs', 'Your request for BookId: 2  has been accepted', '2018-10-16', '16:54:58'),
(6, 'b160511cs', 'Your request for BookId: 6  has been accepted', '2018-10-16', '21:56:11'),
(7, 'b160854cs', 'Your request for BookId: 6 has been accepted', '2018-10-16', '22:11:12'),
(8, 'B160158CS', 'Your request for renewal of BookId: 1  has been accepted', '2018-10-16', '22:43:24'),
(9, 'b160511cs', 'Your request for return of BookId: 6  has been accepted', '2018-10-16', '22:44:24'),
(10, 'B160158CS', 'Your request for renewal of BookId: 1  has been accepted', '2018-10-16', '23:05:12'),
(11, 'B160158CS', 'Your request for renewal of BookId: 1  has been accepted', '2018-10-16', '23:09:51'),
(12, 'b160511cs', 'Your request for return of BookId: 6  has been accepted', '2018-10-16', '23:10:27'),
(13, 'b160511cs', 'Your request for return of BookId: 2  has been accepted', '2018-10-16', '23:36:10'),
(14, 'b160511cs', 'Your request for issue of BookId: 1  has been rejected', '2018-10-16', '23:36:20'),
(15, 'B160158CS', 'Your request for issue of BookId: 3  has been rejected', '2018-10-16', '23:43:37'),
(16, 'B160158CS', 'Your request for issue of BookId: 6  has been rejected', '2018-10-16', '23:43:42'),
(17, 'B160158CS', 'Your request for issue of BookId: 2  has been accepted', '2018-10-16', '23:47:31'),
(18, 'b160632cs', 'Your request for issue of BookId: 2  has been rejected', '2018-10-16', '23:47:34'),
(19, 'B160632CS', 'Your request for issue of BookId: 7  has been rejected', '2018-10-25', '23:25:25'),
(20, 'B160632CS', 'Your request for issue of BookId: 15  has been accepted', '2018-10-25', '23:25:27'),
(21, 'B160632CS', 'Your request for renewal of BookId: 3  has been accepted', '2018-10-25', '23:25:44'),
(22, 'b160632cs', 'Your request for return of BookId: 3  has been accepted', '2018-10-25', '23:25:48'),
(23, 'b160003ch', 'Your request for issue of BookId: 9  has been accepted', '2018-10-25', '23:27:46'),
(24, 'b160011ch', 'Your request for issue of BookId: 10  has been accepted', '2018-10-25', '23:27:49'),
(25, 'b160011ch', 'Your request for issue of BookId: 17  has been accepted', '2018-10-25', '23:27:53'),
(26, 'b160001cs', 'Your request for issue of BookId: 11  has been accepted', '2018-10-25', '23:27:57'),
(27, 'b160001cs', 'Your request for issue of BookId: 9  has been accepted', '2018-10-25', '23:30:41'),
(28, 'b160158cs', 'Your request for issue of BookId: 9  has been accepted', '2018-10-25', '23:30:43'),
(29, 'b160511cs', 'Your request for issue of BookId: 10  has been accepted', '2018-10-25', '23:30:46'),
(30, 'b160158cs', 'Your request for issue of BookId: 18  has been accepted', '2018-10-25', '23:30:49'),
(31, 'b160511cs', 'Your request for issue of BookId: 11  has been accepted', '2018-10-25', '23:30:58'),
(32, 'b160511cs', 'Your request for issue of BookId: 13  has been accepted', '2018-10-25', '23:31:01'),
(33, 'b160003ch', 'Your request for issue of BookId: 15  has been rejected', '2018-10-26', '03:04:51'),
(34, 'b160003ch', 'Your request for return of BookId: 9  has been accepted', '2025-06-09', '08:57:11'),
(35, '210098', 'Your request for issue of BookId: 11 has been accepted', '2025-06-09', '09:00:42'),
(36, '210098', 'Your request for issue of BookId: 12 has been accepted', '2025-06-09', '09:00:47'),
(37, '210098', 'Your request for issue of BookId: 18  has been rejected', '2025-06-14', '12:56:50'),
(38, '210098', 'Your request for issue of BookId: 4  has been rejected', '2025-06-14', '13:03:13'),
(39, '210098', 'Your request for issue of BookId: 7  has been rejected', '2025-06-14', '13:03:15'),
(40, '210098', 'Your request for issue of BookId: 9  has been rejected', '2025-06-14', '13:03:17'),
(41, '210098', 'Your request for issue of BookId: 18  has been rejected', '2025-06-14', '13:03:19'),
(42, '210098', 'Your request for issue of BookId: 8  has been rejected', '2025-06-14', '13:03:22'),
(43, '210098', 'Your request for issue of BookId: 6  has been rejected', '2025-06-14', '13:03:24'),
(44, 'b160158cs', 'Your request for issue of BookId: 3  has been rejected', '2025-06-14', '13:03:28'),
(45, 'b160158cs', 'Your request for issue of BookId: 4  has been rejected', '2025-06-14', '13:03:30'),
(46, '210098', 'Hello', '2025-06-14', '20:27:55'),
(47, 'b160511cs', 'Your request for issue of BookId: 18  has been rejected', '2025-06-14', '20:38:28'),
(48, 'b160511cs', 'Your request for issue of BookId: 17  has been rejected', '2025-06-14', '20:38:30'),
(49, 'b160158cs', 'Your request for issue of BookId: 17  has been rejected', '2025-06-14', '20:38:32'),
(50, 'b160003ch', 'Your request for issue of BookId: 14  has been rejected', '2025-06-14', '20:38:34'),
(51, 'b160001cs', 'Your request for issue of BookId: 12  has been rejected', '2025-06-14', '20:38:36'),
(52, 'b160158cs', 'Your request for issue of BookId: 7  has been rejected', '2025-06-14', '20:38:38'),
(53, 'b160511cs', 'Your request for issue of BookId: 7  has been rejected', '2025-06-14', '20:38:40'),
(54, 'B160632CS', 'Your request for issue of BookId: 17  has been rejected', '2025-06-14', '20:38:41'),
(55, 'b160001cs', 'Your request for issue of BookId: 3  has been rejected', '2025-06-14', '20:38:43'),
(56, '210098', 'Your request for issue of BookId: 19 has been accepted', '2025-06-14', '20:55:49'),
(57, '210098', 'Your request for renewal of BookId: 19 has been accepted', '2025-06-14', '20:59:01'),
(58, '210098', 'Your request for return of BookId: 11  has been accepted', '2025-06-14', '20:59:08');

-- --------------------------------------------------------

--
-- Table structure for table `recommendations`
--

CREATE TABLE `recommendations` (
  `R_ID` int(10) NOT NULL,
  `Book_Name` varchar(50) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `RollNo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recommendations`
--

INSERT INTO `recommendations` (`R_ID`, `Book_Name`, `Description`, `RollNo`) VALUES
(2, 'Book1', 'Descp1', 'B160158CS'),
(3, 'Book2', 'Descp2', 'B160158CS'),
(5, 'Operating System', 'An operating system (OS) is system software that manages computer hardware and software resources and provides common services for computer programs.', 'b160001cs'),
(7, 'Networks ', 'A computer network, or data network, is a digital telecommunications network which allows nodes to share resources. In computer networks, computing devices exchange data with each other using connections (data links) between nodes.', 'b160999cs'),
(8, 'String Theory', 'In physics, string theory is a theoretical framework in which the point-like particles of particle physics are replaced by one-dimensional objects called strings. It describes how these strings propagate through space and interact with each other.', 'b160777cs'),
(9, 'The Theory of Everything', 'The Theory of Everything', 'b160777cs'),
(10, 'Sample', 'The boy who shattered time', '210098'),
(11, 'League of Legends', 'A moba game that many players wants to be scene in the pro league.', '210098');

-- --------------------------------------------------------

--
-- Table structure for table `record`
--

CREATE TABLE `record` (
  `RollNo` varchar(50) NOT NULL,
  `BookId` int(10) NOT NULL,
  `Date_of_Issue` date DEFAULT NULL,
  `Due_Date` date DEFAULT NULL,
  `Date_of_Return` date DEFAULT NULL,
  `Dues` int(10) DEFAULT NULL,
  `Renewals_left` int(10) DEFAULT NULL,
  `Time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `record`
--

INSERT INTO `record` (`RollNo`, `BookId`, `Date_of_Issue`, `Due_Date`, `Date_of_Return`, `Dues`, `Renewals_left`, `Time`) VALUES
('210098', 7, NULL, NULL, NULL, NULL, NULL, '19:24:22'),
('210098', 11, '2025-06-09', '2025-12-06', '2025-06-14', -175, 1, '09:00:02'),
('210098', 12, '2025-06-09', '2025-12-06', NULL, NULL, 1, '09:00:18'),
('210098', 19, '2025-06-14', '2026-06-09', NULL, NULL, 0, '20:54:24'),
('b160001cs', 9, '2018-10-25', '2018-12-24', NULL, NULL, 1, '13:14:20'),
('b160001cs', 11, '2018-10-25', '2018-12-24', NULL, NULL, 1, '13:14:20'),
('b160003ch', 9, '2018-10-25', '2018-12-24', '2025-06-09', 2359, 1, '13:14:20'),
('b160011ch', 10, '2018-10-25', '2018-12-24', NULL, NULL, 1, '13:14:20'),
('b160011ch', 17, '2018-10-25', '2018-12-24', NULL, NULL, 1, '13:14:20'),
('b160111cs', 1, '2018-10-15', '2018-12-14', NULL, NULL, 1, '13:14:20'),
('B160158CS', 1, '2018-10-15', '2020-04-12', NULL, NULL, 0, '13:14:20'),
('B160158CS', 2, '2018-10-16', '2018-12-15', NULL, NULL, 1, '13:14:20'),
('b160158cs', 9, '2018-10-25', '2018-12-24', NULL, NULL, 1, '13:14:20'),
('b160158cs', 18, '2018-10-25', '2018-12-24', NULL, NULL, 1, '13:14:20'),
('b160511cs', 2, '2018-10-16', '2018-12-15', '2018-10-16', -60, 1, '13:14:20'),
('b160511cs', 6, '2018-10-16', '2018-12-15', '2018-10-16', -60, 1, '13:14:20'),
('b160511cs', 10, '2018-10-25', '2018-12-24', NULL, NULL, 1, '13:14:20'),
('b160511cs', 11, '2018-10-25', '2018-12-24', NULL, NULL, 1, '13:14:20'),
('b160511cs', 13, '2018-10-25', '2018-12-24', NULL, NULL, 1, '13:14:20'),
('b160632cs', 3, '2018-07-16', '2018-11-14', '2018-10-25', -20, 0, '13:14:20'),
('B160632CS', 15, '2018-10-25', '2018-12-24', NULL, NULL, 1, '13:14:20'),
('b160854cs', 6, '2018-10-16', '2019-04-14', NULL, NULL, 1, '13:14:20');

-- --------------------------------------------------------

--
-- Table structure for table `renew`
--

CREATE TABLE `renew` (
  `RollNo` varchar(50) NOT NULL,
  `BookId` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `renew`
--

INSERT INTO `renew` (`RollNo`, `BookId`) VALUES
('b160001cs', 11),
('b160158cs', 2),
('b160158cs', 9),
('b160158cs', 18),
('b160511cs', 11);

-- --------------------------------------------------------

--
-- Table structure for table `return`
--

CREATE TABLE `return` (
  `RollNo` varchar(50) NOT NULL,
  `BookId` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `return`
--

INSERT INTO `return` (`RollNo`, `BookId`) VALUES
('210098', 19),
('b160158cs', 1),
('b160158cs', 18),
('b160511cs', 10),
('b160511cs', 13);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `RollNo` varchar(50) NOT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Type` varchar(50) DEFAULT NULL,
  `Category` varchar(50) DEFAULT NULL,
  `EmailId` varchar(50) DEFAULT NULL,
  `MobNo` bigint(11) DEFAULT NULL,
  `Password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`RollNo`, `Name`, `Type`, `Category`, `EmailId`, `MobNo`, `Password`) VALUES
('210097', 'Tonyo Cabael', 'Student', 'ST', 'tonyo@gmail.com', 913456789, 'tonyo101'),
('210098', 'Anthony', 'Student', 'ST', 'jsmith@sample.com', 9123456789, '123456'),
('ADMIN', 'admin', 'Admin', NULL, 'admin@gmail.com', 123456789, 'admin'),
('b160001cs', 'John', 'Student', 'GEN', 'john@gmail.com', 9876543210, 'b160001cs'),
('b160002cs', 'Adam', 'Student', 'ST', 'adam@yahoo.com', 7845965212, 'b160002cs'),
('b160003ch', 'Alice', 'Student', 'OBC', 'alice@hotmail.com', 4512451245, 'b160003ch'),
('b160004me', 'Abbot', 'Student', 'GEN', 'abbot@gmail.com', 6352416352, 'b160004me'),
('b160005ce', 'bale', 'Student', 'SC', 'bale@gmail.com', 96685747485, 'b160005ce'),
('b160006cs', 'Bob', 'Student', 'GEN', 'bob@gmail.com', 4141415263, 'b160006cs'),
('b160007cs', 'Goku', 'Student', 'GEN', 'goku@yahoo.com', 4545451212, 'b160007cs'),
('b160008cs', 'Ben', 'Student', 'GEN', 'ben10@hotmail.com', 6352416345, 'b160008cs'),
('b160009cs', 'Ash', 'Student', 'GEN', 'ash@yahoo.com', 7845124578, 'b160009cs'),
('b160010cs', 'Harry', 'Student', 'GEN', 'harry@hotmail.com', 4578457845, 'b160010cs'),
('b160011ch', 'Gwen', 'Student', 'GEN', 'gwen@yahoo.com', 9685747474, 'b160011ch'),
('b160012me', 'Kevin', 'Student', 'ST', 'kevin11@hotmail.com', 1242425163, 'b160012me'),
('b160013ee', 'Max', 'Student', 'OBC', 'max@gmail.com', 9685748574, 'b160013ee'),
('B160111Cs', 'Bharat', 'Student', 'GEN', 'bharat@gmail.com', 123456, 'abcd'),
('B160158CS', 'MANU', 'Student', 'GEN', 'manu@gmail.com', 8365917597, 'manu'),
('b160257me', 'Eve', 'Student', 'GEN', 'eve@gmail.com', 5451525356, 'b160257me'),
('b160321ec', 'Joey', 'Student', 'SC', 'joey@yahoo.com', 9898982020, 'b160321ec'),
('b160412cs', 'Barney', 'Student', 'ST', 'legendary@gmail.com', 9695989192, 'b160412cs'),
('b160423cs', 'Rachel', 'Student', 'GEN', 'rachel@gmail.com', 7475787671, 'b160423cs'),
('B160511CS', 'MALHAR', 'Student', 'OBC', 'malhar@gmail.com', 9756153859, 'abcd'),
('B160632CS', 'KENIL', 'Student', 'GEN', 'kenilshah081198@gmail.com', 9892506094, '1234'),
('b160777cs', 'Sheldon', 'Student', 'GEN', 'smartestpersoninroom@gmail.com', 9696969696, 'b160777cs'),
('b160854cs', 'Ram Prabhu', 'Student', 'SC', 'ram@nitc.ac.in', 968599, '1234'),
('b160951cs', 'Misty', 'Student', 'SC', 'watermaster@hotmail.com', 4145424847, 'b160951cs'),
('b160999cs', 'Chandler', 'Student', 'OBC', 'sarcasticlord@hotmail.com', 9494959694, 'b160999cs'),
('student', 'Lebron James', 'Student', 'OBC', 'lebron1@gmail.com', 911345678, '101lebron');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`BookId`,`Author`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`BookId`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`M_Id`),
  ADD KEY `RollNo` (`RollNo`);

--
-- Indexes for table `recommendations`
--
ALTER TABLE `recommendations`
  ADD PRIMARY KEY (`R_ID`),
  ADD KEY `RollNo` (`RollNo`);

--
-- Indexes for table `record`
--
ALTER TABLE `record`
  ADD PRIMARY KEY (`RollNo`,`BookId`),
  ADD KEY `BookId` (`BookId`);

--
-- Indexes for table `renew`
--
ALTER TABLE `renew`
  ADD PRIMARY KEY (`RollNo`,`BookId`),
  ADD KEY `BookId` (`BookId`);

--
-- Indexes for table `return`
--
ALTER TABLE `return`
  ADD PRIMARY KEY (`RollNo`,`BookId`),
  ADD KEY `BookId` (`BookId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`RollNo`),
  ADD UNIQUE KEY `EmailId` (`EmailId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `BookId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `M_Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `recommendations`
--
ALTER TABLE `recommendations`
  MODIFY `R_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `author`
--
ALTER TABLE `author`
  ADD CONSTRAINT `author_ibfk_1` FOREIGN KEY (`BookId`) REFERENCES `book` (`BookId`);

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`RollNo`) REFERENCES `user` (`RollNo`);

--
-- Constraints for table `recommendations`
--
ALTER TABLE `recommendations`
  ADD CONSTRAINT `recommendations_ibfk_1` FOREIGN KEY (`RollNo`) REFERENCES `user` (`RollNo`);

--
-- Constraints for table `record`
--
ALTER TABLE `record`
  ADD CONSTRAINT `record_ibfk_1` FOREIGN KEY (`RollNo`) REFERENCES `user` (`RollNo`),
  ADD CONSTRAINT `record_ibfk_2` FOREIGN KEY (`BookId`) REFERENCES `book` (`BookId`);

--
-- Constraints for table `renew`
--
ALTER TABLE `renew`
  ADD CONSTRAINT `renew_ibfk_1` FOREIGN KEY (`RollNo`) REFERENCES `user` (`RollNo`),
  ADD CONSTRAINT `renew_ibfk_2` FOREIGN KEY (`BookId`) REFERENCES `book` (`BookId`);

--
-- Constraints for table `return`
--
ALTER TABLE `return`
  ADD CONSTRAINT `return_ibfk_1` FOREIGN KEY (`RollNo`) REFERENCES `user` (`RollNo`),
  ADD CONSTRAINT `return_ibfk_2` FOREIGN KEY (`BookId`) REFERENCES `book` (`BookId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
