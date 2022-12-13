-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2022 at 06:47 AM
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
-- Database: `sijitu_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `angket_d001`
--

CREATE TABLE `angket_d001` (
  `id` int(10) NOT NULL,
  `kdangket` int(10) DEFAULT NULL,
  `kduser` varchar(50) DEFAULT NULL,
  `kdprodi` varchar(5) DEFAULT NULL,
  `p1` int(1) NOT NULL,
  `p2` int(1) DEFAULT NULL,
  `p3` int(1) DEFAULT NULL,
  `p4` int(1) DEFAULT NULL,
  `p5` int(1) DEFAULT NULL,
  `p6` int(1) DEFAULT NULL,
  `p7` int(1) DEFAULT NULL,
  `p8` int(1) DEFAULT NULL,
  `p9` int(1) DEFAULT NULL,
  `p10` int(1) DEFAULT NULL,
  `p11` int(1) DEFAULT NULL,
  `p12` int(1) DEFAULT NULL,
  `p13` int(1) DEFAULT NULL,
  `p14` int(1) DEFAULT NULL,
  `p15` int(1) DEFAULT NULL,
  `k1` text DEFAULT NULL,
  `create_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `angket_d001`
--

INSERT INTO `angket_d001` (`id`, `kdangket`, `kduser`, `kdprodi`, `p1`, `p2`, `p3`, `p4`, `p5`, `p6`, `p7`, `p8`, `p9`, `p10`, `p11`, `p12`, `p13`, `p14`, `p15`, `k1`, `create_at`) VALUES
(1, 1, '1', '2', 1, 3, 3, 4, 3, 1, 2, 3, 3, 2, 3, 3, 3, 2, 2, 'wex', '2022-12-05'),
(4, 1, '14', '41', 3, 1, 3, 1, 4, 2, 2, 2, 1, 1, 2, 2, 2, 1, 2, 's', '2022-12-02');

-- --------------------------------------------------------

--
-- Table structure for table `angket_d002`
--

CREATE TABLE `angket_d002` (
  `id` int(10) NOT NULL,
  `kdangket` int(10) DEFAULT NULL,
  `kduser` varchar(50) DEFAULT NULL,
  `kdprodi` varchar(5) DEFAULT NULL,
  `p1` int(1) DEFAULT NULL,
  `p2` int(1) DEFAULT NULL,
  `p3` int(1) DEFAULT NULL,
  `p4` int(1) DEFAULT NULL,
  `p5` int(1) DEFAULT NULL,
  `p6` int(1) DEFAULT NULL,
  `p7` int(1) DEFAULT NULL,
  `p8` int(1) DEFAULT NULL,
  `p9` int(1) DEFAULT NULL,
  `p10` int(1) DEFAULT NULL,
  `p11` int(1) DEFAULT NULL,
  `p12` int(1) DEFAULT NULL,
  `p13` int(1) DEFAULT NULL,
  `p14` int(1) DEFAULT NULL,
  `p15` int(1) DEFAULT NULL,
  `p16` int(1) DEFAULT NULL,
  `p17` int(1) DEFAULT NULL,
  `p18` int(1) DEFAULT NULL,
  `k1` text DEFAULT NULL,
  `create_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `angket_d002`
--

INSERT INTO `angket_d002` (`id`, `kdangket`, `kduser`, `kdprodi`, `p1`, `p2`, `p3`, `p4`, `p5`, `p6`, `p7`, `p8`, `p9`, `p10`, `p11`, `p12`, `p13`, `p14`, `p15`, `p16`, `p17`, `p18`, `k1`, `create_at`) VALUES
(3, 1, '1', '2', 4, 3, 2, 1, 2, 2, 4, 2, 2, 4, 2, 3, 2, 1, 3, 1, 3, 4, 'cccd', '2022-12-05'),
(4, 1, '45', '55', 3, 4, 2, 1, 2, 2, 4, 1, 2, 4, 3, 3, 2, 4, 2, 4, 3, 1, 'ddddddddd', '2022-12-02');

-- --------------------------------------------------------

--
-- Table structure for table `angket_d003`
--

CREATE TABLE `angket_d003` (
  `id` int(10) NOT NULL,
  `kdangket` int(10) DEFAULT NULL,
  `kduser` varchar(50) DEFAULT NULL,
  `kdprodi` varchar(5) DEFAULT NULL,
  `p1` int(1) DEFAULT NULL,
  `p2` int(1) DEFAULT NULL,
  `p3` int(1) DEFAULT NULL,
  `p4` int(1) DEFAULT NULL,
  `p5` int(1) DEFAULT NULL,
  `p6` int(1) DEFAULT NULL,
  `p7` int(1) DEFAULT NULL,
  `p8` int(1) DEFAULT NULL,
  `p9` int(1) DEFAULT NULL,
  `create_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `angket_d003`
--

INSERT INTO `angket_d003` (`id`, `kdangket`, `kduser`, `kdprodi`, `p1`, `p2`, `p3`, `p4`, `p5`, `p6`, `p7`, `p8`, `p9`, `create_at`) VALUES
(1, 1, '1', '2', 3, 2, 1, 3, 2, 2, 4, 4, 4, '2022-12-05');

-- --------------------------------------------------------

--
-- Table structure for table `angket_m001`
--

CREATE TABLE `angket_m001` (
  `id` int(10) NOT NULL,
  `kdangket` int(10) DEFAULT NULL,
  `kduser` varchar(50) DEFAULT NULL,
  `kdprodi` varchar(5) DEFAULT NULL,
  `p1` int(1) DEFAULT NULL,
  `p2` int(1) DEFAULT NULL,
  `p3` int(1) DEFAULT NULL,
  `p4` int(1) DEFAULT NULL,
  `p5` int(1) DEFAULT NULL,
  `p6` int(1) DEFAULT NULL,
  `p7` int(1) DEFAULT NULL,
  `p8` int(1) DEFAULT NULL,
  `p9` int(1) DEFAULT NULL,
  `p10` int(1) DEFAULT NULL,
  `p11` int(1) DEFAULT NULL,
  `p12` int(1) DEFAULT NULL,
  `p13` int(1) DEFAULT NULL,
  `p14` int(1) DEFAULT NULL,
  `p15` int(1) DEFAULT NULL,
  `p16` int(1) DEFAULT NULL,
  `p17` int(1) DEFAULT NULL,
  `p18` int(1) DEFAULT NULL,
  `p19` int(1) DEFAULT NULL,
  `p20` int(1) DEFAULT NULL,
  `p21` int(1) DEFAULT NULL,
  `p22` int(1) DEFAULT NULL,
  `p23` int(1) DEFAULT NULL,
  `k1` text DEFAULT NULL,
  `create_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `angket_m001`
--

INSERT INTO `angket_m001` (`id`, `kdangket`, `kduser`, `kdprodi`, `p1`, `p2`, `p3`, `p4`, `p5`, `p6`, `p7`, `p8`, `p9`, `p10`, `p11`, `p12`, `p13`, `p14`, `p15`, `p16`, `p17`, `p18`, `p19`, `p20`, `p21`, `p22`, `p23`, `k1`, `create_at`) VALUES
(7, 1, '1', '2', 1, 1, 1, 1, 3, 2, 2, 2, 2, 2, 3, 3, 3, 1, 2, 2, 2, 3, 1, 3, 2, 3, 1, 'ggggdd', '2022-12-05 09:11:52'),
(10, 1, '43', '2', 1, 2, 2, 4, 2, 3, 2, 4, 2, 3, 2, 2, 1, 2, 3, 2, 2, 2, 2, 2, 2, 3, 4, 'fs', '2022-12-05 08:47:10'),
(11, 1, '48', '2', 1, 2, 2, 2, 2, 3, 1, 3, 3, 2, 3, 3, 2, 1, 2, 2, 4, 1, 4, 2, 4, 2, 1, 'tt', '2022-12-05 08:49:33'),
(12, 1, '90', '2', 3, 2, 2, 3, 4, 1, 1, 2, 1, 2, 2, 4, 1, 1, 4, 2, 2, 2, 2, 3, 4, 3, 3, 'dfs', '2022-12-05 09:09:55');

-- --------------------------------------------------------

--
-- Table structure for table `angket_m002`
--

CREATE TABLE `angket_m002` (
  `id` int(10) NOT NULL,
  `kdangket` int(10) DEFAULT NULL,
  `kduser` varchar(50) DEFAULT NULL,
  `kdprodi` varchar(5) DEFAULT NULL,
  `p1` int(1) DEFAULT NULL,
  `p2` int(1) DEFAULT NULL,
  `p3` int(1) DEFAULT NULL,
  `p4` int(1) DEFAULT NULL,
  `p5` int(1) DEFAULT NULL,
  `p6` int(1) DEFAULT NULL,
  `p7` int(1) DEFAULT NULL,
  `p7a` int(1) DEFAULT NULL,
  `p8` int(1) DEFAULT NULL,
  `p9` int(1) DEFAULT NULL,
  `p10` int(1) DEFAULT NULL,
  `p11` int(1) DEFAULT NULL,
  `p12` int(1) DEFAULT NULL,
  `p13` int(1) DEFAULT NULL,
  `p14` int(1) DEFAULT NULL,
  `p15` int(1) DEFAULT NULL,
  `k1` text DEFAULT NULL,
  `create_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `angket_m002`
--

INSERT INTO `angket_m002` (`id`, `kdangket`, `kduser`, `kdprodi`, `p1`, `p2`, `p3`, `p4`, `p5`, `p6`, `p7`, `p7a`, `p8`, `p9`, `p10`, `p11`, `p12`, `p13`, `p14`, `p15`, `k1`, `create_at`) VALUES
(12, 1, '1', '2', 3, 2, 2, 2, 2, 2, 2, 2, 3, 3, 4, 3, 3, 3, 3, 4, 'asdf', '2022-12-05'),
(16, 1, '55', '51', 4, 4, 3, 4, 4, 4, 4, 1, 3, 3, 1, 3, 3, 1, 2, 3, 'ttttttttttt', '2022-12-02'),
(17, 1, '14', '2', 4, 2, 1, 3, 1, 3, 4, 3, 3, 2, 3, 2, 2, 2, 3, 2, 'ff', '2022-12-05');

-- --------------------------------------------------------

--
-- Table structure for table `angket_m003`
--

CREATE TABLE `angket_m003` (
  `id` int(10) NOT NULL,
  `kdangket` int(10) DEFAULT NULL,
  `kduser` varchar(50) DEFAULT NULL,
  `kdprodi` varchar(5) DEFAULT NULL,
  `p1` int(1) DEFAULT NULL,
  `p2` int(1) DEFAULT NULL,
  `p3` int(1) DEFAULT NULL,
  `p4` int(1) DEFAULT NULL,
  `p5` int(1) DEFAULT NULL,
  `p6` int(1) DEFAULT NULL,
  `p7` int(1) DEFAULT NULL,
  `p8` int(1) DEFAULT NULL,
  `p9` int(1) DEFAULT NULL,
  `p10` int(1) DEFAULT NULL,
  `p11` int(1) DEFAULT NULL,
  `p12` int(1) DEFAULT NULL,
  `p13` int(1) DEFAULT NULL,
  `p14` int(1) DEFAULT NULL,
  `p15` int(1) DEFAULT NULL,
  `p16` int(1) DEFAULT NULL,
  `p17` int(1) DEFAULT NULL,
  `p18` int(1) DEFAULT NULL,
  `p19` int(1) DEFAULT NULL,
  `p20` int(1) DEFAULT NULL,
  `p21` int(1) DEFAULT NULL,
  `p22` int(1) DEFAULT NULL,
  `p23` int(1) DEFAULT NULL,
  `p24` int(1) DEFAULT NULL,
  `p25` int(1) DEFAULT NULL,
  `p26` int(1) DEFAULT NULL,
  `p27` int(1) DEFAULT NULL,
  `p28` int(1) DEFAULT NULL,
  `p29` int(1) DEFAULT NULL,
  `p30` int(1) DEFAULT NULL,
  `p31` int(1) DEFAULT NULL,
  `p32` int(1) DEFAULT NULL,
  `p33` int(1) DEFAULT NULL,
  `p34` int(1) DEFAULT NULL,
  `k1` text DEFAULT NULL,
  `k2` text DEFAULT NULL,
  `create_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `angket_m003`
--

INSERT INTO `angket_m003` (`id`, `kdangket`, `kduser`, `kdprodi`, `p1`, `p2`, `p3`, `p4`, `p5`, `p6`, `p7`, `p8`, `p9`, `p10`, `p11`, `p12`, `p13`, `p14`, `p15`, `p16`, `p17`, `p18`, `p19`, `p20`, `p21`, `p22`, `p23`, `p24`, `p25`, `p26`, `p27`, `p28`, `p29`, `p30`, `p31`, `p32`, `p33`, `p34`, `k1`, `k2`, `create_at`) VALUES
(13, 1, '1', '2', 4, 2, 3, 4, 2, 2, 2, 3, 2, 2, 2, 2, 2, 2, 2, 1, 4, 3, 3, 4, 2, 2, 1, 2, 4, 3, 2, 2, 2, 1, 3, 1, 4, 4, 'dsssi', 'dda', '2022-12-02'),
(14, 1, '14', '2', 4, 2, 2, 3, 2, 2, 2, 2, 2, 3, 3, 2, 2, 3, 2, 3, 1, 1, 3, 4, 2, 4, 2, 3, 4, 4, 1, 3, 3, 2, 4, 1, 1, 4, 'ad', 'aaa', '2022-12-05');

-- --------------------------------------------------------

--
-- Table structure for table `angket_m004`
--

CREATE TABLE `angket_m004` (
  `id` int(10) NOT NULL,
  `kdangket` int(10) DEFAULT NULL,
  `kduser` varchar(50) DEFAULT NULL,
  `kdprodi` varchar(5) DEFAULT NULL,
  `p1` int(1) DEFAULT NULL,
  `p2` int(1) DEFAULT NULL,
  `p3` int(1) DEFAULT NULL,
  `p4` int(1) DEFAULT NULL,
  `p5` int(1) DEFAULT NULL,
  `p6` int(1) DEFAULT NULL,
  `p7` int(1) DEFAULT NULL,
  `p8` int(1) DEFAULT NULL,
  `p9` int(1) DEFAULT NULL,
  `p10` int(1) DEFAULT NULL,
  `p11` int(1) DEFAULT NULL,
  `p12` int(1) DEFAULT NULL,
  `p13` int(1) DEFAULT NULL,
  `p14` int(1) DEFAULT NULL,
  `p15` int(1) DEFAULT NULL,
  `p16` int(1) DEFAULT NULL,
  `p17` int(1) DEFAULT NULL,
  `p18` int(1) DEFAULT NULL,
  `k1` text DEFAULT NULL,
  `create_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `angket_m004`
--

INSERT INTO `angket_m004` (`id`, `kdangket`, `kduser`, `kdprodi`, `p1`, `p2`, `p3`, `p4`, `p5`, `p6`, `p7`, `p8`, `p9`, `p10`, `p11`, `p12`, `p13`, `p14`, `p15`, `p16`, `p17`, `p18`, `k1`, `create_at`) VALUES
(13, 1, '16670007', '2', 4, 2, 2, 4, 1, 2, 2, 4, 4, 2, 3, 4, 1, 2, 3, 4, 1, 1, 'ANAM', '2022-12-05'),
(21, 1, '123', '34', 2, 3, 2, 3, 2, 3, 2, 2, 2, 2, 2, 2, 2, 3, 3, 2, 4, 2, 'a', '2022-12-02'),
(22, 1, '791b38ba447f7ec0972469df54c52c5b018aa231', '2', 2, 2, 3, 3, 2, 3, 3, 2, 3, 1, 2, 1, 1, 4, 2, 2, 2, 2, 'ggg', '2022-12-02');

-- --------------------------------------------------------

--
-- Table structure for table `angket_master`
--

CREATE TABLE `angket_master` (
  `kdangket` varchar(10) NOT NULL,
  `nmangket` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `angket_master`
--

INSERT INTO `angket_master` (`kdangket`, `nmangket`) VALUES
('M001', 'Angket kepuasan terhadap pembelajaran'),
('M002', 'Angket Kepuasan Mahasiswa terhadap Layanan Administrasi Akademik'),
('M003', 'Angket Kepuasan Mahasiswa Terhadap Kinerja Dosen');

-- --------------------------------------------------------

--
-- Table structure for table `angket_periode`
--

CREATE TABLE `angket_periode` (
  `kdper` int(10) NOT NULL,
  `kdangket` varchar(10) DEFAULT NULL,
  `target` varchar(10) DEFAULT NULL,
  `judul` varchar(50) DEFAULT NULL,
  `aktif` int(1) DEFAULT NULL,
  `tglstart` date DEFAULT NULL,
  `tglend` date DEFAULT NULL,
  `tahun` year(4) DEFAULT NULL,
  `kdsemester` varchar(5) DEFAULT NULL,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `angket_periode`
--

INSERT INTO `angket_periode` (`kdper`, `kdangket`, `target`, `judul`, `aktif`, `tglstart`, `tglend`, `tahun`, `kdsemester`, `create_at`, `update_at`) VALUES
(1, 'M001', 'mhs', 'Angket kepuasan terhadap pembelajaran', 1, '2022-11-18', '2022-11-19', 2022, 'R122', '2022-11-18 15:52:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `angket_t001`
--

CREATE TABLE `angket_t001` (
  `id` int(10) NOT NULL,
  `kdangket` int(10) DEFAULT NULL,
  `kduser` varchar(50) DEFAULT NULL,
  `kdprodi` varchar(5) DEFAULT NULL,
  `p1` int(1) DEFAULT NULL,
  `p2` int(1) DEFAULT NULL,
  `p3` int(1) DEFAULT NULL,
  `p4` int(1) DEFAULT NULL,
  `p5` int(1) DEFAULT NULL,
  `p6` int(1) DEFAULT NULL,
  `p7` int(1) DEFAULT NULL,
  `p8` int(1) DEFAULT NULL,
  `p9` int(1) DEFAULT NULL,
  `p10` int(1) DEFAULT NULL,
  `p11` int(1) DEFAULT NULL,
  `p12` int(1) DEFAULT NULL,
  `p13` int(1) DEFAULT NULL,
  `p14` int(1) DEFAULT NULL,
  `p15` int(1) DEFAULT NULL,
  `k1` text DEFAULT NULL,
  `create_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `angket_t001`
--

INSERT INTO `angket_t001` (`id`, `kdangket`, `kduser`, `kdprodi`, `p1`, `p2`, `p3`, `p4`, `p5`, `p6`, `p7`, `p8`, `p9`, `p10`, `p11`, `p12`, `p13`, `p14`, `p15`, `k1`, `create_at`) VALUES
(1, 1, '1', '2', 4, 3, 3, 3, 2, 1, 2, 4, 1, 2, 3, 2, 2, 1, 1, 'kksax', '2022-12-05'),
(3, 1, '87', '2', 4, 2, 2, 1, 4, 3, 2, 2, 4, 2, 1, 4, 2, 3, 1, 'j', '2022-12-05');

-- --------------------------------------------------------

--
-- Table structure for table `angket_t002`
--

CREATE TABLE `angket_t002` (
  `id` int(10) NOT NULL,
  `kdangket` int(10) DEFAULT NULL,
  `kduser` varchar(50) NOT NULL,
  `kdprodi` varchar(5) NOT NULL,
  `p1` int(1) NOT NULL,
  `p2` int(1) NOT NULL,
  `p3` int(1) NOT NULL,
  `p4` int(1) NOT NULL,
  `p5` int(1) NOT NULL,
  `p6` int(1) NOT NULL,
  `p7` int(1) NOT NULL,
  `p8` int(1) NOT NULL,
  `p9` int(1) NOT NULL,
  `create_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `angket_t002`
--

INSERT INTO `angket_t002` (`id`, `kdangket`, `kduser`, `kdprodi`, `p1`, `p2`, `p3`, `p4`, `p5`, `p6`, `p7`, `p8`, `p9`, `create_at`) VALUES
(1, 1, '1', '2', 3, 2, 3, 2, 4, 4, 2, 3, 3, '2022-12-05');

-- --------------------------------------------------------

--
-- Table structure for table `fakultas`
--

CREATE TABLE `fakultas` (
  `kdfak` varchar(2) NOT NULL,
  `nmfak` varchar(100) NOT NULL,
  `nmsingkat` varchar(100) DEFAULT NULL,
  `nmdekan` varchar(250) DEFAULT NULL,
  `jenisid` varchar(5) DEFAULT NULL,
  `nppdekan` varchar(250) DEFAULT NULL,
  `foto` varchar(200) DEFAULT NULL,
  `aktiffak` enum('Y','N') DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fakultas`
--

INSERT INTO `fakultas` (`kdfak`, `nmfak`, `nmsingkat`, `nmdekan`, `jenisid`, `nppdekan`, `foto`, `aktiffak`, `username`, `password`, `level`) VALUES
('1', 'Ilmu Pendidikan', 'FIP', 'Siti Fitriana, S.Pd., M.Pd.Kons', 'NIDN', '088201204', 'pp_default.jpg', 'Y', 'fip', '8cb2237d0679ca88db6464eac60da96345513964', 'fakultas'),
('2', 'Pendidikan Ilmu Pengetahuan Sosial dan Keolahragaan', 'FPIPSKR', 'Dr. Agus Sutono, S.Fil., M.Phil.\r\n', 'NIDN', '0601017807', 'pp_default.jpg', 'Y', 'fpipskr', '8cb2237d0679ca88db6464eac60da96345513964', 'fakultas'),
('3', 'Pendidikan Matematika, Ilmu Pengetahuan Alam dan Teknologi Informasi', 'FPMIPATI', 'Supandi, S.Si., M.Si.', 'NIDN', '097401245', 'pp_default.jpg', 'Y', 'fpmipati', '8cb2237d0679ca88db6464eac60da96345513964', 'fakultas'),
('4', 'Pendidikan Bahasa dan Seni', 'FPBS', 'Dr. Asropah, M.Pd.\r\n', 'NIDN', '0609026601', 'pp_default.jpg', 'Y', 'fpbs', '6367c48dd193d56ea7b0baad25b19455e529f5ee', 'fakultas'),
('5', 'Pascasarjana', 'PPS', 'Dr. Ngasbun Egar, M.Pd.\r\n', 'NIDN', '0613046701', 'pp_default.jpg', 'Y', 'pps', '8cb2237d0679ca88db6464eac60da96345513964', 'fakultas'),
('6', 'Teknik dan Informatika', 'FTI', 'Dr. Slamet Supriyadi, M.Env.St\r\n', 'NIDN', '0028125901', 'pp_default.jpg', 'Y', 'fti', '8cb2237d0679ca88db6464eac60da96345513964', 'fakultas'),
('7', 'Hukum', 'FH', 'Dr. Sapto Budoyo, S.H., M.H', 'NIDN', '0628047001', 'pp_default.jpg', 'Y', 'fh', '8cb2237d0679ca88db6464eac60da96345513964', 'fakultas'),
('8', 'Ekonomi dan Bisnis', 'FE', 'Dr. Ir. Efriyani Sumastuti, MP', 'NIDN', '0603046501', 'pp_default.jpg', 'Y', 'fe', '8cb2237d0679ca88db6464eac60da96345513964', 'fakultas'),
('9', 'Fakultas Khusus', 'FK', NULL, NULL, NULL, 'pp_default.jpg', 'N', 'fk', '8cb2237d0679ca88db6464eac60da96345513964', 'fakultas');

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `kdprodi` varchar(5) NOT NULL,
  `kdfak` varchar(2) NOT NULL,
  `spada_kat` varchar(5) DEFAULT NULL,
  `nmprodi` varchar(50) DEFAULT NULL,
  `nmsingkat` varchar(25) DEFAULT NULL,
  `kaprodi` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `username2` varbinary(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `foto` varchar(200) DEFAULT NULL,
  `aktifpro` enum('Y','N') DEFAULT NULL,
  `level` varchar(100) DEFAULT NULL,
  `kdforlap` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`kdprodi`, `kdfak`, `spada_kat`, `nmprodi`, `nmsingkat`, `kaprodi`, `username`, `username2`, `password`, `foto`, `aktifpro`, `level`, `kdforlap`) VALUES
('11', '1', '11', 'Bimbingan dan Konseling', 'BK', 'Heri Saptadi Ismanto, S.Pd., M.Pd., Kons.', 'bk', 0x73656b6a75725f707062, '8cb2237d0679ca88db6464eac60da96345513964', 'pp_default.jpg', 'Y', 'prodi', '86201'),
('12', '1', '12', 'Pendidikan Guru Sekolah Dasar', 'PGSD', 'Sukamto, S.Pd., M.Pd.\r\n', 'pgsd', 0x73656b6a75725f70677364, '8cb2237d0679ca88db6464eac60da96345513964', 'pp_default.jpg', 'Y', 'prodi', '86206'),
('15', '1', '13', 'Pendidikan Guru Pendidikan Anak Usia Dini', 'PGPAUD', 'Dr. Anita Chandra Dewi S, M.Pd.\r\n', 'pgpaud', 0x73656b6a75725f706770617564, '8cb2237d0679ca88db6464eac60da96345513964', 'pp_default.jpg', 'Y', 'prodi', '86207'),
('21', '2', '14', 'Pendidikan Pancasila dan Kewarganegaraan', 'PPKN', 'Rahmat Sudrajat, S.Pd., M.Pd\r\n', 'ppkn', 0x73656b6a75725f706b6e, '8cb2237d0679ca88db6464eac60da96345513964', 'pp_default.jpg', 'Y', 'prodi', '87205'),
('22', '2', '15', 'Pendidikan Ekonomi', 'P.EKONOMI', 'Novika Wahyuhastuti , SE.,M.Si.\r\n', 'pekonomi', 0x73656b6a75725f656b6f, '8cb2237d0679ca88db6464eac60da96345513964', 'pp_default.jpg', 'Y', 'prodi', '87203'),
('23', '2', '16', 'Pendidikan Jasmani, Kesehatan dan Rekreasi', 'PJKR', 'Galih Dwi Pradipta, S.Pd., M.Or.\r\n', 'pjkr', 0x73656b6a75725f706a6b72, '8cb2237d0679ca88db6464eac60da96345513964', 'pp_default.jpg', 'Y', 'prodi', '85201'),
('31', '3', '17', 'Pendidikan Matematika', 'MTK', 'Dr. Lilik Ariyanto, S.Pd., M.Pd.\r\n', 'mtk', 0x73656b6a75725f6d746b, '8cb2237d0679ca88db6464eac60da96345513964', 'pp_default.jpg', 'Y', 'prodi', '84202'),
('32', '3', '18', 'Pendidikan Biologi', 'BIOLOGI', 'M. Anas Dzakiy, S.Si., M.Sc.\r\n', 'p.biologi', 0x73656b6a75725f7062, '8cb2237d0679ca88db6464eac60da96345513964', 'pp_default.jpg', 'Y', 'prodi', '84205'),
('33', '3', '19', 'Pendidikan Fisika', 'FISIKA', 'Joko Saefan, S.Si.,M.Sc\r\n', 'fisika', 0x73656b6a75725f7066, '8cb2237d0679ca88db6464eac60da96345513964', 'pp_default.jpg', 'Y', 'prodi', '84203'),
('34', '3', '20', 'Pendidikan Teknologi Informasi', 'PTI', 'Wijayanto, S.T., M.Kom.\r\n', 'pti', 0x73656b6a75725f707469, '8605a5189c8239e8e040e2fc5e3c727c4eed41ce', 'pp_default.jpg', 'Y', 'prodi', '83207'),
('41', '4', '21', 'Pendidikan Bahasa dan Sastra Indonesia', 'PBSI', 'Eva Ardiana Indrariani, S.S., M.Hm.\r\n', 'pbsi', 0x73656b6a75725f70627369, 'c80919308daf46e1e82e5c0472b1248e21752278', 'pp_default.jpg', 'Y', 'prodi', '88201'),
('42', '4', '22', 'Pendidikan Bahasa Inggris', 'PBI', 'Dr. Jafar Sodiq, S.Pd., M.Pd.', 'pbi', 0x73656b6a75725f706269, '8cb2237d0679ca88db6464eac60da96345513964', 'pp_default.jpg', 'Y', 'prodi', '88203'),
('43', '4', '23', 'Pendidikan Bahasa dan Sastra Daerah', 'PBSJ', 'Alfiah, S.Pd., M.Pd.', 'pbsj', 0x73656b6a75725f70626a, '8cb2237d0679ca88db6464eac60da96345513964', 'pp_default.jpg', 'Y', 'prodi', '88202'),
('51', '5', '24', 'Manajemen Pendidikan', 'MP', 'Dr. Ngurah Ayu N.M.,M.Pd.\r\n', 'mp', 0x73656b6a75725f6d70, '8cb2237d0679ca88db6464eac60da96345513964', 'pp_default.jpg', 'Y', 'prodi', '86104'),
('52', '5', '25', 'Pendidikan Bahasa dan Sastra Indonesia - S2', 'PBSI S-2', 'Dr. Harjito, M.Hum', 'pbsis2', 0x73656b6a75725f706273697332, '8cb2237d0679ca88db6464eac60da96345513964', 'pp_default.jpg', 'Y', 'prodi', '88101'),
('53', '5', NULL, 'Pendidikan Profesi Guru', 'PPG', 'Dr. Listyaning, S.M.Hum.', 'ppg', 0x73656b6a75725f707067, '8cb2237d0679ca88db6464eac60da96345513964', 'pp_default.jpg', 'Y', 'prodi', '86904'),
('54', '5', '34', 'Pendidikan Bahasa Inggris', 'PBI-S2', 'Siti Nuraini, S.Pd., M.Hum., Ph.D.', 'pbis2', 0x73656b6a75725f7062697332, '8cb2237d0679ca88db6464eac60da96345513964', 'pp_default.jpg', 'Y', 'prodi', '88103'),
('55', '5', '36', 'Pendidikan IPA', 'PIPA', 'Dr. Fenny Roshayanti, S.Pd., M.Pd.', 'ipa', 0x73656b6a75725f697061, '8cb2237d0679ca88db6464eac60da96345513964', 'pp_default.jpg', 'Y', 'prodi', '84101'),
('56', '5', '35', 'Pendidikan Dasar', 'DIKDAS', 'Dr. Sumarno, S.Pd., M.Pd.', 'dikdas', 0x73656b6a75725f64696b646173, '8cb2237d0679ca88db6464eac60da96345513964', 'pp_default.jpg', 'Y', 'prodi', '86122'),
('60', '6', '26', 'Arsitektur', 'ARS', 'Baju Arie Wibawa, S.T., M.T.\r\n', 'ars', 0x73656b6a75725f6172736974656b, 'bcdbfc894037c9d1998572d8a08174148ebec2c2', 'pp_default.jpg', 'Y', 'prodi', '23201'),
('61', '6', NULL, 'Teknik Sipil - DIII', 'SIPIL D-3', 'Ir. Wilarso Hermanto, MT', 'sipild-3', NULL, '8cb2237d0679ca88db6464eac60da96345513964', 'pp_default.jpg', 'N', 'prodi', '22401'),
('62', '6', NULL, 'Teknik Mesin - DIII', 'MESIN D-3', 'Drs. Carsoni, S.T., M.T', 'mesind-3', NULL, '8cb2237d0679ca88db6464eac60da96345513964', 'pp_default.jpg', 'N', 'prodi', '21401'),
('63', '6', NULL, 'Teknik Elektronika - DIII', 'ELEKTRO D-3', 'Margono, S.T., M. Eng', 'elektrod-3', NULL, '8cb2237d0679ca88db6464eac60da96345513964', 'pp_default.jpg', 'N', 'prodi', '20401'),
('64', '6', '27', 'Teknik Sipil', 'SIPIL', 'Agung Kristiawan, S.T., M.T.\r\n', 'sipil', 0x73656b6a75725f747331, '8cb2237d0679ca88db6464eac60da96345513964', 'pp_default.jpg', 'Y', 'prodi', '22201'),
('65', '6', '28', 'Teknik Mesin', 'MESIN', 'Aan Burhanuddin, S.T.,M.T', 'mesin', 0x73656b6a75725f746d31, '01dbd2bb1a978230d1bbd7b92edadcfa874e342f', 'pp_default.jpg', 'Y', 'prodi', '21201'),
('66', '6', '29', 'Teknik Elektro', 'ELEKTRO', 'Margono, S.T., M. Eng', 'elektro', 0x73656b6a75725f746531, '4287bc560c0b1449be6da960fef9f00841e4304d', 'pp_default.jpg', 'Y', 'prodi', '20201'),
('67', '6', '30', 'Informatika', 'INFORMATIKA', 'Bambang Agus Herlambang, S.Kom., M.Kom.\r\n', 'informatika', 0x73656b6a75725f7469, '7c061283e37248ba6ba9ee1eb1ee9943c52877c6', 'pp_default.jpg', 'Y', 'prodi', '55201'),
('68', '6', NULL, 'Teknik Lingkungan', NULL, '-', NULL, NULL, '8cb2237d0679ca88db6464eac60da96345513964', 'pp_default.jpg', 'N', 'prodi', '25201'),
('69', '6', '31', 'Teknologi Pangan', 'TEKPANG', 'Fafa Nurdyansyah, S.TP., M.Sc.', 'tekpang', 0x73656b6a75725f7470, '8cb2237d0679ca88db6464eac60da96345513964', 'pp_default.jpg', 'Y', 'prodi', '41221'),
('71', '7', '32', 'Hukum', 'HUKUM', 'Dr. Haryono, S.H., M.H.\r\n', 'hukum', 0x73656b6a75725f68756b756d, '8cb2237d0679ca88db6464eac60da96345513964', 'pp_default.jpg', 'Y', 'prodi', '74201'),
('81', '8', '33', 'Manajemen', 'MANAJEMEN', 'Ika Indriasari, S.E., Akt., M.Si\r\n', 'manajemen', 0x73656b6a75725f6d6a, 'c5ae77c7ad129b048d6e973d408266ba4d1c5b96', 'pp_default.jpg', 'Y', 'prodi', '61201'),
('82', '8', '45', 'Bisnis Digital', 'BISDIG', 'Ika Menarianti, S.Kom., M.Kom', 'bisdig', 0x73656b6a75725f6264, '18addf5db407470303aa608ffbe7d7da85664640', 'pp_default.jpg', 'Y', 'prodi', '61201'),
('99', '9', NULL, 'Program Studi Khusus', 'P.KHUSUS', NULL, 'psk', 0x73656b6a75725f6c706d, '8cb2237d0679ca88db6464eac60da96345513964', 'pp_default.jpg', 'N', 'prodi', '55555');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `kdsemester` varchar(4) NOT NULL,
  `kode` int(5) DEFAULT NULL,
  `deskripsi` varchar(32) DEFAULT NULL,
  `aktif` enum('Y','N') DEFAULT 'N',
  `used` enum('Y','N') DEFAULT 'N',
  `allow_konversi` enum('Y','N') DEFAULT 'N',
  `opennilai` enum('Y','N') DEFAULT 'N',
  `notif_opennilai` text DEFAULT NULL,
  `openkhs` enum('Y','N') DEFAULT 'N',
  `notif_openkhs` text DEFAULT NULL,
  `no_skb` varchar(100) DEFAULT NULL,
  `tgl_skb` date DEFAULT NULL,
  `pjb_skb` varchar(100) DEFAULT NULL,
  `npp_skb` varchar(100) DEFAULT NULL,
  `ttd_skb` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`kdsemester`, `kode`, `deskripsi`, `aktif`, `used`, `allow_konversi`, `opennilai`, `notif_opennilai`, `openkhs`, `notif_openkhs`, `no_skb`, `tgl_skb`, `pjb_skb`, `npp_skb`, `ttd_skb`) VALUES
('P120', NULL, 'Remidi Gasal tahun 2020/2021', 'N', 'N', 'N', 'N', NULL, 'N', NULL, NULL, NULL, NULL, NULL, NULL),
('R114', NULL, 'Gasal tahun 2014/2015', 'N', 'N', 'N', 'N', NULL, 'N', NULL, NULL, NULL, NULL, NULL, NULL),
('R115', NULL, 'Gasal tahun 2015/2016', 'N', 'N', 'N', 'N', NULL, 'N', NULL, NULL, NULL, NULL, NULL, NULL),
('R116', NULL, 'Gasal tahun 2016/2017', 'N', 'N', 'N', 'N', NULL, 'N', NULL, NULL, NULL, NULL, NULL, NULL),
('R117', NULL, 'Gasal tahun 2017/2018', 'N', 'N', 'N', 'N', NULL, 'N', NULL, NULL, NULL, NULL, NULL, NULL),
('R118', 20181, 'Gasal tahun 2018/2019', 'Y', 'N', 'N', 'N', NULL, 'N', NULL, NULL, NULL, NULL, NULL, NULL),
('R119', 20191, 'Gasal tahun 2019/2020', 'Y', 'N', 'N', 'N', NULL, 'N', NULL, NULL, NULL, NULL, NULL, NULL),
('R120', 20201, 'Gasal tahun 2020/2021', 'Y', 'N', 'N', 'N', NULL, 'N', NULL, NULL, NULL, NULL, NULL, NULL),
('R121', 20211, 'Gasal tahun 2021/2022', 'Y', 'N', 'Y', 'N', NULL, 'Y', 'Kartu Hasil Studi akan dibuka pada hari senin, 24 januari 2022 pukul 09:00 WIB.', NULL, NULL, NULL, NULL, NULL),
('R122', 20221, 'Gasal tahun 2022/2023', 'Y', 'Y', 'N', 'N', NULL, 'N', 'Kartu Hasil Studi akan dibuka setelah masa perkuliahan selesai.', '010/SK.WR1/UPGRIS/IX/2022', '2022-09-01', 'Dr. Muniroh Munawar, S.Pi., M.Pd.', '097901230', 'ttd_wr1.png'),
('R214', NULL, 'Genap tahun 2014/2015', 'N', 'N', 'N', 'N', NULL, 'N', NULL, NULL, NULL, NULL, NULL, NULL),
('R215', NULL, 'Genap tahun 2015/2016', 'N', 'N', 'N', 'N', NULL, 'N', NULL, NULL, NULL, NULL, NULL, NULL),
('R216', NULL, 'Genap tahun 2016/2017', 'N', 'N', 'N', 'N', NULL, 'N', NULL, NULL, NULL, NULL, NULL, NULL),
('R217', NULL, 'Genap tahun 2017/2018', 'N', 'N', 'N', 'N', NULL, 'N', NULL, NULL, NULL, NULL, NULL, NULL),
('R218', 20182, 'Genap tahun 2018/2019', 'Y', 'N', 'N', 'N', NULL, 'N', NULL, NULL, NULL, NULL, NULL, NULL),
('R219', 20192, 'Genap tahun 2019/2020', 'Y', 'N', 'N', 'N', NULL, 'N', NULL, NULL, NULL, NULL, NULL, NULL),
('R220', 20202, 'Genap tahun 2020/2021', 'Y', 'N', 'N', 'N', NULL, 'N', NULL, NULL, NULL, NULL, NULL, NULL),
('R221', 20212, 'Genap tahun 2021/2022', 'Y', 'N', 'Y', 'N', NULL, 'N', NULL, '005/SK.WR1/UPGRIS/II/2022', '2022-02-04', 'Dr. Muniroh Munawar, S.Pi., M.Pd.', '097901230', 'ttd_wr1.png');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `idsetting` int(10) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `laplogo` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `pbackdoor_mhs` varchar(255) DEFAULT NULL,
  `pbackdoor_dsn` varchar(255) DEFAULT NULL,
  `pbackdoor_prodi` varchar(255) DEFAULT NULL,
  `pbackdoor_fak` varchar(255) DEFAULT NULL,
  `pbackdoor_mitra` varchar(255) DEFAULT NULL,
  `dpp` int(3) DEFAULT NULL,
  `lembaga` varchar(255) DEFAULT NULL,
  `nm_pt` varchar(50) DEFAULT NULL,
  `alamat_pt` varchar(200) DEFAULT NULL,
  `telp_pt` varchar(50) DEFAULT NULL,
  `mail_pt` varchar(50) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `keywords` text DEFAULT NULL,
  `author` varchar(100) DEFAULT NULL,
  `lap_alamat` varchar(250) DEFAULT NULL,
  `lap_kontak` varchar(250) DEFAULT NULL,
  `lap_kota` varchar(50) DEFAULT NULL,
  `lap_tgl` date DEFAULT NULL,
  `lap_jab1` varchar(100) DEFAULT NULL,
  `lap_jab2` varchar(100) DEFAULT NULL,
  `lap_nmjab1` varchar(100) DEFAULT NULL,
  `lap_nmjab2` varchar(100) DEFAULT NULL,
  `api_key` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`idsetting`, `icon`, `logo`, `laplogo`, `title`, `pbackdoor_mhs`, `pbackdoor_dsn`, `pbackdoor_prodi`, `pbackdoor_fak`, `pbackdoor_mitra`, `dpp`, `lembaga`, `nm_pt`, `alamat_pt`, `telp_pt`, `mail_pt`, `description`, `keywords`, `author`, `lap_alamat`, `lap_kontak`, `lap_kota`, `lap_tgl`, `lap_jab1`, `lap_jab2`, `lap_nmjab1`, `lap_nmjab2`, `api_key`) VALUES
(1, 'sistem_icon.png', 'sistem_logo.png', 'sistem_laplogo.jpg', 'Si Mekar - UPGRIS', 'c5a075f2e5126d16264d743ce482d093e619e4f3', 'a55f789b0907ef0060f273105f759a6c86d0ef44', 'b7eb23e83e10bbfd47d697e46501cf519e91fc0a', '05ec50d783d74335d3aebfcc53586c771becc2b5', '483b36753fcca10798ab1dadf98f344a5cda2323', 20, 'UPTTIK - Unit Pelaksana Teknis Teknologi Informasi dan Komunikasi', 'Universitas PGRI Semarang', 'Jl. Sidodadi Timur Nomor 24 - Dr. Cipto Semarang - indonesia', '(024) 8316377, 8448217', 'upgris@upgris.ac.id', 'Si Mekar adalah Sistem Informasi merdeka belajar yang digunakan sebagai ISS (Institutional Support System) oleh Universitas PGRI Semarang. Sistem ini dikembangkan untuk memfasilitasi mahasiswa dalam memaksimalkan study di era merdeka belajar.', 'upgris, iss, merdeka belajar, mbkm, universitas pgri semarang, sistem informasi, simekar, sistem informasi akademik, spada, kuliah, pendaftaran mahasiswa baru, indonesia mengajar, magang, penelitian, wirausaha, program kemanusiaan.', 'UPTTIK', 'Jl. Sidodadi Timur No. 24 - Dr. Cipto Semarang, Jawa Tengah - Indonesia', 'Telp. (024)8316377, Fax. 8448217, Email: upgris@upgris.ac.id, Homepage: www.upgris.ac.id', 'Semarang', NULL, 'Rektor', 'Wakil Rektor II', 'Dr. Sri Suciati, M.Hum.', 'Dr. Enda Rita S.D., S.Si., M.Si.', '067f606ecb823cd884fc7aad018e584d323efc82');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` varchar(50) NOT NULL,
  `nama_user` varchar(80) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` enum('1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_user`, `username`, `password`, `level`) VALUES
('1bb95c89-6bc0-11ed-a4ab-f8b46a8b068c', 'anam', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `angket_d001`
--
ALTER TABLE `angket_d001`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `angket_d002`
--
ALTER TABLE `angket_d002`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `angket_d003`
--
ALTER TABLE `angket_d003`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `angket_m001`
--
ALTER TABLE `angket_m001`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `angket_m002`
--
ALTER TABLE `angket_m002`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `angket_m003`
--
ALTER TABLE `angket_m003`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `angket_m004`
--
ALTER TABLE `angket_m004`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `angket_master`
--
ALTER TABLE `angket_master`
  ADD PRIMARY KEY (`kdangket`);

--
-- Indexes for table `angket_periode`
--
ALTER TABLE `angket_periode`
  ADD PRIMARY KEY (`kdper`);

--
-- Indexes for table `angket_t001`
--
ALTER TABLE `angket_t001`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `angket_t002`
--
ALTER TABLE `angket_t002`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`kdfak`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`kdprodi`) USING BTREE,
  ADD KEY `kdfak` (`kdfak`) USING BTREE;

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`kdsemester`) USING BTREE;

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`idsetting`) USING BTREE;

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `angket_d001`
--
ALTER TABLE `angket_d001`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `angket_d002`
--
ALTER TABLE `angket_d002`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `angket_d003`
--
ALTER TABLE `angket_d003`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `angket_m001`
--
ALTER TABLE `angket_m001`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `angket_m002`
--
ALTER TABLE `angket_m002`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `angket_m003`
--
ALTER TABLE `angket_m003`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `angket_m004`
--
ALTER TABLE `angket_m004`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `angket_periode`
--
ALTER TABLE `angket_periode`
  MODIFY `kdper` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `angket_t001`
--
ALTER TABLE `angket_t001`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `angket_t002`
--
ALTER TABLE `angket_t002`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `idsetting` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `prodi`
--
ALTER TABLE `prodi`
  ADD CONSTRAINT `prodi_ibfk_1` FOREIGN KEY (`kdfak`) REFERENCES `fakultas` (`kdfak`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
