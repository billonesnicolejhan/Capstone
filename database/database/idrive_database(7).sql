-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2022 at 07:36 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `idrive_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_billing_type`
--

CREATE TABLE `tbl_billing_type` (
  `billing_type_id` int(15) NOT NULL,
  `Type` varchar(50) NOT NULL,
  `isCancel` varchar(20) NOT NULL DEFAULT 'no',
  `branch` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_billing_type`
--

INSERT INTO `tbl_billing_type` (`billing_type_id`, `Type`, `isCancel`, `branch`) VALUES
(1, 'Water', 'no', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_branch`
--

CREATE TABLE `tbl_branch` (
  `branch_id` int(11) NOT NULL,
  `branch_name` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_branch`
--

INSERT INTO `tbl_branch` (`branch_id`, `branch_name`, `contact`, `street`, `city`, `barangay`, `province`, `status`, `created_at`, `updated_at`) VALUES
(1, 'iDrive Driving Tutorial Koronadal', '09274858615', 'Balmores ', 'Koronadal', 'GPS', 'South Cotabato', 'active', '2022-10-17 04:36:03', '2022-10-17 04:36:03'),
(2, 'iDrive Gensan', '09464003615', 'Kalikasan', 'Koronadal', 'Paraiso', 'South Cotabato', 'active', '2022-10-17 05:03:12', '2022-10-17 05:03:12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_car`
--

CREATE TABLE `tbl_car` (
  `car_id` int(15) NOT NULL,
  `plate_no` varchar(50) NOT NULL,
  `branch_id` int(15) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `color` varchar(50) NOT NULL,
  `VIN` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'active',
  `Date_Created` date NOT NULL,
  `Date_Updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_car`
--

INSERT INTO `tbl_car` (`car_id`, `plate_no`, `branch_id`, `brand`, `color`, `VIN`, `status`, `Date_Created`, `Date_Updated`) VALUES
(1, 'XAMP', 2, 'Honda', 'Pink', 'XXXXXXXX', 'active', '2022-10-17', '2022-10-17 05:08:19'),
(2, 'BPMP', 2, 'Mioo', 'Grenn', 'LLLLLLLKKD', 'active', '2022-10-17', '2022-10-17 05:08:15'),
(3, 'KOM', 1, 'Ninja', 'blue', 'sase', 'active', '2022-10-17', '2022-10-17 05:10:09');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment_schedule`
--

CREATE TABLE `tbl_payment_schedule` (
  `payment_schedule_id` int(11) NOT NULL,
  `billing_type_id` int(15) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `total_amount` varchar(50) NOT NULL,
  `due_date` date NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Unpaid',
  `isRemoved` varchar(50) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchase_no`
--

CREATE TABLE `tbl_purchase_no` (
  `purchase_request_id` int(15) NOT NULL,
  `purchase_request_no` varchar(50) NOT NULL,
  `supplier_id` int(15) NOT NULL,
  `date_issued` date NOT NULL,
  `branch_id` int(15) NOT NULL,
  `category` varchar(50) NOT NULL,
  `isPending` varchar(50) NOT NULL DEFAULT 'pending',
  `isCancel` varchar(50) NOT NULL DEFAULT 'no',
  `date_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchase_order`
--

CREATE TABLE `tbl_purchase_order` (
  `PO_ID` int(15) NOT NULL,
  `Purchase_order_No` varchar(50) NOT NULL,
  `branch_id` int(15) NOT NULL,
  `purchase_request_id` int(15) NOT NULL,
  `payment_terms` varchar(50) NOT NULL,
  `Reference` varchar(20) NOT NULL DEFAULT 'yes',
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchase_request`
--

CREATE TABLE `tbl_purchase_request` (
  `PR_ID` int(15) NOT NULL,
  `purchase_request_no` int(15) NOT NULL,
  `plate_no` varchar(50) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `unit` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supplier`
--

CREATE TABLE `tbl_supplier` (
  `supplier_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `supplier_name` varchar(50) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `street` varchar(50) NOT NULL,
  `barangay` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(15) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `User_ID` int(15) NOT NULL,
  `First_Name` varchar(50) NOT NULL,
  `Middle_Name` varchar(50) NOT NULL,
  `Last_Name` varchar(50) NOT NULL,
  `Position` varchar(50) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `Username` varchar(225) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Status` varchar(50) NOT NULL DEFAULT 'active',
  `image` text NOT NULL,
  `Date_Created` timestamp NOT NULL DEFAULT current_timestamp(),
  `Date_Updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`User_ID`, `First_Name`, `Middle_Name`, `Last_Name`, `Position`, `branch_id`, `Username`, `Password`, `Status`, `image`, `Date_Created`, `Date_Updated`) VALUES
(1, 'Iner', 'Element', 'Tora', 'gen_manager', 1, 'admin', '123', 'active', '', '2022-10-17 04:37:24', '2022-10-17 04:37:24'),
(2, 'Nicole Jhan', 'B', 'Billones', 'manager', 2, 'Nick123', '12345', 'active', '', '2022-10-17 05:04:00', '2022-10-17 05:04:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_billing_type`
--
ALTER TABLE `tbl_billing_type`
  ADD PRIMARY KEY (`billing_type_id`);

--
-- Indexes for table `tbl_branch`
--
ALTER TABLE `tbl_branch`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `tbl_car`
--
ALTER TABLE `tbl_car`
  ADD PRIMARY KEY (`car_id`);

--
-- Indexes for table `tbl_payment_schedule`
--
ALTER TABLE `tbl_payment_schedule`
  ADD PRIMARY KEY (`payment_schedule_id`),
  ADD KEY `branch_id` (`branch_id`),
  ADD KEY `billing_type_id` (`billing_type_id`);

--
-- Indexes for table `tbl_purchase_no`
--
ALTER TABLE `tbl_purchase_no`
  ADD PRIMARY KEY (`purchase_request_id`),
  ADD KEY `supplier_id` (`supplier_id`),
  ADD KEY `branch_id` (`branch_id`);

--
-- Indexes for table `tbl_purchase_order`
--
ALTER TABLE `tbl_purchase_order`
  ADD PRIMARY KEY (`PO_ID`),
  ADD KEY `branch_id` (`branch_id`),
  ADD KEY `purchase_request_id` (`purchase_request_id`);

--
-- Indexes for table `tbl_purchase_request`
--
ALTER TABLE `tbl_purchase_request`
  ADD PRIMARY KEY (`PR_ID`),
  ADD KEY `purchase_request_no` (`purchase_request_no`);

--
-- Indexes for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  ADD PRIMARY KEY (`supplier_id`),
  ADD KEY `branch_id` (`branch_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`User_ID`),
  ADD KEY `branch_id` (`branch_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_billing_type`
--
ALTER TABLE `tbl_billing_type`
  MODIFY `billing_type_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_branch`
--
ALTER TABLE `tbl_branch`
  MODIFY `branch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_car`
--
ALTER TABLE `tbl_car`
  MODIFY `car_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_payment_schedule`
--
ALTER TABLE `tbl_payment_schedule`
  MODIFY `payment_schedule_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_purchase_no`
--
ALTER TABLE `tbl_purchase_no`
  MODIFY `purchase_request_id` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_purchase_order`
--
ALTER TABLE `tbl_purchase_order`
  MODIFY `PO_ID` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_purchase_request`
--
ALTER TABLE `tbl_purchase_request`
  MODIFY `PR_ID` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `User_ID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_payment_schedule`
--
ALTER TABLE `tbl_payment_schedule`
  ADD CONSTRAINT `tbl_payment_schedule_ibfk_1` FOREIGN KEY (`branch_id`) REFERENCES `tbl_branch` (`branch_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_payment_schedule_ibfk_2` FOREIGN KEY (`billing_type_id`) REFERENCES `tbl_billing_type` (`billing_type_id`);

--
-- Constraints for table `tbl_purchase_no`
--
ALTER TABLE `tbl_purchase_no`
  ADD CONSTRAINT `tbl_purchase_no_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `tbl_supplier` (`supplier_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_purchase_no_ibfk_2` FOREIGN KEY (`branch_id`) REFERENCES `tbl_branch` (`branch_id`);

--
-- Constraints for table `tbl_purchase_order`
--
ALTER TABLE `tbl_purchase_order`
  ADD CONSTRAINT `tbl_purchase_order_ibfk_1` FOREIGN KEY (`branch_id`) REFERENCES `tbl_branch` (`branch_id`),
  ADD CONSTRAINT `tbl_purchase_order_ibfk_2` FOREIGN KEY (`purchase_request_id`) REFERENCES `tbl_purchase_no` (`purchase_request_id`);

--
-- Constraints for table `tbl_purchase_request`
--
ALTER TABLE `tbl_purchase_request`
  ADD CONSTRAINT `tbl_purchase_request_ibfk_1` FOREIGN KEY (`purchase_request_no`) REFERENCES `tbl_purchase_no` (`purchase_request_id`);

--
-- Constraints for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  ADD CONSTRAINT `tbl_supplier_ibfk_1` FOREIGN KEY (`branch_id`) REFERENCES `tbl_branch` (`branch_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD CONSTRAINT `tbl_user_ibfk_1` FOREIGN KEY (`branch_id`) REFERENCES `tbl_branch` (`branch_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
