-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2018 at 05:49 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final_login_form`
--

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE `information` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phoneno` int(11) NOT NULL,
  `birthdate` date NOT NULL,
  `city` varchar(222) NOT NULL,
  `country` varchar(222) NOT NULL,
  `password` varchar(255) NOT NULL,
  `terms` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `information`
--

INSERT INTO `information` (`id`, `firstname`, `lastname`, `username`, `email`, `phoneno`, `birthdate`, `city`, `country`, `password`, `terms`) VALUES
(5, 'sahid', 'hossain', 'sahid421', 'sahidhossain420@gmail.com', 1622627776, '2000-02-01', 'dhaka', 'Bangladesh', '$2y$10$5/cdWpWg16pNU6ttV9tk8ueFrgf3cqudMI3dvNgO1ZvuJvPSNlUcK', 'yes'),
(8, 'sahid', 'hossain', 'admin', 'sahidhossain420@gmail.com', 1622627776, '1994-02-01', 'dhaka', 'Bangladesh', '$2y$10$/HZUQafyNfq2Iq0IS1bcjOeda9Uz0ZJf3eBTEtqzbbXVB5lXmfupi', 'yes'),
(9, 'sahid', 'hossain', 'aaa', 'sahidhossain420@gmail.com', 1622627776, '1994-02-01', 'dhaka', 'Bangladesh', '$2y$10$X4Pxn4S2nBo/9tnPUIqcc.PxYB1qvFh1SnbBesP9SdhzjdWCwtMHy', 'yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `information`
--
ALTER TABLE `information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
