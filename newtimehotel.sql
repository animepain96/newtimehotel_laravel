-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 22, 2019 lúc 10:47 PM
-- Phiên bản máy phục vụ: 10.4.6-MariaDB
-- Phiên bản PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `newtimehotel`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `anhmotas`
--

CREATE TABLE `anhmotas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idphong` bigint(20) UNSIGNED NOT NULL,
  `urlanh` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `anhmotas`
--

INSERT INTO `anhmotas` (`id`, `idphong`, `urlanh`, `created_at`, `updated_at`) VALUES
(1, 1, '1577047930.jpg', '2019-12-22 20:52:10', '2019-12-22 20:52:10'),
(2, 1, '1577047931.jpg', '2019-12-22 20:52:10', '2019-12-22 20:52:10'),
(3, 1, '1577047932.jpg', '2019-12-22 20:52:10', '2019-12-22 20:52:10'),
(4, 1, '1577047933.jpg', '2019-12-22 20:52:10', '2019-12-22 20:52:10'),
(5, 1, '1577047934.jpg', '2019-12-22 20:52:10', '2019-12-22 20:52:10'),
(6, 2, '1577048760.jpg', '2019-12-22 21:06:00', '2019-12-22 21:06:00'),
(7, 2, '1577048761.jpg', '2019-12-22 21:06:00', '2019-12-22 21:06:00'),
(8, 2, '1577048762.jpg', '2019-12-22 21:06:00', '2019-12-22 21:06:00'),
(9, 2, '1577048764.jpg', '2019-12-22 21:06:01', '2019-12-22 21:06:01'),
(11, 5, '1577048823.jpg', '2019-12-22 21:07:02', '2019-12-22 21:07:02'),
(12, 5, '1577048824.jpg', '2019-12-22 21:07:02', '2019-12-22 21:07:02'),
(13, 5, '1577048825.jpg', '2019-12-22 21:07:02', '2019-12-22 21:07:02'),
(14, 5, '1577048826.jpg', '2019-12-22 21:07:02', '2019-12-22 21:07:02'),
(15, 6, '1577048855.jpg', '2019-12-22 21:07:35', '2019-12-22 21:07:35'),
(16, 6, '1577048856.jpg', '2019-12-22 21:07:35', '2019-12-22 21:07:35'),
(17, 6, '1577048857.jpg', '2019-12-22 21:07:35', '2019-12-22 21:07:35'),
(18, 6, '1577048858.jpg', '2019-12-22 21:07:35', '2019-12-22 21:07:35'),
(19, 6, '1577048859.jpg', '2019-12-22 21:07:35', '2019-12-22 21:07:35'),
(20, 6, '1577048860.jpg', '2019-12-22 21:07:35', '2019-12-22 21:07:35'),
(21, 10, '1577048890.jpg', '2019-12-22 21:08:10', '2019-12-22 21:08:10'),
(22, 10, '1577048891.jpg', '2019-12-22 21:08:10', '2019-12-22 21:08:10'),
(23, 10, '1577048892.jpg', '2019-12-22 21:08:10', '2019-12-22 21:08:10'),
(24, 10, '1577048893.jpg', '2019-12-22 21:08:10', '2019-12-22 21:08:10'),
(25, 10, '1577048894.jpg', '2019-12-22 21:08:10', '2019-12-22 21:08:10'),
(26, 10, '1577048895.jpg', '2019-12-22 21:08:10', '2019-12-22 21:08:10'),
(27, 9, '1577048916.jpg', '2019-12-22 21:08:36', '2019-12-22 21:08:36'),
(28, 9, '1577048917.jpg', '2019-12-22 21:08:36', '2019-12-22 21:08:36'),
(29, 9, '1577048918.jpg', '2019-12-22 21:08:36', '2019-12-22 21:08:36'),
(30, 9, '1577048919.jpg', '2019-12-22 21:08:36', '2019-12-22 21:08:36'),
(31, 9, '1577048920.jpg', '2019-12-22 21:08:36', '2019-12-22 21:08:36'),
(32, 9, '1577048922.jpg', '2019-12-22 21:08:37', '2019-12-22 21:08:37'),
(33, 7, '1577048938.jpg', '2019-12-22 21:08:58', '2019-12-22 21:08:58'),
(34, 7, '1577048940.png', '2019-12-22 21:08:59', '2019-12-22 21:08:59'),
(35, 7, '1577048941.jpg', '2019-12-22 21:08:59', '2019-12-22 21:08:59'),
(36, 8, '1577048971.jpg', '2019-12-22 21:09:31', '2019-12-22 21:09:31'),
(37, 8, '1577048972.jpg', '2019-12-22 21:09:31', '2019-12-22 21:09:31'),
(38, 8, '1577048973.jpg', '2019-12-22 21:09:31', '2019-12-22 21:09:31'),
(39, 8, '1577048974.jpg', '2019-12-22 21:09:31', '2019-12-22 21:09:31'),
(40, 11, '1577049012.jpg', '2019-12-22 21:10:12', '2019-12-22 21:10:12'),
(41, 11, '1577049014.jpg', '2019-12-22 21:10:13', '2019-12-22 21:10:13'),
(42, 11, '1577049015.jpg', '2019-12-22 21:10:13', '2019-12-22 21:10:13'),
(43, 11, '1577049016.jpg', '2019-12-22 21:10:13', '2019-12-22 21:10:13'),
(44, 12, '1577049049.jpg', '2019-12-22 21:10:49', '2019-12-22 21:10:49'),
(45, 12, '1577049050.jpg', '2019-12-22 21:10:49', '2019-12-22 21:10:49'),
(46, 12, '1577049051.jpg', '2019-12-22 21:10:49', '2019-12-22 21:10:49'),
(47, 12, '1577049052.jpg', '2019-12-22 21:10:49', '2019-12-22 21:10:49'),
(48, 12, '1577049053.jpg', '2019-12-22 21:10:49', '2019-12-22 21:10:49'),
(49, 13, '1577049086.jpg', '2019-12-22 21:11:26', '2019-12-22 21:11:26'),
(50, 13, '1577049087.jpg', '2019-12-22 21:11:26', '2019-12-22 21:11:26'),
(51, 13, '1577049088.jpg', '2019-12-22 21:11:26', '2019-12-22 21:11:26'),
(52, 13, '1577049090.jpg', '2019-12-22 21:11:27', '2019-12-22 21:11:27'),
(53, 13, '1577049091.jpg', '2019-12-22 21:11:27', '2019-12-22 21:11:27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banggias`
--

CREATE TABLE `banggias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idphong` bigint(20) UNSIGNED NOT NULL,
  `gia` decimal(8,2) NOT NULL,
  `batdau` date NOT NULL,
  `ketthuc` date NOT NULL,
  `ghichu` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `banggias`
--

INSERT INTO `banggias` (`id`, `idphong`, `gia`, `batdau`, `ketthuc`, `ghichu`, `created_at`, `updated_at`) VALUES
(1, 1, '319.00', '2019-06-19', '2019-12-31', NULL, '2019-12-21 23:59:13', '2019-12-21 23:59:13'),
(2, 2, '48.00', '2019-05-16', '2019-12-31', NULL, '2019-12-21 23:59:13', '2019-12-21 23:59:13'),
(6, 6, '699.00', '2019-01-26', '2019-12-31', NULL, '2019-12-21 23:59:14', '2019-12-21 23:59:14'),
(7, 7, '592.00', '2019-08-13', '2019-12-31', NULL, '2019-12-21 23:59:14', '2019-12-21 23:59:14'),
(8, 8, '726.00', '2019-06-01', '2019-12-31', NULL, '2019-12-21 23:59:14', '2019-12-21 23:59:14'),
(9, 9, '822.00', '2019-11-10', '2019-12-31', NULL, '2019-12-21 23:59:14', '2019-12-21 23:59:14'),
(11, 1, '320.00', '2019-02-03', '2019-06-18', NULL, '2019-12-22 20:46:37', '2019-12-22 20:46:37'),
(12, 5, '210.00', '2019-12-01', '2019-12-11', NULL, '2019-12-22 20:48:05', '2019-12-22 20:48:05'),
(13, 12, '300.00', '2019-12-01', '2020-01-01', NULL, '2019-12-22 21:11:59', '2019-12-22 21:11:59'),
(14, 11, '410.00', '2019-12-01', '2019-12-29', NULL, '2019-12-22 21:12:15', '2019-12-22 21:12:15'),
(15, 13, '620.00', '2019-12-18', '2019-12-24', NULL, '2019-12-22 21:12:39', '2019-12-22 21:12:39');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bodems`
--

CREATE TABLE `bodems` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ngay` date NOT NULL,
  `soluong` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bodems`
--

INSERT INTO `bodems` (`id`, `ngay`, `soluong`, `created_at`, `updated_at`) VALUES
(1, '2019-11-26', 45, '2019-12-21 23:59:14', '2019-12-21 23:59:14'),
(2, '2019-12-23', 2, '2019-12-22 20:40:38', '2019-12-22 21:39:05');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhgias`
--

CREATE TABLE `danhgias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idkhachhang` bigint(20) UNSIGNED NOT NULL,
  `noidung` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hienthi` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danhgias`
--

INSERT INTO `danhgias` (`id`, `idkhachhang`, `noidung`, `hienthi`, `created_at`, `updated_at`) VALUES
(1, 3, 'Dolore minima modi voluptate veritatis laborum. Odio deleniti et et ad.', 0, '2019-12-21 23:59:15', '2019-12-21 23:59:15'),
(2, 6, 'Laborum eum expedita autem distinctio expedita. Doloremque dolorum non suscipit ut. In consequuntur tempore similique possimus. Voluptate sint exercitationem illum sed. Rerum voluptate enim qui culpa.', 1, '2019-12-21 23:59:16', '2019-12-21 23:59:16'),
(3, 5, 'Eius quis velit modi quasi voluptatem eum ut. Consectetur aliquam ut vel recusandae voluptatum dignissimos. Voluptatibus est ea est deserunt reiciendis facere corrupti neque. Iste laudantium ut est aut pariatur rerum.', 0, '2019-12-21 23:59:16', '2019-12-21 23:59:16'),
(4, 10, 'Enim facilis ab quis eos eos doloremque sed. Quaerat incidunt delectus illum est sequi quos nihil. Qui ratione vitae ut dolor.', 0, '2019-12-21 23:59:16', '2019-12-21 23:59:16'),
(5, 4, 'Molestiae necessitatibus illo sapiente debitis provident inventore aut. Ex occaecati praesentium nisi et. Maiores aut consequatur vel cupiditate commodi.', 0, '2019-12-21 23:59:16', '2019-12-21 23:59:16'),
(6, 7, 'Qui aliquam est aut tenetur earum. Laudantium enim in laudantium id rerum doloribus totam.', 0, '2019-12-21 23:59:16', '2019-12-21 23:59:16'),
(7, 2, 'Quae amet commodi assumenda nam at laborum minima totam. Et ut quae excepturi iusto. Quo voluptas quasi quis consequatur. Neque praesentium dolor similique veritatis sunt error.', 1, '2019-12-21 23:59:16', '2019-12-21 23:59:16'),
(8, 10, 'Voluptatem eos sunt excepturi sed. Similique sint ipsum in optio aut. Eum impedit possimus consequatur perspiciatis omnis eius error. Quo est et autem repellat.', 1, '2019-12-21 23:59:16', '2019-12-21 23:59:16'),
(9, 10, 'Numquam sint nobis iste dolores rerum quos. Ipsam minus vel perferendis numquam ea illo possimus. Laboriosam voluptates quasi ducimus placeat delectus debitis eaque exercitationem.', 1, '2019-12-21 23:59:16', '2019-12-21 23:59:16'),
(10, 3, 'Molestiae illum id dolorem ea accusamus a earum. Consectetur repudiandae dignissimos cumque dolore nostrum consequatur vitae. Molestias libero recusandae dolorum nesciunt voluptas aut aut.', 0, '2019-12-21 23:59:16', '2019-12-21 23:59:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diachis`
--

CREATE TABLE `diachis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idtinh` bigint(20) UNSIGNED DEFAULT NULL,
  `ten` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hoatdong` tinyint(1) NOT NULL DEFAULT 1,
  `ghichu` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `diachis`
--

INSERT INTO `diachis` (`id`, `idtinh`, `ten`, `hoatdong`, `ghichu`, `created_at`, `updated_at`) VALUES
(1, NULL, 'An Giang', 1, NULL, NULL, NULL),
(2, NULL, 'Bà Rịa-Vũng Tàu', 1, NULL, NULL, NULL),
(3, NULL, 'Bạc Liêu', 1, NULL, NULL, NULL),
(4, NULL, 'Bắc Kạ', 1, NULL, NULL, NULL),
(5, NULL, 'Bắc Giang', 1, NULL, NULL, NULL),
(6, NULL, 'Bắc Ninh', 1, NULL, NULL, NULL),
(7, NULL, 'Bến Tre', 1, NULL, NULL, NULL),
(8, NULL, 'Bình Dương', 1, NULL, NULL, NULL),
(9, NULL, 'Bình Định', 1, NULL, NULL, NULL),
(10, NULL, 'Bình Phước', 1, NULL, NULL, NULL),
(11, NULL, 'Bình Thuận', 1, NULL, NULL, NULL),
(12, NULL, 'Cà Mau', 1, NULL, NULL, NULL),
(13, NULL, 'Cao Bằng', 1, NULL, NULL, NULL),
(14, NULL, 'Cần Thơ (TP)', 1, NULL, NULL, NULL),
(15, NULL, 'Đà Nẵng (TP)', 1, NULL, NULL, NULL),
(16, NULL, 'Đắk Lắk', 1, NULL, NULL, NULL),
(17, NULL, 'Đắk Nông', 1, NULL, NULL, NULL),
(18, NULL, 'Điện Biê', 1, NULL, NULL, NULL),
(19, NULL, 'Đồng Nai', 1, NULL, NULL, NULL),
(20, NULL, 'Đồng Tháp', 1, NULL, NULL, NULL),
(21, NULL, 'Gia Lai', 1, NULL, NULL, NULL),
(22, NULL, 'Hà Giang', 1, NULL, NULL, NULL),
(23, NULL, 'Hà Nam', 1, NULL, NULL, NULL),
(24, NULL, 'Hà Nội (TP)', 1, NULL, NULL, NULL),
(26, NULL, 'Hà Tĩnh', 1, NULL, NULL, NULL),
(27, NULL, 'Hải Dương', 1, NULL, NULL, NULL),
(28, NULL, 'Hải Phòng (TP)', 1, NULL, NULL, NULL),
(29, NULL, 'Hòa Bình', 1, NULL, NULL, NULL),
(30, NULL, 'Hồ Chí Minh (TP)', 1, NULL, NULL, NULL),
(31, NULL, 'Hậu Giang', 1, NULL, NULL, NULL),
(32, NULL, 'Hưng Yê', 1, NULL, NULL, NULL),
(33, NULL, 'Khánh Hòa', 1, NULL, NULL, NULL),
(34, NULL, 'Kiên Giang', 1, NULL, NULL, NULL),
(35, NULL, 'Kon Tum', 1, NULL, NULL, NULL),
(36, NULL, 'Lai Châu', 1, NULL, NULL, NULL),
(37, NULL, 'Lào Cai', 1, NULL, NULL, NULL),
(38, NULL, 'Lạng Sơ', 1, NULL, NULL, NULL),
(39, NULL, 'Lâm Đồng', 1, NULL, NULL, NULL),
(40, NULL, 'Long A', 1, NULL, NULL, NULL),
(41, NULL, 'Nam Định', 1, NULL, NULL, NULL),
(42, NULL, 'Nghệ A', 1, NULL, NULL, NULL),
(43, NULL, 'Ninh Bình', 1, NULL, NULL, NULL),
(44, NULL, 'Ninh Thuậ', 1, NULL, NULL, NULL),
(45, NULL, 'Phú Thọ', 1, NULL, NULL, NULL),
(46, NULL, 'Phú Yê', 1, NULL, NULL, NULL),
(47, NULL, 'Quảng Bình', 1, NULL, NULL, NULL),
(48, NULL, 'Quảng Nam', 1, NULL, NULL, NULL),
(49, NULL, 'Quảng Ngãi', 1, NULL, NULL, NULL),
(50, NULL, 'Quảng Ninh', 1, NULL, NULL, NULL),
(51, NULL, 'Quảng Trị', 1, NULL, NULL, NULL),
(52, NULL, 'Sóc Trăng', 1, NULL, NULL, NULL),
(53, NULL, 'Sơn La', 1, NULL, NULL, NULL),
(54, NULL, 'Tây Ninh', 1, NULL, NULL, NULL),
(55, NULL, 'Thái Bình', 1, NULL, NULL, NULL),
(56, NULL, 'Thái Nguyê', 1, NULL, NULL, NULL),
(57, NULL, 'Thanh Hóa', 1, NULL, NULL, NULL),
(58, NULL, 'Thừa Thiên - Huế', 1, NULL, NULL, NULL),
(59, NULL, 'Tiền Giang', 1, NULL, NULL, NULL),
(60, NULL, 'Trà Vinh', 1, NULL, NULL, NULL),
(61, NULL, 'Tuyên Quang', 1, NULL, NULL, NULL),
(62, NULL, 'Vĩnh Long', 1, NULL, NULL, NULL),
(63, NULL, 'Vĩnh Phúc', 1, NULL, NULL, NULL),
(64, NULL, 'Yên Bái', 1, NULL, NULL, NULL),
(65, 1, 'An Phú', 0, NULL, NULL, NULL),
(66, 1, 'Châu Đốc', 1, NULL, NULL, NULL),
(67, 1, 'Châu Phú', 1, NULL, NULL, NULL),
(68, 1, 'Châu Thành', 1, NULL, NULL, NULL),
(69, 1, 'Chợ Mới', 1, NULL, NULL, NULL),
(70, 1, 'Long Xuyê', 1, NULL, NULL, NULL),
(71, 1, 'Phú Tâ', 1, NULL, NULL, NULL),
(72, 1, 'Tân Châu', 1, NULL, NULL, NULL),
(73, 1, 'Thoại Sơ', 1, NULL, NULL, NULL),
(74, 1, 'Tịnh Biê', 1, NULL, NULL, NULL),
(75, 1, 'Tri Tô', 1, NULL, NULL, NULL),
(76, 2, 'Côn Đảo', 1, NULL, NULL, NULL),
(77, 2, 'Đất Đỏ', 1, NULL, NULL, NULL),
(78, 2, 'Tân Thành', 1, NULL, NULL, NULL),
(79, 2, 'Vũng Tàu', 1, NULL, NULL, NULL),
(80, 2, 'Xuyên Mộc', 1, NULL, NULL, NULL),
(81, 2, 'Bà Rịa', 1, NULL, NULL, NULL),
(82, 2, 'Châu Đức', 1, NULL, NULL, NULL),
(83, 2, 'Long Điề', 1, NULL, NULL, NULL),
(84, 8, 'Bàu Bàng', 1, NULL, NULL, NULL),
(85, 8, 'Bắc Tân Uyê', 1, NULL, NULL, NULL),
(86, 8, 'Bến Cát Bình', 1, NULL, NULL, NULL),
(87, 8, 'Dầu Tiếng', 1, NULL, NULL, NULL),
(88, 8, 'Dĩ A', 1, NULL, NULL, NULL),
(89, 8, 'Phú Giáo', 1, NULL, NULL, NULL),
(90, 8, 'Tân Uyê', 1, NULL, NULL, NULL),
(91, 8, 'TX. Thủ Dầu Một', 1, NULL, NULL, NULL),
(92, 8, 'Thuận A', 1, NULL, NULL, NULL),
(93, 10, 'Bình Long', 1, NULL, NULL, NULL),
(94, 10, 'Bù Đăng', 1, NULL, NULL, NULL),
(95, 10, 'Bù Đốp', 1, NULL, NULL, NULL),
(96, 10, 'Bù Gia Mập', 1, NULL, NULL, NULL),
(97, 10, 'Chơn Thành', 1, NULL, NULL, NULL),
(98, 10, 'Đồng Phú', 1, NULL, NULL, NULL),
(99, 10, 'Đồng Xoài', 1, NULL, NULL, NULL),
(100, 10, 'Hớn Quả', 1, NULL, NULL, NULL),
(101, 10, 'Lộc Ninh', 1, NULL, NULL, NULL),
(102, 10, 'Phú Riềng', 1, NULL, NULL, NULL),
(103, 10, 'Phước Long', 1, NULL, NULL, NULL),
(104, 3, 'Đông Hải', 1, NULL, NULL, NULL),
(105, 3, 'Giá Rai', 1, NULL, NULL, NULL),
(106, 3, 'Hòa Bình', 1, NULL, NULL, NULL),
(107, 3, 'Hồng Dâ', 1, NULL, NULL, NULL),
(108, 3, 'Phước Long', 1, NULL, NULL, NULL),
(109, 3, 'Vĩnh Lợi', 1, NULL, NULL, NULL),
(110, 3, 'TP. Bạc Liêu', 1, NULL, NULL, NULL),
(111, 4, 'Ba Bể', 1, NULL, NULL, NULL),
(112, 4, 'Bạch Thông', 1, NULL, NULL, NULL),
(113, 4, 'Chợ Đồ', 1, NULL, NULL, NULL),
(114, 4, 'Chợ Mới', 1, NULL, NULL, NULL),
(115, 4, 'Na Rì', 1, NULL, NULL, NULL),
(116, 4, 'Ngân Sơ', 1, NULL, NULL, NULL),
(117, 4, 'Pác Nặm', 1, NULL, NULL, NULL),
(118, 4, 'TX. Bắc Kạ', 1, NULL, NULL, NULL),
(119, 5, 'Hiệp Hòa', 1, NULL, NULL, NULL),
(120, 5, 'Lạng Giang', 1, NULL, NULL, NULL),
(121, 5, 'Lục Nam', 1, NULL, NULL, NULL),
(122, 5, 'Lục Ngạ', 1, NULL, NULL, NULL),
(123, 5, 'Sơn Động', 1, NULL, NULL, NULL),
(124, 5, 'Tân Yê', 1, NULL, NULL, NULL),
(125, 5, 'Việt Yê', 1, NULL, NULL, NULL),
(126, 5, 'Yên Dũng', 1, NULL, NULL, NULL),
(127, 5, 'Yên Thế', 1, NULL, NULL, NULL),
(128, 5, 'TP. Bắc Giang', 1, NULL, NULL, NULL),
(129, 6, 'Gia Bình', 1, NULL, NULL, NULL),
(130, 6, 'Lương Tài', 1, NULL, NULL, NULL),
(131, 6, 'Quế Võ', 1, NULL, NULL, NULL),
(132, 6, 'Thuận Thành', 1, NULL, NULL, NULL),
(133, 6, 'Tiên Du', 1, NULL, NULL, NULL),
(134, 6, 'Yên Phong', 1, NULL, NULL, NULL),
(135, 6, 'TP. Bắc Ninh', 1, NULL, NULL, NULL),
(136, 6, 'TX. Từ Sơ', 1, NULL, NULL, NULL),
(137, 7, 'Ba Tri', 1, NULL, NULL, NULL),
(138, 7, 'Bình Đại', 1, NULL, NULL, NULL),
(139, 7, 'Châu Thành', 1, NULL, NULL, NULL),
(140, 7, 'Chợ Lách', 1, NULL, NULL, NULL),
(141, 7, 'Giồng Trôm', 1, NULL, NULL, NULL),
(142, 7, 'Mỏ Cày Bắc', 1, NULL, NULL, NULL),
(143, 7, 'Mỏ Cày Nam', 1, NULL, NULL, NULL),
(144, 7, 'Thanh Phúc', 1, NULL, NULL, NULL),
(145, 7, 'TP. Bến Tre', 1, NULL, NULL, NULL),
(146, 9, 'An Lão', 1, NULL, NULL, NULL),
(147, 9, 'An Nhơ', 1, NULL, NULL, NULL),
(148, 9, 'Hoài Â', 1, NULL, NULL, NULL),
(149, 9, 'Hoài Nhơ', 1, NULL, NULL, NULL),
(150, 9, 'Phù Mỹ', 1, NULL, NULL, NULL),
(151, 9, 'Phù Cát', 1, NULL, NULL, NULL),
(152, 9, 'Tây Sơ', 1, NULL, NULL, NULL),
(153, 9, 'Tuy Phước', 1, NULL, NULL, NULL),
(154, 9, 'Vân Canh', 1, NULL, NULL, NULL),
(155, 9, 'Vĩnh Thạnh', 1, NULL, NULL, NULL),
(156, 9, 'TP. Quy Nhơ', 1, NULL, NULL, NULL),
(157, 11, 'Đức Linh', 1, NULL, NULL, NULL),
(158, 11, 'Bắc Bình', 1, NULL, NULL, NULL),
(159, 11, 'Hàm Tâ', 1, NULL, NULL, NULL),
(160, 11, 'Hàm Thuận Bắc', 1, NULL, NULL, NULL),
(161, 11, 'Hàm Thuận Nam', 1, NULL, NULL, NULL),
(162, 11, 'Phú Quí', 1, NULL, NULL, NULL),
(163, 11, 'Tánh Linh', 1, NULL, NULL, NULL),
(164, 11, 'Tuy Phong', 1, NULL, NULL, NULL),
(165, 11, 'TP. Phan Thiết', 1, NULL, NULL, NULL),
(166, 11, 'TX. La Gi', 1, NULL, NULL, NULL),
(167, 12, 'Cái Nước', 1, NULL, NULL, NULL),
(168, 12, 'Đầm Dơi', 1, NULL, NULL, NULL),
(169, 12, 'Năm Că', 1, NULL, NULL, NULL),
(170, 12, 'Ngọc Hiể', 1, NULL, NULL, NULL),
(171, 12, 'Phú Tâ', 1, NULL, NULL, NULL),
(172, 12, 'Thới Bình', 1, NULL, NULL, NULL),
(173, 12, 'Trần Văn Thời', 1, NULL, NULL, NULL),
(174, 12, 'U Minh', 1, NULL, NULL, NULL),
(175, 12, 'TP. Cà Mau', 1, NULL, NULL, NULL),
(176, 13, 'Bảo Lạc', 1, NULL, NULL, NULL),
(177, 13, 'Bảo Lâm', 1, NULL, NULL, NULL),
(178, 13, 'Hạ Lang', 1, NULL, NULL, NULL),
(179, 13, 'Hà Quảng', 1, NULL, NULL, NULL),
(180, 13, 'Hòa A', 1, NULL, NULL, NULL),
(181, 13, 'Nguyên Bình', 1, NULL, NULL, NULL),
(182, 13, 'Phục Hòa', 1, NULL, NULL, NULL),
(183, 13, 'Quảng Uyê', 1, NULL, NULL, NULL),
(184, 13, 'Thạch A', 1, NULL, NULL, NULL),
(185, 13, 'Thông Nông', 1, NULL, NULL, NULL),
(186, 13, 'Trà Lĩnh', 1, NULL, NULL, NULL),
(187, 13, 'Trùng Khánh', 1, NULL, NULL, NULL),
(188, 13, 'TX. Cao Bằng', 1, NULL, NULL, NULL),
(189, 14, 'Trung tâm thành phố', 1, NULL, NULL, NULL),
(190, 14, 'Cờ Đỏ', 1, NULL, NULL, NULL),
(191, 14, 'Phong Điề', 1, NULL, NULL, NULL),
(192, 14, 'Thới Lai', 1, NULL, NULL, NULL),
(193, 14, 'Vĩnh Thạnh', 1, NULL, NULL, NULL),
(194, 14, 'Bình Thủy', 1, NULL, NULL, NULL),
(195, 14, 'Cái Răng', 1, NULL, NULL, NULL),
(196, 14, 'Ninh Kiều', 1, NULL, NULL, NULL),
(197, 14, 'Ô Mô', 1, NULL, NULL, NULL),
(198, 14, 'Thốt Nốt', 1, NULL, NULL, NULL),
(199, 15, 'Trung tâm thành phố', 1, NULL, NULL, NULL),
(200, 15, 'Hòa Vang', 1, NULL, NULL, NULL),
(201, 15, 'Hoàng Sa', 1, NULL, NULL, NULL),
(202, 15, 'Cẩm Lệ', 1, NULL, NULL, NULL),
(203, 15, 'Hải Châu', 1, NULL, NULL, NULL),
(204, 15, 'Liên Chiểu', 1, NULL, NULL, NULL),
(205, 15, 'Ngũ Hành Sơ', 1, NULL, NULL, NULL),
(206, 15, 'Sơn Trà', 1, NULL, NULL, NULL),
(207, 15, 'Thanh Khê', 1, NULL, NULL, NULL),
(208, 46, 'H. Đông Hòa', 1, NULL, NULL, NULL),
(209, 46, 'H. Đồng Xuâ', 1, NULL, NULL, NULL),
(210, 46, 'H. Phú Hòa', 1, NULL, NULL, NULL),
(211, 46, 'H. Sơn Hòa', 1, NULL, NULL, NULL),
(212, 46, 'H. Sông Hinh', 1, NULL, NULL, NULL),
(213, 46, 'H. Tây Hòa', 1, NULL, NULL, NULL),
(214, 46, 'H. Tuy A', 1, NULL, NULL, NULL),
(215, 46, 'TP. Tuy Hòa', 1, NULL, NULL, NULL),
(216, 46, 'TX. Sông Cầu', 1, NULL, NULL, NULL),
(217, 47, 'H. Bố Trạch', 1, NULL, NULL, NULL),
(218, 47, 'H. Lệ Thủy', 1, NULL, NULL, NULL),
(219, 47, 'H. Minh Hóa', 1, NULL, NULL, NULL),
(220, 47, 'H. Quảng Ninh', 1, NULL, NULL, NULL),
(221, 47, 'H. Quảng Trạch', 1, NULL, NULL, NULL),
(222, 47, 'H. Tuyên Hóa', 1, NULL, NULL, NULL),
(223, 47, 'TP. Đồng Hới', 1, NULL, NULL, NULL),
(224, 48, 'H. Bắc Trà My', 1, NULL, NULL, NULL),
(225, 48, 'H. Đại lộc', 1, NULL, NULL, NULL),
(226, 48, 'H. Điện Bà', 1, NULL, NULL, NULL),
(227, 48, 'H. Đông Giang', 1, NULL, NULL, NULL),
(228, 48, 'H. Duy Xuyê', 1, NULL, NULL, NULL),
(229, 48, 'H. Hiệp Đức', 1, NULL, NULL, NULL),
(230, 48, 'H. Nam Giang', 1, NULL, NULL, NULL),
(231, 48, 'H. Nam Trà My', 1, NULL, NULL, NULL),
(232, 48, 'H. Nông Sơ', 1, NULL, NULL, NULL),
(233, 48, 'H. Núi Thành', 1, NULL, NULL, NULL),
(234, 48, 'H. Phú Ninh', 1, NULL, NULL, NULL),
(235, 48, 'H. Phước Sơ', 1, NULL, NULL, NULL),
(236, 48, 'H. Quế Sơ', 1, NULL, NULL, NULL),
(237, 48, 'H. Tây Giang', 1, NULL, NULL, NULL),
(238, 48, 'H. Thăng Bình', 1, NULL, NULL, NULL),
(239, 48, 'H. Tiên Phước', 1, NULL, NULL, NULL),
(240, 48, 'TP. Hội A', 1, NULL, NULL, NULL),
(241, 48, 'TP. Tam Kỳ', 1, NULL, NULL, NULL),
(242, 49, 'H. Ba Tơ', 1, NULL, NULL, NULL),
(243, 49, 'H. Bình Sơ', 1, NULL, NULL, NULL),
(244, 49, 'H. Đức Phổ', 1, NULL, NULL, NULL),
(245, 49, 'H. Lý Sơ', 1, NULL, NULL, NULL),
(246, 49, 'H. Minh Long', 1, NULL, NULL, NULL),
(247, 49, 'H. Mộ Đức', 1, NULL, NULL, NULL),
(248, 49, 'H. Nghĩa Hành', 1, NULL, NULL, NULL),
(249, 49, 'H. Sơn Hà', 1, NULL, NULL, NULL),
(250, 49, 'H. Sơn Tây', 1, NULL, NULL, NULL),
(251, 49, 'H. Sơn Tịnh', 1, NULL, NULL, NULL),
(252, 49, 'H. Tây Trà', 1, NULL, NULL, NULL),
(253, 49, 'H. Trà Bồng', 1, NULL, NULL, NULL),
(254, 49, 'H. Tư Nghĩa', 1, NULL, NULL, NULL),
(255, 49, 'TP. Quảng Nghãi', 1, NULL, NULL, NULL),
(256, 50, 'H. Ba Chẽ', 1, NULL, NULL, NULL),
(257, 50, 'H. Bình Liêu', 1, NULL, NULL, NULL),
(258, 50, 'H. Cô Tô', 1, NULL, NULL, NULL),
(259, 50, 'H. Đầm Hà', 1, NULL, NULL, NULL),
(260, 50, 'H. Đông Triều', 1, NULL, NULL, NULL),
(261, 50, 'H. Hải Hà', 1, NULL, NULL, NULL),
(262, 50, 'H. Hoành Bồ', 1, NULL, NULL, NULL),
(263, 50, 'H. Tiên Yê', 1, NULL, NULL, NULL),
(264, 50, 'H. Vân Đồ', 1, NULL, NULL, NULL),
(265, 50, 'H. Yên Hưng', 1, NULL, NULL, NULL),
(266, 50, 'TP. Hạ Long', 1, NULL, NULL, NULL),
(267, 50, 'TP. Móng Cái', 1, NULL, NULL, NULL),
(268, 50, 'TX. Cẩm Phả', 1, NULL, NULL, NULL),
(269, 50, 'TX. Uông Bí', 1, NULL, NULL, NULL),
(270, 40, 'Bến Lức', 1, NULL, NULL, NULL),
(271, 40, 'Cần Đước', 1, NULL, NULL, NULL),
(272, 40, 'Cần Giuộc', 1, NULL, NULL, NULL),
(273, 40, 'Châu Thành', 1, NULL, NULL, NULL),
(274, 40, 'Đức Hòa', 1, NULL, NULL, NULL),
(275, 40, 'Đức Huệ', 1, NULL, NULL, NULL),
(276, 40, 'Mộc Hóa', 1, NULL, NULL, NULL),
(277, 40, 'Tân Hưng', 1, NULL, NULL, NULL),
(278, 40, 'Tân Thạnh', 1, NULL, NULL, NULL),
(279, 40, 'Thạnh Hóa', 1, NULL, NULL, NULL),
(280, 40, 'Thủ Thừa', 1, NULL, NULL, NULL),
(281, 40, 'Vĩnh Hưng', 1, NULL, NULL, NULL),
(282, 40, 'TP.Tân A', 1, NULL, NULL, NULL),
(283, 41, 'Giao Thủy', 1, NULL, NULL, NULL),
(284, 41, 'Hải Hậu', 1, NULL, NULL, NULL),
(285, 41, 'Mỹ Lộc', 1, NULL, NULL, NULL),
(286, 41, 'Nam Trực', 1, NULL, NULL, NULL),
(287, 41, 'Nghĩa Hưng', 1, NULL, NULL, NULL),
(288, 41, 'Trực Ninh', 1, NULL, NULL, NULL),
(289, 41, 'Vụ Bả', 1, NULL, NULL, NULL),
(290, 41, 'Xuân Trưởng', 1, NULL, NULL, NULL),
(291, 41, 'Ý Yê', 1, NULL, NULL, NULL),
(292, 41, 'TP.Nam Định', 1, NULL, NULL, NULL),
(293, 42, 'Anh Sơ', 1, NULL, NULL, NULL),
(294, 42, 'Con Cuông', 1, NULL, NULL, NULL),
(295, 42, 'Diễn Châu', 1, NULL, NULL, NULL),
(296, 42, 'Đô Lương', 1, NULL, NULL, NULL),
(297, 42, 'Kỳ Sơ', 1, NULL, NULL, NULL),
(298, 42, 'Nam Đà', 1, NULL, NULL, NULL),
(299, 42, 'Nghi Lộc', 1, NULL, NULL, NULL),
(300, 42, 'Nghĩa Đà', 1, NULL, NULL, NULL),
(301, 42, 'Quế Phong', 1, NULL, NULL, NULL),
(302, 42, 'Quỳ Châu', 1, NULL, NULL, NULL),
(303, 42, 'Quỳ Hợp', 1, NULL, NULL, NULL),
(304, 42, 'Quỳnh Lưu', 1, NULL, NULL, NULL),
(305, 42, 'Tân Kỳ', 1, NULL, NULL, NULL),
(306, 42, 'Thanh Chương', 1, NULL, NULL, NULL),
(307, 42, 'Yên Thành', 1, NULL, NULL, NULL),
(308, 42, 'TP.Vinh', 1, NULL, NULL, NULL),
(309, 42, 'TX.Cửa Lò', 1, NULL, NULL, NULL),
(310, 42, 'TX.Thái Hòa', 1, NULL, NULL, NULL),
(311, 43, 'Gia Viễ', 1, NULL, NULL, NULL),
(312, 43, 'Hoa Lư', 1, NULL, NULL, NULL),
(313, 43, 'Kim Sơ', 1, NULL, NULL, NULL),
(314, 43, 'Nho Qua', 1, NULL, NULL, NULL),
(315, 43, 'Yên Khánh', 1, NULL, NULL, NULL),
(316, 43, 'Yên Mô', 1, NULL, NULL, NULL),
(317, 43, 'TP.Nình Bình', 1, NULL, NULL, NULL),
(318, 43, 'TX.Tam Hiệp', 1, NULL, NULL, NULL),
(319, 44, 'Bác Ái', 1, NULL, NULL, NULL),
(320, 44, 'Ninh Hải', 1, NULL, NULL, NULL),
(321, 44, 'Ninh Phước', 1, NULL, NULL, NULL),
(322, 44, 'Ninh Sơ', 1, NULL, NULL, NULL),
(323, 44, 'Thuận Bắc', 1, NULL, NULL, NULL),
(324, 44, 'Thuận Nam', 1, NULL, NULL, NULL),
(325, 44, 'TP.Phan Rang- Tháp Chàm', 1, NULL, NULL, NULL),
(326, 45, 'Cẩm Khê', 1, NULL, NULL, NULL),
(327, 45, 'Đoan Hùng', 1, NULL, NULL, NULL),
(328, 45, 'Hạ Hòa', 1, NULL, NULL, NULL),
(329, 45, 'Lâm Thao', 1, NULL, NULL, NULL),
(330, 45, 'Phù Ninh', 1, NULL, NULL, NULL),
(331, 45, 'Tam Nông', 1, NULL, NULL, NULL),
(332, 45, 'Tân Sơ', 1, NULL, NULL, NULL),
(333, 45, 'Thanh Ba', 1, NULL, NULL, NULL),
(334, 45, 'Thanh Sơ', 1, NULL, NULL, NULL),
(335, 45, 'Thanh Thủy', 1, NULL, NULL, NULL),
(336, 45, 'Yên Lập', 1, NULL, NULL, NULL),
(337, 45, 'TP.Việt Trì', 1, NULL, NULL, NULL),
(338, 45, 'TX.Phú Thọ', 1, NULL, NULL, NULL),
(339, 63, 'TP. Vĩnh Yê', 1, NULL, NULL, NULL),
(340, 63, 'Tam Dương', 1, NULL, NULL, NULL),
(341, 63, 'Lập Thạch', 1, NULL, NULL, NULL),
(342, 63, 'Vĩnh Tường', 1, NULL, NULL, NULL),
(343, 63, 'Yên Lạc', 1, NULL, NULL, NULL),
(344, 63, 'Bình Xuyê', 1, NULL, NULL, NULL),
(345, 63, 'Mê Linh', 1, NULL, NULL, NULL),
(346, 63, 'TX. Phúc Yê', 1, NULL, NULL, NULL),
(347, 63, 'Tam Đảo', 1, NULL, NULL, NULL),
(464, 61, 'Chiêm Hóa', 1, NULL, NULL, NULL),
(465, 61, 'Hàm Yê', 1, NULL, NULL, NULL),
(466, 61, 'Na Hang', 1, NULL, NULL, NULL),
(467, 61, 'Sơn Dương', 1, NULL, NULL, NULL),
(468, 61, 'Yên Sơ', 1, NULL, NULL, NULL),
(469, 61, 'TP. Tuyên Quang', 1, NULL, NULL, NULL),
(470, 62, 'Bình Minh', 1, NULL, NULL, NULL),
(471, 62, 'Bình Tâ', 1, NULL, NULL, NULL),
(472, 62, 'Long Hồ', 1, NULL, NULL, NULL),
(473, 62, 'Mang Thít', 1, NULL, NULL, NULL),
(474, 62, 'Tam Bình', 1, NULL, NULL, NULL),
(475, 62, 'Trà Ô', 1, NULL, NULL, NULL),
(476, 62, 'Vũng Liêm', 1, NULL, NULL, NULL),
(477, 62, 'TP. Vĩnh Long', 1, NULL, NULL, NULL),
(478, 21, 'TP. Pleiku', 1, NULL, NULL, NULL),
(479, 21, 'TX. An Khê', 1, NULL, NULL, NULL),
(480, 21, 'Ayun Pa', 1, NULL, NULL, NULL),
(481, 21, 'Chư Păh', 1, NULL, NULL, NULL),
(482, 21, 'Chư Prông', 1, NULL, NULL, NULL),
(483, 21, 'Chư Sê', 1, NULL, NULL, NULL),
(484, 21, 'Đắk Đoa', 1, NULL, NULL, NULL),
(485, 22, 'Bắc Giang', 1, NULL, NULL, NULL),
(486, 22, 'Đồng Vă', 1, NULL, NULL, NULL),
(487, 22, 'Hoàng Su Phì', 1, NULL, NULL, NULL),
(488, 22, 'Mèo Vạc', 1, NULL, NULL, NULL),
(489, 22, 'Quản Bạ', 1, NULL, NULL, NULL),
(490, 22, 'Vị Xuyê', 1, NULL, NULL, NULL),
(491, 22, 'Xín Mầ', 1, NULL, NULL, NULL),
(492, 22, 'Yên Minh', 1, NULL, NULL, NULL),
(493, 23, 'TX. Phủ Lý', 1, NULL, NULL, NULL),
(494, 23, 'Duy Tiê', 1, NULL, NULL, NULL),
(495, 23, 'Kim Bảng', 1, NULL, NULL, NULL),
(496, 23, 'Lý Nhâ', 1, NULL, NULL, NULL),
(497, 23, 'Thanh Liêm', 1, NULL, NULL, NULL),
(498, 23, 'Bình Lục', 1, NULL, NULL, NULL),
(499, 24, 'Ba Đình', 1, NULL, NULL, NULL),
(500, 24, 'Bắc Từ Liêm', 1, NULL, NULL, NULL),
(501, 24, 'Cầu Giấy', 1, NULL, NULL, NULL),
(502, 24, 'Đống Đa', 1, NULL, NULL, NULL),
(503, 24, 'Hà Đông', 1, NULL, NULL, NULL),
(504, 24, 'Hai Bà Trưng', 1, NULL, NULL, NULL),
(505, 24, 'Hoàn Kiếm', 1, NULL, NULL, NULL),
(506, 24, 'Hoàng Mã', 1, NULL, NULL, NULL),
(507, 24, 'Long Biê', 1, NULL, NULL, NULL),
(508, 24, 'Nam Từ Liêm', 1, NULL, NULL, NULL),
(509, 24, 'Tây Hồ', 1, NULL, NULL, NULL),
(510, 24, 'Thanh Xuâ', 1, NULL, NULL, NULL),
(511, 24, 'Sơn Tây', 1, NULL, NULL, NULL),
(512, 24, 'Ba Vì', 1, NULL, NULL, NULL),
(513, 24, 'Chương Mĩ', 1, NULL, NULL, NULL),
(514, 24, 'Đan Phượng', 1, NULL, NULL, NULL),
(515, 24, 'Đông Anh', 1, NULL, NULL, NULL),
(516, 24, 'Gia Lâm', 1, NULL, NULL, NULL),
(517, 24, 'Hoài Đức', 1, NULL, NULL, NULL),
(518, 24, 'Mê Linh', 1, NULL, NULL, NULL),
(519, 24, 'Mỹ Đức', 1, NULL, NULL, NULL),
(520, 24, 'Phú Xuyê', 1, NULL, NULL, NULL),
(521, 24, 'Phú Thọ', 1, NULL, NULL, NULL),
(522, 24, 'Quốc Oai', 1, NULL, NULL, NULL),
(523, 24, 'Sóc Sơ', 1, NULL, NULL, NULL),
(524, 24, 'Thạch Thất', 1, NULL, NULL, NULL),
(525, 24, 'Thanh Oai', 1, NULL, NULL, NULL),
(526, 24, 'Thanh Trì', 1, NULL, NULL, NULL),
(527, 24, 'Thường Tí', 1, NULL, NULL, NULL),
(528, 24, 'Từ Liêm', 1, NULL, NULL, NULL),
(529, 24, 'Ứng Hòa', 1, NULL, NULL, NULL),
(530, 36, 'Mường Tè', 1, NULL, NULL, NULL),
(531, 36, 'Phong Thổ', 1, NULL, NULL, NULL),
(532, 36, 'Sin Hồ', 1, NULL, NULL, NULL),
(533, 36, 'Tam Ðường', 1, NULL, NULL, NULL),
(534, 36, 'Tân Uyê', 1, NULL, NULL, NULL),
(535, 36, 'Than Uyê', 1, NULL, NULL, NULL),
(536, 36, 'TX.Lai Châu', 1, NULL, NULL, NULL),
(537, 37, 'Bạc Hà', 1, NULL, NULL, NULL),
(538, 37, 'Bảo Thượng', 1, NULL, NULL, NULL),
(539, 37, 'Bao Yê', 1, NULL, NULL, NULL),
(540, 37, 'Bát Xát', 1, NULL, NULL, NULL),
(541, 37, 'Mường Khương', 1, NULL, NULL, NULL),
(542, 37, 'Sa Pa', 1, NULL, NULL, NULL),
(543, 37, 'Si Ma Cai', 1, NULL, NULL, NULL),
(544, 37, 'Van Bà', 1, NULL, NULL, NULL),
(545, 37, 'TP.Lào Cai', 1, NULL, NULL, NULL),
(546, 38, 'Bảc So', 1, NULL, NULL, NULL),
(547, 38, 'Bình Gia', 1, NULL, NULL, NULL),
(548, 38, 'Cao Lộc', 1, NULL, NULL, NULL),
(549, 38, 'Chi Lang', 1, NULL, NULL, NULL),
(550, 38, 'Ðình Lập', 1, NULL, NULL, NULL),
(551, 38, 'Hữu Lung', 1, NULL, NULL, NULL),
(552, 38, 'Lộc Bình', 1, NULL, NULL, NULL),
(553, 38, 'Tràng Định', 1, NULL, NULL, NULL),
(554, 38, 'Van Lãng', 1, NULL, NULL, NULL),
(555, 38, 'Van Qua', 1, NULL, NULL, NULL),
(556, 38, 'TP.Lạng So', 1, NULL, NULL, NULL),
(557, 39, 'Bảo Lâm', 1, NULL, NULL, NULL),
(558, 39, 'Cát Tiê', 1, NULL, NULL, NULL),
(559, 39, 'Ðô Huoai', 1, NULL, NULL, NULL),
(560, 39, 'Ðam Rông', 1, NULL, NULL, NULL),
(561, 39, 'Di Linh', 1, NULL, NULL, NULL),
(562, 39, 'Ðon Duong', 1, NULL, NULL, NULL),
(563, 39, 'Ðộc Trng', 1, NULL, NULL, NULL),
(564, 39, 'Lạc Duong', 1, NULL, NULL, NULL),
(565, 39, 'Lâm Hà', 1, NULL, NULL, NULL),
(566, 39, 'TP.Bảo Lộc', 1, NULL, NULL, NULL),
(567, 39, 'TP.Ðà Lạt', 1, NULL, NULL, NULL),
(568, 16, 'Buôn Đô', 1, NULL, NULL, NULL),
(569, 16, 'Cư Kui', 1, NULL, NULL, NULL),
(570, 16, 'Cư Mgar', 1, NULL, NULL, NULL),
(571, 16, 'Ea Kar', 1, NULL, NULL, NULL),
(572, 16, 'Ea Súp', 1, NULL, NULL, NULL),
(573, 16, 'EaHLeo', 1, NULL, NULL, NULL),
(574, 16, 'Krông Ana', 1, NULL, NULL, NULL),
(575, 16, 'Krông Búk', 1, NULL, NULL, NULL),
(576, 16, 'Krông Năng', 1, NULL, NULL, NULL),
(577, 16, 'Krông Pắc', 1, NULL, NULL, NULL),
(578, 16, 'Lắk', 1, NULL, NULL, NULL),
(579, 16, 'MDrắk', 1, NULL, NULL, NULL),
(580, 16, 'TP.Buôn Ma Thuật', 1, NULL, NULL, NULL),
(581, 16, 'TX.Buôn Hồ', 1, NULL, NULL, NULL),
(582, 17, 'Cư Jút', 1, NULL, NULL, NULL),
(583, 17, 'Đắk GLong', 1, NULL, NULL, NULL),
(584, 17, 'Đắk Mil', 1, NULL, NULL, NULL),
(585, 17, 'Đắk RLấp', 1, NULL, NULL, NULL),
(586, 17, 'Đắk Song', 1, NULL, NULL, NULL),
(587, 17, 'Krông Nô', 1, NULL, NULL, NULL),
(588, 17, 'Tuy Đức', 1, NULL, NULL, NULL),
(589, 17, 'TX.Gia Nghĩa', 1, NULL, NULL, NULL),
(590, 18, 'Điện Biê', 1, NULL, NULL, NULL),
(591, 18, 'Điện Biên Đông', 1, NULL, NULL, NULL),
(592, 18, 'Mường Chà', 1, NULL, NULL, NULL),
(593, 18, 'Mương Nhé', 1, NULL, NULL, NULL),
(594, 18, 'Mường Ảng', 1, NULL, NULL, NULL),
(595, 18, 'Tủa Chùa', 1, NULL, NULL, NULL),
(596, 18, 'Tuần Giáo', 1, NULL, NULL, NULL),
(597, 18, 'TP.Điện Biên Phủ', 1, NULL, NULL, NULL),
(598, 18, 'TX.Mường Lay', 1, NULL, NULL, NULL),
(599, 19, 'Cẩm Mỹ', 1, NULL, NULL, NULL),
(600, 19, 'Định Quá', 1, NULL, NULL, NULL),
(601, 19, 'Long Thành', 1, NULL, NULL, NULL),
(602, 19, 'Nhơn Trạch', 1, NULL, NULL, NULL),
(603, 19, 'Tân Phú', 1, NULL, NULL, NULL),
(604, 19, 'Thống Nhất', 1, NULL, NULL, NULL),
(605, 19, 'Vĩnh Cửu', 1, NULL, NULL, NULL),
(606, 19, 'Xuân Lộc', 1, NULL, NULL, NULL),
(607, 19, 'TP.Biên Hòa', 1, NULL, NULL, NULL),
(608, 19, 'TX.Long Khánh', 1, NULL, NULL, NULL),
(609, 20, 'Cao Lãnh', 1, NULL, NULL, NULL),
(610, 20, 'Châu Thành', 1, NULL, NULL, NULL),
(611, 20, 'Hồng Ngự', 1, NULL, NULL, NULL),
(612, 20, 'Lai Vung', 1, NULL, NULL, NULL),
(613, 20, 'Lấp Vò', 1, NULL, NULL, NULL),
(614, 20, 'Tâm Nông', 1, NULL, NULL, NULL),
(615, 20, 'Tân Hồng', 1, NULL, NULL, NULL),
(616, 20, 'Thanh Bình', 1, NULL, NULL, NULL),
(617, 20, 'Tháp Mười', 1, NULL, NULL, NULL),
(618, 20, 'TP.Cao Lãnh', 1, NULL, NULL, NULL),
(619, 20, 'TX.Hồng Ngự', 1, NULL, NULL, NULL),
(620, 20, 'TX.Sa Đéc', 1, NULL, NULL, NULL),
(621, 56, 'Đại Tử', 1, NULL, NULL, NULL),
(622, 56, 'Định Hóa', 1, NULL, NULL, NULL),
(623, 56, 'Đồng Hỷ', 1, NULL, NULL, NULL),
(624, 56, 'Phổ Yê', 1, NULL, NULL, NULL),
(625, 56, 'Phú Bình', 1, NULL, NULL, NULL),
(626, 56, 'Phú Lương', 1, NULL, NULL, NULL),
(627, 56, 'Võ Nhai', 1, NULL, NULL, NULL),
(628, 56, 'TP.Thái Nguyê', 1, NULL, NULL, NULL),
(629, 56, 'TX.Sông Công', 1, NULL, NULL, NULL),
(630, 57, 'Bá Thước', 1, NULL, NULL, NULL),
(631, 57, 'Cẩm Thúy', 1, NULL, NULL, NULL),
(632, 57, 'Đông Sơ', 1, NULL, NULL, NULL),
(633, 57, 'Hà Trung', 1, NULL, NULL, NULL),
(634, 57, 'Hậu Lộc', 1, NULL, NULL, NULL),
(635, 57, 'Hoằng Hóa', 1, NULL, NULL, NULL),
(636, 57, 'Lang Chánh', 1, NULL, NULL, NULL),
(637, 57, 'Mường Lát', 1, NULL, NULL, NULL),
(638, 57, 'Nga Sơ', 1, NULL, NULL, NULL),
(639, 57, 'Ngọc Lặc', 1, NULL, NULL, NULL),
(640, 57, 'Như Thanh', 1, NULL, NULL, NULL),
(641, 57, 'Như Xuâ', 1, NULL, NULL, NULL),
(642, 57, 'Nông Cống', 1, NULL, NULL, NULL),
(643, 57, 'Quan Hóa', 1, NULL, NULL, NULL),
(644, 57, 'Quan Sơ', 1, NULL, NULL, NULL),
(645, 57, 'Quảng Xương', 1, NULL, NULL, NULL),
(646, 57, 'Thạch Thành', 1, NULL, NULL, NULL),
(647, 57, 'Thiệu Hóa', 1, NULL, NULL, NULL),
(648, 57, 'Thường Xuâ', 1, NULL, NULL, NULL),
(649, 57, 'Thọ Xuâ', 1, NULL, NULL, NULL),
(650, 57, 'Tĩnh Gia', 1, NULL, NULL, NULL),
(651, 57, 'Triệu Sơ', 1, NULL, NULL, NULL),
(652, 57, 'Vĩnh Lộc', 1, NULL, NULL, NULL),
(653, 57, 'Yên Định', 1, NULL, NULL, NULL),
(654, 57, 'TP.Thanh Hóa', 1, NULL, NULL, NULL),
(655, 57, 'TX.Bỉm Sơ', 1, NULL, NULL, NULL),
(656, 57, 'TX.Sầm Sơ', 1, NULL, NULL, NULL),
(657, 58, 'A Lưới', 1, NULL, NULL, NULL),
(658, 58, 'Hường Trà', 1, NULL, NULL, NULL),
(659, 58, 'Nam Dông', 1, NULL, NULL, NULL),
(660, 58, 'Phong Điề', 1, NULL, NULL, NULL),
(661, 58, 'Phú Lộc', 1, NULL, NULL, NULL),
(662, 58, 'Phú Vang', 1, NULL, NULL, NULL),
(663, 58, 'Quang Điề', 1, NULL, NULL, NULL),
(664, 58, 'TP.Huế', 1, NULL, NULL, NULL),
(665, 58, 'TX.Hương Thủy', 1, NULL, NULL, NULL),
(666, 59, 'Cái Bè', 1, NULL, NULL, NULL),
(667, 59, 'Cai Lây', 1, NULL, NULL, NULL),
(668, 59, 'Châu Thành', 1, NULL, NULL, NULL),
(669, 59, 'Chợ Gạo', 1, NULL, NULL, NULL),
(670, 59, 'Gò Công Đông', 1, NULL, NULL, NULL),
(671, 59, 'Gò Công Tây', 1, NULL, NULL, NULL),
(672, 59, 'Tân Phú Đông', 1, NULL, NULL, NULL),
(673, 59, 'Tân Phước', 1, NULL, NULL, NULL),
(674, 59, 'TP.Mỹ Tho', 1, NULL, NULL, NULL),
(675, 59, 'TX.Gò Công', 1, NULL, NULL, NULL),
(676, 60, 'Càng Long', 1, NULL, NULL, NULL),
(677, 60, 'Cầu Kè', 1, NULL, NULL, NULL),
(678, 60, 'Cầu Ngang', 1, NULL, NULL, NULL),
(679, 60, 'Châu Thành', 1, NULL, NULL, NULL),
(680, 60, 'Duyên Hải', 1, NULL, NULL, NULL),
(681, 60, 'Tiểu Cầ', 1, NULL, NULL, NULL),
(682, 60, 'Trà Cú', 1, NULL, NULL, NULL),
(683, 60, 'TP.Trà Vinh', 1, NULL, NULL, NULL),
(684, 26, 'Cẩm Xuyê', 1, NULL, NULL, NULL),
(685, 26, 'Can Lộc', 1, NULL, NULL, NULL),
(686, 26, 'Đức Thọ', 1, NULL, NULL, NULL),
(687, 26, 'Hương Khê', 1, NULL, NULL, NULL),
(688, 26, 'Hương Sơ', 1, NULL, NULL, NULL),
(689, 26, 'Kỳ Anh', 1, NULL, NULL, NULL),
(690, 26, 'Lộc Hà', 1, NULL, NULL, NULL),
(691, 26, 'Nghi Xuâ', 1, NULL, NULL, NULL),
(692, 26, 'Thạch Hà', 1, NULL, NULL, NULL),
(693, 26, 'Vũ Quang', 1, NULL, NULL, NULL),
(694, 26, 'TP. Hà Tĩnh', 1, NULL, NULL, NULL),
(695, 26, 'TX. Hồng Lĩnh', 1, NULL, NULL, NULL),
(696, 27, 'Bình Giang', 1, NULL, NULL, NULL),
(697, 27, 'Cẩm Giàng', 1, NULL, NULL, NULL),
(698, 27, 'Gia Lộc', 1, NULL, NULL, NULL),
(699, 27, 'Kim Thành', 1, NULL, NULL, NULL),
(700, 27, 'Kinh Mô', 1, NULL, NULL, NULL),
(701, 27, 'Nam Sách', 1, NULL, NULL, NULL),
(702, 27, 'Ninh Giang', 1, NULL, NULL, NULL),
(703, 27, 'Thanh Hà', 1, NULL, NULL, NULL),
(704, 27, 'Thanh Miệ', 1, NULL, NULL, NULL),
(705, 27, 'Tứ Kỳ', 1, NULL, NULL, NULL),
(706, 27, 'TP. Hải Dương', 1, NULL, NULL, NULL),
(707, 27, 'TX. Chí Linh', 1, NULL, NULL, NULL),
(708, 28, 'Trung tâm thành phố', 1, NULL, NULL, NULL),
(709, 28, 'An Dương', 1, NULL, NULL, NULL),
(710, 28, 'An Lão', 1, NULL, NULL, NULL),
(711, 28, 'Bạch Long Vĩ', 1, NULL, NULL, NULL),
(712, 28, 'Cát Hải', 1, NULL, NULL, NULL),
(713, 28, 'Kiến Thụy', 1, NULL, NULL, NULL),
(714, 28, 'Thủy Nguyê', 1, NULL, NULL, NULL),
(715, 28, 'Tiên Lãng', 1, NULL, NULL, NULL),
(716, 28, 'Vĩnh Bảo', 1, NULL, NULL, NULL),
(717, 28, 'Đồ Sơ', 1, NULL, NULL, NULL),
(718, 28, 'Dương Kính', 1, NULL, NULL, NULL),
(719, 28, 'Hải A', 1, NULL, NULL, NULL),
(720, 28, 'Hồng Bàng', 1, NULL, NULL, NULL),
(721, 28, 'Kiến A', 1, NULL, NULL, NULL),
(722, 28, 'Lê Châ', 1, NULL, NULL, NULL),
(723, 28, 'Ngô Quyề', 1, NULL, NULL, NULL),
(724, 28, 'Hải A', 1, NULL, NULL, NULL),
(725, 29, 'Cao Phong', 1, NULL, NULL, NULL),
(726, 29, 'Đà Bắc', 1, NULL, NULL, NULL),
(727, 29, 'Kỳ Sơ', 1, NULL, NULL, NULL),
(728, 29, 'Lạc Sơ', 1, NULL, NULL, NULL),
(729, 29, 'Lạc Thủy', 1, NULL, NULL, NULL),
(730, 29, 'Lương Sơ', 1, NULL, NULL, NULL),
(731, 29, 'Mai Châu', 1, NULL, NULL, NULL),
(732, 29, 'Tân Lạc', 1, NULL, NULL, NULL),
(733, 29, 'Yên Thủy', 1, NULL, NULL, NULL),
(734, 29, 'Hòa Bình', 1, NULL, NULL, NULL),
(735, 30, 'Trung tâm thành phố', 1, NULL, NULL, NULL),
(736, 30, 'Bình Chánh', 1, NULL, NULL, NULL),
(737, 30, 'Cần Giờ', 1, NULL, NULL, NULL),
(738, 30, 'Củ Chi', 1, NULL, NULL, NULL),
(739, 30, 'Hóc Mô', 1, NULL, NULL, NULL),
(740, 30, 'Nhà Bè', 1, NULL, NULL, NULL),
(741, 30, 'Quận 1', 1, NULL, NULL, NULL),
(742, 30, 'Quận 2', 1, NULL, NULL, NULL),
(743, 30, 'Quận 3', 1, NULL, NULL, NULL),
(744, 30, 'Quận 4', 1, NULL, NULL, NULL),
(745, 30, 'Quận 5', 1, NULL, NULL, NULL),
(746, 30, 'Quận 6', 1, NULL, NULL, NULL),
(747, 30, 'Quận 7', 1, NULL, NULL, NULL),
(748, 30, 'Quận 8', 1, NULL, NULL, NULL),
(749, 30, 'Quận 9', 1, NULL, NULL, NULL),
(750, 30, 'Quận 10', 1, NULL, NULL, NULL),
(751, 30, 'Quận 11', 1, NULL, NULL, NULL),
(752, 30, 'Quận 12', 1, NULL, NULL, NULL),
(753, 30, 'Bình Tâ', 1, NULL, NULL, NULL),
(754, 30, 'Bình Thạnh', 1, NULL, NULL, NULL),
(755, 30, 'Gò Vấp', 1, NULL, NULL, NULL),
(756, 30, 'Phú Nhuậ', 1, NULL, NULL, NULL),
(757, 30, 'Tân Bình', 1, NULL, NULL, NULL),
(758, 30, 'Tân Phú', 1, NULL, NULL, NULL),
(759, 30, 'Thủ Đức', 1, NULL, NULL, NULL),
(760, 31, 'Châu Thành', 1, NULL, NULL, NULL),
(761, 31, 'Châu Thành A', 1, NULL, NULL, NULL),
(762, 31, 'Long Mỹ', 1, NULL, NULL, NULL),
(763, 31, 'Phụng Hiệp', 1, NULL, NULL, NULL),
(764, 31, 'Vị Thủy', 1, NULL, NULL, NULL),
(765, 31, 'TP. Vị Thanh', 1, NULL, NULL, NULL),
(766, 31, 'TX. Ngã Bảy', 1, NULL, NULL, NULL),
(767, 32, 'Ân Thi', 1, NULL, NULL, NULL),
(768, 32, 'Khoái Châu', 1, NULL, NULL, NULL),
(769, 32, 'Kim Động', 1, NULL, NULL, NULL),
(770, 32, 'Mỹ Hào', 1, NULL, NULL, NULL),
(771, 32, 'Phù Cừ', 1, NULL, NULL, NULL),
(772, 32, 'Tiên Lữ', 1, NULL, NULL, NULL),
(773, 32, 'Văn Giang', 1, NULL, NULL, NULL),
(774, 32, 'Văn Lâm', 1, NULL, NULL, NULL),
(775, 32, 'Yên Mỹ', 1, NULL, NULL, NULL),
(776, 32, 'TP. Hưng Yê', 1, NULL, NULL, NULL),
(777, 33, 'Cam Lâm', 1, NULL, NULL, NULL),
(778, 33, 'Diên Khánh', 1, NULL, NULL, NULL),
(779, 33, 'Khánh Sơ', 1, NULL, NULL, NULL),
(780, 33, 'Khánh Vĩnh', 1, NULL, NULL, NULL),
(781, 33, 'Ninh Hòa', 1, NULL, NULL, NULL),
(782, 33, 'Trường Sa', 1, NULL, NULL, NULL),
(783, 33, 'Vạn Ninh', 1, NULL, NULL, NULL),
(784, 33, 'TP. Nha Trang', 1, NULL, NULL, NULL),
(785, 33, 'TX. Cam Ranh', 1, NULL, NULL, NULL),
(786, 34, 'An Biê', 1, NULL, NULL, NULL),
(787, 34, 'An Minh', 1, NULL, NULL, NULL),
(788, 34, 'Châu Thành', 1, NULL, NULL, NULL),
(789, 34, 'Giang Thành', 1, NULL, NULL, NULL),
(790, 34, 'Giồng Riềng', 1, NULL, NULL, NULL),
(791, 34, 'Gò Quao', 1, NULL, NULL, NULL),
(792, 34, 'Hòn Đất', 1, NULL, NULL, NULL),
(793, 34, 'Kiên Hải', 1, NULL, NULL, NULL),
(794, 34, 'Kiên Lương', 1, NULL, NULL, NULL),
(795, 34, 'Phú Quốc', 1, NULL, NULL, NULL),
(796, 34, 'Tân Hiệp', 1, NULL, NULL, NULL),
(797, 34, 'U Minh Thượng', 1, NULL, NULL, NULL),
(798, 34, 'Vĩnh Thuậ', 1, NULL, NULL, NULL),
(799, 34, 'TP. Rạch Giá', 1, NULL, NULL, NULL),
(800, 34, 'TX. Hà Tiê', 1, NULL, NULL, NULL),
(801, 51, 'TP. Long Xuyê', 1, NULL, NULL, NULL),
(802, 51, 'TP. Châu Đốc', 1, NULL, NULL, NULL),
(803, 51, 'An Phú', 1, NULL, NULL, NULL),
(804, 51, 'TX. Tân Châu', 1, NULL, NULL, NULL),
(805, 51, 'Phú Tâ', 1, NULL, NULL, NULL),
(806, 51, 'Tịnh Biê', 1, NULL, NULL, NULL),
(807, 52, 'TP. Vũng Tàu', 1, NULL, NULL, NULL),
(808, 52, 'TP. Bà Rịa', 1, NULL, NULL, NULL),
(809, 52, 'Xuyên Mộc', 1, NULL, NULL, NULL),
(810, 52, 'Long Điề', 1, NULL, NULL, NULL),
(811, 53, 'TP. Mỹ Tho', 1, NULL, NULL, NULL),
(812, 53, 'TP. Châu Đốc', 1, NULL, NULL, NULL),
(813, 53, 'Thị xã Gò Công', 1, NULL, NULL, NULL),
(814, 53, 'Cái Bè', 1, NULL, NULL, NULL),
(815, 53, 'Cai Lậy', 1, NULL, NULL, NULL),
(816, 53, 'Châu Thành', 1, NULL, NULL, NULL),
(817, 53, 'Chợ Gạo', 1, NULL, NULL, NULL),
(818, 53, 'Gò Công Tây', 1, NULL, NULL, NULL),
(819, 53, 'Gò Công Đông', 1, NULL, NULL, NULL),
(820, 53, 'Tân Phước', 1, NULL, NULL, NULL),
(821, 53, 'Tân Phú Đông', 1, NULL, NULL, NULL),
(822, 53, 'Thị xã Cai Lậy', 1, NULL, NULL, NULL),
(823, 54, 'TP. Rạch Giá', 1, NULL, NULL, NULL),
(824, 54, 'Thị xã Hà Tiê', 1, NULL, NULL, NULL),
(825, 54, 'Kiên Lương', 1, NULL, NULL, NULL),
(826, 54, 'Hòn Đất', 1, NULL, NULL, NULL),
(827, 54, 'Tân Hiệp', 1, NULL, NULL, NULL),
(828, 54, 'Châu Thành', 1, NULL, NULL, NULL),
(829, 54, 'Giồng Riềng', 1, NULL, NULL, NULL),
(830, 54, 'Gò Quao', 1, NULL, NULL, NULL),
(831, 54, 'An Biê', 1, NULL, NULL, NULL),
(832, 54, 'An Minh', 1, NULL, NULL, NULL),
(833, 54, 'Vĩnh Thuậ', 1, NULL, NULL, NULL),
(834, 54, 'Phú Quốc', 1, NULL, NULL, NULL),
(835, 54, 'U Minh Thượng', 1, NULL, NULL, NULL),
(836, 54, 'Giang Thành', 1, NULL, NULL, NULL),
(837, 35, 'Đắk Glei', 1, NULL, NULL, NULL),
(838, 35, 'Đắk Hà', 1, NULL, NULL, NULL),
(839, 35, 'Đắk Tô', 1, NULL, NULL, NULL),
(840, 35, 'Kon Plông', 1, NULL, NULL, NULL),
(841, 35, 'Kon Rẫy', 1, NULL, NULL, NULL),
(842, 35, 'Ngọc Hồi', 1, NULL, NULL, NULL),
(843, 35, 'Sa Thầy', 1, NULL, NULL, NULL),
(844, 35, 'Tu Mơ Rông', 1, NULL, NULL, NULL),
(845, 35, 'TP. Kon Tum', 1, NULL, NULL, NULL),
(846, 55, 'Đông Hưng', 1, NULL, NULL, NULL),
(847, 55, 'Hưng Hà', 1, NULL, NULL, NULL),
(848, 55, 'Kiến Xương', 1, NULL, NULL, NULL),
(849, 55, 'Quỳnh Phụ', 1, NULL, NULL, NULL),
(850, 55, 'Thái Thụy', 1, NULL, NULL, NULL),
(851, 55, 'Tiền Hải', 1, NULL, NULL, NULL),
(852, 55, 'Vũ Thư', 1, NULL, NULL, NULL),
(853, 55, 'TP. Thái Bình', 1, NULL, NULL, NULL),
(854, 64, 'Lục Yê', 1, NULL, NULL, NULL),
(855, 64, 'Mù Cang Chải', 1, NULL, NULL, NULL),
(856, 64, 'Trạm Tấu', 1, NULL, NULL, NULL),
(857, 64, 'Trấn Yê', 1, NULL, NULL, NULL),
(858, 64, 'Văn Chấ', 1, NULL, NULL, NULL),
(859, 64, 'Văn Yê', 1, NULL, NULL, NULL),
(860, 64, 'Yên Bình', 1, NULL, NULL, NULL),
(861, 64, 'TP. Yên Bái', 1, NULL, NULL, NULL),
(862, 64, 'TX. Nghĩa Lộ', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhangs`
--

CREATE TABLE `khachhangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hoten` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tendangnhap` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `matkhau` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngaysinh` date DEFAULT NULL,
  `sdt` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gioitinh` tinyint(1) NOT NULL DEFAULT 1,
  `idtinh` bigint(20) UNSIGNED DEFAULT NULL,
  `idthanhpho` bigint(20) UNSIGNED DEFAULT NULL,
  `diachi` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kichhoat` tinyint(1) NOT NULL DEFAULT 0,
  `hoatdong` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhangs`
--

INSERT INTO `khachhangs` (`id`, `hoten`, `tendangnhap`, `matkhau`, `email`, `ngaysinh`, `sdt`, `gioitinh`, `idtinh`, `idthanhpho`, `diachi`, `avatar`, `kichhoat`, `hoatdong`, `created_at`, `updated_at`) VALUES
(1, 'Antoinette Mayer DDS', 'bharvey', '$2y$10$RZWdwGoY89DHQhU4WirrkeTFMqtSFNpQN9CLgxK7kFiAyMQeNpxHC', 'cronin.cecil@gmail.com', NULL, '494-914-3809 x280', 0, NULL, NULL, NULL, '01.jpg', 0, 0, '2019-12-21 23:59:09', '2019-12-21 23:59:09'),
(2, 'Jackie Raynor', 'walton.bednar', '$2y$10$5e6DHJGrE1rBbU88/6QokuGpuiHoXxR1vld2AQAgmXQJuyTNlXol.', 'wcollier@yahoo.com', NULL, '1-331-839-0698 x175', 0, NULL, NULL, NULL, '01.jpg', 0, 0, '2019-12-21 23:59:09', '2019-12-21 23:59:09'),
(3, 'Regan Effertz', 'connelly.kristopher', '$2y$10$SmsdaqNy/4I9KUH7CbFeNOPVbXH5kauPyn9pcDxiBklgBtSuu9IdO', 'bode.fern@yahoo.com', NULL, '+16862786618', 0, NULL, NULL, NULL, '01.jpg', 1, 0, '2019-12-21 23:59:09', '2019-12-21 23:59:09'),
(4, 'Drake Windler', 'feil.deshawn', '$2y$10$hTT9zDGiR954ozv02Z9S7e2R37nkYv1o1RS4bsLvdg6gH6VejCoIe', 'lenore.rohan@gmail.com', '2005-12-23', '0971234567', 1, 58, 664, 'Huế', '1577050997.jpg', 1, 1, '2019-12-21 23:59:09', '2019-12-22 21:43:39'),
(5, 'Precious Larson', 'araceli92', '$2y$10$zazJSoBYeIK.Vx064bTXvO05NDkEiIVl7gob.e59KNgz4MoHliBk.', 'emory.bosco@fahey.net', NULL, '(515) 307-8856 x3845', 1, NULL, NULL, NULL, '01.jpg', 0, 0, '2019-12-21 23:59:09', '2019-12-21 23:59:09'),
(6, 'Prof. Greg Hartmann Jr.', 'drew.purdy', '$2y$10$b4ntYhEnao4qrSnjwRUSnODJ96v0CGZf32OlcQLe4kRPFmj6ljeBu', 'bode.evans@gmail.com', NULL, '1-548-574-5832', 0, NULL, NULL, NULL, '01.jpg', 0, 0, '2019-12-21 23:59:09', '2019-12-21 23:59:09'),
(7, 'Giovanna Koelpin', 'yhammes', '$2y$10$iJSrCVVISyqGgsCvvkw//uL1NQLeRUbk70enqNFHyH7hFGc2zoOvi', 'travon02@breitenberg.org', NULL, '1-594-768-4190 x4137', 0, NULL, NULL, NULL, '01.jpg', 1, 0, '2019-12-21 23:59:09', '2019-12-21 23:59:09'),
(8, 'Lyla Tillman', 'dashawn.zulauf', '$2y$10$wDs9QM9HyGpaR781qYxe7eGRQmgC1xrERSxt2fff2hL5LdhEFUWS2', 'newton.altenwerth@yahoo.com', NULL, '591-820-9625', 1, NULL, NULL, NULL, '01.jpg', 0, 0, '2019-12-21 23:59:09', '2019-12-21 23:59:09'),
(10, 'Lupe Davis', 'braulio.turner', '$2y$10$6XxiCgFveaVlSalmmThnAeSpIHZtoSqTK4ZcuMc7lmOrQxIfllHQm', 'tad.renner@hegmann.info', '2004-12-01', '0971234567', 1, 4, 115, 'ABC', '1577050227.png', 1, 0, '2019-12-21 23:59:10', '2019-12-22 21:30:27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kichhoats`
--

CREATE TABLE `kichhoats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idkhachhang` bigint(20) UNSIGNED NOT NULL,
  `makichhoat` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaiphongs`
--

CREATE TABLE `loaiphongs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ten` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mota` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loaiphongs`
--

INSERT INTO `loaiphongs` (`id`, `ten`, `mota`, `created_at`, `updated_at`) VALUES
(1, 'Phòng Bình Dân', NULL, '2019-12-21 23:59:10', '2019-12-22 20:48:34'),
(2, 'Phòng Tổng Thống', NULL, '2019-12-21 23:59:10', '2019-12-22 20:48:46'),
(3, 'Phòng Thường', NULL, '2019-12-21 23:59:10', '2019-12-22 20:48:56'),
(4, 'Phòng Ngoại Giao', NULL, '2019-12-21 23:59:11', '2019-12-22 20:49:13'),
(6, 'Phòng ABC', NULL, '2019-12-22 20:50:04', '2019-12-22 20:50:04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaitins`
--

CREATE TABLE `loaitins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ten` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mota` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loaitins`
--

INSERT INTO `loaitins` (`id`, `ten`, `mota`, `created_at`, `updated_at`) VALUES
(1, 'Cộng đồng', NULL, '2019-12-21 23:59:12', '2019-12-22 21:40:39'),
(2, 'Video', NULL, '2019-12-21 23:59:12', '2019-12-22 21:40:45'),
(3, 'Thông báo', NULL, '2019-12-21 23:59:12', '2019-12-22 21:40:52');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(494, '2019_12_09_003503_create_nhanvien_table', 1),
(495, '2019_12_09_003526_create_khachhang_table', 1),
(496, '2019_12_09_003546_create_diachi_table', 1),
(497, '2019_12_09_003616_create_vitri_table', 1),
(498, '2019_12_09_003634_create_loaiphong_table', 1),
(499, '2019_12_09_003656_create_slideshow_table', 1),
(500, '2019_12_09_003729_create_phong_table', 1),
(501, '2019_12_09_003756_create_loaitin_table', 1),
(502, '2019_12_09_003811_create_tin_table', 1),
(503, '2019_12_09_003829_create_nhantin_table', 1),
(504, '2019_12_09_003851_create_banggia_table', 1),
(505, '2019_12_09_003917_create_danhgia_table', 1),
(506, '2019_12_09_003949_create_thue_table', 1),
(507, '2019_12_09_004008_create_trangthaithue_table', 1),
(508, '2019_12_09_004036_create_bodem_table', 1),
(509, '2019_12_09_231343_add_foreign_key_phongs_table', 1),
(510, '2019_12_09_231744_add_foreign_key_tins_table', 1),
(511, '2019_12_09_231926_add_foreign_key_khachhangs_table', 1),
(512, '2019_12_09_232201_add_foreign_key_nhanviens_table', 1),
(513, '2019_12_09_232351_add_foreign_key_banggias_table', 1),
(514, '2019_12_09_232518_add_foreign_key_danhgias_table', 1),
(515, '2019_12_09_232705_add_foreign_key_diachis_table', 1),
(516, '2019_12_09_234856_add_foreign_key_thues_table', 1),
(517, '2019_12_14_080326_create_anhmota_table', 1),
(518, '2019_12_14_231506_add_foreign_key_anhmotas_table', 1),
(519, '2019_12_15_182829_create_tinnhans_table', 1),
(520, '2019_12_22_055320_create_kichhoat_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhantins`
--

CREATE TABLE `nhantins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhantins`
--

INSERT INTO `nhantins` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'daugherty.kailyn@hotmail.com', '2019-12-21 23:59:13', '2019-12-21 23:59:13'),
(2, 'hkoelpin@yahoo.com', '2019-12-21 23:59:13', '2019-12-21 23:59:13'),
(3, 'shana.schimmel@anderson.com', '2019-12-21 23:59:13', '2019-12-21 23:59:13'),
(4, 'slakin@yahoo.com', '2019-12-21 23:59:13', '2019-12-21 23:59:13'),
(5, 'angela.huels@hotmail.com', '2019-12-21 23:59:13', '2019-12-21 23:59:13'),
(6, 'karianne.toy@hills.com', '2019-12-21 23:59:13', '2019-12-21 23:59:13'),
(7, 'austin.lehner@bergnaum.com', '2019-12-21 23:59:13', '2019-12-21 23:59:13'),
(8, 'bartholome.jacobi@yahoo.com', '2019-12-21 23:59:13', '2019-12-21 23:59:13'),
(9, 'ureichel@yahoo.com', '2019-12-21 23:59:13', '2019-12-21 23:59:13'),
(10, 'nicolas.odie@yahoo.com', '2019-12-21 23:59:13', '2019-12-21 23:59:13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanviens`
--

CREATE TABLE `nhanviens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hoten` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tendangnhap` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `matkhau` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isAdmin` tinyint(1) NOT NULL,
  `email` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngaysinh` date DEFAULT NULL,
  `gioitinh` tinyint(1) DEFAULT NULL,
  `idtinh` bigint(20) UNSIGNED DEFAULT NULL,
  `idthanhpho` bigint(20) UNSIGNED DEFAULT NULL,
  `diachi` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hoatdong` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanviens`
--

INSERT INTO `nhanviens` (`id`, `hoten`, `tendangnhap`, `matkhau`, `remember_token`, `isAdmin`, `email`, `sdt`, `ngaysinh`, `gioitinh`, `idtinh`, `idthanhpho`, `diachi`, `avatar`, `hoatdong`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', '$2y$10$MhN8MOaHn.xKb0QZSjvhxOkCoHZBQMxvoRgTsRT1PA0iUiK5srye2', NULL, 1, 'admin@localhost', '+16435541488', NULL, 1, NULL, NULL, NULL, '1577049914.png', 1, '2019-12-21 23:59:07', '2019-12-22 21:25:14'),
(2, 'Dawson Prohaska', 'aletha.koch', '$2y$10$B5QBIX7JYyTuksq1CVx7MOMlKHZpggqQjyojnzSXhjfKNs6hQlpKK', NULL, 0, 'ed73@little.org', '0946756475', '2009-12-23', 0, 15, 204, 'ABC', '1577050032.png', 1, '2019-12-21 23:59:07', '2019-12-22 21:27:12'),
(3, 'Dr. Brooke Boehm', 'obie41', '$2y$10$1AYgalGRwM.Eius7Db2CH.vXwRAwh2tTqurCqV26EXfoTEQe4eE1q', NULL, 0, 'krohan@hotmail.com', '704.699.8237 x56989', NULL, 1, NULL, NULL, NULL, '01.jpg', 0, '2019-12-21 23:59:08', '2019-12-21 23:59:08'),
(4, 'Chadd Funk Sr.', 'bpouros', '$2y$10$EnUKTzTzDCKVZND2hET4iell5oxMjY6MWx7Cs9QcTQhN37ACwQ3u.', NULL, 0, 'deborah.schuster@thiel.org', '525.536.8596', NULL, 0, NULL, NULL, NULL, '01.jpg', 1, '2019-12-21 23:59:08', '2019-12-21 23:59:08'),
(5, 'Mr. Nico Collins MD', 'zelda.barrows', '$2y$10$/uSo3lf5hQfN5bzPsgnqQO7.0gEyMeX6dPFfm3X92Z9uJaUPaZfwe', NULL, 0, 'grimes.dedrick@kulas.com', '383-387-0701 x562', NULL, 0, NULL, NULL, NULL, '01.jpg', 0, '2019-12-21 23:59:08', '2019-12-21 23:59:08'),
(6, 'Chelsey Conn', 'iwintheiser', '$2y$10$eSpf2P7EcN36lx.u41lyfO9cnlq6zX5GS4QXBpUKRrsnTPxNV7PBi', NULL, 0, 'marlee.gleichner@yahoo.com', '1-206-788-5315', NULL, 0, NULL, NULL, NULL, '01.jpg', 0, '2019-12-21 23:59:08', '2019-12-21 23:59:08'),
(7, 'Danielle Will', 'stanton.adolfo', '$2y$10$Rz/ABxggudZyz.17cZvni.eO5IoxxxiXNlsZFQ8V8xibOrZGMwMVC', NULL, 0, 'gruecker@yahoo.com', '917-937-1990 x648', NULL, 1, NULL, NULL, NULL, '01.jpg', 1, '2019-12-21 23:59:08', '2019-12-21 23:59:08'),
(8, 'Gia Bruen', 'merritt.kemmer', '$2y$10$Az815DfX1f1Xlu6Y1b.1Q.ZfzxdrZCw9dUvKgBySjS34SxAlT11d.', NULL, 0, 'gabrielle.friesen@gmail.com', '(216) 971-9552 x8994', NULL, 1, NULL, NULL, NULL, '01.jpg', 1, '2019-12-21 23:59:08', '2019-12-21 23:59:08'),
(9, 'Kylee Wehner', 'glenna73', '$2y$10$5ZhJg.qvtQr73gNL/dmUUuxS5AgEAJ0LqAFU5d3MCsTvM1sodg6o.', NULL, 0, 'alvena19@thompson.info', '765-764-2296 x604', NULL, 0, NULL, NULL, NULL, '01.jpg', 0, '2019-12-21 23:59:08', '2019-12-21 23:59:08'),
(10, 'Chaz Gusikowski', 'lamar.purdy', '$2y$10$91Dq52r7.t8qsTSOH5ydtujIvh9rPsaD4yNoJLTnZJBrhxH2EYskW', NULL, 0, 'yoshiko08@rolfson.com', '+1.990.880.1498', NULL, 1, NULL, NULL, NULL, '01.jpg', 1, '2019-12-21 23:59:08', '2019-12-21 23:59:08'),
(11, 'Prof. Emerson Lakin MD', 'abby.reilly', '$2y$10$qsuStOQiLKecM/lH7NJFfukYdKzSFmnS6RDI6tQ0PPtu7.umNDRSW', NULL, 0, 'carlotta.crooks@hotmail.com', '+1-718-984-5200', NULL, 1, NULL, NULL, NULL, '01.jpg', 1, '2019-12-21 23:59:08', '2019-12-21 23:59:08');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phongs`
--

CREATE TABLE `phongs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tenphong` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tienich` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `songuoilon` int(11) NOT NULL,
  `sotreem` int(11) NOT NULL,
  `dientich` decimal(8,2) NOT NULL,
  `sogiuong` int(11) NOT NULL,
  `idloai` bigint(20) UNSIGNED DEFAULT NULL,
  `idvitri` bigint(20) UNSIGNED DEFAULT NULL,
  `hinhdaidien` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hoatdong` tinyint(1) NOT NULL DEFAULT 1,
  `ghichu` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phongs`
--

INSERT INTO `phongs` (`id`, `tenphong`, `tienich`, `songuoilon`, `sotreem`, `dientich`, `sogiuong`, `idloai`, `idvitri`, `hinhdaidien`, `hoatdong`, `ghichu`, `created_at`, `updated_at`) VALUES
(1, '101', 'Tiện ích', 1, 3, '36.00', 2, 4, 3, '1577047922.jpg', 1, NULL, '2019-12-21 23:59:11', '2019-12-22 20:52:02'),
(2, '102', 'Tiện ích', 2, 0, '14.00', 1, 2, 3, '1577048754.jpg', 1, NULL, '2019-12-21 23:59:11', '2019-12-22 21:05:54'),
(5, '103', 'Tiện ích', 2, 2, '34.00', 3, 2, 1, '1577048816.jpg', 0, NULL, '2019-12-21 23:59:11', '2019-12-22 21:06:56'),
(6, '104', 'Tiện ích', 5, 0, '24.00', 2, 1, 3, '1577048849.jpg', 1, NULL, '2019-12-21 23:59:11', '2019-12-22 21:07:45'),
(7, '204', 'Tiện ích', 5, 3, '27.00', 2, 4, 2, '1577048934.jpg', 1, NULL, '2019-12-21 23:59:11', '2019-12-22 21:08:54'),
(8, '207', 'Tiện ích', 3, 0, '30.00', 2, 3, 2, '1577048960.jpg', 1, NULL, '2019-12-21 23:59:11', '2019-12-22 21:09:20'),
(9, '202', 'Tiện ích', 5, 4, '23.00', 2, 3, 3, '1577048911.jpg', 1, NULL, '2019-12-21 23:59:12', '2019-12-22 21:08:31'),
(10, '201', 'Tiện ích', 5, 3, '44.00', 1, 2, 3, '1577048883.jpg', 1, NULL, '2019-12-21 23:59:12', '2019-12-22 21:08:03'),
(11, '209', 'Điện thoại quốc tế', 2, 0, '40.00', 1, 2, 3, '1577049012.jpg', 1, NULL, '2019-12-22 21:10:12', '2019-12-22 21:10:12'),
(12, '105', 'Điện thoại quốc tế', 3, 1, '36.00', 2, 2, 1, '1577049049.jpg', 1, NULL, '2019-12-22 21:10:49', '2019-12-22 21:10:49'),
(13, '106', 'Điện thoại quốc tế', 2, 0, '23.00', 1, 2, 2, '1577049086.jpg', 1, NULL, '2019-12-22 21:11:26', '2019-12-22 21:11:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slideshows`
--

CREATE TABLE `slideshows` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `urlanh` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tieude` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mota` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lienket` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hoatdong` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `slideshows`
--

INSERT INTO `slideshows` (`id`, `urlanh`, `tieude`, `mota`, `lienket`, `hoatdong`, `created_at`, `updated_at`) VALUES
(1, '1577050334.jpg', 'NewTime Hotel', 'Mang đến sự sang trọng cho bạn', 'http://localhost', 1, '2019-12-21 23:59:11', '2019-12-22 21:32:14'),
(2, '1577050340.jpg', 'Châu Khá Bảnh', 'Tôi đẹp trai vì tôi thấy thế', 'http://localhost', 1, '2019-12-21 23:59:11', '2019-12-22 21:32:20'),
(3, '1577050350.jpg', 'Lorem Ipsum', 'Lorem Ipsum Lorem Ipsum', 'http://localhost', 0, '2019-12-21 23:59:11', '2019-12-22 21:32:30'),
(4, '1577050357.png', 'Cao đẳng Công nghiệp Huế', 'Hướng đến thành công', 'http://localhost', 1, '2019-12-21 23:59:11', '2019-12-22 21:32:37'),
(5, '1577050383.jpg', 'Lorem Ipsum', 'Lorem Ipsum', 'http://localhost.com', 1, '2019-12-22 21:33:03', '2019-12-22 21:33:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thues`
--

CREATE TABLE `thues` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idkhach` bigint(20) UNSIGNED NOT NULL,
  `idphong` bigint(20) UNSIGNED NOT NULL,
  `batdau` date NOT NULL,
  `ketthuc` date NOT NULL,
  `idtrangthai` bigint(20) UNSIGNED NOT NULL,
  `ghichu` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thues`
--

INSERT INTO `thues` (`id`, `idkhach`, `idphong`, `batdau`, `ketthuc`, `idtrangthai`, `ghichu`, `created_at`, `updated_at`) VALUES
(1, 1, 5, '2019-11-07', '2019-12-21', 5, NULL, '2019-12-21 23:59:15', '2019-12-21 23:59:15'),
(2, 2, 1, '2019-11-09', '2019-12-07', 5, NULL, '2019-12-21 23:59:15', '2019-12-21 23:59:15'),
(3, 3, 8, '2019-11-20', '2019-12-19', 3, NULL, '2019-12-21 23:59:15', '2019-12-21 23:59:15'),
(4, 4, 1, '2019-10-30', '2019-12-09', 4, NULL, '2019-12-21 23:59:15', '2019-12-21 23:59:15'),
(5, 5, 10, '2019-11-03', '2019-12-19', 5, NULL, '2019-12-21 23:59:15', '2019-12-21 23:59:15'),
(6, 6, 10, '2019-12-23', '2019-12-25', 2, NULL, '2019-12-21 23:59:15', '2019-12-22 20:45:41'),
(7, 7, 9, '2019-11-26', '2019-12-19', 3, NULL, '2019-12-21 23:59:15', '2019-12-21 23:59:15'),
(8, 8, 6, '2019-11-01', '2019-12-16', 4, NULL, '2019-12-21 23:59:15', '2019-12-21 23:59:15'),
(10, 10, 9, '2019-10-21', '2019-12-04', 2, NULL, '2019-12-21 23:59:15', '2019-12-21 23:59:15'),
(11, 4, 1, '2019-12-23', '2019-12-23', 1, NULL, '2019-12-22 21:44:02', '2019-12-22 21:44:02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tinnhans`
--

CREATE TABLE `tinnhans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hoten` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tieude` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noidung` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tins`
--

CREATE TABLE `tins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tieude` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mota` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noidung` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `anhdaidien` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idnhanvien` bigint(20) UNSIGNED NOT NULL,
  `idloaitin` bigint(20) UNSIGNED NOT NULL,
  `hoatdong` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tins`
--

INSERT INTO `tins` (`id`, `tieude`, `mota`, `noidung`, `anhdaidien`, `idnhanvien`, `idloaitin`, `hoatdong`, `created_at`, `updated_at`) VALUES
(1, 'Explicabo quo vitae aut nam laudantium.', 'Velit molestiae ut aut.', '<p>What is Lorem Ipsum?</p>\r\n\r\n<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p>Why do we use it?</p>\r\n\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n\r\n<p> </p>\r\n\r\n<p>Where does it come from?</p>\r\n\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>\r\n\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\r\n\r\n<p>Where can I get some?</p>\r\n\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc</p>', '1577050461.jpg', 2, 1, 1, '2019-12-21 23:59:12', '2019-12-22 21:36:07'),
(2, 'Voluptatem reprehenderit culpa eos et.', 'Vero et aliquid aut voluptatem.', '<p>What is Lorem Ipsum?</p>\r\n\r\n<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p>Why do we use it?</p>\r\n\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n\r\n<p> </p>\r\n\r\n<p>Where does it come from?</p>\r\n\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>\r\n\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\r\n\r\n<p>Where can I get some?</p>\r\n\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc</p>', '1577050469.jpg', 9, 1, 1, '2019-12-21 23:59:12', '2019-12-22 21:36:12'),
(3, 'Sunt amet exercitationem ipsam aut omnis.', 'Aliquid dolor cum totam inventore repudiandae sed.', '<p>Architecto repudiandae odio mollitia suscipit nihil.</p>', '1577050478.jpg', 11, 3, 1, '2019-12-21 23:59:12', '2019-12-22 21:34:38'),
(4, 'Animi cum repellendus delectus nemo quo harum.', 'Placeat eos repellendus aspernatur ut aut.', '<p>What is Lorem Ipsum?</p>\r\n\r\n<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p>Why do we use it?</p>\r\n\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n\r\n<p> </p>\r\n\r\n<p>Where does it come from?</p>\r\n\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>\r\n\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\r\n\r\n<p>Where can I get some?</p>\r\n\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc</p>', '1577050487.jpg', 7, 2, 1, '2019-12-21 23:59:12', '2019-12-22 21:36:17'),
(5, 'Voluptas ut voluptas optio atque aut aut perspiciatis.', 'Adipisci quas soluta itaque ut ea.', '<p>Maxime velit dolore blanditiis rerum facilis et.</p>', '1577050495.jpg', 6, 3, 1, '2019-12-21 23:59:12', '2019-12-22 21:34:55'),
(6, 'Libero autem et et aut odit iste.', 'Quibusdam fuga ut molestias ratione rem.', '<p>What is Lorem Ipsum?</p>\r\n\r\n<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p>Why do we use it?</p>\r\n\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n\r\n<p> </p>\r\n\r\n<p>Where does it come from?</p>\r\n\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>\r\n\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\r\n\r\n<p>Where can I get some?</p>\r\n\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc</p>', '1577050528.jpg', 3, 3, 1, '2019-12-21 23:59:12', '2019-12-22 21:36:22'),
(7, 'Veritatis qui quasi tempore maxime.', 'Nihil placeat officiis dolorem ut.', '<p>Eius et qui illum qui.</p>', '1577050536.jpg', 8, 3, 1, '2019-12-21 23:59:13', '2019-12-22 21:35:36'),
(8, 'Error ut nostrum neque est voluptates.', 'Minima eaque minus corporis quia sit.', '<p>Vitae ea quos aut qui possimus id.</p>', '1577050521.jpg', 9, 3, 1, '2019-12-21 23:59:13', '2019-12-22 21:35:21'),
(9, 'Enim illum quis nesciunt quia quo facere commodi.', 'Error nulla voluptatum suscipit et in ex rerum.', '<p>Quos numquam enim aut est quasi.</p>', '1577050502.jpg', 6, 1, 1, '2019-12-21 23:59:13', '2019-12-22 21:35:02'),
(10, 'Dicta quae corrupti ratione ut.', 'Ipsum est facilis qui aut.', '<p><strong>What is Lorem Ipsum?</strong></p>\r\n\r\n<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><strong>Why do we use it?</strong></p>\r\n\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n\r\n<p><strong>Where does it come from?</strong></p>\r\n\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>\r\n\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\r\n\r\n<p><strong>Where can I get some?</strong></p>\r\n\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc</p>', '1577050511.jpg', 9, 3, 1, '2019-12-21 23:59:13', '2019-12-22 21:38:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trangthaithues`
--

CREATE TABLE `trangthaithues` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ghichu` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `trangthaithues`
--

INSERT INTO `trangthaithues` (`id`, `mota`, `ghichu`, `created_at`, `updated_at`) VALUES
(1, 'Đặt phòng', NULL, '2019-12-21 23:59:14', '2019-12-21 23:59:14'),
(2, 'Xác nhận', NULL, '2019-12-21 23:59:14', '2019-12-21 23:59:14'),
(3, 'Nhận phòng', NULL, '2019-12-21 23:59:14', '2019-12-21 23:59:14'),
(4, 'Hủy', NULL, '2019-12-21 23:59:14', '2019-12-21 23:59:14'),
(5, 'Đã thanh toán', NULL, '2019-12-21 23:59:14', '2019-12-21 23:59:14');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vitris`
--

CREATE TABLE `vitris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ten` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mota` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vitris`
--

INSERT INTO `vitris` (`id`, `ten`, `mota`, `created_at`, `updated_at`) VALUES
(1, 'Sát Biển', NULL, '2019-12-21 23:59:10', '2019-12-22 20:50:19'),
(2, 'Sát Sông', NULL, '2019-12-21 23:59:10', '2019-12-22 20:50:34'),
(3, 'Gần đường giao thông', NULL, '2019-12-21 23:59:10', '2019-12-22 20:50:48'),
(4, 'Vị trí ABC', NULL, '2019-12-22 20:51:06', '2019-12-22 20:51:06');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `anhmotas`
--
ALTER TABLE `anhmotas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `anhmotas_idphong_foreign` (`idphong`);

--
-- Chỉ mục cho bảng `banggias`
--
ALTER TABLE `banggias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `banggias_idphong_foreign` (`idphong`);

--
-- Chỉ mục cho bảng `bodems`
--
ALTER TABLE `bodems`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `danhgias`
--
ALTER TABLE `danhgias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `danhgias_idkhachhang_foreign` (`idkhachhang`);

--
-- Chỉ mục cho bảng `diachis`
--
ALTER TABLE `diachis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `diachis_idtinh_foreign` (`idtinh`);

--
-- Chỉ mục cho bảng `khachhangs`
--
ALTER TABLE `khachhangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `khachhangs_idtinh_foreign` (`idtinh`),
  ADD KEY `khachhangs_idthanhpho_foreign` (`idthanhpho`);

--
-- Chỉ mục cho bảng `kichhoats`
--
ALTER TABLE `kichhoats`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `loaiphongs`
--
ALTER TABLE `loaiphongs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `loaitins`
--
ALTER TABLE `loaitins`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nhantins`
--
ALTER TABLE `nhantins`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nhanviens`
--
ALTER TABLE `nhanviens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nhanviens_idtinh_foreign` (`idtinh`),
  ADD KEY `nhanviens_idthanhpho_foreign` (`idthanhpho`);

--
-- Chỉ mục cho bảng `phongs`
--
ALTER TABLE `phongs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `phongs_idloai_foreign` (`idloai`),
  ADD KEY `phongs_idvitri_foreign` (`idvitri`);

--
-- Chỉ mục cho bảng `slideshows`
--
ALTER TABLE `slideshows`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `thues`
--
ALTER TABLE `thues`
  ADD PRIMARY KEY (`id`),
  ADD KEY `thues_idkhach_foreign` (`idkhach`),
  ADD KEY `thues_idphong_foreign` (`idphong`),
  ADD KEY `thues_idtrangthai_foreign` (`idtrangthai`);

--
-- Chỉ mục cho bảng `tinnhans`
--
ALTER TABLE `tinnhans`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tins`
--
ALTER TABLE `tins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tins_idloaitin_foreign` (`idloaitin`),
  ADD KEY `tins_idnhanvien_foreign` (`idnhanvien`);

--
-- Chỉ mục cho bảng `trangthaithues`
--
ALTER TABLE `trangthaithues`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `vitris`
--
ALTER TABLE `vitris`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `anhmotas`
--
ALTER TABLE `anhmotas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT cho bảng `banggias`
--
ALTER TABLE `banggias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `bodems`
--
ALTER TABLE `bodems`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `danhgias`
--
ALTER TABLE `danhgias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `diachis`
--
ALTER TABLE `diachis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=863;

--
-- AUTO_INCREMENT cho bảng `khachhangs`
--
ALTER TABLE `khachhangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `kichhoats`
--
ALTER TABLE `kichhoats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `loaiphongs`
--
ALTER TABLE `loaiphongs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `loaitins`
--
ALTER TABLE `loaitins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=521;

--
-- AUTO_INCREMENT cho bảng `nhantins`
--
ALTER TABLE `nhantins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `nhanviens`
--
ALTER TABLE `nhanviens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `phongs`
--
ALTER TABLE `phongs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `slideshows`
--
ALTER TABLE `slideshows`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `thues`
--
ALTER TABLE `thues`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `tinnhans`
--
ALTER TABLE `tinnhans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tins`
--
ALTER TABLE `tins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `trangthaithues`
--
ALTER TABLE `trangthaithues`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `vitris`
--
ALTER TABLE `vitris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `anhmotas`
--
ALTER TABLE `anhmotas`
  ADD CONSTRAINT `anhmotas_idphong_foreign` FOREIGN KEY (`idphong`) REFERENCES `phongs` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `banggias`
--
ALTER TABLE `banggias`
  ADD CONSTRAINT `banggias_idphong_foreign` FOREIGN KEY (`idphong`) REFERENCES `phongs` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `danhgias`
--
ALTER TABLE `danhgias`
  ADD CONSTRAINT `danhgias_idkhachhang_foreign` FOREIGN KEY (`idkhachhang`) REFERENCES `khachhangs` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `diachis`
--
ALTER TABLE `diachis`
  ADD CONSTRAINT `diachis_idtinh_foreign` FOREIGN KEY (`idtinh`) REFERENCES `diachis` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `khachhangs`
--
ALTER TABLE `khachhangs`
  ADD CONSTRAINT `khachhangs_idthanhpho_foreign` FOREIGN KEY (`idthanhpho`) REFERENCES `diachis` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `khachhangs_idtinh_foreign` FOREIGN KEY (`idtinh`) REFERENCES `diachis` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `nhanviens`
--
ALTER TABLE `nhanviens`
  ADD CONSTRAINT `nhanviens_idthanhpho_foreign` FOREIGN KEY (`idthanhpho`) REFERENCES `diachis` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `nhanviens_idtinh_foreign` FOREIGN KEY (`idtinh`) REFERENCES `diachis` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `phongs`
--
ALTER TABLE `phongs`
  ADD CONSTRAINT `phongs_idloai_foreign` FOREIGN KEY (`idloai`) REFERENCES `loaiphongs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `phongs_idvitri_foreign` FOREIGN KEY (`idvitri`) REFERENCES `vitris` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `thues`
--
ALTER TABLE `thues`
  ADD CONSTRAINT `thues_idkhach_foreign` FOREIGN KEY (`idkhach`) REFERENCES `khachhangs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `thues_idphong_foreign` FOREIGN KEY (`idphong`) REFERENCES `phongs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `thues_idtrangthai_foreign` FOREIGN KEY (`idtrangthai`) REFERENCES `trangthaithues` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tins`
--
ALTER TABLE `tins`
  ADD CONSTRAINT `tins_idloaitin_foreign` FOREIGN KEY (`idloaitin`) REFERENCES `loaitins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tins_idnhanvien_foreign` FOREIGN KEY (`idnhanvien`) REFERENCES `nhanviens` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
