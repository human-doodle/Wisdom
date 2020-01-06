-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2018 at 09:46 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wisdom`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `id` int(11) NOT NULL,
  `author` varchar(50) NOT NULL,
  `adescription` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`id`, `author`, `adescription`) VALUES
(1, 'ABC', 'BORN ON XX-XX-XXXX SHE IS ONE OF THE FINE WITER. CAPTIVATING THE AUDIENCE WITH EXCEPTIONAL STORIES! '),
(2, 'DEF', 'B BORN ON XX-XX-XXXX SHE IS ONE OF THE FINE WITER. CAPTIVATING THE AUDIENCE WITH EXCEPTIONAL STORIES! ');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `isbn` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `author` varchar(50) NOT NULL,
  `publication` varchar(50) NOT NULL,
  `rating` int(11) NOT NULL,
  `file` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `genre` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`isbn`, `name`, `author`, `publication`, `rating`, `file`, `image`, `genre`) VALUES
(1, 'harry potter', 'abc', '2011', 5, 'harrypotter.pdf', 'pics/book1.jpg', 'fiction'),
(2, 'harry potter2', 'abc', '2013', 5, 'hp2.pdf', 'pics/book5.jpg', 'biography'),
(3, 'harrypotter3', 'def', '2012', 4, 'hp3.pdf', 'pics/fiction.jpg', 'children'),
(4, 'harry potter4', 'abc', '2015', 5, 'hp4.pdf', 'pics/children.jpg', 'fiction'),
(5, 'hp5', 'abc', '2013', 5, 'hp5.pdf', 'pics/biography.jpg', 'biography'),
(6, 'hp6', 'abc', '2011', 5, 'harrypotter.pdf', 'pics/fiction.jpg', 'fiction');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`isbn`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
