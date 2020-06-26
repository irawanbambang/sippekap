-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2020 at 04:57 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipekap`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_identitas_pemilik`
--

CREATE TABLE `tb_identitas_pemilik` (
  `id` int(11) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `rt` varchar(10) NOT NULL,
  `rw` varchar(10) NOT NULL,
  `kelurahan` varchar(50) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `provinsi` varchar(25) NOT NULL,
  `kota` varchar(25) NOT NULL,
  `image` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_identitas_pemilik`
--

INSERT INTO `tb_identitas_pemilik` (`id`, `nik`, `nama`, `no_hp`, `jenis_kelamin`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `provinsi`, `kota`, `image`) VALUES
(24, '2147483647', 'Bambang Irawan', '085600762662', 'Laki-laki', 'Batang', '03', '03', 'batang', 'batang', 'jawa tengah', 'batang', 'default.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kapal`
--

CREATE TABLE `tb_kapal` (
  `id_kp` int(11) NOT NULL,
  `no_pas` varchar(15) NOT NULL,
  `asal_ktp` varchar(25) NOT NULL,
  `nik` int(16) NOT NULL,
  `tgl_terbit` date NOT NULL,
  `tgl_kadaluwarsa` date NOT NULL,
  `penerbit` varchar(50) NOT NULL,
  `nama_kapal` varchar(50) NOT NULL,
  `tanda_selar` varchar(25) NOT NULL,
  `jenis_alat` varchar(25) NOT NULL,
  `berat` int(15) NOT NULL,
  `muatan` int(15) NOT NULL,
  `kekuatan` int(15) NOT NULL,
  `merk_mesin` varchar(25) NOT NULL,
  `no_mesin` varchar(25) NOT NULL,
  `bahan` varchar(25) NOT NULL,
  `penangkapan` varchar(25) NOT NULL,
  `pangkalan` varchar(25) NOT NULL,
  `anak_buah` int(15) NOT NULL,
  `upload_ktp` varchar(50) NOT NULL,
  `upload_pas` varchar(50) NOT NULL,
  `upload_kapal_datang` varchar(50) NOT NULL,
  `status` enum('menunggu','proses','verifikasi','tolak','terima','disahkan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kapal`
--

INSERT INTO `tb_kapal` (`id_kp`, `no_pas`, `asal_ktp`, `nik`, `tgl_terbit`, `tgl_kadaluwarsa`, `penerbit`, `nama_kapal`, `tanda_selar`, `jenis_alat`, `berat`, `muatan`, `kekuatan`, `merk_mesin`, `no_mesin`, `bahan`, `penangkapan`, `pangkalan`, `anak_buah`, `upload_ktp`, `upload_pas`, `upload_kapal_datang`, `status`) VALUES
(11, '231/DP03/014/20', 'Kota Pekalongan', 2147483647, '2020-01-02', '2020-01-02', 'Dinas Kelautan dan Perikanan', 'Jaya Makmur', 'Gandrun', '5', 2, 12, 7, 'Nyonai', '6785G57', 'fiber', 'Wilayah Pekalongan', 'Pekalongan', 4, 'Untitled1.png', 'ss1.jpg', 'IMG-20190103-WA', 'disahkan'),
(13, '231/DP04/002/20', 'Luar Kota Pekalongan', 2147483647, '2020-01-05', '2020-01-05', 'Dinas Kelautan dan Perikanan', 'Sumber Rejeki', 'Gandrun', '1', 2, 12, 7, 'Nyonai', '6785G56', 'kayu', 'Wilayah Pekalongan', 'Pekalongan', 5, 'Untitled3.png', 'wallpaper.jpg', 'ss2.jpg', 'verifikasi'),
(14, '231/DP05/002/20', 'Luar Kota Pekalongan', 2147483647, '2020-01-05', '2020-01-05', 'Dinas Kelautan dan Perikanan', 'Jaya Aqila', 'krayak', '3', 3, 40, 15, 'Nyonai', '6785G56', 'besi', 'Wilayah Pekalongan', 'Pekalongan', 4, 'Untitled4.png', 'ss3.jpg', 'wallpaper21.jpg', 'proses'),
(15, '231/DP03/015/20', 'Kota Pekalongan', 2147483647, '2020-01-05', '2020-01-05', 'Dinas Kelautan dan Perikanan', 'Sumber Rejeki', 'krayak', '4', 2, 40, 50, 'Nyonai', '6785G56', 'fiber', 'Wilayah Pekalongan', 'Pekalongan', 7, 'Untitled5.png', 'wallpaper22.jpg', 'IMG-20190103-WA', 'proses'),
(16, '231/DP05/002/20', 'Kota Pekalongan', 2147483647, '2020-01-05', '2020-01-05', 'Dinas Kelautan dan Perikanan', 'Jaya Makmur', 'krayak', '3', 3, 12, 7, 'Nyonai', '6785G56', 'besi', 'Wilayah Pekalongan', 'Pekalongan', 7, '200105082625.png', '200105082625.jpg', '2001050826251.jpg', 'menunggu'),
(17, '231/DP06/002/20', 'Luar Kota Pekalongan', 2147483647, '2020-01-05', '2020-01-05', 'Dinas Kelautan dan Perikanan', 'Jaya Aqila', 'krayak', '3', 2, 34, 15, 'Nyonai', '6785G57', 'fiber', 'Wilayah Pekalongan', 'Pekalongan', 5, '2001050832002.jpg', '200105083200.jpg', '2001050832001.jpg', 'menunggu');

-- --------------------------------------------------------

--
-- Table structure for table `tb_surat`
--

CREATE TABLE `tb_surat` (
  `id_kp` int(11) NOT NULL,
  `no_surat` varchar(50) NOT NULL,
  `tgl_terbit` date NOT NULL,
  `tgl_kadaluwarsa` date NOT NULL,
  `catatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_surat`
--

INSERT INTO `tb_surat` (`id_kp`, `no_surat`, `tgl_terbit`, `tgl_kadaluwarsa`, `catatan`) VALUES
(11, '028/SPKPI/DKP/IV/2019', '2020-01-02', '2020-01-02', '-'),
(12, '029/SPKPI/DKP/IV/2019', '2020-01-02', '2020-01-02', '-'),
(13, '028/SPKPI/DKP/IV/2019', '2020-01-05', '2020-01-05', '-'),
(14, '029/SPKPI/DKP/IV/2019', '2020-01-05', '2020-01-05', '-');

-- --------------------------------------------------------

--
-- Table structure for table `tb_surat_perizinan`
--

CREATE TABLE `tb_surat_perizinan` (
  `id` int(11) NOT NULL,
  `no_pas` varchar(25) NOT NULL,
  `no_surat` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'Kepala Dinas', 'dkpkotapekalongan@gmail.com', 'default.png', '$2y$10$kay4MBgvmyqbv2mrf9bjxOcuIBSN6pC65BWsKAHQ8UqyWfRW1ZWgm', 3, 1, 20191209),
(2, 'Dedi Hadi', 'dedi@yahoo.com', 'default.png', '$2y$10$wZIuYN.gsUsqNBXUWRSOeuSd65BCKMyPLg3F4h8F8oy0bzTtT3lS6', 1, 1, 20191201),
(4, 'Hendri Purwanto', 'hendrip@gmail.com', 'default.png', 'hendri', 3, 1, 2019),
(10, 'Admin', 'admindkp@gmail.com', 'default.png', '$2y$10$jEIxuWNDPVo.rL1LHJRAZOiZ4.hRUdhPHginEUZGqRL4XgmdD04D2', 1, 1, 1577333190),
(24, 'Bambang Irawan', 'wawanbatang93@gmail.com', 'default.png', '$2y$10$1SkJTb1F5XKYxmYf6ougDeMLzmyYXMA31kRmkoB4NFa9.pCwUJveG', 2, 1, 1577707462),
(28, 'piyut', 'piyut.klasik@yahoo.com', 'default.png', '$2y$10$Tr87oRLXQLxHy..qosJYhesTE5pNrFYjbLLHH5/YjNpaspLl2kAhC', 2, 0, 1577781999);

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
(32, 3, 5),
(44, 2, 6),
(50, 2, 4),
(53, 2, 2),
(54, 3, 2),
(56, 1, 2);

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
(4, 'Form'),
(5, 'Kadin'),
(6, 'Pemohon');

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
(1, 'Administrator'),
(2, 'Pemohon'),
(3, 'Kadin');

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
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(3, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(7, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie\"', 1),
(8, 2, 'Change Password', 'user/changepassword', 'fas fa-fw fa-key', 1),
(9, 4, 'Form Pendaftaran', 'form/pendaftaran', 'fas fa-fw fa-pencil-alt', 1),
(10, 4, 'Data Yang Diajuan', 'form/pengajuan', 'far fa-fw fa-folder-open', 1),
(11, 5, 'Data Pengajuan', 'kadin/pengajuan', 'fas fa-fw fa-server', 1),
(12, 1, 'Daftar Pengajuan', 'admin/daftar', 'fas fa-fw fa-list-ul', 1),
(13, 1, 'Daftar Surat Perizinan Kapal', 'admin/surat', 'fas fa-fw fa-clipboard-list', 1),
(14, 6, 'Identitas Member', 'member', 'fas fa-fw fa-key', 1),
(15, 1, 'Daftar User', 'admin/daftar_admin', 'fas fa-fw fa-key', 1),
(16, 1, 'Daftar Pemohon', 'admin/daftar_pemohon', 'fas fa-fw fa-clipboard-list', 1);

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

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(5, 'admindkp@gmail.com', 'nwvLeolozWeIa3zyUvCNBVUOq2EZrkyQ9krDFQbrPGg=', 1577333190),
(9, 'wawanbatang93@gmail.com', 'Gw3erLTzgV9Pja5COEHDDLkQw0TdGY+ODBF1zVPToGE=', 1577609903),
(10, 'wawanbatang93@gmail.com', 'QxH+OfYXBRXpqXeRx4bGtGBIzTIMNbvI6fqmz0IYGys=', 1577610073),
(11, 'wawanbatang93@gmail.com', 'EQJjqgBSI16BG4fqq/lRj+Z9ZRNGDIYRkUmoYeib+O0=', 1577610216),
(12, 'wawanbatang93@gmail.com', 'xDVYF9Li3jbP6PUp0iSeFmfnKNn32nnT39PzN5n+350=', 1577610306),
(13, 'wawanbatang93@gmail.com', '4LF+PUpZ1UpkfSdgauhc0DJ8TLadjYxPbcr7ZzlNZaw=', 1577610406),
(14, 'wawanbatang93@gmail.com', 'FLFAYJ/efYdsqZqc4/YOtkDmc3LR/rKvcPo7lX76nGM=', 1577610580),
(15, 'wawanbatang93@gmail.com', 'FHINEj0LGTK1C1s/HtnhuZUUUmEmWhKBIJ99aI5c1m8=', 1577610678),
(16, 'wawanbatang93@gmail.com', 'ono2wWSHXOhk5XnrANfzTjoUuKqeRH9evggujc9DQX4=', 1577610775),
(17, 'wawanbatang93@gmail.com', 'lP5CvSDd7RcQWMHt4PQzcQmZFh1c8lSxc071G2vLZsg=', 1577707290),
(18, 'wawanbatang93@gmail.com', 'fKy+f2eP/qGV7vZCWAq/Y0CV9JmI//A8SomQPcO8KoM=', 1577707345),
(19, 'wawanbatang93@gmail.com', 'FV8y7kt7aA8EpemvD7echqpJsxVrpW0dR8xguTbIsSg=', 1577707462),
(20, 'piyut.klasik@yahoo.com', 'DmuTharcW7PE5wVk62i1GxaPfQG2XkOG6SmNBuQRZ7E=', 1577781524),
(21, 'piyut.klasik@yahoo.com', 'uzs/grD9Xa89Sr4SNTBMZc9HcKWx9BNDZFTpqOU+uQA=', 1577781770),
(22, 'piyut.klasik@yahoo.com', '1GRmtuIY1NTt5B3fMXP6vsHPj1aiVhw4H2B23vEgDAI=', 1577781926),
(23, 'piyut.klasik@yahoo.com', 'IJuBr7kN7PHJBPwQkh+ELjPVlx5lVO27XSjElJYjrcA=', 1577781999);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_identitas_pemilik`
--
ALTER TABLE `tb_identitas_pemilik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kapal`
--
ALTER TABLE `tb_kapal`
  ADD PRIMARY KEY (`id_kp`);

--
-- Indexes for table `tb_surat`
--
ALTER TABLE `tb_surat`
  ADD PRIMARY KEY (`id_kp`);

--
-- Indexes for table `tb_surat_perizinan`
--
ALTER TABLE `tb_surat_perizinan`
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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_kapal`
--
ALTER TABLE `tb_kapal`
  MODIFY `id_kp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_surat`
--
ALTER TABLE `tb_surat`
  MODIFY `id_kp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
