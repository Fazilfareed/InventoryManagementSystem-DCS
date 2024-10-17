-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2024 at 01:33 PM
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
(19, 'fazil', 'fazil', 'fzlfareed@gmail.com', 789456123, 'admin', '$2y$10$/odL06qxirkcZlwvXy2a/O429YbAmC4CH85rLmFjXbZxz1lcNCxWi'),
(20, 'sahran', 'sahranmhd', 'sahranmhd@gmail.com', 789874561, 'admin', '$2y$10$yMSHyCf1lFsXAobHAmtQz..rm2x2KxiOCYK2ZtbgGkOvrP/IIbkRa');

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
  `location` varchar(50) NOT NULL,
  `warranty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `f_invoice`
--

INSERT INTO `f_invoice` (`invoice_id`, `f_name`, `f_date`, `f_price`, `f_quantity`, `f_folio_number`, `f_description`, `f_supplier_name`, `f_supplier_tt`, `f_srn`, `f_type`, `location`, `warranty`) VALUES
(4, 'Test_1', '2023-08-26', 321, 6, 'UOJ/CSC/123/1-10', 'aaaaaaaaaaaa', 'asdfe', 123, 321, '', 'DCS', 0),
(6, 'Test_1', '2023-08-26', 321, 6, 'UOJ/CSC/123/1-10', 'aaaaaaaaaaaa', 'asdfe', 123, 321, '', 'DCS', 0),
(7, 'Test_1', '2023-08-26', 321, 6, 'UOJ/CSC/123/1-10', 'aaaaaaaaaaaa', 'asdfe', 123, 321, '', 'DCS', 0),
(10, 'test furniture', '2024-10-05', 18999, 1, 'uoj/compsc/124/fe/10', 'lkljfldfd', 'fazil', 2147483647, 2147483647, '', 'csl 3 & 4', 2);

-- --------------------------------------------------------

--
-- Table structure for table `f_items`
--

CREATE TABLE `f_items` (
  `invoice_id` int(11) NOT NULL,
  `f_set_id` int(11) NOT NULL,
  `location` varchar(100) NOT NULL,
  `working` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `f_items`
--

INSERT INTO `f_items` (`invoice_id`, `f_set_id`, `location`, `working`) VALUES
(10, 1, 'csl 3 & 4', 'yes');

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
(180, 'single electronic test', '2024-10-12', 58000, 1, 'uoj/csc/20/le/50', '', 'fazil', 789456123, 665479, 'electronic', 'LE354', 'cscl 3 and 4', 24);

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
  `location` varchar(100) NOT NULL,
  `working` enum('yes','no','R','T','D','S') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`invoice_id`, `set_id`, `category`, `item`, `serial_number`, `location`, `working`) VALUES
(174, 'uoj/csc/453/le/18A', 'desktop', 'System Unit', 'A18', 'cscl 3 and 4', 'yes'),
(174, 'uoj/csc/453/le/18B', 'desktop', 'Monitor', 'B18', 'cscl 3 and 4', 'yes'),
(174, 'uoj/csc/453/le/18C', 'desktop', 'Keyboard', 'C18', 'cscl 3 and 4', 'yes'),
(174, 'uoj/csc/453/le/18D', 'desktop', 'Mouse', 'D18', 'cscl 3 and 4', 'yes'),
(174, 'uoj/csc/453/le/19A', 'desktop', 'System Unit', 'A19', 'cscl 3 and 4', 'yes'),
(174, 'uoj/csc/453/le/19B', 'desktop', 'Monitor', 'B19', 'cscl 3 and 4', 'yes'),
(174, 'uoj/csc/453/le/19C', 'desktop', 'Keyboard', 'C1980', 'cscl 3 and 4', 'yes'),
(174, 'uoj/csc/453/le/19D', 'desktop', 'Mouse', 'D1980', 'cscl 3 and 4', 'yes'),
(176, 'uoj/csc/123/le/300', 'electronic', 'Serial_number', 'Gei2', 'cscl 3 and 4', 'yes'),
(176, 'uoj/csc/123/le/301', 'electronic', 'Serial_number', 'Gei10', 'cscl 3 and 4', 'yes'),
(177, 'uoj/csc/530/le/259', 'laptop', 'Model_number', 'M351', 'cscl 3 and 4', 'yes'),
(177, 'uoj/csc/530/le/259', 'laptop', 'Serial_number', 'S234', 'cscl 3 and 4', 'yes'),
(177, 'uoj/csc/530/le/260', 'laptop', 'Model_number', 'M532', 'cscl 3 and 4', 'yes'),
(177, 'uoj/csc/530/le/260', 'laptop', 'Serial_number', 'S234', 'cscl 3 and 4', 'yes'),
(178, 'uoj/csc/242/le/12A', 'desktop', 'System Unit', 'D2045', 'cscl 3 and 4', 'yes'),
(178, 'uoj/csc/242/le/12B', 'desktop', 'Monitor', 'D2045', 'cscl 3 and 4', 'yes'),
(178, 'uoj/csc/242/le/12C', 'desktop', 'Keyboard', 'D2045', 'cscl 3 and 4', 'yes'),
(178, 'uoj/csc/242/le/12D', 'desktop', 'Mouse', 'D2045', 'cscl 3 and 4', 'yes'),
(179, 'uoj/csc/242/le/50', 'laptop', 'Model_number', 'M351', 'cscl 3 and 4', 'yes'),
(179, 'uoj/csc/242/le/50', 'laptop', 'Serial_number', 'Gei2', 'cscl 3 and 4', 'yes'),
(180, 'uoj/csc/20/le/50', 'electronic', 'Serial_number', 'S234', 'cscl 3 and 4', 'yes');

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
(18, 'test_2', '2024-10-18', 18000, 3, 'uoj/csc/132/oe/34-36', '2nd item', 'fazil', 456789123, 66579, 'OE790', 'csl 3 & 4', 13);

-- --------------------------------------------------------

--
-- Table structure for table `o_items`
--

CREATE TABLE `o_items` (
  `invoice_id` int(11) NOT NULL,
  `set_id` varchar(50) NOT NULL,
  `serial_number` varchar(50) NOT NULL,
  `location` varchar(100) NOT NULL,
  `working` enum('yes','no','R','S','D','T') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `o_items`
--

INSERT INTO `o_items` (`invoice_id`, `set_id`, `serial_number`, `location`, `working`) VALUES
(17, '0', 'S234', 'csl 3 & 4', 'yes'),
(17, '1', 'S234', 'csl 3 & 4', 'yes'),
(17, '2', 'S234', 'csl 3 & 4', 'yes'),
(18, 'uoj/csc/132/oe/34', 'S284', 'csl 3 & 4', 'R'),
(18, 'uoj/csc/132/oe/35', 'S234', 'csl 3 & 4', 'yes'),
(18, 'uoj/csc/132/oe/36', 'S234', 'csl 3 & 4', 'yes');

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
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- AUTO_INCREMENT for table `o_invoice`
--
ALTER TABLE `o_invoice`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
