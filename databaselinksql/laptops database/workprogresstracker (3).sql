-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2023 at 01:51 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `workprogresstracker`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `eid` int(50) NOT NULL,
  `emp_name` varchar(50) NOT NULL,
  `emp_email` varchar(50) NOT NULL,
  `emp_lastname` varchar(50) NOT NULL,
  `emp_phone` varchar(50) DEFAULT NULL,
  `e_pw` varchar(50) NOT NULL,
  `em_img` varchar(60) DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  `Age` tinyint(100) DEFAULT NULL,
  `Experence` varchar(50) DEFAULT NULL,
  `Degree` varchar(50) DEFAULT NULL,
  `Short-detail` varchar(50) DEFAULT NULL,
  `About-Your-Self` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`eid`, `emp_name`, `emp_email`, `emp_lastname`, `emp_phone`, `e_pw`, `em_img`, `location`, `Age`, `Experence`, `Degree`, `Short-detail`, `About-Your-Self`) VALUES
(159, 'Labi', 'Labi@gmail.co', '', '9869562112', '123456', '652a894b89ad6.png', '', 20, '', '', '', ''),
(166, 's', 's@gmail.com', '', '1111111111', '123456', '', NULL, NULL, NULL, NULL, NULL, NULL),
(167, 'su', 'su@gmail.com', 'su', '1254124351', '123456', '', NULL, NULL, NULL, NULL, NULL, NULL),
(168, 'sum', 'sum@gmail.com', 'sum', '1893752638', '123456', '', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `m_id` int(50) NOT NULL,
  `m_name` varchar(50) NOT NULL,
  `m_email` varchar(50) NOT NULL,
  `m_phone` varchar(50) NOT NULL,
  `m_pw` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`m_id`, `m_name`, `m_email`, `m_phone`, `m_pw`) VALUES
(1, 'suman', 'suman@gmail.com', '9856342365', '123456'),
(2, 'Ravi', 'Ravi@gmail.com', '9864823456', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `task_id` int(11) NOT NULL,
  `task_title` varchar(50) DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `task_description` varchar(200) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `m_id` int(11) DEFAULT NULL,
  `e_id` int(11) DEFAULT NULL,
  `completed_task` tinyint(1) NOT NULL,
  `file_name` varchar(60) DEFAULT NULL,
  `feedback` varchar(500) DEFAULT NULL,
  `started_task` date DEFAULT NULL,
  `finished_task` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`task_id`, `task_title`, `status`, `task_description`, `start_date`, `end_date`, `m_id`, `e_id`, `completed_task`, `file_name`, `feedback`, `started_task`, `finished_task`) VALUES
(98, 'hh', 'On-going', 'INDEX.pdf', '2023-08-20', '2023-08-26', 1, 159, 0, NULL, NULL, '2023-10-14', '0000-00-00'),
(99, 'helo', 'Pending', 'TABLE OF CONTENTS.docx', '2023-08-27', '2023-08-28', 1, 159, 1, '64b7d9447e947.pdf', '', '0000-00-00', '0000-00-00'),
(100, 'a', 'Pending', 'TABLE OF CONTENTS.docx', '2023-08-26', '2023-08-26', 1, 159, 1, '64b7d9447e947.pdf', 'worng format', '0000-00-00', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`eid`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`task_id`),
  ADD KEY `manager_id` (`m_id`),
  ADD KEY `employee_id` (`e_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `eid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `m_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `employee_id` FOREIGN KEY (`e_id`) REFERENCES `employee` (`eid`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `manager_id` FOREIGN KEY (`m_id`) REFERENCES `manager` (`m_id`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
