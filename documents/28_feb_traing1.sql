-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 01, 2021 at 03:20 AM
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
-- Database: `training`
--

-- --------------------------------------------------------

--
-- Table structure for table `attandance`
--

CREATE TABLE `attandance` (
  `id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `level` varchar(20) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `started_date` varchar(20) NOT NULL,
  `created_date` varchar(10) NOT NULL,
  `created_time` varchar(10) NOT NULL,
  `created_day` int(11) NOT NULL,
  `created_month` int(11) NOT NULL,
  `created_year` int(11) NOT NULL,
  `created_day_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attandance`
--

INSERT INTO `attandance` (`id`, `batch_id`, `level`, `user_id`, `created_by`, `started_date`, `created_date`, `created_time`, `created_day`, `created_month`, `created_year`, `created_day_time`) VALUES
(4, 2, '0', 16, 1, '', '2021-02-19', '09:27:37', 19, 2, 2021, '2021-02-19 08:27:37'),
(5, 2, '0', 15, 1, '', '2021-02-19', '09:27:39', 19, 2, 2021, '2021-02-19 08:27:39');

-- --------------------------------------------------------

--
-- Table structure for table `batches`
--

CREATE TABLE `batches` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `level` varchar(20) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `started_date` varchar(20) NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT 'pending',
  `created_date` varchar(10) NOT NULL,
  `created_time` varchar(10) NOT NULL,
  `created_day` int(11) NOT NULL,
  `created_month` int(11) NOT NULL,
  `created_year` int(11) NOT NULL,
  `created_day_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `batches`
--

INSERT INTO `batches` (`id`, `name`, `level`, `created_by`, `started_date`, `status`, `created_date`, `created_time`, `created_day`, `created_month`, `created_year`, `created_day_time`) VALUES
(2, 'B1', '1', 1, '2019-12-17', 'pending', '2021-02-19', '09:27:32', 19, 2, 2021, '2021-02-19 08:27:32');

-- --------------------------------------------------------

--
-- Table structure for table `cell`
--

CREATE TABLE `cell` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` varchar(10) NOT NULL,
  `created_time` varchar(10) NOT NULL,
  `created_day` int(11) NOT NULL,
  `created_month` int(11) NOT NULL,
  `created_year` int(11) NOT NULL,
  `created_day_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cell`
--

INSERT INTO `cell` (`id`, `name`, `created_by`, `created_date`, `created_time`, `created_day`, `created_month`, `created_year`, `created_day_time`) VALUES
(1, 'cell1', 1, '2021-02-18', '10:58:47', 18, 2, 2021, '2021-02-18 09:58:47'),
(2, 'cell2', 1, '2021-02-18', '10:58:51', 18, 2, 2021, '2021-02-18 09:58:51'),
(3, 'cell3', 1, '2021-02-18', '10:58:56', 18, 2, 2021, '2021-02-18 09:58:56');

-- --------------------------------------------------------

--
-- Table structure for table `common`
--

CREATE TABLE `common` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `sub_topic_id` int(11) NOT NULL,
  `question_count` int(11) DEFAULT NULL,
  `trainer_email` varchar(200) DEFAULT NULL,
  `level` varchar(200) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` varchar(10) NOT NULL,
  `created_time` varchar(10) NOT NULL,
  `created_day` int(11) NOT NULL,
  `created_month` int(11) NOT NULL,
  `created_year` int(11) NOT NULL,
  `created_day_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(255) NOT NULL DEFAULT 'off'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `common`
--

INSERT INTO `common` (`id`, `name`, `sub_topic_id`, `question_count`, `trainer_email`, `level`, `created_by`, `created_date`, `created_time`, `created_day`, `created_month`, `created_year`, `created_day_time`, `status`) VALUES
(1, NULL, 1, 12, 'n@gmail.com', '1', 1, '2021-02-18', '11:00:44', 18, 2, 2021, '2021-02-18 10:00:44', 'on'),
(2, NULL, 2, 20, 'anujbidkar8@gmail.com', '1', 1, '2021-02-18', '11:00:55', 18, 2, 2021, '2021-02-18 10:00:55', 'off'),
(3, NULL, 1, 20, 'anujbidkar8@gmail.com', '2', 1, '2021-02-18', '11:01:05', 18, 2, 2021, '2021-02-18 10:01:05', 'on'),
(4, NULL, 3, 2, NULL, '1', 1, '2021-02-19', '09:21:48', 19, 2, 2021, '2021-02-19 08:21:48', 'on');

-- --------------------------------------------------------

--
-- Table structure for table `common_questions`
--

CREATE TABLE `common_questions` (
  `id` int(11) NOT NULL,
  `common_id` int(11) NOT NULL,
  `level` varchar(20) NOT NULL,
  `question` text NOT NULL,
  `answer` varchar(10) NOT NULL,
  `option_1` text NOT NULL,
  `option_2` text NOT NULL,
  `option_3` text NOT NULL,
  `option_4` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` int(11) NOT NULL,
  `created_time` int(11) NOT NULL,
  `created_day` int(11) NOT NULL,
  `created_month` int(11) NOT NULL,
  `created_year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `common_questions`
--

INSERT INTO `common_questions` (`id`, `common_id`, `level`, `question`, `answer`, `option_1`, `option_2`, `option_3`, `option_4`, `created_by`, `created_date`, `created_time`, `created_day`, `created_month`, `created_year`) VALUES
(1, 3, '2', 'Why', 'Option-1', 's', 's', 's', 'd', 1, 2021, 11, 18, 2, 2021),
(2, 3, '2', 'youy?', 'Option-1', 'a', 'a', 'a', 'a', 1, 2021, 11, 18, 2, 2021),
(3, 3, '2', 'test', 'Option-1', 'g', 'f', 'f', 'f', 1, 2021, 11, 18, 2, 2021),
(4, 1, '1', 'have ?', 'Option-1', 'asd', 'a', 'a', 'a\r\n\r\n\r\n', 1, 2021, 11, 18, 2, 2021),
(5, 1, '1', 'Ever?', 'Option-1', 'a', 'a', 'a', 'a', 1, 2021, 11, 18, 2, 2021),
(6, 4, '1', 'Why You Are ?', 'Option-1', 'pop', 'ps', 'sad', 'asd', 1, 2021, 10, 19, 2, 2021),
(7, 4, '1', 'Are U avalable?', 'Option-1', 'asd', 'a', 'ee', 'e', 1, 2021, 10, 19, 2, 2021);

-- --------------------------------------------------------

--
-- Table structure for table `exam_cell`
--

CREATE TABLE `exam_cell` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `common_id` int(11) NOT NULL,
  `total_score` float DEFAULT NULL,
  `actual_scroe` float DEFAULT NULL,
  `marks` int(11) DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pending',
  `exam_date` varchar(20) NOT NULL,
  `exam_time` varchar(20) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` varchar(20) NOT NULL,
  `created_time` varchar(20) NOT NULL,
  `created_day` int(11) NOT NULL,
  `created_month` int(11) NOT NULL,
  `created_year` int(11) NOT NULL,
  `user_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam_cell`
--

INSERT INTO `exam_cell` (`id`, `user_id`, `common_id`, `total_score`, `actual_scroe`, `marks`, `status`, `exam_date`, `exam_time`, `created_by`, `created_date`, `created_time`, `created_day`, `created_month`, `created_year`, `user_level`) VALUES
(5, 16, 9, 3, 2, 67, 'fail', '2021-02-27', '01:26:22', 1, '2021-02-27', '01:26:22', 27, 2, 2021, 0),
(6, 1, 9, 80, 60, 75, 'pass', '', '02:27:06', 1, '2021-03-01', '02:27:06', 1, 3, 2021, 1),
(7, 1, 8, 50, 30, 60, 'fail', '', '02:27:13', 1, '2021-03-01', '02:27:13', 1, 3, 2021, 1);

-- --------------------------------------------------------

--
-- Table structure for table `exam_common`
--

CREATE TABLE `exam_common` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `common_id` int(11) NOT NULL,
  `total_score` float DEFAULT NULL,
  `actual_scroe` float DEFAULT NULL,
  `marks` int(11) DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pending',
  `exam_date` varchar(20) NOT NULL,
  `exam_time` varchar(20) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` varchar(20) NOT NULL,
  `created_time` varchar(20) NOT NULL,
  `created_day` int(11) NOT NULL,
  `created_month` int(11) NOT NULL,
  `created_year` int(11) NOT NULL,
  `user_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam_common`
--

INSERT INTO `exam_common` (`id`, `user_id`, `common_id`, `total_score`, `actual_scroe`, `marks`, `status`, `exam_date`, `exam_time`, `created_by`, `created_date`, `created_time`, `created_day`, `created_month`, `created_year`, `user_level`) VALUES
(17, 16, 4, 2, 2, 100, 'pass', '2021-02-27', '10:08:16', 1, '2021-02-27', '10:08:16', 27, 2, 2021, 0),
(18, 16, 1, 2, 2, 100, 'pass', '2021-02-27', '10:08:48', 1, '2021-02-27', '10:08:48', 27, 2, 2021, 0),
(21, 1, 4, 20, 10, 50, 'fail', '', '02:09:09', 1, '2021-03-01', '02:09:09', 1, 3, 2021, 1),
(22, 1, 2, 18, 2, 11, 'fail', '', '02:13:20', 1, '2021-03-01', '02:13:20', 1, 3, 2021, 1),
(24, 1, 1, 100, 20, 20, 'fail', '', '02:18:49', 1, '2021-03-01', '02:18:49', 1, 3, 2021, 1);

-- --------------------------------------------------------

--
-- Table structure for table `exam_result`
--

CREATE TABLE `exam_result` (
  `id` int(11) NOT NULL,
  `common_id` int(11) NOT NULL,
  `exam_common_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` varchar(200) NOT NULL DEFAULT 'common',
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `result` int(11) NOT NULL,
  `created_date` varchar(20) NOT NULL,
  `created_time` varchar(20) NOT NULL,
  `created_by` int(11) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 0,
  `question_count` int(11) DEFAULT NULL,
  `attempte` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam_result`
--

INSERT INTO `exam_result` (`id`, `common_id`, `exam_common_id`, `user_id`, `type`, `question`, `answer`, `result`, `created_date`, `created_time`, `created_by`, `deleted`, `question_count`, `attempte`) VALUES
(45, 4, 17, 16, 'common', 'Are U avalable?', 'asd', 1, '2021-02-27', '10:08:38', 1, 0, 2, 0),
(46, 4, 17, 16, 'common', 'Why You Are ?', 'pop', 1, '2021-02-27', '10:08:38', 1, 0, 2, 0),
(47, 1, 18, 16, 'common', 'have ?', 'asd', 1, '2021-02-27', '10:08:52', 1, 0, 2, 0),
(48, 1, 18, 16, 'common', 'Ever?', 'a', 1, '2021-02-27', '10:08:52', 1, 0, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `exam_result_other`
--

CREATE TABLE `exam_result_other` (
  `id` int(11) NOT NULL,
  `common_id` int(11) NOT NULL,
  `exam_common_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` varchar(200) NOT NULL DEFAULT 'common',
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `result` int(11) NOT NULL,
  `created_date` varchar(20) NOT NULL,
  `created_time` varchar(20) NOT NULL,
  `created_by` int(11) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 0,
  `question_count` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam_result_other`
--

INSERT INTO `exam_result_other` (`id`, `common_id`, `exam_common_id`, `user_id`, `type`, `question`, `answer`, `result`, `created_date`, `created_time`, `created_by`, `deleted`, `question_count`) VALUES
(45, 9, 5, 16, 'common', 'You Are Mad?', 'asd', 1, '2021-02-27', '01:26:45', 1, 0, 3),
(46, 9, 5, 16, 'common', 'Why are u there?', 'asd', 0, '2021-02-27', '01:26:45', 1, 0, 3),
(47, 9, 5, 16, 'common', 'Are You Happy>', 'es', 1, '2021-02-27', '01:26:45', 1, 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `line`
--

CREATE TABLE `line` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` varchar(10) NOT NULL,
  `created_time` varchar(10) NOT NULL,
  `created_day` int(11) NOT NULL,
  `created_month` int(11) NOT NULL,
  `created_year` int(11) NOT NULL,
  `created_day_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `line`
--

INSERT INTO `line` (`id`, `name`, `created_by`, `created_date`, `created_time`, `created_day`, `created_month`, `created_year`, `created_day_time`) VALUES
(1, 'line1', 1, '2021-02-18', '10:59:01', 18, 2, 2021, '2021-02-18 09:59:01'),
(2, 'line2', 1, '2021-02-18', '10:59:04', 18, 2, 2021, '2021-02-18 09:59:04'),
(3, 'line3', 1, '2021-02-18', '10:59:07', 18, 2, 2021, '2021-02-18 09:59:07');

-- --------------------------------------------------------

--
-- Table structure for table `observation_report`
--

CREATE TABLE `observation_report` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sub_topic_id` int(11) DEFAULT NULL,
  `actual_scroe` float DEFAULT NULL,
  `total_score` int(11) DEFAULT NULL,
  `score_p` float DEFAULT NULL,
  `document` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` varchar(20) NOT NULL,
  `created_time` varchar(20) NOT NULL,
  `created_day` varchar(20) NOT NULL,
  `created_month` varchar(20) NOT NULL,
  `created_year` varchar(20) NOT NULL,
  `deleted` int(11) NOT NULL,
  `evaluation_type` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `practical_evaluation`
--

CREATE TABLE `practical_evaluation` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `sub_topic_id` int(11) NOT NULL,
  `actual_scroe` float NOT NULL,
  `total_score` int(11) NOT NULL,
  `score_p` float NOT NULL,
  `document` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` varchar(20) NOT NULL,
  `created_time` varchar(20) NOT NULL,
  `created_day` varchar(20) NOT NULL,
  `created_month` varchar(20) NOT NULL,
  `created_year` varchar(20) NOT NULL,
  `deleted` int(11) NOT NULL,
  `evaluation_type` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `practical_evaluation`
--

INSERT INTO `practical_evaluation` (`id`, `user_id`, `level`, `sub_topic_id`, `actual_scroe`, `total_score`, `score_p`, `document`, `created_by`, `created_date`, `created_time`, `created_day`, `created_month`, `created_year`, `deleted`, `evaluation_type`) VALUES
(20, 1, 1, 3, 20, 20, 100, '28_feb_asset22.sql', 1, '2021-03-01', '03:08:28', '1', '3', '2021', 0, 'process');

-- --------------------------------------------------------

--
-- Table structure for table `qa`
--

CREATE TABLE `qa` (
  `id` int(11) NOT NULL,
  `sub_topic_id` int(11) NOT NULL,
  `cell_id` int(11) NOT NULL,
  `trainer_email` varchar(200) DEFAULT NULL,
  `level` varchar(20) NOT NULL,
  `question_count` int(11) DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'off',
  `skill_reqquired` int(11) DEFAULT NULL,
  `skill_document` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `qa`
--

INSERT INTO `qa` (`id`, `sub_topic_id`, `cell_id`, `trainer_email`, `level`, `question_count`, `status`, `skill_reqquired`, `skill_document`) VALUES
(8, 3, 3, NULL, '1', 20, 'on', 1, '111.jpg'),
(9, 2, 3, NULL, '1', 20, 'on', 1, '112.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `qa_id` int(11) NOT NULL,
  `level` varchar(20) NOT NULL,
  `question` text NOT NULL,
  `answer` varchar(10) NOT NULL,
  `option_1` text NOT NULL,
  `option_2` text NOT NULL,
  `option_3` text NOT NULL,
  `option_4` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` int(11) NOT NULL,
  `created_time` int(11) NOT NULL,
  `created_day` int(11) NOT NULL,
  `created_month` int(11) NOT NULL,
  `created_year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `qa_id`, `level`, `question`, `answer`, `option_1`, `option_2`, `option_3`, `option_4`, `created_by`, `created_date`, `created_time`, `created_day`, `created_month`, `created_year`) VALUES
(3, 9, '1', 'Why are u there?', 'Option-1', 'asd', 'asd', 'asd', 'asd', 1, 2021, 11, 19, 2, 2021),
(4, 9, '1', 'Are You Happy>', 'Option-1', 'es', 'bo', 'no', 'yes\r\n', 1, 2021, 11, 19, 2, 2021),
(5, 9, '1', 'You Are Mad?', 'Option-1', 'asd', 'as', 's', 's', 1, 2021, 11, 19, 2, 2021),
(6, 8, '1', 'Oiwe', 'Option-1', 'nsasd', 'asdkn', 'nhh', 'hhs', 1, 2021, 11, 19, 2, 2021),
(7, 8, '1', 'POp?', 'Option-1', 'asdj', 'asd', 'asdj', 'asd', 1, 2021, 11, 19, 2, 2021);

-- --------------------------------------------------------

--
-- Table structure for table `role_management`
--

CREATE TABLE `role_management` (
  `id` int(11) NOT NULL,
  `module_name` varchar(255) DEFAULT NULL,
  `create_p` int(11) DEFAULT NULL,
  `read_p` int(11) DEFAULT NULL,
  `updated_p` int(11) DEFAULT NULL,
  `delete_p` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `topic_level` varchar(200) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` varchar(10) NOT NULL,
  `created_time` varchar(10) NOT NULL,
  `created_day` int(11) NOT NULL,
  `created_month` int(11) NOT NULL,
  `created_year` int(11) NOT NULL,
  `created_day_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `name`, `topic_level`, `created_by`, `created_date`, `created_time`, `created_day`, `created_month`, `created_year`, `created_day_time`) VALUES
(1, 'sub1', NULL, 1, '2021-02-18', '11:00:18', 18, 2, 2021, '2021-02-18 10:00:18'),
(2, 'sub2', NULL, 1, '2021-02-18', '11:00:21', 18, 2, 2021, '2021-02-18 10:00:21'),
(3, 'sub3A nuj', NULL, 1, '2021-02-18', '11:00:27', 18, 2, 2021, '2021-02-18 10:00:27');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `user_level` varchar(200) DEFAULT NULL,
  `cell_id` int(11) NOT NULL,
  `deleted` int(11) DEFAULT 0,
  `date_of_joining` varchar(200) NOT NULL,
  `profile_photo` text NOT NULL,
  `employee_code` varchar(30) NOT NULL,
  `line_id` int(11) DEFAULT NULL,
  `common_1_clear` varchar(10) NOT NULL DEFAULT 'no',
  `common_2_clear` varchar(20) DEFAULT '''no''',
  `common_3_clear` varchar(20) DEFAULT ''' no''',
  `cell_1_clear` varchar(10) NOT NULL DEFAULT 'no',
  `cell_2_clear` varchar(20) DEFAULT 'no',
  `cell_3_clear` varchar(20) DEFAULT 'no',
  `practiacl_1_clear` varchar(10) DEFAULT 'no',
  `practiacl_2_clear` varchar(10) DEFAULT 'no',
  `practiacl_3_clear` varchar(10) DEFAULT 'no',
  `dexterity_1_clear` varchar(10) DEFAULT 'no',
  `dexterity_2_clear` varchar(10) DEFAULT 'no',
  `dexterity_3_clear` varchar(10) DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `user_name`, `user_password`, `user_email`, `user_type`, `user_level`, `cell_id`, `deleted`, `date_of_joining`, `profile_photo`, `employee_code`, `line_id`, `common_1_clear`, `common_2_clear`, `common_3_clear`, `cell_1_clear`, `cell_2_clear`, `cell_3_clear`, `practiacl_1_clear`, `practiacl_2_clear`, `practiacl_3_clear`, `dexterity_1_clear`, `dexterity_2_clear`, `dexterity_3_clear`) VALUES
(1, 'admin', 'admin', 'admin@admin.com', 'trainee_oe', '1', 3, 0, '2021-10-29', '', '123123123', 1, 'yes', NULL, NULL, 'yes', NULL, NULL, 'yes', NULL, NULL, NULL, NULL, NULL),
(14, 'testing', 'admin', 'testing@gmail.com', 'trainee_oe', '0', 3, 0, '2021-10-30', '121.jpg', 'mh123', 3, 'no', '\'no\'', '\' no\'', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no'),
(15, 'new', 'admin', 'new@gmail.com', 'trainee_oe', '0', 3, 0, '2021-11-01', '', 'mh2', 2, 'no', '\'no\'', '\' no\'', 'no', 'no', 'no', 'yes', 'no', 'no', 'no', 'no', 'no'),
(16, 'anc', 'admin', 'anuj@gmail.com', 'trainee_oe', '0', 3, 0, '2020-10-31', '11.jpg', 'MH21', 3, 'yes', '\'no\'', '\' no\'', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attandance`
--
ALTER TABLE `attandance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `batches`
--
ALTER TABLE `batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cell`
--
ALTER TABLE `cell`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `common`
--
ALTER TABLE `common`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `common_questions`
--
ALTER TABLE `common_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_cell`
--
ALTER TABLE `exam_cell`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_common`
--
ALTER TABLE `exam_common`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_result`
--
ALTER TABLE `exam_result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_result_other`
--
ALTER TABLE `exam_result_other`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `line`
--
ALTER TABLE `line`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `observation_report`
--
ALTER TABLE `observation_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `practical_evaluation`
--
ALTER TABLE `practical_evaluation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qa`
--
ALTER TABLE `qa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_management`
--
ALTER TABLE `role_management`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attandance`
--
ALTER TABLE `attandance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `batches`
--
ALTER TABLE `batches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cell`
--
ALTER TABLE `cell`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `common`
--
ALTER TABLE `common`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `common_questions`
--
ALTER TABLE `common_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `exam_cell`
--
ALTER TABLE `exam_cell`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `exam_common`
--
ALTER TABLE `exam_common`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `exam_result`
--
ALTER TABLE `exam_result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `exam_result_other`
--
ALTER TABLE `exam_result_other`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `line`
--
ALTER TABLE `line`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `observation_report`
--
ALTER TABLE `observation_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `practical_evaluation`
--
ALTER TABLE `practical_evaluation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `qa`
--
ALTER TABLE `qa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `role_management`
--
ALTER TABLE `role_management`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
