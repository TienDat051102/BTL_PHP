-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 08, 2024 lúc 09:07 AM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `btl`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ban`
--

CREATE TABLE `ban` (
  `MaBan` int(11) NOT NULL,
  `TrangThai` bit(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ban`
--

INSERT INTO `ban` (`MaBan`, `TrangThai`) VALUES
(1, b'00'),
(2, b'01'),
(3, b'01'),
(4, b'00'),
(5, b'00'),
(6, b'01'),
(7, b'00'),
(8, b'01'),
(9, b'00'),
(10, b'00');

-- --------------------------------------------------------

--
-- Cấu trúc đóng vai cho view `baocaodoanhthu`
-- (See below for the actual view)
--
CREATE TABLE `baocaodoanhthu` (
`MaHoaDon` int(11)
,`Ten` varchar(50)
,`NgayLap` datetime
);

-- --------------------------------------------------------

--
-- Cấu trúc đóng vai cho view `baocaohoadonnhap`
-- (See below for the actual view)
--
CREATE TABLE `baocaohoadonnhap` (
`MaHoaDonNhap` int(11)
,`NgayNhapHang` datetime
,`Ho` varchar(50)
,`Ten` varchar(50)
);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `MaHoaDon` int(11) NOT NULL,
  `MaChiTietSP` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `TongTienHD` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitiethoadon`
--

INSERT INTO `chitiethoadon` (`MaHoaDon`, `MaChiTietSP`, `SoLuong`, `TongTienHD`) VALUES
(2, 13, 4, 480000),
(2, 21, 5, 75000),
(3, 16, 3, 180000),
(5, 8, 8, 400000),
(6, 2, 5, 1250000),
(7, 4, 3, 1200000),
(8, 17, 20, 1000000),
(9, 10, 4, 400000),
(10, 14, 3, 450000),
(11, 21, 5, 75000),
(12, 18, 5, 100000),
(12, 21, 5, 75000),
(29, 1, 1, 500000),
(29, 3, 3, 900000),
(29, 4, 3, 1200000),
(30, 1, 1, 500000),
(30, 3, 3, 900000),
(30, 4, 3, 1200000),
(31, 1, 1, 500000),
(31, 3, 3, 900000),
(31, 4, 3, 1200000),
(32, 1, 1, 500000),
(32, 3, 3, 900000),
(32, 4, 3, 1200000),
(33, 1, 1, 500000),
(33, 3, 3, 900000),
(33, 4, 3, 1200000),
(34, 1, 1, 500000),
(34, 3, 3, 900000),
(34, 4, 3, 1200000),
(35, 1, 1, 500000),
(35, 3, 3, 900000),
(35, 4, 3, 1200000),
(36, 1, 1, 500000),
(36, 3, 3, 900000),
(36, 4, 3, 1200000),
(37, 1, 1, 500000),
(37, 3, 3, 900000),
(37, 4, 3, 1200000),
(38, 1, 1, 500000),
(38, 3, 3, 900000),
(38, 4, 3, 1200000),
(39, 1, 1, 500000),
(39, 3, 3, 900000),
(40, 1, 1, 500000),
(40, 3, 3, 900000),
(41, 1, 1, 500000),
(41, 3, 3, 900000),
(42, 1, 1, 500000),
(42, 3, 3, 900000),
(43, 1, 1, 500000),
(43, 3, 3, 900000),
(44, 1, 1, 500000),
(44, 3, 3, 900000),
(45, 1, 1, 500000),
(45, 3, 1, 300000),
(46, 2, 1, 250000),
(46, 3, 1, 300000),
(46, 4, 1, 400000),
(47, 8, 1, 50000),
(48, 8, 4, 200000),
(49, 10, 2, 200000),
(50, 10, 4, 400000),
(50, 11, 2, 400000),
(51, 10, 2, 200000),
(51, 11, 2, 400000),
(52, 8, 2, 100000),
(52, 10, 2, 200000),
(53, 8, 3, 150000),
(54, 1, 2, 1000000),
(55, 3, 1, 300000),
(56, 1, 1, 500000),
(56, 2, 1, 250000),
(56, 3, 2, 600000),
(57, 1, 1, 500000),
(57, 3, 1, 300000),
(57, 8, 1, 50000),
(58, 3, 1, 300000),
(59, 1, 1, 500000),
(59, 2, 1, 250000),
(61, 1, 1, 500000),
(64, 2, 1, 250000),
(65, 8, 2, 100000),
(66, 8, 15, 750000),
(67, 1, 3, 1500000),
(68, 8, 3, 150000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethoadonnhap`
--

CREATE TABLE `chitiethoadonnhap` (
  `MaHoaDonNhap` int(11) NOT NULL,
  `MaNL` int(11) NOT NULL,
  `SoLuongNhap` int(11) NOT NULL,
  `TongTien` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitiethoadonnhap`
--

INSERT INTO `chitiethoadonnhap` (`MaHoaDonNhap`, `MaNL`, `SoLuongNhap`, `TongTien`) VALUES
(1, 10, 500, 500000),
(2, 3, 2000, 20000000),
(3, 5, 600, 360000),
(4, 6, 250, 500000),
(5, 9, 300, 900000),
(6, 2, 1000, 2000000),
(7, 8, 250, 5000000),
(8, 7, 100, 1200000),
(14, 1, 10, 50000),
(15, 2, 10, 20000),
(16, 2, 10, 20000),
(17, 2, 15, 30000),
(18, 2, 15, 30000),
(19, 2, 15, 30000),
(20, 1, 10, 50000),
(21, 1, 10, 50000),
(23, 2, 50, 100000),
(23, 6, 1, 2000),
(23, 7, 11, 132000),
(23, 8, 50, 1000000),
(23, 10, 100, 100000),
(24, 1, 2, 10000),
(24, 2, 50, 100000),
(24, 6, 1, 2000),
(24, 7, 11, 132000),
(24, 8, 50, 1000000),
(24, 10, 100, 100000),
(25, 1, 20, 100000),
(25, 2, 50, 100000),
(25, 6, 1, 2000),
(25, 7, 11, 132000),
(25, 8, 50, 1000000),
(25, 10, 100, 100000),
(26, 1, 20, 100000),
(26, 2, 50, 100000),
(26, 6, 1, 2000),
(26, 7, 11, 132000),
(26, 8, 50, 1000000),
(26, 10, 100, 100000),
(27, 1, 1, 5000),
(27, 2, 1, 2000),
(28, 1, 1, 5000),
(29, 1, 1, 5000),
(29, 2, 1, 2000),
(30, 1, 1, 5000),
(31, 1, 1, 5000),
(31, 2, 10, 20000),
(32, 1, 1, 5000),
(32, 4, 10, 15000),
(32, 5, 10, 60000),
(33, 1, 23, 115000),
(33, 3, 1, 10000),
(33, 5, 123, 738000),
(34, 1, 15, 75000),
(34, 2, 50, 100000),
(35, 1, 1, 5000),
(35, 2, 234, 468000),
(36, 1, 10, 50000),
(37, 1, 150, 750000),
(37, 2, 1, 2000),
(37, 3, 1, 10000),
(38, 1, 10, 50000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `congthucmon`
--

CREATE TABLE `congthucmon` (
  `MaSP` int(11) NOT NULL,
  `MaNL` int(11) NOT NULL,
  `SoLuongCanDung` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `congthucmon`
--

INSERT INTO `congthucmon` (`MaSP`, `MaNL`, `SoLuongCanDung`) VALUES
(4, 3, 4),
(4, 9, 4),
(8, 9, 0.5),
(9, 4, 1),
(10, 1, 1),
(10, 5, 1),
(11, 8, 1),
(12, 2, 1),
(12, 8, 1),
(13, 7, 1),
(14, 7, 1),
(15, 8, 1),
(16, 1, 0.4),
(16, 2, 1),
(16, 4, 1),
(16, 5, 1),
(16, 6, 1),
(17, 1, 0.2),
(17, 3, 1),
(17, 5, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmucsp`
--

CREATE TABLE `danhmucsp` (
  `MaSP` int(11) NOT NULL,
  `MaLoai` int(11) NOT NULL,
  `TenSP` varchar(50) NOT NULL,
  `GiaBan` double NOT NULL,
  `GioiThieuSP` varchar(50) NOT NULL,
  `Anh` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmucsp`
--

INSERT INTO `danhmucsp` (`MaSP`, `MaLoai`, `TenSP`, `GiaBan`, `GioiThieuSP`, `Anh`) VALUES
(1, 1, 'Lẩu bò nhúng giấm', 500000, '', '1.jpg'),
(2, 1, 'Lẩu gà thuốc bắc', 250000, '', '2.jpg'),
(3, 1, 'Lẩu mắm', 300000, '', '3.jpg'),
(4, 1, 'Lẩu ếch', 400000, '', '4.jpg'),
(5, 1, 'Lẩu hải sản', 600000, '', '5.jpg'),
(6, 2, 'Nộm chân gà pha lê', 100000, '', '1a.jpg'),
(7, 2, 'Salad hoa quả', 80000, '', '2a.jpg'),
(8, 2, 'Khoai lang kén', 50000, '', '3a.jpg'),
(9, 2, 'Kim chi Hàn Quốc', 40000, '', '4a.jpg'),
(10, 2, 'Bánh mỳ bơ tỏi', 100000, '', '5a.jpg'),
(11, 3, 'Bò tảng tươi nguyên vị', 200000, '', '6a.jpg'),
(12, 2, 'Bò tảng ướp Hàn Quốc', 250000, '', '1b.jpg'),
(13, 3, 'Ba chỉ heo tươi', 120000, '', '2b.jpg'),
(14, 3, 'Nầm heo ướp', 150000, '', '3b.jpg'),
(15, 3, 'Ba chỉ bò Mỹ', 300000, '', '4b.jpg'),
(16, 4, 'Kem tươi ngũ vị', 60000, '', '1c.jpg'),
(17, 4, 'Sữa chua thạch hoa quả', 50000, '', '2c.jpg'),
(18, 5, 'Coca Cola', 20000, '', '1d.jpg'),
(19, 5, 'Bia Sài Gòn', 25000, '', '2d.jpg'),
(20, 5, 'Rượu mơ', 79000, '', '3d.jpg'),
(21, 5, 'Nước suối', 15000, '', '4d.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giamgia`
--

CREATE TABLE `giamgia` (
  `MaGiamGia` int(11) NOT NULL,
  `GiamGia` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `giamgia`
--

INSERT INTO `giamgia` (`MaGiamGia`, `GiamGia`) VALUES
(0, 5),
(25, 25),
(666, 15),
(999, 10),
(14587, 20),
(14588, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadonban`
--

CREATE TABLE `hoadonban` (
  `MaHoaDon` int(11) NOT NULL,
  `NgayLap` datetime NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `MaBan` int(11) DEFAULT NULL,
  `GiamGia` int(11) NOT NULL,
  `PhuongThucTT` bit(2) NOT NULL,
  `GhiChu` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadonban`
--

INSERT INTO `hoadonban` (`MaHoaDon`, `NgayLap`, `UserName`, `MaBan`, `GiamGia`, `PhuongThucTT`, `GhiChu`) VALUES
(2, '2023-02-02 10:06:49', 'admin', 1, 0, b'01', NULL),
(3, '2023-03-20 10:07:32', 'thienvu', 5, 25, b'01', NULL),
(5, '2023-05-20 10:08:14', 'admin2', 8, 999, b'01', NULL),
(6, '2023-06-20 10:08:26', 'locreus', 9, 14587, b'01', NULL),
(7, '2023-07-20 10:08:43', 'admin2', 4, 999, b'00', NULL),
(8, '2023-08-20 10:08:54', 'thienvu', 2, 25, b'01', NULL),
(9, '2023-09-20 10:09:09', 'admin2', 3, 14587, b'01', NULL),
(10, '2023-10-20 10:09:23', 'locreus', 7, 666, b'00', NULL),
(11, '2023-10-24 17:34:18', 'admin', 2, 14588, b'01', NULL),
(12, '2023-10-26 06:02:43', 'admin', 2, 25, b'01', NULL),
(13, '2023-11-06 12:04:53', 'thienvu', 6, 14588, b'01', NULL),
(14, '2023-11-06 12:05:45', 'thienvu', 6, 14588, b'01', NULL),
(15, '2023-11-06 12:06:01', 'thienvu', 6, 14588, b'00', NULL),
(16, '2023-11-06 12:07:12', 'thienvu', 6, 14588, b'11', NULL),
(17, '2023-11-06 12:07:46', 'thienvu', 6, 14588, b'11', NULL),
(18, '2023-11-06 12:08:35', 'thienvu', 6, 14588, b'01', NULL),
(19, '2023-11-06 12:08:40', 'thienvu', 6, 14588, b'00', NULL),
(20, '2023-11-06 06:17:16', 'admin', 2, 25, b'01', NULL),
(21, '2023-11-06 12:29:17', 'thienvu', 6, 14588, b'00', NULL),
(22, '2023-11-06 12:29:53', 'thienvu', 6, 14588, b'00', NULL),
(23, '2023-11-06 12:31:25', 'thienvu', 6, 14588, b'00', NULL),
(24, '2023-11-06 12:31:42', 'thienvu', 6, 666, b'01', NULL),
(25, '2023-11-06 12:33:16', 'thienvu', 6, 666, b'01', NULL),
(26, '2023-11-06 12:33:34', 'thienvu', 6, 666, b'01', NULL),
(27, '2023-11-06 12:35:46', 'thienvu', 7, 14588, b'01', NULL),
(28, '2023-11-06 12:35:58', 'thienvu', 1, 14588, b'00', NULL),
(29, '2023-11-06 12:50:52', 'thienvu', 9, 14588, b'00', NULL),
(30, '2023-11-06 13:04:42', 'thienvu', 9, 999, b'00', NULL),
(31, '2023-11-06 13:38:41', 'thienvu', 9, 999, b'00', NULL),
(32, '2023-11-06 13:43:07', 'thienvu', 9, 999, b'00', NULL),
(33, '2023-11-06 13:47:09', 'thienvu', 9, 999, b'00', NULL),
(34, '2023-11-06 13:50:26', 'thienvu', 9, 999, b'00', NULL),
(35, '2023-11-06 13:51:19', 'thienvu', 1, 0, b'00', NULL),
(36, '2023-11-06 13:52:24', 'thienvu', 1, 0, b'00', NULL),
(37, '2023-11-06 13:52:45', 'thienvu', 1, 0, b'00', NULL),
(38, '2023-11-06 13:53:42', 'thienvu', 1, 0, b'00', NULL),
(39, '2023-11-06 13:54:42', 'thienvu', 1, 0, b'00', NULL),
(40, '2023-11-06 13:57:06', 'thienvu', 1, 0, b'00', NULL),
(41, '2023-11-06 13:57:23', 'thienvu', 1, 0, b'00', NULL),
(42, '2023-11-06 13:57:58', 'thienvu', 1, 0, b'00', NULL),
(43, '2023-11-06 13:58:28', 'thienvu', 1, 0, b'00', NULL),
(44, '2023-11-06 13:58:42', 'thienvu', 1, 0, b'00', NULL),
(45, '2023-11-06 13:59:23', 'thienvu', 1, 0, b'00', NULL),
(46, '2023-11-06 14:00:17', 'thienvu', 1, 0, b'00', NULL),
(47, '2023-11-06 14:25:06', 'thienvu', 1, 14588, b'00', NULL),
(48, '2023-11-06 14:25:31', 'thienvu', 1, 0, b'00', NULL),
(49, '2023-11-06 14:27:39', 'thienvu', 1, 0, b'00', NULL),
(50, '2023-11-06 14:30:05', 'thienvu', 1, 0, b'00', NULL),
(51, '2023-11-06 14:31:32', 'thienvu', 1, 0, b'00', NULL),
(52, '2023-11-06 15:00:23', 'thienvu', 1, 0, b'00', NULL),
(53, '2023-11-06 15:00:57', 'thienvu', 1, 0, b'00', NULL),
(54, '2023-11-06 15:01:24', 'thienvu', 1, 0, b'00', NULL),
(55, '2023-11-06 15:02:49', 'thienvu', 1, 0, b'00', NULL),
(56, '2023-11-06 15:49:06', 'thienvu', 1, 0, b'00', NULL),
(57, '2023-11-07 16:50:06', 'thienvu', 8, 14588, b'00', NULL),
(58, '2023-11-07 16:50:35', 'admin', 1, 0, b'00', NULL),
(59, '2023-11-08 11:19:37', 'thienvu', 1, 0, b'00', NULL),
(61, '2023-11-09 07:46:15', 'thienvu', NULL, 25, b'00', 'aa'),
(64, '2023-11-09 07:49:54', 'thienvu', NULL, 0, b'00', 'â'),
(65, '2023-11-09 07:51:27', 'thienvu', 1, 0, b'00', NULL),
(66, '2023-11-09 09:21:18', 'thienvu', 1, 14588, b'00', NULL),
(67, '2023-11-09 09:27:59', 'thienvu', NULL, 0, b'00', ''),
(68, '2023-11-23 11:17:55', 'thienvu', 1, 0, b'00', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadonnhap`
--

CREATE TABLE `hoadonnhap` (
  `MaHoaDonNhap` int(11) NOT NULL,
  `MaNCC` int(11) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `NgayNhapHang` datetime NOT NULL,
  `GhiChu` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadonnhap`
--

INSERT INTO `hoadonnhap` (`MaHoaDonNhap`, `MaNCC`, `UserName`, `NgayNhapHang`, `GhiChu`) VALUES
(1, 1, 'admin', '2023-10-20 09:04:11', NULL),
(2, 2, 'admin2', '2022-10-20 09:05:54', NULL),
(3, 4, 'admin', '2023-10-15 09:06:19', NULL),
(4, 2, 'admin2', '2023-09-20 09:08:49', NULL),
(5, 5, 'admin2', '2023-10-17 09:13:31', NULL),
(6, 1, 'admin', '2023-08-25 09:13:54', NULL),
(7, 4, 'admin2', '2023-09-25 09:14:14', NULL),
(8, 4, 'admin2', '2023-10-01 09:14:32', NULL),
(9, 4, 'admin', '2023-06-10 09:14:42', NULL),
(10, 1, 'admin2', '2023-09-01 09:16:08', NULL),
(11, 1, 'admin', '2023-11-08 14:58:35', NULL),
(12, 1, 'admin', '2023-11-08 14:58:56', NULL),
(13, 1, 'admin', '2023-11-08 14:59:33', NULL),
(14, 1, 'admin', '2023-11-08 15:12:03', NULL),
(15, 1, 'admin', '2023-11-08 15:12:25', NULL),
(16, 1, 'admin', '2023-11-08 15:12:28', NULL),
(17, 1, 'admin', '2023-11-08 15:13:20', NULL),
(18, 1, 'admin', '2023-11-08 15:13:58', NULL),
(19, 1, 'admin', '2023-11-08 15:14:18', NULL),
(20, 1, 'admin', '2023-11-08 15:14:56', NULL),
(21, 1, 'admin', '2023-11-08 15:15:42', NULL),
(22, 1, 'admin', '2023-11-08 17:45:03', NULL),
(23, 1, 'admin', '2023-11-08 17:49:11', NULL),
(24, 1, 'admin', '2023-11-08 17:49:34', NULL),
(25, 1, 'admin', '2023-11-08 17:49:51', NULL),
(26, 1, 'admin', '2023-11-08 17:50:10', NULL),
(27, 1, 'admin', '2023-11-08 21:04:25', NULL),
(28, 1, 'admin', '2023-11-08 21:04:37', NULL),
(29, 1, 'admin', '2023-11-08 21:04:57', NULL),
(30, 1, 'admin', '2023-11-08 21:05:13', NULL),
(31, 1, 'admin', '2023-11-08 21:06:17', NULL),
(32, 1, 'admin', '2023-11-08 21:06:52', NULL),
(33, 1, 'admin', '2023-11-08 21:07:20', NULL),
(34, 1, 'admin', '2023-11-08 21:08:42', NULL),
(35, 1, 'admin', '2023-11-08 21:10:12', NULL),
(36, 3, 'admin', '2023-11-08 21:23:54', NULL),
(37, 3, 'admin', '2023-11-09 09:24:14', NULL),
(38, 1, 'admin', '2024-02-29 14:08:22', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisp`
--

CREATE TABLE `loaisp` (
  `LoaiSP` int(11) NOT NULL,
  `TenLoai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loaisp`
--

INSERT INTO `loaisp` (`LoaiSP`, `TenLoai`) VALUES
(1, 'Lẩu'),
(2, 'Món khai vị'),
(3, 'Món chính'),
(4, 'Món tráng miệng'),
(5, 'Nước uống'),
(6, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguyenlieu`
--

CREATE TABLE `nguyenlieu` (
  `MaNL` int(11) NOT NULL,
  `TenNL` varchar(50) NOT NULL,
  `DonGiaNhap` double NOT NULL,
  `SoLuongCon` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nguyenlieu`
--

INSERT INTO `nguyenlieu` (`MaNL`, `TenNL`, `DonGiaNhap`, `SoLuongCon`) VALUES
(1, 'Sữa', 5000, 15),
(2, 'Đường', 2000, 512),
(3, 'Cà phê', 10000, 2502),
(4, 'Trà xanh', 1500, 1510),
(5, 'Kem', 6000, 1123),
(6, 'Trứng', 2000, 504),
(7, 'Thịt lợn', 12000, 444),
(8, 'Thịt bò', 20000, 696),
(9, 'Khoai tây', 3000, 584.5),
(10, 'Cà chua', 1000, 1300);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhacungcap`
--

CREATE TABLE `nhacungcap` (
  `MaNCC` int(11) NOT NULL,
  `TenNCC` varchar(50) NOT NULL,
  `DiaChi` varchar(50) DEFAULT NULL,
  `GhiChu` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhacungcap`
--

INSERT INTO `nhacungcap` (`MaNCC`, `TenNCC`, `DiaChi`, `GhiChu`) VALUES
(1, 'Thành Nam Food', '168/42 DX006 , KP 8, Bình Dương', NULL),
(2, 'CP Việt Nam', 'Số 2 đường 2A, KCN Biên Hoà II', NULL),
(3, 'CTCP Thực phẩm Thiên Vương', '30 Nguyễn Khang, Yên Hòa, Cầu Giấy, Hà Nội', NULL),
(4, 'Công ty TNHH Thực phẩm Hữu Nghị', '40/2/5 Trần Thị Do', NULL),
(5, 'Công ty TNHH Thực phẩm Nguyên Hà', '14/7 Bis Kỳ Đồng, Phường 9, Quận 3, TP. HCM', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc đóng vai cho view `thongtinchitiethoadonban`
-- (See below for the actual view)
--
CREATE TABLE `thongtinchitiethoadonban` (
`MaHoaDon` int(11)
,`TenSP` varchar(50)
,`SoLuong` int(11)
,`TongTienHD` double
);

-- --------------------------------------------------------

--
-- Cấu trúc đóng vai cho view `thongtinhoadonnhap`
-- (See below for the actual view)
--
CREATE TABLE `thongtinhoadonnhap` (
`MaHoaDonNhap` int(11)
,`Ho` varchar(50)
,`Ten` varchar(50)
,`NgayNhapHang` datetime
,`TongTien` double
);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `UserName` varchar(50) NOT NULL,
  `PassWord` varchar(50) NOT NULL,
  `LoaiUser` bit(2) NOT NULL,
  `Ho` varchar(50) DEFAULT NULL,
  `Ten` varchar(50) NOT NULL,
  `DiaChi` varchar(50) DEFAULT NULL,
  `SDT` varchar(10) DEFAULT NULL,
  `NgaySinh` datetime DEFAULT NULL,
  `GhiChu` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`UserName`, `PassWord`, `LoaiUser`, `Ho`, `Ten`, `DiaChi`, `SDT`, `NgaySinh`, `GhiChu`) VALUES
('admin', '123', b'00', 'Đào', 'Tiến Đạt', 'Ninh Bình', '0865059383', '2002-11-05 00:00:00', NULL),
('admin2', '123', b'11', 'Nguyễn', 'Nguyên', 'Hà Nội', '0123456789', '2000-10-20 09:00:12', NULL),
('dat', '123', b'10', NULL, '', NULL, NULL, NULL, NULL),
('khaitho', '123', b'01', 'Nguyễn', 'Thế Khải', 'Bắc Giang', '0258963145', '2002-01-10 09:02:13', NULL),
('locreus', '123', b'00', 'Đoàn', 'Đình Lộc', 'Quảng Ninh', '0145236985', '2002-05-05 09:02:55', NULL),
('thanh', '123', b'10', 'Đặng', 'Tuấn Thành', 'Hà Tĩnh', '0865059355', '2002-09-27 00:00:00', NULL),
('thienvu', '123', b'01', 'Phạm', 'Thiên Vũ', 'Hà Nội', '0865059383', '0000-00-00 00:00:00', NULL),
('tiendat', '12345', b'01', 'Đào', 'Đạt', 'sfdkjs', '0222', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc cho view `baocaodoanhthu`
--
DROP TABLE IF EXISTS `baocaodoanhthu`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `baocaodoanhthu`  AS SELECT `hoadonban`.`MaHoaDon` AS `MaHoaDon`, `user`.`Ten` AS `Ten`, `hoadonban`.`NgayLap` AS `NgayLap` FROM (`user` join `hoadonban` on(`hoadonban`.`UserName` = `user`.`UserName`))  ;

-- --------------------------------------------------------

--
-- Cấu trúc cho view `baocaohoadonnhap`
--
DROP TABLE IF EXISTS `baocaohoadonnhap`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `baocaohoadonnhap`  AS SELECT `hoadonnhap`.`MaHoaDonNhap` AS `MaHoaDonNhap`, `hoadonnhap`.`NgayNhapHang` AS `NgayNhapHang`, `user`.`Ho` AS `Ho`, `user`.`Ten` AS `Ten` FROM (`hoadonnhap` join `user` on(`hoadonnhap`.`UserName` = `user`.`UserName`))  ;

-- --------------------------------------------------------

--
-- Cấu trúc cho view `thongtinchitiethoadonban`
--
DROP TABLE IF EXISTS `thongtinchitiethoadonban`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `thongtinchitiethoadonban`  AS SELECT `hoadonban`.`MaHoaDon` AS `MaHoaDon`, `danhmucsp`.`TenSP` AS `TenSP`, `chitiethoadon`.`SoLuong` AS `SoLuong`, `chitiethoadon`.`TongTienHD` AS `TongTienHD` FROM ((`hoadonban` join `chitiethoadon` on(`chitiethoadon`.`MaHoaDon` = `hoadonban`.`MaHoaDon`)) join `danhmucsp` on(`danhmucsp`.`MaSP` = `chitiethoadon`.`MaChiTietSP`))  ;

-- --------------------------------------------------------

--
-- Cấu trúc cho view `thongtinhoadonnhap`
--
DROP TABLE IF EXISTS `thongtinhoadonnhap`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `thongtinhoadonnhap`  AS SELECT `hoadonnhap`.`MaHoaDonNhap` AS `MaHoaDonNhap`, `user`.`Ho` AS `Ho`, `user`.`Ten` AS `Ten`, `hoadonnhap`.`NgayNhapHang` AS `NgayNhapHang`, `chitiethoadonnhap`.`TongTien` AS `TongTien` FROM ((`hoadonnhap` join `user` on(`user`.`UserName` = `hoadonnhap`.`UserName`)) join `chitiethoadonnhap` on(`chitiethoadonnhap`.`MaHoaDonNhap` = `hoadonnhap`.`MaHoaDonNhap`))  ;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `ban`
--
ALTER TABLE `ban`
  ADD PRIMARY KEY (`MaBan`);

--
-- Chỉ mục cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD PRIMARY KEY (`MaHoaDon`,`MaChiTietSP`),
  ADD KEY `MaChiTietSP` (`MaChiTietSP`);

--
-- Chỉ mục cho bảng `chitiethoadonnhap`
--
ALTER TABLE `chitiethoadonnhap`
  ADD PRIMARY KEY (`MaHoaDonNhap`,`MaNL`),
  ADD KEY `MaNL` (`MaNL`);

--
-- Chỉ mục cho bảng `congthucmon`
--
ALTER TABLE `congthucmon`
  ADD PRIMARY KEY (`MaSP`,`MaNL`),
  ADD KEY `MaNL` (`MaNL`);

--
-- Chỉ mục cho bảng `danhmucsp`
--
ALTER TABLE `danhmucsp`
  ADD PRIMARY KEY (`MaSP`),
  ADD KEY `MaLoai` (`MaLoai`);

--
-- Chỉ mục cho bảng `giamgia`
--
ALTER TABLE `giamgia`
  ADD PRIMARY KEY (`MaGiamGia`);

--
-- Chỉ mục cho bảng `hoadonban`
--
ALTER TABLE `hoadonban`
  ADD PRIMARY KEY (`MaHoaDon`),
  ADD KEY `MaNV` (`UserName`),
  ADD KEY `MaBan` (`MaBan`),
  ADD KEY `GiamGia` (`GiamGia`),
  ADD KEY `UserName` (`UserName`);

--
-- Chỉ mục cho bảng `hoadonnhap`
--
ALTER TABLE `hoadonnhap`
  ADD PRIMARY KEY (`MaHoaDonNhap`),
  ADD KEY `MaNCC` (`MaNCC`),
  ADD KEY `MaNV` (`UserName`),
  ADD KEY `UserName` (`UserName`);

--
-- Chỉ mục cho bảng `loaisp`
--
ALTER TABLE `loaisp`
  ADD PRIMARY KEY (`LoaiSP`);

--
-- Chỉ mục cho bảng `nguyenlieu`
--
ALTER TABLE `nguyenlieu`
  ADD PRIMARY KEY (`MaNL`);

--
-- Chỉ mục cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  ADD PRIMARY KEY (`MaNCC`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserName`,`LoaiUser`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `ban`
--
ALTER TABLE `ban`
  MODIFY `MaBan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `danhmucsp`
--
ALTER TABLE `danhmucsp`
  MODIFY `MaSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `giamgia`
--
ALTER TABLE `giamgia`
  MODIFY `MaGiamGia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14589;

--
-- AUTO_INCREMENT cho bảng `hoadonban`
--
ALTER TABLE `hoadonban`
  MODIFY `MaHoaDon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT cho bảng `hoadonnhap`
--
ALTER TABLE `hoadonnhap`
  MODIFY `MaHoaDonNhap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `loaisp`
--
ALTER TABLE `loaisp`
  MODIFY `LoaiSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `nguyenlieu`
--
ALTER TABLE `nguyenlieu`
  MODIFY `MaNL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  MODIFY `MaNCC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD CONSTRAINT `chitiethoadon_ibfk_2` FOREIGN KEY (`MaChiTietSP`) REFERENCES `danhmucsp` (`MaSP`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chitiethoadon_ibfk_3` FOREIGN KEY (`MaHoaDon`) REFERENCES `hoadonban` (`MaHoaDon`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `chitiethoadonnhap`
--
ALTER TABLE `chitiethoadonnhap`
  ADD CONSTRAINT `chitiethoadonnhap_ibfk_1` FOREIGN KEY (`MaNL`) REFERENCES `nguyenlieu` (`MaNL`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chitiethoadonnhap_ibfk_2` FOREIGN KEY (`MaHoaDonNhap`) REFERENCES `hoadonnhap` (`MaHoaDonNhap`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `congthucmon`
--
ALTER TABLE `congthucmon`
  ADD CONSTRAINT `congthucmon_ibfk_1` FOREIGN KEY (`MaNL`) REFERENCES `nguyenlieu` (`MaNL`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `congthucmon_ibfk_2` FOREIGN KEY (`MaSP`) REFERENCES `danhmucsp` (`MaSP`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `danhmucsp`
--
ALTER TABLE `danhmucsp`
  ADD CONSTRAINT `danhmucsp_ibfk_1` FOREIGN KEY (`MaLoai`) REFERENCES `loaisp` (`LoaiSP`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `hoadonban`
--
ALTER TABLE `hoadonban`
  ADD CONSTRAINT `hoadonban_ibfk_3` FOREIGN KEY (`MaBan`) REFERENCES `ban` (`MaBan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hoadonban_ibfk_4` FOREIGN KEY (`GiamGia`) REFERENCES `giamgia` (`MaGiamGia`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hoadonban_ibfk_5` FOREIGN KEY (`UserName`) REFERENCES `user` (`UserName`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `hoadonnhap`
--
ALTER TABLE `hoadonnhap`
  ADD CONSTRAINT `hoadonnhap_ibfk_1` FOREIGN KEY (`MaNCC`) REFERENCES `nhacungcap` (`MaNCC`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hoadonnhap_ibfk_2` FOREIGN KEY (`UserName`) REFERENCES `user` (`UserName`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
