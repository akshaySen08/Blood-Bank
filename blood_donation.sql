-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2018 at 06:08 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blood_donation`
--

-- --------------------------------------------------------

--
-- Table structure for table `available-blood`
--

CREATE TABLE `available-blood` (
  `id` int(10) NOT NULL,
  `blood_group` varchar(10) NOT NULL,
  `donor` varchar(255) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `date` varchar(20) NOT NULL,
  `hid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `available-blood`
--

INSERT INTO `available-blood` (`id`, `blood_group`, `donor`, `qty`, `date`, `hid`) VALUES
(1, 'A', 'Akshay Sen', '1', '2018-12-06', 1),
(2, 'A+', 'Viaks', '2', '2018-12-26', 2),
(3, 'O', 'Kishan', '1', '2018-12-25', 1),
(4, 'O', 'Harsh', '2', '2018-12-27', 2),
(23, 'a-', 'Akki', '1', '2018-01-01', 1),
(24, 'o+', 'Humpty', '2', '2018-02-03', 1);

-- --------------------------------------------------------

--
-- Table structure for table `hospitals`
--

CREATE TABLE `hospitals` (
  `id` int(10) NOT NULL,
  `hospital_name` varchar(255) NOT NULL,
  `hospital_reg_num` int(12) NOT NULL,
  `hospital_address` varchar(255) NOT NULL,
  `hospital_owner` varchar(255) NOT NULL,
  `hospital_email` varchar(255) NOT NULL,
  `hospital_password` varchar(255) NOT NULL,
  `hospital_phone` int(12) NOT NULL,
  `user_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hospitals`
--

INSERT INTO `hospitals` (`id`, `hospital_name`, `hospital_reg_num`, `hospital_address`, `hospital_owner`, `hospital_email`, `hospital_password`, `hospital_phone`, `user_type`) VALUES
(1, 'Janta', 1234657894, 'Indore', 'Akki', 'ak@gmail.com', '12345', 731, 'hospital'),
(2, 'Hospital 2', 789465132, 'asd', 'sad', 'hosp2@gmail.com', '12345', 0, 'hospital');

-- --------------------------------------------------------

--
-- Table structure for table `receivers`
--

CREATE TABLE `receivers` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` int(255) NOT NULL,
  `bloodgroup` varchar(10) NOT NULL,
  `phone` int(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receivers`
--

INSERT INTO `receivers` (`id`, `username`, `email`, `password`, `bloodgroup`, `phone`, `address`, `user_type`) VALUES
(1, 'Receiver 1 ', 'receivr@gmail.com', 12345, 'o+', 1234568972, 'Indore', 'receiver');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` int(10) NOT NULL,
  `request` varchar(200) NOT NULL,
  `hospital` varchar(255) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `name`, `phone`, `request`, `hospital`, `status`) VALUES
(7, 'Receiver 1 ', 1234568972, 'A', 'Janta', 1),
(8, 'Receiver 1 ', 1234568972, 'A+', 'Hospital 2', 1),
(9, 'Receiver 1 ', 1234568972, 'A+', 'Hospital 2', 1),
(10, 'Receiver 1 ', 1234568972, 'A', 'Janta', 1),
(11, 'Receiver 1 ', 1234568972, 'A+', 'Hospital 2', 1),
(12, 'Receiver 1 ', 1234568972, 'A', 'Janta', 1),
(13, 'Receiver 1 ', 1234568972, 'A', 'Janta', 1),
(14, 'Receiver 1 ', 1234568972, 'A', 'Janta', 1),
(15, 'Receiver 1 ', 1234568972, 'A+', 'Hospital 2', 1),
(16, 'Receiver 1 ', 1234568972, 'A', 'Janta', 1),
(17, 'Receiver 1 ', 1234568972, 'A', 'Janta', 1),
(18, 'Receiver 1 ', 1234568972, 'A', 'Janta', 1),
(19, 'Receiver 1 ', 1234568972, 'A+', 'Hospital 2', 1),
(20, 'Receiver 1 ', 1234568972, 'A-', 'Janta', 1),
(21, 'Receiver 1 ', 1234568972, 'O', 'Janta', 1),
(22, 'Receiver 1 ', 1234568972, 'A+', 'Hospital 2', 1),
(23, 'Receiver 1 ', 1234568972, 'A-', 'Janta', 1),
(24, 'Receiver 1 ', 1234568972, 'A', 'Janta', 1),
(25, 'Receiver 1 ', 1234568972, 'A', 'Janta', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `available-blood`
--
ALTER TABLE `available-blood`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hospitals`
--
ALTER TABLE `hospitals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receivers`
--
ALTER TABLE `receivers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `available-blood`
--
ALTER TABLE `available-blood`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `hospitals`
--
ALTER TABLE `hospitals`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `receivers`
--
ALTER TABLE `receivers`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
