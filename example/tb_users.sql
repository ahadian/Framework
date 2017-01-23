-- phpMyAdmin SQL Dump
-- version 4.6.4deb1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 24, 2017 at 06:37 AM
-- Server version: 10.0.28-MariaDB-1
-- PHP Version: 7.0.12-2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `privcode`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(60) NOT NULL,
  `date_registered` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`user_id`, `name`, `username`, `email`, `password`, `date_registered`) VALUES
(1, 'Supian M', 'supian', 'supian@privlab.com', '$2y$10$ieTf5nbA3qOXka5BmMNkfu1Q/g.txGaqzYnt8OYZeTJBynl5/Yzr2', '26 Dec 2016 12:04:32'),
(2, 'Susan Yulia', 'susan', 'susn@gmail.com', '$2y$10$ieTf5nbA3qOXka5BmMNkfu1Q/g.txGaqzYnt8OYZeTJBynl5/Yzr2', '26 Dec 2016 12:04:32'),
(3, 'Supian M Kedua', 'supian Kedua', 'supian@privlab.com', '$2y$10$ieTf5nbA3qOXka5BmMNkfu1Q/g.txGaqzYnt8OYZeTJBynl5/Yzr2', '26 Dec 2016 12:04:32'),
(4, 'Susan Yulia Kedua', 'susan Kedua', 'susn@gmail.com', '$2y$10$ieTf5nbA3qOXka5BmMNkfu1Q/g.txGaqzYnt8OYZeTJBynl5/Yzr2', '26 Dec 2016 12:04:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
