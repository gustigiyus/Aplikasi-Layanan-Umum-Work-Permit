-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Bulan Mei 2021 pada 15.56
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.0.33

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
-- Struktur dari tabel `detail_user`
--

CREATE TABLE `detail_user` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `alamat1` text NOT NULL,
  `alamat2` text NOT NULL,
  `nama_perusahaan` varchar(50) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `tempat_lahir` varchar(256) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `nomer_telepon` varchar(256) NOT NULL,
  `nomer_ktp` text NOT NULL,
  `foto_ktp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_user`
--

INSERT INTO `detail_user` (`id`, `email`, `alamat1`, `alamat2`, `nama_perusahaan`, `kota`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `nomer_telepon`, `nomer_ktp`, `foto_ktp`) VALUES
(2, 'arizamzam12@gmail.com', 'jl. Taruna', 'jl.Suka asih', 'Rerize', 'Bandung', 'Laki-laki', 'bandung', '2001-05-09', '089609916992', '23274246323423', 'Koala.jpg'),
(3, 'starlord844@gmail.com', 'Jl. Ciromed RT 02 RW 02', 'Jl. Tanjungsari', 'Corn', 'Bandung', 'Laki-laki', 'Sumedang', '2000-04-25', '081395683366', '457356245223', 'Jellyfish.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_akhir_kerja`
--

CREATE TABLE `tb_akhir_kerja` (
  `id` int(11) NOT NULL,
  `id_izin_kerja` int(11) NOT NULL,
  `gambar` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_apd`
--

CREATE TABLE `tb_apd` (
  `id` int(11) NOT NULL,
  `id_APD` int(11) NOT NULL,
  `id_izin_kerja` int(11) NOT NULL,
  `gambar_apd` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_complain`
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_izin_kerja`
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
  `ttd` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jenis_potensi`
--

CREATE TABLE `tb_jenis_potensi` (
  `id` int(11) NOT NULL,
  `id_JP` int(11) NOT NULL,
  `id_izin_kerja` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_master_apd`
--

CREATE TABLE `tb_master_apd` (
  `id_master_APD` int(11) NOT NULL,
  `nama_APD` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_master_apd`
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
-- Struktur dari tabel `tb_master_jenis_potensi`
--

CREATE TABLE `tb_master_jenis_potensi` (
  `id_master_JP` int(11) NOT NULL,
  `nama_Jenis_Potensi` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_master_jenis_potensi`
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
-- Struktur dari tabel `tb_master_tindak_pencegahan`
--

CREATE TABLE `tb_master_tindak_pencegahan` (
  `id_master_TP` int(11) NOT NULL,
  `nama_tindak_pencegahan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_master_tindak_pencegahan`
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
-- Struktur dari tabel `tb_mulai_kerja`
--

CREATE TABLE `tb_mulai_kerja` (
  `id` int(11) NOT NULL,
  `id_izin_kerja` int(11) NOT NULL,
  `gambar` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tenaga_kerja`
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
-- Struktur dari tabel `tb_tindak_pencegahan`
--

CREATE TABLE `tb_tindak_pencegahan` (
  `id` int(11) NOT NULL,
  `id_tindak_pencegahan` int(11) NOT NULL,
  `id_izin_kerja` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
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
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'Super Admin', 'gustiggt123@gmail.com', 'profileadmin.png', '$2y$10$dDRnryhomDiLSlqZ1brEWOS/vuSkVNA7V8U69kZ/dPmcmH7YaqpdW', 1, 1, 1616553402),
(2, 'Starlord', 'starlord844@gmail.com', 'Chrysanthemum.jpg', '$2y$10$GPGdJOqjB0eGrtYudC/SseXmnI7WFZmajrcRwMgJnRhbbBiW4GSsu', 2, 1, 1616553576),
(11, 'isro', 'muar39065@gmail.com', 'default.jpg', '$2y$10$RDwuo/O4fnN7EoqdrAMgReJb42nMZYEBFDSSAA/BNsbFKhU2zdNke', 3, 1, 1616981477),
(24, 'Ari Zamzam', 'arizamzam12@gmail.com', 'Penguins.jpg', '$2y$10$jfMsXo3gJyjF5FtIN7vlhuhOB4E1QAQdFa6jXxs2rWff0CocyjwGy', 4, 1, 1620621252);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(4, 1, 3),
(29, 3, 2),
(30, 3, 4),
(34, 4, 4),
(35, 4, 6),
(36, 2, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(4, 'Layanan  Umum'),
(6, 'Work Permit');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administator'),
(2, 'Karyawan'),
(3, 'Admin Complain'),
(4, 'Tenant');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
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
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(3, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(7, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(8, 2, 'Change Password', 'user/changepassword', 'fas fa-fw fa-key', 1),
(9, 4, 'Complain', 'permintaan', 'far fa-fw fa-handshake', 1),
(10, 5, 'Dashboard', 'admincomplain', 'fas fa-fw fa-user-tie', 1),
(11, 6, 'Pengajuan Izin Kerja', 'workpermit', 'fas fa-fw fa-hard-hat', 1),
(12, 1, 'Manage Users', 'admin/manageuser', 'fas fa-fw fa-users-cog', 1),
(13, 6, 'Pekerjaan', 'workpermit/pekerjaan', 'fab fa-fw fa-youtube', 1),
(14, 4, 'Laporan', 'permintaan/laporan', 'fas fa-fw fa-paste', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(1, 'arizamzam12@gmail.com', 'g7eu4wouOhK7w4nOHXhGaZ5eZxQptv/pEj4cCAgXbQ8=', 1620621252);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_user`
--
ALTER TABLE `detail_user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_akhir_kerja`
--
ALTER TABLE `tb_akhir_kerja`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_apd`
--
ALTER TABLE `tb_apd`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_complain`
--
ALTER TABLE `tb_complain`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_izin_kerja`
--
ALTER TABLE `tb_izin_kerja`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_complain` (`id_complain`);

--
-- Indeks untuk tabel `tb_jenis_potensi`
--
ALTER TABLE `tb_jenis_potensi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_master_apd`
--
ALTER TABLE `tb_master_apd`
  ADD PRIMARY KEY (`id_master_APD`);

--
-- Indeks untuk tabel `tb_master_jenis_potensi`
--
ALTER TABLE `tb_master_jenis_potensi`
  ADD PRIMARY KEY (`id_master_JP`);

--
-- Indeks untuk tabel `tb_master_tindak_pencegahan`
--
ALTER TABLE `tb_master_tindak_pencegahan`
  ADD PRIMARY KEY (`id_master_TP`);

--
-- Indeks untuk tabel `tb_mulai_kerja`
--
ALTER TABLE `tb_mulai_kerja`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_tenaga_kerja`
--
ALTER TABLE `tb_tenaga_kerja`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_izin_kerja` (`id_izin_kerja`);

--
-- Indeks untuk tabel `tb_tindak_pencegahan`
--
ALTER TABLE `tb_tindak_pencegahan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_user`
--
ALTER TABLE `detail_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_akhir_kerja`
--
ALTER TABLE `tb_akhir_kerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_apd`
--
ALTER TABLE `tb_apd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `tb_complain`
--
ALTER TABLE `tb_complain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT untuk tabel `tb_izin_kerja`
--
ALTER TABLE `tb_izin_kerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_jenis_potensi`
--
ALTER TABLE `tb_jenis_potensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_master_apd`
--
ALTER TABLE `tb_master_apd`
  MODIFY `id_master_APD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tb_mulai_kerja`
--
ALTER TABLE `tb_mulai_kerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_tenaga_kerja`
--
ALTER TABLE `tb_tenaga_kerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_tindak_pencegahan`
--
ALTER TABLE `tb_tindak_pencegahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
