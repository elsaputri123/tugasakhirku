-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 22, 2019 at 03:54 AM
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
-- Database: `elsa`
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
(4, 'Sapu', 5, 'pax', 4, '2019-10-05 09:00:19', '2019-10-05 09:00:19'),
(5, 'Lemari', NULL, 'pcs', 1, '2019-11-21 15:04:47', '2019-11-21 15:04:47'),
(6, 'Lemari', NULL, 'pcs', 1, '2019-11-21 15:05:19', '2019-11-21 15:05:19'),
(7, 'Beras Merah', NULL, 'krg', 1, '2019-11-21 15:07:07', '2019-11-21 15:07:07');

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
(18, 6, 1, '2019-11-04', '2019-11-03 21:16:15', '2019-11-03 21:16:15'),
(19, 6, 1, '2019-11-22', '2019-11-21 17:40:20', '2019-11-21 17:40:20');

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
(9, 'Rungkut', 11),
(11, 'Sukolilo', 11);

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
(99, 'Kutuh', 80652, 8),
(100, 'Kali Rungkut', 60293, 9),
(101, 'Penjaringan Sari', 60297, 9),
(102, 'Wonorejo', 60296, 9),
(109, 'Medokan Ayu', 60295, 9),
(111, 'Kedung Baruk', 60298, 9),
(112, 'Keputih', 60111, 11),
(113, 'Klampis Ngasem', 60117, 11),
(114, 'Medokan Semampir', 60119, 11),
(115, 'Semolowaru', 60119, 11);

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
  `status` tinyint(1) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `manifests`
--

INSERT INTO `manifests` (`id`, `no_manifest`, `tanggal`, `kendaraan_id`, `karyawan_id`, `karyawan_id_sopir`, `karyawan_id_penerima`, `status`, `created_at`, `updated_at`) VALUES
(1, 'MKAEP01', '2019-11-22', 4, 3, 5, NULL, 2, '2019-11-22 00:12:26', '2019-11-22 00:40:06'),
(2, 'MKAEP02', '2019-11-22', 3, 3, 5, NULL, 2, '2019-11-22 09:44:18', '2019-11-22 09:44:26');

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
  `berat` double DEFAULT NULL,
  `notakirim_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notakirimbarangs`
--

INSERT INTO `notakirimbarangs` (`id`, `jumlah`, `dimensi`, `totdimensi`, `berat`, `notakirim_id`, `barang_id`, `created_at`, `updated_at`) VALUES
(1, 2, NULL, 30, 15, 1, 1, '2019-11-21 15:04:48', '2019-11-21 15:04:48'),
(2, 2, NULL, 30, 15, 2, 1, '2019-11-21 15:05:19', '2019-11-21 15:05:19'),
(3, 1, '100x10x100', 25, NULL, 2, 6, '2019-11-21 15:05:19', '2019-11-21 15:05:19'),
(4, 100, NULL, 500, 5, 2, 3, '2019-11-21 15:05:19', '2019-11-21 15:05:19'),
(5, 100, NULL, 500, 5, 1, 1, '2019-11-21 15:07:07', '2019-11-21 15:07:07'),
(6, 1, '100x10x100', 25, NULL, 1, 5, '2019-11-21 15:07:07', '2019-11-21 15:07:07'),
(7, 2, NULL, 50, 25, 1, 7, '2019-11-21 15:07:07', '2019-11-21 15:07:07'),
(8, 2, NULL, 20, 10, 2, 2, '2019-11-21 15:19:56', '2019-11-21 15:19:56'),
(9, 10, NULL, 100, 10, 3, 7, '2019-11-21 23:54:53', '2019-11-21 23:54:53'),
(10, 10, NULL, 400, 40, 4, 7, '2019-11-22 09:39:41', '2019-11-22 09:39:41'),
(11, 10, NULL, 50, 5, 4, 4, '2019-11-22 09:39:41', '2019-11-22 09:39:41');

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
  `tarifkm_id` int(11) DEFAULT NULL,
  `kecamatan_id` int(11) DEFAULT NULL,
  `awal` int(10) NOT NULL,
  `akhir` int(10) NOT NULL,
  `jarak` double NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notakirims`
--

INSERT INTO `notakirims` (`id`, `no_resi`, `namapenerima`, `alamatpenerima`, `tlppenerima`, `jenispembayaran`, `tanggal`, `biaya_kirim`, `tglbrgkt`, `tgltiba`, `nmpenerimabarang`, `status`, `karyawan_id`, `pelanggan_id`, `manifest_id`, `jadwalpengiriman_id`, `tarifkm_id`, `kecamatan_id`, `awal`, `akhir`, `jarak`, `created_at`, `updated_at`) VALUES
(1, 'KAEP01', 'Tjia Teddy Irwantho', 'Jl. Raya Kali Rungkut blok M no 98', '08155006766', 1, '2019-11-21', 5750000, NULL, NULL, NULL, 5, 3, 1, 1, NULL, 11, 9, 0, 0, 0, '2019-11-21 15:07:07', '2019-11-22 08:38:39'),
(2, 'KAEP02', 'Arman Maulana', 'Jl. Konig Utara no 54', '0897262121621', 1, '2019-11-21', 200000, NULL, NULL, NULL, 3, 3, 3, 1, NULL, 11, 11, 0, 0, 85, '2019-11-21 15:19:56', '2019-11-22 00:40:06'),
(3, 'KAEP03', 'Benar saja benar iya', 'Jl. Madean nomor 40', '23423', 1, '2019-11-21', 600000, NULL, NULL, NULL, 3, 3, 3, 1, NULL, 2, 6, 0, 0, 5, '2019-11-21 23:54:53', '2019-11-22 00:40:06'),
(4, 'KAEP04', 'Partidan', 'Jl. Arif Rahman Hakim No 40', '243242', 1, '2019-11-22', 4500000, NULL, NULL, NULL, 3, 3, 4, 2, NULL, 11, 11, 6, 8, 85, '2019-11-22 09:39:41', '2019-11-22 09:44:26');

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
(55, 1, 5, '2019-11-04 04:16:35', '2019-11-04 04:16:35'),
(56, 1, 6, '2019-11-17 10:30:26', '2019-11-17 10:30:26'),
(57, 1, 2, '2019-11-19 15:44:20', '2019-11-19 15:44:20'),
(58, 2, 2, '2019-11-19 15:49:38', '2019-11-19 15:49:38'),
(59, 3, 2, '2019-11-19 15:49:38', '2019-11-19 15:49:38'),
(60, 4, 2, '2019-11-19 15:49:38', '2019-11-19 15:49:38'),
(61, 2, 3, '2019-11-19 15:52:39', '2019-11-19 15:52:39'),
(62, 3, 3, '2019-11-19 15:52:39', '2019-11-19 15:52:39'),
(63, 4, 3, '2019-11-19 15:52:39', '2019-11-19 15:52:39'),
(64, 1, 2, '2019-11-22 00:12:35', '2019-11-22 00:12:35'),
(65, 2, 2, '2019-11-22 00:12:35', '2019-11-22 00:12:35'),
(66, 3, 2, '2019-11-22 00:12:35', '2019-11-22 00:12:35'),
(67, 1, 3, '2019-11-22 00:40:06', '2019-11-22 00:40:06'),
(68, 2, 3, '2019-11-22 00:40:06', '2019-11-22 00:40:06'),
(69, 3, 3, '2019-11-22 00:40:06', '2019-11-22 00:40:06'),
(70, 1, 4, '2019-11-22 00:40:20', '2019-11-22 00:40:20'),
(71, 1, 5, '2019-11-22 00:40:25', '2019-11-22 00:40:25'),
(72, 1, 5, '2019-11-22 08:38:39', '2019-11-22 08:38:39'),
(73, 4, 2, '2019-11-22 09:44:22', '2019-11-22 09:44:22'),
(74, 4, 3, '2019-11-22 09:44:26', '2019-11-22 09:44:26');

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
(1, 'Jakyssens Wibowo', 'Jl. Jemursari 908 Surabaya', '0813579257', NULL, '2019-11-21 14:25:42'),
(3, 'Moudi Alifianita', 'Jl. Krian 123 Surabaya', '0341562781', NULL, '2019-11-21 14:25:50'),
(4, 'Bryan Adams', 'Jl. Banyu Urip 123 Surabaya', '0315426722', NULL, NULL),
(5, 'Alan Aprianto', 'Jl. Demak 708 Surabaya', '08192821922', '2019-11-21 14:26:25', '2019-11-21 14:26:25'),
(6, 'Jonathan Gyzbert', 'Jl. Klampis Barat no 125 Surabaya', '08192837673', '2019-11-21 14:27:52', '2019-11-21 14:27:52');

-- --------------------------------------------------------

--
-- Table structure for table `rutes`
--

CREATE TABLE `rutes` (
  `id` int(11) NOT NULL,
  `kecamatan_id` int(10) NOT NULL,
  `jenis` varchar(1) NOT NULL,
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

INSERT INTO `rutes` (`id`, `kecamatan_id`, `jenis`, `nama`, `koordinat_x`, `koordinat_y`, `status`, `created_at`, `updated_at`) VALUES
(2, 1, '', 'Tujuan', 112.76747, -7.31657, 1, '2019-10-20 17:08:46', '2019-10-20 18:12:52'),
(3, 6, '', 'Kantor', 112.75132, -7.31762, 1, '2019-10-20 18:08:42', '2019-10-20 18:13:06'),
(4, 5, '', 'Petang', 112.69569, -7.28187, 1, '2019-10-28 01:53:22', '2019-10-28 01:53:22'),
(5, 9, '', 'Rungkut', 112.74347, -7.274, 1, '2019-10-30 02:30:21', '2019-10-30 02:30:21'),
(6, 10, '', 'Surabaya', 112.73134, -7.23904, 1, '2019-10-30 02:34:47', '2019-10-30 02:34:47'),
(7, 11, '1', 'Sukolilo', 112.06553, -6.90497, 1, '2019-11-21 14:40:27', '2019-11-22 09:26:43'),
(8, 11, '2', 'Jl. Arif Rahman Hakim', 112.77526, -7.2897, 1, '2019-11-22 06:37:51', '2019-11-22 09:26:33');

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
(6, 6, 5, '112.75377151', '-7.35047494', '-7.274', '112.74347', '2019-11-04 04:21:45', '2019-11-22 08:45:48');

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
(5, 'elsaputri', 'elsaputri@gmail.com', '$2y$10$34nRjfs5HVYQx53fijWoiea4PhcSDeMrTsLUv8/4pA4Q.bBtV1FVG', 1, 'wCTmWcc4Zaojuc9f4MEZP84pApHUL48CtDyOTKCwvkYcFQOqh6BKL0NG2E7y', '2019-10-05 08:03:54', '2019-10-05 08:03:54'),
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
  ADD KEY `fk_nota_kirims_wilayahs1_idx` (`kecamatan_id`),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `detailhistorys`
--
ALTER TABLE `detailhistorys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `historykurir`
--
ALTER TABLE `historykurir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `kelurahans`
--
ALTER TABLE `kelurahans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `kendaraans`
--
ALTER TABLE `kendaraans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `manifests`
--
ALTER TABLE `manifests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notakirimbarangs`
--
ALTER TABLE `notakirimbarangs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `notakirims`
--
ALTER TABLE `notakirims`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notiftracking`
--
ALTER TABLE `notiftracking`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `pelanggans`
--
ALTER TABLE `pelanggans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rutes`
--
ALTER TABLE `rutes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tracking`
--
ALTER TABLE `tracking`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

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
-- Constraints for table `historypengirimans`
--
ALTER TABLE `historypengirimans`
  ADD CONSTRAINT `fk_historypengirimans_jadwalpengirimans1` FOREIGN KEY (`jadwalpengiriman_id`) REFERENCES `jadwalpengirimans` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
