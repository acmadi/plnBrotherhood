-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 25, 2013 at 07:37 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sipengadaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(20) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`) VALUES
('jo');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

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
(7, 'johannesridho', '123456787', 'johan@gmail.com', 2, 'Ketua'),
(8, 'b', '123123', 'bb@bb.bb', 3, 'asda');

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

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE IF NOT EXISTS `divisi` (
  `username` varchar(20) NOT NULL,
  `jumlah_berlangsung` bigint(32) NOT NULL,
  `jumlah_selesai` bigint(32) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`username`, `jumlah_berlangsung`, `jumlah_selesai`) VALUES
('divin', 1, 0),
('divman', 1, 0),
('divsi', 0, 1),
('divtrans', 1, 0);

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
(14, 'Nota Dinas Permintaan', '2013-06-20', 'Jakarta', 3, 'Belum Selesai'),
(15, 'TOR', '2013-06-20', 'Jakarta', 3, 'Belum Selesai'),
(16, 'RAB', '2013-06-20', 'Jakarta', 3, 'Belum Selesai'),
(17, 'Nota Dinas Perintah Pengadaan', '2013-06-12', 'Jakarta', 3, 'Belum Selesai'),
(18, 'Nota Dinas Permintaan', '2013-06-13', 'Jakarta', 4, 'Belum Selesai'),
(19, 'TOR', '2013-06-13', 'Jakarta', 4, 'Belum Selesai'),
(20, 'RAB', '2013-06-13', 'Jakarta', 4, 'Belum Selesai'),
(21, 'Nota Dinas Perintah Pengadaan', '2013-06-28', 'Jakarta', 4, 'Belum Selesai'),
(22, 'Nota Dinas Permintaan', '2013-06-14', 'Jakarta', 5, 'Belum Selesai'),
(23, 'TOR', '2013-06-14', 'Jakarta', 5, 'Belum Selesai'),
(24, 'RAB', '2013-06-14', 'Jakarta', 5, 'Belum Selesai'),
(25, 'Nota Dinas Perintah Pengadaan', '2013-06-14', 'Jakarta', 5, 'Belum Selesai'),
(26, 'Pakta Integritas Awal Panitia', '2013-06-04', 'Jakarta', 3, 'Selesai'),
(27, 'RKS', '2013-06-04', 'Jakarta', 3, 'Belum Selesai'),
(28, 'HPS', '2013-06-14', 'Jakarta', 3, 'Belum Selesai'),
(29, 'Pakta Integritas Penyedia', '0000-00-00', '-', 3, 'Belum Selesai'),
(30, 'Surat Pengantar Penawaran Harga', '0000-00-00', 'Jakarta', 3, 'Belum Selesai'),
(31, 'Surat Pernyataan Minat', '0000-00-00', '-', 3, 'Belum Selesai'),
(32, 'Form Isian Kualifikasi', '0000-00-00', '-', 3, 'Belum Selesai'),
(33, 'Pakta Integritas Penyedia', '0000-00-00', '-', 3, 'Belum Selesai'),
(34, 'Surat Pengantar Penawaran Harga', '0000-00-00', 'Jakarta', 3, 'Belum Selesai'),
(35, 'Surat Pernyataan Minat', '0000-00-00', '-', 3, 'Belum Selesai'),
(36, 'Form Isian Kualifikasi', '0000-00-00', '-', 3, 'Belum Selesai'),
(37, 'Pakta Integritas Penyedia', '0000-00-00', '-', 3, 'Belum Selesai'),
(38, 'Surat Pengantar Penawaran Harga', '0000-00-00', 'Jakarta', 3, 'Belum Selesai'),
(39, 'Surat Pernyataan Minat', '0000-00-00', '-', 3, 'Belum Selesai'),
(40, 'Form Isian Kualifikasi', '0000-00-00', '-', 3, 'Belum Selesai'),
(41, 'Pakta Integritas Penyedia', '0000-00-00', '-', 3, 'Belum Selesai'),
(42, 'Surat Pengantar Penawaran Harga', '0000-00-00', 'Jakarta', 3, 'Belum Selesai'),
(43, 'Surat Pernyataan Minat', '0000-00-00', '-', 3, 'Belum Selesai'),
(44, 'Form Isian Kualifikasi', '0000-00-00', '-', 3, 'Belum Selesai'),
(45, 'Pakta Integritas Penyedia', '0000-00-00', '-', 3, 'Belum Selesai'),
(46, 'Surat Pengantar Penawaran Harga', '0000-00-00', 'Jakarta', 3, 'Belum Selesai'),
(47, 'Surat Pernyataan Minat', '0000-00-00', '-', 3, 'Belum Selesai'),
(48, 'Form Isian Kualifikasi', '0000-00-00', '-', 3, 'Belum Selesai'),
(49, 'Pakta Integritas Penyedia', '0000-00-00', '-', 3, 'Belum Selesai'),
(50, 'Surat Pengantar Penawaran Harga', '0000-00-00', 'Jakarta', 3, 'Belum Selesai'),
(51, 'Surat Pernyataan Minat', '0000-00-00', '-', 3, 'Belum Selesai'),
(52, 'Form Isian Kualifikasi', '0000-00-00', '-', 3, 'Belum Selesai'),
(53, 'Pakta Integritas Penyedia', '0000-00-00', '-', 3, 'Belum Selesai'),
(54, 'Surat Pengantar Penawaran Harga', '0000-00-00', 'Jakarta', 3, 'Belum Selesai'),
(55, 'Surat Pernyataan Minat', '0000-00-00', '-', 3, 'Belum Selesai'),
(56, 'Form Isian Kualifikasi', '0000-00-00', '-', 3, 'Belum Selesai'),
(57, 'Pakta Integritas Penyedia', '0000-00-00', '-', 3, 'Belum Selesai'),
(58, 'Surat Pengantar Penawaran Harga', '0000-00-00', 'Jakarta', 3, 'Belum Selesai'),
(59, 'Surat Pernyataan Minat', '0000-00-00', '-', 3, 'Belum Selesai'),
(60, 'Form Isian Kualifikasi', '0000-00-00', '-', 3, 'Belum Selesai'),
(61, 'Pakta Integritas Penyedia', '0000-00-00', '-', 3, 'Belum Selesai'),
(62, 'Surat Pengantar Penawaran Harga', '0000-00-00', 'Jakarta', 3, 'Belum Selesai'),
(63, 'Surat Pernyataan Minat', '0000-00-00', '-', 3, 'Belum Selesai'),
(64, 'Form Isian Kualifikasi', '0000-00-00', '-', 3, 'Belum Selesai'),
(65, 'Pakta Integritas Penyedia', '0000-00-00', '-', 3, 'Belum Selesai'),
(66, 'Surat Pengantar Penawaran Harga', '0000-00-00', 'Jakarta', 3, 'Belum Selesai'),
(67, 'Surat Pernyataan Minat', '0000-00-00', '-', 3, 'Belum Selesai'),
(68, 'Form Isian Kualifikasi', '0000-00-00', '-', 3, 'Belum Selesai'),
(69, 'Pakta Integritas Penyedia', '0000-00-00', '-', 3, 'Belum Selesai'),
(70, 'Surat Pengantar Penawaran Harga', '0000-00-00', 'Jakarta', 3, 'Belum Selesai'),
(71, 'Surat Pernyataan Minat', '0000-00-00', '-', 3, 'Belum Selesai'),
(72, 'Form Isian Kualifikasi', '0000-00-00', '-', 3, 'Belum Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `dokumen_kontrak`
--

CREATE TABLE IF NOT EXISTS `dokumen_kontrak` (
  `id_dokumen` bigint(32) NOT NULL,
  `Nomor` varchar(50) NOT NULL,
  PRIMARY KEY (`id_dokumen`),
  KEY `Nomor` (`Nomor`),
  KEY `id_dokumen` (`id_dokumen`),
  KEY `id_dokumen_2` (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dokumen_penawaran`
--

CREATE TABLE IF NOT EXISTS `dokumen_penawaran` (
  `id_dokumen` bigint(32) NOT NULL,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(32),
(36),
(40),
(44),
(48),
(52),
(56),
(60),
(64),
(68),
(72);

-- --------------------------------------------------------

--
-- Table structure for table `hps`
--

CREATE TABLE IF NOT EXISTS `hps` (
  `id_dokumen` bigint(20) NOT NULL,
  `nomor` varchar(50) NOT NULL,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hps`
--

INSERT INTO `hps` (`id_dokumen`, `nomor`) VALUES
(28, '012/PPJB-A/DIVMUM/2013 ');

-- --------------------------------------------------------

--
-- Table structure for table `kdivmum`
--

CREATE TABLE IF NOT EXISTS `kdivmum` (
  `username` varchar(20) NOT NULL,
  `NIP` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kdivmum`
--

INSERT INTO `kdivmum` (`username`, `NIP`, `email`) VALUES
('a', '111111', 'a@aa.aa'),
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
(1, 26, '00:12:59', '2013-06-26', 'haniferidaputra', 1, 'pdf');

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
(17, '23423', '23432', 'MSDAF', 'Kevin Indra', 'sdfsd', 'Terlampir', 'Terlampir', 23324, 'dsfsd', 'sdfsd'),
(21, 'w4r34r34', '344353453', 'MSDAF', 'Kevin Indra', 'sdfsdf', 'Terlampir', 'Terlampir', 344353, 'sdfsd', 'sdfsd'),
(25, '34534', '43t453452', 'KDIVMUM', 'Kevin Indra', 'sdgfds', 'Terlampir', 'Terlampir', 234353, 'dfgdf', 'dfgdf');

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
(14, '23423'),
(22, '34534'),
(18, 'w4r34r34');

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
(26, 3);

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
(29),
(33),
(37),
(41),
(45),
(49),
(53),
(57),
(61),
(65),
(69);

-- --------------------------------------------------------

--
-- Table structure for table `panitia`
--

CREATE TABLE IF NOT EXISTS `panitia` (
  `id_panitia` bigint(11) NOT NULL AUTO_INCREMENT,
  `nama_panitia` varchar(50) NOT NULL,
  `SK_panitia` varchar(50) NOT NULL,
  `tahun` int(11) NOT NULL,
  `jumlah_anggota` bigint(20) NOT NULL,
  `status_panitia` varchar(32) NOT NULL,
  `jenis_panitia` varchar(20) NOT NULL,
  PRIMARY KEY (`id_panitia`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `panitia`
--

INSERT INTO `panitia` (`id_panitia`, `nama_panitia`, `SK_panitia`, `tahun`, `jumlah_anggota`, `status_panitia`, `jenis_panitia`) VALUES
(1, 'Hanif Eridaputra', '-', 2013, 1, 'Aktif', 'Pejabat'),
(2, 'Johannes Ridho', '-', 2013, 1, 'Aktif', 'Pejabat'),
(3, 'Panitia-A', '024/SK/PLN', 2013, 3, 'Aktif', 'Panitia'),
(4, 'Panitia-B', '025/SK/PLN', 2013, 2, 'Aktif', 'Panitia'),
(5, 'Panitia-C', '026/SK/PLN', 2012, 0, 'Tidak Aktif', 'Panitia');

-- --------------------------------------------------------

--
-- Table structure for table `pengadaan`
--

CREATE TABLE IF NOT EXISTS `pengadaan` (
  `id_pengadaan` bigint(32) NOT NULL,
  `nama_pengadaan` varchar(100) NOT NULL,
  `divisi_peminta` varchar(32) NOT NULL,
  `jenis_pengadaan` varchar(32) NOT NULL,
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
  KEY `id_panitia` (`id_panitia`),
  KEY `divisi_peminta` (`divisi_peminta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengadaan`
--

INSERT INTO `pengadaan` (`id_pengadaan`, `nama_pengadaan`, `divisi_peminta`, `jenis_pengadaan`, `nama_penyedia`, `tanggal_masuk`, `tanggal_selesai`, `status`, `biaya`, `id_panitia`, `metode_pengadaan`, `metode_penawaran`, `jenis_kualifikasi`) VALUES
(3, 'asdasd', 'divman', 'Barang dan Jasa', '-', '2013-06-12', '0000-00-00', '5', 0, 3, 'Pemilihan Langsung', 'Satu Sampul', 'Pasca Kualifikasi'),
(4, 'dvfdgd', 'divtrans', 'Barang dan Jasa', '-', '2013-06-28', '0000-00-00', '1', 0, 3, 'Pemilihan Langsung', '-', '-'),
(5, 'fghfghf', 'divtrans', 'Barang dan Jasa', '-', '2013-06-14', '0000-00-00', '1', 0, 3, 'Pelelangan', '-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `rab`
--

CREATE TABLE IF NOT EXISTS `rab` (
  `id_dokumen` bigint(32) NOT NULL,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rks`
--

CREATE TABLE IF NOT EXISTS `rks` (
  `id_dokumen` bigint(32) NOT NULL,
  `nomor` varchar(50) NOT NULL,
  `tanggal_permintaan_penawaran` date NOT NULL,
  `tanggal_penjelasan` date NOT NULL,
  `waktu_penjelasan` varchar(20) NOT NULL,
  `tempat_penjelasan` varchar(256) NOT NULL,
  `tanggal_pemasukan_penawaran` date NOT NULL,
  `tanggal_akhir_pemasukan_penawaran` date NOT NULL,
  `waktu_pemasukan_penawaran` varchar(20) NOT NULL,
  `tempat_pemasukan_penawaran` varchar(256) NOT NULL,
  `tanggal_negosiasi` date NOT NULL,
  `waktu_negosiasi` varchar(20) NOT NULL,
  `tempat_negosiasi` varchar(256) NOT NULL,
  `tanggal_penetapan_pemenang` date NOT NULL,
  `waktu_penetapan_pemenang` varchar(20) NOT NULL,
  `tempat_penetapan_pemenang` varchar(256) NOT NULL,
  PRIMARY KEY (`id_dokumen`),
  KEY `nomor` (`nomor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rks`
--

INSERT INTO `rks` (`id_dokumen`, `nomor`, `tanggal_permintaan_penawaran`, `tanggal_penjelasan`, `waktu_penjelasan`, `tempat_penjelasan`, `tanggal_pemasukan_penawaran`, `tanggal_akhir_pemasukan_penawaran`, `waktu_pemasukan_penawaran`, `tempat_pemasukan_penawaran`, `tanggal_negosiasi`, `waktu_negosiasi`, `tempat_negosiasi`, `tanggal_penetapan_pemenang`, `waktu_penetapan_pemenang`, `tempat_penetapan_pemenang`) VALUES
(27, '011/PPJB-A/DIVMUM/2013', '2013-06-05', '2013-06-06', '08:00', 'sasa', '2013-06-10', '0000-00-00', '08:00', 'sasas', '2013-06-19', '08:00', 'sdf', '2013-06-20', '08:00', 'sdsa');

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

-- --------------------------------------------------------

--
-- Table structure for table `surat_pengantar_penawaran_harga`
--

CREATE TABLE IF NOT EXISTS `surat_pengantar_penawaran_harga` (
  `id_dokumen` bigint(32) NOT NULL,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_pengantar_penawaran_harga`
--

INSERT INTO `surat_pengantar_penawaran_harga` (`id_dokumen`) VALUES
(30),
(34),
(38),
(42),
(46),
(50),
(54),
(58),
(62),
(66),
(70);

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
(31),
(35),
(39),
(43),
(47),
(51),
(55),
(59),
(63),
(67),
(71);

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

-- --------------------------------------------------------

--
-- Table structure for table `surat_undangan_prakualifikasi`
--

CREATE TABLE IF NOT EXISTS `surat_undangan_prakualifikasi` (
  `id_dokumen` bigint(32) NOT NULL,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `termin`
--

CREATE TABLE IF NOT EXISTS `termin` (
  `id_termin` bigint(32) NOT NULL,
  `id_dokumen` bigint(32) NOT NULL,
  `nomor_termin` int(32) NOT NULL,
  `tipe` varchar(20) NOT NULL,
  `nilai` bigint(32) NOT NULL,
  `user` varchar(32) NOT NULL,
  `deadline_termin` date NOT NULL,
  `status_termin` varchar(20) NOT NULL,
  `link` varchar(1000) NOT NULL,
  PRIMARY KEY (`id_termin`),
  KEY `id_dokumen` (`id_dokumen`,`nomor_termin`,`tipe`,`user`),
  KEY `user` (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tor`
--

CREATE TABLE IF NOT EXISTS `tor` (
  `id_dokumen` bigint(32) NOT NULL,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
('a', 'a', 'a', 'divisi umum', 'Aktif'),
('aidilsyaputra', 'Aidil Syaputra', 'aidil', 'Divisi Umum', 'Aktif'),
('b', 'b', 'b', 'panitia', 'Aktif'),
('divin', 'Divisi Internet', 'divin', 'Divisi Internet', 'Aktif'),
('divman', 'Divisi Manajemen', 'divman', 'Divisi Manajemen', 'Aktif'),
('divsi', 'Divisi Sistem Informasi', 'divsi', 'Divisi Sistem Informasi', 'Aktif'),
('divtrans', 'Divisi Transportasi', 'divtrans', 'Divisi Transportasi', 'Aktif'),
('gilanglaksana', 'Gilang Laksana', 'gilang', 'Divisi Umum', 'Aktif'),
('haniferidaputra', 'Hanif Eridaputra', 'hanif', 'Divisi Umum', 'Aktif'),
('irvanaditya', 'Irvan Aditya', 'irvan', 'Divisi Umum', 'Aktif'),
('jo', 'johan', 'jo', 'Divisi Khusus', 'Aktif'),
('johannesridho', 'Johannes Ridho', 'johan', 'Divisi Umum', 'Aktif'),
('kadiv', 'kadiv', 'kadiv', 'Divisi Umum', 'Tidak Aktif'),
('kevinindra', 'Kevin Indra', 'kevin', 'Divisi Umum', 'Aktif'),
('panitia', 'panitia', 'panitia', 'Divisi Umum', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `user_kontrak`
--

CREATE TABLE IF NOT EXISTS `user_kontrak` (
  `id_user_kontrak` bigint(32) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  PRIMARY KEY (`id_user_kontrak`),
  KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user_kontrak`
--

INSERT INTO `user_kontrak` (`id_user_kontrak`, `username`) VALUES
(1, 'aidilsyaputra');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `dokumen_kontrak`
--
ALTER TABLE `dokumen_kontrak`
  ADD CONSTRAINT `dokumen_kontrak_ibfk_1` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `hps`
--
ALTER TABLE `hps`
  ADD CONSTRAINT `hps_ibfk_1` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `pengadaan_ibfk_2` FOREIGN KEY (`divisi_peminta`) REFERENCES `divisi` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
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
-- Constraints for table `surat_pengantar_penawaran_harga`
--
ALTER TABLE `surat_pengantar_penawaran_harga`
  ADD CONSTRAINT `surat_pengantar_penawaran_harga_ibfk_1` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `termin`
--
ALTER TABLE `termin`
  ADD CONSTRAINT `termin_ibfk_1` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen_kontrak` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `termin_ibfk_2` FOREIGN KEY (`user`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tor`
--
ALTER TABLE `tor`
  ADD CONSTRAINT `tor_ibfk_1` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_kontrak`
--
ALTER TABLE `user_kontrak`
  ADD CONSTRAINT `user_kontrak_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
