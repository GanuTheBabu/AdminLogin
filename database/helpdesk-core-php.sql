-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2024 at 04:16 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `helpdesk-core-php`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `ticket` int(11) NOT NULL,
  `team_member` int(11) NOT NULL,
  `private` int(11) NOT NULL DEFAULT 0,
  `body` varchar(256) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `ticket`, `team_member`, `private`, `body`, `created_at`, `updated_at`) VALUES
(1, 3, 4, 0, 'comment', '2019-05-31 13:54:56', '2019-05-31 13:54:56'),
(2, 2, 1, 0, 'comment on ticket', '2019-05-31 13:57:19', '2019-05-31 13:57:19'),
(3, 3, 4, 0, 'test comment', '2019-06-03 16:59:16', '2019-06-03 16:59:16'),
(4, 3, 4, 0, 'test ticket comment', '2019-06-03 16:59:43', '2019-06-03 16:59:43'),
(5, 10, 4, 0, 'ddmo', '2023-03-20 07:01:34', '2023-03-20 07:01:34');

-- --------------------------------------------------------

--
-- Table structure for table `names`
--

CREATE TABLE `names` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `requester`
--

CREATE TABLE `requester` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `created_at` varchar(20) NOT NULL,
  `updated_at` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `requester`
--

INSERT INTO `requester` (`id`, `name`, `email`, `created_at`, `updated_at`) VALUES
(31, 'mofiqul', 'example@email.com', '2019-05-19 18:54:08', '2019-05-19 18:54:08'),
(32, 'mofiqul', 'example@email.com', '2019-05-19 19:15:22', '2019-05-19 19:15:22'),
(33, 'mofiqul', 'example@email.com', '2019-05-19 19:16:01', '2019-05-19 19:16:01'),
(34, 'mofiqul', 'example@email.com', '2019-05-19 19:16:27', '2019-05-19 19:16:27'),
(35, 'mofiqul', 'example@email.com', '2019-05-19 19:17:51', '2019-05-19 19:17:51'),
(36, 'mofiqul', 'example@email.com', '2019-05-19 19:18:31', '2019-05-19 19:18:31'),
(37, 'mofiqul', 'example@email.com', '2019-05-19 19:18:37', '2019-05-19 19:18:37'),
(38, 'mofiqul', 'example@email.com', '2019-05-19 19:21:05', '2019-05-19 19:21:05'),
(39, 'injamul ', 'injamul.haque6@gmail.com', '2019-05-23 22:48:25', '2019-05-23 22:48:25'),
(40, 'injamul ', 'injamul.haque6@gmail.com', '2019-05-30 19:25:17', '2019-05-30 19:25:17'),
(41, 'test', 'kangkan@email.com', '2019-06-07 07:37:43', '2019-06-07 07:37:43'),
(42, 'test ticket', 'johndoe@helpdesk.com', '2019-06-07 07:41:23', '2019-06-07 07:41:23'),
(43, 'test123', 'kangkan@email.com', '2019-06-07 12:21:33', '2019-06-07 12:21:33'),
(44, 'test ticket', 'johndoe@helpdesk.com', '2019-06-07 12:22:04', '2019-06-07 12:22:04'),
(45, 'demo ticket', 'demo@email.com', '2023-03-20 12:27:25', '2023-03-20 12:27:25'),
(46, 'demo', 'demo@email.com', '2023-03-20 16:41:23', '2023-03-20 16:41:23'),
(47, 'Ganesh ', 'johndoe@helpdesk.com', '2024-05-16 14:13:44', '2024-05-16 14:13:44'),
(48, 'Ganesh ', 's.sriganesh.work@gmail.com', '2024-05-16 14:14:15', '2024-05-16 14:14:15'),
(49, 'ravi', '', '2024-05-17', '2024-05-17 09:53:46'),
(50, 'vishnu', '', '2024-05-17', '2024-05-17 09:58:16'),
(51, 'ravi', '', '2024-05-02', '2024-05-17 10:15:22'),
(52, 'ravi', '', '2024-05-02', '2024-05-17 14:44:46'),
(53, 'ravi', '', '2024-05-10', '2024-05-17 14:48:44');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Server', '2019-05-19 09:49:15', '2019-05-19 09:49:15'),
(2, 'Devops', '2019-05-19 09:49:15', '2019-05-19 09:49:15'),
(3, 'injamul ', '2019-05-23 19:16:36', '2019-05-23 19:16:36');

-- --------------------------------------------------------

--
-- Table structure for table `team_member`
--

CREATE TABLE `team_member` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `team` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `team_member`
--

INSERT INTO `team_member` (`id`, `user`, `team`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2019-05-19 15:08:37', '2019-05-19 15:08:37'),
(4, 4, 2, '2019-05-30 11:45:10', '2019-05-30 11:45:10'),
(5, 4, 3, '2019-05-30 11:46:15', '2019-05-30 11:46:15'),
(6, 4, 3, '2019-05-30 11:47:53', '2019-05-30 11:47:53'),
(7, 2, 3, '2019-05-30 11:51:38', '2019-05-30 11:51:38'),
(9, 4, 1, '2019-05-31 07:35:45', '2019-05-31 07:35:45');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `Issue` varchar(200) NOT NULL,
  `staff_id` varchar(20) NOT NULL,
  `team` varchar(20) DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'open',
  `comment` varchar(100) NOT NULL,
  `priority` varchar(20) NOT NULL DEFAULT 'low',
  `updated_at` varchar(50) DEFAULT NULL,
  `location` varchar(200) NOT NULL,
  `floor` varchar(200) NOT NULL,
  `room` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`id`, `name`, `Issue`, `staff_id`, `team`, `status`, `comment`, `priority`, `updated_at`, `location`, `floor`, `room`) VALUES
(1079, 'ravi', 'bsmnbsnmbsmn', '3115292', 'Maintainence', 'open', '', 'low', '2024-06-06 13:39:38', 'Main Block', 'Ground Floor', 'MABG10-LAB2'),
(1083, 'ravi', 'loght issue', '3115059', 'Maintainence', 'open', '', 'low', '2024-06-07 14:07:17', 'Mech Block', 'Ground Floor', 'MEBG08 - IIC'),
(1116, 'soyaa', 'fan rotating slowely', '3115059', 'Maintainence', 'open', '', 'medium', '2024-06-08 11:00:10', 'Main Block', 'Ground Floor', 'MABG05-Admin office'),
(1643, 'vedhaaaa', 'window crack', '311522104058', 'Safety', 'closed', '', 'urgent', '2024-06-05 13:49:06', 'Main Block', 'Second Floor', 'MABS21-CLASSROOM 2ND YEAR-CSE'),
(1868, 'senmu', 'light', '1456', NULL, 'closed', '', 'urgent', '2024-06-04 15:30:38', 'Main Block', 'Second Floor', 'MABS01-CLASSROOM-4TH YEAR-ECE-B'),
(2134, 'thiru', 'hello testing', '12345', 'Safety', 'open', '', 'medium', '2024-06-08 10:49:00', 'Main Block', 'Ground Floor', 'MABG08-LAB1'),
(2171, 'sentamil mukilan', 'heavy water lekage', '311522104044', '', 'verify', '', 'urgent', '2024-06-04 21:02:01', 'Main Block', 'Ground Floor', 'MABG10-LAB2'),
(2470, 'sentamil mukilan', 'water log in walls', '3115059', 'Safety', 'verify', '', 'high', '2024-06-05 12:53:53', 'Main Block', 'Ground Floor', 'MABG12-  DEPARTMENT OFFICE (EEE)'),
(2913, 'ravi', 'bsmnbsnmbsmn', '3115292', 'Maintainence', 'open', '', 'low', '2024-06-06 13:38:52', 'Main Block', 'Ground Floor', 'MABG10-LAB2'),
(3005, 'sriganesh', 'final test', '1456', NULL, 'verify', '', '1', '2024-05-28 14:15:46', 'Civil', 'Floor 1', '101'),
(3019, 'sentamil mukilan', 'htfhg', '3115059', 'Maintainence', 'open', '', 'low', '2024-06-06 13:41:12', 'Mech Block', 'Ground Floor', 'MEBG14 - PG Research lab'),
(3024, 'Lakshmanan', 'System Not working properly', '1', 'Maintainence', 'open', '', 'low', '2024-06-08 09:33:05', 'Main Block', 'Ground Floor', 'MABG09-LAB3'),
(3062, 'vishunu', 'water leak', '3456', NULL, 'solved', '', 'low', '2024-06-04 15:35:43', 'Main Block', 'Ground Floor', 'MABG10-LAB2'),
(3482, 'ravi', 'water seepage form rest room and ac switch point closing issue', '3115205', NULL, 'open', '', '4', '2024-05-29 15:20:06', 'Main Block', 'Second Floor', 'MABS22-FACULTY ROOM-CSE'),
(3516, 'malini', 'j', '23', 'Maintainence', 'open', '', 'medium', '2024-06-05 12:05:58', 'Main Block', 'First Floor', 'MABF13-SECOND YEAR EEE CLASSROOM'),
(3580, 'sriganesh', 'water seepage form rest room and ac switch point closing issue', '23', 'Maintainence', 'open', '', 'low', '2024-06-08 09:56:13', 'Main Block', 'Ground Floor', 'MABG15- CONTROL AND INSTRUMENTAL LAB(EEE)'),
(3612, 'hhghsgjh', 'hello', '3115205', 'Maintainence', 'open', '', 'low', '2024-06-06 13:41:53', 'Main Block', 'Ground Floor', 'MABG01- SECRETARY ROOM'),
(3752, 'sentamil mukilan', 'Water', '3115059', NULL, 'open', '', '4', '2024-05-31 15:45:08', 'Main Block', 'Second Floor', 'MABS24-GIRLS REST ROOM'),
(3849, 'sentamil mukilan', 'jkjkjk', '1002', 'Maintainence', 'open', '', 'low', '2024-06-05 11:20:29', 'Main Block', 'Ground Floor', 'MABG10-LAB2'),
(3863, 'vishnuvardhan', 'hello', '3115059', 'Maintainence', 'open', '', 'medium', '2024-06-05 12:04:08', 'Main Block', 'Second Floor', 'MABS06-LAB2-DSD LAB'),
(4218, 'jkhkjjhkj', 'gjghjghjh', '3115059', 'Maintainence', 'solved', 'final test', 'low', '2024-06-05 11:56:27', 'Main Block', 'Ground Floor', 'MABG09-LAB3'),
(4830, 'nanndhan', 'light isssue', '5656', 'Safety', 'solved', 'i have solveed this error', 'urgent', '2024-06-06 15:53:07', 'Main Block', 'Ground Floor', 'MABG06-LAB6 ELECTRICAL WORKSHOP'),
(4868, 'sentamil mukilan', 'final test', '3115059', NULL, 'verify', '', '4', '2024-05-31 15:58:08', 'Main Block', 'First Floor', 'MABF21-LAB1 ELECTRONICS LAB'),
(4901, 'aja', 'water seepage form rest room and ac switch point closing issue', '1001', 'Maintainence', 'solved', '', 'low', '2024-06-05 14:30:40', 'Main Block', 'Ground Floor', 'MABG14- ECE SECOND YEAR CLASSROOM'),
(4996, 'sentamil mukilan', 'final test', '1456', NULL, 'verify', '', '1', '2024-05-31 15:50:04', 'Main Block', 'Ground Floor', 'MABG12-  DEPARTMENT OFFICE (EEE)'),
(5019, 'R M Sentamil mukilan ', 'knj', '3115205', 'Maintainence', 'verify', '', 'high', '2024-06-05 12:05:25', 'Main Block', 'First Floor', 'MABF14-HOD CABIN EEE'),
(5060, 'vedha', 'light', '23', 'Maintainence', 'open', '', 'urgent', '2024-06-07 15:15:31', 'Main Block', 'First Floor', 'MABF12-HOD CABIN ECE'),
(5103, 'R M Sentamil mukilan ', 'water log in walls', '1456', NULL, 'verify', '', '1', '2024-05-31 15:57:18', 'Main Block', 'Ground Floor', 'MABG15- CONTROL AND INSTRUMENTAL LAB(EEE)'),
(5554, 'vishunu', 'water leak', '3456', NULL, 'verify', '', 'low', '2024-06-04 15:36:00', 'Main Block', 'Ground Floor', 'MABG10-LAB2'),
(5597, 'ravi', 'bsmnbsnmbsmn', '3115292', 'Maintainence', 'open', '', 'low', '2024-06-06 13:38:07', 'Main Block', 'Ground Floor', 'MABG10-LAB2'),
(5905, 'lavanya', 'light', '1456', 'Maintainence', 'open', '', 'low', '2024-06-07 15:18:40', 'Main Block', 'Third Floor', 'MABT28-HOD CABIN IT'),
(5973, 'jkhkjjhkj', 'gjghjghjh', '3115059', 'Maintainence', 'verify', '', 'low', '2024-06-05 11:55:53', 'Main Block', 'Ground Floor', 'MABG09-LAB3'),
(6022, 'R M Sentamil mukilan ', 'hello', '3115059', 'Maintainence', 'verify', '', 'urgent', '2024-06-05 11:20:06', 'Mech Block', 'Ground Floor', 'MEBG08 - IIC'),
(6122, 'ravi', 'ghy', '67', 'Maintainence', 'open', '', 'low', '2024-06-08 10:23:21', 'Mech Block', 'Second Floor', 'MEBS01 - hod cabin AIDS'),
(6399, 'vedha', 'light', '23', 'Maintainence', 'open', '', 'urgent', '2024-06-07 14:31:14', 'Main Block', 'First Floor', 'MABF12-HOD CABIN ECE'),
(6593, 'sentamil mukilan', 'htfhg', '3115059', 'Maintainence', 'open', '', 'low', '2024-06-06 13:40:03', 'Mech Block', 'Ground Floor', 'MEBG14 - PG Research lab'),
(6981, 'thiru', 'llllllllllllll', '678', 'Safety', 'closed', '', 'urgent', '2024-06-05 13:54:55', 'Main Block', 'Ground Floor', 'MABG09-LAB3'),
(7045, 'R M Sentamil mukilan ', 'hello', '3115059', '', 'verify', '', 'urgent', '2024-06-05 11:18:25', 'Mech Block', 'Ground Floor', 'MEBG08 - IIC'),
(7057, 'saroj kumar', 'final test', '3115083', 'Maintainence', 'open', '', 'low', '2024-06-06 13:33:23', 'Main Block', 'First Floor', 'MABF13-SECOND YEAR EEE CLASSROOM'),
(7100, 'sriganesh', 'sdf', '23', 'Maintainence', 'open', '', 'low', '2024-06-08 09:52:10', 'Main Block', 'Ground Floor', 'MABG02- BOARD ROOM(EEE)'),
(7187, 'vedha', 'hjk', '1456', 'Maintainence', 'open', '', 'low', '2024-06-08 09:46:30', 'Main Block', 'Second Floor', 'MABS23-HOD CABIN-CSE'),
(7299, 'nanndhan', 'light isssue', '5656', 'Safety', 'open', '', 'urgent', '2024-06-06 15:53:44', 'Main Block', 'Ground Floor', 'MABG06-LAB6 ELECTRICAL WORKSHOP'),
(7335, 'Lakshmanan', 'System Not working properly', '1', 'Maintainence', 'open', '', 'low', '2024-06-08 09:50:14', 'Main Block', 'Ground Floor', 'MABG05-Admin office'),
(7776, 'R M Sentamil mukilan ', 'LIGHT', '1456', NULL, 'verify', '', '4', '2024-05-29 14:26:27', 'Main Block', 'Second Floor', 'MABS09-LAB6-DS/NETWORK LAB'),
(8048, 'Lakshmanan', 'System Not working properly', '1', 'Maintainence', 'open', '', 'high', '2024-06-08 09:31:32', 'Main Block', 'First Floor', 'MABF05- TUTORIAL ROOM ME EEE'),
(8996, 'sriganesh', 'sdf', '23', 'Maintainence', 'open', '', 'low', '2024-06-08 09:55:41', 'Main Block', 'Ground Floor', 'MABG02- BOARD ROOM(EEE)'),
(9030, 'malini', 'water log in walls', '3115059', NULL, 'closed', '', '2', '2024-05-29 14:56:55', 'Main Block', 'Second Floor', 'MABS22-FACULTY ROOM-CSE'),
(9636, 'soyaa', 'fan rotating slowely', '3115059', 'Maintainence', 'open', '', 'medium', '2024-06-08 10:36:54', 'Main Block', 'Ground Floor', 'MABG05-Admin office'),
(9791, 'af', 'jdjqq', '34', 'Maintainence', 'verify', '', 'high', '2024-06-05 13:58:23', 'Main Block', 'Ground Floor', 'MABG05-Admin office'),
(9897, 'sriganesh', 'ert', '3115059', 'Maintainence', 'open', '', 'low', '2024-06-08 10:34:09', 'Main Block', 'Ground Floor', 'MABG10-LAB2'),
(9902, 'ooo', 'noise', '1111', 'Maintainence', 'open', '', 'urgent', '2024-06-06 15:48:57', 'Main Block', 'Ground Floor', 'MABG22-KRS HALL'),
(9984, 'mohanaal', 'glass broken', '311522104044', 'Safety', 'open', '', 'urgent', '2024-06-08 10:43:51', 'Main Block', 'Second Floor', 'MABS18-CLASSROOM 3RD YEAR-CSE');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_event`
--

CREATE TABLE `ticket_event` (
  `id` int(11) NOT NULL,
  `ticket` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `body` varchar(256) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ticket_event`
--

INSERT INTO `ticket_event` (`id`, `ticket`, `user`, `body`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 'Ticket created', '2019-05-23 17:18:25', '2019-05-23 17:18:25'),
(2, 5, 1, 'Ticket created', '2019-05-30 13:55:17', '2019-05-30 13:55:17'),
(3, 6, 1, 'Ticket created', '2019-06-07 02:07:43', '2019-06-07 02:07:43'),
(4, 7, 1, 'Ticket created', '2019-06-07 02:11:23', '2019-06-07 02:11:23'),
(5, 8, 4, 'Ticket created', '2019-06-07 06:51:33', '2019-06-07 06:51:33'),
(6, 9, 4, 'Ticket created', '2019-06-07 06:52:04', '2019-06-07 06:52:04'),
(7, 10, 1, 'Ticket created', '2023-03-20 06:57:25', '2023-03-20 06:57:25'),
(8, 11, 1, 'Ticket created', '2023-03-20 11:11:23', '2023-03-20 11:11:23'),
(9, 12, 1, 'Ticket created', '2024-05-16 08:43:44', '2024-05-16 08:43:44'),
(10, 13, 1, 'Ticket created', '2024-05-16 08:44:15', '2024-05-16 08:44:15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'member',
  `avatar` varchar(150) DEFAULT NULL,
  `last_password` varchar(256) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `role`, `avatar`, `last_password`, `created_at`, `updated_at`) VALUES
(1, 'John Doe', 'johndoe@helpdesk.com', '8888888888', '$2y$10$PHXjdcPjksokkGryfqK.WePBgiQB30Gw.ytYBHdmGtqtoGtVHtAm.', 'admin', NULL, '$2y$10$PHXjdcPjksokkGryfqK.WePBgiQB30Gw.ytYBHdmGtqtoGtVHtAm.', '2023-03-20 07:16:20', '2019-05-19 09:01:34'),
(3, 'injamul ', 'johndoe@helpdesk.com', '1234567899', '$2y$10$6N4gbdypYQvRkU2ke9Q1f.Gm4fcGY/PEpv2rSB77wiSLZaOy8kq5i', 'member', NULL, '$2y$10$6N4gbdypYQvRkU2ke9Q1f.Gm4fcGY/PEpv2rSB77wiSLZaOy8kq5i', '2023-03-20 07:16:07', '2019-05-24 07:58:53'),
(4, 'Alex', 'kangkan@email.com', '9999999999', '$2y$10$Q0rxoFO4fSrcdp58CO0RNOSDP7znVc9eGY6Z4xjQ8MTLHYhx0TF.6', 'member', NULL, '$2y$10$Q0rxoFO4fSrcdp58CO0RNOSDP7znVc9eGY6Z4xjQ8MTLHYhx0TF.6', '2023-03-20 06:36:52', '2019-05-30 08:49:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `names`
--
ALTER TABLE `names`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requester`
--
ALTER TABLE `requester`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team_member`
--
ALTER TABLE `team_member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_event`
--
ALTER TABLE `ticket_event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `names`
--
ALTER TABLE `names`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `requester`
--
ALTER TABLE `requester`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `team_member`
--
ALTER TABLE `team_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9985;

--
-- AUTO_INCREMENT for table `ticket_event`
--
ALTER TABLE `ticket_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
