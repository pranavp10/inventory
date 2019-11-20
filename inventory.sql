-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 20, 2019 at 06:32 AM
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
-- Table structure for table `credit_limit`
--

DROP TABLE IF EXISTS `credit_limit`;
CREATE TABLE IF NOT EXISTS `credit_limit` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `credit_limit_id` varchar(50) NOT NULL,
  `customer_id` varchar(50) DEFAULT NULL,
  `credit_limit_value` bigint(15) DEFAULT NULL,
  `credit_limit_from_date` date DEFAULT NULL,
  `credit_limit_to_date` date DEFAULT NULL,
  PRIMARY KEY (`credit_limit_id`),
  UNIQUE KEY `id` (`id`),
  KEY `cusid` (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `credit_limit`
--

INSERT INTO `credit_limit` (`id`, `credit_limit_id`, `customer_id`, `credit_limit_value`, `credit_limit_from_date`, `credit_limit_to_date`) VALUES
(1, 'CCL-1', 'CMS-2', 1, '2019-11-12', '2019-11-06');

-- --------------------------------------------------------

--
-- Table structure for table `customer_or_company`
--

DROP TABLE IF EXISTS `customer_or_company`;
CREATE TABLE IF NOT EXISTS `customer_or_company` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `customer_id` varchar(50) NOT NULL,
  `gstin` varchar(50) DEFAULT NULL,
  `cust_comp_name` varchar(100) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `city_pincode` bigint(10) DEFAULT NULL,
  `c_phone_number` bigint(12) DEFAULT NULL,
  `c_email` varchar(50) DEFAULT NULL,
  `c_address` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`customer_id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_or_company`
--

INSERT INTO `customer_or_company` (`id`, `customer_id`, `gstin`, `cust_comp_name`, `state`, `city`, `city_pincode`, `c_phone_number`, `c_email`, `c_address`) VALUES
(1, 'CMS-1', 'F2', 'Ad', 'Karnataka', 'Hubli', 585032, 1111111111, 'mahantesh@gmail.com', 'h.no 89 sawmi-vivekananda'),
(2, 'CMS-2', '231', 'Asdasdadad', 'Karnataka', 'Hubli', 585032, 1111111111, 'mahantesh@gmail.com', 'h.no 89 sawmi-vivekananda');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`id`, `designation_id`, `description`) VALUES
(1, 'DES-1', 'Manager'),
(2, 'DES-2', 'Developer');

-- --------------------------------------------------------

--
-- Table structure for table `discounts_and_flats`
--

DROP TABLE IF EXISTS `discounts_and_flats`;
CREATE TABLE IF NOT EXISTS `discounts_and_flats` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `discount_id` varchar(50) NOT NULL,
  `discount_name` varchar(255) NOT NULL,
  `discount_from_date` date NOT NULL,
  `discount_to_date` date NOT NULL,
  PRIMARY KEY (`discount_id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `discounts_and_flats`
--

INSERT INTO `discounts_and_flats` (`id`, `discount_id`, `discount_name`, `discount_from_date`, `discount_to_date`) VALUES
(1, 'DAF-1920-1', 'Diwali', '2019-12-01', '2019-12-18'),
(2, 'DAF-1920-2', 'Dfds', '2020-01-09', '2020-01-24'),
(3, 'DAF-1920-3', 'Diwalids', '2019-06-03', '2019-06-18');

-- --------------------------------------------------------

--
-- Table structure for table `discounts_and_flats_details`
--

DROP TABLE IF EXISTS `discounts_and_flats_details`;
CREATE TABLE IF NOT EXISTS `discounts_and_flats_details` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `discount_id` varchar(50) DEFAULT NULL,
  `item_category` varchar(50) DEFAULT NULL,
  `item` varchar(50) DEFAULT NULL,
  `discount_type` varchar(50) DEFAULT NULL,
  `discount_value` bigint(255) NOT NULL,
  `minimun_amount` bigint(50) DEFAULT NULL,
  UNIQUE KEY `id` (`id`),
  KEY `desid` (`discount_id`),
  KEY `itmcat` (`item_category`),
  KEY `itm` (`item`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `discounts_and_flats_details`
--

INSERT INTO `discounts_and_flats_details` (`id`, `discount_id`, `item_category`, `item`, `discount_type`, `discount_value`, `minimun_amount`) VALUES
(1, 'DAF-1920-1', 'CAT-3', 'ITM-3', 'percent', 33, 33),
(2, 'DAF-1920-2', 'CAT-3', 'ITM-3', 'percent', 1, 6),
(3, 'DAF-1920-2', 'CAT-1', 'ITM-4', 'flat', 1, 0),
(4, 'DAF-1920-2', 'CAT-1', 'ITM-1', 'percent', 1, 0),
(5, 'DAF-1920-3', 'CAT-2', 'ITM-2', 'percent', 1, 4),
(6, 'DAF-1920-3', 'CAT-1', 'ITM-1', 'percent', 1, 0),
(7, 'DAF-1920-3', 'CAT-1', 'ITM-4', 'percent', 1, 0),
(8, 'DAF-1920-3', 'CAT-3', 'ITM-3', 'percent', 1, 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees_details`
--

INSERT INTO `employees_details` (`id`, `emp_id`, `emp_first_name`, `emp_last_name`, `emp_email`, `emp_designation`, `emp_dob`, `emp_gender`, `emp_address`, `emp_joining`, `emp_basic_salary`, `emp_login_flag`) VALUES
(1, 'EMP-1', 'Aa', 'God', 'mahantesh@gmail.com', 'DES-2', '2019-11-07', 'Male', 'h.no 89 sawmi-vivekananda', '2019-11-16', 20000, 1),
(2, 'EMP-2', 'Bb', 'Bbb', 'mahantesh@gmail.com', 'DES-1', '2019-11-28', 'Female', 'h.no 89 sawmi-vivekananda', '2019-11-08', 43532, 1);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE IF NOT EXISTS `item` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `item_id` varchar(50) NOT NULL,
  `item_category` varchar(50) DEFAULT NULL,
  `item_tax` varchar(50) NOT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `item_type` varchar(50) NOT NULL,
  PRIMARY KEY (`item_id`),
  UNIQUE KEY `id` (`id`),
  KEY `itemid` (`item_category`),
  KEY `itemTax` (`item_tax`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `item_id`, `item_category`, `item_tax`, `item_name`, `item_type`) VALUES
(1, 'ITM-1', 'CAT-1', 'TAX-1', 'Mango', 'Piece'),
(2, 'ITM-2', 'CAT-2', 'TAX-1', 'Potato', 'Piece'),
(3, 'ITM-3', 'CAT-3', 'TAX-1', 'sdsadf', 'Kg'),
(4, 'ITM-4', 'CAT-1', 'TAX-1', 'Mango', 'Kg'),
(5, 'ITM-5', 'CAT-3', 'TAX-1', 'Kaju', 'Piece'),
(6, 'ITM-6', 'CAT-3', 'TAX-1', 'Kismis', 'Piece');

-- --------------------------------------------------------

--
-- Table structure for table `item_category`
--

DROP TABLE IF EXISTS `item_category`;
CREATE TABLE IF NOT EXISTS `item_category` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `item_category_id` varchar(50) NOT NULL,
  `item_category_name` varchar(50) NOT NULL,
  PRIMARY KEY (`item_category_id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_category`
--

INSERT INTO `item_category` (`id`, `item_category_id`, `item_category_name`) VALUES
(1, 'CAT-1', 'Fruit'),
(2, 'CAT-2', 'Veg'),
(3, 'CAT-3', 'Dry fruits');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parameters`
--

INSERT INTO `parameters` (`id`, `parameter_id`, `parameter_date`, `designation_id`, `parameter_name`, `parameters_type`, `parameter_value_type`, `parameter_value`) VALUES
(1, 'PMI-1', '2019-12-01', 'DES-1', 'HRA', 'Allowance', 'percentage', 18),
(2, 'PMI-1', '2019-12-01', 'DES-1', 'Medical', 'Allowance', 'flat', 3000),
(3, 'PMI-1', '2019-12-01', 'DES-1', 'Transportation', 'Allowance', 'flat', 2000),
(4, 'PMI-1', '2019-12-01', 'DES-1', 'PF', 'Deductions', 'percentage', 18),
(5, 'PMI-1', '2019-12-01', 'DES-1', 'Professional Tax', 'Deductions', 'percentage', 13);

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

DROP TABLE IF EXISTS `purchase`;
CREATE TABLE IF NOT EXISTS `purchase` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `purchase_id` varchar(50) NOT NULL,
  `supplier_id` varchar(50) DEFAULT NULL,
  `purchase_date` date DEFAULT NULL,
  `lr_number` varchar(50) NOT NULL,
  `total_quantity` double NOT NULL,
  `total_amount` double NOT NULL,
  `total_amount_tax` double NOT NULL,
  PRIMARY KEY (`purchase_id`),
  UNIQUE KEY `id` (`id`),
  KEY `supid` (`supplier_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`id`, `purchase_id`, `supplier_id`, `purchase_date`, `lr_number`, `total_quantity`, `total_amount`, `total_amount_tax`) VALUES
(11, 'PTNO-1920-1', 'SUP-3', '2019-11-01', '1', 3, 3, 3.54),
(8, 'PTNO-1920-2', 'SUP-1', '2019-11-15', 'fsds34322', 20, 90, 106),
(9, 'PTNO-1920-3', 'SUP-2', '2019-11-20', 'fsds34322', 6, 20553, 24253);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_list`
--

DROP TABLE IF EXISTS `purchase_list`;
CREATE TABLE IF NOT EXISTS `purchase_list` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `purchase_id` varchar(50) DEFAULT NULL,
  `item_category` varchar(50) DEFAULT NULL,
  `item_code` varchar(50) DEFAULT NULL,
  `quantity` double DEFAULT NULL,
  `price_per_unit` double DEFAULT NULL,
  `total_amount` double DEFAULT NULL,
  `total_amount_with_tax` double DEFAULT NULL,
  UNIQUE KEY `id` (`id`),
  KEY `puchid` (`purchase_id`),
  KEY `itmcat` (`item_category`),
  KEY `itm` (`item_code`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_list`
--

INSERT INTO `purchase_list` (`id`, `purchase_id`, `item_category`, `item_code`, `quantity`, `price_per_unit`, `total_amount`, `total_amount_with_tax`) VALUES
(11, 'PTNO-1920-2', 'CAT-1', 'ITM-1', 3, 10, 30, 35),
(12, 'PTNO-1920-2', 'CAT-1', 'ITM-4', 2, 3, 6, 7),
(13, 'PTNO-1920-2', 'CAT-2', 'ITM-2', 3, 3, 9, 11),
(14, 'PTNO-1920-2', 'CAT-3', 'ITM-3', 3, 6, 18, 21),
(15, 'PTNO-1920-2', 'CAT-3', 'ITM-6', 6, 3, 18, 21),
(16, 'PTNO-1920-2', 'CAT-3', 'ITM-5', 3, 3, 9, 11),
(17, 'PTNO-1920-3', 'CAT-2', 'ITM-2', 3, 6847, 20541, 24238),
(18, 'PTNO-1920-3', 'CAT-1', 'ITM-1', 3, 4, 12, 14),
(19, 'PTNO-1920-1', 'CAT-1', 'ITM-1', 1, 1, 1, 1.18),
(20, 'PTNO-1920-1', 'CAT-2', 'ITM-2', 1, 1, 1, 1.18),
(21, 'PTNO-1920-1', 'CAT-1', 'ITM-4', 1, 1, 1, 1.18);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salary_generation`
--

INSERT INTO `salary_generation` (`id`, `employee_id`, `parameter_id`, `salaryDate`, `basic_salary`, `allowance`, `deductions`, `net_salary`) VALUES
(1, 'EMP-2', 'PMI-1', '2019-12-01', 43532, 12836, -13496, 42872);

-- --------------------------------------------------------

--
-- Table structure for table `statelist`
--

DROP TABLE IF EXISTS `statelist`;
CREATE TABLE IF NOT EXISTS `statelist` (
  `city_id` int(5) NOT NULL,
  `city_name` varchar(50) NOT NULL,
  `latitude` varchar(10) NOT NULL,
  `longitude` varchar(10) NOT NULL,
  `state` varchar(50) NOT NULL,
  PRIMARY KEY (`city_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statelist`
--

INSERT INTO `statelist` (`city_id`, `city_name`, `latitude`, `longitude`, `state`) VALUES
(1, 'Port Blair', '11.67 N', '92.76 E', 'Andaman and Nicobar Islands'),
(2, 'Adilabad', '19.68 N', '78.53 E', 'Andhra Pradesh'),
(3, 'Adoni', '15.63 N', '77.28 E', 'Andhra Pradesh'),
(4, 'Alwal', '17.50 N', '78.54 E', 'Andhra Pradesh'),
(5, 'Anakapalle', '17.69 N', '83.00 E', 'Andhra Pradesh'),
(6, 'Anantapur', '14.70 N', '77.59 E', 'Andhra Pradesh'),
(7, 'Bapatla', '15.91 N', '80.47 E', 'Andhra Pradesh'),
(8, 'Belampalli', '19.06 N', '79.49 E', 'Andhra Pradesh'),
(9, 'Bhimavaram', '16.55 N', '81.53 E', 'Andhra Pradesh'),
(10, 'Bhongir', '17.52 N', '78.88 E', 'Andhra Pradesh'),
(11, 'Bobbili', '18.57 N', '83.37 E', 'Andhra Pradesh'),
(12, 'Bodhan', '18.66 N', '77.88 E', 'Andhra Pradesh'),
(13, 'Chilakalurupet', '16.10 N', '80.16 E', 'Andhra Pradesh'),
(14, 'Chinna Chawk', '14.47 N', '78.83 E', 'Andhra Pradesh'),
(15, 'Chirala', '15.84 N', '80.35 E', 'Andhra Pradesh'),
(16, 'Chittur', '13.22 N', '79.10 E', 'Andhra Pradesh'),
(17, 'Cuddapah', '14.48 N', '78.81 E', 'Andhra Pradesh'),
(18, 'Dharmavaram', '14.42 N', '77.71 E', 'Andhra Pradesh'),
(19, 'Dhone', '15.42 N', '77.88 E', 'Andhra Pradesh'),
(20, 'Eluru', '16.72 N', '81.11 E', 'Andhra Pradesh'),
(21, 'Gaddiannaram', '17.36 N', '78.52 E', 'Andhra Pradesh'),
(22, 'Gadwal', '16.23 N', '77.80 E', 'Andhra Pradesh'),
(23, 'Gajuwaka', '17.70 N', '83.21 E', 'Andhra Pradesh'),
(24, 'Gudivada', '16.44 N', '81.00 E', 'Andhra Pradesh'),
(25, 'Gudur', '14.15 N', '79.84 E', 'Andhra Pradesh'),
(26, 'Guntakal', '15.18 N', '77.37 E', 'Andhra Pradesh'),
(27, 'Guntur', '16.31 N', '80.44 E', 'Andhra Pradesh'),
(28, 'Hindupur', '13.83 N', '77.48 E', 'Andhra Pradesh'),
(29, 'Hyderabad', '17.40 N', '78.48 E', 'Andhra Pradesh'),
(30, 'Jagtial', '18.80 N', '78.91 E', 'Andhra Pradesh'),
(31, 'Kadiri', '14.12 N', '78.16 E', 'Andhra Pradesh'),
(32, 'Kagaznagar', '19.34 N', '79.48 E', 'Andhra Pradesh'),
(33, 'Kakinada', '16.96 N', '82.24 E', 'Andhra Pradesh'),
(34, 'Kallur', '15.69 N', '77.77 E', 'Andhra Pradesh'),
(35, 'Kamareddi', '18.32 N', '78.35 E', 'Andhra Pradesh'),
(36, 'Kapra', '17.37 N', '78.48 E', 'Andhra Pradesh'),
(37, 'Karimnagar', '18.45 N', '79.13 E', 'Andhra Pradesh'),
(38, 'Karnul', '15.83 N', '78.03 E', 'Andhra Pradesh'),
(39, 'Kavali', '14.92 N', '79.99 E', 'Andhra Pradesh'),
(40, 'Khammam', '17.25 N', '80.15 E', 'Andhra Pradesh'),
(41, 'Kodar', '16.98 N', '79.97 E', 'Andhra Pradesh'),
(42, 'Kondukur', '15.22 N', '79.91 E', 'Andhra Pradesh'),
(43, 'Koratla', '18.82 N', '78.72 E', 'Andhra Pradesh'),
(44, 'Kottagudem', '17.56 N', '80.64 E', 'Andhra Pradesh'),
(45, 'Kukatpalle', '17.49 N', '78.41 E', 'Andhra Pradesh'),
(46, 'Lalbahadur Nagar', '17.43 N', '78.50 E', 'Andhra Pradesh'),
(47, 'Machilipatnam', '16.19 N', '81.14 E', 'Andhra Pradesh'),
(48, 'Mahbubnagar', '16.74 N', '77.98 E', 'Andhra Pradesh'),
(49, 'Malkajgiri', '17.55 N', '78.59 E', 'Andhra Pradesh'),
(50, 'Mancheral', '18.88 N', '79.45 E', 'Andhra Pradesh'),
(51, 'Mandamarri', '18.97 N', '79.47 E', 'Andhra Pradesh'),
(52, 'Mangalagiri', '16.44 N', '80.56 E', 'Andhra Pradesh'),
(53, 'Markapur', '15.73 N', '79.28 E', 'Andhra Pradesh'),
(54, 'Miryalaguda', '16.87 N', '79.57 E', 'Andhra Pradesh'),
(55, 'Nalgonda', '17.06 N', '79.26 E', 'Andhra Pradesh'),
(56, 'Nandyal', '15.49 N', '78.48 E', 'Andhra Pradesh'),
(57, 'Narasapur', '16.45 N', '81.70 E', 'Andhra Pradesh'),
(58, 'Narasaraopet', '16.24 N', '80.04 E', 'Andhra Pradesh'),
(59, 'Nellur', '14.46 N', '79.98 E', 'Andhra Pradesh'),
(60, 'Nirmal', '19.12 N', '78.35 E', 'Andhra Pradesh'),
(61, 'Nizamabad', '18.68 N', '78.10 E', 'Andhra Pradesh'),
(62, 'Nuzvid', '16.78 N', '80.85 E', 'Andhra Pradesh'),
(63, 'Ongole', '15.50 N', '80.05 E', 'Andhra Pradesh'),
(64, 'Palakollu', '16.52 N', '81.75 E', 'Andhra Pradesh'),
(65, 'Palasa', '18.77 N', '84.42 E', 'Andhra Pradesh'),
(66, 'Palwancha', '17.60 N', '80.68 E', 'Andhra Pradesh'),
(67, 'Patancheru', '17.53 N', '78.27 E', 'Andhra Pradesh'),
(68, 'Piduguralla', '16.48 N', '79.90 E', 'Andhra Pradesh'),
(69, 'Ponnur', '16.07 N', '80.56 E', 'Andhra Pradesh'),
(70, 'Proddatur', '14.73 N', '78.55 E', 'Andhra Pradesh'),
(71, 'Qutubullapur', '17.43 N', '78.47 E', 'Andhra Pradesh'),
(72, 'Rajamahendri', '17.02 N', '81.79 E', 'Andhra Pradesh'),
(73, 'Rajampet', '14.18 N', '79.17 E', 'Andhra Pradesh'),
(74, 'Rajendranagar', '17.29 N', '78.39 E', 'Andhra Pradesh'),
(75, 'Ramachandrapuram', '17.56 N', '78.04 E', 'Andhra Pradesh'),
(76, 'Ramagundam', '18.80 N', '79.45 E', 'Andhra Pradesh'),
(77, 'Rayachoti', '14.05 N', '78.75 E', 'Andhra Pradesh'),
(78, 'Rayadrug', '14.70 N', '76.87 E', 'Andhra Pradesh'),
(79, 'Samalkot', '17.06 N', '82.18 E', 'Andhra Pradesh'),
(80, 'Sangareddi', '17.63 N', '78.08 E', 'Andhra Pradesh'),
(81, 'Sattenapalle', '16.40 N', '80.18 E', 'Andhra Pradesh'),
(82, 'Serilungampalle', '17.48 N', '78.33 E', 'Andhra Pradesh'),
(83, 'Siddipet', '18.11 N', '78.84 E', 'Andhra Pradesh'),
(84, 'Sikandarabad', '17.47 N', '78.52 E', 'Andhra Pradesh'),
(85, 'Sirsilla', '18.40 N', '78.81 E', 'Andhra Pradesh'),
(86, 'Srikakulam', '18.30 N', '83.90 E', 'Andhra Pradesh'),
(87, 'Srikalahasti', '13.76 N', '79.70 E', 'Andhra Pradesh'),
(88, 'Suriapet', '17.15 N', '79.62 E', 'Andhra Pradesh'),
(89, 'Tadepalle', '16.48 N', '80.60 E', 'Andhra Pradesh'),
(90, 'Tadepallegudem', '16.82 N', '81.52 E', 'Andhra Pradesh'),
(91, 'Tadpatri', '14.91 N', '78.00 E', 'Andhra Pradesh'),
(92, 'Tandur', '17.25 N', '77.58 E', 'Andhra Pradesh'),
(93, 'Tanuku', '16.75 N', '81.69 E', 'Andhra Pradesh'),
(94, 'Tenali', '16.24 N', '80.65 E', 'Andhra Pradesh'),
(95, 'Tirupati', '13.63 N', '79.41 E', 'Andhra Pradesh'),
(96, 'Tuni', '17.35 N', '82.55 E', 'Andhra Pradesh'),
(97, 'Uppal Kalan', '17.38 N', '78.55 E', 'Andhra Pradesh'),
(98, 'Vijayawada', '16.52 N', '80.63 E', 'Andhra Pradesh'),
(99, 'Vinukonda', '16.05 N', '79.75 E', 'Andhra Pradesh'),
(100, 'Visakhapatnam', '17.73 N', '83.30 E', 'Andhra Pradesh'),
(101, 'Vizianagaram', '18.12 N', '83.40 E', 'Andhra Pradesh'),
(102, 'Vuyyuru', '16.37 N', '80.85 E', 'Andhra Pradesh'),
(103, 'Wanparti', '16.37 N', '78.07 E', 'Andhra Pradesh'),
(104, 'Warangal', '18.01 N', '79.58 E', 'Andhra Pradesh'),
(105, 'Yemmiganur', '15.73 N', '77.48 E', 'Andhra Pradesh'),
(106, 'Itanagar', '27.14 N', '93.61 E', 'Arunachal Pradesh'),
(107, 'Barpeta', '26.32 N', '91.00 E', 'Assam'),
(108, 'Bongaigaon', '26.48 N', '90.54 E', 'Assam'),
(109, 'Dhuburi', '26.03 N', '89.97 E', 'Assam'),
(110, 'Dibrugarh', '27.49 N', '94.91 E', 'Assam'),
(111, 'Diphu', '25.84 N', '93.43 E', 'Assam'),
(112, 'Guwahati', '26.19 N', '91.75 E', 'Assam'),
(113, 'Jorhat', '26.76 N', '94.20 E', 'Assam'),
(114, 'Karimganj', '24.85 N', '92.36 E', 'Assam'),
(115, 'Lakhimpur', '27.24 N', '94.10 E', 'Assam'),
(116, 'Lanka', '25.93 N', '92.95 E', 'Assam'),
(117, 'Nagaon', '26.35 N', '92.68 E', 'Assam'),
(118, 'Sibsagar', '26.99 N', '94.63 E', 'Assam'),
(119, 'Silchar', '24.83 N', '92.77 E', 'Assam'),
(120, 'Tezpur', '26.63 N', '92.79 E', 'Assam'),
(121, 'Tinsukia', '27.50 N', '95.36 E', 'Assam'),
(122, 'Alipur Duar', '26.50 N', '89.53 E', 'West Bengal'),
(123, 'Arambagh', '22.88 N', '87.78 E', 'West Bengal'),
(124, 'Asansol', '23.69 N', '86.98 E', 'West Bengal'),
(125, 'Ashoknagar Kalyangarh', '22.84 N', '88.63 E', 'West Bengal'),
(126, 'Baharampur', '24.10 N', '88.24 E', 'West Bengal'),
(127, 'Baidyabati', '22.79 N', '88.33 E', 'West Bengal'),
(128, 'Baj Baj', '22.48 N', '88.17 E', 'West Bengal'),
(129, 'Bally', '22.65 N', '88.35 E', 'West Bengal'),
(130, 'Bally Cantonment', '22.65 N', '88.36 E', 'West Bengal'),
(131, 'Balurghat', '25.23 N', '88.77 E', 'West Bengal'),
(132, 'Bangaon', '23.05 N', '88.83 E', 'West Bengal'),
(133, 'Bankra', '22.58 N', '88.31 E', 'West Bengal'),
(134, 'Bankura', '23.24 N', '87.07 E', 'West Bengal'),
(135, 'Bansbaria', '22.95 N', '88.40 E', 'West Bengal'),
(136, 'Baranagar', '22.64 N', '88.37 E', 'West Bengal'),
(137, 'Barddhaman', '23.24 N', '87.86 E', 'West Bengal'),
(138, 'Basirhat', '22.66 N', '88.86 E', 'West Bengal'),
(139, 'Bhadreswar', '22.84 N', '88.35 E', 'West Bengal'),
(140, 'Bhatpara', '22.89 N', '88.42 E', 'West Bengal'),
(141, 'Bidhannagar', '22.57 N', '88.42 E', 'West Bengal'),
(142, 'Binnaguri', '26.74 N', '89.037 E', 'West Bengal'),
(143, 'Bishnupur', '23.08 N', '87.33 E', 'West Bengal'),
(144, 'Bolpur', '23.67 N', '87.70 E', 'West Bengal'),
(145, 'Calcutta', '22.57 N', '88.36 E', 'West Bengal'),
(146, 'Chakdaha', '22.48 N', '88.35 E', 'West Bengal'),
(147, 'Champdani', '22.81 N', '88.34 E', 'West Bengal'),
(148, 'Chandannagar', '22.89 N', '88.37 E', 'West Bengal'),
(149, 'Contai', '21.79 N', '87.75 E', 'West Bengal'),
(150, 'Dabgram', '', '', 'West Bengal'),
(151, 'Darjiling', '27.05 N', '88.26 E', 'West Bengal'),
(152, 'Dhulian', '24.68 N', '87.97 E', 'West Bengal'),
(153, 'Dinhata', '26.13 N', '89.47 E', 'West Bengal'),
(154, 'Dum Dum', '22.63 N', '88.42 E', 'West Bengal'),
(155, 'Durgapur', '23.50 N', '87.31 E', 'West Bengal'),
(156, 'Gangarampur', '25.40 N', '88.52 E', 'West Bengal'),
(157, 'Garulia', '22.83 N', '88.37 E', 'West Bengal'),
(158, 'Gayespur', '22.98 N', '88.51 E', 'West Bengal'),
(159, 'Ghatal', '22.67 N', '87.72 E', 'West Bengal'),
(160, 'Gopalpur', '', '', 'West Bengal'),
(161, 'Habra', '22.84 N', '88.62 E', 'West Bengal'),
(162, 'Halisahar', '22.95 N', '88.42 E', 'West Bengal'),
(163, 'Haora', '22.58 N', '88.33 E', 'West Bengal'),
(164, 'HugliChunchura', '22.91 N', '88.40 E', 'West Bengal'),
(165, 'Ingraj Bazar', '25.01 N', '88.14 E', 'West Bengal'),
(166, 'Islampur', '26.27 N', '88.20 E', 'West Bengal'),
(167, 'Jalpaiguri', '26.53 N', '88.71 E', 'West Bengal'),
(168, 'Jamuria', '23.70 N', '87.08 E', 'West Bengal'),
(169, 'Jangipur', '24.47 N', '88.07 E', 'West Bengal'),
(170, 'Jhargram', '22.45 N', '86.98 E', 'West Bengal'),
(171, 'Kaliyaganj', '25.63 N', '88.32 E', 'West Bengal'),
(172, 'Kalna', '23.22 N', '88.37 E', 'West Bengal'),
(173, 'Kalyani', '22.98 N', '88.48 E', 'West Bengal'),
(174, 'Kamarhati', '22.67 N', '88.37 E', 'West Bengal'),
(175, 'Kanchrapara', '22.95 N', '88.45 E', 'West Bengal'),
(176, 'Kandi', '23.95 N', '88.03 E', 'West Bengal'),
(177, 'Karsiyang', '26.88 N', '88.28 E', 'West Bengal'),
(178, 'Katwa', '23.65 N', '88.13 E', 'West Bengal'),
(179, 'Kharagpur', '22.34 N', '87.31 E', 'West Bengal'),
(180, 'Kharagpur Railway Settlement', '22.34 N', '87.26 E', 'West Bengal'),
(181, 'Khardaha', '22.73 N', '88.38 E', 'West Bengal'),
(182, 'Kharia', '', '', 'West Bengal'),
(183, 'Koch Bihar', '26.33 N', '89.46 E', 'West Bengal'),
(184, 'Konnagar', '22.70 N', '88.36 E', 'West Bengal'),
(185, 'Krishnanagar', '23.41 N', '88.51 E', 'West Bengal'),
(186, 'Kulti', '23.72 N', '86.89 E', 'West Bengal'),
(187, 'Madhyamgram', '22.70 N', '88.45 E', 'West Bengal'),
(188, 'Maheshtala', '22.51 N', '88.23 E', 'West Bengal'),
(189, 'Memari', '23.20 N', '88.12 E', 'West Bengal'),
(190, 'Midnapur', '22.33 N', '87.15 E', 'West Bengal'),
(191, 'Naihati', '22.91 N', '88.43 E', 'West Bengal'),
(192, 'Navadwip', '23.42 N', '88.37 E', 'West Bengal'),
(193, 'Ni Barakpur', '22.77 N', '88.36 E', 'West Bengal'),
(194, 'North Barakpur', '22.78 N', '88.37 E', 'West Bengal'),
(195, 'North Dum Dum', '22.64 N', '88.41 E', 'West Bengal'),
(196, 'Old Maldah', '', '', 'West Bengal'),
(197, 'Panihati', '22.69 N', '88.37 E', 'West Bengal'),
(198, 'Phulia', '23.24 N', '88.50 E', 'West Bengal'),
(199, 'Pujali', '22.47 N', '88.15 E', 'West Bengal'),
(200, 'Puruliya', '23.34 N', '86.36 E', 'West Bengal'),
(201, 'Raiganj', '25.62 N', '88.12 E', 'West Bengal'),
(202, 'Rajpur', '22.44 N', '88.44 E', 'West Bengal'),
(203, 'Rampur Hat', '24.17 N', '87.78 E', 'West Bengal'),
(204, 'Ranaghat', '23.19 N', '88.58 E', 'West Bengal'),
(205, 'Raniganj', '23.62 N', '87.11 E', 'West Bengal'),
(206, 'Rishra', '22.71 N', '88.36 E', 'West Bengal'),
(207, 'Shantipur', '23.26 N', '88.44 E', 'West Bengal'),
(208, 'Shiliguri', '26.73 N', '88.42 E', 'West Bengal'),
(209, 'Shrirampur', '22.74 N', '88.35 E', 'West Bengal'),
(210, 'Siuri', '23.91 N', '87.53 E', 'West Bengal'),
(211, 'South Dum Dum', '22.61 N', '88.41 E', 'West Bengal'),
(212, 'Titagarh', '22.74 N', '88.38 E', 'West Bengal'),
(213, 'Ulubaria', '22.47 N', '88.11 E', 'West Bengal'),
(214, 'UttarparaKotrung', '22.66 N', '88.35 E', 'West Bengal'),
(215, 'Araria', '26.15 N', '87.52 E', 'Bihar'),
(216, 'Arrah', '25.56 N', '84.66 E', 'Bihar'),
(217, 'Aurangabad', '24.75 N', '84.37 E', 'Bihar'),
(218, 'Bagaha', '27.10 N', '84.09 E', 'Bihar'),
(219, 'Begusarai', '25.42 N', '86.12 E', 'Bihar'),
(220, 'Bettiah', '26.81 N', '84.50 E', 'Bihar'),
(221, 'Bhabua', '25.05 N', '83.62 E', 'Bihar'),
(222, 'Bhagalpur', '25.26 N', '86.98 E', 'Bihar'),
(223, 'Bihar', '25.21 N', '85.52 E', 'Bihar'),
(224, 'Buxar', '25.58 N', '83.98 E', 'Bihar'),
(225, 'Chhapra', '25.78 N', '84.72 E', 'Bihar'),
(226, 'Darbhanga', '26.16 N', '85.88 E', 'Bihar'),
(227, 'Dehri', '24.91 N', '84.18 E', 'Bihar'),
(228, 'DighaMainpura', '', '', 'Bihar'),
(229, 'Dinapur', '25.64 N', '85.04 E', 'Bihar'),
(230, 'Dumraon', '25.55 N', '84.15 E', 'Bihar'),
(231, 'Gaya', '24.81 N', '85.00 E', 'Bihar'),
(232, 'Gopalganj', '26.47 N', '84.43 E', 'Bihar'),
(233, 'Goura', '', '', 'Bihar'),
(234, 'Hajipur', '', '', 'Bihar'),
(235, 'Jahanabad', '25.22 N', '84.98 E', 'Bihar'),
(236, 'Jamalpur', '25.32 N', '86.48 E', 'Bihar'),
(237, 'Jamui', '24.92 N', '86.22 E', 'Bihar'),
(238, 'Katihar', '25.55 N', '87.57 E', 'Bihar'),
(239, 'Khagaria', '25.50 N', '86.48 E', 'Bihar'),
(240, 'Khagaul', '25.58 N', '85.05 E', 'Bihar'),
(241, 'Kishanganj', '26.11 N', '87.95 E', 'Bihar'),
(242, 'Lakhisarai', '25.18 N', '86.09 E', 'Bihar'),
(243, 'Madhipura', '25.92 N', '86.78 E', 'Bihar'),
(244, 'Madhubani', '26.37 N', '86.06 E', 'Bihar'),
(245, 'Masaurhi', '25.35 N', '85.03 E', 'Bihar'),
(246, 'Mokama', '25.40 N', '85.92 E', 'Bihar'),
(247, 'Motihari', '26.66 N', '84.91 E', 'Bihar'),
(248, 'Munger', '25.39 N', '86.47 E', 'Bihar'),
(249, 'Muzaffarpur', '26.13 N', '85.38 E', 'Bihar'),
(250, 'Nawada', '24.88 N', '85.54 E', 'Bihar'),
(251, 'Patna', '25.62 N', '85.13 E', 'Bihar'),
(252, 'Phulwari', '25.60 N', '85.13 E', 'Bihar'),
(253, 'Purnia', '25.78 N', '87.47 E', 'Bihar'),
(254, 'Raxaul', '26.98 N', '84.85 E', 'Bihar'),
(255, 'Saharsa', '25.88 N', '86.59 E', 'Bihar'),
(256, 'Samastipur', '25.85 N', '85.78 E', 'Bihar'),
(257, 'Sasaram', '24.96 N', '84.01 E', 'Bihar'),
(258, 'Sitamarhi', '26.61 N', '85.48 E', 'Bihar'),
(259, 'Siwan', '26.23 N', '84.35 E', 'Bihar'),
(260, 'Supaul', '26.12 N', '86.60 E', 'Bihar'),
(261, 'Chandigarh', '30.75 N', '76.78 E', 'Chandigarh'),
(262, 'Ambikapur', '23.13 N', '83.20 E', 'Chhattisgarh'),
(263, 'Bhilai', '21.21 N', '81.38 E', 'Chhattisgarh'),
(264, 'Bilaspur', '22.09 N', '82.15 E', 'Chhattisgarh'),
(265, 'Charoda', '21.23 N', '81.50 E', 'Chhattisgarh'),
(266, 'Chirmiri', '23.21 N', '82.41 E', 'Chhattisgarh'),
(267, 'Dhamtari', '20.71 N', '81.55 E', 'Chhattisgarh'),
(268, 'Durg', '21.20 N', '81.28 E', 'Chhattisgarh'),
(269, 'Jagdalpur', '19.09 N', '82.03 E', 'Chhattisgarh'),
(270, 'Korba', '22.35 N', '82.69 E', 'Chhattisgarh'),
(271, 'Raigarh', '21.90 N', '83.39 E', 'Chhattisgarh'),
(272, 'Raipur', '21.24 N', '81.63 E', 'Chhattisgarh'),
(273, 'Rajnandgaon', '21.10 N', '81.04 E', 'Chhattisgarh'),
(274, 'Bhalswa Jahangirpur', '28.74 N', '77.17 E', 'Delhi'),
(275, 'Burari', '', '', 'Delhi'),
(276, 'Chilla Saroda Bangar', '', '', 'Delhi'),
(277, 'Dallo Pura', '', '', 'Delhi'),
(278, 'Delhi', '28.67 N', '77.21 E', 'Delhi'),
(279, 'Deoli', '28.49 N', '77.22 E', 'Delhi'),
(280, 'Dilli Cantonment', '28.57 N', '77.16 E', 'Delhi'),
(281, 'Gharoli', '', '', 'Delhi'),
(282, 'Gokalpur', '28.71 N', '77.28 E', 'Delhi'),
(283, 'Hastsal', '', '', 'Delhi'),
(284, 'Jaffrabad', '', '', 'Delhi'),
(285, 'Karawal Nagar', '', '', 'Delhi'),
(286, 'Khajuri Khas', '', '', 'Delhi'),
(287, 'Kirari Suleman Nagar', '', '', 'Delhi'),
(288, 'Mandoli', '', '', 'Delhi'),
(289, 'Mithe Pur', '', '', 'Delhi'),
(290, 'Molarband', '', '', 'Delhi'),
(291, 'Mundka', '', '', 'Delhi'),
(292, 'Mustafabad', '', '', 'Delhi'),
(293, 'Nangloi Jat', '28.68 N', '77.07 E', 'Delhi'),
(294, 'Ni Dilli', '28.60 N', '77.22 E', 'Delhi'),
(295, 'Pul Pehlad', '', '', 'Delhi'),
(296, 'Puth Kalan', '', '', 'Delhi'),
(297, 'Roshan Pura', '28.60 N', '76.99 E', 'Delhi'),
(298, 'Sadat Pur Gujran', '', '', 'Delhi'),
(299, 'Sultanpur Majra', '28.76 N', '77.06 E', 'Delhi'),
(300, 'Tajpul', '', '', 'Delhi'),
(301, 'Tigri', '28.50 N', '77.22 E', 'Delhi'),
(302, 'Ziauddin Pur', '', '', 'Delhi'),
(303, 'Madgaon', '15.28 N', '73.94 E', 'Goa'),
(304, 'Mormugao', '15.42 N', '73.78 E', 'Goa'),
(305, 'Panaji', '15.50 N', '73.81 E', 'Goa'),
(306, 'Ahmadabad', '23.03 N', '72.58 E', 'Gujarat'),
(307, 'Amreli', '21.61 N', '71.22 E', 'Gujarat'),
(308, 'Anand', '22.56 N', '72.95 E', 'Gujarat'),
(309, 'Anjar', '23.12 N', '70.02 E', 'Gujarat'),
(310, 'Bardoli', '21.12 N', '73.12 E', 'Gujarat'),
(311, 'Bharuch', '21.71 N', '72.97 E', 'Gujarat'),
(312, 'Bhavnagar', '21.79 N', '72.13 E', 'Gujarat'),
(313, 'Bhuj', '23.26 N', '69.66 E', 'Gujarat'),
(314, 'Borsad', '22.42 N', '72.90 E', 'Gujarat'),
(315, 'Botad', '22.18 N', '71.66 E', 'Gujarat'),
(316, 'Chandkheda', '23.15 N', '72.61 E', 'Gujarat'),
(317, 'Chandlodiya', '23.10 N', '72.56 E', 'Gujarat'),
(318, 'Dabhoi', '22.13 N', '73.41 E', 'Gujarat'),
(319, 'Dahod', '22.84 N', '74.25 E', 'Gujarat'),
(320, 'Dholka', '22.74 N', '72.44 E', 'Gujarat'),
(321, 'Dhoraji', '21.74 N', '70.44 E', 'Gujarat'),
(322, 'Dhrangadhra', '23.00 N', '71.46 E', 'Gujarat'),
(323, 'Disa', '24.26 N', '72.18 E', 'Gujarat'),
(324, 'Gandhidham', '23.07 N', '70.13 E', 'Gujarat'),
(325, 'Gandhinagar', '23.30 N', '72.63 E', 'Gujarat'),
(326, 'Ghatlodiya', '23.05 N', '72.55 E', 'Gujarat'),
(327, 'Godhra', '22.77 N', '73.60 E', 'Gujarat'),
(328, 'Gondal', '21.97 N', '70.80 E', 'Gujarat'),
(329, 'Himatnagar', '23.60 N', '72.96 E', 'Gujarat'),
(330, 'Jamnagar', '22.47 N', '70.07 E', 'Gujarat'),
(331, 'Jamnagar', '', '', 'Gujarat'),
(332, 'Jetpur', '21.75 N', '70.61 E', 'Gujarat'),
(333, 'Junagadh', '21.52 N', '70.45 E', 'Gujarat'),
(334, 'Kalol', '23.25 N', '72.49 E', 'Gujarat'),
(335, 'Keshod', '21.31 N', '70.23 E', 'Gujarat'),
(336, 'Khambhat', '22.32 N', '72.61 E', 'Gujarat'),
(337, 'Kundla', '21.35 N', '71.30 E', 'Gujarat'),
(338, 'Mahuva', '21.10 N', '71.75 E', 'Gujarat'),
(339, 'Mangrol', '21.12 N', '70.12 E', 'Gujarat'),
(340, 'Modasa', '23.47 N', '73.30 E', 'Gujarat'),
(341, 'Morvi', '22.82 N', '70.83 E', 'Gujarat'),
(342, 'Nadiad', '22.70 N', '72.85 E', 'Gujarat'),
(343, 'Navagam Ghed', '', '', 'Gujarat'),
(344, 'Navsari', '20.96 N', '72.92 E', 'Gujarat'),
(345, 'Palitana', '21.52 N', '71.83 E', 'Gujarat'),
(346, 'Patan', '23.86 N', '72.11 E', 'Gujarat'),
(347, 'Porbandar', '21.65 N', '69.60 E', 'Gujarat'),
(348, 'Puna', '', '', 'Gujarat'),
(349, 'Rajkot', '22.31 N', '70.79 E', 'Gujarat'),
(350, 'Ramod', '', '', 'Gujarat'),
(351, 'Ranip', '23.03 N', '72.54 E', 'Gujarat'),
(352, 'Siddhapur', '23.92 N', '72.37 E', 'Gujarat'),
(353, 'Sihor', '21.70 N', '71.97 E', 'Gujarat'),
(354, 'Surat', '21.20 N', '72.82 E', 'Gujarat'),
(355, 'Surendranagar', '22.71 N', '71.67 E', 'Gujarat'),
(356, 'Thaltej', '', '', 'Gujarat'),
(357, 'Una', '20.82 N', '71.03 E', 'Gujarat'),
(358, 'Unjha', '23.81 N', '72.38 E', 'Gujarat'),
(359, 'Upleta', '21.75 N', '70.27 E', 'Gujarat'),
(360, 'Vadodara', '22.31 N', '73.18 E', 'Gujarat'),
(361, 'Valsad', '20.62 N', '72.92 E', 'Gujarat'),
(362, 'Vapi', '20.37 N', '72.90 E', 'Gujarat'),
(363, 'Vastral', '', '', 'Gujarat'),
(364, 'Vejalpur', '', '', 'Gujarat'),
(365, 'Veraval', '20.92 N', '70.34 E', 'Gujarat'),
(366, 'Vijalpor', '', '', 'Gujarat'),
(367, 'Visnagar', '23.71 N', '72.54 E', 'Gujarat'),
(368, 'Wadhwan', '22.73 N', '71.72 E', 'Gujarat'),
(369, 'Ambala', '30.38 N', '76.77 E', 'Haryana'),
(370, 'Ambala Cantonment', '30.39 N', '76.86 E', 'Haryana'),
(371, 'Ambala Sadar', '30.35 N', '76.84 E', 'Haryana'),
(372, 'Bahadurgarh', '28.69 N', '76.92 E', 'Haryana'),
(373, 'Bhiwani', '28.81 N', '76.12 E', 'Haryana'),
(374, 'Charkhi Dadri', '28.60 N', '76.27 E', 'Haryana'),
(375, 'Dabwali', '29.95 N', '74.73 E', 'Haryana'),
(376, 'Faridabad', '28.38 N', '77.30 E', 'Haryana'),
(377, 'Gohana', '29.13 N', '76.70 E', 'Haryana'),
(378, 'Hisar', '29.17 N', '75.72 E', 'Haryana'),
(379, 'Jagadhri', '30.18 N', '77.29 E', 'Haryana'),
(380, 'Jind', '29.31 N', '76.30 E', 'Haryana'),
(381, 'Kaithal', '29.81 N', '76.40 E', 'Haryana'),
(382, 'Karnal', '29.69 N', '76.97 E', 'Haryana'),
(383, 'Narnaul', '28.04 N', '76.10 E', 'Haryana'),
(384, 'Narwana', '29.62 N', '76.12 E', 'Haryana'),
(385, 'Palwal', '28.15 N', '77.32 E', 'Haryana'),
(386, 'Panchkula', '30.70 N', '76.88 E', 'Haryana'),
(387, 'Panipat', '29.39 N', '76.96 E', 'Haryana'),
(388, 'Rewari', '28.19 N', '76.60 E', 'Haryana'),
(389, 'Rohtak', '28.90 N', '76.58 E', 'Haryana'),
(390, 'Sirsa', '29.53 N', '75.03 E', 'Haryana'),
(391, 'Sonipat', '28.99 N', '77.01 E', 'Haryana'),
(392, 'Thanesar', '29.98 N', '76.82 E', 'Haryana'),
(393, 'Tohana', '29.70 N', '75.90 E', 'Haryana'),
(394, 'Yamunanagar', '30.14 N', '77.28 E', 'Haryana'),
(395, 'Shimla', '31.11 N', '77.16 E', 'Himachal Pradesh'),
(396, 'Anantnag', '33.73 N', '75.15 E', 'Jammu and Kashmir'),
(397, 'Baramula', '34.20 N', '74.35 E', 'Jammu and Kashmir'),
(398, 'Bari Brahmana', '', '', 'Jammu and Kashmir'),
(399, 'Jammu', '32.71 N', '74.85 E', 'Jammu and Kashmir'),
(400, 'Kathua', '32.37 N', '75.52 E', 'Jammu and Kashmir'),
(401, 'Sopur', '34.30 N', '74.47 E', 'Jammu and Kashmir'),
(402, 'Srinagar', '34.09 N', '74.79 E', 'Jammu and Kashmir'),
(403, 'Udhampur', '32.93 N', '75.13 E', 'Jammu and Kashmir'),
(404, 'Adityapur', '22.80 N', '86.04 E', 'Jharkhand'),
(405, 'Bagbahra', '22.82 N', '86.20 E', 'Jharkhand'),
(406, 'Bhuli', '23.79 N', '86.38 E', 'Jharkhand'),
(407, 'Bokaro', '23.78 N', '85.96 E', 'Jharkhand'),
(408, 'Chaibasa', '22.56 N', '85.80 E', 'Jharkhand'),
(409, 'Chas', '23.65 N', '86.17 E', 'Jharkhand'),
(410, 'Daltenganj', '24.05 N', '84.06 E', 'Jharkhand'),
(411, 'Devghar', '24.49 N', '86.69 E', 'Jharkhand'),
(412, 'Dhanbad', '23.80 N', '86.42 E', 'Jharkhand'),
(413, 'Hazaribag', '24.01 N', '85.36 E', 'Jharkhand'),
(414, 'Jamshedpur', '22.79 N', '86.20 E', 'Jharkhand'),
(415, 'Jharia', '23.76 N', '86.42 E', 'Jharkhand'),
(416, 'Jhumri Tilaiya', '24.43 N', '85.52 E', 'Jharkhand'),
(417, 'Jorapokhar', '23.79 N', '86.36 E', 'Jharkhand'),
(418, 'Katras', '23.80 N', '86.28 E', 'Jharkhand'),
(419, 'Lohardaga', '23.43 N', '84.68 E', 'Jharkhand'),
(420, 'Mango', '22.85 N', '86.21 E', 'Jharkhand'),
(421, 'Phusro', '23.68 N', '85.86 E', 'Jharkhand'),
(422, 'Ramgarh', '23.63 N', '85.51 E', 'Jharkhand'),
(423, 'Ranchi', '23.36 N', '85.33 E', 'Jharkhand'),
(424, 'Sahibganj', '25.25 N', '87.62 E', 'Jharkhand'),
(425, 'Saunda', '23.64 N', '85.37 E', 'Jharkhand'),
(426, 'Sindari', '23.68 N', '86.49 E', 'Jharkhand'),
(427, 'Bagalkot', '16.19 N', '75.69 E', 'Karnataka'),
(428, 'Bangalore', '12.97 N', '77.56 E', 'Karnataka'),
(429, 'Basavakalyan', '17.87 N', '76.95 E', 'Karnataka'),
(430, 'Belgaum', '15.86 N', '74.50 E', 'Karnataka'),
(431, 'Bellary', '15.14 N', '76.91 E', 'Karnataka'),
(432, 'Bhadravati', '13.84 N', '75.69 E', 'Karnataka'),
(433, 'Bidar', '17.92 N', '77.52 E', 'Karnataka'),
(434, 'Bijapur', '16.83 N', '75.71 E', 'Karnataka'),
(435, 'Bommanahalli', '13.01 N', '77.63 E', 'Karnataka'),
(436, 'Byatarayanapura', '', '', 'Karnataka'),
(437, 'Challakere', '14.32 N', '76.65 E', 'Karnataka'),
(438, 'Chamrajnagar', '11.92 N', '76.95 E', 'Karnataka'),
(439, 'Channapatna', '12.66 N', '77.19 E', 'Karnataka'),
(440, 'Chik Ballapur', '13.47 N', '77.73 E', 'Karnataka'),
(441, 'Chikmagalur', '13.32 N', '75.76 E', 'Karnataka'),
(442, 'Chintamani', '13.40 N', '78.05 E', 'Karnataka'),
(443, 'Chitradurga', '14.23 N', '76.39 E', 'Karnataka'),
(444, 'Dasarahalli', '13.01 N', '77.49 E', 'Karnataka'),
(445, 'Davanagere', '14.46 N', '75.92 E', 'Karnataka'),
(446, 'Dod Ballapur', '13.30 N', '77.52 E', 'Karnataka'),
(447, 'Gadag', '15.44 N', '75.63 E', 'Karnataka'),
(448, 'Gangawati', '15.44 N', '76.52 E', 'Karnataka'),
(449, 'Gokak', '16.18 N', '74.81 E', 'Karnataka'),
(450, 'Gulbarga', '17.34 N', '76.82 E', 'Karnataka'),
(451, 'Harihar', '14.52 N', '75.80 E', 'Karnataka'),
(452, 'Hassan', '13.01 N', '76.08 E', 'Karnataka'),
(453, 'Haveri', '14.80 N', '75.40 E', 'Karnataka'),
(454, 'Hiriyur', '13.97 N', '76.60 E', 'Karnataka'),
(455, 'Hosakote', '', '', 'Karnataka'),
(456, 'Hospet', '15.28 N', '76.37 E', 'Karnataka'),
(457, 'Hubli', '15.36 N', '75.13 E', 'Karnataka'),
(458, 'Ilkal', '15.97 N', '76.13 E', 'Karnataka'),
(459, 'Jamkhandi', '16.51 N', '75.28 E', 'Karnataka'),
(460, 'Kanakapura', '12.54 N', '77.42 E', 'Karnataka'),
(461, 'Karwar', '14.82 N', '74.12 E', 'Karnataka'),
(462, 'Kolar', '13.14 N', '78.13 E', 'Karnataka'),
(463, 'Kollegal', '12.15 N', '77.12 E', 'Karnataka'),
(464, 'Koppal', '15.35 N', '76.15 E', 'Karnataka'),
(465, 'Krishnarajapura', '12.97 N', '77.74 E', 'Karnataka'),
(466, 'Mahadevapura', '', '', 'Karnataka'),
(467, 'Maisuru', '12.31 N', '76.65 E', 'Karnataka'),
(468, 'Mandya', '12.54 N', '76.89 E', 'Karnataka'),
(469, 'Mangaluru', '12.88 N', '74.84 E', 'Karnataka'),
(470, 'Nipani', '16.41 N', '74.38 E', 'Karnataka'),
(471, 'Pattanagere', '', '', 'Karnataka'),
(472, 'Puttur', '12.77 N', '75.22 E', 'Karnataka'),
(473, 'Rabkavi', '16.47 N', '75.11 E', 'Karnataka'),
(474, 'Raichur', '16.21 N', '77.35 E', 'Karnataka'),
(475, 'Ramanagaram', '12.72 N', '77.27 E', 'Karnataka'),
(476, 'Ranibennur', '14.62 N', '75.61 E', 'Karnataka'),
(477, 'Robertsonpet', '12.97 N', '78.28 E', 'Karnataka'),
(478, 'Sagar', '14.17 N', '75.03 E', 'Karnataka'),
(479, 'Shahabad', '17.13 N', '76.93 E', 'Karnataka'),
(480, 'Shahpur', '16.70 N', '76.83 E', 'Karnataka'),
(481, 'Shimoga', '13.93 N', '75.57 E', 'Karnataka'),
(482, 'Shorapur', '16.52 N', '76.75 E', 'Karnataka'),
(483, 'Sidlaghatta', '13.38 N', '77.87 E', 'Karnataka'),
(484, 'Sira', '13.75 N', '76.90 E', 'Karnataka'),
(485, 'Sirsi', '14.62 N', '74.85 E', 'Karnataka'),
(486, 'Tiptur', '13.27 N', '76.48 E', 'Karnataka'),
(487, 'Tumkur', '13.34 N', '77.10 E', 'Karnataka'),
(488, 'Udupi', '13.35 N', '74.75 E', 'Karnataka'),
(489, 'Ullal', '12.80 N', '74.85 E', 'Karnataka'),
(490, 'Yadgir', '16.77 N', '77.13 E', 'Karnataka'),
(491, 'Yelahanka', '13.10 N', '77.60 E', 'Karnataka'),
(492, 'Alappuzha', '9.50 N', '76.33 E', 'Kerala'),
(493, 'Beypur', '11.18 N', '75.82 E', 'Kerala'),
(494, 'Cheruvannur', '11.21 N', '75.84 E', 'Kerala'),
(495, 'Edakkara', '', '', 'Kerala'),
(496, 'Edathala', '10.03 N', '76.32 E', 'Kerala'),
(497, 'Kalamassery', '10.05 N', '76.27 E', 'Kerala'),
(498, 'Kannan Devan Hills', '', '', 'Kerala'),
(499, 'Kannangad', '12.34 N', '75.09 E', 'Kerala'),
(500, 'Kannur', '11.86 N', '75.35 E', 'Kerala'),
(501, 'Kayankulam', '9.17 N', '76.49 E', 'Kerala'),
(502, 'Kochi', '10.02 N', '76.22 E', 'Kerala'),
(503, 'Kollam', '8.89 N', '76.58 E', 'Kerala'),
(504, 'Kottayam', '9.60 N', '76.52 E', 'Kerala'),
(505, 'Koyilandi', '11.43 N', '75.70 E', 'Kerala'),
(506, 'Kozhikkod', '11.26 N', '75.78 E', 'Kerala'),
(507, 'Kunnamkulam', '10.65 N', '76.08 E', 'Kerala'),
(508, 'Malappuram', '11.07 N', '76.06 E', 'Kerala'),
(509, 'Manjeri', '11.12 N', '76.11 E', 'Kerala'),
(510, 'Nedumangad', '8.61 N', '77.00 E', 'Kerala'),
(511, 'Neyyattinkara', '8.40 N', '77.08 E', 'Kerala'),
(512, 'Palakkad', '10.78 N', '76.65 E', 'Kerala'),
(513, 'Pallichal', '', '', 'Kerala'),
(514, 'Payyannur', '12.10 N', '75.19 E', 'Kerala'),
(515, 'Ponnani', '10.78 N', '75.92 E', 'Kerala'),
(516, 'Talipparamba', '12.03 N', '75.36 E', 'Kerala'),
(517, 'Thalassery', '11.75 N', '75.49 E', 'Kerala'),
(518, 'Thiruvananthapuram', '8.51 N', '76.95 E', 'Kerala'),
(519, 'Thrippunithura', '9.94 N', '76.35 E', 'Kerala'),
(520, 'Thrissur', '10.52 N', '76.21 E', 'Kerala'),
(521, 'Tirur', '10.91 N', '75.92 E', 'Kerala'),
(522, 'Tiruvalla', '9.39 N', '76.57 E', 'Kerala'),
(523, 'Vadakara', '11.61 N', '75.58 E', 'Kerala'),
(524, 'Ashoknagar', '24.57 N', '77.72 E', 'Madhya Pradesh'),
(525, 'Balaghat', '21.80 N', '80.18 E', 'Madhya Pradesh'),
(526, 'Basoda', '23.85 N', '77.93 E', 'Madhya Pradesh'),
(527, 'Betul', '21.92 N', '77.90 E', 'Madhya Pradesh'),
(528, 'Bhind', '26.57 N', '78.77 E', 'Madhya Pradesh'),
(529, 'Bhopal', '23.24 N', '77.40 E', 'Madhya Pradesh'),
(530, 'BinaEtawa', '24.20 N', '78.20 E', 'Madhya Pradesh'),
(531, 'Burhanpur', '21.33 N', '76.22 E', 'Madhya Pradesh'),
(532, 'Chhatarpur', '24.92 N', '79.58 E', 'Madhya Pradesh'),
(533, 'Chhindwara', '22.07 N', '78.94 E', 'Madhya Pradesh'),
(534, 'Dabra', '25.90 N', '78.33 E', 'Madhya Pradesh'),
(535, 'Damoh', '23.85 N', '79.44 E', 'Madhya Pradesh'),
(536, 'Datia', '25.67 N', '78.45 E', 'Madhya Pradesh'),
(537, 'Dewas', '22.97 N', '76.05 E', 'Madhya Pradesh'),
(538, 'Dhar', '22.60 N', '75.29 E', 'Madhya Pradesh'),
(539, 'Gohad', '26.43 N', '78.45 E', 'Madhya Pradesh'),
(540, 'Guna', '24.65 N', '77.30 E', 'Madhya Pradesh'),
(541, 'Gwalior', '26.23 N', '78.17 E', 'Madhya Pradesh'),
(542, 'Harda', '22.33 N', '77.11 E', 'Madhya Pradesh'),
(543, 'Hoshangabad', '22.75 N', '77.71 E', 'Madhya Pradesh'),
(544, 'Indore', '22.72 N', '75.86 E', 'Madhya Pradesh'),
(545, 'Itarsi', '22.62 N', '77.76 E', 'Madhya Pradesh'),
(546, 'Jabalpur', '23.17 N', '79.94 E', 'Madhya Pradesh'),
(547, 'Jabalpur Cantonment', '23.16 N', '79.95 E', 'Madhya Pradesh'),
(548, 'Jaora', '23.64 N', '75.11 E', 'Madhya Pradesh'),
(549, 'Khandwa', '21.83 N', '76.35 E', 'Madhya Pradesh'),
(550, 'Khargone', '21.83 N', '75.60 E', 'Madhya Pradesh'),
(551, 'Mandidip', '23.10 N', '77.52 E', 'Madhya Pradesh'),
(552, 'Mandsaur', '24.07 N', '75.07 E', 'Madhya Pradesh'),
(553, 'Mau', '22.56 N', '75.75 E', 'Madhya Pradesh'),
(554, 'Morena', '26.51 N', '77.99 E', 'Madhya Pradesh'),
(555, 'Murwara', '23.85 N', '80.39 E', 'Madhya Pradesh'),
(556, 'Nagda', '23.46 N', '75.42 E', 'Madhya Pradesh'),
(557, 'Nimach', '24.47 N', '74.87 E', 'Madhya Pradesh'),
(558, 'Pithampur', '', '', 'Madhya Pradesh'),
(559, 'Raghogarh', '24.45 N', '77.20 E', 'Madhya Pradesh'),
(560, 'Ratlam', '23.35 N', '75.03 E', 'Madhya Pradesh'),
(561, 'Rewa', '24.53 N', '81.29 E', 'Madhya Pradesh'),
(562, 'Sagar', '23.85 N', '78.75 E', 'Madhya Pradesh'),
(563, 'Sarni', '22.04 N', '78.27 E', 'Madhya Pradesh'),
(564, 'Satna', '24.58 N', '80.83 E', 'Madhya Pradesh'),
(565, 'Sehore', '23.20 N', '77.08 E', 'Madhya Pradesh'),
(566, 'Sendhwa', '21.68 N', '75.10 E', 'Madhya Pradesh'),
(567, 'Seoni', '22.10 N', '79.55 E', 'Madhya Pradesh'),
(568, 'Shahdol', '23.30 N', '81.36 E', 'Madhya Pradesh'),
(569, 'Shajapur', '23.43 N', '76.27 E', 'Madhya Pradesh'),
(570, 'Sheopur', '25.67 N', '76.70 E', 'Madhya Pradesh'),
(571, 'Shivapuri', '25.43 N', '77.65 E', 'Madhya Pradesh'),
(572, 'Sidhi', '24.42 N', '81.88 E', 'Madhya Pradesh'),
(573, 'Singrauli', '23.84 N', '82.27 E', 'Madhya Pradesh'),
(574, 'Tikamgarh', '24.74 N', '78.83 E', 'Madhya Pradesh'),
(575, 'Ujjain', '23.19 N', '75.78 E', 'Madhya Pradesh'),
(576, 'Vidisha', '23.53 N', '77.80 E', 'Madhya Pradesh'),
(577, 'Achalpur', '21.26 N', '77.50 E', 'Maharashtra'),
(578, 'Ahmadnagar', '19.10 N', '74.74 E', 'Maharashtra'),
(579, 'Akola', '20.71 N', '77.00 E', 'Maharashtra'),
(580, 'Akot', '21.10 N', '77.05 E', 'Maharashtra'),
(581, 'Amalner', '21.05 N', '75.06 E', 'Maharashtra'),
(582, 'Ambajogai', '18.73 N', '76.38 E', 'Maharashtra'),
(583, 'Amravati', '20.95 N', '77.76 E', 'Maharashtra'),
(584, 'Anjangaon', '21.16 N', '77.31 E', 'Maharashtra'),
(585, 'Aurangabad', '19.89 N', '75.32 E', 'Maharashtra'),
(586, 'Badlapur', '19.15 N', '73.27 E', 'Maharashtra'),
(587, 'Ballarpur', '19.85 N', '79.35 E', 'Maharashtra'),
(588, 'Baramati', '18.15 N', '74.58 E', 'Maharashtra'),
(589, 'Barsi', '18.24 N', '75.69 E', 'Maharashtra'),
(590, 'Basmat', '19.32 N', '77.17 E', 'Maharashtra'),
(591, 'Bhadravati', '20.11 N', '79.12 E', 'Maharashtra'),
(592, 'Bhandara', '21.18 N', '79.65 E', 'Maharashtra'),
(593, 'Bhiwandi', '19.30 N', '73.05 E', 'Maharashtra'),
(594, 'Bhusawal', '21.05 N', '75.78 E', 'Maharashtra'),
(595, 'Bid', '18.99 N', '75.76 E', 'Maharashtra'),
(596, 'Mumbai', '18.96 N', '72.82 E', 'Maharashtra'),
(597, 'Buldana', '20.54 N', '76.18 E', 'Maharashtra'),
(598, 'Chalisgaon', '20.46 N', '74.99 E', 'Maharashtra'),
(599, 'Chandrapur', '19.96 N', '79.30 E', 'Maharashtra'),
(600, 'Chikhli', '20.35 N', '76.25 E', 'Maharashtra'),
(601, 'Chiplun', '17.53 N', '73.52 E', 'Maharashtra'),
(602, 'Chopda', '21.25 N', '75.28 E', 'Maharashtra'),
(603, 'Dahanu', '19.97 N', '72.73 E', 'Maharashtra'),
(604, 'Deolali', '19.95 N', '73.84 E', 'Maharashtra'),
(605, 'Dhule', '20.90 N', '74.77 E', 'Maharashtra'),
(606, 'Digdoh', '', '', 'Maharashtra'),
(607, 'Diglur', '18.55 N', '77.60 E', 'Maharashtra'),
(608, 'Gadchiroli', '20.17 N', '80.00 E', 'Maharashtra'),
(609, 'Gondiya', '21.47 N', '80.20 E', 'Maharashtra'),
(610, 'Hinganghat', '20.56 N', '78.83 E', 'Maharashtra'),
(611, 'Hingoli', '19.72 N', '77.14 E', 'Maharashtra'),
(612, 'Ichalkaranji', '16.69 N', '74.46 E', 'Maharashtra'),
(613, 'Jalgaon', '21.01 N', '75.56 E', 'Maharashtra'),
(614, 'Jalna', '19.85 N', '75.88 E', 'Maharashtra'),
(615, 'Kalyan', '19.25 N', '73.16 E', 'Maharashtra'),
(616, 'Kamthi', '21.23 N', '79.20 E', 'Maharashtra'),
(617, 'Karanja', '20.48 N', '77.48 E', 'Maharashtra'),
(618, 'Khadki', '18.57 N', '73.83 E', 'Maharashtra'),
(619, 'Khamgaon', '20.70 N', '76.56 E', 'Maharashtra'),
(620, 'Khopoli', '18.78 N', '73.33 E', 'Maharashtra'),
(621, 'Kolhapur', '16.70 N', '74.22 E', 'Maharashtra'),
(622, 'Kopargaon', '19.88 N', '74.48 E', 'Maharashtra'),
(623, 'Latur', '18.41 N', '76.58 E', 'Maharashtra'),
(624, 'Lonavale', '18.75 N', '73.42 E', 'Maharashtra'),
(625, 'Malegaon', '20.56 N', '74.52 E', 'Maharashtra'),
(626, 'Malkapur', '20.90 N', '76.19 E', 'Maharashtra'),
(627, 'Manmad', '20.26 N', '74.43 E', 'Maharashtra'),
(628, 'Mira Bhayandar', '19.29 N', '72.85 E', 'Maharashtra'),
(629, 'Nagpur', '21.16 N', '79.08 E', 'Maharashtra'),
(630, 'Nalasopara', '19.43 N', '72.78 E', 'Maharashtra'),
(631, 'Nanded', '19.17 N', '77.29 E', 'Maharashtra'),
(632, 'Nandurbar', '21.38 N', '74.23 E', 'Maharashtra'),
(633, 'Nashik', '20.01 N', '73.78 E', 'Maharashtra'),
(634, 'Navghar', '19.34 N', '72.90 E', 'Maharashtra'),
(635, 'Navi Mumbai', '19.11 N', '73.06 E', 'Maharashtra'),
(636, 'Navi Mumbai', '19.00 N', '73.10 E', 'Maharashtra'),
(637, 'Osmanabad', '18.17 N', '76.03 E', 'Maharashtra'),
(638, 'Palghar', '19.68 N', '72.75 E', 'Maharashtra'),
(639, 'Pandharpur', '17.68 N', '75.31 E', 'Maharashtra'),
(640, 'Parbhani', '19.27 N', '76.76 E', 'Maharashtra'),
(641, 'Phaltan', '17.98 N', '74.43 E', 'Maharashtra'),
(642, 'Pimpri', '18.62 N', '73.80 E', 'Maharashtra'),
(643, 'Pune', '18.53 N', '73.84 E', 'Maharashtra'),
(644, 'Pune Cantonment', '18.50 N', '73.88 E', 'Maharashtra'),
(645, 'Pusad', '19.91 N', '77.57 E', 'Maharashtra'),
(646, 'Ratnagiri', '17.00 N', '73.29 E', 'Maharashtra'),
(647, 'SangliMiraj', '16.86 N', '74.57 E', 'Maharashtra'),
(648, 'Satara', '17.70 N', '74.00 E', 'Maharashtra'),
(649, 'Shahada', '21.55 N', '74.47 E', 'Maharashtra'),
(650, 'Shegaon', '20.78 N', '76.68 E', 'Maharashtra'),
(651, 'Shirpur', '21.35 N', '74.88 E', 'Maharashtra'),
(652, 'Sholapur', '17.67 N', '75.89 E', 'Maharashtra'),
(653, 'Shrirampur', '19.63 N', '74.64 E', 'Maharashtra'),
(654, 'Sillod', '20.30 N', '75.65 E', 'Maharashtra'),
(655, 'Thana', '19.20 N', '72.97 E', 'Maharashtra'),
(656, 'Udgir', '18.40 N', '77.11 E', 'Maharashtra'),
(657, 'Ulhasnagar', '19.23 N', '73.15 E', 'Maharashtra'),
(658, 'Uran Islampur', '17.05 N', '74.27 E', 'Maharashtra'),
(659, 'Vasai', '19.36 N', '72.80 E', 'Maharashtra'),
(660, 'Virar', '19.47 N', '72.79 E', 'Maharashtra'),
(661, 'Wadi', '', '', 'Maharashtra'),
(662, 'Wani', '20.07 N', '78.95 E', 'Maharashtra'),
(663, 'Wardha', '20.75 N', '78.60 E', 'Maharashtra'),
(664, 'Warud', '21.47 N', '78.27 E', 'Maharashtra'),
(665, 'Washim', '20.10 N', '77.13 E', 'Maharashtra'),
(666, 'Yavatmal', '20.41 N', '78.13 E', 'Maharashtra'),
(667, 'Imphal', '24.79 N', '93.94 E', 'Manipur'),
(668, 'Shillong', '25.57 N', '91.87 E', 'Meghalaya'),
(669, 'Tura', '25.52 N', '90.22 E', 'Meghalaya'),
(670, 'Aizawl', '23.71 N', '92.71 E', 'Mizoram'),
(671, 'Lunglei', '22.88 N', '92.73 E', 'Mizoram'),
(672, 'Dimapur', '25.92 N', '93.73 E', 'Nagaland'),
(673, 'Kohima', '25.67 N', '94.11 E', 'Nagaland'),
(674, 'Wokha', '26.10 N', '94.27 E', 'Nagaland'),
(675, 'Balangir', '20.71 N', '83.50 E', 'Orissa'),
(676, 'Baleshwar', '21.49 N', '86.95 E', 'Orissa'),
(677, 'Barbil', '22.12 N', '85.40 E', 'Orissa'),
(678, 'Bargarh', '21.34 N', '83.61 E', 'Orissa'),
(679, 'Baripada', '21.95 N', '86.73 E', 'Orissa'),
(680, 'Bhadrak', '21.06 N', '86.52 E', 'Orissa'),
(681, 'Bhawanipatna', '19.91 N', '83.17 E', 'Orissa'),
(682, 'Bhubaneswar', '20.27 N', '85.84 E', 'Orissa'),
(683, 'Brahmapur', '19.32 N', '84.80 E', 'Orissa'),
(684, 'Brajrajnagar', '21.82 N', '83.91 E', 'Orissa'),
(685, 'Dhenkanal', '20.67 N', '85.60 E', 'Orissa'),
(686, 'Jaypur', '18.86 N', '82.56 E', 'Orissa'),
(687, 'Jharsuguda', '21.87 N', '84.01 E', 'Orissa'),
(688, 'Kataka', '20.47 N', '85.88 E', 'Orissa'),
(689, 'Kendujhar', '21.63 N', '85.58 E', 'Orissa'),
(690, 'Paradwip', '20.32 N', '86.62 E', 'Orissa'),
(691, 'Puri', '19.81 N', '85.83 E', 'Orissa'),
(692, 'Raurkela', '22.24 N', '84.81 E', 'Orissa'),
(693, 'Raurkela Industrial Township', '', '', 'Orissa'),
(694, 'Rayagada', '19.18 N', '83.41 E', 'Orissa'),
(695, 'Sambalpur', '21.47 N', '83.97 E', 'Orissa'),
(696, 'Sunabeda', '18.69 N', '82.86 E', 'Orissa'),
(697, 'Karaikal', '10.93 N', '79.83 E', 'Pondicherry'),
(698, 'Ozhukarai', '11.94 N', '79.77 E', 'Pondicherry'),
(699, 'Pondicherry', '11.94 N', '79.83 E', 'Pondicherry'),
(700, 'Abohar', '30.14 N', '74.20 E', 'Punjab'),
(701, 'Amritsar', '31.64 N', '74.87 E', 'Punjab'),
(702, 'Barnala', '30.39 N', '75.54 E', 'Punjab'),
(703, 'Batala', '31.82 N', '75.21 E', 'Punjab'),
(704, 'Bathinda', '30.17 N', '74.97 E', 'Punjab'),
(705, 'Dhuri', '30.37 N', '75.87 E', 'Punjab'),
(706, 'Faridkot', '30.68 N', '74.74 E', 'Punjab'),
(707, 'Fazilka', '30.41 N', '74.02 E', 'Punjab'),
(708, 'Firozpur', '30.92 N', '74.61 E', 'Punjab'),
(709, 'Firozpur Cantonment', '30.95 N', '74.60 E', 'Punjab'),
(710, 'Gobindgarh', '30.66 N', '76.31 E', 'Punjab'),
(711, 'Gurdaspur', '32.04 N', '75.40 E', 'Punjab'),
(712, 'Hoshiarpur', '31.53 N', '75.91 E', 'Punjab'),
(713, 'Jagraon', '30.78 N', '75.48 E', 'Punjab'),
(714, 'Jalandhar', '31.33 N', '75.57 E', 'Punjab'),
(715, 'Kapurthala', '31.38 N', '75.38 E', 'Punjab'),
(716, 'Khanna', '30.71 N', '76.21 E', 'Punjab'),
(717, 'Kot Kapura', '30.59 N', '74.80 E', 'Punjab'),
(718, 'Ludhiana', '30.91 N', '75.84 E', 'Punjab'),
(719, 'Malaut', '30.23 N', '74.48 E', 'Punjab'),
(720, 'Maler Kotla', '30.54 N', '75.87 E', 'Punjab'),
(721, 'Mansa', '29.98 N', '75.39 E', 'Punjab'),
(722, 'Moga', '30.82 N', '75.17 E', 'Punjab'),
(723, 'Mohali', '30.78 N', '76.69 E', 'Punjab'),
(724, 'Pathankot', '32.27 N', '75.64 E', 'Punjab'),
(725, 'Patiala', '30.32 N', '76.39 E', 'Punjab'),
(726, 'Phagwara', '31.22 N', '75.76 E', 'Punjab'),
(727, 'Rajpura', '30.48 N', '76.59 E', 'Punjab'),
(728, 'Rupnagar', '30.98 N', '76.52 E', 'Punjab'),
(729, 'Samana', '30.15 N', '76.20 E', 'Punjab'),
(730, 'Sangrur', '30.25 N', '75.84 E', 'Punjab'),
(731, 'Sirhind', '30.65 N', '76.38 E', 'Punjab'),
(732, 'Sunam', '30.13 N', '75.80 E', 'Punjab'),
(733, 'Tarn Taran', '31.45 N', '74.92 E', 'Punjab'),
(734, 'Ajmer', '26.45 N', '74.64 E', 'Rajasthan'),
(735, 'Alwar', '27.56 N', '76.60 E', 'Rajasthan'),
(736, 'Balotra', '25.83 N', '72.23 E', 'Rajasthan'),
(737, 'Banswara', '23.54 N', '74.44 E', 'Rajasthan'),
(738, 'Baran', '25.10 N', '76.51 E', 'Rajasthan'),
(739, 'Bari', '26.65 N', '77.60 E', 'Rajasthan'),
(740, 'Barmer', '25.75 N', '71.39 E', 'Rajasthan'),
(741, 'Beawar', '26.10 N', '74.30 E', 'Rajasthan'),
(742, 'Bharatpur', '27.23 N', '77.49 E', 'Rajasthan'),
(743, 'Bhilwara', '25.35 N', '74.63 E', 'Rajasthan'),
(744, 'Bhiwadi', '', '', 'Rajasthan'),
(745, 'Bikaner', '28.03 N', '73.32 E', 'Rajasthan'),
(746, 'Bundi', '25.45 N', '75.63 E', 'Rajasthan'),
(747, 'Chittaurgarh', '24.89 N', '74.63 E', 'Rajasthan'),
(748, 'Chomun', '27.17 N', '75.72 E', 'Rajasthan'),
(749, 'Churu', '28.31 N', '74.96 E', 'Rajasthan'),
(750, 'Daosa', '26.88 N', '76.33 E', 'Rajasthan'),
(751, 'Dhaulpur', '26.70 N', '77.87 E', 'Rajasthan'),
(752, 'Didwana', '27.39 N', '74.57 E', 'Rajasthan'),
(753, 'Fatehpur', '27.99 N', '74.95 E', 'Rajasthan'),
(754, 'Ganganagar', '29.93 N', '73.86 E', 'Rajasthan'),
(755, 'Gangapur', '26.47 N', '76.72 E', 'Rajasthan'),
(756, 'Hanumangarh', '29.62 N', '74.29 E', 'Rajasthan'),
(757, 'Hindaun', '26.74 N', '77.02 E', 'Rajasthan'),
(758, 'Jaipur', '26.92 N', '75.80 E', 'Rajasthan'),
(759, 'Jaisalmer', '26.92 N', '70.90 E', 'Rajasthan'),
(760, 'Jalor', '25.35 N', '72.62 E', 'Rajasthan'),
(761, 'Jhalawar', '24.60 N', '76.15 E', 'Rajasthan'),
(762, 'Jhunjhunun', '28.13 N', '75.39 E', 'Rajasthan'),
(763, 'Jodhpur', '26.29 N', '73.02 E', 'Rajasthan'),
(764, 'Karauli', '26.50 N', '77.02 E', 'Rajasthan'),
(765, 'Kishangarh', '26.58 N', '74.86 E', 'Rajasthan'),
(766, 'Kota', '25.18 N', '75.83 E', 'Rajasthan'),
(767, 'Kuchaman', '27.15 N', '74.85 E', 'Rajasthan'),
(768, 'Ladnun', '27.64 N', '74.38 E', 'Rajasthan'),
(769, 'Makrana', '27.05 N', '74.72 E', 'Rajasthan'),
(770, 'Nagaur', '27.21 N', '73.73 E', 'Rajasthan'),
(771, 'Nawalgarh', '27.85 N', '75.27 E', 'Rajasthan'),
(772, 'Nimbahera', '24.62 N', '74.68 E', 'Rajasthan'),
(773, 'Nokha', '27.60 N', '73.42 E', 'Rajasthan'),
(774, 'Pali', '25.79 N', '73.32 E', 'Rajasthan'),
(775, 'Rajsamand', '25.07 N', '73.88 E', 'Rajasthan'),
(776, 'Ratangarh', '28.09 N', '74.60 E', 'Rajasthan'),
(777, 'Sardarshahr', '28.45 N', '74.48 E', 'Rajasthan'),
(778, 'Sawai Madhopur', '26.03 N', '76.34 E', 'Rajasthan'),
(779, 'Sikar', '27.61 N', '75.13 E', 'Rajasthan'),
(780, 'Sujangarh', '27.70 N', '74.46 E', 'Rajasthan'),
(781, 'Suratgarh', '29.32 N', '73.90 E', 'Rajasthan'),
(782, 'Tonk', '26.17 N', '75.78 E', 'Rajasthan'),
(783, 'Udaipur', '24.58 N', '73.69 E', 'Rajasthan'),
(784, 'Alandur', '13.03 N', '80.23 E', 'Tamil Nadu'),
(785, 'Ambattur', '13.11 N', '80.17 E', 'Tamil Nadu'),
(786, 'Ambur', '12.80 N', '78.72 E', 'Tamil Nadu'),
(787, 'Arakonam', '13.08 N', '79.67 E', 'Tamil Nadu'),
(788, 'Arani', '12.68 N', '79.28 E', 'Tamil Nadu'),
(789, 'Aruppukkottai', '9.51 N', '78.09 E', 'Tamil Nadu'),
(790, 'Attur', '11.60 N', '78.60 E', 'Tamil Nadu'),
(791, 'Avadi', '13.12 N', '80.11 E', 'Tamil Nadu'),
(792, 'Avaniapuram', '9.86 N', '78.12 E', 'Tamil Nadu'),
(793, 'Bodinayakkanur', '10.01 N', '77.35 E', 'Tamil Nadu'),
(794, 'Chengalpattu', '12.70 N', '79.97 E', 'Tamil Nadu'),
(795, 'Dharapuram', '10.74 N', '77.52 E', 'Tamil Nadu'),
(796, 'Dharmapuri', '12.13 N', '78.16 E', 'Tamil Nadu'),
(797, 'Dindigul', '10.36 N', '77.97 E', 'Tamil Nadu'),
(798, 'Erode', '11.35 N', '77.73 E', 'Tamil Nadu'),
(799, 'Gopichettipalaiyam', '11.46 N', '77.43 E', 'Tamil Nadu'),
(800, 'Gudalur', '11.76 N', '79.75 E', 'Tamil Nadu'),
(801, 'Gudiyattam', '12.95 N', '78.86 E', 'Tamil Nadu'),
(802, 'Hosur', '12.72 N', '77.82 E', 'Tamil Nadu'),
(803, 'Idappadi', '11.58 N', '77.85 E', 'Tamil Nadu'),
(804, 'Kadayanallur', '9.08 N', '77.35 E', 'Tamil Nadu'),
(805, 'Kambam', '9.74 N', '77.28 E', 'Tamil Nadu'),
(806, 'Kanchipuram', '12.84 N', '79.70 E', 'Tamil Nadu'),
(807, 'Karur', '10.96 N', '78.07 E', 'Tamil Nadu'),
(808, 'Kavundampalaiyam', '11.05 N', '76.92 E', 'Tamil Nadu'),
(809, 'Kovilpatti', '9.19 N', '77.86 E', 'Tamil Nadu'),
(810, 'Koyampattur', '11.01 N', '76.96 E', 'Tamil Nadu'),
(811, 'Krishnagiri', '12.54 N', '78.21 E', 'Tamil Nadu'),
(812, 'Kumarapalaiyam', '11.44 N', '77.73 E', 'Tamil Nadu'),
(813, 'Kumbakonam', '10.97 N', '79.38 E', 'Tamil Nadu'),
(814, 'Kuniyamuthur', '10.98 N', '76.95 E', 'Tamil Nadu'),
(815, 'Kurichi', '10.92 N', '76.96 E', 'Tamil Nadu'),
(816, 'Madhavaram', '13.02 N', '80.26 E', 'Tamil Nadu'),
(817, 'Madras', '13.09 N', '80.27 E', 'Tamil Nadu'),
(818, 'Madurai', '9.92 N', '78.12 E', 'Tamil Nadu'),
(819, 'Maduravoyal', '', '', 'Tamil Nadu'),
(820, 'Mannargudi', '10.67 N', '79.45 E', 'Tamil Nadu'),
(821, 'Mayiladuthurai', '11.11 N', '79.65 E', 'Tamil Nadu'),
(822, 'Mettupalayam', '11.30 N', '76.94 E', 'Tamil Nadu'),
(823, 'Mettur', '11.80 N', '77.80 E', 'Tamil Nadu'),
(824, 'Nagapattinam', '10.80 N', '79.84 E', 'Tamil Nadu'),
(825, 'Nagercoil', '8.18 N', '77.43 E', 'Tamil Nadu'),
(826, 'Namakkal', '11.23 N', '78.17 E', 'Tamil Nadu'),
(827, 'Nerkunram', '13.04 N', '80.26 E', 'Tamil Nadu'),
(828, 'Neyveli', '11.62 N', '79.48 E', 'Tamil Nadu'),
(829, 'Pallavaram', '12.99 N', '80.16 E', 'Tamil Nadu'),
(830, 'Pammal', '12.97 N', '80.11 E', 'Tamil Nadu'),
(831, 'Pannuratti', '11.78 N', '79.55 E', 'Tamil Nadu'),
(832, 'Paramakkudi', '9.54 N', '78.59 E', 'Tamil Nadu'),
(833, 'Pattukkottai', '10.43 N', '79.31 E', 'Tamil Nadu'),
(834, 'Pollachi', '10.67 N', '77.00 E', 'Tamil Nadu'),
(835, 'Pudukkottai', '10.39 N', '78.82 E', 'Tamil Nadu'),
(836, 'Puliyankudi', '9.18 N', '77.40 E', 'Tamil Nadu'),
(837, 'Punamalli', '13.05 N', '80.11 E', 'Tamil Nadu'),
(838, 'Rajapalaiyam', '9.46 N', '77.55 E', 'Tamil Nadu'),
(839, 'Ramanathapuram', '9.37 N', '78.83 E', 'Tamil Nadu'),
(840, 'Salem', '11.67 N', '78.16 E', 'Tamil Nadu'),
(841, 'Sankarankoil', '9.17 N', '77.54 E', 'Tamil Nadu'),
(842, 'Sivakasi', '9.46 N', '77.79 E', 'Tamil Nadu'),
(843, 'Srivilliputtur', '9.52 N', '77.63 E', 'Tamil Nadu'),
(844, 'Tambaram', '12.93 N', '80.12 E', 'Tamil Nadu'),
(845, 'Tenkasi', '8.96 N', '77.31 E', 'Tamil Nadu'),
(846, 'Thanjavur', '10.79 N', '79.13 E', 'Tamil Nadu'),
(847, 'Theni Allinagaram', '10.02 N', '77.48 E', 'Tamil Nadu'),
(848, 'Thiruthangal', '9.48 N', '77.83 E', 'Tamil Nadu'),
(849, 'Thiruvarur', '10.78 N', '79.64 E', 'Tamil Nadu'),
(850, 'Thuthukkudi', '8.81 N', '78.14 E', 'Tamil Nadu'),
(851, 'Tindivanam', '12.24 N', '79.65 E', 'Tamil Nadu'),
(852, 'Tiruchchirappalli', '10.81 N', '78.69 E', 'Tamil Nadu'),
(853, 'Tiruchengode', '11.38 N', '77.90 E', 'Tamil Nadu'),
(854, 'Tirunelveli', '8.73 N', '77.69 E', 'Tamil Nadu'),
(855, 'Tirupathur', '12.50 N', '78.57 E', 'Tamil Nadu'),
(856, 'Tiruppur', '11.09 N', '77.35 E', 'Tamil Nadu'),
(857, 'Tiruvannamalai', '12.24 N', '79.07 E', 'Tamil Nadu'),
(858, 'Tiruvottiyur', '13.16 N', '80.29 E', 'Tamil Nadu'),
(859, 'Udagamandalam', '11.42 N', '76.69 E', 'Tamil Nadu'),
(860, 'Udumalaipettai', '10.58 N', '77.24 E', 'Tamil Nadu'),
(861, 'Valparai', '10.38 N', '76.99 E', 'Tamil Nadu'),
(862, 'Vaniyambadi', '12.69 N', '78.60 E', 'Tamil Nadu'),
(863, 'Velampalaiyam', '', '', 'Tamil Nadu'),
(864, 'Velluru', '12.92 N', '79.13 E', 'Tamil Nadu'),
(865, 'Viluppuram', '11.95 N', '79.49 E', 'Tamil Nadu'),
(866, 'Virappanchatram', '11.40 N', '77.70 E', 'Tamil Nadu'),
(867, 'Virudhachalam', '11.51 N', '79.32 E', 'Tamil Nadu'),
(868, 'Virudunagar', '9.59 N', '77.95 E', 'Tamil Nadu'),
(869, 'Agartala', '23.84 N', '91.27 E', 'Tripura'),
(870, 'Agartala MCl', '', '', 'Tripura'),
(871, 'Badharghat', '', '', 'Tripura'),
(872, 'Agra', '27.19 N', '78.01 E', 'Uttar Pradesh'),
(873, 'Aligarh', '27.89 N', '78.06 E', 'Uttar Pradesh'),
(874, 'Allahabad', '25.45 N', '81.84 E', 'Uttar Pradesh'),
(875, 'Amroha', '28.91 N', '78.46 E', 'Uttar Pradesh'),
(876, 'Aonla', '28.28 N', '79.15 E', 'Uttar Pradesh'),
(877, 'Auraiya', '26.47 N', '79.50 E', 'Uttar Pradesh'),
(878, 'Ayodhya', '26.80 N', '82.20 E', 'Uttar Pradesh'),
(879, 'Azamgarh', '26.07 N', '83.18 E', 'Uttar Pradesh'),
(880, 'Baheri', '28.78 N', '79.50 E', 'Uttar Pradesh'),
(881, 'Bahraich', '27.58 N', '81.59 E', 'Uttar Pradesh'),
(882, 'Ballia', '25.76 N', '84.15 E', 'Uttar Pradesh'),
(883, 'Balrampur', '27.43 N', '82.18 E', 'Uttar Pradesh'),
(884, 'Banda', '25.48 N', '80.33 E', 'Uttar Pradesh'),
(885, 'Baraut', '29.10 N', '77.26 E', 'Uttar Pradesh'),
(886, 'Bareli', '28.36 N', '79.41 E', 'Uttar Pradesh'),
(887, 'Basti', '26.80 N', '82.74 E', 'Uttar Pradesh'),
(888, 'Behta Hajipur', '', '', 'Uttar Pradesh'),
(889, 'Bela', '25.92 N', '81.99 E', 'Uttar Pradesh'),
(890, 'Bhadohi', '25.40 N', '82.56 E', 'Uttar Pradesh'),
(891, 'Bijnor', '29.38 N', '78.13 E', 'Uttar Pradesh'),
(892, 'Bisalpur', '28.30 N', '79.80 E', 'Uttar Pradesh'),
(893, 'Biswan', '27.50 N', '81.00 E', 'Uttar Pradesh'),
(894, 'Budaun', '28.04 N', '79.12 E', 'Uttar Pradesh'),
(895, 'Bulandshahr', '28.41 N', '77.85 E', 'Uttar Pradesh'),
(896, 'Chandausi', '28.46 N', '78.78 E', 'Uttar Pradesh'),
(897, 'Chandpur', '29.14 N', '78.27 E', 'Uttar Pradesh'),
(898, 'Chhibramau', '27.15 N', '79.52 E', 'Uttar Pradesh'),
(899, 'Chitrakut Dham', '25.20 N', '80.84 E', 'Uttar Pradesh'),
(900, 'Dadri', '28.57 N', '77.55 E', 'Uttar Pradesh'),
(901, 'Deoband', '29.70 N', '77.67 E', 'Uttar Pradesh'),
(902, 'Deoria', '26.51 N', '83.78 E', 'Uttar Pradesh'),
(903, 'Etah', '27.57 N', '78.64 E', 'Uttar Pradesh'),
(904, 'Etawah', '26.78 N', '79.01 E', 'Uttar Pradesh'),
(905, 'Faizabad', '26.78 N', '82.14 E', 'Uttar Pradesh'),
(906, 'Faridpur', '28.22 N', '79.53 E', 'Uttar Pradesh'),
(907, 'Farrukhabad', '27.40 N', '79.57 E', 'Uttar Pradesh'),
(908, 'Fatehpur', '25.93 N', '80.81 E', 'Uttar Pradesh'),
(909, 'Firozabad', '27.15 N', '78.39 E', 'Uttar Pradesh'),
(910, 'Gajraula', '28.85 N', '78.23 E', 'Uttar Pradesh'),
(911, 'Ganga Ghat', '26.52 N', '80.45 E', 'Uttar Pradesh'),
(912, 'Gangoh', '29.77 N', '77.25 E', 'Uttar Pradesh'),
(913, 'Ghaziabad', '28.66 N', '77.41 E', 'Uttar Pradesh'),
(914, 'Ghazipur', '25.59 N', '83.59 E', 'Uttar Pradesh'),
(915, 'Gola Gokarannath', '28.08 N', '80.47 E', 'Uttar Pradesh'),
(916, 'Gonda', '27.14 N', '81.95 E', 'Uttar Pradesh'),
(917, 'Gorakhpur', '26.76 N', '83.36 E', 'Uttar Pradesh'),
(918, 'Hapur', '28.73 N', '77.77 E', 'Uttar Pradesh'),
(919, 'Hardoi', '27.42 N', '80.12 E', 'Uttar Pradesh'),
(920, 'Hasanpur', '28.72 N', '78.28 E', 'Uttar Pradesh'),
(921, 'Hathras', '27.60 N', '78.04 E', 'Uttar Pradesh'),
(922, 'Jahangirabad', '28.42 N', '78.10 E', 'Uttar Pradesh'),
(923, 'Jalaun', '26.15 N', '79.35 E', 'Uttar Pradesh'),
(924, 'Jaunpur', '25.76 N', '82.69 E', 'Uttar Pradesh'),
(925, 'Jhansi', '25.45 N', '78.56 E', 'Uttar Pradesh'),
(926, 'Kadi', '23.31 N', '72.33 E', 'Uttar Pradesh'),
(927, 'Kairana', '29.40 N', '77.20 E', 'Uttar Pradesh'),
(928, 'Kannauj', '27.06 N', '79.91 E', 'Uttar Pradesh'),
(929, 'Kanpur', '26.47 N', '80.33 E', 'Uttar Pradesh'),
(930, 'Kanpur Cantonment', '26.50 N', '80.28 E', 'Uttar Pradesh'),
(931, 'Kasganj', '27.81 N', '78.63 E', 'Uttar Pradesh'),
(932, 'Khatauli', '29.28 N', '77.72 E', 'Uttar Pradesh'),
(933, 'Khora', '', '', 'Uttar Pradesh'),
(934, 'Khurja', '28.26 N', '77.85 E', 'Uttar Pradesh'),
(935, 'Kiratpur', '29.52 N', '78.20 E', 'Uttar Pradesh'),
(936, 'Kosi Kalan', '27.80 N', '77.44 E', 'Uttar Pradesh'),
(937, 'Laharpur', '27.72 N', '80.90 E', 'Uttar Pradesh'),
(938, 'Lakhimpur', '27.95 N', '80.78 E', 'Uttar Pradesh'),
(939, 'Lakhnau', '26.85 N', '80.92 E', 'Uttar Pradesh'),
(940, 'Lakhnau Cantonment', '26.81 N', '80.97 E', 'Uttar Pradesh'),
(941, 'Lalitpur', '24.70 N', '78.41 E', 'Uttar Pradesh'),
(942, 'Loni', '28.75 N', '77.28 E', 'Uttar Pradesh'),
(943, 'Mahoba', '25.30 N', '79.87 E', 'Uttar Pradesh'),
(944, 'Mainpuri', '27.24 N', '79.02 E', 'Uttar Pradesh'),
(945, 'Mathura', '27.50 N', '77.68 E', 'Uttar Pradesh'),
(946, 'Mau', '25.96 N', '83.56 E', 'Uttar Pradesh'),
(947, 'Mauranipur', '25.24 N', '79.13 E', 'Uttar Pradesh'),
(948, 'Mawana', '29.11 N', '77.91 E', 'Uttar Pradesh'),
(949, 'Mirat', '28.99 N', '77.70 E', 'Uttar Pradesh'),
(950, 'Mirat Cantonment', '29.02 N', '77.67 E', 'Uttar Pradesh'),
(951, 'Mirzapur', '25.16 N', '82.56 E', 'Uttar Pradesh'),
(952, 'Modinagar', '28.92 N', '77.62 E', 'Uttar Pradesh'),
(953, 'Moradabad', '28.84 N', '78.76 E', 'Uttar Pradesh'),
(954, 'Mubarakpur', '26.09 N', '83.28 E', 'Uttar Pradesh'),
(955, 'Mughal Sarai', '25.30 N', '83.12 E', 'Uttar Pradesh'),
(956, 'Muradnagar', '28.78 N', '77.50 E', 'Uttar Pradesh');
INSERT INTO `statelist` (`city_id`, `city_name`, `latitude`, `longitude`, `state`) VALUES
(957, 'Muzaffarnagar', '29.48 N', '77.69 E', 'Uttar Pradesh'),
(958, 'Nagina', '29.45 N', '78.43 E', 'Uttar Pradesh'),
(959, 'Najibabad', '29.62 N', '78.33 E', 'Uttar Pradesh'),
(960, 'Nawabganj', '26.94 N', '81.19 E', 'Uttar Pradesh'),
(961, 'Noida', '28.58 N', '77.33 E', 'Uttar Pradesh'),
(962, 'Obra', '24.42 N', '82.98 E', 'Uttar Pradesh'),
(963, 'Orai', '25.99 N', '79.45 E', 'Uttar Pradesh'),
(964, 'Pilibhit', '28.64 N', '79.81 E', 'Uttar Pradesh'),
(965, 'Pilkhuwa', '28.72 N', '77.65 E', 'Uttar Pradesh'),
(966, 'Rae Bareli', '26.23 N', '81.23 E', 'Uttar Pradesh'),
(967, 'Ramgarh Nagla Kothi', '', '', 'Uttar Pradesh'),
(968, 'Rampur', '28.82 N', '79.02 E', 'Uttar Pradesh'),
(969, 'Rath', '25.58 N', '79.57 E', 'Uttar Pradesh'),
(970, 'Renukut', '24.20 N', '83.03 E', 'Uttar Pradesh'),
(971, 'Saharanpur', '29.97 N', '77.54 E', 'Uttar Pradesh'),
(972, 'Sahaswan', '28.08 N', '78.74 E', 'Uttar Pradesh'),
(973, 'Sambhal', '28.59 N', '78.56 E', 'Uttar Pradesh'),
(974, 'Sandila', '27.08 N', '80.52 E', 'Uttar Pradesh'),
(975, 'Shahabad', '27.65 N', '79.95 E', 'Uttar Pradesh'),
(976, 'Shahjahanpur', '27.88 N', '79.90 E', 'Uttar Pradesh'),
(977, 'Shamli', '29.46 N', '77.31 E', 'Uttar Pradesh'),
(978, 'Sherkot', '29.35 N', '78.58 E', 'Uttar Pradesh'),
(979, 'Shikohabad', '27.12 N', '78.58 E', 'Uttar Pradesh'),
(980, 'Sikandarabad', '28.44 N', '77.69 E', 'Uttar Pradesh'),
(981, 'Sitapur', '27.57 N', '80.69 E', 'Uttar Pradesh'),
(982, 'Sukhmalpur Nizamabad', '', '', 'Uttar Pradesh'),
(983, 'Sultanpur', '26.26 N', '82.06 E', 'Uttar Pradesh'),
(984, 'Tanda', '26.55 N', '82.65 E', 'Uttar Pradesh'),
(985, 'Tilhar', '27.98 N', '79.73 E', 'Uttar Pradesh'),
(986, 'Tundla', '27.20 N', '78.28 E', 'Uttar Pradesh'),
(987, 'Ujhani', '28.02 N', '79.02 E', 'Uttar Pradesh'),
(988, 'Unnao', '26.55 N', '80.49 E', 'Uttar Pradesh'),
(989, 'Varanasi', '25.32 N', '83.01 E', 'Uttar Pradesh'),
(990, 'Vrindavan', '27.58 N', '77.70 E', 'Uttar Pradesh'),
(991, 'Dehra Dun', '30.34 N', '78.05 E', 'Uttaranchal'),
(992, 'Dehra Dun Cantonment', '30.34 N', '77.97 E', 'Uttaranchal'),
(993, 'Gola Range', '', '', 'Uttaranchal'),
(994, 'Haldwani', '29.23 N', '79.52 E', 'Uttaranchal'),
(995, 'Haridwar', '29.98 N', '78.16 E', 'Uttaranchal'),
(996, 'Kashipur', '29.22 N', '78.96 E', 'Uttaranchal'),
(997, 'Pithoragarh', '29.58 N', '80.22 E', 'Uttaranchal'),
(998, 'Rishikesh', '30.12 N', '78.29 E', 'Uttaranchal'),
(999, 'Rudrapur', '', '', 'Uttaranchal'),
(1000, 'Rurki', '29.87 N', '77.89 E', 'Uttaranchal');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_or_company`
--

DROP TABLE IF EXISTS `supplier_or_company`;
CREATE TABLE IF NOT EXISTS `supplier_or_company` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `supplier_id` varchar(50) NOT NULL,
  `gstin` varchar(50) DEFAULT NULL,
  `supplier_name` varchar(100) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `city_pincode` bigint(10) DEFAULT NULL,
  `s_phone_number` bigint(12) DEFAULT NULL,
  `s_email` varchar(50) DEFAULT NULL,
  `s_address` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`supplier_id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier_or_company`
--

INSERT INTO `supplier_or_company` (`id`, `supplier_id`, `gstin`, `supplier_name`, `state`, `city`, `city_pincode`, `s_phone_number`, `s_email`, `s_address`) VALUES
(1, 'SUP-1', 'F2', 'Ad', 'Karnataka', 'Hubli', 585032, 1111111111, 'mahantesh@gmail.com', 'h.no 89 sawmi-vivekananda'),
(2, 'SUP-2', '231', 'A', 'Karnataka', 'Hubli', 585032, 1111111111, 'mahantesh@gmail.com', 'h.no 89 sawmi-vivekananda'),
(3, 'SUP-3', 'DAD', 'B', 'Karnataka', 'Hubli', 585032, 9999999999, 'mahantesh@gmail.com', 'h.no 89 sawmi-vivekananda'),
(4, 'SUP-4', 'F2', 'C', 'Karnataka', 'Hubli', 585032, 8888888888, 'mahantesh@gmail.com', 'h.no 89 sawmi-vivekananda');

-- --------------------------------------------------------

--
-- Table structure for table `tax`
--

DROP TABLE IF EXISTS `tax`;
CREATE TABLE IF NOT EXISTS `tax` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `tax_id` varchar(50) NOT NULL,
  `tax_code` varchar(50) DEFAULT NULL,
  `tax_percentage` bigint(5) DEFAULT NULL,
  PRIMARY KEY (`tax_id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tax`
--

INSERT INTO `tax` (`id`, `tax_id`, `tax_code`, `tax_percentage`) VALUES
(1, 'TAX-1', 'GST-18', 18);

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
-- Constraints for dumped tables
--

--
-- Constraints for table `credit_limit`
--
ALTER TABLE `credit_limit`
  ADD CONSTRAINT `credit_limit_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer_or_company` (`customer_id`);

--
-- Constraints for table `discounts_and_flats_details`
--
ALTER TABLE `discounts_and_flats_details`
  ADD CONSTRAINT `discounts_and_flats_details_ibfk_1` FOREIGN KEY (`discount_id`) REFERENCES `discounts_and_flats` (`discount_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `discounts_and_flats_details_ibfk_2` FOREIGN KEY (`item_category`) REFERENCES `item_category` (`item_category_id`),
  ADD CONSTRAINT `discounts_and_flats_details_ibfk_3` FOREIGN KEY (`item`) REFERENCES `item` (`item_id`);

--
-- Constraints for table `employees_details`
--
ALTER TABLE `employees_details`
  ADD CONSTRAINT `employees_details_ibfk_1` FOREIGN KEY (`emp_designation`) REFERENCES `designation` (`designation_id`);

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`item_category`) REFERENCES `item_category` (`item_category_id`),
  ADD CONSTRAINT `item_ibfk_2` FOREIGN KEY (`item_tax`) REFERENCES `tax` (`tax_id`);

--
-- Constraints for table `parameters`
--
ALTER TABLE `parameters`
  ADD CONSTRAINT `parameters_ibfk_1` FOREIGN KEY (`designation_id`) REFERENCES `designation` (`designation_id`);

--
-- Constraints for table `purchase`
--
ALTER TABLE `purchase`
  ADD CONSTRAINT `purchase_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `supplier_or_company` (`supplier_id`);

--
-- Constraints for table `purchase_list`
--
ALTER TABLE `purchase_list`
  ADD CONSTRAINT `purchase_list_ibfk_1` FOREIGN KEY (`purchase_id`) REFERENCES `purchase` (`purchase_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `purchase_list_ibfk_2` FOREIGN KEY (`item_category`) REFERENCES `item_category` (`item_category_id`),
  ADD CONSTRAINT `purchase_list_ibfk_3` FOREIGN KEY (`item_code`) REFERENCES `item` (`item_id`);

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
