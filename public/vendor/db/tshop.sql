-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2023 at 07:06 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_lengkap`) VALUES
(1, 'admin', 'rendi', 'Muhammad Rendi');

-- --------------------------------------------------------

--
-- Table structure for table `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(5) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `nama_kota`, `tarif`) VALUES
(1, 'Surabaya', 20000),
(2, 'Malang', 30000),
(3, 'Jember', 15000);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `email_pelanggan` varchar(100) NOT NULL,
  `password_pelanggan` varchar(50) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `telepon_pelanggan` varchar(25) NOT NULL,
  `alamat_pelanggan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `email_pelanggan`, `password_pelanggan`, `nama_pelanggan`, `telepon_pelanggan`, `alamat_pelanggan`) VALUES
(10, 'rendi@gmail.com', '123', 'Muhammad Rendi Adriansyah', '089512690998', 'DS. KRAJAN, KEC. WONGSOREJO, BANYUWAANGI');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_ongkir` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL,
  `alamt_pengiriman` text NOT NULL,
  `alamat_pengirim` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `subberat` int(11) NOT NULL,
  `subharga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `id_produk`, `jumlah`, `nama`, `harga`, `berat`, `subberat`, `subharga`) VALUES
(1, 1, 2, 3, '', 0, 0, 0, 0),
(2, 1, 2, 2, '', 0, 0, 0, 0),
(3, 0, 4, 2, '', 0, 0, 0, 0),
(4, 7, 4, 2, '', 0, 0, 0, 0),
(5, 8, 4, 2, '', 0, 0, 0, 0),
(6, 9, 4, 2, '', 0, 0, 0, 0),
(7, 10, 5, 1, '', 0, 0, 0, 0),
(8, 10, 4, 1, '', 0, 0, 0, 0),
(9, 13, 5, 1, '', 0, 0, 0, 0),
(10, 13, 6, 1, '', 0, 0, 0, 0),
(11, 14, 4, 1, '', 0, 0, 0, 0),
(12, 14, 5, 1, '', 0, 0, 0, 0),
(13, 17, 4, 1, '', 0, 0, 0, 0),
(14, 51, 13, 1, 'Nisekoi Roku', 1200000, 100, 100, 1200000),
(15, 52, 14, 1, 'Nisekoi BlackTiger', 120000, 100, 100, 120000),
(16, 53, 15, 1, 'Hotpants Pria - Hitam', 20000, 250, 250, 20000),
(17, 53, 17, 1, 'No Pippen Tippin Tree', 300000, 200, 200, 300000),
(18, 54, 15, 1, 'Hotpants Pria - Hitam', 20000, 250, 250, 20000),
(19, 54, 16, 1, 'Boxing Gloves Hook Fight Gear - Merah', 620000, 300, 300, 620000),
(20, 54, 18, 1, 'Common Goods Short Sleeve Oversize T-Shirts - Black (Hitam)', 99000, 200, 200, 99000),
(21, 55, 15, 1, 'Hotpants Pria - Hitam', 20000, 250, 250, 20000),
(22, 56, 15, 1, 'Hotpants Pria - Hitam', 20000, 250, 250, 20000),
(23, 57, 16, 2, 'Boxing Gloves Hook Fight Gear - Merah', 620000, 300, 600, 1240000),
(24, 57, 15, 1, 'Hotpants Pria - Hitam', 20000, 250, 250, 20000),
(25, 58, 20, 1, 'Bergo Sport SIZE M | Bergo pet tebal | Bergo pet lebar', 20000, 150, 150, 20000),
(26, 58, 15, 1, 'Hotpants Pria - Hitam', 20000, 250, 250, 20000),
(27, 59, 16, 1, 'Boxing Gloves Hook Fight Gear - Merah', 620000, 300, 300, 620000),
(28, 60, 15, 1, 'Hotpants Pria - Hitam', 20000, 250, 250, 20000);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `berat_produk` int(11) NOT NULL,
  `foto_produk` varchar(100) NOT NULL,
  `deskripsi_produk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga_produk`, `berat_produk`, `foto_produk`, `deskripsi_produk`) VALUES
(15, 'Hotpants Pria - Hitam', 20000, 250, 'hotpants pria hitam.jpg', 'Bahan halus dan lembut, karet melar sempurna'),
(16, 'Boxing Gloves Hook Fight Gear - Merah', 620000, 300, 'boxing gloves.jpg', 'Material lebih kuat dari kulit sapi, gratis sarung tinju.	  '),
(17, 'No Pippen Tippin Tree', 300000, 200, 'no tippen pippen tree.webp', 'Keeping you fresh with this Oversized T-Shirt. The front and back featured with printed graphics that have a retro feel to give you that vintage look .'),
(18, 'Common Goods Short Sleeve Oversize T-Shirts - Black (Hitam)', 99000, 200, 'common goods black.jpg', 'Pewarnaan dari Cotton Common Goods sendiri sudah melewati proses washing dan memiliki sifat Reaktif, yang membuat pigmen warna pekat dan tidak mudah pudar. Terjamin tidak akan melunturkan bahan lainnya.'),
(19, 'Coco Trend Soul Jeans --Highwaist Cargo Celana Jeans Panjang Wanita', 160000, 300, 'coco trend.jpg', 'Material: cotton + polyester'),
(20, 'Bergo Sport SIZE M | Bergo pet tebal | Bergo pet lebar', 20000, 150, 'bergo.jpg', 'Material : Spandek Sutra Premium\r\nTidak menerawang, Bahan  lembut,halus, tidak membentuk lekuk tubuh, tidak licin, tidak budek di telinga, nyaman dan adem.  '),
(21, 'Helm Cakil Helm Retro M30 Bandit Mini moto Custom full face Hah Helmet', 250000, 500, 'helm cakil hitam.jpg', 'Helm Cakil Salah satu helm costum produk kami dengan menggunakan bahan dasar Fiber cat Metalic dengan kombinasi busa yang tebal dan dilapisi Kulit Sintetis \r\n'),
(22, 'KAOS/BAJU - KING NASSAR • bootleg concept tees', 175000, 200, 'kaos king nassar.jpg', 'Hasil sablonan di kasih garansi kalo ada masalah, hubungin adminnya aja.\r\nKaosnya adem kagak bikin gerah, soalnya pas bikin di bacain mantra.  ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
