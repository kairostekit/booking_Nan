-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2023 at 10:53 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `slip`
--

CREATE TABLE `slip` (
  `slip_id` int(11) NOT NULL,
  `slip_path` text COLLATE utf8_unicode_ci NOT NULL,
  `book_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `slip`
--

INSERT INTO `slip` (`slip_id`, `slip_path`, `book_id`) VALUES
(1, 'asset/images/slip/dragon.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_book`
--

CREATE TABLE `tb_book` (
  `book_id` int(11) NOT NULL,
  `book_in` date NOT NULL,
  `book_out` date NOT NULL,
  `book_man` int(2) NOT NULL,
  `book_child` int(2) NOT NULL,
  `book_total` int(2) NOT NULL,
  `book_status` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_book`
--

INSERT INTO `tb_book` (`book_id`, `book_in`, `book_out`, `book_man`, `book_child`, `book_total`, `book_status`, `user_id`, `room_id`) VALUES
(1, '2023-10-20', '2023-10-21', 2, 1, 3, '1', 2, 1),
(2, '2023-10-20', '2023-10-21', 2, 1, 2, '0', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_book_detail`
--

CREATE TABLE `tb_book_detail` (
  `book_detail_id` int(11) NOT NULL,
  `book_detail_personal` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `book_detail_name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `book_detail_mail` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `book_detail_tel` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `book_detail_address` text COLLATE utf8_unicode_ci NOT NULL,
  `book_detail_region` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `book_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_book_detail`
--

INSERT INTO `tb_book_detail` (`book_detail_id`, `book_detail_personal`, `book_detail_name`, `book_detail_mail`, `book_detail_tel`, `book_detail_address`, `book_detail_region`, `book_id`) VALUES
(1, '2147483647', 'Naruto Uzumaki', 'naru@gmail.com', '987654321', '1 ม.1', 'ไทย', 1),
(2, '120889818886', 'Naruto Uzumaki', 'naru@gmail.com', '0987654321', '1 ม.1', 'ไทย', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_room`
--

CREATE TABLE `tb_room` (
  `room_id` int(11) NOT NULL,
  `room_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `room_type` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `room_price` int(4) NOT NULL,
  `room_sale` int(2) DEFAULT NULL,
  `room_total` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_room`
--

INSERT INTO `tb_room` (`room_id`, `room_name`, `room_type`, `room_price`, `room_sale`, `room_total`) VALUES
(1, 'Single Bed เตียงเดี่ยว', '1', 400, NULL, 10),
(2, 'Twin Bed เตียงแฝด', '2', 800, 20, 10);

-- --------------------------------------------------------

--
-- Table structure for table `tb_room_img`
--

CREATE TABLE `tb_room_img` (
  `room_img_id` int(11) NOT NULL,
  `room_img_path` text COLLATE utf8_unicode_ci NOT NULL,
  `room_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_room_img`
--

INSERT INTO `tb_room_img` (`room_img_id`, `room_img_path`, `room_id`) VALUES
(1, 'room/single1.jpg', 1),
(2, 'room/single2.jpg', 1),
(3, 'room/single3.jpg', 1),
(4, 'room/single4.jpg', 1),
(5, 'room/twin1.jpg', 2),
(6, 'room/twin2.jpg', 2),
(7, 'room/twin3.jpg', 2),
(8, 'room/twin4.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `user_id` int(11) NOT NULL,
  `user_uname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_pass` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `user_mail` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_tel` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `user_gender` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_birth` date DEFAULT NULL,
  `user_region` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_address` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_personalid` varchar(13) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_type` char(1) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `user_uname`, `user_pass`, `user_name`, `user_mail`, `user_tel`, `user_gender`, `user_birth`, `user_region`, `user_address`, `user_personalid`, `user_type`) VALUES
(1, 'admin', '1234', 'admin', 'admin@gmail.com', '0988888888', NULL, NULL, NULL, NULL, NULL, '1'),
(2, 'user01', '1234', 'Naruto Uzumaki', 'naru@gmail.com', '0987654321', 'ชาย', '2000-10-10', 'ไทย', '1 ม.1', '1304395613882', '2'),
(3, 'user02', '1234', 'Sasuke Uchiha', 'sdf@gmail.com', '0935079706', NULL, NULL, NULL, NULL, NULL, '2'),
(4, 'user03', '1234', 'Kakashi Hatake', 'sdf@gmail.com', '0986351724', NULL, NULL, NULL, NULL, NULL, '2'),
(5, 'user04', '1234', 'Sakura Haruno', 'sdf@gmail.com', '0987654321', NULL, NULL, NULL, NULL, NULL, '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `slip`
--
ALTER TABLE `slip`
  ADD PRIMARY KEY (`slip_id`);

--
-- Indexes for table `tb_book`
--
ALTER TABLE `tb_book`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `tb_book_detail`
--
ALTER TABLE `tb_book_detail`
  ADD PRIMARY KEY (`book_detail_id`);

--
-- Indexes for table `tb_room`
--
ALTER TABLE `tb_room`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `tb_room_img`
--
ALTER TABLE `tb_room_img`
  ADD PRIMARY KEY (`room_img_id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `slip`
--
ALTER TABLE `slip`
  MODIFY `slip_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_book`
--
ALTER TABLE `tb_book`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_book_detail`
--
ALTER TABLE `tb_book_detail`
  MODIFY `book_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_room`
--
ALTER TABLE `tb_room`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_room_img`
--
ALTER TABLE `tb_room_img`
  MODIFY `room_img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
