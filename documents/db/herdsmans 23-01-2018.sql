-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2018 at 09:34 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `abeef`
--

-- --------------------------------------------------------

--
-- Table structure for table `herdsmans`
--

CREATE TABLE `herdsmans` (
  `id` char(36) NOT NULL,
  `code` varchar(5) NOT NULL,
  `aac_code` varchar(7) DEFAULT NULL COMMENT 'รหัส ธกส',
  `amc_code` varchar(6) DEFAULT NULL COMMENT 'รหัส สกต',
  `grade` int(1) NOT NULL,
  `title` varchar(10) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `idcard` char(13) NOT NULL,
  `birthday` date DEFAULT NULL,
  `account_number1` varchar(12) DEFAULT NULL,
  `account_number2` varchar(12) DEFAULT NULL,
  `registerdate` date NOT NULL,
  `isactive` enum('Y','N') NOT NULL DEFAULT 'Y',
  `address_id` char(36) DEFAULT NULL,
  `image_id` char(36) NOT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL,
  `createdby` varchar(100) NOT NULL,
  `updated` datetime DEFAULT NULL,
  `updatedby` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `herdsmans`
--

INSERT INTO `herdsmans` (`id`, `code`, `aac_code`, `amc_code`, `grade`, `title`, `firstname`, `lastname`, `idcard`, `birthday`, `account_number1`, `account_number2`, `registerdate`, `isactive`, `address_id`, `image_id`, `mobile`, `email`, `description`, `created`, `createdby`, `updated`, `updatedby`) VALUES
('596b5189-a698-40c1-8a72-7946620b9208', '55556', '123456', '569325', 4, 'mr', 'นภัทร', 'ภัทร', '1235698745696', '2018-01-07', '123546958569', '123654789654', '2018-01-23', 'Y', '039e7e50-bf19-4187-a6b6-decc0d3a3bbb', 'a13b6668-ff4f-4386-9d83-e34ac088e564', '857332425', 'nop19@gail.com', 'uio', '2018-01-23 07:01:50', 'ii', NULL, 'uu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `herdsmans`
--
ALTER TABLE `herdsmans`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
