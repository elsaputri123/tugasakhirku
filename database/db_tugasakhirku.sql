-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 05, 2019 at 04:07 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tugasakhirku`
--

-- --------------------------------------------------------

--
-- Table structure for table `barangs`
--

CREATE TABLE `barangs` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `berat` int(11) DEFAULT NULL,
  `satuan` varchar(45) DEFAULT NULL,
  `jenis_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `barangs`
--

INSERT INTO `barangs` (`id`, `nama`, `berat`, `satuan`, `jenis_id`, `created_at`, `updated_at`) VALUES
(1, 'Macaroni', 5, 'pax', 1, '2019-10-05 08:58:33', '2019-10-05 08:58:33'),
(2, 'Aqua', 10, 'dos', 2, '2019-10-05 08:58:50', '2019-10-05 08:58:50'),
(3, 'Sabun Lux', 8, 'pcs', 3, '2019-10-05 09:00:08', '2019-10-05 09:00:08'),
(4, 'Sapu', 5, 'pax', 4, '2019-10-05 09:00:19', '2019-10-05 09:00:19');

-- --------------------------------------------------------

--
-- Table structure for table `detailhistorys`
--

CREATE TABLE `detailhistorys` (
  `id` int(11) NOT NULL,
  `manifest_id` int(11) NOT NULL,
  `historypengiriman_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `detailhistorys`
--

INSERT INTO `detailhistorys` (`id`, `manifest_id`, `historypengiriman_id`, `created_at`, `updated_at`) VALUES
(25, 1, 13, '2019-11-04 04:13:43', '2019-11-04 04:13:43');

-- --------------------------------------------------------

--
-- Table structure for table `historykurir`
--

CREATE TABLE `historykurir` (
  `id` int(11) NOT NULL,
  `id_kurir` int(11) NOT NULL,
  `id_nota` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `historykurir`
--

INSERT INTO `historykurir` (`id`, `id_kurir`, `id_nota`, `tanggal`, `created_at`, `updated_at`) VALUES
(18, 6, 1, '2019-11-04', '2019-11-03 21:16:15', '2019-11-03 21:16:15');

-- --------------------------------------------------------

--
-- Table structure for table `historypengirimans`
--

CREATE TABLE `historypengirimans` (
  `id` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `lokasi_awal` int(45) NOT NULL,
  `lokasi_akhir` int(45) NOT NULL,
  `jarak` double NOT NULL,
  `jadwalpengiriman_id` int(11) NOT NULL,
  `status` int(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `historypengirimans`
--

INSERT INTO `historypengirimans` (`id`, `tanggal`, `lokasi_awal`, `lokasi_akhir`, `jarak`, `jadwalpengiriman_id`, `status`, `created_at`, `updated_at`) VALUES
(13, '2019-11-04', 10, 9, 4, 2, 2, '2019-11-04 04:11:18', '2019-11-04 04:13:53');

-- --------------------------------------------------------

--
-- Table structure for table `jabatans`
--

CREATE TABLE `jabatans` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jabatans`
--

INSERT INTO `jabatans` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(2, 'Owner', '2019-10-05 07:54:46', '2019-10-05 07:54:46'),
(3, 'Admin Sby', '2019-10-05 07:55:00', '2019-10-05 07:55:00'),
(4, 'Admin Bali', '2019-10-05 07:55:08', '2019-10-05 07:55:08'),
(5, 'Sopir', '2019-10-05 07:55:16', '2019-10-05 07:55:16'),
(6, 'Kurir', '2019-10-05 07:55:23', '2019-10-05 07:55:23');

-- --------------------------------------------------------

--
-- Table structure for table `jadwalpengirimans`
--

CREATE TABLE `jadwalpengirimans` (
  `id` int(11) NOT NULL,
  `hari` varchar(45) NOT NULL,
  `karyawan_id_kurir` int(11) NOT NULL,
  `kendaraan_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jadwalpengirimans`
--

INSERT INTO `jadwalpengirimans` (`id`, `hari`, `karyawan_id_kurir`, `kendaraan_id`, `created_at`, `updated_at`) VALUES
(2, '1', 5, 1, '2019-10-20 15:06:25', '2019-10-20 15:06:25'),
(4, '3', 5, 1, '2019-10-20 15:18:13', '2019-10-20 15:18:13'),
(5, '4', 5, 1, '2019-10-24 02:35:35', '2019-10-24 02:35:35'),
(6, '1', 5, 4, '2019-10-28 01:51:31', '2019-10-28 01:51:31'),
(7, '1', 5, 1, '2019-10-28 02:46:21', '2019-10-28 02:46:21'),
(8, '2', 5, 3, '2019-10-29 05:28:15', '2019-10-29 05:28:15');

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Makanan', '2019-10-05 08:13:31', '2019-10-05 08:13:31'),
(2, 'Minuman', '2019-10-05 08:13:42', '2019-10-05 08:13:42'),
(3, 'Bahan kimia', '2019-10-05 08:14:20', '2019-10-05 08:14:20'),
(4, 'Peralatan rumah tangga', '2019-10-05 08:14:40', '2019-10-05 08:14:40');

-- --------------------------------------------------------

--
-- Table structure for table `karyawans`
--

CREATE TABLE `karyawans` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `alamat` varchar(45) NOT NULL,
  `no_tlp` varchar(45) NOT NULL,
  `foto` tinytext NOT NULL,
  `tmpt_lahir` varchar(45) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `jabatan_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `karyawans`
--

INSERT INTO `karyawans` (`id`, `nama`, `alamat`, `no_tlp`, `foto`, `tmpt_lahir`, `tgl_lahir`, `user_id`, `jabatan_id`, `created_at`, `updated_at`) VALUES
(2, 'Adielah Bujafar', 'Jl. Raya Kali Rungkut No. 97 Surabaya', '081359851997', '491364336.JPG', 'Surabaya', '1997-06-17', 3, 2, NULL, NULL),
(3, 'Elsa Putri', 'Jl. Dupak Bangunsari gg V 10a Surabaya', '081216091996', '60456917.jpg', 'Surabaya', '1996-03-14', 5, 3, NULL, NULL),
(4, 'Ziyad', 'Jl. Ampel No. 98 Denpasar', '0361789654', '172517319.jpg', 'Denpasar', '1996-09-18', 7, 4, NULL, NULL),
(5, 'Hamid Aldjufrie', 'Jl. Opak 97, Gianyar', '0341562781', '712477156.jpg', 'Gianyar', '1997-09-06', 8, 5, NULL, NULL),
(6, 'Regina', 'Jl. Demak 654, Kelungkung', '081359851997', '613698880.jpg', 'Singaraja', '1997-08-06', 11, 6, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kecamatans`
--

CREATE TABLE `kecamatans` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `tarifkm_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kecamatans`
--

INSERT INTO `kecamatans` (`id`, `nama`, `tarifkm_id`) VALUES
(1, 'Mengwi', 8),
(2, 'Abiansemal', 2),
(3, 'Petang', 2),
(4, 'Kuta Selatan', 1),
(5, 'Kuta Utara', 6),
(6, 'Kuta', 2),
(7, 'Bangli', 1),
(8, 'Kintamani', 5),
(9, 'Rungkut', 10),
(10, 'Surabaya', 11);

-- --------------------------------------------------------

--
-- Table structure for table `kelurahans`
--

CREATE TABLE `kelurahans` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `kode_pos` int(11) NOT NULL,
  `kecamatan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kelurahans`
--

INSERT INTO `kelurahans` (`id`, `nama`, `kode_pos`, `kecamatan_id`) VALUES
(1, 'Abianbase', 80351, 1),
(2, 'Baha', 80351, 1),
(3, 'Buduk', 80351, 1),
(4, 'Cemagi', 80351, 1),
(5, 'Gulingan', 80351, 1),
(6, 'Kapal', 80351, 1),
(7, 'Kekeran', 80351, 1),
(8, 'Kuwum', 80351, 1),
(9, 'Lukluk', 80351, 1),
(10, 'Mengwi', 80351, 1),
(11, 'Mengwitani', 80351, 1),
(12, 'Munggu', 80351, 1),
(13, 'Penarungan', 80351, 1),
(14, 'Pererenan', 80351, 1),
(15, 'Sading', 80351, 1),
(16, 'Sembung', 80351, 1),
(17, 'Sempidi', 80351, 1),
(18, 'Sobangan', 80351, 1),
(19, 'Tumbak Bayuh', 80351, 1),
(20, 'Werdi Bhuwana', 80351, 1),
(21, 'Abiansemal', 80352, 2),
(22, 'Angantaka', 80352, 2),
(23, 'Ayunan', 80352, 2),
(24, 'Blahkiuh', 80352, 2),
(25, 'Bongkasa', 80352, 2),
(26, 'Bongkasa Pertiwi', 80352, 2),
(27, 'Darmasaba', 80352, 2),
(28, 'Dauh Yeh Cani', 80352, 2),
(29, 'Jagapati', 80352, 2),
(30, 'Mambal', 80352, 2),
(31, 'Mekar Bhuwana', 80352, 2),
(32, 'Punggul', 80352, 2),
(33, 'Sangeh', 80352, 2),
(34, 'Sedang', 80352, 2),
(35, 'Selat', 80352, 2),
(36, 'Sibang Gede', 80352, 2),
(37, 'Sibang Kaja', 80352, 2),
(38, 'Taman', 80352, 2),
(39, 'Belok', 80353, 3),
(40, 'Carangsari', 80353, 3),
(41, 'Getasan', 80353, 3),
(42, 'Pangsan', 80353, 3),
(43, 'Pelaga', 80353, 3),
(44, 'Petang', 80353, 3),
(45, 'Sulangai', 80353, 3),
(46, 'Benoa', 80361, 4),
(47, 'Canggu', 80361, 5),
(48, 'Dalung', 80361, 5),
(49, 'Jimbaran', 80361, 4),
(50, 'Kedonganan', 80361, 6),
(51, 'Kerobokan', 80361, 5),
(52, 'Kerobokan Kaja', 80361, 5),
(53, 'Kerobokan Kelod', 80361, 5),
(54, 'Kuta', 80361, 6),
(55, 'Kutuh', 80361, 4),
(56, 'Legian', 80361, 6),
(57, 'Pecatu', 80361, 4),
(58, 'Seminyak', 80361, 6),
(59, 'Tanjung Benoa', 80361, 4),
(60, 'Tibubeneng', 80361, 5),
(61, 'Tuban', 80361, 6),
(62, 'Ungasan', 80361, 4),
(63, 'Kubu', 80611, 7),
(64, 'Landih', 80611, 7),
(65, 'Cempaga', 80612, 7),
(66, 'Kawan', 80613, 7),
(67, 'Bebalang', 80614, 7),
(68, 'Bunutin', 80614, 7),
(69, 'Kayubihi', 80614, 7),
(70, 'Pengotan', 80614, 7),
(71, 'Taman Bali', 80614, 7),
(72, 'Abang Songan', 80652, 8),
(73, 'Abuan', 80652, 8),
(74, 'Awan', 80652, 8),
(75, 'Bantang', 80652, 8),
(76, 'Banua', 80652, 8),
(77, 'Batu Dinding', 80652, 8),
(78, 'Batukaang', 80652, 8),
(79, 'Batur Selatan', 80652, 8),
(80, 'Batur Tengah', 80652, 8),
(81, 'Batur Utara', 80652, 8),
(82, 'Bayungcerik', 80652, 8),
(83, 'Bayunggede', 80652, 8),
(84, 'Belancan', 80652, 8),
(85, 'Belandingan', 80652, 8),
(86, 'Belanga', 80652, 8),
(87, 'Belantih', 80652, 8),
(88, 'Binyan', 80652, 8),
(89, 'Bonyoh', 80652, 8),
(90, 'Buahan', 80652, 8),
(91, 'Bunutin', 80652, 8),
(92, 'Catur', 80652, 8),
(93, 'Daup', 80652, 8),
(94, 'Dausa', 80652, 8),
(95, 'Gunungbau', 80652, 8),
(96, 'Katung', 80652, 8),
(97, 'Kedisan', 80652, 8),
(98, 'Kintamani', 80652, 8),
(99, 'Kutuh', 80652, 8);

-- --------------------------------------------------------

--
-- Table structure for table `kendaraans`
--

CREATE TABLE `kendaraans` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `no_polisi` varchar(45) NOT NULL,
  `kapasitas` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kendaraans`
--

INSERT INTO `kendaraans` (`id`, `nama`, `no_polisi`, `kapasitas`, `created_at`, `updated_at`) VALUES
(1, 'Pick Up', 'L 6664 ZT', 10000, NULL, NULL),
(2, 'Truck', 'DK 9087 UL', 7500, NULL, NULL),
(3, 'Dynna Merah', 'L 6089 OK', 5000, NULL, NULL),
(4, 'Truck Yellow', 'DK 4326 R', 10000, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `manifests`
--

CREATE TABLE `manifests` (
  `id` int(11) NOT NULL,
  `no_manifest` varchar(11) NOT NULL,
  `tanggal` date NOT NULL,
  `kendaraan_id` int(11) NOT NULL,
  `karyawan_id` int(11) NOT NULL,
  `karyawan_id_sopir` int(11) NOT NULL,
  `karyawan_id_penerima` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `manifests`
--

INSERT INTO `manifests` (`id`, `no_manifest`, `tanggal`, `kendaraan_id`, `karyawan_id`, `karyawan_id_sopir`, `karyawan_id_penerima`, `created_at`, `updated_at`) VALUES
(1, 'MKAEP01', '2019-10-09', 1, 3, 4, 6, '2019-10-09 10:08:27', '2019-10-09 10:08:27'),
(2, 'MKAEP02', '2019-10-09', 1, 3, 4, 6, '2019-10-09 10:09:11', '2019-10-09 10:09:11'),
(3, 'MKAEP03', '2019-10-09', 3, 3, 4, NULL, '2019-10-09 10:12:33', '2019-10-09 10:12:33'),
(4, 'MKAEP04', '2019-10-28', 2, 3, 5, NULL, '2019-10-28 02:46:46', '2019-10-28 02:46:46');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notakirimbarangs`
--

CREATE TABLE `notakirimbarangs` (
  `id` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `dimensi` varchar(45) DEFAULT NULL,
  `totdimensi` double DEFAULT NULL,
  `notakirim_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notakirimbarangs`
--

INSERT INTO `notakirimbarangs` (`id`, `jumlah`, `dimensi`, `totdimensi`, `notakirim_id`, `barang_id`, `created_at`, `updated_at`) VALUES
(1, 2, NULL, 10, 1, 1, '2019-10-09 07:48:44', '2019-10-09 07:48:44'),
(2, 1, '100x10x10', 2.5, 1, 4, '2019-10-09 07:48:45', '2019-10-09 07:48:45'),
(3, 1000, NULL, 5000, 2, 1, '2019-10-09 07:49:04', '2019-10-09 07:49:04'),
(4, 1, NULL, 5, 3, 1, '2019-10-09 07:52:16', '2019-10-09 07:52:16'),
(5, 3, NULL, 30, 3, 2, '2019-10-09 07:52:16', '2019-10-09 07:52:16'),
(6, 1, NULL, 8, 3, 3, '2019-10-09 07:52:16', '2019-10-09 07:52:16'),
(7, 1, '100x100x10', 25, 3, 4, '2019-10-09 07:52:16', '2019-10-09 07:52:16'),
(8, 2, NULL, 10, 4, 1, '2019-10-09 07:54:07', '2019-10-09 07:54:07'),
(9, 2, NULL, 20, 4, 2, '2019-10-09 07:54:07', '2019-10-09 07:54:07'),
(10, 2, NULL, 16, 4, 3, '2019-10-09 07:54:08', '2019-10-09 07:54:08'),
(11, 2, '100x10x10', 5, 4, 4, '2019-10-09 07:54:08', '2019-10-09 07:54:08'),
(12, 2, NULL, 10, 5, 1, '2019-10-09 07:56:39', '2019-10-09 07:56:39'),
(13, 2, NULL, 20, 5, 2, '2019-10-09 07:56:39', '2019-10-09 07:56:39'),
(14, 2, NULL, 16, 5, 3, '2019-10-09 07:56:40', '2019-10-09 07:56:40'),
(15, 1, '100x10x10', 2.5, 5, 4, '2019-10-09 07:56:40', '2019-10-09 07:56:40'),
(16, 2, NULL, 10, 6, 1, '2019-10-09 08:00:05', '2019-10-09 08:00:05'),
(17, 3, NULL, 24, 6, 3, '2019-10-09 08:00:05', '2019-10-09 08:00:05'),
(18, 2, '100x10x10', 5, 6, 4, '2019-10-09 08:00:05', '2019-10-09 08:00:05'),
(19, 2, NULL, 10, 7, 1, '2019-10-09 08:01:31', '2019-10-09 08:01:31'),
(20, 2, NULL, 20, 7, 2, '2019-10-09 08:01:31', '2019-10-09 08:01:31'),
(21, 2, '100x10x10', 5, 7, 3, '2019-10-09 08:01:31', '2019-10-09 08:01:31'),
(22, 2, NULL, 10, 8, 1, '2019-10-09 08:02:10', '2019-10-09 08:02:10'),
(23, 1, '100x10x10', 2.5, 8, 3, '2019-10-09 08:02:10', '2019-10-09 08:02:10'),
(24, 2, NULL, 10, 9, 1, '2019-10-09 08:05:27', '2019-10-09 08:05:27'),
(25, 3, NULL, 15, 10, 1, '2019-10-09 08:32:30', '2019-10-09 08:32:30'),
(26, 2, NULL, 20, 10, 2, '2019-10-09 08:32:30', '2019-10-09 08:32:30'),
(27, 1, '100x10x10', 2.5, 10, 3, '2019-10-09 08:32:30', '2019-10-09 08:32:30'),
(28, 2, '', 10, 12, 1, '2019-10-09 08:36:13', '2019-10-09 08:36:13'),
(29, 2, '', 16, 12, 3, '2019-10-09 08:36:13', '2019-10-09 08:36:13'),
(30, 1, '100x10x10', 2.5, 12, 4, '2019-10-09 08:36:13', '2019-10-09 08:36:13'),
(31, 2, NULL, 10, 13, 1, '2019-10-09 08:37:13', '2019-10-09 08:37:13'),
(32, 2, NULL, 20, 13, 2, '2019-10-09 08:37:13', '2019-10-09 08:37:13'),
(33, 2, '100x10x10', 5, 13, 3, '2019-10-09 08:37:13', '2019-10-09 08:37:13'),
(34, 2, NULL, 10, 14, 1, '2019-10-15 10:51:17', '2019-10-15 10:51:17'),
(35, 2, NULL, 10, 14, 4, '2019-10-15 10:51:17', '2019-10-15 10:51:17');

-- --------------------------------------------------------

--
-- Table structure for table `notakirims`
--

CREATE TABLE `notakirims` (
  `id` int(11) NOT NULL,
  `no_resi` varchar(11) NOT NULL,
  `namapenerima` varchar(45) DEFAULT NULL,
  `alamatpenerima` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `tlppenerima` varchar(45) DEFAULT NULL,
  `jenispembayaran` tinyint(6) NOT NULL,
  `tanggal` date NOT NULL,
  `biaya_kirim` int(11) NOT NULL,
  `tglbrgkt` date DEFAULT NULL,
  `tgltiba` date DEFAULT NULL,
  `nmpenerimabarang` varchar(45) DEFAULT NULL,
  `status` tinyint(6) NOT NULL,
  `karyawan_id` int(11) NOT NULL,
  `pelanggan_id` int(11) NOT NULL,
  `manifest_id` int(11) DEFAULT NULL,
  `jadwalpengiriman_id` int(11) DEFAULT NULL,
  `rute_id` int(11) DEFAULT NULL,
  `tarifkm_id` int(11) DEFAULT NULL,
  `kelurahan_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notakirims`
--

INSERT INTO `notakirims` (`id`, `no_resi`, `namapenerima`, `alamatpenerima`, `tlppenerima`, `jenispembayaran`, `tanggal`, `biaya_kirim`, `tglbrgkt`, `tgltiba`, `nmpenerimabarang`, `status`, `karyawan_id`, `pelanggan_id`, `manifest_id`, `jadwalpengiriman_id`, `rute_id`, `tarifkm_id`, `kelurahan_id`, `created_at`, `updated_at`) VALUES
(1, 'KAEP01', 'Tjia Teddy', 'Jl. Jemursari 908 Surabaya', '0815642528', 1, '2019-10-09', 87500, '2019-10-02', NULL, NULL, 5, 3, 1, 1, NULL, NULL, 3, NULL, '2019-10-09 07:48:44', '2019-11-04 04:16:35'),
(2, 'KAEP02', 'Arman', 'Jl. Krian 123', '0815642528', 1, '2019-10-09', 60000000, NULL, NULL, NULL, 1, 3, 3, 2, NULL, NULL, 8, NULL, '2019-10-09 07:49:04', '2019-10-30 03:27:53'),
(3, 'KAEP03', 'Arman', 'Jl. Demak 654, Kelungkung', '081359851997', 3, '2019-10-09', 612000, NULL, NULL, NULL, 1, 3, 4, 2, NULL, NULL, 5, NULL, '2019-10-09 07:52:16', '2019-11-04 04:06:55'),
(4, 'KAEP04', 'Tjia Teddy', 'Jl. Jemursari 908 Surabaya', '0813579257', 1, '2019-10-09', 459000, NULL, NULL, NULL, 1, 3, 3, 2, NULL, NULL, 5, NULL, '2019-10-09 07:54:07', '2019-11-04 03:49:24'),
(5, 'KAEP05', 'Tjia Teddy', 'Jl. Jemursari 908 Surabaya', '0341562781', 1, '2019-10-09', 291000, NULL, NULL, NULL, 1, 3, 3, 3, NULL, NULL, 2, NULL, '2019-10-09 07:56:39', '2019-11-03 20:13:57'),
(6, 'KAEP06', 'Tjia Teddy', 'Jl. Jemursari 908 Surabaya', '0813579257', 1, '2019-10-09', 312000, NULL, NULL, NULL, 1, 3, 1, 3, NULL, NULL, 4, NULL, '2019-10-09 08:00:05', '2019-11-03 20:23:09'),
(7, 'KAEP07', 'Tjia Teddy', 'Jl. Jemursari 908 Surabaya', '0813579257', 1, '2019-10-09', 210000, NULL, NULL, NULL, 1, 3, 1, 3, NULL, NULL, 2, NULL, '2019-10-09 08:01:31', '2019-10-29 05:29:52'),
(8, 'KAEP08', 'Tjia Teddy', 'Jl. Jemursari 908 Surabaya', '0341562781', 1, '2019-10-09', 62500, NULL, NULL, NULL, 1, 3, 3, 3, NULL, NULL, 1, NULL, '2019-10-09 08:02:10', '2019-10-29 05:29:52'),
(9, 'KAEP09', 'Tjia Teddy', 'Jl. Jemursari 908 Surabaya', '0341562781', 1, '2019-10-09', 50000, NULL, NULL, NULL, 1, 3, 1, 3, NULL, NULL, 1, NULL, '2019-10-09 08:05:27', '2019-10-29 05:29:52'),
(10, 'KAEP10', 'Tjia Teddy', 'Jl. Krian 123', '0815642528', 1, '2019-10-09', 225000, NULL, NULL, NULL, 1, 3, 3, 3, NULL, NULL, 2, NULL, '2019-10-09 08:32:30', '2019-10-29 05:29:52'),
(11, 'KAEP11', 'Tjia Teddy', 'Jl. Jemursari 908 Surabaya', '0341562781', 1, '2019-10-09', 171000, NULL, NULL, NULL, 1, 3, 3, NULL, NULL, NULL, 2, NULL, '2019-10-09 08:35:24', '2019-10-28 06:51:13'),
(12, 'KAEP11', 'Tjia Teddy', 'Jl. Jemursari 908 Surabaya', '0341562781', 1, '2019-10-09', 171000, NULL, NULL, NULL, 1, 3, 3, 3, NULL, NULL, 2, NULL, '2019-10-09 08:36:13', '2019-10-29 05:29:52'),
(13, 'KAEP13', 'Tjia Teddy', 'Jl. Jemursari 908 Surabaya', '081216091996', 1, '2019-10-09', 210000, NULL, NULL, NULL, 1, 3, 3, 3, NULL, NULL, 2, NULL, '2019-10-09 08:37:13', '2019-10-29 05:29:52'),
(14, 'KAEP14', 'Tjia Teddy', 'Jl. Jemursari 908 Surabaya', '0361789654', 1, '2019-10-15', 100000, NULL, NULL, NULL, 1, 3, 4, 4, NULL, NULL, 1, 46, '2019-10-15 10:51:17', '2019-10-30 02:37:52');

-- --------------------------------------------------------

--
-- Table structure for table `notiftracking`
--

CREATE TABLE `notiftracking` (
  `id` int(10) NOT NULL,
  `id_nota` int(10) NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notiftracking`
--

INSERT INTO `notiftracking` (`id`, `id_nota`, `status`, `created_at`, `updated_at`) VALUES
(51, 1, 1, '2019-11-04 04:13:43', '2019-11-04 04:13:43'),
(52, 1, 2, '2019-11-04 04:13:51', '2019-11-04 04:13:51'),
(53, 1, 3, '2019-11-04 04:13:53', '2019-11-04 04:13:53'),
(54, 1, 4, '2019-11-04 04:16:15', '2019-11-04 04:16:15'),
(55, 1, 5, '2019-11-04 04:16:35', '2019-11-04 04:16:35');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggans`
--

CREATE TABLE `pelanggans` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `alamat` varchar(45) NOT NULL,
  `no_tlp` varchar(45) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pelanggans`
--

INSERT INTO `pelanggans` (`id`, `nama`, `alamat`, `no_tlp`, `created_at`, `updated_at`) VALUES
(1, 'Jakyssens', 'Jl. Jemursari 908 Surabaya', '0813579257', NULL, NULL),
(3, 'Moudi', 'Jl. Krian 123', '0341562781', NULL, NULL),
(4, 'Bryan Adams', 'Jl. Banyu Urip 123 Surabaya', '0315426722', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rutes`
--

CREATE TABLE `rutes` (
  `id` int(11) NOT NULL,
  `kecamatan_id` int(10) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `koordinat_x` double NOT NULL,
  `koordinat_y` double NOT NULL,
  `status` tinyint(6) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rutes`
--

INSERT INTO `rutes` (`id`, `kecamatan_id`, `nama`, `koordinat_x`, `koordinat_y`, `status`, `created_at`, `updated_at`) VALUES
(2, 1, 'Tujuan', 112.76747, -7.31657, 1, '2019-10-20 17:08:46', '2019-10-20 18:12:52'),
(3, 6, 'Kantor', 112.75132, -7.31762, 1, '2019-10-20 18:08:42', '2019-10-20 18:13:06'),
(4, 5, 'Petang', 112.69569, -7.28187, 1, '2019-10-28 01:53:22', '2019-10-28 01:53:22'),
(5, 9, 'Rungkut', 112.74347, -7.274, 1, '2019-10-30 02:30:21', '2019-10-30 02:30:21'),
(6, 10, 'Surabaya', 112.73134, -7.23904, 1, '2019-10-30 02:34:47', '2019-10-30 02:34:47');

-- --------------------------------------------------------

--
-- Table structure for table `rute_jadwals`
--

CREATE TABLE `rute_jadwals` (
  `id` int(11) NOT NULL,
  `rute_id` int(11) NOT NULL,
  `jadwalpengiriman_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tarifkms`
--

CREATE TABLE `tarifkms` (
  `id` int(11) NOT NULL,
  `tujuan` varchar(45) NOT NULL,
  `harga` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tarifkms`
--

INSERT INTO `tarifkms` (`id`, `tujuan`, `harga`, `created_at`, `updated_at`) VALUES
(1, 'Kabupaten Badung', 5000, '2019-10-05 08:21:56', '2019-10-05 08:21:56'),
(2, 'Kabupaten Bangli', 6000, '2019-10-05 08:26:08', '2019-10-05 08:26:08'),
(3, 'Kabupaten Buleleng', 7000, '2019-10-05 08:26:28', '2019-10-05 08:26:28'),
(4, 'Kabupaten Gianyar', 8000, '2019-10-05 08:26:57', '2019-10-05 08:26:57'),
(5, 'Kabupaten Jembrana', 9000, '2019-10-05 08:27:10', '2019-10-05 08:27:10'),
(6, 'Kabupaten Karangasem', 10000, '2019-10-05 08:27:31', '2019-10-05 08:27:31'),
(7, 'Kabupaten Klungkung', 11000, '2019-10-05 08:27:47', '2019-10-05 08:27:47'),
(8, 'Kabupaten Tabanan', 12000, '2019-10-05 08:28:03', '2019-10-05 08:28:03'),
(9, 'Kota Denpasar', 13000, '2019-10-05 08:28:45', '2019-10-05 08:28:45'),
(10, 'Rungkut', 10000, '2019-10-16 00:00:00', '2019-10-10 00:00:00'),
(11, 'Surabaya', 10000, '2019-05-18 15:22:09', '2019-06-25 12:40:02');

-- --------------------------------------------------------

--
-- Table structure for table `tracking`
--

CREATE TABLE `tracking` (
  `id` int(10) NOT NULL,
  `id_kurir` int(10) NOT NULL,
  `id_nota` int(10) NOT NULL,
  `y_awal` varchar(100) DEFAULT NULL,
  `x_awal` varchar(100) DEFAULT NULL,
  `y_akhir` varchar(100) NOT NULL,
  `x_akhir` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tracking`
--

INSERT INTO `tracking` (`id`, `id_kurir`, `id_nota`, `y_awal`, `x_awal`, `y_akhir`, `x_akhir`, `created_at`, `updated_at`) VALUES
(6, 6, 5, '112.7756325', '-7.33116252', '-7.274', '112.74347', '2019-11-04 04:21:45', '2019-11-04 04:49:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `status` tinyint(6) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'adielah', 'adielah@gmail.com', '$2y$10$yyN5AiEm3kVV3ghjkXPIbe6yAPaPKerrCxIyA6QmQ4gFIb5LvJgDW', 1, NULL, '2019-10-05 07:58:03', '2019-10-05 07:58:03'),
(5, 'elsaputri', 'elsaputri@gmail.com', '$2y$10$34nRjfs5HVYQx53fijWoiea4PhcSDeMrTsLUv8/4pA4Q.bBtV1FVG', 1, 'xykgLErCBeHDxloV5Cro17Kyq52wUmA9ldO5SU1IJg97Bi5LQMS7gVuxCt1G', '2019-10-05 08:03:54', '2019-10-05 08:03:54'),
(6, 'alfi', 'alfi@gmail.com', '$2y$10$9Pzn7ZhOh6mysbfVXPHRVeIevj8OiR2G0gLfVFlEqhJ0jOmn5Vu5a', 2, 'Yps4vQHAjthZLfKoUBOJR2EMpcGxfUuXHsMdhT7pMVXKsYfn8sGDID025Dnu', '2019-10-05 08:08:29', '2019-10-05 08:08:29'),
(7, 'ziyad', 'ziyad@gmail.com', '$2y$10$CitnaGuRx08ppOBuC/q19useWpodDtDFErczX4SghZEXGbWHe8hwy', 1, NULL, '2019-10-05 08:31:02', '2019-10-05 08:31:02'),
(8, 'hamid', 'hamid@gmail.com', '$2y$10$8tE7RGLOn7J1nlEbh.LwVuz5yghgDdn9O1Gxc03pnhtE/YHHNSn6u', 1, NULL, '2019-10-05 08:32:15', '2019-10-05 08:32:15'),
(9, 'rina', 'rina@gmail.com', '$2y$10$qpZS2jGWvbpx8LjDsKVsi.SWr9sBPZMDRsbWDISIexbxNeTLZOO7m', 1, NULL, '2019-10-05 08:34:34', '2019-10-05 08:34:34'),
(11, 'regina', 'regina@gmail.com', '$2y$10$34nRjfs5HVYQx53fijWoiea4PhcSDeMrTsLUv8/4pA4Q.bBtV1FVG', 1, NULL, '2019-10-05 08:37:47', '2019-10-05 08:37:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barangs`
--
ALTER TABLE `barangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_barangs_jenis1_idx` (`jenis_id`);

--
-- Indexes for table `detailhistorys`
--
ALTER TABLE `detailhistorys`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_detailhistorys_manifests1_idx` (`manifest_id`),
  ADD KEY `fk_detailhistorys_historypengirimans1_idx` (`historypengiriman_id`);

--
-- Indexes for table `historykurir`
--
ALTER TABLE `historykurir`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `historypengirimans`
--
ALTER TABLE `historypengirimans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_historypengirimans_jadwalpengirimans1_idx` (`jadwalpengiriman_id`);

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
  ADD KEY `fk_jadwal_pengirimans_karyawans1_idx` (`karyawan_id_kurir`),
  ADD KEY `fk_jadwal_pengirimans_kendaraans1_idx` (`kendaraan_id`);

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
  ADD KEY `fk_karyawans_users1_idx` (`user_id`),
  ADD KEY `fk_karyawans_jabatans1_idx` (`jabatan_id`);

--
-- Indexes for table `kecamatans`
--
ALTER TABLE `kecamatans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_kecamatans_tarifkms1_idx` (`tarifkm_id`);

--
-- Indexes for table `kelurahans`
--
ALTER TABLE `kelurahans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_kelurahans_kecamatans1_idx` (`kecamatan_id`);

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
  ADD KEY `fk_manifests_karyawans1_idx` (`karyawan_id`),
  ADD KEY `fk_manifests_karyawans2_idx` (`karyawan_id_sopir`),
  ADD KEY `fk_manifests_karyawans3_idx` (`karyawan_id_penerima`),
  ADD KEY `fk_manifests_kendaraans1_idx` (`kendaraan_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notakirimbarangs`
--
ALTER TABLE `notakirimbarangs`
  ADD PRIMARY KEY (`id`,`barang_id`,`notakirim_id`),
  ADD KEY `fk_notakirimbarangs_nota_kirims1_idx` (`notakirim_id`),
  ADD KEY `fk_notakirimbarangs_barangs1_idx` (`barang_id`);

--
-- Indexes for table `notakirims`
--
ALTER TABLE `notakirims`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_nota_kirims_manifests1_idx` (`manifest_id`),
  ADD KEY `fk_nota_kirims_pengirims1_idx` (`pelanggan_id`),
  ADD KEY `fk_nota_kirims_jadwal_pengirimans1_idx` (`jadwalpengiriman_id`),
  ADD KEY `fk_nota_kirims_tarifkms1_idx` (`tarifkm_id`),
  ADD KEY `fk_nota_kirims_rutes1_idx` (`rute_id`),
  ADD KEY `fk_nota_kirims_wilayahs1_idx` (`kelurahan_id`),
  ADD KEY `fk_notakirims_karyawans1_idx` (`karyawan_id`);

--
-- Indexes for table `notiftracking`
--
ALTER TABLE `notiftracking`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`,`rute_id`,`jadwalpengiriman_id`),
  ADD KEY `fk_rute_has_jadwal_pengiriman_jadwal_pengiriman1_idx` (`jadwalpengiriman_id`),
  ADD KEY `fk_rute_has_jadwal_pengiriman_rute1_idx` (`rute_id`);

--
-- Indexes for table `tarifkms`
--
ALTER TABLE `tarifkms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tracking`
--
ALTER TABLE `tracking`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_nota` (`id_nota`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barangs`
--
ALTER TABLE `barangs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `detailhistorys`
--
ALTER TABLE `detailhistorys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `historykurir`
--
ALTER TABLE `historykurir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `historypengirimans`
--
ALTER TABLE `historypengirimans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `jabatans`
--
ALTER TABLE `jabatans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jadwalpengirimans`
--
ALTER TABLE `jadwalpengirimans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `karyawans`
--
ALTER TABLE `karyawans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kecamatans`
--
ALTER TABLE `kecamatans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `kelurahans`
--
ALTER TABLE `kelurahans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `kendaraans`
--
ALTER TABLE `kendaraans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `manifests`
--
ALTER TABLE `manifests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notakirimbarangs`
--
ALTER TABLE `notakirimbarangs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `notakirims`
--
ALTER TABLE `notakirims`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `notiftracking`
--
ALTER TABLE `notiftracking`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `pelanggans`
--
ALTER TABLE `pelanggans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rutes`
--
ALTER TABLE `rutes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tracking`
--
ALTER TABLE `tracking`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barangs`
--
ALTER TABLE `barangs`
  ADD CONSTRAINT `fk_barangs_jenis1` FOREIGN KEY (`jenis_id`) REFERENCES `jenis` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `detailhistorys`
--
ALTER TABLE `detailhistorys`
  ADD CONSTRAINT `fk_detailhistorys_historypengirimans1` FOREIGN KEY (`historypengiriman_id`) REFERENCES `historypengirimans` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_detailhistorys_manifests1` FOREIGN KEY (`manifest_id`) REFERENCES `manifests` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `historypengirimans`
--
ALTER TABLE `historypengirimans`
  ADD CONSTRAINT `fk_historypengirimans_jadwalpengirimans1` FOREIGN KEY (`jadwalpengiriman_id`) REFERENCES `jadwalpengirimans` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `jadwalpengirimans`
--
ALTER TABLE `jadwalpengirimans`
  ADD CONSTRAINT `fk_jadwal_pengirimans_karyawans1` FOREIGN KEY (`karyawan_id_kurir`) REFERENCES `karyawans` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_jadwal_pengirimans_kendaraans1` FOREIGN KEY (`kendaraan_id`) REFERENCES `kendaraans` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `karyawans`
--
ALTER TABLE `karyawans`
  ADD CONSTRAINT `fk_karyawans_jabatans1` FOREIGN KEY (`jabatan_id`) REFERENCES `jabatans` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_karyawans_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `kecamatans`
--
ALTER TABLE `kecamatans`
  ADD CONSTRAINT `fk_kecamatans_tarifkms1` FOREIGN KEY (`tarifkm_id`) REFERENCES `tarifkms` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `kelurahans`
--
ALTER TABLE `kelurahans`
  ADD CONSTRAINT `fk_kelurahans_kecamatans1` FOREIGN KEY (`kecamatan_id`) REFERENCES `kecamatans` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `manifests`
--
ALTER TABLE `manifests`
  ADD CONSTRAINT `fk_manifests_karyawans1` FOREIGN KEY (`karyawan_id`) REFERENCES `karyawans` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_manifests_karyawans2` FOREIGN KEY (`karyawan_id_sopir`) REFERENCES `karyawans` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_manifests_karyawans3` FOREIGN KEY (`karyawan_id_penerima`) REFERENCES `karyawans` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_manifests_kendaraans1` FOREIGN KEY (`kendaraan_id`) REFERENCES `kendaraans` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `notakirimbarangs`
--
ALTER TABLE `notakirimbarangs`
  ADD CONSTRAINT `fk_notakirimbarangs_barangs1` FOREIGN KEY (`barang_id`) REFERENCES `barangs` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_notakirimbarangs_nota_kirims1` FOREIGN KEY (`notakirim_id`) REFERENCES `notakirims` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `notakirims`
--
ALTER TABLE `notakirims`
  ADD CONSTRAINT `fk_nota_kirims_jadwal_pengirimans1` FOREIGN KEY (`jadwalpengiriman_id`) REFERENCES `jadwalpengirimans` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_nota_kirims_manifests1` FOREIGN KEY (`manifest_id`) REFERENCES `manifests` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_nota_kirims_pengirims1` FOREIGN KEY (`pelanggan_id`) REFERENCES `pelanggans` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_nota_kirims_rutes1` FOREIGN KEY (`rute_id`) REFERENCES `rutes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_nota_kirims_tarifkms1` FOREIGN KEY (`tarifkm_id`) REFERENCES `tarifkms` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_nota_kirims_wilayahs1` FOREIGN KEY (`kelurahan_id`) REFERENCES `kelurahans` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_notakirims_karyawans1` FOREIGN KEY (`karyawan_id`) REFERENCES `karyawans` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `rute_jadwals`
--
ALTER TABLE `rute_jadwals`
  ADD CONSTRAINT `fk_rute_has_jadwal_pengiriman_jadwal_pengiriman1` FOREIGN KEY (`jadwalpengiriman_id`) REFERENCES `jadwalpengirimans` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_rute_has_jadwal_pengiriman_rute1` FOREIGN KEY (`rute_id`) REFERENCES `rutes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
