-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 16, 2013 at 11:44 AM
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
('admin', 'Administrator', 'd033e22ae348aeb5660fc2140aec35850c4da997');

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE IF NOT EXISTS `anggota` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(256) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `email` varchar(32) NOT NULL,
  `id_panitia` bigint(11) NOT NULL,
  `jabatan` varchar(32) NOT NULL,
  `status_user` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`username`),
  KEY `id_panitia` (`id_panitia`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id`, `username`, `password`, `nama`, `email`, `id_panitia`, `jabatan`, `status_user`) VALUES
(1, 'irvan.aditya', 'b3a95a69acb08ada4fcd8d31a84ce8e8b3174e62', 'Irvan Aditya', 'irvan@gmail.com', 4, 'Ketua', 'Aktif'),
(2, 'gilang.laksana', 'e239aca6e941135937208eb840dc38108d86be3b', 'Gilang Laksana', 'gilang@gmail.com', 3, 'Ketua', 'Aktif'),
(3, 'hanif.eridaputra', '021403bf9cfa12e30443d58dc6b43d7569e4ea63', 'Hanif Eridaputra', 'he.23292@gmail.com', 3, 'Sekretaris', 'Aktif'),
(4, 'hanif.eridaputra', '021403bf9cfa12e30443d58dc6b43d7569e4ea63', 'Hanif Eridaputra', 'he.23292@gmail.com', 1, 'Pejabat', 'Aktif'),
(5, 'irvan.aditya', 'b3a95a69acb08ada4fcd8d31a84ce8e8b3174e62', 'Irvan Aditya', 'irvan@gmail.com', 6, 'Pejabat', 'Aktif'),
(6, 'gilang.laksana', 'e239aca6e941135937208eb840dc38108d86be3b', 'Gilang Laksana', 'gilang@gmail.com', 7, 'Pejabat', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `berita_acara_evaluasi_penawaran`
--

CREATE TABLE IF NOT EXISTS `berita_acara_evaluasi_penawaran` (
  `id_dokumen` bigint(32) NOT NULL,
  `nomor` varchar(50) NOT NULL,
  `waktu` time NOT NULL,
  `tempat` varchar(256) NOT NULL,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita_acara_evaluasi_penawaran`
--

INSERT INTO `berita_acara_evaluasi_penawaran` (`id_dokumen`, `nomor`, `waktu`, `tempat`) VALUES
(21, '-', '12:11:00', 'asdasdas'),
(27, '-', '12:11:00', 'asdasdas'),
(50, '-', '12:11:00', 'asdasd'),
(80, '-', '12:11:00', 'ljhkl'),
(86, '-', '11:11:00', 'dyfjuh'),
(96, '-', '12:11:00', 'asdasdas'),
(119, '-', '12:11:00', 'rtyrtyrt'),
(137, '-', '12:11:00', 'rtyrtyrt'),
(154, '-', '11:11:00', 'asdasda');

-- --------------------------------------------------------

--
-- Table structure for table `berita_acara_negosiasi_klarifikasi`
--

CREATE TABLE IF NOT EXISTS `berita_acara_negosiasi_klarifikasi` (
  `id_dokumen` bigint(32) NOT NULL,
  `nomor` varchar(50) NOT NULL,
  `waktu` time NOT NULL,
  `tempat` varchar(256) NOT NULL,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita_acara_negosiasi_klarifikasi`
--

INSERT INTO `berita_acara_negosiasi_klarifikasi` (`id_dokumen`, `nomor`, `waktu`, `tempat`) VALUES
(122, '-', '12:12:00', 'rtyrt'),
(157, '-', '12:12:00', 'rtyrt');

-- --------------------------------------------------------

--
-- Table structure for table `berita_acara_pembukaan_penawaran`
--

CREATE TABLE IF NOT EXISTS `berita_acara_pembukaan_penawaran` (
  `id_dokumen` bigint(32) NOT NULL,
  `nomor` varchar(50) NOT NULL,
  `waktu` time NOT NULL,
  `tempat` varchar(256) NOT NULL,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita_acara_pembukaan_penawaran`
--

INSERT INTO `berita_acara_pembukaan_penawaran` (`id_dokumen`, `nomor`, `waktu`, `tempat`) VALUES
(18, '432fdefssf', '12:12:00', 'asdasdas'),
(24, '-', '12:12:00', 'asdasdas'),
(47, 'asdasdas', '12:12:00', 'asdasdasd'),
(53, 'asdasda', '12:11:00', 'sadasdas'),
(77, '-', '12:12:00', 'kjb'),
(83, '-', '12:11:00', 'khjlk'),
(93, '-', '12:12:00', 'asdasdas'),
(116, '-', '12:12:00', 'rtyrty'),
(134, '-', '12:12:00', 'rtyrty');

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
  `waktu` time NOT NULL,
  `tempat` varchar(256) NOT NULL,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita_acara_penjelasan`
--

INSERT INTO `berita_acara_penjelasan` (`id_dokumen`, `nomor`, `waktu`, `tempat`) VALUES
(15, '12341234qweda', '12:12:00', 'asdasda'),
(44, '23ewaqdas', '12:12:00', 'asdasdasdasd'),
(74, 'asdas', '12:12:00', 'jkh'),
(90, '-', '12:12:00', 'asdasda'),
(113, 'asda', '12:12:00', 'tyhryr'),
(131, '-', '12:12:00', 'tyhryr');

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
(17, '12:12', 'asdasda', 'Aanwijzing'),
(20, '12:12', 'asdasdas', 'Pembukaan Penawaran Sampul Satu'),
(23, '12:11', 'asdasdas', 'Evaluasi Penawaran Sampul Satu'),
(26, '12:12', 'asdasdas', 'Pembukaan Penawaran Sampul Satu'),
(29, '12:11', 'asdasdas', 'Evaluasi Penawaran Sampul Satu'),
(46, '12:12', 'asdasdasdasd', 'Aanwijzing'),
(49, '12:12', 'asdasdasd', 'Pembukaan Penawaran Sampul Satu'),
(52, '12:11', 'asdasd', 'Evaluasi Penawaran Sampul Satu'),
(55, '12:11', 'sadasdas', 'Pembukaan Penawaran Sampul Dua'),
(76, '12:12', 'jkh', 'Aanwijzing'),
(79, '12:12', 'kjb', 'Pembukaan Penawaran Sampul Satu'),
(82, '12:11', 'ljhkl', 'Evaluasi Penawaran Sampul Satu'),
(85, '12:11', 'khjlk', 'Pembukaan Penawaran Sampul Dua'),
(88, '11:11', 'dyfjuh', 'Evaluasi Penawaran Sampul Dua'),
(92, '12:12', 'asdasda', 'Aanwijzing'),
(95, '12:12', 'asdasdas', 'Pembukaan Penawaran Sampul Satu'),
(98, '12:11', 'asdasdas', 'Evaluasi Penawaran Sampul Satu'),
(115, '12:12', 'tyhryr', 'Aanwijzing'),
(118, '12:12', 'rtyrty', 'Pembukaan Penawaran'),
(121, '12:11', 'rtyrtyrt', 'Evaluasi Penawaran'),
(124, '12:12', 'rtyrt', 'Negosiasi dan Klarifikasi'),
(133, '12:12', 'tyhryr', 'Aanwijzing'),
(136, '12:12', 'rtyrty', 'Pembukaan Penawaran'),
(139, '12:11', 'rtyrtyrt', 'Evaluasi Penawaran'),
(156, '11:11', 'asdasda', 'Evaluasi Penawaran Sampul Dua'),
(159, '12:12', 'rtyrt', 'Negosiasi dan Klarifikasi');

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE IF NOT EXISTS `divisi` (
  `username` varchar(20) NOT NULL,
  `nama_divisi` varchar(256) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`username`, `nama_divisi`) VALUES
('divin', 'Divisi Internet'),
('divman', 'Divisi Manajemen'),
('divsi', 'Divisi Sistem Informasi'),
('divtrans', 'Divisi Transportasi');

-- --------------------------------------------------------

--
-- Table structure for table `dokumen`
--

CREATE TABLE IF NOT EXISTS `dokumen` (
  `id_dokumen` bigint(32) NOT NULL,
  `nama_dokumen` varchar(256) NOT NULL,
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
(1, 'Dokumen Lain-lain', '1970-01-01', 'Jakarta', 1, 'Belum Selesai'),
(2, 'Nota Dinas Permintaan', '2013-07-24', 'Jakarta', 1, 'Selesai'),
(3, 'TOR', '2013-07-24', 'Jakarta', 1, 'Selesai'),
(4, 'RAB', '2013-07-24', 'Jakarta', 1, 'Selesai'),
(5, 'Nota Dinas Perintah Pengadaan', '2013-07-14', 'Jakarta', 1, 'Belum Selesai'),
(6, 'Pakta Integritas Awal Panitia', '2013-07-14', 'Jakarta', 1, 'Belum Selesai'),
(7, 'RKS', '2013-07-14', 'Jakarta', 1, 'Belum Selesai'),
(9, 'Pakta Integritas Penyedia', '1970-01-01', '-', 1, 'Belum Selesai'),
(10, 'Surat Pengantar Penawaran Harga', '1970-01-01', 'Jakarta', 1, 'Belum Selesai'),
(11, 'Surat Pernyataan Minat', '1970-01-01', '-', 1, 'Belum Selesai'),
(12, 'Form Isian Kualifikasi', '1970-01-01', '-', 1, 'Belum Selesai'),
(13, 'HPS', '2013-07-14', 'Jakarta', 1, 'Belum Selesai'),
(14, 'Surat Undangan Permintaan Penawaran Harga', '2013-07-14', 'Jakarta', 1, 'Belum Selesai'),
(15, 'Berita Acara Aanwijzing', '2013-07-08', 'Jakarta', 1, 'Belum Selesai'),
(16, 'Lampiran Berita Acara Aanwijzing', '2013-07-08', 'Jakarta', 1, 'Belum Selesai'),
(17, 'Daftar Hadir Aanwijzing', '2013-07-08', 'Jakarta', 1, 'Belum Selesai'),
(18, 'Berita Acara Pembukaan Penawaran Sampul Satu', '2013-07-02', 'Jakarta', 1, 'Belum Selesai'),
(19, 'Lampiran Berita Acara Pembukaan Penawaran Sampul Satu', '2013-07-02', 'Jakarta', 1, 'Belum Selesai'),
(20, 'Daftar Hadir Pembukaan Penawaran Sampul Satu', '2013-07-02', 'Jakarta', 1, 'Belum Selesai'),
(21, 'Berita Acara Evaluasi Penawaran Sampul Satu', '2013-07-10', 'Jakarta', 1, 'Belum Selesai'),
(22, 'Lampiran Berita Acara Evaluasi Penawaran Sampul Satu', '2013-07-10', 'Jakarta', 1, 'Belum Selesai'),
(23, 'Daftar Hadir Evaluasi Penawaran Sampul Satu', '2013-07-10', 'Jakarta', 1, 'Belum Selesai'),
(24, 'Berita Acara Pembukaan Penawaran Sampul Satu', '2013-07-02', 'Jakarta', 1, 'Belum Selesai'),
(25, 'Lampiran Berita Acara Pembukaan Penawaran Sampul Satu', '2013-07-02', 'Jakarta', 1, 'Belum Selesai'),
(26, 'Daftar Hadir Pembukaan Penawaran Sampul Satu', '2013-07-02', 'Jakarta', 1, 'Belum Selesai'),
(27, 'Berita Acara Evaluasi Penawaran Sampul Satu', '2013-07-10', 'Jakarta', 1, 'Belum Selesai'),
(28, 'Lampiran Berita Acara Evaluasi Penawaran Sampul Satu', '2013-07-10', 'Jakarta', 1, 'Belum Selesai'),
(29, 'Daftar Hadir Evaluasi Penawaran Sampul Satu', '2013-07-10', 'Jakarta', 1, 'Belum Selesai'),
(30, 'Dokumen Lain-lain', '1970-01-01', 'Jakarta', 2, 'Belum Selesai'),
(31, 'Nota Dinas Permintaan', '2013-07-10', 'Jakarta', 2, 'Selesai'),
(32, 'TOR', '2013-07-10', 'Jakarta', 2, 'Selesai'),
(33, 'RAB', '2013-07-10', 'Jakarta', 2, 'Selesai'),
(34, 'Nota Dinas Perintah Pengadaan', '2013-07-14', 'Jakarta', 2, 'Belum Selesai'),
(35, 'Pakta Integritas Awal Panitia', '2013-07-14', 'Jakarta', 2, 'Belum Selesai'),
(36, 'RKS', '2013-07-14', 'Jakarta', 2, 'Belum Selesai'),
(38, 'Pakta Integritas Penyedia', '1970-01-01', '-', 2, 'Belum Selesai'),
(39, 'Surat Pengantar Penawaran Harga', '1970-01-01', 'Jakarta', 2, 'Belum Selesai'),
(40, 'Surat Pernyataan Minat', '1970-01-01', '-', 2, 'Belum Selesai'),
(41, 'Form Isian Kualifikasi', '1970-01-01', '-', 2, 'Belum Selesai'),
(42, 'HPS', '2013-07-14', 'Jakarta', 2, 'Belum Selesai'),
(43, 'Surat Pengumuman Pelelangan', '2013-07-14', 'Jakarta', 2, 'Belum Selesai'),
(44, 'Berita Acara Aanwijzing', '2013-07-02', 'Jakarta', 2, 'Belum Selesai'),
(45, 'Lampiran Berita Acara Aanwijzing', '2013-07-02', 'Jakarta', 2, 'Belum Selesai'),
(46, 'Daftar Hadir Aanwijzing', '2013-07-02', 'Jakarta', 2, 'Belum Selesai'),
(47, 'Berita Acara Pembukaan Penawaran Sampul Satu', '2013-07-23', 'Jakarta', 2, 'Belum Selesai'),
(48, 'Lampiran Berita Acara Pembukaan Penawaran Sampul Satu', '2013-07-23', 'Jakarta', 2, 'Belum Selesai'),
(49, 'Daftar Hadir Pembukaan Penawaran Sampul Satu', '2013-07-23', 'Jakarta', 2, 'Belum Selesai'),
(50, 'Berita Acara Evaluasi Penawaran Sampul Satu', '2013-07-23', 'Jakarta', 2, 'Belum Selesai'),
(51, 'Lampiran Berita Acara Evaluasi Penawaran Sampul Satu', '2013-07-23', 'Jakarta', 2, 'Belum Selesai'),
(52, 'Daftar Hadir Evaluasi Penawaran Sampul Satu', '2013-07-23', 'Jakarta', 2, 'Belum Selesai'),
(53, 'Berita Acara Pembukaan Penawaran Sampul Dua', '2013-07-02', 'Jakarta', 2, 'Belum Selesai'),
(54, 'Lampiran Berita Acara Pembukaan Penawaran Sampul Dua', '2013-07-02', 'Jakarta', 2, 'Belum Selesai'),
(55, 'Daftar Hadir Pembukaan Penawaran Sampul Dua', '2013-07-02', 'Jakarta', 2, 'Belum Selesai'),
(56, 'Surat Undangan Permintaan Penawaran Harga', '2013-07-15', 'Jakarta', 1, 'Belum Selesai'),
(57, 'Surat Undangan Permintaan Penawaran Harga', '2013-07-15', 'Jakarta', 1, 'Belum Selesai'),
(58, 'Surat Undangan Permintaan Penawaran Harga', '2013-07-15', 'Jakarta', 1, 'Belum Selesai'),
(59, 'Dokumen Lain-lain', '1970-01-01', 'Jakarta', 3, 'Belum Selesai'),
(60, 'Nota Dinas Permintaan', '2013-07-31', 'Jakarta', 3, 'Selesai'),
(61, 'TOR', '2013-07-31', 'Jakarta', 3, 'Selesai'),
(62, 'RAB', '2013-07-31', 'Jakarta', 3, 'Selesai'),
(63, 'Nota Dinas Perintah Pengadaan', '2013-07-15', 'Jakarta', 3, 'Belum Selesai'),
(64, 'Pakta Integritas Awal Panitia', '2013-07-15', 'Jakarta', 3, 'Belum Selesai'),
(65, 'RKS', '2013-07-15', 'Jakarta', 3, 'Belum Selesai'),
(67, 'Pakta Integritas Penyedia', '1970-01-01', '-', 3, 'Belum Selesai'),
(68, 'Surat Pengantar Penawaran Harga', '1970-01-01', 'Jakarta', 3, 'Belum Selesai'),
(69, 'Surat Pernyataan Minat', '1970-01-01', '-', 3, 'Belum Selesai'),
(70, 'Form Isian Kualifikasi', '1970-01-01', '-', 3, 'Belum Selesai'),
(71, 'HPS', '2013-07-15', 'Jakarta', 3, 'Belum Selesai'),
(72, 'Surat Undangan Permintaan Penawaran Harga', '2013-07-15', 'Jakarta', 3, 'Belum Selesai'),
(73, 'Surat Undangan Permintaan Penawaran Harga', '2013-07-15', 'Jakarta', 3, 'Belum Selesai'),
(74, 'Berita Acara Aanwijzing', '2013-07-16', 'Jakarta', 3, 'Belum Selesai'),
(75, 'Lampiran Berita Acara Aanwijzing', '2013-07-16', 'Jakarta', 3, 'Belum Selesai'),
(76, 'Daftar Hadir Aanwijzing', '2013-07-16', 'Jakarta', 3, 'Belum Selesai'),
(77, 'Berita Acara Pembukaan Penawaran Sampul Satu', '2013-07-08', 'Jakarta', 3, 'Belum Selesai'),
(78, 'Lampiran Berita Acara Pembukaan Penawaran Sampul Satu', '2013-07-08', 'Jakarta', 3, 'Belum Selesai'),
(79, 'Daftar Hadir Pembukaan Penawaran Sampul Satu', '2013-07-08', 'Jakarta', 3, 'Belum Selesai'),
(80, 'Berita Acara Evaluasi Penawaran Sampul Satu', '2013-07-17', 'Jakarta', 3, 'Belum Selesai'),
(81, 'Lampiran Berita Acara Evaluasi Penawaran Sampul Satu', '2013-07-17', 'Jakarta', 3, 'Belum Selesai'),
(82, 'Daftar Hadir Evaluasi Penawaran Sampul Satu', '2013-07-17', 'Jakarta', 3, 'Belum Selesai'),
(83, 'Berita Acara Pembukaan Penawaran Sampul Dua', '2013-07-02', 'Jakarta', 3, 'Belum Selesai'),
(84, 'Lampiran Berita Acara Pembukaan Penawaran Sampul Dua', '2013-07-02', 'Jakarta', 3, 'Belum Selesai'),
(85, 'Daftar Hadir Pembukaan Penawaran Sampul Dua', '2013-07-02', 'Jakarta', 3, 'Belum Selesai'),
(86, 'Berita Acara Evaluasi Penawaran Sampul Dua', '2013-07-03', 'Jakarta', 3, 'Belum Selesai'),
(87, 'Lampiran Berita Acara Evaluasi Penawaran Sampul Dua', '2013-07-03', 'Jakarta', 3, 'Belum Selesai'),
(88, 'Daftar Hadir Evaluasi Penawaran Sampul Dua', '2013-07-03', 'Jakarta', 3, 'Belum Selesai'),
(89, 'Surat Undangan Permintaan Penawaran Harga', '2013-07-15', 'Jakarta', 1, 'Belum Selesai'),
(90, 'Berita Acara Aanwijzing', '2013-07-08', 'Jakarta', 1, 'Belum Selesai'),
(91, 'Lampiran Berita Acara Aanwijzing', '2013-07-08', 'Jakarta', 1, 'Belum Selesai'),
(92, 'Daftar Hadir Aanwijzing', '2013-07-08', 'Jakarta', 1, 'Belum Selesai'),
(93, 'Berita Acara Pembukaan Penawaran Sampul Satu', '2013-07-02', 'Jakarta', 1, 'Belum Selesai'),
(94, 'Lampiran Berita Acara Pembukaan Penawaran Sampul Satu', '2013-07-02', 'Jakarta', 1, 'Belum Selesai'),
(95, 'Daftar Hadir Pembukaan Penawaran Sampul Satu', '2013-07-02', 'Jakarta', 1, 'Belum Selesai'),
(96, 'Berita Acara Evaluasi Penawaran Sampul Satu', '2013-07-10', 'Jakarta', 1, 'Belum Selesai'),
(97, 'Lampiran Berita Acara Evaluasi Penawaran Sampul Satu', '2013-07-10', 'Jakarta', 1, 'Belum Selesai'),
(98, 'Daftar Hadir Evaluasi Penawaran Sampul Satu', '2013-07-10', 'Jakarta', 1, 'Belum Selesai'),
(99, 'Dokumen Lain-lain', '1970-01-01', 'Jakarta', 4, 'Belum Selesai'),
(100, 'Nota Dinas Permintaan', '2013-07-31', 'Jakarta', 4, 'Selesai'),
(101, 'TOR', '2013-07-31', 'Jakarta', 4, 'Selesai'),
(102, 'RAB', '2013-07-31', 'Jakarta', 4, 'Selesai'),
(103, 'Nota Dinas Perintah Pengadaan', '2013-07-15', 'Jakarta', 4, 'Belum Selesai'),
(104, 'Pakta Integritas Awal Panitia', '2013-07-16', 'Jakarta', 4, 'Belum Selesai'),
(105, 'RKS', '2013-07-16', 'Jakarta', 4, 'Belum Selesai'),
(107, 'Pakta Integritas Penyedia', '1970-01-01', '-', 4, 'Belum Selesai'),
(108, 'Surat Pengantar Penawaran Harga', '1970-01-01', 'Jakarta', 4, 'Belum Selesai'),
(109, 'Surat Pernyataan Minat', '1970-01-01', '-', 4, 'Belum Selesai'),
(110, 'Form Isian Kualifikasi', '1970-01-01', '-', 4, 'Belum Selesai'),
(111, 'HPS', '2013-07-16', 'Jakarta', 4, 'Belum Selesai'),
(112, 'Surat Undangan Permintaan Penawaran Harga', '2013-07-16', 'Jakarta', 4, 'Belum Selesai'),
(113, 'Berita Acara Aanwijzing', '2013-07-09', 'Jakarta', 4, 'Belum Selesai'),
(114, 'Lampiran Berita Acara Aanwijzing', '2013-07-09', 'Jakarta', 4, 'Belum Selesai'),
(115, 'Daftar Hadir Aanwijzing', '2013-07-09', 'Jakarta', 4, 'Belum Selesai'),
(116, 'Berita Acara Pembukaan Penawaran', '2013-07-10', 'Jakarta', 4, 'Belum Selesai'),
(117, 'Lampiran Berita Acara Pembukaan Penawaran', '2013-07-10', 'Jakarta', 4, 'Belum Selesai'),
(118, 'Daftar Hadir Pembukaan Penawaran', '2013-07-10', 'Jakarta', 4, 'Belum Selesai'),
(119, 'Berita Acara Evaluasi Penawaran', '2013-07-11', 'Jakarta', 4, 'Belum Selesai'),
(120, 'Lampiran Berita Acara Evaluasi Penawaran', '2013-07-11', 'Jakarta', 4, 'Belum Selesai'),
(121, 'Daftar Hadir Evaluasi Penawaran', '2013-07-11', 'Jakarta', 4, 'Belum Selesai'),
(122, 'Berita Acara Negosiasi dan Klarifikasi', '2013-07-31', 'Jakarta', 4, 'Belum Selesai'),
(123, 'Lampiran Berita Acara Negosiasi dan Klarifikasi', '2013-07-31', 'Jakarta', 4, 'Belum Selesai'),
(124, 'Daftar Hadir Negosiasi dan Klarifikasi', '2013-07-31', 'Jakarta', 4, 'Belum Selesai'),
(125, 'Nota Dinas Usulan Pemenang', '2013-07-16', 'Jakarta', 4, 'Belum Selesai'),
(126, 'Pakta Integritas Akhir Pejabat', '2013-07-16', 'Jakarta', 4, 'Belum Selesai'),
(127, 'Nota Dinas Penetapan Pemenang', '2013-07-16', 'Jakarta', 4, 'Belum Selesai'),
(128, 'Nota Dinas Pemberitahuan Pemenang', '2013-07-16', 'Jakarta', 4, 'Belum Selesai'),
(129, 'Surat Penunjukan Pemenang', '2013-07-16', 'Jakarta', 4, 'Belum Selesai'),
(130, 'Surat Undangan Permintaan Penawaran Harga', '2013-07-16', 'Jakarta', 4, 'Belum Selesai'),
(131, 'Berita Acara Aanwijzing', '2013-07-09', 'Jakarta', 4, 'Belum Selesai'),
(132, 'Lampiran Berita Acara Aanwijzing', '2013-07-09', 'Jakarta', 4, 'Belum Selesai'),
(133, 'Daftar Hadir Aanwijzing', '2013-07-09', 'Jakarta', 4, 'Belum Selesai'),
(134, 'Berita Acara Pembukaan Penawaran', '2013-07-10', 'Jakarta', 4, 'Belum Selesai'),
(135, 'Lampiran Berita Acara Pembukaan Penawaran', '2013-07-10', 'Jakarta', 4, 'Belum Selesai'),
(136, 'Daftar Hadir Pembukaan Penawaran', '2013-07-10', 'Jakarta', 4, 'Belum Selesai'),
(137, 'Berita Acara Evaluasi Penawaran', '2013-07-11', 'Jakarta', 4, 'Belum Selesai'),
(138, 'Lampiran Berita Acara Evaluasi Penawaran', '2013-07-11', 'Jakarta', 4, 'Belum Selesai'),
(139, 'Daftar Hadir Evaluasi Penawaran', '2013-07-11', 'Jakarta', 4, 'Belum Selesai'),
(140, 'Dokumen Lain-lain', '1970-01-01', 'Jakarta', 5, 'Belum Selesai'),
(141, 'Nota Dinas Permintaan', '2013-07-31', 'Jakarta', 5, 'Selesai'),
(142, 'TOR', '2013-07-31', 'Jakarta', 5, 'Selesai'),
(143, 'RAB', '2013-07-31', 'Jakarta', 5, 'Selesai'),
(144, 'Nota Dinas Perintah Pengadaan', '2013-07-16', 'Jakarta', 5, 'Belum Selesai'),
(145, 'Pakta Integritas Awal Panitia', '2013-07-16', 'Jakarta', 5, 'Belum Selesai'),
(146, 'RKS', '2013-07-16', 'Jakarta', 5, 'Belum Selesai'),
(147, 'HPS', '2013-07-16', 'Jakarta', 5, 'Belum Selesai'),
(148, 'Dokumen Prakualifikasi', '2013-07-16', 'Jakarta', 5, 'Belum Selesai'),
(149, 'Pakta Integritas Penyedia', '1970-01-01', '-', 5, 'Belum Selesai'),
(150, 'Surat Pengantar Penawaran Harga', '1970-01-01', 'Jakarta', 5, 'Belum Selesai'),
(151, 'Surat Pernyataan Minat', '1970-01-01', '-', 5, 'Belum Selesai'),
(152, 'Form Isian Kualifikasi', '1970-01-01', '-', 5, 'Belum Selesai'),
(153, 'Surat Undangan Prakualifikasi', '2013-07-30', 'Jakarta', 5, 'Belum Selesai'),
(154, 'Berita Acara Evaluasi Penawaran Sampul Dua', '2013-07-09', 'Jakarta', 2, 'Belum Selesai'),
(155, 'Lampiran Berita Acara Evaluasi Penawaran Sampul Dua', '2013-07-09', 'Jakarta', 2, 'Belum Selesai'),
(156, 'Daftar Hadir Evaluasi Penawaran Sampul Dua', '2013-07-09', 'Jakarta', 2, 'Belum Selesai'),
(157, 'Berita Acara Negosiasi dan Klarifikasi', '2013-07-31', 'Jakarta', 4, 'Belum Selesai'),
(158, 'Lampiran Berita Acara Negosiasi dan Klarifikasi', '2013-07-31', 'Jakarta', 4, 'Belum Selesai'),
(159, 'Daftar Hadir Negosiasi dan Klarifikasi', '2013-07-31', 'Jakarta', 4, 'Belum Selesai'),
(160, 'Dokumen Lain-lain', '1970-01-01', 'Jakarta', 6, 'Belum Selesai'),
(161, 'Nota Dinas Permintaan', '2013-07-02', 'Jakarta', 6, 'Selesai'),
(162, 'TOR', '2013-07-02', 'Jakarta', 6, 'Selesai'),
(163, 'RAB', '2013-07-02', 'Jakarta', 6, 'Selesai'),
(164, 'Nota Dinas Perintah Pengadaan', '2013-07-16', 'Jakarta', 6, 'Belum Selesai'),
(165, 'Pakta Integritas Awal Panitia', '2013-07-16', 'Jakarta', 6, 'Belum Selesai'),
(166, 'RKS', '2013-07-16', 'Jakarta', 6, 'Belum Selesai'),
(167, 'HPS', '2013-07-16', 'Jakarta', 6, 'Belum Selesai'),
(168, 'HPS', '2013-07-16', 'Jakarta', 6, 'Belum Selesai'),
(169, 'Dokumen Prakualifikasi', '2013-07-16', 'Jakarta', 6, 'Belum Selesai'),
(170, 'Pakta Integritas Penyedia', '1970-01-01', '-', 6, 'Belum Selesai'),
(171, 'Surat Pengantar Penawaran Harga', '1970-01-01', 'Jakarta', 6, 'Belum Selesai'),
(172, 'Surat Pernyataan Minat', '1970-01-01', '-', 6, 'Belum Selesai'),
(173, 'Form Isian Kualifikasi', '1970-01-01', '-', 6, 'Belum Selesai'),
(174, 'Surat Undangan Prakualifikasi', '2013-07-02', 'Jakarta', 6, 'Belum Selesai'),
(175, 'Nota Dinas Usulan Hasil Prakualifikasi', '2013-07-16', 'Jakarta', 6, 'Belum Selesai'),
(176, 'Nota Dinas Penetapan Hasil Prakualifikasi', '2013-07-16', 'Jakarta', 6, 'Belum Selesai');

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
(148, 'sfsd', 'asdas', '2013-07-16', '2013-07-07', '21:12:00', '12:12:00', 'dsffds', '2013-07-10', '21:12:00', 'sfdsfsd', '2013-07-09', '21:12:00', 'sdfsdf', 'asdas', 'sadas', 'asdas'),
(169, '123123', 'asdas', '2013-07-03', '2013-07-01', '21:12:00', '12:12:00', 'ads', '2013-07-31', '21:12:00', 'asdasasd', '2013-07-17', '21:12:00', 'asdasdas', 'asdas', 'sadas', 'asdas');

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
(12),
(41),
(70),
(110),
(152),
(173);

-- --------------------------------------------------------

--
-- Table structure for table `hps`
--

CREATE TABLE IF NOT EXISTS `hps` (
  `id_dokumen` bigint(20) NOT NULL,
  `nomor` varchar(50) NOT NULL,
  `nilai_hps` int(255) NOT NULL,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hps`
--

INSERT INTO `hps` (`id_dokumen`, `nomor`, `nilai_hps`) VALUES
(13, '23123123', 1221312312),
(42, '12312w3e', 12312),
(71, '22222', 3123123),
(111, '12312w3e', 12312),
(147, '23123123', 0),
(167, '23123123', 123123),
(168, 'asda', 0);

-- --------------------------------------------------------

--
-- Table structure for table `kdivmum`
--

CREATE TABLE IF NOT EXISTS `kdivmum` (
  `username` varchar(20) NOT NULL,
  `password` varchar(256) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `email` varchar(32) NOT NULL,
  `jabatan` varchar(32) NOT NULL,
  `status_user` varchar(100) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kdivmum`
--

INSERT INTO `kdivmum` (`username`, `password`, `nama`, `email`, `jabatan`, `status_user`) VALUES
('aidil.syaputra', 'e58b8152bd0328baceafd4b178ff0a8fd77e5420', 'Aidil Syaputra', 'aidil@gmail.com', 'KDIVMUM', 'Aktif'),
('kevin.indra', 'ffb4761cba839470133bee36aeb139f58d7dbaa9', 'Kevin Indra', 'a@aa.aa', 'MSDAF', 'Aktif');

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
(1, 2, '16:41:08', '2013-07-14', 'aidil.syaputra', 1, 'txt', 'list file hasil crud yg diubah'),
(2, 3, '16:41:13', '2013-07-14', 'aidil.syaputra', 1, 'txt', 'list file hasil crud yg diubah'),
(3, 4, '16:41:17', '2013-07-14', 'aidil.syaputra', 1, 'txt', 'list file hasil crud yg diubah'),
(4, 31, '17:48:49', '2013-07-14', 'aidil.syaputra', 1, 'txt', 'list file hasil crud yg diubah'),
(5, 32, '17:48:53', '2013-07-14', 'aidil.syaputra', 1, 'txt', 'list file hasil crud yg diubah'),
(6, 33, '17:48:57', '2013-07-14', 'aidil.syaputra', 1, 'txt', 'list file hasil crud yg diubah'),
(7, 60, '23:23:21', '2013-07-15', 'aidil.syaputra', 1, 'txt', 'list file hasil crud yg diubah'),
(8, 61, '23:23:28', '2013-07-15', 'aidil.syaputra', 1, 'txt', 'list file hasil crud yg diubah'),
(9, 62, '23:23:33', '2013-07-15', 'aidil.syaputra', 1, 'txt', 'list file hasil crud yg diubah'),
(10, 100, '23:59:09', '2013-07-15', 'aidil.syaputra', 1, 'txt', 'list file hasil crud yg diubah'),
(11, 100, '23:59:16', '2013-07-15', 'aidil.syaputra', 2, 'txt', 'list file hasil crud yg diubah'),
(12, 101, '23:59:24', '2013-07-15', 'aidil.syaputra', 1, 'txt', 'list file hasil crud yg diubah'),
(13, 102, '23:59:31', '2013-07-15', 'aidil.syaputra', 1, 'txt', 'list file hasil crud yg diubah'),
(14, 141, '11:30:55', '2013-07-16', 'aidil.syaputra', 1, 'txt', 'list file hasil crud yg diubah'),
(15, 142, '11:31:00', '2013-07-16', 'aidil.syaputra', 1, 'txt', 'list file hasil crud yg diubah'),
(16, 143, '11:31:04', '2013-07-16', 'aidil.syaputra', 1, 'txt', 'list file hasil crud yg diubah'),
(17, 161, '12:51:26', '2013-07-16', 'aidil.syaputra', 1, 'txt', 'list file hasil crud yg diubah'),
(18, 162, '12:51:31', '2013-07-16', 'aidil.syaputra', 1, 'txt', 'list file hasil crud yg diubah'),
(19, 163, '12:51:36', '2013-07-16', 'aidil.syaputra', 1, 'txt', 'list file hasil crud yg diubah');

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

--
-- Dumping data for table `nota_dinas_pemberitahuan_pemenang`
--

INSERT INTO `nota_dinas_pemberitahuan_pemenang` (`id_dokumen`, `nomor`, `keterangan`, `batas_sanggahan`) VALUES
(128, 'bjh', 'bjh', 12);

-- --------------------------------------------------------

--
-- Table structure for table `nota_dinas_penetapan_kualifikasi`
--

CREATE TABLE IF NOT EXISTS `nota_dinas_penetapan_kualifikasi` (
  `id_dokumen` bigint(32) NOT NULL,
  `nomor` varchar(100) NOT NULL,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nota_dinas_penetapan_kualifikasi`
--

INSERT INTO `nota_dinas_penetapan_kualifikasi` (`id_dokumen`, `nomor`) VALUES
(176, 'asdas');

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
(127, 'kjbh');

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
(5, '12123131ad', 'KDIVMUM', 'Irvan Aditya', 'asdasda', 12, 'Anggaran Investasi PLN Pusat 2012', 1993905000),
(34, '1370/611/DIVMUM/2012', 'KDIVMUM', 'Irvan Aditya', 'asdasd', 12, 'asdas', 1993905000),
(63, '12123131ad', 'KDIVMUM', 'Johannes Ridho', 'kghj', 12, 'Anggaran Investasi PLN Pusat 2012', 1111),
(103, '12123131', 'KDIVMUM', 'Johannes Ridho', 'dfgdf', 12, 'Anggaran Investasi PLN Pusat 2012', 12),
(144, '12123131ad', 'KDIVMUM', 'Johannes Ridho', 'sdfsdf', 12, 'Anggaran Investasi PLN Pusat 2012', 1993905000),
(164, '12123131ad', 'KDIVMUM', 'Johannes Ridho', 'as', 1212, 'Anggaran Investasi PLN Pusat 2012', 1993905000);

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
(2, '11111111', 'asdasdas', 1000000000),
(31, '11111111', 'asd', 1000000000),
(60, '11111111', 'mnvgm', 121),
(100, '021/521/DIVSIM/2012-R', 'asdasd', 12312),
(141, 'sdasdsads', 'sadasdas', 121),
(161, '11111111', 'kjh', 121);

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
-- Table structure for table `nota_dinas_undangan`
--

CREATE TABLE IF NOT EXISTS `nota_dinas_undangan` (
  `id_dokumen` bigint(32) NOT NULL,
  `nomor` varchar(50) NOT NULL,
  `tanggal_undangan` date NOT NULL,
  `waktu` time NOT NULL,
  `tempat` varchar(100) NOT NULL,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(125, 'et', '2013-07-05', 'fdgdf');

-- --------------------------------------------------------

--
-- Table structure for table `nota_dinas_usulan_penetapan`
--

CREATE TABLE IF NOT EXISTS `nota_dinas_usulan_penetapan` (
  `id_dokumen` bigint(32) NOT NULL,
  `nomor` varchar(100) NOT NULL,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nota_dinas_usulan_penetapan`
--

INSERT INTO `nota_dinas_usulan_penetapan` (`id_dokumen`, `nomor`) VALUES
(175, 'sadasdas');

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
(6),
(35),
(64),
(104),
(145),
(165);

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
(9),
(38),
(67),
(107),
(149),
(170);

-- --------------------------------------------------------

--
-- Table structure for table `panitia`
--

CREATE TABLE IF NOT EXISTS `panitia` (
  `id_panitia` bigint(11) NOT NULL AUTO_INCREMENT,
  `nama_panitia` varchar(50) NOT NULL,
  `SK_panitia` varchar(50) NOT NULL,
  `tanggal_sk` date NOT NULL,
  `status_panitia` varchar(32) NOT NULL,
  `jenis_panitia` varchar(20) NOT NULL,
  PRIMARY KEY (`id_panitia`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `panitia`
--

INSERT INTO `panitia` (`id_panitia`, `nama_panitia`, `SK_panitia`, `tanggal_sk`, `status_panitia`, `jenis_panitia`) VALUES
(-1, 'Belum ada PIC', '-', '0000-00-00', '-', '-'),
(1, 'Hanif Eridaputra', '-', '0000-00-00', 'Aktif', 'Pejabat'),
(2, 'Johannes Ridho', '-', '0000-00-00', 'Aktif', 'Pejabat'),
(3, 'Panitia-A', '024/SK/PLN', '2013-07-01', 'Aktif', 'Panitia'),
(4, 'Panitia-B', '025/SK/PLN', '2013-07-01', 'Aktif', 'Panitia'),
(5, 'Panitia-C', '026/SK/PLN', '2012-07-09', 'Tidak Aktif', 'Panitia'),
(6, 'Irvan Aditya', '-', '0000-00-00', 'Aktif', 'Pejabat'),
(7, 'Gilang Laksana', '-', '0000-00-00', 'Aktif', 'Pejabat');

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
  `nilai` int(255) NOT NULL,
  `biaya` int(255) NOT NULL,
  `undangan_prakualifikasi` varchar(256) NOT NULL,
  `pendaftaran_pelelangan_pq` varchar(256) NOT NULL,
  `pengambilan_lelang_pq` varchar(256) NOT NULL,
  `penyampaian_lelang` varchar(256) NOT NULL,
  `evaluasi_pq` varchar(256) NOT NULL,
  `usulan_hasil_pq` varchar(256) NOT NULL,
  `penetapan_pq` varchar(256) NOT NULL,
  `undangan_supph` varchar(256) NOT NULL,
  `pendaftaran_pc` varchar(256) NOT NULL,
  `pengambilan_dokumen` varchar(256) NOT NULL,
  `ba_aanwijzing` varchar(256) NOT NULL,
  `hadir_pembukaan_penawaran_1` varchar(256) NOT NULL,
  `pembukaan_penawaran_1` varchar(256) NOT NULL,
  `administrasi` varchar(256) NOT NULL,
  `evaluasi_penawaran_1` varchar(256) NOT NULL,
  `hadir_pembukaan_penawaran_2` varchar(256) NOT NULL,
  `pembukaan_penawaran_2` varchar(256) NOT NULL,
  `evaluasi_penawaran_2` varchar(256) NOT NULL,
  `hadir_klarifikasi_negosiasi` varchar(256) NOT NULL,
  `negosiasi_klarifikasi` varchar(256) NOT NULL,
  `usulan_pemenang` varchar(256) NOT NULL,
  `penetapan_pemenang` varchar(256) NOT NULL,
  `nomor_surat_penawaran` varchar(256) NOT NULL,
  `tanggal_penawaran` varchar(256) NOT NULL,
  PRIMARY KEY (`id_penerima`),
  KEY `id_pengadaan` (`id_pengadaan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `penerima_pengadaan`
--

INSERT INTO `penerima_pengadaan` (`id_penerima`, `perusahaan`, `id_pengadaan`, `alamat`, `npwp`, `nilai`, `biaya`, `undangan_prakualifikasi`, `pendaftaran_pelelangan_pq`, `pengambilan_lelang_pq`, `penyampaian_lelang`, `evaluasi_pq`, `usulan_hasil_pq`, `penetapan_pq`, `undangan_supph`, `pendaftaran_pc`, `pengambilan_dokumen`, `ba_aanwijzing`, `hadir_pembukaan_penawaran_1`, `pembukaan_penawaran_1`, `administrasi`, `evaluasi_penawaran_1`, `hadir_pembukaan_penawaran_2`, `pembukaan_penawaran_2`, `evaluasi_penawaran_2`, `hadir_klarifikasi_negosiasi`, `negosiasi_klarifikasi`, `usulan_pemenang`, `penetapan_pemenang`, `nomor_surat_penawaran`, `tanggal_penawaran`) VALUES
(1, 'a', 4, 'asdas', '-', 0, 324234, '1', '1', '1', '1', '1', '', '1', '1', '-', '-', '1', '1', '1', '1', '1', '', '-', '1', '0', '0', '-', '-', '-', '-'),
(2, 'b', 4, 'asdfsf', '-', 0, 0, '1', '1', '1', '1', '1', '', '1', '1', '-', '-', '1', '1', '1', '1', '1', '', '-', '1', '1', '1', '-', '-', '-', '-'),
(3, 'a', 5, '-asdas', '-', 0, 0, '1', '-', '-', '-', '-', '', '-', '-', '-', '-', '-', '-', '-', '', '-', '-', '-', '-', '', '-', '-', '-', '-', '-'),
(4, 'b', 5, 'dsd', '-', 0, 0, '1', '-', '-', '-', '-', '', '-', '-', '-', '-', '-', '-', '-', '', '-', '-', '-', '-', '', '-', '-', '-', '-', '-'),
(5, 'c', 5, '-', '-', 0, 0, '1', '-', '-', '-', '-', '', '-', '-', '-', '-', '-', '-', '-', '', '-', '-', '-', '-', '', '-', '-', '-', '-', '-'),
(6, 'd', 5, '-', '-', 0, 0, '1', '-', '-', '-', '-', '', '-', '-', '-', '-', '-', '-', '-', '', '-', '-', '-', '-', '', '-', '-', '-', '-', '-'),
(7, 'a', 6, 'asda', '-', 0, 0, '1', '-', '-', '0', '-', '', '-', '-', '-', '-', '-', '-', '-', '', '-', '-', '-', '-', '', '-', '-', '-', '-', '-'),
(8, 'b', 6, 'dsfds', '-', 0, 0, '1', '-', '-', '1', '0', '', '-', '-', '-', '-', '-', '-', '-', '', '-', '-', '-', '-', '', '-', '-', '-', '-', '-'),
(9, '-sfds', 6, 'sdf', '-', 0, 0, '1', '-', '-', '1', '1', '', '0', '-', '-', '-', '-', '-', '-', '', '-', '-', '-', '-', '', '-', '-', '-', '-', '-'),
(10, 'ds', 6, '-', '-', 0, 0, '1', '-', '-', '1', '1', '', '1', '-', '-', '-', '-', '-', '-', '', '-', '-', '-', '-', '', '-', '-', '-', '-', '-'),
(11, 'ds', 6, '-', '-', 0, 0, '1', '-', '-', '1', '1', '', '1', '-', '-', '-', '-', '-', '-', '', '-', '-', '-', '-', '', '-', '-', '-', '-', '-'),
(12, 'd', 6, '-', '-', 0, 0, '1', '', '', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '-', '-');

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
(1, 'asdasda', 'divman', 'Barang dan Jasa', '-', '2013-07-14', '0000-00-00', '25', 0, 4, 'Pemilihan Langsung', 'Dua Sampul', 'Pasca Kualifikasi'),
(2, 'asdasdfsa', 'divin', 'Barang dan Jasa', '-', '2013-07-14', '0000-00-00', '29', 0, 4, 'Pelelangan', 'Dua Sampul', 'Pasca Kualifikasi'),
(3, 'aaaaaaaa', 'divsi', 'Barang dan Jasa', '-', '2013-07-15', '0000-00-00', '29', 0, 2, 'Pemilihan Langsung', 'Dua Sampul', 'Pasca Kualifikasi'),
(4, 'qqqqqqq', 'divtrans', 'Barang dan Jasa', '-', '2013-07-15', '0000-00-00', '32', 0, 2, 'Pemilihan Langsung', 'Satu Sampul', 'Pasca Kualifikasi'),
(5, 'eeeeee', 'divtrans', 'Barang dan Jasa', '-', '2013-07-16', '0000-00-00', '17', 0, 2, 'Pemilihan Langsung', 'Dua Sampul', 'Pra Kualifikasi'),
(6, 'ppppppppppppp', 'divtrans', 'Barang dan Jasa', '-', '2013-07-16', '0000-00-00', '17', 0, 2, 'Pemilihan Langsung', 'Dua Sampul', 'Pra Kualifikasi');

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman_hasil_prakualifikasi`
--

CREATE TABLE IF NOT EXISTS `pengumuman_hasil_prakualifikasi` (
  `id_dokumen` bigint(32) NOT NULL,
  `nomor` varchar(100) NOT NULL,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(4),
(33),
(62),
(102),
(143),
(163);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=248 ;

--
-- Dumping data for table `rincian_rks`
--

INSERT INTO `rincian_rks` (`id_rincian`, `nama_rincian`, `id_dokumen`) VALUES
(182, 'Cover', 7),
(183, 'Daftar Isi', 7),
(184, 'Isi', 7),
(185, 'Lampiran 1', 7),
(186, 'Lampiran 2', 7),
(187, 'Lampiran 3', 7),
(188, 'Lampiran 4', 7),
(189, 'Lampiran 5', 7),
(190, 'Lampiran 6', 7),
(191, 'Lampiran 7', 7),
(192, 'Lampiran ba', 7),
(193, 'Cover', 36),
(194, 'Daftar Isi', 36),
(195, 'Isi', 36),
(196, 'Lampiran 1', 36),
(197, 'Lampiran 2', 36),
(198, 'Lampiran 3', 36),
(199, 'Lampiran 4', 36),
(200, 'Lampiran 5', 36),
(201, 'Lampiran 6', 36),
(202, 'Lampiran 7', 36),
(203, 'Lampiran ba', 36),
(204, 'Cover', 65),
(205, 'Daftar Isi', 65),
(206, 'Isi', 65),
(207, 'Lampiran 1', 65),
(208, 'Lampiran 2', 65),
(209, 'Lampiran 3', 65),
(210, 'Lampiran 4', 65),
(211, 'Lampiran 5', 65),
(212, 'Lampiran 6', 65),
(213, 'Lampiran 7', 65),
(214, 'Lampiran ba', 65),
(215, 'Cover', 105),
(216, 'Daftar Isi', 105),
(217, 'Isi', 105),
(218, 'Lampiran 1', 105),
(219, 'Lampiran 2', 105),
(220, 'Lampiran 3', 105),
(221, 'Lampiran 4', 105),
(222, 'Lampiran 5', 105),
(223, 'Lampiran 6', 105),
(224, 'Lampiran 7', 105),
(225, 'Lampiran ba', 105),
(226, 'Cover', 146),
(227, 'Daftar Isi', 146),
(228, 'Isi', 146),
(229, 'Lampiran 1', 146),
(230, 'Lampiran 2', 146),
(231, 'Lampiran 3', 146),
(232, 'Lampiran 4', 146),
(233, 'Lampiran 5', 146),
(234, 'Lampiran 6', 146),
(235, 'Lampiran 7', 146),
(236, 'Lampiran ba', 146),
(237, 'Cover', 166),
(238, 'Daftar Isi', 166),
(239, 'Isi', 166),
(240, 'Lampiran 1', 166),
(241, 'Lampiran 2', 166),
(242, 'Lampiran 3', 166),
(243, 'Lampiran 4', 166),
(244, 'Lampiran 5', 166),
(245, 'Lampiran 6', 166),
(246, 'Lampiran 7', 166),
(247, 'Lampiran ba', 166);

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
(7, '1231231', 1, '2013-07-30', '2013-07-08', '12:12:00', 'asdasda', '2013-07-09', '2013-07-09', '12:11:00', 'asdasdas', '2013-07-02', '12:12:00', 'asdasdas', '2013-07-10', '12:11:00', 'asdasdas', '1970-01-01', '1970-01-01', '00:00:00', '-', '2013-07-09', '12:11:00', 'asdasasda', '2013-07-02', '11:11:00', 'asdasdas', '2013-07-02', '12:12:00', 'asdasda', '2013-07-09', '12:12:00', '2013-07-31', '12:12:00', '2013-07-17', '12:12:00', '2013-07-10', '11:11:00', 'gugur', 12, '2013-07-30', 2, 12),
(36, '123123', 1, '2013-07-30', '2013-07-02', '12:12:00', 'asdasdasdasd', '2013-07-03', '2013-07-31', '12:11:00', 'asdasdasda', '2013-07-23', '12:12:00', 'asdasdasd', '2013-07-23', '12:11:00', 'asdasd', '1970-01-01', '1970-01-01', '00:00:00', '-', '2013-07-02', '12:11:00', 'sadasdas', '2013-07-09', '11:11:00', 'asdasda', '2013-07-02', '12:12:00', 'asdasda', '2013-07-03', '12:12:00', '2013-07-09', '09:00:00', '2013-07-10', '12:12:00', '2013-07-23', '11:11:00', 'gugur', 12, '2013-07-31', 2, 12),
(65, '33333333333333333333', 1, '2013-07-29', '2013-07-16', '12:12:00', 'jkh', '2013-07-30', '2013-07-31', '12:11:00', 'jkbh', '2013-07-08', '12:12:00', 'kjb', '2013-07-17', '12:11:00', 'ljhkl', '1970-01-01', '1970-01-01', '00:00:00', '-', '2013-07-02', '12:11:00', 'khjlk', '2013-07-03', '11:11:00', 'dyfjuh', '2013-07-09', '12:12:00', 'kjgfkjuy', '2013-07-16', '12:12:00', '2013-07-08', '12:12:00', '2013-07-03', '12:12:00', '2013-07-30', '11:11:00', 'gugur', 12, '2013-07-09', 1, 12),
(105, '13123', 1, '2013-07-23', '2013-07-09', '12:12:00', 'tyhryr', '2013-07-10', '2013-07-03', '12:11:00', 'rtyrt', '2013-07-10', '12:12:00', 'rtyrty', '2013-07-11', '12:11:00', 'rtyrtyrt', '1970-01-01', '1970-01-01', '00:00:00', '-', '1970-01-01', '00:00:00', '-', '1970-01-01', '00:00:00', '-', '2013-07-31', '12:12:00', 'rtyrt', '2013-07-03', '12:12:00', '2013-07-10', '12:12:00', '2013-07-03', '12:12:00', '2013-07-31', '11:11:00', 'gugur', 12, '2013-07-31', 2, 12),
(146, 'asdasdas', 1, '2013-07-30', '2013-07-23', '12:12:00', 'asd', '2013-07-03', '2013-07-03', '12:11:00', 'asdas', '2013-07-10', '12:12:00', 'sdfsd', '2013-07-10', '12:11:00', 'sfsdsd', '1970-01-01', '1970-01-01', '00:00:00', '-', '2013-07-18', '12:11:00', 'sdfsdfs', '2013-07-10', '11:11:00', 'sdfsdfsd', '2013-07-10', '12:12:00', 'sdfsdsd', '2013-07-10', '12:12:00', '2013-07-03', '12:12:00', '2013-07-31', '12:12:00', '2013-07-24', '11:11:00', 'gugur', 12, '2013-07-31', 2, 12),
(166, 'adsada', 1, '2013-07-02', '2013-07-11', '12:12:00', 'as', '2013-07-03', '2013-07-31', '12:11:00', 'asasd', '2013-07-03', '12:12:00', 'asdas', '2013-07-09', '12:11:00', 'asdasd', '1970-01-01', '1970-01-01', '00:00:00', '-', '2013-07-02', '12:11:00', 'asdasd', '2013-07-10', '11:11:00', 'asdasa', '2013-07-03', '12:12:00', 'asdasd', '2013-07-03', '12:12:00', '2013-07-24', '12:12:00', '2013-07-31', '12:12:00', '2013-07-03', '11:11:00', 'gugur', 12, '2013-07-31', 2, 12);

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
(10),
(39),
(68),
(108),
(150),
(171);

-- --------------------------------------------------------

--
-- Table structure for table `surat_pengumuman_pelelangan`
--

CREATE TABLE IF NOT EXISTS `surat_pengumuman_pelelangan` (
  `id_dokumen` bigint(32) NOT NULL,
  `nomor` varchar(100) NOT NULL,
  `syarat_mengikuti_lelang` varchar(256) NOT NULL,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_pengumuman_pelelangan`
--

INSERT INTO `surat_pengumuman_pelelangan` (`id_dokumen`, `nomor`, `syarat_mengikuti_lelang`) VALUES
(43, '1232', 'asdas');

-- --------------------------------------------------------

--
-- Table structure for table `surat_pengumuman_pemenang`
--

CREATE TABLE IF NOT EXISTS `surat_pengumuman_pemenang` (
  `id_dokumen` bigint(32) NOT NULL,
  `nomor` varchar(32) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `batas_sanggahan` int(32) NOT NULL,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_penunjukan_pemenang`
--

INSERT INTO `surat_penunjukan_pemenang` (`id_dokumen`, `nomor`, `lama_penyerahan`, `jaminan`, `nomor_ski`, `tanggal_ski`, `no_ski`) VALUES
(129, '141414', 12, 0, '-', '0000-00-00', '-');

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
(11),
(40),
(69),
(109),
(151),
(172);

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
(14, '1231231231', 123, 'asdasda'),
(56, 'hg', 12, 'jhgkj'),
(57, 'hg', 12, 'jhgkj'),
(58, 'hg', 12, 'jhgkj'),
(72, '3eq', 123, 'gkfh'),
(73, '3eq', 123, 'gkfh'),
(89, '23423', 123, 'adasda'),
(112, 'rwerwesdgfes3w', 123, 'sdfsdf'),
(130, '3eq', 12, 'asdas');

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
(153, 'asdq321', 'Undangan Prakualifikasi eeeeee'),
(174, 'sdfds', 'Undangan Prakualifikasi ppppppppppppp');

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
(3),
(32),
(61),
(101),
(142),
(162);

-- --------------------------------------------------------

--
-- Table structure for table `user_divisi`
--

CREATE TABLE IF NOT EXISTS `user_divisi` (
  `username` varchar(50) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `divisi` varchar(20) NOT NULL,
  `password` varchar(256) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_divisi`
--

INSERT INTO `user_divisi` (`username`, `nama`, `divisi`, `password`) VALUES
('johannes.ridho', 'Johannes Ridho', 'divin', '759412786bc533369b22377bf83fb9056c5b25b2');

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
-- Constraints for table `nota_dinas_penetapan_kualifikasi`
--
ALTER TABLE `nota_dinas_penetapan_kualifikasi`
  ADD CONSTRAINT `nota_dinas_penetapan_kualifikasi_ibfk_1` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `nota_dinas_undangan`
--
ALTER TABLE `nota_dinas_undangan`
  ADD CONSTRAINT `nota_dinas_undangan_ibfk_1` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nota_dinas_usulan_pemenang`
--
ALTER TABLE `nota_dinas_usulan_pemenang`
  ADD CONSTRAINT `nota_dinas_usulan_pemenang_ibfk_3` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nota_dinas_usulan_penetapan`
--
ALTER TABLE `nota_dinas_usulan_penetapan`
  ADD CONSTRAINT `nota_dinas_usulan_penetapan_ibfk_1` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `pengumuman_hasil_prakualifikasi`
--
ALTER TABLE `pengumuman_hasil_prakualifikasi`
  ADD CONSTRAINT `pengumuman_hasil_prakualifikasi_ibfk_1` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `surat_pengumuman_pemenang`
--
ALTER TABLE `surat_pengumuman_pemenang`
  ADD CONSTRAINT `surat_pengumuman_pemenang_ibfk_1` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `surat_undangan_pengambilan_dokumen_pengadaan`
--
ALTER TABLE `surat_undangan_pengambilan_dokumen_pengadaan`
  ADD CONSTRAINT `surat_undangan_pengambilan_dokumen_pengadaan_ibfk_1` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE;

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
