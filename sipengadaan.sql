-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 21, 2013 at 03:12 AM
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
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `NIP` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `id_panitia` bigint(11) NOT NULL,
  `jabatan` varchar(32) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`username`),
  KEY `id_panitia` (`id_panitia`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id`, `username`, `NIP`, `email`, `id_panitia`, `jabatan`) VALUES
(1, 'kevinindra', '123456784', 'kevin@gmail.com', 3, 'Sekretaris'),
(2, 'irvanaditya', '123456785', 'irvan@gmail.com', 4, 'Ketua'),
(3, 'gilanglaksana', '123456786', 'gilang@gmail.com', 3, 'Ketua'),
(4, 'johannesridho', '123456787', 'johan@gmail.com', 4, 'Sekretaris'),
(5, 'haniferidaputra', '123456788', 'he.23292@gmail.com', 3, 'Anggota'),
(6, 'haniferidaputra', '123456788', 'he.23292@gmail.com', 1, 'Ketua'),
(7, 'johannesridho', '123456787', 'johan@gmail.com', 2, 'Ketua');

-- --------------------------------------------------------

--
-- Table structure for table `berita_acara_evaluasi_penawaran`
--

CREATE TABLE IF NOT EXISTS `berita_acara_evaluasi_penawaran` (
  `id_dokumen` bigint(32) NOT NULL,
  `no_RKS` varchar(50) NOT NULL,
  `id_panitia` bigint(11) NOT NULL,
  `nomor` varchar(50) NOT NULL,
  `tanggal_berita_acara` date NOT NULL,
  PRIMARY KEY (`id_dokumen`),
  UNIQUE KEY `nomor` (`nomor`),
  KEY `no_RKS` (`no_RKS`),
  KEY `id_panitia` (`id_panitia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita_acara_evaluasi_penawaran`
--

INSERT INTO `berita_acara_evaluasi_penawaran` (`id_dokumen`, `no_RKS`, `id_panitia`, `nomor`, `tanggal_berita_acara`) VALUES
(987654382, '42/A/33/2013', 2, '43/A/33/2013', '2013-06-06');

-- --------------------------------------------------------

--
-- Table structure for table `berita_acara_negosiasi_klarifikasi`
--

CREATE TABLE IF NOT EXISTS `berita_acara_negosiasi_klarifikasi` (
  `id_dokumen` bigint(32) NOT NULL,
  `nomor` varchar(50) NOT NULL,
  `surat_penawaran_harga` varchar(50) NOT NULL,
  `hak_kewajiban_penyedia` varchar(50) NOT NULL,
  `id_panitia` bigint(11) NOT NULL,
  PRIMARY KEY (`id_dokumen`),
  UNIQUE KEY `nomor` (`nomor`),
  KEY `id_panitia` (`id_panitia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita_acara_negosiasi_klarifikasi`
--

INSERT INTO `berita_acara_negosiasi_klarifikasi` (`id_dokumen`, `nomor`, `surat_penawaran_harga`, `hak_kewajiban_penyedia`, `id_panitia`) VALUES
(987654383, '43/A/33/2013', 'siapa aja bole', 'Menyediakan', 2);

-- --------------------------------------------------------

--
-- Table structure for table `berita_acara_pembukaan_penawaran`
--

CREATE TABLE IF NOT EXISTS `berita_acara_pembukaan_penawaran` (
  `id_dokumen` bigint(32) NOT NULL,
  `nomor` varchar(50) NOT NULL,
  `jumlah_penyedia_diundang` int(10) NOT NULL,
  `jumlah_penyedia_dokumen_sah` int(10) NOT NULL,
  `jumlah_penyedia_dokumen_tidak_sah` int(10) NOT NULL,
  `status_metode` varchar(10) NOT NULL,
  `id_panitia` bigint(11) NOT NULL,
  PRIMARY KEY (`id_dokumen`),
  UNIQUE KEY `nomor` (`nomor`),
  KEY `id_panitia` (`id_panitia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita_acara_pembukaan_penawaran`
--

INSERT INTO `berita_acara_pembukaan_penawaran` (`id_dokumen`, `nomor`, `jumlah_penyedia_diundang`, `jumlah_penyedia_dokumen_sah`, `jumlah_penyedia_dokumen_tidak_sah`, `status_metode`, `id_panitia`) VALUES
(987654384, '44/A/33/2013', 1, 1, 0, 'apa ini', 2);

-- --------------------------------------------------------

--
-- Table structure for table `berita_acara_pengadaan_gagal`
--

CREATE TABLE IF NOT EXISTS `berita_acara_pengadaan_gagal` (
  `id_dokumen` bigint(32) NOT NULL,
  `nomor` varchar(50) NOT NULL,
  `id_panitia` bigint(32) NOT NULL,
  PRIMARY KEY (`id_dokumen`),
  KEY `id_panitia` (`id_panitia`)
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
  `nomor` varchar(50) NOT NULL,
  `id_panitia` bigint(11) NOT NULL,
  PRIMARY KEY (`id_dokumen`),
  UNIQUE KEY `nomor` (`nomor`),
  KEY `id_panitia` (`id_panitia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita_acara_penjelasan`
--

INSERT INTO `berita_acara_penjelasan` (`id_dokumen`, `nomor`, `id_panitia`) VALUES
(987654385, '45/A/33/2013', 2);

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
(987654386, '14.00', 'Ruang rapat besar', 'Aanwijzing'),
(987654415, '14.00', 'Ruang rapat gedung I lantai 5', 'Pembukaan Penawaran'),
(987654416, '14.00', 'Ruang rapat gedung I lantai 50', 'Negoisasi dan Klarifikasi'),
(987654417, '14.00', 'Ruang rapat gedung I lantai 500', 'Evaluasi Penawaran'),
(987654418, '14.00', 'Ruang rapat gedung I lantai 5000', 'Prakualifikasi');

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
  `id_dokumen` bigint(32) NOT NULL,
  `nama_dokumen` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `tempat` varchar(20) NOT NULL,
  `id_pengadaan` bigint(32) NOT NULL,
  `status_upload` varchar(20) NOT NULL,
  PRIMARY KEY (`id_dokumen`),
  KEY `tanggal` (`tanggal`),
  KEY `tempat` (`tempat`),
  KEY `id_pengadaan` (`id_pengadaan`),
  KEY `status_upload` (`status_upload`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dokumen`
--

INSERT INTO `dokumen` (`id_dokumen`, `nama_dokumen`, `tanggal`, `tempat`, `id_pengadaan`, `status_upload`) VALUES
(987654381, 'RKS', '2013-06-04', 'Jakarta', 987654324, 'Selesai'),
(987654382, 'Berita Acara Evaluasi Penawaran', '2013-06-04', 'Jakarta', 987654324, 'Selesai'),
(987654383, 'Berita Acara Negoisasi Klarifikasi', '2013-06-04', 'Jakarta', 987654324, 'Selesai'),
(987654384, 'Berita Acara Pembukaan Penawaran', '2013-06-05', 'Jakarta', 987654324, 'Selesai'),
(987654385, 'Berita Acara Aanwijzing', '2013-06-05', 'Jakarta', 987654324, 'Selesai'),
(987654386, 'Daftar Hadir Aanwijzing', '2013-06-05', 'Jakarta', 987654324, 'Selesai'),
(987654387, 'Dokumen Penawaran', '2013-06-05', 'Jakarta', 987654324, 'Selesai'),
(987654388, 'Nota Dinas Pemberitahuan Pemenang', '2013-06-06', 'Jakarta', 987654324, 'Selesai'),
(987654389, 'Nota Dinas Penetapan Pemenang', '2013-06-06', 'Jakarta', 987654324, 'Selesai'),
(987654390, 'Nota Dinas Perintah Pengadaan', '2013-06-06', 'Jakarta', 987654324, 'Selesai'),
(987654391, 'Nota Dinas Permintaan', '2013-06-06', 'Jakarta', 987654324, 'Selesai'),
(987654392, 'Nota Dinas Usulan Pemenang', '2013-06-07', 'Jakarta', 987654324, 'Selesai'),
(987654393, 'Pakta Integritas Panitia 1', '2013-06-07', 'Jakarta', 987654324, 'Selesai'),
(987654394, 'Pakta Integritas Penyedia', '2013-06-08', 'Jakarta', 987654324, 'Selesai'),
(987654395, 'Surat Pemberitahuan Pengadaan', '2013-06-08', 'Jakarta', 987654324, 'Selesai'),
(987654396, 'Surat Pernyataan Minat', '2013-06-09', 'Jakarta', 987654324, 'Selesai'),
(987654397, 'Surat Undangan Negosiasi dan Klarifikasi', '2013-06-09', 'Jakarta', 987654324, 'Selesai'),
(987654398, 'Surat Undangan Pembukaan Penawaran', '2013-06-10', 'Jakarta', 987654324, 'Selesai'),
(987654399, 'Surat Undangan Pengambilan Dokumen Pengadaan', '2013-06-10', 'Jakarta', 987654324, 'Selesai'),
(987654400, 'Surat Undangan Aanwijzing', '2013-06-10', 'Jakarta', 987654324, 'Selesai'),
(987654405, 'TOR', '0000-00-00', '', 987654324, 'Belum Selesai'),
(987654406, 'RAB', '0000-00-00', '', 987654324, 'Selesai'),
(987654415, 'Daftar Hadir Pembukaan Penawaran', '2013-06-12', 'Jakarta', 987654324, 'Selesai'),
(987654416, 'Daftar Hadir Negoisasi Klarifikasi', '2013-06-13', 'Jakarta', 987654324, 'Selesai'),
(987654417, 'Daftar Hadir Evaluasi Penawaran', '2013-06-14', 'Jakarta', 987654324, 'Selesai'),
(987654418, 'Daftar Hadir Prakualifikasi', '2013-06-15', 'Jakarta', 987654324, 'Selesai'),
(987654419, 'Nota Dinas Permintaan', '2013-06-24', 'Jakarta', 987654325, 'Belum Selesai'),
(987654420, 'TOR', '2013-06-24', 'Jakarta', 987654325, 'Belum Selesai'),
(987654421, 'RAB', '2013-06-24', 'Jakarta', 987654325, 'Belum Selesai'),
(987654422, 'Nota Dinas Perintah Pengadaan', '2013-06-19', 'Jakarta', 987654325, 'Belum Selesai'),
(987654423, 'Nota Dinas Permintaan', '2013-06-06', 'Jakarta', 987654326, 'Belum Selesai'),
(987654424, 'TOR', '2013-06-06', 'Jakarta', 987654326, 'Belum Selesai'),
(987654425, 'RAB', '2013-06-06', 'Jakarta', 987654326, 'Belum Selesai'),
(987654426, 'Nota Dinas Perintah Pengadaan', '2013-06-10', 'Jakarta', 987654326, 'Belum Selesai'),
(987654427, 'Nota Dinas Permintaan', '2013-06-06', 'Jakarta', 987654327, 'Belum Selesai'),
(987654428, 'TOR', '2013-06-06', 'Jakarta', 987654327, 'Belum Selesai'),
(987654429, 'RAB', '2013-06-06', 'Jakarta', 987654327, 'Belum Selesai'),
(987654430, 'Nota Dinas Perintah Pengadaan', '2013-06-11', 'Jakarta', 987654327, 'Belum Selesai'),
(987654431, 'Pakta Integritas Awal Panitia', '2013-06-17', 'Jakarta', 987654327, 'Belum Selesai'),
(987654432, 'RKS', '2013-06-17', 'Jakarta', 987654327, 'Belum Selesai'),
(987654433, 'Pakta Integritas Awal Panitia', '2013-06-17', 'Jakarta', 987654326, 'Belum Selesai'),
(987654434, 'RKS', '2013-06-17', 'Jakarta', 987654326, 'Belum Selesai'),
(987654435, 'Surat Undangan Prakualifikasi', '2013-06-20', 'Jakarta', 987654326, 'Belum Selesai'),
(987654436, 'Pakta Integritas Penyedia', '2013-06-20', '-', 987654326, 'Belum Selesai'),
(987654437, 'Surat Pemberitahuan Pengadaan', '2013-06-20', 'Jakarta', 987654326, 'Belum Selesai'),
(987654438, 'Surat Pernyataan Minat', '2013-06-20', '-', 987654326, 'Belum Selesai'),
(987654439, 'Form Isian Kualifikasi', '2013-06-20', '-', 987654326, 'Belum Selesai'),
(987654440, 'Surat Undangan Pengambilan Dokumen Pengadaan', '2013-06-28', 'Jakarta', 987654326, 'Belum Selesai'),
(987654441, 'Pakta Integritas Awal Panitia', '2013-06-17', 'Jakarta', 987654325, 'Belum Selesai'),
(987654442, 'RKS', '2013-06-17', 'Jakarta', 987654325, 'Belum Selesai'),
(987654443, 'Surat Undangan Prakualifikasi', '2013-06-19', 'Jakarta', 987654325, 'Belum Selesai'),
(987654444, 'Pakta Integritas Penyedia', '2013-06-19', '-', 987654325, 'Belum Selesai'),
(987654445, 'Surat Pemberitahuan Pengadaan', '2013-06-19', 'Jakarta', 987654325, 'Belum Selesai'),
(987654446, 'Surat Pernyataan Minat', '2013-06-19', '-', 987654325, 'Belum Selesai'),
(987654447, 'Form Isian Kualifikasi', '2013-06-19', '-', 987654325, 'Belum Selesai');

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

INSERT INTO `form_isian_kualifikasi` (`id_dokumen`) VALUES
(987654439),
(987654447);

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
-- Table structure for table `link_dokumen`
--

CREATE TABLE IF NOT EXISTS `link_dokumen` (
  `id_link` bigint(32) NOT NULL,
  `id_dokumen` bigint(32) NOT NULL,
  `waktu_upload` time DEFAULT NULL,
  `tanggal_upload` date DEFAULT NULL,
  `pengunggah` varchar(32) DEFAULT NULL,
  `nomor_link` int(11) DEFAULT NULL,
  `format_dokumen` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`id_link`),
  KEY `id_dokumen` (`id_dokumen`),
  KEY `pengunggah` (`pengunggah`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `link_dokumen`
--

INSERT INTO `link_dokumen` (`id_link`, `id_dokumen`, `waktu_upload`, `tanggal_upload`, `pengunggah`, `nomor_link`, `format_dokumen`) VALUES
(41, 987654381, '08:00:00', '2013-06-19', 'haniferidaputra', 1, 'pdf'),
(42, 987654382, '08:00:00', '2013-06-19', 'haniferidaputra', 1, 'pdf'),
(43, 987654383, '08:00:00', '2013-06-19', 'haniferidaputra', 1, 'pdf'),
(44, 987654384, '08:00:00', '2013-06-19', 'haniferidaputra', 1, 'pdf'),
(45, 987654385, '08:00:00', '2013-06-19', 'haniferidaputra', 1, 'pdf'),
(46, 987654386, '08:00:00', '2013-06-19', 'haniferidaputra', 1, 'pdf'),
(47, 987654387, '08:00:00', '2013-06-19', 'haniferidaputra', 1, 'pdf'),
(48, 987654388, '08:00:00', '2013-06-19', 'haniferidaputra', 1, 'pdf'),
(49, 987654389, '08:00:00', '2013-06-19', 'haniferidaputra', 1, 'pdf'),
(50, 987654390, '08:00:00', '2013-06-19', 'haniferidaputra', 1, 'pdf'),
(51, 987654391, '08:00:00', '2013-06-19', 'haniferidaputra', 1, 'pdf'),
(52, 987654392, '08:00:00', '2013-06-19', 'haniferidaputra', 1, 'pdf'),
(53, 987654393, '08:00:00', '2013-06-19', 'haniferidaputra', 1, 'pdf'),
(54, 987654394, '08:00:00', '2013-06-19', 'haniferidaputra', 1, 'pdf'),
(55, 987654395, '08:00:00', '2013-06-19', 'haniferidaputra', 1, 'pdf'),
(56, 987654396, '08:00:00', '2013-06-19', 'haniferidaputra', 1, 'pdf'),
(57, 987654397, '08:00:00', '2013-06-19', 'haniferidaputra', 1, 'pdf'),
(58, 987654398, '08:00:00', '2013-06-19', 'haniferidaputra', 1, 'pdf'),
(59, 987654399, '08:00:00', '2013-06-19', 'haniferidaputra', 1, 'pdf'),
(60, 987654400, '08:00:00', '2013-06-19', 'haniferidaputra', 1, 'pdf'),
(65, 987654405, '08:00:00', '2013-06-19', 'haniferidaputra', 1, 'pdf'),
(66, 987654406, '08:00:00', '2013-06-19', 'haniferidaputra', 1, 'pdf'),
(75, 987654415, '08:00:00', '2013-06-19', 'haniferidaputra', 1, 'pdf'),
(76, 987654416, '08:00:00', '2013-06-19', 'haniferidaputra', 1, 'pdf'),
(77, 987654417, '08:00:00', '2013-06-19', 'haniferidaputra', 1, 'pdf'),
(78, 987654418, '08:00:00', '2013-06-19', 'haniferidaputra', 1, 'pdf');

-- --------------------------------------------------------

--
-- Table structure for table `nota_dinas_pemberitahuan_pemenang`
--

CREATE TABLE IF NOT EXISTS `nota_dinas_pemberitahuan_pemenang` (
  `id_dokumen` bigint(32) NOT NULL,
  `nomor` varchar(50) NOT NULL,
  `dari` varchar(50) NOT NULL,
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

INSERT INTO `nota_dinas_pemberitahuan_pemenang` (`id_dokumen`, `nomor`, `dari`, `nama_penyedia`, `alamat`, `NPWP`, `biaya`, `waktu_pelaksanaan`, `tempat_penyerahan`) VALUES
(987654388, '48/A/33/2013', 'Ketua panitia Pengadaan barang dan jasa', 'Samsung', 'Jl.samsungjamil No 57 Jakarta Pusat', '1234567', 499000000, '2013-06-07', 'Jakarta');

-- --------------------------------------------------------

--
-- Table structure for table `nota_dinas_penetapan_pemenang`
--

CREATE TABLE IF NOT EXISTS `nota_dinas_penetapan_pemenang` (
  `id_dokumen` bigint(32) NOT NULL,
  `nomor` varchar(50) NOT NULL,
  `kepada` varchar(20) NOT NULL,
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

INSERT INTO `nota_dinas_penetapan_pemenang` (`id_dokumen`, `nomor`, `kepada`, `nama_penyedia`, `alamat`, `NPWP`, `biaya`, `waktu_pelaksanaan`, `tempat_penyerahan`, `sumber_dana`, `jangka_waktu_berlaku`, `jangka_waktu_deadline`) VALUES
(987654389, '49/A/33/2013', 'Samsung', 'Samsung', 'Jl.samsungjamil No 57 Jakarta Pusat', '1234567', 499000000, '2013-06-09', 'Jakarta', 'Uang Kas PLN', '7', '14');

-- --------------------------------------------------------

--
-- Table structure for table `nota_dinas_perintah_pengadaan`
--

CREATE TABLE IF NOT EXISTS `nota_dinas_perintah_pengadaan` (
  `id_dokumen` bigint(32) NOT NULL,
  `nota_dinas_permintaan` varchar(50) NOT NULL,
  `nomor` varchar(50) NOT NULL,
  `dari` varchar(20) NOT NULL,
  `kepada` varchar(100) NOT NULL,
  `perihal` varchar(100) NOT NULL,
  `RAB` varchar(20) NOT NULL,
  `TOR_RKS` varchar(32) NOT NULL,
  `targetSPK_kontrak` int(32) NOT NULL,
  `sumber_dana` varchar(20) NOT NULL,
  `pagu_anggaran` varchar(20) NOT NULL,
  PRIMARY KEY (`id_dokumen`),
  KEY `nota_dinas_permintaan` (`nota_dinas_permintaan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nota_dinas_perintah_pengadaan`
--

INSERT INTO `nota_dinas_perintah_pengadaan` (`id_dokumen`, `nota_dinas_permintaan`, `nomor`, `dari`, `kepada`, `perihal`, `RAB`, `TOR_RKS`, `targetSPK_kontrak`, `sumber_dana`, `pagu_anggaran`) VALUES
(987654390, '51/A/33/2013', '50/A/33/2013', 'Kdivmum', 'Ketua panitia Pengadaan barang dan jasa', 'Perintah pengadaan alat komunikasi PLN', 'Terlampir', 'Terlampir', 48, 'Kas PLN', 'xxx'),
(987654422, '045/DVMAM/2013', '035/DVMUM/2013', 'KDIVMUM', 'Irvan Aditya', 'Penunjukan Panitia Pengadaan Baju Dinas', 'Terlampir', 'Terlampir', 78, 'Kas PLN', '100.000.000'),
(987654426, '045/DVIN/2013', '095/DVMUM/2013', 'MSDAF', 'Hanif Eridaputra', 'Penunjukan Pejabat Pengadaan Internet', 'Terlampir', 'Terlampir', 56, 'Kas PLN', '10.000.000'),
(987654430, '073/DIVTRANS/2013', '029/DMUM/2013', 'KDIVMUM', 'Kevin Indra', 'Penunjukan Panitia Pengadaan Sewa Mobil', 'Terlampir', 'Terlampir', 90, 'Kas PLN', '100.000.000');

-- --------------------------------------------------------

--
-- Table structure for table `nota_dinas_permintaan`
--

CREATE TABLE IF NOT EXISTS `nota_dinas_permintaan` (
  `id_dokumen` bigint(32) NOT NULL,
  `nomor` varchar(50) NOT NULL,
  PRIMARY KEY (`id_dokumen`),
  UNIQUE KEY `nomor` (`nomor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nota_dinas_permintaan`
--

INSERT INTO `nota_dinas_permintaan` (`id_dokumen`, `nomor`) VALUES
(987654423, '045/DVIN/2013'),
(987654419, '045/DVMAM/2013'),
(987654427, '073/DIVTRANS/2013'),
(987654391, '51/A/33/2013');

-- --------------------------------------------------------

--
-- Table structure for table `nota_dinas_usulan_pemenang`
--

CREATE TABLE IF NOT EXISTS `nota_dinas_usulan_pemenang` (
  `id_dokumen` bigint(32) NOT NULL,
  `nomor` varchar(50) NOT NULL,
  `dari` varchar(50) NOT NULL,
  `nama_penyedia` varchar(50) NOT NULL,
  `nama_penyedia_2` varchar(50) NOT NULL,
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

INSERT INTO `nota_dinas_usulan_pemenang` (`id_dokumen`, `nomor`, `dari`, `nama_penyedia`, `nama_penyedia_2`, `alamat`, `NPWP`, `biaya`, `waktu_pelaksanaan`, `tempat_penyerahan`) VALUES
(987654392, '52/A/33/2013', 'ketua panitia Pengadaan barang dan jasa', 'Samsung', '0', 'Jl.samsungjamil No 57 Jakarta Pusat', '1234567', 499000000, '2013-06-08', 'Jakarta');

-- --------------------------------------------------------

--
-- Table structure for table `pakta_integritas_panitia_1`
--

CREATE TABLE IF NOT EXISTS `pakta_integritas_panitia_1` (
  `id_dokumen` bigint(32) NOT NULL,
  `id_panitia` bigint(11) NOT NULL,
  PRIMARY KEY (`id_dokumen`),
  KEY `id_panitia` (`id_panitia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pakta_integritas_panitia_1`
--

INSERT INTO `pakta_integritas_panitia_1` (`id_dokumen`, `id_panitia`) VALUES
(987654433, 1),
(987654393, 2),
(987654431, 3),
(987654441, 4);

-- --------------------------------------------------------

--
-- Table structure for table `pakta_integritas_penyedia`
--

CREATE TABLE IF NOT EXISTS `pakta_integritas_penyedia` (
  `id_dokumen` bigint(32) NOT NULL,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pakta_integritas_penyedia`
--

INSERT INTO `pakta_integritas_penyedia` (`id_dokumen`) VALUES
(987654394),
(987654436),
(987654444);

-- --------------------------------------------------------

--
-- Table structure for table `panitia`
--

CREATE TABLE IF NOT EXISTS `panitia` (
  `id_panitia` bigint(11) NOT NULL,
  `nama_panitia` varchar(50) NOT NULL,
  `tahun` int(11) NOT NULL,
  `jumlah_panitia` bigint(20) NOT NULL,
  `status_panitia` varchar(32) NOT NULL,
  `jenis_panitia` varchar(20) NOT NULL,
  PRIMARY KEY (`id_panitia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `panitia`
--

INSERT INTO `panitia` (`id_panitia`, `nama_panitia`, `tahun`, `jumlah_panitia`, `status_panitia`, `jenis_panitia`) VALUES
(1, 'Hanif Eridaputra', 2013, 1, 'Aktif', 'Pejabat'),
(2, 'Johannes Ridho', 2013, 1, 'Aktif', 'Pejabat'),
(3, 'Panitia-A', 2013, 3, 'Aktif', 'Panitia'),
(4, 'Panitia-B', 2013, 2, 'Aktif', 'Panitia'),
(5, 'Panitia-C', 2012, 0, 'Tidak Aktif', 'Panitia');

-- --------------------------------------------------------

--
-- Table structure for table `pengadaan`
--

CREATE TABLE IF NOT EXISTS `pengadaan` (
  `id_pengadaan` bigint(32) NOT NULL,
  `divisi_peminta` varchar(32) NOT NULL,
  `nama_pengadaan` varchar(100) NOT NULL,
  `nama_penyedia` varchar(32) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `status` varchar(32) NOT NULL,
  `biaya` bigint(20) NOT NULL,
  `id_panitia` bigint(11) NOT NULL,
  `metode_pengadaan` varchar(32) NOT NULL,
  `metode_penawaran` varchar(32) NOT NULL,
  `jenis_kualifikasi` varchar(32) NOT NULL,
  PRIMARY KEY (`id_pengadaan`),
  KEY `nama_penyedia` (`nama_penyedia`),
  KEY `tanggal_masuk` (`tanggal_masuk`),
  KEY `tanggal_selesai` (`tanggal_selesai`),
  KEY `status` (`status`),
  KEY `biaya` (`biaya`),
  KEY `metode_pengadaan` (`metode_pengadaan`),
  KEY `metode_penawaran` (`metode_penawaran`),
  KEY `nama_pengadaan` (`nama_pengadaan`),
  KEY `id_panitia` (`id_panitia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengadaan`
--

INSERT INTO `pengadaan` (`id_pengadaan`, `divisi_peminta`, `nama_pengadaan`, `nama_penyedia`, `tanggal_masuk`, `tanggal_selesai`, `status`, `biaya`, `id_panitia`, `metode_pengadaan`, `metode_penawaran`, `jenis_kualifikasi`) VALUES
(987654324, 'Divisi Sistem Informasi', 'Pengadaan alat komunikasi', 'Samsung', '2013-06-04', '2013-06-10', 'Selesai', 499000000, 2, 'Penunjukan Langsung', 'Dua Sampul', 'Pasca Kualifikasi'),
(987654325, 'Divisi Manajemen', 'Pengadaan Baju Dinas', '-', '2013-06-19', '0000-00-00', 'Pengambilan Dokumen Pengadaan', 0, 4, 'Pelelangan', 'Dua Tahap', 'Pra Kualifikasi'),
(987654326, 'Divisi Internet', 'Pengadaan Internet', '-', '2013-06-10', '0000-00-00', 'Aanwijzing', 0, 1, 'Penunjukan Langsung', 'Satu Sampul', 'Pra Kualifikasi'),
(987654327, 'Divisi Transportasi', 'Pengadaan Sewa Mobil', '-', '2013-06-11', '0000-00-00', 'Kualifikasi', 0, 3, 'Pemilihan Langsung', 'Dua Sampul', 'Pasca Kualifikasi');

-- --------------------------------------------------------

--
-- Table structure for table `rab`
--

CREATE TABLE IF NOT EXISTS `rab` (
  `id_dokumen` bigint(32) NOT NULL,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rab`
--

INSERT INTO `rab` (`id_dokumen`) VALUES
(987654406);

-- --------------------------------------------------------

--
-- Table structure for table `rks`
--

CREATE TABLE IF NOT EXISTS `rks` (
  `id_dokumen` bigint(32) NOT NULL,
  `nomor` varchar(50) NOT NULL,
  PRIMARY KEY (`id_dokumen`),
  KEY `nomor` (`nomor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rks`
--

INSERT INTO `rks` (`id_dokumen`, `nomor`) VALUES
(987654434, '011/PPJB-A/DIVMUM/2013'),
(987654432, '021/PPJB-A/DIVMUM/2013'),
(987654442, '031/PPJB-B/DIVMUM/2013'),
(987654381, '42/A/33/2013');

-- --------------------------------------------------------

--
-- Table structure for table `surat_pemberitahuan_pengadaan`
--

CREATE TABLE IF NOT EXISTS `surat_pemberitahuan_pengadaan` (
  `id_dokumen` bigint(32) NOT NULL,
  `nomor` varchar(50) NOT NULL,
  `id_panitia` bigint(11) NOT NULL,
  `perihal` varchar(50) NOT NULL,
  `lingkup_kerja` varchar(32) NOT NULL,
  `tanggal_penawaran` date NOT NULL,
  `waktu_kerja` varchar(20) NOT NULL,
  PRIMARY KEY (`id_dokumen`),
  UNIQUE KEY `nomor` (`nomor`),
  KEY `id_panitia` (`id_panitia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_pemberitahuan_pengadaan`
--

INSERT INTO `surat_pemberitahuan_pengadaan` (`id_dokumen`, `nomor`, `id_panitia`, `perihal`, `lingkup_kerja`, `tanggal_penawaran`, `waktu_kerja`) VALUES
(987654395, '55/A/33/2013', 2, 'Pemberitahuan pengadaan alat komunikasi', 'Pengadaan alat komun', '2013-06-19', '7'),
(987654437, '012/PPJB-A/DIVMUM/2013', 1, 'Pemberitahuan Pengadaan Internet', 'Penyediaan Fasilitas', '2013-06-24', '78'),
(987654445, '032/PPJB-B/DIVMUM/2013', 4, 'Pemberitahuan Pengadaan Baju Dinas', 'Pembelian Baju', '2013-06-21', '89');

-- --------------------------------------------------------

--
-- Table structure for table `surat_pernyataan_minat`
--

CREATE TABLE IF NOT EXISTS `surat_pernyataan_minat` (
  `id_dokumen` bigint(32) NOT NULL,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_pernyataan_minat`
--

INSERT INTO `surat_pernyataan_minat` (`id_dokumen`) VALUES
(987654396),
(987654438),
(987654446);

-- --------------------------------------------------------

--
-- Table structure for table `surat_undangan_negosiasi_klarifikasi`
--

CREATE TABLE IF NOT EXISTS `surat_undangan_negosiasi_klarifikasi` (
  `id_dokumen` bigint(32) NOT NULL,
  `nomor` varchar(50) NOT NULL,
  `perihal` varchar(100) NOT NULL,
  `kepada` varchar(30) NOT NULL,
  `tanggal_undangan` date NOT NULL,
  `waktu` varchar(14) NOT NULL,
  `tempat` varchar(100) NOT NULL,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_undangan_negosiasi_klarifikasi`
--

INSERT INTO `surat_undangan_negosiasi_klarifikasi` (`id_dokumen`, `nomor`, `perihal`, `kepada`, `tanggal_undangan`, `waktu`, `tempat`) VALUES
(987654397, '57/A/33/2013', 'Pemberitahuan Hasil Evaluasi Penilaian dan Undangan Rapat Klarifikasi & Negosiasi', 'Direktur Samsung', '2013-06-08', '14.00', 'Ruang rapat Gedung I lantai 50');

-- --------------------------------------------------------

--
-- Table structure for table `surat_undangan_pembukaan_penawaran`
--

CREATE TABLE IF NOT EXISTS `surat_undangan_pembukaan_penawaran` (
  `id_dokumen` bigint(32) NOT NULL,
  `id_panitia` bigint(11) NOT NULL,
  `nomor` varchar(50) NOT NULL,
  `perihal` varchar(100) NOT NULL,
  `tanggal_undangan` date NOT NULL,
  `waktu` varchar(20) NOT NULL,
  `tempat` varchar(100) NOT NULL,
  PRIMARY KEY (`id_dokumen`),
  UNIQUE KEY `nomor` (`nomor`),
  KEY `id_panitia` (`id_panitia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_undangan_pembukaan_penawaran`
--

INSERT INTO `surat_undangan_pembukaan_penawaran` (`id_dokumen`, `id_panitia`, `nomor`, `perihal`, `tanggal_undangan`, `waktu`, `tempat`) VALUES
(987654398, 2, '58/A/33/2013', 'Pembukaan penawaran alat komunikasi', '2013-06-06', '14.00', 'Ruang rapat Gedung I lantai 500');

-- --------------------------------------------------------

--
-- Table structure for table `surat_undangan_pengambilan_dokumen_pengadaan`
--

CREATE TABLE IF NOT EXISTS `surat_undangan_pengambilan_dokumen_pengadaan` (
  `id_dokumen` bigint(32) NOT NULL,
  `nomor` varchar(50) NOT NULL,
  `perihal` varchar(100) NOT NULL,
  `tanggal_pengambilan` date NOT NULL,
  `waktu_pengambilan` varchar(12) NOT NULL,
  `tempat_pengambilan` varchar(100) NOT NULL,
  PRIMARY KEY (`id_dokumen`),
  UNIQUE KEY `nomor` (`nomor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_undangan_pengambilan_dokumen_pengadaan`
--

INSERT INTO `surat_undangan_pengambilan_dokumen_pengadaan` (`id_dokumen`, `nomor`, `perihal`, `tanggal_pengambilan`, `waktu_pengambilan`, `tempat_pengambilan`) VALUES
(987654399, '59/A/33/2013', 'Undangan Pengambilan Dokumen Pengadaan Barang/Jasa danJadwal Pelaksanaan Lelang ', '2013-06-25', '14.00', 'PLN'),
(987654440, '013/PPJB-A/DIVMUM/2013', 'Undangan Pengambilan Dokumen RKS dari Pengadaan Internet', '2013-07-01', '10:00', 'Gedung Utama Lt.2\r\nKantor Pusat PLN');

-- --------------------------------------------------------

--
-- Table structure for table `surat_undangan_penjelasan`
--

CREATE TABLE IF NOT EXISTS `surat_undangan_penjelasan` (
  `id_dokumen` bigint(32) NOT NULL,
  `nomor` varchar(50) NOT NULL,
  `id_panitia` bigint(11) NOT NULL,
  `perihal` varchar(100) NOT NULL,
  `tanggal_undangan` date NOT NULL,
  `waktu` varchar(20) NOT NULL,
  `tempat` varchar(100) NOT NULL,
  PRIMARY KEY (`id_dokumen`),
  KEY `id_panitia` (`id_panitia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_undangan_penjelasan`
--

INSERT INTO `surat_undangan_penjelasan` (`id_dokumen`, `nomor`, `id_panitia`, `perihal`, `tanggal_undangan`, `waktu`, `tempat`) VALUES
(987654400, '60/A/33/2013', 2, 'Penjelsan pekerjaan pengadaan alat komunikasi', '2013-06-07', '14.00', 'Ruang rapat Gedung I lantai 500');

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

INSERT INTO `surat_undangan_prakualifikasi` (`id_dokumen`) VALUES
(987654435),
(987654443);

-- --------------------------------------------------------

--
-- Table structure for table `tor`
--

CREATE TABLE IF NOT EXISTS `tor` (
  `id_dokumen` bigint(32) NOT NULL,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tor`
--

INSERT INTO `tor` (`id_dokumen`) VALUES
(987654405);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(20) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `password` varchar(24) NOT NULL,
  `divisi` varchar(32) NOT NULL,
  `status_user` varchar(32) NOT NULL,
  PRIMARY KEY (`username`),
  KEY `nama` (`nama`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `nama`, `password`, `divisi`, `status_user`) VALUES
('aidilsyaputra', 'Aidil Syaputra', 'aidil', 'Divisi Umum', 'Aktif'),
('gilanglaksana', 'Gilang Laksana', 'gilang', 'Divisi Umum', 'Aktif'),
('haniferidaputra', 'Hanif Eridaputra', 'hanif', 'Divisi Umum', 'Aktif'),
('irvanaditya', 'Irvan Aditya', 'irvan', 'Divisi Umum', 'Aktif'),
('jo', 'johan', 'jo', 'Divisi Khusus', 'Aktif'),
('johannesridho', 'Johannes Ridho', 'johan', 'Divisi Umum', 'Aktif'),
('kadiv', 'kadiv', 'kadiv', 'Divisi Umum', 'Tidak Aktif'),
('kevinindra', 'Kevin Indra', 'kevin', 'Divisi Umum', 'Aktif'),
('panitia', 'panitia', 'panitia', 'Divisi Umum', 'Aktif');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `anggota`
--
ALTER TABLE `anggota`
  ADD CONSTRAINT `anggota_ibfk_2` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `anggota_ibfk_3` FOREIGN KEY (`id_panitia`) REFERENCES `panitia` (`id_panitia`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `berita_acara_evaluasi_penawaran`
--
ALTER TABLE `berita_acara_evaluasi_penawaran`
  ADD CONSTRAINT `berita_acara_evaluasi_penawaran_ibfk_2` FOREIGN KEY (`no_RKS`) REFERENCES `rks` (`nomor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `berita_acara_evaluasi_penawaran_ibfk_5` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `berita_acara_evaluasi_penawaran_ibfk_6` FOREIGN KEY (`id_panitia`) REFERENCES `pengadaan` (`id_panitia`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `berita_acara_negosiasi_klarifikasi`
--
ALTER TABLE `berita_acara_negosiasi_klarifikasi`
  ADD CONSTRAINT `berita_acara_negosiasi_klarifikasi_ibfk_3` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `berita_acara_negosiasi_klarifikasi_ibfk_4` FOREIGN KEY (`id_panitia`) REFERENCES `pengadaan` (`id_panitia`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `berita_acara_pembukaan_penawaran`
--
ALTER TABLE `berita_acara_pembukaan_penawaran`
  ADD CONSTRAINT `berita_acara_pembukaan_penawaran_ibfk_3` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `berita_acara_pembukaan_penawaran_ibfk_4` FOREIGN KEY (`id_panitia`) REFERENCES `pengadaan` (`id_panitia`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `berita_acara_pengadaan_gagal`
--
ALTER TABLE `berita_acara_pengadaan_gagal`
  ADD CONSTRAINT `berita_acara_pengadaan_gagal_ibfk_1` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `berita_acara_pengadaan_gagal_ibfk_2` FOREIGN KEY (`id_panitia`) REFERENCES `panitia` (`id_panitia`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `berita_acara_penjelasan`
--
ALTER TABLE `berita_acara_penjelasan`
  ADD CONSTRAINT `berita_acara_penjelasan_ibfk_3` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `berita_acara_penjelasan_ibfk_4` FOREIGN KEY (`id_panitia`) REFERENCES `pengadaan` (`id_panitia`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `link_dokumen`
--
ALTER TABLE `link_dokumen`
  ADD CONSTRAINT `link_dokumen_ibfk_1` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `link_dokumen_ibfk_2` FOREIGN KEY (`pengunggah`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nota_dinas_pemberitahuan_pemenang`
--
ALTER TABLE `nota_dinas_pemberitahuan_pemenang`
  ADD CONSTRAINT `nota_dinas_pemberitahuan_pemenang_ibfk_2` FOREIGN KEY (`nama_penyedia`) REFERENCES `pengadaan` (`nama_penyedia`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nota_dinas_pemberitahuan_pemenang_ibfk_3` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nota_dinas_penetapan_pemenang`
--
ALTER TABLE `nota_dinas_penetapan_pemenang`
  ADD CONSTRAINT `nota_dinas_penetapan_pemenang_ibfk_2` FOREIGN KEY (`nama_penyedia`) REFERENCES `pengadaan` (`nama_penyedia`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nota_dinas_penetapan_pemenang_ibfk_3` FOREIGN KEY (`kepada`) REFERENCES `pengadaan` (`nama_penyedia`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nota_dinas_penetapan_pemenang_ibfk_4` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nota_dinas_perintah_pengadaan`
--
ALTER TABLE `nota_dinas_perintah_pengadaan`
  ADD CONSTRAINT `nota_dinas_perintah_pengadaan_ibfk_2` FOREIGN KEY (`nota_dinas_permintaan`) REFERENCES `nota_dinas_permintaan` (`nomor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nota_dinas_perintah_pengadaan_ibfk_3` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nota_dinas_permintaan`
--
ALTER TABLE `nota_dinas_permintaan`
  ADD CONSTRAINT `nota_dinas_permintaan_ibfk_1` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nota_dinas_usulan_pemenang`
--
ALTER TABLE `nota_dinas_usulan_pemenang`
  ADD CONSTRAINT `nota_dinas_usulan_pemenang_ibfk_2` FOREIGN KEY (`nama_penyedia`) REFERENCES `pengadaan` (`nama_penyedia`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nota_dinas_usulan_pemenang_ibfk_3` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pakta_integritas_panitia_1`
--
ALTER TABLE `pakta_integritas_panitia_1`
  ADD CONSTRAINT `pakta_integritas_panitia_1_ibfk_3` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pakta_integritas_panitia_1_ibfk_4` FOREIGN KEY (`id_panitia`) REFERENCES `pengadaan` (`id_panitia`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pakta_integritas_penyedia`
--
ALTER TABLE `pakta_integritas_penyedia`
  ADD CONSTRAINT `pakta_integritas_penyedia_ibfk_3` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengadaan`
--
ALTER TABLE `pengadaan`
  ADD CONSTRAINT `pengadaan_ibfk_1` FOREIGN KEY (`id_panitia`) REFERENCES `panitia` (`id_panitia`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rab`
--
ALTER TABLE `rab`
  ADD CONSTRAINT `rab_ibfk_1` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rks`
--
ALTER TABLE `rks`
  ADD CONSTRAINT `rks_ibfk_1` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `surat_pemberitahuan_pengadaan`
--
ALTER TABLE `surat_pemberitahuan_pengadaan`
  ADD CONSTRAINT `surat_pemberitahuan_pengadaan_ibfk_3` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `surat_pemberitahuan_pengadaan_ibfk_4` FOREIGN KEY (`id_panitia`) REFERENCES `pengadaan` (`id_panitia`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `surat_pernyataan_minat`
--
ALTER TABLE `surat_pernyataan_minat`
  ADD CONSTRAINT `surat_pernyataan_minat_ibfk_3` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `surat_undangan_negosiasi_klarifikasi`
--
ALTER TABLE `surat_undangan_negosiasi_klarifikasi`
  ADD CONSTRAINT `surat_undangan_negosiasi_klarifikasi_ibfk_3` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `surat_undangan_pembukaan_penawaran`
--
ALTER TABLE `surat_undangan_pembukaan_penawaran`
  ADD CONSTRAINT `surat_undangan_pembukaan_penawaran_ibfk_5` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `surat_undangan_pembukaan_penawaran_ibfk_6` FOREIGN KEY (`id_panitia`) REFERENCES `pengadaan` (`id_panitia`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `surat_undangan_pengambilan_dokumen_pengadaan`
--
ALTER TABLE `surat_undangan_pengambilan_dokumen_pengadaan`
  ADD CONSTRAINT `surat_undangan_pengambilan_dokumen_pengadaan_ibfk_3` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `surat_undangan_penjelasan`
--
ALTER TABLE `surat_undangan_penjelasan`
  ADD CONSTRAINT `surat_undangan_penjelasan_ibfk_4` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `surat_undangan_penjelasan_ibfk_5` FOREIGN KEY (`id_panitia`) REFERENCES `pengadaan` (`id_panitia`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `surat_undangan_prakualifikasi`
--
ALTER TABLE `surat_undangan_prakualifikasi`
  ADD CONSTRAINT `surat_undangan_prakualifikasi_ibfk_1` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tor`
--
ALTER TABLE `tor`
  ADD CONSTRAINT `tor_ibfk_1` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE;
