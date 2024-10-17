-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2024 at 09:19 PM
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
(108, 'Test_1234aaaaaaaabbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb', '2023-08-18', 12330000, 10, 'UOJ/CSC/123/te/1-13/', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'jasdljas;ldkjaslidjsaldkjsaldajsldkjasdsadasd', 123456789, 2023, '', 'LE-345', 'CSL 3&4hhhhhh', 0),
(117, 'Chamindu', '2023-08-28', 1233, 2, 'UOJ/CSC/123/1-10', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'asdfe', 1234, 0, 'electronic', '', 'DCS', 0),
(120, 'Test_211', '2026-10-31', 123, 2, 'UOJ/CSC/123/1-3222', 'aaaaaaa', '123', 123, 123, 'laptop', '', '123', 0),
(126, 'Hp laptop', '2024-10-05', 8000, 5, 'uoj/compsc/426/le/10', 'bought hp laptop ', 'fazil fareed', 789456123, 786654, 'desktop', '', 'csl 1 and 2', 0),
(136, 'hellouojtestcase1test', '2024-10-05', 789000, 2, 'uoj/compsc/523/le/18', 'hp dell laptop available here', 'fazil', 789456213, 2147483647, 'desktop', '', 'csl 3 & 4', 2),
(137, 'Hp laptop', '2024-10-12', 10000, 3, 'uoj/compsc/425/le/10-13', 'details', 'fazil', 789456123, 2147483647, 'desktop', '', 'csl 3 & 4', 2),
(141, 'Hp laptop', '2024-10-12', 10000, 3, 'uoj/compsc/978/te/10-12', 'testing folio number into setid', 'fazil', 0, 6884543, 'desktop', '', 'csl 3 & 4', 2),
(142, 'Hp laptop test page number', '2024-10-11', 18200, 10, 'uoj/compsc/425/yw/10-12', '', 'fazil', 2147483647, 2147483647, 'desktop', ' LE-345', 'csl 3 & 4', 2),
(143, 'test ', '2024-10-10', 12344, 2, 'uoj/compsc/1/23le/10-12', 'lkjaljlfjdlfd ljlfdjflj ljdlfjdlf ljkldjfdf ljkldjfld ljldjf lkjldjf lkldf lkjljdf djljdldf lkljldf lkjlkjdf lkjljdf kjdlj ldjfljl ljlj lfjdlfll jfljdfljdlj ljjjjjjjjjjjjjfdsssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss', 'fazil fareed', 0, 0, 'electronic', '', 'csl 3 & 4', 2);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `invoice_id` int(11) NOT NULL,
  `set_id` int(11) NOT NULL,
  `category` varchar(100) NOT NULL,
  `item` varchar(50) NOT NULL,
  `serial_number` varchar(30) NOT NULL,
  `location` varchar(100) NOT NULL,
  `working` enum('yes','no','R','T','D','S') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`invoice_id`, `set_id`, `category`, `item`, `serial_number`, `location`, `working`) VALUES
(117, 1, 'electronic', 'Serial_number', 'asas', 'DCS', 'yes'),
(117, 2, 'electronic', 'Serial_number', '123', 'DCS', 'no'),
(120, 1, 'laptop', 'Model_number', 'qweeeeeeee', '123', ''),
(120, 1, 'laptop', 'Serial_number', '-', '1235676868', 'no'),
(120, 2, 'laptop', 'Model_number', '2', '123', 'yes'),
(120, 2, 'laptop', 'Serial_number', 'asd', '123', 'yes'),
(126, 1, 'desktop', 'CPU', 'A900', 'csl 1 and 2', 'yes'),
(126, 1, 'desktop', 'Monitor', '', 'csl 1 and 2', 'yes'),
(126, 1, 'desktop', 'Keyboard', '', 'csl 1 and 2', 'yes'),
(126, 1, 'desktop', 'Mouse', '', 'csl 1 and 2', 'yes'),
(126, 2, 'desktop', 'CPU', 'A800', 'csl 1 and 2', 'yes'),
(126, 2, 'desktop', 'Monitor', '', 'csl 1 and 2', 'yes'),
(126, 2, 'desktop', 'Keyboard', '', 'csl 1 and 2', 'yes'),
(126, 2, 'desktop', 'Mouse', '', 'csl 1 and 2', 'yes'),
(126, 3, 'desktop', 'CPU', '', 'csl 1 and 2', 'yes'),
(126, 3, 'desktop', 'Monitor', '', 'csl 1 and 2', 'yes'),
(126, 3, 'desktop', 'Keyboard', '', 'csl 1 and 2', 'yes'),
(126, 3, 'desktop', 'Mouse', '', 'csl 1 and 2', 'yes'),
(126, 4, 'desktop', 'CPU', '', 'csl 1 and 2', 'yes'),
(126, 4, 'desktop', 'Monitor', '', 'csl 1 and 2', 'yes'),
(126, 4, 'desktop', 'Keyboard', '', 'csl 1 and 2', 'yes'),
(126, 4, 'desktop', 'Mouse', '', 'csl 1 and 2', 'yes'),
(126, 5, 'desktop', 'CPU', '', 'csl 1 and 2', 'yes'),
(126, 5, 'desktop', 'Monitor', '', 'csl 1 and 2', 'yes'),
(126, 5, 'desktop', 'Keyboard', '', 'csl 1 and 2', 'yes'),
(126, 5, 'desktop', 'Mouse', '', 'csl 1 and 2', 'yes'),
(136, 1, 'desktop', 'CPU', '', 'csl 3 & 4', 'yes'),
(136, 1, 'desktop', 'Monitor', '', 'csl 3 & 4', 'yes'),
(136, 1, 'desktop', 'Keyboard', '', 'csl 3 & 4', 'yes'),
(136, 1, 'desktop', 'Mouse', '', 'csl 3 & 4', 'yes'),
(136, 2, 'desktop', 'CPU', '', 'csl 3 & 4', 'yes'),
(136, 2, 'desktop', 'Monitor', '', 'csl 3 & 4', 'yes'),
(136, 2, 'desktop', 'Keyboard', '', 'csl 3 & 4', 'yes'),
(136, 2, 'desktop', 'Mouse', '', 'csl 3 & 4', 'yes'),
(137, 1, 'desktop', 'CPU', 'B253', 'csl 3 & 4', 'yes'),
(137, 1, 'desktop', 'Monitor', 'C789', 'csl 3 & 4', 'yes'),
(137, 1, 'desktop', 'Keyboard', 'D675', 'csl 3 & 4', 'yes'),
(137, 1, 'desktop', 'Mouse', 'A9876', 'csl 3 & 4', 'yes'),
(137, 2, 'desktop', 'CPU', 'B359', 'csl 3 & 4', 'yes'),
(137, 2, 'desktop', 'Monitor', 'A765', 'csl 3 & 4', 'yes'),
(137, 2, 'desktop', 'Keyboard', 'D688', 'csl 3 & 4', 'yes'),
(137, 2, 'desktop', 'Mouse', 'A789', 'csl 3 & 4', 'yes'),
(137, 3, 'desktop', 'CPU', 'B287', 'csl 3 & 4', 'yes'),
(137, 3, 'desktop', 'Monitor', 'C865', 'csl 3 & 4', 'yes'),
(137, 3, 'desktop', 'Keyboard', 'D765', 'csl 3 & 4', 'yes'),
(137, 3, 'desktop', 'Mouse', 'A897', 'csl 3 & 4', 'yes'),
(141, 11, 'desktop', 'CPU', 'sdsdssds', 'csl 3 & 4', 'yes'),
(141, 11, 'desktop', 'Monitor', 'kjdf', 'csl 3 & 4', 'yes'),
(141, 11, 'desktop', 'Keyboard', 'ljdf', 'csl 3 & 4', 'yes'),
(141, 11, 'desktop', 'Mouse', 'kjhdf', 'csl 3 & 4', 'yes'),
(141, 12, 'desktop', 'CPU', 'A359', 'csl 3 & 4', 'yes'),
(141, 12, 'desktop', 'Monitor', 'jkld', 'csl 3 & 4', 'yes'),
(141, 12, 'desktop', 'Keyboard', 'kjhkdf', 'csl 3 & 4', 'yes'),
(141, 12, 'desktop', 'Mouse', 'kjhkfh', 'csl 3 & 4', 'yes'),
(141, 13, 'desktop', 'CPU', 'dkjfk', 'csl 3 & 4', 'yes'),
(141, 13, 'desktop', 'Monitor', 'kdjh', 'csl 3 & 4', 'yes'),
(141, 13, 'desktop', 'Keyboard', 'kdjf', 'csl 3 & 4', 'yes'),
(141, 13, 'desktop', 'Mouse', 'kjdf', 'csl 3 & 4', 'yes'),
(142, 1, 'desktop', 'CPU', 'sdsdssds', 'csl 3 & 4', 'yes'),
(142, 1, 'desktop', 'Monitor', 'kjdf', 'csl 3 & 4', 'yes'),
(142, 1, 'desktop', 'Keyboard', 'ljdf', 'csl 3 & 4', 'yes'),
(142, 1, 'desktop', 'Mouse', 'kjhdf', 'csl 3 & 4', 'yes'),
(142, 2, 'desktop', 'CPU', 'A359', 'csl 3 & 4', 'yes'),
(142, 2, 'desktop', 'Monitor', 'jkld', 'csl 3 & 4', 'yes'),
(142, 2, 'desktop', 'Keyboard', 'kjhkdf', 'csl 3 & 4', 'yes'),
(142, 2, 'desktop', 'Mouse', 'kjhkfh', 'csl 3 & 4', 'yes'),
(142, 3, 'desktop', 'CPU', 'dkjfk', 'csl 3 & 4', 'yes'),
(142, 3, 'desktop', 'Monitor', 'kdjh', 'csl 3 & 4', 'yes'),
(142, 3, 'desktop', 'Keyboard', 'kdjf', 'csl 3 & 4', 'yes'),
(142, 3, 'desktop', 'Mouse', 'kjdf', 'csl 3 & 4', 'yes'),
(142, 4, 'desktop', 'CPU', 'dfdf', 'csl 3 & 4', 'yes'),
(142, 4, 'desktop', 'Monitor', 'ljhljl', 'csl 3 & 4', 'yes'),
(142, 4, 'desktop', 'Keyboard', 'jljljl', 'csl 3 & 4', 'yes'),
(142, 4, 'desktop', 'Mouse', 'nlnlnk', 'csl 3 & 4', 'yes'),
(142, 5, 'desktop', 'CPU', 'lk', 'csl 3 & 4', 'yes'),
(142, 5, 'desktop', 'Monitor', 'lkl', 'csl 3 & 4', 'yes'),
(142, 5, 'desktop', 'Keyboard', 'lhlhlhj', 'csl 3 & 4', 'yes'),
(142, 5, 'desktop', 'Mouse', 'lkjlj', 'csl 3 & 4', 'yes'),
(142, 6, 'desktop', 'CPU', 'lj;', 'csl 3 & 4', 'yes'),
(142, 6, 'desktop', 'Monitor', 'jl', 'csl 3 & 4', 'yes'),
(142, 6, 'desktop', 'Keyboard', ';j', 'csl 3 & 4', 'yes'),
(142, 6, 'desktop', 'Mouse', 'lh', 'csl 3 & 4', 'yes'),
(142, 7, 'desktop', 'CPU', 'ljh;l', 'csl 3 & 4', 'yes'),
(142, 7, 'desktop', 'Monitor', 'jl;k', 'csl 3 & 4', 'yes'),
(142, 7, 'desktop', 'Keyboard', 'jlkj', 'csl 3 & 4', 'yes'),
(142, 7, 'desktop', 'Mouse', 'jhk', 'csl 3 & 4', 'yes'),
(142, 8, 'desktop', 'CPU', 'g', 'csl 3 & 4', 'yes'),
(142, 8, 'desktop', 'Monitor', 'kh', 'csl 3 & 4', 'yes'),
(142, 8, 'desktop', 'Keyboard', 'o', 'csl 3 & 4', 'yes'),
(142, 8, 'desktop', 'Mouse', 'ho', 'csl 3 & 4', 'yes'),
(142, 9, 'desktop', 'CPU', 'hh', 'csl 3 & 4', 'yes'),
(142, 9, 'desktop', 'Monitor', 'oho', 'csl 3 & 4', 'yes'),
(142, 9, 'desktop', 'Keyboard', 'ojo', 'csl 3 & 4', 'yes'),
(142, 9, 'desktop', 'Mouse', 'oho', 'csl 3 & 4', 'yes'),
(142, 10, 'desktop', 'CPU', 'hjhkjh', 'csl 3 & 4', 'yes'),
(142, 10, 'desktop', 'Monitor', 'khj', 'csl 3 & 4', 'yes'),
(142, 10, 'desktop', 'Keyboard', 'khj', 'csl 3 & 4', 'yes'),
(142, 10, 'desktop', 'Mouse', 'kjhljh', 'csl 3 & 4', 'yes'),
(143, 1, 'electronic', 'Serial_number', 'dfdfdf', 'csl 3 & 4', 'T'),
(143, 2, 'electronic', 'Serial_number', 'dlfdl', 'csl 3 & 4', 'yes');

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
  `location` varchar(50) NOT NULL,
  `warranty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `o_invoice`
--

INSERT INTO `o_invoice` (`invoice_id`, `name`, `date`, `price`, `quantity`, `folio_number`, `description`, `supplier_name`, `supplier_tt`, `srn`, `location`, `warranty`) VALUES
(15, 'Test_1aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '2024-10-04', 1234, 123, 'UOJ/CSC/145/1-3', '1231aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'Chamidu', 2147483647, 0, 'CUL 3&45aaa', 0),
(16, 'Chamindu', '2023-08-31', 320, 3, 'UOJ/CSC/123/1-20', 'ljijljojlkjljlk', 'Chamidu', 4563121, 321, 'CUL 3&45', 15);

-- --------------------------------------------------------

--
-- Table structure for table `o_items`
--

CREATE TABLE `o_items` (
  `invoice_id` int(11) NOT NULL,
  `set_id` int(11) NOT NULL,
  `serial_number` varchar(50) NOT NULL,
  `location` varchar(100) NOT NULL,
  `working` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `o_items`
--

INSERT INTO `o_items` (`invoice_id`, `set_id`, `serial_number`, `location`, `working`) VALUES
(16, 1, '1234', 'CUL 3&45', 'yes'),
(16, 2, 'model1234', 'CUL 3&45', 'yes'),
(16, 3, '', 'CUL 3&45', 'yes');

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
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `o_invoice`
--
ALTER TABLE `o_invoice`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
