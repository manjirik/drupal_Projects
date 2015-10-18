-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 21, 2011 at 09:06 AM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `timesheet`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `emp_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `emp_code` bigint(20) NOT NULL,
  `emp_fname` varchar(20) NOT NULL,
  `emp_mname` varchar(20) DEFAULT NULL,
  `emp_lname` varchar(20) NOT NULL,
  `emp_email` varchar(50) NOT NULL,
  `emp_pass` varchar(20) NOT NULL,
  `emp_report_email` varchar(50) NOT NULL,
  `emp_add_date` datetime NOT NULL,
  `emp_last_modify` datetime DEFAULT NULL,
  `emp_active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `emp_code`, `emp_fname`, `emp_mname`, `emp_lname`, `emp_email`, `emp_pass`, `emp_report_email`, `emp_add_date`, `emp_last_modify`, `emp_active`) VALUES
(1, 2785, 'Harshal', 'S', 'Hirve', 'harshalh@synechron.com', '123456', 'aa@aa.com', '2010-04-27 14:35:36', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

DROP TABLE IF EXISTS `tasks`;
CREATE TABLE IF NOT EXISTS `tasks` (
  `task_id` bigint(30) NOT NULL AUTO_INCREMENT,
  `task_emp_code` bigint(20) NOT NULL,
  `task_date` date NOT NULL,
  `task_st_time` time NOT NULL,
  `task_en_time` time NOT NULL,
  `task_type` tinyint(1) NOT NULL DEFAULT '0',
  `task_project` varchar(255) NOT NULL,
  `task_desc` varchar(500) NOT NULL,
  `task_status` int(1) NOT NULL DEFAULT '0',
  `task_hrs` varchar(10) NOT NULL DEFAULT '0',
  `task_post_date` datetime NOT NULL,
  `task_last_modify` datetime DEFAULT NULL,
  `task_active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`task_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`task_id`, `task_emp_code`, `task_date`, `task_st_time`, `task_en_time`, `task_type`, `task_project`, `task_desc`, `task_status`, `task_hrs`, `task_post_date`, `task_last_modify`, `task_active`) VALUES
(1, 2785, '2011-09-21', '09:00:00', '09:00:00', 2, 'dfgdfg', 'dfgdfgdf', 1, '00:00', '2011-09-21 09:00:59', NULL, 0),
(2, 2785, '2011-09-21', '09:04:00', '09:13:00', 2, 'df g', 'df gdf gdgdgf', 2, '00:09', '2011-09-21 09:05:06', NULL, 1);
