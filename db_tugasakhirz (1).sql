-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2019 at 07:35 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tugasakhirz`
--

-- --------------------------------------------------------

--
-- Table structure for table `barangs`
--

CREATE TABLE `barangs` (
  `id` int(10) UNSIGNED NOT NULL,
  `jenis_id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `berat` int(11) DEFAULT NULL,
  `satuan` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barangs`
--

INSERT INTO `barangs` (`id`, `jenis_id`, `nama`, `berat`, `satuan`, `created_at`, `updated_at`) VALUES
(1, 1, 'Macaroni', 5, 'pax', '2019-10-05 01:58:33', '2019-10-05 01:58:33'),
(2, 2, 'Aqua', 10, 'dos', '2019-10-05 01:58:50', '2019-10-05 01:58:50'),
(3, 3, 'Sabun Lux', 8, 'pcs', '2019-10-05 02:00:08', '2019-10-05 02:00:08'),
(4, 4, 'Sapu', 5, 'pax', '2019-10-05 02:00:19', '2019-10-05 02:00:19');

-- --------------------------------------------------------

--
-- Table structure for table `jabatans`
--

CREATE TABLE `jabatans` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jabatans`
--

INSERT INTO `jabatans` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(2, 'Owner', '2019-10-05 00:54:46', '2019-10-05 00:54:46'),
(3, 'Admin Sby', '2019-10-05 00:55:00', '2019-10-05 00:55:00'),
(4, 'Admin Bali', '2019-10-05 00:55:08', '2019-10-05 00:55:08'),
(5, 'Sopir', '2019-10-05 00:55:16', '2019-10-05 00:55:16'),
(6, 'Kurir', '2019-10-05 00:55:23', '2019-10-05 00:55:23');

-- --------------------------------------------------------

--
-- Table structure for table `jadwalpengirimans`
--

CREATE TABLE `jadwalpengirimans` (
  `id` int(10) UNSIGNED NOT NULL,
  `kendaraan_id` int(10) UNSIGNED NOT NULL,
  `karyawan_id_kurir` int(10) UNSIGNED NOT NULL,
  `hari` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Makanan', '2019-10-05 01:13:31', '2019-10-05 01:13:31'),
(2, 'Minuman', '2019-10-05 01:13:42', '2019-10-05 01:13:42'),
(3, 'Bahan kimia', '2019-10-05 01:14:20', '2019-10-05 01:14:20'),
(4, 'Peralatan rumah tangga', '2019-10-05 01:14:40', '2019-10-05 01:14:40');

-- --------------------------------------------------------

--
-- Table structure for table `karyawans`
--

CREATE TABLE `karyawans` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `jabatan_id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_tlp` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tmpt_lahir` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `karyawans`
--

INSERT INTO `karyawans` (`id`, `user_id`, `jabatan_id`, `nama`, `alamat`, `no_tlp`, `foto`, `tmpt_lahir`, `tgl_lahir`, `created_at`, `updated_at`) VALUES
(2, 3, 3, 'Adielah Bujafar', 'Jl. Raya Kali Rungkut No. 97 Surabaya', '081359851997', '491364336.JPG', 'Surabaya', '1997-06-17', '2019-10-05 00:58:03', '2019-10-05 00:58:03'),
(3, 5, 2, 'Elsa Putri', 'Jl. Dupak Bangunsari gg V 10a Surabaya', '081216091996', '60456917.jpg', 'Surabaya', '1996-03-14', '2019-10-05 01:03:54', '2019-10-05 01:03:54'),
(4, 7, 5, 'Ziyad', 'Jl. Ampel No. 98 Denpasar', '0361789654', '172517319.jpg', 'Denpasar', '1996-09-18', '2019-10-05 01:31:03', '2019-10-05 01:31:03'),
(5, 8, 6, 'Hamid Aldjufrie', 'Jl. Opak 97, Gianyar', '0341562781', '712477156.jpg', 'Gianyar', '1997-09-06', '2019-10-05 01:32:15', '2019-10-05 01:32:15'),
(6, 11, 4, 'Regina', 'Jl. Demak 654, Kelungkung', '081359851997', '613698880.jpg', 'Singaraja', '1997-08-06', '2019-10-05 01:37:47', '2019-10-05 01:37:47');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatans`
--

CREATE TABLE `kecamatans` (
  `id` int(11) NOT NULL,
  `tarifkm_id` int(10) NOT NULL,
  `nama` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kecamatans`
--

INSERT INTO `kecamatans` (`id`, `tarifkm_id`, `nama`) VALUES
(1, 8, 'Mengwi'),
(2, 2, 'Abiansemal'),
(3, 2, 'Petang'),
(4, 1, 'Kuta Selatan'),
(5, 6, 'Kuta Utara'),
(6, 2, 'Kuta'),
(7, 1, 'Bangli'),
(8, 5, 'Kintamani');

-- --------------------------------------------------------

--
-- Table structure for table `kelurahans`
--

CREATE TABLE `kelurahans` (
  `id` int(11) NOT NULL,
  `kecamatan_id` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `kode_pos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kelurahans`
--

INSERT INTO `kelurahans` (`id`, `kecamatan_id`, `nama`, `kode_pos`) VALUES
(1, 1, 'Abianbase', 80351),
(2, 1, 'Baha', 80351),
(3, 1, 'Buduk', 80351),
(4, 1, 'Cemagi', 80351),
(5, 1, 'Gulingan', 80351),
(6, 1, 'Kapal', 80351),
(7, 1, 'Kekeran', 80351),
(8, 1, 'Kuwum', 80351),
(9, 1, 'Lukluk', 80351),
(10, 1, 'Mengwi', 80351),
(11, 1, 'Mengwitani', 80351),
(12, 1, 'Munggu', 80351),
(13, 1, 'Penarungan', 80351),
(14, 1, 'Pererenan', 80351),
(15, 1, 'Sading', 80351),
(16, 1, 'Sembung', 80351),
(17, 1, 'Sempidi', 80351),
(18, 1, 'Sobangan', 80351),
(19, 1, 'Tumbak Bayuh', 80351),
(20, 1, 'Werdi Bhuwana', 80351),
(21, 2, 'Abiansemal', 80352),
(22, 2, 'Angantaka', 80352),
(23, 2, 'Ayunan', 80352),
(24, 2, 'Blahkiuh', 80352),
(25, 2, 'Bongkasa', 80352),
(26, 2, 'Bongkasa Pertiwi', 80352),
(27, 2, 'Darmasaba', 80352),
(28, 2, 'Dauh Yeh Cani', 80352),
(29, 2, 'Jagapati', 80352),
(30, 2, 'Mambal', 80352),
(31, 2, 'Mekar Bhuwana', 80352),
(32, 2, 'Punggul', 80352),
(33, 2, 'Sangeh', 80352),
(34, 2, 'Sedang', 80352),
(35, 2, 'Selat', 80352),
(36, 2, 'Sibang Gede', 80352),
(37, 2, 'Sibang Kaja', 80352),
(38, 2, 'Taman', 80352),
(39, 3, 'Belok', 80353),
(40, 3, 'Carangsari', 80353),
(41, 3, 'Getasan', 80353),
(42, 3, 'Pangsan', 80353),
(43, 3, 'Pelaga', 80353),
(44, 3, 'Petang', 80353),
(45, 3, 'Sulangai', 80353),
(46, 4, 'Benoa', 80361),
(47, 5, 'Canggu', 80361),
(48, 5, 'Dalung', 80361),
(49, 4, 'Jimbaran', 80361),
(50, 6, 'Kedonganan', 80361),
(51, 5, 'Kerobokan', 80361),
(52, 5, 'Kerobokan Kaja', 80361),
(53, 5, 'Kerobokan Kelod', 80361),
(54, 6, 'Kuta', 80361),
(55, 4, 'Kutuh', 80361),
(56, 6, 'Legian', 80361),
(57, 4, 'Pecatu', 80361),
(58, 6, 'Seminyak', 80361),
(59, 4, 'Tanjung Benoa', 80361),
(60, 5, 'Tibubeneng', 80361),
(61, 6, 'Tuban', 80361),
(62, 4, 'Ungasan', 80361),
(63, 7, 'Kubu', 80611),
(64, 7, 'Landih', 80611),
(65, 7, 'Cempaga', 80612),
(66, 7, 'Kawan', 80613),
(67, 7, 'Bebalang', 80614),
(68, 7, 'Bunutin', 80614),
(69, 7, 'Kayubihi', 80614),
(70, 7, 'Pengotan', 80614),
(71, 7, 'Taman Bali', 80614),
(72, 8, 'Abang Songan', 80652),
(73, 8, 'Abuan', 80652),
(74, 8, 'Awan', 80652),
(75, 8, 'Bantang', 80652),
(76, 8, 'Banua', 80652),
(77, 8, 'Batu Dinding', 80652),
(78, 8, 'Batukaang', 80652),
(79, 8, 'Batur Selatan', 80652),
(80, 8, 'Batur Tengah', 80652),
(81, 8, 'Batur Utara', 80652),
(82, 8, 'Bayungcerik', 80652),
(83, 8, 'Bayunggede', 80652),
(84, 8, 'Belancan', 80652),
(85, 8, 'Belandingan', 80652),
(86, 8, 'Belanga', 80652),
(87, 8, 'Belantih', 80652),
(88, 8, 'Binyan', 80652),
(89, 8, 'Bonyoh', 80652),
(90, 8, 'Buahan', 80652),
(91, 8, 'Bunutin', 80652),
(92, 8, 'Catur', 80652),
(93, 8, 'Daup', 80652),
(94, 8, 'Dausa', 80652),
(95, 8, 'Gunungbau', 80652),
(96, 8, 'Katung', 80652),
(97, 8, 'Kedisan', 80652),
(98, 8, 'Kintamani', 80652),
(99, 8, 'Kutuh', 80652);

-- --------------------------------------------------------

--
-- Table structure for table `kendaraans`
--

CREATE TABLE `kendaraans` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_polisi` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kapasitas` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kendaraans`
--

INSERT INTO `kendaraans` (`id`, `nama`, `no_polisi`, `kapasitas`, `created_at`, `updated_at`) VALUES
(1, 'Pick Up', 'L 6664 ZT', 10000, '2019-10-05 00:53:14', '2019-10-05 00:53:14'),
(2, 'Truck', 'DK 9087 UL', 7500, '2019-10-05 00:54:10', '2019-10-05 00:54:10'),
(3, 'Dynna Merah', 'L 6089 OK', 5000, '2019-10-05 01:11:21', '2019-10-05 01:11:21'),
(4, 'Truck Yellow', 'DK 4326 R', 10000, '2019-10-05 01:12:53', '2019-10-05 01:12:53');

-- --------------------------------------------------------

--
-- Table structure for table `manifests`
--

CREATE TABLE `manifests` (
  `id` int(10) UNSIGNED NOT NULL,
  `kendaraan_id` int(10) UNSIGNED NOT NULL,
  `karyawan_id` int(11) UNSIGNED NOT NULL,
  `karyawan_id_sopir` int(11) UNSIGNED NOT NULL,
  `karyawan_id_penerima` int(11) UNSIGNED DEFAULT NULL,
  `no_manifest` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `manifests`
--

INSERT INTO `manifests` (`id`, `kendaraan_id`, `karyawan_id`, `karyawan_id_sopir`, `karyawan_id_penerima`, `no_manifest`, `tanggal`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 4, 6, 'MKAEP01', '2019-10-09', '2019-10-09 03:08:27', '2019-10-09 03:08:27'),
(2, 1, 3, 4, 6, 'MKAEP02', '2019-10-09', '2019-10-09 03:09:11', '2019-10-09 03:09:11'),
(3, 3, 3, 4, NULL, 'MKAEP03', '2019-10-09', '2019-10-09 03:12:33', '2019-10-09 03:12:33');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(5, '2019_05_10_141901_create_jabatans_table', 2),
(6, '2019_05_10_141905_create_karyawans_table', 2),
(7, '2019_08_29_042846_create_pelanggans_table', 3),
(9, '2019_08_29_042920_create_kendaraans_table', 4),
(10, '2019_08_29_043005_create_manifests_table', 4),
(12, '2019_08_29_043038_create_barangs_table', 4),
(13, '2019_08_29_043053_create_tarifkms_table', 4),
(14, '2019_08_29_043104_create_rutes_table', 4),
(16, '2019_08_29_043127_create_jadwalpengirimans_table', 5),
(17, '2019_08_29_043144_create_notakirims_table', 6),
(18, '2019_08_29_043222_create_karyawan_manifests_table', 6),
(19, '2019_08_29_043243_create_rute_jadwals_table', 6),
(20, '2019_08_29_043719_create_notakirimbarangs_table', 6),
(21, '2019_09_01_090841_create_jenis_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `notakirimbarangs`
--

CREATE TABLE `notakirimbarangs` (
  `id` int(10) UNSIGNED NOT NULL,
  `notakirim_id` int(10) UNSIGNED NOT NULL,
  `barang_id` int(10) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `dimensi` text COLLATE utf8mb4_unicode_ci,
  `totdimensi` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notakirimbarangs`
--

INSERT INTO `notakirimbarangs` (`id`, `notakirim_id`, `barang_id`, `jumlah`, `dimensi`, `totdimensi`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, NULL, 10, '2019-10-09 00:48:44', '2019-10-09 00:48:44'),
(2, 1, 4, 1, '100x10x10', 2.5, '2019-10-09 00:48:45', '2019-10-09 00:48:45'),
(3, 2, 1, 1000, NULL, 5000, '2019-10-09 00:49:04', '2019-10-09 00:49:04'),
(4, 3, 1, 1, NULL, 5, '2019-10-09 00:52:16', '2019-10-09 00:52:16'),
(5, 3, 2, 3, NULL, 30, '2019-10-09 00:52:16', '2019-10-09 00:52:16'),
(6, 3, 3, 1, NULL, 8, '2019-10-09 00:52:16', '2019-10-09 00:52:16'),
(7, 3, 4, 1, '100x100x10', 25, '2019-10-09 00:52:16', '2019-10-09 00:52:16'),
(8, 4, 1, 2, NULL, 10, '2019-10-09 00:54:07', '2019-10-09 00:54:07'),
(9, 4, 2, 2, NULL, 20, '2019-10-09 00:54:07', '2019-10-09 00:54:07'),
(10, 4, 3, 2, NULL, 16, '2019-10-09 00:54:08', '2019-10-09 00:54:08'),
(11, 4, 4, 2, '100x10x10', 5, '2019-10-09 00:54:08', '2019-10-09 00:54:08'),
(12, 5, 1, 2, NULL, 10, '2019-10-09 00:56:39', '2019-10-09 00:56:39'),
(13, 5, 2, 2, NULL, 20, '2019-10-09 00:56:39', '2019-10-09 00:56:39'),
(14, 5, 3, 2, NULL, 16, '2019-10-09 00:56:40', '2019-10-09 00:56:40'),
(15, 5, 4, 1, '100x10x10', 2.5, '2019-10-09 00:56:40', '2019-10-09 00:56:40'),
(16, 6, 1, 2, NULL, 10, '2019-10-09 01:00:05', '2019-10-09 01:00:05'),
(17, 6, 3, 3, NULL, 24, '2019-10-09 01:00:05', '2019-10-09 01:00:05'),
(18, 6, 4, 2, '100x10x10', 5, '2019-10-09 01:00:05', '2019-10-09 01:00:05'),
(19, 7, 1, 2, NULL, 10, '2019-10-09 01:01:31', '2019-10-09 01:01:31'),
(20, 7, 2, 2, NULL, 20, '2019-10-09 01:01:31', '2019-10-09 01:01:31'),
(21, 7, 3, 2, '100x10x10', 5, '2019-10-09 01:01:31', '2019-10-09 01:01:31'),
(22, 8, 1, 2, NULL, 10, '2019-10-09 01:02:10', '2019-10-09 01:02:10'),
(23, 8, 3, 1, '100x10x10', 2.5, '2019-10-09 01:02:10', '2019-10-09 01:02:10'),
(24, 9, 1, 2, NULL, 10, '2019-10-09 01:05:27', '2019-10-09 01:05:27'),
(25, 10, 1, 3, NULL, 15, '2019-10-09 01:32:30', '2019-10-09 01:32:30'),
(26, 10, 2, 2, NULL, 20, '2019-10-09 01:32:30', '2019-10-09 01:32:30'),
(27, 10, 3, 1, '100x10x10', 2.5, '2019-10-09 01:32:30', '2019-10-09 01:32:30'),
(28, 12, 1, 2, '', 10, '2019-10-09 01:36:13', '2019-10-09 01:36:13'),
(29, 12, 3, 2, '', 16, '2019-10-09 01:36:13', '2019-10-09 01:36:13'),
(30, 12, 4, 1, '100x10x10', 2.5, '2019-10-09 01:36:13', '2019-10-09 01:36:13'),
(31, 13, 1, 2, NULL, 10, '2019-10-09 01:37:13', '2019-10-09 01:37:13'),
(32, 13, 2, 2, NULL, 20, '2019-10-09 01:37:13', '2019-10-09 01:37:13'),
(33, 13, 3, 2, '100x10x10', 5, '2019-10-09 01:37:13', '2019-10-09 01:37:13'),
(34, 14, 1, 2, NULL, 10, '2019-10-15 03:51:17', '2019-10-15 03:51:17'),
(35, 14, 4, 2, NULL, 10, '2019-10-15 03:51:17', '2019-10-15 03:51:17');

-- --------------------------------------------------------

--
-- Table structure for table `notakirims`
--

CREATE TABLE `notakirims` (
  `id` int(10) UNSIGNED NOT NULL,
  `karyawan_id` int(10) UNSIGNED NOT NULL,
  `pelanggan_id` int(10) UNSIGNED NOT NULL,
  `manifest_id` int(10) UNSIGNED DEFAULT NULL,
  `jadwalpengiriman_id` int(10) UNSIGNED DEFAULT NULL,
  `rute_id` int(10) UNSIGNED DEFAULT NULL,
  `tarifkm_id` int(10) UNSIGNED DEFAULT NULL,
  `kelurahan_id` int(11) DEFAULT NULL,
  `no_resi` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namapenerima` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamatpenerima` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tlppenerima` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenispembayaran` tinyint(6) NOT NULL,
  `tanggal` date NOT NULL,
  `biaya_kirim` int(11) NOT NULL,
  `tglbrgkt` date DEFAULT NULL,
  `tgltiba` date DEFAULT NULL,
  `nmpenerimabarang` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notakirims`
--

INSERT INTO `notakirims` (`id`, `karyawan_id`, `pelanggan_id`, `manifest_id`, `jadwalpengiriman_id`, `rute_id`, `tarifkm_id`, `kelurahan_id`, `no_resi`, `namapenerima`, `alamatpenerima`, `tlppenerima`, `jenispembayaran`, `tanggal`, `biaya_kirim`, `tglbrgkt`, `tgltiba`, `nmpenerimabarang`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 1, NULL, NULL, 3, NULL, 'KAEP01', 'Tjia Teddy', 'Jl. Jemursari 908 Surabaya', '0815642528', 1, '2019-10-09', 87500, '2019-10-02', NULL, NULL, 1, '2019-10-09 00:48:44', '2019-10-09 00:48:44'),
(2, 3, 3, 2, NULL, NULL, 8, NULL, 'KAEP02', 'Arman', 'Jl. Krian 123', '0815642528', 1, '2019-10-09', 60000000, NULL, NULL, NULL, 1, '2019-10-09 00:49:04', '2019-10-09 00:49:04'),
(3, 3, 4, 2, NULL, NULL, 5, NULL, 'KAEP03', 'Arman', 'Jl. Demak 654, Kelungkung', '081359851997', 3, '2019-10-09', 612000, NULL, NULL, NULL, 1, '2019-10-09 00:52:16', '2019-10-09 00:52:16'),
(4, 3, 3, 2, NULL, NULL, 5, NULL, 'KAEP04', 'Tjia Teddy', 'Jl. Jemursari 908 Surabaya', '0813579257', 1, '2019-10-09', 459000, NULL, NULL, NULL, 1, '2019-10-09 00:54:07', '2019-10-09 00:54:07'),
(5, 3, 3, 3, NULL, NULL, 2, NULL, 'KAEP05', 'Tjia Teddy', 'Jl. Jemursari 908 Surabaya', '0341562781', 1, '2019-10-09', 291000, NULL, NULL, NULL, 1, '2019-10-09 00:56:39', '2019-10-09 00:56:39'),
(6, 3, 1, 3, NULL, NULL, 4, NULL, 'KAEP06', 'Tjia Teddy', 'Jl. Jemursari 908 Surabaya', '0813579257', 1, '2019-10-09', 312000, NULL, NULL, NULL, 1, '2019-10-09 01:00:05', '2019-10-09 01:00:05'),
(7, 3, 1, 3, NULL, NULL, 2, NULL, 'KAEP07', 'Tjia Teddy', 'Jl. Jemursari 908 Surabaya', '0813579257', 1, '2019-10-09', 210000, NULL, NULL, NULL, 1, '2019-10-09 01:01:31', '2019-10-09 01:01:31'),
(8, 3, 3, 3, NULL, NULL, 1, NULL, 'KAEP08', 'Tjia Teddy', 'Jl. Jemursari 908 Surabaya', '0341562781', 1, '2019-10-09', 62500, NULL, NULL, NULL, 1, '2019-10-09 01:02:10', '2019-10-09 01:02:10'),
(9, 3, 1, 3, NULL, NULL, 1, NULL, 'KAEP09', 'Tjia Teddy', 'Jl. Jemursari 908 Surabaya', '0341562781', 1, '2019-10-09', 50000, NULL, NULL, NULL, 1, '2019-10-09 01:05:27', '2019-10-09 01:05:27'),
(10, 3, 3, 3, NULL, NULL, 2, NULL, 'KAEP10', 'Tjia Teddy', 'Jl. Krian 123', '0815642528', 1, '2019-10-09', 225000, NULL, NULL, NULL, 1, '2019-10-09 01:32:30', '2019-10-09 01:32:30'),
(11, 3, 3, NULL, NULL, NULL, 2, NULL, 'KAEP11', 'Tjia Teddy', 'Jl. Jemursari 908 Surabaya', '0341562781', 1, '2019-10-09', 171000, NULL, NULL, NULL, 1, '2019-10-09 01:35:24', '2019-10-09 01:35:24'),
(12, 3, 3, 3, NULL, NULL, 2, NULL, 'KAEP11', 'Tjia Teddy', 'Jl. Jemursari 908 Surabaya', '0341562781', 1, '2019-10-09', 171000, NULL, NULL, NULL, 1, '2019-10-09 01:36:13', '2019-10-09 01:36:13'),
(13, 3, 3, 3, NULL, NULL, 2, NULL, 'KAEP13', 'Tjia Teddy', 'Jl. Jemursari 908 Surabaya', '081216091996', 1, '2019-10-09', 210000, NULL, NULL, NULL, 1, '2019-10-09 01:37:13', '2019-10-09 01:37:13'),
(14, 3, 4, NULL, NULL, NULL, 1, 46, 'KAEP14', 'Tjia Teddy', 'Jl. Jemursari 908 Surabaya', '0361789654', 1, '2019-10-15', 100000, NULL, NULL, NULL, 1, '2019-10-15 03:51:17', '2019-10-15 03:51:17');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggans`
--

CREATE TABLE `pelanggans` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_tlp` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pelanggans`
--

INSERT INTO `pelanggans` (`id`, `nama`, `alamat`, `no_tlp`, `created_at`, `updated_at`) VALUES
(1, 'Jakyssens', 'Jl. Jemursari 908 Surabaya', '0813579257', '2019-10-05 02:17:25', '2019-10-05 02:27:08'),
(3, 'Moudi', 'Jl. Krian 123', '0341562781', '2019-10-05 02:27:51', '2019-10-05 02:27:51'),
(4, 'Bryan Adams', 'Jl. Banyu Urip 123 Surabaya', '0315426722', '2019-10-09 00:50:56', '2019-10-09 00:50:56');

-- --------------------------------------------------------

--
-- Table structure for table `rutes`
--

CREATE TABLE `rutes` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `koordinat_x` int(11) NOT NULL,
  `koordinat_y` int(11) NOT NULL,
  `status` tinyint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rute_jadwals`
--

CREATE TABLE `rute_jadwals` (
  `id` int(10) UNSIGNED NOT NULL,
  `rute_id` int(10) UNSIGNED NOT NULL,
  `jadwalpengiriman_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tarifkms`
--

CREATE TABLE `tarifkms` (
  `id` int(10) UNSIGNED NOT NULL,
  `tujuan` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tarifkms`
--

INSERT INTO `tarifkms` (`id`, `tujuan`, `harga`, `created_at`, `updated_at`) VALUES
(1, 'Kabupaten Badung', 5000, '2019-10-05 01:21:56', '2019-10-05 01:21:56'),
(2, 'Kabupaten Bangli', 6000, '2019-10-05 01:26:08', '2019-10-05 01:26:08'),
(3, 'Kabupaten Buleleng', 7000, '2019-10-05 01:26:28', '2019-10-05 01:26:28'),
(4, 'Kabupaten Gianyar', 8000, '2019-10-05 01:26:57', '2019-10-05 01:26:57'),
(5, 'Kabupaten Jembrana', 9000, '2019-10-05 01:27:10', '2019-10-05 01:27:10'),
(6, 'Kabupaten Karangasem', 10000, '2019-10-05 01:27:31', '2019-10-05 01:27:31'),
(7, 'Kabupaten Klungkung', 11000, '2019-10-05 01:27:47', '2019-10-05 01:27:47'),
(8, 'Kabupaten Tabanan', 12000, '2019-10-05 01:28:03', '2019-10-05 01:28:03'),
(9, 'Kota Denpasar', 13000, '2019-10-05 01:28:45', '2019-10-05 01:28:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(6) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'adielah', 'adielah@gmail.com', '$2y$10$yyN5AiEm3kVV3ghjkXPIbe6yAPaPKerrCxIyA6QmQ4gFIb5LvJgDW', 1, NULL, '2019-10-05 00:58:03', '2019-10-05 00:58:03'),
(5, 'elsaputri', 'elsaputri@gmail.com', '$2y$10$34nRjfs5HVYQx53fijWoiea4PhcSDeMrTsLUv8/4pA4Q.bBtV1FVG', 1, 'edIWExcLM4biKQlCnB9kJsfo5EFg2NdQNAXFx5wTiN7M4KgvQxMQNMuQQcBx', '2019-10-05 01:03:54', '2019-10-05 01:03:54'),
(6, 'alfi', 'alfi@gmail.com', '$2y$10$9Pzn7ZhOh6mysbfVXPHRVeIevj8OiR2G0gLfVFlEqhJ0jOmn5Vu5a', 2, 'Yps4vQHAjthZLfKoUBOJR2EMpcGxfUuXHsMdhT7pMVXKsYfn8sGDID025Dnu', '2019-10-05 01:08:29', '2019-10-05 01:08:29'),
(7, 'ziyad', 'ziyad@gmail.com', '$2y$10$CitnaGuRx08ppOBuC/q19useWpodDtDFErczX4SghZEXGbWHe8hwy', 1, NULL, '2019-10-05 01:31:02', '2019-10-05 01:31:02'),
(8, 'hamid', 'hamid@gmail.com', '$2y$10$8tE7RGLOn7J1nlEbh.LwVuz5yghgDdn9O1Gxc03pnhtE/YHHNSn6u', 1, NULL, '2019-10-05 01:32:15', '2019-10-05 01:32:15'),
(9, 'rina', 'rina@gmail.com', '$2y$10$qpZS2jGWvbpx8LjDsKVsi.SWr9sBPZMDRsbWDISIexbxNeTLZOO7m', 1, NULL, '2019-10-05 01:34:34', '2019-10-05 01:34:34'),
(11, 'regina', 'regina@gmail.com', '$2y$10$Dy3Cols4bqiXiWpz6YyXKevbqgRt1p4hEyYuU/zHuhdmvsxK27VSy', 1, NULL, '2019-10-05 01:37:47', '2019-10-05 01:37:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barangs`
--
ALTER TABLE `barangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jenis_id` (`jenis_id`);

--
-- Indexes for table `jabatans`
--
ALTER TABLE `jabatans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwalpengirimans`
--
ALTER TABLE `jadwalpengirimans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jadwalpengirimans_kendaraan_id_foreign` (`kendaraan_id`),
  ADD KEY `jadwalpengirimans_karyawan_id_foreign` (`karyawan_id_kurir`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `karyawans`
--
ALTER TABLE `karyawans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD KEY `karyawans_jabatan_id_foreign` (`jabatan_id`);

--
-- Indexes for table `kecamatans`
--
ALTER TABLE `kecamatans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tarifkm_id` (`tarifkm_id`);

--
-- Indexes for table `kelurahans`
--
ALTER TABLE `kelurahans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kecamatan_id` (`kecamatan_id`);

--
-- Indexes for table `kendaraans`
--
ALTER TABLE `kendaraans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manifests`
--
ALTER TABLE `manifests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `manifests_kendaraan_id_foreign` (`kendaraan_id`),
  ADD KEY `karyawan_id` (`karyawan_id`),
  ADD KEY `karyawan_id_sopir` (`karyawan_id_sopir`),
  ADD KEY `karyawan_id_penerima` (`karyawan_id_penerima`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notakirimbarangs`
--
ALTER TABLE `notakirimbarangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notakirimbarangs_notakirim_id_foreign` (`notakirim_id`),
  ADD KEY `notakirimbarangs_barang_id_foreign` (`barang_id`);

--
-- Indexes for table `notakirims`
--
ALTER TABLE `notakirims`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notakirims_karyawan_id_foreign` (`karyawan_id`),
  ADD KEY `notakirims_pelanggan_id_foreign` (`pelanggan_id`),
  ADD KEY `notakirims_manifest_id_foreign` (`manifest_id`),
  ADD KEY `notakirims_jadwalpengiriman_id_foreign` (`jadwalpengiriman_id`),
  ADD KEY `notakirims_rute_id_foreign` (`rute_id`),
  ADD KEY `notakirims_tarifkm_id_foreign` (`tarifkm_id`),
  ADD KEY `notakirims_kelurahan_id_foreign` (`kelurahan_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pelanggans`
--
ALTER TABLE `pelanggans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rutes`
--
ALTER TABLE `rutes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rute_jadwals`
--
ALTER TABLE `rute_jadwals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rute_jadwals_rute_id_foreign` (`rute_id`),
  ADD KEY `rute_jadwals_jadwalpengiriman_id_foreign` (`jadwalpengiriman_id`);

--
-- Indexes for table `tarifkms`
--
ALTER TABLE `tarifkms`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jabatans`
--
ALTER TABLE `jabatans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jadwalpengirimans`
--
ALTER TABLE `jadwalpengirimans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `karyawans`
--
ALTER TABLE `karyawans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kecamatans`
--
ALTER TABLE `kecamatans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kelurahans`
--
ALTER TABLE `kelurahans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `kendaraans`
--
ALTER TABLE `kendaraans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `manifests`
--
ALTER TABLE `manifests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `notakirimbarangs`
--
ALTER TABLE `notakirimbarangs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `notakirims`
--
ALTER TABLE `notakirims`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pelanggans`
--
ALTER TABLE `pelanggans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rutes`
--
ALTER TABLE `rutes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rute_jadwals`
--
ALTER TABLE `rute_jadwals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tarifkms`
--
ALTER TABLE `tarifkms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwalpengirimans`
--
ALTER TABLE `jadwalpengirimans`
  ADD CONSTRAINT `jadwalpengirimans_karyawan_id_foreign` FOREIGN KEY (`karyawan_id_kurir`) REFERENCES `karyawans` (`id`),
  ADD CONSTRAINT `jadwalpengirimans_kendaraan_id_foreign` FOREIGN KEY (`kendaraan_id`) REFERENCES `kendaraans` (`id`);

--
-- Constraints for table `kelurahans`
--
ALTER TABLE `kelurahans`
  ADD CONSTRAINT `kelurahan_kecamatan_foreign` FOREIGN KEY (`kecamatan_id`) REFERENCES `kecamatans` (`id`);

--
-- Constraints for table `notakirimbarangs`
--
ALTER TABLE `notakirimbarangs`
  ADD CONSTRAINT `notakirimbarangs_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `barangs` (`id`),
  ADD CONSTRAINT `notakirimbarangs_notakirim_id_foreign` FOREIGN KEY (`notakirim_id`) REFERENCES `notakirims` (`id`);

--
-- Constraints for table `notakirims`
--
ALTER TABLE `notakirims`
  ADD CONSTRAINT `notakirims_jadwalpengiriman_id_foreign` FOREIGN KEY (`jadwalpengiriman_id`) REFERENCES `jadwalpengirimans` (`id`),
  ADD CONSTRAINT `notakirims_karyawan_id_foreign` FOREIGN KEY (`karyawan_id`) REFERENCES `karyawans` (`id`),
  ADD CONSTRAINT `notakirims_kelurahan_id_foreign` FOREIGN KEY (`kelurahan_id`) REFERENCES `kelurahans` (`id`),
  ADD CONSTRAINT `notakirims_manifest_id_foreign` FOREIGN KEY (`manifest_id`) REFERENCES `manifests` (`id`),
  ADD CONSTRAINT `notakirims_pelanggan_id_foreign` FOREIGN KEY (`pelanggan_id`) REFERENCES `pelanggans` (`id`),
  ADD CONSTRAINT `notakirims_rute_id_foreign` FOREIGN KEY (`rute_id`) REFERENCES `rutes` (`id`),
  ADD CONSTRAINT `notakirims_tarifkm_id_foreign` FOREIGN KEY (`tarifkm_id`) REFERENCES `tarifkms` (`id`);

--
-- Constraints for table `rute_jadwals`
--
ALTER TABLE `rute_jadwals`
  ADD CONSTRAINT `rute_jadwals_jadwalpengiriman_id_foreign` FOREIGN KEY (`jadwalpengiriman_id`) REFERENCES `jadwalpengirimans` (`id`),
  ADD CONSTRAINT `rute_jadwals_rute_id_foreign` FOREIGN KEY (`rute_id`) REFERENCES `rutes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
