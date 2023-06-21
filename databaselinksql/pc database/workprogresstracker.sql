-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2023 at 01:54 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

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
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `d_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`d_id`, `name`) VALUES
(1, 'Front-End'),
(2, 'Back-End');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `eid` int(50) NOT NULL,
  `d_id` int(50) DEFAULT NULL,
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

INSERT INTO `employee` (`eid`, `d_id`, `emp_name`, `emp_email`, `emp_lastname`, `emp_phone`, `e_pw`, `em_img`, `location`, `Age`, `Experence`, `Degree`, `Short-detail`, `About-Your-Self`) VALUES
(143, NULL, 'salina', 'salinamaharjan@gmail.com', 'maharjan', '', '123456', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(144, NULL, 'helo', 'admin@admin.com', '1231312', '9869452356', 'admin123', '647df59b95b69.png', NULL, NULL, NULL, NULL, NULL, NULL),
(145, NULL, 'design', 'rikin@gmail.com', 'ewqe', '9869452356', '123', '', NULL, NULL, NULL, NULL, NULL, NULL),
(146, NULL, 'ziva', 'ziva@gmail.com', 'ziva', '9869452356', '123', '', NULL, NULL, NULL, NULL, NULL, NULL),
(147, NULL, 'ziva', 'ziva1@gmail.com', 'ziva', '9869452356', '123', '', NULL, NULL, NULL, NULL, NULL, NULL),
(148, NULL, 'ziva', 'ziva12@gmail.com', 'qweqwe', '9869452356', '123', '', NULL, NULL, NULL, NULL, NULL, NULL),
(149, NULL, 'wqe', 'a@gmail.com', '213', '9869452356', '12323', '', NULL, NULL, NULL, NULL, NULL, NULL),
(150, NULL, 'gg', 'gg@gmail.com', 'wqewqe', '9869452356', '123', '', NULL, NULL, NULL, NULL, NULL, NULL),
(151, NULL, 'qwewqe', 'ghh@gmail.com', 'wqewqe', '9869452356', '1234', '', NULL, NULL, NULL, NULL, NULL, NULL),
(152, NULL, 'abb', 'abb@gmail.com', 'aabb', '9869452356', '12333', '', NULL, NULL, NULL, NULL, NULL, NULL),
(153, NULL, 'aaahh', 'aahh@gmail.com', 'abbd', '9869452356', '12344', '', NULL, NULL, NULL, NULL, NULL, NULL),
(154, NULL, 'labi', 'labi@gmail.com', '', NULL, '123456', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(155, NULL, 'Suraj', 'suraj@gmail.com', 'Shrestha', '9858453456', '123456', NULL, 'Kalimati', 21, 'Hawa', 'Bca', 'I am cool ', 'I like reading books and playing games.');

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

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `email`) VALUES
(39, 'salina', '123456', 'salinamaharjan@gmail.com'),
(40, 'labi', '123456', 'labi@gmail.com'),
(41, 'suraj', '123456', 'suraj@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `m_id` int(50) NOT NULL,
  `d_id` int(50) DEFAULT NULL,
  `m_name` varchar(50) NOT NULL,
  `m_email` varchar(50) NOT NULL,
  `m_phone` varchar(50) NOT NULL,
  `m_pw` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`m_id`, `d_id`, `m_name`, `m_email`, `m_phone`, `m_pw`) VALUES
(1, 1, 'suman', 'suman@gmail.com', '9856342365', '123456'),
(2, 2, 'rikin', 'rikin@gmail.com', '9856342365', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `task_id` int(11) NOT NULL,
  `d_id` int(50) DEFAULT NULL,
  `task_title` varchar(50) DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `task_description` varchar(200) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `m_id` int(11) DEFAULT NULL,
  `e_id` int(11) DEFAULT NULL,
  `completed_task` tinyint(1) NOT NULL,
  `file_name` varchar(60) DEFAULT NULL,
  `feedback` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`task_id`, `d_id`, `task_title`, `status`, `task_description`, `start_date`, `end_date`, `m_id`, `e_id`, `completed_task`, `file_name`, `feedback`) VALUES
(59, NULL, '`1', 'Completed', '', '2023-06-17', '2023-06-17', NULL, 155, 1, '648daa60b0845.pdf', ''),
(60, NULL, '2', 'Completed', '', '2023-06-17', '2023-06-17', NULL, 155, 1, '648d918e74a5b.pdf', ''),
(61, NULL, 'pdf see', 'Completed', 'complete it on time ', '2023-06-17', '2023-06-17', NULL, 155, 1, '648daab1ad145.pdf', 'good job '),
(62, NULL, 'change css', 'Completed', 'do it in proper way', '2023-06-18', '2023-06-18', NULL, 155, 1, '648dfa767cd07.pdf', 'well  ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`eid`),
  ADD KEY `d_id` (`d_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`m_id`),
  ADD KEY `did` (`d_id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`task_id`),
  ADD KEY `manager_id` (`m_id`),
  ADD KEY `employee_id` (`e_id`),
  ADD KEY `department_id` (`d_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `eid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `m_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `d_id` FOREIGN KEY (`d_id`) REFERENCES `department` (`d_id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `manager`
--
ALTER TABLE `manager`
  ADD CONSTRAINT `did` FOREIGN KEY (`d_id`) REFERENCES `department` (`d_id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `department_id` FOREIGN KEY (`d_id`) REFERENCES `department` (`d_id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `employee_id` FOREIGN KEY (`e_id`) REFERENCES `employee` (`eid`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `manager_id` FOREIGN KEY (`m_id`) REFERENCES `manager` (`m_id`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
