-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2022 at 10:05 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siap`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(128) NOT NULL,
  `user_admin` varchar(128) NOT NULL,
  `password_admin` varchar(128) NOT NULL,
  `hak_akses` int(1) NOT NULL,
  `divisi_admin` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `user_admin`, `password_admin`, `hak_akses`, `divisi_admin`) VALUES
(1, 'Al Halim Mubarak', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 'Administrator'),
(2, 'Kadiv1', 'divisi1', '07b6032a1b3364853632d82981e19087', 2, 'Divisi Database Dan Sistem Terintegrasi'),
(3, 'Kadiv2', 'divisi2', '622e5a970020602fa4fcaf62312f991f', 3, 'Divisi Infrastruktur Dan Jaringan'),
(4, 'Kadiv3', 'divisi3', '56c83df6b6e395a78fefb20717544cb4', 4, 'Divisi Layanan TI Dan Administrasi Umum'),
(8, 'Amria Rendy Desbintra S.Kom MTA', 'amriarendy', '3df0d6f9caf37e8952b0b9a392bcfb6e', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `dom_ojs`
--

CREATE TABLE `dom_ojs` (
  `id_dom_ojs` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `name_admin` varchar(128) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name_user` varchar(128) NOT NULL,
  `layanan_id` varchar(128) NOT NULL,
  `akses_id` varchar(128) NOT NULL,
  `time_stamp_dom_ojs` varchar(128) NOT NULL,
  `status_dom_ojs` varchar(128) NOT NULL,
  `title_dom_ojs` varchar(128) NOT NULL,
  `desc_dom_ojs` varchar(128) NOT NULL,
  `file_dom_ojs` varchar(128) NOT NULL,
  `berkas_dom_ojs` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dom_web`
--

CREATE TABLE `dom_web` (
  `id_dom_web` int(11) NOT NULL,
  `admin_id` varchar(128) NOT NULL,
  `name_admin` varchar(128) NOT NULL,
  `user_id` varchar(128) NOT NULL,
  `name_user` varchar(128) NOT NULL,
  `layanan_id` varchar(128) NOT NULL,
  `akses_id` varchar(128) NOT NULL,
  `time_stamp_dom_web` varchar(128) NOT NULL,
  `status_dom_web` varchar(128) NOT NULL,
  `title_dom_web` varchar(128) NOT NULL,
  `desc_dom_web` varchar(128) NOT NULL,
  `file_dom_web` varchar(128) NOT NULL,
  `berkas_dom_web` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dos_dikti`
--

CREATE TABLE `dos_dikti` (
  `id_dos_dikti` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `name_admin` varchar(128) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name_user` varchar(128) NOT NULL,
  `layanan_id` varchar(128) NOT NULL,
  `akses_id` varchar(128) NOT NULL,
  `time_stamp_dos_dikti` varchar(128) NOT NULL,
  `status_dos_dikti` varchar(128) NOT NULL,
  `title_dos_dikti` varchar(128) NOT NULL,
  `desc_dos_dikti` text NOT NULL,
  `file_dos_dikti` varchar(128) NOT NULL,
  `berkas_dos_dikti` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hak_akses`
--

CREATE TABLE `hak_akses` (
  `id_akses` int(11) NOT NULL,
  `keterangan_akses` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hak_akses`
--

INSERT INTO `hak_akses` (`id_akses`, `keterangan_akses`) VALUES
(1, 'Admin'),
(2, 'Divisi Database Dan Sistem Terintegrasi'),
(3, 'Divisi Infrastruktur Dan Jaringan'),
(4, 'Divisi Layanan TI Dan Administrasi Umum');

-- --------------------------------------------------------

--
-- Table structure for table `hak_layanan`
--

CREATE TABLE `hak_layanan` (
  `id_layanan` int(11) NOT NULL,
  `keterangan_layanan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hak_layanan`
--

INSERT INTO `hak_layanan` (`id_layanan`, `keterangan_layanan`) VALUES
(1, 'Dosen'),
(2, 'Mahasiswa'),
(3, 'Publik');

-- --------------------------------------------------------

--
-- Table structure for table `homdos_ex`
--

CREATE TABLE `homdos_ex` (
  `id_homdos_ex` int(11) NOT NULL,
  `admin_id` varchar(128) NOT NULL,
  `name_admin` varchar(128) NOT NULL,
  `user_id` varchar(128) NOT NULL,
  `name_user` varchar(128) NOT NULL,
  `layanan_id` varchar(128) NOT NULL,
  `akses_id` varchar(128) NOT NULL,
  `time_stamp_homdos_ex` varchar(128) NOT NULL,
  `status_homdos_ex` varchar(128) NOT NULL,
  `title_homdos_ex` varchar(128) NOT NULL,
  `desc_homdos_ex` varchar(128) NOT NULL,
  `file_homdos_ex` varchar(128) NOT NULL,
  `berkas_homdos_ex` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `homdos_in`
--

CREATE TABLE `homdos_in` (
  `id_homdos_in` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `name_admin` varchar(128) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name_user` varchar(128) NOT NULL,
  `layanan_id` varchar(128) NOT NULL,
  `akses_id` varchar(128) NOT NULL,
  `time_stamp_homdos_in` varchar(128) NOT NULL,
  `status_homdos_in` varchar(128) NOT NULL,
  `title_homdos_in` varchar(128) NOT NULL,
  `desc_homdos_in` text NOT NULL,
  `file_homdos_in` varchar(128) NOT NULL,
  `berkas_homdos_in` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `jaringan_net`
--

CREATE TABLE `jaringan_net` (
  `id_jaringan_net` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `name_admin` varchar(128) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name_user` varchar(128) NOT NULL,
  `layanan_id` varchar(128) NOT NULL,
  `akses_id` varchar(128) NOT NULL,
  `time_stamp_jaringan_net` varchar(128) NOT NULL,
  `status_jaringan_net` varchar(128) NOT NULL,
  `title_jaringan_net` varchar(128) NOT NULL,
  `desc_jaringan_net` varchar(128) NOT NULL,
  `file_jaringan_net` varchar(128) NOT NULL,
  `berkas_jaringan_net` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `labor`
--

CREATE TABLE `labor` (
  `id_labor` int(11) NOT NULL,
  `admin_id` varchar(128) NOT NULL,
  `name_admin` varchar(128) NOT NULL,
  `user_id` varchar(128) NOT NULL,
  `name_user` varchar(128) NOT NULL,
  `layanan_id` varchar(128) NOT NULL,
  `akses_id` varchar(128) NOT NULL,
  `time_stamp_labor` varchar(128) NOT NULL,
  `status_labor` varchar(128) NOT NULL,
  `title_labor` varchar(128) NOT NULL,
  `desc_labor` varchar(128) NOT NULL,
  `file_labor` varchar(128) NOT NULL,
  `berkas_labor` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `layanan_email_institusi`
--

CREATE TABLE `layanan_email_institusi` (
  `id_lei` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `name_admin` varchar(128) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name_user` varchar(128) NOT NULL,
  `layanan_id` varchar(128) NOT NULL,
  `nama_layanan` varchar(128) NOT NULL,
  `akses_id` varchar(128) NOT NULL,
  `nama_akses` varchar(128) NOT NULL,
  `time_stamp_lei` varchar(128) NOT NULL,
  `status_lei` varchar(128) NOT NULL,
  `title_lei` varchar(128) NOT NULL,
  `desc_lei` text NOT NULL,
  `file_lei` varchar(128) NOT NULL,
  `berkas_lei` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `main_ojs`
--

CREATE TABLE `main_ojs` (
  `id_main_ojs` int(11) NOT NULL,
  `admin_id` int(128) NOT NULL,
  `name_admin` varchar(128) NOT NULL,
  `user_id` int(128) NOT NULL,
  `name_user` varchar(128) NOT NULL,
  `layanan_id` varchar(128) NOT NULL,
  `akses_id` varchar(128) NOT NULL,
  `time_stamp_main_ojs` varchar(128) NOT NULL,
  `status_main_ojs` varchar(128) NOT NULL,
  `title_main_ojs` varchar(128) NOT NULL,
  `desc_main_ojs` varchar(128) NOT NULL,
  `file_main_ojs` varchar(128) NOT NULL,
  `berkas_main_ojs` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mhs_dikti`
--

CREATE TABLE `mhs_dikti` (
  `id_mhs_dikti` int(11) NOT NULL,
  `admin_id` int(128) NOT NULL,
  `name_admin` varchar(128) NOT NULL,
  `user_id` int(128) NOT NULL,
  `name_user` varchar(128) NOT NULL,
  `layanan_id` varchar(128) NOT NULL,
  `akses_id` varchar(128) NOT NULL,
  `time_stamp_mhs_dikti` varchar(128) NOT NULL,
  `status_mhs_dikti` varchar(128) NOT NULL,
  `title_mhs_dikti` varchar(128) NOT NULL,
  `desc_mhs_dikti` varchar(128) NOT NULL,
  `file_mhs_dikti` varchar(128) NOT NULL,
  `berkas_mhs_dikti` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `nidk`
--

CREATE TABLE `nidk` (
  `id_nidk` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `name_admin` varchar(128) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name_user` varchar(128) NOT NULL,
  `layanan_id` varchar(128) NOT NULL,
  `akses_id` varchar(128) NOT NULL,
  `time_stamp_nidk` varchar(128) NOT NULL,
  `status_nidk` varchar(128) NOT NULL,
  `title_nidk` varchar(128) NOT NULL,
  `desc_nidk` text NOT NULL,
  `file_nidk` varchar(128) NOT NULL,
  `berkas_nidk` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `nidn`
--

CREATE TABLE `nidn` (
  `id_nidn` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `name_admin` varchar(128) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name_user` varchar(128) NOT NULL,
  `layanan_id` varchar(128) NOT NULL,
  `akses_id` varchar(128) NOT NULL,
  `time_stamp_nidn` varchar(128) NOT NULL,
  `status_nidn` varchar(128) NOT NULL,
  `title_nidn` text NOT NULL,
  `desc_nidn` text NOT NULL,
  `file_nidn` varchar(128) NOT NULL,
  `berkas_nidn` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `nup`
--

CREATE TABLE `nup` (
  `id_nup` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `name_admin` varchar(128) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name_user` varchar(128) NOT NULL,
  `layanan_id` varchar(128) NOT NULL,
  `akses_id` varchar(128) NOT NULL,
  `time_stamp_nup` varchar(128) NOT NULL,
  `status_nup` varchar(128) NOT NULL,
  `title_nup` varchar(128) NOT NULL,
  `desc_nup` text NOT NULL,
  `file_nup` varchar(128) NOT NULL,
  `berkas_nup` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name_user` varchar(128) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `name_admin` varchar(128) NOT NULL,
  `desc_pesan` text NOT NULL,
  `date_pesan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sewa_labor`
--

CREATE TABLE `sewa_labor` (
  `id_sewa_labor` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `name_admin` varchar(128) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name_user` varchar(128) NOT NULL,
  `layanan_id` varchar(128) NOT NULL,
  `akses_id` varchar(128) NOT NULL,
  `time_stamp_sewa_labor` varchar(128) NOT NULL,
  `status_sewa_labor` varchar(128) NOT NULL,
  `title_sewa_labor` varchar(128) NOT NULL,
  `desc_sewa_labor` varchar(128) NOT NULL,
  `file_sewa_labor` varchar(128) NOT NULL,
  `berkas_sewa_labor` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ujian_ti`
--

CREATE TABLE `ujian_ti` (
  `id_ujian_ti` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `name_admin` varchar(128) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name_user` varchar(128) NOT NULL,
  `layanan_id` varchar(128) NOT NULL,
  `akses_id` varchar(128) NOT NULL,
  `time_stamp_ujian_ti` varchar(128) NOT NULL,
  `status_ujian_ti` varchar(128) NOT NULL,
  `title_ujian_ti` varchar(128) NOT NULL,
  `desc_ujian_ti` varchar(128) NOT NULL,
  `file_ujian_ti` varchar(128) NOT NULL,
  `berkas_ujian_ti` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name_user` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `telp` varchar(10) NOT NULL,
  `nidn` varchar(128) NOT NULL,
  `nip` varchar(128) NOT NULL,
  `jenis_dosen` varchar(128) NOT NULL,
  `unit_kerja` varchar(128) NOT NULL,
  `berkas` varchar(128) NOT NULL,
  `nim` varchar(128) NOT NULL,
  `prodi` varchar(128) NOT NULL,
  `semester` varchar(128) NOT NULL,
  `ktm` varchar(128) NOT NULL,
  `no_ktp` varchar(128) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `pekerjaan` varchar(128) NOT NULL,
  `instansi` varchar(128) NOT NULL,
  `tgl_lahir` varchar(128) NOT NULL,
  `hak_layanan` int(1) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_active` int(1) NOT NULL,
  `cek_actived` int(1) NOT NULL,
  `notice` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name_user`, `username`, `password`, `image`, `telp`, `nidn`, `nip`, `jenis_dosen`, `unit_kerja`, `berkas`, `nim`, `prodi`, `semester`, `ktm`, `no_ktp`, `alamat`, `pekerjaan`, `instansi`, `tgl_lahir`, `hak_layanan`, `date_created`, `is_active`, `cek_actived`, `notice`) VALUES
(1, 'goican', 'goican.id@gmail.com', '$2y$10$7na.ZB2MQyKWWlbhd7TX4Ox1Kjz0FZa1yfrY5scQ7odww8V4YdTPK', '3968614.jpg', '1233422343', '2313216556', '123456', 'Dosen Kontrak', 'PTIPD', '453357-PF6ZC6-63.jpg', '', '', '', '', '11111111', 'ndksnlsnlk', 'Dosen', 'Universitas Goican', '2022-05-29', 1, '2022-05-29 07:58:18', 1, 1, ''),
(2, 'goican', 'goican.id@goican.com', '$2y$10$hzXDvBl50nOsG79c9bpfDeXJYD7A0p9o9IEoPoZpQvgOrFWnfa1cm', 'WhatsApp_Image_2022-05-14_at_2_25_11_AM.jpeg', '123342', '', '', '', '', 'v982-d4-01.jpg', 'sdfds', 'SainsTek', 'Semester 1 Ganjil', '1111', '11111111', 'Jambi, Jambi', 'Dosen', '', '2022-05-29', 2, '2022-05-29 08:00:12', 1, 1, ''),
(3, 'pubi', 'pbul@gmail.com', '$2y$10$wn3TXvKvXcVVIJ./XFewrOY1VqGg.ohF33GKAWW8VLptdwEeVZ7Hm', 'kartu-belakang2.jpg', '15', '', '', '', '', '', '', '', '', '', '96485', 'bbjnk', 'iomk', 'jnik', '2022-05-29', 3, '2022-05-29 08:03:35', 1, 1, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `dom_ojs`
--
ALTER TABLE `dom_ojs`
  ADD PRIMARY KEY (`id_dom_ojs`);

--
-- Indexes for table `dom_web`
--
ALTER TABLE `dom_web`
  ADD PRIMARY KEY (`id_dom_web`);

--
-- Indexes for table `dos_dikti`
--
ALTER TABLE `dos_dikti`
  ADD PRIMARY KEY (`id_dos_dikti`);

--
-- Indexes for table `hak_akses`
--
ALTER TABLE `hak_akses`
  ADD PRIMARY KEY (`id_akses`);

--
-- Indexes for table `hak_layanan`
--
ALTER TABLE `hak_layanan`
  ADD PRIMARY KEY (`id_layanan`);

--
-- Indexes for table `homdos_ex`
--
ALTER TABLE `homdos_ex`
  ADD PRIMARY KEY (`id_homdos_ex`);

--
-- Indexes for table `homdos_in`
--
ALTER TABLE `homdos_in`
  ADD PRIMARY KEY (`id_homdos_in`);

--
-- Indexes for table `jaringan_net`
--
ALTER TABLE `jaringan_net`
  ADD PRIMARY KEY (`id_jaringan_net`);

--
-- Indexes for table `labor`
--
ALTER TABLE `labor`
  ADD PRIMARY KEY (`id_labor`);

--
-- Indexes for table `layanan_email_institusi`
--
ALTER TABLE `layanan_email_institusi`
  ADD PRIMARY KEY (`id_lei`);

--
-- Indexes for table `main_ojs`
--
ALTER TABLE `main_ojs`
  ADD PRIMARY KEY (`id_main_ojs`);

--
-- Indexes for table `mhs_dikti`
--
ALTER TABLE `mhs_dikti`
  ADD PRIMARY KEY (`id_mhs_dikti`);

--
-- Indexes for table `nidk`
--
ALTER TABLE `nidk`
  ADD PRIMARY KEY (`id_nidk`);

--
-- Indexes for table `nidn`
--
ALTER TABLE `nidn`
  ADD PRIMARY KEY (`id_nidn`);

--
-- Indexes for table `nup`
--
ALTER TABLE `nup`
  ADD PRIMARY KEY (`id_nup`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `sewa_labor`
--
ALTER TABLE `sewa_labor`
  ADD PRIMARY KEY (`id_sewa_labor`);

--
-- Indexes for table `ujian_ti`
--
ALTER TABLE `ujian_ti`
  ADD PRIMARY KEY (`id_ujian_ti`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `dom_ojs`
--
ALTER TABLE `dom_ojs`
  MODIFY `id_dom_ojs` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dom_web`
--
ALTER TABLE `dom_web`
  MODIFY `id_dom_web` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dos_dikti`
--
ALTER TABLE `dos_dikti`
  MODIFY `id_dos_dikti` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hak_akses`
--
ALTER TABLE `hak_akses`
  MODIFY `id_akses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hak_layanan`
--
ALTER TABLE `hak_layanan`
  MODIFY `id_layanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `homdos_ex`
--
ALTER TABLE `homdos_ex`
  MODIFY `id_homdos_ex` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `homdos_in`
--
ALTER TABLE `homdos_in`
  MODIFY `id_homdos_in` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jaringan_net`
--
ALTER TABLE `jaringan_net`
  MODIFY `id_jaringan_net` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `labor`
--
ALTER TABLE `labor`
  MODIFY `id_labor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `layanan_email_institusi`
--
ALTER TABLE `layanan_email_institusi`
  MODIFY `id_lei` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `main_ojs`
--
ALTER TABLE `main_ojs`
  MODIFY `id_main_ojs` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mhs_dikti`
--
ALTER TABLE `mhs_dikti`
  MODIFY `id_mhs_dikti` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nidk`
--
ALTER TABLE `nidk`
  MODIFY `id_nidk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nidn`
--
ALTER TABLE `nidn`
  MODIFY `id_nidn` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nup`
--
ALTER TABLE `nup`
  MODIFY `id_nup` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sewa_labor`
--
ALTER TABLE `sewa_labor`
  MODIFY `id_sewa_labor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ujian_ti`
--
ALTER TABLE `ujian_ti`
  MODIFY `id_ujian_ti` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
