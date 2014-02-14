-- phpMyAdmin SQL Dump
-- version 3.4.10
-- http://www.phpmyadmin.net
--
-- Host: mysql
-- Generation Time: Feb 13, 2014 at 09:07 AM
-- Server version: 5.1.55
-- PHP Version: 5.3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sadiaDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_assignment`
--

CREATE TABLE IF NOT EXISTS `t_assignment` (
  `assignid` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(50) NOT NULL,
  `assignname` varchar(100) NOT NULL,
  `assigndesc` text NOT NULL,
  `gradetype` varchar(50) NOT NULL,
  `point` int(11) NOT NULL,
  `courseid` int(11) NOT NULL,
  `firstprogid` int(11) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `crudby` int(11) NOT NULL,
  `codeno` varchar(50) NOT NULL,
  `cruddate` date NOT NULL,
  PRIMARY KEY (`assignid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `t_assignment`
--

INSERT INTO `t_assignment` (`assignid`, `userid`, `assignname`, `assigndesc`, `gradetype`, `point`, `courseid`, `firstprogid`, `startdate`, `enddate`, `crudby`, `codeno`, `cruddate`) VALUES
(1, 5, 'create new', '<p>new Assignment</p>\r\n', 'Grade', 0, 1, 0, '2014-02-01', '2014-02-28', 0, '', '2014-02-01'),
(2, 5, 'upload any file', '<p>test assignment</p>\r\n', 'Point', 20, 1, 0, '2014-02-01', '2014-02-02', 0, '', '2014-02-01'),
(3, 11, 'upload any file for testing skill course', '<p>upoad any file just for checking</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>ontrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>\r\n', 'Point', 20, 2, 0, '2014-02-01', '2014-02-03', 0, '', '2014-02-01'),
(4, 5, 'assigment 23', '<p>upload any file</p>\r\n', 'Point', 100, 3, 0, '2014-02-03', '2014-02-05', 0, '', '2014-02-03'),
(5, 5, 'check assign attach', '<p>hello</p>\r\n', 'Point', 10, 3, 0, '2014-02-06', '2014-02-08', 0, '', '2014-02-05'),
(6, 5, 'test point assign', '<p>adfadfasdfadf</p>\r\n', 'Point', 1000, 3, 0, '2014-02-10', '2014-02-11', 0, '', '2014-02-10'),
(7, 5, 'PMP Test', '<p>Submit assignment of PMP</p>\r\n', '', 2, 1, 0, '2014-02-12', '2014-02-28', 0, '', '2014-02-12'),
(8, 5, 'new assing 12feb', '<p>new test asign</p>\r\n', '', 100, 0, 0, '2014-02-12', '2014-02-13', 0, '', '2014-02-12'),
(9, 5, 'new assing 12feb', '<p>new alka d; sldklf lsdfsdf</p>\r\n', '', 50, 3, 0, '2014-02-12', '2014-02-13', 0, '', '2014-02-12'),
(10, 5, 'test assign for new course', '<p>test assign upload any thing</p>\r\n', '', 80, 6, 0, '2014-02-12', '2014-02-13', 0, '', '2014-02-12'),
(11, 5, 'test assign 2 ', '<p>test course</p>\r\n', '', 80, 6, 0, '2014-02-12', '2014-02-13', 0, '', '2014-02-12'),
(12, 24, 'php fund assign 1', '<p>PHP Fundamenta assigment please uploaded any file</p>\r\n', '', 90, 8, 0, '2014-02-13', '2014-02-14', 0, '', '2014-02-13'),
(13, 24, 'php fund assign 2', '<p>php fundamental assigment 3</p>\r\n\r\n<p>Attach any file</p>\r\n', '', 90, 8, 0, '2014-02-13', '2014-02-14', 0, '', '2014-02-13');

-- --------------------------------------------------------

--
-- Table structure for table `t_assignsubm`
--

CREATE TABLE IF NOT EXISTS `t_assignsubm` (
  `userid` int(11) NOT NULL,
  `assignid` int(11) NOT NULL,
  `subid` int(11) NOT NULL AUTO_INCREMENT,
  `courseid` int(11) NOT NULL,
  `firstprogid` int(11) NOT NULL,
  `codeno` varchar(50) NOT NULL,
  `assignfile` varchar(50) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `cruddate` datetime NOT NULL,
  `crudby` varchar(50) NOT NULL,
  PRIMARY KEY (`subid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `t_assignsubm`
--

INSERT INTO `t_assignsubm` (`userid`, `assignid`, `subid`, `courseid`, `firstprogid`, `codeno`, `assignfile`, `comment`, `cruddate`, `crudby`) VALUES
(5, 2, 1, 1, 0, '', 'BillalPage-3.jpg', '', '2014-02-01 00:00:00', ''),
(11, 3, 2, 2, 0, '', 'ko-index.png', '', '2014-02-01 00:00:00', ''),
(5, 2, 3, 1, 0, 'STD-01', 'A1.pdf', '', '2014-02-02 00:00:00', '4'),
(5, 4, 4, 3, 0, 'STD-01', 'Kuwait-Towers-3.jpg', '', '2014-02-03 00:00:00', '4'),
(5, 5, 5, 3, 0, 'STD-01', 'Kuwait-Towers-3.jpg', '', '2014-02-05 00:00:00', '4'),
(5, 9, 6, 3, 0, 'STD-01', 'A2.pdf', '', '2014-02-12 00:00:00', '4'),
(5, 9, 7, 3, 0, 'STD-01', 'KO-4--Landing-Page.png', '', '2014-02-12 00:00:00', '4'),
(5, 10, 8, 6, 0, 'STD-01', 'KO-4--Landing-Page.png', '', '2014-02-12 00:00:00', '4'),
(5, 11, 9, 6, 0, 'STD-01', 'screenss.png', '', '2014-02-12 00:00:00', '4'),
(24, 12, 10, 8, 0, '213213', 'KO-4--Landing-Page.png', '', '2014-02-13 00:00:00', '23'),
(24, 13, 11, 8, 0, '213213', 'Web-Ecommerce2a.jpg', '', '2014-02-13 00:00:00', '23');

-- --------------------------------------------------------

--
-- Table structure for table `t_contact`
--

CREATE TABLE IF NOT EXISTS `t_contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `address` varchar(200) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `fax` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `crudby` varchar(50) NOT NULL,
  `cruddate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `t_contact`
--

INSERT INTO `t_contact` (`id`, `address`, `phone`, `fax`, `email`, `crudby`, `cruddate`) VALUES
(1, '11 Fifth Ave, Loftus - NEW JERSEY, US', '+ 61 (2) 8093 3400', '+61 (2) 9542 3599', 'submissions@domain.com', '3', '2014-01-21');

-- --------------------------------------------------------

--
-- Table structure for table `t_courses`
--

CREATE TABLE IF NOT EXISTS `t_courses` (
  `courseid` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(50) NOT NULL,
  `coursecode` varchar(10) NOT NULL,
  `coursename` varchar(100) NOT NULL,
  `coursedesc` text NOT NULL,
  `progid` int(11) NOT NULL,
  `firstprogid` int(11) NOT NULL,
  `coursepic` varchar(100) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `totalpoint` int(11) NOT NULL,
  `availpoint` int(11) NOT NULL,
  `crudby` int(11) NOT NULL,
  `cruddate` date NOT NULL,
  PRIMARY KEY (`courseid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `t_courses`
--

INSERT INTO `t_courses` (`courseid`, `userid`, `coursecode`, `coursename`, `coursedesc`, `progid`, `firstprogid`, `coursepic`, `startdate`, `enddate`, `totalpoint`, `availpoint`, `crudby`, `cruddate`) VALUES
(1, 5, '686', 'new test course', '<p>New test course</p>\r\n', 1, 1, '', '2014-02-01', '2014-02-10', 100, 0, 0, '2014-02-01'),
(2, 11, '13213', 'TESTING SOME SKILLS', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', 1, 1, '', '2014-02-01', '2014-02-04', 100, 0, 0, '2014-02-01'),
(3, 5, '32321', 'New test course 23', '<p>asdkfjlasjkdfa</p>\r\n\r\n<p>random text</p>\r\n', 1, 1, '', '2014-02-03', '2014-02-08', 100, 0, 0, '2014-02-03'),
(4, 5, 'COMM-02', 'COMMUNICATION', '<p>dsfsdfsfdsf</p>\r\n', 1, 1, '', '2014-02-12', '2014-02-28', 100, 0, 0, '2014-02-12'),
(5, 5, 'COMM-04', 'AddCourseForm', '<p>dsfdsfsdsdfsdf</p>\r\n', 1, 1, 'slide-3.jpg', '2014-02-12', '2014-02-28', 100, 0, 0, '2014-02-12'),
(6, 5, 'course12fe', 'cbt new test course 12 feb', '<p>test course</p>\r\n', 1, 1, '', '2014-02-12', '2014-02-13', 100, 0, 0, '2014-02-12'),
(7, 24, 'php101', 'PHP Fundamental', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', 4, 0, '', '2014-02-13', '2014-02-28', 100, 0, 0, '2014-02-12'),
(8, 24, 'php101', 'PHP Fundamentals', '<p>php fundametals course description.</p>\r\n', 1, 1, '', '2014-02-13', '2014-02-14', 100, 0, 0, '2014-02-13');

-- --------------------------------------------------------

--
-- Table structure for table `t_coursesapp`
--

CREATE TABLE IF NOT EXISTS `t_coursesapp` (
  `userid` int(11) NOT NULL,
  `courseid` int(11) NOT NULL,
  `appid` int(11) NOT NULL AUTO_INCREMENT,
  `progid` int(11) NOT NULL,
  `firstprogid` int(11) NOT NULL,
  `codeno` varchar(50) NOT NULL,
  `assignfile` varchar(50) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `cruddate` datetime NOT NULL,
  `crudby` varchar(50) NOT NULL,
  PRIMARY KEY (`appid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `t_coursesapp`
--

INSERT INTO `t_coursesapp` (`userid`, `courseid`, `appid`, `progid`, `firstprogid`, `codeno`, `assignfile`, `comment`, `cruddate`, `crudby`) VALUES
(4, 1, 1, 1, 1, '', '', '', '2014-02-01 00:00:00', ''),
(10, 2, 2, 1, 1, '', '', '', '2014-02-01 00:00:00', ''),
(4, 3, 3, 1, 1, '', '', '', '2014-02-03 00:00:00', ''),
(4, 5, 4, 1, 1, '', '', '', '2014-02-12 00:00:00', ''),
(4, 6, 5, 1, 1, '', '', '', '2014-02-12 00:00:00', ''),
(23, 8, 6, 1, 1, '', '', '', '2014-02-13 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `t_department`
--

CREATE TABLE IF NOT EXISTS `t_department` (
  `departid` int(11) NOT NULL AUTO_INCREMENT,
  `departname` varchar(100) NOT NULL,
  `cruddate` date NOT NULL,
  `crudby` varchar(50) NOT NULL,
  PRIMARY KEY (`departid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `t_department`
--

INSERT INTO `t_department` (`departid`, `departname`, `cruddate`, `crudby`) VALUES
(5, 'Geology', '2014-02-01', '6'),
(6, 'Astronomy', '2014-01-21', '3'),
(9, 'Test', '2014-02-02', '6'),
(10, 'Information Technology', '2014-02-12', '6');

-- --------------------------------------------------------

--
-- Table structure for table `t_firstprogram`
--

CREATE TABLE IF NOT EXISTS `t_firstprogram` (
  `progid` int(11) NOT NULL,
  `firstprogid` int(11) NOT NULL AUTO_INCREMENT,
  `firstprogname` varchar(100) NOT NULL,
  `cruddate` date NOT NULL,
  PRIMARY KEY (`firstprogid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `t_firstprogram`
--

INSERT INTO `t_firstprogram` (`progid`, `firstprogid`, `firstprogname`, `cruddate`) VALUES
(1, 1, 'All Schools', '0000-00-00'),
(2, 2, 'ABC ', '0000-00-00'),
(1, 5, 'ABC School', '2014-01-23'),
(4, 6, 'All School', '2014-01-23'),
(4, 7, 'All School', '2014-01-23'),
(3, 8, 'All School', '2014-01-23');

-- --------------------------------------------------------

--
-- Table structure for table `t_lesson`
--

CREATE TABLE IF NOT EXISTS `t_lesson` (
  `lessonid` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(50) NOT NULL,
  `lessonname` varchar(100) NOT NULL,
  `lessondesc` text NOT NULL,
  `lessonfile` varchar(50) NOT NULL,
  `courseid` int(11) NOT NULL,
  `firstprogid` int(11) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `crudby` int(11) NOT NULL,
  `cruddate` date NOT NULL,
  PRIMARY KEY (`lessonid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `t_lesson`
--

INSERT INTO `t_lesson` (`lessonid`, `userid`, `lessonname`, `lessondesc`, `lessonfile`, `courseid`, `firstprogid`, `startdate`, `enddate`, `crudby`, `cruddate`) VALUES
(1, 5, 'TESTING LESSONS', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci aspernatur blanditiis consequuntur, dolores enim facere iusto minus molestias natus perspiciatis possimus quaerat quam, quos reprehenderit sapiente tenetur voluptates. Quas, temporibus!', '', 3, 0, '0000-00-00', '0000-00-00', 0, '2014-02-10'),
(2, 5, 'testing lesson', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. At beatae consectetur cumque deserunt distinctio dolorum earum id illum impedit labore laudantium neque, nulla odit quidem quod ratione, repellendus reprehenderit repudiandae!', '', 3, 0, '0000-00-00', '0000-00-00', 0, '2014-02-10'),
(3, 5, 'Lesson PMP', 'Lesson One', '', 1, 0, '0000-00-00', '0000-00-00', 0, '2014-02-12');

-- --------------------------------------------------------

--
-- Table structure for table `t_news`
--

CREATE TABLE IF NOT EXISTS `t_news` (
  `newsid` int(11) NOT NULL AUTO_INCREMENT,
  `newscat` varchar(50) NOT NULL,
  `newstype` varchar(50) NOT NULL,
  `newstitle` varchar(100) NOT NULL,
  `news` text NOT NULL,
  `fromdate` date NOT NULL,
  `expirydate` date NOT NULL,
  `cruddate` date NOT NULL,
  `crudby` int(11) NOT NULL,
  PRIMARY KEY (`newsid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `t_news`
--

INSERT INTO `t_news` (`newsid`, `newscat`, `newstype`, `newstitle`, `news`, `fromdate`, `expirydate`, `cruddate`, `crudby`) VALUES
(1, 'General', 'Admission', 'Admission For New Session', '<p>Admission News</p>\r\n', '2014-01-23', '2014-01-31', '2014-01-23', 6),
(2, 'General', 'Admission', 'hello this is new test news', '<p>This is new test news</p>\r\n', '2014-01-28', '2014-01-30', '2014-01-28', 6),
(3, 'General', 'Admission', 'this is new test news', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus autem eius eum excepturi, id illo in inventore iste laborum magnam, minima natus perspiciatis, placeat quae quia quos tempore unde vel.</p>\r\n', '2014-02-01', '2014-02-04', '2014-02-01', 6);

-- --------------------------------------------------------

--
-- Table structure for table `t_program`
--

CREATE TABLE IF NOT EXISTS `t_program` (
  `progid` int(11) NOT NULL AUTO_INCREMENT,
  `progname` varchar(100) NOT NULL,
  `cruddate` date NOT NULL,
  `crudby` varchar(50) NOT NULL,
  PRIMARY KEY (`progid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `t_program`
--

INSERT INTO `t_program` (`progid`, `progname`, `cruddate`, `crudby`) VALUES
(1, 'Communcation', '0000-00-00', ''),
(2, 'Food & Nutrition', '0000-00-00', ''),
(3, 'English Language', '2014-01-23', '6'),
(4, 'Information Technology', '2014-01-23', '6');

-- --------------------------------------------------------

--
-- Table structure for table `t_quiz`
--

CREATE TABLE IF NOT EXISTS `t_quiz` (
  `quizid` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `quizname` varchar(50) NOT NULL,
  `gradetype` varchar(50) NOT NULL,
  `point` int(11) NOT NULL,
  `courseid` int(11) NOT NULL,
  `firstprogid` int(11) NOT NULL,
  `totaltime` varchar(50) NOT NULL,
  `totalquest` int(11) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `cruddate` date NOT NULL,
  `crudby` varchar(50) NOT NULL,
  PRIMARY KEY (`quizid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `t_quiz`
--

INSERT INTO `t_quiz` (`quizid`, `userid`, `quizname`, `gradetype`, `point`, `courseid`, `firstprogid`, `totaltime`, `totalquest`, `startdate`, `enddate`, `cruddate`, `crudby`) VALUES
(1, 5, 'new test quiz', 'Point', 100, 0, 0, '30', 10, '2014-02-01', '2014-02-04', '2014-02-01', ''),
(2, 5, 'Testing Communication skills', 'Point', 2, 1, 0, '10 min', 2, '2014-02-01', '2014-02-28', '2014-02-01', ''),
(3, 5, 'test quiz', '', 2000, 0, 0, '10', 1, '2014-02-10', '2014-02-11', '2014-02-10', ''),
(4, 11, 'Test Skill with quiz', 'Point', 20, 2, 0, '20', 2, '2014-02-01', '2014-02-02', '2014-02-01', ''),
(5, 5, 'quiz 23', 'Point', 20, 3, 0, '20', 2, '2014-02-03', '2014-02-05', '2014-02-03', ''),
(6, 5, 'Testing New Data', '', 2, 0, 0, '2', 2, '2014-02-12', '2014-02-28', '2014-02-12', ''),
(7, 5, 'pmp test paper', '', 1, 1, 0, '1', 1, '2014-02-12', '2014-02-28', '2014-02-12', ''),
(8, 5, '12febquiz', '', 80, 6, 0, '20', 1, '2014-02-12', '2014-02-12', '2014-02-12', ''),
(9, 5, 'test quiz 43', '', 10, 6, 0, '20', 2, '2014-02-12', '2014-02-13', '2014-02-12', ''),
(10, 24, 'php fundamentals ', '', 90, 8, 0, '20', 2, '2014-02-12', '2014-02-14', '2014-02-13', ''),
(11, 24, 'php fund quiz 2', '', 90, 8, 0, '20', 2, '2014-02-13', '2014-02-14', '2014-02-13', '');

-- --------------------------------------------------------

--
-- Table structure for table `t_quizans`
--

CREATE TABLE IF NOT EXISTS `t_quizans` (
  `quizid` int(11) NOT NULL,
  `quesno` int(11) NOT NULL,
  `ansid` int(11) NOT NULL AUTO_INCREMENT,
  `qanswer` varchar(10) NOT NULL,
  `answer` varchar(50) NOT NULL,
  `correct` varchar(10) NOT NULL,
  `userid` int(11) NOT NULL,
  `cruddate` date NOT NULL,
  `teacherid` int(11) NOT NULL,
  PRIMARY KEY (`ansid`),
  UNIQUE KEY `ansid` (`ansid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `t_quizans`
--

INSERT INTO `t_quizans` (`quizid`, `quesno`, `ansid`, `qanswer`, `answer`, `correct`, `userid`, `cruddate`, `teacherid`) VALUES
(2, 1, 1, 'B', 'B', 'Y', 4, '2014-02-01', 0),
(2, 2, 2, 'A', 'A', 'Y', 4, '2014-02-01', 0),
(3, 1, 3, 'C', 'C', 'Y', 4, '2014-02-01', 0),
(4, 1, 4, 'B', 'A', 'N', 10, '2014-02-01', 0),
(4, 2, 5, 'B', 'B', 'Y', 10, '2014-02-01', 0),
(5, 1, 6, 'A', 'A', 'Y', 4, '2014-02-03', 0),
(5, 2, 7, 'B', 'B', 'Y', 4, '2014-02-03', 0),
(7, 1, 8, 'B', 'B', 'Y', 4, '2014-02-12', 0),
(8, 1, 9, 'B', 'A', 'N', 4, '2014-02-12', 0),
(10, 1, 10, 'D', 'D', 'Y', 23, '2014-02-13', 0),
(10, 2, 11, 'A', 'A', 'Y', 23, '2014-02-13', 0),
(11, 1, 12, 'A', 'A', 'Y', 23, '2014-02-13', 0),
(11, 2, 13, 'A', 'A', 'Y', 23, '2014-02-13', 0);

-- --------------------------------------------------------

--
-- Table structure for table `t_quizques`
--

CREATE TABLE IF NOT EXISTS `t_quizques` (
  `quizid` int(11) NOT NULL,
  `quesno` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `question` varchar(500) NOT NULL,
  `optiona` varchar(200) NOT NULL,
  `optionb` varchar(200) NOT NULL,
  `optionc` varchar(200) NOT NULL,
  `optiond` varchar(200) NOT NULL,
  `answer` varchar(50) NOT NULL,
  `crudby` int(11) NOT NULL,
  `cruddate` date NOT NULL,
  PRIMARY KEY (`quizid`,`quesno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_quizques`
--

INSERT INTO `t_quizques` (`quizid`, `quesno`, `type`, `question`, `optiona`, `optionb`, `optionc`, `optiond`, `answer`, `crudby`, `cruddate`) VALUES
(1, 1, 'M', 'select a', 'i am a', 'i am b', 'i am c', 'i am d', 'A', 5, '2014-02-01'),
(1, 2, 'M', 'select b', 'i am a ', 'i am b', 'i am c', 'i am d', 'B', 5, '2014-02-01'),
(1, 3, 'M', 'select c', 'i am a', 'i am b', 'i am c', 'i am d', 'C', 5, '2014-02-01'),
(1, 4, 'M', 'select d', 'i am a', 'i am b', 'i am c', 'i am d', 'D', 5, '2014-02-01'),
(1, 5, 'M', 'i am a', 'i am a', 'i am b', 'i am c', 'i am d', 'B', 5, '2014-02-01'),
(1, 6, 'M', 'select b', 'i am a', 'i am b', 'i am c', 'i am d', 'B', 5, '2014-02-01'),
(1, 7, 'M', 'i am a', 'i am a', 'i am b', 'i am c', 'i am d', 'D', 5, '2014-02-01'),
(1, 8, 'M', 'select c', 'i am a', 'i am b', 'i am c', 'i am d', 'C', 5, '2014-02-01'),
(1, 9, 'M', 'please choose a for correct ans.', 'i am a', 'i am b', 'i am c', 'i am d', 'A', 5, '2014-02-01'),
(1, 10, 'M', 'b is right', 'i am a', 'i am b', 'i am c', 'i am d', 'B', 5, '2014-02-01'),
(2, 1, 'M', 'what is the cheapest method of communication', 'skype', 'whatsapp', 'viber', 'abc', 'B', 5, '2014-02-01'),
(2, 2, 'M', 'what is the costly method of communication?', 'internet', 'card', 'card a', 'card b', 'A', 5, '2014-02-01'),
(3, 1, 'M', 'c is correct answer', 'i am a', 'i am b', 'i am c', 'i am d', 'C', 5, '2014-02-01'),
(4, 1, 'M', 'name the second alphabet in english', 'i am a', 'i am b', 'i am c', 'i am d', 'A', 11, '2014-02-01'),
(4, 2, 'M', 'name second alphabet in english', 'i am a', 'i am b', 'i am c', 'i am d', 'B', 11, '2014-02-01'),
(5, 1, 'M', 'what is a ', 'i am a', 'i am b', 'i am c', 'i am d', 'A', 5, '2014-02-03'),
(5, 2, 'M', 'what is b', 'i am a', 'i am b', 'i am c', 'i am d', 'B', 5, '2014-02-03'),
(7, 1, 'M', 'what theory u like as Mcgregoy theory?', 'theory X', 'theory Y', 'theory z', 'theory A', 'B', 5, '2014-02-12'),
(8, 1, 'M', 'select any thing', 'a', 'b', 'c', 'd', 'A', 5, '2014-02-12'),
(9, 1, 'M', 'what is hex for black', '21321', '321321', '3213', '000', 'D', 5, '2014-02-12'),
(9, 2, 'M', 'fja;sldkf;laksdf', 'adfadf', 'asdfadfasdf', 'asdfasdfas', 'dfasdfasdf', 'A', 5, '2014-02-12'),
(10, 1, 'M', 'what is hex color value for white', '132132', '21321', '2132132', 'fff', 'D', 24, '2014-02-13'),
(10, 2, 'M', 'correct hex color value for black', '000', '1132', '21321', '213', 'A', 24, '2014-02-13'),
(11, 1, 'M', 'what symbol is used to define variable in php?', '$', '@', '%', '#', 'A', 24, '2014-02-13'),
(11, 2, 'M', 'what symbol is used to end the line of script in php', ';', ':', '<', '>', 'A', 24, '2014-02-13');

-- --------------------------------------------------------

--
-- Table structure for table `t_result`
--

CREATE TABLE IF NOT EXISTS `t_result` (
  `tuserid` int(11) NOT NULL,
  `resultid` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `result` varchar(50) NOT NULL,
  `score` float NOT NULL,
  `cruddate` datetime NOT NULL,
  `suserid` int(50) NOT NULL,
  PRIMARY KEY (`resultid`,`type`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_result`
--

INSERT INTO `t_result` (`tuserid`, `resultid`, `type`, `result`, `score`, `cruddate`, `suserid`) VALUES
(5, 2, 'Q', 'P', 100, '2014-02-01 00:00:00', 4),
(5, 3, 'Q', 'P', 100, '2014-02-01 00:00:00', 4),
(11, 4, 'Q', 'F', 50, '2014-02-01 00:00:00', 10),
(5, 5, 'Q', 'P', 100, '2014-02-03 00:00:00', 4),
(5, 4, 'A', '80', 0, '2014-02-03 00:00:00', 4),
(5, 7, 'Q', 'P', 100, '2014-02-12 00:00:00', 4),
(5, 9, 'A', '1', 0, '2014-02-12 00:00:00', 4),
(5, 10, 'A', '200', 0, '2014-02-12 00:00:00', 4),
(5, 8, 'Q', 'F', 0, '2014-02-12 00:00:00', 4),
(24, 10, 'Q', 'P', 100, '2014-02-13 00:00:00', 23),
(24, 11, 'Q', 'P', 100, '2014-02-13 00:00:00', 23);

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE IF NOT EXISTS `t_user` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `departid` int(50) NOT NULL,
  `phoneno` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `codeno` varchar(50) NOT NULL,
  `progid` int(11) NOT NULL,
  `firstprogid` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `isadmin` smallint(1) NOT NULL DEFAULT '0',
  `isstudent` smallint(1) NOT NULL DEFAULT '0',
  `logindate` date NOT NULL,
  `logintime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `isloggedin` smallint(1) NOT NULL DEFAULT '0',
  `acdisable` smallint(1) NOT NULL,
  `lastpasswordchg` date NOT NULL,
  `aoperatorid` varchar(50) NOT NULL,
  `isauthorized` smallint(1) NOT NULL DEFAULT '0',
  `authorizedate` date NOT NULL,
  `authorizeby` int(11) NOT NULL,
  `isrejected` bit(1) NOT NULL,
  `rejecteddate` date NOT NULL,
  `rejectedby` varchar(50) NOT NULL,
  `cruddate` date NOT NULL,
  PRIMARY KEY (`userid`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`userid`, `username`, `fullname`, `departid`, `phoneno`, `address`, `codeno`, `progid`, `firstprogid`, `password`, `isadmin`, `isstudent`, `logindate`, `logintime`, `isloggedin`, `acdisable`, `lastpasswordchg`, `aoperatorid`, `isauthorized`, `authorizedate`, `authorizeby`, `isrejected`, `rejecteddate`, `rejectedby`, `cruddate`) VALUES
(4, 'student@gmail.com', 'Student', 0, '090924324324', 'R-K-L', 'STD-01', 0, 0, 'qKmqmZqjqWZnaA==', 0, 1, '0000-00-00', '2014-02-12 23:07:04', 0, 0, '0000-00-00', '', 1, '2014-01-23', 6, '\0', '0000-00-00', '', '2014-01-23'),
(5, 'teacher@gmail.com', 'Teacher', 6, '090000898989', '', '', 0, 0, 'qZqWmJ2ap2ZnaA==', 0, 0, '0000-00-00', '2014-02-13 01:09:18', 1, 0, '0000-00-00', '', 1, '2014-01-23', 6, '\0', '0000-00-00', '', '2014-01-23'),
(6, 'admin', 'admin', 6, '03008765454', '', '', 0, 0, 'lpminqNmZ2g=', 1, 0, '0000-00-00', '0000-00-00 00:00:00', 0, 0, '0000-00-00', '', 1, '0000-00-00', 0, '\0', '0000-00-00', '', '2014-01-23'),
(23, 'sa@gmail.com', 'salman ahmed', 0, '32132', '321321321adhljlaalsjd fljljlkjlkj', '213213', 0, 0, 'qJapmqipZmdoaQ==', 0, 1, '0000-00-00', '2014-02-13 01:33:33', 0, 0, '0000-00-00', '', 1, '2014-02-12', 6, '\0', '0000-00-00', '', '2014-02-12'),
(22, 'salman@gmail.com', 'salman ahmed', 0, '1323', 'aldk ad\r\naadf', '3132', 0, 0, 'qJahopajZmdoaQ==', 0, 1, '0000-00-00', '0000-00-00 00:00:00', 0, 0, '0000-00-00', '', 0, '0000-00-00', 0, '', '2014-02-12', '6', '2014-02-12'),
(9, 'student2@gmail.com', 'student2', 0, '31323', 'laskjdflakjsdflakj', '1321321', 0, 0, 'qZqoqWZnaGk=', 0, 1, '0000-00-00', '0000-00-00 00:00:00', 0, 0, '0000-00-00', '', 0, '0000-00-00', 0, '', '2014-02-01', '6', '2014-02-01'),
(10, 'student3@gmail.com', 'student3', 0, '321321', 'asdlkjaldkfj', '321321', 0, 0, 'qKmqmZqjqWZnaGk=', 0, 1, '0000-00-00', '2014-02-01 06:50:24', 0, 0, '0000-00-00', '', 1, '2014-02-01', 6, '\0', '0000-00-00', '', '2014-02-01'),
(11, 'teacher3@gmail.com', 'teacher3', 6, '13213', '', '', 0, 0, 'qZqWmJ2ap2ZnaA==', 0, 0, '0000-00-00', '2014-02-10 22:46:41', 0, 0, '0000-00-00', '', 1, '2014-02-01', 6, '\0', '0000-00-00', '', '2014-02-01'),
(12, 'student2@hotmail.com', 'student2 ', 0, '09343243423', 'k-09', 'STE-09', 0, 0, 'qKmqmZqjqWdmZ2g=', 0, 1, '0000-00-00', '0000-00-00 00:00:00', 0, 0, '0000-00-00', '', 0, '0000-00-00', 0, '', '2014-02-12', '6', '2014-02-04'),
(24, 'tr@gmail.com', 'john deo', 10, '1323', '', '', 0, 0, 'qaepmqipZmdoaQ==', 0, 0, '0000-00-00', '2014-02-13 01:24:40', 0, 0, '0000-00-00', '', 1, '2014-02-12', 6, '\0', '0000-00-00', '', '2014-02-12');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
