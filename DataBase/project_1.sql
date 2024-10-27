-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2024 at 08:15 AM
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
('System Unit', 0, 'no', '', 'uoj/csc/453/le/18A', '', ''),
('Keyboard', 0, 'no', '', 'uoj/csc/453/le/18C', '', ''),
('Mouse', 0, 'S', '', 'uoj/csc/453/le/18D', '', ''),
('Monitor', 0, 'no', '', 'uoj/csc/453/le/19B', '', ''),
('Mouse', 0, 'no', '', 'uoj/csc/453/le/19D', '', ''),
('electronics test', 0, 'no', '', 'uoj/csc/123/le/300', '', ''),
('laptop test', 0, 'no', '', 'uoj/csc/530/le/259', '', ''),
('laptop test', 0, 'no', '', 'uoj/csc/530/le/259', '', ''),
('System Unit', 0, 'no', '', 'uoj/csc/242/le/12A', '', ''),
('single electronic test', 0, 'S', '', 'uoj/csc/20/le/50', '', ''),
('sahran', 0, 'no', '', 'uoj/lms/421/le/16', '', '');

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
  `verified_balance` int(11) NOT NULL,
  `surplus` int(11) NOT NULL,
  `deficit` int(11) NOT NULL,
  `remarks` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(11, 'test_1', '2024-10-10', 50000, 1, 'uoj/csc/132/Fe/18', 'table', 'fazil', 78945613, 66579, '', 'OE790', 'DCS', 6);

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
(10, '1', 'csl 3 & 4', 'yes'),
(11, '1', 'DCS', 'no');

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
(182, 'sahran', '2024-10-19', 3000, 3, 'uoj/lms/421/le/14-16', 'test electro', 'fazil', 93434213, 3435358, 'electronic', 'le453', 'jaffna', 12);

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
(174, 'uoj/csc/453/le/18A', 'desktop', 'System Unit', 'A18', '', 'cscl 3 and 4', 'no'),
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
(178, 'uoj/csc/242/le/12A', 'desktop', 'System Unit', 'D2045', '', 'cscl 3 and 4', 'no'),
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
(182, 'uoj/lms/421/le/16', 'electronic', 'sahran', 's2340', '', 'jaffna', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `l_forma_table`
--

CREATE TABLE `l_forma_table` (
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
-- Dumping data for table `l_forma_table`
--

INSERT INTO `l_forma_table` (`description`, `purchase_year`, `purchase_value`, `master_inventory_no`, `dept_inventory_no`, `page_no`, `fixed_asset_no`, `book_balance`, `total`, `verified_balance`, `surplus`, `deficit`, `remarks`) VALUES
('desktop test', '2024', 116000, '', 'uoj/csc/453/le/18-19', 'LE354', '', 3, 0, '', '', '', ''),
('electronics test', '2024', 116000, '', 'uoj/csc/123/le/300-301', 'LE354', '', 1, 0, '', '', '', ''),
('laptop test', '2024', 116000, '', 'uoj/csc/530/le/259-260', 'LE354', '', 2, 0, '', '', '', ''),
('single desktop test', '2024', 58000, '', 'uoj/csc/242/le/12', 'LE354', '', 3, 0, '', '', '', ''),
('single laptop test', '2024', 58000, '', 'uoj/csc/242/le/50', 'LE354', '', 2, 0, '', '', '', ''),
('single electronic test', '2024', 58000, '', 'uoj/csc/20/le/50', 'LE354', '', 0, 0, '', '', '', ''),
('electro', '2024', 26000, '', 'uoj/lms/123/le/12-13', 'le124', '', 2, 0, '', '', '', ''),
('sahran', '2024', 9000, '', 'uoj/lms/421/le/14-16', 'le453', '', 2, 0, '', '', '', '');

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
  `verified_balance` int(11) NOT NULL,
  `surplus` int(11) NOT NULL,
  `deficit` int(11) NOT NULL,
  `remarks` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(19, 'ldlfjkddddddddddddd hkdfldddddddd sdkfhdf', '2024-10-10', 38902, 2, 'uoj/csc/132/oe/37-38', 'NEW ETOIH HTW  ADFH DFHDFHOIA DFDFJGDJK FDHF DJFDN DUHFNDF JHDNFDHF NADFHN ADJFNDFJDN FDHFND FHDNFDAFNDFDN FDJFHDFJDFNDFJ NDFDNFODJFNDFNDOFOEF DFJDKJFDJ FODFDLFDOI FODFJDLF DFJHFD JNFDOFDOF DDFJDOJFOD FDF ', 'fazil', 78945613, 66579, 'OE790', 'csl 3 & 4', 34);

-- --------------------------------------------------------

--
-- Table structure for table `o_items`
--

CREATE TABLE `o_items` (
  `invoice_id` int(11) NOT NULL,
  `set_id` varchar(50) NOT NULL,
  `serial_number` varchar(50) NOT NULL,
  `model_number` varchar(50) NOT NULL,
  `location` varchar(100) NOT NULL,
  `working` enum('yes','no','R','S','D','T') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `o_items`
--

INSERT INTO `o_items` (`invoice_id`, `set_id`, `serial_number`, `model_number`, `location`, `working`) VALUES
(17, '0', 'S234', '', 'csl 3 & 4', 'yes'),
(17, '1', 'S234', '', 'csl 3 & 4', 'yes'),
(17, '2', 'S234', '', 'csl 3 & 4', 'yes'),
(18, 'uoj/csc/132/oe/34', 'S284', '', 'csl 3 & 4', 'R'),
(18, 'uoj/csc/132/oe/35', 'S234', '', 'csl 3 & 4', 'yes'),
(18, 'uoj/csc/132/oe/36', 'S234', '', 'csl 3 & 4', 'yes'),
(19, 'uoj/csc/132/oe/37', 'Gei2', '', 'csl 3 & 4', 'yes'),
(19, 'uoj/csc/132/oe/38', 'S234', '', 'csl 3 & 4', 'yes');

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
  ADD PRIMARY KEY (`invoice_id`,`f_set_id`);

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
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

--
-- AUTO_INCREMENT for table `o_invoice`
--
ALTER TABLE `o_invoice`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `f_items`
--
ALTER TABLE `f_items`
  ADD CONSTRAINT `f_items_ibfk_1` FOREIGN KEY (`invoice_id`) REFERENCES `f_invoice` (`invoice_id`);

--
-- Constraints for table `o_items`
--
ALTER TABLE `o_items`
  ADD CONSTRAINT `o_items_ibfk_1` FOREIGN KEY (`invoice_id`) REFERENCES `o_invoice` (`invoice_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
