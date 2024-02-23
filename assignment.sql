-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2024 at 03:31 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignment`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `contact_no` varchar(10) NOT NULL,
  `district` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `title`, `first_name`, `middle_name`, `last_name`, `contact_no`, `district`) VALUES
(1, 'Mr', 'saman', 'shantha', 'kumara', '0724468955', 5),
(2, 'Mr', 'Ruwan', 'nishantha', 'bandara', '0786598526', 7),
(3, 'Mrs', 'Nishani', 'dhammika', 'bandara', '0753256589', 6),
(4, 'Miss', 'Samanthi', 'kumari', 'kulathunga', '0762354576', 22),
(5, 'Dr', 'Kalpana', 'Kal', 'Gala', '07119119', 16),
(6, 'Mr', 'As', 'll', 'Ahamed', '0712526716', 23);

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `district` varchar(50) DEFAULT NULL,
  `active` varchar(10) DEFAULT NULL,
  `id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`district`, `active`, `id`) VALUES
('Ampara', 'yes', 1),
('Anuradhapura', 'yes', 2),
('Badulla', 'yes', 3),
('Batticaloa', 'yes', 4),
('Colombo', 'yes', 5),
('Galle', 'yes', 6),
('Gampaha', 'yes', 7),
('Hambantota', 'yes', 8),
('Jaffna', 'yes', 9),
('Kalutara', 'yes', 10),
('Kalutara', 'yes', 11),
('Kandy', 'yes', 12),
('Kegalle', 'yes', 13),
('Kilinochchi', 'yes', 14),
('Kurunegala', 'yes', 15),
('Mannar', 'yes', 16),
('Matale', 'yes', 17),
('Matara', 'yes', 18),
('Moneragala', 'yes', 19),
('Mullaitivu', 'yes', 20),
('Nuwara Eliya', 'yes', 21),
('Polonnaruwa', 'yes', 22),
('Puttalam', 'yes', 23),
('Rathnapura', 'yes', 24),
('Vavuniya', 'yes', 25);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `invoice_no` varchar(50) NOT NULL,
  `customer` varchar(10) NOT NULL,
  `item_count` varchar(50) NOT NULL,
  `amount` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `date`, `time`, `invoice_no`, `customer`, `item_count`, `amount`) VALUES
(1, '2021-04-01', '07:00:14', '1001', '1', '2', '7500'),
(2, '2021-04-01', '14:23:12', '1002', '2', '1', '75000'),
(3, '2021-04-02', '10:12:55', '1003', '3', '1', '117000'),
(4, '2021-04-04', '15:44:22', '1004', '1', '2', '21000'),
(5, '2021-04-06', '13:15:52', '1005', '3', '4', '15000'),
(6, '2021-04-07', '14:22:36', '1006', '4', '10', '117500'),
(7, '2021-04-07', '16:11:48', '1006', '2', '32', '24016'),
(8, '2021-04-09', '12:11:55', '1007', '2', '2', '150000');

-- --------------------------------------------------------

--
-- Stand-in structure for view `invoice_item`
-- (See below for the actual view)
--
CREATE TABLE `invoice_item` (
`invoice_no` varchar(50)
,`date` date
,`customer_name` varchar(50)
,`item_name` varchar(20)
,`item_code` varchar(20)
,`category` varchar(100)
,`unit_price` varchar(20)
);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_master`
--

CREATE TABLE `invoice_master` (
  `id` int(11) NOT NULL,
  `invoice_no` varchar(50) NOT NULL,
  `item_id` varchar(50) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `unit_price` varchar(50) NOT NULL,
  `amount` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice_master`
--

INSERT INTO `invoice_master` (`id`, `invoice_no`, `item_id`, `quantity`, `unit_price`, `amount`) VALUES
(1, '1001', '1', '1', '5000', '5000'),
(2, '1001', '4', '1', '2500', '2500'),
(3, '1002', '2', '1', '75000', '75000'),
(4, '1003', '5', '2', '58500', '117000'),
(5, '1004', '3', '1', '18500', '18500'),
(6, '1004', '4', '1', '2500', '2500'),
(7, '1004', '1', '2', '5000', '10000'),
(8, '1004', '4', '2', '2500', '5000'),
(9, '1005', '3', '5', '18500', '92500'),
(10, '1005', '1', '5', '5000', '25000'),
(11, '1006', '6', '32', '750.50', '24016'),
(12, '1007', '2', '2', '75000', '150000');

-- --------------------------------------------------------

--
-- Stand-in structure for view `invoice_report`
-- (See below for the actual view)
--
CREATE TABLE `invoice_report` (
`invoice_no` varchar(50)
,`date` date
,`customer_id` varchar(10)
,`first_name` varchar(50)
,`district` varchar(50)
,`item_count` varchar(50)
,`amount` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `item_code` varchar(20) NOT NULL,
  `item_category` int(11) NOT NULL,
  `item_subcategory` int(11) NOT NULL,
  `item_name` varchar(20) NOT NULL,
  `quantity` varchar(20) NOT NULL,
  `unit_price` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `item_code`, `item_category`, `item_subcategory`, `item_name`, `quantity`, `unit_price`) VALUES
(1, 'JK007', 1, 1, 'HP Laser printer', '10', '5000'),
(2, 'CS6656', 2, 3, 'Lenovo Ideapad 300', '5', '75000'),
(3, 'KL9956', 3, 5, 'Samsung touch displa', '6', '18500'),
(4, 'HH7565', 4, 1, 'Colour ink', '5', '2500'),
(5, 'SM3534', 2, 2, 'Dell latitude', '5', '58500'),
(6, 'KM6526', 3, 5, 'Samsung headset', '50', '750.50'),
(9, '55dd', 4, 3, 'Bikka', '25', '25'),
(10, 'J205', 3, 5, 'Jokka', '96', '98'),
(11, '555', 3, 3, 'headphone', '25', '8500'),
(12, '5855', 3, 5, 'Fan', '256', '8560');

-- --------------------------------------------------------

--
-- Table structure for table `item_category`
--

CREATE TABLE `item_category` (
  `id` int(11) NOT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_category`
--

INSERT INTO `item_category` (`id`, `category`) VALUES
(1, 'Printers'),
(2, 'Laptops'),
(3, 'Gadgets'),
(4, 'Ink bottels'),
(5, 'Cartridges');

-- --------------------------------------------------------

--
-- Stand-in structure for view `item_report`
-- (See below for the actual view)
--
CREATE TABLE `item_report` (
`item_name` varchar(20)
,`category` varchar(100)
,`sub_category` varchar(100)
,`quantity` varchar(20)
);

-- --------------------------------------------------------

--
-- Table structure for table `item_subcategory`
--

CREATE TABLE `item_subcategory` (
  `id` int(11) NOT NULL,
  `sub_category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_subcategory`
--

INSERT INTO `item_subcategory` (`id`, `sub_category`) VALUES
(1, 'HP'),
(2, 'Dell'),
(3, 'Lenovo'),
(4, 'Acer'),
(5, 'Samsung');

-- --------------------------------------------------------

--
-- Structure for view `invoice_item`
--
DROP TABLE IF EXISTS `invoice_item`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `invoice_item`  AS  select `it`.`invoice_no` AS `invoice_no`,`it`.`date` AS `date`,`ct`.`first_name` AS `customer_name`,`item`.`item_name` AS `item_name`,`item`.`item_code` AS `item_code`,`cat`.`category` AS `category`,`item`.`unit_price` AS `unit_price` from ((((`invoice` `it` join `customer` `ct` on(`it`.`customer` = `ct`.`id`)) join `invoice_master` `im` on(`it`.`invoice_no` = `im`.`invoice_no`)) join `item` on(`im`.`item_id` = `item`.`id`)) join `item_category` `cat` on(`item`.`item_category` = `cat`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `invoice_report`
--
DROP TABLE IF EXISTS `invoice_report`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `invoice_report`  AS  select `it`.`invoice_no` AS `invoice_no`,`it`.`date` AS `date`,`it`.`customer` AS `customer_id`,`ct`.`first_name` AS `first_name`,`dt`.`district` AS `district`,`it`.`item_count` AS `item_count`,`it`.`amount` AS `amount` from ((`invoice` `it` join `customer` `ct` on(`it`.`customer` = `ct`.`id`)) join `district` `dt` on(`ct`.`district` = `dt`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `item_report`
--
DROP TABLE IF EXISTS `item_report`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `item_report`  AS  select `item`.`item_name` AS `item_name`,max(`cat`.`category`) AS `category`,max(`sub`.`sub_category`) AS `sub_category`,max(`item`.`quantity`) AS `quantity` from ((`item` join `item_category` `cat` on(`item`.`item_category` = `cat`.`id`)) join `item_subcategory` `sub` on(`item`.`item_subcategory` = `sub`.`id`)) group by `item`.`item_name` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `district` (`district`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_master`
--
ALTER TABLE `invoice_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_category` (`item_category`),
  ADD KEY `item_subcategory` (`item_subcategory`);

--
-- Indexes for table `item_category`
--
ALTER TABLE `item_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_subcategory`
--
ALTER TABLE `item_subcategory`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `invoice_master`
--
ALTER TABLE `invoice_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `item_category`
--
ALTER TABLE `item_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `item_subcategory`
--
ALTER TABLE `item_subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`district`) REFERENCES `district` (`id`);

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`item_category`) REFERENCES `item_category` (`id`),
  ADD CONSTRAINT `item_ibfk_2` FOREIGN KEY (`item_subcategory`) REFERENCES `item_subcategory` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
