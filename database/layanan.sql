-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2021 at 12:06 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.0.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `layanan`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_user`
--

CREATE TABLE `detail_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `divisi` enum('MSDM','Jaringan','Sekretaris') DEFAULT NULL,
  `nama_atasan` varchar(128) DEFAULT NULL,
  `no_atasan` varchar(128) DEFAULT NULL,
  `em_atasan` varchar(128) DEFAULT NULL,
  `nip` int(11) DEFAULT NULL,
  `nomer_telepon` varchar(256) DEFAULT NULL,
  `alamat_rumah` longtext,
  `alamat_kantor` longtext,
  `nama_kantor` varchar(128) DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `nomor_ktp` varchar(512) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_user`
--

INSERT INTO `detail_user` (`id`, `nama`, `email`, `divisi`, `nama_atasan`, `no_atasan`, `em_atasan`, `nip`, `nomer_telepon`, `alamat_rumah`, `alamat_kantor`, `nama_kantor`, `jenis_kelamin`, `tanggal_lahir`, `nomor_ktp`) VALUES
(1, 'Peter Quill', 'starlord844@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Laki-laki', '0000-00-00', ''),
(2, 'Asep Sukandar', 'cocmarvel10@gmail.com', 'MSDM', 'Gusti Giustianto', '123456', 'atasan1@gmail.com', 88748361, '081395683366', NULL, NULL, NULL, 'Laki-laki', '0000-00-00', ''),
(3, 'Rizka Octaviani', 'rzknoctv@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Laki-laki', '0000-00-00', ''),
(12, 'Gusti Giustianto', 'atasan1@gmail.com', NULL, NULL, NULL, NULL, 4523514, NULL, NULL, NULL, NULL, 'Laki-laki', '0000-00-00', ''),
(13, 'Bhisma Anugrah Pratama', 'atasan3@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Laki-laki', '0000-00-00', ''),
(15, 'syykuno', 'sykkunohere123@gmail.com', NULL, NULL, NULL, NULL, NULL, '6345123414', 'Tanjungsari', 'Sumedang', 'PT TELKOM', 'Laki-laki', '2021-09-06', '1241514141'),
(16, 'Angga', 'angga@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi_user`
--

CREATE TABLE `notifikasi_user` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `complain_notif` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_agenda`
--

CREATE TABLE `tb_agenda` (
  `id` int(11) NOT NULL,
  `no_peminjaman` varchar(128) NOT NULL,
  `kegiatan` varchar(128) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `waktu_mulai` time NOT NULL,
  `waktu_selesai` time NOT NULL,
  `waktu_buat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `nama_peminjam` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_akhir_kerja`
--

CREATE TABLE `tb_akhir_kerja` (
  `id` int(11) NOT NULL,
  `id_izin_kerja` int(11) NOT NULL,
  `gambar` varchar(512) NOT NULL,
  `token` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_apd`
--

CREATE TABLE `tb_apd` (
  `id` int(11) NOT NULL,
  `id_APD` int(11) NOT NULL,
  `id_izin_kerja` int(11) NOT NULL,
  `gambar_apd` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_complain`
--

CREATE TABLE `tb_complain` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `judul_complain` varchar(128) NOT NULL,
  `deskripsi` varchar(128) NOT NULL,
  `lokasi_pekerjaan` longtext NOT NULL,
  `keadaan` enum('Rusak Ringan','Rusak Sedang','Rusak Berat') NOT NULL,
  `tingkat_bahaya` enum('Pekerjaan Bersiko Tinggi','Pekerjaan Bersiko Rendah') NOT NULL,
  `tanggal_ajukan` date NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `gambar2` varchar(128) NOT NULL,
  `gambar3` varchar(128) NOT NULL,
  `status_complain` enum('Pending','Complain Disetujui','Selesai') NOT NULL DEFAULT 'Pending',
  `status_kerja` enum('Pending','Izin Kerja Disetujui','Sedang Dikerjakan','Selesai Dikerjakan','Selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_izin_kerja`
--

CREATE TABLE `tb_izin_kerja` (
  `id` int(11) NOT NULL,
  `id_complain` int(11) NOT NULL,
  `nama_kontraktor` varchar(128) NOT NULL,
  `nama_penanggung_jawab` varchar(128) NOT NULL,
  `no_telp_kantor` varchar(128) NOT NULL,
  `deskripsi_pekerjaan` varchar(256) NOT NULL,
  `lokasi_pekerjaan` longtext NOT NULL,
  `waktu_mulai` time NOT NULL,
  `waktu_akhir` time NOT NULL,
  `tanggal_dikerjakan` date NOT NULL,
  `tanggal_akhir` date NOT NULL,
  `ttd` varchar(128) NOT NULL,
  `token_ttd` varchar(100) NOT NULL,
  `status_izin_kerja` enum('Meminta Izin Kerja','Izin Kerja Disetujui','Sedang Dikerjakan','Selesai Dikerjakan','Selesai','Izin Kerja Ditolak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis_potensi`
--

CREATE TABLE `tb_jenis_potensi` (
  `id` int(11) NOT NULL,
  `id_JP` int(11) NOT NULL,
  `id_izin_kerja` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_master_apd`
--

CREATE TABLE `tb_master_apd` (
  `id_master_APD` int(11) NOT NULL,
  `nama_APD` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_master_apd`
--

INSERT INTO `tb_master_apd` (`id_master_APD`, `nama_APD`) VALUES
(1, 'safety helmet'),
(2, 'safety shoes'),
(3, 'safety shoes high voltage'),
(4, 'sarung tangan asbes'),
(5, 'sarung tangan plastik'),
(6, 'sarung tangan katun'),
(7, 'safety googles'),
(8, 'welding helmet'),
(9, 'kacamata las'),
(10, 'safety belt'),
(11, 'body harness'),
(12, 'baju tahan panas'),
(13, 'masker'),
(14, 'respirator'),
(15, 'jaket pelampung'),
(16, 'ear plug'),
(17, 'ear muff'),
(18, 'sepatu boot');

-- --------------------------------------------------------

--
-- Table structure for table `tb_master_atasan`
--

CREATE TABLE `tb_master_atasan` (
  `id_atasan` int(11) NOT NULL,
  `nama_atasan` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `divisi` enum('MSDM','Jaringan','Sekretaris') NOT NULL,
  `kode_atasan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_master_atasan`
--

INSERT INTO `tb_master_atasan` (`id_atasan`, `nama_atasan`, `email`, `divisi`, `kode_atasan`) VALUES
(12, 'Gusti Giustianto', 'atasan1@gmail.com', 'MSDM', '123456'),
(13, 'Bhisma Anugrah Pratama', 'atasan3@gmail.com', 'Sekretaris', '555123'),
(14, 'fiqri', 'fiqri@gmail.com', 'Jaringan', '66617');

-- --------------------------------------------------------

--
-- Table structure for table `tb_master_jenis_permintaan_layanan`
--

CREATE TABLE `tb_master_jenis_permintaan_layanan` (
  `id_jenis_layanan` int(11) NOT NULL,
  `jenis_permintaan_layanan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_master_jenis_permintaan_layanan`
--

INSERT INTO `tb_master_jenis_permintaan_layanan` (`id_jenis_layanan`, `jenis_permintaan_layanan`) VALUES
(1, 'Layanan Bangunan Gedung'),
(2, 'Layanan Kebersihan'),
(3, 'Layanan Mekanikal Elektrikal');

-- --------------------------------------------------------

--
-- Table structure for table `tb_master_jenis_potensi`
--

CREATE TABLE `tb_master_jenis_potensi` (
  `id_master_JP` int(11) NOT NULL,
  `nama_Jenis_Potensi` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_master_jenis_potensi`
--

INSERT INTO `tb_master_jenis_potensi` (`id_master_JP`, `nama_Jenis_Potensi`) VALUES
(1, 'mudah meledak/eksplosif'),
(2, 'mudah terbakar/flamable'),
(3, 'bahan beracun/toxic'),
(4, 'panas/heat'),
(5, 'ketinggian/elavation'),
(6, 'tegangan tinggi/high voltage'),
(7, 'bising/noise'),
(8, 'sumber api/ignition source');

-- --------------------------------------------------------

--
-- Table structure for table `tb_master_layout_ruangan`
--

CREATE TABLE `tb_master_layout_ruangan` (
  `id_layout_ruangan` int(11) NOT NULL,
  `layout_ruangan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_master_layout_ruangan`
--

INSERT INTO `tb_master_layout_ruangan` (`id_layout_ruangan`, `layout_ruangan`) VALUES
(2, 'Class Room'),
(3, 'Conference Style (Hollow Square)'),
(4, 'Semi Circle Of Chairs Style'),
(5, 'Theater'),
(6, 'U - Shape'),
(7, 'Customize');

-- --------------------------------------------------------

--
-- Table structure for table `tb_master_perlengkapan_ruangan`
--

CREATE TABLE `tb_master_perlengkapan_ruangan` (
  `id_perlengkapan_ruangan` int(11) NOT NULL,
  `perlengkapan_ruangan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_master_perlengkapan_ruangan`
--

INSERT INTO `tb_master_perlengkapan_ruangan` (`id_perlengkapan_ruangan`, `perlengkapan_ruangan`) VALUES
(1, 'AC'),
(2, 'Kursi Susun'),
(3, 'Sound system'),
(5, 'Kabel Power'),
(6, 'Meja Rapat'),
(7, 'Screen'),
(9, 'Proyektor');

-- --------------------------------------------------------

--
-- Table structure for table `tb_master_ruangan`
--

CREATE TABLE `tb_master_ruangan` (
  `id_master_ruangan` int(11) NOT NULL,
  `tipe_ruangan` varchar(128) NOT NULL,
  `kapasitas_ruangan` int(11) NOT NULL,
  `perlengkapan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_master_ruangan`
--

INSERT INTO `tb_master_ruangan` (`id_master_ruangan`, `tipe_ruangan`, `kapasitas_ruangan`, `perlengkapan`) VALUES
(1, 'Classroom', 45, 'AC, Kursi Susun'),
(2, 'Conference Style (Hollow Square)', 100, 'AC, Screen, Sound System, Kabel Power'),
(3, 'Theater', 150, 'AC, Screen, Sound System');

-- --------------------------------------------------------

--
-- Table structure for table `tb_master_tindak_pencegahan`
--

CREATE TABLE `tb_master_tindak_pencegahan` (
  `id_master_TP` int(11) NOT NULL,
  `nama_tindak_pencegahan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_master_tindak_pencegahan`
--

INSERT INTO `tb_master_tindak_pencegahan` (`id_master_TP`, `nama_tindak_pencegahan`) VALUES
(1, 'pengecekan kebocoran gas'),
(2, 'menjauhkan bahan mudah terbakar'),
(3, 'memahami MSDS'),
(4, 'pendingingan/memakai APD'),
(5, 'memakai body hardness'),
(6, 'mematikan tegangan/ memakai APD'),
(7, 'meredam suara/memakai APD'),
(8, 'mematikan sumber api');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mulai_kerja`
--

CREATE TABLE `tb_mulai_kerja` (
  `id` int(11) NOT NULL,
  `id_izin_kerja` int(11) NOT NULL,
  `gambar` varchar(512) NOT NULL,
  `token` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_peminjaman_ruangan`
--

CREATE TABLE `tb_peminjaman_ruangan` (
  `no_peminjaman` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `nip` varchar(128) NOT NULL,
  `divisi` varchar(128) NOT NULL,
  `ext/hp` varchar(128) NOT NULL,
  `nama_kegiatan` varchar(512) NOT NULL,
  `ruangan` varchar(128) NOT NULL,
  `jenis_layout` varchar(128) NOT NULL,
  `waktu_mulai` time NOT NULL,
  `waktu_selesai` time NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `jumlah_orang` int(128) NOT NULL,
  `perlengkapan` varchar(128) NOT NULL,
  `tanggal_request` date NOT NULL,
  `nama_atasan` varchar(128) NOT NULL,
  `email_atasan` varchar(128) NOT NULL,
  `nomor_atasan` varchar(128) NOT NULL,
  `status_peminjaman` enum('Open','Close','Cencel Request') NOT NULL,
  `ttd_peminjaman_ruangan` varchar(512) NOT NULL,
  `token_peminjaman_ruangan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_permintaan_layanan`
--

CREATE TABLE `tb_permintaan_layanan` (
  `no_permintaan` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `permintaan` enum('Permintaan Baru','Penanganan Gangguan') NOT NULL,
  `judul_permintaan` varchar(128) DEFAULT NULL,
  `jenis_permintaan_layanan` varchar(128) DEFAULT NULL,
  `deskripsi` longtext NOT NULL,
  `tanggal_ajukan` date NOT NULL,
  `nama_atasan` varchar(128) NOT NULL,
  `email_atasan` varchar(128) NOT NULL,
  `nomor_atasan` varchar(128) NOT NULL,
  `tanggal_persetujuan` date NOT NULL,
  `status_permintaan` enum('Open','Menunggu TTD','Sedang Diproses','Close','Cencel Request') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_plyn_adm_distribusi_pekerja`
--

CREATE TABLE `tb_plyn_adm_distribusi_pekerja` (
  `id` int(11) NOT NULL,
  `no_permintaan_dstrb` varchar(128) NOT NULL,
  `nama_pekerja` varchar(128) NOT NULL,
  `jenis_pekerjaan` varchar(128) NOT NULL,
  `lokasi_pekerjaan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_plyn_adm_eskalasi`
--

CREATE TABLE `tb_plyn_adm_eskalasi` (
  `no_permintaan_eskls` varchar(128) NOT NULL,
  `email_eskalasi` varchar(128) NOT NULL,
  `eskalasi_ke` varchar(128) NOT NULL,
  `alasan_eskalasi` varchar(128) NOT NULL,
  `tgl_assignment_eskalasi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_plyn_adm_pemeriksaan`
--

CREATE TABLE `tb_plyn_adm_pemeriksaan` (
  `no_permintaan_prsk` varchar(128) NOT NULL,
  `hasil_pemeriksaan` longtext NOT NULL,
  `usulan_solusi` longtext NOT NULL,
  `tgl_pemeriksaan` date NOT NULL,
  `ttd_pemeriksaan` varchar(512) NOT NULL,
  `token_pemeriksaan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_plyn_adm_penerimaan_helpdesk`
--

CREATE TABLE `tb_plyn_adm_penerimaan_helpdesk` (
  `no_permintaan_hlpdsk` varchar(128) NOT NULL,
  `nama_penerima` varchar(128) NOT NULL,
  `email_penerima` varchar(128) NOT NULL,
  `diterima_oleh` varchar(128) NOT NULL,
  `jenis_layanan` enum('RFS (Request For Service)','RFC (Request For Change)','RFD (Request For Devlopment) Material Tersedia','RFD (Request For Devlopment) Material Belum Tersedia','RFM (Request For Maintance) Material Tersedia','RFM (Request For Maintance) Material Belum Tersedia') DEFAULT NULL,
  `ext_hp` varchar(128) NOT NULL,
  `tgl_terima_helpdesk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_plyn_adm_penyerahaan`
--

CREATE TABLE `tb_plyn_adm_penyerahaan` (
  `no_permintaan_pnyrh` varchar(128) NOT NULL,
  `catatan_pemeliharaan` longtext NOT NULL,
  `total_biaya` varchar(128) NOT NULL,
  `tgl_kembali` date NOT NULL,
  `ttd_penerima_layanan` varchar(512) NOT NULL,
  `token_penerima_layanan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_tenaga_kerja`
--

CREATE TABLE `tb_tenaga_kerja` (
  `id` int(11) NOT NULL,
  `id_izin_kerja` int(11) NOT NULL,
  `nama_pekerja` varchar(128) NOT NULL,
  `jenis_pekerjaan` varchar(128) NOT NULL,
  `lokasi_pekerjaan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_tindak_pencegahan`
--

CREATE TABLE `tb_tindak_pencegahan` (
  `id` int(11) NOT NULL,
  `id_tindak_pencegahan` int(11) NOT NULL,
  `id_izin_kerja` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `no_atasan` varchar(128) DEFAULT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `no_atasan`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'Super Admin', 'superadmin@gmail.com', NULL, 'profileadmin.png', '$2y$10$dDRnryhomDiLSlqZ1brEWOS/vuSkVNA7V8U69kZ/dPmcmH7YaqpdW', 1, 1, 1616553402),
(11, 'Officer Umum', 'gustiggt123@gmail.com', NULL, 'default.jpg', '$2y$10$dDRnryhomDiLSlqZ1brEWOS/vuSkVNA7V8U69kZ/dPmcmH7YaqpdW', 3, 1, 1616981477),
(12, 'Peter Quill', 'starlord844@gmail.com', NULL, 'default.jpg', '$2y$10$dDRnryhomDiLSlqZ1brEWOS/vuSkVNA7V8U69kZ/dPmcmH7YaqpdW', 4, 1, 1623206738),
(13, 'Asep Sukandar', 'cocmarvel10@gmail.com', NULL, 'sesudah-kerja2.jpg', '$2y$10$b.9Dajk/2j1UsomTGt2Wx.E0beNJhPBoaxiIKRE.7om94MGzFqozK', 2, 1, 1623207250),
(14, 'Rizka Octaviani', 'rzknoctv@gmail.com', NULL, 'default.jpg', '$2y$10$6MSGFMpaTG9NTLUDEcCypeDsPQnGPoj3zqePiQkuhC8YYOEWjWpEm', 2, 1, 1625115825),
(25, 'Gusti Giustianto', 'atasan1@gmail.com', '123456', 'default.jpg', '$2y$10$WwmdNdh/Gwqry5z4ZPXVQ.asZjcYgTg6OOVh2M3Fiw0kPe4klVMRG', 5, 1, 1626082135),
(26, 'Bhisma Anugrah Pratama', 'atasan3@gmail.com', '555123', 'default.jpg', '$2y$10$Jux3lkkXVSDHOkUK35cv6.2PwDeUsDOEvu2REt1yGLtsVMIr5/.OK', 5, 1, 1626146404),
(28, 'syykuno', 'sykkunohere123@gmail.com', NULL, 'default.jpg', '$2y$10$VMs6LPNVGRSELIvCJZaKyetItKN.VbaXp4tuRayDQjiBKDATVKyUK', 4, 1, 1630910603),
(29, 'Angga', 'angga@gmail.com', NULL, 'default.jpg', '$2y$10$hK6kKtJWI3.VWNZuIAriye1SbIIy0tTKQ4DYgDhlMSsIU3JoT5Cj6', 2, 1, 1630910726);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(4, 1, 3),
(54, 1, 14),
(59, 2, 10),
(60, 3, 7),
(61, 4, 6),
(62, 4, 10),
(63, 5, 11),
(64, 5, 12),
(66, 3, 2),
(67, 3, 15);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(6, 'Work Permit'),
(7, 'Permintaan Komplain'),
(10, 'Permintaan Layanan'),
(11, 'Kelola Pinjam Ruangan'),
(12, 'Kelola Permintaan Layanan'),
(13, 'Report Sewa'),
(14, 'Administator'),
(15, 'Kelola Izin Kerja');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administator'),
(2, 'Karyawan'),
(3, 'Admin Complain'),
(4, 'Tenant'),
(5, 'Atasan'),
(6, 'Master Atasan');

-- --------------------------------------------------------

--
-- Table structure for table `user_ss_menu`
--

CREATE TABLE `user_ss_menu` (
  `id` int(11) NOT NULL,
  `menu_id` varchar(128) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(10) NOT NULL DEFAULT '#',
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_ss_menu`
--

INSERT INTO `user_ss_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(4, '10', 'Peminjaman Ruangan', '#', 'fas fa-hotel', 1),
(7, '10', 'Permintaan Properti', '#', 'fas fa-head-side-cough', 1),
(8, '10', 'Permintaan Komplain', '#', 'far fa-handshake\r\n', 1),
(9, '12', 'Persetujuan Permintaan ', '#', 'fa fa-building', 1),
(10, '14', 'Layanan Umum', '#', 'fab fa-fw fa-youtube', 1),
(11, '14', 'Peminjaman Ruangan', '#', 'fab fa-fw fa-youtube', 1),
(13, '12', 'Laporan Permintaan', '#', 'fa fa-fw fa-file', 1),
(14, '11', 'Laporan Peminjaman', '#', 'fa fa-fw fa-file	', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'Profil Saya', 'user', 'fas fa-fw fa-user', 1),
(3, 2, 'Ubah Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Manajemen Menu', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'Manajemen Submenu', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(6, 1, 'Kelola Role', 'admin/role', 'fas fa-fw fa-user-tag', 1),
(7, 1, 'Kelola Atasan', 'admin/manageatasan', 'fas fa-fw fa-users-cog', 1),
(8, 2, 'Ubah Kata Sandi', 'user/changepassword', 'fas fa-fw fa-key', 1),
(10, 5, 'Dashboard', 'admincomplain', 'fas fa-fw fa-user-tie', 1),
(11, 6, 'Pengajuan Izin Kerja', 'workpermit', 'far fa-handshake', 1),
(12, 1, 'Kelola Pengguna', 'admin/manageuser', 'fas fa-fw fa-users-cog', 1),
(13, 6, 'Pekerjaan', 'workpermit/pekerjaan', ' fas fa-fw fa-hard-hat', 1),
(15, 6, 'Laporan', 'workpermit/laporan', 'fas fa-print', 1),
(17, 1, 'Kelola Ruangan', 'admin/manageruangan', 'fas fa-fw fa-hotel', 1),
(18, 3, 'Manajemen SSubmenu', 'menu/ssmenu', 'fas fa-fw fa-folder-open', 1),
(19, 3, 'Manajemen Treemenu', 'menu/treemenu', 'fas fa-fw fa-folder-open', 1),
(21, 7, 'Permintaan Komplain', 'permintaan', 'far fa-handshake', 1),
(22, 7, 'Laporan Komplain', 'permintaan/laporan', 'fas fa-print', 1),
(23, 11, 'Persetujuan Peminjaman	', 'peminjaman_ruangan/peminjaman/kelola_peminjaman', 'fas fa-fw fas fa-hotel', 1),
(24, 15, 'Persetujuan Izin Kerja', 'kelola_izin_kerja/workpermit', 'far fa-handshake', 1),
(25, 15, 'Laporan Izin Kerja', 'kelola_izin_kerja/laporan', 'fas fa-print', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_tree_menu`
--

CREATE TABLE `user_tree_menu` (
  `id` int(11) NOT NULL,
  `menu_id` varchar(128) NOT NULL,
  `menu_tree` varchar(128) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL DEFAULT 'menu-bullet menu-bullet-dot',
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_tree_menu`
--

INSERT INTO `user_tree_menu` (`id`, `menu_id`, `menu_tree`, `title`, `url`, `icon`, `is_active`) VALUES
(2, '10', '4', 'Data Agenda', 'peminjaman_ruangan/agenda', 'menu-bullet menu-bullet-dot', 1),
(3, '10', '4', 'Peminjaman Ruangan', 'peminjaman_ruangan/peminjaman', 'menu-bullet menu-bullet-dot', 1),
(6, '10', '7', 'Permintaan Layanan', 'permintaan_layanan/properti', 'menu-bullet menu-bullet-dot', 1),
(7, '10', '8', 'Permintaan Komplain', 'permintaan', 'menu-bullet menu-bullet-dot', 1),
(8, '10', '8', 'Laporan Komplain', 'permintaan/laporan	', 'menu-bullet menu-bullet-dot', 1),
(9, '10', '7', 'Laporan Permintaan Layanan', 'permintaan_layanan/laporan/karyawan', 'menu-bullet menu-bullet-dot', 1),
(10, '10', '4', 'Laporan Peminjaman', 'peminjaman_ruangan/laporan', 'menu-bullet menu-bullet-dot', 1),
(11, '12', '9', 'Permintaan Baru', 'permintaan_layanan/properti/permintaan_baru', 'menu-bullet menu-bullet-dot', 1),
(13, '14', '11', 'Layout Ruangan', 'administator/adm_peminjaman_ruangan/layout_ruangan', 'menu-bullet menu-bullet-dot', 1),
(15, '14', '11', 'Perlengkapan Ruangan', 'administator/adm_peminjaman_ruangan/perlengkapan_ruangan', 'menu-bullet menu-bullet-dot', 1),
(16, '14', '10', 'Jenis Layanan', 'administator/adm_layanan_umum/jenis_permintaan_layanan', 'menu-bullet menu-bullet-dot', 1),
(18, '12', '13', 'Laporan Permintaan', 'permintaan_layanan/laporan/atasan', 'menu-bullet menu-bullet-dot', 1),
(19, '12', '9', 'Penanganan Gangguan', 'permintaan_layanan/properti/penanganan_gangguan', 'menu-bullet menu-bullet-dot', 1),
(20, '12', '13', 'Laporan Charts', 'permintaan_layanan/laporan/chart_atasan', 'menu-bullet menu-bullet-dot', 1),
(21, '11', '14', 'Laporan Peminjaman', 'peminjaman_ruangan/laporan/laporan_atasan', 'menu-bullet menu-bullet-dot', 1),
(22, '11', '14', 'Laporan Agenda', 'peminjaman_ruangan/laporan/laporan_agenda', 'menu-bullet menu-bullet-dot', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_user`
--
ALTER TABLE `detail_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifikasi_user`
--
ALTER TABLE `notifikasi_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_agenda`
--
ALTER TABLE `tb_agenda`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_akhir_kerja`
--
ALTER TABLE `tb_akhir_kerja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_apd`
--
ALTER TABLE `tb_apd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_complain`
--
ALTER TABLE `tb_complain`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_izin_kerja`
--
ALTER TABLE `tb_izin_kerja`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_complain` (`id_complain`);

--
-- Indexes for table `tb_jenis_potensi`
--
ALTER TABLE `tb_jenis_potensi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_master_apd`
--
ALTER TABLE `tb_master_apd`
  ADD PRIMARY KEY (`id_master_APD`);

--
-- Indexes for table `tb_master_atasan`
--
ALTER TABLE `tb_master_atasan`
  ADD PRIMARY KEY (`id_atasan`);

--
-- Indexes for table `tb_master_jenis_permintaan_layanan`
--
ALTER TABLE `tb_master_jenis_permintaan_layanan`
  ADD PRIMARY KEY (`id_jenis_layanan`);

--
-- Indexes for table `tb_master_jenis_potensi`
--
ALTER TABLE `tb_master_jenis_potensi`
  ADD PRIMARY KEY (`id_master_JP`);

--
-- Indexes for table `tb_master_layout_ruangan`
--
ALTER TABLE `tb_master_layout_ruangan`
  ADD PRIMARY KEY (`id_layout_ruangan`);

--
-- Indexes for table `tb_master_perlengkapan_ruangan`
--
ALTER TABLE `tb_master_perlengkapan_ruangan`
  ADD PRIMARY KEY (`id_perlengkapan_ruangan`);

--
-- Indexes for table `tb_master_ruangan`
--
ALTER TABLE `tb_master_ruangan`
  ADD PRIMARY KEY (`id_master_ruangan`);

--
-- Indexes for table `tb_master_tindak_pencegahan`
--
ALTER TABLE `tb_master_tindak_pencegahan`
  ADD PRIMARY KEY (`id_master_TP`);

--
-- Indexes for table `tb_mulai_kerja`
--
ALTER TABLE `tb_mulai_kerja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_peminjaman_ruangan`
--
ALTER TABLE `tb_peminjaman_ruangan`
  ADD PRIMARY KEY (`no_peminjaman`);

--
-- Indexes for table `tb_permintaan_layanan`
--
ALTER TABLE `tb_permintaan_layanan`
  ADD PRIMARY KEY (`no_permintaan`);

--
-- Indexes for table `tb_plyn_adm_distribusi_pekerja`
--
ALTER TABLE `tb_plyn_adm_distribusi_pekerja`
  ADD PRIMARY KEY (`id`),
  ADD KEY `no_permintaan_dstrb` (`no_permintaan_dstrb`);

--
-- Indexes for table `tb_plyn_adm_eskalasi`
--
ALTER TABLE `tb_plyn_adm_eskalasi`
  ADD PRIMARY KEY (`no_permintaan_eskls`);

--
-- Indexes for table `tb_plyn_adm_pemeriksaan`
--
ALTER TABLE `tb_plyn_adm_pemeriksaan`
  ADD PRIMARY KEY (`no_permintaan_prsk`);

--
-- Indexes for table `tb_plyn_adm_penerimaan_helpdesk`
--
ALTER TABLE `tb_plyn_adm_penerimaan_helpdesk`
  ADD PRIMARY KEY (`no_permintaan_hlpdsk`);

--
-- Indexes for table `tb_plyn_adm_penyerahaan`
--
ALTER TABLE `tb_plyn_adm_penyerahaan`
  ADD PRIMARY KEY (`no_permintaan_pnyrh`);

--
-- Indexes for table `tb_tenaga_kerja`
--
ALTER TABLE `tb_tenaga_kerja`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_izin_kerja` (`id_izin_kerja`);

--
-- Indexes for table `tb_tindak_pencegahan`
--
ALTER TABLE `tb_tindak_pencegahan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_ss_menu`
--
ALTER TABLE `user_ss_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_tree_menu`
--
ALTER TABLE `user_tree_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_user`
--
ALTER TABLE `detail_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `notifikasi_user`
--
ALTER TABLE `notifikasi_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_agenda`
--
ALTER TABLE `tb_agenda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_akhir_kerja`
--
ALTER TABLE `tb_akhir_kerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_apd`
--
ALTER TABLE `tb_apd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_complain`
--
ALTER TABLE `tb_complain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_izin_kerja`
--
ALTER TABLE `tb_izin_kerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_jenis_potensi`
--
ALTER TABLE `tb_jenis_potensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_master_apd`
--
ALTER TABLE `tb_master_apd`
  MODIFY `id_master_APD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_master_atasan`
--
ALTER TABLE `tb_master_atasan`
  MODIFY `id_atasan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_master_jenis_permintaan_layanan`
--
ALTER TABLE `tb_master_jenis_permintaan_layanan`
  MODIFY `id_jenis_layanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_master_layout_ruangan`
--
ALTER TABLE `tb_master_layout_ruangan`
  MODIFY `id_layout_ruangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_master_perlengkapan_ruangan`
--
ALTER TABLE `tb_master_perlengkapan_ruangan`
  MODIFY `id_perlengkapan_ruangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_master_ruangan`
--
ALTER TABLE `tb_master_ruangan`
  MODIFY `id_master_ruangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_mulai_kerja`
--
ALTER TABLE `tb_mulai_kerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_plyn_adm_distribusi_pekerja`
--
ALTER TABLE `tb_plyn_adm_distribusi_pekerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_tenaga_kerja`
--
ALTER TABLE `tb_tenaga_kerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_tindak_pencegahan`
--
ALTER TABLE `tb_tindak_pencegahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_ss_menu`
--
ALTER TABLE `user_ss_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_tree_menu`
--
ALTER TABLE `user_tree_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
