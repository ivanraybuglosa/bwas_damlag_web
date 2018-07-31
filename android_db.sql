-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2018 at 07:38 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `android_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `name` varchar(70) NOT NULL,
  `password` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `school` varchar(100) DEFAULT NULL,
  `previous_school` text,
  `contact` varchar(20) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `type` text NOT NULL,
  `sport` text,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`, `school`, `previous_school`, `contact`, `address`, `created_at`, `updated_at`, `type`, `sport`, `status`) VALUES
(24, 'Administrator', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', '', NULL, '', '', '2018-07-31 23:07:32', '2018-07-31 23:07:32', 'Admin', '', 'Activated'),
(25, 'Jerome Aledron', '39ea2bf6a4d98585851d2bd07f0d13d1', 'jerome@gmail.com', 'UNOR', NULL, '09123131321', 'AddressAddressAddressAddress', '2018-07-31 23:12:23', '2018-07-31 23:12:23', 'Coach', 'Basketball', 'Activated'),
(26, 'Ivan Ray Buglosa', '39ea2bf6a4d98585851d2bd07f0d13d1', 'ivan@gmail.com', 'USLS', NULL, '231313131', 'asdadadsa', '2018-08-01 00:24:46', '2018-08-01 00:24:46', 'Coach', 'Basketball', 'Activated'),
(27, 'dsadadada', '39ea2bf6a4d98585851d2bd07f0d13d1', '123@gmail.com', 'USLS', NULL, '13213231321', 'asdaddadsa', '2018-08-01 01:00:25', '2018-08-01 01:00:25', 'Coach', 'Basketball', 'Activated');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
