-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 03, 2023 lúc 11:28 AM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `tnk_laravel`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `number_car` varchar(255) NOT NULL,
  `type_car_id` int(11) NOT NULL,
  `label_car_id` int(11) DEFAULT NULL,
  `number_type_car_id` int(11) DEFAULT NULL,
  `dvvc_id` int(11) NOT NULL,
  `romooc_id` int(11) DEFAULT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `sub_driver_id` int(11) DEFAULT NULL,
  `type_list_id` int(11) DEFAULT NULL,
  `wheel_structure_id` int(11) NOT NULL,
  `fuel_id` int(11) NOT NULL,
  `car_pump` varchar(50) DEFAULT NULL,
  `year_of_manufacture` varchar(4) DEFAULT NULL,
  `fuel_norms` varchar(255) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1:Đang sử dung\r\n0: Ngưng sử dụng',
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `spare_tire` varchar(255) NOT NULL,
  `info_car` text DEFAULT NULL,
  `note` text DEFAULT NULL,
  `inventory` text DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `cars`
--

INSERT INTO `cars` (`id`, `number_car`, `type_car_id`, `label_car_id`, `number_type_car_id`, `dvvc_id`, `romooc_id`, `driver_id`, `sub_driver_id`, `type_list_id`, `wheel_structure_id`, `fuel_id`, `car_pump`, `year_of_manufacture`, `fuel_norms`, `status`, `start_date`, `end_date`, `spare_tire`, `info_car`, `note`, `inventory`, `created_at`, `updated_at`) VALUES
(1, '001', 1, 1, 1, 17, 1, 1, 1, 1, 1, 1, 'có', '1999', '17 lit', 0, NULL, '2023-09-30', 'không dùng', '1', '1', '1', '2023-09-29 00:00:00', NULL),
(2, '002', 2, 2, 2, 40, 2, 2, 2, 2, 2, 3, 'có', '2000', '19 lít', 0, '2023-09-29', '2023-10-04', 'không dùng', NULL, NULL, NULL, '2023-09-29 00:00:00', '2023-10-02 17:00:00'),
(7, '003', 3, 2, 1, 17, NULL, 3, 2, 2, 4, 1, 'không', '2000', '0', 1, '2023-09-28', NULL, 'không dùng', NULL, NULL, NULL, '2023-09-29 07:39:34', NULL),
(8, '004', 4, NULL, NULL, 22, NULL, NULL, NULL, NULL, 4, 4, 'có', NULL, '0', 1, '2023-09-30', NULL, 'không dùng', NULL, NULL, NULL, '2023-09-29 08:30:51', NULL),
(9, '005', 4, NULL, NULL, 17, NULL, NULL, NULL, NULL, 3, 4, NULL, NULL, '0', 1, NULL, NULL, 'không dùng', NULL, NULL, NULL, '2023-09-29 08:34:47', NULL),
(10, '006', 1, 1, 1, 17, 1, 1, 1, 1, 1, 1, 'có', '1999', '17 lit', 0, NULL, NULL, 'không dùng', '1', '1', '1', '2023-09-29 00:00:00', NULL),
(11, '007', 2, 2, 2, 40, 2, 2, 2, 2, 2, 3, 'có', '2000', '19 lít', 1, '2023-09-29', NULL, 'dùng', NULL, NULL, NULL, '2023-09-29 00:00:00', NULL),
(12, '008', 3, 2, 1, 17, NULL, 3, 2, 2, 4, 1, 'không', '2000', '0', 1, '2023-09-28', NULL, 'không dùng', NULL, NULL, NULL, '2023-09-29 07:39:34', NULL),
(13, '009', 4, NULL, NULL, 22, NULL, NULL, NULL, NULL, 4, 4, 'có', NULL, '0', 1, '2023-09-30', NULL, 'không dùng', NULL, NULL, NULL, '2023-09-29 08:30:51', NULL),
(15, '0010', 1, 1, 1, 17, 1, 1, 1, 1, 1, 1, 'có', '1999', '17 lit', 0, NULL, NULL, 'không dùng', '1', '1', '1', '2023-09-29 00:00:00', NULL),
(16, '0011', 2, 2, 2, 40, 2, 2, 2, 2, 2, 3, 'có', '2000', '19 lít', 1, '2023-09-29', NULL, 'dùng', NULL, NULL, NULL, '2023-09-29 00:00:00', NULL),
(17, '0012', 3, 2, 1, 17, NULL, 3, 2, 2, 4, 1, 'không', '2000', '0', 1, '2023-09-28', NULL, 'không dùng', NULL, NULL, NULL, '2023-09-29 07:39:34', NULL),
(18, '0013', 4, NULL, NULL, 22, NULL, NULL, NULL, NULL, 4, 4, 'có', NULL, '0', 1, '2023-09-30', NULL, 'không dùng', NULL, NULL, NULL, '2023-09-29 08:30:51', NULL),
(19, '0014', 4, NULL, NULL, 17, NULL, NULL, NULL, NULL, 3, 4, NULL, NULL, '0', 1, NULL, NULL, 'không dùng', NULL, NULL, NULL, '2023-09-29 08:34:47', NULL),
(20, '0015', 1, 1, 1, 17, 1, 1, 1, 1, 1, 1, 'có', '1999', '17 lit', 0, NULL, NULL, 'không dùng', '1', '1', '1', '2023-09-29 00:00:00', NULL),
(21, '0016', 1, 1, 1, 17, 1, 1, 1, 1, 1, 1, 'có', '1999', '17 lit', 0, NULL, NULL, 'không dùng', '1', '1', '1', '2023-09-29 00:00:00', NULL),
(22, '0017', 1, 1, 1, 17, 1, 1, 1, 1, 1, 1, 'có', '1999', '17 lit', 0, NULL, NULL, 'không dùng', '1', '1', '1', '2023-09-29 00:00:00', NULL),
(23, '0018', 2, 2, 2, 40, 2, 2, 2, 2, 2, 3, 'có', '2000', '19 lít', 1, '2023-09-29', NULL, 'dùng', NULL, NULL, NULL, '2023-09-29 00:00:00', NULL),
(24, '0019', 3, 2, 1, 17, NULL, 3, 2, 2, 4, 1, 'không', '2000', '0', 1, '2023-09-28', NULL, 'không dùng', NULL, NULL, NULL, '2023-09-29 07:39:34', NULL),
(26, '0021', 4, NULL, NULL, 17, NULL, NULL, NULL, NULL, 3, 4, NULL, NULL, '0', 1, NULL, NULL, 'không dùng', NULL, NULL, NULL, '2023-09-29 08:34:47', NULL),
(30, '023', 1, NULL, NULL, 17, NULL, NULL, NULL, NULL, 3, 4, NULL, NULL, '0', 1, '2023-09-21', NULL, 'không dùng', NULL, NULL, NULL, '2023-09-29 09:45:02', '2023-09-28 17:00:00'),
(31, 'DC-0001', 1, 1, 1, 37, 1, 1, 1, NULL, 1, 3, NULL, NULL, '0', 0, NULL, '2023-10-31', 'không dùng', NULL, NULL, NULL, '2023-10-03 02:36:41', '2023-10-02 17:00:00'),
(32, 'DC-0002', 1, NULL, NULL, 17, NULL, NULL, NULL, NULL, 2, 3, NULL, NULL, '0100', 1, NULL, NULL, 'không dùng', NULL, NULL, NULL, '2023-10-03 02:40:18', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `driver`
--

CREATE TABLE `driver` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `driver`
--

INSERT INTO `driver` (`id`, `name`) VALUES
(1, 'Tài xế 1'),
(2, 'Tài xế 2'),
(3, 'Tài xế 3'),
(4, 'Tài xế 4');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dvvc`
--

CREATE TABLE `dvvc` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `taxcode` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT 'status:1 Còn hợp tác\r\nstatus:0 Ngưng hợp tác',
  `stopdate` date DEFAULT NULL,
  `bankaccount` varchar(255) DEFAULT NULL,
  `accountnumber` varchar(30) DEFAULT NULL,
  `branch` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `version` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `dvvc`
--

INSERT INTO `dvvc` (`id`, `user_id`, `name`, `alias`, `phone`, `taxcode`, `status`, `stopdate`, `bankaccount`, `accountnumber`, `branch`, `address`, `contact`, `note`, `version`, `created_at`, `updated_at`) VALUES
(17, 1, 'Công ty toyota', 'TYT', '0584228904', '0321019787', 1, NULL, NULL, '2', '2', 'Số 39 đường 204 cao lỗ,phường 4,quận 8', '2', '2', 2, '2023-09-22 00:00:00', '2023-09-27 00:00:00'),
(22, 2, 'Công ty TNK', 'TNK', '0584228904', '0321019787', 1, NULL, 'MB bank', '1111111', 'TP', 'Số 39 đường 204 cao lỗ,phường 4,quận 8', 'Lũy bán bích', 'Oke', 1, '2023-09-27 00:00:00', NULL),
(37, 1, 'Công ty Lampart', 'LP', '0584228904', '0321019787', 1, NULL, 'MB Bank', '0000905627984', 'TP', NULL, NULL, NULL, 2, '2023-09-27 00:00:00', '2023-09-27 01:42:10'),
(40, 1, 'Công ty FFF', 'FFF', '0584228904', '0321019787', 0, '2023-09-29', 'ViettinBank', '34214234', 'ViettinBank', NULL, 'Đvvc FFF', NULL, 3, '2023-09-27 00:00:00', NULL),
(43, 1, 'Công ty BBB', 'BBB', '0584228904', '0321019787', 0, '2023-09-27', 'ViettinBank', '0128383883', 'ViettinBank', NULL, NULL, NULL, 3, '2023-09-27 00:00:00', NULL),
(44, 1, 'Công ty AAA', 'AAA', '0584228904', '0321019787', 0, '2023-09-28', 'Viettel', '010233', 'Vietttel', NULL, NULL, NULL, 4, '2023-09-24 00:00:00', NULL),
(46, 1, 'Công ty BBBC', 'BBB', '0584228904', '0321019787', 0, '2023-09-21', NULL, NULL, 'ACB', 'Số 39 đường 204 cao lỗ,phường 4,quận 8', NULL, NULL, 13, '2023-09-23 00:00:00', NULL),
(73, 1, 'ĐVVC 02', 'ĐVVC 02', '0523872880', '0107321214', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2023-09-27 00:00:00', NULL),
(76, 1, 'ĐVVC 02', 'ĐVVC02', '0523872880', '0107321214', 0, '2023-09-23', 'ACB', '12345678', 'ACB', NULL, NULL, NULL, 5, '2023-09-27 00:00:00', NULL),
(77, 1, 'ĐVVC 04', 'ĐVVC 04', NULL, NULL, 1, NULL, NULL, NULL, NULL, 'abc trần phú', 'Thông tin liên hệ 1', 'Ghi chú 1', 1, '2023-09-27 00:00:00', NULL),
(78, 1, 'ĐVVC 05', 'ĐVVC 05', NULL, NULL, 1, NULL, NULL, NULL, NULL, '180 cao lỗ', NULL, NULL, 3, '2023-09-27 00:00:00', NULL),
(79, 1, 'ĐVVC 06', 'ĐVVC06', NULL, NULL, 1, NULL, 'Tên tài khoản ngân hàng 6', 'Số tài khoản 6', NULL, NULL, NULL, NULL, 1, '2023-09-27 00:00:00', NULL),
(80, 1, 'ĐVVC 07', 'ĐVVC07', NULL, '0107321217', 1, NULL, NULL, 'Số tài khoản 7', NULL, NULL, NULL, NULL, 1, '2023-09-27 00:00:00', NULL),
(81, 1, 'ĐVVC 08', 'ĐVVC08', NULL, NULL, 0, '2023-09-01', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2023-09-27 00:00:00', NULL),
(82, 1, 'ĐVVC 09', 'ĐVVC09', '0523872889', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2023-09-27 00:00:00', NULL),
(83, 1, 'ĐVVC 10-v1', 'ĐVVC10', '0972604010', '0107321210', 0, '2023-09-01', NULL, '12345610', NULL, NULL, NULL, NULL, 3, '2023-09-27 00:00:00', NULL),
(84, 1, 'ĐVVC 11', 'ĐVVC11', '0523872811', NULL, 1, NULL, 'MB Bank', NULL, NULL, NULL, 'Thông tin liên hệ 11', NULL, 4, '2023-09-27 00:00:00', NULL),
(85, 1, 'ĐVVC 12', 'ĐVVC12', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2023-09-27 00:00:00', NULL),
(86, 1, 'ĐVVC 13', 'ĐVVC13', NULL, NULL, 1, NULL, 'ĐVVC 13', NULL, NULL, NULL, NULL, NULL, 3, '2023-09-27 00:00:00', NULL),
(87, 1, 'ĐVVC 14', 'ĐVVC14', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2023-09-27 00:00:00', NULL),
(88, 2, 'ĐVVC 15', 'ĐVVC15', NULL, NULL, 1, NULL, NULL, NULL, NULL, 'Địa chỉ', NULL, NULL, 2, '2023-09-27 00:00:00', '2023-09-27 00:00:00'),
(108, 1, '2', '2', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2023-09-27 00:00:00', NULL),
(109, 1, 'Công ty DDD', 'DDD', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2023-09-27 00:00:00', NULL),
(110, 1, '1-v1', '1', NULL, NULL, 1, NULL, 'ViettinBank', '123456789', 'ViettinBank', NULL, NULL, 'note ghi chú', 38, '2023-09-27 00:00:00', '2023-09-28 00:00:00'),
(111, 1, '3', '3', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2023-09-27 00:00:00', NULL),
(112, 1, 'Công ty ABC', 'ABC', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2023-09-27 00:00:00', NULL),
(113, 1, 'ĐVVC 17', 'ĐVVC17', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2023-09-27 00:00:00', NULL),
(114, 2, 'ĐVVC 18-v2', 'ĐVVC18', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, '2023-09-27 00:00:00', '2023-09-27 00:00:00'),
(115, 1, 'ĐVVC 19', 'ĐVVC19', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'um', 1, '2023-09-27 00:00:00', NULL),
(116, 1, 'ĐVVC 20', 'ĐVVC20', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2023-09-27 00:00:00', NULL),
(117, 1, 'ĐVVC 21', 'ĐVVC21', NULL, NULL, 1, NULL, NULL, NULL, NULL, 'ĐVVC 21', NULL, NULL, 2, '2023-09-27 00:00:00', '2023-09-27 00:00:00'),
(118, 1, 'ĐVVC 23-v11', 'ĐVVC23', '0123456789', '0107321210', 0, '2023-09-01', 'Viettin bank', '123', 'Viettin bank', '135-137', 'Thông tin liên hệ 22', 'Ghi chú 22', 8, '2023-09-27 00:00:00', NULL),
(119, 1, 'DVVC 24', 'DVVC24', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2023-09-27 00:00:00', NULL),
(120, 1, '4', '4', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2023-09-27 00:00:00', NULL),
(121, 2, 'ĐVVC 25-v2', 'ĐVVC25', NULL, NULL, 1, NULL, 'ACB', '11111', NULL, NULL, NULL, NULL, 33, '2023-09-27 00:00:00', '2023-09-27 07:44:48'),
(122, 1, 'ĐVVC 26-v1', 'ĐVVC26', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, '2023-09-27 00:00:00', NULL),
(123, 1, 'DVVC 27', 'DVVC27', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2023-09-27 00:00:00', NULL),
(124, 1, 'DVVC 28', 'DVVC28', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2023-09-27 00:00:00', '2023-09-27 01:47:10'),
(125, 1, 'DVVC 29', 'DVVC29', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2023-09-27 00:00:00', NULL),
(126, 1, 'DVVC 30', 'DVVC30', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2023-09-27 00:00:00', NULL),
(127, 1, 'DVVC 31', 'DVVC31', '0972604010', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, '2023-09-27 00:00:00', '2023-09-27 00:00:00'),
(128, 1, 'DVVC 32', 'DVVC32', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2023-09-27 00:00:00', NULL),
(129, 2, '11', '11', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2023-09-27 00:00:00', '2023-09-28 00:00:00'),
(130, 1, '5', '5', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2023-09-22 00:00:00', NULL),
(131, 1, '6', '6', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2023-09-27 00:00:00', NULL),
(132, 1, '7', '7', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2023-09-27 00:00:00', NULL),
(133, 1, 'ĐVVC 27', 'ĐVVC27', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, '2023-09-26 00:00:00', '2023-09-27 00:00:00'),
(134, 1, 'ĐVVC 28', 'ĐVVC28', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2023-09-25 00:00:00', '2023-09-27 01:30:13'),
(135, 1, 'ĐVVC 29', 'ĐVVC29', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2023-09-28 00:00:00', NULL),
(136, 1, 'ĐVVC 30', 'ĐVVC30', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, '2023-09-25 01:34:34', '2023-09-27 02:20:16'),
(137, 1, 'ĐVVC 31', 'ĐVVC31', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, '2023-09-29 01:35:47', '2023-09-27 02:28:31'),
(138, 2, 'ĐVVC 32', 'ĐVVC32', NULL, NULL, 1, NULL, NULL, NULL, NULL, 'Địa chỉ', NULL, NULL, 2, '2023-09-27 02:36:31', '2023-09-27 00:00:00'),
(139, 1, 'ĐVVC 33-v1', 'ĐVVC33', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, '2023-09-27 02:51:29', '2023-09-27 07:28:31'),
(140, 1, 'ĐVVC 34-v2', 'ĐVVC34', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, '2023-09-27 02:58:30', '2023-09-27 00:00:00'),
(141, 1, 'ĐVVC 35', 'ĐVVC35', NULL, NULL, 0, '2023-09-30', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2023-09-27 07:40:28', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `fuel`
--

CREATE TABLE `fuel` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `fuel`
--

INSERT INTO `fuel` (`id`, `name`) VALUES
(1, 'Dầu'),
(2, 'Ron 92'),
(3, 'Ron 95'),
(4, 'Ron E5');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `label_car`
--

CREATE TABLE `label_car` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `label_car`
--

INSERT INTO `label_car` (`id`, `name`) VALUES
(1, 'Nhãn hiệu xe 1'),
(2, 'Nhãn hiệu xe 2');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `number_type_car`
--

CREATE TABLE `number_type_car` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `number_type_car`
--

INSERT INTO `number_type_car` (`id`, `name`) VALUES
(1, 'Số loại xe 1'),
(2, 'Số loại xe 2');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `romooc`
--

CREATE TABLE `romooc` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `romooc`
--

INSERT INTO `romooc` (`id`, `name`) VALUES
(1, 'Rơmóoc 1'),
(2, 'Rơmóoc 2');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sub_driver`
--

CREATE TABLE `sub_driver` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sub_driver`
--

INSERT INTO `sub_driver` (`id`, `name`) VALUES
(1, 'Phụ xe 1'),
(2, 'Phụ xe 2');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `type_car`
--

CREATE TABLE `type_car` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `type_car`
--

INSERT INTO `type_car` (`id`, `name`) VALUES
(1, 'Loại xe 1'),
(2, 'Loại xe 2'),
(3, 'Loại xe 3'),
(4, 'Loại xe 4'),
(5, 'Loại xe 5'),
(6, 'Loại xe 6');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `type_list`
--

CREATE TABLE `type_list` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `type_list`
--

INSERT INTO `type_list` (`id`, `name`) VALUES
(1, 'bản kê 1'),
(2, 'bản kê 2');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `level` int(11) NOT NULL COMMENT '1:chính',
  `parent_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `email`, `phone`, `password`, `level`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'admin', '', 'admin@gmail.com', '', '$2y$10$fgGU1fm9ERkArFlboCPrxOFB.9/pGCrZWWxUx.DG0qTGkDelmG46a', 0, 0, '2023-09-19 10:26:33', '2023-09-19 03:24:20'),
(2, 'user1', '', 'user1@gmail.com', '', '$2y$10$ox60.0aNSjR2ihmjorzXcukTBFxohQb1mScVN8palUjIPXMhcstfG', 0, 0, '2023-09-19 10:26:33', '2023-09-19 03:24:20'),
(3, 'user2', '', 'user2@gmail.com', '', '$2y$10$ox60.0aNSjR2ihmjorzXcukTBFxohQb1mScVN8palUjIPXMhcstfG', 0, 0, '2023-09-19 10:26:33', '2023-09-19 03:24:20'),
(11, 'test', 'test', 'test@gmail.com', '0584228904', '111', 1, 1, '2023-09-27 14:06:25', '2023-09-27 07:06:25'),
(15, 'test2', 'test2', 'test2@gmail.com', NULL, '111', 1, 1, '2023-09-28 01:31:38', '2023-09-27 18:31:38'),
(16, 'test3', 'Nguyễn Test3', 'test3@gmail.com', NULL, '111', 1, 1, '2023-09-28 01:36:01', '2023-09-27 18:36:01'),
(17, 'test4', 'Test4', 'test4@gmail.com', '0584228904', '111', 1, 1, '2023-09-28 01:38:29', '2023-09-27 21:37:55'),
(18, 'test5', 'Test5', 'test5@gmail.com', NULL, '111', 1, 1, '2023-09-28 01:40:58', '2023-09-27 18:40:58'),
(19, 'test6', 'Test6', 'test6@gmail.com', NULL, '$2y$10$BNHGVvzIhCCk.PK8H9LITO5Dikm1rB7nGjA.3vSLj1XfMoN/Iz8Pa', 1, 1, '2023-09-28 01:42:30', '2023-09-27 20:45:22'),
(27, 'test7', 'Test7', 'test7@gmail.com', NULL, '$2y$10$b5cLhBaLF730TnGsfO6wHe40JoOGR7gDhKexM7cSySGnXklb92o2K', 1, 1, '2023-09-28 04:22:01', '2023-09-27 21:50:33'),
(28, 'test8', 'Test8', 'test8@gmail.com', '0584228904', '$2y$10$wT4W.KZXji0aH7jrAEWiteAt1zphyIJIU4iX9ZSE/cJXQO8881l76', 1, 1, '2023-09-28 04:49:41', '2023-09-27 21:49:41'),
(31, 'test1', 'Test1', 'test1@gmail.com', NULL, '$2y$10$wWVPbornvFuIJIhDkUp7G.LqpfKziD2jIJ9er6c6eh4856.8lGs3.', 1, 2, '2023-09-28 05:08:36', '2023-09-27 22:08:36'),
(32, 'test9', 'Test9', 'test9@gmail.com', '0584228904', '$2y$10$yQOMxsiBxyPF2W9lmBDNGeXOSvby90dts6WwilQtdSDUCqz/n/bR.', 1, 1, '2023-09-28 06:13:13', '2023-09-27 23:13:40'),
(34, 'test22', 'test22', 'test22@gmail.com', NULL, '$2y$10$6RaAYu.rB7MI.r7XE5nylut8.bZmeoZmVQycj62N6FAw4qWR0Qh6O', 1, 2, '2023-09-28 06:40:03', '2023-09-27 23:40:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wheel_structure`
--

CREATE TABLE `wheel_structure` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `wheel_structure`
--

INSERT INTO `wheel_structure` (`id`, `name`) VALUES
(1, 'Cấu trúc bánh 1'),
(2, 'Cấu trúc bánh 2'),
(3, 'Cấu trúc bánh 3'),
(4, 'Cấu trúc bánh 4');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dvvc`
--
ALTER TABLE `dvvc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `fuel`
--
ALTER TABLE `fuel`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `label_car`
--
ALTER TABLE `label_car`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `number_type_car`
--
ALTER TABLE `number_type_car`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `romooc`
--
ALTER TABLE `romooc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sub_driver`
--
ALTER TABLE `sub_driver`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `type_car`
--
ALTER TABLE `type_car`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `type_list`
--
ALTER TABLE `type_list`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `wheel_structure`
--
ALTER TABLE `wheel_structure`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `driver`
--
ALTER TABLE `driver`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `dvvc`
--
ALTER TABLE `dvvc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT cho bảng `fuel`
--
ALTER TABLE `fuel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `label_car`
--
ALTER TABLE `label_car`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `number_type_car`
--
ALTER TABLE `number_type_car`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `romooc`
--
ALTER TABLE `romooc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `sub_driver`
--
ALTER TABLE `sub_driver`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `type_car`
--
ALTER TABLE `type_car`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `type_list`
--
ALTER TABLE `type_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `wheel_structure`
--
ALTER TABLE `wheel_structure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `dvvc`
--
ALTER TABLE `dvvc`
  ADD CONSTRAINT `dvvc_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
