-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2019 at 11:35 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz2`
--
CREATE DATABASE IF NOT EXISTS `quiz3` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `quiz3`;

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE IF NOT EXISTS `answer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mark` int(11) NOT NULL,
  `fullMark` int(11) NOT NULL,
  `quizID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `answer`:
--   `quizID`
--       `quiz` -> `id`
--   `userID`
--       `user` -> `id`
--

--
-- Dumping data for table `answer`
--

INSERT IGNORE INTO `answer` (`id`, `mark`, `fullMark`, `quizID`, `userID`) VALUES
(2, 1, 2, 13, 2),
(8, 0, 2, 12, 2),
(12, 0, 1, 15, 2),
(23, 0, 5, 16, 2),
(27, 0, 1, 20, 2),
(28, 1, 2, 22, 7),
(30, 1, 1, 23, 2),
(35, 0, 1, 23, 7),
(36, 0, 5, 16, 7);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(255) NOT NULL,
  `quizID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `comment`:
--   `quizID`
--       `quiz` -> `id`
--   `userID`
--       `user` -> `id`
--

--
-- Dumping data for table `comment`
--

INSERT IGNORE INTO `comment` (`id`, `content`, `quizID`, `userID`) VALUES
(1, 'Smash is an awesome quiz', 12, 1),
(2, 'hi there ', 12, 1),
(3, 'I love test 11', 11, 1),
(4, 'Are you ready for this quiz?', 13, 1),
(5, ':D', 11, 1),
(6, 'ddddaaa', 15, 1),
(7, 'Why you smiling?', 11, 1),
(8, 'YEEEHAW', 16, 1),
(9, 'http://localhost/quizgo/html/student/student-home.php#', 11, 1),
(10, 'http://localhost/quizgo/html/student/student-home.php#', 11, 1),
(11, 'ho', 11, 1),
(12, 'ssss', 11, 2),
(13, 'wwwww', 11, 1),
(14, 'ssss', 11, 1),
(15, 'sssssssssa', 11, 2),
(17, 'Smash is an awesome quiz', 11, 2),
(18, 'ssss', 11, 2),
(21, 'aaaa', 11, 2),
(22, 'aaaa', 11, 2),
(23, 'aaaa', 11, 2),
(24, 'sss', 11, 2),
(28, 'aaaa', 12, 1),
(29, 'ssssss', 12, 1),
(30, 'aaaaaaa:DDD', 12, 1),
(31, 'wwwwwwww', 12, 1),
(32, 'wwwwww', 11, 2),
(33, 'qqqqq', 11, 2),
(34, 'wwwwwwwwwwwwwwwwwwww', 12, 2),
(35, 'sssss', 11, 2),
(36, 'hi', 22, 7),
(37, 'hi fatima :\')', 22, 6),
(38, 'sssssssss', 13, 7),
(39, 'qqqqqqq', 23, 8),
(40, 'hi bitches', 11, 3),
(41, 'bye', 11, 9),
(42, 'aaaa', 11, 9);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `statement` varchar(255) NOT NULL,
  `a` varchar(255) NOT NULL,
  `b` varchar(255) NOT NULL,
  `c` varchar(255) NOT NULL,
  `d` varchar(255) NOT NULL,
  `correctAnswer` varchar(255) NOT NULL,
  `quizID` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `quiz_id` (`quizID`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `question`:
--   `quizID`
--       `quiz` -> `id`
--

--
-- Dumping data for table `question`
--

INSERT IGNORE INTO `question` (`id`, `statement`, `a`, `b`, `c`, `d`, `correctAnswer`, `quizID`) VALUES
(7, 'what is the future?', 'nothing special', 'everything', 'Now is the future', 'me', 'Now is the future', 11),
(8, 'who is Marco?', 'Italian doctor', 'Italian plumper', 'Italian cook', 'Italian pizza specialist', 'Italian pizza specialist', 12),
(9, 'who is tan?', 'random name', 'someone\'s bride', 'bowser\'s bride', 'a top tier', 'someone\'s bride', 12),
(10, 'sss', 'ss', 'new correct answer', 'cc', 'old answer', 'new correct answer', 13),
(11, 'new question statement', 'new correct answer', 'gsdvgsdgv', 'old correct', 'asdasdasd', 'new correct answer', 13),
(12, 'qqq', 'qqq', 'qqq', 'qqq', 'qqqq', 'qqqq', 15),
(13, 'Who ... Are You ?', '....', 'Name', 'Evanlight', 'None', 'Name', 16),
(14, 'Choose a race (?)', 'Nord', 'lizard man', 'kajit', 'imperial', 'Nord', 16),
(15, 'Who is Alduin ?', 'Big Dark Dragon', 'Bad Bad Something', 'Bad Bad Dragon', 'A son of akatosh', 'A son of akatosh', 16),
(16, 'Do you like this quiz ?', 'no', 'yes', 'yes and no', 'maybe', 'yes', 16),
(17, 'Quize or Quiz ?', 'Quizet', 'Quize', 'Quiz', 'Yes', 'Yes', 16),
(18, 'ssss', 'sssss', 'sss', 'sss', 'sssss', 'sssss', 11),
(19, 'ssss', 'sssss', 'sss', 'sss', 'sssss', 'sssss', 11),
(20, 'ss', 'sss', 'sss', 'sss', 'ss', 'ss', 11),
(21, 'ss', 'sss', 'sss', 'sss', 'ss', 'ss', 20),
(22, 'hola', 'd', 'f', 'g', 'h', 'f', 21),
(23, 'kko', 'e', 'c', 'w', 'q', 'q', 21),
(24, 'ere', 'ew', 'e', 'w', 'q', 'e', 22),
(25, 'rr', 'rr', 'wt', 'w', 't', 'wt', 22),
(26, 'sdfcsdvsgsdvsd', 'sqqq', 's', 's', 's', 's', 23);

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE IF NOT EXISTS `quiz` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `startDate` datetime NOT NULL,
  `endDate` datetime NOT NULL,
  `timer` time NOT NULL,
  `numOfQ` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `userID` (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `quiz`:
--   `userID`
--       `user` -> `id`
--

--
-- Dumping data for table `quiz`
--

INSERT IGNORE INTO `quiz` (`id`, `title`, `description`, `startDate`, `endDate`, `timer`, `numOfQ`, `userID`) VALUES
(11, 'test 11', 'test 11 desc', '2020-01-01 01:00:00', '2020-02-01 01:00:00', '01:00:00', 1, 2),
(12, 'smash on switch', 'smash is a fighting game that has all types of amazing nintendo characters', '2019-08-16 05:50:00', '2034-02-03 01:00:00', '21:00:00', 2, 1),
(13, 'ooad', 'this is ooad quiz desc', '2019-02-02 02:00:00', '2019-02-02 02:00:22', '14:00:00', 2, 1),
(15, 'dddd', 'ddddddddddddd', '2019-01-01 01:00:00', '2021-01-01 03:00:00', '00:00:09', 1, 1),
(16, 'Quize Science ', 'Quize wronfg\r\n\r\nmore importantly questions 123', '2019-09-28 04:00:00', '2019-10-03 00:00:00', '00:00:05', 5, 1),
(20, 'www', 'www', '2019-01-01 01:00:00', '2022-01-01 02:00:00', '01:00:00', 1, 4),
(21, 'qq', 'fgh', '2019-09-29 20:45:00', '2018-09-29 20:50:00', '00:05:00', 2, 6),
(22, 'ee', 'eee', '2019-09-28 20:48:00', '2019-09-30 16:04:00', '00:05:00', 2, 6),
(23, 'aa', 'aa', '2019-01-01 01:00:00', '2022-01-01 01:00:00', '01:00:00', 1, 8);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `repassword` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `user`:
--

--
-- Dumping data for table `user`
--

INSERT IGNORE INTO `user` (`id`, `firstName`, `lastName`, `email`, `password`, `repassword`, `type`) VALUES
(1, 'Ayman', 'Yousef', 'aayyash9@gmail.com', '2', '', 'Lecturer'),
(2, 'Maryam', '', 'aayyash9@gmail.com', '6666', '', 'Student'),
(3, 'Abdulrahman', 'Yousef', 'aayyash9@gmail.com', '3', '1', 'Advisor'),
(4, 'Ahmed', 'Mohammed', '1161302846@student.mmu.edu.my', 'aa11', 'aa11', 'Lecturer'),
(5, 'Khaled', 'Saleh', '1161@student.mmu.edu.my', 'aa22', 'aa22', 'Student'),
(6, 'hola', 'mola', '1151300052@mmu.edu.my', '12345', '12345', 'Lecturer'),
(7, 'fatima', 'ahmad', '1151300051@mmu.edu.my', '55', '55', 'Student'),
(8, 'Abdulrahman', 'Yousef', 'aayyash9@gmail.com', '11', '11', 'Lecturer'),
(9, 'sho', 'aa', 'aayyash9@gmail.com', '33', '33', 'Advisor'),
(10, 'bo', 'la', 'aayyash99@gmail.com', '1', '1', 'Lecturer'),
(11, 'shak', 'tewr', 'shak@gmail.com', '2', '2', 'Lecturer'),
(12, 'Abdulrahman', 'Yousef', '555@gmail.com', '1', '1', 'Lecturer'),
(13, 'mohammed', 'Lee', '1@1.1', 'M', 'M', 'Lecturer');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `quiz_id_cn` FOREIGN KEY (`quizID`) REFERENCES `quiz` (`id`),
  ADD CONSTRAINT `user_id_cn` FOREIGN KEY (`userID`) REFERENCES `user` (`id`);

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `quiz_id_c` FOREIGN KEY (`quizID`) REFERENCES `quiz` (`id`),
  ADD CONSTRAINT `user_id_c` FOREIGN KEY (`userID`) REFERENCES `user` (`id`);

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `quiz_id` FOREIGN KEY (`quizID`) REFERENCES `quiz` (`id`);

--
-- Constraints for table `quiz`
--
ALTER TABLE `quiz`
  ADD CONSTRAINT `fk_userID` FOREIGN KEY (`userID`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
