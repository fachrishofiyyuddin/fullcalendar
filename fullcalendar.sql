-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 19, 2024 at 03:08 AM
-- Server version: 5.7.39
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fullcalendar`
--

-- --------------------------------------------------------

--
-- Table structure for table `laboratories`
--

CREATE TABLE `laboratories` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `laboratories`
--

INSERT INTO `laboratories` (`id`, `name`) VALUES
(1, 'LAB. IPS'),
(2, 'LAB. IPA'),
(3, 'LAB. KOMPUTER'),
(4, 'LAB. MESIN');

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` int(11) NOT NULL,
  `id_laboratory` int(11) NOT NULL,
  `name_schedule` text NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `start_clock` time NOT NULL,
  `end_clock` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `id_laboratory`, `name_schedule`, `start_date`, `end_date`, `start_clock`, `end_clock`) VALUES
(1, 1, 'Praktikum Kelas 12 IPS', '2024-07-19', '2024-07-19', '08:37:13', '10:37:13'),
(2, 2, 'Praktikum Kelas 11 MIPA', '2024-07-20', '2024-07-22', '08:46:45', '10:46:45'),
(3, 3, 'Test CBT Kelas 12 TKJ', '2024-07-29', '2024-07-31', '07:48:22', '12:48:22'),
(4, 4, 'Praktikum Kelas 10 Mesin', '2024-08-05', '2024-08-05', '09:49:55', '13:49:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `laboratories`
--
ALTER TABLE `laboratories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `laboratories`
--
ALTER TABLE `laboratories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
