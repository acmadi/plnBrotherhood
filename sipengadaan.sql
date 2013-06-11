-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 11, 2013 at 06:01 PM
-- Server version: 5.1.44
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sipengadaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE IF NOT EXISTS `anggota` (
  `username` varchar(20) NOT NULL,
  `NIP` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `kode_panitia` varchar(10) NOT NULL,
  PRIMARY KEY (`username`),
  UNIQUE KEY `NIP` (`NIP`,`email`),
  KEY `kode_panitia` (`kode_panitia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`username`, `NIP`, `email`, `kode_panitia`) VALUES
('gilanglaksana', '123456786', 'gilang@gmail.com', 'A'),
('haniferidaputra', '123456788', 'he.23292@gmail.com', 'A'),
('irvanaditya', '123456785', 'irvan@gmail.com', 'B'),
('johannesridho', '123456787', 'johan@gmail.com', 'B'),
('kevinindra', '123456784', 'kevin@gmail.com', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `berita_acara_evaluasi_penawaran`
--

CREATE TABLE IF NOT EXISTS `berita_acara_evaluasi_penawaran` (
  `id_dokumen` bigint(32) NOT NULL,
  `no_RKS` varchar(20) NOT NULL,
  `kode_panitia` varchar(10) DEFAULT NULL,
  `nama` varchar(32) DEFAULT NULL,
  `nama_pengadaan` varchar(50) NOT NULL,
  `nomor` varchar(20) NOT NULL,
  `hari/tanggal` date NOT NULL,
  PRIMARY KEY (`id_dokumen`),
  UNIQUE KEY `nomor` (`nomor`),
  KEY `no_RKS` (`no_RKS`),
  KEY `nama_pengadaan` (`nama_pengadaan`),
  KEY `kode_panitia` (`kode_panitia`),
  KEY `nama` (`nama`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita_acara_evaluasi_penawaran`
--

INSERT INTO `berita_acara_evaluasi_penawaran` (`id_dokumen`, `no_RKS`, `kode_panitia`, `nama`, `nama_pengadaan`, `nomor`, `hari/tanggal`) VALUES
(987654342, '42/A/31/2013', 'B', NULL, 'Pengadaan komputer', '43/A/31/2013', '2013-06-10'),
(987654362, '42/A/32/2013', NULL, 'haniferidaputra', 'Pengadaan alat tulis', '43/A/32/2013', '2013-06-27'),
(987654382, '42/A/33/2013', NULL, 'johannesridho', 'Pengadaan alat komunikasi', '43/A/33/2013', '2013-06-06');

-- --------------------------------------------------------

--
-- Table structure for table `berita_acara_negosiasi_klarifikasi`
--

CREATE TABLE IF NOT EXISTS `berita_acara_negosiasi_klarifikasi` (
  `id_dokumen` bigint(32) NOT NULL,
  `nomor` varchar(20) NOT NULL,
  `klarifikasi_administrasi` varchar(100) NOT NULL,
  `klarifikasi_teknis` varchar(100) NOT NULL,
  `harga_awal` bigint(20) NOT NULL,
  `harga_akhir` bigint(20) NOT NULL,
  `kode_panitia` varchar(10) DEFAULT NULL,
  `nama` varchar(32) DEFAULT NULL,
  `surat_keputusan` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_dokumen`),
  UNIQUE KEY `nomor` (`nomor`),
  KEY `kode_panitia` (`kode_panitia`),
  KEY `nama` (`nama`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita_acara_negosiasi_klarifikasi`
--

INSERT INTO `berita_acara_negosiasi_klarifikasi` (`id_dokumen`, `nomor`, `klarifikasi_administrasi`, `klarifikasi_teknis`, `harga_awal`, `harga_akhir`, `kode_panitia`, `nama`, `surat_keputusan`) VALUES
(987654343, '43/A/31/2013', 'administrasi', 'teknis', 10000000000, 10000000000, 'B', NULL, ''),
(987654363, '43/A/32/2013', 'administrasi', 'teknis', 450000000, 450000000, NULL, 'haniferidaputra', ''),
(987654383, '43/A/33/2013', 'administrasi', 'teknis', 499000000, 499000000, NULL, 'johannesridho', '');

-- --------------------------------------------------------

--
-- Table structure for table `berita_acara_pembukaan_penawaran`
--

CREATE TABLE IF NOT EXISTS `berita_acara_pembukaan_penawaran` (
  `id_dokumen` bigint(32) NOT NULL,
  `nomor` varchar(20) NOT NULL,
  `jumlah_penyedia_diundang` int(10) NOT NULL,
  `jumlah_penyedia_dokumen_sah` int(10) NOT NULL,
  `jumlah_penyedia_dokumen_tidak_sah` int(10) NOT NULL,
  `status_metode` varchar(10) NOT NULL,
  `kode_panitia` varchar(10) DEFAULT NULL,
  `nama` varchar(32) DEFAULT NULL,
  `surat_keputusan` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_dokumen`),
  UNIQUE KEY `nomor` (`nomor`),
  KEY `kode_panitia` (`kode_panitia`),
  KEY `nama` (`nama`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita_acara_pembukaan_penawaran`
--

INSERT INTO `berita_acara_pembukaan_penawaran` (`id_dokumen`, `nomor`, `jumlah_penyedia_diundang`, `jumlah_penyedia_dokumen_sah`, `jumlah_penyedia_dokumen_tidak_sah`, `status_metode`, `kode_panitia`, `nama`, `surat_keputusan`) VALUES
(987654344, '44/A/31/2013', 4, 3, 1, 'apa ini', 'B', NULL, ''),
(987654364, '44/A/32/2013', 2, 2, 0, 'apa ini', NULL, 'haniferidaputra', ''),
(987654384, '44/A/33/2013', 1, 1, 0, 'apa ini', NULL, 'johannesridho', '');

-- --------------------------------------------------------

--
-- Table structure for table `berita_acara_pengadaan_gagal`
--

CREATE TABLE IF NOT EXISTS `berita_acara_pengadaan_gagal` (
  `id_dokumen` bigint(32) NOT NULL,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita_acara_pengadaan_gagal`
--


-- --------------------------------------------------------

--
-- Table structure for table `berita_acara_penjelasan`
--

CREATE TABLE IF NOT EXISTS `berita_acara_penjelasan` (
  `id_dokumen` bigint(32) NOT NULL,
  `nomor` varchar(20) NOT NULL,
  `kode_panitia` varchar(10) DEFAULT NULL,
  `nama` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id_dokumen`),
  UNIQUE KEY `nomor` (`nomor`),
  KEY `kode_panitia` (`kode_panitia`),
  KEY `nama` (`nama`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita_acara_penjelasan`
--

INSERT INTO `berita_acara_penjelasan` (`id_dokumen`, `nomor`, `kode_panitia`, `nama`) VALUES
(987654345, '45/A/31/2013', 'B', NULL),
(987654365, '45/A/32/2013', NULL, 'haniferidaputra'),
(987654385, '45/A/33/2013', NULL, 'johannesridho');

-- --------------------------------------------------------

--
-- Table structure for table `daftar_hadir`
--

CREATE TABLE IF NOT EXISTS `daftar_hadir` (
  `id_dokumen` bigint(32) NOT NULL,
  `jam` varchar(10) NOT NULL,
  `tempat_hadir` varchar(50) NOT NULL,
  `acara` varchar(100) NOT NULL,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftar_hadir`
--

INSERT INTO `daftar_hadir` (`id_dokumen`, `jam`, `tempat_hadir`, `acara`) VALUES
(987654324, '14.00', 'Ruang rapat gedung I lantai 5', 'Negoisasi harga'),
(987654346, '14.00', 'Ruang rapat gedung I lantai 5', 'Makan bersama'),
(987654366, '14.00', 'Ruang rapat divisi umum', 'Penentuan pemenang'),
(987654386, '14.00', 'Ruang rapat besar', 'Penentuan pemenang');

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE IF NOT EXISTS `divisi` (
  `username` varchar(20) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `divisi`
--


-- --------------------------------------------------------

--
-- Table structure for table `dokumen`
--

CREATE TABLE IF NOT EXISTS `dokumen` (
  `id_dokumen` bigint(32) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `tempat` varchar(20) DEFAULT NULL,
  `id_pengadaan` bigint(32) NOT NULL,
  `status_upload` varchar(10) NOT NULL,
  `link_penyimpanan` varchar(100) NOT NULL,
  PRIMARY KEY (`id_dokumen`),
  KEY `tanggal` (`tanggal`),
  KEY `tempat` (`tempat`),
  KEY `id_pengadaan` (`id_pengadaan`),
  KEY `status_upload` (`status_upload`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=987654401 ;

--
-- Dumping data for table `dokumen`
--

INSERT INTO `dokumen` (`id_dokumen`, `tanggal`, `tempat`, `id_pengadaan`, `status_upload`, `link_penyimpanan`) VALUES
(987654321, '2013-06-02', 'Jakarta', 987654321, 'Selesai', 'www.sipengadaan.pln.co.id'),
(987654322, '2013-06-03', 'Jakarta', 987654321, 'Selesai', 'www.sipengadaan.pln.co.id'),
(987654323, '2013-06-04', 'Jakarta', 987654321, 'Selesai', 'www.sipengadaan.pln.co.id'),
(987654324, '2013-06-05', 'Jakarta', 987654321, 'Selesai', 'www.sipengadaan.pln.co.id'),
(987654325, '2013-06-06', 'Jakarta', 987654321, 'Selesai', 'www.sipengadaan.pln.co.id'),
(987654326, '2013-06-07', 'Jakarta', 987654321, 'Selesai', 'www.sipengadaan.pln.co.id'),
(987654327, '2013-06-08', 'Jakarta', 987654321, 'Selesai', 'www.sipengadaan.pln.co.id'),
(987654328, '2013-06-09', 'Jakarta', 987654321, 'Selesai', 'www.sipengadaan.pln.co.id'),
(987654329, '2013-06-10', 'Jakarta', 987654321, 'Selesai', 'www.sipengadaan.pln.co.id'),
(987654330, '2013-06-11', 'Jakarta', 987654321, 'Selesai', 'www.sipengadaan.pln.co.id'),
(987654331, '2013-06-12', 'Jakarta', 987654321, 'Selesai', 'www.sipengadaan.pln.co.id'),
(987654332, '2013-06-13', 'Jakarta', 987654321, 'Selesai', 'www.sipengadaan.pln.co.id'),
(987654333, '2013-06-14', 'Jakarta', 987654321, 'Selesai', 'www.sipengadaan.pln.co.id'),
(987654334, '2013-06-10', 'Jakarta', 987654321, 'Selesai', 'www.sipengadaan.pln.co.id'),
(987654335, '2013-06-12', 'Jakarta', 987654321, 'Selesai', 'www.sipengadaan.pln.co.id'),
(987654336, '2013-06-13', 'Jakarta', 987654321, 'Selesai', 'www.sipengadaan.pln.co.id'),
(987654337, '2013-06-14', 'Jakarta', 987654321, 'Selesai', 'www.sipengadaan.pln.co.id'),
(987654338, '2013-06-15', 'Jakarta', 987654321, 'Selesai', 'www.sipengadaan.pln.co.id'),
(987654339, '2013-06-13', 'Jakarta', 987654321, 'Selesai', 'www.sipengadaan.pln.co.id'),
(987654340, '2013-06-09', 'Jakarta', 987654321, 'Selesai', 'www.sipengadaan.pln.co.id'),
(987654341, '2013-06-05', 'Jakarta', 987654322, 'Selesai', 'www.sipengadaan.pln.co.id'),
(987654342, '2013-06-06', 'Jakarta', 987654322, 'Selesai', 'www.sipengadaan.pln.co.id'),
(987654343, '2013-06-07', 'Jakarta', 987654322, 'Selesai', 'www.sipengadaan.pln.co.id'),
(987654344, '2013-06-08', 'Jakarta', 987654322, 'Selesai', 'www.sipengadaan.pln.co.id'),
(987654345, '2013-06-09', 'Jakarta', 987654322, 'Selesai', 'www.sipengadaan.pln.co.id'),
(987654346, '2013-06-10', 'Jakarta', 987654322, 'Selesai', 'www.sipengadaan.pln.co.id'),
(987654347, '2013-06-11', 'Jakarta', 987654322, 'Selesai', 'www.sipengadaan.pln.co.id'),
(987654348, '2013-06-12', 'Jakarta', 987654322, 'Selesai', 'www.sipengadaan.pln.co.id'),
(987654349, '2013-06-13', 'Jakarta', 987654322, 'Selesai', 'www.sipengadaan.pln.co.id'),
(987654350, '2013-06-14', 'Jakarta', 987654322, 'Selesai', 'www.sipengadaan.pln.co.id'),
(987654351, '2013-06-15', 'Jakarta', 987654322, 'Selesai', 'www.sipengadaan.pln.co.id'),
(987654352, '2013-06-16', 'Jakarta', 987654322, 'Selesai', 'www.sipengadaan.pln.co.id'),
(987654353, '2013-06-17', 'Jakarta', 987654322, 'Selesai', 'www.sipengadaan.pln.co.id'),
(987654354, '2013-06-18', 'Jakarta', 987654322, 'Selesai', 'www.sipengadaan.pln.co.id'),
(987654355, '2013-06-19', 'Jakarta', 987654322, 'Selesai', 'www.sipengadaan.pln.co.id'),
(987654356, '2013-06-20', 'Jakarta', 987654322, 'Selesai', 'www.sipengadaan.pln.co.id'),
(987654357, '2013-06-21', 'Jakarta', 987654322, 'Selesai', 'www.sipengadaan.pln.co.id'),
(987654358, '2013-06-22', 'Jakarta', 987654322, 'Selesai', 'www.sipengadaan.pln.co.id'),
(987654359, '2013-06-23', 'Jakarta', 987654322, 'Selesai', 'www.sipengadaan.pln.co.id'),
(987654360, '2013-06-24', 'Jakarta', 987654322, 'Selesai', 'www.sipengadaan.pln.co.id'),
(987654361, '2013-06-26', 'Jakarta', 987654323, 'Selesai', 'www.sipengadaan.pln.co.id'),
(987654362, '2013-06-26', 'Jakarta', 987654323, 'Selesai', 'www.sipengadaan.pln.co.id'),
(987654363, '2013-06-26', 'Jakarta', 987654323, 'Selesai', 'www.sipengadaan.pln.co.id'),
(987654364, '2013-06-26', 'Jakarta', 987654323, 'Selesai', 'www.sipengadaan.pln.co.id'),
(987654365, '2013-06-27', 'Jakarta', 987654323, 'Selesai', 'www.sipengadaan.pln.co.id'),
(987654366, '2013-06-27', 'Jakarta', 987654323, 'Selesai', 'www.sipengadaan.pln.co.id'),
(987654367, '2013-06-27', 'Jakarta', 987654323, 'Selesai', 'www.sipengadaan.pln.co.id'),
(987654368, '2013-06-27', 'Jakarta', 987654323, 'Selesai', 'www.sipengadaan.pln.co.id'),
(987654369, '2013-06-28', 'Jakarta', 987654323, 'Selesai', 'www.sipengadaan.pln.co.id'),
(987654370, '2013-06-28', 'Jakarta', 987654323, 'Selesai', 'www.sipengadaan.pln.co.id'),
(987654371, '2013-06-28', 'Jakarta', 987654323, 'Selesai', 'www.sipengadaan.pln.co.id'),
(987654372, '2013-06-28', 'Jakarta', 987654323, 'Selesai', 'www.sipengadaan.pln.co.id'),
(987654373, '2013-06-29', 'Jakarta', 987654323, 'Selesai', 'www.sipengadaan.pln.co.id'),
(987654374, '2013-06-29', 'Jakarta', 987654323, 'Selesai', 'www.sipengadaan.pln.co.id'),
(987654375, '2013-06-29', 'Jakarta', 987654323, 'Selesai', 'www.sipengadaan.pln.co.id'),
(987654376, '2013-06-29', 'Jakarta', 987654323, 'Selesai', 'www.sipengadaan.pln.co.id'),
(987654377, '2013-06-30', 'Jakarta', 987654323, 'Selesai', 'www.sipengadaan.pln.co.id'),
(987654378, '2013-06-30', 'Jakarta', 987654323, 'Selesai', 'www.sipengadaan.pln.co.id'),
(987654379, '2013-06-30', 'Jakarta', 987654323, 'Selesai', 'www.sipengadaan.pln.co.id'),
(987654380, '2013-06-30', 'Jakarta', 987654323, 'Selesai', 'www.sipengadaan.pln.co.id'),
(987654381, '2013-06-04', 'Jakarta', 987654324, 'Selesai', 'www.sipengadaan.pln.co.id'),
(987654382, '2013-06-04', 'Jakarta', 987654324, 'Selesai', 'www.sipengadaan.pln.co.id'),
(987654383, '2013-06-04', 'Jakarta', 987654324, 'Selesai', 'www.sipengadaan.pln.co.id'),
(987654384, '2013-06-05', 'Jakarta', 987654324, 'Selesai', 'www.sipengadaan.pln.co.id'),
(987654385, '2013-06-05', 'Jakarta', 987654324, 'Selesai', 'www.sipengadaan.pln.co.id'),
(987654386, '2013-06-05', 'Jakarta', 987654324, 'Selesai', 'www.sipengadaan.pln.co.id'),
(987654387, '2013-06-05', 'Jakarta', 987654324, 'Selesai', 'www.sipengadaan.pln.co.id'),
(987654388, '2013-06-06', 'Jakarta', 987654324, 'Selesai', 'www.sipengadaan.pln.co.id'),
(987654389, '2013-06-06', 'Jakarta', 987654324, 'Selesai', 'www.sipengadaan.pln.co.id'),
(987654390, '2013-06-06', 'Jakarta', 987654324, 'Selesai', 'www.sipengadaan.pln.co.id'),
(987654391, '2013-06-06', 'Jakarta', 987654324, 'Selesai', 'www.sipengadaan.pln.co.id'),
(987654392, '2013-06-07', 'Jakarta', 987654324, 'Selesai', 'www.sipengadaan.pln.co.id'),
(987654393, '2013-06-07', 'Jakarta', 987654324, 'Selesai', 'www.sipengadaan.pln.co.id'),
(987654394, '2013-06-08', 'Jakarta', 987654324, 'Selesai', 'www.sipengadaan.pln.co.id'),
(987654395, '2013-06-08', 'Jakarta', 987654324, 'Selesai', 'www.sipengadaan.pln.co.id'),
(987654396, '2013-06-09', 'Jakarta', 987654324, 'Selesai', 'www.sipengadaan.pln.co.id'),
(987654397, '2013-06-09', 'Jakarta', 987654324, 'Selesai', 'www.sipengadaan.pln.co.id'),
(987654398, '2013-06-10', 'Jakarta', 987654324, 'Selesai', 'www.sipengadaan.pln.co.id'),
(987654399, '2013-06-10', 'Jakarta', 987654324, 'Selesai', 'www.sipengadaan.pln.co.id'),
(987654400, '2013-06-10', 'Jakarta', 987654324, 'Selesai', 'www.sipengadaan.pln.co.id');

-- --------------------------------------------------------

--
-- Table structure for table `dokumen_penawaran`
--

CREATE TABLE IF NOT EXISTS `dokumen_penawaran` (
  `id_dokumen` bigint(32) NOT NULL,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dokumen_penawaran`
--

INSERT INTO `dokumen_penawaran` (`id_dokumen`) VALUES
(987654339),
(987654347),
(987654367),
(987654387);

-- --------------------------------------------------------

--
-- Table structure for table `form_isian_kualifikasi`
--

CREATE TABLE IF NOT EXISTS `form_isian_kualifikasi` (
  `id_dokumen` bigint(32) NOT NULL,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form_isian_kualifikasi`
--


-- --------------------------------------------------------

--
-- Table structure for table `kdivmum`
--

CREATE TABLE IF NOT EXISTS `kdivmum` (
  `username` varchar(20) NOT NULL,
  `NIP` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  PRIMARY KEY (`username`),
  UNIQUE KEY `NIP` (`NIP`),
  UNIQUE KEY `NIP_2` (`NIP`),
  KEY `username` (`username`,`NIP`),
  KEY `username_2` (`username`,`NIP`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kdivmum`
--

INSERT INTO `kdivmum` (`username`, `NIP`, `email`) VALUES
('aidilsyaputra', '123456789', 'aidil@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `nota_dinas_pemberitahuan_pemenang`
--

CREATE TABLE IF NOT EXISTS `nota_dinas_pemberitahuan_pemenang` (
  `id_dokumen` bigint(32) NOT NULL,
  `nomor` varchar(20) NOT NULL,
  `dari` varchar(50) NOT NULL,
  `sifat` varchar(20) NOT NULL,
  `nama_penyedia` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `NPWP` varchar(20) NOT NULL,
  `biaya` bigint(20) NOT NULL,
  `waktu_pelaksanaan` date NOT NULL,
  `tempat_penyerahan` varchar(20) NOT NULL,
  PRIMARY KEY (`id_dokumen`),
  KEY `nama_penyedia` (`nama_penyedia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nota_dinas_pemberitahuan_pemenang`
--

INSERT INTO `nota_dinas_pemberitahuan_pemenang` (`id_dokumen`, `nomor`, `dari`, `sifat`, `nama_penyedia`, `alamat`, `NPWP`, `biaya`, `waktu_pelaksanaan`, `tempat_penyerahan`) VALUES
(987654325, '35/A/31/2013', 'Ketua panitia Pengadaan barang dan jasa', 'Rahasia', 'Mercedes Benz', 'Jl.mobilbagus No 57 Jakarta Pusat', '1234567', 10000000000, '2013-06-13', 'Jakarta'),
(987654348, '48/A/31/2013', 'Ketua panitia Pengadaan barang dan jasa', 'Rahasia', 'Apple', 'Jl.apelmanis No 57 Jakarta Pusat', '1234567', 10000000000, '2013-06-13', 'Jakarta'),
(987654368, '48/A/32/2013', 'Ketua panitia Pengadaan barang dan jasa', 'Rahasia', 'Pilot', 'Jl.pilotpramugari No 57 Jakarta Pusat', '1234567', 450000000, '2013-06-27', 'Jakarta'),
(987654388, '48/A/33/2013', 'Ketua panitia Pengadaan barang dan jasa', 'Rahasia', 'Samsung', 'Jl.samsungjamil No 57 Jakarta Pusat', '1234567', 499000000, '2013-06-07', 'Jakarta');

-- --------------------------------------------------------

--
-- Table structure for table `nota_dinas_penetapan_pemenang`
--

CREATE TABLE IF NOT EXISTS `nota_dinas_penetapan_pemenang` (
  `id_dokumen` bigint(32) NOT NULL,
  `nomor` varchar(20) NOT NULL,
  `kepada` varchar(20) NOT NULL,
  `sifat` varchar(20) NOT NULL,
  `nama_penyedia` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `NPWP` varchar(20) NOT NULL,
  `biaya` bigint(20) NOT NULL,
  `waktu_pelaksanaan` date NOT NULL,
  `tempat_penyerahan` varchar(20) NOT NULL,
  `sumber_dana` varchar(20) NOT NULL,
  `jangka_waktu_berlaku` varchar(20) NOT NULL,
  `jangka_waktu_deadline` varchar(20) NOT NULL,
  PRIMARY KEY (`id_dokumen`),
  KEY `nama_penyedia` (`nama_penyedia`),
  KEY `kepada` (`kepada`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nota_dinas_penetapan_pemenang`
--

INSERT INTO `nota_dinas_penetapan_pemenang` (`id_dokumen`, `nomor`, `kepada`, `sifat`, `nama_penyedia`, `alamat`, `NPWP`, `biaya`, `waktu_pelaksanaan`, `tempat_penyerahan`, `sumber_dana`, `jangka_waktu_berlaku`, `jangka_waktu_deadline`) VALUES
(987654326, '34/A/31/2013', 'Mercedes Benz', 'Biasa', 'Mercedes Benz', 'Jl.mobilbagus No 57 Jakarta Pusat', '1234567', 10000000000, '2013-06-14', 'Jakarta', 'Uang Kas PLN', '7', '14'),
(987654349, '49/A/31/2013', 'Apple', 'Biasa', 'Apple', 'Jl.apelmanis No 57 Jakarta Pusat', '1234567', 10000000000, '2013-06-24', 'Jakarta', 'Uang Kas PLN', '7', '14'),
(987654369, '49/A/32/2013', 'Pilot', 'Biasa', 'Pilot', 'Jl.pilotpramugari No 57 Jakarta Pusat', '1234567', 450000000, '2013-06-29', 'Jakarta', 'Uang Kas PLN', '7', '14'),
(987654389, '49/A/33/2013', 'Samsung', 'Biasa', 'Samsung', 'Jl.samsungjamil No 57 Jakarta Pusat', '1234567', 499000000, '2013-06-09', 'Jakarta', 'Uang Kas PLN', '7', '14');

-- --------------------------------------------------------

--
-- Table structure for table `nota_dinas_perintah_pengadaan`
--

CREATE TABLE IF NOT EXISTS `nota_dinas_perintah_pengadaan` (
  `id_dokumen` bigint(32) NOT NULL,
  `nota_dinas_permintaan` varchar(20) NOT NULL,
  `nomor` varchar(20) NOT NULL,
  `dari` varchar(20) NOT NULL,
  `kepada` varchar(50) NOT NULL,
  `perilhal` varchar(50) NOT NULL,
  `RAB` bigint(20) NOT NULL,
  `targetSPK/kontrak` varchar(20) NOT NULL,
  `sumber_dana` varchar(20) NOT NULL,
  `pagu_anggaran` varchar(20) NOT NULL,
  PRIMARY KEY (`id_dokumen`),
  KEY `nota_dinas_permintaan` (`nota_dinas_permintaan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nota_dinas_perintah_pengadaan`
--

INSERT INTO `nota_dinas_perintah_pengadaan` (`id_dokumen`, `nota_dinas_permintaan`, `nomor`, `dari`, `kepada`, `perilhal`, `RAB`, `targetSPK/kontrak`, `sumber_dana`, `pagu_anggaran`) VALUES
(987654329, '40/A/31/2013', '35/A/32/2013', 'Kdivmum', 'Ketua panitia Pengadaan barang dan jasa', 'Perintah pengadaan Mobil dinas PLN', 10000000000, 'Mobil', 'Kas PLN', 'xxx'),
(987654350, '51/A/31/2013', '50/A/31/2013', 'Kdivmum', 'Ketua panitia Pengadaan barang dan jasa', 'Perintah pengadaan komputer PLN', 10000000000, 'Komputer', 'Kas PLN', 'xxx'),
(987654370, '51/A/32/2013', '50/A/32/2013', 'Kdivmum', 'Ketua panitia Pengadaan barang dan jasa', 'Perintah pengadaan alat tulis PLN', 450000000, 'Alat Tulis', 'Kas PLN', 'xxx'),
(987654390, '51/A/33/2013', '50/A/33/2013', 'Kdivmum', 'Ketua panitia Pengadaan barang dan jasa', 'Perintah pengadaan alat komunikasi PLN', 499000000, 'Alat Komunikasi', 'Kas PLN', 'xxx');

-- --------------------------------------------------------

--
-- Table structure for table `nota_dinas_permintaan`
--

CREATE TABLE IF NOT EXISTS `nota_dinas_permintaan` (
  `id_dokumen` bigint(32) NOT NULL,
  `nomor` varchar(20) NOT NULL,
  PRIMARY KEY (`id_dokumen`),
  UNIQUE KEY `nomor` (`nomor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nota_dinas_permintaan`
--

INSERT INTO `nota_dinas_permintaan` (`id_dokumen`, `nomor`) VALUES
(987654328, '40/A/31/2013'),
(987654351, '51/A/31/2013'),
(987654371, '51/A/32/2013'),
(987654391, '51/A/33/2013');

-- --------------------------------------------------------

--
-- Table structure for table `nota_dinas_usulan_pemenang`
--

CREATE TABLE IF NOT EXISTS `nota_dinas_usulan_pemenang` (
  `id_dokumen` bigint(32) NOT NULL,
  `nomor` varchar(20) NOT NULL,
  `dari` varchar(50) NOT NULL,
  `sifat` varchar(20) NOT NULL,
  `nama_penyedia` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `NPWP` varchar(20) NOT NULL,
  `biaya` bigint(20) NOT NULL,
  `waktu_pelaksanaan` date NOT NULL,
  `tempat_penyerahan` varchar(20) NOT NULL,
  PRIMARY KEY (`id_dokumen`),
  KEY `nama_penyedia` (`nama_penyedia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nota_dinas_usulan_pemenang`
--

INSERT INTO `nota_dinas_usulan_pemenang` (`id_dokumen`, `nomor`, `dari`, `sifat`, `nama_penyedia`, `alamat`, `NPWP`, `biaya`, `waktu_pelaksanaan`, `tempat_penyerahan`) VALUES
(987654330, '35/A/32/2013', 'ketua panitia Pengadaan barang dan jasa', 'Rahasia', 'Mercedes Benz', 'Jl.mobilbagus No 57 Jakarta Pusat', '1234567', 10000000000, '2013-06-13', 'Jakarta'),
(987654352, '52/A/31/2013', 'ketua panitia Pengadaan barang dan jasa', 'Rahasia', 'Apple', 'Jl.apelmanis No 57 Jakarta Pusat', '1234567', 10000000000, '2013-06-23', 'Jakarta'),
(987654372, '52/A/32/2013', 'ketua panitia Pengadaan barang dan jasa', 'Rahasia', 'Pilot', 'Jl.pilotpramugari No 57 Jakarta Pusat', '1234567', 450000000, '2013-06-28', 'Jakarta'),
(987654392, '52/A/33/2013', 'ketua panitia Pengadaan barang dan jasa', 'Rahasia', 'Samsung', 'Jl.samsungjamil No 57 Jakarta Pusat', '1234567', 499000000, '2013-06-08', 'Jakarta');

-- --------------------------------------------------------

--
-- Table structure for table `pakta_integritas_panitia_1`
--

CREATE TABLE IF NOT EXISTS `pakta_integritas_panitia_1` (
  `id_dokumen` bigint(32) NOT NULL,
  `kode_panitia` varchar(20) DEFAULT NULL,
  `nama` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id_dokumen`),
  KEY `kode_panitia` (`kode_panitia`),
  KEY `nama` (`nama`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pakta_integritas_panitia_1`
--

INSERT INTO `pakta_integritas_panitia_1` (`id_dokumen`, `kode_panitia`, `nama`) VALUES
(987654353, 'B', NULL),
(987654373, NULL, 'haniferidaputra'),
(987654393, NULL, 'johannesridho');

-- --------------------------------------------------------

--
-- Table structure for table `pakta_integritas_penyedia`
--

CREATE TABLE IF NOT EXISTS `pakta_integritas_penyedia` (
  `id_dokumen` bigint(32) NOT NULL,
  `nama_pengadaan` varchar(100) NOT NULL,
  PRIMARY KEY (`id_dokumen`),
  KEY `nama_pengadaan` (`nama_pengadaan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pakta_integritas_penyedia`
--

INSERT INTO `pakta_integritas_penyedia` (`id_dokumen`, `nama_pengadaan`) VALUES
(987654394, 'Pengadaan alat komunikasi'),
(987654374, 'Pengadaan alat tulis'),
(987654354, 'Pengadaan komputer'),
(987654340, 'Pengadaan mobil dinas');

-- --------------------------------------------------------

--
-- Table structure for table `panitia`
--

CREATE TABLE IF NOT EXISTS `panitia` (
  `kode_panitia` varchar(10) NOT NULL,
  PRIMARY KEY (`kode_panitia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `panitia`
--

INSERT INTO `panitia` (`kode_panitia`) VALUES
('A'),
('B');

-- --------------------------------------------------------

--
-- Table structure for table `pengadaan`
--

CREATE TABLE IF NOT EXISTS `pengadaan` (
  `id_pengadaan` bigint(32) NOT NULL AUTO_INCREMENT,
  `nama_pengadaan` varchar(100) NOT NULL,
  `nama_penyedia` varchar(32) DEFAULT NULL,
  `tanggal_masuk` date NOT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `status` varchar(32) NOT NULL,
  `biaya` bigint(20) DEFAULT NULL,
  `nama` varchar(32) DEFAULT NULL,
  `kode_panitia` varchar(10) DEFAULT NULL,
  `metode_pengadaan` varchar(32) NOT NULL,
  `metode_penawaran` varchar(32) DEFAULT NULL,
  `jenis_kualifikasi` varchar(32) DEFAULT NULL,
  `deskripsi` varchar(100) NOT NULL,
  PRIMARY KEY (`id_pengadaan`),
  KEY `nama_penyedia` (`nama_penyedia`),
  KEY `tanggal_masuk` (`tanggal_masuk`),
  KEY `tanggal_selesai` (`tanggal_selesai`),
  KEY `status` (`status`),
  KEY `biaya` (`biaya`),
  KEY `kodepanitia` (`kode_panitia`),
  KEY `metode_pengadaan` (`metode_pengadaan`),
  KEY `metode_penawaran` (`metode_penawaran`),
  KEY `deskripsi` (`deskripsi`),
  KEY `nama_pengadaan` (`nama_pengadaan`),
  KEY `nama` (`nama`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=987654327 ;

--
-- Dumping data for table `pengadaan`
--

INSERT INTO `pengadaan` (`id_pengadaan`, `nama_pengadaan`, `nama_penyedia`, `tanggal_masuk`, `tanggal_selesai`, `status`, `biaya`, `nama`, `kode_panitia`, `metode_pengadaan`, `metode_penawaran`, `jenis_kualifikasi`, `deskripsi`) VALUES
(3, 'as', 'aad', '2013-08-09', '2013-10-10', 'selesai', 800, NULL, 'A', 'Penunjukan Langsung', 'Satu Sampul', '', 'asad'),
(987654321, 'Pengadaan mobil dinas', 'Mercedes Benz', '2013-06-01', '2013-06-15', 'Selesai', 10000000000, NULL, 'A', 'Penunjukan Langsung', 'Satu Sampul', 'Pra Kualifikasi', 'Pengadaan mobil untuk pegawai PLN'),
(987654322, 'Pengadaan komputer', 'Apple', '2013-06-05', '2013-06-25', 'Negosiasi dan Klarifikasi', 10000000000, NULL, 'B', 'Pemilihan Langsung', 'Dua Sampul', 'Pra Kualifikasi', 'Pengadaan komputer untuk Laboratorium IT PLN'),
(987654323, 'Pengadaan alat tulis', 'Pilot', '2013-06-26', '2013-06-30', 'Aanwijzing', 450000000, 'haniferidaputra', NULL, 'Pelelangan', 'Dua Tahap', 'Pasca Kualifikasi', 'Pengadaan alat-alat tulis untuk kebutuhan kantor PLN'),
(987654324, 'Pengadaan alat komunikasi', 'Samsung', '2013-06-04', '2013-06-10', 'Selesai', 499000000, 'johannesridho', NULL, 'Penunjukan Langsung', 'Dua Sampul', 'Pasca Kualifikasi', 'Pengadaan alat komunikasi untuk pejabat PLN'),
(987654326, 'Pengadaan Alat Musik', NULL, '2013-02-04', NULL, 'Penunjukan Panitia', NULL, NULL, 'B', 'Pemilihan Langsung', NULL, NULL, 'Lalalala');

-- --------------------------------------------------------

--
-- Table structure for table `rks`
--

CREATE TABLE IF NOT EXISTS `rks` (
  `id_dokumen` bigint(32) NOT NULL,
  `nomor` varchar(20) NOT NULL,
  PRIMARY KEY (`id_dokumen`),
  KEY `nomor` (`nomor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rks`
--

INSERT INTO `rks` (`id_dokumen`, `nomor`) VALUES
(987654331, '37/A/31/2013'),
(987654341, '42/A/31/2013'),
(987654361, '42/A/32/2013'),
(987654381, '42/A/33/2013');

-- --------------------------------------------------------

--
-- Table structure for table `surat_pemberitahuan_pengadaan`
--

CREATE TABLE IF NOT EXISTS `surat_pemberitahuan_pengadaan` (
  `id_dokumen` bigint(32) NOT NULL,
  `nomor` varchar(20) NOT NULL,
  `kode_panitia` varchar(20) DEFAULT NULL,
  `nama` varchar(32) DEFAULT NULL,
  `perihal` varchar(50) NOT NULL,
  `lingkup_kerja` varchar(20) NOT NULL,
  `waktu_kerja` varchar(20) NOT NULL,
  PRIMARY KEY (`id_dokumen`),
  UNIQUE KEY `nomor` (`nomor`),
  KEY `kode_panitia` (`kode_panitia`),
  KEY `nama` (`nama`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_pemberitahuan_pengadaan`
--

INSERT INTO `surat_pemberitahuan_pengadaan` (`id_dokumen`, `nomor`, `kode_panitia`, `nama`, `perihal`, `lingkup_kerja`, `waktu_kerja`) VALUES
(987654355, '55/A/31/2013', 'B', NULL, 'Pemberitahuan pengadaan komputer', 'Pengadaan komputer', '17'),
(987654375, '55/A/32/2013', NULL, 'haniferidaputra', 'Pemberitahuan pengadaan alat tulis', 'Pengadaan alat tulis', '5'),
(987654395, '55/A/33/2013', NULL, 'johannesridho', 'Pemberitahuan pengadaan alat komunikasi', 'Pengadaan alat komun', '7');

-- --------------------------------------------------------

--
-- Table structure for table `surat_pernyataan_minat`
--

CREATE TABLE IF NOT EXISTS `surat_pernyataan_minat` (
  `id_dokumen` bigint(32) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  `bertindak` varchar(30) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telepon/fax` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `kantor_pusat/unit` varchar(20) NOT NULL,
  `nama_pengadaan` varchar(50) NOT NULL,
  PRIMARY KEY (`id_dokumen`),
  KEY `nama_pengadaan` (`nama_pengadaan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_pernyataan_minat`
--

INSERT INTO `surat_pernyataan_minat` (`id_dokumen`, `nama`, `jabatan`, `bertindak`, `alamat`, `telepon/fax`, `email`, `kantor_pusat/unit`, `nama_pengadaan`) VALUES
(987654334, 'Alamanda Kartikasari', 'Direktur bagian pemasaran', 'Mercedes Benz', 'Jl.mobilbagus No 57 Jakarta Pusat', '5432123', 'mercedes@gmail.com', 'PLN', 'Pengadaan mobil dinas'),
(987654356, 'Bawang Merah', 'Direktur bagian pemasaran', 'Apple', 'Jl.apelmanis No 57 Jakarta Pusat', '5432123', 'apple@gmail.com', 'PLN', 'Pengadaan komputer'),
(987654376, 'Bawang Putih', 'Direktur bagian pemasaran', 'Pilot', 'Jl.pilotpramugari No 57 Jakarta Pusat', '5432123', 'pilot@gmail.com', 'PLN', 'Pengadaan alat tulis'),
(987654396, 'Bawang Bombay', 'Direktur bagian pemasaran', 'Samsung', 'Jl.samsungjamil No 57 Jakarta Pusat', '5432123', 'samsung@gmail.com', 'PLN', 'Pengadaan alat komunikasi');

-- --------------------------------------------------------

--
-- Table structure for table `surat_undangan_negosiasi_klarifikasi`
--

CREATE TABLE IF NOT EXISTS `surat_undangan_negosiasi_klarifikasi` (
  `id_dokumen` bigint(32) NOT NULL,
  `nomor` varchar(20) NOT NULL,
  `sifat` varchar(20) NOT NULL,
  `perihal` varchar(100) NOT NULL,
  `kepada` varchar(30) NOT NULL,
  `nama_pengadaan` varchar(100) NOT NULL,
  `hari/tanggal` varchar(30) NOT NULL,
  `waktu` varchar(14) NOT NULL,
  `tempat` varchar(50) NOT NULL,
  PRIMARY KEY (`id_dokumen`),
  KEY `nama_pengadaan` (`nama_pengadaan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_undangan_negosiasi_klarifikasi`
--

INSERT INTO `surat_undangan_negosiasi_klarifikasi` (`id_dokumen`, `nomor`, `sifat`, `perihal`, `kepada`, `nama_pengadaan`, `hari/tanggal`, `waktu`, `tempat`) VALUES
(987654335, '39/A/33/2013', 'Biasa', 'Pemberitahuan Hasil Evaluasi Penilaian dan Undangan Rapat Klarifikasi & Negosiasi', 'Direktur Mercedes Benz', 'Pengadaan mobil dinas', 'Senin/10 Juni 2013', '14.00', 'Ruang rapat Gedung I lantai 5'),
(987654357, '57/A/31/2013', 'Biasa', 'Pemberitahuan Hasil Evaluasi Penilaian dan Undangan Rapat Klarifikasi & Negosiasi', 'Direktur Apple', 'Pengadaan komputer', 'Rabu/12 Juni 2013', '14.00', 'Ruang rapat Gedung I lantai 5'),
(987654377, '57/A/32/2013', 'Biasa', 'Pemberitahuan Hasil Evaluasi Penilaian dan Undangan Rapat Klarifikasi & Negosiasi', 'Direktur Pilot', 'Pengadaan alat tulis', 'Kamis/27 Juni 2013', '14.00', 'Ruang rapat Gedung I lantai 7'),
(987654397, '57/A/33/2013', 'Biasa', 'Pemberitahuan Hasil Evaluasi Penilaian dan Undangan Rapat Klarifikasi & Negosiasi', 'Direktur Samsung', 'Pengadaan alat komunikasi', 'Sabtu/08 Juni 2013', '14.00', 'Ruang rapat Gedung I lantai 50');

-- --------------------------------------------------------

--
-- Table structure for table `surat_undangan_pembukaan_penawaran`
--

CREATE TABLE IF NOT EXISTS `surat_undangan_pembukaan_penawaran` (
  `id_dokumen` bigint(32) NOT NULL,
  `kode_panitia` varchar(10) DEFAULT NULL,
  `nama` varchar(32) DEFAULT NULL,
  `nomor` varchar(20) NOT NULL,
  `sifat` varchar(20) NOT NULL,
  `perihal` varchar(100) NOT NULL,
  `no_RKS` varchar(20) NOT NULL,
  `hari/tanggal` varchar(20) NOT NULL,
  `waktu` varchar(20) NOT NULL,
  `tempat` varchar(100) NOT NULL,
  `nama_pengadaan` varchar(100) NOT NULL,
  `surat_keputusan` varchar(20) NOT NULL,
  PRIMARY KEY (`id_dokumen`),
  UNIQUE KEY `nomor` (`nomor`),
  KEY `kode_panitia` (`kode_panitia`),
  KEY `no_RKS` (`no_RKS`),
  KEY `nama_pengadaan` (`nama_pengadaan`),
  KEY `nama` (`nama`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_undangan_pembukaan_penawaran`
--

INSERT INTO `surat_undangan_pembukaan_penawaran` (`id_dokumen`, `kode_panitia`, `nama`, `nomor`, `sifat`, `perihal`, `no_RKS`, `hari/tanggal`, `waktu`, `tempat`, `nama_pengadaan`, `surat_keputusan`) VALUES
(987654358, 'B', NULL, '58/A/31/2013', 'Biasa', 'Pembukaan penawaran komputer', '42/A/31/2013', 'Rabu/12 Juni 2013', '14.00', 'Ruang rapat Gedung I lantai 5', 'Pengadaan komputer', ''),
(987654378, NULL, 'haniferidaputra', '58/A/32/2013', 'Biasa', 'Pembukaan penawaran alat tulis', '42/A/32/2013', 'Rabu/26 Juni 2013', '14.00', 'Ruang rapat Gedung I lantai 50', 'Pengadaan alat tulis', ''),
(987654398, NULL, 'johannesridho', '58/A/33/2013', 'Biasa', 'Pembukaan penawaran alat komunikasi', '42/A/33/2013', 'Kamis/06 Juni 2013', '14.00', 'Ruang rapat Gedung I lantai 500', 'Pengadaan alat komunikasi', '');

-- --------------------------------------------------------

--
-- Table structure for table `surat_undangan_pengambilan_dokumen_pengadaan`
--

CREATE TABLE IF NOT EXISTS `surat_undangan_pengambilan_dokumen_pengadaan` (
  `id_dokumen` bigint(32) NOT NULL,
  `nomor` varchar(20) NOT NULL,
  `sifat` varchar(32) NOT NULL,
  `perihal` varchar(100) NOT NULL,
  `nama_pengadaan` varchar(100) NOT NULL,
  PRIMARY KEY (`id_dokumen`),
  UNIQUE KEY `nomor` (`nomor`),
  KEY `nama_pengadaan` (`nama_pengadaan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_undangan_pengambilan_dokumen_pengadaan`
--

INSERT INTO `surat_undangan_pengambilan_dokumen_pengadaan` (`id_dokumen`, `nomor`, `sifat`, `perihal`, `nama_pengadaan`) VALUES
(987654337, '41/A/31/2013', 'Biasa', 'Undangan Pengambilan Dokumen Pengadaan Barang/Jasa danJadwal Pelaksanaan Lelang ', 'Pengadaan mobil dinas'),
(987654359, '59/A/31/2013', 'Biasa', 'Undangan Pengambilan Dokumen Pengadaan Barang/Jasa danJadwal Pelaksanaan Lelang ', 'Pengadaan komputer'),
(987654379, '59/A/32/2013', 'Biasa', 'Undangan Pengambilan Dokumen Pengadaan Barang/Jasa danJadwal Pelaksanaan Lelang ', 'Pengadaan alat tulis'),
(987654399, '59/A/33/2013', 'Biasa', 'Undangan Pengambilan Dokumen Pengadaan Barang/Jasa danJadwal Pelaksanaan Lelang ', 'Pengadaan alat komunikasi');

-- --------------------------------------------------------

--
-- Table structure for table `surat_undangan_penjelasan`
--

CREATE TABLE IF NOT EXISTS `surat_undangan_penjelasan` (
  `id_dokumen` bigint(32) NOT NULL,
  `nomor` varchar(20) NOT NULL,
  `kode_panitia` varchar(20) DEFAULT NULL,
  `nama` varchar(32) DEFAULT NULL,
  `sifat` varchar(20) NOT NULL,
  `perihal` varchar(100) NOT NULL,
  `hari/tanggal` varchar(20) NOT NULL,
  `waktu` varchar(20) NOT NULL,
  `tempat` varchar(100) NOT NULL,
  `nama_pengadaan` varchar(100) NOT NULL,
  PRIMARY KEY (`id_dokumen`),
  KEY `nama_pengadaan` (`nama_pengadaan`),
  KEY `kode_panitia` (`kode_panitia`),
  KEY `nama` (`nama`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_undangan_penjelasan`
--

INSERT INTO `surat_undangan_penjelasan` (`id_dokumen`, `nomor`, `kode_panitia`, `nama`, `sifat`, `perihal`, `hari/tanggal`, `waktu`, `tempat`, `nama_pengadaan`) VALUES
(987654360, '60/A/31/2013', 'B', NULL, 'Biasa', 'Penjelsana pekerjaan pengadaan komputer', 'Rabu/10 Juni 2013', '14.00', 'Ruang rapat Gedung I lantai 5', 'Pengadaan komputer'),
(987654380, '60/A/32/2013', NULL, 'haniferidaputra', 'Biasa', 'Penjelsan pekerjaan pengadaan alat tulis', 'Rabu/26 Juni 2013', '14.00', 'Ruang rapat Gedung I lantai 50', 'Pengadaan alat tulis'),
(987654400, '60/A/33/2013', NULL, 'johannesridho', 'Biasa', 'Penjelsan pekerjaan pengadaan alat komunikasi', 'Jumat/07 Juni 2013', '14.00', 'Ruang rapat Gedung I lantai 500', 'Pengadaan alat komunikasi');

-- --------------------------------------------------------

--
-- Table structure for table `surat_undangan_prakualifikasi`
--

CREATE TABLE IF NOT EXISTS `surat_undangan_prakualifikasi` (
  `id_dokumen` bigint(32) NOT NULL,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_undangan_prakualifikasi`
--


-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(20) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `password` varchar(24) NOT NULL,
  PRIMARY KEY (`username`),
  KEY `nama` (`nama`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `nama`, `password`) VALUES
('aidilsyaputra', 'Aidil Syaputra', 'aidil'),
('gilanglaksana', 'Gilang Laksana', 'gilang'),
('haniferidaputra', 'Hanif Eridaputra', 'hanif'),
('irvanaditya', 'Irvan Aditya', 'irvan'),
('jo', 'johan', 'jo'),
('johannesridho', 'Johannes Ridho', 'johan'),
('kadiv', 'kadiv', 'kadiv'),
('kevinindra', 'Kevin Indra', 'kevin'),
('panitia', 'panitia', 'panitia');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `anggota`
--
ALTER TABLE `anggota`
  ADD CONSTRAINT `anggota_ibfk_1` FOREIGN KEY (`kode_panitia`) REFERENCES `panitia` (`kode_panitia`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `anggota_ibfk_2` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `berita_acara_evaluasi_penawaran`
--
ALTER TABLE `berita_acara_evaluasi_penawaran`
  ADD CONSTRAINT `berita_acara_evaluasi_penawaran_ibfk_2` FOREIGN KEY (`no_RKS`) REFERENCES `rks` (`nomor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `berita_acara_evaluasi_penawaran_ibfk_4` FOREIGN KEY (`nama_pengadaan`) REFERENCES `pengadaan` (`nama_pengadaan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `berita_acara_evaluasi_penawaran_ibfk_5` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `berita_acara_evaluasi_penawaran_ibfk_6` FOREIGN KEY (`kode_panitia`) REFERENCES `pengadaan` (`kode_panitia`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `berita_acara_evaluasi_penawaran_ibfk_7` FOREIGN KEY (`nama`) REFERENCES `pengadaan` (`nama`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `berita_acara_negosiasi_klarifikasi`
--
ALTER TABLE `berita_acara_negosiasi_klarifikasi`
  ADD CONSTRAINT `berita_acara_negosiasi_klarifikasi_ibfk_5` FOREIGN KEY (`kode_panitia`) REFERENCES `pengadaan` (`kode_panitia`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `berita_acara_negosiasi_klarifikasi_ibfk_3` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `berita_acara_negosiasi_klarifikasi_ibfk_4` FOREIGN KEY (`nama`) REFERENCES `pengadaan` (`nama`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `berita_acara_pembukaan_penawaran`
--
ALTER TABLE `berita_acara_pembukaan_penawaran`
  ADD CONSTRAINT `berita_acara_pembukaan_penawaran_ibfk_5` FOREIGN KEY (`kode_panitia`) REFERENCES `pengadaan` (`kode_panitia`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `berita_acara_pembukaan_penawaran_ibfk_3` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `berita_acara_pembukaan_penawaran_ibfk_4` FOREIGN KEY (`nama`) REFERENCES `pengadaan` (`nama`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `berita_acara_pengadaan_gagal`
--
ALTER TABLE `berita_acara_pengadaan_gagal`
  ADD CONSTRAINT `berita_acara_pengadaan_gagal_ibfk_1` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `berita_acara_penjelasan`
--
ALTER TABLE `berita_acara_penjelasan`
  ADD CONSTRAINT `berita_acara_penjelasan_ibfk_5` FOREIGN KEY (`nama`) REFERENCES `pengadaan` (`nama`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `berita_acara_penjelasan_ibfk_3` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `berita_acara_penjelasan_ibfk_4` FOREIGN KEY (`kode_panitia`) REFERENCES `pengadaan` (`kode_panitia`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `daftar_hadir`
--
ALTER TABLE `daftar_hadir`
  ADD CONSTRAINT `daftar_hadir_ibfk_1` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `divisi`
--
ALTER TABLE `divisi`
  ADD CONSTRAINT `divisi_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dokumen`
--
ALTER TABLE `dokumen`
  ADD CONSTRAINT `dokumen_ibfk_1` FOREIGN KEY (`id_pengadaan`) REFERENCES `pengadaan` (`id_pengadaan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dokumen_penawaran`
--
ALTER TABLE `dokumen_penawaran`
  ADD CONSTRAINT `dokumen_penawaran_ibfk_1` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `form_isian_kualifikasi`
--
ALTER TABLE `form_isian_kualifikasi`
  ADD CONSTRAINT `form_isian_kualifikasi_ibfk_1` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kdivmum`
--
ALTER TABLE `kdivmum`
  ADD CONSTRAINT `kdivmum_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nota_dinas_pemberitahuan_pemenang`
--
ALTER TABLE `nota_dinas_pemberitahuan_pemenang`
  ADD CONSTRAINT `nota_dinas_pemberitahuan_pemenang_ibfk_3` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nota_dinas_pemberitahuan_pemenang_ibfk_2` FOREIGN KEY (`nama_penyedia`) REFERENCES `pengadaan` (`nama_penyedia`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nota_dinas_penetapan_pemenang`
--
ALTER TABLE `nota_dinas_penetapan_pemenang`
  ADD CONSTRAINT `nota_dinas_penetapan_pemenang_ibfk_4` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nota_dinas_penetapan_pemenang_ibfk_2` FOREIGN KEY (`nama_penyedia`) REFERENCES `pengadaan` (`nama_penyedia`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nota_dinas_penetapan_pemenang_ibfk_3` FOREIGN KEY (`kepada`) REFERENCES `pengadaan` (`nama_penyedia`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nota_dinas_perintah_pengadaan`
--
ALTER TABLE `nota_dinas_perintah_pengadaan`
  ADD CONSTRAINT `nota_dinas_perintah_pengadaan_ibfk_3` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nota_dinas_perintah_pengadaan_ibfk_2` FOREIGN KEY (`nota_dinas_permintaan`) REFERENCES `nota_dinas_permintaan` (`nomor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nota_dinas_permintaan`
--
ALTER TABLE `nota_dinas_permintaan`
  ADD CONSTRAINT `nota_dinas_permintaan_ibfk_1` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nota_dinas_usulan_pemenang`
--
ALTER TABLE `nota_dinas_usulan_pemenang`
  ADD CONSTRAINT `nota_dinas_usulan_pemenang_ibfk_3` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nota_dinas_usulan_pemenang_ibfk_2` FOREIGN KEY (`nama_penyedia`) REFERENCES `pengadaan` (`nama_penyedia`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pakta_integritas_panitia_1`
--
ALTER TABLE `pakta_integritas_panitia_1`
  ADD CONSTRAINT `pakta_integritas_panitia_1_ibfk_5` FOREIGN KEY (`nama`) REFERENCES `pengadaan` (`nama`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pakta_integritas_panitia_1_ibfk_3` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pakta_integritas_panitia_1_ibfk_4` FOREIGN KEY (`kode_panitia`) REFERENCES `pengadaan` (`kode_panitia`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pakta_integritas_penyedia`
--
ALTER TABLE `pakta_integritas_penyedia`
  ADD CONSTRAINT `pakta_integritas_penyedia_ibfk_3` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pakta_integritas_penyedia_ibfk_2` FOREIGN KEY (`nama_pengadaan`) REFERENCES `pengadaan` (`nama_pengadaan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengadaan`
--
ALTER TABLE `pengadaan`
  ADD CONSTRAINT `pengadaan_ibfk_1` FOREIGN KEY (`kode_panitia`) REFERENCES `panitia` (`kode_panitia`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pengadaan_ibfk_2` FOREIGN KEY (`nama`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rks`
--
ALTER TABLE `rks`
  ADD CONSTRAINT `rks_ibfk_1` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `surat_pemberitahuan_pengadaan`
--
ALTER TABLE `surat_pemberitahuan_pengadaan`
  ADD CONSTRAINT `surat_pemberitahuan_pengadaan_ibfk_5` FOREIGN KEY (`nama`) REFERENCES `pengadaan` (`nama`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `surat_pemberitahuan_pengadaan_ibfk_3` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `surat_pemberitahuan_pengadaan_ibfk_4` FOREIGN KEY (`kode_panitia`) REFERENCES `pengadaan` (`kode_panitia`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `surat_pernyataan_minat`
--
ALTER TABLE `surat_pernyataan_minat`
  ADD CONSTRAINT `surat_pernyataan_minat_ibfk_3` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `surat_pernyataan_minat_ibfk_2` FOREIGN KEY (`nama_pengadaan`) REFERENCES `pengadaan` (`nama_pengadaan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `surat_undangan_negosiasi_klarifikasi`
--
ALTER TABLE `surat_undangan_negosiasi_klarifikasi`
  ADD CONSTRAINT `surat_undangan_negosiasi_klarifikasi_ibfk_3` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `surat_undangan_negosiasi_klarifikasi_ibfk_2` FOREIGN KEY (`nama_pengadaan`) REFERENCES `pengadaan` (`nama_pengadaan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `surat_undangan_pembukaan_penawaran`
--
ALTER TABLE `surat_undangan_pembukaan_penawaran`
  ADD CONSTRAINT `surat_undangan_pembukaan_penawaran_ibfk_7` FOREIGN KEY (`nama`) REFERENCES `pengadaan` (`nama`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `surat_undangan_pembukaan_penawaran_ibfk_3` FOREIGN KEY (`no_RKS`) REFERENCES `rks` (`nomor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `surat_undangan_pembukaan_penawaran_ibfk_4` FOREIGN KEY (`nama_pengadaan`) REFERENCES `pengadaan` (`nama_pengadaan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `surat_undangan_pembukaan_penawaran_ibfk_5` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `surat_undangan_pembukaan_penawaran_ibfk_6` FOREIGN KEY (`kode_panitia`) REFERENCES `pengadaan` (`kode_panitia`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `surat_undangan_pengambilan_dokumen_pengadaan`
--
ALTER TABLE `surat_undangan_pengambilan_dokumen_pengadaan`
  ADD CONSTRAINT `surat_undangan_pengambilan_dokumen_pengadaan_ibfk_3` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `surat_undangan_pengambilan_dokumen_pengadaan_ibfk_2` FOREIGN KEY (`nama_pengadaan`) REFERENCES `pengadaan` (`nama_pengadaan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `surat_undangan_penjelasan`
--
ALTER TABLE `surat_undangan_penjelasan`
  ADD CONSTRAINT `surat_undangan_penjelasan_ibfk_6` FOREIGN KEY (`nama`) REFERENCES `pengadaan` (`nama`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `surat_undangan_penjelasan_ibfk_3` FOREIGN KEY (`nama_pengadaan`) REFERENCES `pengadaan` (`nama_pengadaan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `surat_undangan_penjelasan_ibfk_4` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `surat_undangan_penjelasan_ibfk_5` FOREIGN KEY (`kode_panitia`) REFERENCES `pengadaan` (`kode_panitia`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `surat_undangan_prakualifikasi`
--
ALTER TABLE `surat_undangan_prakualifikasi`
  ADD CONSTRAINT `surat_undangan_prakualifikasi_ibfk_1` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE;
