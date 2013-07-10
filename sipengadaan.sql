-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 10, 2013 at 07:00 PM
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
  `nama` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `nama`, `password`) VALUES
('jo', 'Johan', 'bd73d35759d75cc215150d1bbc94f1b1078bee01');

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE IF NOT EXISTS `anggota` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(256) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `NIP` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `divisi` varchar(100) NOT NULL,
  `id_panitia` bigint(11) NOT NULL,
  `jabatan` varchar(32) NOT NULL,
  `status_user` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`username`),
  KEY `id_panitia` (`id_panitia`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id`, `username`, `password`, `nama`, `NIP`, `email`, `divisi`, `id_panitia`, `jabatan`, `status_user`) VALUES
(1, 'irvan.aditya', 'b3a95a69acb08ada4fcd8d31a84ce8e8b3174e62', 'Irvan Aditya', '123456785', 'irvan@gmail.com', 'Divisi Umum', 4, 'Ketua', 'Aktif'),
(2, 'gilang.laksana', 'e239aca6e941135937208eb840dc38108d86be3b', 'Gilang Laksana', '123456786', 'gilang@gmail.com', 'Divisi Umum', 3, 'Ketua', 'Aktif'),
(3, 'johannes.ridho', '759412786bc533369b22377bf83fb9056c5b25b2', 'Johannes Ridho', '123456787', 'johan@gmail.com', 'Divisi Umum', 4, 'Sekretaris', 'Aktif'),
(4, 'hanif.eridaputra', '021403bf9cfa12e30443d58dc6b43d7569e4ea63', 'Hanif Eridaputra', '123456788', 'he.23292@gmail.com', 'Divisi Umum', 3, 'Sekretaris', 'Aktif'),
(5, 'hanif.eridaputra', '021403bf9cfa12e30443d58dc6b43d7569e4ea63', 'Hanif Eridaputra', '123456788', 'he.23292@gmail.com', 'Divisi Umum', 1, 'Ketua', 'Aktif'),
(6, 'johannes.ridho', '759412786bc533369b22377bf83fb9056c5b25b2', 'Johannes Ridho', '123456787', 'johan@gmail.com', 'Divisi Umum', 2, 'Ketua', 'Aktif'),
(7, 'sianggota', 'aaaaa', 'si anggota', '123123123', 'asdasdasd', 'dasdas', 2, 'Anggota', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `berita_acara_evaluasi_penawaran`
--

CREATE TABLE IF NOT EXISTS `berita_acara_evaluasi_penawaran` (
  `id_dokumen` bigint(32) NOT NULL,
  `nomor` varchar(50) NOT NULL,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita_acara_evaluasi_penawaran`
--

INSERT INTO `berita_acara_evaluasi_penawaran` (`id_dokumen`, `nomor`) VALUES
(65, 'asdas'),
(95, '23423eqwe'),
(99, '23423reaswdas'),
(107, '34r535'),
(111, '234234'),
(117, 'wqdasd'),
(121, '12312qweqw');

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
(67, '123123asd', '-', 'asdas'),
(71, '123Q12', '-', 'ASDAS'),
(101, '23e423e', '-', 'asdasd'),
(113, 'd23424', '-', 'asdasd'),
(123, '12312w3qw', '-', 'asdasd');

-- --------------------------------------------------------

--
-- Table structure for table `berita_acara_pembukaan_penawaran`
--

CREATE TABLE IF NOT EXISTS `berita_acara_pembukaan_penawaran` (
  `id_dokumen` bigint(32) NOT NULL,
  `nomor` varchar(50) NOT NULL,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita_acara_pembukaan_penawaran`
--

INSERT INTO `berita_acara_pembukaan_penawaran` (`id_dokumen`, `nomor`) VALUES
(63, '12312312'),
(93, '23r4werwfwe'),
(97, 'werwedasw'),
(105, '234r23rwe'),
(109, '1231231'),
(119, '12eqweqw');

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
(59, '1232131'),
(61, '213e213e2'),
(91, '4234234123'),
(103, 'asdasd'),
(128, 'asdasdas');

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
(60, '12:12:00', 'asdasd', 'Aanwijzing'),
(62, '12:12:00', 'asdasd', 'Aanwijzing'),
(64, '12:12:00', 'asdasd', 'Pembukaan Penawaran'),
(66, '12:11:00', 'adasda', 'Evaluasi Penawaran'),
(68, '12:12:00', 'adasda', 'Negosiasi dan Klarifikasi'),
(72, '12:12:00', 'adasda', 'Negosiasi dan Klarifikasi'),
(92, '12:12:00', 'asdasda', 'Aanwijzing'),
(94, '12:12:00', 'asdasdas', 'Pembukaan Penawaran Sampul Satu'),
(96, '12:11:00', 'asdasdasd', 'Evaluasi Penawaran Sampul Satu'),
(98, '12:11:00', 'adasdasd', 'Pembukaan Penawaran Sampul Dua'),
(100, '11:11:00', 'asdasdas', 'Evaluasi Penawaran Sampul Dua'),
(102, '12:12:00', 'adasdasd', 'Negosiasi dan Klarifikasi'),
(104, '12:12:00', 'asdasda', 'Aanwijzing'),
(106, '12:12:00', 'asdasdas', 'Pembukaan Penawaran Sampul Satu'),
(108, '12:11:00', 'asdasdasd', 'Evaluasi Penawaran Sampul Satu'),
(110, '12:11:00', 'adasdasd', 'Pembukaan Penawaran Sampul Dua'),
(112, '11:11:00', 'asdasdas', 'Evaluasi Penawaran Sampul Dua'),
(114, '12:12:00', 'adasdasd', 'Negosiasi dan Klarifikasi'),
(118, '12:11:00', 'asdasdasd', 'Evaluasi Penawaran Sampul Satu'),
(120, '12:11:00', 'adasdasd', 'Pembukaan Penawaran Sampul Dua'),
(122, '11:11:00', 'asdasdas', 'Evaluasi Penawaran Sampul Dua'),
(124, '12:12:00', 'adasdasd', 'Negosiasi dan Klarifikasi'),
(129, '12:12:00', 'asdasda', 'Aanwijzing');

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE IF NOT EXISTS `divisi` (
  `username` varchar(20) NOT NULL,
  `nama_divisi` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`username`, `nama_divisi`, `password`) VALUES
('divin', 'Divisi Internet', '8c43d3b2add61b1cff1ff5373e548fe9808c31a6'),
('divman', 'Divisi Manajemen', '35e5dd2a4a3d599fcdfe62ec64e40b9e70841806'),
('divsi', 'Divisi Sistem Informasi', '2a553a3d07a93933784f7826119d9dcd05335ba4'),
('divtrans', 'Divisi Transportasi', 'a085f26cf56aea0d3cc6688b9c5084aecba722df');

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
(1, 'Nota Dinas Permintaan', '2013-07-18', 'Jakarta', 1, 'Selesai'),
(2, 'TOR', '2013-07-18', 'Jakarta', 1, 'Selesai'),
(3, 'RAB', '2013-07-18', 'Jakarta', 1, 'Selesai'),
(4, 'Nota Dinas Perintah Pengadaan', '2013-07-07', 'Jakarta', 1, 'Belum Selesai'),
(5, 'Nota Dinas Permintaan', '2013-07-17', 'Jakarta', 2, 'Selesai'),
(6, 'TOR', '2013-07-17', 'Jakarta', 2, 'Selesai'),
(7, 'RAB', '2013-07-17', 'Jakarta', 2, 'Selesai'),
(8, 'Nota Dinas Perintah Pengadaan', '2013-07-07', 'Jakarta', 2, 'Belum Selesai'),
(9, 'Nota Dinas Permintaan', '2013-07-17', 'Jakarta', 3, 'Selesai'),
(10, 'TOR', '2013-07-17', 'Jakarta', 3, 'Selesai'),
(11, 'RAB', '2013-07-17', 'Jakarta', 3, 'Selesai'),
(12, 'Nota Dinas Perintah Pengadaan', '2013-07-07', 'Jakarta', 3, 'Belum Selesai'),
(13, 'Dokumen Prakualifikasi', '2013-07-09', 'Jakarta', 1, 'Belum Selesai'),
(14, 'Pakta Integritas Penyedia', '1970-01-01', '-', 1, 'Belum Selesai'),
(15, 'Surat Pengantar Penawaran Harga', '1970-01-01', 'Jakarta', 1, 'Belum Selesai'),
(16, 'Surat Pernyataan Minat', '1970-01-01', '-', 1, 'Belum Selesai'),
(17, 'Form Isian Kualifikasi', '1970-01-01', '-', 1, 'Belum Selesai'),
(18, 'Surat Undangan Prakualifikasi', '2013-07-31', 'Jakarta', 1, 'Belum Selesai'),
(19, 'Pakta Integritas Awal Panitia', '2013-07-10', 'Jakarta', 2, 'Belum Selesai'),
(20, 'RKS', '2013-07-10', 'Jakarta', 1, 'Belum Selesai'),
(21, 'HPS', '2013-07-10', 'Jakarta', 1, 'Belum Selesai'),
(22, 'Pakta Integritas Awal Panitia', '2013-07-10', 'Jakarta', 3, 'Belum Selesai'),
(23, 'Nota Dinas Permintaan', '2013-07-03', 'Jakarta', 4, 'Selesai'),
(24, 'TOR', '2013-07-03', 'Jakarta', 4, 'Selesai'),
(25, 'RAB', '2013-07-03', 'Jakarta', 4, 'Selesai'),
(26, 'Pakta Integritas Awal Panitia', '2013-07-10', 'Jakarta', 3, 'Belum Selesai'),
(27, 'RKS', '2013-07-16', 'Jakarta', 3, 'Belum Selesai'),
(29, 'Pakta Integritas Penyedia', '1970-01-01', '-', 3, 'Belum Selesai'),
(30, 'Surat Pengantar Penawaran Harga', '1970-01-01', 'Jakarta', 3, 'Belum Selesai'),
(31, 'Surat Pernyataan Minat', '1970-01-01', '-', 3, 'Belum Selesai'),
(32, 'Form Isian Kualifikasi', '1970-01-01', '-', 3, 'Belum Selesai'),
(33, 'HPS', '2013-07-10', 'Jakarta', 3, 'Belum Selesai'),
(34, 'Surat Undangan Pengambilan Dokumen Pengadaan', '2013-07-10', 'Jakarta', 3, 'Belum Selesai'),
(35, 'Surat Undangan Pengambilan Dokumen Pengadaan', '2013-07-10', 'Jakarta', 3, 'Belum Selesai'),
(36, 'Dokumen Lain-lain', '1970-01-01', 'Jakarta', 5, 'Belum Selesai'),
(37, 'Nota Dinas Permintaan', '2013-07-09', 'Jakarta', 5, 'Selesai'),
(38, 'TOR', '2013-07-09', 'Jakarta', 5, 'Selesai'),
(39, 'RAB', '2013-07-09', 'Jakarta', 5, 'Selesai'),
(40, 'Dokumen Lain-lain', '1970-01-01', 'Jakarta', 6, 'Belum Selesai'),
(41, 'Nota Dinas Permintaan', '2013-07-09', 'Jakarta', 6, 'Selesai'),
(42, 'TOR', '2013-07-09', 'Jakarta', 6, 'Selesai'),
(43, 'RAB', '2013-07-09', 'Jakarta', 6, 'Selesai'),
(44, 'Dokumen Lain-lain', '1970-01-01', 'Jakarta', 7, 'Belum Selesai'),
(45, 'Nota Dinas Permintaan', '2013-07-10', 'Jakarta', 7, 'Belum Selesai'),
(46, 'TOR', '2013-07-10', 'Jakarta', 7, 'Belum Selesai'),
(47, 'RAB', '2013-07-10', 'Jakarta', 7, 'Belum Selesai'),
(48, 'Nota Dinas Permintaan TOR/RAB', '2013-07-10', 'Jakarta', 7, 'Belum Selesai'),
(49, 'Nota Dinas Perintah Pengadaan', '2013-07-10', 'Jakarta', 6, 'Belum Selesai'),
(50, 'Pakta Integritas Awal Panitia', '2013-07-10', 'Jakarta', 6, 'Belum Selesai'),
(51, 'RKS', '2013-07-10', 'Jakarta', 6, 'Belum Selesai'),
(53, 'Pakta Integritas Penyedia', '1970-01-01', '-', 6, 'Belum Selesai'),
(54, 'Surat Pengantar Penawaran Harga', '1970-01-01', 'Jakarta', 6, 'Belum Selesai'),
(55, 'Surat Pernyataan Minat', '1970-01-01', '-', 6, 'Belum Selesai'),
(56, 'Form Isian Kualifikasi', '1970-01-01', '-', 6, 'Belum Selesai'),
(57, 'HPS', '2013-07-10', 'Jakarta', 6, 'Belum Selesai'),
(58, 'Surat Undangan Pengambilan Dokumen Pengadaan', '2013-07-10', 'Jakarta', 3, 'Belum Selesai'),
(59, 'Berita Acara Aanwijzing', '2013-07-09', 'Jakarta', 3, 'Belum Selesai'),
(60, 'Daftar Hadir Aanwijzing', '2013-07-09', 'Jakarta', 3, 'Belum Selesai'),
(61, 'Berita Acara Aanwijzing', '2013-07-09', 'Jakarta', 3, 'Belum Selesai'),
(62, 'Daftar Hadir Aanwijzing', '2013-07-09', 'Jakarta', 3, 'Belum Selesai'),
(63, 'Berita Acara Pembukaan Penawaran', '2013-07-02', 'Jakarta', 3, 'Belum Selesai'),
(64, 'Daftar Hadir Pembukaan Penawaran', '2013-07-02', 'Jakarta', 3, 'Belum Selesai'),
(65, 'Berita Acara Evaluasi Penawaran', '2013-07-10', 'Jakarta', 3, 'Belum Selesai'),
(66, 'Daftar Hadir Evaluasi Penawaran', '2013-07-10', 'Jakarta', 3, 'Belum Selesai'),
(67, 'Berita Acara Negosiasi dan Klarifikasi', '2013-07-09', 'Jakarta', 3, 'Belum Selesai'),
(68, 'Daftar Hadir Negosiasi dan Klarifikasi', '2013-07-09', 'Jakarta', 3, 'Belum Selesai'),
(69, 'Nota Dinas Usulan Pemenang', '2013-07-10', 'Jakarta', 3, 'Belum Selesai'),
(70, 'Pakta Integritas Akhir Panitia', '2013-07-10', 'Jakarta', 3, 'Belum Selesai'),
(71, 'Berita Acara Negosiasi dan Klarifikasi', '2013-07-09', 'Jakarta', 3, 'Belum Selesai'),
(72, 'Daftar Hadir Negosiasi dan Klarifikasi', '2013-07-09', 'Jakarta', 3, 'Belum Selesai'),
(73, 'Nota Dinas Usulan Pemenang', '2013-07-10', 'Jakarta', 3, 'Belum Selesai'),
(74, 'Pakta Integritas Akhir Panitia', '2013-07-10', 'Jakarta', 3, 'Belum Selesai'),
(75, 'Nota Dinas Penetapan Pemenang', '2013-07-10', 'Jakarta', 3, 'Belum Selesai'),
(76, 'Surat Pengumuman Pelelangan', '2013-07-10', 'Jakarta', 3, 'Belum Selesai'),
(77, 'Dokumen Lain-lain', '1970-01-01', 'Jakarta', 8, 'Belum Selesai'),
(78, 'Nota Dinas Permintaan', '2013-07-05', 'Jakarta', 8, 'Selesai'),
(79, 'TOR', '2013-07-05', 'Jakarta', 8, 'Selesai'),
(80, 'RAB', '2013-07-05', 'Jakarta', 8, 'Selesai'),
(81, 'Nota Dinas Perintah Pengadaan', '2013-07-10', 'Jakarta', 8, 'Belum Selesai'),
(82, 'Pakta Integritas Awal Panitia', '2013-07-10', 'Jakarta', 8, 'Belum Selesai'),
(83, 'RKS', '2013-07-10', 'Jakarta', 8, 'Belum Selesai'),
(85, 'Pakta Integritas Penyedia', '1970-01-01', '-', 8, 'Belum Selesai'),
(86, 'Surat Pengantar Penawaran Harga', '1970-01-01', 'Jakarta', 8, 'Belum Selesai'),
(87, 'Surat Pernyataan Minat', '1970-01-01', '-', 8, 'Belum Selesai'),
(88, 'Form Isian Kualifikasi', '1970-01-01', '-', 8, 'Belum Selesai'),
(89, 'HPS', '2013-07-10', 'Jakarta', 8, 'Belum Selesai'),
(90, 'Surat Undangan Pengambilan Dokumen Pengadaan', '2013-07-10', 'Jakarta', 8, 'Belum Selesai'),
(91, 'Berita Acara Aanwijzing', '2013-07-05', 'Jakarta', 8, 'Belum Selesai'),
(92, 'Daftar Hadir Aanwijzing', '2013-07-05', 'Jakarta', 8, 'Belum Selesai'),
(93, 'Berita Acara Pembukaan Penawaran Sampul Satu', '2013-07-08', 'Jakarta', 8, 'Belum Selesai'),
(94, 'Daftar Hadir Pembukaan Penawaran Sampul Satu', '2013-07-08', 'Jakarta', 8, 'Belum Selesai'),
(95, 'Berita Acara Evaluasi Penawaran Sampul Satu', '2013-07-10', 'Jakarta', 8, 'Belum Selesai'),
(96, 'Daftar Hadir Evaluasi Penawaran Sampul Satu', '2013-07-10', 'Jakarta', 8, 'Belum Selesai'),
(97, 'Berita Acara Pembukaan Penawaran Sampul Dua', '2013-07-10', 'Jakarta', 8, 'Belum Selesai'),
(98, 'Daftar Hadir Pembukaan Penawaran Sampul Dua', '2013-07-10', 'Jakarta', 8, 'Belum Selesai'),
(99, 'Berita Acara Evaluasi Penawaran Sampul Dua', '2013-07-10', 'Jakarta', 8, 'Belum Selesai'),
(100, 'Daftar Hadir Evaluasi Penawaran Sampul Dua', '2013-07-10', 'Jakarta', 8, 'Belum Selesai'),
(101, 'Berita Acara Negosiasi dan Klarifikasi', '2013-07-31', 'Jakarta', 8, 'Belum Selesai'),
(102, 'Daftar Hadir Negosiasi dan Klarifikasi', '2013-07-31', 'Jakarta', 8, 'Belum Selesai'),
(103, 'Berita Acara Aanwijzing', '2013-07-05', 'Jakarta', 8, 'Belum Selesai'),
(104, 'Daftar Hadir Aanwijzing', '2013-07-05', 'Jakarta', 8, 'Belum Selesai'),
(105, 'Berita Acara Pembukaan Penawaran Sampul Satu', '2013-07-08', 'Jakarta', 8, 'Belum Selesai'),
(106, 'Daftar Hadir Pembukaan Penawaran Sampul Satu', '2013-07-08', 'Jakarta', 8, 'Belum Selesai'),
(107, 'Berita Acara Evaluasi Penawaran Sampul Satu', '2013-07-10', 'Jakarta', 8, 'Belum Selesai'),
(108, 'Daftar Hadir Evaluasi Penawaran Sampul Satu', '2013-07-10', 'Jakarta', 8, 'Belum Selesai'),
(109, 'Berita Acara Pembukaan Penawaran Sampul Dua', '2013-07-10', 'Jakarta', 8, 'Belum Selesai'),
(110, 'Daftar Hadir Pembukaan Penawaran Sampul Dua', '2013-07-10', 'Jakarta', 8, 'Belum Selesai'),
(111, 'Berita Acara Evaluasi Penawaran Sampul Dua', '2013-07-10', 'Jakarta', 8, 'Belum Selesai'),
(112, 'Daftar Hadir Evaluasi Penawaran Sampul Dua', '2013-07-10', 'Jakarta', 8, 'Belum Selesai'),
(113, 'Berita Acara Negosiasi dan Klarifikasi', '2013-07-31', 'Jakarta', 8, 'Belum Selesai'),
(114, 'Daftar Hadir Negosiasi dan Klarifikasi', '2013-07-31', 'Jakarta', 8, 'Belum Selesai'),
(115, 'Nota Dinas Usulan Pemenang', '2013-07-10', 'Jakarta', 8, 'Belum Selesai'),
(116, 'Pakta Integritas Akhir Panitia', '2013-07-10', 'Jakarta', 8, 'Belum Selesai'),
(117, 'Berita Acara Evaluasi Penawaran Sampul Satu', '2013-07-10', 'Jakarta', 8, 'Belum Selesai'),
(118, 'Daftar Hadir Evaluasi Penawaran Sampul Satu', '2013-07-10', 'Jakarta', 8, 'Belum Selesai'),
(119, 'Berita Acara Pembukaan Penawaran Sampul Dua', '2013-07-10', 'Jakarta', 8, 'Belum Selesai'),
(120, 'Daftar Hadir Pembukaan Penawaran Sampul Dua', '2013-07-10', 'Jakarta', 8, 'Belum Selesai'),
(121, 'Berita Acara Evaluasi Penawaran Sampul Dua', '2013-07-10', 'Jakarta', 8, 'Belum Selesai'),
(122, 'Daftar Hadir Evaluasi Penawaran Sampul Dua', '2013-07-10', 'Jakarta', 8, 'Belum Selesai'),
(123, 'Berita Acara Negosiasi dan Klarifikasi', '2013-07-31', 'Jakarta', 8, 'Belum Selesai'),
(124, 'Daftar Hadir Negosiasi dan Klarifikasi', '2013-07-31', 'Jakarta', 8, 'Belum Selesai'),
(125, 'Nota Dinas Usulan Pemenang', '2013-07-10', 'Jakarta', 8, 'Belum Selesai'),
(126, 'Pakta Integritas Akhir Panitia', '2013-07-10', 'Jakarta', 8, 'Belum Selesai'),
(127, 'Nota Dinas Penetapan Pemenang', '2013-07-10', 'Jakarta', 8, 'Belum Selesai'),
(128, 'Berita Acara Aanwijzing', '2013-07-05', 'Jakarta', 8, 'Belum Selesai'),
(129, 'Daftar Hadir Aanwijzing', '2013-07-05', 'Jakarta', 8, 'Belum Selesai'),
(130, 'Surat Undangan Permintaan Penawaran Harga', '2013-07-10', 'Jakarta', 6, 'Belum Selesai');

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
-- Table structure for table `dokumen_prakualifikasi`
--

CREATE TABLE IF NOT EXISTS `dokumen_prakualifikasi` (
  `id_dokumen` bigint(32) NOT NULL,
  `nomor` varchar(100) NOT NULL,
  `tujuan_pengadaan` varchar(256) NOT NULL,
  `tanggal_pemasukan1` date NOT NULL,
  `tanggal_pemasukan2` date NOT NULL,
  `waktu_pemasukan1` time NOT NULL,
  `waktu_pemasukan2` time NOT NULL,
  `tempat_pemasukan` varchar(256) NOT NULL,
  `tanggal_evaluasi` date NOT NULL,
  `waktu_evaluasi` time NOT NULL,
  `tempat_evaluasi` varchar(256) NOT NULL,
  `tanggal_penetapan` date NOT NULL,
  `waktu_penetapan` time NOT NULL,
  `tempat_penetapan` varchar(256) NOT NULL,
  `bidang_usaha` varchar(256) NOT NULL,
  `sub_bidang_usaha` varchar(256) NOT NULL,
  `kualifikasi_perusahaan` varchar(256) NOT NULL,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dokumen_prakualifikasi`
--

INSERT INTO `dokumen_prakualifikasi` (`id_dokumen`, `nomor`, `tujuan_pengadaan`, `tanggal_pemasukan1`, `tanggal_pemasukan2`, `waktu_pemasukan1`, `waktu_pemasukan2`, `tempat_pemasukan`, `tanggal_evaluasi`, `waktu_evaluasi`, `tempat_evaluasi`, `tanggal_penetapan`, `waktu_penetapan`, `tempat_penetapan`, `bidang_usaha`, `sub_bidang_usaha`, `kualifikasi_perusahaan`) VALUES
(13, 'lala', 'lala', '2013-07-10', '2013-07-19', '18:00:00', '19:00:00', 'lala', '2013-07-24', '18:00:00', 'lala', '2013-07-18', '18:00:00', 'lala', 'lala', 'lla', 'lala');

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
(17),
(32),
(56),
(88);

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
(21, '22222'),
(33, '333'),
(57, '234234234'),
(89, '1232142w2e');

-- --------------------------------------------------------

--
-- Table structure for table `kdivmum`
--

CREATE TABLE IF NOT EXISTS `kdivmum` (
  `username` varchar(20) NOT NULL,
  `password` varchar(256) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `NIP` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `jabatan` varchar(32) NOT NULL,
  `status_user` varchar(100) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kdivmum`
--

INSERT INTO `kdivmum` (`username`, `password`, `nama`, `NIP`, `email`, `jabatan`, `status_user`) VALUES
('aidil.syaputra', 'e58b8152bd0328baceafd4b178ff0a8fd77e5420', 'Aidil Syaputra', '123456789', 'aidil@gmail.com', 'KDIVMUM', 'Aktif'),
('kevin.indra', 'ffb4761cba839470133bee36aeb139f58d7dbaa9', 'Kevin Indra', '111111', 'a@aa.aa', 'MSDAF', 'Aktif');

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
  `nama_file` varchar(256) NOT NULL,
  PRIMARY KEY (`id_link`),
  KEY `id_dokumen` (`id_dokumen`),
  KEY `pengunggah` (`pengunggah`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `link_dokumen`
--

INSERT INTO `link_dokumen` (`id_link`, `id_dokumen`, `waktu_upload`, `tanggal_upload`, `pengunggah`, `nomor_link`, `format_dokumen`, `nama_file`) VALUES
(1, 1, '22:17:41', '2013-07-07', 'aidilsyaputra', 1, 'txt', 'dummy'),
(2, 2, '22:17:48', '2013-07-07', 'aidilsyaputra', 1, 'txt', 'dummy'),
(3, 3, '22:17:52', '2013-07-07', 'aidilsyaputra', 1, 'txt', 'dummy'),
(4, 3, '22:17:55', '2013-07-07', 'aidilsyaputra', 2, 'txt', 'dummy'),
(5, 5, '22:26:14', '2013-07-07', 'aidilsyaputra', 1, 'txt', 'dummy'),
(6, 5, '22:26:15', '2013-07-07', 'aidilsyaputra', 2, 'txt', 'dummy'),
(7, 6, '22:26:18', '2013-07-07', 'aidilsyaputra', 1, 'txt', 'dummy'),
(8, 7, '22:26:22', '2013-07-07', 'aidilsyaputra', 1, 'txt', 'dummy'),
(9, 7, '22:26:26', '2013-07-07', 'aidilsyaputra', 2, 'txt', 'dummy'),
(10, 9, '22:29:40', '2013-07-07', 'aidilsyaputra', 1, 'txt', 'dummy'),
(11, 10, '22:29:43', '2013-07-07', 'aidilsyaputra', 1, 'txt', 'dummy'),
(12, 10, '22:29:43', '2013-07-07', 'aidilsyaputra', 2, 'txt', 'dummy'),
(13, 11, '22:29:47', '2013-07-07', 'aidilsyaputra', 1, 'txt', 'dummy'),
(14, 11, '22:29:50', '2013-07-07', 'aidilsyaputra', 2, 'txt', 'dummy'),
(15, 23, '01:22:49', '2013-07-10', 'aidil.syaputra', 1, 'txt', ''),
(16, 24, '01:23:00', '2013-07-10', 'aidil.syaputra', 1, 'txt', ''),
(17, 25, '01:23:10', '2013-07-10', 'aidil.syaputra', 1, 'txt', ''),
(18, 37, '13:43:28', '2013-07-10', 'aidil.syaputra', 1, 'txt', 'list file hasil crud yg diubah'),
(19, 38, '13:43:35', '2013-07-10', 'aidil.syaputra', 1, 'txt', 'list file hasil crud yg diubah'),
(20, 39, '13:43:42', '2013-07-10', 'aidil.syaputra', 1, 'txt', 'list file hasil crud yg diubah'),
(21, 41, '13:53:42', '2013-07-10', 'divin', 1, 'txt', 'list file hasil crud yg diubah'),
(22, 42, '13:53:55', '2013-07-10', 'divin', 1, 'txt', 'list file hasil crud yg diubah'),
(23, 43, '13:54:03', '2013-07-10', 'divin', 1, 'txt', 'list file hasil crud yg diubah'),
(24, 78, '21:15:01', '2013-07-10', 'aidil.syaputra', 1, 'txt', 'list file hasil crud yg diubah'),
(25, 79, '21:15:09', '2013-07-10', 'aidil.syaputra', 1, 'txt', 'list file hasil crud yg diubah'),
(26, 80, '21:15:21', '2013-07-10', 'aidil.syaputra', 1, 'txt', 'list file hasil crud yg diubah');

-- --------------------------------------------------------

--
-- Table structure for table `nota_dinas_pemberitahuan_pemenang`
--

CREATE TABLE IF NOT EXISTS `nota_dinas_pemberitahuan_pemenang` (
  `id_dokumen` bigint(32) NOT NULL,
  `nomor` varchar(50) NOT NULL,
  `keterangan` varchar(256) NOT NULL,
  `batas_sanggahan` int(255) NOT NULL,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nota_dinas_penetapan_pemenang`
--

CREATE TABLE IF NOT EXISTS `nota_dinas_penetapan_pemenang` (
  `id_dokumen` bigint(32) NOT NULL,
  `nomor` varchar(50) NOT NULL,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nota_dinas_penetapan_pemenang`
--

INSERT INTO `nota_dinas_penetapan_pemenang` (`id_dokumen`, `nomor`) VALUES
(75, '12341231'),
(127, '23423');

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
(4, '035/DVMUM/2013', 'KDIVMUM', 'Gilang Laksana', 'Penunjukan Panitia', 90, 'Kas PLN', 2147483647),
(8, '056/DIVMUM/2013', 'MSDAF', 'Johannes Ridho', 'Penunjukan Pejabat Pengadaan Barang dan Jasa', 89, 'Kas PLN', 135000000),
(12, '095/DVMUM/2013', 'KDIVMUM', 'Johannes Ridho', 'Penunjukan Pejabat Pengadaan', 67, 'Kas PLN', 125710000),
(49, '3123123123', 'MSDAF', 'Johannes Ridho', 'penunjukan panitia', 12, 'Anggaran Investasi PLN Pusat 2012', 1993905000),
(81, '12312312312', 'KDIVMUM', 'Irvan Aditya', 'asdasd', 12, 'Anggaran Investasi PLN Pusat 2012', 1993905000);

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
(1, '045/DVMAM/2013', 'Permintaan Pengadaan Sepatu Futsal  Untuk Pemain Dalam Kejuaran Futsal', 827810380),
(5, '045/DIVIN/2013', 'Permintaan Fasilitas Internet', 113670300),
(9, '073/DIVTRANS/2013', 'Permintaan Mobil Dinas', 156000000),
(23, '111111', 'asdasd', 1000000000),
(37, '111111111111', 'perihal', 1000000000),
(41, '333333333', 'perihal', 12345678),
(45, '21213123123', 'asdasd', 2147483647),
(78, '1111111111', 'asdasdas', 1000000000);

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

--
-- Dumping data for table `nota_dinas_permintaan_tor_rab`
--

INSERT INTO `nota_dinas_permintaan_tor_rab` (`id_dokumen`, `nomor`, `permintaan`) VALUES
(48, '12312312', 'Rencana Anggaran Biaya (RAB) dan Term Of Reference (TOR)');

-- --------------------------------------------------------

--
-- Table structure for table `nota_dinas_usulan_pemenang`
--

CREATE TABLE IF NOT EXISTS `nota_dinas_usulan_pemenang` (
  `id_dokumen` bigint(32) NOT NULL,
  `nomor` varchar(50) NOT NULL,
  `waktu_pelaksanaan` date NOT NULL,
  `tempat_penyerahan` varchar(256) NOT NULL,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nota_dinas_usulan_pemenang`
--

INSERT INTO `nota_dinas_usulan_pemenang` (`id_dokumen`, `nomor`, `waktu_pelaksanaan`, `tempat_penyerahan`) VALUES
(69, '124321eqwdeaSD', '0000-00-00', 'ASDASDAS'),
(73, '12e123e', '2013-07-11', 'asdasda'),
(115, 'q24234', '2013-07-05', 'asdasda'),
(125, '123qw', '2013-07-10', 'adasdas');

-- --------------------------------------------------------

--
-- Table structure for table `pakta_integritas_panitia_1`
--

CREATE TABLE IF NOT EXISTS `pakta_integritas_panitia_1` (
  `id_dokumen` bigint(32) NOT NULL,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pakta_integritas_panitia_1`
--

INSERT INTO `pakta_integritas_panitia_1` (`id_dokumen`) VALUES
(19),
(22),
(26),
(50),
(82);

-- --------------------------------------------------------

--
-- Table structure for table `pakta_integritas_panitia_2`
--

CREATE TABLE IF NOT EXISTS `pakta_integritas_panitia_2` (
  `id_dokumen` bigint(32) NOT NULL,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pakta_integritas_panitia_2`
--

INSERT INTO `pakta_integritas_panitia_2` (`id_dokumen`) VALUES
(70),
(74),
(116),
(126);

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
(14),
(29),
(53),
(85);

-- --------------------------------------------------------

--
-- Table structure for table `panitia`
--

CREATE TABLE IF NOT EXISTS `panitia` (
  `id_panitia` bigint(11) NOT NULL AUTO_INCREMENT,
  `nama_panitia` varchar(50) NOT NULL,
  `SK_panitia` varchar(50) NOT NULL,
  `tanggal_sk` date NOT NULL,
  `jumlah_anggota` bigint(20) NOT NULL,
  `status_panitia` varchar(32) NOT NULL,
  `jenis_panitia` varchar(20) NOT NULL,
  PRIMARY KEY (`id_panitia`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `panitia`
--

INSERT INTO `panitia` (`id_panitia`, `nama_panitia`, `SK_panitia`, `tanggal_sk`, `jumlah_anggota`, `status_panitia`, `jenis_panitia`) VALUES
(-1, 'Belum ada PIC', '-', '0000-00-00', 0, '-', '-'),
(1, 'Hanif Eridaputra', '-', '0000-00-00', 1, 'Aktif', 'Pejabat'),
(2, 'Johannes Ridho', '-', '0000-00-00', 1, 'Aktif', 'Pejabat'),
(3, 'Panitia-A', '024/SK/PLN', '2013-07-01', 3, 'Aktif', 'Panitia'),
(4, 'Panitia-B', '025/SK/PLN', '2013-07-01', 2, 'Aktif', 'Panitia'),
(5, 'Panitia-C', '026/SK/PLN', '2012-07-09', 0, 'Tidak Aktif', 'Panitia');

-- --------------------------------------------------------

--
-- Table structure for table `penerima_pengadaan`
--

CREATE TABLE IF NOT EXISTS `penerima_pengadaan` (
  `id_penerima` bigint(255) NOT NULL AUTO_INCREMENT,
  `perusahaan` varchar(100) NOT NULL,
  `id_pengadaan` bigint(255) NOT NULL,
  `alamat` varchar(256) NOT NULL,
  `npwp` varchar(256) NOT NULL,
  `nilai` bigint(255) NOT NULL,
  `biaya` varchar(256) NOT NULL,
  `undangan_prakualifikasi` varchar(256) NOT NULL,
  `pendaftaran_pelelangan_pq` varchar(256) NOT NULL,
  `pengambilan_lelang_pq` varchar(256) NOT NULL,
  `penyampaian_lelang` varchar(256) NOT NULL,
  `evaluasi_pq` varchar(256) NOT NULL,
  `penetapan_pq` varchar(256) NOT NULL,
  `undangan_supph` varchar(256) NOT NULL,
  `pendaftaran_pc` varchar(256) NOT NULL,
  `pengambilan_dokumen` varchar(256) NOT NULL,
  `ba_aanwijzing` varchar(256) NOT NULL,
  `pembukaan_penawaran_1` varchar(256) NOT NULL,
  `evaluasi_penawaran_1` varchar(256) NOT NULL,
  `pembukaan_penawaran_2` varchar(256) NOT NULL,
  `evaluasi_penawaran_2` varchar(256) NOT NULL,
  `negosiasi_klarifikasi` varchar(256) NOT NULL,
  `usulan_pemenang` varchar(256) NOT NULL,
  `penetapan_pemenang` varchar(256) NOT NULL,
  `nomor_surat_penawaran` varchar(256) NOT NULL,
  `tanggal_penawaran` varchar(256) NOT NULL,
  PRIMARY KEY (`id_penerima`),
  KEY `id_pengadaan` (`id_pengadaan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `penerima_pengadaan`
--

INSERT INTO `penerima_pengadaan` (`id_penerima`, `perusahaan`, `id_pengadaan`, `alamat`, `npwp`, `nilai`, `biaya`, `undangan_prakualifikasi`, `pendaftaran_pelelangan_pq`, `pengambilan_lelang_pq`, `penyampaian_lelang`, `evaluasi_pq`, `penetapan_pq`, `undangan_supph`, `pendaftaran_pc`, `pengambilan_dokumen`, `ba_aanwijzing`, `pembukaan_penawaran_1`, `evaluasi_penawaran_1`, `pembukaan_penawaran_2`, `evaluasi_penawaran_2`, `negosiasi_klarifikasi`, `usulan_pemenang`, `penetapan_pemenang`, `nomor_surat_penawaran`, `tanggal_penawaran`) VALUES
(4, 'sdfsd', 3, '-', '-', 0, '-', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '-', '-', '-'),
(5, 'aasd', 3, '-', '-', 0, '-', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '-', '-', '-', '-', '-', '-', '-', '-'),
(6, 'asdas', 3, '-', '-', 0, '-', '1', '', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-'),
(10, 'a', 3, '-', '-', 0, '-', '1', '1', '0', '1', '1', '1', '1', '1', '1', '0', '-', '-', '-', '-', '-', '-', '-', '-', '-'),
(11, 'b', 3, '-', '-', 0, '-', '1', '1', '0', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-'),
(12, 'c', 3, '-', '-', 0, '-', '1', '1', '0', '1', '1', '1', '1', '1', '1', '0', '-', '-', '-', '-', '-', '-', '-', '-', '-'),
(13, 'd', 3, '-', '-', 0, '-', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '-', '-', '-', '-', '-', '-', '-'),
(14, 't', 3, '-', '-', 0, '-', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '-', '-', '-', '-'),
(15, 'f', 3, '-', '-', 0, '-', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '-', '-'),
(16, 'g', 3, '-', '-', 0, '-', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '-', '-'),
(17, 'a', 8, '-', '-', 0, '-', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '-', '-', '-', '-', '-', '-', '-', '-', '-'),
(18, 'b', 8, '-', '-', 0, '-', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '-', '-', '-', '-', '-', '-', '-', '-', '-'),
(19, 'c', 8, '-', '-', 0, '-', '1', '0', '0', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-'),
(20, 'd', 8, '-', '-', 0, '-', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '-', '-', '-', '-', '-', '-', '-', '-', '-'),
(21, 'e', 8, '-', '-', 0, '-', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '-', '-', '-', '-', '-', '-', '-', '-', '-'),
(22, 'a', 6, '-', '-', 0, '-', '1', '1', '1', '1', '1', '1', '0', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-'),
(23, 'b', 6, '-', '-', 0, '-', '1', '1', '1', '1', '1', '1', '1', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-'),
(24, 'c', 6, '-', '-', 0, '-', '1', '1', '1', '1', '1', '1', '1', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-');

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
(1, 'Pengadaan Sepatu Futsal', 'divman', 'Barang dan Jasa', '-', '2013-07-07', '0000-00-00', '6', 0, 3, 'Pelelangan', 'Satu Sampul', 'Pra Kualifikasi'),
(2, 'Pengadaan Internet', 'divin', 'Barang dan Jasa', '-', '2013-07-07', '0000-00-00', '10', 0, 2, 'Pemilihan Langsung', 'Satu Sampul', 'Pasca Kualifikasi'),
(3, 'Pengadaan Mobil', 'divin', 'Barang dan Jasa', '-', '2013-07-07', '0000-00-00', '26', 0, 3, 'Pelelangan', 'Satu Sampul', 'Pasca Kualifikasi'),
(4, 'peng a', 'divman', 'Barang dan Jasa', '-', '2013-07-10', '0000-00-00', '-1', 0, -1, '-', '-', '-'),
(5, 'pengadaan alat tulis', 'divin', 'Barang dan Jasa', '-', '2013-07-10', '0000-00-00', '-1', 0, -1, '-', '-', '-'),
(6, 'pengadaan wifi', 'divin', 'Barang dan Jasa', '-', '2013-07-11', '0000-00-00', '15', 0, 2, 'Penunjukan Langsung', 'Satu Sampul', 'Pasca Kualifikasi'),
(7, 'pengadaan 1', 'divin', 'Barang dan Jasa', '-', '2013-07-10', '0000-00-00', '-1', 0, -1, '-', '-', '-'),
(8, 'lelang 2 sampul', 'divin', 'Barang dan Jasa', '-', '2013-07-10', '0000-00-00', '17', 0, 4, 'Pelelangan', 'Dua Sampul', 'Pasca Kualifikasi');

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
(3),
(7),
(11),
(25),
(39),
(43),
(47),
(80);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=182 ;

--
-- Dumping data for table `rincian_rks`
--

INSERT INTO `rincian_rks` (`id_rincian`, `nama_rincian`, `id_dokumen`) VALUES
(138, 'Cover', 20),
(139, 'Daftar Isi', 20),
(140, 'Isi', 20),
(141, 'Lampiran 1', 20),
(142, 'Lampiran 2', 20),
(143, 'Lampiran 3', 20),
(144, 'Lampiran 4', 20),
(145, 'Lampiran 5', 20),
(146, 'Lampiran 6', 20),
(147, 'Lampiran 7', 20),
(148, 'Lampiran ba', 20),
(149, 'Cover', 27),
(150, 'Daftar Isi', 27),
(151, 'Isi', 27),
(152, 'Lampiran 1', 27),
(153, 'Lampiran 2', 27),
(154, 'Lampiran 3', 27),
(155, 'Lampiran 4', 27),
(156, 'Lampiran 5', 27),
(157, 'Lampiran 6', 27),
(158, 'Lampiran 7', 27),
(159, 'Lampiran ba', 27),
(160, 'Cover', 51),
(161, 'Daftar Isi', 51),
(162, 'Isi', 51),
(163, 'Lampiran 1', 51),
(164, 'Lampiran 2', 51),
(165, 'Lampiran 3', 51),
(166, 'Lampiran 4', 51),
(167, 'Lampiran 5', 51),
(168, 'Lampiran 6', 51),
(169, 'Lampiran 7', 51),
(170, 'Lampiran ba', 51),
(171, 'Cover', 83),
(172, 'Daftar Isi', 83),
(173, 'Isi', 83),
(174, 'Lampiran 1', 83),
(175, 'Lampiran 2', 83),
(176, 'Lampiran 3', 83),
(177, 'Lampiran 4', 83),
(178, 'Lampiran 5', 83),
(179, 'Lampiran 6', 83),
(180, 'Lampiran 7', 83),
(181, 'Lampiran ba', 83);

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
(20, '1231231', 1, '2013-07-05', '2013-07-10', '12:12:00', 'zdcc', '2013-07-11', '2013-07-03', '12:11:00', 'dasfas', '2013-07-02', '12:12:00', 'fddsfzsd', '2013-07-02', '12:11:00', 'zscdf', '1970-01-01', '1970-01-01', '00:00:00', '-', '1970-01-01', '00:00:00', '-', '1970-01-01', '00:00:00', '-', '2013-07-03', '12:12:00', 'xzczc', '2013-07-02', '12:12:00', '2013-07-15', '12:12:00', '2013-07-01', '12:12:00', '2013-07-29', '11:11:00', 'gugur', 12, '2013-07-02', 1, 12),
(27, '222222', 1, '2013-07-09', '2013-07-09', '12:12:00', 'asdasd', '2013-07-17', '2013-07-23', '12:11:00', 'asdas', '2013-07-02', '12:12:00', 'asdasd', '2013-07-09', '12:11:00', 'adasda', '1970-01-01', '1970-01-01', '00:00:00', '-', '1970-01-01', '00:00:00', '-', '1970-01-01', '00:00:00', '-', '2013-07-09', '12:12:00', 'adasda', '2013-07-02', '12:12:00', '2013-07-29', '12:12:00', '2013-07-01', '12:12:00', '2013-07-22', '11:11:00', 'gugur', 12, '2013-07-22', 2, 12),
(51, '12312213', 1, '2013-07-11', '2013-07-31', '12:12:00', 'asdsad', '2013-07-10', '2013-07-10', '12:11:00', 'asdas', '2013-07-09', '12:12:00', 'sfs', '2013-07-10', '12:11:00', 'asdas', '1970-01-01', '1970-01-01', '00:00:00', '-', '1970-01-01', '00:00:00', '-', '1970-01-01', '00:00:00', '-', '2013-07-10', '12:12:00', 'asdasdas', '2013-07-09', '12:12:00', '2013-07-09', '12:12:00', '2013-07-09', '12:12:00', '2013-07-15', '11:11:00', 'gugur', 12, '2013-07-01', 2, 12),
(83, '123123123', 1, '2013-07-05', '2013-07-05', '12:12:00', 'asdasda', '2013-07-24', '2013-07-09', '12:11:00', 'asdasda', '2013-07-08', '12:12:00', 'asdasdas', '2013-07-01', '12:11:00', 'asdasdasd', '1970-01-01', '1970-01-01', '00:00:00', '-', '2013-07-10', '12:11:00', 'adasdasd', '2013-07-01', '11:11:00', 'asdasdas', '2013-07-31', '12:12:00', 'adasdasd', '2013-07-23', '12:12:00', '2013-07-08', '12:12:00', '2013-07-29', '12:12:00', '2013-07-15', '11:11:00', 'gugur', 12, '2013-07-30', 2, 12);

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
(15),
(30),
(54),
(86);

-- --------------------------------------------------------

--
-- Table structure for table `surat_pengumuman_pelelangan`
--

CREATE TABLE IF NOT EXISTS `surat_pengumuman_pelelangan` (
  `id_dokumen` bigint(32) NOT NULL,
  `nomor` varchar(32) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `batas_sanggahan` int(32) NOT NULL,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_pengumuman_pelelangan`
--

INSERT INTO `surat_pengumuman_pelelangan` (`id_dokumen`, `nomor`, `keterangan`, `batas_sanggahan`) VALUES
(76, '3123123', 'asdasdas', 12);

-- --------------------------------------------------------

--
-- Table structure for table `surat_penunjukan_pemenang`
--

CREATE TABLE IF NOT EXISTS `surat_penunjukan_pemenang` (
  `id_dokumen` bigint(32) NOT NULL,
  `nomor` varchar(32) NOT NULL,
  `lama_penyerahan` int(32) NOT NULL,
  `jaminan` int(255) NOT NULL,
  `nomor_ski` varchar(32) NOT NULL,
  `tanggal_ski` date NOT NULL,
  `no_ski` varchar(32) NOT NULL,
  `no_surat_penawaran` varchar(256) NOT NULL,
  `tgl_surat_penawaran` date NOT NULL,
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
(16),
(31),
(55),
(87);

-- --------------------------------------------------------

--
-- Table structure for table `surat_undangan_negosiasi_klarifikasi`
--

CREATE TABLE IF NOT EXISTS `surat_undangan_negosiasi_klarifikasi` (
  `id_dokumen` bigint(32) NOT NULL,
  `nomor` varchar(50) NOT NULL,
  `perihal` varchar(100) NOT NULL,
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

--
-- Dumping data for table `surat_undangan_pengambilan_dokumen_pengadaan`
--

INSERT INTO `surat_undangan_pengambilan_dokumen_pengadaan` (`id_dokumen`, `nomor`, `tanggal_pengambilan`, `waktu_pengambilan`, `tempat_pengambilan`) VALUES
(34, '444', '2013-07-10', '12:11:00', 'dfsdfds'),
(35, '3324234', '2013-07-03', '12:11:00', 'dwerew'),
(58, '12342', '2013-07-11', '12:11:00', 'asdas'),
(90, '12321erwqads', '2013-07-09', '12:11:00', 'asdasdas');

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

-- --------------------------------------------------------

--
-- Table structure for table `surat_undangan_permintaan_penawaran_harga`
--

CREATE TABLE IF NOT EXISTS `surat_undangan_permintaan_penawaran_harga` (
  `id_dokumen` bigint(32) NOT NULL,
  `nomor` varchar(50) NOT NULL,
  `waktu_kerja` int(255) NOT NULL,
  `tempat_penyerahan` varchar(256) NOT NULL,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_undangan_permintaan_penawaran_harga`
--

INSERT INTO `surat_undangan_permintaan_penawaran_harga` (`id_dokumen`, `nomor`, `waktu_kerja`, `tempat_penyerahan`) VALUES
(130, 'asdas', 121, 'asdasd');

-- --------------------------------------------------------

--
-- Table structure for table `surat_undangan_prakualifikasi`
--

CREATE TABLE IF NOT EXISTS `surat_undangan_prakualifikasi` (
  `id_dokumen` bigint(32) NOT NULL,
  `nomor` varchar(100) NOT NULL,
  `perihal` varchar(256) NOT NULL,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_undangan_prakualifikasi`
--

INSERT INTO `surat_undangan_prakualifikasi` (`id_dokumen`, `nomor`, `perihal`) VALUES
(18, 'lala', 'Undangan Prakualifikasi Pengadaan Sepatu Futsal');

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
(6),
(10),
(24),
(38),
(42),
(46),
(79);

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
-- Constraints for table `anggota`
--
ALTER TABLE `anggota`
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
-- Constraints for table `dokumen_prakualifikasi`
--
ALTER TABLE `dokumen_prakualifikasi`
  ADD CONSTRAINT `dokumen_prakualifikasi_ibfk_1` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `link_dokumen`
--
ALTER TABLE `link_dokumen`
  ADD CONSTRAINT `link_dokumen_ibfk_1` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `pakta_integritas_panitia_1_ibfk_3` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE;

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

--
-- Constraints for table `surat_pengantar_penawaran_harga`
--
ALTER TABLE `surat_pengantar_penawaran_harga`
  ADD CONSTRAINT `surat_pengantar_penawaran_harga_ibfk_1` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `surat_pengumuman_pelelangan`
--
ALTER TABLE `surat_pengumuman_pelelangan`
  ADD CONSTRAINT `surat_pengumuman_pelelangan_ibfk_1` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `surat_penunjukan_pemenang`
--
ALTER TABLE `surat_penunjukan_pemenang`
  ADD CONSTRAINT `surat_penunjukan_pemenang_ibfk_1` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `surat_pernyataan_minat`
--
ALTER TABLE `surat_pernyataan_minat`
  ADD CONSTRAINT `surat_pernyataan_minat_ibfk_1` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `surat_undangan_negosiasi_klarifikasi`
--
ALTER TABLE `surat_undangan_negosiasi_klarifikasi`
  ADD CONSTRAINT `surat_undangan_negosiasi_klarifikasi_ibfk_1` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `surat_undangan_pembukaan_penawaran`
--
ALTER TABLE `surat_undangan_pembukaan_penawaran`
  ADD CONSTRAINT `surat_undangan_pembukaan_penawaran_ibfk_1` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `surat_undangan_pengambilan_dokumen_pengadaan`
--
ALTER TABLE `surat_undangan_pengambilan_dokumen_pengadaan`
  ADD CONSTRAINT `surat_undangan_pengambilan_dokumen_pengadaan_ibfk_1` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `surat_undangan_penjelasan`
--
ALTER TABLE `surat_undangan_penjelasan`
  ADD CONSTRAINT `surat_undangan_penjelasan_ibfk_1` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `surat_undangan_permintaan_penawaran_harga`
--
ALTER TABLE `surat_undangan_permintaan_penawaran_harga`
  ADD CONSTRAINT `surat_undangan_permintaan_penawaran_harga_ibfk_1` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE;

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
