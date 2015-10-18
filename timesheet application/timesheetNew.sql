-- phpMyAdmin SQL Dump
-- version 3.2.2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 30, 2012 at 12:35 PM
-- Server version: 5.0.45
-- PHP Version: 5.2.11

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `timesheetNew`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `emp_id` bigint(20) NOT NULL auto_increment,
  `emp_code` bigint(20) NOT NULL,
  `emp_fname` varchar(20) NOT NULL,
  `emp_mname` varchar(20) default NULL,
  `emp_lname` varchar(20) NOT NULL,
  `emp_email` varchar(50) NOT NULL,
  `emp_pass` varchar(20) NOT NULL,
  `emp_rep_auth_name` varchar(255) default NULL,
  `emp_report_email` varchar(50) NOT NULL,
  `emp_add_date` datetime NOT NULL,
  `emp_last_modify` datetime default NULL,
  `emp_active` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`emp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `emp_code`, `emp_fname`, `emp_mname`, `emp_lname`, `emp_email`, `emp_pass`, `emp_rep_auth_name`, `emp_report_email`, `emp_add_date`, `emp_last_modify`, `emp_active`) VALUES
(1, 2785, 'Harshal', 'S', 'Hirve', 'harshalh@synechron.com', '123456', 'Rupesh Saini', 'rupeshsai@synechron.com', '2011-09-21 16:10:21', NULL, 1),
(2, 3166, 'Ajay', 'Kiran', 'Shinde', 'ajay.shinde@synechron.com', '@Aks32111', 'Rupesh Saini', 'rupesh.saini@synechron.com', '2011-09-21 16:15:29', NULL, 1),
(3, 3097, 'Irshad', 'Ahmad', 'Qureshi', 'irshadq@synechron.com', 'irshadq', 'Rupesh R. Saini', 'rupesh.saini@synechron.com', '2011-09-21 16:44:49', NULL, 1),
(4, 4233, 'Hozefa', '', 'Matiwala', 'hozefa.matiwala@synechron.com', 'multimedia', 'Rupesh Saini', 'rupesh.saini@synechron.com', '2011-09-21 16:53:07', NULL, 1),
(5, 3743, 'Madan', '', 'Koshti', 'koshtim@synechron.com', 'Welcome567', 'Rupesh Saini', 'rupesh.saini@synechron.com', '2011-09-21 16:58:43', NULL, 1),
(6, 4189, 'Sandip', 'G.', 'Patil', 'sandippatil@synechron.com', 'sandip123', 'Rupesh Saini', 'rupesh.saini@synechron.com', '2011-09-22 13:07:42', NULL, 1),
(7, 2784, 'Mohammad Haroon', '', 'Khan', 'mohammadk@synechron.com', 'haroon05', 'Rupesh Saini', 'rupesh.saini@synechron.com', '2011-09-22 13:10:40', NULL, 1),
(8, 3721, 'Lalit', 'S', 'Shejao', 'lalitsh@synechron.com', 'lalit1234', 'Rupesh', 'rupeshsai@synechron.com', '2011-09-26 16:29:44', NULL, 1),
(9, 4083, 'Percy', '', 'Engineer', 'percye@synechron.com', 'company123$', 'Rupesh Saini', 'rupesh.saini@synechron.com', '2011-09-26 16:34:22', NULL, 1),
(10, 4186, 'Rupesh', '', 'Saini', 'rupesh.saini@synechron.com', 'hsepur27', 'Rupesh', 'rupesh.saini@synechron.com', '2011-09-28 19:50:10', NULL, 1),
(11, 3760, 'Archana', '', 'Mohite', 'Archana.Mohite@synechron.com', 'arc', 'Rupesh Saini', 'Rupesh.Saini@synechron.com', '2011-12-09 09:54:03', NULL, 1),
(12, 5089, 'zainub', '', 'ahmed', 'zainub.ahmed@synechron.com', 'zainub', 'Rupesh Saini', 'rupesh.saini@synechron.com', '2011-12-09 10:13:55', NULL, 1),
(13, 5333, 'Manjiri', 'V', 'Kulkarni', 'manjiri.kulkarni@synechron.com', 'My2Password', 'Rupesh Saini', 'rupesh.saini@synechron.com', '2012-01-30 12:17:31', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
  `task_id` bigint(30) NOT NULL auto_increment,
  `task_emp_code` bigint(20) NOT NULL,
  `task_date` date NOT NULL,
  `task_st_time` time NOT NULL,
  `task_en_time` time NOT NULL,
  `task_type` tinyint(1) NOT NULL default '0',
  `task_project` varchar(255) NOT NULL,
  `task_desc` varchar(500) NOT NULL,
  `task_status` int(1) NOT NULL default '0',
  `task_hrs` varchar(10) NOT NULL default '0',
  `task_post_date` datetime NOT NULL,
  `task_last_modify` datetime default NULL,
  `task_active` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`task_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`task_id`, `task_emp_code`, `task_date`, `task_st_time`, `task_en_time`, `task_type`, `task_project`, `task_desc`, `task_status`, `task_hrs`, `task_post_date`, `task_last_modify`, `task_active`) VALUES
(1, 3743, '2011-09-19', '12:00:00', '21:00:00', 2, 'HCF', 'test 1234', 2, '09:00', '2011-09-21 16:59:40', '2011-09-21 17:04:03', 0),
(2, 3166, '2011-09-20', '12:10:00', '18:00:00', 1, 'Mentis Testing Tool', 'Work on upgrade new version of mentis testing tool. Also done some customization tasks.', 1, '05:50', '2011-09-21 17:01:47', NULL, 1),
(3, 3097, '2011-09-20', '08:00:00', '17:00:00', 1, 'USI', 'Testing....', 2, '09:00', '2011-09-21 17:04:29', '2011-09-21 17:05:47', 1),
(4, 3166, '2011-09-20', '18:00:00', '20:30:00', 2, 'F12D', 'Worked on configure new email template.', 1, '02:30', '2011-09-21 17:05:59', NULL, 1),
(5, 3721, '2011-09-26', '12:00:00', '15:20:00', 1, 'Synechron CMS', 'Discussion related to how to convert Static pages data in CMS', 1, '03:20', '2011-09-26 16:38:52', NULL, 1),
(6, 3721, '2011-09-26', '16:00:00', '21:00:00', 1, 'Student Stypend Approvel System', 'writing Test cases', 2, '05:00', '2011-09-26 18:28:59', NULL, 1),
(7, 4083, '2011-09-26', '12:00:00', '21:00:00', 2, 'USI, Car racing 2D game', 'Testing of USI functionality.  Smoke Testing of Car racing game', 1, '09:00', '2011-09-27 15:52:34', NULL, 1),
(8, 3721, '2011-09-27', '12:30:00', '16:30:00', 1, 'Student Stipend approval system', 'Discussion related to Student Stipend approval system with Suhail', 1, '04:00', '2011-09-28 20:00:27', '2011-09-28 20:02:37', 1),
(9, 3721, '2011-09-27', '17:00:00', '21:00:00', 1, 'Student Stipend approval system', 'Writing test cases related to Student Stipend approval system', 2, '04:00', '2011-09-28 20:02:22', NULL, 1),
(10, 3721, '2011-09-28', '13:00:00', '16:00:00', 1, 'Student Stipend approval system', 'Updated the existing test cases as per new requirement and add new in it', 1, '03:00', '2011-09-28 20:04:26', NULL, 1),
(11, 3721, '2011-09-28', '19:00:00', '23:00:00', 2, 'Emirates NBD', 'Testing the Emirates NBD application as per the clients requirement.', 1, '04:00', '2011-09-28 20:05:32', '2011-09-29 13:17:26', 1),
(12, 3721, '2011-09-29', '08:30:00', '12:30:00', 1, 'Synechron Static', 'Testing the Synechron Static site', 2, '04:00', '2011-09-29 13:18:55', NULL, 1),
(13, 4083, '2011-09-27', '12:00:00', '21:00:00', 2, 'HCF, DashEm Car Racing game', 'Testing of HCF site\nTesting of DashEm', 1, '09:00', '2011-09-29 20:53:47', NULL, 1),
(14, 4083, '2011-09-28', '12:00:00', '21:00:00', 2, 'DashEm', 'Testing of DashEm', 1, '09:00', '2011-09-29 20:54:29', NULL, 1),
(15, 4083, '2011-09-29', '12:00:00', '21:00:00', 2, 'USI', 'Testing of email being sent feature in case of 5 wrong password attempts.', 1, '09:00', '2011-09-30 14:06:53', NULL, 1),
(16, 4083, '2011-09-30', '12:00:00', '21:00:00', 2, 'HCF', 'UI and functional testing of HCF site', 1, '09:00', '2011-10-03 16:07:15', NULL, 1),
(17, 4083, '2011-10-01', '17:00:00', '19:00:00', 2, 'HCF', 'UI and functional testing of HCF site', 1, '02:00', '2011-10-03 16:08:10', NULL, 1),
(18, 3166, '2011-09-21', '12:00:00', '21:00:00', 2, 'DMM', 'Worked on DMM tasks', 1, '09:00', '2011-10-03 18:43:39', NULL, 1),
(19, 3166, '2011-09-22', '12:00:00', '21:00:00', 2, 'DMM', 'Worked on DMM tasks', 1, '09:00', '2011-10-03 18:44:22', NULL, 1),
(20, 3166, '2011-09-23', '12:00:00', '21:00:00', 2, 'DMM', 'Worked on DMM tasks', 1, '09:00', '2011-10-03 18:45:47', NULL, 1),
(21, 3166, '2011-09-26', '12:00:00', '21:00:00', 2, 'DMM', 'Worked on DMM Paid user email functionality.', 1, '09:00', '2011-10-03 18:49:56', NULL, 1),
(22, 3166, '2011-09-27', '12:00:00', '21:00:00', 2, 'DMM', 'Worked on DMM SEO friendly urls (musician name) functionality.', 1, '09:00', '2011-10-03 18:51:01', NULL, 1),
(23, 3166, '2011-09-28', '12:00:00', '21:00:00', 2, 'DMM', 'Worked on &#039;Message Musician&#039; functionality', 1, '09:00', '2011-10-03 18:51:32', NULL, 1),
(24, 3166, '2011-09-29', '12:00:00', '21:00:00', 2, 'DMM', 'Worked on DMM following task: users are listening to music via musician URLâ€™s, full-length song play will be enabled for non-registered users.', 1, '09:00', '2011-10-03 18:52:17', NULL, 1),
(25, 3166, '2011-09-30', '12:00:00', '21:00:00', 2, 'DMM', 'Worked on following task in DMM:  If the musician has no songs so just show a default image, minus the message in the topleft corner, comment box and view counter?', 1, '09:00', '2011-10-03 18:53:07', NULL, 1),
(26, 3721, '2011-09-30', '12:00:00', '21:00:00', 1, 'Synechron Static', 'Synechron Static', 2, '09:00', '2011-10-04 15:24:20', NULL, 1),
(27, 3721, '2011-10-03', '12:00:00', '15:00:00', 1, 'Synechron Static', 'Synechron Static', 2, '03:00', '2011-10-04 15:24:45', NULL, 1),
(28, 3721, '2011-10-03', '15:00:00', '16:00:00', 2, 'GM', 'Discussion related to GM application', 2, '01:00', '2011-10-04 15:25:23', NULL, 1),
(29, 3721, '2011-10-03', '20:30:00', '21:00:00', 2, 'Dificid Discharge Planner Assets', 'Understanding the Dificid Discharge Planner Assets application', 1, '00:30', '2011-10-04 15:26:40', NULL, 1),
(30, 3721, '2011-10-04', '13:00:00', '14:40:00', 1, 'Synechron Static', 'Synechron Static', 2, '01:40', '2011-10-04 15:27:26', NULL, 1),
(31, 4186, '2011-12-08', '12:00:00', '21:00:00', 2, 'ABC', 'mnwdknwd kjdkljld', 1, '09:00', '2011-12-09 09:52:35', NULL, 1),
(32, 0, '2011-12-06', '12:00:00', '21:00:00', 2, 'XYZ', 'hjw kkdq', 1, '09:00', '2011-12-09 09:54:16', NULL, 1),
(33, 4186, '2012-01-02', '12:00:00', '21:00:00', 2, 'wfw', 'wfwffw', 1, '09:00', '2012-01-30 11:55:49', NULL, 1),
(34, 4186, '2012-01-03', '12:00:00', '21:00:00', 2, 'sdvevgwe', 'wffwf', 1, '09:00', '2012-01-30 11:55:57', NULL, 1),
(35, 4186, '2012-01-04', '12:00:00', '21:00:00', 2, 'wfw', 'wdfqdfq', 1, '09:00', '2012-01-30 11:56:10', NULL, 1),
(36, 4186, '2012-01-05', '12:00:00', '21:00:00', 2, 'wfw', 'wdfwfqf', 1, '09:00', '2012-01-30 11:56:17', NULL, 1),
(37, 4186, '2012-01-06', '12:00:00', '21:00:00', 2, 'ege3', 'wfgw2', 1, '09:00', '2012-01-30 11:56:24', NULL, 1),
(38, 4186, '2012-01-09', '12:00:00', '16:00:00', 2, 'et', '3tt33t3t', 1, '04:00', '2012-01-30 12:04:07', NULL, 1),
(39, 4186, '2012-01-09', '16:00:00', '21:00:00', 2, 'swe', 'wfwf', 1, '05:00', '2012-01-30 12:08:47', NULL, 1),
(40, 5333, '2012-01-01', '12:00:00', '21:00:00', 2, 'ghf', 'hg', 1, '09:00', '2012-01-30 12:30:59', NULL, 1),
(41, 5333, '2012-01-02', '12:00:00', '21:00:00', 2, 'gfdghdf', 'ghdfgf', 1, '09:00', '2012-01-30 12:31:19', NULL, 1);
