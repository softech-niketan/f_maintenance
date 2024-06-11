-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 01, 2021 at 01:19 AM
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
-- Database: `assets`
--

-- --------------------------------------------------------

--
-- Table structure for table `asset`
--

CREATE TABLE `asset` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` varchar(10) DEFAULT NULL,
  `time` varchar(10) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `deleted` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `asset_machine_pm_history`
--

CREATE TABLE `asset_machine_pm_history` (
  `id` int(11) NOT NULL,
  `machine_id` int(11) NOT NULL,
  `pm_type` varchar(200) NOT NULL,
  `frequency` varchar(200) NOT NULL,
  `pm_date` varchar(200) NOT NULL,
  `pm_due_date` varchar(200) DEFAULT NULL,
  `remark` varchar(200) NOT NULL,
  `created_id` int(11) NOT NULL,
  `created_date` int(11) NOT NULL,
  `created_day` int(11) NOT NULL,
  `created_month` int(11) NOT NULL,
  `created_time` varchar(200) NOT NULL,
  `created_date_time` varchar(200) NOT NULL,
  `created_year` varchar(200) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `assign_pm_group`
--

CREATE TABLE `assign_pm_group` (
  `id` int(11) NOT NULL,
  `machine_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `last_pm_date` varchar(20) NOT NULL,
  `last_due_date` varchar(200) DEFAULT NULL,
  `planeed_pm_date` varchar(200) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` varchar(20) NOT NULL,
  `created_time` varchar(20) NOT NULL,
  `created_day` int(11) NOT NULL,
  `created_month` int(11) NOT NULL,
  `created_year` int(11) NOT NULL,
  `created_date_time` varchar(20) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted` int(11) NOT NULL DEFAULT 0,
  `pm_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assign_pm_group`
--

INSERT INTO `assign_pm_group` (`id`, `machine_id`, `group_id`, `last_pm_date`, `last_due_date`, `planeed_pm_date`, `created_by`, `created_date`, `created_time`, `created_day`, `created_month`, `created_year`, `created_date_time`, `timestamp`, `deleted`, `pm_id`) VALUES
(12, 8, 1, '2021-02-08', '2021-03-10', '', 1, '2021-02-09', '01:07:53', 9, 2, 2021, '2021-02-09 13:07:53', '2021-02-09 07:37:53', 0, NULL),
(13, 8, 1, '2021-02-09', '2021-03-11', '2021-03-10', 1, '2021-02-09', '01:10:12', 9, 2, 2021, '2021-02-09 13:10:12', '2021-02-09 07:40:12', 0, 12),
(14, 8, 1, '2021-02-12', '2021-03-14', '2021-03-11', 1, '2021-02-12', '04:34:41', 12, 2, 2021, '2021-02-12 16:34:41', '2021-02-12 11:04:41', 0, 14),
(15, 7, 1, '2021-02-16', '2021-03-18', '', 1, '2021-02-21', '10:15:03', 21, 2, 2021, '2021-02-21 10:15:03', '2021-02-21 04:45:03', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `breakdown_history`
--

CREATE TABLE `breakdown_history` (
  `id` int(11) NOT NULL,
  `pm_id` int(11) NOT NULL,
  `machine_id` int(11) NOT NULL,
  `previous_status` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `feedback` varchar(20) DEFAULT NULL,
  `file` text DEFAULT NULL,
  `created_id` int(11) NOT NULL,
  `created_date` varchar(20) NOT NULL,
  `created_time` varchar(20) NOT NULL,
  `created_date_time` varchar(50) NOT NULL,
  `created_day` int(11) NOT NULL,
  `created_month` int(11) NOT NULL,
  `created_year` int(11) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `breakdown_request`
--

CREATE TABLE `breakdown_request` (
  `id` int(11) NOT NULL,
  `request_from` int(11) NOT NULL,
  `request_to` int(11) DEFAULT NULL,
  `machine_id` int(11) NOT NULL,
  `details` text DEFAULT NULL,
  `actions_taken` text DEFAULT NULL,
  `complition_date` varchar(200) DEFAULT NULL,
  `complition_time` varchar(200) DEFAULT NULL,
  `type_of_breakdown` varchar(200) DEFAULT NULL,
  `breakdown_document` varchar(200) NOT NULL,
  `days_to_maintaince` float DEFAULT NULL,
  `min_to_maintaince` float DEFAULT NULL,
  `complete_time_maintaince` text DEFAULT NULL,
  `complete_time_feedback` text DEFAULT NULL,
  `time_to_complete_hours` varchar(200) DEFAULT NULL,
  `time_to_complete_min` varchar(200) DEFAULT NULL,
  `pm_date` varchar(20) DEFAULT NULL,
  `pm_time` varchar(20) DEFAULT NULL,
  `created_date` varchar(20) NOT NULL,
  `created_time` varchar(200) DEFAULT NULL,
  `crated_day` varchar(20) NOT NULL,
  `crated_month` int(11) NOT NULL,
  `created_year` int(11) NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'initiated',
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted` int(11) NOT NULL DEFAULT 0,
  `feedback_document` text DEFAULT NULL,
  `feedback` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `breakdown_request`
--

INSERT INTO `breakdown_request` (`id`, `request_from`, `request_to`, `machine_id`, `details`, `actions_taken`, `complition_date`, `complition_time`, `type_of_breakdown`, `breakdown_document`, `days_to_maintaince`, `min_to_maintaince`, `complete_time_maintaince`, `complete_time_feedback`, `time_to_complete_hours`, `time_to_complete_min`, `pm_date`, `pm_time`, `created_date`, `created_time`, `crated_day`, `crated_month`, `created_year`, `status`, `timestamp`, `deleted`, `feedback_document`, `feedback`) VALUES
(14, 1, NULL, 7, 'asd', 'asd', '2021-03-01', '05:18:47', 'Mechanical', '26th_feb3.sql', NULL, NULL, '0 days 00 hours', '0 days 00 hours', NULL, NULL, NULL, NULL, '2021-03-01', '05:18:24', '1', 3, 2021, 'request_closed', '2021-02-28 23:48:24', 0, 'bd_12dec_(9).sql', 'asd'),
(15, 1, NULL, 8, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-01', '05:24:30', '1', 3, 2021, 'initiated', '2021-02-28 23:54:30', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `checksheet_data`
--

CREATE TABLE `checksheet_data` (
  `id` int(11) NOT NULL,
  `pm_id` int(11) NOT NULL,
  `machine_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `checksheet_id` int(11) NOT NULL,
  `particular` varchar(200) NOT NULL,
  `observation` varchar(200) NOT NULL,
  `remark` varchar(200) NOT NULL,
  `created_id` int(11) NOT NULL,
  `created_date` varchar(200) NOT NULL,
  `created_time` varchar(200) NOT NULL,
  `created_day` int(11) NOT NULL,
  `created_month` int(11) NOT NULL,
  `created_year` int(11) NOT NULL,
  `created_day_time` varchar(200) NOT NULL,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `checksheet_data`
--

INSERT INTO `checksheet_data` (`id`, `pm_id`, `machine_id`, `group_id`, `checksheet_id`, `particular`, `observation`, `remark`, `created_id`, `created_date`, `created_time`, `created_day`, `created_month`, `created_year`, `created_day_time`, `deleted`) VALUES
(12, 5, 1, 1, 4, 'hi', 's', 's', 1, '2021-01-22', '03:41:45', 22, 1, 2021, '2021-01-22 15:41:45', 0),
(13, 7, 1, 1, 7, 'testing', 'asd', '2', 1, '2021-01-27', '05:45:11', 27, 1, 2021, '2021-01-27 17:45:11', 0),
(14, 7, 1, 1, 6, 'asd', 'asd', 'asd', 1, '2021-01-27', '05:45:17', 27, 1, 2021, '2021-01-27 17:45:17', 0),
(15, 7, 1, 1, 4, 'hi', '123', '123', 1, '2021-01-27', '05:45:20', 27, 1, 2021, '2021-01-27 17:45:20', 0),
(16, 9, 1, 1, 7, 'testing', '2', '2', 1, '2021-02-03', '11:02:21', 3, 2, 2021, '2021-02-03 11:02:21', 0),
(17, 9, 1, 1, 6, 'asd', '2', '1', 1, '2021-02-03', '11:02:23', 3, 2, 2021, '2021-02-03 11:02:23', 0),
(18, 9, 1, 1, 4, 'hi', '2', '2', 1, '2021-02-03', '11:02:27', 3, 2, 2021, '2021-02-03 11:02:27', 0),
(19, 10, 1, 1, 7, 'testing', '2', '2', 1, '2021-02-03', '11:04:48', 3, 2, 2021, '2021-02-03 11:04:48', 0),
(20, 10, 1, 1, 6, 'asd', '2', '2', 1, '2021-02-03', '11:04:52', 3, 2, 2021, '2021-02-03 11:04:52', 0),
(21, 10, 1, 1, 4, 'hi', 'asda', 'asd', 1, '2021-02-03', '11:04:56', 3, 2, 2021, '2021-02-03 11:04:56', 0),
(22, 11, 3, 1, 7, 'testing', '2', '2', 1, '2021-02-06', '02:11:16', 6, 2, 2021, '2021-02-06 14:11:16', 0),
(23, 11, 3, 1, 6, 'asd', '12', '123', 1, '2021-02-06', '02:11:20', 6, 2, 2021, '2021-02-06 14:11:20', 0),
(24, 11, 3, 1, 4, 'hi', 'Ga', '23', 1, '2021-02-06', '02:11:25', 6, 2, 2021, '2021-02-06 14:11:25', 0),
(25, 12, 8, 1, 7, 'testing', '2', '2', 1, '2021-02-09', '01:08:47', 9, 2, 2021, '2021-02-09 13:08:47', 0),
(26, 12, 8, 1, 6, 'asd', '4', '2', 1, '2021-02-09', '01:08:51', 9, 2, 2021, '2021-02-09 13:08:51', 0),
(27, 12, 8, 1, 4, 'hi', '4', '5', 1, '2021-02-09', '01:08:54', 9, 2, 2021, '2021-02-09 13:08:54', 0),
(28, 14, 8, 1, 9, '213', '2', '2', 1, '2021-02-12', '04:34:17', 12, 2, 2021, '2021-02-12 16:34:17', 0),
(29, 14, 8, 1, 6, 'asd', '2', '2', 1, '2021-02-12', '04:34:20', 12, 2, 2021, '2021-02-12 16:34:20', 0),
(30, 14, 8, 1, 7, 'testing', '2', '2', 1, '2021-02-12', '04:34:23', 12, 2, 2021, '2021-02-12 16:34:23', 0),
(31, 14, 8, 1, 4, 'hi', '2', '1', 1, '2021-02-12', '04:34:27', 12, 2, 2021, '2021-02-12 16:34:27', 0);

-- --------------------------------------------------------

--
-- Table structure for table `check_list_groups`
--

CREATE TABLE `check_list_groups` (
  `id` int(11) NOT NULL,
  `group_name` varchar(200) DEFAULT NULL,
  `pm_type` varchar(255) DEFAULT NULL,
  `created_by` varchar(200) DEFAULT NULL,
  `created_date` varchar(200) DEFAULT NULL,
  `day` int(11) DEFAULT NULL,
  `month` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `time` varchar(30) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `check_list_groups`
--

INSERT INTO `check_list_groups` (`id`, `group_name`, `pm_type`, `created_by`, `created_date`, `day`, `month`, `year`, `time`, `timestamp`) VALUES
(1, 'G1', '1 Monthly', '1', '2021-01-12', 12, 1, 2021, '12:23:34', '2021-01-12 06:53:34'),
(2, 'G2', '3 Monthly', '1', '2021-01-12', 12, 1, 2021, '12:23:41', '2021-01-12 06:53:41'),
(3, 'G3', '3 Monthly', '1', '2021-01-12', 12, 1, 2021, '12:23:52', '2021-01-12 06:53:52'),
(4, 'ANUJ', '12 Monthly', '1', '2021-02-03', 3, 2, 2021, '03:01:46', '2021-02-03 09:31:46'),
(5, 'ANuj', '1 Monthly', '1', '2021-02-07', 7, 2, 2021, '09:53:12', '2021-02-07 04:23:12');

-- --------------------------------------------------------

--
-- Table structure for table `dies`
--

CREATE TABLE `dies` (
  `id` int(11) NOT NULL,
  `created_by` text DEFAULT NULL,
  `date` text DEFAULT NULL,
  `time` text DEFAULT NULL,
  `timstamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `AssetNumber` text NOT NULL,
  `AssetDescription` text NOT NULL,
  `PurchasedDate` text NOT NULL,
  `Depreciation` text NOT NULL,
  `CurrentValue` text NOT NULL,
  `Location` text NOT NULL,
  `Frequency` text NOT NULL,
  `InspectionDate` text NOT NULL,
  `Remark` text NOT NULL,
  `ToolType` text NOT NULL,
  `Ownership` text NOT NULL,
  `CustomerName` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dies1`
--

CREATE TABLE `dies1` (
  `id` int(11) NOT NULL,
  `created_by` text DEFAULT NULL,
  `date` text DEFAULT NULL,
  `time` text DEFAULT NULL,
  `timstamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `AssetNumber` text NOT NULL,
  `AssetDescription` text NOT NULL,
  `PurchasedDate` text NOT NULL,
  `Depreciation` text NOT NULL,
  `CurrentValue` text NOT NULL,
  `Location` text NOT NULL,
  `Frequency` text NOT NULL,
  `InspectionDate` text NOT NULL,
  `Remark` text NOT NULL,
  `ToolType` text NOT NULL,
  `Ownership` text NOT NULL,
  `CustomerName` text NOT NULL,
  `image_name` text DEFAULT NULL,
  `model_image` text DEFAULT NULL,
  `photo_name` text DEFAULT NULL,
  `day` int(30) NOT NULL,
  `month` int(30) NOT NULL,
  `year` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `history_instruments`
--

CREATE TABLE `history_instruments` (
  `id` int(11) NOT NULL,
  `instrument_id` int(11) DEFAULT NULL,
  `unique_id` varchar(255) DEFAULT NULL,
  `asset_number` varchar(255) DEFAULT NULL,
  `frequency` float DEFAULT NULL,
  `old_calibration_date` varchar(255) DEFAULT NULL,
  `old_calibration_due_date` varchar(255) DEFAULT NULL,
  `overdue` varchar(255) DEFAULT NULL,
  `overdue_color` varchar(20) NOT NULL,
  `overdue_bg` varchar(200) NOT NULL,
  `calibration_date` varchar(255) DEFAULT NULL,
  `due_calibration_date` varchar(255) DEFAULT NULL,
  `file` text DEFAULT NULL,
  `calibration_report` varchar(255) DEFAULT NULL,
  `created_id` int(11) DEFAULT NULL,
  `created_date` varchar(255) DEFAULT NULL,
  `day` int(11) DEFAULT NULL,
  `month` int(11) DEFAULT NULL,
  `time` varchar(200) NOT NULL,
  `year` int(11) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `history_instruments`
--

INSERT INTO `history_instruments` (`id`, `instrument_id`, `unique_id`, `asset_number`, `frequency`, `old_calibration_date`, `old_calibration_due_date`, `overdue`, `overdue_color`, `overdue_bg`, `calibration_date`, `due_calibration_date`, `file`, `calibration_report`, `created_id`, `created_date`, `day`, `month`, `time`, `year`, `timestamp`, `deleted`) VALUES
(1, 1, 'IG-20210226-whp', '02', 20, '', '', 'NA', 'NA', '', '2020-12-25', '2021-01-14', NULL, '1_(1).jpg', 1, '2021-02-26', 26, 2, '02:55:58', 2021, '2021-02-26 09:25:58', 0);

-- --------------------------------------------------------

--
-- Table structure for table `history_realtion_gauges`
--

CREATE TABLE `history_realtion_gauges` (
  `id` int(11) NOT NULL,
  `instrument_id` int(11) DEFAULT NULL,
  `unique_id` varchar(255) DEFAULT NULL,
  `asset_number` varchar(255) DEFAULT NULL,
  `old_calibration_date` varchar(255) DEFAULT NULL,
  `old_calibration_due_date` varchar(255) DEFAULT NULL,
  `overdue` varchar(255) DEFAULT NULL,
  `new_calibration_date` varchar(255) DEFAULT NULL,
  `file` text DEFAULT NULL,
  `calibration_report` varchar(255) DEFAULT NULL,
  `created_id` int(11) DEFAULT NULL,
  `created_date` varchar(255) DEFAULT NULL,
  `day` int(11) DEFAULT NULL,
  `month` int(11) DEFAULT NULL,
  `time` varchar(200) NOT NULL,
  `year` int(11) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `instruments`
--

CREATE TABLE `instruments` (
  `id` int(11) NOT NULL,
  `unique_number` varchar(30) NOT NULL,
  `asset_number` text NOT NULL,
  `asset_description` text NOT NULL,
  `resolution` text NOT NULL,
  `make` text NOT NULL,
  `location` text NOT NULL,
  `purchased_date` text NOT NULL,
  `depreciation` text NOT NULL,
  `current_value` text NOT NULL,
  `frequency` text NOT NULL,
  `calibration_date` text NOT NULL,
  `due_calibration_date` varchar(255) DEFAULT NULL,
  `due_days` int(11) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `upload_certificate` text DEFAULT NULL,
  `remark` text DEFAULT NULL,
  `msa_value` varchar(255) DEFAULT NULL,
  `msa_file` text DEFAULT NULL,
  `created_by` text DEFAULT NULL,
  `date` text DEFAULT NULL,
  `day` int(30) NOT NULL,
  `time` text DEFAULT NULL,
  `month` int(30) NOT NULL,
  `timstamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `year` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instruments`
--

INSERT INTO `instruments` (`id`, `unique_number`, `asset_number`, `asset_description`, `resolution`, `make`, `location`, `purchased_date`, `depreciation`, `current_value`, `frequency`, `calibration_date`, `due_calibration_date`, `due_days`, `status`, `upload_certificate`, `remark`, `msa_value`, `msa_file`, `created_by`, `date`, `day`, `time`, `month`, `timstamp`, `year`) VALUES
(1, 'IG-20210226-whp', '02', '2', '2', '2', '2', '2', '2', '2', '', '', NULL, NULL, NULL, NULL, '2', NULL, NULL, '1', '2021-02-26', 26, '02:55:41', 2, '2021-02-26 09:25:41', 2021);

-- --------------------------------------------------------

--
-- Table structure for table `item_master`
--

CREATE TABLE `item_master` (
  `id` int(11) NOT NULL,
  `spare_number` text NOT NULL,
  `spare_description` text NOT NULL,
  `saftey_stock` float DEFAULT NULL,
  `uom` varchar(200) DEFAULT NULL,
  `store_stock` float DEFAULT 0,
  `reserved_stock` float DEFAULT 0,
  `return_stock` float DEFAULT 0,
  `on_hand_stock` float DEFAULT 0,
  `date` int(30) DEFAULT NULL,
  `month` int(30) DEFAULT NULL,
  `year` int(30) DEFAULT NULL,
  `created_date` varchar(30) DEFAULT NULL,
  `time` varchar(30) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT current_timestamp(),
  `create_id` varchar(255) NOT NULL,
  `deleted` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_master`
--

INSERT INTO `item_master` (`id`, `spare_number`, `spare_description`, `saftey_stock`, `uom`, `store_stock`, `reserved_stock`, `return_stock`, `on_hand_stock`, `date`, `month`, `year`, `created_date`, `time`, `timestamp`, `create_id`, `deleted`) VALUES
(1, 's1', 'd2', 1200, 'numbers', 4, 0, 0, 0, 12, 1, 2021, '2021-01-12', '12:58:35', '2021-01-27 11:48:34', '1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `jigs`
--

CREATE TABLE `jigs` (
  `id` int(11) NOT NULL,
  `created_by` text DEFAULT NULL,
  `date` text DEFAULT NULL,
  `day` int(30) NOT NULL,
  `month` int(30) NOT NULL,
  `year` int(30) NOT NULL,
  `time` text DEFAULT NULL,
  `timstamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `AssetNumber` text NOT NULL,
  `AssetDescription` text NOT NULL,
  `PurchasedDate` text NOT NULL,
  `Depreciation` text NOT NULL,
  `CurrentValue` text NOT NULL,
  `Location` text NOT NULL,
  `Frequency` text NOT NULL,
  `InspectionDate` text NOT NULL,
  `Remark` text NOT NULL,
  `OperationName` text NOT NULL,
  `Ownership` text NOT NULL,
  `CustomerName` text NOT NULL,
  `image_name` text DEFAULT NULL,
  `model_image` text DEFAULT NULL,
  `photo_name` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `machines`
--

CREATE TABLE `machines` (
  `id` int(11) NOT NULL,
  `unique_number` varchar(30) DEFAULT NULL,
  `asset_number` text DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `asset_description` text DEFAULT NULL,
  `resolution` text DEFAULT NULL,
  `make` text DEFAULT NULL,
  `location` text DEFAULT NULL,
  `purchased_date` text DEFAULT NULL,
  `depreciation` text DEFAULT NULL,
  `current_value` text DEFAULT NULL,
  `frequency` text DEFAULT NULL,
  `calibration_date` text DEFAULT NULL,
  `due_calibration_date` varchar(255) DEFAULT NULL,
  `due_days` int(11) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `upload_certificate` text DEFAULT NULL,
  `remark` text DEFAULT NULL,
  `document_guide` text DEFAULT NULL,
  `msa_value` varchar(255) DEFAULT NULL,
  `msa_file` text DEFAULT NULL,
  `created_by` text DEFAULT NULL,
  `date` text DEFAULT NULL,
  `day` int(30) DEFAULT NULL,
  `time` text DEFAULT NULL,
  `month` int(30) DEFAULT NULL,
  `timstamp` timestamp NULL DEFAULT current_timestamp(),
  `year` int(30) DEFAULT NULL,
  `code` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `machines`
--

INSERT INTO `machines` (`id`, `unique_number`, `asset_number`, `type`, `asset_description`, `resolution`, `make`, `location`, `purchased_date`, `depreciation`, `current_value`, `frequency`, `calibration_date`, `due_calibration_date`, `due_days`, `status`, `upload_certificate`, `remark`, `document_guide`, `msa_value`, `msa_file`, `created_by`, `date`, `day`, `time`, `month`, `timstamp`, `year`, `code`) VALUES
(1, 'IG-20210112-e8a', 'm1', NULL, 'm1test', NULL, '20', 'pune', 'feb2020', '20', 'pune', '', '', NULL, NULL, NULL, NULL, 'asd', '2feb_common.sql', NULL, NULL, '1', '2021-01-12', 12, '12:29:56', 1, '2021-01-12 06:59:56', 2021, NULL),
(2, 'IG-20210112-mia', 'm2', NULL, 'm2test', NULL, '20', 'pune', 'feb 2020', '20', '20', '', '', NULL, NULL, NULL, NULL, '2', '', NULL, NULL, '1', '2021-01-12', 12, '12:37:47', 1, '2021-01-12 07:07:47', 2021, NULL),
(3, 'IG-20210112-qkd', 'M3', NULL, 'tesing', NULL, 'pune', '400', '20', '20', '29', '', '', NULL, NULL, NULL, NULL, '29', '', NULL, NULL, '1', '2021-01-12', 12, '12:38:28', 1, '2021-01-12 07:08:28', 2021, NULL),
(4, 'IG-20210125-owa', 'f201', NULL, 'testg', NULL, '21', 'pune', 'feb 2020', '23', '23', '', '', NULL, NULL, NULL, NULL, 'asd', '', NULL, NULL, '1', '2021-01-25', 25, '12:15:52', 1, '2021-01-25 06:45:52', 2021, NULL),
(5, 'IG-20210127-kaj', '501', NULL, '50', NULL, '10', 'pune', '2020 feb', '20', '2', '', '', NULL, NULL, NULL, NULL, 'a', 'banners(1).sql', NULL, NULL, '1', '2021-01-27', 27, '11:55:38', 1, '2021-01-27 06:25:38', 2021, NULL),
(6, 'IG-20210207-5pe', 'M222', NULL, 'm21', NULL, '23', '212', '2020-11', '0.005', '2', '', '', NULL, NULL, NULL, NULL, '', '', NULL, NULL, '1', '2021-02-07', 7, '09:54:21', 2, '2021-02-07 04:24:21', 2021, NULL),
(7, 'IG-20210207-wp4', 'g5', NULL, '23', NULL, '231', '23123', '2020-12', '-0.003', '-0.0002', '', '', NULL, NULL, NULL, NULL, '', '', NULL, NULL, '1', '2021-02-07', 7, '10:01:48', 2, '2021-02-07 04:31:48', 2021, NULL),
(8, 'IG-20210207-rhj', 'ASD', NULL, 'a', NULL, '23', '23', '2020-12', '123', '23123', '', '', NULL, NULL, NULL, NULL, '', '', NULL, NULL, '1', '2021-02-07', 7, '10:02:56', 2, '2021-02-07 04:32:56', 2021, 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `machines_pm_checklist`
--

CREATE TABLE `machines_pm_checklist` (
  `id` int(11) NOT NULL,
  `machine_id` int(11) NOT NULL,
  `pm_type_id` varchar(200) NOT NULL,
  `parameter` varchar(200) NOT NULL,
  `spec_type` varchar(200) NOT NULL,
  `spec` text NOT NULL,
  `actual` varchar(200) DEFAULT NULL,
  `attribute_result` varchar(200) NOT NULL,
  `spec_remark` text NOT NULL,
  `create_id` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `created_date` varchar(20) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted` int(11) DEFAULT NULL,
  `time` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pm_check_list_by_group`
--

CREATE TABLE `pm_check_list_by_group` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `particular` varchar(255) NOT NULL,
  `actual` varchar(200) DEFAULT NULL,
  `remark` text DEFAULT NULL,
  `spec` varchar(200) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `document` text DEFAULT NULL,
  `created_date` varchar(20) NOT NULL,
  `created_time` int(11) NOT NULL,
  `created_day` int(11) NOT NULL,
  `created_month` int(11) NOT NULL,
  `created_year` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted` int(11) NOT NULL DEFAULT 0,
  `pm_id` int(11) NOT NULL,
  `machine_id` int(11) NOT NULL,
  `type` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pm_check_list_by_group`
--

INSERT INTO `pm_check_list_by_group` (`id`, `group_id`, `particular`, `actual`, `remark`, `spec`, `created_by`, `document`, `created_date`, `created_time`, `created_day`, `created_month`, `created_year`, `timestamp`, `deleted`, `pm_id`, `machine_id`, `type`) VALUES
(4, 1, 'hi', NULL, NULL, 'qwe', 1, 'banners(1)2.sql', '2021-01-22', 3, 22, 1, 2021, '2021-01-22 09:34:56', 0, 0, 0, NULL),
(5, 2, 'asd', NULL, NULL, NULL, 1, NULL, '2021-01-22', 3, 22, 1, 2021, '2021-01-22 09:35:17', 0, 0, 0, NULL),
(6, 1, 'asd', NULL, NULL, 'asd', 1, '', '2021-01-27', 12, 27, 1, 2021, '2021-01-27 06:33:30', 0, 0, 0, NULL),
(7, 1, 'testing', NULL, NULL, 'testing', 1, 'banners(1)1.sql', '2021-01-27', 12, 27, 1, 2021, '2021-01-27 06:34:03', 0, 0, 0, NULL),
(8, 5, 'P1', NULL, NULL, 'p2', 1, '29-1-2021change.xlsx', '2021-02-07', 9, 7, 2, 2021, '2021-02-07 04:23:33', 0, 0, 0, NULL),
(9, 1, '213', NULL, NULL, 'asd', 1, 'common3.sql', '2021-02-09', 8, 9, 2, 2021, '2021-02-09 14:34:05', 0, 0, 0, NULL),
(10, 1, 'r23ea', NULL, NULL, 'asdqwe', 1, '22_feb_tool3.sql', '2021-03-01', 5, 1, 3, 2021, '2021-02-28 23:59:24', 0, 0, 0, 'TBM');

-- --------------------------------------------------------

--
-- Table structure for table `pm_history`
--

CREATE TABLE `pm_history` (
  `id` int(11) NOT NULL,
  `pm_id` int(11) NOT NULL,
  `machine_id` int(11) NOT NULL,
  `pm_group_id` int(11) DEFAULT NULL,
  `previous_status` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `new_pm_date` varchar(20) DEFAULT NULL,
  `new_pm_time` varchar(20) DEFAULT NULL,
  `feedback` varchar(20) DEFAULT NULL,
  `feedback_document` text DEFAULT NULL,
  `file` text DEFAULT NULL,
  `checkshit_document` text DEFAULT NULL,
  `created_id` int(11) NOT NULL,
  `created_date` varchar(20) NOT NULL,
  `created_time` varchar(20) NOT NULL,
  `postpone_feedback` varchar(200) DEFAULT NULL,
  `created_date_time` varchar(50) NOT NULL,
  `created_day` int(11) NOT NULL,
  `created_month` int(11) NOT NULL,
  `created_year` int(11) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pm_history`
--

INSERT INTO `pm_history` (`id`, `pm_id`, `machine_id`, `pm_group_id`, `previous_status`, `status`, `new_pm_date`, `new_pm_time`, `feedback`, `feedback_document`, `file`, `checkshit_document`, `created_id`, `created_date`, `created_time`, `postpone_feedback`, `created_date_time`, `created_day`, `created_month`, `created_year`, `deleted`) VALUES
(27, 14, 8, 1, 'initiated', 'Accept', '2021-03-11', '09:23', NULL, '', NULL, NULL, 1, '2021-02-11', '11:25:56', NULL, '', 11, 2, 2021, 0),
(28, 14, 8, 1, 'Accept', 'Inprocess', '2021-03-11', '09:23', NULL, '', NULL, NULL, 1, '2021-02-11', '11:26:01', NULL, '', 11, 2, 2021, 0),
(29, 14, 8, 1, 'Inprocess', 'Request_Closed', '2021-03-11', '09:23', 'we', 'Screenshot_2021-02-11_at_6.26.22_PM.png', NULL, NULL, 1, '2021-02-12', '04:34:41', NULL, '', 12, 2, 2021, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pm_request`
--

CREATE TABLE `pm_request` (
  `id` int(11) NOT NULL,
  `request_from` int(11) NOT NULL,
  `request_to` int(11) NOT NULL,
  `machine_id` int(11) NOT NULL,
  `pm_group_id` int(11) NOT NULL,
  `pm_frequency` varchar(20) DEFAULT NULL,
  `pm_date` varchar(20) DEFAULT NULL,
  `pm_time` varchar(20) DEFAULT NULL,
  `created_date` varchar(20) NOT NULL,
  `crated_day` varchar(20) NOT NULL,
  `crated_month` int(11) NOT NULL,
  `status` varchar(30) DEFAULT 'initiated',
  `checksheet_status` varchar(20) NOT NULL DEFAULT 'pending',
  `created_year` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pm_request`
--

INSERT INTO `pm_request` (`id`, `request_from`, `request_to`, `machine_id`, `pm_group_id`, `pm_frequency`, `pm_date`, `pm_time`, `created_date`, `crated_day`, `crated_month`, `status`, `checksheet_status`, `created_year`, `timestamp`, `deleted`) VALUES
(14, 1, 1, 8, 1, '1 Monthly', '2021-03-11', '09:23', '2021-02-11', '11', 2, 'checksheet_completed', 'completed', 2021, '2021-02-11 05:55:44', 0),
(15, 1, 1, 8, 1, '1 Monthly', '2021-12-08', '01:32', '2021-02-12', '12', 2, 'initiated', 'pending', 2021, '2021-02-12 11:04:54', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pm_type`
--

CREATE TABLE `pm_type` (
  `id` int(11) NOT NULL,
  `pm_type_name` varchar(255) NOT NULL,
  `date` varchar(30) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `deleted_by` varchar(255) NOT NULL,
  `day` int(30) NOT NULL,
  `month` int(30) NOT NULL,
  `year` int(30) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `time` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `predective_history`
--

CREATE TABLE `predective_history` (
  `id` int(11) NOT NULL,
  `pm_id` int(11) NOT NULL,
  `machine_id` int(11) NOT NULL,
  `pm_group_id` int(11) DEFAULT NULL,
  `previous_status` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `new_pm_date` varchar(20) DEFAULT NULL,
  `new_pm_time` varchar(20) DEFAULT NULL,
  `feedback` varchar(20) DEFAULT NULL,
  `file` text DEFAULT NULL,
  `checkshit_document` text DEFAULT NULL,
  `created_id` int(11) NOT NULL,
  `created_date` varchar(20) NOT NULL,
  `created_time` varchar(20) NOT NULL,
  `postpone_feedback` varchar(200) DEFAULT NULL,
  `created_date_time` varchar(50) NOT NULL,
  `created_day` int(11) NOT NULL,
  `created_month` int(11) NOT NULL,
  `created_year` int(11) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 0,
  `feedback_document` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `predective_history`
--

INSERT INTO `predective_history` (`id`, `pm_id`, `machine_id`, `pm_group_id`, `previous_status`, `status`, `new_pm_date`, `new_pm_time`, `feedback`, `file`, `checkshit_document`, `created_id`, `created_date`, `created_time`, `postpone_feedback`, `created_date_time`, `created_day`, `created_month`, `created_year`, `deleted`, `feedback_document`) VALUES
(1, 1, 1, NULL, 'initiated', 'Accept', '2021-02-03', '10:19', NULL, NULL, NULL, 1, '2021-01-27', '11:31:07', NULL, '', 27, 1, 2021, 0, ''),
(2, 1, 1, NULL, 'Accept', 'Inprocess', '2021-02-03', '10:19', NULL, NULL, NULL, 1, '2021-01-27', '11:32:14', NULL, '', 27, 1, 2021, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `predictive_request`
--

CREATE TABLE `predictive_request` (
  `id` int(11) NOT NULL,
  `request_from` int(11) NOT NULL,
  `request_to` int(11) NOT NULL,
  `machine_id` int(11) NOT NULL,
  `details` text DEFAULT NULL,
  `pm_date` varchar(20) DEFAULT NULL,
  `pm_time` varchar(20) DEFAULT NULL,
  `created_date` varchar(20) NOT NULL,
  `crated_day` varchar(20) NOT NULL,
  `crated_month` int(11) NOT NULL,
  `created_year` int(11) NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'initiated',
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `predictive_request`
--

INSERT INTO `predictive_request` (`id`, `request_from`, `request_to`, `machine_id`, `details`, `pm_date`, `pm_time`, `created_date`, `crated_day`, `crated_month`, `created_year`, `status`, `timestamp`, `deleted`) VALUES
(1, 1, 6, 1, 'asd', '2021-02-03', '10:19', '2021-01-27', '27', 1, 2021, 'initiated', '2021-01-27 05:51:52', 0);

-- --------------------------------------------------------

--
-- Table structure for table `realtion_gauges`
--

CREATE TABLE `realtion_gauges` (
  `id` int(11) NOT NULL,
  `unique_number` varchar(30) NOT NULL,
  `asset_number` text NOT NULL,
  `asset_description` text NOT NULL,
  `resolution` text NOT NULL,
  `make` text NOT NULL,
  `location` text NOT NULL,
  `purchased_date` text NOT NULL,
  `depreciation` text NOT NULL,
  `current_value` text NOT NULL,
  `frequency` text NOT NULL,
  `calibration_date` text NOT NULL,
  `due_calibration_date` varchar(255) DEFAULT NULL,
  `due_days` int(11) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `upload_certificate` text DEFAULT NULL,
  `remark` text NOT NULL,
  `msa_value` varchar(255) DEFAULT NULL,
  `msa_file` text DEFAULT NULL,
  `created_by` text DEFAULT NULL,
  `date` text DEFAULT NULL,
  `day` int(30) NOT NULL,
  `time` text DEFAULT NULL,
  `month` int(30) NOT NULL,
  `timstamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `year` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `software`
--

CREATE TABLE `software` (
  `id` int(11) NOT NULL,
  `date` varchar(255) DEFAULT NULL,
  `day` int(30) NOT NULL,
  `month` int(30) NOT NULL,
  `year` int(30) NOT NULL,
  `deleted_by` varchar(255) NOT NULL,
  `time` varchar(255) DEFAULT NULL,
  `timstamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(255) DEFAULT NULL,
  `AssetNumber` varchar(255) NOT NULL,
  `AssetDescription` text NOT NULL,
  `PurchasedDate` varchar(255) NOT NULL,
  `LicenseNumber` varchar(255) NOT NULL,
  `Location` varchar(255) NOT NULL,
  `Make` varchar(255) NOT NULL,
  `LicenseExpiry` int(11) NOT NULL,
  `RenewalDate` varchar(255) NOT NULL,
  `Remark` varchar(255) NOT NULL,
  `image_name` text DEFAULT NULL,
  `model_image` text DEFAULT NULL,
  `photo_name` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `spare_grn`
--

CREATE TABLE `spare_grn` (
  `id` int(11) NOT NULL,
  `spare_id` int(30) NOT NULL,
  `spare_number` varchar(200) DEFAULT NULL,
  `spare_description` text NOT NULL,
  `grn_number` varchar(200) NOT NULL,
  `grn_qty` float NOT NULL,
  `reserved_stock` float NOT NULL DEFAULT 0,
  `return_stock` float NOT NULL DEFAULT 0,
  `on_hand_stock` float NOT NULL DEFAULT 0,
  `grn_price` int(200) NOT NULL,
  `grn_total_price` varchar(255) NOT NULL,
  `grn_document` text DEFAULT NULL,
  `grn_date` varchar(200) NOT NULL,
  `date` varchar(255) NOT NULL,
  `created_id` varchar(255) DEFAULT NULL,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `time` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_date` varchar(50) NOT NULL,
  `deleted` varchar(20) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spare_grn`
--

INSERT INTO `spare_grn` (`id`, `spare_id`, `spare_number`, `spare_description`, `grn_number`, `grn_qty`, `reserved_stock`, `return_stock`, `on_hand_stock`, `grn_price`, `grn_total_price`, `grn_document`, `grn_date`, `date`, `created_id`, `month`, `year`, `time`, `timestamp`, `created_date`, `deleted`) VALUES
(2, 1, 's1', 's1', 'asd', 2, 0, 0, 2, 22, '44', 'banners(1)3.sql', '2021-01-12', '27', '1', 1, 2021, '05:18:34', '2021-01-27 11:48:34', '2021-01-27', '0');

-- --------------------------------------------------------

--
-- Table structure for table `spare_parts`
--

CREATE TABLE `spare_parts` (
  `id` int(11) NOT NULL,
  `pm_id` int(11) NOT NULL,
  `tool_id` int(11) NOT NULL,
  `grn_1_id` int(11) DEFAULT NULL,
  `grn_1_actual` float DEFAULT NULL,
  `grn_1_take` float DEFAULT 0,
  `grn_1_status` varchar(255) DEFAULT NULL,
  `grn_1_actual_price` float DEFAULT 0,
  `grn_2_id` int(11) DEFAULT NULL,
  `grn_2_actual_price` float DEFAULT 0,
  `grn_2_actual` float DEFAULT NULL,
  `grn_2_take` float DEFAULT 0,
  `grn_2_status` varchar(200) DEFAULT NULL,
  `requested_date` varchar(200) DEFAULT NULL,
  `requested_time` varchar(200) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` varchar(200) NOT NULL,
  `created_time` varchar(200) NOT NULL,
  `created_day` int(11) NOT NULL,
  `created_month` int(11) NOT NULL,
  `created_year` int(11) NOT NULL,
  `remark` varchar(200) NOT NULL,
  `type` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `spare_parts`
--

INSERT INTO `spare_parts` (`id`, `pm_id`, `tool_id`, `grn_1_id`, `grn_1_actual`, `grn_1_take`, `grn_1_status`, `grn_1_actual_price`, `grn_2_id`, `grn_2_actual_price`, `grn_2_actual`, `grn_2_take`, `grn_2_status`, `requested_date`, `requested_time`, `created_by`, `created_date`, `created_time`, `created_day`, `created_month`, `created_year`, `remark`, `type`) VALUES
(1, 3, 1, NULL, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 1, '2021-01-12', '12:59:00', 12, 1, 2021, '', NULL),
(2, 6, 1, NULL, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 1, '2021-01-27', '11:41:49', 27, 1, 2021, '', NULL),
(3, 9, 1, NULL, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 6, '2021-02-09', '12:12:46', 9, 2, 2021, '', NULL),
(4, 9, 1, NULL, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 6, '2021-02-09', '12:14:01', 9, 2, 2021, '', NULL),
(5, 9, 1, NULL, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 6, '2021-02-09', '12:15:02', 9, 2, 2021, '', 'breakdown');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `picture4` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_name` varchar(200) DEFAULT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `user_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_name`, `email`, `password`, `user_type`) VALUES
(1, 'admin', 'admin@admin.com', 'admin', 'admin'),
(4, 'anuj', 'anujbidkar8@gmail.com', 'admin', 'machine_shop_maintenance_admin'),
(5, 'test2', 'test2@gmail.com', 'admin', 'maintenance_user'),
(6, 'test3', 'test3@gmail.com', 'admin', 'machine_shop_production_admin'),
(7, 'test4', 'test4@gmail.com', 'admin', 'production_user'),
(8, 'test5', 'test5@gmail.com', 'admin', 'stores_user');

-- --------------------------------------------------------

--
-- Table structure for table `utility`
--

CREATE TABLE `utility` (
  `id` int(11) NOT NULL,
  `created_by` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `date` text NOT NULL,
  `time` text NOT NULL,
  `AssetNumber` text NOT NULL,
  `AssetDescription` text NOT NULL,
  `PurchasedDate` text NOT NULL,
  `CurrentValue` text NOT NULL,
  `Depreciation` text NOT NULL,
  `Location` text NOT NULL,
  `Frequency` int(30) NOT NULL,
  `PMDate` text NOT NULL,
  `pm_due_date` varchar(255) DEFAULT NULL,
  `Remark` text NOT NULL,
  `type` text NOT NULL,
  `image_name` text NOT NULL,
  `model_image` text DEFAULT NULL,
  `photo_name` text DEFAULT NULL,
  `day` int(30) NOT NULL,
  `month` int(30) NOT NULL,
  `year` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asset`
--
ALTER TABLE `asset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `asset_machine_pm_history`
--
ALTER TABLE `asset_machine_pm_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_pm_group`
--
ALTER TABLE `assign_pm_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `breakdown_history`
--
ALTER TABLE `breakdown_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `breakdown_request`
--
ALTER TABLE `breakdown_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checksheet_data`
--
ALTER TABLE `checksheet_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `check_list_groups`
--
ALTER TABLE `check_list_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dies`
--
ALTER TABLE `dies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dies1`
--
ALTER TABLE `dies1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history_instruments`
--
ALTER TABLE `history_instruments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history_realtion_gauges`
--
ALTER TABLE `history_realtion_gauges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instruments`
--
ALTER TABLE `instruments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_master`
--
ALTER TABLE `item_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jigs`
--
ALTER TABLE `jigs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `machines`
--
ALTER TABLE `machines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `machines_pm_checklist`
--
ALTER TABLE `machines_pm_checklist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pm_check_list_by_group`
--
ALTER TABLE `pm_check_list_by_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pm_history`
--
ALTER TABLE `pm_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pm_request`
--
ALTER TABLE `pm_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pm_type`
--
ALTER TABLE `pm_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `predective_history`
--
ALTER TABLE `predective_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `predictive_request`
--
ALTER TABLE `predictive_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `realtion_gauges`
--
ALTER TABLE `realtion_gauges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `software`
--
ALTER TABLE `software`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spare_grn`
--
ALTER TABLE `spare_grn`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spare_parts`
--
ALTER TABLE `spare_parts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utility`
--
ALTER TABLE `utility`
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
-- AUTO_INCREMENT for table `asset_machine_pm_history`
--
ALTER TABLE `asset_machine_pm_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assign_pm_group`
--
ALTER TABLE `assign_pm_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `breakdown_history`
--
ALTER TABLE `breakdown_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `breakdown_request`
--
ALTER TABLE `breakdown_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `checksheet_data`
--
ALTER TABLE `checksheet_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `check_list_groups`
--
ALTER TABLE `check_list_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `dies`
--
ALTER TABLE `dies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dies1`
--
ALTER TABLE `dies1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `history_instruments`
--
ALTER TABLE `history_instruments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `history_realtion_gauges`
--
ALTER TABLE `history_realtion_gauges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `instruments`
--
ALTER TABLE `instruments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `item_master`
--
ALTER TABLE `item_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jigs`
--
ALTER TABLE `jigs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `machines`
--
ALTER TABLE `machines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `machines_pm_checklist`
--
ALTER TABLE `machines_pm_checklist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pm_check_list_by_group`
--
ALTER TABLE `pm_check_list_by_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pm_history`
--
ALTER TABLE `pm_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `pm_request`
--
ALTER TABLE `pm_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pm_type`
--
ALTER TABLE `pm_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `predective_history`
--
ALTER TABLE `predective_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `predictive_request`
--
ALTER TABLE `predictive_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `realtion_gauges`
--
ALTER TABLE `realtion_gauges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `software`
--
ALTER TABLE `software`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `spare_grn`
--
ALTER TABLE `spare_grn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `spare_parts`
--
ALTER TABLE `spare_parts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `utility`
--
ALTER TABLE `utility`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
