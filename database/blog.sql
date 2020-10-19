-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2020 at 07:20 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_data`
--

CREATE TABLE `blog_data` (
  `id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog_data`
--

INSERT INTO `blog_data` (`id`, `author`, `title`, `content`, `email`, `created_on`, `updated_on`, `is_active`) VALUES
(1, '1w', 'HOW TO SET UP AUTO-REPLY MESSAGES ON WHATSAPPa', '1aw', 'deathstriker472@gmail.com', '2020-07-29 14:07:10', '2020-07-29 14:07:10', 2),
(2, 'Digit NewsDesk', 'HOW TO SET UP AUTO-REPLY MESSAGES ON WHATSAPP', 'WhatsApp Business is a platform for small and medium business owners to get in contact with customers. An existing WhatsApp account can easily be migrated to a business account but can’t go back to being a single account.', 'Digit@NewsDesk.in', '2020-07-29 14:08:37', '2020-07-29 14:08:37', 1),
(3, 'Sponsored', 'DON’T JUST GET A NEW PC, GET A MODERN PC', 'A PC is a must-have device for most individuals and families. However, buying a PC is easier said than done. There are hundreds of things you need to know before you make your purchase. Of course, this does mean that you can usually find a device that is ', 'Sponsored@digit.in', '2020-07-29 14:09:17', '2020-07-29 14:09:17', 1),
(4, 'Digit NewsDesk', 'HOW TO SET UP AUTO-REPLY MESSAGES ON WHATSAPP', 'HOW TO SET UP AUTO-REPLY MESSAGES ON WHATSAPP HOW TO SET UP AUTO-REPLY MESSAGES ON WHATSAPP', 'deathstriker472@gmail.com', '2020-08-14 14:11:25', '2020-08-14 14:11:25', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_data`
--
ALTER TABLE `blog_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_data`
--
ALTER TABLE `blog_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
