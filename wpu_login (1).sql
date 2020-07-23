-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2020 at 05:08 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wpu_login`
--

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `id` int(11) NOT NULL,
  `problem` varchar(256) NOT NULL,
  `report_by` varchar(256) NOT NULL,
  `category` varchar(50) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`id`, `problem`, `report_by`, `category`, `created_date`, `status`, `user_id`) VALUES
(34, 'ticket punya giansah', 'ticket punya giansah', '2', '2019-10-23 08:35:27', 8, 5),
(35, 'ticket punya gian lagi', 'ticket punya gian lagi', '3', '2019-10-23 08:35:27', 8, 5),
(36, 'ticket punya test', 'ticket punya test', '3', '2019-10-23 08:35:27', 8, 6),
(37, 'ticketpunyauser5', 'ticketpunyauser5', '2', '2019-10-25 07:21:50', 8, 5),
(38, 'ticket baru', 'ticket baru', '2', '2019-10-28 02:30:40', 8, 5),
(39, 'afeaf', 'aefeaf', '3', '2019-10-28 02:30:40', 8, 5),
(40, 'test tiket', 'test tiket', '2', '2020-02-06 04:25:36', 8, 5),
(41, 'Printer bermasalah', 'Agung', '2', '2020-02-06 04:25:36', 8, 8),
(42, 'ganti pita printer', 'Chandra', '2', '2020-02-06 04:25:36', 8, 9),
(43, 'test suara', 'afaf', '4', '2020-02-06 04:25:36', 8, 8),
(44, 'test suaaraa', 'afaddfad', '1', '2020-02-06 04:25:36', 8, 0),
(45, 'qfqefqf', 'qfeqefqefe', '2', '2020-02-06 04:25:36', 8, 8),
(46, 'qdqedqedq', 'qqdqedqedeqd', '3', '2020-02-06 04:25:36', 8, 8),
(47, 'adaedaed', 'adaedaed', '2', '2020-02-06 04:25:36', 8, 8),
(48, 'afafea', 'fafaef', '3', '2020-02-06 04:25:36', 8, 8),
(49, 'qdqedqd', 'qdeqdqd', '1', '2020-02-06 04:25:36', 8, 8),
(50, 'fefqfeq', 'qfqefqef', '3', '2020-02-06 04:25:36', 8, 8),
(51, 'adead', 'adaedea', '2', '2020-02-06 04:25:36', 8, 8),
(52, 'qfeqfqef', 'qfefqfqef', '3', '2020-02-06 04:25:36', 8, 8),
(53, 'baru', 'baru', '3', '2020-02-06 04:25:36', 8, 8),
(54, 'baru lagi', 'baru lagi', '2', '2020-02-06 04:25:36', 8, 8),
(55, 'qdqedqed', 'qdqedqe', '2', '2020-02-06 04:25:36', 8, 8),
(56, 'tickte baru', 'baru', '2', '2020-02-06 04:25:36', 8, 8),
(57, 'repord dari agung', 'Agung', '3', '2020-02-06 04:25:56', 7, 8),
(58, 'ticket baru', 'Agung', '1', '2020-02-07 02:49:28', 6, 8),
(59, 'test suara', 'Agung', '3', '2020-02-07 06:23:24', 6, 8),
(60, 'test suara', 'Agung', '1', '2020-02-07 06:23:57', 6, 8),
(61, 'uara', 'Agung', '1', '2020-02-07 06:25:32', 6, 8),
(62, 'cqecqqcq', 'Agung', '1', '2020-02-07 06:29:21', 6, 8),
(63, 'muncul suara', 'Agung', '2', '2020-02-07 06:52:43', 6, 8),
(64, 'cadcadca', 'Agung', '3', '2020-02-07 07:08:26', 6, 8),
(65, 'wvwfvwv', 'Agung', '1', '2020-02-07 07:16:17', 6, 8),
(66, 'rtrtrt', 'Agung', '2', '2020-02-07 07:17:30', 6, 8),
(67, '2r23r32', 'Agung', '1', '2020-02-07 07:24:18', 6, 8),
(68, 'wfrwfrwfw', 'Agung', '1', '2020-02-07 07:27:03', 6, 8),
(69, 'aceaceacae', 'Agung', '2', '2020-02-07 07:48:03', 6, 8),
(70, '2525452524', 'Agung', '3', '2020-02-07 07:48:47', 6, 8),
(71, 'cerfef', 'Agung', '3', '2020-02-07 07:50:39', 6, 8),
(72, 'egetg', 'Agung', '2', '2020-02-07 09:07:15', 6, 8);

-- --------------------------------------------------------

--
-- Table structure for table `ticket_detail`
--

CREATE TABLE `ticket_detail` (
  `id` int(11) NOT NULL,
  `update_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_ticket` int(11) NOT NULL,
  `action` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ticket_detail`
--

INSERT INTO `ticket_detail` (`id`, `update_date`, `id_ticket`, `action`) VALUES
(42, '2019-10-23 06:07:49', 34, '<p>ticket punya giansah</p>'),
(43, '2019-10-23 06:09:11', 35, '<p>ticket punya gian lagi&nbsp;</p>'),
(44, '2019-10-23 06:10:29', 36, '<p>ticket punya test</p>'),
(45, '2019-10-23 08:35:27', 34, '<p>update</p>'),
(46, '2019-10-24 04:37:57', 37, '<p>ticketpunyauser5</p>'),
(47, '2019-10-25 03:57:31', 38, '<p>ticket baru</p>'),
(48, '2019-10-25 07:21:50', 38, '<p>jadi pending on progress..</p>'),
(49, '2019-10-25 07:59:57', 39, '<p>afeafa</p>'),
(50, '2019-10-28 02:30:40', 39, '<p>jadi on progress...</p>'),
(51, '2019-11-16 04:09:45', 40, '<p>aasdasda</p>'),
(52, '2020-01-31 07:49:27', 41, '<ul>\r\n	<li>Printer tidak berfungsi entah mengapa&nbsp;</li>\r\n</ul>'),
(53, '2020-01-31 07:51:30', 42, '<ul>\r\n	<li>Tolong gantikan pita printer</li>\r\n</ul>'),
(54, '2020-02-05 04:20:02', 43, '<p><br />\r\nafafeafaf</p>'),
(55, '2020-02-05 04:25:27', 44, '<p>afafef</p>'),
(56, '2020-02-05 04:25:45', 45, '<p>qfqefqefqef</p>'),
(57, '2020-02-05 04:27:30', 46, '<p>qedqedqed</p>'),
(58, '2020-02-05 04:27:48', 47, '<p>adaedadad</p>'),
(59, '2020-02-05 04:49:49', 48, '<p><br />\r\nafaefafa</p>'),
(60, '2020-02-05 04:50:20', 49, '<p>qdqedqedq</p>'),
(61, '2020-02-05 06:50:22', 50, '<p>qfqefqef</p>'),
(62, '2020-02-05 06:51:12', 51, '<p>adeada</p>'),
(63, '2020-02-05 07:22:45', 52, '<p>qfqfqefeqfqfqfqef</p>'),
(64, '2020-02-05 07:25:03', 53, '<p><br />\r\nbaru</p>'),
(65, '2020-02-05 07:25:50', 54, '<p><br />\r\nbaru lagi</p>'),
(66, '2020-02-05 07:27:02', 55, '<p>qdqedqed</p>'),
(67, '2020-02-06 02:15:52', 56, '<p>baru</p>'),
(68, '2020-02-06 04:24:31', 57, '<p>dari agung</p>'),
(69, '2020-02-06 04:25:36', 57, '<ul>\r\n	<li>Sudah bisa muncul report otomatis tanpa mengetik&nbsp;</li>\r\n</ul>'),
(70, '2020-02-07 02:49:28', 58, '<p>ticket baru</p>'),
(71, '2020-02-07 06:23:24', 59, '<p>eafaefaf</p>'),
(72, '2020-02-07 06:23:57', 60, '<p>qfqefqfqfqfqfq</p>'),
(73, '2020-02-07 06:25:32', 61, '<p>CcCcCccada</p>'),
(74, '2020-02-07 06:29:21', 62, '<p>cqecqcqc</p>'),
(75, '2020-02-07 06:52:43', 63, '<p>suafafea</p>'),
(76, '2020-02-07 07:08:26', 64, '<p>cadcadcadcadc</p>'),
(77, '2020-02-07 07:16:17', 65, '<p>wvwvwfvfwv</p>'),
(78, '2020-02-07 07:17:30', 66, '<p>rtrtrtrtrt</p>'),
(79, '2020-02-07 07:24:18', 67, '<p>2r2r23r2r2r</p>'),
(80, '2020-02-07 07:27:03', 68, '<p>fwfwfwfwfwf</p>'),
(81, '2020-02-07 07:48:03', 69, '<p>aceacacaca</p>'),
(82, '2020-02-07 07:48:47', 70, '<p>524542525245</p>'),
(83, '2020-02-07 07:50:39', 71, '<p>ecerfce</p>'),
(84, '2020-02-07 09:07:15', 72, '<p>etgegte</p>');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(3, 'Lisna', 'gian.nurwana@gmail.com', 'lisna.jpg', '$2y$10$mPBwrvTs./NbxXigJ7M/PuaG2vDGwY2ae9nSLbEsx/WBBCxzA464K', 1, 1, 1567737252),
(7, 'Gian', 'gian@gmail.com', 'default.jpg', '$2y$10$fAg4tXMVUknRVwTq5nd1Qesj3tsqQwCRncCT7eeeH1ATzQKq/yF/u', 1, 1, 1580453833),
(8, 'Agung', 'agung@gmail.com', 'default.jpg', '$2y$10$DvrY36PxLkgDjGO9Nff4Gup55SEBTQ.PeHfifRe6nVW9Y6A5Okea2', 2, 1, 1580456890),
(9, 'Chandra', 'chandra@gmail.com', 'default.jpg', '$2y$10$EA4.0G6GuRtt7EuRpqtcUOpA9cjTMAZ/t5Lc8crqWCAax3sikfUUG', 2, 1, 1580456910);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(6, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'user'),
(3, 'Menu'),
(7, 'edited');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'administrator'),
(2, 'member');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(3, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(6, 1, 'sosmed', 'sosmed/sosmed', 'fab fa-fw fa-youtube', 2),
(7, 1, 'Role', 'admin/role', 'fas fa-user-tag\"', 1),
(8, 2, 'Change Password', 'user/changepassword', 'fas fa-fw fa-key', 1),
(9, 1, 'test', 'asdasd', 'asdasd', 2),
(10, 1, 'Ticket', 'user/ticket', 'fas fa-fw fa-ticket-alt', 1),
(11, 2, 'Tickets', 'user/tickets', 'fas fa-fw fa-ticket-alt', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `ticket_detail`
--
ALTER TABLE `ticket_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `ticket_detail`
--
ALTER TABLE `ticket_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id`);

--
-- Constraints for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD CONSTRAINT `user_access_menu_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id`),
  ADD CONSTRAINT `user_access_menu_ibfk_2` FOREIGN KEY (`menu_id`) REFERENCES `user_menu` (`id`);

--
-- Constraints for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD CONSTRAINT `user_sub_menu_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `user_menu` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
