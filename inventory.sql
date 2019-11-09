-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 09, 2019 at 12:26 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

DROP TABLE IF EXISTS `designation`;
CREATE TABLE IF NOT EXISTS `designation` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `designation_id` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  PRIMARY KEY (`designation_id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `designation`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees_details`
--

DROP TABLE IF EXISTS `employees_details`;
CREATE TABLE IF NOT EXISTS `employees_details` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `emp_id` varchar(50) NOT NULL,
  `emp_first_name` varchar(20) DEFAULT NULL,
  `emp_last_name` varchar(20) DEFAULT NULL,
  `emp_email` varchar(30) DEFAULT NULL,
  `emp_designation` varchar(50) DEFAULT NULL,
  `emp_dob` date DEFAULT NULL,
  `emp_gender` varchar(15) DEFAULT NULL,
  `emp_address` varchar(50) DEFAULT NULL,
  `emp_joining` date DEFAULT NULL,
  `emp_basic_salary` bigint(15) DEFAULT NULL,
  `emp_login_flag` int(1) DEFAULT NULL,
  PRIMARY KEY (`emp_id`),
  UNIQUE KEY `id` (`id`),
  KEY `emp_des` (`emp_designation`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees_details`
--


-- --------------------------------------------------------

--
-- Table structure for table `parameters`
--

DROP TABLE IF EXISTS `parameters`;
CREATE TABLE IF NOT EXISTS `parameters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parameter_id` varchar(50) DEFAULT NULL,
  `parameter_date` date DEFAULT NULL,
  `designation_id` varchar(50) DEFAULT NULL,
  `parameter_name` varchar(50) DEFAULT NULL,
  `parameters_type` varchar(12) DEFAULT NULL,
  `parameter_value_type` varchar(50) NOT NULL,
  `parameter_value` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `desid` (`designation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parameters`
--

-- --------------------------------------------------------

--
-- Table structure for table `salary_generation`
--

DROP TABLE IF EXISTS `salary_generation`;
CREATE TABLE IF NOT EXISTS `salary_generation` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `employee_id` varchar(50) DEFAULT NULL,
  `parameter_id` varchar(50) DEFAULT NULL,
  `salaryDate` date DEFAULT NULL,
  `basic_salary` bigint(50) DEFAULT NULL,
  `allowance` bigint(50) DEFAULT NULL,
  `deductions` bigint(50) DEFAULT NULL,
  `net_salary` bigint(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `empid` (`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salary_generation`
--



-- --------------------------------------------------------

--
-- Table structure for table `user_login_credentials`
--

DROP TABLE IF EXISTS `user_login_credentials`;
CREATE TABLE IF NOT EXISTS `user_login_credentials` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login_id` varchar(50) NOT NULL,
  `employees_id` varchar(50) DEFAULT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `user_password` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`login_id`),
  UNIQUE KEY `id` (`id`),
  KEY `logid` (`employees_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_login_credentials`
--



--
-- Constraints for dumped tables
--

--
-- Constraints for table `employees_details`
--
ALTER TABLE `employees_details`
  ADD CONSTRAINT `employees_details_ibfk_1` FOREIGN KEY (`emp_designation`) REFERENCES `designation` (`designation_id`);

--
-- Constraints for table `parameters`
--
ALTER TABLE `parameters`
  ADD CONSTRAINT `parameters_ibfk_1` FOREIGN KEY (`designation_id`) REFERENCES `designation` (`designation_id`);

--
-- Constraints for table `salary_generation`
--
ALTER TABLE `salary_generation`
  ADD CONSTRAINT `salary_generation_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees_details` (`emp_id`);

--
-- Constraints for table `user_login_credentials`
--
ALTER TABLE `user_login_credentials`
  ADD CONSTRAINT `user_login_credentials_ibfk_1` FOREIGN KEY (`employees_id`) REFERENCES `employees_details` (`emp_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
