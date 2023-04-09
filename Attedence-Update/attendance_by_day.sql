-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2019 at 09:25 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendance_by_day`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_account`
--

CREATE TABLE `admin_account` (
  `id` int(11) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_account`
--

INSERT INTO `admin_account` (`id`, `phone`, `pass`) VALUES
(1, '1234567890', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` int(11) NOT NULL,
  `class` varchar(15) NOT NULL,
  `sub` varchar(15) NOT NULL,
  `rfid` varchar(15) NOT NULL,
  `date` date NOT NULL,
  `attendence` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `class`, `sub`, `rfid`, `date`, `attendence`) VALUES
(1, 'BCA', 'C Programming', '19619986211', '2019-09-27', '[\"1\",\"2\"]'),
(2, 'BCA', 'C Programming', '19619986211', '2019-09-28', '[\"2\",\"1\"]');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `class_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `class_name`) VALUES
(1, 'BCA');

-- --------------------------------------------------------

--
-- Table structure for table `students_of_bca`
--

CREATE TABLE `students_of_bca` (
  `id` int(11) NOT NULL,
  `roll_no` int(11) NOT NULL,
  `student_name` varchar(50) NOT NULL,
  `image_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students_of_bca`
--

INSERT INTO `students_of_bca` (`id`, `roll_no`, `student_name`, `image_name`) VALUES
(1, 1, 'Prashant Singh', 'prashantsingh'),
(2, 2, 'Upendra', 'upendra');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`) VALUES
(5, 'C Programming'),
(6, 'Python'),
(7, 'Java'),
(8, 'Visual Basic');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `rf_id` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `class1` varchar(15) NOT NULL,
  `sub1` varchar(20) NOT NULL,
  `stime1` time NOT NULL,
  `etime1` time NOT NULL,
  `class2` varchar(15) NOT NULL,
  `sub2` varchar(50) NOT NULL,
  `stime2` time NOT NULL,
  `etime2` time NOT NULL,
  `class3` varchar(15) NOT NULL,
  `sub3` varchar(50) NOT NULL,
  `stime3` time NOT NULL,
  `etime3` time NOT NULL,
  `class4` varchar(15) NOT NULL,
  `sub4` varchar(50) NOT NULL,
  `stime4` time NOT NULL,
  `etime4` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `rf_id`, `name`, `email`, `pass`, `class1`, `sub1`, `stime1`, `etime1`, `class2`, `sub2`, `stime2`, `etime2`, `class3`, `sub3`, `stime3`, `etime3`, `class4`, `sub4`, `stime4`, `etime4`) VALUES
(11, '19619986211', 'Ravi Kumar', 'ravi@emial.com', 'ravi', 'BCA', 'C Programming', '10:01:00', '11:00:00', 'BCA', 'C Programming', '11:01:00', '12:00:00', 'BCA', 'C Programming', '12:01:00', '13:00:00', 'BCA', 'C Programming', '14:00:00', '15:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_account`
--
ALTER TABLE `admin_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students_of_bca`
--
ALTER TABLE `students_of_bca`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_account`
--
ALTER TABLE `admin_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students_of_bca`
--
ALTER TABLE `students_of_bca`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
