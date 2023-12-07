-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2023 at 03:12 AM
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
-- Database: `onlinegradingsystem`
--
CREATE DATABASE IF NOT EXISTS `onlinegradingsystem` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `onlinegradingsystem`;

-- --------------------------------------------------------

--
-- Table structure for table `admin_accounts`
--

CREATE TABLE `admin_accounts` (
  `Admin_ID` varchar(4) NOT NULL,
  `user_name` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_accounts`
--

INSERT INTO `admin_accounts` (`Admin_ID`, `user_name`, `password`, `Name`) VALUES
('0001', 'admin', 'adminpassword123', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `archive_user_accounts`
--

CREATE TABLE `archive_user_accounts` (
  `Account_ID` varchar(7) NOT NULL,
  `acc_type` varchar(7) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `strand` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `st_0001_reportcard`
--

CREATE TABLE `st_0001_reportcard` (
  `Subject_ID` varchar(5) NOT NULL,
  `subject_name` varchar(100) DEFAULT NULL,
  `final_grade` decimal(5,2) DEFAULT 0.00,
  `grade_level` int(2) DEFAULT NULL,
  `semester` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `st_0001_reportcard`
--

INSERT INTO `st_0001_reportcard` (`Subject_ID`, `subject_name`, `final_grade`, `grade_level`, `semester`) VALUES
('BC_02', 'Basic Calculus', 0.00, 11, 'second'),
('CA_01', 'Contemporary Philippine Arts from the Regions', 0.00, 12, 'first'),
('CL_01', '21st Century Literature from the Philippines and the World', 0.00, 12, 'first'),
('DR_02', 'Disaster Readiness and Risk Reduction', 0.00, 11, 'second'),
('EA_01', 'English for Academic and Professional Purposes', 0.00, 12, 'first'),
('EN_01', 'Entreprenuership', 0.00, 12, 'second'),
('ES_01', 'Earth Science', 0.00, 11, 'first'),
('ET_01', 'Empowerment Technologies: ICT for Professional Tracks', 0.00, 11, 'first'),
('GB_01', 'General Biology 1', 0.00, 12, 'first'),
('GB_02', 'General Biology 2', 0.00, 12, 'second'),
('GC_01', 'General Chemistry 1', 0.00, 11, 'second'),
('GC_02', 'General Chemistry 2', 0.00, 12, 'second'),
('GM_01', 'General Mathematics', 0.00, 11, 'first'),
('GP_01', 'General Physics 1', 0.00, 12, 'first'),
('GP_02', 'General Physics 2', 0.00, 12, 'second'),
('IP_01', 'Introduction the the Philosophy of the Human Person', 0.00, 11, 'first'),
('KP_01', 'Komunikasyon at Pananaliksik sa Wika at Kulturang Pilipino', 0.00, 11, 'first'),
('MI_01', 'Media and Information Literacy', 0.00, 12, 'first'),
('OC_01', 'Oral Communication in Context', 0.00, 11, 'first'),
('PC_01', 'Pre-Calculus', 0.00, 11, 'first'),
('PD_02', 'Personal Development', 0.00, 11, 'second'),
('PE_01', 'Physical Education and Health 1', 0.00, 11, 'first'),
('PE_02', 'Physical Education and Health 2', 0.00, 11, 'second'),
('PE_03', 'Physical Education and Health 3', 0.00, 12, 'first'),
('PE_04', 'Physical Education and Health 4', 0.00, 12, 'second'),
('PF_01', 'Pagsulat ng Filipino sa Piling Larangan', 0.00, 12, 'first'),
('PP_02', 'Pagbasa at Pagsusuri ng Iba\'t-Ibang Teksto Tungo', 0.00, 11, 'second'),
('RC_01', 'Research/Capstone Project', 0.00, 12, 'second'),
('RD_01', 'Research in Daily Life 1', 0.00, 11, 'second'),
('RD_02', 'Research in Daily Life 2', 0.00, 12, 'second'),
('RP_01', 'Research Project', 0.00, 12, 'second'),
('RW_02', 'Reading and Writing Skills', 0.00, 11, 'second'),
('SP_02', 'Statistics and Probability ', 0.00, 11, 'second'),
('UC_01', 'Understanding Culture, Society and Politics', 0.00, 12, 'first');

-- --------------------------------------------------------

--
-- Table structure for table `st_0002_reportcard`
--

CREATE TABLE `st_0002_reportcard` (
  `Subject_ID` varchar(5) NOT NULL,
  `subject_name` varchar(100) DEFAULT NULL,
  `final_grade` decimal(5,2) DEFAULT 0.00,
  `grade_level` int(2) DEFAULT NULL,
  `semester` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `st_0002_reportcard`
--

INSERT INTO `st_0002_reportcard` (`Subject_ID`, `subject_name`, `final_grade`, `grade_level`, `semester`) VALUES
('BC_02', 'Basic Calculus', 0.00, 11, 'second'),
('CA_01', 'Contemporary Philippine Arts from the Regions', 0.00, 12, 'first'),
('CL_01', '21st Century Literature from the Philippines and the World', 0.00, 12, 'first'),
('DR_02', 'Disaster Readiness and Risk Reduction', 0.00, 11, 'second'),
('EA_01', 'English for Academic and Professional Purposes', 0.00, 12, 'first'),
('EN_01', 'Entreprenuership', 0.00, 12, 'second'),
('ES_01', 'Earth Science', 0.00, 11, 'first'),
('ET_01', 'Empowerment Technologies: ICT for Professional Tracks', 0.00, 11, 'first'),
('GB_01', 'General Biology 1', 0.00, 12, 'first'),
('GB_02', 'General Biology 2', 0.00, 12, 'second'),
('GC_01', 'General Chemistry 1', 0.00, 11, 'second'),
('GC_02', 'General Chemistry 2', 0.00, 12, 'second'),
('GM_01', 'General Mathematics', 0.00, 11, 'first'),
('GP_01', 'General Physics 1', 0.00, 12, 'first'),
('GP_02', 'General Physics 2', 0.00, 12, 'second'),
('IP_01', 'Introduction the the Philosophy of the Human Person', 0.00, 11, 'first'),
('KP_01', 'Komunikasyon at Pananaliksik sa Wika at Kulturang Pilipino', 0.00, 11, 'first'),
('MI_01', 'Media and Information Literacy', 0.00, 12, 'first'),
('OC_01', 'Oral Communication in Context', 0.00, 11, 'first'),
('PC_01', 'Pre-Calculus', 0.00, 11, 'first'),
('PD_02', 'Personal Development', 0.00, 11, 'second'),
('PE_01', 'Physical Education and Health 1', 0.00, 11, 'first'),
('PE_02', 'Physical Education and Health 2', 0.00, 11, 'second'),
('PE_03', 'Physical Education and Health 3', 0.00, 12, 'first'),
('PE_04', 'Physical Education and Health 4', 0.00, 12, 'second'),
('PF_01', 'Pagsulat ng Filipino sa Piling Larangan', 0.00, 12, 'first'),
('PP_02', 'Pagbasa at Pagsusuri ng Iba\'t-Ibang Teksto Tungo', 0.00, 11, 'second'),
('RC_01', 'Research/Capstone Project', 0.00, 12, 'second'),
('RD_01', 'Research in Daily Life 1', 0.00, 11, 'second'),
('RD_02', 'Research in Daily Life 2', 0.00, 12, 'second'),
('RP_01', 'Research Project', 0.00, 12, 'second'),
('RW_02', 'Reading and Writing Skills', 0.00, 11, 'second'),
('SP_02', 'Statistics and Probability ', 0.00, 11, 'second'),
('UC_01', 'Understanding Culture, Society and Politics', 0.00, 12, 'first');

-- --------------------------------------------------------

--
-- Table structure for table `st_0003_reportcard`
--

CREATE TABLE `st_0003_reportcard` (
  `Subject_ID` varchar(5) NOT NULL,
  `subject_name` varchar(100) DEFAULT NULL,
  `final_grade` decimal(5,2) DEFAULT 0.00,
  `grade_level` int(2) DEFAULT NULL,
  `semester` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `st_0003_reportcard`
--

INSERT INTO `st_0003_reportcard` (`Subject_ID`, `subject_name`, `final_grade`, `grade_level`, `semester`) VALUES
('BC_02', 'Basic Calculus', 0.00, 11, 'second'),
('CA_01', 'Contemporary Philippine Arts from the Regions', 0.00, 12, 'first'),
('CL_01', '21st Century Literature from the Philippines and the World', 0.00, 12, 'first'),
('DR_02', 'Disaster Readiness and Risk Reduction', 0.00, 11, 'second'),
('EA_01', 'English for Academic and Professional Purposes', 0.00, 12, 'first'),
('EN_01', 'Entreprenuership', 0.00, 12, 'second'),
('ES_01', 'Earth Science', 0.00, 11, 'first'),
('ET_01', 'Empowerment Technologies: ICT for Professional Tracks', 0.00, 11, 'first'),
('GB_01', 'General Biology 1', 0.00, 12, 'first'),
('GB_02', 'General Biology 2', 0.00, 12, 'second'),
('GC_01', 'General Chemistry 1', 0.00, 11, 'second'),
('GC_02', 'General Chemistry 2', 0.00, 12, 'second'),
('GM_01', 'General Mathematics', 0.00, 11, 'first'),
('GP_01', 'General Physics 1', 0.00, 12, 'first'),
('GP_02', 'General Physics 2', 0.00, 12, 'second'),
('IP_01', 'Introduction the the Philosophy of the Human Person', 0.00, 11, 'first'),
('KP_01', 'Komunikasyon at Pananaliksik sa Wika at Kulturang Pilipino', 0.00, 11, 'first'),
('MI_01', 'Media and Information Literacy', 0.00, 12, 'first'),
('OC_01', 'Oral Communication in Context', 0.00, 11, 'first'),
('PC_01', 'Pre-Calculus', 0.00, 11, 'first'),
('PD_02', 'Personal Development', 0.00, 11, 'second'),
('PE_01', 'Physical Education and Health 1', 0.00, 11, 'first'),
('PE_02', 'Physical Education and Health 2', 0.00, 11, 'second'),
('PE_03', 'Physical Education and Health 3', 0.00, 12, 'first'),
('PE_04', 'Physical Education and Health 4', 0.00, 12, 'second'),
('PF_01', 'Pagsulat ng Filipino sa Piling Larangan', 0.00, 12, 'first'),
('PP_02', 'Pagbasa at Pagsusuri ng Iba\'t-Ibang Teksto Tungo', 0.00, 11, 'second'),
('RC_01', 'Research/Capstone Project', 0.00, 12, 'second'),
('RD_01', 'Research in Daily Life 1', 0.00, 11, 'second'),
('RD_02', 'Research in Daily Life 2', 0.00, 12, 'second'),
('RP_01', 'Research Project', 0.00, 12, 'second'),
('RW_02', 'Reading and Writing Skills', 0.00, 11, 'second'),
('SP_02', 'Statistics and Probability ', 0.00, 11, 'second'),
('UC_01', 'Understanding Culture, Society and Politics', 0.00, 12, 'first');

-- --------------------------------------------------------

--
-- Table structure for table `st_0004_reportcard`
--

CREATE TABLE `st_0004_reportcard` (
  `Subject_ID` varchar(5) NOT NULL,
  `subject_name` varchar(100) DEFAULT NULL,
  `final_grade` decimal(5,2) DEFAULT 0.00,
  `grade_level` int(2) DEFAULT NULL,
  `semester` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `st_0004_reportcard`
--

INSERT INTO `st_0004_reportcard` (`Subject_ID`, `subject_name`, `final_grade`, `grade_level`, `semester`) VALUES
('BC_02', 'Basic Calculus', 0.00, 11, 'second'),
('CA_01', 'Contemporary Philippine Arts from the Regions', 0.00, 12, 'first'),
('CL_01', '21st Century Literature from the Philippines and the World', 0.00, 12, 'first'),
('DR_02', 'Disaster Readiness and Risk Reduction', 0.00, 11, 'second'),
('EA_01', 'English for Academic and Professional Purposes', 0.00, 12, 'first'),
('EN_01', 'Entreprenuership', 0.00, 12, 'second'),
('ES_01', 'Earth Science', 0.00, 11, 'first'),
('ET_01', 'Empowerment Technologies: ICT for Professional Tracks', 0.00, 11, 'first'),
('GB_01', 'General Biology 1', 0.00, 12, 'first'),
('GB_02', 'General Biology 2', 0.00, 12, 'second'),
('GC_01', 'General Chemistry 1', 0.00, 11, 'second'),
('GC_02', 'General Chemistry 2', 0.00, 12, 'second'),
('GM_01', 'General Mathematics', 0.00, 11, 'first'),
('GP_01', 'General Physics 1', 0.00, 12, 'first'),
('GP_02', 'General Physics 2', 0.00, 12, 'second'),
('IP_01', 'Introduction the the Philosophy of the Human Person', 0.00, 11, 'first'),
('KP_01', 'Komunikasyon at Pananaliksik sa Wika at Kulturang Pilipino', 0.00, 11, 'first'),
('MI_01', 'Media and Information Literacy', 0.00, 12, 'first'),
('OC_01', 'Oral Communication in Context', 0.00, 11, 'first'),
('PC_01', 'Pre-Calculus', 0.00, 11, 'first'),
('PD_02', 'Personal Development', 0.00, 11, 'second'),
('PE_01', 'Physical Education and Health 1', 0.00, 11, 'first'),
('PE_02', 'Physical Education and Health 2', 0.00, 11, 'second'),
('PE_03', 'Physical Education and Health 3', 0.00, 12, 'first'),
('PE_04', 'Physical Education and Health 4', 0.00, 12, 'second'),
('PF_01', 'Pagsulat ng Filipino sa Piling Larangan', 0.00, 12, 'first'),
('PP_02', 'Pagbasa at Pagsusuri ng Iba\'t-Ibang Teksto Tungo', 0.00, 11, 'second'),
('RC_01', 'Research/Capstone Project', 0.00, 12, 'second'),
('RD_01', 'Research in Daily Life 1', 0.00, 11, 'second'),
('RD_02', 'Research in Daily Life 2', 0.00, 12, 'second'),
('RP_01', 'Research Project', 0.00, 12, 'second'),
('RW_02', 'Reading and Writing Skills', 0.00, 11, 'second'),
('SP_02', 'Statistics and Probability ', 0.00, 11, 'second'),
('UC_01', 'Understanding Culture, Society and Politics', 0.00, 12, 'first');

-- --------------------------------------------------------

--
-- Table structure for table `st_0005_reportcard`
--

CREATE TABLE `st_0005_reportcard` (
  `Subject_ID` varchar(5) NOT NULL,
  `subject_name` varchar(100) DEFAULT NULL,
  `final_grade` decimal(5,2) DEFAULT 0.00,
  `grade_level` int(2) DEFAULT NULL,
  `semester` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `st_0005_reportcard`
--

INSERT INTO `st_0005_reportcard` (`Subject_ID`, `subject_name`, `final_grade`, `grade_level`, `semester`) VALUES
('AE_01', 'Applied Economics', 0.00, 12, 'second'),
('BE_01', 'Business Ethics and Social Responsibility', 0.00, 12, 'second'),
('BF_01', 'Business Finance', 0.00, 12, 'first'),
('BM_01', 'Business Math', 0.00, 11, 'second'),
('BS_01', 'Business Enterprise Simulation', 0.00, 12, 'second'),
('CA_01', 'Contemporary Philippine Arts from the Regions', 0.00, 12, 'first'),
('CL_01', '21st Century Literature from the Philippines and the World', 0.00, 12, 'first'),
('EA_01', 'English for Academic and Professional Purposes', 0.00, 11, 'first'),
('EL_01', 'Earth and Life Sciences', 0.00, 11, 'first'),
('EN_01', 'Entreprenuership', 0.00, 12, 'second'),
('ET_01', 'Empowerment Technologies: ICT for Professional Tracks', 0.00, 11, 'second'),
('FA_01', 'Fundamentals of Accounting, Business and Management', 0.00, 11, 'second'),
('FA_02', 'Fundamentals of Accounting, Business and Management', 0.00, 12, 'first'),
('GM_01', 'General Mathematics', 0.00, 11, 'first'),
('IP_01', 'Introduction the the Philosophy of the Human Person', 0.00, 12, 'first'),
('KP_01', 'Komunikasyon at Pananaliksik sa Wika at Kulturang Pilipino', 0.00, 11, 'first'),
('MI_01', 'Media and Information Literacy', 0.00, 12, 'first'),
('MR_01', 'Business Marketing', 0.00, 12, 'second'),
('OC_01', 'Oral Communication in Context', 0.00, 11, 'first'),
('OM_01', 'Organizational Management', 0.00, 11, 'second'),
('PD_02', 'Personal Development', 0.00, 11, 'first'),
('PE_01', 'Physical Education and Health 1', 0.00, 11, 'first'),
('PE_02', 'Physical Education and Health 2', 0.00, 11, 'second'),
('PE_03', 'Physical Education and Health 3', 0.00, 12, 'first'),
('PE_04', 'Physical Education and Health 4', 0.00, 12, 'second'),
('PF_01', 'Pagsulat ng Filipino sa Piling Larangan', 0.00, 12, 'second'),
('PP_02', 'Pagbasa at Pagsusuri ng Iba\'t-Ibang Teksto Tungo sa Pananaliksik', 0.00, 11, 'second'),
('PS_01', 'Physical Science', 0.00, 11, 'second'),
('RD_01', 'Research in Daily Life 1', 0.00, 11, 'first'),
('RD_02', 'Research in Daily Life 2', 0.00, 12, 'first'),
('RW_02', 'Reading and Writing Skills', 0.00, 11, 'second'),
('SP_02', 'Statistics and Probability', 0.00, 11, 'second'),
('UC_01', 'Understanding Culture, Society and Politics', 0.00, 11, 'first');

-- --------------------------------------------------------

--
-- Table structure for table `st_0006_reportcard`
--

CREATE TABLE `st_0006_reportcard` (
  `Subject_ID` varchar(5) NOT NULL,
  `subject_name` varchar(100) DEFAULT NULL,
  `final_grade` decimal(5,2) DEFAULT 0.00,
  `grade_level` int(2) DEFAULT NULL,
  `semester` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `st_0006_reportcard`
--

INSERT INTO `st_0006_reportcard` (`Subject_ID`, `subject_name`, `final_grade`, `grade_level`, `semester`) VALUES
('AE_01', 'Applied Economics', 0.00, 12, 'second'),
('BE_01', 'Business Ethics and Social Responsibility', 0.00, 12, 'second'),
('BF_01', 'Business Finance', 0.00, 12, 'first'),
('BM_01', 'Business Math', 0.00, 11, 'second'),
('BS_01', 'Business Enterprise Simulation', 0.00, 12, 'second'),
('CA_01', 'Contemporary Philippine Arts from the Regions', 0.00, 12, 'first'),
('CL_01', '21st Century Literature from the Philippines and the World', 0.00, 12, 'first'),
('EA_01', 'English for Academic and Professional Purposes', 0.00, 11, 'first'),
('EL_01', 'Earth and Life Sciences', 0.00, 11, 'first'),
('EN_01', 'Entreprenuership', 0.00, 12, 'second'),
('ET_01', 'Empowerment Technologies: ICT for Professional Tracks', 0.00, 11, 'second'),
('FA_01', 'Fundamentals of Accounting, Business and Management', 0.00, 11, 'second'),
('FA_02', 'Fundamentals of Accounting, Business and Management', 0.00, 12, 'first'),
('GM_01', 'General Mathematics', 0.00, 11, 'first'),
('IP_01', 'Introduction the the Philosophy of the Human Person', 0.00, 12, 'first'),
('KP_01', 'Komunikasyon at Pananaliksik sa Wika at Kulturang Pilipino', 0.00, 11, 'first'),
('MI_01', 'Media and Information Literacy', 0.00, 12, 'first'),
('MR_01', 'Business Marketing', 0.00, 12, 'second'),
('OC_01', 'Oral Communication in Context', 0.00, 11, 'first'),
('OM_01', 'Organizational Management', 0.00, 11, 'second'),
('PD_02', 'Personal Development', 0.00, 11, 'first'),
('PE_01', 'Physical Education and Health 1', 0.00, 11, 'first'),
('PE_02', 'Physical Education and Health 2', 0.00, 11, 'second'),
('PE_03', 'Physical Education and Health 3', 0.00, 12, 'first'),
('PE_04', 'Physical Education and Health 4', 0.00, 12, 'second'),
('PF_01', 'Pagsulat ng Filipino sa Piling Larangan', 0.00, 12, 'second'),
('PP_02', 'Pagbasa at Pagsusuri ng Iba\'t-Ibang Teksto Tungo sa Pananaliksik', 0.00, 11, 'second'),
('PS_01', 'Physical Science', 0.00, 11, 'second'),
('RD_01', 'Research in Daily Life 1', 0.00, 11, 'first'),
('RD_02', 'Research in Daily Life 2', 0.00, 12, 'first'),
('RW_02', 'Reading and Writing Skills', 0.00, 11, 'second'),
('SP_02', 'Statistics and Probability', 0.00, 11, 'second'),
('UC_01', 'Understanding Culture, Society and Politics', 0.00, 11, 'first');

-- --------------------------------------------------------

--
-- Table structure for table `st_0007_reportcard`
--

CREATE TABLE `st_0007_reportcard` (
  `Subject_ID` varchar(5) NOT NULL,
  `subject_name` varchar(100) DEFAULT NULL,
  `final_grade` decimal(5,2) DEFAULT 0.00,
  `grade_level` int(2) DEFAULT NULL,
  `semester` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `st_0007_reportcard`
--

INSERT INTO `st_0007_reportcard` (`Subject_ID`, `subject_name`, `final_grade`, `grade_level`, `semester`) VALUES
('AE_01', 'Applied Economics', 0.00, 12, 'second'),
('BE_01', 'Business Ethics and Social Responsibility', 0.00, 12, 'second'),
('BF_01', 'Business Finance', 0.00, 12, 'first'),
('BM_01', 'Business Math', 0.00, 11, 'second'),
('BS_01', 'Business Enterprise Simulation', 0.00, 12, 'second'),
('CA_01', 'Contemporary Philippine Arts from the Regions', 0.00, 12, 'first'),
('CL_01', '21st Century Literature from the Philippines and the World', 0.00, 12, 'first'),
('EA_01', 'English for Academic and Professional Purposes', 0.00, 11, 'first'),
('EL_01', 'Earth and Life Sciences', 0.00, 11, 'first'),
('EN_01', 'Entreprenuership', 0.00, 12, 'second'),
('ET_01', 'Empowerment Technologies: ICT for Professional Tracks', 0.00, 11, 'second'),
('FA_01', 'Fundamentals of Accounting, Business and Management', 0.00, 11, 'second'),
('FA_02', 'Fundamentals of Accounting, Business and Management', 0.00, 12, 'first'),
('GM_01', 'General Mathematics', 0.00, 11, 'first'),
('IP_01', 'Introduction the the Philosophy of the Human Person', 0.00, 12, 'first'),
('KP_01', 'Komunikasyon at Pananaliksik sa Wika at Kulturang Pilipino', 0.00, 11, 'first'),
('MI_01', 'Media and Information Literacy', 0.00, 12, 'first'),
('MR_01', 'Business Marketing', 0.00, 12, 'second'),
('OC_01', 'Oral Communication in Context', 0.00, 11, 'first'),
('OM_01', 'Organizational Management', 0.00, 11, 'second'),
('PD_02', 'Personal Development', 0.00, 11, 'first'),
('PE_01', 'Physical Education and Health 1', 0.00, 11, 'first'),
('PE_02', 'Physical Education and Health 2', 0.00, 11, 'second'),
('PE_03', 'Physical Education and Health 3', 0.00, 12, 'first'),
('PE_04', 'Physical Education and Health 4', 0.00, 12, 'second'),
('PF_01', 'Pagsulat ng Filipino sa Piling Larangan', 0.00, 12, 'second'),
('PP_02', 'Pagbasa at Pagsusuri ng Iba\'t-Ibang Teksto Tungo sa Pananaliksik', 0.00, 11, 'second'),
('PS_01', 'Physical Science', 0.00, 11, 'second'),
('RD_01', 'Research in Daily Life 1', 0.00, 11, 'first'),
('RD_02', 'Research in Daily Life 2', 0.00, 12, 'first'),
('RW_02', 'Reading and Writing Skills', 0.00, 11, 'second'),
('SP_02', 'Statistics and Probability', 0.00, 11, 'second'),
('UC_01', 'Understanding Culture, Society and Politics', 0.00, 11, 'first');

-- --------------------------------------------------------

--
-- Table structure for table `st_0008_reportcard`
--

CREATE TABLE `st_0008_reportcard` (
  `Subject_ID` varchar(5) NOT NULL,
  `subject_name` varchar(100) DEFAULT NULL,
  `final_grade` decimal(5,2) DEFAULT 0.00,
  `grade_level` int(2) DEFAULT NULL,
  `semester` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `st_0008_reportcard`
--

INSERT INTO `st_0008_reportcard` (`Subject_ID`, `subject_name`, `final_grade`, `grade_level`, `semester`) VALUES
('AE_01', 'Applied Economics', 0.00, 12, 'second'),
('BE_01', 'Business Ethics and Social Responsibility', 0.00, 12, 'second'),
('BF_01', 'Business Finance', 0.00, 12, 'first'),
('BM_01', 'Business Math', 0.00, 11, 'second'),
('BS_01', 'Business Enterprise Simulation', 0.00, 12, 'second'),
('CA_01', 'Contemporary Philippine Arts from the Regions', 0.00, 12, 'first'),
('CL_01', '21st Century Literature from the Philippines and the World', 0.00, 12, 'first'),
('EA_01', 'English for Academic and Professional Purposes', 0.00, 11, 'first'),
('EL_01', 'Earth and Life Sciences', 0.00, 11, 'first'),
('EN_01', 'Entreprenuership', 0.00, 12, 'second'),
('ET_01', 'Empowerment Technologies: ICT for Professional Tracks', 0.00, 11, 'second'),
('FA_01', 'Fundamentals of Accounting, Business and Management', 0.00, 11, 'second'),
('FA_02', 'Fundamentals of Accounting, Business and Management', 0.00, 12, 'first'),
('GM_01', 'General Mathematics', 0.00, 11, 'first'),
('IP_01', 'Introduction the the Philosophy of the Human Person', 0.00, 12, 'first'),
('KP_01', 'Komunikasyon at Pananaliksik sa Wika at Kulturang Pilipino', 0.00, 11, 'first'),
('MI_01', 'Media and Information Literacy', 0.00, 12, 'first'),
('MR_01', 'Business Marketing', 0.00, 12, 'second'),
('OC_01', 'Oral Communication in Context', 0.00, 11, 'first'),
('OM_01', 'Organizational Management', 0.00, 11, 'second'),
('PD_02', 'Personal Development', 0.00, 11, 'first'),
('PE_01', 'Physical Education and Health 1', 0.00, 11, 'first'),
('PE_02', 'Physical Education and Health 2', 0.00, 11, 'second'),
('PE_03', 'Physical Education and Health 3', 0.00, 12, 'first'),
('PE_04', 'Physical Education and Health 4', 0.00, 12, 'second'),
('PF_01', 'Pagsulat ng Filipino sa Piling Larangan', 0.00, 12, 'second'),
('PP_02', 'Pagbasa at Pagsusuri ng Iba\'t-Ibang Teksto Tungo sa Pananaliksik', 0.00, 11, 'second'),
('PS_01', 'Physical Science', 0.00, 11, 'second'),
('RD_01', 'Research in Daily Life 1', 0.00, 11, 'first'),
('RD_02', 'Research in Daily Life 2', 0.00, 12, 'first'),
('RW_02', 'Reading and Writing Skills', 0.00, 11, 'second'),
('SP_02', 'Statistics and Probability', 0.00, 11, 'second'),
('UC_01', 'Understanding Culture, Society and Politics', 0.00, 11, 'first');

-- --------------------------------------------------------

--
-- Table structure for table `st_0009_reportcard`
--

CREATE TABLE `st_0009_reportcard` (
  `Subject_ID` varchar(5) NOT NULL,
  `subject_name` varchar(100) DEFAULT NULL,
  `final_grade` decimal(5,2) DEFAULT 0.00,
  `grade_level` int(2) DEFAULT NULL,
  `semester` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `st_0009_reportcard`
--

INSERT INTO `st_0009_reportcard` (`Subject_ID`, `subject_name`, `final_grade`, `grade_level`, `semester`) VALUES
('CA_01', 'Contemporary Philippine Arts from the Regions', 0.00, 11, 'first'),
('CE_01', 'Community Engagement, Solidarity and Citizenship', 0.00, 12, 'second'),
('CL_01', '21st Century Literature from the Philippines and the World', 0.00, 11, 'second'),
('CN_01', 'Creative Non-fiction: The Literacy Essay', 0.00, 12, 'second'),
('CU_01', 'Culminating Activity', 0.00, 12, 'second'),
('CW_01', 'Creative Writing ', 0.00, 12, 'first'),
('DS_01', 'Disciplines and Ideas in the Social Sciences', 0.00, 11, 'second'),
('DS_02', 'Disciplines and Ideas in the Applied Social Sciences ', 0.00, 12, 'first'),
('EA_01', 'English for Academic and Professional Purposes', 0.00, 11, 'first'),
('EL_01', 'Earth and Life Sciences', 0.00, 11, 'first'),
('EN_01', 'Entreprenuership', 0.00, 12, 'second'),
('ET_01', 'Empowerment Technologies: ICT for Professional Tracks', 0.00, 11, 'first'),
('GM_01', 'General Mathematics', 0.00, 11, 'first'),
('IP_01', 'Introduction the the Philosophy of the Human Person', 0.00, 12, 'first'),
('KP_01', 'Komunikasyon at Pananaliksik sa Wika at Kulturang Pilipino', 0.00, 11, 'first'),
('MI_01', 'Media and Information Literacy', 0.00, 12, 'first'),
('OC_01', 'Oral Communication in Context', 0.00, 11, 'first'),
('PD_02', 'Personal Development', 0.00, 11, 'second'),
('PE_01', 'Physical Education and Health 1', 0.00, 11, 'first'),
('PE_02', 'Physical Education and Health 2', 0.00, 11, 'second'),
('PE_03', 'Physical Education and Health 3', 0.00, 12, 'first'),
('PE_04', 'Physical Education and Health 4', 0.00, 12, 'second'),
('PF_01', 'Pagsulat ng Filipino sa Piling Larangan', 0.00, 11, 'second'),
('PG_01', 'Philippine Politics and Governance', 0.00, 11, 'second'),
('PP_02', 'Pagbasa at Pagsusuri ng Iba\'t-Ibang Teksto Tungo', 0.00, 11, 'second'),
('PS_01', 'Physical Science', 0.00, 12, 'first'),
('RD_01', 'Research in Daily Life 1', 0.00, 12, 'first'),
('RD_02', 'Research in Daily Life 2', 0.00, 12, 'first'),
('RP_01', 'Research Project', 0.00, 12, 'second'),
('RW_02', 'Reading and Writing Skills', 0.00, 11, 'second'),
('SP_02', 'Statistics and Probability ', 0.00, 11, 'second'),
('TN_01', 'Trends, Networks and Critical Thinking in the 21st Century Culture', 0.00, 12, 'second'),
('UC_01', 'Understanding Culture, Society and Politics', 0.00, 11, 'first'),
('WR_01', 'Introduction to World Religions and Belief Systems', 0.00, 12, 'second');

-- --------------------------------------------------------

--
-- Table structure for table `st_0010_reportcard`
--

CREATE TABLE `st_0010_reportcard` (
  `Subject_ID` varchar(5) NOT NULL,
  `subject_name` varchar(100) DEFAULT NULL,
  `final_grade` decimal(5,2) DEFAULT 0.00,
  `grade_level` int(2) DEFAULT NULL,
  `semester` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `st_0010_reportcard`
--

INSERT INTO `st_0010_reportcard` (`Subject_ID`, `subject_name`, `final_grade`, `grade_level`, `semester`) VALUES
('CA_01', 'Contemporary Philippine Arts from the Regions', 0.00, 11, 'first'),
('CE_01', 'Community Engagement, Solidarity and Citizenship', 0.00, 12, 'second'),
('CL_01', '21st Century Literature from the Philippines and the World', 0.00, 11, 'second'),
('CN_01', 'Creative Non-fiction: The Literacy Essay', 0.00, 12, 'second'),
('CU_01', 'Culminating Activity', 0.00, 12, 'second'),
('CW_01', 'Creative Writing ', 0.00, 12, 'first'),
('DS_01', 'Disciplines and Ideas in the Social Sciences', 0.00, 11, 'second'),
('DS_02', 'Disciplines and Ideas in the Applied Social Sciences ', 0.00, 12, 'first'),
('EA_01', 'English for Academic and Professional Purposes', 0.00, 11, 'first'),
('EL_01', 'Earth and Life Sciences', 0.00, 11, 'first'),
('EN_01', 'Entreprenuership', 0.00, 12, 'second'),
('ET_01', 'Empowerment Technologies: ICT for Professional Tracks', 0.00, 11, 'first'),
('GM_01', 'General Mathematics', 0.00, 11, 'first'),
('IP_01', 'Introduction the the Philosophy of the Human Person', 0.00, 12, 'first'),
('KP_01', 'Komunikasyon at Pananaliksik sa Wika at Kulturang Pilipino', 0.00, 11, 'first'),
('MI_01', 'Media and Information Literacy', 0.00, 12, 'first'),
('OC_01', 'Oral Communication in Context', 0.00, 11, 'first'),
('PD_02', 'Personal Development', 0.00, 11, 'second'),
('PE_01', 'Physical Education and Health 1', 0.00, 11, 'first'),
('PE_02', 'Physical Education and Health 2', 0.00, 11, 'second'),
('PE_03', 'Physical Education and Health 3', 0.00, 12, 'first'),
('PE_04', 'Physical Education and Health 4', 0.00, 12, 'second'),
('PF_01', 'Pagsulat ng Filipino sa Piling Larangan', 0.00, 11, 'second'),
('PG_01', 'Philippine Politics and Governance', 0.00, 11, 'second'),
('PP_02', 'Pagbasa at Pagsusuri ng Iba\'t-Ibang Teksto Tungo', 0.00, 11, 'second'),
('PS_01', 'Physical Science', 0.00, 12, 'first'),
('RD_01', 'Research in Daily Life 1', 0.00, 12, 'first'),
('RD_02', 'Research in Daily Life 2', 0.00, 12, 'first'),
('RP_01', 'Research Project', 0.00, 12, 'second'),
('RW_02', 'Reading and Writing Skills', 0.00, 11, 'second'),
('SP_02', 'Statistics and Probability ', 0.00, 11, 'second'),
('TN_01', 'Trends, Networks and Critical Thinking in the 21st Century Culture', 0.00, 12, 'second'),
('UC_01', 'Understanding Culture, Society and Politics', 0.00, 11, 'first'),
('WR_01', 'Introduction to World Religions and Belief Systems', 0.00, 12, 'second');

-- --------------------------------------------------------

--
-- Table structure for table `st_0011_reportcard`
--

CREATE TABLE `st_0011_reportcard` (
  `Subject_ID` varchar(5) NOT NULL,
  `subject_name` varchar(100) DEFAULT NULL,
  `final_grade` decimal(5,2) DEFAULT 0.00,
  `grade_level` int(2) DEFAULT NULL,
  `semester` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `st_0011_reportcard`
--

INSERT INTO `st_0011_reportcard` (`Subject_ID`, `subject_name`, `final_grade`, `grade_level`, `semester`) VALUES
('CA_01', 'Contemporary Philippine Arts from the Regions', 0.00, 11, 'first'),
('CE_01', 'Community Engagement, Solidarity and Citizenship', 0.00, 12, 'second'),
('CL_01', '21st Century Literature from the Philippines and the World', 0.00, 11, 'second'),
('CN_01', 'Creative Non-fiction: The Literacy Essay', 0.00, 12, 'second'),
('CU_01', 'Culminating Activity', 0.00, 12, 'second'),
('CW_01', 'Creative Writing ', 0.00, 12, 'first'),
('DS_01', 'Disciplines and Ideas in the Social Sciences', 0.00, 11, 'second'),
('DS_02', 'Disciplines and Ideas in the Applied Social Sciences ', 0.00, 12, 'first'),
('EA_01', 'English for Academic and Professional Purposes', 0.00, 11, 'first'),
('EL_01', 'Earth and Life Sciences', 0.00, 11, 'first'),
('EN_01', 'Entreprenuership', 0.00, 12, 'second'),
('ET_01', 'Empowerment Technologies: ICT for Professional Tracks', 0.00, 11, 'first'),
('GM_01', 'General Mathematics', 0.00, 11, 'first'),
('IP_01', 'Introduction the the Philosophy of the Human Person', 0.00, 12, 'first'),
('KP_01', 'Komunikasyon at Pananaliksik sa Wika at Kulturang Pilipino', 0.00, 11, 'first'),
('MI_01', 'Media and Information Literacy', 0.00, 12, 'first'),
('OC_01', 'Oral Communication in Context', 0.00, 11, 'first'),
('PD_02', 'Personal Development', 0.00, 11, 'second'),
('PE_01', 'Physical Education and Health 1', 0.00, 11, 'first'),
('PE_02', 'Physical Education and Health 2', 0.00, 11, 'second'),
('PE_03', 'Physical Education and Health 3', 0.00, 12, 'first'),
('PE_04', 'Physical Education and Health 4', 0.00, 12, 'second'),
('PF_01', 'Pagsulat ng Filipino sa Piling Larangan', 0.00, 11, 'second'),
('PG_01', 'Philippine Politics and Governance', 0.00, 11, 'second'),
('PP_02', 'Pagbasa at Pagsusuri ng Iba\'t-Ibang Teksto Tungo', 0.00, 11, 'second'),
('PS_01', 'Physical Science', 0.00, 12, 'first'),
('RD_01', 'Research in Daily Life 1', 0.00, 12, 'first'),
('RD_02', 'Research in Daily Life 2', 0.00, 12, 'first'),
('RP_01', 'Research Project', 0.00, 12, 'second'),
('RW_02', 'Reading and Writing Skills', 0.00, 11, 'second'),
('SP_02', 'Statistics and Probability ', 0.00, 11, 'second'),
('TN_01', 'Trends, Networks and Critical Thinking in the 21st Century Culture', 0.00, 12, 'second'),
('UC_01', 'Understanding Culture, Society and Politics', 0.00, 11, 'first'),
('WR_01', 'Introduction to World Religions and Belief Systems', 0.00, 12, 'second');

-- --------------------------------------------------------

--
-- Table structure for table `st_0012_reportcard`
--

CREATE TABLE `st_0012_reportcard` (
  `Subject_ID` varchar(5) NOT NULL,
  `subject_name` varchar(100) DEFAULT NULL,
  `final_grade` decimal(5,2) DEFAULT 0.00,
  `grade_level` int(2) DEFAULT NULL,
  `semester` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `st_0012_reportcard`
--

INSERT INTO `st_0012_reportcard` (`Subject_ID`, `subject_name`, `final_grade`, `grade_level`, `semester`) VALUES
('CA_01', 'Contemporary Philippine Arts from the Regions', 0.00, 11, 'first'),
('CE_01', 'Community Engagement, Solidarity and Citizenship', 0.00, 12, 'second'),
('CL_01', '21st Century Literature from the Philippines and the World', 0.00, 11, 'second'),
('CN_01', 'Creative Non-fiction: The Literacy Essay', 0.00, 12, 'second'),
('CU_01', 'Culminating Activity', 0.00, 12, 'second'),
('CW_01', 'Creative Writing ', 0.00, 12, 'first'),
('DS_01', 'Disciplines and Ideas in the Social Sciences', 0.00, 11, 'second'),
('DS_02', 'Disciplines and Ideas in the Applied Social Sciences ', 0.00, 12, 'first'),
('EA_01', 'English for Academic and Professional Purposes', 0.00, 11, 'first'),
('EL_01', 'Earth and Life Sciences', 0.00, 11, 'first'),
('EN_01', 'Entreprenuership', 0.00, 12, 'second'),
('ET_01', 'Empowerment Technologies: ICT for Professional Tracks', 0.00, 11, 'first'),
('GM_01', 'General Mathematics', 0.00, 11, 'first'),
('IP_01', 'Introduction the the Philosophy of the Human Person', 0.00, 12, 'first'),
('KP_01', 'Komunikasyon at Pananaliksik sa Wika at Kulturang Pilipino', 0.00, 11, 'first'),
('MI_01', 'Media and Information Literacy', 0.00, 12, 'first'),
('OC_01', 'Oral Communication in Context', 0.00, 11, 'first'),
('PD_02', 'Personal Development', 0.00, 11, 'second'),
('PE_01', 'Physical Education and Health 1', 0.00, 11, 'first'),
('PE_02', 'Physical Education and Health 2', 0.00, 11, 'second'),
('PE_03', 'Physical Education and Health 3', 0.00, 12, 'first'),
('PE_04', 'Physical Education and Health 4', 0.00, 12, 'second'),
('PF_01', 'Pagsulat ng Filipino sa Piling Larangan', 0.00, 11, 'second'),
('PG_01', 'Philippine Politics and Governance', 0.00, 11, 'second'),
('PP_02', 'Pagbasa at Pagsusuri ng Iba\'t-Ibang Teksto Tungo', 0.00, 11, 'second'),
('PS_01', 'Physical Science', 0.00, 12, 'first'),
('RD_01', 'Research in Daily Life 1', 0.00, 12, 'first'),
('RD_02', 'Research in Daily Life 2', 0.00, 12, 'first'),
('RP_01', 'Research Project', 0.00, 12, 'second'),
('RW_02', 'Reading and Writing Skills', 0.00, 11, 'second'),
('SP_02', 'Statistics and Probability ', 0.00, 11, 'second'),
('TN_01', 'Trends, Networks and Critical Thinking in the 21st Century Culture', 0.00, 12, 'second'),
('UC_01', 'Understanding Culture, Society and Politics', 0.00, 11, 'first'),
('WR_01', 'Introduction to World Religions and Belief Systems', 0.00, 12, 'second');

-- --------------------------------------------------------

--
-- Table structure for table `subjects_table`
--

CREATE TABLE `subjects_table` (
  `Subject_ID` varchar(5) NOT NULL,
  `subject_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects_table`
--

INSERT INTO `subjects_table` (`Subject_ID`, `subject_name`) VALUES
('CL_01', '21st Century Literature from the Philippines and the World'),
('AE_01', 'Applied Economics'),
('BC_02', 'Basic Calculus'),
('BS_01', 'Business Enterprise Simulation'),
('BE_01', 'Business Ethics and Social Responsibility'),
('BF_01', 'Business Finance'),
('MR_01', 'Business Marketing '),
('BM_01', 'Business Math'),
('CE_01', 'Community Engagement, Solidarity and Citizenship'),
('CA_01', 'Contemporary Philippine Arts from the Regions '),
('CN_01', 'Creative Non-fiction: The Literacy Essay'),
('CW_01', 'Creative Writing '),
('CU_01', 'Culminating Activity'),
('DR_02', 'Disaster Readiness and Risk Reduction'),
('DS_02', 'Disciplines and Ideas in the Applied Social Sciences '),
('DS_01', 'Disciplines and Ideas in the Social Sciences'),
('EL_01', 'Earth and Life Sciences'),
('ES_01', 'Earth Science'),
('ET_01', 'Empowerment Technologies: ICT for Professional Tracks'),
('EA_01', 'English for Academic and Professional Purposes'),
('EN_01', 'Entreprenuership'),
('FA_01', 'Fundamentals of Accounting, Business and Management 1'),
('FA_02', 'Fundamentals of Accounting, Business and Management 2'),
('GB_01', 'General Biology 1'),
('GB_02', 'General Biology 2'),
('GC_01', 'General Chemistry 1'),
('GC_02', 'General Chemistry 2'),
('GM_01', 'General Mathematics'),
('GP_01', 'General Physics 1'),
('GP_02', 'General Physics 2'),
('IP_01', 'Introduction the the Philosophy of the Human Person'),
('WR_01', 'Introduction to World Religions and Belief Systems'),
('KP_01', 'Komunikasyon at Pananaliksik sa Wika at Kulturang Pilipino'),
('MI_01', 'Media and Information Literacy'),
('OC_01', 'Oral Communication in Context'),
('OM_01', 'Organizational Management'),
('PP_02', 'Pagbasa at Pagsusuri ng Iba\'t-Ibang Teksto Tungo sa Pananaliksik'),
('PF_01', 'Pagsulat ng Filipino sa Piling Larangan'),
('PD_02', 'Personal Development'),
('PG_01', 'Philippine Politics and Governance'),
('PE_01', 'Physical Education and Health 1'),
('PE_02', 'Physical Education and Health 2'),
('PE_03', 'Physical Education and Health 3'),
('PE_04', 'Physical Education and Health 4'),
('PS_01', 'Physical Science'),
('PC_01', 'Pre-Calculus'),
('RW_02', 'Reading and Writing Skills'),
('RD_01', 'Research in Daily Life 1'),
('RD_02', 'Research in Daily Life 2'),
('RP_01', 'Research Project'),
('RC_01', 'Research/Capstone Project'),
('SP_02', 'Statistics and Probability '),
('TN_01', 'Trends, Networks and Critical Thinking in the 21st Century Culture'),
('UC_01', 'Understanding Culture, Society and Politics');

-- --------------------------------------------------------

--
-- Table structure for table `user_accounts`
--

CREATE TABLE `user_accounts` (
  `Account_ID` varchar(7) NOT NULL,
  `acc_type` varchar(7) NOT NULL DEFAULT 'student',
  `user_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `strand` varchar(10) NOT NULL DEFAULT 'FACULTY'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_accounts`
--

INSERT INTO `user_accounts` (`Account_ID`, `acc_type`, `user_name`, `password`, `full_name`, `strand`) VALUES
('ST_0000', 'student', 'placeholder', 'password123', 'FirstName M.I LastName', 'GHOST'),
('ST_0001', 'student', 'Gabriel', 'password123', 'Gabriel Luis R. Luna', 'STEM'),
('ST_0002', 'student', 'Mark', 'password123', 'Mark Aldrin B. Acebo', 'STEM'),
('ST_0003', 'student', 'Renz', 'password123', 'Renzperi D. Inandan', 'STEM'),
('ST_0004', 'student', 'hans', 'password123', 'Hans Rafael B. Acosta', 'STEM'),
('ST_0005', 'student', 'John', 'password123', 'John Philip Nunez', 'ABM'),
('ST_0006', 'student', 'Angelo', 'password123', 'Mark Angelo D. Pobocan', 'ABM'),
('ST_0007', 'student', 'Gab', 'password123', 'John Gabriel Trasporto', 'ABM'),
('ST_0008', 'student', 'Carl', 'password123', 'Carl Jonel Hawak', 'ABM'),
('ST_0009', 'student', 'Jhoen', 'password123', 'Jhoen Guerra', 'HUMSS'),
('ST_0010', 'student', 'RV', 'password123', 'Rv Bryan De Chavez', 'HUMSS'),
('ST_0011', 'student', 'charlie', 'password123', 'Charlie Alcazar', 'HUMSS'),
('ST_0012', 'student', 'Aljericko', 'password123', 'Aljericko Castillo', 'HUMSS'),
('TR_0001', 'teacher', 'CJ', 'password123', 'Chris Jerald G. Maralit', 'FACULTY'),
('TR_0002', 'teacher', 'Alvin', 'password123', 'Alvin Ward', 'FACULTY'),
('TR_0003', 'teacher', 'Ann', 'password123', 'Ann Moran', 'FACULTY');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_accounts`
--
ALTER TABLE `admin_accounts`
  ADD PRIMARY KEY (`Admin_ID`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- Indexes for table `archive_user_accounts`
--
ALTER TABLE `archive_user_accounts`
  ADD PRIMARY KEY (`Account_ID`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- Indexes for table `st_0001_reportcard`
--
ALTER TABLE `st_0001_reportcard`
  ADD PRIMARY KEY (`Subject_ID`);

--
-- Indexes for table `st_0002_reportcard`
--
ALTER TABLE `st_0002_reportcard`
  ADD PRIMARY KEY (`Subject_ID`);

--
-- Indexes for table `st_0003_reportcard`
--
ALTER TABLE `st_0003_reportcard`
  ADD PRIMARY KEY (`Subject_ID`);

--
-- Indexes for table `st_0004_reportcard`
--
ALTER TABLE `st_0004_reportcard`
  ADD PRIMARY KEY (`Subject_ID`);

--
-- Indexes for table `st_0005_reportcard`
--
ALTER TABLE `st_0005_reportcard`
  ADD PRIMARY KEY (`Subject_ID`);

--
-- Indexes for table `st_0006_reportcard`
--
ALTER TABLE `st_0006_reportcard`
  ADD PRIMARY KEY (`Subject_ID`);

--
-- Indexes for table `st_0007_reportcard`
--
ALTER TABLE `st_0007_reportcard`
  ADD PRIMARY KEY (`Subject_ID`);

--
-- Indexes for table `st_0008_reportcard`
--
ALTER TABLE `st_0008_reportcard`
  ADD PRIMARY KEY (`Subject_ID`);

--
-- Indexes for table `st_0009_reportcard`
--
ALTER TABLE `st_0009_reportcard`
  ADD PRIMARY KEY (`Subject_ID`);

--
-- Indexes for table `st_0010_reportcard`
--
ALTER TABLE `st_0010_reportcard`
  ADD PRIMARY KEY (`Subject_ID`);

--
-- Indexes for table `st_0011_reportcard`
--
ALTER TABLE `st_0011_reportcard`
  ADD PRIMARY KEY (`Subject_ID`);

--
-- Indexes for table `st_0012_reportcard`
--
ALTER TABLE `st_0012_reportcard`
  ADD PRIMARY KEY (`Subject_ID`);

--
-- Indexes for table `subjects_table`
--
ALTER TABLE `subjects_table`
  ADD PRIMARY KEY (`Subject_ID`),
  ADD UNIQUE KEY `subject_name` (`subject_name`);

--
-- Indexes for table `user_accounts`
--
ALTER TABLE `user_accounts`
  ADD PRIMARY KEY (`Account_ID`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `st_0001_reportcard`
--
ALTER TABLE `st_0001_reportcard`
  ADD CONSTRAINT `st_0001_reportcard_ibfk_1` FOREIGN KEY (`Subject_ID`) REFERENCES `subjects_table` (`Subject_ID`);

--
-- Constraints for table `st_0002_reportcard`
--
ALTER TABLE `st_0002_reportcard`
  ADD CONSTRAINT `st_0002_reportcard_ibfk_1` FOREIGN KEY (`Subject_ID`) REFERENCES `subjects_table` (`Subject_ID`);

--
-- Constraints for table `st_0003_reportcard`
--
ALTER TABLE `st_0003_reportcard`
  ADD CONSTRAINT `st_0003_reportcard_ibfk_1` FOREIGN KEY (`Subject_ID`) REFERENCES `subjects_table` (`Subject_ID`);

--
-- Constraints for table `st_0004_reportcard`
--
ALTER TABLE `st_0004_reportcard`
  ADD CONSTRAINT `st_0004_reportcard_ibfk_1` FOREIGN KEY (`Subject_ID`) REFERENCES `subjects_table` (`Subject_ID`);

--
-- Constraints for table `st_0005_reportcard`
--
ALTER TABLE `st_0005_reportcard`
  ADD CONSTRAINT `st_0005_reportcard_ibfk_1` FOREIGN KEY (`Subject_ID`) REFERENCES `subjects_table` (`Subject_ID`);

--
-- Constraints for table `st_0006_reportcard`
--
ALTER TABLE `st_0006_reportcard`
  ADD CONSTRAINT `st_0006_reportcard_ibfk_1` FOREIGN KEY (`Subject_ID`) REFERENCES `subjects_table` (`Subject_ID`);

--
-- Constraints for table `st_0007_reportcard`
--
ALTER TABLE `st_0007_reportcard`
  ADD CONSTRAINT `st_0007_reportcard_ibfk_1` FOREIGN KEY (`Subject_ID`) REFERENCES `subjects_table` (`Subject_ID`);

--
-- Constraints for table `st_0008_reportcard`
--
ALTER TABLE `st_0008_reportcard`
  ADD CONSTRAINT `st_0008_reportcard_ibfk_1` FOREIGN KEY (`Subject_ID`) REFERENCES `subjects_table` (`Subject_ID`);

--
-- Constraints for table `st_0009_reportcard`
--
ALTER TABLE `st_0009_reportcard`
  ADD CONSTRAINT `st_0009_reportcard_ibfk_1` FOREIGN KEY (`Subject_ID`) REFERENCES `subjects_table` (`Subject_ID`);

--
-- Constraints for table `st_0010_reportcard`
--
ALTER TABLE `st_0010_reportcard`
  ADD CONSTRAINT `st_0010_reportcard_ibfk_1` FOREIGN KEY (`Subject_ID`) REFERENCES `subjects_table` (`Subject_ID`);

--
-- Constraints for table `st_0011_reportcard`
--
ALTER TABLE `st_0011_reportcard`
  ADD CONSTRAINT `st_0011_reportcard_ibfk_1` FOREIGN KEY (`Subject_ID`) REFERENCES `subjects_table` (`Subject_ID`);

--
-- Constraints for table `st_0012_reportcard`
--
ALTER TABLE `st_0012_reportcard`
  ADD CONSTRAINT `st_0012_reportcard_ibfk_1` FOREIGN KEY (`Subject_ID`) REFERENCES `subjects_table` (`Subject_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
