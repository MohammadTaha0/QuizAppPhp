-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2023 at 11:38 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `mcq_question`
--

CREATE TABLE `mcq_question` (
  `id` int(11) NOT NULL,
  `name` varchar(4) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `ques` varchar(80) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `o1` varchar(21) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `o2` varchar(23) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `o3` varchar(21) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `ans` varchar(23) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mcq_question`
--

INSERT INTO `mcq_question` (`id`, `name`, `ques`, `o1`, `o2`, `o3`, `ans`) VALUES
(1, 'HTML', ' Who is the father of HTML?', 'Rasmus Lerdorf', 'Tim Berners-Lee', 'Brendan Eich', 'Tim Berners-Lee'),
(2, 'HTML', 'Which of the following is used to read an HTML page and render it?', 'Web server', 'Web network', 'Web browser', 'Web browser'),
(3, 'HTML', ' In which part of the HTML metadata is contained?', 'head tag', ' title tag', 'html tag', 'head tag'),
(4, 'HTML', ' Which element is used to get highlighted text in HTML5?', '<u>', '<mark>', '<highlight>', '<mark>'),
(5, 'HTML', 'Which of the following is not the element associated with the HTML table layout?', 'alignment', 'color', 'size', 'color'),
(6, 'HTML', 'Which element is used for or styling HTML5 layout?', 'CSS', 'jQuery', 'JavaScript', 'CSS'),
(7, 'C#', 'How many Bytes are stored by ‘Long’ Data type in C# .net?', '8', '4', '2', '8'),
(8, 'C#', 'Correct Declaration of Values to variables ‘a’ and ‘b’?', 'int a = 32, b = 40.6;', 'int a = 32; int b = 40;', 'int a = b = 42;', 'int a = 32; int b = 40;'),
(9, 'C#', 'Default Type of number without decimal is?', 'Long Int', 'Int', 'Unsigned Long', 'Int'),
(10, 'C#', 'Choose the base class for string() method:', 'System.Array', 'System.char', 'System.String', 'System.String'),
(11, 'C#', 'Types of ‘Data Conversion’ in C#?', 'Explicit Conversion', 'Implicit Conversion', 'None of the mentioned', 'Explicit Conversion'),
(12, 'C#', 'The subset of ‘int’ data type is __________', 'long, float, double', 'long, ulong, uint', 'long, ulong, ushort', 'long, float, double'),
(13, 'MVC', ' In which part of the HTML metadata is contained?', 'head tag', ' title tag', 'html tag', 'head tag'),
(14, 'MVC', ' Which element is used to get highlighted text in HTML5?', '<u>', '<mark>', '<highlight>', '<mark>'),
(15, 'MVC', 'Which of the following is not the element associated with the HTML table layout?', 'alignment', 'color', 'size', 'color'),
(16, 'MVC', 'Default Type of number without decimal is?', 'Long Int', 'Int', 'Unsigned Long', 'Int'),
(17, 'MVC', 'Choose the base class for string() method:', 'System.Array', 'System.char', 'System.String', 'System.String'),
(18, 'MVC', 'MVC Stand for', 'Model view center', 'Model View Controller', 'Model date conroller', 'Model View Controller');

-- --------------------------------------------------------

--
-- Table structure for table `std`
--

CREATE TABLE `std` (
  `id` bigint(20) NOT NULL,
  `name` varchar(111) NOT NULL,
  `user` varchar(111) NOT NULL,
  `pass` varchar(111) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `std`
--

INSERT INTO `std` (`id`, `name`, `user`, `pass`, `date`) VALUES
(1, 'Mohammad taha', 'Taha', 'Taha', '2023-02-26 01:59:08'),
(2, 'Moiz Hussain', 'Moiz', 'moiz', '2023-02-26 01:59:08');

-- --------------------------------------------------------

--
-- Table structure for table `stdres`
--

CREATE TABLE `stdres` (
  `id` bigint(20) NOT NULL,
  `stdId` bigint(20) NOT NULL,
  `subj` varchar(122) NOT NULL,
  `tQues` bigint(20) NOT NULL,
  `res` bigint(20) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stdres`
--

INSERT INTO `stdres` (`id`, `stdId`, `subj`, `tQues`, `res`, `date`) VALUES
(6, 1, 'html', 4, 2, '2023-02-27 15:37:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mcq_question`
--
ALTER TABLE `mcq_question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `std`
--
ALTER TABLE `std`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stdres`
--
ALTER TABLE `stdres`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mcq_question`
--
ALTER TABLE `mcq_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `std`
--
ALTER TABLE `std`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stdres`
--
ALTER TABLE `stdres`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
