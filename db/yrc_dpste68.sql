-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 19, 2024 at 10:47 AM
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
-- Database: `yrc_dpste68`
--

-- --------------------------------------------------------

--
-- Table structure for table `evidence`
--

CREATE TABLE `evidence` (
  `e_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `e1` varchar(100) NOT NULL,
  `e2` varchar(100) NOT NULL,
  `e3` varchar(100) NOT NULL,
  `e4` varchar(100) NOT NULL,
  `e5` varchar(100) NOT NULL,
  `e6` varchar(100) NOT NULL,
  `s1` varchar(100) NOT NULL,
  `s1text` text NOT NULL,
  `s2` varchar(100) NOT NULL,
  `s2text` text NOT NULL,
  `s3` varchar(100) NOT NULL,
  `s3text` text NOT NULL,
  `s4` varchar(100) NOT NULL,
  `s4text` text NOT NULL,
  `s5` varchar(100) NOT NULL,
  `s5text` text NOT NULL,
  `comment` text NOT NULL,
  `comment_special` text NOT NULL,
  `e_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE `province` (
  `province_id` int(11) NOT NULL,
  `province_name` varchar(200) NOT NULL DEFAULT '',
  `province_part` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`province_id`, `province_name`, `province_part`) VALUES
(1, 'เชียงใหม่', 0),
(2, 'กรุงเทพมหานคร', 0),
(3, 'กาญจนบุรี', 0),
(4, 'กาฬสินธุ์', 0),
(5, 'กำแพงเพชร', 0),
(6, 'ขอนแก่น', 0),
(7, 'จันทบุรี', 0),
(8, 'ฉะเชิงเทรา', 0),
(9, 'ชลบุรี', 0),
(10, 'ชัยนาท', 0),
(11, 'ชัยภูมิ', 0),
(12, 'ชุมพร', 0),
(13, 'เชียงราย', 0),
(14, 'กระบี่', 0),
(15, 'ตรัง', 0),
(16, 'ตราด', 0),
(17, 'ตาก', 0),
(18, 'นครนายก', 0),
(19, 'นครปฐม', 0),
(20, 'นครพนม', 0),
(21, 'นครราชสีมา', 0),
(22, 'นครศรีธรรมราช', 0),
(23, 'นครสวรรค์', 0),
(24, 'นนทบุรี', 0),
(25, 'นราธิวาส', 0),
(26, 'น่าน', 0),
(27, 'บุรีรัมย์', 0),
(28, 'ปทุมธานี', 0),
(29, 'ประจวบคีรีขันธ์', 0),
(30, 'ปราจีนบุรี', 0),
(31, 'ปัตตานี', 0),
(32, 'พระนครศรีอยุธยา', 0),
(33, 'พะเยา', 0),
(34, 'พังงา', 0),
(35, 'พัทลุง', 0),
(36, 'พิจิตร', 0),
(37, 'พิษณุโลก', 0),
(38, 'เพชรบุรี', 0),
(39, ' เพชรบูรณ์', 0),
(40, 'แพร่', 0),
(41, 'ภูเก็ต', 0),
(42, 'มหาสารคาม', 0),
(43, 'มุกดาหาร', 0),
(44, 'แม่ฮ่องสอน', 0),
(45, 'ยโสธร', 0),
(46, 'ยะลา', 0),
(47, 'ร้อยเอ็ด', 0),
(48, 'ระนอง', 0),
(49, 'ระยอง', 0),
(50, 'ราชบุรี', 0),
(51, 'ลพบุรี', 0),
(52, 'ลำปาง', 0),
(53, 'ลำพูน', 0),
(54, 'เลย', 0),
(55, 'ศรีสะเกษ', 0),
(56, 'สกลนคร', 0),
(57, 'สงขลา', 0),
(58, 'สตูล', 0),
(59, 'สมุทรปราการ', 0),
(60, 'สมุทรสงคราม', 0),
(61, 'สมุทรสาคร', 0),
(62, 'สระแก้ว', 0),
(63, 'สระบุรี', 0),
(64, 'สิงห์บุรี', 0),
(65, 'สุโขทัย', 0),
(66, 'สุพรรณบุรี', 0),
(67, 'สุราษฎร์ธานี', 0),
(68, 'สุรินทร์', 0),
(69, 'หนองคาย', 0),
(70, 'หนองบัวลำภู', 0),
(71, 'อ่างทอง', 0),
(72, 'อำนาจเจริญ', 0),
(73, 'อุดรธานี', 0),
(74, 'อุตรดิตถ์', 0),
(75, 'อุทัยธานี', 0),
(76, 'อุบลราชธานี', 0),
(77, 'บึงกาฬ', 0);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `idregister` varchar(100) NOT NULL DEFAULT '0',
  `title` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `idperson` varchar(100) NOT NULL,
  `school` varchar(100) NOT NULL,
  `school_province` varchar(100) NOT NULL,
  `telephone` varchar(100) NOT NULL,
  `telephone2` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `mu` varchar(100) NOT NULL,
  `road` varchar(100) NOT NULL,
  `soi` varchar(100) NOT NULL,
  `tumbon` varchar(100) NOT NULL,
  `amphor` varchar(100) NOT NULL,
  `province` varchar(100) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `grade1` varchar(100) NOT NULL,
  `grade2` varchar(100) NOT NULL,
  `grade3` varchar(100) NOT NULL,
  `grade4` varchar(100) NOT NULL,
  `sequence` varchar(255) NOT NULL,
  `evi_1` varchar(100) NOT NULL,
  `evi_2` varchar(100) NOT NULL,
  `evi_3` varchar(100) NOT NULL,
  `evi_4` varchar(100) NOT NULL,
  `s_check` varchar(100) NOT NULL DEFAULT '0',
  `comment` varchar(255) DEFAULT NULL,
  `datet` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `r_id` int(11) NOT NULL,
  `r_number` varchar(100) NOT NULL,
  `u_id` int(11) NOT NULL,
  `r_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `se_id` int(11) NOT NULL,
  `se_name` varchar(100) NOT NULL COMMENT 'ชื่อตั้งค่า',
  `se_value` varchar(10) NOT NULL COMMENT 'ค่า'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`se_id`, `se_name`, `se_value`) VALUES
(1, 'ปิดเข้าสู่ระบบ, ปิดลงทะเบียน', '1'),
(2, 'ปิดการจำหน่ายระเบียบการ', '0'),
(3, 'ปิดระบบการสมัคร', '0'),
(4, 'ปิดระบบการยืนยันหลักฐาน', '0');

-- --------------------------------------------------------

--
-- Table structure for table `testroom`
--

CREATE TABLE `testroom` (
  `test_id` int(2) NOT NULL,
  `number_begin` varchar(20) NOT NULL,
  `number_end` varchar(20) NOT NULL,
  `classroom` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `testroom`
--

INSERT INTO `testroom` (`test_id`, `number_begin`, `number_end`, `classroom`) VALUES
(1, '68050001', '68050030', '1221'),
(2, '68050031', '68050060', '1222'),
(3, '68050061', '68050090', '1223'),
(4, '68050091', '68050120', '1224'),
(5, '68050121', '68050150', '1225'),
(6, '68050151', '68050180', '1226'),
(7, '68050181', '68050210', '1227'),
(8, '68050211', '68050240', '1228'),
(9, '68050241', '68050270', '1232'),
(10, '68050271', '68050300', '1233'),
(11, '68050301', '68050330', '1234'),
(12, '68050331', '68050360', '1235'),
(13, '68050361', '68050390', '1236'),
(14, '68050391', '68050420', '1237'),
(15, '68050421', '68050450', '1242'),
(16, '68050451', '68050480', '1243'),
(17, '68050481', '68050510', '1244'),
(18, '68050511', '68050540', '1245'),
(19, '68050541', '68050570', '1246'),
(20, '68050571', '68050600', '1247'),
(21, '68050601', '68050630', '1031'),
(22, '68050631', '68050660', '1032'),
(23, '68050661', '68050690', '1034'),
(24, '68050691', '68050720', '1035'),
(25, '68050721', '68050750', '1036'),
(26, '68050751', '68050780', '1037'),
(27, '68050781', '68050810', '1038'),
(28, '68050811', '68050840', '1041'),
(29, '68050841', '68050870', '1042'),
(30, '68050871', '68050900', '1044'),
(31, '68050901', '68050930', '1045'),
(32, '68050931', '68050960', '1046'),
(33, '68050961', '68050990', '1047'),
(34, '68050991', '68051020', '1048'),
(35, '68051021', '68051050', '811'),
(36, '68051051', '68051080', '812'),
(37, '68051081', '68051110', '813'),
(38, '68051111', '68051140', '814'),
(39, '68051141', '68051170', '831'),
(40, '68051171', '68051200', '832'),
(41, '68051201', '68051230', '833'),
(42, '68051231', '68051260', '834'),
(43, '68051261', '68051290', '841'),
(44, '68051291', '68051320', '842'),
(45, '68051321', '68051350', '843'),
(46, '68051351', '68051380', '844'),
(47, '68051381', '68051410', '532'),
(48, '68051411', '68051440', '533'),
(49, '68051441', '68051470', '534'),
(50, '68051471', '68051500', '542'),
(51, '68051501', '68051530', '543'),
(52, '68051531', '68051560', '544');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `u_user` varchar(50) NOT NULL,
  `u_pass` varchar(100) NOT NULL,
  `u_permission` tinyint(4) NOT NULL DEFAULT 1,
  `u_lastlogin` datetime NOT NULL,
  `u_approve` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `u_user`, `u_pass`, `u_permission`, `u_lastlogin`, `u_approve`) VALUES
(1, 'admin238@gmail.com', 'yup238', 2, '2024-12-19 16:35:15', 1),
(2, '1509966543787', '123', 1, '2024-12-19 16:33:54', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `evidence`
--
ALTER TABLE `evidence`
  ADD PRIMARY KEY (`e_id`);

--
-- Indexes for table `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`province_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`r_id`),
  ADD KEY `r_id` (`r_id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`se_id`),
  ADD KEY `se_id` (`se_id`);

--
-- Indexes for table `testroom`
--
ALTER TABLE `testroom`
  ADD PRIMARY KEY (`test_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`),
  ADD KEY `u_id` (`u_id`),
  ADD KEY `u_user` (`u_user`),
  ADD KEY `u_pass` (`u_pass`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `evidence`
--
ALTER TABLE `evidence`
  MODIFY `e_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `se_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `testroom`
--
ALTER TABLE `testroom`
  MODIFY `test_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
