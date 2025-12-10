-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 10, 2025 lúc 04:12 AM
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
('kh1', 'Cam Hồng Mạnh', 'ktx khu a', 'Thành phố Hồ Chí Minh', 'Thành phố Thủ Đức', 'Phường Thảo Điền', '0354249979', '23520914@gm.uit.edu.vn', 'Nam'),
('kh2', 'Phạm Hùng Quốc Việt', 'ktx khu a dhqg', 'Thành phố Hồ Chí Minh', 'Thành phố Thủ Đức', 'Phường Linh Đông', '0937404708', '23521783@gm.uit.edu.vn', 'Nam');

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
(295, 61, 36, 50),
(296, 61, 37, 55),
(297, 61, 38, 40),
(298, 61, 39, 50),
(299, 61, 40, 30),
(300, 61, 41, 65),
(301, 61, 42, 72),
(302, 61, 43, 80),
(303, 61, 44, 60),
(304, 62, 36, 63),
(305, 62, 37, 57),
(306, 62, 38, 87),
(307, 62, 39, 45),
(308, 62, 40, 73),
(309, 62, 41, 53),
(310, 62, 42, 69),
(311, 62, 43, 42),
(312, 62, 44, 51),
(340, 66, 36, 14),
(341, 66, 37, 35),
(342, 66, 38, 6),
(343, 66, 39, 66),
(344, 66, 40, 42),
(345, 66, 41, 13),
(346, 66, 42, 35),
(347, 66, 43, 56),
(348, 66, 44, 65),
(349, 67, 36, 100),
(350, 67, 37, 123),
(351, 67, 38, 234),
(352, 67, 39, 67),
(353, 67, 40, 86),
(354, 67, 41, 65),
(355, 67, 42, 86),
(356, 67, 43, 99),
(357, 67, 44, 104),
(358, 68, 36, 135),
(359, 68, 37, 245),
(360, 68, 38, 156),
(361, 68, 39, 152),
(362, 68, 40, 98),
(363, 68, 41, 167),
(364, 68, 42, 87),
(365, 68, 43, 104),
(366, 68, 44, 47),
(367, 69, 36, 135),
(368, 69, 37, 245),
(369, 69, 38, 156),
(370, 69, 39, 152),
(371, 69, 40, 198),
(372, 69, 41, 167),
(373, 69, 42, 87),
(374, 69, 43, 104),
(375, 69, 44, 147),
(376, 70, 36, 235),
(377, 70, 37, 245),
(378, 70, 38, 156),
(379, 70, 39, 152),
(380, 70, 40, 198),
(381, 70, 41, 167),
(382, 70, 42, 87),
(383, 70, 43, 114),
(384, 70, 44, 147),
(385, 71, 36, 212),
(386, 71, 37, 245),
(387, 71, 38, 166),
(388, 71, 39, 152),
(389, 71, 40, 194),
(390, 71, 41, 167),
(391, 71, 42, 87),
(392, 71, 43, 114),
(393, 71, 44, 147),
(394, 72, 36, 255),
(395, 72, 37, 245),
(396, 72, 38, 156),
(397, 72, 39, 66),
(398, 72, 40, 198),
(399, 72, 41, 167),
(400, 72, 42, 35),
(401, 72, 43, 114),
(402, 72, 44, 65),
(403, 73, 36, 255),
(404, 73, 37, 245),
(405, 73, 38, 156),
(406, 73, 39, 66),
(407, 73, 40, 198),
(408, 73, 41, 167),
(409, 73, 42, 35),
(410, 73, 43, 114),
(411, 73, 44, 265),
(412, 74, 36, 255),
(413, 74, 37, 245),
(414, 74, 38, 156),
(415, 74, 39, 66),
(416, 74, 40, 198),
(417, 74, 41, 167),
(418, 74, 42, 35),
(419, 74, 43, 114),
(420, 74, 44, 265),
(421, 75, 36, 25),
(422, 75, 37, 45),
(423, 75, 38, 56),
(424, 75, 39, 66),
(425, 75, 40, 98),
(426, 75, 41, 67),
(427, 75, 42, 35),
(428, 75, 43, 14),
(429, 75, 44, 65),
(430, 76, 36, 443),
(431, 76, 37, 234),
(432, 76, 38, 156),
(433, 76, 39, 152),
(434, 76, 40, 198),
(435, 76, 41, 65),
(436, 76, 42, 87),
(437, 76, 43, 104),
(438, 76, 44, 147),
(439, 77, 36, 443),
(440, 77, 37, 234),
(441, 77, 38, 156),
(442, 77, 39, 152),
(443, 77, 40, 198),
(444, 77, 41, 65),
(445, 77, 42, 87),
(446, 77, 43, 104),
(447, 77, 44, 147),
(448, 78, 36, 255),
(449, 78, 37, 245),
(450, 78, 38, 156),
(451, 78, 39, 152),
(452, 78, 40, 98),
(453, 78, 41, 167),
(454, 78, 42, 72),
(455, 78, 43, 114),
(456, 78, 44, 265),
(457, 79, 36, 255),
(458, 79, 37, 245),
(459, 79, 38, 156),
(460, 79, 39, 152),
(461, 79, 40, 98),
(462, 79, 41, 167),
(463, 79, 42, 72),
(464, 79, 43, 114),
(465, 79, 44, 265),
(475, 81, 36, 255),
(476, 81, 37, 245),
(477, 81, 38, 156),
(478, 81, 39, 152),
(479, 81, 40, 98),
(480, 81, 41, 167),
(481, 81, 42, 72),
(482, 81, 43, 114),
(483, 81, 44, 265),
(484, 82, 36, 255),
(485, 82, 37, 245),
(486, 82, 38, 156),
(487, 82, 39, 152),
(488, 82, 40, 98),
(489, 82, 41, 165),
(490, 82, 42, 72),
(491, 82, 43, 114),
(492, 82, 44, 265),
(493, 83, 36, 255),
(494, 83, 37, 245),
(495, 83, 38, 156),
(496, 83, 39, 152),
(497, 83, 40, 98),
(498, 83, 41, 167),
(499, 83, 42, 72),
(500, 83, 43, 114),
(501, 83, 44, 265),
(502, 84, 36, 255),
(503, 84, 37, 245),
(504, 84, 38, 156),
(505, 84, 39, 152),
(506, 84, 40, 97),
(507, 84, 41, 167),
(508, 84, 42, 72),
(509, 84, 43, 114),
(510, 84, 44, 265),
(511, 85, 36, 200),
(512, 85, 37, 200),
(513, 85, 38, 200),
(514, 85, 39, 200),
(515, 85, 40, 200),
(516, 85, 41, 200),
(517, 85, 42, 200),
(518, 85, 43, 200),
(519, 85, 44, 200),
(520, 86, 36, 200),
(521, 86, 37, 200),
(522, 86, 38, 200),
(523, 86, 39, 200),
(524, 86, 40, 200),
(525, 86, 41, 200),
(526, 86, 42, 200),
(527, 86, 43, 200),
(528, 86, 44, 200),
(529, 87, 36, 200),
(530, 87, 37, 200),
(531, 87, 38, 200),
(532, 87, 39, 200),
(533, 87, 40, 200),
(534, 87, 41, 200),
(535, 87, 42, 200),
(536, 87, 43, 200),
(537, 87, 44, 200),
(538, 88, 36, 200),
(539, 88, 37, 200),
(540, 88, 38, 200),
(541, 88, 39, 200),
(542, 88, 40, 200),
(543, 88, 41, 200),
(544, 88, 42, 200),
(545, 88, 43, 200),
(546, 88, 44, 200),
(547, 89, 36, 200),
(548, 89, 37, 200),
(549, 89, 38, 200),
(550, 89, 39, 200),
(551, 89, 40, 200),
(552, 89, 41, 200),
(553, 89, 42, 200),
(554, 89, 43, 200),
(555, 89, 44, 200),
(556, 90, 36, 200),
(557, 90, 37, 200),
(558, 90, 38, 200),
(559, 90, 39, 200),
(560, 90, 40, 200),
(561, 90, 41, 200),
(562, 90, 42, 200),
(563, 90, 43, 200),
(564, 90, 44, 200),
(565, 91, 36, 14),
(566, 91, 37, 55),
(567, 91, 38, 156),
(568, 91, 39, 152),
(569, 91, 40, 198),
(570, 91, 41, 200),
(571, 91, 42, 200),
(572, 91, 43, 200),
(573, 91, 44, 200),
(574, 92, 36, 140),
(575, 92, 37, 155),
(576, 92, 38, 156),
(577, 92, 39, 152),
(578, 92, 40, 198),
(579, 92, 41, 200),
(580, 92, 42, 200),
(581, 92, 43, 200),
(582, 92, 44, 200),
(583, 93, 36, 140),
(584, 93, 37, 155),
(585, 93, 38, 156),
(586, 93, 39, 152),
(587, 93, 40, 198),
(588, 93, 41, 200),
(589, 93, 42, 200),
(590, 93, 43, 200),
(591, 93, 44, 200),
(601, 95, 36, 0),
(602, 95, 37, 0),
(603, 95, 38, 0),
(604, 95, 39, 0),
(605, 95, 40, 0),
(606, 95, 41, 0),
(607, 95, 42, 0),
(608, 95, 43, 0),
(609, 95, 44, 0),
(610, 96, 36, 255),
(611, 96, 37, 245),
(612, 96, 38, 156),
(613, 96, 39, 152),
(614, 96, 40, 198),
(615, 96, 41, 167),
(616, 96, 42, 200),
(617, 96, 43, 114),
(618, 96, 44, 265),
(619, 97, 36, 255),
(620, 97, 37, 245),
(621, 97, 38, 156),
(622, 97, 39, 152),
(623, 97, 40, 198),
(624, 97, 41, 167),
(625, 97, 42, 200),
(626, 97, 43, 114),
(627, 97, 44, 265),
(628, 98, 36, 255),
(629, 98, 37, 245),
(630, 98, 38, 156),
(631, 98, 39, 152),
(632, 98, 40, 198),
(633, 98, 41, 167),
(634, 98, 42, 200),
(635, 98, 43, 114),
(636, 98, 44, 265);

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
(61, 31, 'color6', 'AURORA_HM6803-007_PHSRH000-2000_1000x_1.png', 'AURORA_HM6803-007_PHSYD001-2000_1000x.png', 'NIKE_VOMERO_18_400x_1 (1).png', 'AURORA_HM6803-007_PHCTH001-2000_1000x.png'),
(62, 32, 'color6', '33466f495fc4ca47f385b1e80998b2a8_1000x.png', 'fe4d07fca14355bb498737c22f756937.png', '1a881aa46a6d225eaab7a077acbf353f_1000x.png', 'b2076e5e9850f793849082d46232d471.png'),
(66, 36, 'color4', 'AURORA_FD2722-110_PHSRH000-2000.png', 'AURORA_FD2722-110_PHCFH001-2000.png', 'AURORA_FD2722-110_PHSLH000-2000.png', 'AURORA_FD2722-110_PHSYD001-2000.png'),
(67, 37, 'color6', 'AURORA_FD2722-001_PHSRH000-2000.png', 'AURORA_FD2722-001_PHSLH000-2000.png', 'AURORA_FD2722-001_PHCFH001-2000.png', 'AURORA_FD2722-001_PHCTH001-2000.png'),
(68, 38, 'color1', '232e663f9f40a9e923b9bf8be4a37a69.png', '2bc3bdfc9fc05afa883f5db094bebaad.png', '79d8d08c31d73f2dc10e579a21df432d.png', '44fdbff68bb31ca50e7e37a228d7fe6a.png'),
(69, 39, 'color3', 'AURORA_FD2723-404_PHSRH000-2000.png', 'AURORA_FD2723-404_PHSLH001-2000.png', 'AURORA_FD2723-404_PHCFH001-2000.png', 'AURORA_FD2723-404_PHCTH001-2000.png'),
(70, 40, 'color5', 'AURORA_FD2723-114_PHSRH001-2000.png', 'AURORA_FD2723-114_PHSLH000-2000.png', 'AURORA_FD2723-114_PHCFH001-2000.png', 'AURORA_FD2723-114_PHCTH001-2000.png'),
(71, 41, 'color2', 'e441f4543957aae1c1b84de9851a9754.png', '6e9edcca4b51ac39b1934574ce1a32bd.png', 'd3ffa5dc781f419e546cba47e255c53c.png', '8219cb7e4245a73855febf04e992d03f.png'),
(72, 42, 'color3', 'AURORA_HV0823-100_PHSRH000-2000.png', 'AURORA_HV0823-100_PHSLH000-2000.png', 'AURORA_HV0823-100_PHCFH001-2000.png', 'AURORA_HV0823-100_PHCTH001-2000.png'),
(73, 43, 'color5', 'a8b5dbcb37d208705cf9128052281608.png', '7984a8cdfdfd75bae678d87f9de8ef33.png', '40114dd14e7e8bfdfc38bb77b4877e7d.png', '7b277f337d2f6643a8d25de61a4df72f.png'),
(74, 44, 'color1', 'Giay-TennisPickleball-Babolat-SF.png', 'z6973982660370_cd37d51be6629bdef.png', 'z6973982666680_c6a6c987566bc1d2e.png', 'z6973982630438_a12cfe844de72e610.png'),
(75, 45, 'color2', '2-7.png', '3-8.png', '4-8.png', '6-5.png'),
(76, 46, 'color5', 'Giay-Adidas-Harden-Vol-9-Metamor.png', 'Giay-Adidas-Harden-Vol-9-Metamor1.png', 'Giay-Adidas-Harden-Vol-9-Metamor2.png', 'Giay-Adidas-Harden-Vol-9-Metamor3.png'),
(77, 47, 'color3', 'Giay-Nike-Metcon-9-AMP-work-out.png', 'Giay-Nike-Metcon-9-AMP-work-out1.png', 'Giay-Nike-Metcon-9-AMP-work-out2.png', 'Giay-Nike-Metcon-9-AMP-work-out3.png'),
(78, 48, 'color3', 'Giay-Nike-Womens-Free-Metcon-6-B.png', 'Giay-Nike-Womens-Free-Metcon-6-B1.png', 'Giay-Nike-Womens-Free-Metcon-6-B2.png', 'Giay-Nike-Womens-Free-Metcon-6-B3.png'),
(79, 49, 'color6', '51668de62f98b25fdae4c02501ac3f2c.png', 'c6ac56656191a985affe0d9fde645a0d.png', '3adab7a643f1615f429bb2e366fc33e2.png', 'b6bea339cad5443599d0d2af0b3e7d96.png'),
(81, 51, 'color5', 'DV4336-300-2_1000x.png', 'DV4336-300-3_1000x.png', 'DV4336-300-5_1000x.png', 'DV4336-300-7_1000x.png'),
(82, 52, 'color2', 'Giay-Adidas-Adistar-3-Berlin-Bro.png', 'Giay-Adidas-Adistar-3-Berlin-Bro1.png', 'Giay-Adidas-Adistar-3-Berlin-Bro2.png', 'Giay-Adidas-Adistar-3-Berlin-Bro3.png'),
(83, 53, 'color5', 'Giay-adidas-Adistar-4-Halo-Mint.png', 'Giay-adidas-Adistar-4-Halo-Mint1.png', 'Giay-adidas-Adistar-4-Halo-Mint2.png', 'Giay-adidas-Adistar-4-Halo-Mint3.png'),
(84, 54, 'color1', 'Giay-Adidas-Ultra-Boost-1.0-Beig.png', 'Giay-Adidas-Ultra-Boost-1.0-Beig1.png', 'Giay-Adidas-Ultra-Boost-1.0-Beig2.png', 'Giay-Adidas-Ultra-Boost-1.0-Beig3.png'),
(85, 55, 'color6', 'Giay_DJa_Bong_Turf_Goletto_IX_DJ.png', 'Giay_DJa_Bong_Turf_Goletto_IX_DJ1.png', 'Giay_DJa_Bong_Turf_Goletto_IX_DJ2.png', 'Giay_DJa_Bong_Turf_Goletto_IX_DJ3.png'),
(86, 56, 'color6', 'Giay_Tap_Luyen_Dropset_3_DJen_IH.png', 'Giay_Tap_Luyen_Dropset_3_DJen_IH1.png', 'Giay_Tap_Luyen_Dropset_3_DJen_IH2.png', 'Giay_Tap_Luyen_Dropset_3_DJen_IH3.png'),
(87, 57, 'color6', 'Giay_Trainer_Dropset_Control_DJe.png', 'Giay_Trainer_Dropset_Control_DJe2.png', 'Giay_Trainer_Dropset_Control_DJe1.png', 'Giay_Trainer_Dropset_Control_DJe3.png'),
(88, 58, 'color4', 'hsw011000trg__5__89e7ab550e6a4ed.png', 'hsw011000trg__4__ef695b78362a4ce.png', 'hsw011000trg__7__67671b1932864b0.png', 'hsw011000trg__2__95b00a4ebe12478.png'),
(89, 59, 'color6', 'hsm009000den__5__0f9d547a8ff8494.png', 'hsm009000den__9__c1298155ce13409.png', 'hsm009000den__3__dffaa1a73fbe49c.png', 'hsm009000den__10__33618d8ff5644f.png'),
(90, 60, 'color5', 'hsm004801xlc-2_3d0603f0869d49f8b.png', 'hsm004801xlc-1_c94e83bccdc64d16b.png', 'hsm004801xlc-5_5ecf73c60f0141e59.png', 'hsm004801xlc-7_b04b277714894d728.png'),
(91, 61, 'color1', 'hsm009900kem__1__0b887157b3a446a.png', 'hsm009900kem__3__015d308e4e70457.png', 'hsm009900kem__4__7c76e0fed2a54be.png', 'hsm009900kem__2__cd8f9ffd59a24ea.png'),
(92, 62, 'color2', 'hsm009900kem__1__0b887157b3a446a.png', 'hsm009900kem__3__015d308e4e70457.png', 'hsm009900kem__4__7c76e0fed2a54be.png', 'hsm009900kem__2__cd8f9ffd59a24ea.png'),
(93, 63, 'color5', 'ULTRA-6-ULTIMATE-AG-Football-Boo.png', 'ULTRA-6-ULTIMATE-AG-Football-Boo1.png', 'ULTRA-6-ULTIMATE-AG-Football-Boo2.png', 'ULTRA-6-ULTIMATE-AG-Football-Boo3.png'),
(95, 65, 'color5', 'Giày-tập-luyện-PWR-NITRO™-SQD-2.png', 'Giày-tập-luyện-PWR-NITRO™-SQD-21.png', 'Giày-tập-luyện-PWR-NITRO™-SQD-22.png', 'Giày-tập-luyện-PWR-NITRO™-SQD-23.png'),
(96, 66, 'color2', 'Giày-Thể-Thao-LaFrancé-RNR-Unise.png', 'Giày-Thể-Thao-LaFrancé-RNR-Unise1.png', 'Giày-Thể-Thao-LaFrancé-RNR-Unise2.png', 'Giày-Thể-Thao-LaFrancé-RNR-Unise3.png'),
(97, 67, 'color4', 'AG-unisex.png', 'AG-unisex1.png', 'AG-unisex2.png', 'AG-unisex3.png'),
(98, 68, 'color1', 'Deviate-NITRO™-Elite-3-Ekiden-Ru.png', 'Deviate-NITRO™-Elite-3-Ekiden-Ru1.png', 'Deviate-NITRO™-Elite-3-Ekiden-Ru2.png', 'Deviate-NITRO™-Elite-3-Ekiden-Ru3.png');

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

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `saleoffct`
--

CREATE TABLE `saleoffct` (
  `saleoffctid` int(11) NOT NULL,
  `saleoffid` int(11) NOT NULL,
  `procolorid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
(31, 'Giày Chạy Bộ Nam Nike Vomero 18 - Đen Trắng', 2981300, 'Nam', 'dongsp1', 'style4', 'Nike Vomero mới được thiết kế để mang lại sự thoải mái tối đa cho những buổi chạy hàng ngày. Với lớp ZoomX nhẹ xếp chồng lên ReactX đàn hồi, đây là trải nghiệm êm nhất và đệm nhất mà Nike từng tạo ra. Họa tiết đế ngoài được làm mới cũng giúp chuyển động từ gót đến mũi chân mượt mà hơn.\n\nPhần upper sử dụng lưới kỹ thuật giúp thoáng khí và mềm mại hơn.\n\nLớp đệm giữa kết hợp ZoomX siêu nhẹ ở trên với ReactX (đàn hồi hơn 13% so với công nghệ React trước đó), mang lại trải nghiệm êm ái và phản hồi tốt.\n\nCác miếng đệm được bố trí xung quanh đế ngoài giúp tăng độ linh hoạt và chuyển động mượt mà hơn từ gót đến mũi chân.\n\nLưỡi gà và phần lót được làm dày, mềm mại tạo cảm giác ôm chân dễ chịu.\n\nĐế giữa được xếp lớp mới với ZoomX cao cấp phía trên lớp ReactX, mang lại cảm giác đệm êm vượt trội.\n\nĐộ chênh gót – mũi: 10mm\n\nForm MR-10 – form dáng tốt và ổn định nhất của Nike\n\n8%Synthetic, 92%Textile'),
(32, 'Giày Thể Thao Chạy Bộ Nam Nike Pegasus Plus', 3989300, 'Nam', 'dongsp1', 'style4', 'Thân giày được làm từ chất liệu lưới thoáng khí, mang lại sự thoải mái và thông thoáng cho bàn chân trong suốt quá trình chạy. Chất liệu này giúp giày nhẹ và hỗ trợ tốt cho những buổi tập luyện dài.\n\nSử dụng công nghệ đệm **React foam** của Nike, giúp hấp thụ lực tác động và mang lại cảm giác êm ái cho mỗi bước chân. Phần đế ngoài có thiết kế gợn sóng với các rãnh giúp tăng cường độ bám và độ linh hoạt trên nhiều bề mặt khác nhau.\n\nLogo Swoosh màu bạc nổi bật trên thân giày, tạo điểm nhấn cho thiết kế tổng thể.\n\nĐôi giày có kiểu dáng thể thao, linh hoạt, phù hợp cho nhiều hoạt động từ chạy bộ đến sử dụng hàng ngày. Thiết kế đơn giản nhưng tinh tế, dễ phối với nhiều trang phục khác nhau.'),
(36, 'Giày Thể Thao Chạy Bộ Nam Nike Air Zoom Pegasus 41', 2723000, 'Nam', 'dongsp1', 'style4', 'Nike Air Zoom Pegasus 41 không chỉ dành cho những người chạy bộ chuyên nghiệp mà còn phù hợp cho mọi đối tượng, từ người mới bắt đầu đến những người thường xuyên chạy bộ. Đôi giày này cũng lý tưởng cho các hoạt động ngoài trời, đi dạo hay thậm chí là sử dụng hàng ngày nhờ vào thiết kế linh hoạt và độ bền cao.\n\nĐặc điểm\n\nCông nghệ AIR ZOOM tiên tiến của Nike, với đệm khí ở phần trước và gót giày, mang lại độ đàn hồi và phản hồi nhanh chóng cho mỗi bước chạy.\nĐế giày được thiết kế với các rãnh cắt linh hoạt, tăng cường độ bám và sự ổn định trên mọi địa hình.\nPhần upper của giày được làm từ chất liệu lưới thoáng khí, giúp duy trì sự thông thoáng và khô ráo cho đôi chân ngay cả trong những buổi chạy dài.\nĐế ngoài của giày làm từ cao su chất lượng cao, chống mài mòn tốt, đảm bảo giày luôn giữ được độ bền trong suốt quá trình sử dụng.\nĐệm phản ứng trong Pegasus mang đến một chuyến đi tràn đầy năng lượng cho việc chạy bộ đường trường hàng ngày.'),
(37, 'Giày Thể Thao Chạy Bộ Nam Nike Air Zoom Pegasus 41', 3890000, 'Nam', 'dongsp1', 'style4', 'Nike Air Zoom Pegasus 41 không chỉ dành cho những người chạy bộ chuyên nghiệp mà còn phù hợp cho mọi đối tượng, từ người mới bắt đầu đến những người thường xuyên chạy bộ. Đôi giày này cũng lý tưởng cho các hoạt động ngoài trời, đi dạo hay thậm chí là sử dụng hàng ngày nhờ vào thiết kế linh hoạt và độ bền cao.\n\nĐặc điểm\n\nCông nghệ AIR ZOOM tiên tiến của Nike, với đệm khí ở phần trước và gót giày, mang lại độ đàn hồi và phản hồi nhanh chóng cho mỗi bước chạy.\nĐế giày được thiết kế với các rãnh cắt linh hoạt, tăng cường độ bám và sự ổn định trên mọi địa hình.\nPhần upper của giày được làm từ chất liệu lưới thoáng khí, giúp duy trì sự thông thoáng và khô ráo cho đôi chân ngay cả trong những buổi chạy dài.\nĐế ngoài của giày làm từ cao su chất lượng cao, chống mài mòn tốt, đảm bảo giày luôn giữ được độ bền trong suốt quá trình sử dụng.\nĐệm phản ứng trong Pegasus mang đến một chuyến đi tràn đầy năng lượng cho việc chạy bộ đường trường hàng ngày.'),
(38, 'Giày Thể Thao Chạy Bộ Nữ Nike W Air Zoom Pegasus 41 Prm', 2219500, 'Nữ', 'dongsp1', 'style4', 'Đệm phản ứng trong Pegasus mang đến một chuyến đi tràn đầy năng lượng cho việc chạy bộ đường trường hàng ngày. Trải nghiệm khả năng phục hồi năng lượng nhẹ hơn với các đơn vị Air Zoom kép và đế giữa bằng bọt ReactX. Thêm vào đó, lưới kỹ thuật cải tiến ở phần trên giúp giảm trọng lượng và tăng khả năng thoáng khí.\n\nMặt trên bằng lưới kỹ thuật thoáng khí được nâng cấp\nĐế giữa bằng bọt ReactX bao quanh phần trước bàn chân và gót chân với công nghệ Air Zoom mang đến cảm giác di chuyển tràn đầy năng lượng.\nĐế ngoài bằng cao su lấy cảm hứng từ bánh quế đặc trưng tạo độ bám đường và độ linh hoạt\nCổ giày, lưỡi giày và lót giày bằng vải nhung tạo sự vừa vặn và thoải mái\nCó gì mới? Đế giữa bằng bọt ReactX hoàn toàn mới có độ phản hồi tốt hơn 13% so với công nghệ React trước đây.\nĐược chế tạo để có hiệu suất và thân thiện với môi trường, bọt ReactX được thiết kế để giảm lượng khí thải carbon ít nhất 43% trong một đôi đế giữa do giảm năng lượng trong quá trình sản xuất so với bọt React trước đây.'),
(39, 'Giày Thể Thao Chạy Bộ Nữ Nike W Air Zoom Pegasus 41', 3890000, 'Nữ', 'dongsp1', 'style4', 'Đặc điểm\n\nMặt trên bằng lưới kỹ thuật thoáng khí được nâng cấp\nĐế giữa bằng bọt ReactX bao quanh phần trước bàn chân và gót chân với công nghệ Air Zoom mang đến cảm giác di chuyển tràn đầy năng lượng.\nĐế ngoài bằng cao su lấy cảm hứng từ bánh quế đặc trưng tạo độ bám đường và độ linh hoạt\nCổ giày, lưỡi giày và lót giày bằng vải nhung tạo sự vừa vặn và thoải mái\nCó gì mới? Đế giữa bằng bọt ReactX hoàn toàn mới có độ phản hồi tốt hơn 13% so với công nghệ React trước đây.\nĐược chế tạo để có hiệu suất và thân thiện với môi trường, bọt ReactX được thiết kế để giảm lượng khí thải carbon ít nhất 43% trong một đôi đế giữa do giảm năng lượng trong quá trình sản xuất so với bọt React trước đây.'),
(40, 'Giày Thể Thao Chạy Bộ Nữ Nike W Air Zoom Pegasus 41', 3890000, 'Nữ', 'dongsp1', 'style4', 'Đặc điểm\n\nMặt trên bằng lưới kỹ thuật thoáng khí được nâng cấp\nĐế giữa bằng bọt ReactX bao quanh phần trước bàn chân và gót chân với công nghệ Air Zoom mang đến cảm giác di chuyển tràn đầy năng lượng.\nĐế ngoài bằng cao su lấy cảm hứng từ bánh quế đặc trưng tạo độ bám đường và độ linh hoạt\nCổ giày, lưỡi giày và lót giày bằng vải nhung tạo sự vừa vặn và thoải mái\nCó gì mới? Đế giữa bằng bọt ReactX hoàn toàn mới có độ phản hồi tốt hơn 13% so với công nghệ React trước đây.\nĐược chế tạo để có hiệu suất và thân thiện với môi trường, bọt ReactX được thiết kế để giảm lượng khí thải carbon ít nhất 43% trong một đôi đế giữa do giảm năng lượng trong quá trình sản xuất so với bọt React trước đây.'),
(41, 'Giày Thể Thao Chạy Bộ Nữ Nike Wmns Nike Air Winflo 11', 1584500, 'Nữ', 'dongsp1', 'style4', 'Công nghệ Zoom Air được sử dụng ở phần đế trước và sau, mang đến sự êm ái, bùng nổ năng lượng và hỗ trợ tốt cho từng bước di chuyển của bạn.\nLớp bọt Cushlon được sử dụng ở phần đế giữa, giúp tăng cường độ êm ái và hỗ trợ lực cho bàn chân.\nLưới Flyknit được sử dụng cho phần upper, giúp ôm sát bàn chân, tạo sự thông thoáng và thoải mái tối đa.\nKiểu dáng ôm sát giúp cố định bàn chân, hạn chế tối đa tình trạng vẹo cổ chân và mang lại cảm giác an toàn khi di chuyển.\nĐế ngoài cao su với các rãnh chống trơn trượt giúp tăng độ bám và độ bền cho đôi giày.\nGam màu “Phantom” (trắng/xám/đen) tinh tế cùng những đường nét hiện đại, mang đến vẻ ngoài thời trang và năng động.'),
(42, 'Giày Thể Thao Bóng Rổ Nữ Nike Wmns Air Jordan 4 Retro', 4759300, 'Nữ', 'dongsp1', 'style2', 'Hãy ngắm nhìn một diện mạo mới của đôi AJ4 đặc biệt này. Được chế tác từ da trắng cao cấp, kết hợp các chi tiết nhôm đúc và hoa vải chenille có thể tháo rời, đôi giày mang đến một nét thanh lịch mới mẻ cho thiết kế đình đám ra mắt năm 1989.\n\nChất liệu: 56%Leather, 36%Synthetic, 8%Textile'),
(43, 'Giày Thể Thao Bóng Rổ Nữ Nike Sabrina 1 Ep', 1829500, 'Nữ', 'dongsp1', 'style2', 'Giày Thể Thao Bóng Rổ Nữ Nike Sabrina 1 Ep không chỉ thu hút các vận động viên bóng rổ nữ chuyên nghiệp mà còn cả những cô nàng năng động yêu thích phong cách thể thao cá tính. Đôi giày này hội tụ đầy đủ những yếu tố về thiết kế thời trang, chất liệu bền bỉ và công nghệ hỗ trợ tiên tiến, hứa hẹn sẽ mang đến trải nghiệm tuyệt vời cả trên sân bóng lẫn ngoài đường phố.\n\nThân giày với sự pha trộn màu sắc cá tính: nền Xám Xương Rồng (Dusty Cactus) tạo nên vẻ ngoài năng động và nổi bật.\nKiểu dáng gọn gàng, ôm vừa vặn cho cảm giác thoải mái và linh hoạt khi di chuyển.\nMặt lưới dệt thoáng khí đảm bảo sự thoải mái trong suốt quá trình vận động, không lo hầm bí khó chịu.\nLớp phủ overlays gia cố ở những vị trí quan trọng tăng cường độ bền cho giày.\nĐế giữa với sự kết hợp giữa bộ phận Zoom Air đặt ở mũi giày và lớp React foam toàn bộ chiều dài mang đến khả năng giảm chấn và hoàn trả năng lượng tuyệt vời, giúp bạn bật nhảy cao hơn và di chuyển nhanh nhẹn hơn.\nĐế cao su bền bỉ với các rãnh dọc cung cấp độ bám tốt trên nhiều bề mặt khác nhau, từ sân bóng trong nhà đến sàn tập gym hay đường phố.'),
(44, 'Giày Nike Sabrina 2 x Titan ‘Make Space’ HQ1846-001', 3790000, 'Nữ', 'dongsp1', 'style2', 'Giày Nike Sabrina 2 x Titan ‘Make Space’ là một phiên bản đặc biệt, kết quả của sự hợp tác giữa Nike và tạp chí thể thao/van hóa nổi tiếng Titan.\n\nÝ tưởng & Câu chuyện: Mẫu giày này được lấy cảm hứng từ chủ đề “Make Space” (Tạo không gian) – khuyến khích việc tạo ra không gian cho bản thân, cho cộng đồng và cho sự phát triển cả trong lẫn ngoài sân đấu. Thiết kế phản ánh tinh thần của vận động viên Sabrina Ionescu: sự tự tin, đa chiều và luôn hướng về tương lai.\n\nThiết kế: Đôi giày sở hữu một tông màu tối giản nhưng cực kỳ tinh tế. Đế ngoài và phần upper chủ đạo là màu Xám bạc kim loại sang trọng, điểm xuyết các chi tiết màu Cam ánh kim nổi bật ở phần đệm lưỡi gà, logo Swoosh và dây giày. Cụm từ “Make Space” được in trên đế giữa, hoàn thiện diện mạo độc đáo và đầy ý nghĩa.\n\nCông nghệ: Kế thừa những công nghệ hàng đầu của dòng Sabrina 2, đôi giày trang bị đệm Zoom Air phản hồi nhanh cho hiệu suất vượt trội, cùng độ bám sân và hỗ trợ ổn định, phù hợp cho thi đấu và tập luyện bóng rổ chuyên nghiệp.\n\nĐây không chỉ là một đôi giày bóng rổ hiệu năng cao, mà còn là một tác phẩm nghệ thuật thể hiện cá tính mạnh mẽ và tư duy tiến bộ, dành cho những người dám khẳng định vị trí của mình.'),
(45, 'Giày Nike KD18 ‘Aunt Pearl’ HV1997-600/HV1999-600', 4790000, 'Nữ', 'dongsp1', 'style2', 'Nike KD18 ‘Aunt Pearl’ là phiên bản đặc biệt đầy ý nghĩa trong dòng giày signature của siêu sao Kevin Durant, được ra mắt để tiếp tục truyền thống tôn vinh người dì quá cố – “Aunt Pearl” – người đã nuôi dưỡng và ủng hộ anh. Với thiết kế mang thông điệp về tình yêu thương, sự kiên cường và hy vọng, đây là một trong những mẫu giày đầy cảm xúc nhất của KD.\n\nPhiên bản này sở hữu phối màu hồng pastel dịu nhẹ làm chủ đạo, kết hợp cùng các điểm nhấn màu xanh ngọc và trắng, tạo nên một diện mạo vừa thanh lịch, vừa nổi bật. Các họa tiết hoa hồng được in hoặc thêu tinh xảo trên thân giày, cùng dòng chữ “Aunt Pearl” là những chi tiết đặc trưng, thể hiện sự trân trọng và lòng tri ân sâu sắc.\n\nVề hiệu năng, KD18 ‘Aunt Pearl’ được trang bị công nghệ đệm đỉnh cao với đơn vị Zoom Air toàn bàn chân kết hợp đế giữa bằng foam, mang lại khả năng phản hồi năng lượng xuất sắc, độ ổn định và cảm giác êm ái vượt trội cho mọi động tác chạy, cắt và bật nhảy.\n\nTóm lại, Nike KD18 ‘Aunt Pearl’ không chỉ là một công cụ hỗ trợ thi đấu hiệu suất cao, mà còn là một biểu tượng đẹp đẽ về tình yêu gia đình, sự ghi nhớ và sức mạnh vượt qua nghịch cảnh, dành cho mọi người chơi bóng rổ có gu và trái tim ấm áp.'),
(46, 'Giày Adidas Harden Vol 9 ‘Metamorphosis’ JH6484', 3390000, 'Nam', 'dongsp2', 'style2', 'Trong thế giới bóng rổ đỉnh cao, nơi tốc độ, kỹ thuật và sự sáng tạo là chìa khóa chiến thắng, những đôi giày thi đấu không chỉ là công cụ hỗ trợ, mà còn là biểu tượng của phong cách và cá tính. Adidas Harden Vol. 9 ‘Metamorphosis’ JH6484 là minh chứng rõ nét cho sự kết hợp giữa công nghệ tiên tiến và tinh thần nghệ thuật đậm chất “Harden”.\n\nTừ cái nhìn đầu tiên, đôi giày gây ấn tượng mạnh với phối màu ‘Metamorphosis’ – tượng trưng cho sự lột xác, biến hóa và bứt phá. Gam màu nổi bật với các mảng đen, xanh lá, tím và hồng neon đan xen trên nền thiết kế góc cạnh, mô phỏng quá trình tiến hóa, như cách Harden luôn thay đổi, sáng tạo không ngừng trong lối chơi của mình. Đây là một thiết kế không dành cho sự mờ nhạt – mà dành cho những người luôn muốn tạo dấu ấn riêng.\n\nVề công nghệ, Harden Vol. 9 được trang bị đệm Lightstrike cao cấp, cho cảm giác nhẹ, phản hồi nhanh, hỗ trợ tối đa trong những pha tăng tốc và đổi hướng bất ngờ. Cấu trúc đế thấp, ổn định, đặc biệt phù hợp với lối chơi linh hoạt và những cú crossover mang thương hiệu Harden. Lớp lưới kỹ thuật ở thân giày giúp tăng độ thoáng khí, đồng thời ôm chân chắc chắn, nâng cao cảm giác kiểm soát trong từng chuyển động.\n\nPhần đế ngoài sử dụng cao su bền bỉ với hoa văn rãnh đa hướng, tối ưu độ bám trên mặt sân trong nhà, đảm bảo người chơi luôn kiểm soát được tốc độ và hướng đi. Phần cổ giày dạng mid-cut kết hợp lớp đệm mềm ở cổ chân giúp cố định tốt mà không gây cứng hoặc gò bó.\n\nAdidas Harden Vol. 9 ‘Metamorphosis’ JH6484 không chỉ là một đôi giày thi đấu chuyên nghiệp – nó còn là biểu tượng cho tinh thần sáng tạo, sự biến hóa linh hoạt và bản lĩnh dẫn đầu. Dành cho những ai không ngại nổi bật, không ngại khác biệt và luôn sẵn sàng làm chủ sân chơi theo cách riêng của mình.'),
(47, 'Giày Nike Metcon 9 AMP work-out ‘Black Deep Night’ HF1098-001', 3990000, 'Nam', 'dongsp1', 'style3', 'Nike Metcon 9 AMP Workout ‘Black Deep Night’ HF1098-001 là một đôi giày thể thao chuyên dụng, được thiết kế đặc biệt để hỗ trợ các hoạt động thể dục thể thao cường độ cao. Với công nghệ đệm Nike React Foam, đế cao su bền bỉ, cùng thiết kế tối ưu cho sự ổn định và linh hoạt, đôi giày này không chỉ giúp bạn đạt hiệu suất cao trong các buổi tập, mà còn mang lại sự thoải mái tối đa. Nếu bạn đang tìm kiếm một đôi giày thể thao bền bỉ, chắc chắn và phong cách để phục vụ cho các bài tập luyện, đây là lựa chọn tuyệt vời.'),
(48, 'Giày Nike Women’s Free Metcon 6 ‘Blue Tint Armory Navy’ FJ7126-402', 3390000, 'Nữ', 'dongsp1', 'style3', 'Nike Women’s Free Metcon 6 ‘Blue Tint Armory Navy’ là một lựa chọn tuyệt vời cho phụ nữ tập luyện đa năng, kết hợp sự linh hoạt cần thiết cho các bài cardio với sự ổn định cần thiết cho việc nâng tạ. Phối màu xanh nhạt và xanh navy tươi mát mang lại vẻ ngoài năng động cho người mang. Đây là một đôi giày được thiết kế để giúp bạn đạt được hiệu suất tốt nhất trong mọi buổi tập.'),
(49, 'Giày Thể Thao Bóng Đá Sân Cỏ Nhân Tạo Nam Nike ZOOM VAPOR 15 PRO TF', 1519600, 'Nam', 'dongsp1', 'style1', 'Upper làm từ da tổng hợp cao cấp và sợi dệt. Trên bề mặt upper là các vân Hyperscreen 3D được thiết kế để mang lại cảm giác thật chân khi chạm và rê bóng ở tốc độ cao.\n\nỞ thế hệ 15 này, hãng đã phủ thêm lớp NikeSkin trên bề mặt upper làm tăng độ bám bóng, từ đó có thể kiểm soát bóng và rê bóng tốt hơn. Cấu trúc Speed Cage bên dưới bề mặt upper được làm từ chất liệu mỏng nhưng cực kỳ chắc chắn sẽ mang đến sự ôm chân vừa khít, đồng thời hạn chế sự xê dịch chân trong giày khi thi đấu ở cường độ cao.\n\nPhần lưỡi gà liền và cổ giày với chất liệu vải dệt có độ co giãn cao, hạn chế tình trạng tức vùng mu bàn chân đối với những anh em có mu bàn chân dày.\n\nLớp lót gót giày được làm từ vải nhung, mang lại cảm giác ôm chân thoải mái.\n\nBộ đệm vẫn giữ nguyên công nghệ Zoom Air như ở đời 14. Bộ đệm này không chỉ làm giảm phản lực từ bề mặt sân cứng lên các khớp gối, mà còn mang lại cảm giác êm ái và đàn hồi cho đôi chân. Đây là bộ đệm Zoom Air đầu tiên được thiết kế dành riêng cho bóng đá.\n\nĐế ngoài làm từ chất liệu cao su cao cấp với các đinh dạng Elip lớn nhỏ khác nhau, hỗ trợ khả năng xử lý bóng bằng gầm và tăng cường độ bám sân.\n\n'),
(51, 'Giày Thể Thao Bóng Đá Sân Cỏ Nhân Tạo Nam Nike Tiempo Legend 10 Pro TF Ready', 1639600, 'Nam', 'dongsp1', 'style1', 'Tiempo 10 là một phiên bản giày đá banh thế hệ mới làm từ chất liệu tổng hợp thay vì da Kangaroo sau khi Nike đã chính thức thông báo ngưng sử dụng da Kangaroo cho các phiên bản giày đá banh thế hệ tiếp theo của mình. Tiempo Legend 10 phù hợp cho các vị trí thiên về kiểm soát và chuyền bóng như trung vệ, tiền vệ trung tâm.\n\nPhần upper được làm bằng da tổng hợp kết hợp cùng cổ thun quanh vùng mắt cá chân được xử lý cẩn thận tạo nên sự mềm mại, co giãn tuyệt đối, giúp form giày ôm sát vào chân giúp cầu thủ có cảm giác chạm bóng tự nhiên và chân thật nhất nhưng vẫn cảm thấy thoải mái sau nhiều giờ chơi bóng.\n\nCác lớp foam (bọt) ở thế hệ thứ 9 đã được lược bỏ bớt thay vào đó các đường kẻ Microdots khuếch đại các vùng cảm ứng tiếp xúc bóng giúp người chơi kiểm soát tốt hơn\n\nMặc dù không được tích hợp bộ đệm React giống như người tiền nhiệm, thế nhưng, bộ đệm mới của Legend 10 Pro mang lại nhiều cảm giác êm ái và đàn hồi hơn trước.'),
(52, 'Giày Adidas Adistar 3 Berlin ‘Brown’ ID6173', 2690000, 'Nam', 'dongsp2', 'style4', 'Lấy cảm hứng từ nét đặc trưng đường phố Berlin – nơi giao thoa giữa lịch sử và sự năng động hiện đại, mẫu Adidas Adistar 3 Berlin ‘Brown’ mang đến cho bạn một trải nghiệm thời trang hoàn hảo, kết hợp giữa vintage và contemporary.\nĐôi giày đa năng, đậm chất thành thị cho mọi lứa tuổi\nGiày Adidas Adistar 3 Berlin ‘Brown’ ID6173 là lựa chọn tuyệt vời cho những ai yêu thích phong cách cổ điển pha lẫn hiện đại, muốn một đôi giày vừa thời trang vừa tiện dụng trong mọi hoàn cảnh.'),
(53, 'Giày adidas Adistar 4 ‘Halo Mint Zero Metalic’ JR0287', 3490000, 'Nữ', 'dongsp2', 'style4', 'Khi nhắc đến những đôi giày chạy bộ đường dài có độ đệm êm ái và ổn định hàng đầu, dòng Adistar của adidas luôn là cái tên được tin tưởng. Phiên bản mới nhất – Adistar 4 ‘Halo Mint Zero Metallic’ (JR0287) – là minh chứng rõ ràng cho sự kết hợp giữa hiệu năng tối ưu và thiết kế tươi mới, hiện đại, mang lại trải nghiệm chạy bộ mượt mà và đáng tin cậy trên mọi cung đường.\n\nMàu sắc thanh lịch, hiện đại\nMàu xanh bạc hà dịu mắt Halo Mint phối cùng sắc ánh kim Zero Metallic tạo nên tổng thể tươi sáng và sang trọng. Đây là một lựa chọn hoàn hảo cho người yêu thích sự nhẹ nhàng, tinh tế nhưng vẫn muốn nổi bật giữa đám đông.\n\nĐệm REPETITOR êm ái – Hoạt động bền bỉ\nAdistar 4 sử dụng lớp đệm REPETITOR và REPETITOR+ đặc trưng của dòng giày chạy dài, mang lại sự êm ái tối đa nhưng vẫn đủ độ phản hồi để giữ nhịp chạy ổn định và thoải mái, đặc biệt trong các buổi chạy lâu hoặc phục hồi.\n\nThiết kế tối ưu cho chạy đường dài\nForm giày được thiết kế với gót tròn giúp chuyển tiếp từ gót đến mũi chân mượt mà hơn – điều cực kỳ quan trọng cho các bước chạy ổn định và tiết kiệm năng lượng. Phần thân trên làm bằng lưới kỹ thuật thoáng khí, ôm chân vừa vặn mà vẫn dễ chịu suốt thời gian dài vận động.\n\nĐế ngoài Continental – Bám đường tốt, chống mài mòn\nGiống như nhiều mẫu cao cấp khác của adidas, đế ngoài của Adistar 4 được làm từ cao su Continenta – mang lại độ bám vượt trội và độ bền cao trên cả đường khô lẫn ướt.'),
(54, 'Giày Adidas Ultra Boost 1.0 ‘Beige Gold’ JH9212', 5625000, 'Nam', 'dongsp2', 'style4', 'Khi nhắc đến sự kết hợp giữa hiệu năng thể thao đỉnh cao và thiết kế thời trang hiện đại, không thể không kể đến dòng Adidas Ultra Boost – biểu tượng công nghệ của Adidas trong thế giới giày chạy bộ. Phiên bản Ultra Boost 1.0 ‘Beige Gold’ JH9212 không chỉ kế thừa những tinh hoa vượt trội về hiệu năng, mà còn mang trên mình vẻ ngoài tinh tế, sang trọng với phối màu độc đáo, đầy cuốn hút.\n\nĐôi giày sở hữu phối màu beige (màu be) thanh lịch làm chủ đạo, kết hợp cùng các điểm nhấn vàng gold ánh kim nhẹ nhàng ở phần logo ba sọc và gót giày. Sự hòa quyện giữa tông màu trung tính và ánh vàng tạo nên một tổng thể vừa trang nhã, vừa đẳng cấp – thích hợp cho cả các tín đồ sneaker yêu thời trang lẫn những vận động viên yêu cầu cao về mặt kỹ thuật.\n\nPhần upper của Ultra Boost 1.0 ‘Beige Gold’ sử dụng chất liệu Primeknit dệt kim linh hoạt, ôm sát bàn chân nhưng vẫn đảm bảo độ thoáng khí tối đa. Kiểu dệt nguyên bản 1.0 mang lại cảm giác “vintage” nhưng vẫn rất hiện đại, nhấn mạnh vào sự thoải mái và nhẹ nhàng trong từng bước đi.\n\nKhông thể không nhắc đến phần đế giữa được trang bị công nghệ BOOST trứ danh, mang lại độ đàn hồi cao, hấp thụ lực tốt và hỗ trợ hoàn hảo cho các hoạt động di chuyển cường độ cao. Cho dù bạn sử dụng để chạy bộ, tập luyện hay đi bộ hàng ngày, BOOST luôn mang lại cảm giác “như đang bật nảy trên mây”.\n\nPhần đế ngoài sử dụng chất liệu cao su Continental™ cao cấp – chống trượt, bền bỉ và có độ bám tốt trên nhiều địa hình khác nhau. Thiết kế này không chỉ giúp tăng độ bền cho giày mà còn đảm bảo sự ổn định trong từng bước chân, kể cả khi thời tiết ẩm ướt.\n\nAdidas Ultra Boost 1.0 ‘Beige Gold’ JH9212 không đơn thuần là một đôi giày thể thao – nó là biểu tượng của sự sang trọng, tiện dụng và đổi mới. Dành cho những ai theo đuổi sự thoải mái nhưng không muốn đánh đổi tính thẩm mỹ, đây là đôi giày lý tưởng để sử dụng cả trong tập luyện lẫn thời trang hằng ngày.'),
(55, 'Giày Đá Bóng Turf Goletto IX', 1000000, 'Nam', 'dongsp2', 'style1', 'Đôi giày đá bóng bền chắc với đế ngoài phù hợp cho sân cỏ nhân tạo.\nHãy mang đôi giày đá bóng adidas Goletto IX này và sẵn sàng tỏa sáng. Thân giày bằng chất liệu tổng hợp mềm mại có đệm lót và các lỗ đục ở đúng những vị trí cần thiết giúp bạn luôn thoải mái khi di chuyển. Bên dưới là đế đinh bằng cao su cho lối chơi tốc độ trên sân cỏ nhân tạo.'),
(56, 'Giày Tập Luyện Dropset 3', 3500000, 'Nam', 'dongsp2', 'style3', 'Đôi giày tập luyện tăng cường sự ổn định tối ưu.\nTừ bài nâng tạ đến các động tác kéo – đẩy, giày trainer Dropset 3 luôn đảm bảo độ hỗ trợ vững chắc cho buổi tập luyện sức mạnh. Đế giữa hai lớp mật độ giúp giảm chấn hiệu quả suốt các hiệp tập cường độ cao, trong khi thành đế giày TPU bên hông cố định vững chắc phần giữa bàn chân. Công nghệ adidas HEAT.RDY giúp đôi chân luôn mát mẻ, ngay cả khi buổi tập trở nên nóng hơn. Giày trainer được thiết kế rộng hơn kiểu dáng thông thường, mang lại cảm giác thoải mái và linh hoạt, ngay cả khi bàn chân sưng nhẹ do vận động mạnh.'),
(57, 'Giày Trainer Dropset Control', 2400000, 'Nam', 'dongsp2', 'style3', 'Giày nâng tạ chắc chắn, hỗ trợ bám sàn ở mọi hướng di chuyển.\nMuốn xây dựng sức mạnh, cần bắt đầu từ một nền tảng vững chắc. Đôi giày tập luyện adidas này giúp bạn giữ vững tư thế khi nâng tạ nặng. Thiết kế rộng rãi cùng đế giữa ổn định mang đến nền tảng vững chắc cho việc nâng tạ. Hệ thống xoắn TPU ở giữa bàn chân tăng cường nâng đỡ cho các chuyển động linh hoạt. Phần thân giày bằng lưới giúp bàn chân luôn thoáng mát và thoải mái trong suốt quá trình nâng tạ.'),
(58, 'Giày Chạy Bộ Bitis Hunter Running Nữ Màu Trắng HSW011000TRG', 1256000, 'Nữ', 'dongsp3', 'style4', 'GIÀY BITIS HUNTER RUNNING NỮ - HIỆU SUẤT CAO, ĐÀN HỒI VƯỢT TRỘI\n\n(Sản phẩm: Giày Chạy Bộ Performance Nữ Màu Trắng/Xám)\n\nGIỚI THIỆU CHUNG\n\nMẫu Giày Bitis Hunter Running Nữ là dòng sản phẩm hiệu suất cao, được thiết kế để tối ưu hóa trải nghiệm chạy bộ của bạn. Với công nghệ đế PHYLON/CAO SU tiên tiến, giày đảm bảo độ ĐÀN HỒI TỐT, ÊM CHÂN và sự VỮNG CHẮC cần thiết. Thiết kế hiện đại, màu Trắng/Xám phù hợp cho cả đường chạy và phòng gym.\nHiệu Suất Tối Đa: Đế Phylon/Cao Su mang lại độ bật nảy và đàn hồi cao, hỗ trợ lực đẩy tốt hơn trong mỗi bước chạy.\n\nAn Toàn: Cấu trúc giày vững chắc và đế chống trơn trượt đảm bảo an toàn khi chạy trên nhiều địa hình.\n\nThoáng Khí: Quai Dệt Jacquard giúp chân luôn khô ráo và thoải mái, ngay cả khi tập luyện cường độ cao.\n'),
(59, 'Giày Thể Thao Bitis Hunter Core Nam Màu Đen HSM009000DEN', 849000, 'Nam', 'dongsp3', 'style3', 'Giày thể thao nam Bitis Hunter Core HSM009000DEN là sự kết hợp hoàn hảo giữa thiết kế năng động, phong cách hiện đại và hiệu suất tối ưu dành cho các hoạt động thể thao hằng ngày như đi bộ, chạy bộ....\n\nVới tông màu đen – xám mạnh mẽ cùng logo “Hunter” nổi bật, sản phẩm không chỉ thời trang mà còn mang đến trải nghiệm thoải mái vượt trội nhờ phần đế EVA siêu nhẹ và lót giày êm ái. Lưới vải dệt (knit) thoáng khí giúp giữ đôi chân luôn khô thoáng trong mọi điều kiện vận động.'),
(60, 'Giày Thể Thao Bitis Hunter Running LiteDual - Original Edition 2K24 Nam Màu Xanh Lá Cây HSM004801XLC', 629500, 'Nam', 'dongsp3', 'style4', 'Công nghệ LiteDual:\n\n- Bộ đế 2 lớp phylon kết hợp cao su cao cấp\n. Lớp đệm (Cushioning layer) mềm nhẹ, tạo độ êm chân\n\n. Lớp cứng (Stiffening layer) tăng độ cứng cho đế giữa, tạo độ nảy cho bước chạy\n- Đế ngoài cao su cùng công nghệ co-molding tiên tiến hạn chế bong tróc.\n\nLót đế nâng đỡ lòng bàn chân Active Support:\n\n- Định hình tiếp đất, ổn định bước chạy, hạn chế xô lệch cổ chân.\n\nUpper Airmesh kết hợp Jacquard cùng công nghệ ép nosew: \n\n- Thoáng khí, ôm chân, chống giãn và bền chặt.\n\nTrọng lượng siêu nhẹ:\n\n- Chỉ 300g mỗi chiếc, mang đến sự nhẹ nhàng, thoải mái tuyệt đối.'),
(61, 'Giày Thể Thao Bitis Hunter Litebound Nam Màu Kem HSM009900KEM', 1255000, 'Nam', 'dongsp3', 'style3', 'GIÀY THỂ THAO ĐA NĂNG HUNTER LITEBOUND - ÊM ÁI VÀ BỀN BỈ CHO CẢ NGÀY DÀI\n\n(Sản phẩm: Giày thể thao màu Xám Khói/Xám Đậm)\n\nGIỚI THIỆU CHUNG\n\nHunter Litebound là mẫu giày thể thao nam lý tưởng cho phong cách sống năng động. Với gam màu Xám Khói tinh tế, sản phẩm không chỉ là điểm nhấn thời trang mà còn mang lại sự thoải mái vượt trội nhờ công nghệ đế REBOUND 1.0 độc quyền. Đây là lựa chọn hoàn hảo cho những người cần một đôi giày êm ái, bền bỉ để đi lại, đi làm hoặc đi bộ trong thời gian dài.'),
(62, 'Giày Thể Thao Bitis Hunter Litebound Nữ Màu Hồng HSW010700HOG', 1175000, 'Nữ', 'dongsp3', 'style3', 'GIÀY BITIS HUNTER LITEBOUND NỮ - MÀU HỒNG NGỌT NGÀO: CÔNG NGHỆ ĐẾ REBOUND 1.0 ĐỘC QUYỀN\n\nSở hữu phối màu Hồng dịu dàng và thanh lịch, mẫu Giày Bitis Hunter Litebound Nữ mang mã HSW010700 là biểu tượng của sự kết hợp giữa thời trang nữ tính và công nghệ vận động đỉnh cao.\n\nĐẶC ĐIỂM NỔI BẬT VÀ CÔNG NGHỆ ĐỘC QUYỀN\n\nCông nghệ đế Rebound 1.0: Đệm nhựa EVA tiên tiến giúp giảm tải trọng lực lên chân, mang lại sự ÊM ÁI VÀ LINH HOẠT tuyệt vời trong từng bước đi.\n\nSiêu Nhẹ vượt trội: Nhẹ hơn 12% so với các dòng giày cùng loại, trọng lượng chỉ khoảng 275g/chiếc, giúp bạn di chuyển cả ngày mà không thấy mệt mỏi.\n\nĐộ đàn hồi & Hoàn trả năng lượng tốt: Đế giày độ nảy cao giúp hoàn trả năng lượng tốt, đồng thời chịu được sức nặng cơ thể mà KHÔNG BỊ XẸP hay biến dạng.\n\nAn toàn tuyệt đối: Đế cao su với các rãnh ma sát giúp CHỐNG TRƠN TRƯỢT tốt trên nhiều bề mặt như đường nhựa hay sàn gạch men.'),
(63, 'ULTRA 6 ULTIMATE AG Football Boots', 5300000, 'Nam', 'dongsp4', 'style1', '\nPRODUCT STORY\nKick into sixth gear with ULTRA 6, now featuring an updated, engineered mesh upper. PWRTAPE support frame stabilizes the foot inside of the boot without hindering agility and freedom of movement. With its lightweight outsole and rounded studs engineered specifically for optimal traction on artificial grass, this football boot puts the speed and sensation of a finely tuned machine at your feet. Play at full throttle.'),
(65, 'Giày tập luyện PWR NITRO™ SQD 2', 1920000, 'Nam', 'dongsp4', 'style3', 'CÂU CHUYỆN SẢN PHẨM\nTập luyện chăm chỉ và vượt qua giới hạn với PWR NITRO™ SQD 2. Công nghệ NITRO™ SQD mang lại năng lượng bùng nổ và hỗ trợ toàn diện. Độ bám PUMAGRIP giúp bám chặt mọi bề mặt. Tạo ra thành tích đỉnh cao và san phẳng mọi kỷ lục. Đôi giày tập này giải phóng sức mạnh của bạn.'),
(66, 'Giày Thể Thao LaFrancé RNR Unisex', 3000000, 'Nữ', 'dongsp1', 'style2', 'CÂU CHUYỆN SẢN PHẨM\nChúng tôi đã thu thập các hiện vật từ thế giới siêu nhiên để chứng minh một cách chắc chắn rằng Melo đến từ hành tinh khác. Ngôi sao mới nhất của Bảo tàng Heem là LaFrancé RNR. RNR kết hợp phong cách đường phố với phong cách ngoài trời phản địa đàng và được tạo ra với sự hợp tác của thương hiệu phong cách sống LaFrancé của Melo. Đó là một hiện vật có tiềm năng vô hạn.'),
(67, 'Giày Đá Bóng FUTURE 8 MATCH FG/AG unisex', 2100000, 'Nữ', 'dongsp4', 'style1', 'CÂU CHUYỆN SẢN PHẨM\nCác nhà kiến tạo, hãy giải phóng sự sáng tạo của bạn với FUTURE 8 MATCH. Phần trên dạng lưới mềm, nhẹ cải thiện độ vừa vặn và ổn định trong khi các đường lưới nổi với lớp phủ GripControl tăng cường độ bám lên quả bóng. Hình dạng đinh tán và vị trí xung quanh điểm trục tạo nên sự nhanh nhẹn 360 độ và tự do di chuyển, vì vậy bạn có thể dễ dàng thoát khỏi hậu vệ.'),
(68, 'Deviate NITRO™ Elite 3 Ekiden Running Shoes Men', 5950000, 'Nam', 'dongsp4', 'style4', 'PRODUCT STORY\nHit turbo speed. The Deviate NITRO Elite 3 is a running shoe redesigned for lightweight, race day propulsion. A carbon fiber PWRPLATE ensures stability and maximum running efficiency, while NITROFOAM  Elite offers supreme cushioning that wont weigh you down. Its a running go-to made with lightweight mono-mesh and durable PUMAGRIP rubber for multi-surface traction and an effortless run. This version celebrates Japans famous race and shows off a unique colour concept to be sure you stand out on the road.');

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
(23, 'kh1', '$2y$10$mYNyqp0zJXx/KvlbqmsciOSQBT7cK.fLLtz20r/IUs2E6/1iljPfO'),
(24, 'kh2', '$2y$10$WXmqQyknmIEMf/7.227bh.LD67TVrWuUhF8MbDtohGjIbYWmgSwDi');

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
(89, 'kh1', '2025-12-10', '', 11045000, 'trực tiếp', 11005000, 40000, 'Đã xác nhận'),
(90, 'kh2', '2025-12-10', '', 14433000, 'trực tiếp', 14393000, 40000, 'Chờ xác nhận');

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
(72, 89, 506, 1),
(73, 89, 489, 2),
(74, 90, 344, 1),
(75, 90, 353, 3);

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
  MODIFY `procolorsizeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=637;

--
-- AUTO_INCREMENT cho bảng `productcolor`
--
ALTER TABLE `productcolor`
  MODIFY `productcolorid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

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
  MODIFY `sanphamid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT cho bảng `taikhoankh`
--
ALTER TABLE `taikhoankh`
  MODIFY `taikhoanid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `thanhtoan`
--
ALTER TABLE `thanhtoan`
  MODIFY `thanhtoanid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT cho bảng `thanhtoanct`
--
ALTER TABLE `thanhtoanct`
  MODIFY `thanhtoanctid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

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
