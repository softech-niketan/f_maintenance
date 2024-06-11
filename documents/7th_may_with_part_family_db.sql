-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 07, 2022 at 10:55 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newerp`
--

-- --------------------------------------------------------

--
-- Table structure for table `asset`
--

CREATE TABLE `asset` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bill_tracking`
--

CREATE TABLE `bill_tracking` (
  `id` int(11) NOT NULL,
  `c_po_so_id` int(11) NOT NULL,
  `invoice_number` varchar(20) NOT NULL,
  `invoice_date` varchar(20) NOT NULL,
  `invoice_amount` varchar(10) NOT NULL,
  `tds_amount` varchar(12) NOT NULL,
  `less_tds_amount` varchar(12) NOT NULL,
  `stv_number` varchar(15) NOT NULL,
  `stv_amount` varchar(15) NOT NULL,
  `balance_amount` varchar(20) DEFAULT NULL,
  `date` varchar(15) NOT NULL,
  `statement_booking_amount` varchar(15) NOT NULL,
  `payment_due_date_mk` varchar(20) NOT NULL,
  `payment_due_date_customer` varchar(20) DEFAULT NULL,
  `date_added` date NOT NULL,
  `time` time NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_id` int(11) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bom`
--

CREATE TABLE `bom` (
  `id` int(11) NOT NULL,
  `customer_part_id` int(30) NOT NULL,
  `child_part_id` int(30) NOT NULL,
  `quantity` float NOT NULL,
  `created_id` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bom`
--

INSERT INTO `bom` (`id`, `customer_part_id`, `child_part_id`, `quantity`, `created_id`, `date`, `time`, `timestamp`, `deleted`) VALUES
(1, 1, 1, 2, 1, '07-05-2022', '01:16:47', '2022-05-07 07:46:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `challan`
--

CREATE TABLE `challan` (
  `id` int(11) NOT NULL,
  `sub_po_id` int(11) NOT NULL,
  `challan_number` text DEFAULT NULL,
  `staus` varchar(20) DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `child_part`
--

CREATE TABLE `child_part` (
  `id` int(11) NOT NULL,
  `stock` float NOT NULL,
  `part_number` varchar(255) NOT NULL,
  `part_description` varchar(250) NOT NULL,
  `supplier_id` int(30) DEFAULT NULL,
  `part_rate` int(11) DEFAULT NULL,
  `revision_date` varchar(50) DEFAULT NULL,
  `revision_no` varchar(50) DEFAULT NULL,
  `revision_remark` varchar(20) DEFAULT NULL,
  `uom_id` int(11) NOT NULL,
  `child_part_id` int(255) DEFAULT NULL,
  `store_rack_location` varchar(255) DEFAULT NULL,
  `store_stock_rate` float DEFAULT NULL,
  `safty_buffer_stk` varchar(255) NOT NULL,
  `diagram` varchar(50) DEFAULT NULL,
  `quote` varchar(50) DEFAULT NULL,
  `created_id` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted` int(11) DEFAULT NULL,
  `hsn_code` varchar(20) DEFAULT NULL,
  `part_drawing` text DEFAULT NULL,
  `ppap_document` text NOT NULL,
  `modal_document` text NOT NULL,
  `cad_file` text NOT NULL,
  `a_d` text NOT NULL,
  `q_d` text NOT NULL,
  `c_d` text NOT NULL,
  `quotation_document` varchar(20) DEFAULT NULL,
  `gst_id` int(11) DEFAULT NULL,
  `sub_type` text DEFAULT NULL,
  `max_uom` float DEFAULT NULL,
  `min_uom` float DEFAULT NULL,
  `onhold_stock` float NOT NULL,
  `production_qty` float NOT NULL,
  `rejection_prodcution_qty` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `child_part`
--

INSERT INTO `child_part` (`id`, `stock`, `part_number`, `part_description`, `supplier_id`, `part_rate`, `revision_date`, `revision_no`, `revision_remark`, `uom_id`, `child_part_id`, `store_rack_location`, `store_stock_rate`, `safty_buffer_stk`, `diagram`, `quote`, `created_id`, `date`, `time`, `timestamp`, `deleted`, `hsn_code`, `part_drawing`, `ppap_document`, `modal_document`, `cad_file`, `a_d`, `q_d`, `c_d`, `quotation_document`, `gst_id`, `sub_type`, `max_uom`, `min_uom`, `onhold_stock`, `production_qty`, `rejection_prodcution_qty`) VALUES
(1, 0, 'partp1', 'p1testing', NULL, NULL, NULL, NULL, NULL, 1, NULL, '20', 20, '20', NULL, NULL, 1, '06-05-2022', '09:46:27', '2022-05-06 16:16:27', NULL, '20', '', '', '', '', '', '', '', NULL, NULL, 'Regular grn', 999, NULL, 0, 0, 0),
(2, 0, 'partp2', 'p2', NULL, NULL, NULL, NULL, NULL, 1, NULL, 'p2', 20, '20', NULL, NULL, 1, '06-05-2022', '09:46:45', '2022-05-06 16:16:45', NULL, 'p2', '', '', '', '', '', '', '', NULL, NULL, 'Regular grn', 777, NULL, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `child_part_master`
--

CREATE TABLE `child_part_master` (
  `id` int(11) NOT NULL,
  `stock` float NOT NULL,
  `onhold_stock` float NOT NULL,
  `production_qty` float NOT NULL,
  `rejection_prodcution_qty` float NOT NULL,
  `part_number` varchar(255) NOT NULL,
  `part_description` varchar(200) NOT NULL,
  `supplier_id` int(30) DEFAULT NULL,
  `part_rate` float DEFAULT NULL,
  `revision_date` varchar(50) NOT NULL,
  `revision_no` varchar(50) NOT NULL,
  `revision_remark` varchar(20) DEFAULT NULL,
  `uom_id` int(11) NOT NULL,
  `child_part_id` int(255) NOT NULL,
  `safty_buffer_stk` varchar(255) NOT NULL,
  `diagram` varchar(50) DEFAULT NULL,
  `quote` varchar(50) DEFAULT NULL,
  `created_id` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted` int(11) DEFAULT NULL,
  `hsn_code` varchar(20) DEFAULT NULL,
  `part_drawing` varchar(50) DEFAULT NULL,
  `ppap_document` varchar(20) DEFAULT NULL,
  `modal_document` varchar(20) DEFAULT NULL,
  `cad_file` varchar(20) DEFAULT NULL,
  `a_d` varchar(20) DEFAULT NULL,
  `q_d` varchar(20) DEFAULT NULL,
  `c_d` varchar(20) DEFAULT NULL,
  `quotation_document` varchar(20) DEFAULT NULL,
  `with_in_state` varchar(10) DEFAULT 'no',
  `gst_id` int(11) DEFAULT NULL,
  `admin_approve` varchar(20) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `child_part_master`
--

INSERT INTO `child_part_master` (`id`, `stock`, `onhold_stock`, `production_qty`, `rejection_prodcution_qty`, `part_number`, `part_description`, `supplier_id`, `part_rate`, `revision_date`, `revision_no`, `revision_remark`, `uom_id`, `child_part_id`, `safty_buffer_stk`, `diagram`, `quote`, `created_id`, `date`, `time`, `timestamp`, `deleted`, `hsn_code`, `part_drawing`, `ppap_document`, `modal_document`, `cad_file`, `a_d`, `q_d`, `c_d`, `quotation_document`, `with_in_state`, `gst_id`, `admin_approve`) VALUES
(4, 0, 0, 0, 0, 'partp1', 'p1testing', 1, 20, '07-05-2022', '1', 'first', 1, 1, '', NULL, NULL, 1, '07-05-2022', '12:54:22', '2022-05-07 07:25:22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, 1, 'accept'),
(5, 0, 0, 0, 0, 'partp2', 'p2', 1, 20, '07-05-2022', '1', 'first', 1, 2, '', NULL, NULL, 1, '07-05-2022', '01:02:44', '2022-05-07 07:33:06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, 1, 'accept');

-- --------------------------------------------------------

--
-- Table structure for table `child_part_variance`
--

CREATE TABLE `child_part_variance` (
  `id` int(11) NOT NULL,
  `stock` float NOT NULL,
  `part_number` varchar(255) NOT NULL,
  `part_description` varchar(250) NOT NULL,
  `supplier_id` int(30) DEFAULT NULL,
  `part_rate` int(11) DEFAULT NULL,
  `revision_date` varchar(50) DEFAULT NULL,
  `revision_no` varchar(50) DEFAULT NULL,
  `revision_remark` varchar(20) DEFAULT NULL,
  `uom_id` int(11) NOT NULL,
  `child_part_id` int(255) NOT NULL,
  `store_rack_location` varchar(255) DEFAULT NULL,
  `store_stock_rate` float DEFAULT NULL,
  `safty_buffer_stk` varchar(255) NOT NULL,
  `diagram` varchar(50) DEFAULT NULL,
  `quote` varchar(50) DEFAULT NULL,
  `created_id` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted` int(11) DEFAULT NULL,
  `hsn_code` varchar(20) DEFAULT NULL,
  `part_drawing` text DEFAULT NULL,
  `ppap_document` text NOT NULL,
  `modal_document` text NOT NULL,
  `cad_file` text NOT NULL,
  `a_d` text NOT NULL,
  `q_d` text NOT NULL,
  `c_d` text NOT NULL,
  `quotation_document` varchar(20) DEFAULT NULL,
  `gst_id` int(11) DEFAULT NULL,
  `sub_type` text DEFAULT NULL,
  `max_uom` float DEFAULT NULL,
  `min_uom` float DEFAULT NULL,
  `onhold_stock` float NOT NULL,
  `production_qty` float NOT NULL,
  `rejection_prodcution_qty` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `client_name` varchar(50) NOT NULL,
  `contact_person` varchar(30) NOT NULL,
  `pan_no` varchar(20) NOT NULL,
  `billing_address` varchar(255) DEFAULT NULL,
  `shifting_address` varchar(255) NOT NULL,
  `phone_no` varchar(50) NOT NULL,
  `gst_number` varchar(50) NOT NULL,
  `created_id` int(11) DEFAULT NULL,
  `date` varchar(10) DEFAULT NULL,
  `time` varchar(10) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT current_timestamp(),
  `deleted` int(11) DEFAULT 0,
  `state` varchar(20) NOT NULL,
  `state_no` varchar(20) NOT NULL,
  `bank_details` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `client_name`, `contact_person`, `pan_no`, `billing_address`, `shifting_address`, `phone_no`, `gst_number`, `created_id`, `date`, `time`, `timestamp`, `deleted`, `state`, `state_no`, `bank_details`) VALUES
(1, 'a', 'a', 'a', 'a', 'a', '123', 'a', 1, '06-05-2022', '09:44:17', '2022-05-06 16:14:17', 0, 'a', 'a', 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `consumable_item`
--

CREATE TABLE `consumable_item` (
  `id` int(11) NOT NULL,
  `part_number` varchar(30) NOT NULL,
  `part_description` varchar(30) NOT NULL,
  `created_id` int(11) DEFAULT NULL,
  `date` varchar(10) DEFAULT NULL,
  `time` varchar(10) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `customer_code` varchar(30) NOT NULL,
  `billing_address` varchar(255) DEFAULT NULL,
  `shifting_address` varchar(255) NOT NULL,
  `payment_terms` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `gst_number` varchar(50) NOT NULL,
  `created_id` int(11) DEFAULT NULL,
  `date` varchar(10) DEFAULT NULL,
  `time` varchar(10) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT current_timestamp(),
  `deleted` int(11) DEFAULT 0,
  `vendor_code` varchar(20) DEFAULT NULL,
  `pan_no` varchar(20) NOT NULL,
  `state_no` varchar(20) NOT NULL,
  `bank_details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `customer_name`, `customer_code`, `billing_address`, `shifting_address`, `payment_terms`, `state`, `gst_number`, `created_id`, `date`, `time`, `timestamp`, `deleted`, `vendor_code`, `pan_no`, `state_no`, `bank_details`) VALUES
(1, 'aa', 'a', 'a', 'a', '123', 'a', 'a', 1, '07-05-2022', '01:15:26', '2022-05-07 07:45:26', 0, 'a', 'a', 'a', 's');

-- --------------------------------------------------------

--
-- Table structure for table `customer_part`
--

CREATE TABLE `customer_part` (
  `id` int(11) NOT NULL,
  `part_number` varchar(255) NOT NULL,
  `part_description` varchar(200) NOT NULL,
  `customer_id` int(30) NOT NULL,
  `revision_date` varchar(50) DEFAULT NULL,
  `customer_part_id` int(11) DEFAULT NULL,
  `revision_no` varchar(255) DEFAULT NULL,
  `diagram` varchar(50) DEFAULT NULL,
  `model` varchar(50) DEFAULT NULL,
  `part_family` varchar(200) NOT NULL,
  `created_id` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted` int(11) DEFAULT NULL,
  `revision_remark` varchar(100) DEFAULT NULL,
  `hsn_code` varchar(20) DEFAULT NULL,
  `uom` varchar(20) NOT NULL,
  `safety_stock` varchar(20) NOT NULL,
  `fg_stock` float NOT NULL,
  `gst_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_part`
--

INSERT INTO `customer_part` (`id`, `part_number`, `part_description`, `customer_id`, `revision_date`, `customer_part_id`, `revision_no`, `diagram`, `model`, `part_family`, `created_id`, `date`, `time`, `timestamp`, `deleted`, `revision_remark`, `hsn_code`, `uom`, `safety_stock`, `fg_stock`, `gst_id`) VALUES
(1, 'c1', '1', 1, NULL, NULL, NULL, NULL, NULL, 'HOSE', 1, '07-05-2022', '01:16:11', '2022-05-07 07:46:11', NULL, '', '1', 'kg', '1', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer_part_documents`
--

CREATE TABLE `customer_part_documents` (
  `id` int(11) NOT NULL,
  `customer_master_id` int(11) NOT NULL,
  `revision_number` int(11) DEFAULT NULL,
  `customer_id` int(30) NOT NULL,
  `customer_part_id` int(11) NOT NULL,
  `created_id` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted` int(11) DEFAULT NULL,
  `type` varchar(20) NOT NULL,
  `document_name` text NOT NULL,
  `document` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_part_documents`
--

INSERT INTO `customer_part_documents` (`id`, `customer_master_id`, `revision_number`, `customer_id`, `customer_part_id`, `created_id`, `date`, `time`, `timestamp`, `deleted`, `type`, `document_name`, `document`) VALUES
(1, 1, NULL, 1, 0, 1, '07-05-2022', '01:16:35', '2022-05-07 07:46:35', NULL, 'APQP', '2', 'newerp(8).sql');

-- --------------------------------------------------------

--
-- Table structure for table `customer_part_drawing`
--

CREATE TABLE `customer_part_drawing` (
  `id` int(11) NOT NULL,
  `customer_master_id` varchar(255) NOT NULL,
  `revision_date` varchar(50) NOT NULL,
  `revision_no` varchar(255) NOT NULL,
  `uploading_document` text DEFAULT NULL,
  `created_id` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted` int(11) DEFAULT NULL,
  `revision_remark` varchar(100) DEFAULT NULL,
  `customer_part_id` int(11) NOT NULL,
  `drawing` text NOT NULL,
  `cad` text DEFAULT NULL,
  `model` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer_part_operation`
--

CREATE TABLE `customer_part_operation` (
  `id` int(11) NOT NULL,
  `customer_master_id` varchar(255) NOT NULL,
  `operation_id` int(11) DEFAULT NULL,
  `name` text NOT NULL,
  `mfg` text DEFAULT NULL,
  `revision_date` varchar(50) NOT NULL,
  `revision_no` varchar(255) NOT NULL,
  `uploading_document` text DEFAULT NULL,
  `created_id` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted` int(11) DEFAULT NULL,
  `revision_remark` varchar(100) DEFAULT NULL,
  `customer_part_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_part_operation`
--

INSERT INTO `customer_part_operation` (`id`, `customer_master_id`, `operation_id`, `name`, `mfg`, `revision_date`, `revision_no`, `uploading_document`, `created_id`, `date`, `time`, `timestamp`, `deleted`, `revision_remark`, `customer_part_id`) VALUES
(1, '1', 1, '1', '1', '2022-05-19', '1', NULL, 1, '07-05-2022', '01:17:03', '2022-05-07 07:47:03', NULL, '2', 0),
(2, '1', 1, '2', NULL, '2022-02-17', '99', NULL, 1, '07-05-2022', '01:43:31', '2022-05-07 08:13:31', NULL, '2', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer_part_operation_data`
--

CREATE TABLE `customer_part_operation_data` (
  `id` int(11) NOT NULL,
  `customer_part_operation_id` int(11) NOT NULL,
  `operation_name` varchar(20) DEFAULT NULL,
  `product` text NOT NULL,
  `process` text NOT NULL,
  `specification_tolerance` text NOT NULL,
  `evalution` text NOT NULL,
  `size` text NOT NULL,
  `frequency` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer_part_rate`
--

CREATE TABLE `customer_part_rate` (
  `id` int(11) NOT NULL,
  `customer_master_id` varchar(255) NOT NULL,
  `rate` float DEFAULT NULL,
  `revision_date` varchar(50) NOT NULL,
  `revision_no` varchar(255) NOT NULL,
  `uploading_document` text DEFAULT NULL,
  `created_id` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted` int(11) DEFAULT NULL,
  `revision_remark` varchar(100) DEFAULT NULL,
  `customer_part_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_part_rate`
--

INSERT INTO `customer_part_rate` (`id`, `customer_master_id`, `rate`, `revision_date`, `revision_no`, `uploading_document`, `created_id`, `date`, `time`, `timestamp`, `deleted`, `revision_remark`, `customer_part_id`) VALUES
(1, '1', 22, '2022-02-11', '2', '', 1, '07-05-2022', '01:16:21', '2022-05-07 07:46:21', NULL, '2', 0),
(2, '1', 2, '2022-05-04', '2222', '', 1, '07-05-2022', '01:42:47', '2022-05-07 08:12:47', NULL, '2', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer_part_type`
--

CREATE TABLE `customer_part_type` (
  `id` int(11) NOT NULL,
  `customer_type_name` varchar(50) NOT NULL,
  `contractor_code` varchar(30) DEFAULT NULL,
  `created_id` int(11) DEFAULT NULL,
  `date` varchar(10) DEFAULT NULL,
  `time` varchar(10) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT current_timestamp(),
  `deleted` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `c_po_so`
--

CREATE TABLE `c_po_so` (
  `id` int(11) NOT NULL,
  `po_id` int(11) NOT NULL,
  `so_line` varchar(50) NOT NULL,
  `so_number` varchar(30) NOT NULL,
  `so_amt` varchar(30) NOT NULL,
  `so_desc` text NOT NULL,
  `advance_amt` varchar(10) DEFAULT NULL,
  `mode_of_payment` varchar(20) DEFAULT NULL,
  `bank_name` varchar(60) DEFAULT NULL,
  `cheque_rtgs_number` varchar(20) DEFAULT NULL,
  `date_of_cheque_rtgs` varchar(20) DEFAULT NULL,
  `amount_paid` varchar(20) DEFAULT NULL,
  `mode_payment_final` varchar(20) DEFAULT NULL,
  `bank_name_final_payment` varchar(50) DEFAULT NULL,
  `cheque_rtgs_number_final_pay` varchar(30) DEFAULT NULL,
  `date_of_cheque_rtgs_final_pay` varchar(30) DEFAULT NULL,
  `date` varchar(15) NOT NULL,
  `time` varchar(15) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_id` int(11) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dispatch_tracking`
--

CREATE TABLE `dispatch_tracking` (
  `id` int(11) NOT NULL,
  `c_po_so_id` int(11) NOT NULL,
  `completed_date` varchar(15) DEFAULT NULL,
  `weight` varchar(8) DEFAULT NULL,
  `transporter_name` varchar(50) DEFAULT NULL,
  `vehicle_number` varchar(20) DEFAULT NULL,
  `lr_number` varchar(20) DEFAULT NULL,
  `dispatch_date` varchar(15) DEFAULT NULL,
  `created_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `date` varchar(15) NOT NULL,
  `time` varchar(15) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `grn_details`
--

CREATE TABLE `grn_details` (
  `id` int(11) NOT NULL,
  `inwarding_id` int(11) NOT NULL,
  `po_number` varchar(20) NOT NULL,
  `grn_number` varchar(30) NOT NULL,
  `invoice_number` varchar(20) NOT NULL,
  `part_id` int(11) NOT NULL,
  `inwarding_price` float NOT NULL,
  `po_part_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `verified_qty` float NOT NULL,
  `accept_qty` float NOT NULL,
  `reject_qty` float NOT NULL,
  `verfified_price` float NOT NULL,
  `verified_status` varchar(20) NOT NULL DEFAULT 'pending',
  `status` varchar(20) NOT NULL DEFAULT 'pending',
  `created_by` int(11) NOT NULL,
  `created_date` varchar(20) NOT NULL,
  `created_time` varchar(20) NOT NULL,
  `created_day` int(11) NOT NULL,
  `created_month` int(11) NOT NULL,
  `created_year` int(11) NOT NULL,
  `remark` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grn_details`
--

INSERT INTO `grn_details` (`id`, `inwarding_id`, `po_number`, `grn_number`, `invoice_number`, `part_id`, `inwarding_price`, `po_part_id`, `qty`, `verified_qty`, `accept_qty`, `reject_qty`, `verfified_price`, `verified_status`, `status`, `created_by`, `created_date`, `created_time`, `created_day`, `created_month`, `created_year`, `remark`) VALUES
(4, 4, '8', '2022-23/0001', '2', 5, 1557.6, 8, 66, 60, 0, 0, 1416, 'not-verified', 'pending', 1, '07-05-2022', '01:09:42', 7, 5, 2022, NULL),
(5, 4, '8', '2022-23/0001', '2', 4, 4696.4, 7, 199, 199, 0, 0, 4696.4, 'verified', 'pending', 1, '07-05-2022', '01:09:46', 7, 5, 2022, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gst_structure`
--

CREATE TABLE `gst_structure` (
  `id` int(11) NOT NULL,
  `code` varchar(20) NOT NULL,
  `cgst` float NOT NULL,
  `sgst` float DEFAULT NULL,
  `igst` float DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_date` varchar(10) DEFAULT NULL,
  `deleted` int(11) DEFAULT 0,
  `tcs` float DEFAULT NULL,
  `tcs_on_tax` varchar(20) NOT NULL DEFAULT 'yes',
  `with_in_state` varchar(20) NOT NULL DEFAULT 'yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gst_structure`
--

INSERT INTO `gst_structure` (`id`, `code`, `cgst`, `sgst`, `igst`, `created_by`, `created_date`, `deleted`, `tcs`, `tcs_on_tax`, `with_in_state`) VALUES
(1, 'a', 9, 9, 0, 1, '06-05-2022', 0, 1, 'yes', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `inwarding`
--

CREATE TABLE `inwarding` (
  `id` int(11) NOT NULL,
  `po_id` int(11) NOT NULL,
  `invoice_number` varchar(200) NOT NULL,
  `invoice_date` varchar(20) NOT NULL,
  `grn_date` varchar(20) DEFAULT NULL,
  `invoice_amount` float NOT NULL,
  `invoice_amount_status` varchar(20) NOT NULL DEFAULT 'pending',
  `grn_number` varchar(20) NOT NULL,
  `created_date` varchar(20) NOT NULL,
  `created_month` int(11) NOT NULL,
  `created_day` int(11) NOT NULL,
  `created_year` int(11) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inwarding`
--

INSERT INTO `inwarding` (`id`, `po_id`, `invoice_number`, `invoice_date`, `grn_date`, `invoice_amount`, `invoice_amount_status`, `grn_number`, `created_date`, `created_month`, `created_day`, `created_year`, `status`) VALUES
(4, 8, '2', '0002-05-15', '2022-05-07', 6254, 'pending', '2022-23/0001', '07-05-2022', 5, 7, 2022, 'generate_grn');

-- --------------------------------------------------------

--
-- Table structure for table `issue`
--

CREATE TABLE `issue` (
  `id` int(11) NOT NULL,
  `slip_details` varchar(50) NOT NULL,
  `contractor_id` int(11) NOT NULL,
  `part_id` int(11) DEFAULT NULL,
  `oc_id` int(11) NOT NULL,
  `wbs_id` varchar(5) NOT NULL,
  `hus_id` varchar(5) NOT NULL,
  `item_quantity` varchar(12) NOT NULL,
  `issue_date` varchar(20) DEFAULT NULL,
  `date` varchar(15) NOT NULL,
  `time` varchar(15) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_id` int(11) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `job_card`
--

CREATE TABLE `job_card` (
  `id` int(11) NOT NULL,
  `customer_part_id` int(11) NOT NULL,
  `req_qty` float NOT NULL,
  `production_qty` float NOT NULL,
  `created_date` varchar(20) NOT NULL,
  `created_time` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pending',
  `operation_id` int(11) NOT NULL DEFAULT 1,
  `location` varchar(20) NOT NULL,
  `grn` varchar(20) NOT NULL,
  `house_make` varchar(20) NOT NULL,
  `issue_date` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `job_card_details`
--

CREATE TABLE `job_card_details` (
  `id` int(11) NOT NULL,
  `item_number` varchar(50) NOT NULL,
  `operation_id` int(11) NOT NULL,
  `child_part_id` int(11) NOT NULL,
  `item_description` varchar(50) NOT NULL,
  `store_location` varchar(20) DEFAULT NULL,
  `bom_qty` float NOT NULL,
  `uom` varchar(20) NOT NULL,
  `grn` varchar(20) NOT NULL,
  `mgf` varchar(20) NOT NULL,
  `job_card_id` varchar(20) NOT NULL,
  `accept_qty` varchar(20) NOT NULL,
  `reject_qty` varchar(20) NOT NULL,
  `return_qty` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pending',
  `store_reject_qty` float NOT NULL,
  `store_return_qty` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `job_card_details_operations`
--

CREATE TABLE `job_card_details_operations` (
  `id` int(11) NOT NULL,
  `job_card_details_id` int(11) NOT NULL,
  `job_card_id` int(11) NOT NULL,
  `operation_id` int(11) NOT NULL,
  `accept_qty` float NOT NULL,
  `reject_qty` float NOT NULL,
  `return_qty` float NOT NULL,
  `created_date` varchar(20) NOT NULL,
  `created_time` varchar(20) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 0,
  `rejection_remark` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `job_card_prod_qty`
--

CREATE TABLE `job_card_prod_qty` (
  `id` int(11) NOT NULL,
  `job_card_id` int(11) NOT NULL,
  `operation_id` int(11) NOT NULL,
  `production_qty` float NOT NULL,
  `created_date` varchar(20) NOT NULL,
  `created_time` varchar(20) NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `loading_user`
--

CREATE TABLE `loading_user` (
  `id` int(11) NOT NULL,
  `po_number` varchar(20) NOT NULL,
  `so_number` varchar(30) NOT NULL,
  `contractor` varchar(20) NOT NULL,
  `project_number` varchar(20) NOT NULL,
  `start_date` varchar(15) NOT NULL,
  `target_date` varchar(15) NOT NULL,
  `completed_date` varchar(15) DEFAULT NULL,
  `wbs_id` int(11) NOT NULL,
  `created_id` int(11) NOT NULL,
  `date` varchar(15) NOT NULL,
  `time` varchar(15) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `new_po`
--

CREATE TABLE `new_po` (
  `id` int(11) NOT NULL,
  `po_number` varchar(50) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `po_date` varchar(10) NOT NULL,
  `expiry_po_date` varchar(20) DEFAULT NULL,
  `remark` text DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` varchar(10) NOT NULL,
  `created_time` varchar(12) NOT NULL,
  `created_day` int(11) NOT NULL,
  `created_month` varchar(20) NOT NULL,
  `created_year` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pending',
  `deleted` int(11) NOT NULL DEFAULT 0,
  `process_id` int(11) DEFAULT NULL,
  `amendment_no` text DEFAULT NULL,
  `amendment_date` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `new_po`
--

INSERT INTO `new_po` (`id`, `po_number`, `supplier_id`, `po_date`, `expiry_po_date`, `remark`, `created_by`, `created_date`, `created_time`, `created_day`, `created_month`, `created_year`, `status`, `deleted`, `process_id`, `amendment_no`, `amendment_date`) VALUES
(8, 'TH/PUR/2022-23/00001', 1, '2022-05-07', '2022-05-25', '', 7, '07-05-2022', '01:08:52', 7, '5', '2022', 'accpet', 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `new_po_sub`
--

CREATE TABLE `new_po_sub` (
  `id` int(11) NOT NULL,
  `po_number` varchar(50) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `po_date` varchar(10) NOT NULL,
  `expiry_po_date` varchar(20) DEFAULT NULL,
  `remark` text DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` varchar(10) NOT NULL,
  `created_time` varchar(12) NOT NULL,
  `created_day` int(11) NOT NULL,
  `created_month` varchar(20) NOT NULL,
  `created_year` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pending',
  `deleted` int(11) NOT NULL DEFAULT 0,
  `process_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `new_sales`
--

CREATE TABLE `new_sales` (
  `id` int(11) NOT NULL,
  `sales_number` varchar(50) NOT NULL,
  `customer_part_id` int(20) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `po_date` varchar(10) NOT NULL,
  `expiry_po_date` varchar(20) DEFAULT NULL,
  `remark` text DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` varchar(10) NOT NULL,
  `created_time` varchar(12) NOT NULL,
  `created_day` int(11) NOT NULL,
  `created_month` varchar(20) NOT NULL,
  `created_year` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pending',
  `deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `new_sales`
--

INSERT INTO `new_sales` (`id`, `sales_number`, `customer_part_id`, `customer_id`, `po_date`, `expiry_po_date`, `remark`, `created_by`, `created_date`, `created_time`, `created_day`, `created_month`, `created_year`, `status`, `deleted`) VALUES
(1, 'TH/2022-23/00001', 0, 1, '2022-05-07', '1', '1', 7, '07-05-2022', '01:38:57', 7, '5', '2022', 'pending', 0);

-- --------------------------------------------------------

--
-- Table structure for table `operations`
--

CREATE TABLE `operations` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` varchar(10) NOT NULL,
  `created_time` varchar(10) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `operations`
--

INSERT INTO `operations` (`id`, `name`, `created_by`, `created_date`, `created_time`, `deleted`) VALUES
(1, '10', 1, '06-05-2022', '09:43:47', 0);

-- --------------------------------------------------------

--
-- Table structure for table `operation_data`
--

CREATE TABLE `operation_data` (
  `id` int(11) NOT NULL,
  `operation_name` varchar(100) DEFAULT NULL,
  `product` text NOT NULL,
  `process` text NOT NULL,
  `specification_tolerance` text NOT NULL,
  `evalution` text NOT NULL,
  `size` text NOT NULL,
  `frequency` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `other_data`
--

CREATE TABLE `other_data` (
  `id` int(11) NOT NULL,
  `number` varchar(20) NOT NULL,
  `type` varchar(15) NOT NULL,
  `created_id` int(11) DEFAULT NULL,
  `date` varchar(10) DEFAULT NULL,
  `time` varchar(10) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `part_creation`
--

CREATE TABLE `part_creation` (
  `id` int(11) NOT NULL,
  `part_number` varchar(255) NOT NULL,
  `part_description` varchar(255) NOT NULL,
  `internal_part_number` varchar(255) NOT NULL,
  `group_id` int(11) NOT NULL,
  `sub_group_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `part_drawing` text NOT NULL,
  `ppap_document` text DEFAULT NULL,
  `modal_document` text DEFAULT NULL,
  `cad_file` text DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `revision_number` varchar(20) DEFAULT NULL,
  `size_id` varchar(200) DEFAULT NULL,
  `revision_date` varchar(10) DEFAULT NULL,
  `revision_remark` varchar(20) DEFAULT NULL,
  `created_date` varchar(20) DEFAULT NULL,
  `deleted` int(11) NOT NULL DEFAULT 0,
  `a_d` text DEFAULT NULL,
  `q_d` text DEFAULT NULL,
  `c_d` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `part_family`
--

CREATE TABLE `part_family` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `part_family`
--

INSERT INTO `part_family` (`id`, `name`) VALUES
(1, '2'),
(2, 'abc'),
(3, 'abc'),
(4, 'sasd'),
(5, '290312');

-- --------------------------------------------------------

--
-- Table structure for table `part_operations`
--

CREATE TABLE `part_operations` (
  `id` int(11) NOT NULL,
  `part_id` int(11) NOT NULL,
  `operation_id` int(11) NOT NULL,
  `operation_description` varchar(30) DEFAULT NULL,
  `drawing` text NOT NULL,
  `revision_number` varchar(20) NOT NULL,
  `revision_remark` varchar(20) NOT NULL,
  `revision_date` varchar(20) NOT NULL,
  `created_date` varchar(20) DEFAULT NULL,
  `created_time` varchar(20) DEFAULT NULL,
  `deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `part_type`
--

CREATE TABLE `part_type` (
  `id` int(11) NOT NULL,
  `part_type_name` varchar(50) NOT NULL,
  `contractor_code` varchar(30) DEFAULT NULL,
  `created_id` int(11) DEFAULT NULL,
  `date` varchar(10) DEFAULT NULL,
  `time` varchar(10) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT current_timestamp(),
  `deleted` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `planing`
--

CREATE TABLE `planing` (
  `id` int(11) NOT NULL,
  `financial_year` varchar(20) NOT NULL,
  `month` varchar(20) NOT NULL,
  `customer_part_id` int(11) NOT NULL,
  `shortage_qty` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `planing`
--

INSERT INTO `planing` (`id`, `financial_year`, `month`, `customer_part_id`, `shortage_qty`) VALUES
(2, 'FY-2021', 'APR', 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `planing_data`
--

CREATE TABLE `planing_data` (
  `id` int(11) NOT NULL,
  `planing_id` int(11) NOT NULL,
  `child_part_id` int(11) NOT NULL,
  `bom_qty` float NOT NULL,
  `schedule_qty` float NOT NULL,
  `required_qty` float NOT NULL,
  `actual_stock` float NOT NULL,
  `shortage_qty` float NOT NULL,
  `schedule_qty_2` float NOT NULL,
  `financial_year` varchar(20) NOT NULL,
  `month` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `planing_data`
--

INSERT INTO `planing_data` (`id`, `planing_id`, `child_part_id`, `bom_qty`, `schedule_qty`, `required_qty`, `actual_stock`, `shortage_qty`, `schedule_qty_2`, `financial_year`, `month`) VALUES
(2, 2, 1, 2, 10, 20, 0, 20, 0, 'FY-2021', 'APR');

-- --------------------------------------------------------

--
-- Table structure for table `po_details`
--

CREATE TABLE `po_details` (
  `id` int(11) NOT NULL,
  `customer_id` varchar(20) NOT NULL,
  `po_number` varchar(30) NOT NULL,
  `type_of_sale` varchar(20) NOT NULL,
  `created_id` int(11) NOT NULL,
  `date` varchar(15) NOT NULL,
  `time` varchar(15) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `po_parts`
--

CREATE TABLE `po_parts` (
  `id` int(11) NOT NULL,
  `po_id` int(11) NOT NULL,
  `po_number` varchar(50) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `part_id` int(11) NOT NULL,
  `tax_id` int(11) DEFAULT NULL,
  `uom_id` int(11) NOT NULL,
  `delivery_date` varchar(10) DEFAULT NULL,
  `expiry_date` varchar(20) DEFAULT NULL,
  `qty` float NOT NULL,
  `pending_qty` float NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` varchar(10) NOT NULL,
  `created_time` varchar(10) NOT NULL,
  `created_day` int(11) NOT NULL,
  `created_month` int(11) NOT NULL,
  `created_year` int(11) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 0,
  `invoice_number` varchar(100) DEFAULT NULL,
  `new_po_qty` float DEFAULT NULL,
  `po_approved_updated` varchar(20) NOT NULL,
  `po_a_number` varchar(20) DEFAULT NULL,
  `date` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `po_parts`
--

INSERT INTO `po_parts` (`id`, `po_id`, `po_number`, `supplier_id`, `part_id`, `tax_id`, `uom_id`, `delivery_date`, `expiry_date`, `qty`, `pending_qty`, `created_by`, `created_date`, `created_time`, `created_day`, `created_month`, `created_year`, `deleted`, `invoice_number`, `new_po_qty`, `po_approved_updated`, `po_a_number`, `date`) VALUES
(7, 8, 'TH/PUR/2022-23/00001', 1, 1, 1, 1, NULL, NULL, 199, 0, 1, '07-05-2022', '01:08:58', 7, 5, 2022, 0, NULL, NULL, '', NULL, NULL),
(8, 8, 'TH/PUR/2022-23/00001', 1, 2, 1, 1, NULL, NULL, 66, 0, 1, '07-05-2022', '01:09:04', 7, 5, 2022, 0, NULL, NULL, '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `po_parts_sub`
--

CREATE TABLE `po_parts_sub` (
  `id` int(11) NOT NULL,
  `po_id` int(11) NOT NULL,
  `po_number` varchar(50) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `part_id` int(11) NOT NULL,
  `tax_id` int(11) DEFAULT NULL,
  `uom_id` int(11) NOT NULL,
  `delivery_date` varchar(10) DEFAULT NULL,
  `expiry_date` varchar(20) DEFAULT NULL,
  `qty` float NOT NULL,
  `pending_qty` float NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` varchar(10) NOT NULL,
  `created_time` varchar(10) NOT NULL,
  `created_day` int(11) NOT NULL,
  `created_month` int(11) NOT NULL,
  `created_year` int(11) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 0,
  `invoice_number` varchar(100) DEFAULT NULL,
  `new_po_qty` float DEFAULT NULL,
  `po_approved_updated` varchar(20) NOT NULL,
  `po_a_number` varchar(20) DEFAULT NULL,
  `date` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `process`
--

CREATE TABLE `process` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `process`
--

INSERT INTO `process` (`id`, `name`) VALUES
(1, '2');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order`
--

CREATE TABLE `purchase_order` (
  `id` int(11) NOT NULL,
  `po_number` varchar(50) NOT NULL,
  `part_id` varchar(15) DEFAULT NULL,
  `supplier_id` varchar(50) NOT NULL,
  `uom_id` varchar(50) DEFAULT NULL,
  `quantity` varchar(20) DEFAULT NULL,
  `delivery_date` varchar(20) DEFAULT NULL,
  `shipping_method` varchar(15) DEFAULT NULL,
  `part_type_id` varchar(255) NOT NULL,
  `remark` varchar(50) NOT NULL,
  `po_validity_date` varchar(50) NOT NULL,
  `cgst_id` varchar(50) NOT NULL,
  `igst_id` varchar(50) NOT NULL,
  `sgst_id` varchar(50) NOT NULL,
  `created_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `date` varchar(15) NOT NULL,
  `time` varchar(15) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rejection_flow`
--

CREATE TABLE `rejection_flow` (
  `id` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `part_id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pending',
  `reason` varchar(20) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `remark` text NOT NULL,
  `debit_note` text NOT NULL,
  `qty` float NOT NULL,
  `on_that_qty` float DEFAULT NULL,
  `created_date` varchar(20) NOT NULL,
  `created_time` varchar(20) NOT NULL,
  `created_user` int(11) NOT NULL,
  `rate` float DEFAULT NULL,
  `cgst` float DEFAULT NULL,
  `sgst` float DEFAULT NULL,
  `igst` float DEFAULT NULL,
  `tcs` float DEFAULT NULL,
  `subtotal` float DEFAULT NULL,
  `grandtotal` float DEFAULT NULL,
  `rejection_lock` varchar(20) NOT NULL DEFAULT 'Pending',
  `approval` varchar(20) NOT NULL DEFAULT 'pending',
  `po_number` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rejection_flow`
--

INSERT INTO `rejection_flow` (`id`, `type`, `part_id`, `status`, `reason`, `supplier_id`, `remark`, `debit_note`, `qty`, `on_that_qty`, `created_date`, `created_time`, `created_user`, `rate`, `cgst`, `sgst`, `igst`, `tcs`, `subtotal`, `grandtotal`, `rejection_lock`, `approval`, `po_number`) VALUES
(1, 'MDR', 2, 'pending', '20', 1, '20', 'PO-Order(172)3.pdf', 6, NULL, '07-05-2022', '01:14:46', 1, 20, 10.8, 10.8, 0, 1.416, 120, 120, 'Pending', 'pending', 'TH/PUR/2022-23/00001');

-- --------------------------------------------------------

--
-- Table structure for table `reject_remark`
--

CREATE TABLE `reject_remark` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` varchar(10) NOT NULL,
  `created_time` varchar(10) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reject_remark`
--

INSERT INTO `reject_remark` (`id`, `name`, `created_by`, `created_date`, `created_time`, `deleted`) VALUES
(1, 'a', 1, '06-05-2022', '09:43:54', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sales_parts`
--

CREATE TABLE `sales_parts` (
  `id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `sales_number` varchar(50) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `part_id` int(11) NOT NULL,
  `tax_id` int(11) NOT NULL,
  `uom_id` varchar(20) NOT NULL,
  `delivery_date` varchar(10) DEFAULT NULL,
  `expiry_date` varchar(20) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `pending_qty` float NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` varchar(10) NOT NULL,
  `created_time` varchar(10) NOT NULL,
  `created_day` int(11) NOT NULL,
  `created_month` int(11) NOT NULL,
  `created_year` int(11) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 0,
  `invoice_number` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `po_number` varchar(50) NOT NULL,
  `supplier_invoice_number` varchar(30) NOT NULL,
  `part_id` varchar(5) NOT NULL,
  `quantity` varchar(5) NOT NULL,
  `rate` varchar(12) NOT NULL,
  `invoice_amount` varchar(12) NOT NULL,
  `grn_number` varchar(30) NOT NULL,
  `entered_date` varchar(20) DEFAULT NULL,
  `date` varchar(15) NOT NULL,
  `time` varchar(15) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_id` int(11) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `supplier_name` varchar(50) DEFAULT NULL,
  `supplier_number` varchar(30) DEFAULT NULL,
  `mobile_no` varchar(15) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `gst_number` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `payment_terms` varchar(255) NOT NULL,
  `created_id` int(11) DEFAULT NULL,
  `date` varchar(10) DEFAULT NULL,
  `time` varchar(10) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT current_timestamp(),
  `deleted` int(11) NOT NULL DEFAULT 0,
  `nda_document` text DEFAULT NULL,
  `registration_document` text DEFAULT NULL,
  `other_document_1` text DEFAULT NULL,
  `other_document_2` text DEFAULT NULL,
  `other_document_3` text DEFAULT NULL,
  `admin_approve` varchar(20) NOT NULL DEFAULT 'pending',
  `with_in_state` varchar(20) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `supplier_name`, `supplier_number`, `mobile_no`, `email`, `location`, `gst_number`, `state`, `payment_terms`, `created_id`, `date`, `time`, `timestamp`, `deleted`, `nda_document`, `registration_document`, `other_document_1`, `other_document_2`, `other_document_3`, `admin_approve`, `with_in_state`) VALUES
(1, 'aa', 'aaa', '123', 'aa@gmail.com', 'a', '2', '2', '2', 1, '06-05-2022', '09:44:57', '2022-05-06 16:14:57', 0, '', '', '', '', '', 'accept', 'yes'),
(2, 'bb', 'bb', '123', 'aba@gmail.com', 'bb', '2', '2', '2', 1, '06-05-2022', '09:56:47', '2022-05-06 16:26:47', 0, '', '', '', '', '', 'accept', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `uom`
--

CREATE TABLE `uom` (
  `id` int(11) NOT NULL,
  `uom_name` varchar(50) NOT NULL,
  `contractor_code` varchar(30) DEFAULT NULL,
  `created_id` int(11) DEFAULT NULL,
  `date` varchar(10) DEFAULT NULL,
  `time` varchar(10) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT current_timestamp(),
  `deleted` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `uom`
--

INSERT INTO `uom` (`id`, `uom_name`, `contractor_code`, `created_id`, `date`, `time`, `timestamp`, `deleted`) VALUES
(1, 'kg', NULL, 1, '06-05-2022', '09:44:27', '2022-05-06 16:14:27', 0);

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `id` int(11) NOT NULL,
  `user_email` text DEFAULT NULL,
  `type` varchar(30) NOT NULL,
  `user_role` text DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `user_password` text DEFAULT NULL,
  `date` text DEFAULT NULL,
  `time` text DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT current_timestamp(),
  `deleted` text DEFAULT NULL,
  `drawing_download` varchar(20) DEFAULT 'yes',
  `drawing_upload` varchar(20) DEFAULT 'yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`id`, `user_email`, `type`, `user_role`, `user_name`, `user_password`, `date`, `time`, `timestamp`, `deleted`, `drawing_download`, `drawing_upload`) VALUES
(1, 'admin@admin.com', 'admin', 'admin', 'admin', 'admin', NULL, NULL, '2022-04-18 14:45:05', NULL, 'yes', 'yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asset`
--
ALTER TABLE `asset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bill_tracking`
--
ALTER TABLE `bill_tracking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bom`
--
ALTER TABLE `bom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `challan`
--
ALTER TABLE `challan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `child_part`
--
ALTER TABLE `child_part`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `child_part_master`
--
ALTER TABLE `child_part_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `child_part_variance`
--
ALTER TABLE `child_part_variance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consumable_item`
--
ALTER TABLE `consumable_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_part`
--
ALTER TABLE `customer_part`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_part_documents`
--
ALTER TABLE `customer_part_documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_part_drawing`
--
ALTER TABLE `customer_part_drawing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_part_operation`
--
ALTER TABLE `customer_part_operation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_part_operation_data`
--
ALTER TABLE `customer_part_operation_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_part_rate`
--
ALTER TABLE `customer_part_rate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_part_type`
--
ALTER TABLE `customer_part_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `c_po_so`
--
ALTER TABLE `c_po_so`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dispatch_tracking`
--
ALTER TABLE `dispatch_tracking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grn_details`
--
ALTER TABLE `grn_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gst_structure`
--
ALTER TABLE `gst_structure`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inwarding`
--
ALTER TABLE `inwarding`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issue`
--
ALTER TABLE `issue`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_card`
--
ALTER TABLE `job_card`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_card_details`
--
ALTER TABLE `job_card_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_card_details_operations`
--
ALTER TABLE `job_card_details_operations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_card_prod_qty`
--
ALTER TABLE `job_card_prod_qty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loading_user`
--
ALTER TABLE `loading_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_po`
--
ALTER TABLE `new_po`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_po_sub`
--
ALTER TABLE `new_po_sub`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_sales`
--
ALTER TABLE `new_sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `operations`
--
ALTER TABLE `operations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `operation_data`
--
ALTER TABLE `operation_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `other_data`
--
ALTER TABLE `other_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `part_creation`
--
ALTER TABLE `part_creation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `part_family`
--
ALTER TABLE `part_family`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `part_operations`
--
ALTER TABLE `part_operations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `part_type`
--
ALTER TABLE `part_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `planing`
--
ALTER TABLE `planing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `planing_data`
--
ALTER TABLE `planing_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `po_details`
--
ALTER TABLE `po_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `po_parts`
--
ALTER TABLE `po_parts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `po_parts_sub`
--
ALTER TABLE `po_parts_sub`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `process`
--
ALTER TABLE `process`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_order`
--
ALTER TABLE `purchase_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rejection_flow`
--
ALTER TABLE `rejection_flow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reject_remark`
--
ALTER TABLE `reject_remark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_parts`
--
ALTER TABLE `sales_parts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uom`
--
ALTER TABLE `uom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `asset`
--
ALTER TABLE `asset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bill_tracking`
--
ALTER TABLE `bill_tracking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bom`
--
ALTER TABLE `bom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `challan`
--
ALTER TABLE `challan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `child_part`
--
ALTER TABLE `child_part`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `child_part_master`
--
ALTER TABLE `child_part_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `child_part_variance`
--
ALTER TABLE `child_part_variance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `consumable_item`
--
ALTER TABLE `consumable_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer_part`
--
ALTER TABLE `customer_part`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer_part_documents`
--
ALTER TABLE `customer_part_documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer_part_drawing`
--
ALTER TABLE `customer_part_drawing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer_part_operation`
--
ALTER TABLE `customer_part_operation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer_part_operation_data`
--
ALTER TABLE `customer_part_operation_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer_part_rate`
--
ALTER TABLE `customer_part_rate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer_part_type`
--
ALTER TABLE `customer_part_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `c_po_so`
--
ALTER TABLE `c_po_so`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dispatch_tracking`
--
ALTER TABLE `dispatch_tracking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grn_details`
--
ALTER TABLE `grn_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gst_structure`
--
ALTER TABLE `gst_structure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `inwarding`
--
ALTER TABLE `inwarding`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `issue`
--
ALTER TABLE `issue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_card`
--
ALTER TABLE `job_card`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_card_details`
--
ALTER TABLE `job_card_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_card_details_operations`
--
ALTER TABLE `job_card_details_operations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_card_prod_qty`
--
ALTER TABLE `job_card_prod_qty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loading_user`
--
ALTER TABLE `loading_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `new_po`
--
ALTER TABLE `new_po`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `new_po_sub`
--
ALTER TABLE `new_po_sub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `new_sales`
--
ALTER TABLE `new_sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `operations`
--
ALTER TABLE `operations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `operation_data`
--
ALTER TABLE `operation_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `other_data`
--
ALTER TABLE `other_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `part_creation`
--
ALTER TABLE `part_creation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `part_family`
--
ALTER TABLE `part_family`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `part_operations`
--
ALTER TABLE `part_operations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `part_type`
--
ALTER TABLE `part_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `planing`
--
ALTER TABLE `planing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `planing_data`
--
ALTER TABLE `planing_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `po_details`
--
ALTER TABLE `po_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `po_parts`
--
ALTER TABLE `po_parts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `po_parts_sub`
--
ALTER TABLE `po_parts_sub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `process`
--
ALTER TABLE `process`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `purchase_order`
--
ALTER TABLE `purchase_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rejection_flow`
--
ALTER TABLE `rejection_flow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reject_remark`
--
ALTER TABLE `reject_remark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sales_parts`
--
ALTER TABLE `sales_parts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `uom`
--
ALTER TABLE `uom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
