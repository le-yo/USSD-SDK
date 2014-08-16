-- phpMyAdmin SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 16, 2014 at 03:29 PM
-- Server version: 5.5.33
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `proussd`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(45) DEFAULT NULL,
  `type` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `description`, `type`) VALUES
(1, 'Main Menu', 1),
(2, 'Buy Produce', 2),
(3, 'Buy Produce', 2),
(4, 'Register Farmer', 2),
(5, 'Buy airtime', 1),
(6, 'M-Shwari', 1),
(7, 'Lipa na M-PESA', 1),
(8, 'My account', 1),
(9, 'From Agent', 2),
(10, 'From ATM', 2),
(11, 'Amount PIN', 2),
(12, 'Other phone', 2),
(13, 'Loan', 2),
(14, 'PIN', 2),
(15, 'Pay Bill', 2),
(16, 'Buy Goods and Services', 2);

-- --------------------------------------------------------

--
-- Table structure for table `menu_item`
--

CREATE TABLE `menu_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `next_menu_id` int(11) DEFAULT '0',
  `step` int(11) NOT NULL,
  `confirmation_phrase` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `menu_item`
--

INSERT INTO `menu_item` (`id`, `menu_id`, `description`, `next_menu_id`, `step`, `confirmation_phrase`) VALUES
(1, 1, 'Register New Farmer', 4, 0, ''),
(2, 1, 'Buy Produce', 2, 0, ''),
(3, 4, 'Enter full name', 0, 1, 'Name'),
(4, 4, 'Enter Phone Number', 0, 2, 'Phone'),
(5, 4, 'Enter ID No', 0, 3, 'ID'),
(6, 4, 'Select Gender:\\r\\n1.Male\\r\\n2.Female', 0, 4, 'Gender'),
(7, 4, 'Select Language:\\r\\n1.English\\r\\n2.Swahili', 0, 5, 'Language'),
(9, 2, 'Enter customer ID', 0, 1, 'Customer ID'),
(10, 2, 'Enter Commodity', 0, 2, 'Commodity:'),
(11, 2, 'Enter Quantity', 0, 3, 'Quantity:'),
(12, 2, 'Enter Price', 0, 4, 'Price:'),
(13, 2, 'Rate Produce', 0, 5, 'Rating:'),
(14, 9, 'Enter agent no', 0, 1, 'Agent No'),
(15, 9, 'Enter Amount', 0, 2, 'Amount'),
(16, 9, 'Enter M-PESA PIN', 0, 3, 'PIN'),
(17, 10, 'Enter Agent No.', 0, 1, 'Agent No.'),
(19, 10, 'Enter M-PESA PIN', 0, 3, 'PIN'),
(20, 5, 'My phone', 11, 0, NULL),
(21, 5, 'Other phone', 12, 0, NULL),
(22, 11, 'Enter Amount', 0, 1, 'Amount'),
(23, 11, 'Enter M-PESA PIN', 0, 2, 'PIN'),
(24, 12, 'Enter Phone No.', 0, 1, 'Buy Airtime for'),
(25, 12, 'Enter M-PESA PIN', 0, 2, 'PIN'),
(26, 6, 'Send to M-Shwari', 11, 0, NULL),
(27, 6, 'Withdraw from M-Shwari', 11, 0, NULL),
(28, 6, 'Loan', 13, 0, NULL),
(29, 6, 'M-Shwari Balance', 14, 0, NULL),
(30, 6, 'Mini Statement', 14, 0, NULL),
(31, 6, 'Terms & Conditions', 14, 0, NULL),
(32, 13, 'Request Loan', 11, 0, NULL),
(33, 13, 'Pay Loan', 11, 0, NULL),
(34, 13, 'Check Loan Limit', 14, 0, NULL),
(35, 14, 'Enter M-PESA PIN', 0, 1, 'PIN'),
(36, 7, 'Pay Bill', 15, 0, NULL),
(37, 7, 'Buy Goods and Services', 16, 0, NULL),
(38, 15, 'Enter Business No.', 0, 1, 'Business No.'),
(39, 15, 'Enter Account No.', 0, 2, 'Account No.'),
(40, 15, 'Enter Amount.', 0, 3, 'Amount'),
(41, 15, 'Enter M-PESA PIN', 0, 4, 'PIN'),
(42, 16, 'Enter till number', 0, 1, 'Till number'),
(43, 16, 'Enter Amount', 0, 2, 'Amount'),
(44, 16, 'Enter M-PESA PIN', 0, 3, 'PIN');

-- --------------------------------------------------------

--
-- Table structure for table `survey`
--

CREATE TABLE `survey` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) NOT NULL,
  `intro_text` varchar(500) NOT NULL,
  `code` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `survey_question`
--

CREATE TABLE `survey_question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `survey_id` int(11) NOT NULL,
  `question` varchar(500) NOT NULL,
  `_order` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `survey_question_options`
--

CREATE TABLE `survey_question_options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `survey_question_id` int(11) NOT NULL,
  `option_text` varchar(500) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `survey_question_id` (`survey_question_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `phone` varchar(45) DEFAULT NULL,
  `session` int(11) NOT NULL DEFAULT '0',
  `survey_id` int(11) DEFAULT NULL,
  `progress` int(11) DEFAULT NULL,
  `menu_item_id` int(11) NOT NULL DEFAULT '0',
  `step` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `phone`, `session`, `survey_id`, `progress`, `menu_item_id`, `step`) VALUES
(3, '124', 0, NULL, NULL, 0, 0),
(4, '12456', 1, NULL, NULL, 0, 0),
(5, '124565', 0, NULL, NULL, 1, 0),
(6, '12456456', 1, NULL, NULL, 2, 0),
(7, '124564567', 1, NULL, NULL, 2, 0),
(8, '1245645467', 1, NULL, NULL, 0, 0),
(9, '12456454467', 1, NULL, NULL, 0, 0),
(10, '124564544467', 1, NULL, NULL, 0, 0),
(11, '12456454434467', 1, NULL, NULL, 4, 0),
(12, '124564354434467', 0, NULL, NULL, 0, 0),
(13, '1245643454434467', 0, NULL, NULL, 0, 0),
(14, '12456434544344367', 2, NULL, NULL, 4, 5),
(15, '124564345444344367', 2, NULL, NULL, 4, 5),
(16, '1245564345444344367', 2, NULL, NULL, 4, 5),
(17, '12455643454443444367', 2, NULL, NULL, 4, 5),
(18, '124556434544434443657', 0, NULL, NULL, 0, 0),
(19, '1245563434544434443657', 0, NULL, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_survey_response`
--

CREATE TABLE `user_survey_response` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `survey_question_id` int(11) NOT NULL,
  `response_option_id` varchar(50) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_ussd_response`
--

CREATE TABLE `user_ussd_response` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `step` int(11) NOT NULL,
  `response` varchar(50) NOT NULL,
  `confirmed` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=164 ;

--
-- Dumping data for table `user_ussd_response`
--

INSERT INTO `user_ussd_response` (`id`, `user_id`, `menu_id`, `step`, `response`, `confirmed`) VALUES
(1, 3, 3, 1, '1', 0),
(2, 3, 3, 1, '50', 0),
(3, 3, 3, 1, '50', 0),
(4, 3, 3, 1, '50', 0),
(5, 3, 3, 1, '50', 0),
(6, 3, 3, 1, '50', 0),
(7, 3, 3, 1, '50', 0),
(8, 3, 3, 1, '50', 0),
(9, 3, 3, 2, '50', 0),
(10, 3, 3, 2, '50', 0),
(11, 3, 3, 2, '50', 0),
(12, 3, 3, 2, '50', 0),
(13, 3, 3, 2, '50', 0),
(14, 3, 3, 2, '50', 0),
(15, 3, 3, 3, '50', 0),
(16, 3, 3, 3, '50', 0),
(17, 3, 3, 3, '50', 0),
(18, 3, 3, 3, '50', 0),
(19, 3, 3, 3, '50', 0),
(20, 3, 3, 3, '50', 0),
(21, 3, 3, 3, '50', 0),
(22, 3, 3, 3, '50', 0),
(23, 3, 3, 3, '50', 0),
(24, 3, 3, 1, '1', 0),
(25, 3, 3, 1, '1', 0),
(26, 3, 3, 1, '0728355429', 0),
(27, 3, 3, 1, '0728355429', 0),
(28, 3, 3, 2, '0728355429', 0),
(29, 3, 3, 3, '1', 0),
(30, 3, 3, 3, '300', 0),
(31, 3, 3, 3, '300', 0),
(32, 3, 3, 1, '1', 0),
(33, 3, 3, 2, '1', 0),
(34, 3, 3, 3, '1', 0),
(35, 3, 3, 1, '1', 0),
(36, 3, 3, 1, '1', 0),
(37, 3, 3, 2, '90', 0),
(38, 3, 3, 3, '905', 0),
(39, 3, 3, 1, '1', 0),
(40, 3, 3, 2, '1', 0),
(41, 3, 3, 3, '1', 0),
(42, 3, 3, 1, '1', 0),
(43, 3, 3, 2, '1', 0),
(44, 3, 3, 3, '1', 0),
(45, 3, 3, 1, '1', 0),
(46, 3, 3, 2, '1', 0),
(47, 3, 3, 3, '1', 0),
(48, 3, 3, 1, '1', 0),
(49, 3, 3, 2, '1', 0),
(50, 3, 3, 3, '1', 0),
(51, 3, 3, 1, '1', 0),
(52, 3, 3, 2, '1', 0),
(53, 3, 3, 3, '1', 0),
(54, 3, 3, 1, '1', 0),
(55, 3, 3, 2, '1', 0),
(56, 3, 3, 3, '1', 0),
(57, 3, 3, 1, '1', 0),
(58, 3, 3, 2, '1', 0),
(59, 3, 3, 3, '1', 0),
(60, 3, 3, 1, '1', 0),
(61, 3, 3, 2, '1', 0),
(62, 3, 3, 3, '1', 0),
(63, 3, 3, 1, '1', 0),
(64, 3, 3, 2, '1', 0),
(65, 3, 3, 3, '1', 0),
(66, 3, 3, 1, '1', 0),
(67, 3, 3, 2, '1', 0),
(68, 3, 3, 3, '1', 0),
(69, 3, 3, 1, '1', 0),
(70, 3, 3, 2, '1', 0),
(71, 3, 3, 3, '1', 0),
(72, 3, 3, 1, '1', 0),
(73, 3, 3, 2, '1', 0),
(74, 3, 3, 3, '1', 0),
(75, 3, 3, 1, '1', 0),
(76, 3, 3, 2, '1', 0),
(77, 3, 3, 3, '1', 0),
(78, 3, 9, 1, '1', 0),
(79, 3, 9, 2, '1', 0),
(80, 3, 9, 3, '1', 0),
(81, 3, 9, 1, '1', 0),
(82, 3, 9, 2, '1', 0),
(83, 3, 9, 3, '1', 0),
(84, 3, 9, 1, '1', 0),
(85, 3, 9, 2, '1', 0),
(86, 3, 9, 3, '1', 0),
(87, 3, 3, 1, '1', 0),
(88, 3, 3, 2, '1', 0),
(89, 3, 3, 3, '1', 0),
(90, 3, 3, 1, '1', 0),
(91, 3, 3, 1, '1', 0),
(92, 3, 3, 2, '0728355429', 0),
(93, 3, 3, 3, '1', 0),
(94, 10, 2, 1, '1', 0),
(95, 10, 2, 1, '1', 0),
(96, 10, 2, 2, '345', 0),
(97, 10, 2, 3, '345', 0),
(98, 10, 2, 4, '345', 0),
(99, 10, 2, 5, '345', 0),
(100, 12, 4, 1, '1', 0),
(101, 12, 4, 1, '1', 0),
(102, 12, 4, 2, 'leonard korir', 0),
(103, 12, 4, 3, 'leonard korir', 0),
(104, 12, 4, 4, '27151131', 0),
(105, 12, 4, 5, '27151131', 0),
(106, 12, 4, 5, '27151131', 0),
(107, 13, 4, 1, '1', 0),
(108, 13, 4, 2, 'leonard korir', 0),
(109, 13, 4, 3, 'leonard korir', 0),
(110, 13, 4, 3, 'leonard korir', 0),
(111, 13, 4, 4, '27151121', 0),
(112, 13, 4, 5, '27151121', 0),
(113, 14, 4, 1, '1', 0),
(114, 14, 4, 1, '1', 0),
(115, 14, 4, 2, 'leonard korir', 0),
(116, 14, 4, 3, 'leonard korir', 0),
(117, 14, 4, 3, 'leonard korir', 0),
(118, 14, 4, 4, '345', 0),
(119, 14, 4, 5, '345', 0),
(120, 15, 4, 1, '1', 0),
(121, 15, 4, 2, 'leonard korir', 0),
(122, 15, 4, 3, 'leonard korir', 0),
(123, 15, 4, 3, 'leonard korir', 0),
(124, 15, 4, 4, '234', 0),
(125, 15, 4, 5, '234', 0),
(126, 16, 4, 1, '1', 0),
(127, 16, 4, 2, '1', 0),
(128, 16, 4, 3, '1', 0),
(129, 16, 4, 4, '1', 0),
(130, 16, 4, 5, '1', 0),
(131, 17, 4, 1, '1', 0),
(132, 17, 4, 2, '1', 0),
(133, 17, 4, 3, '1', 0),
(134, 17, 4, 4, '1', 0),
(135, 17, 4, 5, '1', 0),
(136, 18, 4, 1, '1', 0),
(137, 18, 4, 2, '1', 0),
(138, 18, 4, 3, '1', 0),
(139, 18, 4, 4, '1', 0),
(140, 18, 4, 5, '1', 0),
(141, 18, 4, 5, '1', 0),
(142, 18, 4, 5, '1', 0),
(143, 18, 4, 5, '1', 0),
(144, 18, 4, 5, '1', 0),
(145, 18, 4, 5, '1', 0),
(146, 18, 4, 5, '1', 0),
(147, 18, 4, 5, '1', 0),
(148, 18, 4, 5, '1', 0),
(149, 19, 2, 1, '2sdfds', 0),
(150, 19, 2, 2, '2sdfds', 0),
(151, 19, 2, 3, '2sdfds', 0),
(152, 19, 2, 4, '2sdfds', 0),
(153, 19, 2, 5, '2sdfds', 0),
(154, 19, 2, 1, '2', 0),
(155, 19, 2, 2, '34545', 0),
(156, 19, 2, 3, '34545', 0),
(157, 19, 2, 4, '34545', 0),
(158, 19, 2, 5, '34545', 0),
(159, 19, 2, 1, '2asdf', 0),
(160, 19, 2, 2, '2asdf', 0),
(161, 19, 2, 3, '2asdf', 0),
(162, 19, 2, 4, '2asdf', 0),
(163, 19, 2, 5, '2asdf', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
