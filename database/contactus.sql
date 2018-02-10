-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 23 авг 2016 в 18:27
-- Версия на сървъра: 10.1.13-MariaDB
-- PHP Version: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `olypm`
--

-- --------------------------------------------------------

--
-- Структура на таблица `contactus`
--

CREATE TABLE `contactus` (
  `id` int(11) NOT NULL,
  `name` varchar(80) COLLATE utf8_bin NOT NULL,
  `age` int(11) NOT NULL,
  `body` text COLLATE utf8_bin NOT NULL,
  `education` varchar(300) COLLATE utf8_bin NOT NULL,
  `passion` varchar(300) COLLATE utf8_bin NOT NULL,
  `work` varchar(300) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Схема на данните от таблица `contactus`
--

INSERT INTO `contactus` (`id`, `name`, `age`, `body`, `education`, `passion`, `work`) VALUES
(1, '', 0, '<p>asdasd</p>', '', '', ''),
(2, '', 0, '<p>asdasd</p>', '', '', ''),
(3, '', 0, '<p>asdasd</p>', '', '', ''),
(4, '', 0, '<p>asdasd</p>', '', '', ''),
(5, '', 0, '<p>asdasd</p>', '', '', ''),
(6, '', 0, '<p>asdasd</p>', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
