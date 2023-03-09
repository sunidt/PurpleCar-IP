-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 09, 2023 at 08:22 PM
-- Server version: 8.0.17
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `purplecar`
--

-- --------------------------------------------------------

--
-- Table structure for table `departure_time`
--

CREATE TABLE `departure_time` (
  `time_id` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'รหัสเวลา',
  `timeT` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'เวลา',
  `route_b_r` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'สายรถ',
  `start_NU_TC` varchar(2) NOT NULL COMMENT 'จุดเริ่มต้น'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='เวลาวิ่งรถ';

--
-- Dumping data for table `departure_time`
--

INSERT INTO `departure_time` (`time_id`, `timeT`, `route_b_r`, `start_NU_TC`) VALUES
('0640', '06:40', '10', '11'),
('0700', '07:00', '01', '11'),
('0805', '08:00', '10', '11'),
('0825', '08:20', '01', '11'),
('0900', '09:00', '10', '11'),
('0925', '09:20', '01', '11'),
('1025', '10:20', '10', '11'),
('1035', '10:30', '01', '11'),
('1150', '11:50', '10', '11'),
('1220', '12:20', '01', '11'),
('1315', '13:10', '10', '11'),
('1335', '13:30', '01', '11'),
('1440', '14:40', '10', '11'),
('1500', '15:00', '01', '11'),
('1605', '16:00', '10', '11'),
('1625', '16:20', '01', '11'),
('1730', '17:30', '10', '11');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `Driver_ID` int(4) NOT NULL COMMENT 'รหัสคนขับรถ',
  `NameD` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'ชื่อ-นามสกุล',
  `sex` varchar(10) NOT NULL COMMENT 'เพศ',
  `Date_of_Birth` date NOT NULL COMMENT 'วัน/เดือน/ปีเกิด',
  `Username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'ชื่อผู้ใช้',
  `PasswordD` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'รหัสผ่าน',
  `Number_Phone` varchar(10) NOT NULL COMMENT 'เบอร์โทรศัพท์',
  `Driver_license_no` varchar(8) NOT NULL COMMENT 'เลขที่ใบขับขี่'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='คนขับรถ';

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`Driver_ID`, `NameD`, `sex`, `Date_of_Birth`, `Username`, `PasswordD`, `Number_Phone`, `Driver_license_no`) VALUES
(1, 'ประพล รุจิพร', 'Male', '1977-10-06', 'Praphon', 'Praphon123', '0859632486', '69584265'),
(2, 'นิรุต แสนไชย', 'Male', '1980-05-09', 'Nirut', 'Nirut123', '0849635216', '58462963'),
(3, 'พลชัย สาระทา', 'Male', '1978-02-16', 'Polchai', 'Polchai123', '069584621', '48125963'),
(4, 'อุไร บุญเยี่ยม', 'Female', '1979-06-20', 'Urai', 'Urai123', '0968541258', '29864359'),
(5, 'ณัฐดา ฟักทอง', 'Female', '1981-11-11', 'Nattada', 'Nattada123', '0854695135', '29684596'),
(6, 'กิตติกร ตันเปาว์ ', 'Male', '1978-12-24', 'Kittikorn', 'Kittikorn123', '0845963715', '78459625'),
(7, 'กัลยา เทภาสิต', 'Female', '1979-05-12', 'Kanlaya', 'Kanlaya123', '0846953278', '86543295'),
(8, 'จิรวัฒน์ โสระวงค', 'Male', '1983-06-23', 'Jirawat', 'Jirawat123', '0894561752', '59842563'),
(9, 'พรพรรณ ศรมณ', 'Female', '1982-01-20', 'Pornphan', 'Pornphan123', '0945861785', '58946258'),
(10, 'ณวิทย์ มิสาโท', 'Male', '1981-03-21', 'Nawit', 'Nawit123', '0845678812', '29845628');

-- --------------------------------------------------------

--
-- Table structure for table `driving_cycle`
--

CREATE TABLE `driving_cycle` (
  `driving_cycle_id` int(12) NOT NULL COMMENT 'รหัสรอบรถ',
  `car_route_id` int(2) NOT NULL COMMENT 'รหัสสายรถ',
  `stratid` int(3) NOT NULL COMMENT 'รหัสจุดขึ้นรถ',
  `Driver_ID` int(4) NOT NULL COMMENT 'รหัสคนขับ',
  `vehicle_registration` varchar(7) NOT NULL COMMENT 'ทะเบียนรถ',
  `date_of_driving_circle` date NOT NULL COMMENT 'วัน เดือน ปีที่รอบรถวิ่งรถ',
  `time_id` varchar(4) NOT NULL COMMENT 'รหัสเวลา',
  `remaining_tickets` int(2) NOT NULL DEFAULT '18' COMMENT 'จำนวนตั๋วที่เหลือ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='รอบรถ';

--
-- Dumping data for table `driving_cycle`
--

INSERT INTO `driving_cycle` (`driving_cycle_id`, `car_route_id`, `stratid`, `Driver_ID`, `vehicle_registration`, `date_of_driving_circle`, `time_id`, `remaining_tickets`) VALUES
(3, 2, 9, 2, 'คง-2222', '2023-02-11', '1335', 15),
(5, 1, 9, 3, 'กฮ-3333', '2023-02-12', '0900', 17),
(6, 1, 1, 4, 'ยน-4444', '2023-02-15', '0640', 17),
(7, 2, 1, 5, 'พน-5555', '2023-02-15', '0825', 17),
(8, 1, 1, 6, 'รด-6666', '2023-02-17', '0805', 17),
(9, 1, 9, 7, 'ศส-7777', '2023-02-17', '1440', 17),
(10, 2, 1, 8, 'มว-8888', '2023-02-17', '0700', 17),
(26, 1, 9, 1, 'จง-4444', '2023-03-04', '0640', 18),
(28, 1, 1, 1, 'กก-1111', '2023-03-11', '0640', 18),
(29, 2, 9, 2, 'ขข-2222', '2023-03-11', '0700', -3),
(30, 1, 9, 3, 'คค-3333', '2023-03-11', '0640', 15),
(31, 2, 1, 4, 'งง-4444', '2023-03-11', '0700', 12);

-- --------------------------------------------------------

--
-- Table structure for table `parking_spot`
--

CREATE TABLE `parking_spot` (
  `car_reservation_code` int(3) NOT NULL COMMENT 'รหัสจุดจอดรถ',
  `Parking_place_name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'ชื่อสถานที่จุดจอดรถ',
  `route_b_r` varchar(2) NOT NULL COMMENT 'สายรถ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='จุดจอดรถ';

--
-- Dumping data for table `parking_spot`
--

INSERT INTO `parking_spot` (`car_reservation_code`, `Parking_place_name`, `route_b_r`) VALUES
(1, 'บขส.2', '11'),
(2, 'บขส.1', '11'),
(3, 'ท็อปแลนด์', '01'),
(4, 'วัดใหญ่', '01'),
(5, 'บ้านคลอง', '01'),
(6, 'เซ็นทรัล', '01'),
(7, 'โลตัสต้นหว้า', '11'),
(8, 'ชลประทาน', '11'),
(9, 'มหาวิทยาลัยนเรศวร', '11'),
(10, 'บิ๊กซี', '10'),
(11, 'ม.สาธิต', '10'),
(12, 'มาลาเบี่ยง', '10'),
(13, 'รพ.พุทธ', '10'),
(14, 'สถานีรถไฟ', '10'),
(15, 'แมคโคร', '10');

-- --------------------------------------------------------

--
-- Table structure for table `passenger`
--

CREATE TABLE `passenger` (
  `Passenger_ID` int(8) NOT NULL COMMENT 'รหัสผู้โดยสาร',
  `NameP` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'ชื่อ-นามสกุล',
  `sex` varchar(10) NOT NULL COMMENT 'เพศ',
  `Date_of_Birth` date NOT NULL COMMENT 'วัน/เดือน/ปี เกิด',
  `Username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'ชื่อผู้ใช้',
  `PasswordP` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'รหัสผ่าน',
  `Number_Phone` varchar(10) NOT NULL COMMENT 'เบอร์โทรศัพท์',
  `Points` int(8) NOT NULL COMMENT 'แต้มสะสม'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='ผู้โดยสาร';

--
-- Dumping data for table `passenger`
--

INSERT INTO `passenger` (`Passenger_ID`, `NameP`, `sex`, `Date_of_Birth`, `Username`, `PasswordP`, `Number_Phone`, `Points`) VALUES
(63310618, 'คณิศร ปันนะราชา', 'Male', '2002-04-10', 'Kanisorn_teen', 'Kanisorn1234', '0881112223', 60),
(63310779, 'จิรพัฒน์ คุณมั่น', 'Male', '2001-07-03', 'Jiripat_tonnam', 'Jirpat1234', '0883334445', 33),
(63310960, 'ชนธิชา ใจแสน', 'Female', '2001-04-06', 'Chonthicha_fern', 'Chonthicha1234', '0996667778', 18),
(63311653, 'เทียนชัย มูลหา', 'Male', '2002-01-31', 'Thianchai_khom', 'Thianchai1234', '0998889990', 42),
(63312162, 'ธีระศักดิ์ เพียรลุกิจ', 'Male', '2001-10-13', 'Teerasak_not', 'Teerasak1234', '0993334445', 20),
(63312599, 'บูรพา จันทร์นาค', 'Male', '2001-04-16', 'Burapa_ta', 'Burapa1234', '0995556667', 13),
(63312728, 'ปพนสรรค์ แสนกล้า', 'Male', '2001-10-08', 'Paphonsan_rew', 'Paphonsan1234', '0882223334', 35),
(63314814, 'สุกัญญา นภาสกุลรัตน์', 'Female', '2002-03-01', 'Sukanya_mor', 'Sukanya1234', '0884445556', 27),
(63314975, 'สุนิสา ดวงธรรม', 'Female', '2001-11-12', 'Sunisa_aom', 'Sunisa1234', '0991112223', 80),
(63315125, 'สุวิชาดา พรมมา', 'Female', '2002-01-05', 'Suwichada_mew', 'Suwichada1234', '0992223334', 50),
(63315126, 'มิว', 'Female', '2002-02-02', 'mew', '12345678', '0900000000', 100),
(63315128, 'โอบอ้อม', 'Female', '2001-11-12', 'AA', '12112544', '0901234567', 15),
(63315131, 'ใจดี ไม่มีสุข', 'Female', '2011-03-02', 'Jaidee', 'jaidee', '0900000000', 0),
(63315132, 'มินนี่ มีมี่', 'Female', '2008-06-03', 'Minnie', '12345678', '0901234567', 0),
(63315133, 'teeny', 'Male', '2023-03-03', 'teen', '1150', '0945555555', 0);

-- --------------------------------------------------------

--
-- Table structure for table `reserve`
--

CREATE TABLE `reserve` (
  `Passenger_ID` int(8) NOT NULL COMMENT 'รหัสผู้โดยสาร',
  `Ticket_ID` int(14) NOT NULL COMMENT 'รหัสตั๋ว',
  `bookDate` date NOT NULL COMMENT 'วันที่จอง'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='จอง';

--
-- Dumping data for table `reserve`
--

INSERT INTO `reserve` (`Passenger_ID`, `Ticket_ID`, `bookDate`) VALUES
(63310618, 1, '2023-02-01'),
(63310779, 2, '2023-02-01'),
(63310960, 3, '2023-02-02'),
(63311653, 4, '2023-02-02'),
(63312162, 5, '2023-02-03'),
(63312599, 6, '2023-02-03'),
(63312728, 7, '2023-02-04'),
(63314814, 8, '2023-02-04'),
(63314975, 9, '2023-02-05'),
(63315125, 10, '2023-02-05'),
(63314975, 15, '2023-03-08');

-- --------------------------------------------------------

--
-- Table structure for table `route_car`
--

CREATE TABLE `route_car` (
  `car_route_id` int(2) NOT NULL COMMENT 'รหัสสายรถ',
  `car_route_name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'ชื่อสายรถ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='สายรถ';

--
-- Dumping data for table `route_car`
--

INSERT INTO `route_car` (`car_route_id`, `car_route_name`) VALUES
(1, 'สายสีฟ้า'),
(2, 'สายสีแดง');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `Ticket_ID` int(14) NOT NULL COMMENT 'รหัสตั๋ว',
  `Driving_cycle_ID` int(12) NOT NULL COMMENT 'รหัสรอบรถ',
  `Ticket_Price` int(3) NOT NULL DEFAULT '35' COMMENT 'ราคาตั๋ว',
  `broding_point_id` int(3) NOT NULL COMMENT 'รหัสจุดขึ้นรถ',
  `drop_off_id` int(3) DEFAULT NULL COMMENT 'รหัสจุดลงรถ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='ตั๋ว';

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`Ticket_ID`, `Driving_cycle_ID`, `Ticket_Price`, `broding_point_id`, `drop_off_id`) VALUES
(3, 3, 35, 9, 1),
(4, 4, 35, 1, 2),
(5, 5, 35, 1, 6),
(6, 6, 35, 1, 9),
(7, 7, 35, 9, 14),
(8, 8, 35, 1, 6),
(9, 9, 35, 9, 6),
(13, 10, 35, 1, 7),
(14, 22, 35, 2, 8),
(15, 22, 35, 2, 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departure_time`
--
ALTER TABLE `departure_time`
  ADD PRIMARY KEY (`time_id`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`Driver_ID`);

--
-- Indexes for table `driving_cycle`
--
ALTER TABLE `driving_cycle`
  ADD PRIMARY KEY (`driving_cycle_id`),
  ADD KEY `car_route_id` (`car_route_id`),
  ADD KEY `Driver_ID` (`Driver_ID`),
  ADD KEY `stratid` (`stratid`);

--
-- Indexes for table `parking_spot`
--
ALTER TABLE `parking_spot`
  ADD PRIMARY KEY (`car_reservation_code`);

--
-- Indexes for table `passenger`
--
ALTER TABLE `passenger`
  ADD PRIMARY KEY (`Passenger_ID`);

--
-- Indexes for table `reserve`
--
ALTER TABLE `reserve`
  ADD PRIMARY KEY (`Ticket_ID`,`Passenger_ID`),
  ADD KEY `Passenger_ID` (`Passenger_ID`);

--
-- Indexes for table `route_car`
--
ALTER TABLE `route_car`
  ADD PRIMARY KEY (`car_route_id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`Ticket_ID`),
  ADD KEY `broding_point_id` (`broding_point_id`),
  ADD KEY `drop_off_id` (`drop_off_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `Driver_ID` int(4) NOT NULL AUTO_INCREMENT COMMENT 'รหัสคนขับรถ', AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `driving_cycle`
--
ALTER TABLE `driving_cycle`
  MODIFY `driving_cycle_id` int(12) NOT NULL AUTO_INCREMENT COMMENT 'รหัสรอบรถ', AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `parking_spot`
--
ALTER TABLE `parking_spot`
  MODIFY `car_reservation_code` int(3) NOT NULL AUTO_INCREMENT COMMENT 'รหัสจุดจอดรถ', AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `passenger`
--
ALTER TABLE `passenger`
  MODIFY `Passenger_ID` int(8) NOT NULL AUTO_INCREMENT COMMENT 'รหัสผู้โดยสาร', AUTO_INCREMENT=63315134;

--
-- AUTO_INCREMENT for table `route_car`
--
ALTER TABLE `route_car`
  MODIFY `car_route_id` int(2) NOT NULL AUTO_INCREMENT COMMENT 'รหัสสายรถ';

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `Ticket_ID` int(14) NOT NULL AUTO_INCREMENT COMMENT 'รหัสตั๋ว', AUTO_INCREMENT=12995;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `driving_cycle`
--
ALTER TABLE `driving_cycle`
  ADD CONSTRAINT `driving_cycle_ibfk_1` FOREIGN KEY (`car_route_id`) REFERENCES `route_car` (`car_route_id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `driving_cycle_ibfk_2` FOREIGN KEY (`Driver_ID`) REFERENCES `driver` (`Driver_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `driving_cycle_ibfk_3` FOREIGN KEY (`stratid`) REFERENCES `parking_spot` (`car_reservation_code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reserve`
--
ALTER TABLE `reserve`
  ADD CONSTRAINT `reserve_ibfk_1` FOREIGN KEY (`Passenger_ID`) REFERENCES `passenger` (`Passenger_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_ibfk_2` FOREIGN KEY (`broding_point_id`) REFERENCES `parking_spot` (`car_reservation_code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket_ibfk_3` FOREIGN KEY (`drop_off_id`) REFERENCES `parking_spot` (`car_reservation_code`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
