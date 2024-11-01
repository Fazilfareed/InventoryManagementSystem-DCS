-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2024 at 02:21 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tp` int(12) NOT NULL,
  `role` varchar(15) NOT NULL,
  `password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `email`, `tp`, `role`, `password`) VALUES
(2, 'UOJ DCS', 'masteradmin', 'masteradmin@gmial.com', 123456789, 'masteradmin', '$2y$10$mqZzmKv5SXtLEP/8P2/XHecPODD5iogI1zxvYFwC4c61AOGYiCfQ6'),
(19, 'fazil', 'fazil', 'fzlfareed@gmail.com', 789456123, 'admin', '$2y$10$bET9ze/UPJd5zQzCtr1Coet75J7JaTzTDMdB3MY24CjZIGg.BhF5W'),
(20, 'sahran', 'sahranmhd', 'sahranmhd@gmail.com', 789874561, 'admin', '$2y$10$yMSHyCf1lFsXAobHAmtQz..rm2x2KxiOCYK2ZtbgGkOvrP/IIbkRa');

-- --------------------------------------------------------

--
-- Table structure for table `forma_table`
--

CREATE TABLE `forma_table` (
  `description` varchar(200) NOT NULL,
  `purchase_year` year(4) NOT NULL,
  `purchase_value` decimal(10,0) NOT NULL,
  `master_inventory_no` varchar(50) NOT NULL,
  `dept_inventory_no` varchar(50) NOT NULL,
  `page_no` varchar(20) NOT NULL,
  `fixed_asset_no` varchar(50) NOT NULL,
  `book_balance` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `verified_balance` varchar(50) NOT NULL,
  `surplus` varchar(50) NOT NULL,
  `deficit` varchar(50) NOT NULL,
  `remarks` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `forma_table`
--

INSERT INTO `forma_table` (`description`, `purchase_year`, `purchase_value`, `master_inventory_no`, `dept_inventory_no`, `page_no`, `fixed_asset_no`, `book_balance`, `total`, `verified_balance`, `surplus`, `deficit`, `remarks`) VALUES
('Keyboard', '2024', 116000, '', 'uoj/csc/453/le/18-19', 'LE354', '', 1, 0, '', '', '', ''),
('Monitor', '2024', 116000, '', 'uoj/csc/453/le/18-19', 'LE354', '', 1, 0, '', '', '', ''),
('System Unit', '2024', 116000, '', 'uoj/csc/453/le/18-19', 'LE354', '', 2, 0, '', '', '', ''),
('ff', '2012', 4646, '', 'uoj/lms/1231/le/14-16', '', '', 2, 0, '', '', '', ''),
('laptops', '2024', 10928, '', 'uoj/pms/87/le/14-16', '', '', 2, 0, '', '', '', ''),
('dfdflkj', '2024', 15788, '', 'uoj/lms/613/le/78-79', '', '', 2, 0, '', '', '', ''),
('item1', '2024', 1578, '', 'uoj/lms/357/le/78-79', '', '', 2, 0, '', '', '', ''),
('micro', '2024', 15780, '', 'uoj/lms/789/le/49-50', 'LE120', '', 2, 0, '', '', '', ''),
('micro phone', '2024', 156400, '', 'uoj/lms/789/le/78-79', 'LE7852', '', 2, 0, '', '', '', ''),
('headset', '2024', 157800, '', 'uoj/lms/541/le/14-16', 'LE645', '', 2, 0, '', '', '', ''),
('faz', '2024', 90000, '', 'uoj/lms/256/le/78-79', '', '', 2, 0, '', '', '', ''),
('item', '2024', 158000, '', 'uoj/lms/150/le/78-79', '', '', 2, 0, '', '', '', ''),
('electro', '2024', 26000, '', 'uoj/lms/123/le/12-13', 'le124', '', 2, 0, '', '', '', ''),
('Serial_number', '2024', 116000, '', 'uoj/csc/123/le/300-301', 'LE354', '', 1, 0, '', '', '', ''),
('item2', '2024', 18180, '', 'uoj/lms/19/le/14-16', '', '', 2, 0, '', '', '', ''),
('projector', '2017', 50000, '', 'uoj/lms/542/le/12-13', 'LE234', '', 2, 0, '', '', '', ''),
('phone', '2009', 156000, '', 'uoj/pms/541/le/14-16', 'LE351', '', 2, 0, '', '', '', ''),
('Keyboard', '2024', 929130, '', 'uoj/lms/421/le/78-79', 'le4646', '', 2, 0, '', '', '', ''),
('Monitor', '2024', 929130, '', 'uoj/lms/421/le/78-79', 'le4646', '', 2, 0, '', '', '', ''),
('Mouse', '2024', 929130, '', 'uoj/lms/421/le/78-79', 'le4646', '', 2, 0, '', '', '', ''),
('Model_number', '2024', 116000, '', 'uoj/csc/530/le/259-260', 'LE354', '', 1, 0, '', '', '', ''),
('Serial_number', '2024', 116000, '', 'uoj/csc/530/le/259-260', 'LE354', '', 1, 0, '', '', '', ''),
('phone', '2024', 156000, '', 'uoj/qwe/789/le/78-79', 'LE230', '', 2, 0, '', '', '', ''),
('sahran', '2024', 9000, '', 'uoj/lms/421/le/14-16', 'le453', '', 2, 0, '', '', '', ''),
('Keyboard', '2024', 58000, '', 'uoj/csc/242/le/12', 'LE354', '', 1, 0, '', '', '', ''),
('Monitor', '2024', 58000, '', 'uoj/csc/242/le/12', 'LE354', '', 1, 0, '', '', '', ''),
('Mouse', '2024', 58000, '', 'uoj/csc/242/le/12', 'LE354', '', 1, 0, '', '', '', ''),
('System Unit', '2024', 58000, '', 'uoj/csc/242/le/12', 'LE354', '', 1, 0, '', '', '', ''),
('Model_number', '2024', 58000, '', 'uoj/csc/242/le/50', 'LE354', '', 1, 0, '', '', '', ''),
('Serial_number', '2024', 58000, '', 'uoj/csc/242/le/50', 'LE354', '', 1, 0, '', '', '', ''),
('testlaps', '2024', 300000, '', 'uoj/lms/123/le/49-50', 'LE645', '', 2, 0, '', '', '', ''),
('testtttttt', '2024', 9308, '', 'uoj/jnm/789/le/78-79', '', '', 2, 0, '', '', '', ''),
('test3ttttt', '2024', 15790, '', 'uoj/we/789/le/78-79', '', '', 2, 0, '', '', '', ''),
('test4ttttt', '2024', 9044, '', 'uoj/cds/789/le/78-79', '', '', 2, 0, '', '', '', ''),
('item5tttttttttt', '2024', 157890, '', 'uoj/kml/789/le/78-79', 'LE454', '', 2, 0, '', '', '', ''),
('ojljd', '2024', 930928, '', 'kjlj', '25', '', 1, 0, '', '', '', ''),
('ojljd', '2024', 930928, '', 'kjlj', '25', '', 0, 0, '', '', '', ''),
('ojljd', '2024', 930928, '', 'jldlfjdfdf dkjfldf', '25', '', 1, 0, '', '', '', ''),
('ojljd', '2024', 930928, '', 'uoj/lms/234/fe/12-13', '25', '', 1, 0, '', '', '', ''),
('ojljd', '2024', 465464, '', 'uoj/lms/785/fe/12', '25', '', 1, 0, '', '', '', ''),
('table', '2024', 15600, '', 'uoj/fnt/234/fe/12-13', 'FE452', '', 2, 0, '', '', '', ''),
('test furniture', '2024', 0, '', 'uoj/compsc/124/fe/10', 'FE102', '', 0, 0, '', '', '', ''),
('test_1', '2024', 50000, '', 'uoj/csc/132/Fe/18', 'OE790', '', 0, 0, '', '', '', ''),
('ojljd', '2024', 930928, '', 'kjlj', '25', '', 1, 0, '', '', '', ''),
('ojljd', '2024', 930928, '', 'kjlj', '25', '', 0, 0, '', '', '', ''),
('ojljd', '2024', 930928, '', 'jldlfjdfdf dkjfldf', '25', '', 1, 0, '', '', '', ''),
('ojljd', '2024', 930928, '', 'uoj/lms/234/fe/12-13', '25', '', 1, 0, '', '', '', ''),
('ojljd', '2024', 465464, '', 'uoj/lms/785/fe/12', '25', '', 1, 0, '', '', '', ''),
('table', '2024', 15600, '', 'uoj/fnt/234/fe/12-13', 'FE452', '', 2, 0, '', '', '', ''),
('test furniture', '2024', 0, '', 'uoj/compsc/124/fe/10', 'FE102', '', 0, 0, '', '', '', ''),
('test_1', '2024', 50000, '', 'uoj/csc/132/Fe/18', 'OE790', '', 0, 0, '', '', '', ''),
('ojljd', '2024', 930928, '', 'kjlj', '25', '', 1, 0, '', '', '', ''),
('ojljd', '2024', 930928, '', 'kjlj', '25', '', 0, 0, '', '', '', ''),
('ojljd', '2024', 930928, '', 'jldlfjdfdf dkjfldf', '25', '', 1, 0, '', '', '', ''),
('ojljd', '2024', 930928, '', 'uoj/lms/234/fe/12-13', '25', '', 1, 0, '', '', '', ''),
('ojljd', '2024', 465464, '', 'uoj/lms/785/fe/12', '25', '', 1, 0, '', '', '', ''),
('table', '2024', 15600, '', 'uoj/fnt/234/fe/12-13', 'FE452', '', 2, 0, '', '', '', ''),
('test furniture', '2024', 0, '', 'uoj/compsc/124/fe/10', 'FE102', '', 0, 0, '', '', '', ''),
('test_1', '2024', 50000, '', 'uoj/csc/132/Fe/18', 'OE790', '', 0, 0, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `formb_table`
--

CREATE TABLE `formb_table` (
  `article` varchar(200) NOT NULL,
  `quantity` int(11) NOT NULL,
  `sdrt` varchar(3) NOT NULL,
  `master_inventory_no` varchar(50) NOT NULL,
  `dept_Inventory_no` varchar(50) NOT NULL,
  `fixed_asset_no` varchar(50) NOT NULL,
  `remarks` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `formb_table`
--

INSERT INTO `formb_table` (`article`, `quantity`, `sdrt`, `master_inventory_no`, `dept_Inventory_no`, `fixed_asset_no`, `remarks`) VALUES
('Keyboard', 0, 'no', '', 'uoj/csc/453/le/18C', '', ''),
('Mouse', 0, 'S', '', 'uoj/csc/453/le/18D', '', ''),
('Monitor', 0, 'no', '', 'uoj/csc/453/le/19B', '', ''),
('Mouse', 0, 'no', '', 'uoj/csc/453/le/19D', '', ''),
('electronics test', 0, 'no', '', 'uoj/csc/123/le/300', '', ''),
('laptop test', 0, 'no', '', 'uoj/csc/530/le/259', '', ''),
('laptop test', 0, 'no', '', 'uoj/csc/530/le/259', '', ''),
('single electronic test', 0, 'S', '', 'uoj/csc/20/le/50', '', ''),
('sahran', 0, 'no', '', 'uoj/lms/421/le/16', '', ''),
('System Unit', 0, 'D', '', 'uoj/lms/421/le/78A', '', ''),
('System Unit', 0, 'T', '', 'uoj/lms/421/le/79A', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `f_forma_table`
--

CREATE TABLE `f_forma_table` (
  `description` varchar(200) NOT NULL,
  `purchase_year` year(4) NOT NULL,
  `purchase_value` decimal(10,0) NOT NULL,
  `master_inventory_no` varchar(50) NOT NULL,
  `dept_inventory_no` varchar(50) NOT NULL,
  `page_no` varchar(20) NOT NULL,
  `fixed_asset_no` varchar(50) NOT NULL,
  `book_balance` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `verified_balance` varchar(50) NOT NULL,
  `surplus` varchar(50) NOT NULL,
  `deficit` varchar(50) NOT NULL,
  `remarks` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `f_forma_table`
--

INSERT INTO `f_forma_table` (`description`, `purchase_year`, `purchase_value`, `master_inventory_no`, `dept_inventory_no`, `page_no`, `fixed_asset_no`, `book_balance`, `total`, `verified_balance`, `surplus`, `deficit`, `remarks`) VALUES
('ojljd', '2024', 930928, '', 'kjlj', '25', '', 1, 0, '', '', '', ''),
('ojljd', '2024', 930928, '', 'kjlj', '25', '', 0, 0, '', '', '', ''),
('ojljd', '2024', 930928, '', 'jldlfjdfdf dkjfldf', '25', '', 1, 0, '', '', '', ''),
('ojljd', '2024', 930928, '', 'uoj/lms/234/fe/12-13', '25', '', 1, 0, '', '', '', ''),
('ojljd', '2024', 465464, '', 'uoj/lms/785/fe/12', '25', '', 1, 0, '', '', '', ''),
('table', '2024', 15600, '', 'uoj/fnt/234/fe/12-13', 'FE452', '', 2, 0, '', '', '', ''),
('test furniture', '2024', 0, '', 'uoj/compsc/124/fe/10', 'FE102', '', 0, 0, '', '', '', ''),
('test_1', '2024', 50000, '', 'uoj/csc/132/Fe/18', 'OE790', '', 0, 0, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `f_formb_table`
--

CREATE TABLE `f_formb_table` (
  `article` varchar(200) NOT NULL,
  `quantity` int(11) NOT NULL,
  `sdrt` varchar(3) NOT NULL,
  `master_inventory_no` varchar(50) NOT NULL,
  `dept_Inventory_no` varchar(50) NOT NULL,
  `fixed_asset_no` varchar(50) NOT NULL,
  `remarks` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `f_formb_table`
--

INSERT INTO `f_formb_table` (`article`, `quantity`, `sdrt`, `master_inventory_no`, `dept_Inventory_no`, `fixed_asset_no`, `remarks`) VALUES
('test furniture', 0, 'R', '', '1', '', ''),
('test_1', 0, 'no', '', '1', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `f_invoice`
--

CREATE TABLE `f_invoice` (
  `invoice_id` int(11) NOT NULL,
  `f_name` varchar(200) NOT NULL,
  `f_date` date NOT NULL,
  `f_price` float NOT NULL,
  `f_quantity` int(11) NOT NULL,
  `f_folio_number` varchar(50) NOT NULL,
  `f_description` varchar(400) NOT NULL,
  `f_supplier_name` varchar(150) NOT NULL,
  `f_supplier_tt` int(15) NOT NULL,
  `f_srn` int(11) NOT NULL,
  `f_type` varchar(15) NOT NULL,
  `page_number` varchar(15) NOT NULL,
  `location` varchar(50) NOT NULL,
  `warranty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `f_invoice`
--

INSERT INTO `f_invoice` (`invoice_id`, `f_name`, `f_date`, `f_price`, `f_quantity`, `f_folio_number`, `f_description`, `f_supplier_name`, `f_supplier_tt`, `f_srn`, `f_type`, `page_number`, `location`, `warranty`) VALUES
(10, 'test furniture', '2024-10-05', 0, 1, 'uoj/compsc/124/fe/10', 'lkljfldfd', 'fazil', 2147483647, 2147483647, '', 'FE102', 'csl 3 & 4', 2),
(11, 'test_1', '2024-10-10', 50000, 1, 'uoj/csc/132/Fe/18', 'table', 'fazil', 78945613, 66579, '', 'OE790', 'DCS', 6),
(12, 'ojljd', '2024-11-04', 465464, 2, 'kjlj', '', 'jklfer', 544514, 21, '', '25', 'FE234', 1),
(13, 'ojljd', '2024-11-04', 465464, 2, 'kjlj', '', 'jklfer', 544514, 21, '', '25', 'FE234', 1),
(14, 'ojljd', '2024-11-04', 465464, 2, 'jldlfjdfdf dkjfldf', '', 'jklfer', 544514, 21, '', '25', 'FE234', 1),
(15, 'ojljd', '2024-11-04', 465464, 2, 'uoj/lms/234/fe/12-13', '', 'jklfer', 544514, 21, '', '25', 'FE234', 1),
(16, 'ojljd', '2024-11-04', 465464, 1, 'uoj/lms/785/fe/12', '', 'jklfer', 544514, 21, '', '25', 'FE234', 1),
(17, 'table', '2024-11-02', 7800, 2, 'uoj/fnt/234/fe/12-13', 'dfjdlfj dkjfldf djkfld dkljf ldd dlkfdl ldjfdl lkdjf ', 'fazil', 789456123, 4563, '', 'FE452', 'lab', 21);

-- --------------------------------------------------------

--
-- Table structure for table `f_items`
--

CREATE TABLE `f_items` (
  `invoice_id` int(11) NOT NULL,
  `f_set_id` varchar(50) NOT NULL,
  `location` varchar(100) NOT NULL,
  `working` enum('yes','no','R','S','D','T') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `f_items`
--

INSERT INTO `f_items` (`invoice_id`, `f_set_id`, `location`, `working`) VALUES
(10, '1', 'csl 3 & 4', 'R'),
(11, '1', 'DCS', 'no'),
(12, 'kjlj', 'FE234', 'yes'),
(14, 'jldlfjdfdf dkjfldf', 'FE234', 'yes'),
(15, 'uoj/lms/234/fe/12-13', 'FE234', 'yes'),
(16, 'uoj/lms/785/fe/12', 'FE234', 'yes'),
(17, 'uoj/fnt/234/fe/12-13', 'lab', 'yes'),
(17, 'uoj/fnt/234/fe/12-13', 'lab', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `price` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `folio_number` varchar(50) NOT NULL,
  `description` varchar(400) NOT NULL,
  `supplier_name` varchar(150) NOT NULL,
  `supplier_tt` int(15) NOT NULL,
  `srn` int(11) NOT NULL,
  `type` varchar(15) NOT NULL,
  `page_number` varchar(30) NOT NULL,
  `location` varchar(50) NOT NULL,
  `warranty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_id`, `name`, `date`, `price`, `quantity`, `folio_number`, `description`, `supplier_name`, `supplier_tt`, `srn`, `type`, `page_number`, `location`, `warranty`) VALUES
(174, 'desktop test', '2024-10-11', 58000, 2, 'uoj/csc/453/le/18-19', 'this is ram', 'fazil', 789456123, 665479, 'desktop', 'LE354', 'cscl 3 and 4', 24),
(176, 'electronics test', '2024-10-11', 58000, 2, 'uoj/csc/123/le/300-301', '', 'fazil', 789456123, 665479, 'electronic', 'LE354', 'cscl 3 and 4', 24),
(177, 'laptop test', '2024-10-10', 58000, 2, 'uoj/csc/530/le/259-260', '', 'fazil', 789456123, 665479, 'laptop', 'LE354', 'cscl 3 and 4', 24),
(178, 'single desktop test', '2024-10-11', 58000, 1, 'uoj/csc/242/le/12', 'dfdfdlfjk dkjfldj ', 'fazil', 789456123, 665479, 'desktop', 'LE354', 'cscl 3 and 4', 24),
(179, 'single laptop test', '2024-10-11', 58000, 1, 'uoj/csc/242/le/50', 'jdljhdf dfhjdof hdifdniuhd idfjhdfndhfl ', 'fazil', 789456123, 665479, 'laptop', 'LE354', 'cscl 3 and 4', 24),
(180, 'single electronic test', '2024-10-12', 58000, 1, 'uoj/csc/20/le/50', '', 'fazil', 789456123, 665479, 'electronic', 'LE354', 'cscl 3 and 4', 24),
(181, 'electro', '2024-10-12', 13000, 2, 'uoj/lms/123/le/12-13', 'hel', 'faz', 243509, 3409341, 'electronic', 'le124', 'jaffna', 30),
(182, 'sahran', '2024-10-19', 3000, 3, 'uoj/lms/421/le/14-16', 'test electro', 'fazil', 93434213, 3435358, 'electronic', 'le453', 'jaffna', 12),
(183, 'kdjhfkdhfkdfhd lhkdhfkdhf dhfdkfhdi hfdkfh dkfhdfhd fldhfdlhf iauhf kdhf idfhidh fdfhdkfh dfhdi fhdfkdf', '2024-10-18', 464565, 2, 'uoj/lms/421/le/78-79', 'ljdlf dlkjfld andlfd lkdfd lkdf ldkndf ldlfjd lfdlj fldjfl dfdfjdfj dfdpfjdjf dfodf dfjodjfpdjf dfd', 'dfdjfldj flajojd fjd jdjfpa dfmdfpd fpdfdfdpfjd ', 654646, 5464346, 'desktop', 'le4646', 'jaff', 15),
(185, 'test laps', '2024-10-18', 150000, 2, 'uoj/lms/123/le/49-50', 'test item name on serial number and model number', 'fazil', 789456132, 87643, 'laptop', 'LE645', 'cls 3&4', 12),
(186, 'electric test', '2024-10-16', 78200, 2, 'uoj/lms/789/le/78-79', 'item name test', 'faz', 78456123, 65432, 'electronic', 'LE7852', 'csl 3&4', 24),
(187, 'electric test2', '2024-10-09', 78900, 2, 'uoj/lms/541/le/14-16', 'test serial number and item name', 'faz', 0, 54645, 'electronic', 'LE645', 'jaffna', 15),
(188, 'electric test3', '2024-10-10', 45000, 2, 'uoj/lms/256/le/78-79', 'df', 'faz', 0, 0, 'electronic', '', 'jafff', 4),
(189, 'electric test4', '2024-10-04', 79000, 2, 'uoj/lms/150/le/78-79', '', 'a', 0, 0, 'electronic', '', 'haa', 78),
(190, 'dfdflkj', '2024-10-10', 7894, 2, 'uoj/lms/613/le/78-79', '', 'faf', 0, 0, 'electronic', '', 'gkh', 7),
(191, 'el', '2024-10-22', 789, 2, 'uoj/lms/357/le/78-79', '', 'fdfd', 0, 0, 'electronic', '', 'dfdfd', 7),
(192, 'elctronics hp microphone', '2024-10-10', 7890, 2, 'uoj/lms/789/le/49-50', 'bought new microphpon', 'fazil', 456789123, 35489, 'electronic', 'LE120', 'Jaffna', 4),
(193, 'elkj', '2024-10-11', 9090, 2, 'uoj/lms/19/le/14-16', '', 'faz', 0, 0, 'electronic', '', 'jj', 1),
(194, 'dfdfd', '2024-10-09', 2323, 2, 'uoj/lms/421/le/14-16', '', 'fa', 0, 0, 'electronic', '', 'fa', 2),
(195, 'dfdfd', '2024-10-09', 2323, 2, 'uoj/lms/421/le/14-16', '', 'fa', 0, 0, 'electronic', '', 'fa', 2),
(196, 'dfdfd', '2012-10-09', 2323, 2, 'uoj/lms/1231/le/14-16', '', 'fa', 0, 0, 'electronic', '', 'fa', 2),
(197, 'infinix phon', '2009-10-17', 78000, 2, 'uoj/pms/541/le/14-16', 'dfdfd', 'fazil', 45123879, 456, 'electronic', 'LE351', 'jann', 12),
(199, 'dfdfd', '2024-10-11', 5464, 2, 'uoj/pms/87/le/14-16', '', 'faz', 0, 0, 'electronic', '', 'kndf', 12),
(200, 'test2', '2024-10-16', 4654, 2, 'uoj/jnm/789/le/78-79', 'kjfdfldk dlfkjdlfj ', 'ljaf', 0, 0, 'electronic', '', 'jlfd', 1),
(201, 'test3', '2024-10-11', 7895, 2, 'uoj/we/789/le/78-79', 'dfdfdf', 'faz', 65421, 0, 'electronic', '', 'dfdfdfdf', 2),
(202, 'test4', '2024-10-17', 4522, 2, 'uoj/cds/789/le/78-79', 'dfdfdfd', 'faz', 7894, 6543, 'electronic', '', 'jaffna', 21),
(203, 'test5', '2024-10-16', 78945, 2, 'uoj/kml/789/le/78-79', 'dfdfdfd', 'faz', 78945, 8646, 'electronic', 'LE454', 'jafff', 7),
(204, 'hp projector 376', '2017-10-17', 25000, 2, 'uoj/lms/542/le/12-13', 'projector bought from new department of the uoj dcs', 'fazil', 789456123, 65432, 'electronic', 'LE234', 'CSL 3 & 4', 12),
(205, 'newly bought android phone', '2024-10-08', 78000, 2, 'uoj/qwe/789/le/78-79', 'android 6gb/256gb phon', 'fazil', 789456123, 354165, 'electronic', 'LE230', 'CSL 3 & 4', 12);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `invoice_id` int(11) NOT NULL,
  `set_id` varchar(60) NOT NULL,
  `category` varchar(100) NOT NULL,
  `item` varchar(100) NOT NULL,
  `serial_number` varchar(30) NOT NULL,
  `model_number` varchar(50) NOT NULL,
  `location` varchar(100) NOT NULL,
  `working` enum('yes','no','R','T','D','S') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`invoice_id`, `set_id`, `category`, `item`, `serial_number`, `model_number`, `location`, `working`) VALUES
(174, 'uoj/csc/453/le/18A', 'desktop', 'System Unit', 'A18', '', 'cscl 3 and 4', 'yes'),
(174, 'uoj/csc/453/le/18B', 'desktop', 'Monitor', 'B18', '', 'cscl 3 and 4', 'yes'),
(174, 'uoj/csc/453/le/18C', 'desktop', 'Keyboard', 'C18', '', 'cscl 3 and 4', 'no'),
(174, 'uoj/csc/453/le/18D', 'desktop', 'Mouse', 'D18', '', 'cscl 3 and 4', 'S'),
(174, 'uoj/csc/453/le/19A', 'desktop', 'System Unit', 'A19', '', 'cscl 3 and 4', 'yes'),
(174, 'uoj/csc/453/le/19B', 'desktop', 'Monitor', 'B19', '', 'cscl 3 and 4', 'no'),
(174, 'uoj/csc/453/le/19C', 'desktop', 'Keyboard', 'C1980', '', 'cscl 3 and 4', 'yes'),
(174, 'uoj/csc/453/le/19D', 'desktop', 'Mouse', 'D1980', '', 'cscl 3 and 4', 'no'),
(176, 'uoj/csc/123/le/300', 'electronic', 'Serial_number', 'Gei2', '', 'cscl 3 and 4', 'no'),
(176, 'uoj/csc/123/le/301', 'electronic', 'Serial_number', 'Gei10', '', 'cscl 3 and 4', 'yes'),
(177, 'uoj/csc/530/le/259', 'laptop', 'Model_number', 'M351', '', 'cscl 3 and 4', 'no'),
(177, 'uoj/csc/530/le/259', 'laptop', 'Serial_number', 'S234', '', 'cscl 3 and 4', 'no'),
(177, 'uoj/csc/530/le/260', 'laptop', 'Model_number', 'M532', '', 'cscl 3 and 4', 'yes'),
(177, 'uoj/csc/530/le/260', 'laptop', 'Serial_number', 'S234', '', 'cscl 3 and 4', 'yes'),
(178, 'uoj/csc/242/le/12A', 'desktop', 'System Unit', 'D2045', '', 'cscl 3 and 4', 'yes'),
(178, 'uoj/csc/242/le/12B', 'desktop', 'Monitor', 'D2045', '', 'cscl 3 and 4', 'yes'),
(178, 'uoj/csc/242/le/12C', 'desktop', 'Keyboard', 'D2045', '', 'cscl 3 and 4', 'yes'),
(178, 'uoj/csc/242/le/12D', 'desktop', 'Mouse', 'D2045', '', 'cscl 3 and 4', 'yes'),
(179, 'uoj/csc/242/le/50', 'laptop', 'Model_number', 'M351', '', 'cscl 3 and 4', 'yes'),
(179, 'uoj/csc/242/le/50', 'laptop', 'Serial_number', 'Gei2', '', 'cscl 3 and 4', 'yes'),
(180, 'uoj/csc/20/le/50', 'electronic', 'Serial_number', 'S234', '', 'cscl 3 and 4', 'S'),
(181, 'uoj/lms/123/le/12', 'electronic', 'electro', 's34', '', 'jaffna', 'yes'),
(181, 'uoj/lms/123/le/13', 'electronic', 'electro', 's123', '', 'jaffna', 'yes'),
(182, 'uoj/lms/421/le/14', 'electronic', 'sahran', 's4520', '', 'jaffna', 'yes'),
(182, 'uoj/lms/421/le/15', 'electronic', 'sahran', 's1230', '', 'jaffna', 'yes'),
(182, 'uoj/lms/421/le/16', 'electronic', 'sahran', 's2340', '', 'jaffna', 'no'),
(183, 'uoj/lms/421/le/78A', 'desktop', 'System Unit', 'A464', '', 'jaff', 'D'),
(183, 'uoj/lms/421/le/78B', 'desktop', 'Monitor', 'B6456', '', 'jaff', 'yes'),
(183, 'uoj/lms/421/le/78C', 'desktop', 'Keyboard', 'V646', '', 'jaff', 'yes'),
(183, 'uoj/lms/421/le/78D', 'desktop', 'Mouse', 'F6464', '', 'jaff', 'yes'),
(183, 'uoj/lms/421/le/79A', 'desktop', 'System Unit', 'A646', '', 'jaff', 'T'),
(183, 'uoj/lms/421/le/79B', 'desktop', 'Monitor', 'B646', '', 'jaff', 'yes'),
(183, 'uoj/lms/421/le/79C', 'desktop', 'Keyboard', 'V66', '', 'jaff', 'yes'),
(183, 'uoj/lms/421/le/79D', 'desktop', 'Mouse', 'G666', '', 'jaff', 'yes'),
(185, 'uoj/lms/123/le/49', 'laptop', 'testlaps', 'S121', 'M349', 'cls 3&4', 'yes'),
(185, 'uoj/lms/123/le/50', 'laptop', 'testlaps', 'S542', 'M450', 'cls 3&4', 'yes'),
(186, 'uoj/lms/789/le/78', 'electronic', 'micro phone', '', '', 'csl 3&4', 'yes'),
(186, 'uoj/lms/789/le/79', 'electronic', 'micro phone', '', '', 'csl 3&4', 'yes'),
(187, 'uoj/lms/541/le/14', 'electronic', 'headset', '', '', 'jaffna', 'yes'),
(187, 'uoj/lms/541/le/15', 'electronic', 'headset', '', '', 'jaffna', 'yes'),
(188, 'uoj/lms/256/le/78', 'electronic', 'faz', '', '', 'jafff', 'yes'),
(188, 'uoj/lms/256/le/79', 'electronic', 'faz', '', '', 'jafff', 'yes'),
(189, 'uoj/lms/150/le/78', 'electronic', 'item', '', '', 'haa', 'yes'),
(189, 'uoj/lms/150/le/79', 'electronic', 'item', '', '', 'haa', 'yes'),
(190, 'uoj/lms/613/le/78', 'electronic', 'dfdflkj', 'kjnk', '', 'gkh', 'yes'),
(190, 'uoj/lms/613/le/79', 'electronic', 'dfdflkj', 'khjkj', '', 'gkh', 'yes'),
(191, 'uoj/lms/357/le/78', 'electronic', 'item1', 's90', '', 'dfdfd', 'yes'),
(191, 'uoj/lms/357/le/79', 'electronic', 'item1', 's09', '', 'dfdfd', 'yes'),
(192, 'uoj/lms/789/le/49', 'electronic', 'micro', '', '', 'Jaffna', 'yes'),
(192, 'uoj/lms/789/le/50', 'electronic', 'micro', '', '', 'Jaffna', 'yes'),
(193, 'uoj/lms/19/le/14', 'electronic', 'item2', 's90', '', 'jj', 'yes'),
(193, 'uoj/lms/19/le/15', 'electronic', 'item2', 's12', '', 'jj', 'yes'),
(196, 'uoj/lms/1231/le/14', 'electronic', 'ff', 'dfdfd', '', 'fa', 'yes'),
(196, 'uoj/lms/1231/le/15', 'electronic', 'ff', 'dfdfd', '', 'fa', 'yes'),
(197, 'uoj/pms/541/le/14', 'electronic', 'phone', '', '', 'jann', 'yes'),
(197, 'uoj/pms/541/le/15', 'electronic', 'phone', '', '', 'jann', 'yes'),
(199, 'uoj/pms/87/le/14', 'electronic', 'laptops', 'S8080', '', 'kndf', 'yes'),
(199, 'uoj/pms/87/le/15', 'electronic', 'laptops', 'S0980', '', 'kndf', 'yes'),
(200, 'uoj/jnm/789/le/78', 'electronic', 'testtttttt', 'jlfdfkdh', '', 'jlfd', 'yes'),
(200, 'uoj/jnm/789/le/79', 'electronic', 'testtttttt', 'ldjfldjlf', '', 'jlfd', 'yes'),
(201, 'uoj/we/789/le/78', 'electronic', 'test3ttttt', 'dssdf', '', 'dfdfdfdf', 'yes'),
(201, 'uoj/we/789/le/79', 'electronic', 'test3ttttt', 'knk', '', 'dfdfdfdf', 'yes'),
(202, 'uoj/cds/789/le/78', 'electronic', 'test4ttttt', 'dsfldfj', '', 'jaffna', 'yes'),
(202, 'uoj/cds/789/le/79', 'electronic', 'test4ttttt', 'ljdlfjdf', '', 'jaffna', 'yes'),
(203, 'uoj/kml/789/le/78', 'electronic', 'item5tttttttttt', 'dfdfdf', '', 'jafff', 'yes'),
(203, 'uoj/kml/789/le/79', 'electronic', 'item5tttttttttt', 'kjhdkfkdf', '', 'jafff', 'yes'),
(204, 'uoj/lms/542/le/12', 'electronic', 'projector', '', '', 'CSL 3 & 4', 'yes'),
(204, 'uoj/lms/542/le/13', 'electronic', 'projector', '', '', 'CSL 3 & 4', 'yes'),
(205, 'uoj/qwe/789/le/78', 'electronic', 'phone', 'S230', '', 'CSL 3 & 4', 'yes'),
(205, 'uoj/qwe/789/le/79', 'electronic', 'phone', 'S123', '', 'CSL 3 & 4', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `o_forma_table`
--

CREATE TABLE `o_forma_table` (
  `description` varchar(200) NOT NULL,
  `purchase_year` year(4) NOT NULL,
  `purchase_value` decimal(10,0) NOT NULL,
  `master_inventory_no` varchar(50) NOT NULL,
  `dept_inventory_no` varchar(50) NOT NULL,
  `page_no` varchar(20) NOT NULL,
  `fixed_asset_no` varchar(50) NOT NULL,
  `book_balance` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `verified_balance` varchar(50) NOT NULL,
  `surplus` varchar(50) NOT NULL,
  `deficit` varchar(50) NOT NULL,
  `remarks` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `o_forma_table`
--

INSERT INTO `o_forma_table` (`description`, `purchase_year`, `purchase_value`, `master_inventory_no`, `dept_inventory_no`, `page_no`, `fixed_asset_no`, `book_balance`, `total`, `verified_balance`, `surplus`, `deficit`, `remarks`) VALUES
('just try', '2024', 77804, '', 'uoj/csc/132/oe/37-38', 'OE790', '', 1, 0, '', '', '', ''),
('amotjer try', '2024', 157800, '', 'uoj/lms/789/le/49-50', 'dfd', '', 2, 0, '', '', '', ''),
('', '2024', 156000, '', 'uoj/ofc/234/oe/12-13', 'OE785', '', 2, 0, '', '', '', ''),
('microphone', '2024', 3600, '', 'uoj/ofc/123/OE/43-45', 'OE642', '', 3, 0, '', '', '', ''),
('', '2024', 54000, '', 'uoj/csc/132/oe/31-33', 'OE789', '', 3, 0, '', '', '', ''),
('', '2024', 54000, '', 'uoj/csc/132/oe/34-36', 'OE790', '', 1, 0, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `o_formb_table`
--

CREATE TABLE `o_formb_table` (
  `article` varchar(200) NOT NULL,
  `quantity` int(11) NOT NULL,
  `sdrt` varchar(3) NOT NULL,
  `master_inventory_no` varchar(50) NOT NULL,
  `dept_Inventory_no` varchar(50) NOT NULL,
  `fixed_asset_no` varchar(50) NOT NULL,
  `remarks` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `o_formb_table`
--

INSERT INTO `o_formb_table` (`article`, `quantity`, `sdrt`, `master_inventory_no`, `dept_Inventory_no`, `fixed_asset_no`, `remarks`) VALUES
('test_2', 0, 'R', '', 'uoj/csc/132/oe/34', '', ''),
('test_2', 0, 'S', '', 'uoj/csc/132/oe/35', '', ''),
('ldlfjkddddddddddddd hkdfldddddddd sdkfhdf', 0, 'T', '', 'uoj/csc/132/oe/38', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `o_invoice`
--

CREATE TABLE `o_invoice` (
  `invoice_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `price` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `folio_number` varchar(50) NOT NULL,
  `description` varchar(400) NOT NULL,
  `supplier_name` varchar(150) NOT NULL,
  `supplier_tt` int(15) NOT NULL,
  `srn` int(11) NOT NULL,
  `page_number` varchar(15) NOT NULL,
  `location` varchar(50) NOT NULL,
  `warranty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `o_invoice`
--

INSERT INTO `o_invoice` (`invoice_id`, `name`, `date`, `price`, `quantity`, `folio_number`, `description`, `supplier_name`, `supplier_tt`, `srn`, `page_number`, `location`, `warranty`) VALUES
(17, 'test_1', '2024-10-10', 18000, 3, 'uoj/csc/132/oe/31-33', 'first item', 'fazil', 456789123, 66579, 'OE789', 'csl 3 & 4', 13),
(18, 'test_2', '2024-10-18', 18000, 3, 'uoj/csc/132/oe/34-36', '2nd item', 'fazil', 456789123, 66579, 'OE790', 'csl 3 & 4', 13),
(19, 'ldlfjkddddddddddddd hkdfldddddddd sdkfhdf', '2024-10-10', 38902, 2, 'uoj/csc/132/oe/37-38', 'NEW ETOIH HTW  ADFH DFHDFHOIA DFDFJGDJK FDHF DJFDN DUHFNDF JHDNFDHF NADFHN ADJFNDFJDN FDHFND FHDNFDAFNDFDN FDJFHDFJDFNDFJ NDFDNFODJFNDFNDOFOEF DFJDKJFDJ FODFDLFDOI FODFJDLF DFJHFD JNFDOFDOF DDFJDOJFOD FDF ', 'fazil', 78945613, 66579, 'OE790', 'csl 3 & 4', 34),
(20, 'mic', '2024-10-18', 78900, 2, 'uoj/lms/789/le/49-50', 'fdjfd', 'faz', 0, 0, '', 'jj', 7),
(21, 'projo hp', '2024-11-16', 78000, 2, 'uoj/ofc/234/oe/12-13', 'projector from jaffna', 'fazil', 789456123, 54354, 'OE785', 'CSA', 12),
(22, 'samsung microphone', '2024-11-12', 1200, 3, 'uoj/ofc/123/OE/43-45', 'newly sdfs df d', 'fazil', 789546132, 35416, 'OE642', 'Jaffna', 3);

-- --------------------------------------------------------

--
-- Table structure for table `o_items`
--

CREATE TABLE `o_items` (
  `invoice_id` int(11) NOT NULL,
  `set_id` varchar(50) NOT NULL,
  `serial_number` varchar(50) NOT NULL,
  `item` varchar(50) NOT NULL,
  `location` varchar(100) NOT NULL,
  `working` enum('yes','no','R','S','D','T') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `o_items`
--

INSERT INTO `o_items` (`invoice_id`, `set_id`, `serial_number`, `item`, `location`, `working`) VALUES
(17, '0', 'S234', '', 'csl 3 & 4', 'yes'),
(17, '1', 'S234', '', 'csl 3 & 4', 'yes'),
(17, '2', 'S234', '', 'csl 3 & 4', 'yes'),
(18, 'uoj/csc/132/oe/34', 'S284', 'projector', 'csl 3 & 4', 'R'),
(18, 'uoj/csc/132/oe/35', 'S234', '', 'csl 3 & 4', 'S'),
(18, 'uoj/csc/132/oe/36', 'S234', '', 'csl 3 & 4', 'yes'),
(19, 'uoj/csc/132/oe/37', 'Gei2', '', 'csl 3 & 4', 'yes'),
(19, 'uoj/csc/132/oe/38', 'S234', '', 'csl 3 & 4', 'T'),
(20, 'uoj/lms/789/le/49', 'S121', '', 'jj', 'yes'),
(20, 'uoj/lms/789/le/50', 'S542', '', 'jj', 'yes'),
(21, 'uoj/ofc/234/oe/12', 'S12', '', 'CSA', 'yes'),
(21, 'uoj/ofc/234/oe/13', 'S13', '', 'CSA', 'yes'),
(22, 'uoj/ofc/123/OE/43', 'S78', 'microphone', 'Jaffna', 'yes'),
(22, 'uoj/ofc/123/OE/44', 'S79', 'microphone', 'Jaffna', 'yes'),
(22, 'uoj/ofc/123/OE/45', 'S80', 'microphone', 'Jaffna', 'yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `f_invoice`
--
ALTER TABLE `f_invoice`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indexes for table `f_items`
--
ALTER TABLE `f_items`
  ADD KEY `invoice_id` (`invoice_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD KEY `invoice_id` (`invoice_id`),
  ADD KEY `item` (`item`);

--
-- Indexes for table `o_invoice`
--
ALTER TABLE `o_invoice`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indexes for table `o_items`
--
ALTER TABLE `o_items`
  ADD KEY `invoice_id` (`invoice_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `f_invoice`
--
ALTER TABLE `f_invoice`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=206;

--
-- AUTO_INCREMENT for table `o_invoice`
--
ALTER TABLE `o_invoice`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `f_items`
--
ALTER TABLE `f_items`
  ADD CONSTRAINT `f_items_ibfk_1` FOREIGN KEY (`invoice_id`) REFERENCES `f_invoice` (`invoice_id`),
  ADD CONSTRAINT `invoice_id` FOREIGN KEY (`invoice_id`) REFERENCES `f_invoice` (`invoice_id`) ON DELETE CASCADE;

--
-- Constraints for table `o_items`
--
ALTER TABLE `o_items`
  ADD CONSTRAINT `o_items_ibfk_1` FOREIGN KEY (`invoice_id`) REFERENCES `o_invoice` (`invoice_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
