-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2023 at 10:26 AM
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
  `dep_id` int(11) NOT NULL,
  `dep_name` varchar(50) NOT NULL,
  `m_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dep_id`, `dep_name`, `m_id`) VALUES
(1, 'Front-End', 1);

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
(143, 'salina', 'salinamaharjan@gmail.com', 'maharjan', '', '123456', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(144, 'helo', 'admin@admin.com', '1231312', '9869452356', 'admin123', '647df59b95b69.png', NULL, NULL, NULL, NULL, NULL, NULL),
(145, 'design', 'rikin@gmail.com', 'ewqe', '9869452356', '123', '', NULL, NULL, NULL, NULL, NULL, NULL),
(146, 'ziva', 'ziva@gmail.com', 'ziva', '9869452356', '123', '', NULL, NULL, NULL, NULL, NULL, NULL),
(147, 'ziva', 'ziva1@gmail.com', 'ziva', '9869452356', '123', '', NULL, NULL, NULL, NULL, NULL, NULL),
(148, 'ziva', 'ziva12@gmail.com', 'qweqwe', '9869452356', '123', '', NULL, NULL, NULL, NULL, NULL, NULL),
(149, 'wqe', 'a@gmail.com', '213', '9869452356', '12323', '', NULL, NULL, NULL, NULL, NULL, NULL),
(150, 'gg', 'gg@gmail.com', 'wqewqe', '9869452356', '123', '', NULL, NULL, NULL, NULL, NULL, NULL),
(151, 'qwewqe', 'ghh@gmail.com', 'wqewqe', '9869452356', '1234', '', NULL, NULL, NULL, NULL, NULL, NULL),
(152, 'abb', 'abb@gmail.com', 'aabb', '9869452356', '12333', '', NULL, NULL, NULL, NULL, NULL, NULL),
(153, 'aaahh', 'aahh@gmail.com', 'abbd', '9869452356', '12344', '', NULL, NULL, NULL, NULL, NULL, NULL),
(154, 'labi', 'labi@gmail.com', '', NULL, '123456', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(155, 'suraj', 'suraj@gmail.com', 'shrestha', '9858453456', '12356', NULL, 'kalimati', 56, 'hawa', 'bca', 'I am cool ', 'I like reading books and playing games.');

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
  `m_name` varchar(50) NOT NULL,
  `m_email` varchar(50) NOT NULL,
  `m_phone` varchar(50) NOT NULL,
  `m_pw` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`m_id`, `m_name`, `m_email`, `m_phone`, `m_pw`) VALUES
(1, 'sizen', 'sizen@gmail.com', '9843652356', '123456'),
(2, 'rikin', 'rikin@gmail.com', '9856342365', '123456');

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
  `feedback` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`task_id`, `task_title`, `status`, `task_description`, `start_date`, `end_date`, `m_id`, `e_id`, `completed_task`, `feedback`) VALUES
(34, 'design', 'Completed', 'design frontpage', '2023-06-05', '2023-06-10', 1, 143, 1, 'good job'),
(35, 'abc', 'Pending', 'do it', '2023-06-08', '2023-06-10', 1, 143, 0, NULL),
(36, 'gg   ', 'Pending', 'DO in proper way', '2023-06-08', '2023-06-08', 1, 143, 0, NULL),
(37, 'go awaya', 'Pending', '', '2023-06-08', '2023-06-08', 1, 143, 0, NULL),
(38, 'break code', 'Pending', '', '2023-06-08', '2023-06-08', 1, 143, 0, NULL),
(39, 'ha', 'Pending', 'gg', '2023-06-08', '2023-06-08', 1, 144, 0, NULL),
(40, 'ya', 'Pending', '', '2023-06-08', '2023-06-08', 1, 143, 0, NULL),
(41, 'jaja', 'Pending', '', '2023-06-08', '2023-06-08', 1, 143, 0, NULL),
(42, 'dodo', 'Pending', 'haha', '2023-06-08', '2023-06-08', 1, 145, 0, NULL),
(43, 'how feel', 'Pending', 'ww', '2023-06-15', '2023-06-21', 1, 143, 0, NULL),
(44, 'wahts', 'Pending', '', '2023-06-24', '2023-06-21', 1, 143, 0, NULL),
(45, 'design', 'Completed', '', '2023-06-10', '2023-06-22', 1, 146, 1, ''),
(46, 'css', 'Completed', 'do it ', '2023-06-10', '2023-07-01', 1, 146, 1, 'well done'),
(47, 'flex-box', 'Completed', 'flex-box', '2023-06-10', '2023-06-10', 1, 146, 1, 'well done'),
(48, 'bubububu', 'Completed', '', '2023-06-10', '2023-06-10', 1, 146, 1, 'good job'),
(49, 'ahaha', 'Pending', '', '2023-06-10', '2023-06-10', 1, 146, 0, NULL),
(50, 'c++', 'Completed', 'perform c++ add', '2023-06-10', '2023-06-19', 1, 154, 1, 'good job'),
(52, 'qew', 'Completed', 'wewqe', '2023-06-13', '2023-06-14', 1, 155, 1, ''),
(53, 'qweq', 'Completed', '', '2023-06-13', '2023-06-13', 1, 155, 1, ''),
(54, 'qweqwe', 'On-going', 'qweqw', '2023-06-13', '2023-06-13', 1, 155, 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dep_id`),
  ADD KEY `m_id` (`m_id`);

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
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `dep_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `m_id` FOREIGN KEY (`m_id`) REFERENCES `manager` (`m_id`) ON DELETE SET NULL ON UPDATE SET NULL;

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
