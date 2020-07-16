-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Jul 2020 pada 17.35
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.2.12

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
-- Struktur dari tabel `tb_identitas_pemilik`
--

CREATE TABLE `tb_identitas_pemilik` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
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
-- Dumping data untuk tabel `tb_identitas_pemilik`
--

INSERT INTO `tb_identitas_pemilik` (`id`, `id_user`, `nik`, `nama`, `no_hp`, `jenis_kelamin`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `provinsi`, `kota`, `image`) VALUES
(1, 30, '12546584165213', 'coba test', '085412365478', 'laki-laki', 'Batang', '03', '03', 'Prosel', 'Batang', 'Jawa Tengah', 'Batang', 'default.png'),
(31, 0, '12347583948217345', 'coba cba', '098765432132', 'Laki-laki', 'Kramat Sari', '05', '13', 'Pasir Kraton Kramat', 'Pekalongan Barat', 'Jawa Tengah', 'Pekalongan', 'default.png'),
(32, 0, '12347583948217345', 'coba cba', '098767832123', 'Laki-laki', 'Kramat Sari', '05', '13', 'Pasir Kraton Kramat', 'Pekalongan Barat', 'Jawa Tengah', 'Pekalongan', 'default.png'),
(33, 0, '12347583948217345', 'coba cba', '098767832123', 'Laki-laki', 'Kramat Sari', '05', '13', 'Pasir Kraton Kramat', 'Pekalongan Barat', 'Jawa Tengah', 'Pekalongan', 'default.png'),
(34, 0, '12347583948217345', 'coba cba', '098767832123', 'Laki-laki', 'Kramat Sari', '05', '13', 'Pasir Kraton Kramat', 'Pekalongan Barat', 'Jawa Tengah', 'Pekalongan', 'default.png'),
(35, 0, '12347583948217345', 'coba cba', '098767832123', 'Laki-laki', 'Kramat Sari', '05', '13', 'Pasir Kraton Kramat', 'Pekalongan Barat', 'Jawa Tengah', 'Pekalongan', 'default.png'),
(36, 0, '12347583948217345', 'coba cba', '098767832123', 'Laki-laki', 'Kramat Sari', '05', '13', 'Pasir Kraton Kramat', 'Pekalongan Barat', 'Jawa Tengah', 'Pekalongan', 'default.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kapal`
--

CREATE TABLE `tb_kapal` (
  `id_kp` int(11) NOT NULL,
  `no_pas` varchar(15) NOT NULL,
  `asal_ktp` varchar(25) NOT NULL,
  `nik` varchar(20) NOT NULL,
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
  `status` enum('menunggu','proses','verifikasi','tolak','terima','disahkan','stempel') NOT NULL,
  `pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kapal`
--

INSERT INTO `tb_kapal` (`id_kp`, `no_pas`, `asal_ktp`, `nik`, `tgl_terbit`, `tgl_kadaluwarsa`, `penerbit`, `nama_kapal`, `tanda_selar`, `jenis_alat`, `berat`, `muatan`, `kekuatan`, `merk_mesin`, `no_mesin`, `bahan`, `penangkapan`, `pangkalan`, `anak_buah`, `upload_ktp`, `upload_pas`, `upload_kapal_datang`, `status`, `pesan`) VALUES
(11, '231/DP03/014/20', 'Kota Pekalongan', '2147483647', '2020-01-02', '2020-01-02', 'Dinas Kelautan dan Perikanan', 'Jaya Makmur', 'Gandrun', '5', 2, 12, 7, 'Nyonai', '6785G57', 'fiber', 'Wilayah Pekalongan', 'Pekalongan', 4, 'Untitled1.png', 'ss1.jpg', 'IMG-20190103-WA', 'stempel', ''),
(13, '231/DP04/002/20', 'Luar Kota Pekalongan', '2147483647', '2020-01-05', '2020-01-05', 'Dinas Kelautan dan Perikanan', 'Sumber Rejeki', 'Gandrun', '1', 2, 12, 7, 'Nyonai', '6785G56', 'kayu', 'Wilayah Pekalongan', 'Pekalongan', 5, 'Untitled3.png', 'wallpaper.jpg', 'ss2.jpg', 'verifikasi', ''),
(14, '231/DP05/002/20', 'Luar Kota Pekalongan', '2147483647', '2020-01-05', '2020-01-05', 'Dinas Kelautan dan Perikanan', 'Jaya Aqila', 'krayak', '3', 3, 40, 15, 'Nyonai', '6785G56', 'besi', 'Wilayah Pekalongan', 'Pekalongan', 4, 'Untitled4.png', 'ss3.jpg', 'wallpaper21.jpg', 'tolak', ''),
(15, '231/DP03/015/20', 'Kota Pekalongan', '2147483647', '2020-01-05', '2020-01-05', 'Dinas Kelautan dan Perikanan', 'Sumber Rejeki', 'krayak', '4', 2, 40, 50, 'Nyonai', '6785G56', 'fiber', 'Wilayah Pekalongan', 'Pekalongan', 7, 'Untitled5.png', 'wallpaper22.jpg', 'IMG-20190103-WA', 'verifikasi', ''),
(16, '231/DP05/002/20', 'Kota Pekalongan', '2147483647', '2020-01-05', '2020-01-05', 'Dinas Kelautan dan Perikanan', 'Jaya Makmur', 'krayak', '3', 3, 12, 7, 'Nyonai', '6785G56', 'besi', 'Wilayah Pekalongan', 'Pekalongan', 7, '200105082625.png', '200105082625.jpg', '2001050826251.jpg', 'menunggu', ''),
(17, '231/DP06/002/20', 'Luar Kota Pekalongan', '2147483647', '2020-01-05', '2020-01-05', 'Dinas Kelautan dan Perikanan', 'Jaya Aqila', 'krayak', '3', 2, 34, 15, 'Nyonai', '6785G57', 'fiber', 'Wilayah Pekalongan', 'Pekalongan', 5, '2001050832002.jpg', '200105083200.jpg', '2001050832001.jpg', 'menunggu', ''),
(18, '123456789', 'Kota Pekalongan', '12546584165213', '2020-06-24', '2020-06-24', 'Dishub Tegal', 'Mekar Jaya', '23', 'pukat_kantong', 3, 25, 125, 'Cargo', '123456', 'besi', 'Kota Pekalongan', 'Kota Pekalongan', 3, '2006240634382.jpg', '200624063438.jpg', '2006240634381.jpg', 'stempel', ''),
(19, '1234567998', 'Kota Pekalongan', '12546584165213', '2020-06-24', '2020-06-24', 'Dishub Tegal', 'Mekar sejati', '21', 'jaring_angkat', 2, 21, 120, 'Cargo', '123456', 'fiber', 'Kota Pekalongan', 'Kota Pekalongan', 4, '2006240652071.jpg', '200624065207.jpg', '200624065207.png', 'verifikasi', ''),
(20, '44/555/ss/1234', 'Kota Pekalongan', '12546584165213', '2020-06-28', '2020-06-28', 'Dishub Batang', 'Mekar Klakon', 'Jt07', 'jaring_angkat', 3, 23, 40, 'Sekar', 'b032 kk', 'besi', 'Kota Pekalongan', 'Kota Pekalongan', 3, '2006280453052.jpg', '200628045305.jpg', '2006280453051.jpg', 'stempel', ''),
(21, '44/555/ss/1245', 'Kota Pekalongan', '12546584165213', '2020-07-04', '2020-07-04', 'Dishub Batang', 'Mekar Sejati', 'Jt08', 'pancing', 2, 25, 40, 'Sekar', 'b032 kk', 'besi', 'Kota Pekalongan', 'Kota Pekalongan', 3, '2007040918232.jpg', '200704091823.jpg', '2007040918231.jpg', 'verifikasi', ''),
(22, '44/555/ss/1234', 'Luar Kota Pekalongan', '12546584165213', '2020-07-05', '2020-07-05', 'Dishub Batang', 'Mekar Maju', '08kl', 'pancing', 2, 23, 40, 'Toyota', 'AA 654 kk', 'kayu', 'Kota Pekalongan', 'Kota Pekalongan', 2, '2007050440152.jpg', '200705044015.jpg', '2007050440151.jpg', 'verifikasi', ''),
(23, '44/555/ss/1240', 'Luar Kota Pekalongan', '12546584165213', '2020-07-06', '2020-07-06', 'Dishub Batang', 'Mekar Klakon', '08kl', 'jaring_angkat', 2, 23, 40, 'Toyota', 'AA 654 kk', 'kayu', 'Kota Pekalongan', 'Kota Pekalongan', 2, '2007060447262.jpg', '200706044726.jpg', '2007060447261.jpg', 'tolak', 'Berkas tidak sesuai'),
(24, 'PK. 202/13/22/U', 'Luar Kota Pekalongan', '12546584165213', '2020-07-08', '2020-07-08', 'Kantor UPP Kelas III Batang', 'KM LANCAR JAYA', 'JTA 5 No 703', 'jaring_insang', 1, 1, 26, 'JIANGFA', '-', 'kayu', 'Laut Utara Jawa', 'Pelabuhan Perikanan Nusan', 2, '200708063220.jpeg', '200708063220.jpg', '2007080632201.jpg', 'disahkan', ''),
(25, '44/555/ss/1240', 'Luar Kota Pekalongan', '12546584165213', '2020-07-13', '2020-07-13', '', 'Mekar Klakon', '08kl', '3', 2, 23, 40, 'Toyota', 'AA 654 kk', 'kayu', 'Kota Pekalongan', 'Kota Pekalongan', 2, '', '', '', 'menunggu', ''),
(26, '44/555/ss/1240', 'Luar Kota Pekalongan', '12546584165213', '2020-07-13', '2020-07-13', '', 'Mekar Klakon', '08kl', '3', 2, 23, 40, 'Toyota', 'AA 654 kk', 'kayu', 'Kota Pekalongan', 'Kota Pekalongan', 2, '', '', '', 'menunggu', ''),
(27, '44/555/ss/1240', 'Luar Kota Pekalongan', '12546584165213', '2020-07-15', '2020-07-15', '', 'Mekar Klakon', '08kl', '2', 2, 23, 40, 'Toyota', 'AA 654 kk', 'kayu', 'Kota Pekalongan', 'Kota Pekalongan', 2, '', '', '', 'menunggu', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_surat`
--

CREATE TABLE `tb_surat` (
  `id_surat` int(11) NOT NULL,
  `id_kp` int(11) NOT NULL,
  `no_surat` varchar(50) NOT NULL,
  `tgl_terbit` date NOT NULL,
  `tgl_kadaluwarsa` date NOT NULL,
  `catatan` varchar(100) NOT NULL,
  `upload_surat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_surat`
--

INSERT INTO `tb_surat` (`id_surat`, `id_kp`, `no_surat`, `tgl_terbit`, `tgl_kadaluwarsa`, `catatan`, `upload_surat`) VALUES
(11, 0, '028/SPKPI/DKP/IV/2019', '2020-01-02', '2020-01-02', '-', '200715123622.jpg'),
(12, 0, '029/SPKPI/DKP/IV/2019', '2020-01-02', '2020-01-02', '-', '200715123622.jpg'),
(13, 0, '028/SPKPI/DKP/IV/2019', '2020-01-05', '2020-01-05', '-', '200715123622.jpg'),
(14, 0, '029/SPKPI/DKP/IV/2019', '2020-01-05', '2020-01-05', '-', '200715123622.jpg'),
(15, 18, '001/SPKPI/DKP/IV/2020', '2020-06-26', '2020-06-26', 'Segera dicek', ''),
(16, 20, '045/SPKPI/DKP/IV/2020', '2020-07-03', '2020-08-06', '', '200716053436.jpg'),
(17, 21, 'bb/3654/pkl/0240', '2020-07-04', '2020-07-04', '-', ''),
(18, 22, 'bb/3654/pkl/0250', '2020-07-05', '2020-07-05', '', ''),
(19, 24, '076/SPKPI/DKP/X/2020', '2020-07-08', '2020-07-08', '-', '200716033247.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_surat_perizinan`
--

CREATE TABLE `tb_surat_perizinan` (
  `id` int(11) NOT NULL,
  `no_pas` varchar(25) NOT NULL,
  `no_surat` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'Kepala Dinas', 'dkpkotapekalongan@gmail.com', 'default.png', '$2y$10$jEIxuWNDPVo.rL1LHJRAZOiZ4.hRUdhPHginEUZGqRL4XgmdD04D2', 3, 1, 20191209),
(2, 'Dedi Hadi', 'dedi@yahoo.com', 'default.png', '$2y$10$wZIuYN.gsUsqNBXUWRSOeuSd65BCKMyPLg3F4h8F8oy0bzTtT3lS6', 1, 1, 20191201),
(4, 'Hendri Purwanto', 'hendrip@gmail.com', 'default.png', '', 1, 1, 2019),
(10, 'Admin', 'admindkp@gmail.com', 'default.png', '$2y$10$jEIxuWNDPVo.rL1LHJRAZOiZ4.hRUdhPHginEUZGqRL4XgmdD04D2', 1, 1, 1577333190),
(28, 'piyut', 'piyut.klasik@yahoo.com', 'default.png', '', 3, 0, 1577781999),
(30, 'Coba Test', 'wawanbatang93@gmail.com', 'default.png', '$2y$10$ww8OhcLZmIF9eoXT.6ypk.7sHjULbrA/uHxUxwK6X.9tOOcZOam62', 2, 1, 1577781999),
(36, 'coba cba', 'nurilmuslichin16@gmail.com', 'default.png', '$2y$10$WGZI9drNbIKmbyirD5oGquMELNXpKht3MYb0Nv6.gzYL1rbmt4hqm', 2, 0, 1594910432);

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
(32, 3, 5),
(44, 2, 6),
(50, 2, 4),
(53, 2, 2),
(54, 3, 2),
(56, 1, 2),
(57, 3, 7);

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
(4, 'Form'),
(5, 'Kadin'),
(6, 'Pemohon'),
(7, 'Home');

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
(1, 'Administrator'),
(2, 'Pemohon'),
(3, 'Kadin');

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
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-university ', 1),
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(3, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(7, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie\"', 1),
(8, 2, 'Change Password', 'user/changepassword', 'fas fa-fw fa-key', 1),
(9, 4, 'Form Pendaftaran', 'form/pendaftaran', 'fas fa-fw fa-pencil-alt', 1),
(10, 4, 'Data Yang Diajuan', 'form/pengajuan', 'far fa-fw fa-folder-open', 1),
(11, 5, 'Daftar Pengesahan', 'kadin/pengajuan', 'fas fa-fw fa-server', 1),
(12, 1, 'Daftar Pengajuan', 'admin/daftar', 'fas fa-fw fa-list-ul', 1),
(13, 1, 'Daftar Surat Perizinan Kapal', 'admin/surat', 'fas fa-fw fa-clipboard-list', 1),
(14, 6, 'Identitas Member', 'member', 'fas fa-fw fa-key', 1),
(15, 1, 'Daftar User', 'admin/daftar_user', 'fas fa-fw fa-key', 1),
(16, 1, 'Daftar Pemohon', 'admin/daftar_pemohon', 'fas fa-fw fa-clipboard-list', 1),
(17, 7, 'Dashboard', 'home', 'fas fa-fw fa-university', 1);

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
(23, 'piyut.klasik@yahoo.com', 'IJuBr7kN7PHJBPwQkh+ELjPVlx5lVO27XSjElJYjrcA=', 1577781999),
(24, 'wawanbatang93@gmail.com', 'T/pbz9Rj3wT9eQ69oT4x2WVLeD7PwsfC1g1iMXjB1Uo=', 1594104179),
(25, 'nurilmuslichin16@gmail.com', 'p7MFTBVrYBTzoqhUSxRGmn9AZzLna+YSllmAnxPvOhc=', 1594909350),
(26, 'nurilmuslichin16@gmail.com', 'K7NWCne/cvezlZ7Pk45baDZFUOA9YOO9NeyUzDVbMj4=', 1594909654),
(27, 'nurilmuslichin16@gmail.com', 'bQkoWAwFBbHlQkSPrX3ezUYxh9TY2frAvggvWdnR9eg=', 1594909800),
(28, 'nurilmuslichin16@gmail.com', 'y7epUYbsWpRvCjGiGll2AelTY3KAYovCLoG6ZQVT5A4=', 1594909894),
(29, 'nurilmuslichin16@gmail.com', 'DCeksG7vLLHUzxp8sh5AFypUeAhaifXZwKWrkOpVFTw=', 1594909946),
(30, 'nurilmuslichin16@gmail.com', 'Drm1Q1LrQNOwvYNtICNIZYZV1U4MsuQkz73HY2gNUSM=', 1594910432),
(31, 'wawanbatang93@gmail.com', 'gd/Ue4oKkJI0o9U5+Srd28+NR/decKudVyAgli3WYz8=', 1594910476),
(32, 'wawanbatang93@gmail.com', 'uhvrP9LA9GImR74hTEvaBio9AVUcF7EkdxR8w5chSAo=', 1594910896),
(33, 'wawanbatang93@gmail.com', 'MYHkM3KrVsQ8PzWUtjG3l/w/TnVtfeP690w51+EsL/Y=', 1594911029),
(34, 'wawanbatang93@gmail.com', 'BoXTyU0r49P65iYqXq1+Q7VOxGFiNN3XkrHzJws+8Y0=', 1594913406),
(35, 'wawanbatang93@gmail.com', 'F2DF0RrYnFnoTtnZ+/j83tTfnpW8dI6DNfos6mldEis=', 1594913474);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_identitas_pemilik`
--
ALTER TABLE `tb_identitas_pemilik`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_kapal`
--
ALTER TABLE `tb_kapal`
  ADD PRIMARY KEY (`id_kp`);

--
-- Indeks untuk tabel `tb_surat`
--
ALTER TABLE `tb_surat`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indeks untuk tabel `tb_surat_perizinan`
--
ALTER TABLE `tb_surat_perizinan`
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
-- AUTO_INCREMENT untuk tabel `tb_identitas_pemilik`
--
ALTER TABLE `tb_identitas_pemilik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `tb_kapal`
--
ALTER TABLE `tb_kapal`
  MODIFY `id_kp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `tb_surat`
--
ALTER TABLE `tb_surat`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
