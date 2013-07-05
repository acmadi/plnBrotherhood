-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 05, 2013 at 08:47 AM
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
(5, 'haniferidaputra', '123456788', 'he.23292@gmail.com', 3, 'Anggota1'),
(6, 'haniferidaputra', '123456788', 'he.23292@gmail.com', 1, 'Ketua'),
(7, 'johannesridho', '123456787', 'johan@gmail.com', 2, 'Ketua'),
(8, 'b', '123123', 'bb@bb.bb', 4, 'Anggota1');

-- --------------------------------------------------------

--
-- Table structure for table `berita_acara_evaluasi_penawaran`
--

CREATE TABLE IF NOT EXISTS `berita_acara_evaluasi_penawaran` (
  `id_dokumen` bigint(32) NOT NULL,
  `nomor` varchar(50) NOT NULL,
  `pemenang` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `NPWP` varchar(100) NOT NULL,
  `nilai` int(255) NOT NULL,
  `pemenang_2` varchar(100) NOT NULL,
  `alamat_2` varchar(255) NOT NULL,
  `NPWP_2` varchar(100) NOT NULL,
  `nilai_2` int(255) NOT NULL,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita_acara_evaluasi_penawaran`
--

INSERT INTO `berita_acara_evaluasi_penawaran` (`id_dokumen`, `nomor`, `pemenang`, `alamat`, `NPWP`, `nilai`, `pemenang_2`, `alamat_2`, `NPWP_2`, `nilai_2`) VALUES
(29, '23e12', '-', '-', '-', 0, '-', '-', '-', 0),
(34, '12', 'ads', 'asda', 'sadas', 121, 'asda', 'asdas', 'asda', 1212);

-- --------------------------------------------------------

--
-- Table structure for table `berita_acara_negosiasi_klarifikasi`
--

CREATE TABLE IF NOT EXISTS `berita_acara_negosiasi_klarifikasi` (
  `id_dokumen` bigint(32) NOT NULL,
  `nomor` varchar(50) NOT NULL,
  `surat_penawaran_harga` varchar(50) NOT NULL,
  `hak_kewajiban_penyedia` varchar(50) NOT NULL,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita_acara_negosiasi_klarifikasi`
--

INSERT INTO `berita_acara_negosiasi_klarifikasi` (`id_dokumen`, `nomor`, `surat_penawaran_harga`, `hak_kewajiban_penyedia`) VALUES
(36, '12w', '-', 'dasdas');

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
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita_acara_pembukaan_penawaran`
--

INSERT INTO `berita_acara_pembukaan_penawaran` (`id_dokumen`, `nomor`, `jumlah_penyedia_diundang`, `jumlah_penyedia_dokumen_sah`, `jumlah_penyedia_dokumen_tidak_sah`) VALUES
(27, '1231', 4, 0, 0),
(32, '123', 12, 0, 0),
(47, '21', 12, 0, 0),
(54, '32e4q', 22, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `berita_acara_pengadaan_gagal`
--

CREATE TABLE IF NOT EXISTS `berita_acara_pengadaan_gagal` (
  `id_dokumen` bigint(32) NOT NULL,
  `nomor` varchar(50) NOT NULL,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `berita_acara_penjelasan`
--

CREATE TABLE IF NOT EXISTS `berita_acara_penjelasan` (
  `id_dokumen` bigint(32) NOT NULL,
  `nomor` varchar(50) NOT NULL,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita_acara_penjelasan`
--

INSERT INTO `berita_acara_penjelasan` (`id_dokumen`, `nomor`) VALUES
(24, '123123'),
(42, '2312'),
(44, 'asdasdas'),
(49, 'asdas'),
(51, '12w3'),
(56, 'dsafsdfs');

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
(25, '12:12:00', 'sdfsd', 'Aanwijzing'),
(28, '12:21:00', 'ewqeqw', 'Pembukaan Penawaran Sampul Satu'),
(30, '12:21:00', 'ewqeqw', 'Evaluasi Penawaran Sampul Satu'),
(33, '12:21:00', 'dsadas', 'Pembukaan Penawaran Sampul Dua'),
(35, '12:21:00', 'dsadas', 'Evaluasi Penawaran Sampul Dua'),
(37, '12:12:00', 'asdas', 'Negosiasi dan Klarifikasi'),
(43, '12:12:00', 'sdfsd', 'Aanwijzing'),
(45, '12:12:00', 'sdfsd', 'Aanwijzing'),
(48, '12:21:00', 'ewqeqw', 'Pembukaan Penawaran Sampul Satu'),
(50, '12:12:00', 'sdfsd', 'Aanwijzing'),
(52, '12:12:00', 'sdfsd', 'Aanwijzing'),
(55, '12:21:00', 'ewqeqw', 'Pembukaan Penawaran Sampul Satu'),
(57, '12:12:00', 'sdfsd', 'Aanwijzing');

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE IF NOT EXISTS `divisi` (
  `username` varchar(20) NOT NULL,
  `jumlah_berlangsung` bigint(32) NOT NULL,
  `jumlah_selesai` bigint(32) NOT NULL,
  `jumlah_gagal` bigint(32) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`username`, `jumlah_berlangsung`, `jumlah_selesai`, `jumlah_gagal`) VALUES
('divin', 2, 0, 0),
('divman', 9, 0, 0),
('divsi', 2, 0, 0),
('divtrans', 5, 0, 0);

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
(1, 'Nota Dinas Permintaan', '2013-07-31', 'Jakarta', 1, 'Selesai'),
(2, 'TOR', '2013-07-31', 'Jakarta', 1, 'Selesai'),
(3, 'RAB', '2013-07-31', 'Jakarta', 1, 'Selesai'),
(4, 'Nota Dinas Permintaan', '2013-07-02', 'Jakarta', 2, 'Selesai'),
(5, 'TOR', '2013-07-02', 'Jakarta', 2, 'Selesai'),
(6, 'RAB', '2013-07-02', 'Jakarta', 2, 'Selesai'),
(7, 'Nota Dinas Perintah Pengadaan', '2013-07-12', 'Jakarta', 2, 'Belum Selesai'),
(8, 'Surat Undangan Permintaan Penawaran Harga', '2013-07-03', 'Jakarta', 2, 'Belum Selesai'),
(9, 'Nota Dinas Permintaan', '2013-07-09', 'Jakarta', 3, 'Belum Selesai'),
(10, 'TOR', '2013-07-09', 'Jakarta', 3, 'Belum Selesai'),
(11, 'RAB', '2013-07-09', 'Jakarta', 3, 'Belum Selesai'),
(12, 'Nota Dinas Permintaan', '2013-07-02', 'Jakarta', 4, 'Belum Selesai'),
(13, 'TOR', '2013-07-02', 'Jakarta', 4, 'Belum Selesai'),
(14, 'RAB', '2013-07-02', 'Jakarta', 4, 'Belum Selesai'),
(15, 'Nota Dinas Perintah Pengadaan', '2013-07-04', 'Jakarta', 1, 'Belum Selesai'),
(16, 'Pakta Integritas Awal Panitia', '2013-07-05', 'Jakarta', 1, 'Belum Selesai'),
(17, 'RKS', '2013-07-05', 'Jakarta', 1, 'Belum Selesai'),
(18, 'HPS', '2013-07-08', 'Jakarta', 1, 'Belum Selesai'),
(19, 'Pakta Integritas Penyedia', '1970-01-01', '-', 1, 'Belum Selesai'),
(20, 'Surat Pengantar Penawaran Harga', '1970-01-01', 'Jakarta', 1, 'Belum Selesai'),
(21, 'Surat Pernyataan Minat', '1970-01-01', '-', 1, 'Belum Selesai'),
(22, 'Form Isian Kualifikasi', '1970-01-01', '-', 1, 'Belum Selesai'),
(23, 'Surat Undangan Permintaan Penawaran Harga', '2013-07-09', 'Jakarta', 1, 'Belum Selesai'),
(24, 'Berita Acara Aanwijzing', '2013-07-09', 'Jakarta', 1, 'Belum Selesai'),
(25, 'Daftar Hadir Aanwijzing', '2013-07-09', 'Jakarta', 1, 'Belum Selesai'),
(26, 'Surat Undangan Pembukaan Penawaran Sampul Satu', '2013-07-10', 'Jakarta', 1, 'Belum Selesai'),
(27, 'Berita Acara Pembukaan Penawaran Sampul Satu', '2013-07-10', 'Jakarta', 1, 'Belum Selesai'),
(28, 'Daftar Hadir Pembukaan Penawaran Sampul Satu', '2013-07-10', 'Jakarta', 1, 'Belum Selesai'),
(29, 'Berita Acara Evaluasi Penawaran Sampul Satu', '2013-07-23', 'Jakarta', 1, 'Belum Selesai'),
(30, 'Daftar Hadir Evaluasi Penawaran Sampul Satu', '2013-07-23', 'Jakarta', 1, 'Belum Selesai'),
(31, 'Surat Undangan Pembukaan Penawaran Sampul Dua', '2013-07-16', 'Jakarta', 1, 'Belum Selesai'),
(32, 'Berita Acara Pembukaan Penawaran Sampul Dua', '2013-07-10', 'Jakarta', 1, 'Belum Selesai'),
(33, 'Daftar Hadir Pembukaan Penawaran Sampul Dua', '2013-07-10', 'Jakarta', 1, 'Belum Selesai'),
(34, 'Berita Acara Evaluasi Penawaran Sampul Dua', '2013-07-11', 'Jakarta', 1, 'Belum Selesai'),
(35, 'Daftar Hadir Evaluasi Penawaran Sampul Dua', '2013-07-11', 'Jakarta', 1, 'Belum Selesai'),
(36, 'Berita Acara Negosiasi dan Klarifikasi', '2013-07-02', 'Jakarta', 1, 'Belum Selesai'),
(37, 'Daftar Hadir Negosiasi dan Klarifikasi', '2013-07-02', 'Jakarta', 1, 'Belum Selesai'),
(38, 'Surat Undangan Permintaan Penawaran Harga', '2013-07-10', 'Jakarta', 1, 'Belum Selesai'),
(39, 'Surat Undangan Permintaan Penawaran Harga', '2013-07-16', 'Jakarta', 1, 'Belum Selesai'),
(40, 'Surat Undangan Permintaan Penawaran Harga', '2013-07-17', 'Jakarta', 1, 'Belum Selesai'),
(41, 'Surat Undangan Permintaan Penawaran Harga', '2013-07-16', 'Jakarta', 1, 'Belum Selesai'),
(42, 'Berita Acara Aanwijzing', '2013-07-09', 'Jakarta', 1, 'Belum Selesai'),
(43, 'Daftar Hadir Aanwijzing', '2013-07-09', 'Jakarta', 1, 'Belum Selesai'),
(44, 'Berita Acara Aanwijzing', '2013-07-09', 'Jakarta', 1, 'Belum Selesai'),
(45, 'Daftar Hadir Aanwijzing', '2013-07-09', 'Jakarta', 1, 'Belum Selesai'),
(46, 'Surat Undangan Pembukaan Penawaran Sampul Satu', '2013-07-17', 'Jakarta', 1, 'Belum Selesai'),
(47, 'Berita Acara Pembukaan Penawaran Sampul Satu', '2013-07-10', 'Jakarta', 1, 'Belum Selesai'),
(48, 'Daftar Hadir Pembukaan Penawaran Sampul Satu', '2013-07-10', 'Jakarta', 1, 'Belum Selesai'),
(49, 'Berita Acara Aanwijzing', '2013-07-09', 'Jakarta', 1, 'Belum Selesai'),
(50, 'Daftar Hadir Aanwijzing', '2013-07-09', 'Jakarta', 1, 'Belum Selesai'),
(51, 'Berita Acara Aanwijzing', '2013-07-09', 'Jakarta', 1, 'Belum Selesai'),
(52, 'Daftar Hadir Aanwijzing', '2013-07-09', 'Jakarta', 1, 'Belum Selesai'),
(53, 'Surat Undangan Pembukaan Penawaran Sampul Satu', '2013-07-10', 'Jakarta', 1, 'Belum Selesai'),
(54, 'Berita Acara Pembukaan Penawaran Sampul Satu', '2013-07-10', 'Jakarta', 1, 'Belum Selesai'),
(55, 'Daftar Hadir Pembukaan Penawaran Sampul Satu', '2013-07-10', 'Jakarta', 1, 'Belum Selesai'),
(56, 'Berita Acara Aanwijzing', '2013-07-09', 'Jakarta', 1, 'Belum Selesai'),
(57, 'Daftar Hadir Aanwijzing', '2013-07-09', 'Jakarta', 1, 'Belum Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `dokumen_kontrak`
--

CREATE TABLE IF NOT EXISTS `dokumen_kontrak` (
  `id_dokumen` bigint(32) NOT NULL,
  `Nomor` varchar(50) NOT NULL,
  PRIMARY KEY (`id_dokumen`),
  UNIQUE KEY `Nomor` (`Nomor`)
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
(22);

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
(18, '3qwe');

-- --------------------------------------------------------

--
-- Table structure for table `kdivmum`
--

CREATE TABLE IF NOT EXISTS `kdivmum` (
  `username` varchar(20) NOT NULL,
  `NIP` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `jabatan` varchar(32) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kdivmum`
--

INSERT INTO `kdivmum` (`username`, `NIP`, `email`, `jabatan`) VALUES
('a', '111111', 'a@aa.aa', 'MSDAF'),
('aidilsyaputra', '123456789', 'aidil@gmail.com', 'KDIVMUM');

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
(1, 4, '00:42:58', '2013-07-05', 'divtrans', 1, 'txt'),
(2, 4, '00:43:01', '2013-07-05', 'divtrans', 2, 'txt'),
(3, 5, '00:43:05', '2013-07-05', 'divtrans', 1, 'txt'),
(4, 6, '00:43:09', '2013-07-05', 'divtrans', 1, 'txt'),
(5, 6, '00:43:12', '2013-07-05', 'divtrans', 2, 'txt'),
(6, 1, '02:03:58', '2013-07-05', 'a', 1, 'txt'),
(7, 2, '02:04:05', '2013-07-05', 'a', 1, 'txt'),
(8, 3, '02:04:10', '2013-07-05', 'a', 1, 'txt'),
(9, 3, '02:04:24', '2013-07-05', 'a', 2, 'txt');

-- --------------------------------------------------------

--
-- Table structure for table `nota_dinas_pemberitahuan_pemenang`
--

CREATE TABLE IF NOT EXISTS `nota_dinas_pemberitahuan_pemenang` (
  `id_dokumen` bigint(32) NOT NULL,
  `nomor` varchar(50) NOT NULL,
  `nama_penyedia` varchar(100) NOT NULL,
  `alamat` varchar(256) NOT NULL,
  `NPWP` varchar(20) NOT NULL,
  `biaya` bigint(20) NOT NULL,
  `nama_penyedia_2` varchar(100) NOT NULL,
  `alamat_2` varchar(256) NOT NULL,
  `NPWP_2` varchar(20) NOT NULL,
  `biaya_2` bigint(20) NOT NULL,
  `waktu_pelaksanaan` date NOT NULL,
  `tempat_penyerahan` varchar(20) NOT NULL,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nota_dinas_penetapan_pemenang`
--

CREATE TABLE IF NOT EXISTS `nota_dinas_penetapan_pemenang` (
  `id_dokumen` bigint(32) NOT NULL,
  `nomor` varchar(50) NOT NULL,
  `nama_penyedia` varchar(100) NOT NULL,
  `alamat` varchar(256) NOT NULL,
  `NPWP` varchar(20) NOT NULL,
  `biaya` bigint(20) NOT NULL,
  `waktu_pelaksanaan` date NOT NULL,
  `tempat_penyerahan` varchar(256) NOT NULL,
  `sumber_dana` varchar(50) NOT NULL,
  `jangka_waktu_berlaku` varchar(20) NOT NULL,
  `jangka_waktu_deadline` varchar(20) NOT NULL,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nota_dinas_perintah_pengadaan`
--

CREATE TABLE IF NOT EXISTS `nota_dinas_perintah_pengadaan` (
  `id_dokumen` bigint(32) NOT NULL,
  `nomor` varchar(50) NOT NULL,
  `dari` varchar(20) NOT NULL,
  `kepada` varchar(100) NOT NULL,
  `perihal` varchar(100) NOT NULL,
  `targetSPK_kontrak` int(32) NOT NULL,
  `sumber_dana` varchar(256) NOT NULL,
  `pagu_anggaran` int(100) NOT NULL,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nota_dinas_perintah_pengadaan`
--

INSERT INTO `nota_dinas_perintah_pengadaan` (`id_dokumen`, `nomor`, `dari`, `kepada`, `perihal`, `targetSPK_kontrak`, `sumber_dana`, `pagu_anggaran`) VALUES
(7, '035/DVMUM/2013', 'KDIVMUM', 'Hanif Eridaputra', 'asada', 45, 'Kas PLN', 10050000),
(15, 'sdfsdf', 'KDIVMUM', 'Johannes Ridho', 'sdfsdf', 12, 'asdas', 1212212);

-- --------------------------------------------------------

--
-- Table structure for table `nota_dinas_permintaan`
--

CREATE TABLE IF NOT EXISTS `nota_dinas_permintaan` (
  `id_dokumen` bigint(32) NOT NULL,
  `nomor` varchar(50) NOT NULL,
  `perihal` varchar(256) NOT NULL,
  `nilai_biaya_rab` int(200) NOT NULL,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nota_dinas_permintaan`
--

INSERT INTO `nota_dinas_permintaan` (`id_dokumen`, `nomor`, `perihal`, `nilai_biaya_rab`) VALUES
(1, '045/DVMAM/2013', 'Pengadaan Baju Dinas Pegawai', 12312),
(4, '073/DIVTRANS/2013', 'bsmnbmama', 0),
(9, '12q', 'sdas', 121),
(12, 'asdasd2q3', 'asdas', 2112);

-- --------------------------------------------------------

--
-- Table structure for table `nota_dinas_permintaan_tor_rab`
--

CREATE TABLE IF NOT EXISTS `nota_dinas_permintaan_tor_rab` (
  `id_dokumen` bigint(100) NOT NULL,
  `nomor` varchar(256) NOT NULL,
  `permintaan` varchar(256) NOT NULL,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nota_dinas_usulan_pemenang`
--

CREATE TABLE IF NOT EXISTS `nota_dinas_usulan_pemenang` (
  `id_dokumen` bigint(32) NOT NULL,
  `nomor` varchar(50) NOT NULL,
  `nama_penyedia` varchar(100) NOT NULL,
  `alamat` varchar(256) NOT NULL,
  `NPWP` varchar(20) NOT NULL,
  `biaya` bigint(20) NOT NULL,
  `nama_penyedia_2` varchar(100) NOT NULL,
  `alamat_2` varchar(256) NOT NULL,
  `NPWP_2` varchar(20) NOT NULL,
  `biaya_2` bigint(20) NOT NULL,
  `waktu_pelaksanaan` date NOT NULL,
  `tempat_penyerahan` varchar(256) NOT NULL,
  PRIMARY KEY (`id_dokumen`)
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
(16, 2);

-- --------------------------------------------------------

--
-- Table structure for table `pakta_integritas_panitia_2`
--

CREATE TABLE IF NOT EXISTS `pakta_integritas_panitia_2` (
  `id_dokumen` bigint(32) NOT NULL,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(19);

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
(-1, 'Belum ada PIC', '-', 0, 0, '-', '-'),
(1, 'Hanif Eridaputra', '-', 2013, 1, 'Aktif', 'Pejabat'),
(2, 'Johannes Ridho', '-', 2013, 1, 'Aktif', 'Pejabat'),
(3, 'Panitia-A', '024/SK/PLN', 2013, 3, 'Aktif', 'Panitia'),
(4, 'Panitia-B', '025/SK/PLN', 2013, 2, 'Aktif', 'Panitia'),
(5, 'Panitia-C', '026/SK/PLN', 2012, 0, 'Tidak Aktif', 'Panitia');

-- --------------------------------------------------------

--
-- Table structure for table `penerima_pengadaan`
--

CREATE TABLE IF NOT EXISTS `penerima_pengadaan` (
  `id_penerima` bigint(255) NOT NULL AUTO_INCREMENT,
  `perusahaan` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL,
  `id_pengadaan` bigint(255) NOT NULL,
  `alamat` varchar(256) NOT NULL,
  `npwp` varchar(256) NOT NULL,
  `nilai` bigint(255) NOT NULL,
  `tahap` varchar(256) NOT NULL,
  `undangan_prakualifikasi` varchar(256) NOT NULL,
  `ba_evaluasi_prakualifikasi` varchar(256) NOT NULL,
  `undangan_pengambilan_dokumen` varchar(256) NOT NULL,
  `ba_aanwijzing` varchar(256) NOT NULL,
  `pembukaan_penawaran_1` varchar(256) NOT NULL,
  `evaluasi_penawaran_1` varchar(256) NOT NULL,
  `pembukaan_penawaran_2` varchar(256) NOT NULL,
  `evaluasi_penawaran_2` varchar(256) NOT NULL,
  `negosiasi_klarifikasi` varchar(256) NOT NULL,
  `usulan_pemenang` varchar(256) NOT NULL,
  `penetapan_pemenang` varchar(256) NOT NULL,
  PRIMARY KEY (`id_penerima`),
  KEY `id_pengadaan` (`id_pengadaan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
(1, 'Pengadaan Baju Dinas', 'divman', 'Barang dan Jasa', '-', '2013-07-18', '0000-00-00', '8', 0, 2, 'Pemilihan Langsung', 'Dua Sampul', 'Pasca Kualifikasi'),
(2, 'Pengadaan Sewa Mobil', 'divtrans', 'Barang dan Jasa', '-', '2013-07-18', '0000-00-00', '7', 0, 1, 'Penunjukan Langsung', '-', '-'),
(3, 'adasda', 'divman', 'Barang dan Jasa', '-', '2013-07-03', '0000-00-00', '-1', 0, -1, '-', '-', '-'),
(4, 'asdasdas', 'divsi', 'Barang dan Jasa', '-', '2013-07-02', '0000-00-00', '-1', 0, -1, '-', '-', '-');

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
(11);

-- --------------------------------------------------------

--
-- Table structure for table `rincian_rks`
--

CREATE TABLE IF NOT EXISTS `rincian_rks` (
  `id_rincian` bigint(255) NOT NULL AUTO_INCREMENT,
  `nama_rincian` varchar(256) NOT NULL,
  `id_dokumen` bigint(32) NOT NULL,
  PRIMARY KEY (`id_rincian`),
  KEY `id_dokumen` (`id_dokumen`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=84 ;

--
-- Dumping data for table `rincian_rks`
--

INSERT INTO `rincian_rks` (`id_rincian`, `nama_rincian`, `id_dokumen`) VALUES
(73, 'Cover', 17),
(74, 'Daftar Isi', 17),
(75, 'Isi', 17),
(76, 'Lampiran 1', 17),
(77, 'Lampiran 2', 17),
(78, 'Lampiran 3', 17),
(79, 'Lampiran 4', 17),
(80, 'Lampiran 5', 17),
(81, 'Lampiran 6', 17),
(82, 'Lampiran 7', 17),
(83, 'Lampiran ba', 17);

-- --------------------------------------------------------

--
-- Table structure for table `rks`
--

CREATE TABLE IF NOT EXISTS `rks` (
  `id_dokumen` bigint(32) NOT NULL,
  `nomor` varchar(50) NOT NULL,
  `tipe_rks` int(10) NOT NULL,
  `tanggal_permintaan_penawaran` date NOT NULL,
  `tanggal_penjelasan` date NOT NULL,
  `waktu_penjelasan` time NOT NULL,
  `tempat_penjelasan` varchar(256) NOT NULL,
  `tanggal_awal_pemasukan_penawaran1` date NOT NULL,
  `tanggal_akhir_pemasukan_penawaran1` date NOT NULL,
  `waktu_pemasukan_penawaran1` time NOT NULL,
  `tempat_pemasukan_penawaran1` varchar(256) NOT NULL,
  `tanggal_pembukaan_penawaran1` date NOT NULL,
  `waktu_pembukaan_penawaran1` time NOT NULL,
  `tempat_pembukaan_penawaran1` varchar(256) NOT NULL,
  `tanggal_evaluasi_penawaran1` date NOT NULL,
  `waktu_evaluasi_penawaran1` time NOT NULL,
  `tempat_evaluasi_penawaran1` varchar(256) NOT NULL,
  `tanggal_awal_pemasukan_penawaran2` date NOT NULL,
  `tanggal_akhir_pemasukan_penawaran2` date NOT NULL,
  `waktu_pemasukan_penawaran2` time NOT NULL,
  `tempat_pemasukan_penawaran2` varchar(256) NOT NULL,
  `tanggal_pembukaan_penawaran2` date NOT NULL,
  `waktu_pembukaan_penawaran2` time NOT NULL,
  `tempat_pembukaan_penawaran2` varchar(256) NOT NULL,
  `tanggal_evaluasi_penawaran2` date NOT NULL,
  `waktu_evaluasi_penawaran2` time NOT NULL,
  `tempat_evaluasi_penawaran2` varchar(256) NOT NULL,
  `tanggal_negosiasi` date NOT NULL,
  `waktu_negosiasi` time NOT NULL,
  `tempat_negosiasi` varchar(256) NOT NULL,
  `tanggal_usulan_pemenang` date NOT NULL,
  `waktu_usulan_pemenang` time NOT NULL,
  `tanggal_penetapan_pemenang` date NOT NULL,
  `waktu_penetapan_pemenang` time NOT NULL,
  `tanggal_pemberitahuan_pemenang` date NOT NULL,
  `waktu_pemberitahuan_pemenang` time NOT NULL,
  `tanggal_penunjukan_pemenang` date NOT NULL,
  `waktu_penunjukan_pemenang` time NOT NULL,
  `sistem_evaluasi_penawaran` varchar(50) NOT NULL,
  `jangka_waktu_penyerahan` int(100) NOT NULL,
  `tanggal_paling_lambat_penyerahan` date NOT NULL,
  `jangka_waktu_berlaku_jaminan` int(100) NOT NULL,
  `lama_waktu_tambahan` int(100) NOT NULL,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rks`
--

INSERT INTO `rks` (`id_dokumen`, `nomor`, `tipe_rks`, `tanggal_permintaan_penawaran`, `tanggal_penjelasan`, `waktu_penjelasan`, `tempat_penjelasan`, `tanggal_awal_pemasukan_penawaran1`, `tanggal_akhir_pemasukan_penawaran1`, `waktu_pemasukan_penawaran1`, `tempat_pemasukan_penawaran1`, `tanggal_pembukaan_penawaran1`, `waktu_pembukaan_penawaran1`, `tempat_pembukaan_penawaran1`, `tanggal_evaluasi_penawaran1`, `waktu_evaluasi_penawaran1`, `tempat_evaluasi_penawaran1`, `tanggal_awal_pemasukan_penawaran2`, `tanggal_akhir_pemasukan_penawaran2`, `waktu_pemasukan_penawaran2`, `tempat_pemasukan_penawaran2`, `tanggal_pembukaan_penawaran2`, `waktu_pembukaan_penawaran2`, `tempat_pembukaan_penawaran2`, `tanggal_evaluasi_penawaran2`, `waktu_evaluasi_penawaran2`, `tempat_evaluasi_penawaran2`, `tanggal_negosiasi`, `waktu_negosiasi`, `tempat_negosiasi`, `tanggal_usulan_pemenang`, `waktu_usulan_pemenang`, `tanggal_penetapan_pemenang`, `waktu_penetapan_pemenang`, `tanggal_pemberitahuan_pemenang`, `waktu_pemberitahuan_pemenang`, `tanggal_penunjukan_pemenang`, `waktu_penunjukan_pemenang`, `sistem_evaluasi_penawaran`, `jangka_waktu_penyerahan`, `tanggal_paling_lambat_penyerahan`, `jangka_waktu_berlaku_jaminan`, `lama_waktu_tambahan`) VALUES
(17, '1q2123', 1, '2013-07-01', '2013-07-09', '12:12:00', 'sdfsd', '2013-07-09', '2013-07-02', '12:11:00', 'sdfs', '2013-07-10', '12:12:00', 'sdfsdf', '2013-07-17', '12:11:00', 'sfsdf', '1970-01-01', '1970-01-01', '00:00:00', '-', '2013-07-09', '12:11:00', 'sdfsdfs', '2013-07-03', '11:11:00', 'asdas', '2013-07-02', '12:12:00', 'asdas', '2013-07-16', '12:12:00', '2013-07-09', '12:12:00', '2013-07-09', '12:12:00', '2013-07-16', '11:11:00', 'gugur', 12, '2013-07-10', 1, 12);

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
(9),
(20);

-- --------------------------------------------------------

--
-- Table structure for table `surat_pengumuman_pelelangan`
--

CREATE TABLE IF NOT EXISTS `surat_pengumuman_pelelangan` (
  `id_dokumen` bigint(32) NOT NULL,
  `nomor` varchar(32) NOT NULL,
  `nama_penyedia` varchar(100) NOT NULL,
  `harga_penawaran` int(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `batas_sanggahan` bigint(32) NOT NULL,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `surat_penunjukan_pemenang`
--

CREATE TABLE IF NOT EXISTS `surat_penunjukan_pemenang` (
  `id_dokumen` bigint(32) NOT NULL,
  `nomor` varchar(32) NOT NULL,
  `nama_penyedia` varchar(100) NOT NULL,
  `harga` int(255) NOT NULL,
  `lama_penyerahan` bigint(32) NOT NULL,
  `jaminan` int(255) NOT NULL,
  `nomor_ski` varchar(32) NOT NULL,
  `tanggal_ski` date NOT NULL,
  `no_ski` varchar(32) NOT NULL,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(10),
(21);

-- --------------------------------------------------------

--
-- Table structure for table `surat_undangan_negosiasi_klarifikasi`
--

CREATE TABLE IF NOT EXISTS `surat_undangan_negosiasi_klarifikasi` (
  `id_dokumen` bigint(32) NOT NULL,
  `nomor` varchar(50) NOT NULL,
  `perihal` varchar(100) NOT NULL,
  `kepada` varchar(100) NOT NULL,
  `tanggal_undangan` date NOT NULL,
  `waktu` time NOT NULL,
  `tempat` varchar(100) NOT NULL,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `surat_undangan_pembukaan_penawaran`
--

CREATE TABLE IF NOT EXISTS `surat_undangan_pembukaan_penawaran` (
  `id_dokumen` bigint(32) NOT NULL,
  `nomor` varchar(50) NOT NULL,
  `perihal` varchar(100) NOT NULL,
  `tanggal_undangan` date NOT NULL,
  `waktu` time NOT NULL,
  `tempat` varchar(256) NOT NULL,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_undangan_pembukaan_penawaran`
--

INSERT INTO `surat_undangan_pembukaan_penawaran` (`id_dokumen`, `nomor`, `perihal`, `tanggal_undangan`, `waktu`, `tempat`) VALUES
(26, '1212', 'Undangan Pembukaan Penawaran Sampul Satu Pengadaan Baju Dinas', '2013-07-10', '12:21:00', 'ewqeqw'),
(31, 'q231q2', 'Undangan Pembukaan Penawaran Sampul Dua Pengadaan Baju Dinas', '2013-07-10', '12:21:00', 'dsadas'),
(46, '2131', 'Undangan Pembukaan Penawaran Sampul Satu Pengadaan Baju Dinas', '2013-07-02', '09:00:00', 'dsadas'),
(53, '213e', 'Undangan Pembukaan Penawaran Sampul Satu Pengadaan Baju Dinas', '2013-07-09', '12:21:00', 'sdfsd');

-- --------------------------------------------------------

--
-- Table structure for table `surat_undangan_pengambilan_dokumen_pengadaan`
--

CREATE TABLE IF NOT EXISTS `surat_undangan_pengambilan_dokumen_pengadaan` (
  `id_dokumen` bigint(32) NOT NULL,
  `nomor` varchar(50) NOT NULL,
  `tanggal_pengambilan` date NOT NULL,
  `waktu_pengambilan` time NOT NULL,
  `tempat_pengambilan` varchar(256) NOT NULL,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `surat_undangan_penjelasan`
--

CREATE TABLE IF NOT EXISTS `surat_undangan_penjelasan` (
  `id_dokumen` bigint(32) NOT NULL,
  `nomor` varchar(50) NOT NULL,
  `perihal` varchar(100) NOT NULL,
  `tanggal_undangan` date NOT NULL,
  `waktu` time NOT NULL,
  `tempat` varchar(256) NOT NULL,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_undangan_penjelasan`
--

INSERT INTO `surat_undangan_penjelasan` (`id_dokumen`, `nomor`, `perihal`, `tanggal_undangan`, `waktu`, `tempat`) VALUES
(125, '333333333333', 'Undangan Aanwijzing Pengadaan Sewa Motor', '2013-07-31', '12:12:00', 'asdasd'),
(138, '1e12312ea', 'Undangan Aanwijzing Pengadaan Sewa Mobil', '2013-06-21', '08:00:00', 'adaasa');

-- --------------------------------------------------------

--
-- Table structure for table `surat_undangan_permintaan_penawaran_harga`
--

CREATE TABLE IF NOT EXISTS `surat_undangan_permintaan_penawaran_harga` (
  `id_dokumen` bigint(32) NOT NULL,
  `nomor` varchar(50) NOT NULL,
  `waktu_kerja` varchar(256) NOT NULL,
  `masa_berlaku_penawaran` int(20) NOT NULL,
  `tempat_penyerahan` varchar(256) NOT NULL,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_undangan_permintaan_penawaran_harga`
--

INSERT INTO `surat_undangan_permintaan_penawaran_harga` (`id_dokumen`, `nomor`, `waktu_kerja`, `masa_berlaku_penawaran`, `tempat_penyerahan`) VALUES
(8, '12312', '123', 232, 'dsfsdf'),
(12, '3eq', '132', 12, 'asda'),
(23, '1231231231', '12', 121, 'tem'),
(38, '32e4q', '123', 121, 'asdas'),
(39, 'w2eq', '12', 12, 'sdasda'),
(40, '121', '123', 1, 'asdas'),
(41, 'adasd', '12', 12, 'asdas');

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

--
-- Dumping data for table `tor`
--

INSERT INTO `tor` (`id_dokumen`) VALUES
(2),
(5),
(8),
(10),
(12),
(13);

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
  ADD CONSTRAINT `berita_acara_evaluasi_penawaran_ibfk_5` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `berita_acara_negosiasi_klarifikasi`
--
ALTER TABLE `berita_acara_negosiasi_klarifikasi`
  ADD CONSTRAINT `berita_acara_negosiasi_klarifikasi_ibfk_3` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `berita_acara_pembukaan_penawaran`
--
ALTER TABLE `berita_acara_pembukaan_penawaran`
  ADD CONSTRAINT `berita_acara_pembukaan_penawaran_ibfk_3` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `berita_acara_pengadaan_gagal`
--
ALTER TABLE `berita_acara_pengadaan_gagal`
  ADD CONSTRAINT `berita_acara_pengadaan_gagal_ibfk_1` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `berita_acara_penjelasan`
--
ALTER TABLE `berita_acara_penjelasan`
  ADD CONSTRAINT `berita_acara_penjelasan_ibfk_1` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `nota_dinas_pemberitahuan_pemenang_ibfk_3` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nota_dinas_penetapan_pemenang`
--
ALTER TABLE `nota_dinas_penetapan_pemenang`
  ADD CONSTRAINT `nota_dinas_penetapan_pemenang_ibfk_4` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nota_dinas_perintah_pengadaan`
--
ALTER TABLE `nota_dinas_perintah_pengadaan`
  ADD CONSTRAINT `nota_dinas_perintah_pengadaan_ibfk_3` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nota_dinas_permintaan`
--
ALTER TABLE `nota_dinas_permintaan`
  ADD CONSTRAINT `nota_dinas_permintaan_ibfk_1` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nota_dinas_permintaan_tor_rab`
--
ALTER TABLE `nota_dinas_permintaan_tor_rab`
  ADD CONSTRAINT `nota_dinas_permintaan_tor_rab_ibfk_1` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nota_dinas_usulan_pemenang`
--
ALTER TABLE `nota_dinas_usulan_pemenang`
  ADD CONSTRAINT `nota_dinas_usulan_pemenang_ibfk_3` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pakta_integritas_panitia_1`
--
ALTER TABLE `pakta_integritas_panitia_1`
  ADD CONSTRAINT `pakta_integritas_panitia_1_ibfk_3` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pakta_integritas_panitia_1_ibfk_4` FOREIGN KEY (`id_panitia`) REFERENCES `pengadaan` (`id_panitia`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pakta_integritas_panitia_2`
--
ALTER TABLE `pakta_integritas_panitia_2`
  ADD CONSTRAINT `pakta_integritas_panitia_2_ibfk_1` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pakta_integritas_penyedia`
--
ALTER TABLE `pakta_integritas_penyedia`
  ADD CONSTRAINT `pakta_integritas_penyedia_ibfk_3` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penerima_pengadaan`
--
ALTER TABLE `penerima_pengadaan`
  ADD CONSTRAINT `penerima_pengadaan_ibfk_1` FOREIGN KEY (`id_pengadaan`) REFERENCES `pengadaan` (`id_pengadaan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengadaan`
--
ALTER TABLE `pengadaan`
  ADD CONSTRAINT `pengadaan_ibfk_1` FOREIGN KEY (`id_panitia`) REFERENCES `panitia` (`id_panitia`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pengadaan_ibfk_2` FOREIGN KEY (`divisi_peminta`) REFERENCES `divisi` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rab`
--
ALTER TABLE `rab`
  ADD CONSTRAINT `rab_ibfk_1` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rincian_rks`
--
ALTER TABLE `rincian_rks`
  ADD CONSTRAINT `rincian_rks_ibfk_1` FOREIGN KEY (`id_dokumen`) REFERENCES `rks` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rks`
--
ALTER TABLE `rks`
  ADD CONSTRAINT `rks_ibfk_1` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
