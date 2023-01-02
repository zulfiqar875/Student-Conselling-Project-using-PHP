-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2022 at 07:54 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `q1` longtext NOT NULL,
  `a1` longtext NOT NULL,
  `q2` longtext NOT NULL,
  `a2` longtext NOT NULL,
  `q3` longtext NOT NULL,
  `a3` longtext NOT NULL,
  `q4` longtext NOT NULL,
  `a4` longtext NOT NULL,
  `q5` longtext NOT NULL,
  `a5` longtext NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `sid`, `q1`, `a1`, `q2`, `a2`, `q3`, `a3`, `q4`, `a4`, `q5`, `a5`, `status`) VALUES
(11, 38, 'What is Education Level?', 'y', 'Did you like Computer or Not?', 'y', 'What you want to do?', 'y', 'What you are interested in Domin?', 'y', 'Did you like programming or Gaming?', 'y', 1);

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `question` longtext NOT NULL,
  `answer` longtext NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `cid`, `sid`, `question`, `answer`, `status`) VALUES
(1, 42, 38, 'Hi', 'Student', 1),
(2, 42, 38, 'Yes! I see your profile, you need to do BS in Computer Science.', 'Counsellor', 1),
(3, 42, 38, 'ok', 'Student', 1);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `userid` int(11) NOT NULL,
  `feedback` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `userid`, `feedback`) VALUES
(4, 'Abdullah Kadmani', 42, 'it seems good');

-- --------------------------------------------------------

--
-- Table structure for table `hire`
--

CREATE TABLE `hire` (
  `id` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `cid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hire`
--

INSERT INTO `hire` (`id`, `sid`, `cid`) VALUES
(1, 38, 42);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `studentid` int(11) NOT NULL,
  `Q1` longtext NOT NULL,
  `A1` longtext NOT NULL,
  `Q2` longtext NOT NULL,
  `A2` longtext NOT NULL,
  `Q3` longtext NOT NULL,
  `A3` longtext NOT NULL,
  `Q4` longtext NOT NULL,
  `A4` longtext NOT NULL,
  `Q5` longtext NOT NULL,
  `A5` longtext NOT NULL,
  `Feedback` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `registartionid`
--

CREATE TABLE `registartionid` (
  `id` int(11) NOT NULL,
  `vuid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registartionid`
--

INSERT INTO `registartionid` (`id`, `vuid`) VALUES
(1, 'BC123456789'),
(2, 'BC123456790');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `vu_id` varchar(50) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `dob` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `pincode` varchar(10) NOT NULL,
  `state` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `hobbies` varchar(50) NOT NULL,
  `event` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` int(11) NOT NULL,
  `hire` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `vu_id`, `fname`, `lname`, `dob`, `email`, `mobile`, `gender`, `address`, `city`, `pincode`, `state`, `country`, `hobbies`, `event`, `password`, `type`, `hire`) VALUES
(20, '0', 'admin', 'admin', '', 'admin@gmail.com', '', 'male', '', '', '', '', 'pakistan', '', '', 'admin', 1, 0),
(38, 'VU-2022091231', 'Muhammad', 'Zulfiqar', '2022-09-23', 'zulfiqar@gmail.com', '03129078561', 'male', '999', 'taxila', '47070', 'islamabad', 'Pakistan', 'drawing', 'on', 'zulfiqar', 2, 0),
(42, '', 'Abdullah', 'Kadmani', '', 'abdullah@kadmani.com', '3128977660', '', 'Rawalpindi', '', '', '', '', '', '', 'abdullah', 3, 1),
(43, 'VU-2022102410', 'Haris', 'Awan', '2022-10-13', 'haris@gmail.com', '0317990111', 'male', 'none', 'Taxila', '9000', 'pk', 'pk', 'drawing', 'on', 'haris', 2, 0),
(44, '', 'Haris', 'Khan', '', 'haris@gmail.com', '890909', '', 'none', '', '', '', '', '', '', 'haris', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `systemq`
--

CREATE TABLE `systemq` (
  `id` int(11) NOT NULL,
  `Q1` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `systemq`
--

INSERT INTO `systemq` (`id`, `Q1`) VALUES
(13, 'What is Education Level?'),
(14, 'Did you like Computer or Not?'),
(15, 'What you want to do?'),
(16, 'What you are interested in Domin?'),
(17, 'Did you like programming or Gaming?');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hire`
--
ALTER TABLE `hire`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registartionid`
--
ALTER TABLE `registartionid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `systemq`
--
ALTER TABLE `systemq`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hire`
--
ALTER TABLE `hire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `registartionid`
--
ALTER TABLE `registartionid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `systemq`
--
ALTER TABLE `systemq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
