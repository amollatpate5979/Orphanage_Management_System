-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2023 at 08:05 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `omsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `FullName` varchar(100) DEFAULT NULL,
  `AdminEmail` varchar(120) DEFAULT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `FullName`, `AdminEmail`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'Admin', 'admin@gmail.com', 'admin', 'f925916e2754e5e03f75dd58a5733251', '2023-10-21 19:25:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbladoption`
--

CREATE TABLE `tbladoption` (
  `ID` int(5) NOT NULL,
  `Userid` int(5) DEFAULT NULL,
  `Childid` int(5) DEFAULT NULL,
  `Requestnumber` int(10) DEFAULT NULL,
  `Address` mediumtext DEFAULT NULL,
  `Occupation` varchar(250) DEFAULT NULL,
  `Income` decimal(10,0) DEFAULT NULL,
  `Reasonforadoption` mediumtext DEFAULT NULL,
  `MaritalStatus` varchar(100) DEFAULT NULL,
  `SpouseName` varchar(250) DEFAULT NULL,
  `SpousePhonenumber` bigint(11) DEFAULT NULL,
  `SpouceEmail` varchar(250) DEFAULT NULL,
  `SpouseOccupation` varchar(250) DEFAULT NULL,
  `SpouseIncome` decimal(10,0) DEFAULT NULL,
  `IsActive` int(2) DEFAULT NULL,
  `RequsetDate` timestamp NULL DEFAULT current_timestamp(),
  `Status` varchar(250) DEFAULT NULL,
  `Remark` varchar(250) DEFAULT NULL,
  `UpdationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbladoption`
--

INSERT INTO `tbladoption` (`ID`, `Userid`, `Childid`, `Requestnumber`, `Address`, `Occupation`, `Income`, `Reasonforadoption`, `MaritalStatus`, `SpouseName`, `SpousePhonenumber`, `SpouceEmail`, `SpouseOccupation`, `SpouseIncome`, `IsActive`, `RequsetDate`, `Status`, `Remark`, `UpdationDate`) VALUES
(1, 3, 6, 504599019, 'J-890, Konark Apartment, New DElhi', 'Bussness', 102100, 'Medical Issue', 'Married', 'Harshita Mathur', 6546465465, 'har@gmail.com', 'Software Deeloper', 135000, 1, '2023-09-11 11:27:16', 'Accepted', 'Request has been accepted', '2023-09-21 12:47:01'),
(2, 4, 1, 846702211, 'J-890, Konark Apartment, New DElhi', 'Bussness', 102100, 'dasddsdfsfdddtretryrytrytuytuytuythgyutryututgutu', 'Married', 'Joe Mathur', 6454646546, 'neha@gmail.com', 'Software Deeloper', 135000, 1, '2023-09-20 05:50:19', 'Rejected', 'your request has been rejected due to some missing information.', '2023-09-22 05:46:16'),
(3, 5, 8, 558595690, 'k-890, Kaura Apartment Mumbai', 'Software Develper', 200000, 'vnbvnhdfajwfkgfgue\r\ngtgtvuy\r\nv4tuivyi\r\ny4rtuiq3yi', 'Married', 'Lalit Dubey', 6454654654, 'lalit@gmail.com', 'Software Deeloper', 250000, 1, '2023-09-22 06:24:57', 'Accepted', 'Adopted application accepted.', '2023-10-21 18:35:23'),
(4, 6, 22, 832321900, 'A 12 XYZ Apartment New Delhi 110092', 'Govt service', 123000, 'NA', 'Married', 'Amita', 1122331122, 'amita12@test.com', 'NA', 45000, 1, '2023-10-21 19:21:30', 'Accepted', 'Adoption Request accepted', '2023-10-21 19:22:05');

-- --------------------------------------------------------

--
-- Table structure for table `tblchild`
--

CREATE TABLE `tblchild` (
  `ID` int(5) NOT NULL,
  `IndentificationNumber` int(10) DEFAULT NULL,
  `ChildName` varchar(250) DEFAULT NULL,
  `ChildGender` varchar(50) DEFAULT NULL,
  `ChildArrivalDate` date DEFAULT NULL,
  `AllergicIssue` varchar(250) DEFAULT NULL,
  `BloodGroup` varchar(100) DEFAULT NULL,
  `Age` varchar(255) DEFAULT NULL,
  `ChildPhoto` varchar(255) DEFAULT NULL,
  `IsActive` int(2) DEFAULT NULL,
  `isAdopted` int(1) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblchild`
--

INSERT INTO `tblchild` (`ID`, `IndentificationNumber`, `ChildName`, `ChildGender`, `ChildArrivalDate`, `AllergicIssue`, `BloodGroup`, `Age`, `ChildPhoto`, `IsActive`, `isAdopted`, `RegDate`) VALUES
(1, 916358413, 'Ragav', 'Male', '2023-07-04', 'No', 'A+', '6 month', '30454685056e7153dce912ab71952120.jpg', 1, NULL, '2023-09-05 07:13:27'),
(2, 377005620, 'Manisha', 'Male', '2022-03-05', 'Allergy with egg', 'A-', '6 Yrs', '89a741ac94dbf74e0a4ad7931d0f0631.png', 1, NULL, '2023-09-05 07:18:43'),
(4, 189839036, 'Sita', 'Female', '2023-08-15', 'No', 'O+', '2 month', 'c3e0293ff9e4424eaa6b0dc6fbc146f2.png', 1, NULL, '2023-09-06 05:33:43'),
(5, 938447714, 'Shana', 'Female', '2021-08-06', 'Allergy with pollen grains', 'O-', '5 yrs', 'b9fb9d37bdf15a699bc071ce49baea53.jpg', 1, NULL, '2023-09-06 05:35:17'),
(6, 761986836, 'Shanvi', 'Female', '2021-08-06', 'Allergy with pollen grains', 'AB-', '2 yrs', '4cce6effd7233b9caff4dbab6aa0fe19.png', 1, 1, '2023-09-06 05:36:42'),
(7, 250686741, 'Manvi', 'Female', '2021-08-06', 'No', 'O-', '7 yrs', 'e92c68f5e5d3678d2f31566b8b80811e.png', 1, NULL, '2023-09-06 05:36:50'),
(8, 464474936, 'Romil', 'Male', '2021-08-06', 'No', 'O-', '3 month', 'f6dd4b2d11dbd05a205115fc5fce5001.png', 1, 1, '2023-09-06 05:36:53'),
(9, 502196060, 'Adhik', 'Male', '2021-08-06', 'No', 'O-', '5 yrs', '0b8f83073379088105b7c36aa86703c0.png', 1, NULL, '2023-09-06 05:36:55'),
(10, 800119594, 'Moni', 'Female', '2021-08-06', 'No', 'O-', '4 yrs', 'f7d91b05225840ba46210e20dd781b12.png', 1, NULL, '2023-09-06 05:36:58'),
(11, 866216168, 'Mohan', 'Male', '2021-08-06', 'Allergy with pineapple', 'O-', '7 yrs', 'bba925a0fad854bc5edfb7b0d94eaf01.png', 1, NULL, '2023-09-06 05:37:00'),
(12, 143357733, 'Mana', 'Female', '2021-08-06', 'No', 'O-', '5 yrs', 'cb29e94c94ccaf09cc538602138a3a53.png', 1, NULL, '2023-09-06 05:37:03'),
(13, 372762158, 'Khanha', 'Male', '2021-08-06', 'No', 'O-', '2 month', 'd036d4458ffbaef207d44f04c70e44eb.png', 1, NULL, '2023-09-06 05:37:05'),
(14, 372965736, 'Bulbul', 'Female', '2021-05-12', 'No', 'AB+', '1 yrs', '15f3401b39f161e9c32f7f15f2f57e05.png', 1, NULL, '2023-09-06 05:37:08'),
(15, 401763552, 'Jone', 'Male', '2022-04-13', 'No', 'A+', '6 yrs', '50f2d5b26dd832ebea43f5ef447d616c.png', 1, NULL, '2023-09-06 05:37:10'),
(16, 461640323, 'Komal', 'Female', '2021-08-06', 'No', 'O-', '5 yrs', '326f8b19432fefb1a910a4ef6a06b040.png', 1, NULL, '2023-09-06 05:37:12'),
(17, 110355215, 'Lalita', 'Female', '2021-08-06', 'No', 'O-', '9 yrs', '7c255fce9fc18903d0094e690c15b598.png', 1, NULL, '2023-09-06 05:37:14'),
(18, 736286289, 'Jhony', 'Male', '2021-08-06', 'No', 'O-', '5 yrs', '756b91bcf77750d3b71c75c6257139b0.png', 1, NULL, '2023-09-06 05:37:26'),
(19, 730712739, 'Meera', 'Female', '2021-08-06', 'No', 'A-', '9 yrs', '41b586905e6233e72b076191f8bf9512.png', 1, NULL, '2023-09-06 05:37:28'),
(20, 643160463, 'Shiv', 'Male', '2021-08-06', 'No', 'O-', '2 yrs', '9de6a7e6c523fcb8cf7108827473b47a.png', 1, NULL, '2023-09-06 05:37:30'),
(21, 715537806, 'Pulkit', 'Male', '2021-08-14', 'No', 'O-', '5 yrs', '8a822a50142d18106553eef99640f9c5.png', 1, NULL, '2023-09-06 05:37:32'),
(22, 970543550, 'Amit', 'Male', '2023-07-15', 'NO', 'a-', '2', '2d6324e14bdc20a35ba0332e7d9d4ad1.jpg', 1, 1, '2023-10-21 19:18:48');

-- --------------------------------------------------------

--
-- Table structure for table `tblgenralsettings`
--

CREATE TABLE `tblgenralsettings` (
  `id` int(11) NOT NULL,
  `SiteName` varchar(200) DEFAULT NULL,
  `PhoneNumber` bigint(12) DEFAULT NULL,
  `EmailId` varchar(255) DEFAULT NULL,
  `address` mediumtext DEFAULT NULL,
  `footercontent` mediumtext DEFAULT NULL,
  `LastUpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblgenralsettings`
--

INSERT INTO `tblgenralsettings` (`id`, `SiteName`, `PhoneNumber`, `EmailId`, `address`, `footercontent`, `LastUpdationDate`) VALUES
(1, 'Orphanage Management System', 7894561236, 'oms@test.com', 'Test address\r\nTest City\r\nTest State\r\nIN-110091', 'Orphanage Management System', '2023-09-06 06:57:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblnews`
--

CREATE TABLE `tblnews` (
  `id` int(11) NOT NULL,
  `NewsTitle` varchar(255) DEFAULT NULL,
  `NewsDetails` mediumtext DEFAULT NULL,
  `NewsImage` varchar(250) DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblnews`
--

INSERT INTO `tblnews` (`id`, `NewsTitle`, `NewsDetails`, `NewsImage`, `PostingDate`) VALUES
(7, 'Jharkhand: Abandoned child gets new home and family in Italy', 'The high court had in January this year, in an interim order.\r\nThe high court had in January this year, in an interim order.\r\nThe high court had in January this year, in an interim order.\r\nThe high court had in January this year, in an interim order.\r\n', '7d9447d1b9fb53c89dca21de068f7784.jpg', '2023-09-21 13:25:10'),
(8, 'Number Of Orphan, Abandoned Children Rise By 25% Since 2020: Centre', 'Number Of Orphan, Abandoned Children Rise By 25% Since 2020: CentreNumber Of Orphan, Abandoned Children Rise By 25% Since 2020: CentreNumber Of Orphan, Abandoned Children Rise By 25% Since 2020: CentreNumber Of Orphan, Abandoned Children Rise By 25% Since 2020: Centre', '1b31e8ebe779bca68ef65cd7313ea821.jpg', '2023-09-21 13:25:52'),
(9, 'Father, Domestic Help Physically Abuse Adopted Child In Assam, Arrested', 'A doctor and his family\'s domestic help were arrested in Guwahati on Saturday for allegedly physically abusing his adopted daughter, police said.', '8a45d55df7427159964a8a74751cea1e.jpg', '2023-09-21 13:26:42'),
(10, 'Child Rescued From Drain In Maharashtra In 2018 Adopted By Italian Couple', 'Child Rescued From Drain In Maharashtra In 2018 Adopted By Italian CoupleChild Rescued From Drain In Maharashtra In 2018 Adopted By Italian CoupleChild Rescued From Drain In Maharashtra In 2018 Adopted By Italian Couple', '76aff5461155c51b53561125b6907dfa.jpg', '2023-09-21 13:27:22'),
(11, 'Delhi Nurse, 50, Burnt 7-Year-Old Adoptive Daughter With Tongs, Arrested', 'Delhi Nurse, 50, Burnt 7-Year-Old Adoptive Daughter With Tongs, ArrestedDelhi Nurse, 50, Burnt 7-Year-Old Adoptive Daughter With Tongs, ArrestedDelhi Nurse, 50, Burnt 7-Year-Old Adoptive Daughter With Tongs, ArrestedDelhi Nurse, 50, Burnt 7-Year-Old Adoptive Daughter With Tongs, Arrested', '127fd892a8b4ddf02eb2779592061736.jpg', '2023-09-21 13:28:07');

-- --------------------------------------------------------

--
-- Table structure for table `tblpages`
--

CREATE TABLE `tblpages` (
  `id` int(11) NOT NULL,
  `PageType` varchar(255) DEFAULT NULL,
  `PageDetails` mediumtext DEFAULT NULL,
  `LastupdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblpages`
--

INSERT INTO `tblpages` (`id`, `PageType`, `PageDetails`, `LastupdationDate`) VALUES
(1, 'aboutus', '<span style=\"color: rgb(55, 65, 81); font-family: Söhne, ui-sans-serif, system-ui, -apple-system, &quot;Segoe UI&quot;, Roboto, Ubuntu, Cantarell, &quot;Noto Sans&quot;, sans-serif, &quot;Helvetica Neue&quot;, Arial, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 16px; white-space-collapse: preserve; background-color: rgb(247, 247, 248);\">An Orphanage Management System is a software application designed to streamline and automate the administrative and operational tasks of orphanages or childcare institutions. It is aimed at enhancing the efficiency and effectiveness of managing the various aspects of running an orphanage. </span>', '2023-10-21 19:05:10');

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `Userid` int(11) NOT NULL,
  `FullName` varchar(255) DEFAULT NULL,
  `UserName` varchar(200) DEFAULT NULL,
  `Emailid` varchar(255) DEFAULT NULL,
  `PhoneNumber` bigint(12) DEFAULT NULL,
  `UserGender` varchar(100) DEFAULT NULL,
  `UserPassword` varchar(255) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  `LastUpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `IsActive` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`Userid`, `FullName`, `UserName`, `Emailid`, `PhoneNumber`, `UserGender`, `UserPassword`, `RegDate`, `LastUpdationDate`, `IsActive`) VALUES
(1, 'John Doe', 'john12', 'john@test.com', 1425632120, 'Male', 'f925916e2754e5e03f75dd58a5733251', '2023-05-21 11:34:02', '2023-05-21 11:34:21', 1),
(2, 'Test123', 'test12345', 'test@gmail.com', 7979797979, 'Male', 'f925916e2754e5e03f75dd58a5733251', '2023-05-21 13:37:28', '2023-05-21 15:12:39', 1),
(3, 'Punit', 'sar123', 'sar@gmail.com', 7987979797, 'Male', 'f925916e2754e5e03f75dd58a5733251', '2023-09-09 06:13:44', '2023-09-11 11:30:47', 1),
(4, 'Komal', 'komal123', 'komal@gmail.com', 6478787987, 'Female', 'f925916e2754e5e03f75dd58a5733251', '2023-09-20 05:48:41', NULL, 1),
(5, 'Khushi', 'khushi123', 'khushi@gmail.com', 7987897987, 'Female', '202cb962ac59075b964b07152d234b70', '2023-09-22 06:22:43', '2023-10-02 07:21:42', 1),
(6, 'Rahul Kumar', 'rahul12', 'rahul12@gmail.com', 1231231230, 'Male', 'f925916e2754e5e03f75dd58a5733251', '2023-10-21 19:19:52', NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbladoption`
--
ALTER TABLE `tbladoption`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblchild`
--
ALTER TABLE `tblchild`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblgenralsettings`
--
ALTER TABLE `tblgenralsettings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblnews`
--
ALTER TABLE `tblnews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpages`
--
ALTER TABLE `tblpages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`Userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbladoption`
--
ALTER TABLE `tbladoption`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblchild`
--
ALTER TABLE `tblchild`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tblgenralsettings`
--
ALTER TABLE `tblgenralsettings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblnews`
--
ALTER TABLE `tblnews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tblpages`
--
ALTER TABLE `tblpages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `Userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
