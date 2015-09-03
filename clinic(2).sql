-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 03, 2015 at 10:04 AM
-- Server version: 5.6.19-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `clinic`
--

-- --------------------------------------------------------

--
-- Table structure for table `login_tokens`
--

CREATE TABLE IF NOT EXISTS `login_tokens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `token` char(32) NOT NULL,
  `duration` varchar(32) NOT NULL,
  `used` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `expires` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE IF NOT EXISTS `patients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address1` text NOT NULL,
  `address2` text NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `type_of_treatment` varchar(30) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `first_name`, `last_name`, `phone`, `email`, `address1`, `address2`, `city`, `state`, `country`, `type_of_treatment`, `admin_id`, `time`) VALUES
(2, 'pat s', 'ient', '9999999999', 'ad1@admin.com', '', 'fff', 'dd', '', '', 'procedure', 37, '2015-09-01 06:19:26'),
(3, 'dd', 'd', 'd', 'ad2@admin.com', 'd', '', '', '', '', 'procedure', 37, '2015-09-01 06:33:21'),
(4, 'dd', 'd', 'd', 'ad3@admin.com', 'd', '', '', '', '', 'procedure', 37, '2015-09-01 06:33:41'),
(5, 'dd', 'd', 'd', 'ad4@admin.com', 'd', '', '', '', '', 'procedure', 37, '2015-09-01 06:34:03'),
(6, 'dd', 'd', '67543547567', 'ad5@admin.com', 'd', '', '', '', '', 'consultation', 37, '2015-09-01 06:34:09'),
(7, 'pat2', '2', '22222', 'ad6@admin.com', '22 e2 e2', 'e 2e 2e', 'e 2e 2', '  e', ' e2e ', 'consultation', 37, '2015-09-01 07:56:51'),
(8, 'pat2', '2', '22222', 'ad7@admin.com', '22 e2 e2', 'e 2e 2e', 'e 2e 2', '  e', ' e2e ', 'consultation', 37, '2015-09-01 07:57:09'),
(9, 'bb', 'fdbdf', '9999999', 'b2d@dd.bb', 'gnbfgb', 'fgb', 'gbgb', 'gbgb', 'bg', 'consultation', 37, '2015-09-01 07:57:45'),
(10, 'yogendra', 'kumar', '1241234124', 'yo@gmail.com', 'lskdjflak', 'kjsakjd', 'lakjd', 'lakdsjfl', 'india', 'procedure', 37, '2015-09-01 11:20:03'),
(11, 'pat2', 'd', '222225', 'yo5@gmail.com', '', '', '', '', '', 'consultation', 37, '2015-09-02 09:59:10');

-- --------------------------------------------------------

--
-- Table structure for table `procedure_categories`
--

CREATE TABLE IF NOT EXISTS `procedure_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `details` longtext NOT NULL,
  `type` varchar(20) NOT NULL,
  `admin_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `procedure_categories`
--

INSERT INTO `procedure_categories` (`id`, `name`, `details`, `type`, `admin_id`) VALUES
(2, 'Hair Removal', 'fgdg', 'Cosmatic', 39),
(3, 'Hair Removal', 'fgdgaa', 'Medicare', 39),
(4, 'Tatoo Remoal', 'remove tatoo', 'Cosmatic', 39),
(5, 'Bandage on injury', 'Bandage on injury ', 'Medicare', 39),
(6, 'Bandage on injury', '2', 'Medicare', 39),
(7, 'Tatoo Remoal', '2', 'Cosmatic', 39);

-- --------------------------------------------------------

--
-- Table structure for table `treatments`
--

CREATE TABLE IF NOT EXISTS `treatments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(100) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `detail` longtext NOT NULL,
  `fee` varchar(10) NOT NULL,
  `category_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `treatments`
--

INSERT INTO `treatments` (`id`, `type`, `patient_id`, `doctor_id`, `detail`, `fee`, `category_id`, `image`, `time`) VALUES
(17, 'consultation', 6, 39, '', '', 0, 'uploads/consultation/421769_04082011164903left.jpg', '0000-00-00 00:00:00'),
(20, 'consultation', 6, 39, '', '', 0, 'uploads/consultation/421769_04082011164903left.jpg', '0000-00-00 00:00:00'),
(21, 'consultation', 6, 39, 'nb mgnmbgn ghj ', '33', 0, 'uploads/consultation/768128_add.jpg', '0000-00-00 00:00:00'),
(22, 'consultation', 9, 39, 'htgh hfg hg fgh fghgf', '22', 0, 'uploads/consultation/813100_banner_1.jpg', '0000-00-00 00:00:00'),
(23, 'consultation', 9, 39, 'f referf ', '', 0, 'uploads/consultation/232565_beer-birthday-kjerqerjg.jpg', '0000-00-00 00:00:00'),
(24, 'procedure', 9, 39, 'dcfds', '111', 2, '', '0000-00-00 00:00:00'),
(25, 'procedure', 9, 39, 'b fggbf bh', '111', 2, '', '2015-09-01 09:16:50'),
(26, 'procedure', 6, 39, 'tert', '100', 2, '', '2015-09-01 10:50:48'),
(27, 'procedure', 10, 39, 'dawayhi loo', '200', 2, '', '2015-09-01 11:20:24'),
(28, 'procedure', 10, 39, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500', '500', 3, '', '2015-09-01 12:58:30'),
(29, 'procedure', 7, 39, 'removed hair from chin permanaently by laser', '1000', 2, '', '2015-09-02 06:50:00'),
(30, 'consultation', 8, 39, 'consult for teeths', '200', 0, 'uploads/consultation/477113_add.jpg', '2015-09-02 07:04:28'),
(31, 'consultation', 8, 39, 'new consultation for gum problem', '250', 0, '', '2015-09-02 07:04:50'),
(32, 'consultation', 10, 39, 'hdfgh', '234', 0, '', '2015-09-02 11:33:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_group_id` int(11) unsigned DEFAULT NULL,
  `parent_id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `salt` text,
  `email` varchar(100) DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `image_url` varchar(500) NOT NULL,
  `email_verified` int(1) DEFAULT '0',
  `active` int(1) NOT NULL DEFAULT '0',
  `ip_address` varchar(50) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user` (`username`),
  KEY `mail` (`email`),
  KEY `users_FKIndex1` (`user_group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_group_id`, `parent_id`, `username`, `password`, `salt`, `email`, `first_name`, `last_name`, `image_url`, `email_verified`, `active`, `ip_address`, `created`, `modified`) VALUES
(1, 1, 0, 'admin', '365caef7fccbdb1ee711f084be9317a7', '1e6d99570a4d37cc29b18c4a6b06e6ed', 'admin@admin.com', 'Admin', 'Admin', '', 1, 1, '', '2015-07-31 12:35:25', '2015-08-27 01:23:48'),
(37, 7, 1, 'orgadmin', '4b771786f4fe8c927f13491ef0ebf65b', 'c24cd1c270c0ac91ec9eb862aaf0d0a3', 'orgadmin@admin.com', 'Organization', 'Admin', '', 1, 1, NULL, '2015-08-27 01:24:52', '2015-08-27 01:24:52'),
(38, 9, 37, 'reception@admin.com', 'd8b426bba6a97a39e0197ff67755a8bd', '6d8de01628b64b24f4166da09bcb9e8b', 'reception@admin.com', 'Reception', 'User', '', 1, 1, NULL, '2015-08-27 01:43:53', '2015-08-27 01:43:53'),
(39, 8, 37, 'doctor@admin.com', 'cfc244139d50efdf82ae895319cd3271', '7e9c883c964615dac0223a0bfb80c1ea', 'doctor@admin.com', 'Doctor', '1', '', 1, 1, NULL, '2015-09-01 00:14:47', '2015-09-01 00:14:47');

-- --------------------------------------------------------

--
-- Table structure for table `user_groups`
--

CREATE TABLE IF NOT EXISTS `user_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `alias_name` varchar(100) DEFAULT NULL,
  `allowRegistration` int(1) NOT NULL DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `user_groups`
--

INSERT INTO `user_groups` (`id`, `name`, `alias_name`, `allowRegistration`, `created`, `modified`) VALUES
(1, 'Admin', 'Admin', 0, '2015-07-31 12:35:25', '2015-07-31 12:35:25'),
(7, 'Organization', 'organization', 1, '2015-08-01 00:29:22', '2015-08-01 00:29:22'),
(8, 'Doctor', 'doctor', 1, '2015-08-27 01:19:57', '2015-08-27 01:19:57'),
(9, 'Receptionist', 'receptionist', 1, '2015-08-27 01:20:13', '2015-08-27 01:20:13');

-- --------------------------------------------------------

--
-- Table structure for table `user_group_permissions`
--

CREATE TABLE IF NOT EXISTS `user_group_permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_group_id` int(10) unsigned NOT NULL,
  `controller` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `action` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `allowed` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=402 ;

--
-- Dumping data for table `user_group_permissions`
--

INSERT INTO `user_group_permissions` (`id`, `user_group_id`, `controller`, `action`, `allowed`) VALUES
(1, 1, 'Pages', 'display', 1),
(2, 2, 'Pages', 'display', 1),
(3, 3, 'Pages', 'display', 1),
(4, 1, 'UserGroupPermissions', 'index', 1),
(5, 2, 'UserGroupPermissions', 'index', 0),
(6, 3, 'UserGroupPermissions', 'index', 0),
(7, 1, 'UserGroupPermissions', 'update', 1),
(8, 2, 'UserGroupPermissions', 'update', 0),
(9, 3, 'UserGroupPermissions', 'update', 0),
(10, 1, 'UserGroups', 'index', 1),
(11, 2, 'UserGroups', 'index', 0),
(12, 3, 'UserGroups', 'index', 0),
(13, 1, 'UserGroups', 'addGroup', 1),
(14, 2, 'UserGroups', 'addGroup', 0),
(15, 3, 'UserGroups', 'addGroup', 0),
(16, 1, 'UserGroups', 'editGroup', 1),
(17, 2, 'UserGroups', 'editGroup', 0),
(18, 3, 'UserGroups', 'editGroup', 0),
(19, 1, 'UserGroups', 'deleteGroup', 1),
(20, 2, 'UserGroups', 'deleteGroup', 0),
(21, 3, 'UserGroups', 'deleteGroup', 0),
(22, 1, 'Users', 'index', 1),
(23, 2, 'Users', 'index', 0),
(24, 3, 'Users', 'index', 0),
(25, 1, 'Users', 'viewUser', 1),
(26, 2, 'Users', 'viewUser', 1),
(27, 3, 'Users', 'viewUser', 0),
(28, 1, 'Users', 'myprofile', 1),
(29, 2, 'Users', 'myprofile', 1),
(30, 3, 'Users', 'myprofile', 0),
(31, 1, 'Users', 'login', 1),
(32, 2, 'Users', 'login', 1),
(33, 3, 'Users', 'login', 1),
(34, 1, 'Users', 'logout', 1),
(35, 2, 'Users', 'logout', 1),
(36, 3, 'Users', 'logout', 1),
(37, 1, 'Users', 'register', 1),
(38, 2, 'Users', 'register', 1),
(39, 3, 'Users', 'register', 1),
(40, 1, 'Users', 'changePassword', 1),
(41, 2, 'Users', 'changePassword', 1),
(42, 3, 'Users', 'changePassword', 0),
(43, 1, 'Users', 'changeUserPassword', 1),
(44, 2, 'Users', 'changeUserPassword', 0),
(45, 3, 'Users', 'changeUserPassword', 0),
(46, 1, 'Users', 'addUser', 1),
(47, 2, 'Users', 'addUser', 0),
(48, 3, 'Users', 'addUser', 0),
(49, 1, 'Users', 'editUser', 1),
(50, 2, 'Users', 'editUser', 0),
(51, 3, 'Users', 'editUser', 0),
(52, 1, 'Users', 'dashboard', 1),
(53, 2, 'Users', 'dashboard', 1),
(54, 3, 'Users', 'dashboard', 0),
(55, 1, 'Users', 'deleteUser', 1),
(56, 2, 'Users', 'deleteUser', 0),
(57, 3, 'Users', 'deleteUser', 0),
(58, 1, 'Users', 'makeActive', 1),
(59, 2, 'Users', 'makeActive', 0),
(60, 3, 'Users', 'makeActive', 0),
(61, 1, 'Users', 'accessDenied', 1),
(62, 2, 'Users', 'accessDenied', 1),
(63, 3, 'Users', 'accessDenied', 1),
(64, 1, 'Users', 'userVerification', 1),
(65, 2, 'Users', 'userVerification', 1),
(66, 3, 'Users', 'userVerification', 1),
(67, 1, 'Users', 'forgotPassword', 1),
(68, 2, 'Users', 'forgotPassword', 1),
(69, 3, 'Users', 'forgotPassword', 1),
(70, 1, 'Users', 'makeActiveInactive', 1),
(71, 2, 'Users', 'makeActiveInactive', 0),
(72, 3, 'Users', 'makeActiveInactive', 0),
(73, 1, 'Users', 'verifyEmail', 1),
(74, 2, 'Users', 'verifyEmail', 0),
(75, 3, 'Users', 'verifyEmail', 0),
(76, 1, 'Users', 'activatePassword', 1),
(77, 2, 'Users', 'activatePassword', 1),
(78, 3, 'Users', 'activatePassword', 1),
(79, 4, 'Users', 'activatePassword', 0),
(80, 5, 'Users', 'activatePassword', 1),
(81, 6, 'Users', 'activatePassword', 1),
(82, 7, 'Users', 'activatePassword', 1),
(83, 4, 'Users', 'forgotPassword', 1),
(84, 5, 'Users', 'forgotPassword', 1),
(85, 6, 'Users', 'forgotPassword', 1),
(86, 7, 'Users', 'forgotPassword', 1),
(87, 4, 'Users', 'userVerification', 0),
(88, 5, 'Users', 'userVerification', 0),
(89, 6, 'Users', 'userVerification', 0),
(90, 7, 'Users', 'userVerification', 1),
(91, 4, 'Users', 'accessDenied', 0),
(92, 5, 'Users', 'accessDenied', 0),
(93, 6, 'Users', 'accessDenied', 0),
(94, 7, 'Users', 'accessDenied', 1),
(95, 4, 'Users', 'verifyEmail', 1),
(96, 5, 'Users', 'verifyEmail', 1),
(97, 6, 'Users', 'verifyEmail', 1),
(98, 7, 'Users', 'verifyEmail', 1),
(99, 4, 'Users', 'makeActiveInactive', 1),
(100, 5, 'Users', 'makeActiveInactive', 1),
(101, 6, 'Users', 'makeActiveInactive', 1),
(102, 7, 'Users', 'makeActiveInactive', 1),
(103, 4, 'Users', 'dashboard', 1),
(104, 5, 'Users', 'dashboard', 1),
(105, 6, 'Users', 'dashboard', 1),
(106, 7, 'Users', 'dashboard', 1),
(107, 4, 'Users', 'deleteUser', 1),
(108, 5, 'Users', 'deleteUser', 1),
(109, 6, 'Users', 'deleteUser', 1),
(110, 7, 'Users', 'deleteUser', 1),
(111, 4, 'Users', 'editUser', 1),
(112, 5, 'Users', 'editUser', 1),
(113, 6, 'Users', 'editUser', 1),
(114, 7, 'Users', 'editUser', 1),
(115, 4, 'Users', 'addUser', 1),
(116, 5, 'Users', 'addUser', 1),
(117, 6, 'Users', 'addUser', 1),
(118, 7, 'Users', 'addUser', 1),
(119, 4, 'Users', 'changeUserPassword', 0),
(120, 5, 'Users', 'changeUserPassword', 0),
(121, 6, 'Users', 'changeUserPassword', 0),
(122, 7, 'Users', 'changeUserPassword', 1),
(123, 4, 'Users', 'changePassword', 1),
(124, 5, 'Users', 'changePassword', 1),
(125, 6, 'Users', 'changePassword', 1),
(126, 7, 'Users', 'changePassword', 1),
(127, 4, 'Users', 'register', 1),
(128, 5, 'Users', 'register', 1),
(129, 6, 'Users', 'register', 1),
(130, 7, 'Users', 'register', 1),
(131, 4, 'Users', 'logout', 1),
(132, 5, 'Users', 'logout', 1),
(133, 6, 'Users', 'logout', 1),
(134, 7, 'Users', 'logout', 1),
(135, 4, 'Users', 'login', 1),
(136, 5, 'Users', 'login', 1),
(137, 6, 'Users', 'login', 1),
(138, 7, 'Users', 'login', 1),
(139, 4, 'Users', 'myprofile', 1),
(140, 5, 'Users', 'myprofile', 1),
(141, 6, 'Users', 'myprofile', 1),
(142, 7, 'Users', 'myprofile', 1),
(143, 4, 'Users', 'viewUser', 1),
(144, 5, 'Users', 'viewUser', 1),
(145, 6, 'Users', 'viewUser', 1),
(146, 7, 'Users', 'viewUser', 1),
(147, 4, 'Users', 'index', 0),
(148, 5, 'Users', 'index', 0),
(149, 6, 'Users', 'index', 0),
(150, 7, 'Users', 'index', 1),
(151, 4, 'Pages', 'display', 0),
(152, 5, 'Pages', 'display', 0),
(153, 6, 'Pages', 'display', 0),
(154, 7, 'Pages', 'display', 1),
(155, 4, 'UserGroupPermissions', 'index', 0),
(156, 5, 'UserGroupPermissions', 'index', 0),
(157, 6, 'UserGroupPermissions', 'index', 0),
(158, 7, 'UserGroupPermissions', 'index', 1),
(159, 1, 'Users', 'emailVerification', 1),
(160, 2, 'Users', 'emailVerification', 0),
(161, 4, 'Users', 'emailVerification', 0),
(162, 5, 'Users', 'emailVerification', 0),
(163, 6, 'Users', 'emailVerification', 0),
(164, 7, 'Users', 'emailVerification', 1),
(165, 4, 'UserGroupPermissions', 'update', 0),
(166, 5, 'UserGroupPermissions', 'update', 0),
(167, 6, 'UserGroupPermissions', 'update', 0),
(168, 7, 'UserGroupPermissions', 'update', 1),
(169, 4, 'UserGroups', 'editGroup', 0),
(170, 5, 'UserGroups', 'editGroup', 0),
(171, 6, 'UserGroups', 'editGroup', 0),
(172, 7, 'UserGroups', 'editGroup', 1),
(173, 1, 'Location', 'index', 1),
(174, 2, 'Location', 'index', 0),
(175, 4, 'Location', 'index', 0),
(176, 5, 'Location', 'index', 0),
(177, 6, 'Location', 'index', 0),
(178, 7, 'Location', 'index', 1),
(179, 1, 'Location', 'allLocations', 1),
(180, 2, 'Location', 'allLocations', 0),
(181, 4, 'Location', 'allLocations', 0),
(182, 5, 'Location', 'allLocations', 0),
(183, 6, 'Location', 'allLocations', 0),
(184, 7, 'Location', 'allLocations', 1),
(185, 1, 'Location', 'deleteLocation', 1),
(186, 2, 'Location', 'deleteLocation', 0),
(187, 4, 'Location', 'deleteLocation', 0),
(188, 5, 'Location', 'deleteLocation', 0),
(189, 6, 'Location', 'deleteLocation', 0),
(190, 7, 'Location', 'deleteLocation', 1),
(191, 1, 'Location', 'editLocation', 1),
(192, 2, 'Location', 'editLocation', 0),
(193, 4, 'Location', 'editLocation', 0),
(194, 5, 'Location', 'editLocation', 0),
(195, 6, 'Location', 'editLocation', 0),
(196, 7, 'Location', 'editLocation', 1),
(197, 1, 'Case', 'deleteCase', 1),
(198, 2, 'Case', 'deleteCase', 0),
(199, 4, 'Case', 'deleteCase', 1),
(200, 5, 'Case', 'deleteCase', 0),
(201, 6, 'Case', 'deleteCase', 0),
(202, 7, 'Case', 'deleteCase', 1),
(203, 1, 'Case', 'editCase', 1),
(204, 2, 'Case', 'editCase', 0),
(205, 4, 'Case', 'editCase', 1),
(206, 5, 'Case', 'editCase', 0),
(207, 6, 'Case', 'editCase', 0),
(208, 7, 'Case', 'editCase', 1),
(209, 1, 'Case', 'allCases', 1),
(210, 2, 'Case', 'allCases', 0),
(211, 4, 'Case', 'allCases', 1),
(212, 5, 'Case', 'allCases', 0),
(213, 6, 'Case', 'allCases', 0),
(214, 7, 'Case', 'allCases', 1),
(215, 1, 'Case', 'index', 1),
(216, 2, 'Case', 'index', 0),
(217, 4, 'Case', 'index', 1),
(218, 5, 'Case', 'index', 0),
(219, 6, 'Case', 'index', 0),
(220, 7, 'Case', 'index', 1),
(221, 1, 'Case', 'uploadImage', 1),
(222, 2, 'Case', 'uploadImage', 0),
(223, 4, 'Case', 'uploadImage', 1),
(224, 5, 'Case', 'uploadImage', 0),
(225, 6, 'Case', 'uploadImage', 0),
(226, 7, 'Case', 'uploadImage', 1),
(227, 1, 'PropertyCase', 'index', 1),
(228, 2, 'PropertyCase', 'index', 0),
(229, 4, 'PropertyCase', 'index', 1),
(230, 5, 'PropertyCase', 'index', 0),
(231, 6, 'PropertyCase', 'index', 0),
(232, 7, 'PropertyCase', 'index', 1),
(233, 1, 'PropertyCase', 'allCases', 1),
(234, 2, 'PropertyCase', 'allCases', 0),
(235, 4, 'PropertyCase', 'allCases', 1),
(236, 5, 'PropertyCase', 'allCases', 0),
(237, 6, 'PropertyCase', 'allCases', 0),
(238, 7, 'PropertyCase', 'allCases', 1),
(239, 1, 'PropertyCase', 'editCase', 1),
(240, 2, 'PropertyCase', 'editCase', 0),
(241, 4, 'PropertyCase', 'editCase', 1),
(242, 5, 'PropertyCase', 'editCase', 0),
(243, 6, 'PropertyCase', 'editCase', 0),
(244, 7, 'PropertyCase', 'editCase', 1),
(245, 1, 'PropertyCase', 'deleteCase', 1),
(246, 2, 'PropertyCase', 'deleteCase', 0),
(247, 4, 'PropertyCase', 'deleteCase', 1),
(248, 5, 'PropertyCase', 'deleteCase', 0),
(249, 6, 'PropertyCase', 'deleteCase', 0),
(250, 7, 'PropertyCase', 'deleteCase', 1),
(251, 1, 'PropertyCase', 'uploadImage', 1),
(252, 2, 'PropertyCase', 'uploadImage', 0),
(253, 4, 'PropertyCase', 'uploadImage', 1),
(254, 5, 'PropertyCase', 'uploadImage', 1),
(255, 6, 'PropertyCase', 'uploadImage', 0),
(256, 7, 'PropertyCase', 'uploadImage', 1),
(257, 1, 'PropertyCase', 'processCase', 1),
(258, 2, 'PropertyCase', 'processCase', 0),
(259, 4, 'PropertyCase', 'processCase', 1),
(260, 5, 'PropertyCase', 'processCase', 1),
(261, 6, 'PropertyCase', 'processCase', 0),
(262, 7, 'PropertyCase', 'processCase', 1),
(263, 1, 'PropertyCase', 'deleteImage', 1),
(264, 2, 'PropertyCase', 'deleteImage', 0),
(265, 4, 'PropertyCase', 'deleteImage', 1),
(266, 5, 'PropertyCase', 'deleteImage', 1),
(267, 6, 'PropertyCase', 'deleteImage', 0),
(268, 7, 'PropertyCase', 'deleteImage', 1),
(269, 1, 'Patients', 'index', 1),
(270, 7, 'Patients', 'index', 1),
(271, 8, 'Patients', 'index', 1),
(272, 9, 'Patients', 'index', 1),
(273, 1, 'Patients', 'editPatient', 1),
(274, 7, 'Patients', 'editPatient', 1),
(275, 8, 'Patients', 'editPatient', 1),
(276, 9, 'Patients', 'editPatient', 1),
(277, 1, 'Patients', 'deletePatient', 1),
(278, 7, 'Patients', 'deletePatient', 1),
(279, 8, 'Patients', 'deletePatient', 1),
(280, 9, 'Patients', 'deletePatient', 1),
(281, 1, 'Patients', 'addPatient', 1),
(282, 7, 'Patients', 'addPatient', 1),
(283, 8, 'Patients', 'addPatient', 1),
(284, 9, 'Patients', 'addPatient', 1),
(285, 8, 'Pages', 'display', 1),
(286, 9, 'Pages', 'display', 1),
(287, 8, 'Users', 'forgotPassword', 1),
(288, 9, 'Users', 'forgotPassword', 1),
(289, 8, 'Users', 'userVerification', 1),
(290, 9, 'Users', 'userVerification', 1),
(291, 8, 'Users', 'verifyEmail', 1),
(292, 9, 'Users', 'verifyEmail', 1),
(293, 8, 'Users', 'dashboard', 1),
(294, 9, 'Users', 'dashboard', 1),
(295, 8, 'Users', 'editUser', 1),
(296, 9, 'Users', 'editUser', 1),
(297, 8, 'Users', 'changeUserPassword', 1),
(298, 9, 'Users', 'changeUserPassword', 0),
(299, 8, 'Users', 'changePassword', 1),
(300, 9, 'Users', 'changePassword', 1),
(301, 8, 'Users', 'logout', 1),
(302, 9, 'Users', 'logout', 1),
(303, 8, 'Users', 'login', 1),
(304, 9, 'Users', 'login', 1),
(305, 8, 'Users', 'myprofile', 1),
(306, 9, 'Users', 'myprofile', 1),
(307, 8, 'Users', 'index', 1),
(308, 9, 'Users', 'index', 0),
(309, 8, 'Users', 'register', 1),
(310, 9, 'Users', 'register', 0),
(311, 8, 'Users', 'addUser', 1),
(312, 9, 'Users', 'addUser', 0),
(313, 8, 'Users', 'deleteUser', 1),
(314, 9, 'Users', 'deleteUser', 0),
(315, 1, 'ProcedureCategory', 'index', 1),
(316, 7, 'ProcedureCategory', 'index', 1),
(317, 8, 'ProcedureCategory', 'index', 1),
(318, 9, 'ProcedureCategory', 'index', 0),
(319, 1, 'ProcedureCategory', 'addProCat', 1),
(320, 7, 'ProcedureCategory', 'addProCat', 1),
(321, 8, 'ProcedureCategory', 'addProCat', 1),
(322, 9, 'ProcedureCategory', 'addProCat', 0),
(323, 1, 'ProcedureCategory', 'deleteProCat', 1),
(324, 7, 'ProcedureCategory', 'deleteProCat', 1),
(325, 8, 'ProcedureCategory', 'deleteProCat', 1),
(326, 9, 'ProcedureCategory', 'deleteProCat', 0),
(327, 1, 'ProcedureCategory', 'editProCat', 1),
(328, 7, 'ProcedureCategory', 'editProCat', 1),
(329, 8, 'ProcedureCategory', 'editProCat', 1),
(330, 9, 'ProcedureCategory', 'editProCat', 0),
(331, 1, 'Treatment', 'index', 1),
(332, 7, 'Treatment', 'index', 1),
(333, 8, 'Treatment', 'index', 1),
(334, 9, 'Treatment', 'index', 1),
(335, 1, 'Treatment', 'addCosmatics', 1),
(336, 7, 'Treatment', 'addCosmatics', 1),
(337, 8, 'Treatment', 'addCosmatics', 1),
(338, 9, 'Treatment', 'addCosmatics', 1),
(339, 1, 'Treatment', 'addProcedure', 1),
(340, 7, 'Treatment', 'addProcedure', 1),
(341, 8, 'Treatment', 'addProcedure', 1),
(342, 9, 'Treatment', 'addProcedure', 1),
(343, 1, 'Treatment', 'deleteProcedure', 1),
(344, 7, 'Treatment', 'deleteProcedure', 1),
(345, 8, 'Treatment', 'deleteProcedure', 1),
(346, 9, 'Treatment', 'deleteProcedure', 1),
(347, 1, 'Treatment', 'deleteCosmatics', 1),
(348, 7, 'Treatment', 'deleteCosmatics', 1),
(349, 8, 'Treatment', 'deleteCosmatics', 1),
(350, 9, 'Treatment', 'deleteCosmatics', 1),
(351, 1, 'Treatment', 'editProcedure', 1),
(352, 7, 'Treatment', 'editProcedure', 1),
(353, 8, 'Treatment', 'editProcedure', 1),
(354, 9, 'Treatment', 'editProcedure', 1),
(355, 1, 'Treatment', 'editCosmatics', 1),
(356, 7, 'Treatment', 'editCosmatics', 1),
(357, 8, 'Treatment', 'editCosmatics', 1),
(358, 9, 'Treatment', 'editCosmatics', 1),
(359, 1, 'Treatment', 'deleteConsulation', 1),
(360, 7, 'Treatment', 'deleteConsulation', 1),
(361, 8, 'Treatment', 'deleteConsulation', 1),
(362, 9, 'Treatment', 'deleteConsulation', 1),
(363, 1, 'Treatment', 'addConsulation', 1),
(364, 7, 'Treatment', 'addConsulation', 1),
(365, 8, 'Treatment', 'addConsulation', 1),
(366, 9, 'Treatment', 'addConsulation', 1),
(367, 1, 'Treatment', 'editConsulation', 1),
(368, 7, 'Treatment', 'editConsulation', 1),
(369, 8, 'Treatment', 'editConsulation', 1),
(370, 9, 'Treatment', 'editConsulation', 1),
(371, 1, 'Treatment', 'addConsultation', 1),
(372, 7, 'Treatment', 'addConsultation', 1),
(373, 8, 'Treatment', 'addConsultation', 1),
(374, 9, 'Treatment', 'addConsultation', 1),
(375, 1, 'Treatment', 'deleteConsultation', 1),
(376, 7, 'Treatment', 'deleteConsultation', 1),
(377, 8, 'Treatment', 'deleteConsultation', 1),
(378, 9, 'Treatment', 'deleteConsultation', 1),
(379, 1, 'Treatment', 'editConsultation', 1),
(380, 7, 'Treatment', 'editConsultation', 1),
(381, 8, 'Treatment', 'editConsultation', 1),
(382, 9, 'Treatment', 'editConsultation', 1),
(383, 1, 'Treatment', 'allConsultations', 1),
(384, 7, 'Treatment', 'allConsultations', 1),
(385, 8, 'Treatment', 'allConsultations', 1),
(386, 9, 'Treatment', 'allConsultations', 1),
(387, 1, 'Treatment', 'allProcedures', 1),
(388, 7, 'Treatment', 'allProcedures', 1),
(389, 8, 'Treatment', 'allProcedures', 1),
(390, 9, 'Treatment', 'allProcedures', 1),
(391, 8, 'Users', 'viewUser', 1),
(392, 9, 'Users', 'viewUser', 0),
(393, 7, 'UserGroups', 'index', 0),
(394, 8, 'UserGroups', 'index', 0),
(395, 9, 'UserGroups', 'index', 0),
(396, 8, 'Users', 'emailVerification', 1),
(397, 9, 'Users', 'emailVerification', 1),
(398, 1, 'Patients', 'searchPatient', 1),
(399, 7, 'Patients', 'searchPatient', 1),
(400, 8, 'Patients', 'searchPatient', 1),
(401, 9, 'Patients', 'searchPatient', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
