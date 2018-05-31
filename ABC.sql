-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 28, 2018 at 09:23 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ABC`
--

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `user` varchar(20) NOT NULL,
  `item` varchar(10) NOT NULL,
  `quantity` int(4) NOT NULL,
  `bill` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`user`, `item`, `quantity`, `bill`) VALUES
('ram', 'coffee', 2, 40),
('ram', 'coffee', 2, 40),
('ram', 'coffee', 1, 20),
('ram', 'tea', 1, 10),
('ram', 'cake', 1, 40),
('ram', 'burger', 2, 120),
('ram', 'pizza', 1, 50),
('ram', 'coffee', 1, 20),
('ram', 'tea', 1, 10),
('ram', 'pizza', 2, 100),
('sham', 'coffee', 1, 20),
('sham', 'coffee', 1, 20),
('sham', 'tea', 2, 20),
('sham', 'pizza', 1, 50),
('sham', 'pizza', 1, 50),
('sham', 'tea', 2, 20),
('sham', 'cake', 1, 40),
('sham', 'burger', 3, 180),
('ghansham', 'tea', 1, 10),
('ghansham', 'coffee', 1, 20),
('ghansham', 'samosa', 2, 60),
('ghansham', 'cake', 1, 40),
('ghansham', 'pizza', 2, 100),
('ghansham', 'burger', 2, 120),
('ghansham', 'coffee', 2, 40),
('ghansham', 'coffee', 1, 20),
('ram', 'coffee', 5, 100),
('ram', 'samosa', 2, 60),
('sham', 'samosa', 6, 180),
('admin', 'tea', 1, 10),
('admin', 'coffee', 1, 20),
('admin', 'coffee', 1, 20),
('admin', 'coffee', 1, 20),
('ram', 'tea', 1, 10),
('admin', 'tea', 2, 20);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(4) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'ram', 'ram'),
(3, 'sham', 'sham'),
(4, 'ghansham', 'ghansham');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
