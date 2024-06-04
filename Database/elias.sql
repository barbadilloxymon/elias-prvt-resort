-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2024 at 07:27 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elias`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `firstName`, `lastName`, `email`, `phone`, `message`) VALUES
(9, 'Xymon', 'Barbadillo ', 'humpbreyneiltan@gmail.com', '09128282828', ''),
(17, 'koco', 'melon', 'eliasresort@gmail.com', '09123456789', ''),
(20, 'Xymon', 'Neko neko', 'humpbreyneiltan@gmail.com', '09128282828', ''),
(21, 'Lance', 'Neko', 'humpbreyneiltan@gmail.com', '09128282828', ''),
(22, 'Neko', 'Neko neko', 'humpbreyneiltan@gmail.com', '09128282828', ''),
(23, 'Lance', 'Neko', 'humpbreyneiltan@gmail.com', '09128282828', ''),
(24, 'juan dela paz', '', 'elias@gmail.com', '09123456789', ''),
(25, 'Monky', 'melon', 'eliasresort@gmail.com', '09123456789', ''),
(26, 'koco', 'melon', 'eliasresort@gmail.com', '09123456789', ''),
(27, 'neko', 'melon', 'eliasresort@gmail.com', '09123456789', ''),
(29, 'Pedro', 'Dela Cruz', 'eliasresort@gmail.com', '09123456790', 'Helloooo'),
(30, 'koco', 'melon', 'eliasresort@gmail.com', '09123456789', '\r\nSure! admin_reply.php allows admins to compose messages and choose whether to send them to users or a predefined admin email. When the admin clicks &quot;Send&quot;, the form data is processed by send_reply.php, which handles sending the email according'),
(31, 'xymon', 'xyxy', 'eliasresort@gmail.com', '09123456789', 'Hiiiiii admin'),
(32, 'xymon', 'xyxy', 'eliasresort@gmail.com', '09123456789', 'Hellooo ADMIN\r\n'),
(33, 'koco', 'melon', 'eliasresort@gmail.com', '09123456789', 'Helloo');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `register_id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `checkindate` date NOT NULL,
  `checkoutdate` date NOT NULL,
  `citime` time NOT NULL,
  `cotime` time NOT NULL,
  `adult` int(255) NOT NULL,
  `child` int(255) NOT NULL,
  `rooms` varchar(50) NOT NULL,
  `photo` blob DEFAULT NULL,
  `verified` int(255) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`register_id`, `fname`, `phone`, `address`, `gender`, `email`, `checkindate`, `checkoutdate`, `citime`, `cotime`, `adult`, `child`, `rooms`, `photo`, `verified`, `status`) VALUES
(2, 'Kiko Matos', '09123456789', '989 /Kamagong Street/Miramonte Village Pansol Calamba City', 'female', 'elias@gmail.com', '2024-05-07', '2024-05-08', '19:47:00', '08:47:00', 24, 23, '4', '', 0, 'Verified'),
(3, 'Juan Dela Cruz', '09123456790', 'San pablo city laguna', 'female', 'eliasresort@gmail.com', '2024-05-14', '2024-05-13', '21:19:00', '10:19:00', 23, 12, '4', '', 0, 'Verified'),
(4, 'Xymon Morfe Barbadillo', '09675511396', '989 /Kamagong Street/Miramonte Village Pansol Calamba City', 'male', 'xymonbarbadillo09@gmail.com', '2024-05-14', '2024-05-08', '09:40:00', '10:40:00', 12, 24, '3', '', 0, 'Verified'),
(6, 'Xymon Morfe Barbadillo', '09675511396', '989 /Kamagong Street/Miramonte Village Pansol Calamba City', 'male', 'xymonbarbadillo09@gmail.com', '2024-05-14', '2024-05-15', '09:47:00', '09:47:00', 12, 24, '4', '', 0, 'Verified'),
(7, 'Joseph', '09123456790', 'San pablo city laguna', 'female', 'eliasresort@gmail.com', '2024-05-20', '2024-05-21', '15:44:00', '04:44:00', 23, 12, '4', '', 0, 'Verified'),
(8, 'Juan Dela Cruz', '09123456790', 'San pablo city laguna', 'female', 'eliasresort@gmail.com', '2024-05-21', '2024-05-22', '16:45:00', '00:00:05', 23, 12, '4', '', 0, 'Verified'),
(9, 'Juan Dela Cruz', '09123456790', 'San pablo city laguna', 'female', 'eliasresort@gmail.com', '2024-05-21', '2024-05-22', '16:45:00', '00:00:05', 23, 12, '4', '', 0, 'Verified'),
(10, 'xymon xyxy', '09123456789', 'San pablo city laguna', 'female', 'eliasresort@gmail.com', '2024-05-21', '2024-05-22', '16:50:00', '00:00:05', 23, 12, '4', '', 0, '0'),
(11, 'xymon xyxy', '09123456789', 'San pablo city laguna', 'female', 'eliasresort@gmail.com', '2024-05-21', '2024-05-22', '16:50:00', '00:00:05', 23, 12, '4', '', 0, 'Verified'),
(12, 'xymon xyxy', '09123456789', 'San pablo city laguna', 'female', 'eliasresort@gmail.com', '2024-05-21', '2024-05-22', '16:50:00', '00:00:05', 23, 12, '4', '', 0, 'Verified'),
(14, 'xymon xyxy', '09123456789', 'San pablo city laguna', 'female', 'eliasresort@gmail.com', '2024-05-21', '2024-05-22', '16:59:00', '00:00:05', 23, 12, '4', '', 0, '0'),
(15, 'xymon xyxy', '09123456789', 'San pablo city laguna', 'female', 'eliasresort@gmail.com', '2024-05-21', '2024-05-22', '16:59:00', '00:00:05', 23, 12, '4', '', 0, '0'),
(16, 'xymon xyxy', '09123456789', 'San pablo city laguna', 'female', 'eliasresort@gmail.com', '2024-05-21', '2024-05-22', '16:59:00', '00:00:05', 23, 12, '4', '', 0, 'Verified'),
(17, 'xymon xyxy', '09123456789', 'San pablo city laguna', 'female', 'eliasresort@gmail.com', '2024-05-21', '2024-05-22', '16:59:00', '00:00:05', 23, 12, '4', '', 0, '0'),
(18, 'xymon xyxy', '09123456789', 'San pablo city laguna', 'female', 'eliasresort@gmail.com', '2024-05-21', '2024-05-22', '17:02:00', '00:00:06', 23, 12, '2', '', 0, '0'),
(20, 'xymon xyxy', '09123456789', 'San pablo city laguna', 'female', 'eliasresort@gmail.com', '2024-05-21', '2024-05-22', '17:02:00', '00:00:06', 23, 12, '2', '', 0, '0'),
(21, 'xymon xyxy', '09123456789', 'San pablo city laguna', 'female', 'eliasresort@gmail.com', '2024-05-21', '2024-05-22', '17:08:00', '06:08:00', 23, 12, '4', '', 0, '0'),
(22, 'xymon xyxy', '09123456789', 'San pablo city laguna', 'female', 'eliasresort@gmail.com', '2024-05-21', '2024-05-22', '17:02:00', '00:00:06', 23, 12, '2', '', 0, '0'),
(23, 'xymon xyxy', '09123456789', 'San pablo city laguna', 'male', 'eliasresort@gmail.com', '2024-05-21', '2024-05-22', '17:09:00', '06:09:00', 23, 12, '1', '', 0, '0'),
(24, 'koco melon', '09123456789', 'Laguna', 'female', 'eliasresort@gmail.com', '2024-05-21', '2024-05-22', '17:19:00', '00:00:06', 12, 23, '3', '', 0, '0'),
(25, 'koco melon', '09123456789', 'Laguna', 'female', 'eliasresort@gmail.com', '2024-05-21', '2024-05-22', '17:19:00', '00:00:06', 12, 23, '3', '', 0, '0'),
(26, 'koco melon', '09123456789', 'Laguna', 'female', 'eliasresort@gmail.com', '2024-05-21', '2024-05-22', '17:19:00', '00:00:06', 12, 23, '3', '', 0, '0'),
(27, 'koco melon', '09123456789', 'Laguna', 'female', '0', '2024-05-21', '2024-05-22', '17:40:00', '06:40:00', 12, 23, '3', '', 0, '0'),
(28, 'koco melon', '09123456789', 'Laguna', 'female', 'eliasresort@gmail.com', '2024-05-21', '2024-05-22', '17:19:00', '00:00:06', 12, 23, '3', '', 0, '0'),
(29, 'koco melon', '09123456789', 'Laguna', 'female', 'eliasresort@gmail.com', '2024-05-21', '2024-05-22', '17:19:00', '00:00:06', 12, 23, '3', '', 0, '0'),
(30, 'koco melon', '09123456789', 'Laguna', 'female', 'eliasresort@gmail.com', '2024-05-21', '2024-05-22', '17:19:00', '00:00:06', 12, 23, '3', '', 0, '0'),
(31, 'koco melon', '09123456789', 'Laguna', 'female', 'eliasresort@gmail.com', '2024-05-21', '2024-05-22', '17:58:00', '17:58:00', 12, 2, '2', '', 0, '0'),
(32, 'koco melon', '09123456789', 'Laguna', 'female', 'eliasresort@gmail.com', '2024-05-21', '2024-05-22', '17:19:00', '00:00:06', 12, 23, '3', '', 0, '0'),
(37, 'koco melon', '09123456789', 'Laguna', 'male', 'eliasresort@gmail.com', '2024-05-22', '2024-05-23', '21:39:00', '10:39:00', 12, 2, '1', '', 0, ''),
(39, '', '', '', '', '', '0000-00-00', '0000-00-00', '00:00:00', '00:00:00', 0, 0, '', NULL, 0, ''),
(40, 'koco melon', '09123456789', 'Laguna', 'male', '0', '2024-05-23', '2024-05-24', '05:29:00', '18:29:00', 12, 23, '4', NULL, 0, ''),
(41, 'koco melon', '09123456789', 'Laguna', 'female', '0', '2024-05-24', '2024-05-23', '05:38:00', '18:38:00', 12, 23, '1', NULL, 0, ''),
(42, 'koco melon', '09123456789', 'Laguna', 'female', '0', '2024-05-23', '2024-05-24', '05:39:00', '18:39:00', 12, 23, '1', NULL, 0, ''),
(43, 'koco melon', '09123456789', 'Laguna', 'not_specified', '0', '2024-05-23', '2024-05-24', '05:42:00', '18:42:00', 12, 23, '1', NULL, 0, ''),
(44, 'koco melon', '09123456789', 'Laguna', 'not_specified', '0', '2024-05-23', '2024-05-24', '05:42:00', '18:42:00', 12, 23, '1', NULL, 0, ''),
(46, '', '', '', '', '0', '0000-00-00', '0000-00-00', '00:00:00', '00:00:00', 0, 0, '', NULL, 0, ''),
(47, '', '', '', '', '0', '0000-00-00', '0000-00-00', '00:00:00', '00:00:00', 0, 0, '', NULL, 0, ''),
(48, '', '', '', '', '0', '0000-00-00', '0000-00-00', '00:00:00', '00:00:00', 0, 0, '', NULL, 0, ''),
(49, 'Xymon', '09123456789', 'Bay Laguna', 'not_specified', '0', '2024-05-23', '2024-05-24', '05:54:00', '05:54:00', 12, 23, '4', NULL, 0, ''),
(50, '', '', '', '', '0', '0000-00-00', '0000-00-00', '00:00:00', '00:00:00', 0, 0, '', NULL, 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`register_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `register_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


