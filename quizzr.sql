-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2016 at 04:54 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `quizzr`
--

-- --------------------------------------------------------

--
-- Table structure for table `correct`
--

CREATE TABLE IF NOT EXISTS `correct` (
  `no` int(2) NOT NULL AUTO_INCREMENT,
  `path` varchar(100) DEFAULT NULL,
  UNIQUE KEY `no` (`no`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `correct`
--

INSERT INTO `correct` (`no`, `path`) VALUES
(1, 'imgs/2.jpg'),
(2, 'imgs/3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `downloads`
--

CREATE TABLE IF NOT EXISTS `downloads` (
  `name` varchar(20) DEFAULT NULL,
  `count` int(5) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `downloads`
--

INSERT INTO `downloads` (`name`, `count`) VALUES
('Downloads', 195);

-- --------------------------------------------------------

--
-- Table structure for table `selecaccesslogs`
--

CREATE TABLE IF NOT EXISTS `selecaccesslogs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` bigint(200) NOT NULL,
  `ip` varchar(20) DEFAULT NULL,
  `user` varchar(200) DEFAULT NULL,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=533 ;

--
-- Dumping data for table `selecaccesslogs`
--



-- --------------------------------------------------------

--
-- Table structure for table `selecactiveusers`
--

CREATE TABLE IF NOT EXISTS `selecactiveusers` (
  `uid` bigint(200) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `selecactiveusers`
--


-- --------------------------------------------------------

--
-- Table structure for table `selecanslogs`
--

CREATE TABLE IF NOT EXISTS `selecanslogs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` bigint(200) NOT NULL,
  `user` varchar(200) DEFAULT NULL,
  `val` varchar(2000) DEFAULT NULL,
  `qno` int(11) DEFAULT NULL,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35904 ;

--
-- Dumping data for table `selecanslogs`
--


-- --------------------------------------------------------

--
-- Table structure for table `selecquestion`
--

CREATE TABLE IF NOT EXISTS `selecquestion` (
  `no` int(20) NOT NULL,
  `contents` varchar(1000) NOT NULL,
  `answer` varchar(100) NOT NULL,
  `qtype` int(5) NOT NULL,
  `atype` varchar(15) NOT NULL DEFAULT 'single',
  PRIMARY KEY (`no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `selecquestion`
--

INSERT INTO `selecquestion` (`no`, `contents`, `answer`, `qtype`, `atype`) VALUES
(1, '<h3>Jimmy Wales is the founder of ------ ?</h3><input type=''text'' name=''answer1''>', 'wikipedia', 1, 'single'),
(2, '<h3>First player to score a double century in ODI Cricket</h3><input type=''radio'' name=''answer2''value=''Adam Gilchrist''>Adam Gilchrist</input><br><input type=''radio'' name=''answer2''value=''Sachin Tendulkar''>Sachin Tendulkar</input><br><input type=''radio'' name=''answer2''value=''Chris Gayle''>Chris Gayle</input><br><input type=''radio'' name=''answer2''value=''Rohith Sharma''>Rohith Sharma</input><br>', 'Sachin Tendulkar', 1, 'multiple'),
(3, '<h3>Identify this application</h3><img src=''http://localhost/ques/q5.jpg'' id=''iq''><br><br><input type=''text'' name=''answer3''>', 'snapchat', 3, 'single');

-- --------------------------------------------------------

--
-- Table structure for table `selecsettings`
--

CREATE TABLE IF NOT EXISTS `selecsettings` (
  `key` varchar(120) NOT NULL,
  `val` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `selecsettings`
--

INSERT INTO `selecsettings` (`key`, `val`) VALUES
('fbappid', 'xxxxxxxxxxxxx'),
('fbappsct', 'xxxxxxxxxxxxx'),
('fbloginimg', 'facebook-login.png'),
('fblogin_enabled', '0'),
('fbmodloc', 'index.php'),
('loginmodloc', 'index.php'),
('login_fail_msg', 'Invalid username and password!'),
('login_redirect_to', 'index.php'),
('password', 'password'),
('quesmodloc', 'index.php'),
('ques_div_cls', 'question'),
('uname', 'admin'),
('wrongdisp_type', 'rand');

-- --------------------------------------------------------

--
-- Table structure for table `selecusers`
--

CREATE TABLE IF NOT EXISTS `selecusers` (
  `uid` int(25) NOT NULL AUTO_INCREMENT,
  `fbuid` bigint(200) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `score` int(20) NOT NULL DEFAULT '0',
  `password` varchar(100) DEFAULT NULL,
  `passtime` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `mob` varchar(20) DEFAULT NULL,
  `college` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `role` int(11) DEFAULT '1',
  PRIMARY KEY (`uid`),
  UNIQUE KEY `id` (`fbuid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=727 ;

--
-- Dumping data for table `selecusers`
--


-- --------------------------------------------------------

--
-- Table structure for table `surveyaccesslogs`
--

CREATE TABLE IF NOT EXISTS `surveyaccesslogs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` bigint(200) NOT NULL,
  `ip` varchar(20) DEFAULT NULL,
  `user` varchar(200) DEFAULT NULL,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=541 ;

--
-- Dumping data for table `surveyaccesslogs`
--



-- --------------------------------------------------------

--
-- Table structure for table `surveyactiveusers`
--

CREATE TABLE IF NOT EXISTS `surveyactiveusers` (
  `uid` bigint(200) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surveyactiveusers`
--

INSERT INTO `surveyactiveusers` (`uid`, `name`) VALUES
(22, 'Jebin Sunny'),
(10, '');

-- --------------------------------------------------------

--
-- Table structure for table `surveyanslogs`
--

CREATE TABLE IF NOT EXISTS `surveyanslogs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` bigint(200) NOT NULL,
  `user` varchar(200) DEFAULT NULL,
  `val` varchar(2000) DEFAULT NULL,
  `qno` int(11) DEFAULT NULL,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35854 ;

--
-- Dumping data for table `surveyanslogs`
--


-- --------------------------------------------------------

--
-- Table structure for table `surveyquestion`
--

CREATE TABLE IF NOT EXISTS `surveyquestion` (
  `no` int(20) NOT NULL,
  `contents` varchar(1000) NOT NULL,
  `qtype` int(5) NOT NULL,
  `atype` varchar(15) NOT NULL DEFAULT 'single',
  PRIMARY KEY (`no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surveyquestion`
--


-- --------------------------------------------------------

--
-- Table structure for table `surveysettings`
--

CREATE TABLE IF NOT EXISTS `surveysettings` (
  `key` varchar(120) NOT NULL,
  `val` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surveysettings`
--

INSERT INTO `surveysettings` (`key`, `val`) VALUES
('fbappid', 'xxxxxxxxxxxxx'),
('fbappsct', 'xxxxxxxxxxxxx'),
('fbloginimg', 'facebook-login.png'),
('fblogin_enabled', ''),
('fbmodloc', 'index.php'),
('loginmodloc', 'index.php'),
('login_fail_msg', 'Invalid username and password!'),
('login_redirect_to', 'index.php'),
('password', 'password'),
('quesmodloc', 'index.php'),
('ques_div_cls', 'question'),
('uname', 'admin'),
('wrongdisp_type', 'rand');

-- --------------------------------------------------------

--
-- Table structure for table `surveyusers`
--

CREATE TABLE IF NOT EXISTS `surveyusers` (
  `uid` int(25) NOT NULL AUTO_INCREMENT,
  `fbuid` bigint(200) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `passtime` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `mob` varchar(20) DEFAULT NULL,
  `college` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `role` int(11) DEFAULT '1',
  PRIMARY KEY (`uid`),
  UNIQUE KEY `id` (`fbuid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=727 ;

--
-- Dumping data for table `surveyusers`
--


-- --------------------------------------------------------

--
-- Table structure for table `treasaccesslogs`
--

CREATE TABLE IF NOT EXISTS `treasaccesslogs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` bigint(200) NOT NULL,
  `ip` varchar(20) DEFAULT NULL,
  `user` varchar(200) DEFAULT NULL,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=536 ;

--
-- Dumping data for table `treasaccesslogs`
--


-- --------------------------------------------------------

--
-- Table structure for table `treasactiveusers`
--

CREATE TABLE IF NOT EXISTS `treasactiveusers` (
  `uid` bigint(200) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `treasactiveusers`
--



-- --------------------------------------------------------

--
-- Table structure for table `treasanslogs`
--

CREATE TABLE IF NOT EXISTS `treasanslogs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` bigint(200) NOT NULL,
  `user` varchar(200) DEFAULT NULL,
  `val` varchar(2000) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35695 ;

--
-- Dumping data for table `treasanslogs`
--




-- --------------------------------------------------------

--
-- Table structure for table `treasquestion`
--

CREATE TABLE IF NOT EXISTS `treasquestion` (
  `no` int(11) NOT NULL DEFAULT '1',
  `contents` varchar(1000) DEFAULT NULL,
  `answer` varchar(1000) DEFAULT NULL,
  `qtype` int(11) NOT NULL DEFAULT '1',
  `atype` varchar(12) NOT NULL DEFAULT 'single',
  PRIMARY KEY (`no`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `treasquestion`
--

INSERT INTO `treasquestion` (`no`, `contents`, `answer`, `qtype`, `atype`) VALUES
(6, '<h3>Identify the logo</h3><img src=''http://localhost/ques/word.png'' id=''iq''><br><br><form action=''checkanswer.php'' method=''post''><input type=''text'' name=''answer''><br><input type=''submit'' value=''submit''></form>', 'wordpress', 3, 'single'),
(3, '<img src=''http://localhost/ques/moz.png'' id=''iq''><br><br><form action=''checkanswer.php'' method=''post''><input type=''radio'' name=''answer''value=''Apple''>Apple</input><br><input type=''radio'' name=''answer''value=''Chrome''>Chrome</input><br><input type=''radio'' name=''answer''value=''Firefox''>Firefox</input><br><input type=''radio'' name=''answer''value=''Safari''>Safari</input><br><br><input type=''submit'' value=''Submit''></form>', 'Firefox', 2, 'multiple'),
(2, '<h3>To which famous character, this address belongs to ? </h3><img src=''http://localhost/ques/36589-221b-baker-street-1366x768-tv-show-wallpaper.jpg'' id=''iq''><br><br><form action=''checkanswer.php'' method=''post''><input type=''text'' name=''answer''><br><input type=''submit'' value=''submit''></form>', 'Sherlock Holmes', 3, 'single'),
(5, '<h3>Who is the Father of Internet</h3><form action=''checkanswer.php'' method=''post''><input type=''text'' name=''answer''><br><input type=''submit'' value=''submit''></form>', 'Vinton Cerf', 1, 'single'),
(4, '<h3>In which stories this character appears ?</h3><img src=''http://localhost/ques/images.jpg'' id=''iq''><br><br><form action=''checkanswer.php'' method=''post''><input type=''radio'' name=''answer''value=''Spiderman''>Spiderman</input><br><input type=''radio'' name=''answer''value=''Superman''>Superman</input><br><input type=''radio'' name=''answer''value=''Batman''>Batman</input><br><input type=''radio'' name=''answer''value=''Harry Potter''>Harry Potter</input><br><br><input type=''submit'' value=''Submit''></form>', 'Batman', 3, 'multiple'),
(1, '<h3>Value of pi is</h3><form action=''checkanswer.php'' method=''post''><input type=''radio'' name=''answer''value=''1.2''>1.2</input><br><input type=''radio'' name=''answer''value=''2.5''>2.5</input><br><input type=''radio'' name=''answer''value=''3.3''>3.3</input><br><input type=''radio'' name=''answer''value=''3.14''>3.14</input><br><br><input type=''submit'' value=''Submit''></form>', '3.14', 1, 'multiple');

-- --------------------------------------------------------

--
-- Table structure for table `treassettings`
--

CREATE TABLE IF NOT EXISTS `treassettings` (
  `key` varchar(120) NOT NULL,
  `val` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `treassettings`
--

INSERT INTO `treassettings` (`key`, `val`) VALUES
('fbappid', 'xxxxxxxxxxxxx'),
('fbappsct', 'xxxxxxxxxxxxx'),
('fbloginimg', 'facebook-login.png'),
('fblogin_enabled', '0'),
('fbmodloc', 'index.php'),
('loginmodloc', 'index.php'),
('login_fail_msg', 'Invalid username and password!'),
('login_redirect_to', 'index.php'),
('password', 'password'),
('quesmodloc', 'index.php'),
('ques_div_cls', 'question'),
('uname', 'admin'),
('wrongdisp_type', 'rand');

-- --------------------------------------------------------

--
-- Table structure for table `treasusers`
--

CREATE TABLE IF NOT EXISTS `treasusers` (
  `uid` int(25) NOT NULL AUTO_INCREMENT,
  `fbuid` bigint(200) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `level` int(11) DEFAULT '1',
  `password` varchar(100) DEFAULT NULL,
  `passtime` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `mob` varchar(20) DEFAULT NULL,
  `college` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `id` (`fbuid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=729 ;

--
-- Dumping data for table `treasusers`
--


-- --------------------------------------------------------

--
-- Table structure for table `wrong`
--

CREATE TABLE IF NOT EXISTS `wrong` (
  `no` int(2) NOT NULL AUTO_INCREMENT,
  `path` varchar(100) DEFAULT NULL,
  UNIQUE KEY `no` (`no`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `wrong`
--

INSERT INTO `wrong` (`no`, `path`) VALUES
(1, 'imgs/wrong/wr1.jpg'),
(2, 'imgs/wrong/wr2.jpg'),
(3, 'imgs/wrong/wr3.jpg'),
(4, 'imgs/wrong/wr4.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
