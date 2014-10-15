-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 30, 2014 at 03:09 PM
-- Server version: 5.5.38-35.2-log
-- PHP Version: 5.4.23

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `devsmobi_acild`
--

-- --------------------------------------------------------

--
-- Table structure for table `bulksms`
--

DROP TABLE IF EXISTS `bulksms`;
CREATE TABLE IF NOT EXISTS `bulksms` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `guid` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `recipients` varchar(100) DEFAULT NULL,
  `farmercount` int(50) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  `datecomposed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `bulksms`
--

INSERT INTO `bulksms` (`id`, `guid`, `message`, `recipients`, `farmercount`, `status`, `datecomposed`) VALUES
(1, 'acild-sms-53f70db6aab96', 'asdasdhasdhashd', NULL, 0, 0, '2014-08-22 09:30:30'),
(2, 'acild-sms-53f70e9a43a93', 'asdasdhasdhashd', NULL, 0, 0, '2014-08-22 09:34:18'),
(3, 'et53f71ab9f0924', 'this is somehting', NULL, 0, 0, '2014-08-22 09:38:49'),
(4, 'acild-sms-53f71be872155', 'asdasdasdjasjdjasjds', '["0720606167","0729861869"]', 0, 1, '2014-08-22 10:31:04'),
(5, 'acild-sms-53f73a85a8465', 'kaskdasdj', NULL, 0, 0, '2014-08-22 12:41:41'),
(6, 'acild-sms-53f7426388fff', 'Millions of Indian farmers must eke out a living by cultivating crops in areas where rainfall is low and unreliable. Among the crops suited to these harsh conditions are millet and sorghum, which belong to a g', NULL, 0, 0, '2014-08-22 13:15:15'),
(7, 'acild-sms-53f74386d01e2', 'Millions of Indian farmers must eke out a living by cultivating crops in areas where rainfall is low and unreliable. ', '["0720606167","0729861869","0722829743"]', 0, 1, '2014-08-22 13:20:06'),
(8, 'acild-sms-53fdcd5e0bfc1', 'Hallo', NULL, 0, 0, '2014-08-27 12:21:50'),
(9, 'acild-sms-53fef6bdc8138', 'SMs test', '["0720606167","0729861869","0720264382","0713869278","0720369423"]', 0, 1, '2014-08-28 09:30:37'),
(10, 'acild-sms-53ff035734f96', 'this is a test sms', '["0720606167","0729861869","0720264382","0713869278","0720369423"]', 5, 1, '2014-08-28 10:24:23'),
(11, 'acild-sms-53ff6c3a1fe0b', 'Good evening Justin', NULL, 0, 0, '2014-08-28 17:51:54'),
(12, 'acild-sms-53ff6cd032687', 'Salamu nyingi kwako, Bwana Mabeya', '["0720606167","0729861869","0720264382","0713869278","0720369423","0722829743"]', 6, 1, '2014-08-28 17:54:24');

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

DROP TABLE IF EXISTS `content`;
CREATE TABLE IF NOT EXISTS `content` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `guid` varchar(100) NOT NULL,
  `title` text,
  `organization` int(50) NOT NULL,
  `summary` text NOT NULL,
  `content` text NOT NULL,
  `dateentered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `guid`, `title`, `organization`, `summary`, `content`, `dateentered`, `deleted`) VALUES
(3, 'acild-content-53f738fdc78b0', 'Improving Crops for  Arid Lands', 4, 'Improving Crops for \r\nArid Lands Improving Crops for \r\nArid LandsImproving Crops for \r\nArid LandsImproving Crops for \r\nArid Lands', 'Millions of Indian farmers must eke out a living by \r\ncultivating crops in areas where rainfall is low and \r\nunreliable. Among the crops suited to these harsh \r\nconditions are millet and sorghum, which belong \r\nto a group of annual grasses that produce small \r\ngrain seeds and are often cultivated as cereals. \r\nMillet comes in many varieties, including pearl \r\nmillet, finger millet, little millet, and foxtail millet, \r\nbut here â€œmilletâ€ refers to pearl millet only. Millet \r\nand sorghum are widely grown in Africa, Asia, and \r\nRussia and can be used as grain or forage. They \r\nare resistant to drought, grow quickly (the period \r\nfrom planting to harvest is typically three to four \r\nmonths), and can be cultivated in a wide range of \r\nsoil types.', '2014-08-22 12:35:09', 0);

-- --------------------------------------------------------

--
-- Table structure for table `county`
--

DROP TABLE IF EXISTS `county`;
CREATE TABLE IF NOT EXISTS `county` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `countyname` varchar(50) NOT NULL,
  `datecreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `custommessages`
--

DROP TABLE IF EXISTS `custommessages`;
CREATE TABLE IF NOT EXISTS `custommessages` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `message` text NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '0:default 1:ready to be sent 2: never send it',
  `datecomposed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastmodified` datetime NOT NULL,
  `composedby` int(100) NOT NULL,
  `approved` int(1) NOT NULL DEFAULT '0',
  `approvedby` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `custommessages`
--

INSERT INTO `custommessages` (`id`, `message`, `status`, `datecomposed`, `lastmodified`, `composedby`, `approved`, `approvedby`) VALUES
(1, 'asdasdad', 0, '2014-08-16 12:56:34', '0000-00-00 00:00:00', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `farmers`
--

DROP TABLE IF EXISTS `farmers`;
CREATE TABLE IF NOT EXISTS `farmers` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `names` varchar(50) NOT NULL,
  `idno` int(20) NOT NULL,
  `gender` varchar(8) NOT NULL,
  `phoneno` varchar(20) NOT NULL,
  `language` int(10) DEFAULT NULL,
  `organization` int(50) NOT NULL DEFAULT '1',
  `active` int(1) NOT NULL DEFAULT '1',
  `registeredby` int(10) NOT NULL,
  `deleted` int(1) NOT NULL DEFAULT '0',
  `deletedby` int(10) NOT NULL,
  `dateregistered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `subscribe` int(1) NOT NULL DEFAULT '1',
  `progress` int(2) DEFAULT NULL,
  `surveysession` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `farmers`
--

INSERT INTO `farmers` (`id`, `names`, `idno`, `gender`, `phoneno`, `language`, `organization`, `active`, `registeredby`, `deleted`, `deletedby`, `dateregistered`, `subscribe`, `progress`, `surveysession`) VALUES
(3, 'Felix Kimaru', 2147483647, 'female', '0720606167', 1, 1, 1, 1, 0, 0, '2014-08-18 11:19:51', 1, NULL, NULL),
(5, 'Joseph Langat', 27403884, 'male', '0729861869', 1, 1, 1, 1, 0, 0, '2014-08-18 11:38:00', 1, NULL, NULL),
(6, 'Kioko Moses', 25439703, 'female', '0720264382', 1, 1, 1, 1, 0, 0, '2014-08-18 12:48:58', 1, NULL, NULL),
(7, 'Okari', 213456, 'male', '0713869278', 1, 1, 1, 1, 0, 0, '2014-08-26 12:07:22', 1, NULL, NULL),
(8, 'Towett Caleb', 2889730, 'male', '0720369423', 1, 1, 1, 1, 0, 0, '2014-08-27 11:38:33', 1, NULL, NULL),
(9, 'Justin Mabeya', 8548575, 'male', '0722829743', 1, 1, 1, 1, 0, 0, '2014-08-28 17:53:22', 1, NULL, NULL),
(10, 'Cliff Oriku', 13566680, 'male', '0722984287', 1, 1, 1, 1, 0, 0, '2014-08-29 13:24:18', 1, NULL, NULL),
(11, 'Angwenyi Basweti', 5298832, 'male', '0722539856', 1, 1, 1, 1, 0, 0, '2014-08-29 13:31:59', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `farmer_purchases`
--

DROP TABLE IF EXISTS `farmer_purchases`;
CREATE TABLE IF NOT EXISTS `farmer_purchases` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `commodity` varchar(50) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `points_earned` varchar(50) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `farmer_purchases`
--

INSERT INTO `farmer_purchases` (`id`, `user_id`, `commodity`, `quantity`, `price`, `points_earned`, `date_created`) VALUES
(8, 48, '8455', '8855', '8536', '853.6', '2014-08-30 20:07:36');

-- --------------------------------------------------------

--
-- Table structure for table `improvedcrops`
--

DROP TABLE IF EXISTS `improvedcrops`;
CREATE TABLE IF NOT EXISTS `improvedcrops` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `organization` int(20) NOT NULL DEFAULT '1',
  `recordedby` int(10) NOT NULL DEFAULT '1',
  `location` text,
  `crop` text,
  `variety` varchar(100) DEFAULT NULL,
  `foodvalue` int(10) DEFAULT NULL,
  `seedcost` int(10) DEFAULT NULL,
  `seedssource` varchar(100) DEFAULT NULL,
  `fertiliser` text,
  `fertilisercost` int(10) DEFAULT NULL,
  `fertiliserrate` text,
  `spacing` varchar(100) DEFAULT NULL,
  `fertilisersource` varchar(100) DEFAULT NULL,
  `weed` text,
  `weedcontrol` text,
  `disease` text,
  `diseasecontrol` text,
  `insectpest` text,
  `topdressfertiliser` text,
  `timing` text,
  `harvestpest` text,
  `pestmanagement` text,
  `diseasemanagement` varchar(100) DEFAULT NULL,
  `harvestdisease` text,
  `pestcontrol` varchar(100) DEFAULT NULL,
  `market` text,
  `price` int(10) DEFAULT NULL,
  `daterecorded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `improvedcrops`
--

INSERT INTO `improvedcrops` (`id`, `organization`, `recordedby`, `location`, `crop`, `variety`, `foodvalue`, `seedcost`, `seedssource`, `fertiliser`, `fertilisercost`, `fertiliserrate`, `spacing`, `fertilisersource`, `weed`, `weedcontrol`, `disease`, `diseasecontrol`, `insectpest`, `topdressfertiliser`, `timing`, `harvestpest`, `pestmanagement`, `diseasemanagement`, `harvestdisease`, `pestcontrol`, `market`, `price`, `daterecorded`) VALUES
(1, 1, 1, 'Eldoret', 'Maize', 'Katumani', 240, 0, NULL, 'ajasjd', 0, 'asdjajsdj', NULL, NULL, 'asdjasjdj', 'ajasjjas', 'ajasjdjw', 'aajdjasjdas', 'ackadjajsd', 'acajdjas', 'acjajdjasd', 'vcadjasdj', 'acjadjj', '', 'dasd', NULL, 'sdasfu', 0, '2014-08-27 14:11:59'),
(2, 1, 1, 'Eldoret', 'Maize', 'Katumani', 240, 0, NULL, 'ajasjd', 0, 'asdjajsdj', NULL, NULL, 'asdjasjdj', 'ajasjjas', 'ajasjdjw', 'aajdjasjdas', 'ackadjajsd', 'acajdjas', 'acjajdjasd', 'vcadjasdj', 'acjadjj', '', 'dasd', NULL, 'sdasfu', 0, '2014-08-27 14:13:40');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(45) DEFAULT NULL,
  `type` int(11) NOT NULL DEFAULT '1',
  `message` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `description`, `type`, `message`) VALUES
(1, 'Main Menu', 1, ''),
(2, 'Buy Produce', 2, 'You have successfully Purchased produced'),
(3, 'Buy Produce', 2, 'You have successfully Purchased produced'),
(4, 'Register Farmer', 2, 'You have successfully registered a farmer'),
(5, 'Buy airtime', 1, ''),
(6, 'M-Shwari', 1, ''),
(7, 'Lipa na M-PESA', 1, ''),
(8, 'My account', 1, ''),
(9, 'From Agent', 2, ''),
(10, 'From ATM', 2, ''),
(11, 'Amount PIN', 2, ''),
(12, 'Other phone', 2, ''),
(13, 'Loan', 2, ''),
(14, 'PIN', 2, ''),
(15, 'Pay Bill', 2, ''),
(16, 'Buy Goods and Services', 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `menu_item`
--

DROP TABLE IF EXISTS `menu_item`;
CREATE TABLE IF NOT EXISTS `menu_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `next_menu_id` int(11) DEFAULT '0',
  `step` int(11) NOT NULL,
  `confirmation_phrase` varchar(50) DEFAULT NULL,
  `type` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `menu_item`
--

INSERT INTO `menu_item` (`id`, `menu_id`, `description`, `next_menu_id`, `step`, `confirmation_phrase`, `type`) VALUES
(1, 1, 'Register New Farmer', 4, 0, '', 0),
(2, 1, 'Buy Produce', 2, 0, '', 0),
(3, 4, 'Enter full name', 0, 1, 'Name', 0),
(4, 4, 'Enter Phone Number', 0, 2, 'Phone', 0),
(5, 4, 'Enter ID No', 0, 3, 'ID', 0),
(6, 4, 'Select Gender:<br>1.Male<br>2.Female', 0, 4, 'Gender', 0),
(7, 4, 'Select Language:<br>1.English<br>2.Swahili', 0, 5, 'Language', 0),
(9, 2, 'Enter customer National ID', 0, 1, 'Customer ID', 0),
(10, 2, 'Enter Commodity Bought', 0, 2, 'Commodity:', 0),
(11, 2, 'Enter Commodity Quantity', 0, 3, 'Quantity:', 0),
(12, 2, 'Enter Amount paid', 0, 4, 'Price:', 0),
(14, 1, 'Take Survey', 0, 1, 'Agent No', 3),
(15, 9, 'Enter Amount', 0, 2, 'Amount', 0),
(16, 9, 'Enter M-PESA PIN', 0, 3, 'PIN', 0),
(17, 10, 'Enter Agent No.', 0, 1, 'Agent No.', 0),
(19, 10, 'Enter M-PESA PIN', 0, 3, 'PIN', 0),
(20, 5, 'My phone', 11, 0, NULL, 0),
(21, 5, 'Other phone', 12, 0, NULL, 0),
(22, 11, 'Enter Amount', 0, 1, 'Amount', 0),
(23, 11, 'Enter M-PESA PIN', 0, 2, 'PIN', 0),
(24, 12, 'Enter Phone No.', 0, 1, 'Buy Airtime for', 0),
(25, 12, 'Enter M-PESA PIN', 0, 2, 'PIN', 0),
(26, 6, 'Send to M-Shwari', 11, 0, NULL, 0),
(27, 6, 'Withdraw from M-Shwari', 11, 0, NULL, 0),
(28, 6, 'Loan', 13, 0, NULL, 0),
(29, 6, 'M-Shwari Balance', 14, 0, NULL, 0),
(30, 6, 'Mini Statement', 14, 0, NULL, 0),
(31, 6, 'Terms & Conditions', 14, 0, NULL, 0),
(32, 13, 'Request Loan', 11, 0, NULL, 0),
(33, 13, 'Pay Loan', 11, 0, NULL, 0),
(34, 13, 'Check Loan Limit', 14, 0, NULL, 0),
(35, 14, 'Enter M-PESA PIN', 0, 1, 'PIN', 0),
(36, 7, 'Pay Bill', 15, 0, NULL, 0),
(37, 7, 'Buy Goods and Services', 16, 0, NULL, 0),
(38, 15, 'Enter Business No.', 0, 1, 'Business No.', 0),
(39, 15, 'Enter Account No.', 0, 2, 'Account No.', 0),
(40, 15, 'Enter Amount.', 0, 3, 'Amount', 0),
(41, 15, 'Enter M-PESA PIN', 0, 4, 'PIN', 0),
(42, 16, 'Enter till number', 0, 1, 'Till number', 0),
(43, 16, 'Enter Amount', 0, 2, 'Amount', 0),
(44, 16, 'Enter M-PESA PIN', 0, 3, 'PIN', 0);

-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

DROP TABLE IF EXISTS `organizations`;
CREATE TABLE IF NOT EXISTS `organizations` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `guid` varchar(100) NOT NULL,
  `names` text NOT NULL,
  `shortname` varchar(100) DEFAULT NULL,
  `sector` varchar(50) NOT NULL,
  `phoneno` int(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `location` text,
  `type` varchar(10) NOT NULL DEFAULT 'player',
  `dateregistered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` int(1) NOT NULL DEFAULT '1',
  `deleted` int(1) NOT NULL DEFAULT '0',
  `deletedby` int(100) DEFAULT NULL,
  `usercategory` varchar(20) NOT NULL DEFAULT 'player',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`id`, `guid`, `names`, `shortname`, `sector`, `phoneno`, `email`, `location`, `type`, `dateregistered`, `active`, `deleted`, `deletedby`, `usercategory`) VALUES
(4, '', 'Felix Kimaru', 'asdsadsad', 'Food Crop', 2147483647, 'kimflex34@googlemail.com', 'asdsad', 'agrovet', '2014-08-18 10:06:03', 1, 0, NULL, 'player'),
(5, '', 'Jj Solutions', 'jj', 'livestock', 720606167, 'felixkimaru@gmail.com', 'asdjsad', 'player', '2014-08-18 10:42:13', 1, 0, NULL, 'player');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

DROP TABLE IF EXISTS `purchases`;
CREATE TABLE IF NOT EXISTS `purchases` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `customer_id` int(100) NOT NULL,
  `description` text NOT NULL,
  `quantity` int(20) NOT NULL,
  `price` int(50) NOT NULL,
  `rating` int(1) NOT NULL DEFAULT '0',
  `datepurchased` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `buyerid` int(100) NOT NULL,
  `deleted` int(1) NOT NULL DEFAULT '0',
  `deleteby` int(100) DEFAULT NULL,
  `progress` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rewards`
--

DROP TABLE IF EXISTS `rewards`;
CREATE TABLE IF NOT EXISTS `rewards` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `farmer_id` int(100) NOT NULL,
  `amount` int(50) NOT NULL,
  `description` text,
  `daterewarded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `rewardedby` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `role` int(3) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `datecreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`, `name`, `datecreated`) VALUES
(1, 100, 'ACILD', '2014-08-17 20:38:24'),
(2, 101, 'Players', '2014-08-17 20:38:24'),
(3, 102, 'Agrovets', '2014-08-17 20:38:40');

-- --------------------------------------------------------

--
-- Table structure for table `sectors`
--

DROP TABLE IF EXISTS `sectors`;
CREATE TABLE IF NOT EXISTS `sectors` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `sectorname` varchar(100) NOT NULL,
  `datecreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `createdby` int(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `smslogs`
--

DROP TABLE IF EXISTS `smslogs`;
CREATE TABLE IF NOT EXISTS `smslogs` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `recipient` varchar(30) NOT NULL,
  `sender` varchar(30) NOT NULL,
  `message` text NOT NULL,
  `datesent` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `smslogs`
--

INSERT INTO `smslogs` (`id`, `recipient`, `sender`, `message`, `datesent`, `status`) VALUES
(1, '', '', 'this is a message', '2014-08-18 11:22:58', 1),
(2, '', '', 'fghklsdfghfg', '2014-08-18 12:49:39', 1),
(3, '', '', 'this is a message', '2014-08-19 15:24:05', 1),
(4, '', '', 'dgdg', '2014-08-19 15:25:32', 1),
(5, '', '', 'this is a test message ', '2014-08-26 12:07:54', 1);

-- --------------------------------------------------------

--
-- Table structure for table `smsSurveyQuestions`
--

DROP TABLE IF EXISTS `smsSurveyQuestions`;
CREATE TABLE IF NOT EXISTS `smsSurveyQuestions` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `surveyid` int(100) NOT NULL,
  `_order` int(11) NOT NULL,
  `question` text NOT NULL,
  `datecreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `createdby` int(100) NOT NULL,
  `last` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `smsSurveyQuestions`
--

INSERT INTO `smsSurveyQuestions` (`id`, `surveyid`, `_order`, `question`, `datecreated`, `createdby`, `last`) VALUES
(1, 1, 1, 'Which of the following crops do you grow?', '2014-08-17 16:08:55', 0, 0),
(2, 1, 2, 'Which of the following animals do you keep?', '2014-08-17 16:08:55', 0, 0),
(3, 2, 1, 'What is your knowledge of the Project?', '2014-08-26 15:09:50', 0, 0),
(4, 2, 2, 'Overall, how well have the ethical, social and cultural issues been addressed in the Project?', '2014-08-26 15:09:50', 0, 0),
(5, 2, 3, 'Overall, how well have preparations been made to address commercialization issues in the Project?', '2014-08-26 15:09:50', 0, 0),
(6, 2, 4, 'How well have the interests and concerns of small-scale maize farmers been considered in project planning and implementation?', '2014-08-26 15:09:50', 0, 0),
(7, 2, 5, 'How well have the interests and concerns of farmers associations been considered in project planning and implementation?', '2014-08-26 15:09:50', 0, 0),
(8, 2, 6, 'How effective are the projects communication efforts based on feedback from the farmers and the public?', '2014-08-26 15:09:50', 0, 0),
(9, 3, 1, 'Are there any ethical, social, and/or cultural issues encountered in the farmers work in the project? ', '2014-08-26 15:09:50', 0, 0),
(10, 3, 2, 'Has each issue been adequately addressed by the project? ', '2014-08-26 15:09:50', 0, 0),
(11, 3, 3, 'Do you foresee any potential commercialization issues in the project', '2014-08-29 13:00:08', 0, 0),
(12, 3, 4, 'Have preparations been made by the partners to effectively address these issues when they arise? ', '2014-08-29 13:04:04', 0, 0),
(13, 3, 5, 'Do you see any difficulties that may arise as this project advances? If so, how should they be addressed?', '2014-08-29 13:04:04', 0, 0),
(14, 3, 6, 'Overall, are the voices, concerns and benefits of smallholder farmers being considered in project planning and implementation?', '2014-08-29 13:04:04', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `smsSurveys`
--

DROP TABLE IF EXISTS `smsSurveys`;
CREATE TABLE IF NOT EXISTS `smsSurveys` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `shortname` varchar(50) DEFAULT NULL,
  `code` varchar(50) NOT NULL,
  `createdby` int(100) NOT NULL,
  `datecreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `description` text,
  `organization_id` int(100) NOT NULL,
  `type` int(11) NOT NULL DEFAULT '1',
  `next_survey_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `smsSurveys`
--

INSERT INTO `smsSurveys` (`id`, `title`, `shortname`, `code`, `createdby`, `datecreated`, `description`, `organization_id`, `type`, `next_survey_id`) VALUES
(1, 'Test Survey', 'Test Survey', 'Survey1', 0, '2014-08-17 16:04:57', 'Welcome to Survey Test', 1, 0, 0),
(2, 'Survey1', 'Social Audit', 'SocialAudit1', 1, '2014-08-26 15:02:55', 'Welcome to Survey 2', 0, 2, 3),
(3, 'Social Audit', 'Social Audit 2', 'SocialAudit2', 0, '2014-08-29 13:04:47', NULL, 0, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `surveyLogic`
--

DROP TABLE IF EXISTS `surveyLogic`;
CREATE TABLE IF NOT EXISTS `surveyLogic` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `smssurveyquestionid` int(100) NOT NULL,
  `expectedresponse` text NOT NULL,
  `jumptoquestionid` int(100) NOT NULL,
  `smssurveyid` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `surveyResponse`
--

DROP TABLE IF EXISTS `surveyResponse`;
CREATE TABLE IF NOT EXISTS `surveyResponse` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `response` text NOT NULL,
  `survey_question_id` int(100) NOT NULL,
  `smssurveyid` int(100) NOT NULL,
  `dateresponded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=321 ;

--
-- Dumping data for table `surveyResponse`
--

INSERT INTO `surveyResponse` (`id`, `user_id`, `response`, `survey_question_id`, `smssurveyid`, `dateresponded`) VALUES
(1, 14, '1', 1, 0, '2014-08-17 17:45:53'),
(2, 14, '1', 1, 0, '2014-08-17 17:46:09'),
(3, 14, '1', 1, 0, '2014-08-17 17:50:11'),
(4, 14, '1', 1, 0, '2014-08-17 17:50:28'),
(5, 14, '1', 1, 0, '2014-08-17 17:51:49'),
(6, 14, '1', 1, 0, '2014-08-17 18:19:14'),
(7, 14, '1', 1, 0, '2014-08-17 18:21:42'),
(8, 14, '1', 1, 0, '2014-08-17 18:23:44'),
(9, 14, '1', 1, 0, '2014-08-17 18:26:47'),
(10, 14, '1', 1, 0, '2014-08-17 18:26:52'),
(11, 14, '1', 1, 0, '2014-08-17 18:26:54'),
(12, 14, '1', 1, 0, '2014-08-17 18:27:58'),
(13, 14, '1', 1, 0, '2014-08-17 19:00:50'),
(14, 14, '1', 1, 0, '2014-08-17 19:02:09'),
(15, 14, '1', 1, 0, '2014-08-17 19:04:32'),
(16, 14, '1', 1, 0, '2014-08-17 19:05:57'),
(17, 14, '1', 1, 0, '2014-08-17 19:06:06'),
(18, 14, '1', 1, 0, '2014-08-17 19:08:21'),
(19, 14, '1', 1, 0, '2014-08-17 19:09:18'),
(20, 14, '1', 1, 0, '2014-08-17 19:09:43'),
(21, 14, '1', 1, 0, '2014-08-17 19:13:58'),
(22, 14, '1', 1, 0, '2014-08-17 19:14:20'),
(23, 14, '1', 1, 0, '2014-08-17 19:18:20'),
(24, 14, '1', 1, 0, '2014-08-17 19:19:07'),
(25, 14, '1', 1, 0, '2014-08-17 19:19:14'),
(26, 14, '1', 1, 0, '2014-08-17 19:20:03'),
(27, 14, '1', 1, 0, '2014-08-17 19:20:33'),
(28, 14, '1', 1, 0, '2014-08-17 19:21:47'),
(29, 14, '1', 1, 0, '2014-08-17 19:22:01'),
(30, 14, '1', 1, 0, '2014-08-17 19:22:20'),
(31, 14, '1', 1, 0, '2014-08-17 19:22:41'),
(32, 14, '1', 1, 0, '2014-08-17 19:22:57'),
(33, 14, '1', 1, 0, '2014-08-17 19:23:17'),
(34, 14, '1', 1, 0, '2014-08-17 19:23:41'),
(35, 14, '1', 1, 0, '2014-08-17 19:24:09'),
(36, 14, '4', 2, 0, '2014-08-17 19:24:11'),
(37, 14, '1', 1, 0, '2014-08-17 19:28:35'),
(38, 14, '4', 2, 0, '2014-08-17 19:28:38'),
(39, 14, '1', 1, 0, '2014-08-17 19:28:45'),
(40, 14, '4', 2, 0, '2014-08-17 19:28:47'),
(41, 14, '1', 1, 1, '2014-08-17 19:30:36'),
(42, 14, '4', 2, 1, '2014-08-17 19:30:39'),
(43, 14, '1', 1, 1, '2014-08-17 19:30:48'),
(44, 14, '4', 2, 1, '2014-08-17 19:30:50'),
(45, 16, '1', 1, 1, '2014-08-17 21:48:34'),
(46, 16, '4', 2, 1, '2014-08-17 21:48:40'),
(47, 17, '1', 1, 1, '2014-08-18 08:26:10'),
(48, 17, '5', 2, 1, '2014-08-18 08:26:50'),
(49, 18, '2', 1, 1, '2014-08-19 08:49:07'),
(50, 18, '4', 2, 1, '2014-08-19 08:49:28'),
(51, 17, '1', 1, 1, '2014-08-22 13:51:07'),
(52, 17, '4', 2, 1, '2014-08-22 13:51:32'),
(53, 17, '1', 1, 1, '2014-08-26 12:19:59'),
(54, 17, '6', 2, 1, '2014-08-26 12:20:19'),
(55, 10, '1', 1, 1, '2014-08-27 00:55:16'),
(56, 10, '5', 2, 1, '2014-08-27 00:55:20'),
(57, 10, '2', 3, 2, '2014-08-27 01:19:20'),
(58, 10, '2', 6, 2, '2014-08-27 01:19:24'),
(59, 10, '2', 9, 2, '2014-08-27 01:20:07'),
(60, 10, '2', 3, 2, '2014-08-27 01:20:24'),
(61, 10, '2', 3, 2, '2014-08-27 01:21:43'),
(62, 10, '2', 3, 2, '2014-08-27 01:23:52'),
(63, 10, '2', 3, 2, '2014-08-27 01:23:59'),
(64, 10, '1', 3, 2, '2014-08-27 01:24:02'),
(65, 10, '1', 3, 2, '2014-08-27 01:24:05'),
(66, 10, '1', 3, 2, '2014-08-27 01:24:05'),
(67, 10, 'A', 3, 2, '2014-08-27 01:24:06'),
(68, 10, 'A', 3, 2, '2014-08-27 01:24:08'),
(69, 10, 'A', 3, 2, '2014-08-27 01:25:33'),
(70, 11, '2', 3, 2, '2014-08-27 01:26:00'),
(71, 11, '2', 3, 2, '2014-08-27 01:26:32'),
(72, 11, '2', 3, 2, '2014-08-27 01:27:08'),
(73, 11, '2', 3, 2, '2014-08-27 01:27:39'),
(74, 11, '2', 3, 2, '2014-08-27 01:28:28'),
(75, 11, '2', 3, 2, '2014-08-27 01:32:30'),
(76, 11, '2', 3, 2, '2014-08-27 01:32:51'),
(77, 11, '2', 3, 2, '2014-08-27 01:33:08'),
(78, 11, '2', 3, 2, '2014-08-27 01:33:46'),
(79, 11, '2', 3, 2, '2014-08-27 01:33:56'),
(80, 11, '2', 3, 2, '2014-08-27 01:34:12'),
(81, 11, '2', 6, 2, '2014-08-27 01:45:05'),
(82, 11, '2', 9, 2, '2014-08-27 01:46:02'),
(83, 11, '2', 3, 2, '2014-08-27 01:47:44'),
(84, 11, '2', 6, 2, '2014-08-27 01:47:50'),
(85, 11, '2', 9, 2, '2014-08-27 01:47:53'),
(86, 11, '1', 3, 2, '2014-08-27 01:48:13'),
(87, 11, '1', 6, 2, '2014-08-27 01:48:19'),
(88, 11, '1', 9, 2, '2014-08-27 01:48:25'),
(89, 11, '1', 1, 1, '2014-08-27 02:16:04'),
(90, 11, '5', 2, 1, '2014-08-27 02:16:09'),
(91, 11, '5', 3, 2, '2014-08-27 02:16:33'),
(92, 11, '1', 6, 2, '2014-08-27 02:16:39'),
(93, 24, '1', 3, 2, '2014-08-27 09:51:56'),
(94, 24, '3', 6, 2, '2014-08-27 09:52:01'),
(95, 24, '4', 9, 2, '2014-08-27 09:52:07'),
(96, 25, '2', 3, 2, '2014-08-27 10:40:44'),
(97, 23, '5', 3, 2, '2014-08-27 10:44:45'),
(98, 23, '2', 6, 2, '2014-08-27 10:45:00'),
(99, 30, '2', 3, 2, '2014-08-27 10:53:15'),
(100, 30, '2', 6, 2, '2014-08-27 10:53:18'),
(101, 30, '2', 9, 2, '2014-08-27 10:53:20'),
(102, 32, '5', 3, 2, '2014-08-27 10:59:31'),
(103, 32, '5', 6, 2, '2014-08-27 10:59:59'),
(104, 33, '5', 3, 2, '2014-08-27 11:03:27'),
(105, 33, '5', 6, 2, '2014-08-27 11:03:36'),
(106, 30, '5', 3, 2, '2014-08-27 11:28:54'),
(107, 30, '5', 6, 2, '2014-08-27 11:28:57'),
(108, 30, '5', 9, 2, '2014-08-27 11:29:01'),
(109, 35, '4', 3, 2, '2014-08-27 11:29:49'),
(110, 35, '5', 6, 2, '2014-08-27 11:29:55'),
(111, 35, '5', 9, 2, '2014-08-27 11:31:00'),
(112, 35, '5', 3, 2, '2014-08-27 11:31:45'),
(113, 35, '5', 6, 2, '2014-08-27 11:31:53'),
(114, 35, '5', 9, 2, '2014-08-27 11:32:12'),
(115, 35, '2', 3, 2, '2014-08-27 11:32:33'),
(116, 35, '5', 6, 2, '2014-08-27 11:33:12'),
(117, 35, '2', 9, 2, '2014-08-27 11:35:30'),
(118, 35, '1', 1, 1, '2014-08-27 11:38:06'),
(119, 35, '4', 2, 1, '2014-08-27 11:38:12'),
(120, 35, '1', 1, 1, '2014-08-27 11:41:31'),
(121, 35, '4', 2, 1, '2014-08-27 11:41:47'),
(122, 35, '2', 3, 2, '2014-08-27 11:42:40'),
(123, 35, '2', 6, 2, '2014-08-27 11:42:44'),
(124, 35, '2', 9, 2, '2014-08-27 11:42:47'),
(125, 35, '1', 1, 1, '2014-08-27 11:53:43'),
(126, 35, '4', 2, 1, '2014-08-27 11:53:46'),
(127, 35, '1', 1, 1, '2014-08-27 11:57:14'),
(128, 35, '4', 2, 1, '2014-08-27 11:57:18'),
(129, 35, '1', 1, 1, '2014-08-27 11:57:56'),
(130, 35, '4', 2, 1, '2014-08-27 11:58:03'),
(131, 35, '1', 1, 1, '2014-08-27 11:58:29'),
(132, 35, '4', 2, 1, '2014-08-27 11:58:34'),
(133, 35, '5', 3, 2, '2014-08-27 11:59:11'),
(134, 35, '5', 6, 2, '2014-08-27 11:59:16'),
(135, 35, '1', 9, 2, '2014-08-27 12:00:12'),
(136, 35, '1', 1, 1, '2014-08-27 12:00:55'),
(137, 35, '4', 2, 1, '2014-08-27 12:01:02'),
(138, 37, '5', 3, 2, '2014-08-27 12:01:50'),
(139, 37, '4', 6, 2, '2014-08-27 12:02:21'),
(140, 35, '1', 1, 1, '2014-08-27 12:04:01'),
(141, 35, '4', 2, 1, '2014-08-27 12:04:05'),
(142, 36, '4', 3, 2, '2014-08-27 12:04:50'),
(143, 36, '4', 6, 2, '2014-08-27 12:05:10'),
(144, 35, '1', 1, 1, '2014-08-27 12:07:32'),
(145, 35, '4', 2, 1, '2014-08-27 12:07:37'),
(146, 35, '5', 3, 2, '2014-08-27 12:08:02'),
(147, 35, '5', 6, 2, '2014-08-27 12:08:10'),
(148, 35, '1', 9, 2, '2014-08-27 12:09:47'),
(149, 35, '5', 3, 2, '2014-08-27 12:10:30'),
(150, 35, '5', 6, 2, '2014-08-27 12:10:35'),
(151, 35, '1', 9, 2, '2014-08-27 12:35:08'),
(152, 35, '5', 3, 2, '2014-08-27 13:03:07'),
(153, 35, '5', 6, 2, '2014-08-27 13:03:15'),
(154, 35, '1', 9, 2, '2014-08-27 13:03:22'),
(155, 35, '2', 3, 2, '2014-08-27 13:03:45'),
(156, 35, '5', 6, 2, '2014-08-27 15:38:49'),
(157, 38, '5', 3, 2, '2014-08-29 08:24:56'),
(158, 38, '5', 6, 2, '2014-08-29 08:25:06'),
(159, 38, '5', 3, 2, '2014-08-29 09:18:00'),
(160, 38, '5', 6, 2, '2014-08-29 09:18:06'),
(161, 38, '5', 1, 2, '2014-08-29 09:54:55'),
(162, 38, '5', 2, 2, '2014-08-29 09:55:01'),
(163, 38, '5', 3, 2, '2014-08-29 09:55:06'),
(164, 38, '5', 4, 2, '2014-08-29 09:55:16'),
(165, 38, '5', 5, 2, '2014-08-29 09:55:22'),
(166, 38, '5', 6, 2, '2014-08-29 09:58:30'),
(167, 38, '5', 1, 2, '2014-08-29 09:59:13'),
(168, 38, '5', 2, 2, '2014-08-29 09:59:19'),
(169, 38, '5', 3, 2, '2014-08-29 09:59:23'),
(170, 38, '5', 4, 2, '2014-08-29 09:59:27'),
(171, 38, '5', 5, 2, '2014-08-29 09:59:33'),
(172, 39, '5', 1, 2, '2014-08-29 12:22:30'),
(173, 39, '5', 2, 2, '2014-08-29 12:22:38'),
(174, 39, '5', 3, 2, '2014-08-29 12:22:45'),
(175, 39, '5', 4, 2, '2014-08-29 12:22:55'),
(176, 39, '5', 5, 2, '2014-08-29 12:23:06'),
(177, 39, '2', 6, 2, '2014-08-29 12:24:54'),
(178, 42, '5', 1, 2, '2014-08-29 12:29:48'),
(179, 42, '5', 2, 2, '2014-08-29 12:31:17'),
(180, 42, '5', 3, 2, '2014-08-29 12:31:27'),
(181, 42, '5', 4, 2, '2014-08-29 12:31:37'),
(182, 42, '5', 5, 2, '2014-08-29 12:31:48'),
(183, 42, '3', 6, 2, '2014-08-29 12:36:14'),
(184, 42, '5', 1, 2, '2014-08-29 12:38:03'),
(185, 42, '5', 2, 2, '2014-08-29 12:42:16'),
(186, 42, '5', 3, 2, '2014-08-29 12:42:36'),
(187, 42, '5', 4, 2, '2014-08-29 12:42:49'),
(188, 42, '5', 5, 2, '2014-08-29 12:42:59'),
(189, 42, '5', 6, 2, '2014-08-29 12:43:08'),
(190, 42, '5', 1, 2, '2014-08-29 12:46:31'),
(191, 42, '5', 2, 2, '2014-08-29 12:46:39'),
(192, 42, '5', 3, 2, '2014-08-29 12:46:48'),
(193, 42, '5', 4, 2, '2014-08-29 12:46:56'),
(194, 42, '5', 5, 2, '2014-08-29 12:47:06'),
(195, 42, '5', 6, 2, '2014-08-29 12:49:04'),
(196, 42, '5', 1, 2, '2014-08-29 12:49:49'),
(197, 42, '5', 2, 2, '2014-08-29 12:49:58'),
(198, 42, '5', 3, 2, '2014-08-29 12:50:07'),
(199, 42, '5', 4, 2, '2014-08-29 12:50:15'),
(200, 42, '5', 5, 2, '2014-08-29 12:50:23'),
(201, 42, '5', 6, 2, '2014-08-29 12:50:30'),
(202, 42, '3', 1, 3, '2014-08-29 13:10:11'),
(203, 42, '2', 2, 3, '2014-08-29 13:23:01'),
(204, 42, '2', 3, 3, '2014-08-29 14:34:17'),
(205, 42, '2', 4, 3, '2014-08-29 16:20:02'),
(206, 42, '2', 5, 3, '2014-08-29 16:20:09'),
(207, 42, '2', 6, 3, '2014-08-29 16:20:18'),
(208, 42, '2', 1, 2, '2014-08-29 16:21:19'),
(209, 42, '2', 2, 2, '2014-08-29 16:21:26'),
(210, 42, '2', 3, 2, '2014-08-29 16:21:33'),
(211, 42, '2', 4, 2, '2014-08-29 16:21:40'),
(212, 42, '2', 5, 2, '2014-08-29 16:21:48'),
(213, 42, '2', 6, 2, '2014-08-29 16:21:56'),
(214, 42, '2', 1, 3, '2014-08-29 16:23:01'),
(215, 42, '2', 2, 3, '2014-08-29 16:23:09'),
(216, 42, '2', 3, 3, '2014-08-29 16:23:25'),
(217, 42, '2', 4, 3, '2014-08-29 16:23:28'),
(218, 42, '2', 5, 3, '2014-08-29 16:23:32'),
(219, 42, '2', 6, 3, '2014-08-29 16:23:37'),
(220, 42, '2', 1, 2, '2014-08-29 16:23:59'),
(221, 42, '2', 2, 2, '2014-08-29 16:24:03'),
(222, 42, '2', 3, 2, '2014-08-29 16:24:07'),
(223, 42, '2', 4, 2, '2014-08-29 16:24:17'),
(224, 42, '2', 5, 2, '2014-08-29 16:24:21'),
(225, 42, '2', 6, 2, '2014-08-29 16:24:27'),
(226, 42, '2', 6, 2, '2014-08-29 16:26:48'),
(227, 42, '2', 1, 3, '2014-08-29 16:26:55'),
(228, 42, '2', 2, 3, '2014-08-29 16:26:57'),
(229, 42, '2', 3, 3, '2014-08-29 16:27:00'),
(230, 42, '2', 4, 3, '2014-08-29 16:27:08'),
(231, 42, '2', 5, 3, '2014-08-29 16:27:10'),
(232, 42, '2', 6, 3, '2014-08-29 16:27:15'),
(233, 42, '2', 1, 2, '2014-08-29 16:30:11'),
(234, 42, '2', 2, 2, '2014-08-29 16:30:14'),
(235, 42, '2', 3, 2, '2014-08-29 16:30:18'),
(236, 42, '2', 4, 2, '2014-08-29 16:30:26'),
(237, 42, '2', 5, 2, '2014-08-29 16:30:29'),
(238, 42, '2', 6, 2, '2014-08-29 16:30:35'),
(239, 42, '2', 1, 3, '2014-08-29 16:30:45'),
(240, 42, '2', 2, 3, '2014-08-29 16:30:48'),
(241, 42, '2', 3, 3, '2014-08-29 16:30:54'),
(242, 42, '2', 4, 3, '2014-08-29 16:30:57'),
(243, 42, '2', 5, 3, '2014-08-29 16:31:00'),
(244, 42, '2', 6, 3, '2014-08-29 16:31:04'),
(245, 42, '5', 1, 2, '2014-08-29 16:31:30'),
(246, 42, '5', 2, 2, '2014-08-29 16:31:34'),
(247, 42, '5', 3, 2, '2014-08-29 16:31:37'),
(248, 42, '5', 4, 2, '2014-08-29 16:31:40'),
(249, 42, '5', 5, 2, '2014-08-29 16:31:43'),
(250, 42, '5', 6, 2, '2014-08-29 16:31:51'),
(251, 42, '2', 1, 3, '2014-08-29 16:35:33'),
(252, 42, '2', 2, 3, '2014-08-29 16:35:36'),
(253, 42, '2', 3, 3, '2014-08-29 16:35:39'),
(254, 42, '2', 4, 3, '2014-08-29 16:35:44'),
(255, 42, '2', 5, 3, '2014-08-29 16:35:48'),
(256, 42, '2', 6, 3, '2014-08-29 16:35:51'),
(257, 42, '5', 1, 2, '2014-08-29 16:36:45'),
(258, 42, '5', 2, 2, '2014-08-29 16:36:49'),
(259, 42, '5', 3, 2, '2014-08-29 16:36:52'),
(260, 42, '5', 4, 2, '2014-08-29 16:36:58'),
(261, 42, '5', 5, 2, '2014-08-29 16:37:41'),
(262, 42, '5', 6, 2, '2014-08-29 16:37:43'),
(263, 42, '2', 1, 3, '2014-08-29 16:38:06'),
(264, 42, '2', 2, 3, '2014-08-29 16:38:11'),
(265, 42, '2', 3, 3, '2014-08-29 16:38:15'),
(266, 42, '2', 4, 3, '2014-08-29 16:38:17'),
(267, 42, '2', 5, 3, '2014-08-29 16:38:20'),
(268, 42, '2', 6, 3, '2014-08-29 16:38:24'),
(269, 42, '5', 1, 2, '2014-08-29 16:40:17'),
(270, 42, '5', 2, 2, '2014-08-29 16:40:23'),
(271, 42, '5', 3, 2, '2014-08-29 16:40:29'),
(272, 42, '5', 4, 2, '2014-08-29 16:40:34'),
(273, 42, '5', 5, 2, '2014-08-29 16:40:38'),
(274, 42, '5', 6, 2, '2014-08-29 16:40:41'),
(275, 42, '5', 6, 2, '2014-08-29 16:42:45'),
(276, 42, '5', 6, 2, '2014-08-29 16:43:03'),
(277, 42, '5', 6, 2, '2014-08-29 16:43:18'),
(278, 42, '5', 1, 2, '2014-08-29 16:44:18'),
(279, 42, '5', 2, 2, '2014-08-29 16:44:25'),
(280, 42, '5', 3, 2, '2014-08-29 16:44:32'),
(281, 42, '5', 4, 2, '2014-08-29 16:44:40'),
(282, 42, '5', 5, 2, '2014-08-29 16:44:48'),
(283, 42, '5', 6, 2, '2014-08-29 16:44:55'),
(284, 42, '2', 1, 2, '2014-08-29 16:45:40'),
(285, 42, '2', 2, 2, '2014-08-29 16:45:46'),
(286, 42, '2', 3, 2, '2014-08-29 16:45:53'),
(287, 42, '2', 4, 2, '2014-08-29 16:46:00'),
(288, 42, '2', 5, 2, '2014-08-29 16:46:08'),
(289, 42, '2', 6, 2, '2014-08-29 16:46:16'),
(290, 42, '1', 1, 3, '2014-08-29 16:46:27'),
(291, 42, '1', 2, 3, '2014-08-29 16:46:34'),
(292, 42, '1', 3, 3, '2014-08-29 16:46:42'),
(293, 42, '1', 4, 3, '2014-08-29 16:46:48'),
(294, 42, '1', 5, 3, '2014-08-29 16:46:54'),
(295, 42, '1', 6, 3, '2014-08-29 16:47:01'),
(296, 38, '5', 6, 2, '2014-08-29 19:14:59'),
(297, 38, '5', 1, 2, '2014-08-29 19:15:48'),
(298, 38, '5', 2, 2, '2014-08-29 19:16:05'),
(299, 38, '5', 3, 2, '2014-08-29 19:16:11'),
(300, 38, '5', 4, 2, '2014-08-29 19:16:17'),
(301, 38, '5', 5, 2, '2014-08-29 19:16:26'),
(302, 38, '5', 6, 2, '2014-08-29 19:16:32'),
(303, 38, '5', 1, 2, '2014-08-29 19:17:23'),
(304, 38, '5', 2, 2, '2014-08-29 19:17:28'),
(305, 38, '5', 3, 2, '2014-08-29 19:17:33'),
(306, 38, '5', 4, 2, '2014-08-29 19:17:37'),
(307, 38, '5', 5, 2, '2014-08-29 19:17:44'),
(308, 38, '5', 6, 2, '2014-08-29 19:17:49'),
(309, 38, '2', 1, 2, '2014-08-29 19:18:19'),
(310, 38, '2', 2, 2, '2014-08-29 19:18:24'),
(311, 38, '2', 3, 2, '2014-08-29 19:18:29'),
(312, 38, '5', 4, 2, '2014-08-29 19:18:38'),
(313, 38, '4', 5, 2, '2014-08-29 19:18:47'),
(314, 38, '3', 6, 2, '2014-08-29 19:18:57'),
(315, 38, '2', 1, 3, '2014-08-29 19:19:08'),
(316, 38, '2', 2, 3, '2014-08-29 19:19:12'),
(317, 38, '2', 3, 3, '2014-08-29 19:19:17'),
(318, 38, '2', 4, 3, '2014-08-29 19:19:21'),
(319, 38, '2', 5, 3, '2014-08-29 19:19:25'),
(320, 38, '2', 6, 3, '2014-08-29 19:19:29');

-- --------------------------------------------------------

--
-- Table structure for table `survey_question_options`
--

DROP TABLE IF EXISTS `survey_question_options`;
CREATE TABLE IF NOT EXISTS `survey_question_options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `survey_question_id` int(11) NOT NULL,
  `option_text` varchar(500) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `survey_question_id` (`survey_question_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `survey_question_options`
--

INSERT INTO `survey_question_options` (`id`, `survey_question_id`, `option_text`) VALUES
(1, 1, 'Maize'),
(2, 1, 'Beans'),
(3, 1, 'Wheat'),
(4, 2, 'Cows'),
(5, 2, 'Goats'),
(6, 2, 'Sheep'),
(7, 0, 'Excellent'),
(8, 0, 'Very Good'),
(9, 0, 'Good'),
(10, 0, 'Fair'),
(11, 0, 'Poor');

-- --------------------------------------------------------

--
-- Table structure for table `systemmessages`
--

DROP TABLE IF EXISTS `systemmessages`;
CREATE TABLE IF NOT EXISTS `systemmessages` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `message` text NOT NULL,
  `datecreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sentcount` int(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `role` int(3) NOT NULL,
  `organization_id` int(100) NOT NULL,
  `names` varchar(50) NOT NULL,
  `gender` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phoneno` varchar(50) NOT NULL,
  `national_id` int(11) NOT NULL,
  `lang` varchar(11) NOT NULL,
  `dateregistered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `registeredby` int(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `passwordrst` varchar(100) NOT NULL,
  `deleted` int(1) NOT NULL DEFAULT '0',
  `deletedby` int(100) DEFAULT NULL,
  `datedeleted` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `session` int(11) NOT NULL DEFAULT '0',
  `progress` int(11) NOT NULL DEFAULT '0',
  `survey_id` int(11) NOT NULL DEFAULT '0',
  `step` int(11) NOT NULL DEFAULT '0',
  `menu_item_id` int(11) NOT NULL,
  `confirm_from` int(11) NOT NULL,
  `points` int(11) NOT NULL DEFAULT '0',
  `sessionID` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `organization_id`, `names`, `gender`, `email`, `phoneno`, `national_id`, `lang`, `dateregistered`, `registeredby`, `password`, `passwordrst`, `deleted`, `deletedby`, `datedeleted`, `session`, `progress`, `survey_id`, `step`, `menu_item_id`, `confirm_from`, `points`, `sessionID`) VALUES
(7, 101, 1, 'Felix Kimaru', 0, 'kimflex34@googlemail.com', '2147483647', 0, '', '2014-08-17 20:40:04', 1, '78e8e7b6d16c2af422b98b854712491a', '01936a35e0805ac9edee565128ba6ded', 0, NULL, '0000-00-00 00:00:00', 0, 0, 0, 0, 0, 0, 0, 0),
(8, 101, 1, 'Acild Staff', 0, 'admin@acild.org', '720264382', 0, '', '2014-08-18 12:28:46', 1, '926e25d4e904b2201c4e37ad0ea52026', 'f2f0f4e23ce1a1759a79cc288ffdb607', 0, NULL, '0000-00-00 00:00:00', 0, 0, 0, 0, 0, 0, 0, 0),
(24, 0, 0, '', 0, '', '1245566437', 0, '', '2014-08-27 09:51:36', 0, '', '', 0, NULL, '0000-00-00 00:00:00', 3, 3, 2, 1, 1, 0, 0, 0),
(25, 0, 0, '', 0, '', '12345', 0, '', '2014-08-27 10:32:40', 0, '', '', 0, NULL, '0000-00-00 00:00:00', 3, 6, 2, 1, 1, 0, 0, 0),
(28, 0, 0, '', 0, '', '12345890', 0, '', '2014-08-27 10:40:50', 0, '', '', 0, NULL, '0000-00-00 00:00:00', 3, 3, 2, 1, 1, 0, 0, 0),
(30, 0, 0, '', 0, '', '162345890', 0, '', '2014-08-27 10:43:45', 0, '', '', 0, NULL, '0000-00-00 00:00:00', 1, 0, 0, 1, 1, 0, 0, 0),
(38, 0, 0, '', 0, '', '254728355429', 0, '', '2014-08-29 08:24:39', 0, '', '', 0, NULL, '0000-00-00 00:00:00', 0, 0, 0, 0, 0, 2, 854, 115062),
(40, 0, 0, '', 0, '', '2547233841446', 0, '', '2014-08-29 12:25:21', 0, '', '', 0, NULL, '0000-00-00 00:00:00', 3, -1, 0, 1, 1, 0, 0, 0),
(42, 0, 0, '', 0, '', '254723384144', 0, '', '2014-08-29 12:29:11', 0, '', '', 0, NULL, '0000-00-00 00:00:00', 0, 0, 0, 0, 0, 0, 0, 5213755),
(43, 0, 0, '122', 1, '', '455', 2014, '1', '2014-08-30 18:04:58', 0, '', '', 0, NULL, '0000-00-00 00:00:00', 0, 0, 0, 0, 0, 0, 0, 0),
(44, 0, 0, '122', 1, '', '455', 2014, '1', '2014-08-30 18:05:12', 0, '', '', 0, NULL, '0000-00-00 00:00:00', 0, 0, 0, 0, 0, 0, 0, 0),
(45, 0, 0, '122', 1, '', '455', 2014, '1', '2014-08-30 18:32:37', 0, '', '', 0, NULL, '0000-00-00 00:00:00', 0, 0, 0, 0, 0, 0, 0, 0),
(46, 0, 0, 'Nnnn Nn', 1, '', '0728355429', 875255, '1', '2014-08-30 18:34:00', 0, '', '', 0, NULL, '0000-00-00 00:00:00', 0, 0, 0, 0, 0, 0, 0, 0),
(47, 0, 0, 'Nnnn Nn', 1, '', '073', 255, '1', '2014-08-30 18:48:15', 0, '', '', 0, NULL, '0000-00-00 00:00:00', 0, 0, 0, 0, 0, 0, 0, 0),
(48, 0, 0, 'Nnnnn', 1, '', '0728355429', 27151131, '1', '2014-08-30 19:08:22', 0, '', '', 0, NULL, '0000-00-00 00:00:00', 0, 0, 0, 0, 0, 0, 854, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_ussd_response`
--

DROP TABLE IF EXISTS `user_ussd_response`;
CREATE TABLE IF NOT EXISTS `user_ussd_response` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `step` int(11) NOT NULL,
  `response` varchar(50) NOT NULL,
  `confirmed` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=335 ;

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
(163, 19, 2, 5, '2asdf', 0),
(164, 13, 4, 1, '1', 0),
(165, 13, 4, 1, '1', 0),
(166, 13, 4, 2, 'leonard korir', 0),
(167, 13, 4, 3, 'leonard korir', 0),
(168, 13, 4, 4, '234', 0),
(169, 13, 4, 5, '234', 0),
(170, 13, 4, 5, '234', 0),
(171, 13, 4, 1, '1', 0),
(172, 13, 4, 2, '1', 0),
(173, 13, 4, 3, '1', 0),
(174, 13, 4, 4, '1', 0),
(175, 13, 4, 5, '1', 0),
(176, 13, 2, 1, '2', 0),
(177, 13, 2, 2, '2', 0),
(178, 13, 2, 3, '2', 0),
(179, 13, 2, 4, '2', 0),
(180, 13, 2, 5, '2', 0),
(181, 13, 2, 1, '2', 0),
(182, 13, 2, 2, '2', 0),
(183, 13, 2, 3, '2', 0),
(184, 13, 2, 4, '2', 0),
(185, 13, 2, 5, '2', 0),
(186, 13, 4, 1, '1', 0),
(187, 13, 4, 1, '1', 0),
(188, 13, 4, 2, 'leonard korir', 0),
(189, 13, 4, 3, 'leonard korir', 0),
(190, 13, 4, 3, 'leonard korir', 0),
(191, 13, 4, 4, '1', 0),
(192, 13, 4, 5, '1', 0),
(193, 13, 4, 1, '1', 0),
(194, 13, 4, 2, '1', 0),
(195, 13, 4, 3, '1', 0),
(196, 13, 4, 4, '1', 0),
(197, 13, 4, 5, '1', 0),
(198, 13, 4, 1, '1', 0),
(199, 13, 4, 2, '1', 0),
(200, 13, 4, 3, '1', 0),
(201, 13, 4, 4, '1', 0),
(202, 13, 4, 5, '1', 0),
(203, 13, 4, 1, '1', 0),
(204, 13, 4, 2, '1', 0),
(205, 13, 4, 3, '1', 0),
(206, 13, 4, 4, '1', 0),
(207, 13, 4, 5, '1', 0),
(208, 13, 4, 1, '1', 0),
(209, 13, 4, 2, '1', 0),
(210, 13, 4, 3, '1', 0),
(211, 13, 4, 4, '1', 0),
(212, 13, 4, 5, '1', 0),
(213, 13, 4, 1, '1', 0),
(214, 13, 4, 2, '1', 0),
(215, 13, 4, 3, '1', 0),
(216, 13, 4, 4, '1', 0),
(217, 13, 4, 5, '1', 0),
(218, 13, 4, 1, '1', 0),
(219, 13, 4, 2, '1', 0),
(220, 13, 4, 3, '1', 0),
(221, 13, 4, 4, '1', 0),
(222, 13, 4, 5, '1', 0),
(223, 13, 4, 1, '1', 0),
(224, 13, 4, 2, '1', 0),
(225, 13, 4, 3, '1', 0),
(226, 13, 4, 4, '1', 0),
(227, 13, 4, 5, '1', 0),
(228, 17, 4, 1, '566', 0),
(229, 17, 4, 2, '5566', 0),
(230, 18, 4, 1, 'lawrence', 0),
(231, 18, 4, 2, '13345', 0),
(232, 18, 4, 3, '56773', 0),
(233, 18, 4, 4, '1', 0),
(234, 18, 4, 5, '1', 0),
(235, 20, 4, 1, 'henry', 0),
(236, 20, 4, 2, '0729246959', 0),
(237, 20, 4, 3, '27796110', 0),
(238, 20, 4, 4, '1', 0),
(239, 20, 4, 5, '2', 0),
(240, 9, 4, 1, 'leonard korir', 0),
(241, 9, 4, 2, 'leonard korir', 0),
(242, 9, 4, 3, 'leonard korir', 0),
(243, 9, 4, 4, 'leonard korir', 0),
(244, 9, 4, 5, '1', 0),
(245, 9, 4, 5, '1', 0),
(246, 9, 4, 5, '1456', 0),
(247, 9, 4, 5, '1456', 0),
(248, 9, 4, 5, '1456', 0),
(249, 9, 4, 5, '1456', 0),
(250, 9, 4, 5, '1456', 0),
(251, 9, 4, 5, '1456', 0),
(252, 9, 4, 5, '1456', 0),
(253, 9, 4, 5, '1456', 0),
(254, 9, 4, 5, '1456', 0),
(255, 9, 4, 5, '1456', 0),
(256, 9, 4, 5, '1456', 0),
(257, 9, 4, 5, '1456', 0),
(258, 9, 4, 5, '1456', 0),
(259, 9, 4, 5, '1456', 0),
(260, 9, 4, 5, '1456', 0),
(261, 10, 4, 1, '1', 0),
(262, 10, 4, 1, '1', 0),
(263, 10, 4, 2, '1', 0),
(264, 10, 4, 2, '1', 0),
(265, 10, 4, 3, 'leonard korir', 0),
(266, 10, 4, 4, 'leonard korir', 0),
(267, 10, 4, 4, 'leonard korir', 0),
(268, 10, 4, 5, '1', 0),
(269, 10, 4, 1, 'a', 0),
(270, 10, 4, 2, 'a', 0),
(271, 10, 4, 3, 'a', 0),
(272, 10, 4, 4, 'a', 0),
(273, 10, 4, 5, 'a', 0),
(274, 11, 4, 1, '1', 0),
(275, 11, 4, 2, '1', 0),
(276, 11, 4, 3, '1', 0),
(277, 11, 4, 4, '1', 0),
(278, 11, 4, 5, '1', 0),
(279, 23, 4, 1, 'start', 0),
(280, 23, 4, 2, 'start', 0),
(281, 23, 4, 3, '123', 0),
(282, 23, 4, 4, '1', 0),
(283, 23, 4, 5, '1', 0),
(284, 23, 4, 1, '252', 0),
(285, 23, 4, 2, '2556', 0),
(286, 23, 4, 3, '258', 0),
(287, 23, 4, 4, '2', 0),
(288, 23, 4, 5, '1', 0),
(289, 23, 4, 1, 'start', 0),
(290, 23, 4, 2, '2566', 0),
(291, 23, 4, 3, '255633', 0),
(292, 23, 4, 4, '1', 0),
(293, 23, 4, 5, '1', 0),
(294, 26, 2, 1, 'start', 0),
(295, 33, 2, 1, '25677', 0),
(296, 33, 2, 2, 'fert', 0),
(297, 33, 2, 3, 'dfg', 0),
(298, 33, 2, 4, '2999', 0),
(299, 30, 2, 1, '2sdf', 0),
(300, 30, 2, 2, '2sdf', 0),
(301, 30, 2, 3, '2sdf', 0),
(302, 30, 2, 4, '2sdf', 0),
(303, 34, 2, 1, '123', 0),
(304, 34, 2, 2, 'food', 0),
(305, 34, 2, 3, '8', 0),
(306, 34, 2, 4, '1900', 0),
(307, 35, 2, 1, '2', 0),
(308, 35, 2, 2, '2', 0),
(309, 35, 2, 3, '2', 0),
(310, 35, 2, 4, '2', 0),
(311, 38, 4, 1, '122', 0),
(312, 38, 4, 2, '455', 0),
(313, 38, 4, 3, '2014#', 0),
(314, 38, 4, 4, '1', 0),
(315, 38, 4, 5, '1', 0),
(316, 38, 4, 1, 'nnnn nn', 0),
(317, 38, 4, 2, '0728355429', 0),
(318, 38, 4, 3, '875255', 0),
(319, 38, 4, 4, '1', 0),
(320, 38, 4, 5, '1', 0),
(321, 38, 4, 1, 'nnnn nn', 0),
(322, 38, 4, 2, '073', 0),
(323, 38, 4, 3, '255', 0),
(324, 38, 4, 4, '1', 0),
(325, 38, 4, 5, '1', 0),
(326, 38, 4, 1, 'nnnnn', 0),
(327, 38, 4, 2, '0728355429', 0),
(328, 38, 4, 3, '27151131', 0),
(329, 38, 4, 4, '1', 0),
(330, 38, 4, 5, '1', 0),
(331, 38, 2, 1, '27151131', 0),
(332, 38, 2, 2, '8455', 0),
(333, 38, 2, 3, '8855', 0),
(334, 38, 2, 4, '8536', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ussdPOSQuestions`
--

DROP TABLE IF EXISTS `ussdPOSQuestions`;
CREATE TABLE IF NOT EXISTS `ussdPOSQuestions` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `progress` int(4) NOT NULL,
  `question` text NOT NULL,
  `dateentered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ussdRegQuestions`
--

DROP TABLE IF EXISTS `ussdRegQuestions`;
CREATE TABLE IF NOT EXISTS `ussdRegQuestions` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `progress` int(4) NOT NULL,
  `question` text NOT NULL,
  `dateentered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
