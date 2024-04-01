-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2022 at 10:21 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk-borda`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(128) NOT NULL,
  `kriteria_id` bigint(20) UNSIGNED DEFAULT NULL,
  `bobot` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id`, `nama`, `kriteria_id`, `bobot`) VALUES
(1, 'A1', 6, 1),
(2, 'A1', 9, 1),
(3, 'A1', 8, 1),
(4, 'A1', 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `alternatif_kriteria_sekolah`
--

CREATE TABLE `alternatif_kriteria_sekolah` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `biodata_id` bigint(20) UNSIGNED DEFAULT NULL,
  `kriteria_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nilai` float NOT NULL,
  `bobot` bigint(20) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alternatif_kriteria_sekolah`
--

INSERT INTO `alternatif_kriteria_sekolah` (`id`, `biodata_id`, `kriteria_id`, `nilai`, `bobot`, `updated_at`, `created_at`) VALUES
(11, NULL, 6, 20.1, 2, '2022-12-07 23:08:15', NULL),
(12, NULL, 7, 28, 4, '2022-12-07 23:08:15', NULL),
(13, NULL, 8, 40, 3, '2022-12-07 23:08:15', NULL),
(14, NULL, 9, 20, 2, '2022-12-07 23:08:15', NULL),
(15, NULL, 6, 28.1, 2, '2022-12-07 23:09:36', '2022-11-15 02:52:46'),
(16, NULL, 7, 28, 4, '2022-12-07 23:09:36', '2022-11-15 02:52:46'),
(17, NULL, 8, 60.33, 4, '2022-12-07 23:09:36', '2022-11-15 02:52:46'),
(18, NULL, 9, 20, 2, '2022-12-07 23:09:36', '2022-11-15 02:52:46'),
(21, NULL, 6, 100, 5, '2022-12-04 20:33:40', '2022-11-15 04:15:23'),
(22, NULL, 7, 30, 1, '2022-12-04 20:33:40', '2022-11-15 04:15:23'),
(23, NULL, 8, 20, 2, '2022-12-04 20:33:40', '2022-11-15 04:15:23'),
(24, NULL, 9, 70, 4, '2022-12-04 20:33:40', '2022-11-15 04:15:23'),
(27, NULL, 6, 20, 2, '2022-12-04 20:34:03', '2022-11-15 22:14:18'),
(28, NULL, 7, 20, 5, '2022-12-04 20:34:03', '2022-11-15 22:14:18'),
(29, NULL, 8, 40, 3, '2022-12-04 20:34:03', '2022-11-15 22:14:18'),
(30, NULL, 9, 40, 3, '2022-12-04 20:34:03', '2022-11-15 22:14:18'),
(31, NULL, 6, 0, 5, '2022-11-15 22:14:30', '2022-11-15 22:14:30'),
(32, NULL, 7, 0, 2, '2022-11-15 22:14:30', '2022-11-15 22:14:30'),
(33, NULL, 8, 0, 3, '2022-11-15 22:14:30', '2022-11-15 22:14:30'),
(34, NULL, 9, 0, 4, '2022-11-15 22:14:31', '2022-11-15 22:14:31'),
(44, NULL, 6, 0, 4, '2022-12-04 19:37:14', '2022-12-04 19:37:14'),
(45, NULL, 7, 0, 4, '2022-12-04 19:37:14', '2022-12-04 19:37:14'),
(46, NULL, 8, 0, 4, '2022-12-04 19:37:14', '2022-12-04 19:37:14'),
(47, NULL, 9, 0, 4, '2022-12-04 19:37:14', '2022-12-04 19:37:14'),
(48, NULL, 6, 100, 5, '2022-12-04 20:34:36', '2022-12-04 19:38:51'),
(49, NULL, 7, 27, 2, '2022-12-04 20:34:36', '2022-12-04 19:38:51'),
(50, NULL, 8, 40, 3, '2022-12-04 20:34:36', '2022-12-04 19:38:51'),
(51, NULL, 9, 70, 4, '2022-12-04 20:34:36', '2022-12-04 19:38:51'),
(52, 16, 6, 67.9, 4, '2022-12-07 08:56:30', '2022-12-07 08:56:30'),
(53, 16, 7, 22, 1, '2022-12-07 08:56:30', '2022-12-07 08:56:30'),
(54, 16, 8, 79.9, 4, '2022-12-07 08:56:30', '2022-12-07 08:56:30'),
(55, 16, 9, 100, 5, '2022-12-07 08:56:30', '2022-12-07 08:56:30'),
(56, 17, 6, 100, 5, '2022-12-07 08:57:10', '2022-12-07 08:57:10'),
(57, 17, 7, 29, 5, '2022-12-07 08:57:10', '2022-12-07 08:57:10'),
(58, 17, 8, 19.9, 1, '2022-12-07 08:57:11', '2022-12-07 08:57:11'),
(59, 17, 9, 20, 2, '2022-12-07 08:57:11', '2022-12-07 08:57:11');

-- --------------------------------------------------------

--
-- Table structure for table `alternatif_kriteria_yayasan`
--

CREATE TABLE `alternatif_kriteria_yayasan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `biodata_id` bigint(20) UNSIGNED DEFAULT NULL,
  `kriteria_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nilai` float NOT NULL,
  `bobot` bigint(20) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alternatif_kriteria_yayasan`
--

INSERT INTO `alternatif_kriteria_yayasan` (`id`, `biodata_id`, `kriteria_id`, `nilai`, `bobot`, `updated_at`, `created_at`) VALUES
(93, NULL, 16, 40, 3, '2022-12-04 20:35:57', '2022-12-04 20:04:10'),
(94, NULL, 16, 40, 3, '2022-12-04 20:36:23', '2022-12-04 20:04:17'),
(105, NULL, 16, 70, 4, '2022-12-04 20:37:09', '2022-12-04 20:37:09'),
(111, NULL, 16, 70, 4, '2022-12-07 07:50:09', '2022-12-04 20:37:31'),
(117, NULL, 16, 40, 3, '2022-12-04 20:38:05', '2022-12-04 20:38:05'),
(123, NULL, 22, 67, 4, '2022-12-07 07:50:09', '2022-12-07 07:49:22'),
(124, NULL, 23, 79.9999, 4, '2022-12-07 07:50:09', '2022-12-07 07:49:22'),
(125, NULL, 24, 98.5, 5, '2022-12-07 07:50:09', '2022-12-07 07:49:22'),
(126, NULL, 25, 80.1, 5, '2022-12-07 07:50:09', '2022-12-07 07:49:22'),
(127, NULL, 26, 90, 5, '2022-12-07 07:50:10', '2022-12-07 07:49:22');

-- --------------------------------------------------------

--
-- Table structure for table `biodata`
--

CREATE TABLE `biodata` (
  `id` bigint(128) UNSIGNED NOT NULL,
  `user_id` bigint(128) UNSIGNED NOT NULL,
  `nama` varchar(128) DEFAULT NULL,
  `no_hp` bigint(128) DEFAULT NULL,
  `scan_foto` varchar(128) DEFAULT NULL,
  `scan_ktp` varchar(128) DEFAULT NULL,
  `scan_ijazah` varchar(128) DEFAULT NULL,
  `scan_kk` varchar(128) DEFAULT NULL,
  `scan_slk` varchar(128) DEFAULT NULL,
  `scan_ak` varchar(128) DEFAULT NULL,
  `scan_cv` varchar(128) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `biodata`
--

INSERT INTO `biodata` (`id`, `user_id`, `nama`, `no_hp`, `scan_foto`, `scan_ktp`, `scan_ijazah`, `scan_kk`, `scan_slk`, `scan_ak`, `scan_cv`, `updated_at`, `created_at`) VALUES
(16, 32, 'calvin rifaldi juniano nalle', 81238, 'calvin nalle_sfoto_1670428742.jpg', NULL, NULL, 'calvin nalle_skk_1670430059.jpg', NULL, 'calvin nalle_sak_1670428743.jpg', 'calvin nalle_scv_1670430022.jpg', '2022-12-11 20:01:49', '2022-12-07 07:59:03'),
(17, 33, NULL, NULL, 'Lionel Messi_sfoto_1670818225.jpg', NULL, NULL, NULL, NULL, NULL, 'Lionel Messi_scv_1670430942.jpg', '2022-12-11 20:10:26', '2022-12-07 08:35:42'),
(18, 35, 'Valentino Rossi', 8793048, 'Rossi_sfoto_1670818733.jpg', 'Rossi_sktp_1670818733.jpg', 'Rossi_sijazah_1670818733.jpg', 'Rossi_skk_1670818733.jpg', 'Rossi_sslk_1670818733.jpg', 'Rossi_sak_1670818733.jpg', 'C:\\xampp\\tmp\\php57D9.tmp', '2022-12-11 20:19:23', '2022-12-11 20:18:53'),
(19, 34, 'Neymar JR', 4466879, 'Neymar_sfoto_1670819091.jpg', 'Neymar_sktp_1670819091.jpg', 'Neymar_sijazah_1670819091.jpg', 'Neymar_skk_1670819091.jpg', 'Neymar_sslk_1670819091.jpg', 'Neymar_sak_1670819091.jpg', 'C:\\xampp\\tmp\\phpCF0C.tmp', '2022-12-11 20:24:51', '2022-12-11 20:24:51');

-- --------------------------------------------------------

--
-- Table structure for table `bobot_sekolah`
--

CREATE TABLE `bobot_sekolah` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(128) NOT NULL,
  `bobot` bigint(20) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bobot_sekolah`
--

INSERT INTO `bobot_sekolah` (`id`, `nama`, `bobot`, `updated_at`, `created_at`) VALUES
(1, 'wd', 4, '2022-11-05 23:35:37', '2022-11-05 23:06:44');

-- --------------------------------------------------------

--
-- Table structure for table `bobot_yayasan`
--

CREATE TABLE `bobot_yayasan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(128) NOT NULL,
  `bobot` bigint(20) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bobot_yayasan`
--

INSERT INTO `bobot_yayasan` (`id`, `nama`, `bobot`, `updated_at`, `created_at`) VALUES
(1, 'a', 7, '2022-11-07 01:11:29', '2022-11-07 01:04:59');

-- --------------------------------------------------------

--
-- Table structure for table `hasil_administrasi`
--

CREATE TABLE `hasil_administrasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `akun` varchar(128) NOT NULL,
  `nama` varchar(128) DEFAULT NULL,
  `validasi` bigint(20) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hasil_administrasi`
--

INSERT INTO `hasil_administrasi` (`id`, `akun`, `nama`, `validasi`, `updated_at`, `created_at`) VALUES
(1, 'Lionel Messi', 'Lionel Messi', 1, '2022-12-12 17:20:43', '2022-12-12 17:20:43'),
(2, 'calvin nalle', 'calvin rifaldi juniano nalle', 0, '2022-12-12 17:20:43', '2022-12-12 17:20:43'),
(3, 'Neymar', 'Neymar JR', 0, '2022-12-12 17:20:43', '2022-12-12 17:20:43'),
(4, 'Rossi', 'Valentino Rossi', 0, '2022-12-12 17:20:43', '2022-12-12 17:20:43'),
(5, 'Magnus', 'Magnus', 0, '2022-12-12 17:20:43', '2022-12-12 17:20:43'),
(6, 'Mala', 'Mala', 0, '2022-12-12 17:20:43', '2022-12-12 17:20:43'),
(7, 'Vindy', 'Vindy', 0, '2022-12-12 17:20:43', '2022-12-12 17:20:43'),
(8, 'Eldy', 'Eldy', 0, '2022-12-12 17:20:43', '2022-12-12 17:20:43'),
(9, 'Mike Tyson', 'Mike Tyson', 0, '2022-12-12 17:20:43', '2022-12-12 17:20:43'),
(10, 'Taylor Swift', 'Taylor Swift', 0, '2022-12-12 17:20:43', '2022-12-12 17:20:43'),
(11, 'Billie elish', 'Billie elish', 0, '2022-12-12 17:20:43', '2022-12-12 17:20:43'),
(12, 'Michael Jordan', 'Michael Jordan', 0, '2022-12-12 17:20:43', '2022-12-12 17:20:43'),
(13, 'Leonardo Dicaprio', 'Leonardo Dicaprio', 0, '2022-12-12 17:20:43', '2022-12-12 17:20:43'),
(14, 'Irithel Harith', 'Irithel Harith', 0, '2022-12-12 17:20:43', '2022-12-12 17:20:43'),
(15, 'Balmond Rafaela', 'Balmond Rafaela', 0, '2022-12-12 17:20:43', '2022-12-12 17:20:43'),
(16, 'Pevita Pearce', 'Pevita Pearce', 0, '2022-12-12 17:20:43', '2022-12-12 17:20:43'),
(17, 'Javier Zanetti', 'Javier Zanetti', 0, '2022-12-12 17:20:43', '2022-12-12 17:20:43'),
(18, 'Ruins Graveyard', 'Ruins Graveyard', 0, '2022-12-12 17:20:43', '2022-12-12 17:20:43'),
(19, 'Johny Deep', 'Johny Deep', 0, '2022-12-12 17:20:43', '2022-12-12 17:20:43'),
(20, 'Chris Hemsworth', 'Chris Hemsworth', 0, '2022-12-12 17:20:43', '2022-12-12 17:20:43'),
(21, 'Chris evans', 'Chris evans', 0, '2022-12-12 17:20:43', '2022-12-12 17:20:43'),
(22, 'Emma Watson', 'Emma Watson', 0, '2022-12-12 17:20:43', '2022-12-12 17:20:43'),
(23, 'Robert Downey Jr', 'Robert Downey Jr', 0, '2022-12-12 17:20:43', '2022-12-12 17:20:43');

-- --------------------------------------------------------

--
-- Table structure for table `hasil_perhitungan`
--

CREATE TABLE `hasil_perhitungan` (
  `id` bigint(128) UNSIGNED NOT NULL,
  `akun` varchar(128) NOT NULL,
  `nama` varchar(128) DEFAULT NULL,
  `nilai_borda` double NOT NULL,
  `ranking` bigint(128) NOT NULL,
  `status` varchar(128) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hasil_perhitungan`
--

INSERT INTO `hasil_perhitungan` (`id`, `akun`, `nama`, `nilai_borda`, `ranking`, `status`, `updated_at`, `created_at`) VALUES
(1, 'b', 'nama test', 0.4001892449946, 1, 'L', '2022-12-04 20:40:29', '2022-12-04 20:40:29'),
(2, 'q', 'dawd', 0.33863334321104, 2, 'L', '2022-12-04 20:40:29', '2022-12-04 20:40:29'),
(3, 'a', 'a', 0.16913959070815, 3, 'L', '2022-12-04 20:40:29', '2022-12-04 20:40:29'),
(4, 'joni', 'joni', 0.054050953821985, 4, 'TL', '2022-12-04 20:40:29', '2022-12-04 20:40:29'),
(5, 'test1', 'c', 0.037986867264223, 5, 'TL', '2022-12-04 20:40:29', '2022-12-04 20:40:29');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria_sekolah`
--

CREATE TABLE `kriteria_sekolah` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(128) NOT NULL,
  `role` varchar(128) NOT NULL,
  `bobot` int(20) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kriteria_sekolah`
--

INSERT INTO `kriteria_sekolah` (`id`, `nama`, `role`, `bobot`, `updated_at`, `created_at`) VALUES
(6, 'Kemampuan Inti', 'benefit', 5, '2022-11-06 15:07:44', '2022-11-06 14:56:39'),
(7, 'Usia', 'cost', 5, '2022-11-06 14:57:03', '2022-11-06 14:56:51'),
(8, 'Micro Teaching', 'benefit', 5, '2022-11-06 14:58:29', '2022-11-06 14:58:29'),
(9, 'Kurikulum', 'benefit', 5, '2022-11-06 14:58:47', '2022-11-06 14:58:47');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria_yayasan`
--

CREATE TABLE `kriteria_yayasan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(128) NOT NULL,
  `role` varchar(128) NOT NULL,
  `bobot` varchar(20) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kriteria_yayasan`
--

INSERT INTO `kriteria_yayasan` (`id`, `nama`, `role`, `bobot`, `updated_at`, `created_at`) VALUES
(16, 'C1', 'benefit', '5', '2022-12-04 20:03:17', '2022-12-04 20:03:17'),
(22, 'C2', 'benefit', '5', '2022-12-04 20:41:35', '2022-12-04 20:41:04'),
(23, 'C3', 'benefit', '5', '2022-12-04 20:41:44', '2022-12-04 20:41:24'),
(24, 'C4', 'benefit', '5', '2022-12-04 20:41:55', '2022-12-04 20:41:55'),
(25, 'C5', 'benefit', '5', '2022-12-04 20:42:07', '2022-12-04 20:42:07'),
(26, 'C6', 'benefit', '5', '2022-12-04 20:42:19', '2022-12-04 20:42:19');

-- --------------------------------------------------------

--
-- Table structure for table `kuota`
--

CREATE TABLE `kuota` (
  `id` bigint(128) UNSIGNED NOT NULL,
  `kuota` bigint(128) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kuota`
--

INSERT INTO `kuota` (`id`, `kuota`, `updated_at`, `created_at`) VALUES
(1, 3, '2022-12-04 19:39:31', '2022-12-04 19:39:31');

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
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2022_09_19_134504_make_kasus_table', 1),
(3, '2022_09_19_145703_create_puskesmas_table', 2),
(4, '2022_09_19_150923_create_kecamatan_table', 3),
(6, '2022_09_19_151045_create_kelurahan_table', 4);

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` bigint(128) NOT NULL,
  `validasi` bigint(5) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `validasi`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$OTSgBSHGhURLJdQq6TYuAefw/vwKrCRISTGw/xv8QRsXc0V6N5hwS', 0, NULL, NULL, NULL),
(32, 'calvin nalle', '$2y$10$lzNU/r2uTBxC.zzZIQh15eeeMDzFDfh912hX0VEFMnmBdl9L/FtCq', 1, 0, '2022-12-07 07:57:23', '2022-12-11 21:56:29'),
(33, 'Lionel Messi', '$2y$10$dUOXVWSGXebjt5Z6zEHvyOBKiROva7sxInRhpTiQBY0RlbeYIIxIa', 1, 1, '2022-12-07 08:31:03', '2022-12-07 08:52:12'),
(34, 'Neymar', '$2y$10$kNNkbuC7tlnfrLPsuOLwz.LOrFG5/eLuddb5aLkmY6VuG9WQMTcVC', 1, NULL, '2022-12-11 20:11:56', '2022-12-11 20:11:56'),
(35, 'Rossi', '$2y$10$fixgo15ITEVqfEfPtvpE7uyIBi26sWbtVEplg78pszS.lRITfJhCG', 1, NULL, '2022-12-11 20:13:01', '2022-12-11 20:13:01'),
(36, 'Magnus', '$2y$10$mzS0XVvuiQPqpYWjvQxmweH9x9havFfgWrsHoX3wHgMuisL6cZ0YO', 1, NULL, '2022-12-11 21:40:24', '2022-12-11 21:40:24'),
(37, 'Mala', '$2y$10$lX71A0fIeWED6Lfm.h4m/.Z3g3k/KmrO036q/DZ1k.JiPPK6yx586', 1, NULL, '2022-12-11 21:40:42', '2022-12-11 21:40:42'),
(38, 'Vindy', '$2y$10$jdb9VeEGahKPe.5JnsXgvugcPz.XLaAPhDNWQQLmKBzcqdZhMeLdS', 1, NULL, '2022-12-11 21:41:44', '2022-12-11 21:41:44'),
(39, 'Eldy', '$2y$10$y797aNnkoqzTzeS/WFTlMenB2bOHcj9SH/hVl7xF75YXOZ.ARPeDa', 1, NULL, '2022-12-11 21:42:00', '2022-12-11 21:42:00'),
(40, 'Mike Tyson', '$2y$10$Tl0COBvUyvaIxy0DRqgZ9.HUvF5/Qat.hRWnYAZYLVdwn1KkmGo3e', 1, NULL, '2022-12-11 21:43:47', '2022-12-11 21:43:47'),
(41, 'Taylor Swift', '$2y$10$9YZtfcyrHwQFcH2kxz7okevuwqwLwNO7jgjgEJ5tzj/ewDuQNIdJW', 1, NULL, '2022-12-11 21:44:09', '2022-12-11 21:44:09'),
(42, 'Billie elish', '$2y$10$sWcd6.o26YoOuVBVZdEI0.yQeL5vbC1wsFKdP8njb0Xv6j868iuf6', 1, NULL, '2022-12-11 21:44:30', '2022-12-11 21:44:30'),
(43, 'Michael Jordan', '$2y$10$x1kKrGbCYthln3UitiDI1uOQYNTDanugGJgl4kQynqynnqrGZtOT2', 1, NULL, '2022-12-11 21:46:45', '2022-12-11 21:46:45'),
(44, 'Leonardo Dicaprio', '$2y$10$.OaQ8LL7lBZL.a0yrDC4g.23BAu8WwjSbWRm6XDjCjF60v0zffgh.', 1, NULL, '2022-12-11 21:47:18', '2022-12-11 21:47:18'),
(45, 'Irithel Harith', '$2y$10$tipf6pkMp4ZgBpifF6hGO.hZbBwEA.N4/mFmOTXI6dWzeLpJ8L7e6', 1, NULL, '2022-12-11 21:47:43', '2022-12-11 21:47:43'),
(46, 'Balmond Rafaela', '$2y$10$dh.X7KMhHORL4EX0O2MKseXDlNWqbJY8EqlOo7Zgoqk4dcu/2IPv.', 1, NULL, '2022-12-11 21:48:07', '2022-12-11 21:48:07'),
(47, 'Pevita Pearce', '$2y$10$jNGq/PSK.lHDQLh0ZX3nr.KGVy1XSAOrZ5Zv2MlRCC36gBlPDW4p2', 1, 0, '2022-12-11 21:48:25', '2022-12-11 21:54:25'),
(48, 'Javier Zanetti', '$2y$10$yotmwBAXgb6py2u0b6QeRukDTrB026gHTnYxHVYYhDi1vey1MiJHS', 1, NULL, '2022-12-11 21:48:50', '2022-12-11 21:48:50'),
(49, 'Ruins Graveyard', '$2y$10$D6J2f4mGOcQFFsOkJk.okOZp9J0uqtDuPJeRSXryFwvyHaHwXxzQy', 1, NULL, '2022-12-11 21:50:24', '2022-12-11 21:50:24'),
(50, 'Johny Deep', '$2y$10$8OyO/C1MucwWblYihqseV.lM.3SrSkFRiyCXY6iCMBdhs59faQq3C', 1, NULL, '2022-12-11 21:50:39', '2022-12-11 21:50:39'),
(51, 'Chris Hemsworth', '$2y$10$Xorg8wbgQJk2/.dXExG/X.cRAApc.5cComapmjUk1Ld1kplpEs75y', 1, 0, '2022-12-11 21:51:19', '2022-12-11 21:55:09'),
(52, 'Chris evans', '$2y$10$1DiuY5rghefsmyuYPvZqD.QOShELySkT2zPVgIFIV/wnJkbV8G4.y', 1, NULL, '2022-12-11 21:51:58', '2022-12-11 21:51:58'),
(53, 'Emma Watson', '$2y$10$.5ACrCwOQPmf.wXFdhsqNuih/u4aqBDsl5vezV0ag/s6n4xYsoGzW', 1, NULL, '2022-12-11 21:52:12', '2022-12-11 21:52:12'),
(54, 'Robert Downey Jr', '$2y$10$Sivyfy6NJKm50SKdF6bhh.66ynRsVeGzP20h8bq9weqi3kMKJ2kz2', 1, 0, '2022-12-11 21:52:50', '2022-12-11 21:54:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kriteria_id` (`kriteria_id`);

--
-- Indexes for table `alternatif_kriteria_sekolah`
--
ALTER TABLE `alternatif_kriteria_sekolah`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alternatif_id` (`biodata_id`),
  ADD KEY `kriteria_id` (`kriteria_id`);

--
-- Indexes for table `alternatif_kriteria_yayasan`
--
ALTER TABLE `alternatif_kriteria_yayasan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `biodata_id` (`biodata_id`),
  ADD KEY `kriteria_id` (`kriteria_id`);

--
-- Indexes for table `biodata`
--
ALTER TABLE `biodata`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `bobot_sekolah`
--
ALTER TABLE `bobot_sekolah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bobot_yayasan`
--
ALTER TABLE `bobot_yayasan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hasil_administrasi`
--
ALTER TABLE `hasil_administrasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hasil_perhitungan`
--
ALTER TABLE `hasil_perhitungan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kriteria_sekolah`
--
ALTER TABLE `kriteria_sekolah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kriteria_yayasan`
--
ALTER TABLE `kriteria_yayasan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kuota`
--
ALTER TABLE `kuota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `alternatif_kriteria_sekolah`
--
ALTER TABLE `alternatif_kriteria_sekolah`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `alternatif_kriteria_yayasan`
--
ALTER TABLE `alternatif_kriteria_yayasan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `biodata`
--
ALTER TABLE `biodata`
  MODIFY `id` bigint(128) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `bobot_sekolah`
--
ALTER TABLE `bobot_sekolah`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bobot_yayasan`
--
ALTER TABLE `bobot_yayasan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hasil_administrasi`
--
ALTER TABLE `hasil_administrasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `hasil_perhitungan`
--
ALTER TABLE `hasil_perhitungan`
  MODIFY `id` bigint(128) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kriteria_sekolah`
--
ALTER TABLE `kriteria_sekolah`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `kriteria_yayasan`
--
ALTER TABLE `kriteria_yayasan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `kuota`
--
ALTER TABLE `kuota`
  MODIFY `id` bigint(128) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alternatif_kriteria_sekolah`
--
ALTER TABLE `alternatif_kriteria_sekolah`
  ADD CONSTRAINT `alternatif_kriteria_sekolah_ibfk_1` FOREIGN KEY (`kriteria_id`) REFERENCES `kriteria_sekolah` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `alternatif_kriteria_sekolah_ibfk_2` FOREIGN KEY (`biodata_id`) REFERENCES `biodata` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `alternatif_kriteria_yayasan`
--
ALTER TABLE `alternatif_kriteria_yayasan`
  ADD CONSTRAINT `alternatif_kriteria_yayasan_ibfk_1` FOREIGN KEY (`biodata_id`) REFERENCES `biodata` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `alternatif_kriteria_yayasan_ibfk_2` FOREIGN KEY (`kriteria_id`) REFERENCES `kriteria_yayasan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `biodata`
--
ALTER TABLE `biodata`
  ADD CONSTRAINT `biodata_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
