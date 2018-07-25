-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 25 Jul 2018 pada 15.07
-- Versi Server: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arkan_set`
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `name`, `code`, `deskripsi`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Makanan', 'A', 'makanan', '2018-05-08 06:07:12', '2018-05-08 06:07:12', NULL),
(2, 'Minuman', 'I', 'minuman', '2018-05-08 06:07:26', '2018-05-08 06:07:26', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_stock_ins`
--

CREATE TABLE `detail_stock_ins` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_stockin` int(11) NOT NULL,
  `id_itemstock` int(11) NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl` date NOT NULL,
  `jml` decimal(11,1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `detail_stock_ins`
--

INSERT INTO `detail_stock_ins` (`id`, `id_stockin`, `id_itemstock`, `nama`, `kode`, `tgl`, `jml`, `created_at`, `updated_at`, `deleted_at`) VALUES
(11, 10, 30, 'AYAM GORENG', 'ST1', '2018-07-21', '45.0', '2018-07-21 04:44:17', '2018-07-21 04:44:17', NULL),
(12, 10, 31, 'AYAM BAKAR', 'ST2', '2018-07-21', '45.0', '2018-07-21 04:44:17', '2018-07-21 04:44:17', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_stock_outs`
--

CREATE TABLE `detail_stock_outs` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_stockout` int(11) NOT NULL,
  `id_itemstock` int(11) NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl` date NOT NULL,
  `jml` decimal(11,1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `item_stocks`
--

CREATE TABLE `item_stocks` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_stock` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satuan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `item_stocks`
--

INSERT INTO `item_stocks` (`id`, `nama`, `kode_stock`, `satuan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(30, 'AYAM GORENG', 'ST1', 'POTONG', '2018-07-04 08:59:04', '2018-07-04 08:59:04', NULL),
(31, 'AYAM BAKAR', 'ST2', 'POTONG', '2018-07-21 01:50:24', '2018-07-21 01:50:24', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_11_01_144602_create_barangs_table', 1),
(4, '2017_11_03_154849_create_orders_table', 1),
(5, '2017_11_03_171447_create_order_items_table', 1),
(6, '2017_11_04_101523_create_shoppingcart_table', 1),
(7, '2017_11_28_151011_create_pembayarans_table', 1),
(8, '2017_12_26_014757_create_reports_table', 1),
(9, '2018_02_17_090347_create_purchases_table', 1),
(10, '2018_03_16_072048_laratrust_setup_tables', 1),
(11, '2018_04_29_115312_create_categories_table', 1),
(12, '2018_04_29_115528_create_tokos_table', 1),
(13, '2018_06_25_115643_create_item_stocks_table', 2),
(14, '2018_06_30_125516_create_stock_ins_table', 3),
(15, '2018_06_30_125724_create_stock_outs_table', 4),
(16, '2018_07_02_113150_create_detail_stock_ins_table', 5),
(17, '2018_07_02_113803_create_detail_stock_outs_table', 6),
(18, '2018_07_03_123332_create_stocks_table', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_customer` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_order` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `total` decimal(11,2) NOT NULL,
  `total_laba` decimal(11,2) NOT NULL,
  `status` enum('cash','pending') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id`, `nama_customer`, `code_order`, `jumlah_barang`, `total`, `total_laba`, `status`, `tanggal`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'arkan', '001/ORD/V/2018', 3, '28000.00', '0.00', 'cash', '2018-05-11', '2018-05-11 05:46:29', '2018-05-11 07:28:22', NULL),
(2, 'arakaen', '002/ORD/V/2018', 3, '28000.00', '0.00', 'cash', '2018-05-11', '2018-05-11 05:48:32', '2018-05-12 00:57:11', NULL),
(3, 'akaka', '003/ORD/V/2018', 2, '10000.00', '0.00', 'cash', '2018-05-11', '2018-05-11 05:50:28', '2018-05-11 05:53:18', NULL),
(4, 'hhh', '004/ORD/V/2018', 8, '65000.00', '0.00', 'cash', '2018-05-25', '2018-05-25 09:27:33', '2018-05-25 09:28:08', NULL),
(5, 'hhhjjjj', '005/ORD/V/2018', 5, '49000.00', '0.00', 'cash', '2018-05-25', '2018-05-25 09:28:57', '2018-05-25 09:29:19', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_items`
--

CREATE TABLE `order_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `barang_id` int(10) UNSIGNED NOT NULL,
  `code_barang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_barang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` decimal(11,2) NOT NULL,
  `harga_beli` decimal(11,2) NOT NULL,
  `subtotal` decimal(11,2) NOT NULL,
  `laba` decimal(11,2) NOT NULL,
  `toko_id` int(10) UNSIGNED NOT NULL,
  `kategori_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `barang_id`, `code_barang`, `nama_barang`, `qty`, `harga`, `harga_beli`, `subtotal`, `laba`, `toko_id`, `kategori_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3, 1, 'SC1', 'NASI PUTIH', 2, '5000.00', '0.00', '10000.00', '0.00', 1, 1, '2018-05-11 05:50:28', '2018-05-11 05:50:28', NULL),
(2, 2, 1, 'SC1', 'NASI PUTIH', 1, '5000.00', '0.00', '5000.00', '0.00', 1, 1, '2018-05-11 05:52:04', '2018-05-11 05:52:04', NULL),
(3, 2, 2, 'SC2', 'NASI BAKAR TERI MEDAN', 1, '10000.00', '0.00', '10000.00', '0.00', 1, 1, '2018-05-11 05:52:04', '2018-05-11 05:52:04', NULL),
(4, 1, 2, 'SC2', 'NASI BAKAR TERI MEDAN', 1, '10000.00', '0.00', '10000.00', '0.00', 1, 1, '2018-05-11 05:52:32', '2018-05-11 05:52:32', NULL),
(5, 1, 1, 'SC1', 'NASI PUTIH', 1, '5000.00', '0.00', '5000.00', '0.00', 1, 1, '2018-05-11 05:52:32', '2018-05-11 05:52:32', NULL),
(6, 2, 3, 'MB3', 'MIE AYAM YAMIN BIASA', 1, '13000.00', '0.00', '13000.00', '0.00', 2, 1, '2018-05-11 05:54:43', '2018-05-11 05:54:43', NULL),
(7, 1, 3, 'MB3', 'MIE AYAM YAMIN BIASA', 1, '13000.00', '0.00', '13000.00', '0.00', 2, 1, '2018-05-11 07:27:55', '2018-05-11 07:27:55', NULL),
(8, 4, 2, 'SC2', 'NASI BAKAR TERI MEDAN', 5, '10000.00', '0.00', '50000.00', '0.00', 1, 1, '2018-05-25 09:27:33', '2018-05-25 09:27:33', NULL),
(9, 4, 1, 'SC1', 'NASI PUTIH', 3, '5000.00', '0.00', '15000.00', '0.00', 1, 1, '2018-05-25 09:27:33', '2018-05-25 09:27:33', NULL),
(10, 5, 1, 'SC1', 'NASI PUTIH', 2, '5000.00', '0.00', '10000.00', '0.00', 1, 1, '2018-05-25 09:28:57', '2018-05-25 09:28:57', NULL),
(11, 5, 3, 'MB3', 'MIE AYAM YAMIN BIASA', 3, '13000.00', '0.00', '39000.00', '0.00', 2, 1, '2018-05-25 09:28:57', '2018-05-25 09:28:57', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayarans`
--

CREATE TABLE `pembayarans` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `tipe_pembayaran` enum('tunai','debet') COLLATE utf8mb4_unicode_ci NOT NULL,
  `bayar` decimal(10,2) NOT NULL,
  `kembalian` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pembayarans`
--

INSERT INTO `pembayarans` (`id`, `order_id`, `tanggal`, `tipe_pembayaran`, `bayar`, `kembalian`, `total`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3, '2018-05-11', 'tunai', '20000.00', '10000.00', '10000.00', '2018-05-11 05:53:18', '2018-05-11 05:53:18', NULL),
(2, 1, '2018-05-11', 'tunai', '30000.00', '2000.00', '28000.00', '2018-05-11 07:28:22', '2018-05-11 07:28:22', NULL),
(3, 2, '2018-05-12', 'tunai', '30000.00', '2000.00', '28000.00', '2018-05-12 00:57:11', '2018-05-12 00:57:11', NULL),
(4, 4, '2018-05-25', 'tunai', '100000.00', '35000.00', '65000.00', '2018-05-25 09:28:08', '2018-05-25 09:28:08', NULL),
(5, 5, '2018-05-25', 'tunai', '50000.00', '1000.00', '49000.00', '2018-05-25 09:29:19', '2018-05-25 09:29:19', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'create-users', 'Create Users', 'Create Users', '2018-05-08 06:05:45', '2018-05-08 06:05:45'),
(2, 'read-users', 'Read Users', 'Read Users', '2018-05-08 06:05:45', '2018-05-08 06:05:45'),
(3, 'update-users', 'Update Users', 'Update Users', '2018-05-08 06:05:45', '2018-05-08 06:05:45'),
(4, 'delete-users', 'Delete Users', 'Delete Users', '2018-05-08 06:05:45', '2018-05-08 06:05:45'),
(5, 'create-acl', 'Create Acl', 'Create Acl', '2018-05-08 06:05:45', '2018-05-08 06:05:45'),
(6, 'read-acl', 'Read Acl', 'Read Acl', '2018-05-08 06:05:45', '2018-05-08 06:05:45'),
(7, 'update-acl', 'Update Acl', 'Update Acl', '2018-05-08 06:05:45', '2018-05-08 06:05:45'),
(8, 'delete-acl', 'Delete Acl', 'Delete Acl', '2018-05-08 06:05:45', '2018-05-08 06:05:45'),
(9, 'read-profile', 'Read Profile', 'Read Profile', '2018-05-08 06:05:45', '2018-05-08 06:05:45'),
(10, 'update-profile', 'Update Profile', 'Update Profile', '2018-05-08 06:05:45', '2018-05-08 06:05:45'),
(11, 'create-profile', 'Create Profile', 'Create Profile', '2018-05-08 06:05:47', '2018-05-08 06:05:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(3, 1),
(3, 2),
(4, 1),
(4, 2),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(9, 2),
(9, 3),
(10, 1),
(10, 2),
(10, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `permission_user`
--

CREATE TABLE `permission_user` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `permission_user`
--

INSERT INTO `permission_user` (`permission_id`, `user_id`, `user_type`) VALUES
(9, 4, 'App\\User'),
(10, 4, 'App\\User'),
(11, 4, 'App\\User');

-- --------------------------------------------------------

--
-- Struktur dari tabel `purchases`
--

CREATE TABLE `purchases` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_supplier` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_supplier` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `total` decimal(11,2) NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('cash','pending') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `reports`
--

CREATE TABLE `reports` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `barang_id` int(10) UNSIGNED NOT NULL,
  `orderdetail_id` int(10) UNSIGNED NOT NULL,
  `pembayaran_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'superadministrator', 'Superadministrator', 'Superadministrator', '2018-05-08 06:05:45', '2018-05-08 06:05:45'),
(2, 'administrator', 'Administrator', 'Administrator', '2018-05-08 06:05:46', '2018-05-08 06:05:46'),
(3, 'user', 'User', 'User', '2018-05-08 06:05:46', '2018-05-08 06:05:46'),
(4, 'kasir', 'Kasir', 'Kasir', '2018-05-29 06:27:14', '2018-05-29 06:27:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_user`
--

CREATE TABLE `role_user` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`, `user_type`) VALUES
(1, 1, 'App\\User'),
(2, 2, 'App\\User'),
(3, 3, 'App\\User'),
(4, 5, 'App\\User');

-- --------------------------------------------------------

--
-- Struktur dari tabel `shoppingcart`
--

CREATE TABLE `shoppingcart` (
  `identifier` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instance` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `stocks`
--

CREATE TABLE `stocks` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_stockin` int(11) DEFAULT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_stockout` int(11) DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `jml_in` decimal(11,1) DEFAULT NULL,
  `jml_out` decimal(11,1) DEFAULT NULL,
  `stock_awal` decimal(11,1) DEFAULT NULL,
  `stock_akhir` decimal(11,1) DEFAULT NULL,
  `id_itemstock` int(11) DEFAULT NULL,
  `id_detailstockin` int(11) DEFAULT NULL,
  `id_detailstockout` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `stocks`
--

INSERT INTO `stocks` (`id`, `id_stockin`, `nama`, `kode`, `id_stockout`, `tgl`, `jml_in`, `jml_out`, `stock_awal`, `stock_akhir`, `id_itemstock`, `id_detailstockin`, `id_detailstockout`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 10, 'AYAM GORENG', 'ST1', NULL, '2018-07-21', '45.0', '0.0', '0.0', '45.0', 30, 11, NULL, '2018-07-04 08:59:04', '2018-07-21 04:44:17', NULL),
(3, 10, 'AYAM BAKAR', 'ST2', NULL, '2018-07-21', '45.0', '0.0', '0.0', '45.0', 31, 12, NULL, '2018-07-21 01:50:24', '2018-07-21 04:44:17', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `stock_ins`
--

CREATE TABLE `stock_ins` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl` date NOT NULL,
  `total` decimal(11,1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `stock_ins`
--

INSERT INTO `stock_ins` (`id`, `nama`, `kode`, `tgl`, `total`, `created_at`, `updated_at`, `deleted_at`) VALUES
(10, 'testst', 'STI1', '2018-07-21', '90.0', '2018-07-21 04:44:17', '2018-07-21 04:44:17', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `stock_outs`
--

CREATE TABLE `stock_outs` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl` date NOT NULL,
  `total` decimal(11,1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tokos`
--

CREATE TABLE `tokos` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tokos`
--

INSERT INTO `tokos` (`id`, `name`, `code`, `deskripsi`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Saung Cisadane', 'SC', 'Saung Cisadane', '2018-05-08 06:07:47', '2018-05-08 06:07:47', NULL),
(2, 'Mie Ayam Banyumas', 'MB', 'Mie Ayam Banyumas', '2018-05-08 06:08:04', '2018-05-08 06:08:04', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Superadministrator', 'superadministrator@app.com', '$2y$10$2Pup8uj0umSMh42F/bvEMe/A43TcdqrHACD.lYvG6TJOrAshZDKjG', 'r7CrnxKjaQvGWTfO5lXbkKVcEk1mupRwWZSENc1nYrcNToEhYHg8QjFuCBAG', '2018-05-08 06:05:46', '2018-05-08 06:05:46'),
(2, 'Administrator', 'administrator@app.com', '$2y$10$TjuGydAvnVJuI5RFunurO.ptVBUdYP0FWzuPvUfCgLisPYJ5JXeHm', NULL, '2018-05-08 06:05:46', '2018-05-08 06:05:46'),
(3, 'User', 'user@app.com', '$2y$10$tu757toR4tergHPf8kG8jur2L0QHsdvpEn8jiiWKyi3gzdJgl6Yoe', NULL, '2018-05-08 06:05:47', '2018-05-08 06:05:47'),
(4, 'Cru User', 'cru_user@app.com', '$2y$10$ATNbpyM/gHd8P6nBqZtyxu0Ryqa50uuX3TigK8mhVF3N9k5prcH9y', 'A1CvuiHaua', '2018-05-08 06:05:47', '2018-05-08 06:05:47'),
(5, 'Kasir', 'kasir@app.com', '$2y$10$1t95dBvCf0YSvTI2SBI.L.14grxNi.4LnYR2uuvzsDvRABZkIZV7m', NULL, '2018-05-29 06:32:33', '2018-05-29 06:32:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barangs`
--
ALTER TABLE `barangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_stock_ins`
--
ALTER TABLE `detail_stock_ins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_stock_outs`
--
ALTER TABLE `detail_stock_outs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_stocks`
--
ALTER TABLE `item_stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pembayarans`
--
ALTER TABLE `pembayarans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  ADD KEY `permission_user_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD PRIMARY KEY (`identifier`,`instance`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_ins`
--
ALTER TABLE `stock_ins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_outs`
--
ALTER TABLE `stock_outs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tokos`
--
ALTER TABLE `tokos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barangs`
--
ALTER TABLE `barangs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `detail_stock_ins`
--
ALTER TABLE `detail_stock_ins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `detail_stock_outs`
--
ALTER TABLE `detail_stock_outs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `item_stocks`
--
ALTER TABLE `item_stocks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `pembayarans`
--
ALTER TABLE `pembayarans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `stock_ins`
--
ALTER TABLE `stock_ins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `stock_outs`
--
ALTER TABLE `stock_outs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tokos`
--
ALTER TABLE `tokos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
