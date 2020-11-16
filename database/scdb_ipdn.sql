-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2020 at 11:01 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scdb_ipdn`
--

-- --------------------------------------------------------

--
-- Table structure for table `output_sas`
--

CREATE TABLE `output_sas` (
  `No` int(11) NOT NULL,
  `kode_satker` varchar(50) DEFAULT NULL,
  `id_b` varchar(50) DEFAULT NULL,
  `id_c` varchar(50) DEFAULT NULL,
  `pagu` bigint(20) DEFAULT NULL,
  `realisasi` bigint(20) DEFAULT NULL,
  `ket` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Table structure for table `out_pok`
--

CREATE TABLE `out_pok` (
  `id` int(11) NOT NULL,
  `id_u` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `pagu` bigint(20) NOT NULL,
  `realisasi` bigint(20) NOT NULL,
  `kembali` bigint(20) NOT NULL,
  `tgl` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `tbl_pelatihan`
--

CREATE TABLE `tbl_pelatihan` (
  `id_pelatihan` int(11) NOT NULL,
  `nama_pelatihan` varchar(100) NOT NULL,
  `tanggal_pelatihan` date NOT NULL,
  `jumlah_jam` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pns`
--

CREATE TABLE `tbl_pns` (
  `no` int(50) NOT NULL,
  `nip` int(50) NOT NULL,
  `nama_lengkap` varchar(500) NOT NULL,
  `bagian` varchar(500) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_urut_pangkat` int(11) NOT NULL,
  `pangkat` varchar(100) NOT NULL,
  `gol_ruang` varchar(500) NOT NULL,
  `tmt_pangkat` date NOT NULL,
  `jabatan` varchar(500) NOT NULL,
  `tmt_jabatan` date NOT NULL,
  `jurusan` varchar(500) NOT NULL,
  `nama_pt` varchar(500) NOT NULL,
  `tahun_lulus` int(100) NOT NULL,
  `tingkat_pendidikan` varchar(100) NOT NULL,
  `usia` int(100) NOT NULL,
  `masa_kerja` int(100) NOT NULL,
  `catatan_mutasi` varchar(500) NOT NULL,
  `no_kapreg` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

CREATE TABLE `tbl_role` (
  `id_role` int(150) NOT NULL,
  `role_name` varchar(150) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_role`
--

INSERT INTO `tbl_role` (`id_role`, `role_name`, `keterangan`) VALUES
(1, 'Admin', 'Hak Akses Full Aplikasi'),

-- --------------------------------------------------------

--
-- Table structure for table `tbl_satker`
--

CREATE TABLE `tbl_satker` (
  `id_satker` int(11) NOT NULL,
  `kode_satker` varchar(150) NOT NULL,
  `nama_satker` varchar(150) NOT NULL,
  `alias` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_satker_biro`
--

CREATE TABLE `tbl_satker_biro` (
  `id_satker_biro` int(11) NOT NULL,
  `kode_satker_biro` varchar(150) NOT NULL,
  `nama_satker_biro` varchar(150) NOT NULL,
  `alias` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Table structure for table `tbl_span`
--

CREATE TABLE `tbl_span` (
  `id_span` int(11) NOT NULL,
  `kode_satker` varchar(150) NOT NULL,
  `nama_satker` varchar(150) NOT NULL,
  `pagu_bp` bigint(150) NOT NULL,
  `realisasi_bp` bigint(150) NOT NULL,
  `persentase_bp` varchar(150) NOT NULL,
  `pagu_bb` bigint(150) NOT NULL,
  `realisasi_bb` bigint(150) NOT NULL,
  `persentase_bb` varchar(150) NOT NULL,
  `pagu_bm` bigint(150) NOT NULL,
  `realisasi_bm` bigint(150) NOT NULL,
  `persentase_bm` varchar(150) NOT NULL,
  `pagu_t` bigint(150) NOT NULL,
  `realisasi_t` bigint(150) NOT NULL,
  `persentase_t` varchar(150) NOT NULL,
  `sisa` bigint(150) NOT NULL,
  `created_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `tbl_span_biro`
--

CREATE TABLE `tbl_span_biro` (
  `id_span_biro` int(11) NOT NULL,
  `kode_satker_biro` varchar(150) NOT NULL,
  `nama_satker_biro` varchar(150) NOT NULL,
  `pagu_bp` varchar(150) NOT NULL,
  `realisasi_bp` bigint(150) NOT NULL,
  `persentase_bp` varchar(150) NOT NULL,
  `pagu_bb` bigint(150) NOT NULL,
  `realisasi_bb` bigint(150) NOT NULL,
  `persentase_bb` varchar(150) NOT NULL,
  `pagu_bm` bigint(150) NOT NULL,
  `realisasi_bm` bigint(150) NOT NULL,
  `persentase_bm` varchar(150) NOT NULL,
  `pagu_t` bigint(150) NOT NULL,
  `realisasi_t` bigint(150) NOT NULL,
  `persentase_t` varchar(150) NOT NULL,
  `sisa` varchar(150) NOT NULL,
  `created_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `tbl_thl`
--

CREATE TABLE `tbl_thl` (
  `id_thl` int(11) NOT NULL,
  `nama` varchar(500) NOT NULL,
  `tempat_lahir` varchar(500) NOT NULL,
  `tanggal_lahir` varchar(500) NOT NULL,
  `penugasan` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id_user` int(150) NOT NULL,
  `nip` varchar(150) NOT NULL,
  `nama_user` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `role` varchar(150) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `unit_pok`
--

CREATE TABLE `unit_pok` (
  `id_b` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `unit_sas`
--

CREATE TABLE `unit_sas` (
  `id` int(11) NOT NULL,
  `kode_satker` varchar(50) NOT NULL,
  `id_c` varchar(50) NOT NULL,
  `id_b` varchar(50) NOT NULL,
  `ket` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `output_sas`
--
ALTER TABLE `output_sas`
  ADD PRIMARY KEY (`No`);

--
-- Indexes for table `out_pok`
--
ALTER TABLE `out_pok`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pelatihan`
--
ALTER TABLE `tbl_pelatihan`
  ADD PRIMARY KEY (`id_pelatihan`);

--
-- Indexes for table `tbl_pns`
--
ALTER TABLE `tbl_pns`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `tbl_satker`
--
ALTER TABLE `tbl_satker`
  ADD PRIMARY KEY (`id_satker`);

--
-- Indexes for table `tbl_satker_biro`
--
ALTER TABLE `tbl_satker_biro`
  ADD PRIMARY KEY (`id_satker_biro`);

--
-- Indexes for table `tbl_span`
--
ALTER TABLE `tbl_span`
  ADD PRIMARY KEY (`id_span`);

--
-- Indexes for table `tbl_span_biro`
--
ALTER TABLE `tbl_span_biro`
  ADD PRIMARY KEY (`id_span_biro`);

--
-- Indexes for table `tbl_thl`
--
ALTER TABLE `tbl_thl`
  ADD PRIMARY KEY (`id_thl`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `unit_pok`
--
ALTER TABLE `unit_pok`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit_sas`
--
ALTER TABLE `unit_sas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `output_sas`
--
ALTER TABLE `output_sas`
  MODIFY `No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `out_pok`
--
ALTER TABLE `out_pok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=345;

--
-- AUTO_INCREMENT for table `tbl_pelatihan`
--
ALTER TABLE `tbl_pelatihan`
  MODIFY `id_pelatihan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `id_role` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_satker`
--
ALTER TABLE `tbl_satker`
  MODIFY `id_satker` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_satker_biro`
--
ALTER TABLE `tbl_satker_biro`
  MODIFY `id_satker_biro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_span`
--
ALTER TABLE `tbl_span`
  MODIFY `id_span` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_span_biro`
--
ALTER TABLE `tbl_span_biro`
  MODIFY `id_span_biro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_thl`
--
ALTER TABLE `tbl_thl`
  MODIFY `id_thl` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id_user` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `unit_sas`
--
ALTER TABLE `unit_sas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
