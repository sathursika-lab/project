-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2026 at 02:57 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elite_events`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `booking_reference` varchar(20) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `event_date` date NOT NULL,
  `event_time` time DEFAULT NULL,
  `event_types` varchar(255) DEFAULT NULL,
  `guests` int(11) DEFAULT 0,
  `services` varchar(255) DEFAULT NULL,
  `packages` varchar(255) DEFAULT NULL,
  `hometown` varchar(100) DEFAULT NULL,
  `district` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `booking_reference`, `full_name`, `phone`, `email`, `event_date`, `event_time`, `event_types`, `guests`, `services`, `packages`, `hometown`, `district`, `created_at`) VALUES
(1, 'ELITE-CB52C', 'SATHU sika', '0751638990', 'sathursikasubramanijam004@gmail.com', '2026-03-21', '09:09:00', 'Birthday', 1, 'Photo/Video', 'Basic Package', 'jaffma', 'jaffna', '2026-03-19 17:16:58'),
(2, 'ELITE-70798', 'SATHU sika', '0751638990', 'sathursikasubramanijam004@gmail.com', '2026-03-21', '02:05:00', 'Business', 1, 'Photo/Video', 'Basic Package', 'jaffma', 'jaffna', '2026-03-19 19:26:31'),
(3, 'ELITE-3D0C6', 'SATHU sika', '0751638990', 'sathursikasubramanijam004@gmail.com', '2026-03-21', '02:05:00', 'Business', 1, 'Photo/Video', 'Basic Package', 'jaffma', 'jaffna', '2026-03-20 11:44:21'),
(4, 'ELITE-5FD64', 'SATHU sika', '0751638990', 'sathursikasubramanijam004@gmail.com', '2026-03-21', '02:05:00', 'Business', 1, 'Photo/Video', 'Basic Package', 'jaffma', 'jaffna', '2026-03-20 11:44:28'),
(5, 'ELITE-4CB7C', 'eli fernando', '0751638990', 'sathursikasubramanijam004@gmail.com', '2026-09-09', '09:09:00', 'Wedding', 700, 'Hall Booking', 'Premium Package', 'kandy', 'kandy', '2026-03-20 11:47:25');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `full_name`, `email`, `phone`, `message`, `created_at`) VALUES
(1, 'bjbg', 'sathursikasubramanijam004@gmail.com', '0751638990', 'gugujgjugv', '2026-03-19 18:35:33'),
(2, 'hkjhkjhbi', 'sathursikasubramanijam004@gmail.com', '0751638990', 'gfrtgtgtg', '2026-03-19 18:35:45'),
(3, 'hkjhkjhbi', 'sathursikasubramanijam004@gmail.com', '0751638990', 'nggj', '2026-03-19 19:25:15'),
(4, 'sham', 'sathusathursika90@gmail.com', '0751638990', 'good', '2026-03-20 11:48:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
