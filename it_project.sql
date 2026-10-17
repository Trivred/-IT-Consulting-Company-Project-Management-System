-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2025 at 03:50 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `it_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `people`
--

CREATE TABLE `people` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `people`
--

INSERT INTO `people` (`id`, `name`, `email`, `address`, `phone`) VALUES
(1, 'Haya saleh', 'haya.sa@gmail.com', 'Qassim', '5590888480'),
(2, 'Dana abdalaziz', 'dana.aziz@gmail.com', 'Jeddah', '5597787781'),
(4, 'rahaf salem', 'rahaf.sa@gmail.com', 'khobar', '5565467366'),
(5, 'Hala ali', 'hala.ali@gmail.com', 'Riyadh', '5897498886'),
(6, 'Renas ibrahim', 'renas.ib@gmail.com', 'Dammam', '5567367663');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `project_id` int(11) NOT NULL,
  `project_name` varchar(250) NOT NULL,
  `plan_start_date` date NOT NULL,
  `actual_start_date` date NOT NULL,
  `plan_budget` decimal(11,2) NOT NULL,
  `actual_budget` decimal(11,2) NOT NULL,
  `project_manager_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`project_id`, `project_name`, `plan_start_date`, `actual_start_date`, `plan_budget`, `actual_budget`, `project_manager_id`) VALUES
(1, 'Client CRM Database Implementation', '2025-12-02', '2025-12-04', 20000.00, 76000.00, 1),
(2, 'Healthcare Data Management System', '2025-12-05', '2025-12-10', 5000.00, 76000.00, 4),
(3, ' E-Commerce Platform Database Migration', '2025-12-02', '2025-12-20', 30000.00, 30000.00, 2),
(4, 'Financial Services Client Data Warehouse', '2025-12-10', '2025-12-30', 18000.00, 20000.00, 1),
(5, ' Educational Institute Information System', '2025-11-02', '2025-12-02', 120000.00, 90000.00, 3),
(6, 'Retail Inventory and Billing System', '2025-12-02', '2025-12-15', 1500.00, 2000.00, 1),
(7, 'Insurance Policy Management Database', '2025-12-01', '2025-12-17', 7500.00, 5000.00, 4),
(8, 'Legal Firm Case Management Database', '2025-11-11', '2025-11-30', 1000.00, 5000.00, 6);

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE `resources` (
  `resource_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `resource_title` text NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`resource_id`, `task_id`, `resource_title`, `qty`) VALUES
(1, 1, ' Project Manager', 1),
(2, 1, 'Business Analyst', 2),
(3, 2, 'Database Architect', 3),
(4, 1, 'Database Administrator', 1),
(5, 3, 'Backend Developer', 2),
(6, 3, 'QA/Test Engineer', 5),
(7, 2, ' Frontend Developer', 2),
(8, 1, 'Security Analyst', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `task_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `task_name` varchar(250) NOT NULL,
  `task_plan_start_date` date NOT NULL,
  `task_actual_start_date` date NOT NULL,
  `task_plan_budget` decimal(11,2) NOT NULL,
  `task_actual_budget` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`task_id`, `project_id`, `task_name`, `task_plan_start_date`, `task_actual_start_date`, `task_plan_budget`, `task_actual_budget`) VALUES
(1, 1, 'Requirements Gathering', '2025-05-01', '2025-05-01', 20000.00, 300000.00),
(4, 1, 'Client Information Management', '2025-05-08', '2026-01-12', 1200.00, 1400.00),
(5, 2, 'Service Portfolio Cataloging', '2025-08-12', '2025-12-12', 20000.00, 300000.00),
(6, 1, 'Project Assignment Tracking', '2025-12-30', '2026-01-12', 540000.00, 890000.00),
(7, 3, 'Employee Skills Inventory', '2025-08-12', '2025-12-12', 20000.00, 300000.00),
(8, 3, 'Timesheet and Billing Management', '2025-12-30', '2026-01-12', 540000.00, 890000.00),
(9, 3, 'Contract and SLA Tracking', '2025-08-12', '2025-12-12', 20000.00, 300000.00),
(10, 1, ' Client Feedback and Satisfaction Tracking', '2025-12-30', '2026-01-12', 540000.00, 890000.00),
(11, 2, 'Backup and Recovery Setup', '2025-08-12', '2025-12-12', 20000.00, 300000.00),
(12, 1, 'Knowledge Base Development', '2025-12-30', '2026-01-12', 540000.00, 890000.00),
(13, 1, 'Risk and Compliance Recording', '2025-08-12', '2025-12-12', 20000.00, 300000.00),
(14, 5, 'Testing', '2025-12-30', '2026-01-12', 540000.00, 890000.00),
(15, 5, ' Resource Scheduling', '2025-08-12', '2025-12-12', 20000.00, 300000.00),
(16, 5, 'Data Migration Planning', '2025-12-30', '2026-01-12', 540000.00, 890000.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`resource_id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`task_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `people`
--
ALTER TABLE `people`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `resource_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
