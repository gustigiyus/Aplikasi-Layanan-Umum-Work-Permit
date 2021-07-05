-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2021 at 03:18 PM
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
  `email` varchar(128) NOT NULL,
  `divisi` enum('MSDM','Jaringan','Sekretaris') NOT NULL,
  `nama_atasan` varchar(128) NOT NULL,
  `no_atasan` varchar(50) NOT NULL,
  `em_atasan` varchar(128) NOT NULL,
  `nip` int(11) NOT NULL,
  `nomer_telepon` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_user`
--

INSERT INTO `detail_user` (`id`, `email`, `divisi`, `nama_atasan`, `no_atasan`, `em_atasan`, `nip`, `nomer_telepon`) VALUES
(1, 'starlord844@gmail.com', '', 'Sukasari', 'PT INTI', 'Bandung', 1, '081395683366'),
(2, 'cocmarvel10@gmail.com', '', 'Cinanjung', 'PT TELKOM', 'Bandung', 1, '022983912341'),
(3, 'rzknoctv@gmail.com', 'Jaringan', 'asep', '086271826321', 'asep@gmail.com', 1301184125, '1234567');

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
  `tanggal_agenda` date NOT NULL,
  `judul` varchar(128) NOT NULL,
  `kegiatan` varchar(128) NOT NULL,
  `jenis_kegiatan` varchar(128) NOT NULL,
  `waktu_mulai` time NOT NULL,
  `waktu_akhir` time NOT NULL,
  `waktu_buat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `penulis` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_agenda`
--

INSERT INTO `tb_agenda` (`id`, `tanggal_agenda`, `judul`, `kegiatan`, `jenis_kegiatan`, `waktu_mulai`, `waktu_akhir`, `waktu_buat`, `penulis`) VALUES
(1, '2021-06-29', 'Kegiatan Belajar', 'Coba doang', 'Untuk Apa?', '18:29:00', '22:33:00', '2021-06-29 06:29:52', 'cocmarvel10@gmail.com'),
(2, '2021-06-25', 'Kegiatan Seminar', 'Tetsing', 'Seminar', '20:00:00', '23:00:00', '2021-06-29 11:57:01', 'cocmarvel10@gmail.com'),
(3, '2021-07-04', 'Tetsing', 'Tetsing kesekian kalinya', 'Percobaan', '10:48:00', '13:51:00', '2021-06-30 22:48:29', 'cocmarvel10@gmail.com'),
(4, '2021-07-17', 'fafasf', 'asfasfasf', 'asfafs', '11:14:00', '11:15:00', '2021-06-30 23:12:18', 'cocmarvel10@gmail.com'),
(5, '2021-07-01', 'rapat', '', 'rapat', '12:34:00', '14:36:00', '2021-06-30 23:33:51', 'cocmarvel10@gmail.com');

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

--
-- Dumping data for table `tb_akhir_kerja`
--

INSERT INTO `tb_akhir_kerja` (`id`, `id_izin_kerja`, `gambar`, `token`) VALUES
(7, 4, 'TICKET_back.png', '0.7056019708600387'),
(8, 4, '17692.jpg', '0.9991048691634488');

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

--
-- Dumping data for table `tb_apd`
--

INSERT INTO `tb_apd` (`id`, `id_APD`, `id_izin_kerja`, `gambar_apd`) VALUES
(8, 1, 4, '17692.jpg'),
(9, 2, 4, '24859.jpg');

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
  `keadaan` enum('Rusak Ringan','Rusak Sedang','Rusak Berat') NOT NULL,
  `tingkat_bahaya` enum('Pekerjaan Bersiko Tinggi','Pekerjaan Bersiko Rendah') NOT NULL,
  `tanggal_ajukan` date NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `gambar2` varchar(128) NOT NULL,
  `gambar3` varchar(128) NOT NULL,
  `status_complain` enum('Pending','Complain Disetujui','Meminta Izin Kerja','Izin Kerja Disetujui','Sedang Dikerjakan','Selesai Dikerjakan','Selesai') NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_complain`
--

INSERT INTO `tb_complain` (`id`, `email`, `nama`, `judul_complain`, `deskripsi`, `keadaan`, `tingkat_bahaya`, `tanggal_ajukan`, `gambar`, `gambar2`, `gambar3`, `status_complain`) VALUES
(4, 'rzknoctv@gmail.com', 'Rizka', 'ac rusak', 'ac rusak ', 'Rusak Sedang', 'Pekerjaan Bersiko Tinggi', '2021-07-02', '1384453872.jpg', '13844538721.jpg', '13844538722.jpg', 'Selesai');

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
  `waktu_mulai` time NOT NULL,
  `waktu_akhir` time NOT NULL,
  `tanggal_dikerjakan` date NOT NULL,
  `tanggal_akhir` date NOT NULL,
  `ttd` varchar(128) NOT NULL,
  `token_ttd` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_izin_kerja`
--

INSERT INTO `tb_izin_kerja` (`id`, `id_complain`, `nama_kontraktor`, `nama_penanggung_jawab`, `no_telp_kantor`, `deskripsi_pekerjaan`, `waktu_mulai`, `waktu_akhir`, `tanggal_dikerjakan`, `tanggal_akhir`, `ttd`, `token_ttd`) VALUES
(4, 4, 'gusti giyus', 'andrea', '08512345678', 'ac rusak', '14:42:00', '17:46:00', '2021-07-09', '2021-07-01', 'signature.png', '0.4931866573909469');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis_potensi`
--

CREATE TABLE `tb_jenis_potensi` (
  `id` int(11) NOT NULL,
  `id_JP` int(11) NOT NULL,
  `id_izin_kerja` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jenis_potensi`
--

INSERT INTO `tb_jenis_potensi` (`id`, `id_JP`, `id_izin_kerja`) VALUES
(4, 4, 4),
(5, 6, 4);

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
  `em_atasan` varchar(128) NOT NULL,
  `no_atasan` int(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_master_atasan`
--

INSERT INTO `tb_master_atasan` (`id_atasan`, `nama_atasan`, `em_atasan`, `no_atasan`) VALUES
(0, 'asep', 'asep@gmail.com', 2147483647);

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
-- Table structure for table `tb_master_ruangan`
--

CREATE TABLE `tb_master_ruangan` (
  `id_master_ruangan` int(11) NOT NULL,
  `tipe_ruangan` varchar(128) NOT NULL,
  `kapasitas_ruangan` int(11) NOT NULL,
  `perlengkapan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

--
-- Dumping data for table `tb_mulai_kerja`
--

INSERT INTO `tb_mulai_kerja` (`id`, `id_izin_kerja`, `gambar`, `token`) VALUES
(6, 4, '17692.jpg', '0.7813666255658731'),
(7, 4, '20210421_105622.jpg', '0.5307131778638505'),
(8, 4, '24859.jpg', '0.5035239248819172');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pinjaman`
--

CREATE TABLE `tb_pinjaman` (
  `id` int(100) NOT NULL,
  `email` varchar(128) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `kegiatan_pinjaman` varchar(500) NOT NULL,
  `ruang_pinjaman` varchar(500) NOT NULL,
  `layout_pinjaman` varchar(500) NOT NULL,
  `waktu_mulai` time NOT NULL,
  `waktu_selesai` time NOT NULL,
  `status_pinjaman` enum('Pending','Pinjaman Disetujui','Ditolak') NOT NULL,
  `tanggal_pinjaman` date NOT NULL,
  `tgl_request` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

--
-- Dumping data for table `tb_tenaga_kerja`
--

INSERT INTO `tb_tenaga_kerja` (`id`, `id_izin_kerja`, `nama_pekerja`, `jenis_pekerjaan`, `lokasi_pekerjaan`) VALUES
(5, 4, 'ilham', 'memperbaiki AC', 'lt 8'),
(6, 4, 'reza', 'memperbaiki AC', 'lt 8'),
(7, 4, 'rangga', 'memperbaiki AC', 'lt 8');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tindak_pencegahan`
--

CREATE TABLE `tb_tindak_pencegahan` (
  `id` int(11) NOT NULL,
  `id_tindak_pencegahan` int(11) NOT NULL,
  `id_izin_kerja` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_tindak_pencegahan`
--

INSERT INTO `tb_tindak_pencegahan` (`id`, `id_tindak_pencegahan`, `id_izin_kerja`) VALUES
(1, 1, 1),
(2, 4, 1),
(3, 5, 1),
(4, 1, 2),
(5, 6, 2),
(6, 8, 2),
(7, 6, 4);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'Super Admin', 'superadmin123@gmail.com', 'profileadmin.png', '$2y$10$dDRnryhomDiLSlqZ1brEWOS/vuSkVNA7V8U69kZ/dPmcmH7YaqpdW', 1, 1, 1616553402),
(11, 'Officer Umum', 'gustiggt123@gmail.com', 'default.jpg', '$2y$10$dDRnryhomDiLSlqZ1brEWOS/vuSkVNA7V8U69kZ/dPmcmH7YaqpdW', 3, 1, 1616981477),
(12, 'gusti giyus', 'starlord844@gmail.com', 'default.jpg', '$2y$10$dDRnryhomDiLSlqZ1brEWOS/vuSkVNA7V8U69kZ/dPmcmH7YaqpdW', 4, 1, 1623206738),
(13, 'Asep', 'cocmarvel10@gmail.com', 'sesudah-kerja2.jpg', '$2y$10$dDRnryhomDiLSlqZ1brEWOS/vuSkVNA7V8U69kZ/dPmcmH7YaqpdW', 2, 1, 1623207250),
(14, 'Rizka Nur Octaviani', 'rzknoctv@gmail.com', 'default.svg', '$2y$10$6MSGFMpaTG9NTLUDEcCypeDsPQnGPoj3zqePiQkuhC8YYOEWjWpEm', 2, 1, 1625115825);

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
(29, 3, 2),
(30, 3, 4),
(34, 4, 4),
(36, 2, 4),
(37, 4, 6),
(38, 2, 7),
(40, 1, 9);

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
(4, 'Layanan  Umum'),
(6, 'Work Permit'),
(7, 'Permintaan Layanan'),
(8, 'Kelola Ruangan'),
(9, 'Table Master');

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
(4, 'Tenant');

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
(4, '7', 'Peminjaman Ruangan', '#', 'fas fa-hotel', 1),
(5, '7', 'pinjaman', 'pinjaman', 'fas fa-fw fa-folder-open', 1);

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
(2, 2, 'Profil saya', 'user', 'fas fa-fw fa-user', 1),
(3, 2, 'Ubah Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Manajemen Menu', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'Manajemen Submenu', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(7, 1, 'Kelola Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(8, 2, 'Ubah Kata Sandi', 'user/changepassword', 'fas fa-fw fa-key', 1),
(9, 4, 'Complain', 'permintaan', 'far fa-fw fa-handshake', 1),
(10, 5, 'Dashboard', 'admincomplain', 'fas fa-fw fa-user-tie', 1),
(11, 6, 'Pengajuan Izin Kerja', 'workpermit', 'fas fa-fw fa-hard-hat', 1),
(12, 1, 'Kelola Pengguna', 'admin/manageuser', 'fas fa-fw fa-users-cog', 1),
(13, 6, 'Pekerjaan', 'workpermit/pekerjaan', 'fab fa-fw fa-youtube', 1),
(14, 4, 'Laporan', 'permintaan/laporan', 'fas fa-fw fa-paste', 1),
(15, 6, 'Laporan', 'workpermit/laporan', 'fab fa-fw fa-youtube', 1),
(16, 7, 'Peminjaman Ruangan', 'Pinjaman', 'far fa-fw fa-handshake', 1),
(17, 9, 'Kelola Ruangan', 'admin/manageruangan', 'fas fa-fw fa-users-cog', 1),
(18, 3, 'Manajemen SSubmenu', 'menu/ssmenu', 'fas fa-fw fa-folder-open', 1),
(19, 3, 'Manajemen Treemenu', 'menu/treemenu', 'fas fa-fw fa-folder-open', 1),
(20, 9, 'Data Atasan', 'admin/manageatasan', 'fas fa-fw fa-user', 1);

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
(2, '7', '4', 'Data Agenda', 'peminjaman_ruangan/agenda', 'menu-bullet menu-bullet-dot', 1),
(3, '7', '4', 'Data Peminjaman', 'peminjaman_ruangan/peminjaman', 'menu-bullet menu-bullet-dot', 1),
(4, '7', '5', 'pinjaman', 'pinjaman', 'menu-bullet menu-bullet-dot', 1);

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
-- Indexes for table `tb_master_jenis_potensi`
--
ALTER TABLE `tb_master_jenis_potensi`
  ADD PRIMARY KEY (`id_master_JP`);

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
-- Indexes for table `tb_pinjaman`
--
ALTER TABLE `tb_pinjaman`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notifikasi_user`
--
ALTER TABLE `notifikasi_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_agenda`
--
ALTER TABLE `tb_agenda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_akhir_kerja`
--
ALTER TABLE `tb_akhir_kerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_apd`
--
ALTER TABLE `tb_apd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_complain`
--
ALTER TABLE `tb_complain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_izin_kerja`
--
ALTER TABLE `tb_izin_kerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_jenis_potensi`
--
ALTER TABLE `tb_jenis_potensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_master_apd`
--
ALTER TABLE `tb_master_apd`
  MODIFY `id_master_APD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_master_ruangan`
--
ALTER TABLE `tb_master_ruangan`
  MODIFY `id_master_ruangan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_mulai_kerja`
--
ALTER TABLE `tb_mulai_kerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_pinjaman`
--
ALTER TABLE `tb_pinjaman`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_tenaga_kerja`
--
ALTER TABLE `tb_tenaga_kerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_tindak_pencegahan`
--
ALTER TABLE `tb_tindak_pencegahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_ss_menu`
--
ALTER TABLE `user_ss_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_tree_menu`
--
ALTER TABLE `user_tree_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
