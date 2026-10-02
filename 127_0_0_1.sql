-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 28, 2025 at 03:23 AM
-- Server version: 9.1.0
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms2`
--
CREATE DATABASE IF NOT EXISTS `lms2` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `lms2`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `adminid` int NOT NULL AUTO_INCREMENT,
  `username` varchar(111) NOT NULL,
  `fullname` varchar(111) NOT NULL,
  `adminemail` varchar(111) NOT NULL,
  `password` varchar(111) NOT NULL,
  `pic` varchar(100) NOT NULL,
  PRIMARY KEY (`adminid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `username`, `fullname`, `adminemail`, `password`, `pic`) VALUES
(1, 'shubham', 'marakanashubham', 'shubham@gmail.com', '1712', 'user2.png'),
(2, 'vishant', 'vishant', 'vishant@gmail.com', 'Vishant369', 'user2.png');

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

DROP TABLE IF EXISTS `authors`;
CREATE TABLE IF NOT EXISTS `authors` (
  `authorid` int NOT NULL AUTO_INCREMENT,
  `authorname` varchar(111) NOT NULL,
  PRIMARY KEY (`authorid`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`authorid`, `authorname`) VALUES
(9, 'Bjarne Stroustrup'),
(11, 'Anthony Brun'),
(14, 'E. Balagurusamy'),
(15, 'Ken Liu'),
(16, 'A.G Riddle'),
(17, 'Rakib Hassan'),
(18, 'Rob Boffard'),
(19, 'Khaled Hosseini'),
(20, 'Sandra Block'),
(21, 'J.R.R. Tolkien'),
(22, 'William Goldman'),
(24, 'Md. Zafar Iqbal Hassan'),
(29, 'James Patterson'),
(30, 'shubham m');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `bookid` int NOT NULL AUTO_INCREMENT,
  `bookpic` varchar(500) NOT NULL,
  `bookname` varchar(100) NOT NULL,
  `authorid` int NOT NULL,
  `categoryid` int NOT NULL,
  `ISBN` varchar(100) NOT NULL,
  `price` int NOT NULL,
  `quantity` int NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`bookid`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bookid`, `bookpic`, `bookname`, `authorid`, `categoryid`, `ISBN`, `price`, `quantity`, `status`) VALUES
(20, 'cplus.jpg', 'C++', 15, 2, '27899', 200, 7, 'Available'),
(22, 'python2.jpg', 'Python Programming', 11, 2, '2456', 600, 4, 'Available'),
(28, 'c.jpg', 'C Programming in ANSI', 14, 2, '24512', 200, 8, 'Available'),
(29, 'sf1.jpg', 'Borken Stars', 15, 1, '2487', 300, 8, 'Available'),
(30, 'sf2.jpg', 'The Solar War', 16, 1, '27899', 200, 6, 'Available'),
(31, 'sf3.jpg', 'Star Wars', 17, 1, '254789', 600, 8, 'Available'),
(32, 'sf4.jpg', 'Adrift', 18, 1, '24569', 500, 7, 'Available'),
(33, 'nv1.jpg', 'The Kite Runner', 19, 3, '23658', 600, 7, 'Available'),
(34, 'nv2.jpg', 'The Girl Without a Name', 20, 3, '21569', 300, 6, 'Available'),
(35, 'nv3.jpg', 'The Hobbit', 21, 3, '21569', 600, 9, 'Available'),
(36, 'nv4.jpg', 'The Princess Bride', 22, 3, '21456', 500, 6, 'Available'),
(40, 'java.jpg', 'Java', 29, 2, '24512', 500, 8, 'Available'),
(41, 'IMG-20250727-WA0034.jpg', 'TEX BOOK OG HISTORY', 11, 3, '54879', 600, 20, 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `categoryid` int NOT NULL AUTO_INCREMENT,
  `categoryname` varchar(111) NOT NULL,
  PRIMARY KEY (`categoryid`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryid`, `categoryname`) VALUES
(1, 'Science FIction'),
(2, 'Computer Programming'),
(3, 'Novel'),
(4, 'History'),
(11, 'Medical & Health');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `stdid` int NOT NULL,
  `rating` int NOT NULL,
  `comment` varchar(1000) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`stdid`, `rating`, `comment`, `date`) VALUES
(1, 5, 'I just love it', '2021-04-23'),
(3, 4, 'I just like it', '2021-04-23'),
(4, 3, 'It is awesome. Overall good', '2021-04-23'),
(1, 2, 'I dont like it', '2021-04-23');

-- --------------------------------------------------------

--
-- Table structure for table `issueinfo`
--

DROP TABLE IF EXISTS `issueinfo`;
CREATE TABLE IF NOT EXISTS `issueinfo` (
  `studentid` int NOT NULL,
  `bookid` int NOT NULL,
  `issuedate` date NOT NULL,
  `returndate` date NOT NULL,
  `approve` varchar(200) NOT NULL,
  `fine` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `issueinfo`
--

INSERT INTO `issueinfo` (`studentid`, `bookid`, `issuedate`, `returndate`, `approve`, `fine`) VALUES
(3, 20, '0000-00-00', '0000-00-00', '', 0),
(1, 22, '2021-04-19', '2021-04-21', '<p style=\"color:yellow; background-color:red;\">EXPIRED</p>', 20),
(23, 32, '2025-08-13', '2025-08-25', 'RETURNED', 0),
(23, 29, '0000-00-00', '0000-00-00', '', 0),
(23, 22, '0000-00-00', '0000-00-00', '', 0),
(23, 20, '0000-00-00', '0000-00-00', '', 0),
(23, 36, '2025-08-13', '2025-08-25', '<p style=\"color:yellow; background-color:red;\">EXPIRED</p>', 20),
(27, 31, '2025-08-13', '2025-08-15', 'shubham', 0),
(27, 36, '2025-08-13', '2025-08-19', '<p style=\"color:yellow; background-color:green;\">RETURNED</p>', 0),
(27, 33, '2025-08-16', '2025-08-22', 'RETURNED', 0),
(27, 29, '2025-08-21', '2025-08-22', '<p style=\"color:yellow; background-color:red;\">EXPIRED</p>', 20),
(27, 40, '2025-08-19', '2025-08-21', '<p style=\"color:yellow; background-color:green;\">RETURNED</p>', 0),
(27, 20, '2025-08-24', '2025-08-25', '<p style=\"color:yellow; background-color:red;\">EXPIRED</p>', 20),
(27, 34, '2025-09-12', '2026-05-12', 'yes', 0);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `status` varchar(100) NOT NULL,
  `sender` varchar(100) NOT NULL,
  `date` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `username`, `message`, `status`, `sender`, `date`) VALUES
(2, 'Tahmid12', 'hello', 'yes', 'student', '04/20/2021 Tuesday, 05:08 PM'),
(3, 'Tahmid12', 'how are you??', 'yes', 'student', '04/20/2021 Tuesday, 05:08 PM'),
(4, 'Omur', 'I need a book. Can you help me??', 'yes', 'student', '04/23/2021 Friday, 12:27 PM'),
(5, 'Omur', 'Hello', 'no', 'admin', '04/23/2021 Friday, 12:58 PM'),
(6, 'Tahmid12', 'hello', 'yes', 'student', '04/23/2021 Friday, 01:00 PM'),
(7, 'Omur', 'how are you', 'no', 'admin', '04/23/2021 Friday, 02:00 PM'),
(8, 'Tahmid12', 'hello', 'yes', 'admin', '04/23/2021 Friday, 02:00 PM'),
(9, 'Tahmid12', 'hello', 'yes', 'student', '04/23/2021 Friday, 02:01 PM'),
(10, 'Tahmid12', 'how are you', 'yes', 'admin', '04/23/2021 Friday, 06:13 PM'),
(11, 'Tahmid12', 'hello i need a book', 'yes', 'student', '04/23/2021 Friday, 07:02 PM'),
(12, 'Tahmid12', 'hello', 'no', 'admin', '04/23/2021 Friday, 07:24 PM');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `studentid` int NOT NULL AUTO_INCREMENT,
  `student_username` varchar(111) NOT NULL,
  `FullName` varchar(111) NOT NULL,
  `Email` varchar(111) NOT NULL,
  `Password` varchar(111) NOT NULL,
  `PhoneNumber` varchar(111) NOT NULL,
  `studentpic` varchar(100) NOT NULL,
  PRIMARY KEY (`studentid`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentid`, `student_username`, `FullName`, `Email`, `Password`, `PhoneNumber`, `studentpic`) VALUES
(27, 'SHUBHAM', 'SHUBHAM MARAKNA', 'shubhammarakana290@gmail.com', '123', '9313633201', 'user2.png'),
(28, 'shubham', 'shubham Marakana', 'shubhammarakana290@outlook.com', '123', '9313633201', 'user2.png');

-- --------------------------------------------------------

--
-- Table structure for table `timer`
--

DROP TABLE IF EXISTS `timer`;
CREATE TABLE IF NOT EXISTS `timer` (
  `stdid` int NOT NULL,
  `bid` int NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `timer`
--

INSERT INTO `timer` (`stdid`, `bid`, `date`) VALUES
(1, 22, '2021-04-21 23:22:00'),
(23, 32, '2025-08-25 23:02:00'),
(23, 36, '2025-08-25 02:22:00'),
(27, 33, '2025-08-22 02:02:00'),
(27, 29, '2025-08-21 02:07:00'),
(27, 34, '2025-08-21 21:13:00'),
(27, 20, '2025-08-25 02:22:00');

-- --------------------------------------------------------

--
-- Table structure for table `trendingbook`
--

DROP TABLE IF EXISTS `trendingbook`;
CREATE TABLE IF NOT EXISTS `trendingbook` (
  `bookid` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trendingbook`
--

INSERT INTO `trendingbook` (`bookid`) VALUES
(22),
(20),
(33),
(28);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

