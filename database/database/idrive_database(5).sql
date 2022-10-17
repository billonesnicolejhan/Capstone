-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2022 at 03:49 PM
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
  `Type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_billing_type`
--

INSERT INTO `tbl_billing_type` (`billing_type_id`, `Type`) VALUES
(1, 'Bank Loan'),
(2, 'Power Bill'),
(3, 'Internet Bill'),
(4, 'Place Rental'),
(5, 'Landline Bill'),
(6, 'Water Bill'),
(7, 'Repair and Maintenance'),
(8, 'Gasoline');

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
(1, 'iDrive Driving Tutorial Koronadal', '09464003615', 'balmores', 'koronadal', 'GPS', 'south Cotabato', 'active', '2022-10-01 00:18:59', '2022-10-01 00:18:59'),
(4, 'iDrive Driving Tutorial Gensan', '98909213', 'balmores', 'koronadal', 'gps', 'south cotabato', 'active', '2022-10-04 15:59:13', '2022-10-03 15:26:56'),
(6, 'EliZhen', '9999', 'Confessor', 'Koronadal', 'Zone III', 'SOUTH COTABATO', 'active', '2022-10-06 05:06:58', '2022-10-06 05:06:58');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `purchase_request_id` int(15) NOT NULL,
  `pr_code` int(15) NOT NULL,
  `plate` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`purchase_request_id`, `pr_code`, `plate`) VALUES
(1, 1, 'xamp');

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
  `isRemoved` varchar(50) NOT NULL DEFAULT 'active'
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

--
-- Dumping data for table `tbl_purchase_no`
--

INSERT INTO `tbl_purchase_no` (`purchase_request_id`, `purchase_request_no`, `supplier_id`, `date_issued`, `branch_id`, `category`, `isPending`, `isCancel`, `date_updated`) VALUES
(3, 'PR-2022-001', 1, '2022-10-09', 4, 'Service', 'pending', 'no', '2022-10-09 12:47:28'),
(4, 'PR-2022-002', 8, '2022-10-09', 4, 'Service', 'pending', 'no', '2022-10-09 12:51:31'),
(5, 'PR-2022-003', 3, '2022-10-09', 4, 'Gasoline', 'pending', 'no', '2022-10-09 13:25:05');

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

--
-- Dumping data for table `tbl_purchase_request`
--

INSERT INTO `tbl_purchase_request` (`PR_ID`, `purchase_request_no`, `plate_no`, `quantity`, `unit`, `description`) VALUES
(3, 3, 'asda', 'dsadad', 'dadsd', 'dasdas'),
(4, 4, 'TORS', '56', 'Liter', 'Unleaded'),
(5, 5, 'KMAX', '4', 'Liter', 'Unleaded'),
(6, 5, 'MAXOP', '5', 'Liter', 'Unleaded');

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

--
-- Dumping data for table `tbl_supplier`
--

INSERT INTO `tbl_supplier` (`supplier_id`, `branch_id`, `supplier_name`, `contact`, `street`, `barangay`, `city`, `province`, `date_created`, `status`) VALUES
(1, 1, 'Shell gasoline Station', '09464003615', 'kalikasan', 'paraiso', 'koronadal', 'south cotabato', '2022-10-03 23:33:00', 'active'),
(2, 4, 'Ace', '09090909', 'gensan', 'gen', 'general', 'santos', '2022-10-03 23:34:32', 'deactivate'),
(3, 1, 'Ace Center point', '09464003615', 'gps', 'gps', 'gps', 'gps', '2022-10-04 10:14:09', 'active'),
(4, 1, 'Shell gasoline Station', '9090909090', 'BRGY ', 'ghgj', 'CITY OF', 'SOUTH COTABATO', '2022-10-05 19:47:29', 'active'),
(5, 4, 'Kcc Gensan', '09464003615s', 'sdaa', 'dad', 'dad', 'dadsa', '2022-10-05 20:01:03', 'active'),
(6, 4, 'Riavin2', '09464003615', '2', 'w', 'e', 'e', '2022-10-05 23:17:06', 'active'),
(7, 4, 'Kcc2', '12323232322112312', 'dsad', 'dad', 'dad', 'dadad', '2022-10-07 00:28:22', 'active'),
(8, 4, 'aynerTora', '09464003615', 'kaliksan', 'paraiso', 'koronadal', 'south cotabato', '2022-10-08 20:39:51', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tbl`
--

CREATE TABLE `tbl_tbl` (
  `PR_NO` int(11) NOT NULL,
  `purchase_no` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_tbl`
--

INSERT INTO `tbl_tbl` (`PR_NO`, `purchase_no`) VALUES
(1, 'PR-2022-001');

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
(1, 'admin', 'Elemento', 'admin', 'gen_manager', 1, 'admin', '12345', 'active', '310432066_1617281018725177_9041066339197070027_n.jpg', '2022-10-03 15:25:51', '2022-10-05 11:10:42'),
(2, 'nicole', 'jhan', 'Billones', 'manager', 1, 'bill', '1', 'active', '', '2022-10-03 15:27:56', '2022-10-05 16:47:50'),
(3, 'wqw', 'wqeqw', 'eqw', 'manager', 4, 'root', '1', 'deactivate', '', '2022-10-04 13:24:25', '2022-10-04 14:38:36'),
(4, 'ayner', 'Elemento', 'tora', 'manager', 4, 'ayner', '123', 'active', '310543644_665340518129447_6064129301452053973_n.jpg', '2022-10-05 10:43:45', '2022-10-05 11:36:47'),
(6, 'Jemas', 'James', 'Lebron', 'manager', 6, 'jemaslebron', '12345678', 'deactivate', '1.jpg', '2022-10-06 05:07:59', '2022-10-06 16:30:06'),
(7, 'IGNACIO', 'LIBRADO', 'TORA', 'Finance Clerk', 4, '1', '1', 'active', '', '2022-10-06 16:29:35', '2022-10-06 16:29:35');

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
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`purchase_request_id`),
  ADD KEY `pr_code` (`pr_code`);

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
-- Indexes for table `tbl_tbl`
--
ALTER TABLE `tbl_tbl`
  ADD PRIMARY KEY (`PR_NO`);

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
  MODIFY `billing_type_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_branch`
--
ALTER TABLE `tbl_branch`
  MODIFY `branch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `purchase_request_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_payment_schedule`
--
ALTER TABLE `tbl_payment_schedule`
  MODIFY `payment_schedule_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_purchase_no`
--
ALTER TABLE `tbl_purchase_no`
  MODIFY `purchase_request_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_purchase_request`
--
ALTER TABLE `tbl_purchase_request`
  MODIFY `PR_ID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_tbl`
--
ALTER TABLE `tbl_tbl`
  MODIFY `PR_NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `User_ID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
