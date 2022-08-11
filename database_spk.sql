-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2022 at 08:37 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database_spk`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `id_alternatif` int(10) UNSIGNED NOT NULL,
  `kode_alternatif` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_alternatif` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan_alternatif` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_alternatif` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `no_kk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rw` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id_alternatif`, `kode_alternatif`, `nama_alternatif`, `keterangan_alternatif`, `file_alternatif`, `created_at`, `updated_at`, `no_kk`, `nik`, `alamat`, `rt`, `rw`) VALUES
(8, 'Jumat', 'Jumat', NULL, NULL, '2022-07-05 15:31:32', '2022-07-05 15:31:32', NULL, NULL, NULL, NULL, NULL),
(9, 'Kamari', 'Kamari', '', NULL, '2022-07-05 15:31:44', '2022-07-08 04:00:26', NULL, NULL, 'Dusun Cagak', NULL, NULL),
(10, 'Suparman', 'Suparman', NULL, NULL, '2022-07-05 15:31:59', '2022-07-05 15:31:59', NULL, NULL, NULL, NULL, NULL),
(11, 'Sutarni', 'Sutarni', NULL, NULL, '2022-07-05 15:32:12', '2022-07-05 15:32:12', NULL, NULL, NULL, NULL, NULL),
(12, 'Poniti', 'Poniti', NULL, NULL, '2022-07-05 15:32:21', '2022-07-05 15:32:21', NULL, NULL, NULL, NULL, NULL),
(13, 'Sutaji', 'Sutaji', NULL, NULL, '2022-07-05 15:32:41', '2022-07-05 15:32:41', NULL, NULL, NULL, NULL, NULL),
(14, 'Sarmiani', 'Sarmiani', NULL, NULL, '2022-07-05 15:32:51', '2022-07-05 15:32:51', NULL, NULL, NULL, NULL, NULL),
(15, 'Hartono', 'Hartono', NULL, NULL, '2022-07-05 15:33:00', '2022-07-05 15:33:00', NULL, NULL, NULL, NULL, NULL),
(16, 'Hidayat', 'Hidayat', NULL, NULL, '2022-07-05 15:33:10', '2022-07-05 15:33:10', NULL, NULL, NULL, NULL, NULL),
(17, 'Salam', 'Salam', NULL, NULL, '2022-07-05 15:33:21', '2022-07-05 15:33:21', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bobot_copras`
--

CREATE TABLE `bobot_copras` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_kriteria` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai` decimal(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bobot_copras`
--

INSERT INTO `bobot_copras` (`id`, `kode_kriteria`, `nilai`, `created_at`, `updated_at`) VALUES
(1, 'LT', '3.00', NULL, NULL),
(2, 'KL', '2.00', NULL, NULL),
(3, 'KD', '2.00', NULL, NULL),
(4, 'SA', '2.00', NULL, NULL),
(5, 'BB', '2.00', NULL, NULL),
(6, 'JT', '4.00', NULL, NULL),
(7, 'PH', '3.00', NULL, NULL),
(8, 'TG', '4.00', NULL, NULL),
(9, 'PJ', '4.00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `calculate_alternatif`
--

CREATE TABLE `calculate_alternatif` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_alternatif` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kriteria` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nilai` decimal(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `calculate_alternatif`
--

INSERT INTO `calculate_alternatif` (`id`, `kode_alternatif`, `kriteria`, `nilai`, `created_at`, `updated_at`) VALUES
(231, 'Jumat', 'LT', '2.00', NULL, NULL),
(232, 'Jumat', 'KL', '4.00', NULL, NULL),
(233, 'Jumat', 'KD', '3.00', NULL, NULL),
(234, 'Jumat', 'SA', '3.00', NULL, NULL),
(235, 'Jumat', 'BB', '3.00', NULL, NULL),
(236, 'Jumat', 'JT', '4.00', NULL, '2022-07-08 04:01:31'),
(237, 'Jumat', 'PH', '3.00', NULL, NULL),
(238, 'Jumat', 'TG', '3.00', NULL, NULL),
(239, 'Jumat', 'PJ', '3.00', NULL, NULL),
(240, 'Kamari', 'LT', '2.00', NULL, '2022-07-08 04:00:26'),
(241, 'Kamari', 'KL', '4.00', NULL, '2022-07-08 04:00:26'),
(242, 'Kamari', 'KD', '3.00', NULL, '2022-07-08 04:00:26'),
(243, 'Kamari', 'SA', '3.00', NULL, '2022-07-08 04:00:26'),
(244, 'Kamari', 'BB', '2.00', NULL, '2022-07-08 04:00:26'),
(245, 'Kamari', 'JT', '4.00', NULL, '2022-07-08 04:01:31'),
(246, 'Kamari', 'PH', '4.00', NULL, '2022-07-08 04:00:26'),
(247, 'Kamari', 'TG', '2.00', NULL, '2022-07-08 04:00:26'),
(248, 'Kamari', 'PJ', '2.00', NULL, '2022-07-08 04:00:26'),
(249, 'Suparman', 'LT', '1.00', NULL, NULL),
(250, 'Suparman', 'KL', '2.00', NULL, NULL),
(251, 'Suparman', 'KD', '3.00', NULL, NULL),
(252, 'Suparman', 'SA', '2.00', NULL, NULL),
(253, 'Suparman', 'BB', '2.00', NULL, NULL),
(254, 'Suparman', 'JT', '4.00', NULL, '2022-07-08 04:01:31'),
(255, 'Suparman', 'PH', '3.00', NULL, NULL),
(256, 'Suparman', 'TG', '5.00', NULL, NULL),
(257, 'Suparman', 'PJ', '3.00', NULL, NULL),
(258, 'Sutarni', 'LT', '1.00', NULL, NULL),
(259, 'Sutarni', 'KL', '4.00', NULL, NULL),
(260, 'Sutarni', 'KD', '3.00', NULL, NULL),
(261, 'Sutarni', 'SA', '3.00', NULL, NULL),
(262, 'Sutarni', 'BB', '2.00', NULL, NULL),
(263, 'Sutarni', 'JT', '3.00', NULL, '2022-07-08 04:01:31'),
(264, 'Sutarni', 'PH', '3.00', NULL, NULL),
(265, 'Sutarni', 'TG', '4.00', NULL, NULL),
(266, 'Sutarni', 'PJ', '2.00', NULL, NULL),
(267, 'Poniti', 'LT', '1.00', NULL, NULL),
(268, 'Poniti', 'KL', '4.00', NULL, NULL),
(269, 'Poniti', 'KD', '3.00', NULL, NULL),
(270, 'Poniti', 'SA', '3.00', NULL, NULL),
(271, 'Poniti', 'BB', '3.00', NULL, NULL),
(272, 'Poniti', 'JT', '1.00', NULL, '2022-07-08 04:01:31'),
(273, 'Poniti', 'PH', '2.00', NULL, NULL),
(274, 'Poniti', 'TG', '5.00', NULL, NULL),
(275, 'Poniti', 'PJ', '2.00', NULL, NULL),
(276, 'Sutaji', 'LT', '1.00', NULL, NULL),
(277, 'Sutaji', 'KL', '2.00', NULL, NULL),
(278, 'Sutaji', 'KD', '1.00', NULL, NULL),
(279, 'Sutaji', 'SA', '1.00', NULL, NULL),
(280, 'Sutaji', 'BB', '1.00', NULL, NULL),
(281, 'Sutaji', 'JT', '2.00', NULL, '2022-07-08 04:01:31'),
(282, 'Sutaji', 'PH', '2.00', NULL, NULL),
(283, 'Sutaji', 'TG', '2.00', NULL, NULL),
(284, 'Sutaji', 'PJ', '2.00', NULL, NULL),
(285, 'Sarmiani', 'LT', '1.00', NULL, NULL),
(286, 'Sarmiani', 'KL', '2.00', NULL, NULL),
(287, 'Sarmiani', 'KD', '1.00', NULL, NULL),
(288, 'Sarmiani', 'SA', '1.00', NULL, NULL),
(289, 'Sarmiani', 'BB', '1.00', NULL, NULL),
(290, 'Sarmiani', 'JT', '1.00', NULL, '2022-07-08 04:01:31'),
(291, 'Sarmiani', 'PH', '1.00', NULL, NULL),
(292, 'Sarmiani', 'TG', '3.00', NULL, NULL),
(293, 'Sarmiani', 'PJ', '2.00', NULL, NULL),
(294, 'Hartono', 'LT', '1.00', NULL, NULL),
(295, 'Hartono', 'KL', '2.00', NULL, NULL),
(296, 'Hartono', 'KD', '1.00', NULL, NULL),
(297, 'Hartono', 'SA', '1.00', NULL, NULL),
(298, 'Hartono', 'BB', '1.00', NULL, NULL),
(299, 'Hartono', 'JT', '1.00', NULL, '2022-07-08 04:01:31'),
(300, 'Hartono', 'PH', '1.00', NULL, NULL),
(301, 'Hartono', 'TG', '3.00', NULL, NULL),
(302, 'Hartono', 'PJ', '2.00', NULL, NULL),
(303, 'Hidayat', 'LT', '1.00', NULL, NULL),
(304, 'Hidayat', 'KL', '2.00', NULL, NULL),
(305, 'Hidayat', 'KD', '1.00', NULL, NULL),
(306, 'Hidayat', 'SA', '1.00', NULL, NULL),
(307, 'Hidayat', 'BB', '1.00', NULL, NULL),
(308, 'Hidayat', 'JT', '1.00', NULL, '2022-07-08 04:01:31'),
(309, 'Hidayat', 'PH', '1.00', NULL, NULL),
(310, 'Hidayat', 'TG', '2.00', NULL, NULL),
(311, 'Hidayat', 'PJ', '3.00', NULL, NULL),
(312, 'Salam', 'LT', '1.00', NULL, NULL),
(313, 'Salam', 'KL', '2.00', NULL, NULL),
(314, 'Salam', 'KD', '1.00', NULL, NULL),
(315, 'Salam', 'SA', '1.00', NULL, NULL),
(316, 'Salam', 'BB', '1.00', NULL, NULL),
(317, 'Salam', 'JT', '1.00', NULL, '2022-07-08 04:01:31'),
(318, 'Salam', 'PH', '1.00', NULL, NULL),
(319, 'Salam', 'TG', '2.00', NULL, NULL),
(320, 'Salam', 'PJ', '2.00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `calculate_kriteria`
--

CREATE TABLE `calculate_kriteria` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai` decimal(8,2) DEFAULT NULL,
  `parrent` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `calculate_kriteria`
--

INSERT INTO `calculate_kriteria` (`id`, `kode`, `nilai`, `parrent`, `created_at`, `updated_at`) VALUES
(396, 'LT', '1.00', 'PJ', NULL, '2022-07-08 04:53:50'),
(397, 'KL', '3.00', 'PJ', NULL, '2022-07-08 04:53:50'),
(398, 'KD', '3.00', 'PJ', NULL, '2022-07-08 04:53:50'),
(399, 'SA', '2.00', 'PJ', NULL, '2022-07-08 04:53:50'),
(400, 'BB', '2.00', 'PJ', NULL, '2022-07-08 04:53:50'),
(401, 'JT', '1.00', 'PJ', NULL, '2022-07-08 04:53:50'),
(402, 'PH', '1.00', 'PJ', NULL, '2022-07-08 04:53:50'),
(403, 'TG', '1.00', 'PJ', NULL, '2022-07-08 04:53:50'),
(404, 'PJ', '1.00', 'PJ', NULL, '2022-07-08 04:53:50'),
(406, 'LT', '1.00', 'TG', NULL, '2022-07-08 04:53:50'),
(407, 'KL', '3.00', 'TG', NULL, '2022-07-08 04:53:50'),
(408, 'KD', '3.00', 'TG', NULL, '2022-07-08 04:53:50'),
(409, 'SA', '2.00', 'TG', NULL, '2022-07-08 04:53:50'),
(410, 'BB', '2.00', 'TG', NULL, '2022-07-08 04:53:50'),
(411, 'JT', '1.00', 'TG', NULL, '2022-07-08 04:53:50'),
(412, 'PH', '1.00', 'TG', NULL, '2022-07-08 04:53:50'),
(413, 'TG', '1.00', 'TG', NULL, '2022-07-08 04:53:50'),
(414, 'PJ', '1.00', 'TG', NULL, '2022-07-08 04:53:50'),
(416, 'LT', '2.00', 'PH', NULL, '2022-07-08 04:53:50'),
(417, 'KL', '2.00', 'PH', NULL, '2022-07-08 04:53:50'),
(418, 'KD', '2.00', 'PH', NULL, '2022-07-08 04:53:50'),
(419, 'SA', '3.00', 'PH', NULL, '2022-07-08 04:53:50'),
(420, 'BB', '3.00', 'PH', NULL, '2022-07-08 04:53:50'),
(421, 'JT', '0.50', 'PH', NULL, '2022-07-08 04:53:50'),
(422, 'PH', '1.00', 'PH', NULL, '2022-07-08 04:53:50'),
(423, 'TG', '1.00', 'PH', NULL, '2022-07-08 04:53:50'),
(424, 'PJ', '1.00', 'PH', NULL, '2022-07-08 04:53:50'),
(426, 'LT', '3.00', 'JT', NULL, '2022-07-08 04:53:50'),
(427, 'KL', '3.00', 'JT', NULL, '2022-07-08 04:53:50'),
(428, 'KD', '3.00', 'JT', NULL, '2022-07-08 04:53:50'),
(429, 'SA', '4.00', 'JT', NULL, '2022-07-08 04:53:50'),
(430, 'BB', '4.00', 'JT', NULL, '2022-07-08 04:53:50'),
(431, 'JT', '1.00', 'JT', NULL, '2022-07-08 04:53:50'),
(432, 'PH', '2.00', 'JT', NULL, '2022-07-08 04:53:50'),
(433, 'TG', '1.00', 'JT', NULL, '2022-07-08 04:53:50'),
(434, 'PJ', '1.00', 'JT', NULL, '2022-07-08 04:53:50'),
(436, 'LT', '2.00', 'BB', NULL, '2022-07-08 04:53:50'),
(437, 'KL', '2.00', 'BB', NULL, '2022-07-08 04:53:50'),
(438, 'KD', '2.00', 'BB', NULL, '2022-07-08 04:53:50'),
(439, 'SA', '1.00', 'BB', NULL, '2022-07-08 04:53:50'),
(440, 'BB', '1.00', 'BB', NULL, '2022-07-08 04:53:50'),
(441, 'JT', '0.25', 'BB', NULL, '2022-07-08 04:53:50'),
(442, 'PH', '0.33', 'BB', NULL, '2022-07-08 04:53:50'),
(443, 'TG', '0.50', 'BB', NULL, '2022-07-08 04:53:50'),
(444, 'PJ', '0.50', 'BB', NULL, '2022-07-08 04:53:50'),
(446, 'LT', '2.00', 'SA', NULL, '2022-07-08 04:53:50'),
(447, 'KL', '2.00', 'SA', NULL, '2022-07-08 04:53:50'),
(448, 'KD', '2.00', 'SA', NULL, '2022-07-08 04:53:50'),
(449, 'SA', '1.00', 'SA', NULL, '2022-07-08 04:53:50'),
(450, 'BB', '1.00', 'SA', NULL, '2022-07-08 04:53:50'),
(451, 'JT', '0.25', 'SA', NULL, '2022-07-08 04:53:50'),
(452, 'PH', '0.33', 'SA', NULL, '2022-07-08 04:53:50'),
(453, 'TG', '0.50', 'SA', NULL, '2022-07-08 04:53:50'),
(454, 'PJ', '0.50', 'SA', NULL, '2022-07-08 04:53:50'),
(456, 'LT', '2.00', 'KD', NULL, '2022-07-08 04:53:50'),
(457, 'KL', '2.00', 'KD', NULL, '2022-07-08 04:53:50'),
(458, 'KD', '1.00', 'KD', NULL, '2022-07-08 04:53:50'),
(459, 'SA', '0.50', 'KD', NULL, '2022-07-08 04:53:50'),
(460, 'BB', '0.50', 'KD', NULL, '2022-07-08 04:53:50'),
(461, 'JT', '0.33', 'KD', NULL, '2022-07-08 04:53:50'),
(462, 'PH', '0.50', 'KD', NULL, '2022-07-08 04:53:50'),
(463, 'TG', '0.33', 'KD', NULL, '2022-07-08 04:53:50'),
(464, 'PJ', '0.33', 'KD', NULL, '2022-07-08 04:53:50'),
(466, 'LT', '2.00', 'KL', NULL, '2022-07-08 04:53:50'),
(467, 'KL', '1.00', 'KL', NULL, '2022-07-08 04:53:50'),
(468, 'KD', '0.50', 'KL', NULL, '2022-07-08 04:53:50'),
(469, 'SA', '0.50', 'KL', NULL, '2022-07-08 04:53:50'),
(470, 'BB', '0.50', 'KL', NULL, '2022-07-08 04:53:50'),
(471, 'JT', '0.33', 'KL', NULL, '2022-07-08 04:53:50'),
(472, 'PH', '0.50', 'KL', NULL, '2022-07-08 04:53:50'),
(473, 'TG', '0.33', 'KL', NULL, '2022-07-08 04:53:50'),
(474, 'PJ', '0.33', 'KL', NULL, '2022-07-08 04:53:50'),
(476, 'LT', '1.00', 'LT', NULL, '2022-07-08 04:53:50'),
(477, 'KL', '0.50', 'LT', NULL, '2022-07-08 04:53:50'),
(478, 'KD', '0.50', 'LT', NULL, '2022-07-08 04:53:50'),
(479, 'SA', '0.50', 'LT', NULL, '2022-07-08 04:53:50'),
(480, 'BB', '0.50', 'LT', NULL, '2022-07-08 04:53:50'),
(481, 'JT', '0.33', 'LT', NULL, '2022-07-08 04:53:50'),
(482, 'PH', '0.50', 'LT', NULL, '2022-07-08 04:53:50'),
(483, 'TG', '1.00', 'LT', NULL, '2022-07-08 04:53:50'),
(484, 'PJ', '1.00', 'LT', NULL, '2022-07-08 04:53:50');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(10) UNSIGNED NOT NULL,
  `kode_kriteria` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kriteria` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attribute` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `kode_kriteria`, `nama_kriteria`, `attribute`, `created_at`, `updated_at`) VALUES
(1, 'LT', 'Luas Lantai', 'cost', '2022-07-03 15:10:02', '2022-07-03 15:10:48'),
(2, 'KL', 'Kondisi Lantai', 'cost', '2022-07-03 15:10:16', '2022-07-03 16:20:48'),
(3, 'KD', 'Kondisi Dinding', 'cost', '2022-07-03 15:10:30', '2022-07-03 16:20:59'),
(4, 'SA', 'Sumber Air', 'cost', '2022-07-03 15:10:40', '2022-07-03 16:21:13'),
(5, 'BB', 'Bahan Bakar Memasak', 'cost', '2022-07-03 15:11:04', '2022-07-03 16:21:25'),
(6, 'JT', 'Jumlah Tabungan', 'cost', '2022-07-03 15:11:20', '2022-07-08 04:01:31'),
(7, 'PH', 'Penghasilan', 'cost', '2022-07-03 15:11:34', '2022-07-03 15:11:34'),
(8, 'TG', 'Tanggungan', 'benefit', '2022-07-03 15:11:47', '2022-07-03 16:21:34'),
(9, 'PJ', 'Pekerjaan', 'cost', '2022-07-03 15:12:01', '2022-07-03 15:12:01');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_06_28_184330_add_table_kriteria', 1),
(6, '2022_06_29_041952_add_table_alternatif', 1),
(7, '2022_06_30_140627_add_table_calculate_kriteria', 1),
(8, '2022_06_30_142751_add_table_calculate_alternatif', 1),
(9, '2022_06_30_193641_add_table_bobot_kriteria_copras', 1),
(10, '2022_07_03_111527_add_file_users_table', 1),
(11, '2022_07_04_224035_add_field_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `file` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `file`) VALUES
(1, 'Admin Kantor', 'admin@gmail.com', NULL, '$2y$10$qLZuhRiVhO2ERmHUGUJbUejYLcqtTfagR20FG7hFgQ0BYGPXP8ADm', NULL, '2022-07-03 15:07:04', '2022-07-08 03:54:21', '1656860936_logo_gresik.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indexes for table `bobot_copras`
--
ALTER TABLE `bobot_copras`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calculate_alternatif`
--
ALTER TABLE `calculate_alternatif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calculate_kriteria`
--
ALTER TABLE `calculate_kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`),
  ADD UNIQUE KEY `kriteria_kode_kriteria_unique` (`kode_kriteria`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id_alternatif` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `bobot_copras`
--
ALTER TABLE `bobot_copras`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `calculate_alternatif`
--
ALTER TABLE `calculate_alternatif`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=358;

--
-- AUTO_INCREMENT for table `calculate_kriteria`
--
ALTER TABLE `calculate_kriteria`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=486;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
