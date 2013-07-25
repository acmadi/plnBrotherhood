-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 25, 2013 at 07:36 AM
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
('aidil.syaputra'),
('irvan.aditya');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id`, `username`, `password`, `nama`, `email`, `id_panitia`, `jabatan`, `status_user`) VALUES
(1, 'irvan.aditya', 'b3a95a69acb08ada4fcd8d31a84ce8e8b3174e62', 'Irvan Aditya', 'irvan@gmail.com', 4, 'Ketua', 'Aktif'),
(2, 'gilang.laksana', 'e239aca6e941135937208eb840dc38108d86be3b', 'Gilang Laksana', 'gilang@gmail.com', 3, 'Ketua', 'Aktif'),
(3, 'hanif.eridaputra', '021403bf9cfa12e30443d58dc6b43d7569e4ea63', 'Hanif Eridaputra', 'he.23292@gmail.com', 3, 'Sekretaris', 'Aktif'),
(4, 'hanif.eridaputra', '021403bf9cfa12e30443d58dc6b43d7569e4ea63', 'Hanif Eridaputra', 'he.23292@gmail.com', 1, 'Pejabat', 'Aktif'),
(5, 'irvan.aditya', 'b3a95a69acb08ada4fcd8d31a84ce8e8b3174e62', 'Irvan Aditya', 'irvan@gmail.com', 6, 'Pejabat', 'Aktif'),
(6, 'gilang.laksana', 'e239aca6e941135937208eb840dc38108d86be3b', 'Gilang Laksana', 'gilang@gmail.com', 7, 'Pejabat', 'Aktif'),
(7, 'ika.novitasari', '', 'Ika Novitasari', 'ika.novitasari@pln.co.id', 8, 'Pejabat', 'Aktif'),
(8, 'daswar', '', 'Samie Daswar', 'daswar@pln.co.id', 9, 'Pejabat', 'Aktif'),
(9, 'harinugroho2', '', 'Hari Nugroho', 'harinugroho2@pln.co.id', 10, 'Pejabat', 'Aktif'),
(10, 'WARNO', '', 'WARNO', 'warno@pln.co.id', 11, 'Pejabat', 'Aktif'),
(11, 'suryadani', '', 'Suryadani', 'suryadani@pln.co.id', 12, 'Pejabat', 'Aktif'),
(12, 'yusuf.supriyadi', '', 'Yusuf Supriyadi', 'yusuf.supriyadi@pln.co.id', 13, 'Pejabat', 'Aktif'),
(13, 'yudhi.juliardiyanto', '', 'Yudhi Juliardiyanto N', 'yudhi.juliardiyanto@pln.co.id', 14, 'Pejabat', 'Aktif'),
(14, 'sarwoaji.wicaksono', '', 'Sarwoaji Wicaksono', 'sarwoaji.wicaksono@pln.co.id', 15, 'Pejabat', 'Aktif'),
(15, 'Klarisa', '', 'Klarisa', 'Klarisa@pln.co.id', 16, 'Pejabat', 'Aktif'),
(16, 'arief.pramana', '', 'Mochamad Arief Pramana', 'arief.pramana@pln.co.id', 17, 'Pejabat', 'Aktif'),
(17, 'wijoyo.batara', '', 'Wijoyo Batara Frans Simanjuntak', 'wijoyo.batara@pln.co.id', 18, 'Pejabat', 'Aktif'),
(18, 'harinugroho2', '', 'Hari Nugroho', 'harinugroho2@pln.co.id', 19, 'Ketua', 'Aktif'),
(19, 'WARNO', '', 'WARNO', 'warno@pln.co.id', 19, 'Sekretaris', 'Aktif'),
(20, 'nineung.pratiwi', '', 'Nineung Pratiwi', 'nineung.pratiwi@pln.co.id', 19, 'Anggota', 'Aktif'),
(21, 'yusuf.supriyadi', '', 'Yusuf Supriyadi', 'yusuf.supriyadi@pln.co.id', 19, 'Anggota', 'Aktif'),
(22, 'sarwoaji.wicaksono', '', 'Sarwoaji Wicaksono', 'sarwoaji.wicaksono@pln.co.id', 19, 'Anggota', 'Aktif'),
(23, 'suryadani', '', 'Suryadani', 'suryadani@pln.co.id', 20, 'Ketua', 'Aktif'),
(24, 'wijoyo.batara', '', 'Wijoyo Batara Frans Simanjuntak', 'wijoyo.batara@pln.co.id', 20, 'Sekretaris', 'Aktif'),
(25, 'marson', '', 'Marson Polmer Ompusunggu', 'marson@pln.co.id', 20, 'Anggota', 'Aktif'),
(26, 'yudhi.juliardiyanto', '', 'Yudhi Juliardiyanto N', 'yudhi.juliardiyanto@pln.co.id', 20, 'Anggota', 'Aktif'),
(27, 'wisnu.yulianto', '', 'Wisnu Yulianto', 'wisnu.yulianto@pln.co.id', 21, 'Ketua', 'Aktif'),
(28, 'ika.novitasari', '', 'Ika Novitasari', 'ika.novitasari@pln.co.id', 21, 'Sekretaris', 'Aktif'),
(29, 'habib.hamidy', '', 'Habib Hamidy', 'habib.hamidy@pln.co.id', 21, 'Anggota', 'Aktif'),
(30, 'fitriana.kurniasari', '', 'Fitriana Kurniasari', 'fitriana.kurniasari@pln.co.id', 21, 'Anggota', 'Aktif'),
(31, 'susanti.lukman', '', 'Susanti Lukman', 'susanti.lukman@pln.co.id', 21, 'Anggota', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `berita_acara_evaluasi_penawaran`
--

CREATE TABLE IF NOT EXISTS `berita_acara_evaluasi_penawaran` (
  `id_dokumen` bigint(32) NOT NULL,
  `nomor` varchar(256) NOT NULL,
  `waktu` time NOT NULL,
  `tempat` varchar(256) NOT NULL,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `berita_acara_evaluasi_prakualifikasi`
--

CREATE TABLE IF NOT EXISTS `berita_acara_evaluasi_prakualifikasi` (
  `id_dokumen` bigint(32) NOT NULL,
  `nomor` varchar(100) NOT NULL,
  `tempat` varchar(256) NOT NULL,
  `waktu` time NOT NULL,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `berita_acara_negosiasi_klarifikasi`
--

CREATE TABLE IF NOT EXISTS `berita_acara_negosiasi_klarifikasi` (
  `id_dokumen` bigint(32) NOT NULL,
  `nomor` varchar(256) NOT NULL,
  `waktu` time NOT NULL,
  `tempat` varchar(256) NOT NULL,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `berita_acara_pembukaan_penawaran`
--

CREATE TABLE IF NOT EXISTS `berita_acara_pembukaan_penawaran` (
  `id_dokumen` bigint(32) NOT NULL,
  `nomor` varchar(256) NOT NULL,
  `waktu` time NOT NULL,
  `tempat` varchar(256) NOT NULL,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `berita_acara_penerimaan_pq`
--

CREATE TABLE IF NOT EXISTS `berita_acara_penerimaan_pq` (
  `nomor` varchar(256) NOT NULL,
  `id_dokumen` bigint(20) NOT NULL,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `berita_acara_penjelasan`
--

CREATE TABLE IF NOT EXISTS `berita_acara_penjelasan` (
  `id_dokumen` bigint(32) NOT NULL,
  `nomor` varchar(256) NOT NULL,
  `waktu` time NOT NULL,
  `tempat` varchar(256) NOT NULL,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `daftar_hadir`
--

CREATE TABLE IF NOT EXISTS `daftar_hadir` (
  `id_dokumen` bigint(32) NOT NULL,
  `jam` varchar(10) NOT NULL,
  `tempat_hadir` varchar(256) NOT NULL,
  `acara` varchar(256) NOT NULL,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE IF NOT EXISTS `divisi` (
  `id_divisi` bigint(20) NOT NULL AUTO_INCREMENT,
  `nama_singkat` varchar(256) NOT NULL,
  `nama_divisi` varchar(256) NOT NULL,
  PRIMARY KEY (`id_divisi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`id_divisi`, `nama_singkat`, `nama_divisi`) VALUES
(1, 'DIVSIM', 'Divisi Sistem dan Informasi');

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

-- --------------------------------------------------------

--
-- Table structure for table `dokumen_kontrak`
--

CREATE TABLE IF NOT EXISTS `dokumen_kontrak` (
  `id_dokumen` bigint(32) NOT NULL,
  `username` varchar(256) NOT NULL,
  `nomor` varchar(256) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `jangka_waktu` int(255) NOT NULL,
  `nilai_kontrak` bigint(20) NOT NULL,
  `lokasi_file` varchar(256) NOT NULL,
  `no_rek` varchar(256) NOT NULL,
  `jenis_kontrak` varchar(128) NOT NULL,
  PRIMARY KEY (`id_dokumen`),
  UNIQUE KEY `Nomor` (`nomor`),
  KEY `username` (`username`)
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
  `nomor` varchar(256) NOT NULL,
  `tujuan_pengadaan` varchar(256) NOT NULL,
  `kurun_waktu_pengalaman` int(255) NOT NULL,
  `npt` int(255) NOT NULL,
  `tanggal_pengambilan1` date NOT NULL,
  `tanggal_pengambilan2` date NOT NULL,
  `waktu_pengambilan1` time NOT NULL,
  `waktu_pengambilan2` time NOT NULL,
  `tempat_pengambilan` varchar(256) NOT NULL,
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

-- --------------------------------------------------------

--
-- Table structure for table `hps`
--

CREATE TABLE IF NOT EXISTS `hps` (
  `id_dokumen` bigint(20) NOT NULL,
  `nomor` varchar(256) NOT NULL,
  `nilai_hps` bigint(255) NOT NULL,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE IF NOT EXISTS `jabatan` (
  `id_jabatan` int(32) NOT NULL AUTO_INCREMENT,
  `jabatan` varchar(50) NOT NULL,
  `kepanjangan` varchar(256) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`id_jabatan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `jabatan`, `kepanjangan`, `status`) VALUES
(1, 'KDIVMUM', 'Kepala Divisi Umum dan Manajemen', 'Aktif'),
(2, 'MSDAF', 'Manajer Senior Pengadaan Sarana Fasilitas', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `kdivmum`
--

CREATE TABLE IF NOT EXISTS `kdivmum` (
  `username` varchar(20) NOT NULL,
  `password` varchar(256) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `email` varchar(32) NOT NULL,
  `id_jabatan` int(32) NOT NULL,
  `status_user` varchar(100) NOT NULL,
  PRIMARY KEY (`username`),
  KEY `jabatan` (`id_jabatan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kdivmum`
--

INSERT INTO `kdivmum` (`username`, `password`, `nama`, `email`, `id_jabatan`, `status_user`) VALUES
('aidil.syaputra', 'e58b8152bd0328baceafd4b178ff0a8fd77e5420', 'Aidil Syaputra', 'aidil@gmail.com', 1, 'Aktif'),
('kevin.indra', 'ffb4761cba839470133bee36aeb139f58d7dbaa9', 'Kevin Indra', 'a@aa.aa', 2, 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `libur`
--

CREATE TABLE IF NOT EXISTS `libur` (
  `tanggal` date NOT NULL,
  `keterangan` varchar(256) NOT NULL,
  PRIMARY KEY (`tanggal`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `libur`
--

INSERT INTO `libur` (`tanggal`, `keterangan`) VALUES
('2013-01-01', 'Tahun Baru 2013'),
('2013-12-25', 'Hari Natal');

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

-- --------------------------------------------------------

--
-- Table structure for table `nota_dinas_pemberitahuan_pemenang`
--

CREATE TABLE IF NOT EXISTS `nota_dinas_pemberitahuan_pemenang` (
  `id_dokumen` bigint(32) NOT NULL,
  `nomor` varchar(256) NOT NULL,
  `keterangan` varchar(256) NOT NULL,
  `batas_sanggahan` int(255) NOT NULL,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nota_dinas_penetapan_kualifikasi`
--

CREATE TABLE IF NOT EXISTS `nota_dinas_penetapan_kualifikasi` (
  `id_dokumen` bigint(32) NOT NULL,
  `nomor` varchar(256) NOT NULL,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nota_dinas_penetapan_pemenang`
--

CREATE TABLE IF NOT EXISTS `nota_dinas_penetapan_pemenang` (
  `id_dokumen` bigint(32) NOT NULL,
  `nomor` varchar(256) NOT NULL,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nota_dinas_pengadaan_gagal_panitia`
--

CREATE TABLE IF NOT EXISTS `nota_dinas_pengadaan_gagal_panitia` (
  `id_dokumen` bigint(255) NOT NULL,
  `nomor` varchar(100) NOT NULL,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nota_dinas_pengawasan`
--

CREATE TABLE IF NOT EXISTS `nota_dinas_pengawasan` (
  `id_dokumen` bigint(32) NOT NULL,
  `nomor` varchar(255) NOT NULL,
  `nama_direksi` varchar(255) NOT NULL,
  `nip_direksi` varchar(255) NOT NULL,
  `jabatan_direksi` varchar(255) NOT NULL,
  `email_direksi` varchar(255) NOT NULL,
  `nama_pengawas` varchar(255) NOT NULL,
  `nip_pengawas` varchar(255) NOT NULL,
  `jabatan_pengawas` varchar(255) NOT NULL,
  `email_pengawas` varchar(255) NOT NULL,
  KEY `id_dokumen` (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nota_dinas_perintah_pengadaan`
--

CREATE TABLE IF NOT EXISTS `nota_dinas_perintah_pengadaan` (
  `id_dokumen` bigint(32) NOT NULL,
  `nomor` varchar(256) NOT NULL,
  `dari` int(255) NOT NULL,
  `kepada` varchar(256) NOT NULL,
  `perihal` varchar(256) NOT NULL,
  `targetSPK_kontrak` int(255) NOT NULL,
  `sumber_dana` varchar(256) NOT NULL,
  `pagu_anggaran` bigint(255) NOT NULL,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nota_dinas_permintaan`
--

CREATE TABLE IF NOT EXISTS `nota_dinas_permintaan` (
  `id_dokumen` bigint(32) NOT NULL,
  `nomor` varchar(256) NOT NULL,
  `perihal` varchar(256) NOT NULL,
  `nilai_biaya_rab` bigint(255) NOT NULL,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `nomor` varchar(256) NOT NULL,
  `tanggal_undangan` date NOT NULL,
  `waktu` time NOT NULL,
  `tempat` varchar(256) NOT NULL,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nota_dinas_usulan_pemenang`
--

CREATE TABLE IF NOT EXISTS `nota_dinas_usulan_pemenang` (
  `id_dokumen` bigint(32) NOT NULL,
  `nomor` varchar(256) NOT NULL,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nota_dinas_usulan_penetapan`
--

CREATE TABLE IF NOT EXISTS `nota_dinas_usulan_penetapan` (
  `id_dokumen` bigint(32) NOT NULL,
  `nomor` varchar(256) NOT NULL,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pakta_integritas_panitia_1`
--

CREATE TABLE IF NOT EXISTS `pakta_integritas_panitia_1` (
  `id_dokumen` bigint(32) NOT NULL,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `panitia`
--

CREATE TABLE IF NOT EXISTS `panitia` (
  `id_panitia` bigint(11) NOT NULL AUTO_INCREMENT,
  `nama_panitia` varchar(256) NOT NULL,
  `SK_panitia` varchar(256) NOT NULL,
  `tanggal_sk` date NOT NULL,
  `status_panitia` varchar(256) NOT NULL,
  `jenis_panitia` varchar(256) NOT NULL,
  PRIMARY KEY (`id_panitia`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `panitia`
--

INSERT INTO `panitia` (`id_panitia`, `nama_panitia`, `SK_panitia`, `tanggal_sk`, `status_panitia`, `jenis_panitia`) VALUES
(-1, 'Belum ada PIC', '-', '0000-00-00', '-', '-'),
(1, 'Hanif Eridaputra', '-', '0000-00-00', 'Aktif', 'Pejabat'),
(3, 'Panitia-A', '024/SK/PLN', '2013-07-01', 'Aktif', 'Panitia'),
(4, 'Panitia-B', '025/SK/PLN', '2013-07-01', 'Aktif', 'Panitia'),
(5, 'Panitia-C', '026/SK/PLN', '2012-07-09', 'Tidak Aktif', 'Panitia'),
(6, 'Irvan Aditya', '-', '0000-00-00', 'Aktif', 'Pejabat'),
(7, 'Gilang Laksana', '-', '0000-00-00', 'Aktif', 'Pejabat'),
(8, 'Ika Novitasari', '-', '0000-00-00', 'Aktif', 'Pejabat'),
(9, 'Samie Daswar', '-', '0000-00-00', 'Aktif', 'Pejabat'),
(10, 'Hari Nugroho', '-', '0000-00-00', 'Aktif', 'Pejabat'),
(11, 'WARNO', '-', '0000-00-00', 'Aktif', 'Pejabat'),
(12, 'Suryadani', '-', '0000-00-00', 'Aktif', 'Pejabat'),
(13, 'Yusuf Supriyadi', '-', '0000-00-00', 'Aktif', 'Pejabat'),
(14, 'Yudhi Juliardiyanto N', '-', '0000-00-00', 'Aktif', 'Pejabat'),
(15, 'Sarwoaji Wicaksono', '-', '0000-00-00', 'Aktif', 'Pejabat'),
(16, 'Klarisa', '-', '0000-00-00', 'Aktif', 'Pejabat'),
(17, 'Mochamad Arief Pramana', '-', '0000-00-00', 'Aktif', 'Pejabat'),
(18, 'Wijoyo Batara Frans Simanjuntak', '-', '0000-00-00', 'Aktif', 'Pejabat'),
(19, 'Panitia - A Pengadaan Barang/Jasa PT. PLN (Persero) Kantor Pusat Tahun Anggaran 2013', '377.K/DIR/2013', '2013-04-30', 'Aktif', 'Panitia'),
(20, 'Panitia - B Pengadaan Barang/Jasa PT. PLN (Persero) Kantor Pusat tahun anggaran 2013', '001-3.K/DIR/2013', '2013-01-02', 'Aktif', 'Panitia'),
(21, 'Panitia - C Pengadaan Barang/Jasa PT. PLN (Persero) Kantor Pusat tahun anggaran 2013', '001-4.K/DIR/2013', '2013-01-02', 'Aktif', 'Panitia');

-- --------------------------------------------------------

--
-- Table structure for table `penerima_pengadaan`
--

CREATE TABLE IF NOT EXISTS `penerima_pengadaan` (
  `id_penerima` bigint(255) NOT NULL AUTO_INCREMENT,
  `perusahaan` varchar(256) NOT NULL,
  `id_pengadaan` bigint(255) NOT NULL,
  `alamat` varchar(256) NOT NULL,
  `npwp` varchar(256) NOT NULL,
  `nilai` int(255) NOT NULL,
  `biaya` bigint(255) NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pengadaan`
--

CREATE TABLE IF NOT EXISTS `pengadaan` (
  `id_pengadaan` bigint(32) NOT NULL,
  `nama_pengadaan` varchar(256) NOT NULL,
  `divisi_peminta` bigint(20) NOT NULL,
  `jenis_pengadaan` varchar(256) NOT NULL,
  `nama_penyedia` bigint(255) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `status` varchar(256) NOT NULL,
  `biaya` bigint(255) NOT NULL,
  `id_panitia` bigint(11) NOT NULL,
  `metode_pengadaan` varchar(256) NOT NULL,
  `metode_penawaran` varchar(256) NOT NULL,
  `jenis_kualifikasi` varchar(256) NOT NULL,
  PRIMARY KEY (`id_pengadaan`),
  KEY `id_panitia` (`id_panitia`),
  KEY `divisi_peminta` (`divisi_peminta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman_hasil_prakualifikasi`
--

CREATE TABLE IF NOT EXISTS `pengumuman_hasil_prakualifikasi` (
  `id_dokumen` bigint(32) NOT NULL,
  `nomor` varchar(256) NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rks`
--

CREATE TABLE IF NOT EXISTS `rks` (
  `id_dokumen` bigint(32) NOT NULL,
  `nomor` varchar(256) NOT NULL,
  `tipe_rks` int(10) NOT NULL,
  `bidang_usaha` varchar(256) NOT NULL,
  `sub_bidang_usaha` varchar(256) NOT NULL,
  `kualifikasi` varchar(256) NOT NULL,
  `klasifikasi` varchar(256) NOT NULL,
  `tanggal_pendaftaran` date NOT NULL,
  `tanggal_pengambilan_dokumen1` date NOT NULL,
  `tanggal_pengambilan_dokumen2` date NOT NULL,
  `waktu_pengambilan_dokumen1` time NOT NULL,
  `waktu_pengambilan_dokumen2` time NOT NULL,
  `tempat_pengambilan_dokumen` varchar(256) NOT NULL,
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
  `sistem_evaluasi_penawaran` varchar(256) NOT NULL,
  `jangka_waktu_penyerahan` int(100) NOT NULL,
  `tempat_penyerahan` varchar(256) NOT NULL,
  `lama_pelaksanaan` int(255) NOT NULL,
  `jangka_waktu_berlaku_jaminan` int(100) NOT NULL,
  `biaya_jaminan_pelaksanaan` int(255) NOT NULL,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `surat_pengumuman_pelelangan`
--

CREATE TABLE IF NOT EXISTS `surat_pengumuman_pelelangan` (
  `id_dokumen` bigint(32) NOT NULL,
  `nomor` varchar(256) NOT NULL,
  `harga_dokumen` int(255) NOT NULL,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `surat_pengumuman_pemenang`
--

CREATE TABLE IF NOT EXISTS `surat_pengumuman_pemenang` (
  `id_dokumen` bigint(32) NOT NULL,
  `nomor` varchar(256) NOT NULL,
  `keterangan` varchar(256) NOT NULL,
  `batas_sanggahan` int(32) NOT NULL,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `surat_penunjukan_pemenang`
--

CREATE TABLE IF NOT EXISTS `surat_penunjukan_pemenang` (
  `id_dokumen` bigint(32) NOT NULL,
  `nomor` varchar(256) NOT NULL,
  `nomor_ski` varchar(256) NOT NULL,
  `tanggal_ski` date NOT NULL,
  `no_ski` varchar(256) NOT NULL,
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

-- --------------------------------------------------------

--
-- Table structure for table `surat_undangan_pengambilan_dokumen_pengadaan`
--

CREATE TABLE IF NOT EXISTS `surat_undangan_pengambilan_dokumen_pengadaan` (
  `id_dokumen` bigint(32) NOT NULL,
  `nomor` varchar(256) NOT NULL,
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
  `nomor` varchar(256) NOT NULL,
  PRIMARY KEY (`id_dokumen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `surat_undangan_prakualifikasi`
--

CREATE TABLE IF NOT EXISTS `surat_undangan_prakualifikasi` (
  `id_dokumen` bigint(32) NOT NULL,
  `nomor` varchar(256) NOT NULL,
  `perihal` varchar(256) NOT NULL,
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
-- Table structure for table `user_divisi`
--

CREATE TABLE IF NOT EXISTS `user_divisi` (
  `username` varchar(50) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `divisi` bigint(20) NOT NULL,
  `password` varchar(256) NOT NULL,
  PRIMARY KEY (`username`),
  KEY `divisi` (`divisi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_divisi`
--

INSERT INTO `user_divisi` (`username`, `nama`, `divisi`, `password`) VALUES
('johannes.ridho', 'Johannes Ridho', 1, '759412786bc533369b22377bf83fb9056c5b25b2');

-- --------------------------------------------------------

--
-- Table structure for table `user_kontrak`
--

CREATE TABLE IF NOT EXISTS `user_kontrak` (
  `id_user_kontrak` bigint(32) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `wewenang` int(11) NOT NULL,
  PRIMARY KEY (`id_user_kontrak`),
  KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user_kontrak`
--

INSERT INTO `user_kontrak` (`id_user_kontrak`, `username`, `wewenang`) VALUES
(1, 'aidilsyaputra', 0);

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
-- Constraints for table `berita_acara_evaluasi_prakualifikasi`
--
ALTER TABLE `berita_acara_evaluasi_prakualifikasi`
  ADD CONSTRAINT `berita_acara_evaluasi_prakualifikasi_ibfk_1` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `berita_acara_penerimaan_pq`
--
ALTER TABLE `berita_acara_penerimaan_pq`
  ADD CONSTRAINT `berita_acara_penerimaan_pq_ibfk_1` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `dokumen_kontrak_ibfk_1` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dokumen_kontrak_ibfk_2` FOREIGN KEY (`username`) REFERENCES `user_kontrak` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `kdivmum`
--
ALTER TABLE `kdivmum`
  ADD CONSTRAINT `kdivmum_ibfk_1` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id_jabatan`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `nota_dinas_pengadaan_gagal_panitia`
--
ALTER TABLE `nota_dinas_pengadaan_gagal_panitia`
  ADD CONSTRAINT `nota_dinas_pengadaan_gagal_panitia_ibfk_1` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nota_dinas_pengawasan`
--
ALTER TABLE `nota_dinas_pengawasan`
  ADD CONSTRAINT `nota_dinas_pengawasan_ibfk_1` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumen` (`id_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `pengadaan_ibfk_2` FOREIGN KEY (`divisi_peminta`) REFERENCES `divisi` (`id_divisi`) ON DELETE CASCADE ON UPDATE CASCADE;

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

--
-- Constraints for table `user_divisi`
--
ALTER TABLE `user_divisi`
  ADD CONSTRAINT `user_divisi_ibfk_1` FOREIGN KEY (`divisi`) REFERENCES `divisi` (`id_divisi`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
