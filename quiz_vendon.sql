-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2019 at 09:54 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz_vendon`
--

-- --------------------------------------------------------

--
-- Table structure for table `choices`
--

CREATE TABLE `choices` (
  `id` int(11) NOT NULL,
  `question_number` int(11) NOT NULL,
  `is_true` tinyint(1) NOT NULL DEFAULT 0,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `choices`
--

INSERT INTO `choices` (`id`, `question_number`, `is_true`, `text`) VALUES
(1, 1, 1, 'Riga'),
(2, 1, 0, 'USA'),
(3, 1, 0, 'Mars'),
(4, 2, 0, 'Trumps house'),
(5, 2, 0, 'Siberia'),
(6, 2, 0, 'St. Petersburg'),
(7, 2, 0, 'Italy'),
(8, 2, 1, 'Moscow'),
(9, 3, 1, 'Tallinn'),
(10, 3, 0, 'Andromeda');

-- --------------------------------------------------------

--
-- Table structure for table `choices_math`
--

CREATE TABLE `choices_math` (
  `id` int(11) NOT NULL,
  `question_number` int(11) NOT NULL,
  `is_true` tinyint(1) NOT NULL DEFAULT 0,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `choices_math`
--

INSERT INTO `choices_math` (`id`, `question_number`, `is_true`, `text`) VALUES
(1, 1, 1, '4'),
(2, 1, 0, '2'),
(3, 1, 0, '8'),
(4, 2, 0, '25'),
(5, 2, 1, '10'),
(6, 3, 0, '1'),
(7, 3, 0, '1000'),
(8, 3, 0, '10'),
(9, 3, 0, '100'),
(10, 3, 1, '0'),
(11, 4, 1, '100'),
(12, 4, 0, '1'),
(13, 4, 0, '99'),
(14, 4, 0, '50'),
(15, 5, 1, '1'),
(16, 5, 0, '54');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `question_number` int(11) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_number`, `text`) VALUES
(1, 'What is the capital of Latvia?'),
(2, 'What is the capital of Russia?'),
(3, 'What is the capital of Estonia?');

-- --------------------------------------------------------

--
-- Table structure for table `questions_math`
--

CREATE TABLE `questions_math` (
  `question_number` int(11) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questions_math`
--

INSERT INTO `questions_math` (`question_number`, `text`) VALUES
(1, 'How much is 2*2?'),
(2, 'How much is 5+5?'),
(3, 'How much is 0/100?'),
(4, 'How much is 100/1?'),
(5, 'How much is 5-4?');

-- --------------------------------------------------------

--
-- Table structure for table `user_results`
--

CREATE TABLE `user_results` (
  `user_id` int(11) NOT NULL,
  `Name` text NOT NULL,
  `quiz_chosen` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `Question1` text NOT NULL,
  `Question2` text NOT NULL,
  `Question3` text NOT NULL,
  `Question4` text NOT NULL,
  `Question5` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_results`
--

INSERT INTO `user_results` (`user_id`, `Name`, `quiz_chosen`, `score`, `Question1`, `Question2`, `Question3`, `Question4`, `Question5`) VALUES
(177, 'ndrixxxx', 2, 2, '4', '25', '1', '100', '54'),
(178, 'sff', 2, 1, '2', '10', '100', '99', '54'),
(179, 'ss', 1, 1, 'Riga', 'Siberia', 'Andromeda', '', ''),
(180, 'dd', 1, 1, 'Riga', 'USA', 'Siberia', '', ''),
(181, 'dd', 1, 0, 'USA', 'St. Petersburg', 'Andromeda', '', ''),
(182, ' vdv', 1, 2, 'Riga', 'Trumps house', 'Tallinn', '', ''),
(183, 'gg', 1, 1, 'Riga', 'Trumps house', 'Andromeda', '', ''),
(184, 'gne', 1, 1, 'Riga', 'Siberia', 'Andromeda', '', ''),
(185, 'ss', 2, 2, '4', '10', '1000', '1', '54'),
(186, 'f', 2, 2, '4', '10', '1000', '99', '54'),
(187, 'f', 1, 0, 'USA', 'Siberia', 'Andromeda', '', ''),
(188, 'ss', 2, 0, '2', '25', '10', '1', '54'),
(189, 'ff', 2, 1, '2', '10', '10', '99', '54'),
(190, 'fggf', 1, 0, 'USA', 'Siberia', 'Andromeda', '', ''),
(191, '1andriks', 1, 1, 'Riga', 'Trumps house', 'Andromeda', '', ''),
(192, 'Andris', 2, 4, '2', '10', '0', '100', '1'),
(193, 'ffg', 1, 1, 'USA', 'St. Petersburg', 'Tallinn', '', ''),
(194, 'dg', 2, 5, '4', '10', '0', '100', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `choices`
--
ALTER TABLE `choices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `choices_math`
--
ALTER TABLE `choices_math`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`question_number`);

--
-- Indexes for table `questions_math`
--
ALTER TABLE `questions_math`
  ADD PRIMARY KEY (`question_number`);

--
-- Indexes for table `user_results`
--
ALTER TABLE `user_results`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `choices`
--
ALTER TABLE `choices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `choices_math`
--
ALTER TABLE `choices_math`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_results`
--
ALTER TABLE `user_results`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
