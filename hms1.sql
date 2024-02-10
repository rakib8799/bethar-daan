-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2024 at 03:11 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms1`
--

-- --------------------------------------------------------

--
-- Table structure for table `addbed`
--

CREATE TABLE `addbed` (
  `id` int(11) NOT NULL,
  `bedNum` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addbed`
--

INSERT INTO `addbed` (`id`, `bedNum`, `creationDate`, `updationDate`) VALUES
(1, 'Bed- 01', '2022-10-30 18:09:46', '2023-12-06 15:15:49'),
(2, 'Bed- 02', '2022-10-30 18:09:46', '2023-12-06 15:15:49'),
(3, 'Bed- 03', '2022-10-30 18:09:46', '2023-12-06 15:15:49'),
(4, 'Bed- 04', '2022-10-30 18:09:46', '2023-12-06 15:15:49'),
(5, 'Bed- 05', '2022-10-30 18:10:28', '2023-12-06 15:16:18');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `updationDate`) VALUES
(1, 'admin', 'Test@12345', '30-10-2022 11:42:05 AM');

-- --------------------------------------------------------

--
-- Table structure for table `ambulance_availability`
--

CREATE TABLE `ambulance_availability` (
  `id` int(11) NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `availability_status` varchar(255) DEFAULT NULL,
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ambulance_availability`
--

INSERT INTO `ambulance_availability` (`id`, `location`, `availability_status`, `last_updated`) VALUES
(1, 'BDMC', 'Yes', '0000-00-00 00:00:00'),
(2, 'Bethar Daan Medical Center', 'Available', '2024-02-05 14:13:51'),
(3, 'Trishal medical college ', 'Not Available', '2024-02-06 09:53:13');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `doctorSpecialization` varchar(255) DEFAULT NULL,
  `doctorId` int(11) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `appointmentDate` varchar(255) DEFAULT NULL,
  `appointmentTime` varchar(255) DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `userStatus` int(11) DEFAULT NULL,
  `doctorStatus` int(11) DEFAULT NULL,
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `doctorSpecialization`, `doctorId`, `userId`, `appointmentDate`, `appointmentTime`, `postingDate`, `userStatus`, `doctorStatus`, `updationDate`) VALUES
(1, 'Medicine and Urology', 1, 1, '2022-11-10', '12:45 PM', '2022-11-06 12:21:48', 1, 1, '2023-11-27 22:31:04'),
(2, 'Medicine and Urology', 1, 2, '2022-11-17', '7:00 PM', '2022-11-06 13:16:18', 1, 1, NULL),
(3, 'Skin and VD', 2, 1, '2024-02-08', '6:00 PM', '2024-02-05 13:57:06', 1, 1, NULL),
(4, 'Medicine and Urology', 0, 7, '2024-02-12', '2:00 PM', '2024-02-06 13:46:42', 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `assignbed`
--

CREATE TABLE `assignbed` (
  `id` int(11) NOT NULL,
  `bedNum` varchar(255) DEFAULT NULL,
  `patientName` varchar(255) DEFAULT NULL,
  `gender` longtext,
  `contactno` bigint(11) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignbed`
--

INSERT INTO `assignbed` (`id`, `bedNum`, `patientName`, `gender`, `contactno`, `creationDate`, `updationDate`) VALUES
(1, 'Bed- 01', 'Sayema Shairin Tonu', 'Female', 1736805831, '2022-10-30 18:16:52', '2023-12-22 22:56:57'),
(3, 'Bed- 02', 'Deena', 'Female', 1866082604, '2024-02-05 13:50:10', NULL),
(4, 'Bed- 03', 'Sayema ', 'Female', 1900128912, '2024-02-05 13:51:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `docav`
--

CREATE TABLE `docav` (
  `id` int(11) NOT NULL,
  `avtime` varchar(255) DEFAULT NULL,
  `docName` varchar(255) DEFAULT NULL,
  `gender` longtext,
  `contactno` bigint(11) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `docav`
--

INSERT INTO `docav` (`id`, `avtime`, `docName`, `gender`, `contactno`, `creationDate`, `updationDate`) VALUES
(4, 'From 01 PM to 07 PM ', 'Dr. Sharif Ahmed Akanda(Surgery)', 'Male ', 1794542215, '2022-11-04 01:06:41', '2023-12-06 08:08:47'),
(5, 'From 09 AM to 02 PM', 'Dr. Mumtaz Begum', 'Female', 1900128912, '2024-02-05 04:12:17', NULL),
(7, 'From 02 PM to 07 PM', 'Dr. Abul Khaer Mohammad Helal Uddin', 'Male', 1736805832, '2024-02-05 13:09:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `docavtime`
--

CREATE TABLE `docavtime` (
  `id` int(11) NOT NULL,
  `avtime` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `docavtime`
--

INSERT INTO `docavtime` (`id`, `avtime`, `creationDate`, `updationDate`) VALUES
(1, 'From 09 AM to 02 PM', '2022-10-30 18:09:46', '2024-02-05 04:11:07'),
(2, 'From 02 PM to 07 PM', '2022-10-30 18:10:28', '2024-02-05 04:11:39');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `specilization` varchar(255) DEFAULT NULL,
  `doctorName` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `contactno` bigint(11) DEFAULT NULL,
  `docEmail` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `specilization`, `doctorName`, `address`, `contactno`, `docEmail`, `password`, `creationDate`, `updationDate`) VALUES
(1, 'Medicine and Urology', 'Dr. Abul Khaer Mohammad Helal Uddin', 'Room-101', 172236996, 'shadman_99@yahoo.com', 'f925916e2754e5e03f75dd58a5733251', '2023-11-04 01:06:41', '2024-02-05 04:07:50'),
(2, 'Skin and VD', 'Dr. Mumtaz Begum', 'Room-105', 1716022537, 'shiponmomtaz707@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2022-10-30 18:16:52', '2023-11-06 13:20:17'),
(3, 'Medicine and Cardiology', 'Dr. M.M Ashraf Uddin Talukdar', 'Room-102', 1673020002, 'drasraftalukdar@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2022-10-30 18:16:52', '2023-11-06 13:20:17'),
(4, 'Surgery', 'Dr. Sharif Ahmed Akanda', 'Room-105 ', 1794542215, 'sharifahmed768gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2022-11-04 01:06:41', '2023-11-06 13:20:17');

-- --------------------------------------------------------

--
-- Table structure for table `doctorslog`
--

CREATE TABLE `doctorslog` (
  `id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `userip` binary(16) DEFAULT NULL,
  `loginTime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `logout` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctorslog`
--

INSERT INTO `doctorslog` (`id`, `uid`, `username`, `userip`, `loginTime`, `logout`, `status`) VALUES
(20, NULL, 'gfdgdf', 0x3a3a3100000000000000000000000000, '2022-11-04 01:02:16', NULL, 0),
(21, 1, 'drasraftalukdar@gmail.com', 0x3a3a3100000000000000000000000000, '2022-11-06 11:59:40', '06-11-2022 05:35:18 PM', 1),
(22, 2, 'sharifahmed768gmail.com', 0x3a3a3100000000000000000000000000, '2022-11-06 11:59:40', '06-11-2022 05:35:18 PM', 1),
(23, 2, 'sharifahmed768gmail.com', 0x3a3a3100000000000000000000000000, '2022-11-06 12:06:37', '06-11-2022 05:36:40 PM', 1),
(24, 2, 'sharifahmed768gmail.com', 0x3a3a3100000000000000000000000000, '2022-11-06 12:08:56', '06-11-2022 05:42:53 PM', 1),
(25, 3, 'shiponmomtaz707@gmail.com', 0x3a3a3100000000000000000000000000, '2022-11-06 11:59:40', '06-11-2022 05:35:18 PM', 1),
(26, 4, 'shadman_99@yahoo.com', 0x3a3a3100000000000000000000000000, '2022-11-06 12:23:18', '06-11-2022 05:53:40 PM', 1),
(27, 2, 'sharifahmed768gmail.com', 0x3a3a3100000000000000000000000000, '2022-11-06 13:16:53', '06-11-2022 06:47:07 PM', 1),
(28, 4, 'shadman_99@yahoo.com', 0x3a3a3100000000000000000000000000, '2022-11-06 13:17:33', '06-11-2022 06:50:28 PM', 1),
(29, 1, 'drasraftalukdar@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-25 08:01:31', NULL, 1),
(30, 1, 'drasraftalukdar@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-25 13:57:58', NULL, 1),
(31, 1, 'drasraftalukdar@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-27 21:09:05', NULL, 1),
(32, 1, 'drasraftalukdar@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-27 22:12:21', NULL, 1),
(33, NULL, 'drasraftalukdar@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-28 11:39:19', NULL, 0),
(34, NULL, 'drasraftalukdar@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-28 11:39:36', NULL, 0),
(35, NULL, 'drasraftalukdar@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-28 11:39:46', NULL, 0),
(36, NULL, 'sharifahmed768gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-28 11:40:10', NULL, 0),
(37, NULL, 'drasraftalukdar@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-28 11:40:37', NULL, 0),
(38, NULL, 'drasraftalukdar@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-28 11:41:16', NULL, 0),
(39, NULL, 'drasraftalukdar@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-28 11:42:53', NULL, 0),
(40, NULL, 'drasraftalukdar@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-28 11:44:32', NULL, 0),
(41, 1, 'drasraftalukdar@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-28 11:44:51', '28-11-2023 05:21:15 PM', 1),
(42, 1, 'drasraftalukdar@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-29 21:27:33', NULL, 1),
(43, 1, 'drasraftalukdar@gmail.com', 0x3a3a3100000000000000000000000000, '2023-12-05 22:10:05', NULL, 1),
(44, 1, 'drasraftalukdar@gmail.com', 0x3a3a3100000000000000000000000000, '2023-12-06 08:03:04', NULL, 1),
(45, 1, 'drasraftalukdar@gmail.com', 0x3a3a3100000000000000000000000000, '2023-12-06 14:31:37', '06-12-2023 08:33:42 PM', 1),
(46, 1, 'drasraftalukdar@gmail.com', 0x3a3a3100000000000000000000000000, '2023-12-06 15:28:34', NULL, 1),
(47, NULL, 'drasraftalukdar@gmail.com', 0x3a3a3100000000000000000000000000, '2023-12-22 22:32:20', NULL, 0),
(48, 1, 'drasraftalukdar@gmail.com', 0x3a3a3100000000000000000000000000, '2023-12-22 22:32:26', NULL, 1),
(49, 1, 'drasraftalukdar@gmail.com', 0x3132372e302e302e3100000000000000, '2023-12-30 13:08:08', NULL, 1),
(50, 1, 'drasraftalukdar@gmail.com', 0x3132372e302e302e3100000000000000, '2023-12-30 20:20:10', NULL, 1),
(51, 1, 'drasraftalukdar@gmail.com', 0x3132372e302e302e3100000000000000, '2023-12-31 04:47:28', NULL, 1),
(52, 3, 'drasraftalukdar@gmail.com', 0x3a3a3100000000000000000000000000, '2024-02-05 03:02:50', NULL, 1),
(53, 3, 'drasraftalukdar@gmail.com', 0x3a3a3100000000000000000000000000, '2024-02-05 10:13:28', NULL, 1),
(54, 2, 'shiponmomtaz707@gmail.com', 0x3a3a3100000000000000000000000000, '2024-02-05 13:58:16', '05-02-2024 07:41:52 PM', 1),
(55, 2, 'shiponmomtaz707@gmail.com', 0x3a3a3100000000000000000000000000, '2024-02-05 14:44:58', '05-02-2024 08:15:20 PM', 1),
(56, 3, 'drasraftalukdar@gmail.com', 0x3a3a3100000000000000000000000000, '2024-02-05 14:45:28', NULL, 1),
(57, 3, 'drasraftalukdar@gmail.com', 0x3a3a3100000000000000000000000000, '2024-02-05 14:49:21', '05-02-2024 08:21:59 PM', 1),
(58, 3, 'drasraftalukdar@gmail.com', 0x3a3a3100000000000000000000000000, '2024-02-06 04:59:05', NULL, 1),
(59, 3, 'drasraftalukdar@gmail.com', 0x3a3a3100000000000000000000000000, '2024-02-06 08:12:31', NULL, 1),
(60, 3, 'drasraftalukdar@gmail.com', 0x3a3a3100000000000000000000000000, '2024-02-06 09:57:25', NULL, 1),
(61, 1, 'shadman_99@yahoo.com', 0x3a3a3100000000000000000000000000, '2024-02-06 13:15:58', NULL, 1),
(62, 1, 'shadman_99@yahoo.com', 0x3a3a3100000000000000000000000000, '2024-02-06 13:41:55', NULL, 1),
(63, 3, 'drasraftalukdar@gmail.com', 0x3a3a3100000000000000000000000000, '2024-02-06 14:02:37', NULL, 1),
(64, 3, 'drasraftalukdar@gmail.com', 0x3a3a3100000000000000000000000000, '2024-02-06 14:03:22', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `doctorspecilization`
--

CREATE TABLE `doctorspecilization` (
  `id` int(11) NOT NULL,
  `specilization` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctorspecilization`
--

INSERT INTO `doctorspecilization` (`id`, `specilization`, `creationDate`, `updationDate`) VALUES
(1, 'Medicine and Urology', '2022-10-30 18:11:39', NULL),
(2, 'Surgery', '2022-10-30 18:10:56', NULL),
(3, 'Skin and VD', '2022-10-30 18:12:02', NULL),
(4, 'Medicine and Cardiology', '2022-10-30 18:12:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `given_medicine_list`
--

CREATE TABLE `given_medicine_list` (
  `id` int(11) NOT NULL,
  `medicine_name` varchar(250) NOT NULL,
  `quantity` varchar(250) NOT NULL,
  `date` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `given_medicine_list`
--

INSERT INTO `given_medicine_list` (`id`, `medicine_name`, `quantity`, `date`) VALUES
(1, 'Napa-500mg', '100', '2024-01-03'),
(2, 'Acitrin-10mg', '460', '2024-02-05'),
(4, 'Napa extra-500mg', '200', '2024-02-05');

-- --------------------------------------------------------

--
-- Table structure for table `medical_history`
--

CREATE TABLE `medical_history` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `uploaded_by` varchar(50) DEFAULT NULL,
  `date_uploaded` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medical_history`
--

INSERT INTO `medical_history` (`id`, `file_name`, `uploaded_by`, `date_uploaded`) VALUES
(1, 'file1.pdf', 'Admin', '2024-01-30 18:16:52'),
(2, 'file2.pdf', 'Admin', '2024-02-05 03:08:28'),
(3, 'file1.pdf', 'Admin', '2024-02-06 08:15:06'),
(4, 'file1.pdf', 'Admin', '2024-02-06 08:43:36'),
(5, 'file2.pdf', 'Admin', '2024-02-06 08:44:24'),
(6, 'file1.pdf', 'Admin', '2024-02-06 08:45:48'),
(7, 'file2.pdf', 'Admin', '2024-02-06 08:45:53');

-- --------------------------------------------------------

--
-- Table structure for table `nurses`
--

CREATE TABLE `nurses` (
  `id` int(11) NOT NULL,
  `specilization` varchar(255) DEFAULT NULL,
  `nurseName` varchar(255) DEFAULT NULL,
  `gender` longtext,
  `contactno` bigint(11) DEFAULT NULL,
  `nurseEmail` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nurses`
--

INSERT INTO `nurses` (`id`, `specilization`, `nurseName`, `gender`, `contactno`, `nurseEmail`, `password`, `creationDate`, `updationDate`) VALUES
(2, 'Nurse', 'Mst. Aklima Akter Ripa', 'Male ', 1723445132, 'ripa@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2022-11-04 01:06:41', '2023-12-06 08:08:27'),
(3, 'Assistant Cum Data Processor', 'Ashik Md. Fizur Akbar Siddique', 'Male', 1552461262, 'ashik@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2022-10-30 18:16:52', '2024-02-05 13:44:38'),
(4, 'Technician Instrument', 'Md. Jamal Uddin ', 'Male ', 1718422479, 'jamaluddinjkkniu@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2022-11-04 01:06:41', '2023-12-06 08:08:47'),
(5, 'Medical Assistant ', 'Md. Rasedul Alam', 'Male ', 1719288749, 'rasedul@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2022-11-04 01:06:41', '2023-12-06 08:08:47'),
(7, 'Nurse', 'Md. Rasel Rana Sagor', 'Male', 18660826043, 'raselrana@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2024-02-05 13:45:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nursespecilization`
--

CREATE TABLE `nursespecilization` (
  `id` int(11) NOT NULL,
  `specilization` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nursespecilization`
--

INSERT INTO `nursespecilization` (`id`, `specilization`, `creationDate`, `updationDate`) VALUES
(1, 'Nurse', '2022-10-30 18:09:46', '2023-12-06 15:15:49'),
(2, 'Assistant Cum Data Processor', '2022-10-30 18:09:57', '2023-12-06 15:16:02'),
(3, 'Medical Assistant ', '2022-10-30 18:10:18', '2023-12-06 15:16:10'),
(4, 'Technician Instrument ', '2022-10-30 18:10:28', '2023-12-06 15:16:18');

-- --------------------------------------------------------

--
-- Table structure for table `purchasing_medicine_list`
--

CREATE TABLE `purchasing_medicine_list` (
  `id` int(11) NOT NULL,
  `medicine_name` varchar(255) DEFAULT NULL,
  `quantity` varchar(50) DEFAULT NULL,
  `date_added` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchasing_medicine_list`
--

INSERT INTO `purchasing_medicine_list` (`id`, `medicine_name`, `quantity`, `date_added`) VALUES
(1, 'Napa-500mg', '500', '2024-01-02'),
(2, 'Acitrin-10mg', '500', '2024-02-05'),
(3, 'Napa extra-500mg', '1000', '2024-02-05');

-- --------------------------------------------------------

--
-- Table structure for table `remaining_medicine_list`
--

CREATE TABLE `remaining_medicine_list` (
  `id` int(11) NOT NULL,
  `medicine_name` varchar(255) NOT NULL,
  `remaining_quantity` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `remaining_medicine_list`
--

INSERT INTO `remaining_medicine_list` (`id`, `medicine_name`, `remaining_quantity`) VALUES
(1, 'Napa-500mg', '400');

-- --------------------------------------------------------

--
-- Table structure for table `tblcontactus`
--

CREATE TABLE `tblcontactus` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contactno` bigint(12) DEFAULT NULL,
  `message` mediumtext,
  `PostingDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `AdminRemark` mediumtext,
  `LastupdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `IsRead` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcontactus`
--

INSERT INTO `tblcontactus` (`id`, `fullname`, `email`, `contactno`, `message`, `PostingDate`, `AdminRemark`, `LastupdationDate`, `IsRead`) VALUES
(1, 'Sayema Shirin Tonu', 'tonusayema@gmail.com', 1736805831, 'This is for testing purposes.   This is for testing purposes.This is for testing purposes.This is for testing purposes.This is for testing purposes.This is for testing purposes.This is for testing purposes.This is for testing purposes.This is for testing purposes.', '2022-10-30 16:52:03', 'okay ', '2024-02-05 14:16:00', 1),
(2, 'SAYEMA SHIRIN TONU', 'tonucse11@gmail.com ', 1600128912, 'How to use this web site ', '2024-02-05 14:18:00', 'Ok', '2024-02-05 14:19:09', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblmedicalhistory`
--

CREATE TABLE `tblmedicalhistory` (
  `ID` int(10) NOT NULL,
  `PatientID` int(10) DEFAULT NULL,
  `BloodPressure` varchar(200) DEFAULT NULL,
  `BloodSugar` varchar(200) NOT NULL,
  `Weight` varchar(100) DEFAULT NULL,
  `Temperature` varchar(200) DEFAULT NULL,
  `MedicalPres` mediumtext,
  `CreationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblmedicalhistory`
--

INSERT INTO `tblmedicalhistory` (`ID`, `PatientID`, `BloodPressure`, `BloodSugar`, `Weight`, `Temperature`, `MedicalPres`, `CreationDate`) VALUES
(1, 1, '80/120', '120', '85', '98', 'Test', '2022-11-06 13:19:41'),
(2, 3, '70/110', '11', '45', '98', '1. Napa\r\n2. Acitrin ', '2024-02-05 10:19:57'),
(3, 3, '70/110', '11', '45', '98', '1. Napa\r\n2. Acitrin ', '2024-02-05 10:19:57'),
(4, 1, '70/110', '11', '45', '98', 'Napa', '2024-02-06 10:00:15'),
(5, 1, '70/110', 'N/A', '45', '98', '1. Napa Extra', '2024-02-06 13:17:01');

-- --------------------------------------------------------

--
-- Table structure for table `tblpage`
--

CREATE TABLE `tblpage` (
  `ID` int(10) NOT NULL,
  `PageType` varchar(200) DEFAULT NULL,
  `PageTitle` varchar(200) DEFAULT NULL,
  `PageDescription` mediumtext,
  `Email` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `OpenningTime` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblpage`
--

INSERT INTO `tblpage` (`ID`, `PageType`, `PageTitle`, `PageDescription`, `Email`, `MobileNumber`, `UpdationDate`, `OpenningTime`) VALUES
(1, 'aboutus', 'About Us', '<ul style=\"padding: 0px; margin-right: 0px; margin-bottom: 1.313em;\" times=\"\" new=\"\" roman\";=\"\" font-size:=\"\" 14px;=\"\" text-align:=\"\" justify;=\"\" background-color:=\"\" rgb(255,=\"\" 246,=\"\" 246);\"=\"\"><li style=\"text-align: justify;\"><font color=\"#000000\">Basically the Bethar Dan Medical Center Management System project is to develop for automating the existing manual system of the university medical center and also for maintaining the medical center easily.  This web service is a very useful tool to maintain the health records of the people of this university. It maintains the patient medical history including personal details and the doctors can look into these records if need be.</font></li><li style=\"text-align: justify;\"><font color=\"#000000\">In this way this system automates the existing system instead of excess amount of people it takes to maintain these records on paper and also these records are monitored so that there are no chances of data leaks. The system also stores the health records of its users so that in case a user wants to refer to their past health records. The Medical Center Management system thus provides a new way of computing and displaying records with responsive and attractive user interface.&nbsp;</font></li></ul>', NULL, NULL, '2020-05-20 07:21:52', NULL),
(2, 'contactus', 'Contact Details', 'Jatiya Kabi Kazi Nazrul Islam Univeristy, Trishal, Mymensingh, Bangladesh', 'rejajkkniu@gmail.com', 1122334455, '2020-05-20 07:24:07', '9 am To 8 Pm');

-- --------------------------------------------------------

--
-- Table structure for table `tblpatient`
--

CREATE TABLE `tblpatient` (
  `ID` int(10) NOT NULL,
  `Docid` int(10) DEFAULT NULL,
  `PatientName` varchar(200) DEFAULT NULL,
  `PatientContno` bigint(20) DEFAULT NULL,
  `PatientEmail` varchar(200) DEFAULT NULL,
  `PatientGender` varchar(50) DEFAULT NULL,
  `PatientAdd` mediumtext,
  `PatientAge` int(10) DEFAULT NULL,
  `PatientMedhis` mediumtext,
  `CreationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpatient`
--

INSERT INTO `tblpatient` (`ID`, `Docid`, `PatientName`, `PatientContno`, `PatientEmail`, `PatientGender`, `PatientAdd`, `PatientAge`, `PatientMedhis`, `CreationDate`, `UpdationDate`) VALUES
(1, 1, 'Sayema Shirin Tonu', 1736805831, 'tonusayema@gmail.com', 'female', 'Student', 25, 'NA', '2022-06-04 13:18:31', '2023-12-05 22:11:14'),
(2, 1, 'Deena Faria', 1878047394, 'deenafaria@gmail.com', 'female', 'Student', 25, 'NA', '2022-06-04 13:18:31', '2023-12-05 22:11:14'),
(3, 3, 'Tonu Sayema', 1600128913, 'tonucse11@gmail.com', 'Female', 'Student ', 24, 'N/A', '2024-02-05 10:17:19', '2024-02-05 14:45:45');

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `userip` binary(16) DEFAULT NULL,
  `loginTime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `logout` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `uid`, `username`, `userip`, `loginTime`, `logout`, `status`) VALUES
(1, 1, 'tonusayema@gmail.com', 0x3a3a3100000000000000000000000000, '2022-11-06 12:14:11', NULL, 1),
(2, 1, 'tonusayema@gmail.com', 0x3a3a3100000000000000000000000000, '2022-11-06 12:21:20', '06-11-2022 05:53:00 PM', 1),
(3, 2, 'deenafaria@gmail.com', 0x3a3a3100000000000000000000000000, '2022-11-06 13:15:43', NULL, 0),
(4, 2, 'deenafaria@gmail.com', 0x3a3a3100000000000000000000000000, '2022-11-06 13:15:58', '06-11-2022 06:50:46 PM', 1),
(5, NULL, 'shoukhin', 0x3132372e302e302e3100000000000000, '2023-11-12 08:48:31', NULL, 0),
(6, 1, 'tonusayema@gmail.com', 0x3132372e302e302e3100000000000000, '2023-11-15 16:00:26', '15-11-2023 10:02:52 PM', 1),
(7, 1, 'tonusayema@gmail.com', 0x3132372e302e302e3100000000000000, '2023-11-15 16:34:05', '15-11-2023 10:08:41 PM', 1),
(8, 1, 'tonusayema@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-15 17:09:27', NULL, 1),
(9, 1, 'tonusayema@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-27 20:48:38', '28-11-2023 02:38:44 AM', 1),
(10, 1, 'tonusayema@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-27 22:16:47', '28-11-2023 04:05:11 AM', 1),
(11, 1, 'tonusayema@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-29 21:16:09', '30-11-2023 02:51:51 AM', 1),
(12, 1, 'tonusayema@gmail.com', 0x3a3a3100000000000000000000000000, '2023-11-29 21:22:02', NULL, 1),
(13, 1, 'tonusayema@gmail.com', 0x3a3a3100000000000000000000000000, '2023-12-06 08:03:45', NULL, 1),
(14, 1, 'tonusayema@gmail.com', 0x3a3a3100000000000000000000000000, '2023-12-06 15:25:14', NULL, 1),
(15, 1, 'tonusayema@gmail.com', 0x3a3a3100000000000000000000000000, '2024-02-05 13:55:00', NULL, 1),
(16, 1, 'tonusayema@gmail.com', 0x3a3a3100000000000000000000000000, '2024-02-05 14:47:15', '06-02-2024 01:40:24 PM', 1),
(17, 5, 'sadia@gmail.com', 0x3a3a3100000000000000000000000000, '2024-02-06 06:50:01', NULL, 1),
(18, 6, 'drasraftalukdar@gmail.com', 0x3a3a3100000000000000000000000000, '2024-02-06 06:52:44', '06-02-2024 03:16:57 PM', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullName` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `users` varchar(255) DEFAULT NULL,
  `student_session` varchar(255) NOT NULL,
  `student_roll` varchar(255) NOT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `login_status` int(11) NOT NULL DEFAULT '0',
  `regDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullName`, `department`, `users`, `student_session`, `student_roll`, `gender`, `email`, `password`, `login_status`, `regDate`, `updationDate`) VALUES
(6, 'Tonu Sayema', 'CSE', 'student', '2016-17', '17102011', 'female', 'drasraftalukdar@gmail.com', 'cc03e747a6afbbcbf8be7668acfebee5', 1, '2024-02-06 06:51:49', '2024-02-06 13:15:00'),
(7, 'SAYEMA SHIRIN TONU', 'CSE', 'student', '2016-17', '17102011', 'female', 'tonusayema@gmail.com', 'f925916e2754e5e03f75dd58a5733251', 1, '2024-02-06 13:44:01', '2024-02-06 13:44:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addbed`
--
ALTER TABLE `addbed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ambulance_availability`
--
ALTER TABLE `ambulance_availability`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assignbed`
--
ALTER TABLE `assignbed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `docav`
--
ALTER TABLE `docav`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `docavtime`
--
ALTER TABLE `docavtime`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctorslog`
--
ALTER TABLE `doctorslog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctorspecilization`
--
ALTER TABLE `doctorspecilization`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `given_medicine_list`
--
ALTER TABLE `given_medicine_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medical_history`
--
ALTER TABLE `medical_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nurses`
--
ALTER TABLE `nurses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nursespecilization`
--
ALTER TABLE `nursespecilization`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchasing_medicine_list`
--
ALTER TABLE `purchasing_medicine_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `remaining_medicine_list`
--
ALTER TABLE `remaining_medicine_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcontactus`
--
ALTER TABLE `tblcontactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblmedicalhistory`
--
ALTER TABLE `tblmedicalhistory`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblpage`
--
ALTER TABLE `tblpage`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblpatient`
--
ALTER TABLE `tblpatient`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addbed`
--
ALTER TABLE `addbed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ambulance_availability`
--
ALTER TABLE `ambulance_availability`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `assignbed`
--
ALTER TABLE `assignbed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `docav`
--
ALTER TABLE `docav`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `docavtime`
--
ALTER TABLE `docavtime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `doctorslog`
--
ALTER TABLE `doctorslog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `doctorspecilization`
--
ALTER TABLE `doctorspecilization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `given_medicine_list`
--
ALTER TABLE `given_medicine_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `medical_history`
--
ALTER TABLE `medical_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `nurses`
--
ALTER TABLE `nurses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `nursespecilization`
--
ALTER TABLE `nursespecilization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `purchasing_medicine_list`
--
ALTER TABLE `purchasing_medicine_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `remaining_medicine_list`
--
ALTER TABLE `remaining_medicine_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblcontactus`
--
ALTER TABLE `tblcontactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblmedicalhistory`
--
ALTER TABLE `tblmedicalhistory`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblpage`
--
ALTER TABLE `tblpage`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblpatient`
--
ALTER TABLE `tblpatient`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
