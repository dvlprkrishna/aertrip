-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2020 at 06:07 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aertrip`
--

-- --------------------------------------------------------

--
-- Table structure for table `at_department`
--

CREATE TABLE `at_department` (
  `id` int(11) NOT NULL,
  `department_name` varchar(255) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_active` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `at_department`
--

INSERT INTO `at_department` (`id`, `department_name`, `created_on`, `updated_on`, `is_active`) VALUES
(1, 'Human Resources', '2020-10-19 06:01:58', '2020-10-19 06:01:58', 1),
(2, 'Accounting & Finance', '2020-10-19 06:01:58', '2020-10-19 06:01:58', 1),
(3, 'Information Technology', '2020-10-19 06:02:41', '2020-10-19 06:02:41', 1),
(4, 'Operations', '2020-10-19 06:02:41', '2020-10-19 06:02:41', 1),
(5, 'Sales & Marketing', '2020-10-19 06:03:20', '2020-10-19 06:03:20', 1),
(6, 'Administrative', '2020-10-19 06:03:20', '2020-10-19 06:03:20', 1),
(8, 'Management', '2020-10-21 16:00:35', '2020-10-21 16:00:35', 1);

-- --------------------------------------------------------

--
-- Table structure for table `at_employees`
--

CREATE TABLE `at_employees` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `department_id` tinyint(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_active` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `at_employees`
--

INSERT INTO `at_employees` (`id`, `name`, `department_id`, `created_on`, `updated_on`, `is_active`) VALUES
(1, 'Krishna sahu', 1, '2020-10-21 14:52:03', '2020-10-21 14:52:03', 2),
(2, 'Kartik', 3, '2020-10-21 15:13:10', '2020-10-21 15:13:10', 1),
(3, 'Virat', 4, '2020-10-21 15:15:47', '2020-10-21 15:15:47', 1),
(4, 'Krishna sahu', 3, '2020-10-21 15:24:13', '2020-10-21 15:24:13', 1);

-- --------------------------------------------------------

--
-- Table structure for table `at_employees_address`
--

CREATE TABLE `at_employees_address` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_active` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `at_employees_address`
--

INSERT INTO `at_employees_address` (`id`, `employee_id`, `address`, `created_on`, `updated_on`, `is_active`) VALUES
(1, 1, '1', '2020-10-21 14:52:03', '2020-10-21 14:52:03', 2),
(2, 1, '2', '2020-10-21 14:54:54', '2020-10-21 14:54:54', 2),
(3, 1, '3', '2020-10-21 14:55:47', '2020-10-21 14:55:47', 2),
(4, 2, '22', '2020-10-21 15:13:10', '2020-10-21 15:13:10', 1),
(5, 2, '11', '2020-10-21 15:13:19', '2020-10-21 15:13:19', 1),
(6, 3, '400612', '2020-10-21 15:15:47', '2020-10-21 15:15:47', 1),
(7, 4, 'afazbdxva', '2020-10-21 15:24:13', '2020-10-21 15:24:13', 1);

-- --------------------------------------------------------

--
-- Table structure for table `at_employees_contact`
--

CREATE TABLE `at_employees_contact` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_active` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `at_employees_contact`
--

INSERT INTO `at_employees_contact` (`id`, `employee_id`, `contact`, `created_on`, `updated_on`, `is_active`) VALUES
(1, 1, '1', '2020-10-21 14:52:03', '2020-10-21 14:52:03', 2),
(2, 1, '2', '2020-10-21 14:54:54', '2020-10-21 14:54:54', 2),
(3, 1, '3', '2020-10-21 14:55:47', '2020-10-21 14:55:47', 2),
(4, 2, '22', '2020-10-21 15:13:10', '2020-10-21 15:13:10', 1),
(5, 2, '11', '2020-10-21 15:13:19', '2020-10-21 15:13:19', 1),
(6, 3, '9820839348', '2020-10-21 15:15:47', '2020-10-21 15:15:47', 1),
(7, 4, '9820839348', '2020-10-21 15:24:13', '2020-10-21 15:24:13', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `at_department`
--
ALTER TABLE `at_department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `at_employees`
--
ALTER TABLE `at_employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `at_employees_address`
--
ALTER TABLE `at_employees_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `at_employees_contact`
--
ALTER TABLE `at_employees_contact`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `at_department`
--
ALTER TABLE `at_department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `at_employees`
--
ALTER TABLE `at_employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `at_employees_address`
--
ALTER TABLE `at_employees_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `at_employees_contact`
--
ALTER TABLE `at_employees_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
