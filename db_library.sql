-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Feb 13, 2024 at 03:39 AM
-- Server version: 5.7.39
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_library`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_book`
--

CREATE TABLE `tb_book` (
  `b_id` varchar(6) NOT NULL,
  `b_name` varchar(60) NOT NULL,
  `b_writer` text,
  `b_category` int(2) NOT NULL,
  `b_price` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_book`
--

INSERT INTO `tb_book` (`b_id`, `b_name`, `b_writer`, `b_category`, `b_price`) VALUES
('B00001', 'คู่มือการสอบรับราชการ', 'สมศักดิ์ ตั้งใจ', 1, 299),
('B00002', 'แฮร์รี่ พอตเตอร์', 'J.K. Rowling', 2, 359),
('B00003', 'เย็บ ปัก ถักร้อย', 'สะอาด อิ่มสุข', 3, 249),
('B00004', 'เจ้าชายน้อย', 'อ็องตวน เดอ แซ็ง', 2, 355),
('B00005', 'การเขียนโปรแกรมคอมพิวเตอร์', 'กิ่งแก้ว กลิ่นหอม', 1, 329);

-- --------------------------------------------------------

--
-- Table structure for table `tb_borrow_book`
--

CREATE TABLE `tb_borrow_book` (
  `id` int(7) NOT NULL,
  `br_date_br` date NOT NULL,
  `br_date_rt` date DEFAULT NULL,
  `b_id` varchar(6) NOT NULL,
  `m_user` text NOT NULL,
  `br_fine` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_borrow_book`
--

INSERT INTO `tb_borrow_book` (`id`, `br_date_br`, `br_date_rt`, `b_id`, `m_user`, `br_fine`) VALUES
(1, '2021-08-28', '2021-08-28', 'B00002', 'member03', 25),
(2, '2021-08-28', '2021-08-22', 'B00001', 'member02', 0),
(3, '2021-08-28', '2021-08-26', 'B00001', 'member02', 5),
(4, '2021-08-28', NULL, 'B00003', 'member01', 0),
(5, '2021-08-28', '2024-02-13', 'B00004', 'member05', 600),
(8, '2024-02-12', '2024-02-13', 'B00005', 'member02', 30),
(9, '2024-02-13', '2024-02-13', 'B00001', 'member05', 0),
(10, '2024-02-13', '2024-02-13', 'B00002', 'member01', 9000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_member`
--

CREATE TABLE `tb_member` (
  `m_user` text NOT NULL,
  `m_pass` text NOT NULL,
  `m_name` text NOT NULL,
  `m_phone` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_member`
--

INSERT INTO `tb_member` (`m_user`, `m_pass`, `m_name`, `m_phone`) VALUES
('member01', 'abc1111', 'สมหญิง จริงใจ', '0811111111'),
('member02', 'abc2222', 'สมชาย มั่นคง', '0822222222'),
('member03', 'abc3333', 'สมเกียรติ เก่งกล้า', '0833333333'),
('member04', 'abc4444', 'สมสมร อิ่มเอม', '0844444444'),
('member05', 'abc5555', 'สมรักษ์ สะอาด', '0855555555');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_book`
--
ALTER TABLE `tb_book`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `tb_borrow_book`
--
ALTER TABLE `tb_borrow_book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_member`
--
ALTER TABLE `tb_member`
  ADD PRIMARY KEY (`m_user`(40));

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_borrow_book`
--
ALTER TABLE `tb_borrow_book`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
