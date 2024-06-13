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
-- Database: `building_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `buildings`
--

CREATE TABLE `buildings` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buildings`
--

INSERT INTO `buildings` (`id`, `name`) VALUES
(11, 'Main Block'),
(13, 'Civil Block'),
(14, 'Mech Block'),
(15, 'MBA Block'),
(16, 'IIET BLOCK'),
(18, 'HOSTEL');

-- --------------------------------------------------------

--
-- Table structure for table `floors`
--

CREATE TABLE `floors` (
  `id` int(11) NOT NULL,
  `building_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `floors`
--

INSERT INTO `floors` (`id`, `building_id`, `name`) VALUES
(9, 11, 'Ground Floor'),
(10, 11, 'First Floor'),
(11, 11, 'Second Floor'),
(12, 11, 'Third Floor'),
(13, 14, 'Ground Floor'),
(14, 14, 'First Floor'),
(15, 14, 'Second Floor'),
(16, 14, 'Third Floor'),
(17, 16, 'FIRST FLOOR'),
(18, 16, 'SECOND FLOOR'),
(19, 18, 'Ground Floor'),
(20, 18, 'First Floor'),
(21, 18, 'Seond Floor');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `floor_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `floor_id`, `name`) VALUES
(5, 9, 'MABG05-Admin office'),
(6, 9, 'MABG04-Pantry(EEE)'),
(8, 9, 'MABG02- BOARD ROOM(EEE)'),
(9, 9, 'MABG01- SECRETARY ROOM'),
(10, 9, 'MABG23- TRAINING AND PLACEMENT CELL'),
(11, 9, 'MABG22-KRS HALL'),
(12, 9, 'MABG21-COUNCELLING ROOM'),
(13, 9, 'MABG20-STAFF RESTROOM (EEE)'),
(14, 9, 'MABG19-PRINCIPAL ROOM'),
(15, 9, 'MABG18-IQAC (CSE)'),
(16, 9, 'MABG17-EEE LAB5 AND DIC'),
(17, 9, 'MABG16- RENEWABLE ENERGY SYSTEM LAB(EEE)'),
(18, 9, 'MABG15- CONTROL AND INSTRUMENTAL LAB(EEE)'),
(19, 9, 'MABG14- ECE SECOND YEAR CLASSROOM'),
(20, 9, 'MABG12-  DEPARTMENT OFFICE (EEE)'),
(21, 9, 'MABG10-LAB2'),
(23, 9, 'MABG09-LAB3'),
(24, 9, 'MABG08-LAB1'),
(25, 9, 'MABG06-LAB6 ELECTRICAL WORKSHOP'),
(26, 10, 'MABF01-LIBRARY'),
(27, 10, 'MABF02-OOPS/DS AND ML LAB'),
(28, 10, 'MABF03-LAB3 AND LAB1 PSPP/DBMS/C'),
(29, 10, 'MABF08- CLASSROOM 4TH YEAR EEE '),
(30, 10, 'MABF05- TUTORIAL ROOM ME EEE'),
(31, 10, 'MABF06- LAB7 POWER ELECTRONICS AND DRIVAS LAB'),
(32, 10, 'MABF07- BOYS RESTROOM(EEE)'),
(33, 10, 'MABF04- 3RD YEAR CLASSROOM EEE'),
(34, 10, 'MABF09- EEE LAB9 POWER SYSTEM STIMULATION LAB/LANGUAGE LAB'),
(35, 10, 'MABF10- EEE TUTORAIL ROOM'),
(36, 10, 'MABF11-FACULTY ROOM ECE '),
(37, 10, 'MABF12-HOD CABIN ECE'),
(39, 10, 'MABF13-SECOND YEAR EEE CLASSROOM'),
(40, 10, 'MABF14-HOD CABIN EEE'),
(41, 10, 'MABF15-FACULTY ROOM EEE'),
(42, 10, 'MABF18-LAB3 /CS LAB'),
(43, 10, 'MABF19-LAB4 OPT AND MICROWAVE LAB'),
(44, 10, 'MABF20-LAB2 DIGTIAL LAB'),
(45, 10, 'MABF21-LAB1 ELECTRONICS LAB'),
(46, 10, 'MABF16-GIRLS RESTROOM'),
(47, 10, 'MABF17-STAFF GIRLS RESTROOM'),
(48, 11, 'MABS09-LAB6-DS/NETWORK LAB'),
(49, 11, 'MABS08-CLASSROOM-1ST YEAR-M.E'),
(50, 11, 'MABS07-LAB1-PSPP LAB'),
(51, 11, 'MABS06-LAB2-DSD LAB'),
(52, 11, 'MABS05-CLASSROOM-4TH YEAR-ECE A'),
(53, 11, 'MABS04-STUDENT PROFESSIONAL DEVOLPMENT CENTRE'),
(54, 11, 'MABS30-MAINTENANCE-ECE'),
(55, 11, 'MABS03-GENTS REST ROOM'),
(56, 11, 'MABS02-EXTENSION SERVICE CENTRE'),
(57, 11, 'MABS01-CLASSROOM-4TH YEAR-ECE-B'),
(58, 11, 'MABS28-LAB5-EMBEDDED LAB'),
(59, 11, 'MABS29-LAB6-DSP/VLSI LAB'),
(60, 11, 'MABS27-EMBEDDED LAB-(M.E)'),
(61, 11, 'MABS26-RESEARCH LAB-(M.E)'),
(62, 11, 'MABS25-HOUSEKEEPING'),
(63, 11, 'MABS24-GIRLS REST ROOM'),
(64, 11, 'MABS23-HOD CABIN-CSE'),
(65, 11, 'MABS22-FACULTY ROOM-CSE'),
(66, 11, 'MABS21-CLASSROOM 2ND YEAR-CSE'),
(67, 11, 'MABS19-RESEAH CENTER-ECE'),
(68, 11, 'MABS18-CLASSROOM 3RD YEAR-CSE'),
(69, 11, 'MABS17-BOYS RESTROOM'),
(70, 11, 'MABS16-RESEARCH LAB'),
(71, 11, 'MABS15-DEPARTMENT OFFICE'),
(72, 11, 'MABS14-CLASSROOM 4TH YEAR-CSE'),
(73, 11, 'MABS13-LAB3-PROJECT WORK/OOSE/CM LAB'),
(74, 11, 'MABS12-LAB4-CC/DCT/COMPILER LAB'),
(75, 11, 'MABS11-PG LAB-CS/DPLAB-(M.E)'),
(76, 11, 'MABS10-LAB5-FS/OSLAB-(B.E)'),
(77, 11, 'MABS20-NOTHING'),
(78, 12, 'MABT12-MSEC STORE'),
(79, 12, 'MABT11-TUTORIAL ROOM(B.E)/DEPT LIBRARY'),
(80, 12, 'MABT10-TUTORIAL ROOM(M.E)'),
(81, 12, 'IT SEMINAR HALL'),
(82, 12, 'MABT08-CLASS ROOM 1ST YEAR ME'),
(83, 12, 'MABT07-COMMON COMPUTER CENTER 2'),
(84, 12, 'MABT06-COMMON COMPUTER CENTER 2'),
(85, 12, 'MABT05-B.TECH LAB-4 OOSE AND DBMS LAB'),
(86, 12, 'MABT03-B.TECH LAB-3 PYTHON PROGRAM,OS AND PROJECT LAB'),
(87, 12, 'MABT01-B.TECH LAB-1 DS AND MOBILE APPLICATION DEVLOP LAB'),
(88, 12, 'MABT02-B.TECH LAB-2 OOPS AND NETWORK LAB'),
(89, 12, 'MABT31-GIRLS COMMON ROOM'),
(90, 12, 'MABT28-HOD CABIN IT'),
(91, 12, 'MABT29-FACULTY ROOM IT'),
(92, 12, 'MABT27-TUTORIAL ROOM'),
(93, 12, 'MABT26-ECE 3RD YEAR-A'),
(94, 12, 'MABT25-DEPARTMENT OFFICE(ECE)'),
(95, 12, 'MABT24-ECE 3RD YEAR-B'),
(96, 12, 'MABT23-LAB-6 DS AND WEB DEVLOPMENT LAB'),
(97, 12, 'MABT22-TUTORIAL ROOM'),
(98, 12, 'MABT21-BOYS REST ROOM'),
(99, 12, 'MABT20-3RD YEAR CLASSROOM IT'),
(100, 12, 'MABT18-2ND YEAR CLASSROOM IT'),
(101, 12, 'MABT19-2ND YEAR CLASSROOM ECE-B'),
(102, 12, 'MABT17-4TH YEAR CLASSROOM IT'),
(103, 12, 'MABT16-LAB-5 DATA SCIENCE,AIML CLOUD LAB'),
(104, 12, 'MABT15-COMMON COMPUTER CENTER 1-IT'),
(120, 14, 'MEBF05 - Department library'),
(124, 13, 'MEBG14 - PG Research lab'),
(125, 13, 'MEBG13 - Lab 4 metrology '),
(126, 13, 'MEBG15 - CAM lab BE'),
(127, 13, 'MEBG16 - CAM lab ME'),
(128, 13, 'MEBG17 - Renewable Source lab ME'),
(129, 13, 'MEBG12 - Classroom 4th yr mech'),
(130, 13, 'MEBG11 - prof KRS clinic'),
(131, 13, 'MEBG10 - internal compliance cell'),
(135, 13, 'MEBG09 - Electrical room'),
(136, 13, 'MEBG08 - IIC'),
(137, 13, 'MEBG07 - TUTORIAL LAB'),
(138, 13, 'MEBG06 - Lab 3 Dynamic lab'),
(139, 13, 'MEBG05 - thermal lab'),
(140, 13, 'MEBG04 - lab hear transfer'),
(141, 14, 'MEBF06 - HOD cabin'),
(142, 14, 'MEBF04 - classroom 3rd yr mech'),
(143, 14, 'MEBF03 - classroom 2nd yr mech'),
(144, 14, 'MEBF01 - girls common room'),
(145, 14, 'MEBF02 - classroom 4th yr civil'),
(146, 14, 'MEBF07 - examination control center '),
(147, 14, 'MEBF08 - lab 5 mechatronical IoT lab'),
(148, 14, 'MEBF09 - CAD centre BE'),
(149, 15, 'MEBS04 - Classroom 2nd yr AIDS'),
(150, 15, 'MEBS05 - Classroom 3rd yr AIDS'),
(151, 15, 'MEBS06 - classroom 4th yr AIDS '),
(152, 15, 'MEBS01 - hod cabin AIDS'),
(153, 15, 'MEBS02 - faculty room AIDS'),
(154, 15, 'MEBS09 - PG classroom mech'),
(155, 15, 'MEBS10 - Classroom 3rd yr BE Civil '),
(156, 15, 'MEBS11 - 2nd yr BE Civil'),
(157, 16, 'MEBT07 - Innovation cell AIDS'),
(158, 16, 'MEBT06 - Girls common room'),
(159, 16, 'MEBT02 - btech lab 3 ai lab ml lab'),
(160, 16, 'MEBT03 - btech lab 2 DBDM Lab & DSA lab'),
(161, 16, 'MEBT04 - btech lab 5 dev lab & DSA lab'),
(162, 16, 'MEBT05 - btech lab 6 DS lab & Data lab'),
(163, 16, 'MEBT07 -  anti ragging cell'),
(164, 16, 'MEBT08 - department office'),
(165, 16, 'MEBT13 - boys restroom'),
(166, 16, 'MEBT12 - boys common room'),
(167, 9, 'MABG05-Admin office');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buildings`
--
ALTER TABLE `buildings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `floors`
--
ALTER TABLE `floors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `building_id` (`building_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `floor_id` (`floor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buildings`
--
ALTER TABLE `buildings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `floors`
--
ALTER TABLE `floors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `floors`
--
ALTER TABLE `floors`
  ADD CONSTRAINT `floors_ibfk_1` FOREIGN KEY (`building_id`) REFERENCES `buildings` (`id`);

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_ibfk_1` FOREIGN KEY (`floor_id`) REFERENCES `floors` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
