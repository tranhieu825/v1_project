-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2021 at 06:24 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `v2`
--

-- --------------------------------------------------------

--
-- Table structure for table `bangdanhgia`
--

CREATE TABLE `bangdanhgia` (
  `id` int(10) NOT NULL,
  `ten_bang` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tieu_chuan` int(10) NOT NULL,
  `tieu_chi` int(10) NOT NULL,
  `dot_danhgia` int(10) NOT NULL,
  `phong_ban` int(10) NOT NULL,
  `diem` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(10) NOT NULL,
  `position` int(11) NOT NULL,
  `phong_ban` int(10) NOT NULL,
  `diem` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`, `position`, `phong_ban`, `diem`) VALUES
(1, 'Tiêu chuẩn 1', 0, 2, 123, 20),
(2, 'Tiêu chí 001', 3, 1, 123, 0),
(3, 'Tiêu chuẩn 2', 0, 1, 123, 16),
(4, 'Tiêu chí 002', 1, 1, 123, 0),
(5, 'Tiêu chí 004', 1, 3, 123, 0),
(6, 'Tiêu chí 005', 2, 5, 123, 0),
(7, 'Tiêu chuẩn 1', 0, 1, 124, 20),
(8, 'Tiêu chuẩn 2', 0, 2, 124, 12),
(9, 'Tiêu chí 0012', 7, 1, 124, 0),
(10, 'Tiêu chí 0014', 7, 3, 124, 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chucvu`
--

CREATE TABLE `chucvu` (
  `id` int(10) NOT NULL,
  `ma_cv` int(10) NOT NULL,
  `ten_cv` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chucvu`
--

INSERT INTO `chucvu` (`id`, `ma_cv`, `ten_cv`) VALUES
(1, 2, 'Employee'),
(2, 1, 'Trưởng phòng');

-- --------------------------------------------------------

--
-- Table structure for table `dotdanhgia`
--

CREATE TABLE `dotdanhgia` (
  `id` int(10) NOT NULL,
  `ma_dot` int(10) NOT NULL,
  `ten_dot` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_dot` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ketqua`
--

CREATE TABLE `ketqua` (
  `id` int(10) NOT NULL,
  `ma_user` int(10) NOT NULL,
  `code_reviewer` int(10) NOT NULL,
  `date_review` date DEFAULT NULL,
  `diem_employee` int(10) NOT NULL,
  `diem_ndg` int(10) DEFAULT NULL,
  `diem_tong` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ketqua`
--

INSERT INTO `ketqua` (`id`, `ma_user`, `code_reviewer`, `date_review`, `diem_employee`, `diem_ndg`, `diem_tong`) VALUES
(22, 3, 0, NULL, 40, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nguoidanhgia`
--

CREATE TABLE `nguoidanhgia` (
  `user` int(10) NOT NULL,
  `phong_ban` int(10) NOT NULL,
  `ten_user` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nguoidanhgia`
--

INSERT INTO `nguoidanhgia` (`user`, `phong_ban`, `ten_user`) VALUES
(2, 123, 'Đánh giá 1'),
(2, 123, 'Đánh giá 2'),
(1, 124, 'Trưởng phòng');

-- --------------------------------------------------------

--
-- Table structure for table `phongban`
--

CREATE TABLE `phongban` (
  `id` int(10) NOT NULL,
  `ma_pb` int(10) NOT NULL,
  `ten_pb` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tieuchi`
--

CREATE TABLE `tieuchi` (
  `id` int(10) NOT NULL,
  `ten_tchi` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stt` int(10) NOT NULL,
  `ma_tc` int(10) NOT NULL,
  `diem` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tieuchi`
--

INSERT INTO `tieuchi` (`id`, `ten_tchi`, `stt`, `ma_tc`, `diem`) VALUES
(1, 'Tiêu chí 001', 1, 5, 2),
(2, 'Tiêu chí 002', 2, 6, 3),
(3, 'Tiêu chí 006', 2, 5, 3),
(4, 'Tiêu chí 007', 1, 6, 4),
(5, 'Tiêu chuẩn 1', 2, 0, 3),
(6, 'Tiêu chuẩn 2', 3, 0, 9);

-- --------------------------------------------------------

--
-- Table structure for table `tieuchuan`
--

CREATE TABLE `tieuchuan` (
  `id` int(10) NOT NULL,
  `ma_tc` int(10) NOT NULL,
  `ten_tc` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stt` int(10) NOT NULL,
  `diem` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tieuchuan`
--

INSERT INTO `tieuchuan` (`id`, `ma_tc`, `ten_tc`, `stt`, `diem`) VALUES
(1, 1, 'Tiêu chuẩn 1', 2, 7),
(2, 2, 'Tiêu chuẩn 2', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `email` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ma_user` int(10) NOT NULL,
  `role` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ho_ten` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngay_sinh` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dia_chi` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt` int(11) NOT NULL,
  `ma_cv` int(10) NOT NULL,
  `ma_pb` int(10) NOT NULL,
  `ki_nang` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nodes` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_at` date NOT NULL,
  `update_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `ma_user`, `role`, `ho_ten`, `ngay_sinh`, `dia_chi`, `sdt`, `ma_cv`, `ma_pb`, `ki_nang`, `nodes`, `create_at`, `update_at`) VALUES
(1, 'tranhieu@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 'employee', 'Trần Trọng Hiếu', '29/07/1999', 'Đồng Nai', 24234334, 2, 123, NULL, NULL, '2021-05-06', NULL),
(2, 'danhgia1@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 2, 'user_danhgia', 'Đánh giá 1', '23/02/1223', 'Lâm Đồng', 2121421, 2, 123, NULL, NULL, '2021-05-06', NULL),
(3, 'danhgia2@gmail.com', '214324', 5, 'user_danhgia', 'Đánh giá 2', '34/09/24324', 'Hà nội', 234353, 23, 34, NULL, NULL, '2021-05-08', NULL),
(4, 'huynguyen@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 3, 'employee', 'HUY NGUYEN', '27/03/1999', 'Hồ Chí Minh', 352533825, 2, 124, 'PHP LARAVEL JAVA', 'Tôi là người yêu thích công việc lập trình viên', '2021-05-06', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bangdanhgia`
--
ALTER TABLE `bangdanhgia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chucvu`
--
ALTER TABLE `chucvu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dotdanhgia`
--
ALTER TABLE `dotdanhgia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ketqua`
--
ALTER TABLE `ketqua`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phongban`
--
ALTER TABLE `phongban`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tieuchi`
--
ALTER TABLE `tieuchi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tieuchuan`
--
ALTER TABLE `tieuchuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bangdanhgia`
--
ALTER TABLE `bangdanhgia`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chucvu`
--
ALTER TABLE `chucvu`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dotdanhgia`
--
ALTER TABLE `dotdanhgia`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ketqua`
--
ALTER TABLE `ketqua`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `phongban`
--
ALTER TABLE `phongban`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tieuchi`
--
ALTER TABLE `tieuchi`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tieuchuan`
--
ALTER TABLE `tieuchuan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
