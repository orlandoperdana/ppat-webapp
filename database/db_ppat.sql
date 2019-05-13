-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2019 at 10:33 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ppat`
--

-- --------------------------------------------------------

--
-- Table structure for table `bentuk_hukum`
--

CREATE TABLE IF NOT EXISTS `bentuk_hukum` (
  `id` int(11) NOT NULL,
  `bentuk_hukum` varchar(128) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bentuk_hukum`
--

INSERT INTO `bentuk_hukum` (`id`, `bentuk_hukum`) VALUES
(1, 'Akta Jual Beli'),
(2, 'Akta Hibah'),
(3, 'Akta Pemberian Hak Tanggungan'),
(4, 'Akta Tukar Menukar'),
(5, 'Akta Pembagian Hak Bersama'),
(6, 'Surat Kuasa Membebankan Hak Tanggungan'),
(7, 'Akta Pemasukan kedalam Perusahaan'),
(8, 'Akta Pemberian Hak Guna Bangunan Atas Hak Milik'),
(9, 'Akta Pemberian Hak Pakai Atas Hak Milik');

-- --------------------------------------------------------

--
-- Table structure for table `tb_laporan`
--

CREATE TABLE IF NOT EXISTS `tb_laporan` (
  `id` int(11) NOT NULL,
  `no_akta` varchar(128) NOT NULL,
  `tgl_akta` date NOT NULL,
  `bph` varchar(128) NOT NULL,
  `nik_p1` varchar(20) DEFAULT NULL,
  `nama_p1` varchar(128) NOT NULL,
  `alamat_p1` varchar(200) NOT NULL,
  `npwp_p1` varchar(20) NOT NULL,
  `nik_p2` varchar(20) DEFAULT NULL,
  `nama_p2` varchar(128) NOT NULL,
  `alamat_p2` varchar(200) NOT NULL,
  `npwp_p2` varchar(20) NOT NULL,
  `jnh` varchar(128) NOT NULL,
  `ltb` varchar(128) NOT NULL,
  `lt` int(20) NOT NULL,
  `lb` int(20) NOT NULL,
  `nht` varchar(20) NOT NULL,
  `nop` varchar(20) NOT NULL,
  `njop` varchar(20) NOT NULL,
  `tgl_ssp` date NOT NULL,
  `nom_ssp` varchar(20) NOT NULL,
  `tgl_ssb` date NOT NULL,
  `nom_ssb` varchar(20) NOT NULL,
  `keterangan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `no_sk` varchar(128) NOT NULL,
  `tgl_sk` date NOT NULL,
  `t_lhr` varchar(128) NOT NULL,
  `tgl_lhr` date NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `wilker_id` varchar(128) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`, `nik`, `no_sk`, `tgl_sk`, `t_lhr`, `tgl_lhr`, `no_hp`, `alamat`, `wilker_id`) VALUES
(3, 'Orlando Perdana Sihombing', 'orlandoperdana@gmail.com', 'default1.jpg', '$2y$10$MV1sfYperzxFjy/fBnlzsOPcRrpu3uwVzi76QcnLm.3W0lxw/isYu', 1, 1, 1556251645, '1275042906940004', '133/SPMT/62.03.100.2/III/2019', '2019-03-01', 'Medan', '1994-06-29', '081370180940', 'Jl. Cut Nyak Dhien XIII', 'Kabupaten Kapuas'),
(4, 'Ferdinand Gilbert', 'ferdinand@gmail.com', 'default.jpg', '$2y$10$UelwArUF94J26uwbqrrjI.xLTZ5CcABkibVmak5a/9zDCWBB0hy/i', 2, 1, 1556339242, '', '', '0000-00-00', '', '0000-00-00', '', '', 'Kota Palangkaraya');

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE IF NOT EXISTS `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(6, 1, 3),
(7, 2, 4),
(8, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE IF NOT EXISTS `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(4, 'Laporan');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE IF NOT EXISTS `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'PPAT');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE IF NOT EXISTS `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'Profil', 'user', 'fas fa-user', 1),
(3, 2, 'Edit Profil', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(7, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(8, 2, 'Change Password', 'user/changepassword', 'fas fa-fw fa-key', 1),
(10, 4, 'Laporan PPAT/PPATS', 'laporan', 'fas fa-fw fa-file', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE IF NOT EXISTS `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wilker`
--

CREATE TABLE IF NOT EXISTS `wilker` (
  `id` int(11) NOT NULL,
  `nama_wilker` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wilker`
--

INSERT INTO `wilker` (`id`, `nama_wilker`) VALUES
(1, 'Kota Palangkaraya'),
(2, 'Kabupaten Kapuas'),
(3, 'Kabupaten Pulang Pisau'),
(4, 'Kabupaten Kotawaringin Timur'),
(5, 'Kabupaten Kotawaringin Barat'),
(6, 'Kabupaten Lamandau'),
(7, 'Kabupaten Sukamara'),
(8, 'Kabupaten Barito Timur'),
(9, 'Kabupaten Barito Selatan'),
(10, 'Kabupaten Barito Utara'),
(11, 'Kabupaten Gunung Mas'),
(12, 'Kabupaten Seruyan'),
(13, 'Kabupaten Katingan'),
(14, 'Kabupaten Murung Raya');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bentuk_hukum`
--
ALTER TABLE `bentuk_hukum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_laporan`
--
ALTER TABLE `tb_laporan`
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
-- Indexes for table `wilker`
--
ALTER TABLE `wilker`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bentuk_hukum`
--
ALTER TABLE `bentuk_hukum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tb_laporan`
--
ALTER TABLE `tb_laporan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wilker`
--
ALTER TABLE `wilker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
