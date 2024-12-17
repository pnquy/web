-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 17, 2024 lúc 01:14 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `dbdoan`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `adminid` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `username` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`adminid`, `username`, `password`) VALUES
('ad01', 'admin1', '$2y$10$ozdUcnIYQ/gNwHxkFP/MKebDuvCZthD/MTC1cPC8a2QSc2mrOw.q.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blog`
--

CREATE TABLE `blog` (
  `blogid` varchar(20) NOT NULL,
  `tieude` varchar(255) NOT NULL,
  `header` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blogct`
--

CREATE TABLE `blogct` (
  `blogctid` varchar(20) NOT NULL,
  `blogid` varchar(20) NOT NULL,
  `paragraph` text NOT NULL,
  `img1` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `color`
--

CREATE TABLE `color` (
  `colorid` varchar(20) NOT NULL,
  `colorname` varchar(255) NOT NULL,
  `colorhex` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `color`
--

INSERT INTO `color` (`colorid`, `colorname`, `colorhex`) VALUES
('color1', 'Offwhite/Gum', '#FEFBEF'),
('color2', 'Rustic', '#EBD0A2'),
('color3', 'Real Teal', '#1C487C'),
('color4', 'White', '#FFFFFF'),
('color5', 'Evergreen', '#6D9951'),
('color6', 'Black/Gum', '#464646'),
('color7', 'Corluray Mix', '#F5D255'),
('color8', 'Monk\"s Robe', '#77553D');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dongsp`
--

CREATE TABLE `dongsp` (
  `dongspid` varchar(20) NOT NULL,
  `tendongsp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dongsp`
--

INSERT INTO `dongsp` (`dongspid`, `tendongsp`) VALUES
('dongsp1', 'Nike'),
('dongsp2', 'Adidas'),
('dongsp3', 'Biti\'s'),
('dongsp4', 'Puma');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `khachhangid` varchar(20) NOT NULL,
  `hoten` varchar(255) NOT NULL,
  `diachi` varchar(255) NOT NULL,
  `tinhthanh` varchar(255) NOT NULL,
  `quanhuyen` varchar(255) NOT NULL,
  `phuongxa` varchar(255) NOT NULL,
  `sodt` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gioitinh` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`khachhangid`, `hoten`, `diachi`, `tinhthanh`, `quanhuyen`, `phuongxa`, `sodt`, `email`, `gioitinh`) VALUES
('kh1', 'Nguyễn Duy Tân', '140 Kim Long', 'Tỉnh Thừa Thiên Huế', 'Thành phố Huế', 'Phường Kim Long', '0935148378', 'example@gmail.com', 'Nam');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `magiamgia`
--

CREATE TABLE `magiamgia` (
  `magiamgiaid` varchar(20) NOT NULL,
  `codemagiamgia` varchar(255) NOT NULL,
  `giatrigiam` float NOT NULL,
  `ngaybd` datetime DEFAULT NULL,
  `ngaykt` datetime DEFAULT NULL,
  `soluong` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `magiamgia`
--

INSERT INTO `magiamgia` (`magiamgiaid`, `codemagiamgia`, `giatrigiam`, `ngaybd`, `ngaykt`, `soluong`) VALUES
('mgg01', 'D1111', 0.3, '2023-11-11 00:00:00', '2023-11-12 00:00:00', 97),
('mgg02', 'XM23', 0.2, '2023-12-20 00:00:00', '2023-12-27 00:00:00', 200);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `magiamgiact`
--

CREATE TABLE `magiamgiact` (
  `magiamgiactid` varchar(20) NOT NULL,
  `magiamgiaid` varchar(20) NOT NULL,
  `khachhangid` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `procolorsize`
--

CREATE TABLE `procolorsize` (
  `procolorsizeid` int(11) NOT NULL,
  `procolorid` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `sl` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `procolorsize`
--

INSERT INTO `procolorsize` (`procolorsizeid`, `procolorid`, `size`, `sl`) VALUES
(1, 29, 35, 15),
(2, 29, 36, 13),
(3, 29, 37, 12),
(4, 29, 38, 20),
(5, 29, 39, 20),
(6, 29, 40, 20),
(7, 29, 41, 20),
(8, 29, 42, 20),
(9, 29, 43, 15),
(10, 29, 44, 20),
(11, 29, 45, 20),
(12, 30, 35, 19),
(13, 30, 36, 20),
(14, 30, 37, 23),
(15, 30, 38, 20),
(16, 30, 39, 20),
(17, 30, 40, 20),
(18, 30, 41, 20),
(19, 30, 42, 19),
(20, 30, 43, 20),
(21, 30, 44, 20),
(22, 30, 45, 20),
(23, 31, 35, 17),
(24, 31, 36, 17),
(25, 31, 37, 20),
(26, 31, 38, 18),
(27, 31, 39, 20),
(28, 31, 40, 18),
(29, 31, 41, 20),
(30, 31, 42, 20),
(31, 31, 43, 20),
(32, 31, 44, 20),
(33, 31, 45, 20),
(34, 32, 35, 20),
(35, 32, 36, 20),
(36, 32, 37, 20),
(37, 32, 38, 20),
(38, 32, 39, 20),
(39, 32, 40, 20),
(40, 32, 41, 20),
(41, 32, 42, 20),
(42, 32, 43, 20),
(43, 32, 44, 20),
(44, 32, 45, 20),
(250, 56, 36, 4),
(251, 56, 37, 4),
(252, 56, 38, 1),
(253, 56, 39, 0),
(254, 56, 40, 0),
(255, 56, 41, 0),
(256, 56, 42, 0),
(257, 56, 43, 0),
(258, 56, 44, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `productcolor`
--

CREATE TABLE `productcolor` (
  `productcolorid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `colorid` varchar(20) NOT NULL,
  `img1` text DEFAULT NULL,
  `img2` text DEFAULT NULL,
  `img3` text DEFAULT NULL,
  `img4` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `productcolor`
--

INSERT INTO `productcolor` (`productcolorid`, `productid`, `colorid`, `img1`, `img2`, `img3`, `img4`) VALUES
(29, 1, 'color7', 'Pro_AV00167_1.jpeg', 'Pro_AV00165_2.jpeg', 'Pro_AV00165_3.jpeg', 'Pro_AV00165_4.jpeg'),
(30, 2, 'color7', 'Pro_AV00165_1.jpeg', 'Pro_AV00165_2.jpeg', 'Pro_AV00165_3.jpeg', 'Pro_AV00165_4.jpeg'),
(31, 3, 'color8', 'Pro_AV00204_1.jpeg', 'Pro_AV00204_2.jpeg', 'Pro_AV00204_3.jpeg', 'Pro_AV00204_4.jpeg'),
(32, 4, 'color8', 'Pro_AV00203_1.jpeg', 'Pro_AV00203_2.jpeg', 'Pro_AV00203_3.jpeg', 'Pro_AV00203_4.jpeg'),
(56, 25, 'color1', 'Pro_AV00205_1.jpeg', 'Pro_AV00205_2.jpeg', 'Pro_AV00205_3.jpeg', 'Pro_AV00205_4.jpeg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `saleoff`
--

CREATE TABLE `saleoff` (
  `saleoffid` int(11) NOT NULL,
  `ngaybd` datetime DEFAULT NULL,
  `ngaykt` datetime DEFAULT NULL,
  `giatrigiam` float NOT NULL,
  `loaisp` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `saleoff`
--

INSERT INTO `saleoff` (`saleoffid`, `ngaybd`, `ngaykt`, `giatrigiam`, `loaisp`) VALUES
(1, '2023-12-13 00:00:00', '2023-12-14 00:00:00', 23, ''),
(2, '2023-12-13 00:00:00', '2023-12-20 00:00:00', 45, 'Vintas'),
(3, '2023-12-16 00:00:00', '2023-12-17 00:00:00', 2, ''),
(4, '2023-12-15 00:00:00', '2023-12-21 00:00:00', 20, ''),
(15, '2023-12-16 00:00:00', '2023-12-19 00:00:00', 30, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `saleoffct`
--

CREATE TABLE `saleoffct` (
  `saleoffctid` int(11) NOT NULL,
  `saleoffid` int(11) NOT NULL,
  `procolorid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `saleoffct`
--

INSERT INTO `saleoffct` (`saleoffctid`, `saleoffid`, `procolorid`) VALUES
(1, 1, 31),
(2, 1, 30),
(3, 2, 31),
(4, 2, 32),
(9, 4, 29),
(47, 15, 29);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `sanphamid` int(11) NOT NULL,
  `tensp` varchar(255) NOT NULL,
  `giasp` int(20) NOT NULL,
  `danhmuc` varchar(255) NOT NULL,
  `dongspid` varchar(20) DEFAULT NULL,
  `styleid` varchar(20) DEFAULT NULL,
  `thongtinsp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`sanphamid`, `tensp`, `giasp`, `danhmuc`, `dongspid`, `styleid`, `thongtinsp`) VALUES
(1, 'Urbas Corluray Mix - High Top', 650000, 'Nam', 'dongsp3', 'style2', 'Được làm từ chất liệu cao cấp, Urbas Corluray Pack \r\nmang đến sự thoải mái và phong cách cho người dùng. Bộ sưu tập có 5 màu sắc khác nhau, phù hợp với nhiều phong cách thời trang.'),
(2, 'Urbas Corluray Mix - Low Top', 610000, 'Nam', 'dongsp3', 'style1', 'Được làm từ chất liệu cao cấp, Urbas Corluray Pack \r\nmang đến sự thoải mái và phong cách cho người dùng. Bộ sưu tập có 5 màu sắc khác nhau, phù hợp với nhiều phong cách thời trang.'),
(3, 'Vintas Nauda - High Top', 720000, 'Nữ', 'dongsp2', 'style2', 'Được làm từ chất liệu cao cấp, Ananas Nauda mang đến sự thoải mái \nvà phong cách cho người dùng. Mẫu giày có 3 màu sắc khác nhau, phù hợp với nhiều phong cách thời trang.'),
(4, 'Vintas Nauda - Low Top', 650000, 'Nữ', 'dongsp2', 'style1', 'Được làm từ chất liệu cao cấp, Ananas Nauda mang đến sự thoải mái \r\nvà phong cách cho người dùng. Mẫu giày có 3 màu sắc khác nhau, phù hợp với nhiều phong cách thời trang.'),
(25, 'VINTAS VIVU - LOW TOP - WARM SAND', 620000, 'Nam', 'dongsp2', 'style1', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `size`
--

CREATE TABLE `size` (
  `sizeid` varchar(20) NOT NULL,
  `sizenumber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `size`
--

INSERT INTO `size` (`sizeid`, `sizenumber`) VALUES
('size 36', 36),
('size 37', 37),
('size 38', 38),
('size 39', 39),
('size 40', 40),
('size 41', 41),
('size 42', 42),
('size 43', 43),
('size 44', 44);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `style`
--

CREATE TABLE `style` (
  `styleid` varchar(20) NOT NULL,
  `stylename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `style`
--

INSERT INTO `style` (`styleid`, `stylename`) VALUES
('style1', 'Bóng đá'),
('style2', 'Bóng rổ'),
('style3', 'Gym'),
('style4', 'Chạy bộ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoankh`
--

CREATE TABLE `taikhoankh` (
  `taikhoanid` int(11) NOT NULL,
  `khachhangid` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoankh`
--

INSERT INTO `taikhoankh` (`taikhoanid`, `khachhangid`, `password`) VALUES
(22, 'kh1', '$2y$10$4qQ6wH0pZ1zvG4hh3prG6OV1RcGh8IsZhzXNKwb0oQwTMzYb39ZW.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thanhtoan`
--

CREATE TABLE `thanhtoan` (
  `thanhtoanid` int(11) NOT NULL,
  `khachhangid` varchar(20) NOT NULL,
  `ngayorder` date NOT NULL DEFAULT current_timestamp(),
  `magiamgiaid` varchar(20) NOT NULL,
  `tongtien` int(20) NOT NULL,
  `hinhthucthanhtoan` varchar(255) NOT NULL,
  `tienhang` int(11) NOT NULL,
  `phiship` int(11) NOT NULL,
  `trangthai` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thanhtoan`
--

INSERT INTO `thanhtoan` (`thanhtoanid`, `khachhangid`, `ngayorder`, `magiamgiaid`, `tongtien`, `hinhthucthanhtoan`, `tienhang`, `phiship`, `trangthai`) VALUES
(88, 'kh1', '2024-12-17', '', 2160000, 'momo', 2160000, 0, 'Đã xác nhận');

--
-- Bẫy `thanhtoan`
--
DELIMITER $$
CREATE TRIGGER `so_luong_magiamgia` AFTER INSERT ON `thanhtoan` FOR EACH ROW BEGIN
    IF NEW.magiamgiaid IS NOT NULL THEN
        UPDATE magiamgia
        SET soluong = soluong - 1
        WHERE magiamgiaid = NEW.magiamgiaid;
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thanhtoanct`
--

CREATE TABLE `thanhtoanct` (
  `thanhtoanctid` int(11) NOT NULL,
  `thanhtoanid` int(11) NOT NULL,
  `productcolorsizeid` int(11) NOT NULL,
  `soluong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thanhtoanct`
--

INSERT INTO `thanhtoanct` (`thanhtoanctid`, `thanhtoanid`, `productcolorsizeid`, `soluong`) VALUES
(71, 88, 23, 3);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminid`);

--
-- Chỉ mục cho bảng `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blogid`);

--
-- Chỉ mục cho bảng `blogct`
--
ALTER TABLE `blogct`
  ADD PRIMARY KEY (`blogctid`),
  ADD KEY `fk_blogct_blogid` (`blogid`);

--
-- Chỉ mục cho bảng `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`colorid`);

--
-- Chỉ mục cho bảng `dongsp`
--
ALTER TABLE `dongsp`
  ADD PRIMARY KEY (`dongspid`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`khachhangid`);

--
-- Chỉ mục cho bảng `magiamgia`
--
ALTER TABLE `magiamgia`
  ADD PRIMARY KEY (`magiamgiaid`);

--
-- Chỉ mục cho bảng `magiamgiact`
--
ALTER TABLE `magiamgiact`
  ADD PRIMARY KEY (`magiamgiactid`),
  ADD KEY `fk_magiamgiact_magiamgiaid` (`magiamgiaid`),
  ADD KEY `fk_magiamgiact_khachhangid` (`khachhangid`);

--
-- Chỉ mục cho bảng `procolorsize`
--
ALTER TABLE `procolorsize`
  ADD PRIMARY KEY (`procolorsizeid`),
  ADD KEY `fk_procolorsize_procolorid` (`procolorid`);

--
-- Chỉ mục cho bảng `productcolor`
--
ALTER TABLE `productcolor`
  ADD PRIMARY KEY (`productcolorid`),
  ADD KEY `fk_productcolor_productid` (`productid`),
  ADD KEY `fk_productcolor_colorid` (`colorid`);

--
-- Chỉ mục cho bảng `saleoff`
--
ALTER TABLE `saleoff`
  ADD PRIMARY KEY (`saleoffid`);

--
-- Chỉ mục cho bảng `saleoffct`
--
ALTER TABLE `saleoffct`
  ADD PRIMARY KEY (`saleoffctid`),
  ADD KEY `fk_saleoffct_saleoffid` (`saleoffid`),
  ADD KEY `fk_saleoffct_procolorid` (`procolorid`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`sanphamid`),
  ADD KEY `fk_sanpham_dongspid` (`dongspid`),
  ADD KEY `fk_sanpham_styleid` (`styleid`);

--
-- Chỉ mục cho bảng `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`sizeid`);

--
-- Chỉ mục cho bảng `style`
--
ALTER TABLE `style`
  ADD PRIMARY KEY (`styleid`);

--
-- Chỉ mục cho bảng `taikhoankh`
--
ALTER TABLE `taikhoankh`
  ADD PRIMARY KEY (`taikhoanid`),
  ADD KEY `fk_taikhoankh` (`khachhangid`);

--
-- Chỉ mục cho bảng `thanhtoan`
--
ALTER TABLE `thanhtoan`
  ADD PRIMARY KEY (`thanhtoanid`),
  ADD KEY `fk_thanhtoan_khachhangid` (`khachhangid`),
  ADD KEY `fk_thanhtoanct_magiamgiaid` (`magiamgiaid`);

--
-- Chỉ mục cho bảng `thanhtoanct`
--
ALTER TABLE `thanhtoanct`
  ADD PRIMARY KEY (`thanhtoanctid`),
  ADD KEY `fk_thanhtoanct_thanhtoanid` (`thanhtoanid`),
  ADD KEY `fk_thanhtoanct_procolorsizeid` (`productcolorsizeid`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `procolorsize`
--
ALTER TABLE `procolorsize`
  MODIFY `procolorsizeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=295;

--
-- AUTO_INCREMENT cho bảng `productcolor`
--
ALTER TABLE `productcolor`
  MODIFY `productcolorid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT cho bảng `saleoff`
--
ALTER TABLE `saleoff`
  MODIFY `saleoffid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `saleoffct`
--
ALTER TABLE `saleoffct`
  MODIFY `saleoffctid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `sanphamid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `taikhoankh`
--
ALTER TABLE `taikhoankh`
  MODIFY `taikhoanid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `thanhtoan`
--
ALTER TABLE `thanhtoan`
  MODIFY `thanhtoanid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT cho bảng `thanhtoanct`
--
ALTER TABLE `thanhtoanct`
  MODIFY `thanhtoanctid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `magiamgiact`
--
ALTER TABLE `magiamgiact`
  ADD CONSTRAINT `fk_magiamgiact_khachhangid` FOREIGN KEY (`khachhangid`) REFERENCES `khachhang` (`khachhangid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_magiamgiact_magiamgiaid` FOREIGN KEY (`magiamgiaid`) REFERENCES `magiamgia` (`magiamgiaid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `procolorsize`
--
ALTER TABLE `procolorsize`
  ADD CONSTRAINT `fk_procolorsize_procolorid` FOREIGN KEY (`procolorid`) REFERENCES `productcolor` (`productcolorid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `productcolor`
--
ALTER TABLE `productcolor`
  ADD CONSTRAINT `fk_productcolor_colorid` FOREIGN KEY (`colorid`) REFERENCES `color` (`colorid`),
  ADD CONSTRAINT `fk_productcolor_productid` FOREIGN KEY (`productid`) REFERENCES `sanpham` (`sanphamid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `saleoffct`
--
ALTER TABLE `saleoffct`
  ADD CONSTRAINT `fk_saleoffct_procolorid` FOREIGN KEY (`procolorid`) REFERENCES `productcolor` (`productcolorid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_saleoffct_saleoffid` FOREIGN KEY (`saleoffid`) REFERENCES `saleoff` (`saleoffid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `fk_sanpham_dongspid` FOREIGN KEY (`dongspid`) REFERENCES `dongsp` (`dongspid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sanpham_styleid` FOREIGN KEY (`styleid`) REFERENCES `style` (`styleid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `taikhoankh`
--
ALTER TABLE `taikhoankh`
  ADD CONSTRAINT `fk_taikhoankh` FOREIGN KEY (`khachhangid`) REFERENCES `khachhang` (`khachhangid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `thanhtoan`
--
ALTER TABLE `thanhtoan`
  ADD CONSTRAINT `fk_thanhtoan_khachhangid` FOREIGN KEY (`khachhangid`) REFERENCES `khachhang` (`khachhangid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `thanhtoanct`
--
ALTER TABLE `thanhtoanct`
  ADD CONSTRAINT `fk_thanhtoanct_procolorsizeid` FOREIGN KEY (`productcolorsizeid`) REFERENCES `procolorsize` (`procolorsizeid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_thanhtoanct_thanhtoanid` FOREIGN KEY (`thanhtoanid`) REFERENCES `thanhtoan` (`thanhtoanid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
