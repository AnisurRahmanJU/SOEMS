

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";




CREATE TABLE `tbladmin` (
  `ID` int(10) NOT NULL,
  `AdminName` varchar(120) DEFAULT NULL,
  `UserName` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(12) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(2, 'Md. Anisur Rahman ', 'Anisurrahman ', 1756355232, 'poetanis@gmail.com', '19c9913540fc00a354b49e03b4d45f69', '2019-11-16 12:00:00'),
(4, 'Ahmed Yasin', 'Ahmedyasin', 170000000, 'ahy@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2019-11-22 05:15:13'),
(6, 'Fazlul Karim Patwary', 'Patwary', 170000000, 'Patwary@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2019-11-22 07:00:39'),
(7, 'Khan Mohammad Akkas ', 'Akkasali', 1700000000, 'a@akkas.ju.com', 'e10adc3949ba59abbe56e057f20f883e', '2020-11-30 02:43:26');



CREATE TABLE `tbldevices` (
  `ID` int(10) NOT NULL,
  `DeviceCategory` varchar(120) DEFAULT NULL,
  `Device` varchar(120) DEFAULT NULL,
  `ServiceTag` varchar(20) DEFAULT NULL,
  `UserName` varchar(250) NOT NULL,
  `Designation` varchar(120) DEFAULT NULL,
  `DeviceLocation` varchar(120) DEFAULT NULL,
  `Assigned_Admin` varchar(120) DEFAULT NULL,
  `EntryDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `tbldevices` (`ID`, `DeviceCategory`, `Device`, `ServiceTag`, `UserName`, `Designation`, `DeviceLocation`, `Assigned_Admin`, `EntryDate`) VALUES
(15, 'Desktop', 'Dell(1111111)', '1111111', 'Md. Sazzadur Rahman ', 'Assistant Professor ', 'Room# 520', 'Md. Anisur Rahman', '2019-11-21 23:15:22'),
(16, 'Desktop', 'Dell(2222222)', '2222222', 'Md. Abu Yusuf', 'Associate Professor ', 'Room# 521', 'Md. Anisur Rahman', '2019-11-21 23:17:06'),
(17, 'Laptop', 'Dell(3333333)', '3333333', 'Md. Fazlul Islam Patwary', 'Associate Professor ', 'Room# 522', 'Md. Anisur Rahman', '2019-11-21 23:18:30'),
(18, 'Monitor', 'Dell(4444444)', '4444444', 'Md. Mesbah Uddin Sarkar', 'Associate Professor', 'Room# 523', 'Md. Anisur Rahman', '2019-11-21 23:21:41'),
(19, 'Printer', 'Dell(5555555)', '5555555', 'Md. Akkas Ali', 'Associate Professor ', 'Room# 524', 'Md. Anisur Rahman', '2019-11-21 23:23:04');


CREATE TABLE `tblusers` (
  `ID` int(10) NOT NULL,
  `EntryID` varchar(20) DEFAULT NULL,
  `UserName` varchar(120) DEFAULT NULL,
  `Designation` varchar(120) DEFAULT NULL,
  `UserAddress` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(12) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `DeviceCategory` varchar(120) NOT NULL,
  `Device` varchar(120) DEFAULT NULL,
  `DeviceLocation` varchar(120) DEFAULT NULL,
  `IDProof` varchar(120) DEFAULT NULL,
  `Assigned_Admin` varchar(120) NOT NULL,
  `ReadyTime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `DeployedTime` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `OtherRequipments` varchar(120) DEFAULT NULL,
  `Remark` varchar(120) DEFAULT NULL,
  `Status` varchar(20) NOT NULL,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `tblusers` (`ID`, `EntryID`, `UserName`, `Designation`, `UserAddress`, `MobileNumber`, `Email`, `DeviceCategory`, `Device`, `DeviceLocation`, `IDProof`, `Assigned_Admin`, `ReadyTime`, `DeployedTime`, `OtherRequipments`, `Remark`, `Status`, `UpdationDate`) VALUES
(30, '512640926', 'Md. Sazzadur Rahman ', 'Assistant Professor ', 'Jahangirnagar University', 170000000, 'sazz@gmail.com', 'Desktop', 'Dell(1111111)', 'Room# 520', 'SAZZAD', 'Md. Anisur Rahman', '2020-02-28 11:56:38', NULL, NULL, NULL, '', NULL),
(31, '978599521', 'Md. Abu Yusuf', 'Associate Professor ', 'Jahangirnagar University', 170000000, 'yus@gmail.com', 'Monitor', 'Dell(4444444)', 'Room# 521', 'YUSUF', 'Md. Anisur Rahman', '2020-02-28 12:31:24', NULL, NULL, NULL, '', NULL),
(32, '206280244', 'Md. Fazlul Islam Patwary', 'Associate Professor ', 'Jahangirnagar University', 170000000, 'Patwary@gmail.com', 'Laptop', 'Dell(5555555)', 'Room# 522', 'PATWA', 'Md. Anisur Rahman', '2020-02-28 12:32:12', '2020-02-28 12:34:19', 'Dell-Mouse, Dell-Keyboard, Power Gard-UPS.', 'Ok', 'Out', '2020-02-28 12:34:19'),
(33, '467068999', 'Md. Mesbah Uddin Sarkar', 'Associate Professor ', 'Jahangirnagar University', 170000000, 'mes@gmail.com', 'Desktop', 'Dell(6666666)', 'Room# 523', 'MESBAH', 'Md. Anisur Rahman', '2020-02-28 12:32:59', '2020-02-28 12:34:57', 'Dell-Mouse, Dell-Keyboard, Power Gard-UPS.', 'Ok', 'Out', '2020-02-28 12:34:57'),
(34, '299045331', 'Md. Akkas Ali', 'Associate Professor ', 'Jahangirnagar University', 170000000, 'akk@gmail.com', 'Desktop', 'Dell(121212)', 'Room# 524', 'AKKAS', 'Md. Anisur Rahman', '2020-02-28 12:33:46', '2020-07-13 05:32:47', 'AsadfwefsdfsadwedASWQ', 'ok', 'Out', '2020-07-13 05:32:47');


ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);


ALTER TABLE `tbldevices`
  ADD PRIMARY KEY (`ID`);


ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`ID`);


ALTER TABLE `tbladmin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;


ALTER TABLE `tbldevices`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;


ALTER TABLE `tblusers`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;



