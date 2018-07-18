-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 25 Jun 2018 pada 17.36
-- Versi Server: 10.0.34-MariaDB-0ubuntu0.16.04.1
-- PHP Version: 7.0.30-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `c1arkan_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barangs`
--

CREATE TABLE `barangs` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_barang` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_beli` decimal(11,2) NOT NULL,
  `harga_jual` decimal(11,2) NOT NULL,
  `code_barang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `toko_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `barangs`
--

INSERT INTO `barangs` (`id`, `nama_barang`, `harga_beli`, `harga_jual`, `code_barang`, `kategori_id`, `toko_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'NASI PUTIH', '0.00', '5000.00', 'SC1', '1', '1', '2018-05-08 07:10:08', '2018-05-08 07:10:08', NULL),
(2, 'NASI BAKAR TERI MEDAN', '0.00', '10000.00', 'SC2', '1', '1', '2018-05-10 01:46:53', '2018-05-10 01:46:53', NULL),
(3, 'MIE AYAM YAMIN BIASA', '0.00', '13000.00', 'MB3', '1', '2', '2018-05-11 05:54:25', '2018-05-11 05:54:25', NULL),
(4, 'NASI BAKAR AYAM KEMANGI', '0.00', '14000.00', 'SC4', '1', '1', '2018-06-06 07:31:27', '2018-06-06 07:31:27', NULL),
(5, 'NASI PECEL', '0.00', '13000.00', 'SC5', '1', '1', '2018-06-06 07:32:47', '2018-06-06 07:32:47', NULL),
(6, 'NASI GORENG BIASA', '0.00', '15000.00', 'SC6', '1', '1', '2018-06-06 07:33:28', '2018-06-06 07:33:28', NULL),
(7, 'NASI GORENG SPESIAL', '0.00', '20000.00', 'SC7', '1', '1', '2018-06-06 07:33:59', '2018-06-06 07:33:59', NULL),
(8, 'NASI GORENG SEAFOOD', '0.00', '20000.00', 'SC8', '1', '1', '2018-06-06 07:34:21', '2018-06-06 07:34:21', NULL),
(9, 'NASI GORENG PETE', '0.00', '20000.00', 'SC9', '1', '1', '2018-06-06 07:34:48', '2018-06-06 07:34:48', NULL),
(10, 'NASI GORENG IKAN ASIN', '0.00', '20000.00', 'SC10', '1', '1', '2018-06-06 07:35:39', '2018-06-06 07:35:39', NULL),
(11, 'NASI GORENG SELIMUT', '0.00', '20000.00', 'SC11', '1', '1', '2018-06-06 07:37:15', '2018-06-06 07:37:15', NULL),
(12, 'NASI GORENG ORIENTAL', '0.00', '17000.00', 'SC12', '1', '1', '2018-06-06 07:37:53', '2018-06-06 07:37:53', NULL),
(13, 'AYAM GORENG LENGKUAS', '0.00', '15000.00', 'SC13', '1', '1', '2018-06-06 07:40:08', '2018-06-06 07:40:08', NULL),
(14, 'AYAM BAKAR KECAP', '0.00', '15000.00', 'SC14', '1', '1', '2018-06-06 07:40:38', '2018-06-06 07:40:38', NULL),
(15, 'AYAM BAKAR KALASAN', '0.00', '16000.00', 'SC15', '1', '1', '2018-06-06 07:42:25', '2018-06-06 07:42:25', NULL),
(16, 'AYAM PENYET', '0.00', '17000.00', 'SC16', '1', '1', '2018-06-06 07:42:56', '2018-06-06 07:42:56', NULL),
(17, 'AYAM CABE IJO', '0.00', '17000.00', 'SC17', '1', '1', '2018-06-06 07:43:12', '2018-06-06 07:43:12', NULL),
(18, 'AYAM CABE GARAM', '0.00', '17000.00', 'SC18', '1', '1', '2018-06-06 07:43:33', '2018-06-06 07:43:33', NULL),
(19, 'AYAM SAOS PADANG', '0.00', '18000.00', 'SC19', '1', '1', '2018-06-06 07:44:34', '2018-06-06 07:44:34', NULL),
(20, 'AYAM RICA-RICA', '0.00', '18000.00', 'SC20', '1', '1', '2018-06-06 07:44:53', '2018-06-06 07:44:53', NULL),
(21, 'AYAM RICA-RICA MANADO', '0.00', '19000.00', 'SC21', '1', '1', '2018-06-06 07:45:14', '2018-06-06 07:45:14', NULL),
(22, 'AYAM GORENG KREMES', '0.00', '20000.00', 'SC22', '1', '1', '2018-06-06 07:45:30', '2018-06-06 07:45:30', NULL),
(23, 'MIE GORENG BIASA', '0.00', '15000.00', 'SC23', '1', '1', '2018-06-06 07:45:54', '2018-06-06 07:45:54', NULL),
(24, 'MIE GORENG SPESIAL', '0.00', '20000.00', 'SC24', '1', '1', '2018-06-06 07:46:14', '2018-06-06 07:46:14', NULL),
(25, 'MIE GORENG SEAFOOD', '0.00', '20000.00', 'SC25', '1', '1', '2018-06-06 07:47:06', '2018-06-06 07:47:06', NULL),
(26, 'MIE KUAH BIASA', '0.00', '17000.00', 'SC26', '1', '1', '2018-06-06 07:47:31', '2018-06-06 07:47:31', NULL),
(27, 'MIE TEK TEK SURABAYA', '0.00', '20000.00', 'SC27', '1', '1', '2018-06-06 07:47:53', '2018-06-06 07:47:53', NULL),
(28, 'MIE GORENG JAWA', '0.00', '20000.00', 'SC28', '1', '1', '2018-06-06 07:48:09', '2018-06-06 07:48:09', NULL),
(29, 'MIE GODOG JAWA', '0.00', '20000.00', 'SC29', '1', '1', '2018-06-06 07:48:23', '2018-06-06 07:48:23', NULL),
(30, 'BIHUN / KWETIAW GORENG BIASA', '0.00', '15000.00', 'SC30', '1', '1', '2018-06-06 07:49:06', '2018-06-06 07:49:06', NULL),
(31, 'BIHUN / KWETIAW GORENG SPESIAL', '0.00', '20000.00', 'SC31', '1', '1', '2018-06-06 07:49:38', '2018-06-06 07:49:38', NULL),
(32, 'BIHUN / KWETIAW GORENG SEAFOOD', '0.00', '20000.00', 'SC32', '1', '1', '2018-06-06 07:50:00', '2018-06-06 07:50:00', NULL),
(33, 'BIHUN / KWETIAW SIRAM', '0.00', '20000.00', 'SC33', '1', '1', '2018-06-06 07:50:17', '2018-06-06 07:50:17', NULL),
(34, 'UDANG / CUMI PENYET', '0.00', '24000.00', 'SC34', '1', '1', '2018-06-06 07:51:01', '2018-06-06 07:51:01', NULL),
(35, 'UDANG / CUMI GORENG TEPUNG', '0.00', '24000.00', 'SC35', '1', '1', '2018-06-06 07:51:36', '2018-06-06 07:51:36', NULL),
(36, 'UDANG / CUMI GORENG CABE GARAM', '0.00', '25000.00', 'SC36', '1', '1', '2018-06-06 07:51:57', '2018-06-06 07:51:57', NULL),
(37, 'UDANG / CUMI GORENG SAOS ASAM MANIS', '0.00', '25000.00', 'SC37', '1', '1', '2018-06-06 07:52:11', '2018-06-06 07:52:11', NULL),
(38, 'UDANG / CUMI GORENG SAOS PADANG', '0.00', '25000.00', 'SC38', '1', '1', '2018-06-06 07:52:26', '2018-06-06 07:52:26', NULL),
(39, 'UDANG / CUMI GORENG SAOS TIRAM', '0.00', '25000.00', 'SC39', '1', '1', '2018-06-06 07:52:45', '2018-06-06 07:52:45', NULL),
(40, 'UDANG / CUMI GORENG SAOS RICA-RICA', '0.00', '25000.00', 'SC40', '1', '1', '2018-06-06 07:53:25', '2018-06-06 07:53:25', NULL),
(41, 'EMPAL GORENG', '0.00', '20000.00', 'SC41', '1', '1', '2018-06-06 07:53:44', '2018-06-06 07:53:44', NULL),
(42, 'SAPI LADA HITAM', '0.00', '30000.00', 'SC42', '1', '1', '2018-06-06 07:54:02', '2018-06-06 07:54:02', NULL),
(43, 'IGA BAKAR MANIS PEDAS', '0.00', '35000.00', 'SC43', '1', '1', '2018-06-06 07:54:20', '2018-06-06 07:54:20', NULL),
(44, 'IGA BAKAR SAOS MADU LADA HITAM', '0.00', '35000.00', 'SC44', '1', '1', '2018-06-06 07:54:39', '2018-06-06 07:54:39', NULL),
(45, 'IGA GARANG ASEM', '0.00', '35000.00', 'SC45', '1', '1', '2018-06-06 07:54:54', '2018-06-06 07:54:54', NULL),
(46, 'IGA PENYET', '0.00', '35000.00', 'SC46', '1', '1', '2018-06-06 07:55:09', '2018-06-06 07:55:09', NULL),
(47, 'IGA CABE HIJAU', '0.00', '35000.00', 'SC47', '1', '1', '2018-06-06 07:55:59', '2018-06-06 07:55:59', NULL),
(48, 'GURAME GORENG / BAKAR', '0.00', '58000.00', 'SC48', '1', '1', '2018-06-06 07:58:05', '2018-06-06 07:58:05', NULL),
(49, 'GURAME GORENG TERBANG', '0.00', '58000.00', 'SC49', '1', '1', '2018-06-06 07:58:22', '2018-06-06 07:58:22', NULL),
(50, 'GURAME SAOS PADANG', '0.00', '58000.00', 'SC50', '1', '1', '2018-06-06 07:58:40', '2018-06-06 07:58:40', NULL),
(51, 'GURAME SAOS ASAM MANIS', '0.00', '58000.00', 'SC51', '1', '1', '2018-06-06 07:59:09', '2018-06-06 07:59:09', NULL),
(52, 'GURAME CABE GARAM', '0.00', '55000.00', 'SC52', '1', '1', '2018-06-06 07:59:23', '2018-06-06 08:00:26', NULL),
(53, 'GURAME SOP', '0.00', '58000.00', 'SC53', '1', '1', '2018-06-06 07:59:47', '2018-06-06 07:59:47', NULL),
(54, 'GURAME PECAK BETAWI / KEMANGI', '0.00', '58000.00', 'SC54', '1', '1', '2018-06-06 08:00:04', '2018-06-06 08:00:04', NULL),
(55, 'GURAME SAOS ASAM PEDAS', '0.00', '58000.00', 'SC55', '1', '1', '2018-06-06 08:00:44', '2018-06-06 08:00:44', NULL),
(56, 'NILA GORENG / BAKAR', '0.00', '35000.00', 'SC56', '1', '1', '2018-06-06 08:01:29', '2018-06-06 08:01:29', NULL),
(57, 'NILA SOP', '0.00', '35000.00', 'SC57', '1', '1', '2018-06-06 08:01:43', '2018-06-06 08:01:43', NULL),
(58, 'NILA PECAK BETAWI / KEMANGI', '0.00', '35000.00', 'SC58', '1', '1', '2018-06-06 08:01:58', '2018-06-06 08:01:58', NULL),
(59, 'LELE GORENG /  BAKAR ( 2 EKOR )', '0.00', '26000.00', 'SC59', '1', '1', '2018-06-06 08:02:19', '2018-06-06 08:02:19', NULL),
(60, 'LELE PENYET ( 2 EKOR )', '0.00', '28000.00', 'SC60', '1', '1', '2018-06-06 08:02:34', '2018-06-06 08:02:34', NULL),
(61, 'LELE PECAK BETAWI / KEMANGI', '0.00', '29000.00', 'SC61', '1', '1', '2018-06-06 08:02:51', '2018-06-06 08:02:51', NULL),
(62, 'LELE KREMES', '0.00', '29000.00', 'SC62', '1', '1', '2018-06-06 08:03:04', '2018-06-06 08:03:04', NULL),
(63, 'SAYUR LODEH', '0.00', '10000.00', 'SC63', '1', '1', '2018-06-06 08:03:20', '2018-06-06 08:03:20', NULL),
(64, 'SUP SAYURAN', '0.00', '10000.00', 'SC64', '1', '1', '2018-06-06 08:03:36', '2018-06-06 08:03:36', NULL),
(65, 'SAYUR ASEM', '0.00', '8000.00', 'SC65', '1', '1', '2018-06-06 08:03:49', '2018-06-06 08:03:49', NULL),
(66, 'CAH KANGKUNG AYAM', '0.00', '15000.00', 'SC66', '1', '1', '2018-06-06 08:04:02', '2018-06-06 08:04:02', NULL),
(67, 'CAH KANGKUNG SEAFOOD', '0.00', '17000.00', 'SC67', '1', '1', '2018-06-06 08:04:23', '2018-06-06 08:04:23', NULL),
(68, 'CAH KANGKUNG TAUCO', '0.00', '11000.00', 'SC68', '1', '1', '2018-06-06 08:04:38', '2018-06-06 08:04:38', NULL),
(69, 'CAH KANGKUNG BALACAN', '0.00', '10000.00', 'SC69', '1', '1', '2018-06-06 08:04:54', '2018-06-06 08:04:54', NULL),
(70, 'CAH KANGKUNG POLOS', '0.00', '9000.00', 'SC70', '1', '1', '2018-06-06 08:05:12', '2018-06-06 08:05:12', NULL),
(71, 'CAH TOGE POLOS', '0.00', '9000.00', 'SC71', '1', '1', '2018-06-06 08:05:24', '2018-06-06 08:05:24', NULL),
(72, 'CAH TOGE IKAN ASIN', '0.00', '15000.00', 'SC72', '1', '1', '2018-06-06 08:05:38', '2018-06-06 08:05:38', NULL),
(73, 'CAP CAY KUAH / GORENG', '0.00', '15000.00', 'SC73', '1', '1', '2018-06-06 08:06:26', '2018-06-06 08:06:26', NULL),
(74, 'SAPO TAHU', '0.00', '22000.00', 'SC74', '1', '1', '2018-06-06 08:06:42', '2018-06-06 08:06:42', NULL),
(75, 'KAREDOK', '0.00', '14000.00', 'SC75', '1', '1', '2018-06-06 08:06:58', '2018-06-06 08:06:58', NULL),
(76, 'URAP', '0.00', '14000.00', 'SC76', '1', '1', '2018-06-06 08:07:09', '2018-06-06 08:07:09', NULL),
(77, 'TUMIS JANTUNG TERI MEDAN', '0.00', '13000.00', 'SC77', '1', '1', '2018-06-06 08:07:26', '2018-06-06 08:07:26', NULL),
(78, 'TUMIS KEMBANG PAYA TERI MEDAN', '0.00', '13000.00', 'SC78', '1', '1', '2018-06-06 08:07:41', '2018-06-06 08:07:41', NULL),
(79, 'OSENG KULIT MELINJO', '0.00', '13000.00', 'SC79', '1', '1', '2018-06-06 08:08:00', '2018-06-06 08:08:00', NULL),
(80, 'ORAK ARIK ENDOG PETE', '0.00', '15000.00', 'SC80', '1', '1', '2018-06-06 08:08:13', '2018-06-06 08:08:13', NULL),
(81, 'OSENG MIE NDESO', '0.00', '15000.00', 'SC81', '1', '1', '2018-06-06 08:08:26', '2018-06-06 08:08:26', NULL),
(82, 'GENJER TAUCO', '0.00', '13000.00', 'SC82', '1', '1', '2018-06-06 08:08:40', '2018-06-06 08:08:40', NULL),
(83, 'IKAN ASIN BULU AYAM CABE IJO & PETE', '0.00', '20000.00', 'SC83', '1', '1', '2018-06-06 08:08:59', '2018-06-06 08:08:59', NULL),
(84, 'IKAN PEDAK JASUNG CABE IJO & PETE', '0.00', '23000.00', 'SC84', '1', '1', '2018-06-06 08:09:21', '2018-06-06 08:09:21', NULL),
(85, 'PEDAK SIRAM ACAR BAWANG', '0.00', '15000.00', 'SC85', '1', '1', '2018-06-06 08:09:58', '2018-06-06 08:09:58', NULL),
(86, 'SAMBAL ALA SAUNG CISADANE', '0.00', '10000.00', 'SC86', '1', '1', '2018-06-06 08:10:11', '2018-06-06 08:10:11', NULL),
(87, 'SAMBAL TERASI GORENG', '0.00', '8000.00', 'SC87', '1', '1', '2018-06-06 08:10:26', '2018-06-06 08:10:26', NULL),
(88, 'SAMBAL MENTAH / DADAK', '0.00', '8000.00', 'SC88', '1', '1', '2018-06-06 08:10:40', '2018-06-06 08:10:40', NULL),
(89, 'SAMBAL TERI MEDAN', '0.00', '10000.00', 'SC89', '1', '1', '2018-06-06 08:10:56', '2018-06-06 08:10:56', NULL),
(90, 'SAMBAL KENCUR', '0.00', '8000.00', 'SC90', '1', '1', '2018-06-06 08:11:07', '2018-06-06 08:11:07', NULL),
(91, 'SAMBAL TEMPE', '0.00', '8000.00', 'SC91', '1', '1', '2018-06-06 08:11:27', '2018-06-06 08:11:27', NULL),
(92, 'SAMBAL KECAP', '0.00', '8000.00', 'SC92', '1', '1', '2018-06-06 08:11:40', '2018-06-06 08:11:40', NULL),
(93, 'TELOR CEPLOK', '0.00', '6000.00', 'SC93', '1', '1', '2018-06-06 08:12:01', '2018-06-06 08:12:01', NULL),
(94, 'TELOR DADAR ISI', '0.00', '7000.00', 'SC94', '1', '1', '2018-06-06 08:12:17', '2018-06-06 08:12:17', NULL),
(95, 'JENGKOL GORENG', '0.00', '8000.00', 'SC95', '1', '1', '2018-06-06 08:12:32', '2018-06-06 08:12:32', NULL),
(96, 'JENGKOL BALADO', '0.00', '10000.00', 'SC96', '1', '1', '2018-06-06 08:12:47', '2018-06-06 08:12:47', NULL),
(97, 'PETE ( GORENG / BAKAR )', '0.00', '13000.00', 'SC97', '1', '1', '2018-06-06 08:13:37', '2018-06-06 08:13:37', NULL),
(98, 'PETE BALADO', '0.00', '18000.00', 'SC98', '1', '1', '2018-06-06 08:16:16', '2018-06-06 08:16:16', NULL),
(99, 'ORANGE SQUASH', '0.00', '15000.00', 'SC99', '2', '1', '2018-06-06 08:16:35', '2018-06-06 08:16:35', NULL),
(100, 'MELON SQUASH', '0.00', '14000.00', 'SC100', '2', '1', '2018-06-06 08:16:51', '2018-06-06 08:16:51', NULL),
(101, 'LIME SQUASH', '0.00', '16000.00', 'SC101', '2', '1', '2018-06-06 08:17:07', '2018-06-06 08:17:07', NULL),
(102, 'STRAWBERRY SQUASH', '0.00', '16000.00', 'SC102', '2', '1', '2018-06-06 08:21:31', '2018-06-06 08:21:31', NULL),
(103, 'JUS JAMBU KLUTUK / BATU', '0.00', '12000.00', 'SC103', '2', '1', '2018-06-06 08:22:46', '2018-06-06 08:22:46', NULL),
(104, 'JUS SIRSAK', '0.00', '12000.00', 'SC104', '2', '1', '2018-06-06 08:23:01', '2018-06-06 08:23:01', NULL),
(105, 'JUS ALPUKAT', '0.00', '14000.00', 'SC105', '2', '1', '2018-06-06 08:23:33', '2018-06-06 08:23:33', NULL),
(106, 'JUS MELON', '0.00', '12000.00', 'SC106', '2', '1', '2018-06-06 08:24:23', '2018-06-06 08:24:23', NULL),
(107, 'JUS MANGGA', '0.00', '12000.00', 'SC107', '2', '1', '2018-06-06 08:24:59', '2018-06-06 08:24:59', NULL),
(108, 'JUS WORTEL', '0.00', '12000.00', 'SC108', '2', '1', '2018-06-06 08:25:11', '2018-06-06 08:25:11', NULL),
(109, 'JUS KOMBINASI 2 RASA', '0.00', '14000.00', 'SC109', '2', '1', '2018-06-06 08:25:25', '2018-06-06 08:25:25', NULL),
(110, 'STRAWBERRY MILK SHAKE', '0.00', '15000.00', 'SC110', '2', '1', '2018-06-06 08:25:41', '2018-06-06 08:25:41', NULL),
(111, 'MELON MILK SHAKE', '0.00', '15000.00', 'SC111', '2', '1', '2018-06-06 08:25:55', '2018-06-06 08:25:55', NULL),
(112, 'CHOCOLATE MILK SHAKE', '0.00', '15000.00', 'SC112', '2', '1', '2018-06-06 08:26:17', '2018-06-06 08:26:17', NULL),
(113, 'KELAPA MUDA UTUH', '0.00', '12000.00', 'SC113', '2', '1', '2018-06-06 08:26:33', '2018-06-06 08:26:33', NULL),
(114, 'ES SARIMENTI (MENTIMUN)', '0.00', '9000.00', 'SC114', '2', '1', '2018-06-06 08:26:53', '2018-06-06 08:26:53', NULL),
(115, 'ES CAMPUR', '0.00', '12000.00', 'SC115', '2', '1', '2018-06-06 08:27:12', '2018-06-06 08:27:12', NULL),
(116, 'MOCCA CINCAU', '0.00', '8000.00', 'SC116', '2', '1', '2018-06-06 08:27:26', '2018-06-06 08:27:26', NULL),
(117, 'ES KELAPA (GELAS)', '0.00', '6000.00', 'SC117', '2', '1', '2018-06-06 08:27:41', '2018-06-06 08:27:41', NULL),
(118, 'ES TEH BOTOL / S-TEE', '0.00', '5000.00', 'SC118', '2', '1', '2018-06-06 08:28:00', '2018-06-06 08:28:00', NULL),
(119, 'ES FRUIT TEA', '0.00', '5000.00', 'SC119', '2', '1', '2018-06-06 08:28:24', '2018-06-06 08:28:24', NULL),
(120, 'ES TEBS', '0.00', '6000.00', 'SC120', '2', '1', '2018-06-06 08:28:53', '2018-06-06 08:28:53', NULL),
(121, 'ES SODA GEMBIRA', '0.00', '8000.00', 'SC121', '2', '1', '2018-06-06 08:29:09', '2018-06-06 08:29:09', NULL),
(122, 'ES JERUK / JERUK HANGAT', '0.00', '8000.00', 'SC122', '2', '1', '2018-06-06 08:29:22', '2018-06-06 08:29:22', NULL),
(123, 'ES JERUK NIPIS / JERUK NIPIS HANGAT', '0.00', '8000.00', 'SC123', '2', '1', '2018-06-06 08:29:39', '2018-06-06 08:29:39', NULL),
(124, 'ES TEH MANIS / TEH MANIS HANGAT', '0.00', '5000.00', 'SC124', '2', '1', '2018-06-06 08:29:59', '2018-06-06 08:29:59', NULL),
(125, 'PRIMA BOTOL', '0.00', '4000.00', 'SC125', '2', '1', '2018-06-06 08:30:14', '2018-06-06 08:30:14', NULL),
(126, 'ES TEH TAWAR', '0.00', '2000.00', 'SC126', '2', '1', '2018-06-06 08:30:29', '2018-06-06 08:30:29', NULL),
(127, 'TEH TAWAR HANGAT', '0.00', '1000.00', 'SC127', '2', '1', '2018-06-06 08:30:45', '2018-06-06 08:30:45', NULL),
(128, 'TUBRUK', '0.00', '10000.00', 'SC128', '2', '1', '2018-06-06 08:31:09', '2018-06-06 08:31:09', NULL),
(129, 'V-60', '0.00', '12000.00', 'SC129', '2', '1', '2018-06-06 08:31:23', '2018-06-06 08:31:23', NULL),
(130, 'FRENCH PRESS', '0.00', '12000.00', 'SC130', '2', '1', '2018-06-06 08:31:37', '2018-06-06 08:31:37', NULL),
(131, 'VIETNAM DRIP', '0.00', '12000.00', 'SC131', '2', '1', '2018-06-06 08:31:49', '2018-06-06 08:31:49', NULL),
(132, 'ESPRESSO 1 SHOOT', '0.00', '10000.00', 'SC132', '2', '1', '2018-06-06 08:32:21', '2018-06-06 08:32:21', NULL),
(133, 'ESPRESSO 2 SHOOT', '0.00', '12000.00', 'SC133', '2', '1', '2018-06-06 08:32:43', '2018-06-06 08:32:43', NULL),
(134, 'ESPRESSO SUSU KENTAL MANIS', '0.00', '12000.00', 'SC134', '2', '1', '2018-06-06 08:32:56', '2018-06-06 08:32:56', NULL),
(135, 'CAFFELATE  ( HOT/ICE )', '0.00', '15000.00', 'SC135', '2', '1', '2018-06-06 08:33:26', '2018-06-06 08:33:26', NULL),
(136, 'CAPPUCINO ( HOT/ICE )', '0.00', '18000.00', 'SC136', '2', '1', '2018-06-06 08:34:10', '2018-06-06 08:34:10', NULL),
(137, 'MOCHACINO (ICE)', '0.00', '20000.00', 'SC137', '2', '1', '2018-06-06 08:34:25', '2018-06-06 08:34:25', NULL),
(138, 'AMERICANO ( HOT )', '0.00', '15000.00', 'SC138', '2', '1', '2018-06-06 08:34:43', '2018-06-06 08:34:43', NULL),
(139, 'CHOCOLATE ( HOT/ICE )', '0.00', '15000.00', 'SC139', '2', '1', '2018-06-06 08:34:59', '2018-06-06 08:34:59', NULL),
(140, 'RED VELVET ( ICE )', '0.00', '15000.00', 'SC140', '2', '1', '2018-06-06 08:35:13', '2018-06-06 08:35:13', NULL),
(141, 'TAHU GEJROT', '0.00', '10000.00', 'SC141', '1', '1', '2018-06-06 08:35:33', '2018-06-06 08:35:33', NULL),
(142, 'TAHU & TEMPE GORENG', '0.00', '8000.00', 'SC142', '1', '1', '2018-06-06 08:35:45', '2018-06-06 08:35:45', NULL),
(143, 'TEMPE MENDOAN ( ISI 5 )', '0.00', '15000.00', 'SC143', '1', '1', '2018-06-06 08:36:02', '2018-06-06 08:36:02', NULL),
(144, 'BAKWAN JAGUNG ( ISI 2 )', '0.00', '8000.00', 'SC144', '1', '1', '2018-06-06 08:36:18', '2018-06-06 08:36:18', NULL),
(145, 'TAHU & TEMPE BACEM', '0.00', '12000.00', 'SC145', '1', '1', '2018-06-06 08:36:32', '2018-06-06 08:36:32', NULL),
(146, 'KENTANG GORENG', '0.00', '14000.00', 'SC146', '1', '1', '2018-06-06 08:36:46', '2018-06-06 08:36:46', NULL),
(147, 'PISANG GORENG ( ISI 5 )', '0.00', '20000.00', 'SC147', '1', '1', '2018-06-06 08:37:05', '2018-06-06 08:37:05', NULL),
(148, 'PISANG BAKAR( ISI 3 )', '0.00', '15000.00', 'SC148', '1', '1', '2018-06-06 08:37:32', '2018-06-06 08:37:32', NULL),
(149, 'ROTI BAKAR', '0.00', '15000.00', 'SC149', '1', '1', '2018-06-06 08:38:10', '2018-06-06 08:38:10', NULL),
(150, 'TAPE GORENG ( ISI 4 )', '0.00', '15000.00', 'SC150', '1', '1', '2018-06-06 08:38:25', '2018-06-06 08:38:25', NULL),
(151, 'BAKSO GORENG ( ISI 5 )', '0.00', '13000.00', 'SC151', '1', '1', '2018-06-06 08:38:43', '2018-06-06 08:38:43', NULL),
(152, 'SOSIS GORENG ( ISI 5 )', '0.00', '13000.00', 'SC152', '1', '1', '2018-06-06 08:38:57', '2018-06-06 08:38:57', NULL),
(153, 'CISADANE 1', '0.00', '39000.00', 'SC153', '1', '1', '2018-06-06 08:39:14', '2018-06-06 08:39:14', NULL),
(154, 'CISADANE 2', '0.00', '27000.00', 'SC154', '1', '1', '2018-06-06 08:39:31', '2018-06-06 08:39:31', NULL),
(155, 'RAHMAT', '0.00', '38000.00', 'SC155', '1', '1', '2018-06-06 08:39:56', '2018-06-06 08:39:56', NULL),
(156, 'NASI TIMBEL', '0.00', '27000.00', 'SC156', '1', '1', '2018-06-06 08:40:10', '2018-06-06 08:40:10', NULL),
(157, 'NIKMAT', '0.00', '24000.00', 'SC157', '1', '1', '2018-06-06 08:40:26', '2018-06-06 08:40:26', NULL),
(158, 'PAKET GURAME', '0.00', '35000.00', 'SC158', '1', '1', '2018-06-06 08:40:44', '2018-06-06 08:40:44', NULL),
(159, 'PAKET CERIA 1', '0.00', '20000.00', 'SC159', '1', '1', '2018-06-06 08:41:12', '2018-06-06 08:41:12', NULL),
(160, 'PAKET CERIA 2', '0.00', '20000.00', 'SC160', '1', '1', '2018-06-06 08:41:26', '2018-06-06 08:41:26', NULL),
(161, 'PAKET CERIA 3', '0.00', '20000.00', 'SC161', '1', '1', '2018-06-06 08:41:48', '2018-06-06 08:41:48', NULL),
(162, 'MIE AYAM BIASA', '0.00', '12000.00', 'MB162', '1', '2', '2018-06-06 08:58:16', '2018-06-06 08:58:16', NULL),
(163, 'MIE AYAM BASO', '0.00', '15000.00', 'MB163', '1', '2', '2018-06-06 08:58:33', '2018-06-06 08:58:33', NULL),
(164, 'MIE AYAM PANGSIT', '0.00', '14000.00', 'MB164', '1', '2', '2018-06-06 08:58:55', '2018-06-06 08:58:55', NULL),
(165, 'MIE AYAM CEKER', '0.00', '15000.00', 'MB165', '1', '2', '2018-06-06 09:00:00', '2018-06-06 09:00:00', NULL),
(166, 'MIE AYAM BASO CEKER', '0.00', '18000.00', 'MB166', '1', '2', '2018-06-06 09:00:25', '2018-06-06 09:00:25', NULL),
(167, 'MIE AYAM KOMPLIT ( BASO, PANGSIT)', '0.00', '17000.00', 'MB167', '1', '2', '2018-06-06 09:00:48', '2018-06-06 09:00:48', NULL),
(168, 'MIE AYAM SPESIAL ( BASO PANGSIT, CEKER)', '0.00', '20000.00', 'MB168', '1', '2', '2018-06-06 09:01:04', '2018-06-06 09:01:04', NULL),
(169, 'MIE AYAM YAMIN BASO', '0.00', '16000.00', 'MB169', '1', '2', '2018-06-06 09:01:23', '2018-06-06 09:01:23', NULL),
(170, 'MIE AYAM YAMIN PANGSIT', '0.00', '15000.00', 'MB170', '1', '2', '2018-06-06 09:01:38', '2018-06-06 09:01:38', NULL),
(171, 'MIE AYAM YAMIN CEKER', '0.00', '16000.00', 'MB171', '1', '2', '2018-06-06 09:01:52', '2018-06-06 09:01:52', NULL),
(172, 'MIE AYAM YAMIN BASO CEKER', '0.00', '19000.00', 'MB172', '1', '2', '2018-06-06 09:02:09', '2018-06-06 09:02:09', NULL),
(173, 'MIE AYAM YAMIN KOMPLIT ( BASO, PANGSIT)', '0.00', '18000.00', 'MB173', '1', '2', '2018-06-06 09:02:34', '2018-06-06 09:02:34', NULL),
(174, 'MIE AYAM YAMIN SPESIAL ( BASO, PANGSIT, CEKER )', '0.00', '21000.00', 'MB174', '1', '2', '2018-06-06 09:03:05', '2018-06-06 09:03:05', NULL),
(175, 'KWETIAW BIASA', '0.00', '12000.00', 'MB175', '1', '2', '2018-06-06 09:03:19', '2018-06-06 09:03:19', NULL),
(176, 'KWETIAW BASO', '0.00', '15000.00', 'MB176', '1', '2', '2018-06-06 09:03:36', '2018-06-06 09:03:36', NULL),
(177, 'KWETIAW PANGSIT', '0.00', '14000.00', 'MB177', '1', '2', '2018-06-06 09:04:14', '2018-06-06 09:04:14', NULL),
(178, 'KWETIAW CEKER', '0.00', '15000.00', 'MB178', '1', '2', '2018-06-06 09:05:07', '2018-06-06 09:05:07', NULL),
(179, 'KWETIAW BASO CEKER', '0.00', '18000.00', 'MB179', '1', '2', '2018-06-06 09:05:23', '2018-06-06 09:05:23', NULL),
(180, 'KWETIAW KOMPLIT ( BASO, PANGSIT )', '0.00', '17000.00', 'MB180', '1', '2', '2018-06-06 09:05:44', '2018-06-06 09:05:44', NULL),
(181, 'KWETIAW SPESIAL ( BASO, PANGSIT, CEKER )', '0.00', '20000.00', 'MB181', '1', '2', '2018-06-06 09:06:01', '2018-06-06 09:06:01', NULL),
(182, 'BIHUN AYAM BIASA', '0.00', '12000.00', 'MB182', '1', '2', '2018-06-06 09:06:22', '2018-06-06 09:06:22', NULL),
(183, 'BIHUN AYAM BASO', '0.00', '15000.00', 'MB183', '1', '2', '2018-06-06 09:06:40', '2018-06-06 09:06:40', NULL),
(184, 'BIHUN AYAM PANGSIT', '0.00', '14000.00', 'MB184', '1', '2', '2018-06-06 09:07:02', '2018-06-06 09:07:02', NULL),
(185, 'BIHUN AYAM CEKER', '0.00', '15000.00', 'MB185', '1', '2', '2018-06-06 09:07:25', '2018-06-06 09:07:25', NULL),
(186, 'BIHUN AYAM BASO CEKER', '0.00', '18000.00', 'MB186', '1', '2', '2018-06-06 09:07:44', '2018-06-06 09:07:44', NULL),
(187, 'BIHUN AYAM KOMPLIT ( BASO, PANGSIT )', '0.00', '17000.00', 'MB187', '1', '2', '2018-06-06 09:08:03', '2018-06-06 09:08:03', NULL),
(188, 'BIHUN AYAM SPESIAL ( BASO, PANGSIT, CEKER )', '0.00', '20000.00', 'MB188', '1', '2', '2018-06-06 09:08:21', '2018-06-06 09:08:21', NULL),
(189, 'BASO & PANGSIT BANYUMAS', '0.00', '12000.00', 'MB189', '1', '2', '2018-06-06 09:08:45', '2018-06-06 09:08:45', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barangs`
--
ALTER TABLE `barangs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barangs`
--
ALTER TABLE `barangs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;