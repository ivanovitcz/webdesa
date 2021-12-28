-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2021 at 07:43 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `desa`
--

-- --------------------------------------------------------

--
-- Table structure for table `aduan`
--

CREATE TABLE `aduan` (
  `id` int(11) NOT NULL,
  `id_kel` varchar(20) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `isi` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aduan`
--

INSERT INTO `aduan` (`id`, `id_kel`, `judul`, `kategori`, `isi`, `created_at`, `updated_at`) VALUES
(2, '12', 'Air Got Mampet', 'Keluhan', 'Air Got Mampet Air Got Mampet Air Got Mampet Air Got Mampet Air Got Mampet Air Got Mampet', '2020-05-18 16:34:14', NULL),
(5, '12', 'HILANG', 'Hilang', 'Bantuan untuk warga kekurangan salah sasaran Bantuan untuk warga kekurangan salah sasaran Bantuan untuk warga kekurangan salah sasaran ', '2020-05-19 16:48:28', NULL),
(6, '21', 'Listrik Mati', 'Keluhan', 'Bantuan untuk warga kekurangan salah sasaran Bantuan untuk warga kekurangan salah sasaran Bantuan untuk warga kekurangan salah sasaran ', '2020-05-19 10:29:14', '2020-05-19 17:29:14'),
(7, '21', 'Mobil Hilang', 'Hilang', 'Bantuan untuk warga kekurangan salah sasaran Bantuan untuk warga kekurangan salah sasaran Bantuan untuk warga kekurangan salah sasaran ', '2020-05-20 09:56:21', '2020-05-20 16:56:21'),
(8, '21', 'Apa ahayo', 'Kritik', 'Bantuan untuk warga kekurangan salah sasaran Bantuan untuk warga kekurangan salah sasaran Bantuan untuk warga kekurangan salah sasaran ', '2020-05-21 01:18:47', '2020-05-21 08:18:47'),
(9, '21', 'Got bau', 'Keluhan', 'Bantuan untuk warga kekurangan salah sasaran Bantuan untuk warga kekurangan salah sasaran Bantuan untuk warga kekurangan salah sasaran ', '2020-05-21 01:20:03', '2020-05-21 08:20:03'),
(10, '21', 'Jaga Keamanan', 'Saran', 'Bantuan untuk warga kekurangan salah sasaran Bantuan untuk warga kekurangan salah sasaran Bantuan untuk warga kekurangan salah sasaran ', '2020-05-21 01:21:34', '2020-05-21 08:21:34'),
(11, '21', 'Mbuh lah', 'Keluhan', 'Bantuan untuk warga kekurangan salah sasaran Bantuan untuk warga kekurangan salah sasaran Bantuan untuk warga kekurangan salah sasaran ', '2020-05-21 01:22:19', '2020-05-21 08:22:19'),
(12, '21', 'HP', 'Hilang', 'Bantuan untuk warga kekurangan salah sasaran Bantuan untuk warga kekurangan salah sasaran Bantuan untuk warga kekurangan salah sasaran ', '2020-05-21 01:23:17', '2020-05-21 08:23:17'),
(16, '12', 'fgfhfh', 'Keluhan', 'fhccf', '2020-07-29 05:55:36', '2020-07-29 12:55:36'),
(17, '21', 'HAXHAJHJAHJDH', 'Hilang', 'asjfljaslf dsnfsdf sdfs,d', '2020-07-29 07:43:33', '2020-07-29 14:43:33');

-- --------------------------------------------------------

--
-- Table structure for table `arisanbapak`
--

CREATE TABLE `arisanbapak` (
  `id` int(11) NOT NULL,
  `tempat` varchar(30) NOT NULL,
  `tanggal` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `arisanbapak`
--

INSERT INTO `arisanbapak` (`id`, `tempat`, `tanggal`, `created_at`, `updated_at`) VALUES
(1, '12', '2020-06-27 13:30:00', '2020-05-18 07:33:25', '2020-05-29 13:43:57'),
(6, '20', '2020-05-30 19:45:00', '2020-05-29 06:29:04', '2020-05-29 13:29:04');

-- --------------------------------------------------------

--
-- Table structure for table `arisanibu`
--

CREATE TABLE `arisanibu` (
  `id` int(11) NOT NULL,
  `tempat` varchar(200) NOT NULL,
  `tanggal` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `arisanibu`
--

INSERT INTO `arisanibu` (`id`, `tempat`, `tanggal`, `created_at`, `updated_at`) VALUES
(1, '11', '2020-04-14 23:44:39', '2020-05-17 16:45:11', NULL),
(2, '12', '2020-05-30 16:15:00', '2020-05-17 16:46:21', '2020-05-29 13:48:03'),
(3, '16', '2020-06-17 00:00:00', '2020-05-17 16:46:21', '2020-05-18 09:22:01'),
(4, '15', '2020-07-15 00:00:00', '2020-05-17 16:46:21', '2020-05-17 18:03:36'),
(5, '16', '2020-08-07 00:00:00', '2020-05-17 16:46:21', '2020-05-18 08:38:37'),
(10, '15', '2020-05-01 00:00:00', '2020-05-22 17:05:48', '2020-05-23 00:05:48'),
(11, '17', '2020-05-31 00:00:00', '2020-05-27 13:38:50', '2020-05-27 20:38:50'),
(14, '16', '2021-01-09 15:45:00', '2020-05-29 06:48:17', '2020-05-29 13:48:17');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `foto`
--

CREATE TABLE `foto` (
  `id` int(11) NOT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `keterangan` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `foto`
--

INSERT INTO `foto` (`id`, `foto`, `keterangan`, `created_at`, `updated_at`) VALUES
(3, 'Screenshot_5.jpg', 'Gacha lagi', '2020-05-21 02:50:37', '2020-05-21 09:50:37'),
(4, 'Screenshot_11.jpg', 'TRUE SILVER SLASH', '2020-05-21 05:33:40', '2020-05-21 12:33:40'),
(6, 'Screenshot_1.jpg', 'Saria', '2020-05-21 05:40:28', '2020-05-21 12:40:28'),
(13, 'Screenshot_15.jpg', 'skadi', '2020-05-29 09:58:37', '2020-05-29 17:19:35');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `tanggal` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id`, `nama`, `keterangan`, `tanggal`, `created_at`, `updated_at`) VALUES
(1, '17an', 'ya 17an dong', '2020-08-17 00:00:00', '2020-05-22 17:09:06', '2020-05-23 00:33:24'),
(3, 'Peringatan Hari Desa', 'Peringatan Hari Desa Peringatan Hari Desa', '2020-05-31 00:00:00', '2020-05-22 17:33:52', '2020-05-23 00:33:52');

-- --------------------------------------------------------

--
-- Table structure for table `keluarga`
--

CREATE TABLE `keluarga` (
  `id` int(11) NOT NULL,
  `id_users` int(11) DEFAULT NULL,
  `nama` varchar(30) NOT NULL,
  `nomor` varchar(20) NOT NULL,
  `pekerjaan` varchar(30) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keluarga`
--

INSERT INTO `keluarga` (`id`, `id_users`, `nama`, `nomor`, `pekerjaan`, `foto`, `created_at`, `updated_at`) VALUES
(12, 19, 'Bapak Edianto', '37587385', 'Pengusaha', 'tab.png', '2020-05-17 02:08:12', '2020-05-29 17:04:16'),
(15, 24, 'Bapak Jono', '08572847827', 'Pedagang', 'Screenshot_1.jpg', '2020-05-17 02:29:17', '2020-05-20 14:02:11'),
(16, 25, 'Bapak Slamet', '3532534', 'edfdsg', 'Screenshot_3.jpg', '2020-05-17 02:30:16', '2020-05-20 14:03:35'),
(18, 28, 'Bapak Joko', '779797', 'daksf', 'Screenshot_2.jpg', '2020-05-17 09:20:45', '2020-05-20 14:02:54'),
(20, 30, 'Bapak RT Paijo', '3535346', 'Bapak RT', 'Screenshot_10.jpg', '2020-05-19 00:15:41', '2020-05-19 07:15:41'),
(21, 31, 'Bapak Edo', '2423532', 'sfsdgdg', 'Screenshot_2.jpg', '2020-05-19 01:04:33', '2020-05-20 14:04:36'),
(22, 32, 'Bapak Jarno', '53344364', 'Guru', 'Screenshot_12.jpg', '2020-05-22 01:57:46', '2020-05-22 08:57:46');

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
(2, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `motto`
--

CREATE TABLE `motto` (
  `id` int(11) NOT NULL,
  `isi` varchar(300) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `motto`
--

INSERT INTO `motto` (`id`, `isi`, `created_at`, `updated_at`) VALUES
(1, 'Ramah Selalu', '2020-05-21 02:12:20', '2020-05-22 08:55:29'),
(3, 'Selalu Terdepan', '2020-05-21 02:17:06', '2020-05-22 08:55:12'),
(4, 'Selalu Semangat Berkemajuan', '2020-05-22 01:55:45', '2020-05-22 08:55:45');

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `isi` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id`, `judul`, `kategori`, `isi`, `created_at`, `updated_at`) VALUES
(1, 'Jaga Jarak, Jangan Kumpul-Kumpul', 'Himbauan', 'Moto Desa Ku', '2020-05-18 08:44:38', '2020-05-21 09:16:08'),
(2, 'Rapat', 'Revisi', 'Jangan lupa rapat diganti hari rabu', '2020-05-18 08:50:56', '2020-05-18 15:50:56'),
(3, 'Jangan Keluar', 'Peringatan', 'Jangan Keluar Kalau Tidak Ada Keperluan', '2020-05-18 08:51:33', '2020-05-18 15:51:33'),
(6, 'Rumah Hilang', 'Hilang', 'ytjyugujgjg', '2020-05-19 00:00:30', '2020-05-19 07:00:30'),
(7, 'Rumah Hilang', 'Hilang', 'Rumah HilangRumah HilangRumah HilangRumah HilangRumah Hilang', '2020-05-21 00:52:04', '2020-05-21 07:52:04'),
(8, 'Jangan Keluar Rumah', 'Peringatan', 'Sekali lagi kalau tidak penting jangan keluar rumah!', '2020-05-22 01:56:22', '2020-05-22 08:56:22'),
(9, 'Arisan Ditiadakan Sementara', 'Revisi', 'Arisan Ditiadakan Sementara Arisan Ditiadakan Sementara Arisan Ditiadakan Sementara Arisan Ditiadakan Sementara', '2020-05-22 07:28:08', '2020-05-22 14:28:08'),
(10, 'Halo Tes', 'Himbauan', 'Testing this', '2020-05-22 14:34:52', '2020-05-22 21:34:52');

-- --------------------------------------------------------

--
-- Table structure for table `profildesa`
--

CREATE TABLE `profildesa` (
  `id` int(11) NOT NULL,
  `ketua` varchar(50) NOT NULL,
  `kataketua` varchar(200) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `namadesa` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profildesa`
--

INSERT INTO `profildesa` (`id`, `ketua`, `kataketua`, `foto`, `namadesa`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'Bapak Adit', 'Terserah anda mau ngapain di desa ini Terserah anda mau ngapain di desa ini Terserah anda mau ngapain di desa ini Terserah anda mau ngapain di desa ini Terserah anda mau ngapain di desa ini Terserah a', 'Screenshot_16.jpg', 'Desa Maju Mundur', 'Desa Maju  Mundur RT4 RW4 Kode Pos 50713, Kelurahan SKJY, Kecamatan SKJY, Kota ABCDEF', '2020-05-21 12:58:13', '2020-05-31 00:20:46');

-- --------------------------------------------------------

--
-- Table structure for table `ronda`
--

CREATE TABLE `ronda` (
  `id` int(11) NOT NULL,
  `id_kel` int(11) NOT NULL,
  `hari` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ronda`
--

INSERT INTO `ronda` (`id`, `id_kel`, `hari`, `created_at`, `updated_at`) VALUES
(2, 12, 'Selasa', '2020-05-17 10:00:29', NULL),
(5, 15, 'Jumat', '2020-05-17 10:01:17', NULL),
(14, 16, 'Sabtu', '2020-05-17 08:36:57', '2020-05-17 15:36:57'),
(15, 15, 'Minggu', '2020-05-17 08:38:16', '2020-05-17 15:54:57'),
(18, 15, 'Jumat', '2020-05-17 09:19:08', '2020-05-17 16:27:43'),
(19, 18, 'Sabtu', '2020-05-17 09:21:05', '2020-05-17 16:21:05'),
(23, 16, 'Kamis', '2020-05-18 07:36:26', '2020-07-29 12:53:50'),
(28, 21, 'Minggu', '2020-05-19 15:00:30', NULL),
(31, 21, 'Selasa', '2020-05-22 01:57:13', '2020-05-22 08:57:13'),
(32, 22, 'Kamis', '2020-05-22 01:57:58', '2020-05-27 20:45:13'),
(33, 22, 'Rabu', '2020-05-22 01:58:04', '2020-07-29 12:53:59'),
(35, 20, 'Senin', '2020-05-27 13:37:39', '2020-05-27 20:37:39'),
(37, 12, 'Minggu', '2020-05-27 13:44:10', '2020-07-29 12:54:13'),
(39, 15, 'Rabu', '2020-05-27 13:45:19', '2020-05-27 20:45:19'),
(41, 15, 'Senin', '2020-05-27 13:56:02', '2020-05-27 20:56:02'),
(43, 16, 'Senin', '2020-05-27 14:05:16', '2020-05-27 21:05:16'),
(44, 12, 'Selasa', '2020-05-29 06:39:51', '2020-05-29 13:39:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(19, 'vanov', '$2y$10$265iE8QWIc82QrOOA3ec3.1MXq/HdvWCvGBYIHuOIz.8JONjuuIkS', 'RT', NULL, '2020-05-17 02:08:12', '2020-05-29 09:01:06'),
(24, 'YUIZ', '$2y$10$H8cRLiFV8NnhuoK1KsZQ3eeVrWIni342lv64cG2KHyDlk8qFjhjHa', 'Warga', NULL, '2020-05-17 02:29:17', '2020-05-20 07:01:45'),
(25, 'MNB', '$2y$10$CsxW/H7qQzgOcNchrig/EeLF1qyLF.W9lIoGbSd.KbQV41fS7JTIO', 'Warga', NULL, '2020-05-17 02:30:16', '2020-05-20 07:03:08'),
(28, 'MNBX', '$2y$10$B32cycAopsQS1r9sOzUIZenjMbDx6yHvpo6dvuPKicLIABp85QBnu', 'Warga', NULL, '2020-05-17 09:20:45', '2020-05-20 07:02:48'),
(30, 'PakRT', '$2y$10$TAbD0KKW32vxJDWWpt.KHe25XruYQ4w4eUSDZ6DjD9cukGO0r9uMC', 'Warga', NULL, '2020-05-19 00:15:41', '2020-05-27 13:35:20'),
(31, 'ZXCX', '$2y$10$UtY5MLkQxNDg94vIXwnmTeyyhI8IxaFVtjqWbg3pT.VULNUqiXzfS', 'Warga', NULL, '2020-05-19 01:04:33', '2020-07-29 05:55:56'),
(32, 'akunku', '$2y$10$vLBgMBpl/x32j2VkU03z0OQunZvm/lALkMIOaLVpUcGHHkx6Qu2Xy', 'Warga', NULL, '2020-05-22 01:57:46', '2020-05-22 01:57:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aduan`
--
ALTER TABLE `aduan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `arisanbapak`
--
ALTER TABLE `arisanbapak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `arisanibu`
--
ALTER TABLE `arisanibu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keluarga`
--
ALTER TABLE `keluarga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `motto`
--
ALTER TABLE `motto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profildesa`
--
ALTER TABLE `profildesa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ronda`
--
ALTER TABLE `ronda`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aduan`
--
ALTER TABLE `aduan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `arisanbapak`
--
ALTER TABLE `arisanbapak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `arisanibu`
--
ALTER TABLE `arisanibu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `foto`
--
ALTER TABLE `foto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `keluarga`
--
ALTER TABLE `keluarga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `motto`
--
ALTER TABLE `motto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `profildesa`
--
ALTER TABLE `profildesa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ronda`
--
ALTER TABLE `ronda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
