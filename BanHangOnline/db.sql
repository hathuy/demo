-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 05, 2014 at 08:41 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `banhangonline`
--
CREATE DATABASE `banhangonline` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `banhangonline`;

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc_tbl`
--

CREATE TABLE IF NOT EXISTS `danhmuc_tbl` (
  `IDDM` int(11) NOT NULL AUTO_INCREMENT,
  `TenDM` text COLLATE utf8_unicode_ci NOT NULL,
  `IDDMCha` int(11) NOT NULL,
  `MoTa` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`IDDM`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Lưu thông tin về Danh mục' AUTO_INCREMENT=12 ;

--
-- Dumping data for table `danhmuc_tbl`
--

INSERT INTO `danhmuc_tbl` (`IDDM`, `TenDM`, `IDDMCha`, `MoTa`) VALUES
(1, 'Danh mục 1', 0, 'Mô tả 1'),
(2, 'Danh mục 2', 0, 'Mô tả 2'),
(3, 'Danh mục 3', 0, 'Mô tả 3'),
(4, 'Danh mục 1.1', 1, ''),
(5, 'Danh mục 1.2', 1, ''),
(6, 'Danh mục 2.1', 2, ''),
(8, 'Danh mục 2.2', 2, ''),
(9, 'Danh mục 1.1.1', 4, ''),
(10, 'Danh mục 1.1.1.1', 9, ''),
(11, 'Danh mục 2.1.1', 6, '');

-- --------------------------------------------------------

--
-- Table structure for table `donvitinh_tbl`
--

CREATE TABLE IF NOT EXISTS `donvitinh_tbl` (
  `IDDVT` int(11) NOT NULL AUTO_INCREMENT,
  `TenDVT` text COLLATE utf32_unicode_ci NOT NULL,
  `MoTa` text COLLATE utf32_unicode_ci,
  PRIMARY KEY (`IDDVT`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `donvitinh_tbl`
--

INSERT INTO `donvitinh_tbl` (`IDDVT`, `TenDVT`, `MoTa`) VALUES
(1, 'Cân', NULL),
(2, 'Mét', NULL),
(3, 'Chiếc', NULL),
(4, 'Hộp', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hanghoa_tbl`
--

CREATE TABLE IF NOT EXISTS `hanghoa_tbl` (
  `IDHH` int(11) NOT NULL AUTO_INCREMENT,
  `TenHH` text COLLATE utf32_unicode_ci NOT NULL,
  `MoTa` text COLLATE utf32_unicode_ci,
  `IDLoaiHH` int(11) NOT NULL,
  PRIMARY KEY (`IDHH`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `hanghoa_tbl`
--

INSERT INTO `hanghoa_tbl` (`IDHH`, `TenHH`, `MoTa`, `IDLoaiHH`) VALUES
(1, 'Hàng hóa 01', NULL, 1),
(2, 'Hàng hóa 02', NULL, 1),
(3, 'Hàng hóa 03', NULL, 2),
(4, 'Hàng hóa 04', NULL, 2),
(5, 'Hàng hóa 05', NULL, 3),
(6, 'Hàng hóa 06', NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `hanghoa_thuoctinh_tbl`
--

CREATE TABLE IF NOT EXISTS `hanghoa_thuoctinh_tbl` (
  `IDHHTT` int(11) NOT NULL AUTO_INCREMENT,
  `IDLoaiTT` int(11) NOT NULL,
  `IDTT` int(11) NOT NULL,
  `IDHH` int(11) NOT NULL,
  `DonGia` int(11) NOT NULL,
  PRIMARY KEY (`IDHHTT`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `hanghoa_thuoctinh_tbl`
--

INSERT INTO `hanghoa_thuoctinh_tbl` (`IDHHTT`, `IDLoaiTT`, `IDTT`, `IDHH`, `DonGia`) VALUES
(4, 6, 2, 6, 200000);

-- --------------------------------------------------------

--
-- Table structure for table `loaihanghoa_tbl`
--

CREATE TABLE IF NOT EXISTS `loaihanghoa_tbl` (
  `IDLoaiHH` int(3) NOT NULL AUTO_INCREMENT,
  `TenLoaiHH` text COLLATE utf8_unicode_ci NOT NULL,
  `MoTa` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`IDLoaiHH`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Thông tin về loại hàng hóa' AUTO_INCREMENT=22 ;

--
-- Dumping data for table `loaihanghoa_tbl`
--

INSERT INTO `loaihanghoa_tbl` (`IDLoaiHH`, `TenLoaiHH`, `MoTa`) VALUES
(1, 'Loại 1', 'Mô tả 1'),
(2, 'Loại 2', ''),
(3, 'Loại 3', 'Mô tả 3'),
(4, 'Loại 4', ''),
(5, 'Loại 4', ''),
(6, 'Loại 5', 'Mô tả 5'),
(7, 'Loại 6', ''),
(15, 'Loại 8', ''),
(16, 'Loại 11', ''),
(17, 'Loại 11', ''),
(18, 'Loại 9', 'Mô tả 9'),
(19, 'Loại 10', ''),
(20, 'Loại 11', ''),
(21, 'Loại 11', '');

-- --------------------------------------------------------

--
-- Table structure for table `loaithuoctinh_tbl`
--

CREATE TABLE IF NOT EXISTS `loaithuoctinh_tbl` (
  `IDLoaiTT` int(11) NOT NULL AUTO_INCREMENT,
  `TenLoaiTT` text COLLATE utf8_unicode_ci NOT NULL,
  `MoTa` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`IDLoaiTT`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `loaithuoctinh_tbl`
--

INSERT INTO `loaithuoctinh_tbl` (`IDLoaiTT`, `TenLoaiTT`, `MoTa`) VALUES
(5, 'Màu sắc', NULL),
(6, 'Đơn vị tính', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mausac_tbl`
--

CREATE TABLE IF NOT EXISTS `mausac_tbl` (
  `IDMS` int(11) NOT NULL AUTO_INCREMENT,
  `TenMS` text COLLATE utf8_unicode_ci NOT NULL,
  `MoTa` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`IDMS`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `mausac_tbl`
--

INSERT INTO `mausac_tbl` (`IDMS`, `TenMS`, `MoTa`) VALUES
(1, 'Xanh ', NULL),
(2, 'Đỏ', NULL),
(3, 'Tím', NULL),
(4, 'Vàng', NULL),
(5, 'Nâu', NULL),
(6, 'Đen', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nhasacxuat_tbl`
--

CREATE TABLE IF NOT EXISTS `nhasacxuat_tbl` (
  `IDNSX` int(3) NOT NULL AUTO_INCREMENT,
  `TenNSX` text COLLATE utf8_unicode_ci NOT NULL,
  `MoTa` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`IDNSX`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Thông tin về Nhà sản xuất' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `nhomquyen_tbl`
--

CREATE TABLE IF NOT EXISTS `nhomquyen_tbl` (
  `IDNhomQuyen` int(11) NOT NULL AUTO_INCREMENT,
  `TenNhomQuyen` text COLLATE utf32_unicode_ci NOT NULL,
  `MoTa` text COLLATE utf32_unicode_ci,
  PRIMARY KEY (`IDNhomQuyen`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci COMMENT='Lưu các nhóm quyền trong hệ thống' AUTO_INCREMENT=4 ;

--
-- Dumping data for table `nhomquyen_tbl`
--

INSERT INTO `nhomquyen_tbl` (`IDNhomQuyen`, `TenNhomQuyen`, `MoTa`) VALUES
(1, 'Admin', 'Quyền Admin'),
(2, 'Nhân Viên', NULL),
(3, 'Khách hàng', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `quyen_nhomquyen_tbl`
--

CREATE TABLE IF NOT EXISTS `quyen_nhomquyen_tbl` (
  `IDQNQ` int(11) NOT NULL AUTO_INCREMENT,
  `IDDM` int(11) NOT NULL,
  `IDNhomQuyen` int(11) NOT NULL,
  `MoTa` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`IDQNQ`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Lưu dữ liệu về quyền trong nhóm quyền' AUTO_INCREMENT=52 ;

--
-- Dumping data for table `quyen_nhomquyen_tbl`
--

INSERT INTO `quyen_nhomquyen_tbl` (`IDQNQ`, `IDDM`, `IDNhomQuyen`, `MoTa`) VALUES
(12, 1, 2, NULL),
(13, 3, 2, NULL),
(14, 5, 2, NULL),
(15, 8, 2, NULL),
(46, 1, 1, NULL),
(47, 2, 1, NULL),
(48, 3, 1, NULL),
(49, 4, 1, NULL),
(50, 5, 1, NULL),
(51, 8, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE IF NOT EXISTS `user_tbl` (
  `IDUser` int(11) NOT NULL AUTO_INCREMENT,
  `TenUser` text COLLATE utf32_unicode_ci NOT NULL,
  `NgaySinh` date NOT NULL,
  `GioiTinh` text COLLATE utf32_unicode_ci NOT NULL,
  `DiaChi` text COLLATE utf32_unicode_ci NOT NULL,
  `Email` text COLLATE utf32_unicode_ci NOT NULL,
  `SDT` text COLLATE utf32_unicode_ci NOT NULL,
  `Username` text COLLATE utf32_unicode_ci NOT NULL,
  `Password` text COLLATE utf32_unicode_ci NOT NULL,
  `IDNhomQuyen` int(11) NOT NULL,
  PRIMARY KEY (`IDUser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci COMMENT='Lưu thông tin về User' AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`IDUser`, `TenUser`, `NgaySinh`, `GioiTinh`, `DiaChi`, `Email`, `SDT`, `Username`, `Password`, `IDNhomQuyen`) VALUES
(1, 'DuongNH', '2014-06-09', 'Nam', 'Hà Đông', 'duongnhyt@gmail.com', '0993421637', 'duongnhyt', '123456', 1),
(2, 'GiangPT', '2014-06-10', 'Khác', 'Hà Nội', 'abc@gmail.com', '0993000000', 'giangpt', '123456', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
