-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2024 at 06:31 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecanteen`
--

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `kode_invoice` varchar(20) NOT NULL,
  `id_user` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `catatan` text NOT NULL,
  `tgl_dikeluarkan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`kode_invoice`, `id_user`, `total`, `catatan`, `tgl_dikeluarkan`) VALUES
('INV3140820240625', 3, 39000, 'fsfsf', '2024-08-14 04:25:28');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `idmenu` int(11) NOT NULL,
  `qtty` int(11) NOT NULL,
  `keterangan` enum('keranjang','cekout','selesai') NOT NULL DEFAULT 'keranjang',
  `kode_invoice` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`id_keranjang`, `id_member`, `idmenu`, `qtty`, `keterangan`, `kode_invoice`) VALUES
(1, 3, 6, 3, 'cekout', 'INV3140820240625');

-- --------------------------------------------------------

--
-- Table structure for table `letak`
--

CREATE TABLE `letak` (
  `kode_letak` char(4) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `stat` enum('Tersedia','Ditempati') NOT NULL DEFAULT 'Tersedia'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `letak`
--

INSERT INTO `letak` (`kode_letak`, `keterangan`, `stat`) VALUES
('L101', 'Lt. 1 No. 1', 'Ditempati'),
('L103', 'Lt. 1 No. 3', 'Tersedia'),
('LG01', 'Lt. Dasar No. 1', 'Ditempati'),
('LG02', 'Lt. Dasar No. 2', 'Tersedia'),
('LG03', 'Lt. Dasar No. 3', 'Tersedia'),
('LG04', 'Lt. Dasar No. 4', 'Tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id_member` int(11) NOT NULL,
  `nama_lengkap` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` enum('laki-laki','perempuan') DEFAULT NULL,
  `alamat` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id_member`, `nama_lengkap`, `email`, `gender`, `alamat`) VALUES
(1, 'Administrator', 'admin@admin', 'laki-laki', 'Kantin IT-PLN'),
(2, 'siti maesaroh', 'siti@siti', NULL, NULL),
(3, 'tes', 'tes@email.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `idmenu` int(11) NOT NULL,
  `id_warung` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `harga` int(11) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `kategori` enum('makanan','minuman','combo') NOT NULL,
  `stock` enum('Tersedia','Habis') NOT NULL DEFAULT 'Tersedia'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`idmenu`, `id_warung`, `nama`, `harga`, `gambar`, `kategori`, `stock`) VALUES
(1, 1, 'RIsol Daging', 5000, 'mkn_RIsol_Daging_053714.jpg', 'makanan', 'Tersedia'),
(2, 1, 'empek empek', 5000, 'mkn_empek_empek_053753.jpg', 'makanan', 'Tersedia'),
(3, 1, 'air mineral', 5000, 'mnm_air_mineral_054142.jpg', 'minuman', 'Tersedia'),
(4, 1, 'Mizone 600ml', 6000, 'mnm_Mizone_600ml_054332.jpg', 'minuman', 'Tersedia'),
(5, 2, 'Soto Ayam', 12000, 'mkn_Soto_Ayam_060053.jpg', 'makanan', 'Tersedia'),
(6, 2, 'Soto Daging', 13000, 'mkn_Soto_Daging_060202.jpg', 'makanan', 'Tersedia'),
(7, 2, 'Ayam Bakar', 15000, 'mkn_Ayam_Bakar_060306.jpg', 'makanan', 'Habis'),
(8, 2, 'Nasi Goreng Spesial', 15000, '_Sun_06_09_07.jpg', 'makanan', 'Habis'),
(9, 2, 'Es Teh Manis', 5000, 'mnm_Es_Teh_Manis_061016.jpg', 'minuman', 'Tersedia'),
(10, 2, 'Chocolatos Dingin', 5000, 'mnm_Chocolatos_Dingin_061721.jpg', 'minuman', 'Tersedia'),
(11, 2, 'Air Le Minerale', 5000, '2mnm062606.jpg', 'minuman', 'Habis');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `idpemesanan` int(11) NOT NULL,
  `idmenu` int(11) NOT NULL,
  `idpembeli` varchar(9) NOT NULL,
  `idwarung` varchar(9) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `idpendaftaran` int(11) NOT NULL,
  `idmember` int(11) NOT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `namawarung` varchar(50) NOT NULL,
  `lamasewa` int(11) DEFAULT NULL,
  `letak` char(4) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_member` int(11) NOT NULL,
  `password` varchar(32) NOT NULL,
  `ket` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_member`, `password`, `ket`) VALUES
(1, '21232f297a57a5a743894a0e4a801fc3', 3),
(2, 'db04eb4b07e0aaf8d1d477ae342bdff9', 2),
(3, '5f4dcc3b5aa765d61d8327deb882cf99', 1);

-- --------------------------------------------------------

--
-- Table structure for table `warung`
--

CREATE TABLE `warung` (
  `idwarung` int(11) NOT NULL,
  `pemilik` int(11) NOT NULL,
  `no_hp` varchar(14) NOT NULL,
  `nama_warung` varchar(30) NOT NULL,
  `lama_sewa` int(11) NOT NULL,
  `letak` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `warung`
--

INSERT INTO `warung` (`idwarung`, `pemilik`, `no_hp`, `nama_warung`, `lama_sewa`, `letak`) VALUES
(1, 1, '08123456646', 'Koperasi IT-PLN', 5, 'L101'),
(2, 2, '081214242152', 'Warnas Bu siti saudara', 3, 'LG01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`kode_invoice`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`),
  ADD KEY `fk_mbkr` (`id_member`);

--
-- Indexes for table `letak`
--
ALTER TABLE `letak`
  ADD PRIMARY KEY (`kode_letak`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`idmenu`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`idpemesanan`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`idpendaftaran`),
  ADD KEY `fk_letak` (`letak`),
  ADD KEY `fk_pkmb` (`idmember`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `warung`
--
ALTER TABLE `warung`
  ADD PRIMARY KEY (`idwarung`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `idmenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `idpemesanan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `idpendaftaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `warung`
--
ALTER TABLE `warung`
  MODIFY `idwarung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `fk_mbkr` FOREIGN KEY (`id_member`) REFERENCES `member` (`id_member`);

--
-- Constraints for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD CONSTRAINT `fk_letak` FOREIGN KEY (`letak`) REFERENCES `letak` (`kode_letak`),
  ADD CONSTRAINT `fk_pkmb` FOREIGN KEY (`idmember`) REFERENCES `member` (`id_member`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_um` FOREIGN KEY (`id_member`) REFERENCES `member` (`id_member`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
