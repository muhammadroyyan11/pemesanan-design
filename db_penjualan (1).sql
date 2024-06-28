-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 28, 2024 at 03:16 PM
-- Server version: 8.0.30
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_penjualan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_chat`
--

CREATE TABLE `tb_chat` (
  `id` int NOT NULL,
  `sender_id` int NOT NULL,
  `receiver_id` int NOT NULL,
  `message` text NOT NULL,
  `attachment_name` text NOT NULL,
  `file_ext` text NOT NULL,
  `mime_type` text NOT NULL,
  `message_date_time` text NOT NULL,
  `ip_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_chat`
--

INSERT INTO `tb_chat` (`id`, `sender_id`, `receiver_id`, `message`, `attachment_name`, `file_ext`, `mime_type`, `message_date_time`, `ip_address`) VALUES
(45, 4, 1, 'Haloo', '', '', '', '2024-06-27 01:16:46', '::1'),
(46, 1, 4, 'apa kabar', '', '', '', '2024-06-27 01:19:40', '::1'),
(47, 1, 4, 'woiik', '', '', '', '2024-06-27 01:19:47', '::1'),
(48, 4, 1, 'asd', '', '', '', '2024-06-27 01:22:20', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_foto_pembelian`
--

CREATE TABLE `tb_foto_pembelian` (
  `no` int NOT NULL,
  `foto_transaksi` text NOT NULL,
  `foto_desain_selesai` text NOT NULL,
  `foto_pengembalian` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_foto_pembelian`
--

INSERT INTO `tb_foto_pembelian` (`no`, `foto_transaksi`, `foto_desain_selesai`, `foto_pengembalian`) VALUES
(63, 'images/pembelian/foto_transaksi/63.jpg', 'images/pembelian/foto_desain_selesai/63.jpg', ''),
(64, 'images/pembelian/foto_transaksi/64.jpg', '', ''),
(65, 'images/pembelian/foto_transaksi/65.jpg', 'images/pembelian/foto_desain_selesai/65.jpg', ''),
(66, 'images/pembelian/foto_transaksi/66.jpg', '', ''),
(67, 'images/pembelian/foto_transaksi/67.jpg', 'images/pembelian/foto_desain_selesai/67.jpg', ''),
(68, 'images/pembelian/foto_transaksi/68.jpg', 'images/pembelian/foto_desain_selesai/68.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `no` int NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`no`, `nama`) VALUES
(1, 'Undangan'),
(2, 'Kartu Nama'),
(3, 'Spanduk');

-- --------------------------------------------------------

--
-- Table structure for table `tb_komen`
--

CREATE TABLE `tb_komen` (
  `no` int NOT NULL,
  `komen` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_komen`
--

INSERT INTO `tb_komen` (`no`, `komen`) VALUES
(10, '[{\"id_pembeli\":\"5\",\"id_pembelian\":\"21\",\"komen\":\"Barang diterima dengan keadaan baik\"}]'),
(11, '[{\"id_pembeli\":\"7\",\"id_pembelian\":\"29\",\"komen\":\"Bagus, Barang diterima dengan keadan bagus\"}]'),
(18, '[{\"id_pembeli\":\"7\",\"id_pembelian\":\"27\",\"komen\":\"desain bagussss\"}]'),
(19, '[{\"id_pembeli\":\"7\",\"id_pembelian\":\"31\",\"komen\":\"produk bagus\"}]'),
(20, '[{\"id_pembeli\":\"5\",\"id_pembelian\":\"20\",\"komen\":\"Barang diterima dengan keadaan baik\"},{\"id_pembeli\":\"7\",\"id_pembelian\":\"32\",\"komen\":\"produk bagus\"}]'),
(22, '[{\"id_pembeli\":\"7\",\"id_pembelian\":\"39\",\"komen\":\"bagus\"}]'),
(68, '[{\"id_pembeli\":\"4\",\"id_pembelian\":\"63\",\"komen\":\"asd\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `tb_komen_desain_sendiri`
--

CREATE TABLE `tb_komen_desain_sendiri` (
  `no` int NOT NULL,
  `komen` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembeli`
--

CREATE TABLE `tb_pembeli` (
  `id` int NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `no_telpon` varchar(13) NOT NULL,
  `alamat` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pembeli`
--

INSERT INTO `tb_pembeli` (`id`, `nama`, `email`, `no_telpon`, `alamat`) VALUES
(1, 'Adrianus Aransina Tukan', 'karauksii@gmail.com', '082293246583', 'Jln Bukit Indah, Soreang, Parepare'),
(2, 'Kicap', 'karauksii@gmail.com', '082293246583', 'Batu 3 1/2, Jalan Apas, Taman Good View, Tawau, Sabah'),
(3, 'yuni', 'yunimulti263@yahoo.co.id', '083435543667', 'Parepare'),
(4, 'uni', 'uni@yahoo.com', '082333234567', 'Parepare, Perumnas wekke\'e'),
(5, 'Hasmia', 'hasmiah@yahoo.co.id', '082556456456', 'parepare'),
(6, 'chica', 'chica@yahoo.co.id', '082456546543', 'sidrap'),
(7, 'ip', 'st249380@gmail.com', '085342033354', 'sidrap'),
(8, 'dilla', 'dillah95@gmail.com', '082567568457', 'wajo'),
(9, 'alam', 'alam123@yahoo.co.id', '082657546556', 'Parepare'),
(10, 'lina', 'lina@facebook', '084566676566', 'Parepare');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembelian`
--

CREATE TABLE `tb_pembelian` (
  `no` int NOT NULL,
  `desain` int NOT NULL,
  `kategori` int DEFAULT NULL,
  `id_pembeli` int NOT NULL,
  `id_produk` int DEFAULT NULL,
  `id_transaksi` int NOT NULL,
  `pembayaran` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `bukti_pelunasan` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `waktu_pembelian` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deadline` int DEFAULT NULL,
  `waktu_penerimaan` datetime DEFAULT NULL,
  `ket` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pembelian`
--

INSERT INTO `tb_pembelian` (`no`, `desain`, `kategori`, `id_pembeli`, `id_produk`, `id_transaksi`, `pembayaran`, `bukti_pelunasan`, `waktu_pembelian`, `deadline`, `waktu_penerimaan`, `ket`) VALUES
(63, 0, 1, 4, 68, 7, 'DP', '', '2024-06-26 01:15:00', 5, '2024-06-26 02:52:48', '{\"jumlah_kertas\":\"100\",\"pembayaran\":\"DP\",\"nama_pertama\":\"asdn\",\"ket_nama_pertama\":\"jnj\",\"nama_kedua\":\"ajsdhjk\",\"ket_nama_kedua\":\"jkashdjk\",\"tanggal\":\"2000-10-10\",\"akad\":\"asidju\",\"resepsi\":\"jkldjlk\",\"nama_ortu_pertama\":\"jdlk\",\"ket_ortu_pertama\":\"jdkl\",\"nama_ortu_kedua\":\"jdlk\",\"ket_ortu_kedua\":\"jdlkj\",\"nama_keluarga_mengundang\":\"dkl\",\"ket_keluarga_mengundang\":\"jlk\",\"penambahan_ket\":\"dj\"}'),
(64, 0, 1, 4, 68, 3, 'DP', '', '2024-06-26 01:15:00', 5, NULL, '{\"jumlah_kertas\":\"100\",\"pembayaran\":\"DP\",\"nama_pertama\":\"asdn\",\"ket_nama_pertama\":\"jnj\",\"nama_kedua\":\"ajsdhjk\",\"ket_nama_kedua\":\"jkashdjk\",\"tanggal\":\"2000-10-10\",\"akad\":\"asidju\",\"resepsi\":\"jkldjlk\",\"nama_ortu_pertama\":\"jdlk\",\"ket_ortu_pertama\":\"jdkl\",\"nama_ortu_kedua\":\"jdlk\",\"ket_ortu_kedua\":\"jdlkj\",\"nama_keluarga_mengundang\":\"dkl\",\"ket_keluarga_mengundang\":\"jlk\",\"penambahan_ket\":\"dj\"}'),
(65, 0, NULL, 4, 11, 7, 'DP', 'images/pembelian/foto_pelunasan/65.jpg', '2024-06-26 02:10:25', 5, '2024-06-26 04:16:08', '{\"panjang\":\"2.0\",\"lebar\":\"2.0\",\"jumlah_kertas\":\"100\",\"pembayaran\":\"DP\",\"nama\":\"as,dn\",\"tema\":\"nd\",\"tanggal\":\"2000-10-10\",\"waktu\":\"02:10\",\"alamat_data\":\"asd\",\"no_telpon\":\"84684654564\",\"media_sosial\":\"masd\",\"penambahan_ket\":\"asd\"}'),
(66, 0, NULL, 4, 13, 2, 'Lunas', NULL, '2024-06-26 02:54:14', 4, NULL, '{\"panjang\":\"2.2\",\"lebar\":\"2.2\",\"jumlah_kertas\":\"10\",\"pembayaran\":\"DP\",\"nama\":\"asd\",\"tema\":\"n\",\"tanggal\":\"2000-11-11\",\"waktu\":\"14:54\",\"alamat_data\":\"asd\",\"no_telpon\":\"lkj\",\"media_sosial\":\"kljdkl\",\"penambahan_ket\":\"jdl\"}'),
(67, 0, NULL, 4, 79, 6, 'DP', 'images/pembelian/foto_pelunasan/67.jpg', '2024-06-26 19:32:26', 4, NULL, '{\"jumlah_kertas\":\"10\",\"pembayaran\":\"DP\",\"nama_anak\":\"kjklj\",\"ket_anak\":\"lkjkl\",\"tanggal\":\"2000-11-11\",\"waktu\":\"13:01\",\"tempat\":\"khj\",\"nama_ortu\":\"lkkl\",\"ket_ortu\":\"jkl\",\"nama_keluarga_mengundang\":\"jkl\",\"ket_keluarga_mengundang\":\"jlkjl\",\"penambahan_ket\":\"lkjlkj\"}'),
(68, 0, NULL, 4, 79, 5, 'DP', 'images/pembelian/foto_pelunasan/68.jpg', '2024-06-26 20:49:56', 5, NULL, '{\"jumlah_kertas\":\"100\",\"pembayaran\":\"DP\",\"nama_anak\":\"kjklj\",\"ket_anak\":\"asd\",\"tanggal\":\"2000-10-10\",\"waktu\":\"20:49\",\"tempat\":\"khj\",\"nama_ortu\":\"lkkl\",\"ket_ortu\":\"jkl\",\"nama_keluarga_mengundang\":\"asd\",\"ket_keluarga_mengundang\":\"jdlkasjdlk\",\"penambahan_ket\":\"asd\"}');

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `no` int NOT NULL,
  `kategori` int NOT NULL,
  `tanggal_upload` date DEFAULT NULL,
  `keterangan` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`no`, `kategori`, `tanggal_upload`, `keterangan`) VALUES
(10, 3, '2020-04-16', '{\"harga\":\"4000\",\"img\":\"images\\/produk\\/10.jpg\"}'),
(11, 3, '2020-04-16', '{\"harga\":\"3000\",\"img\":\"images\\/produk\\/11.jpg\"}'),
(13, 3, '2020-04-16', '{\"harga\":\"3500\",\"img\":\"images\\/produk\\/13.jpg\"}'),
(16, 3, '2020-04-16', '{\"harga\":\"3000\",\"img\":\"images\\/produk\\/16.jpg\"}'),
(17, 3, '2020-04-16', '{\"harga\":\"2500\",\"img\":\"images\\/produk\\/17.jpg\"}'),
(18, 3, '2020-04-16', '{\"harga\":\"4000\",\"img\":\"images\\/produk\\/18.jpg\"}'),
(19, 3, '2020-04-16', '{\"harga\":\"4500\",\"img\":\"images\\/produk\\/19.jpg\"}'),
(20, 3, '2020-04-16', '{\"harga\":\"3500\",\"img\":\"images\\/produk\\/20.jpg\"}'),
(21, 3, '2020-04-16', '{\"harga\":\"3000\",\"img\":\"images\\/produk\\/21.jpg\"}'),
(22, 3, '2020-04-16', '{\"harga\":\"5000\",\"img\":\"images\\/produk\\/22.jpg\"}'),
(23, 3, '2020-04-16', '{\"harga\":\"3000\",\"img\":\"images\\/produk\\/23.jpg\"}'),
(24, 3, '2020-04-16', '{\"harga\":\"3500\",\"img\":\"images\\/produk\\/24.jpg\"}'),
(68, 1, NULL, '{\"undangan\":\"2\",\"harga\":\"3000\",\"img\":\"images\\/produk\\/68.jpg\"}'),
(69, 1, NULL, '{\"undangan\":\"2\",\"harga\":\"2500\",\"img\":\"images\\/produk\\/69.jpg\"}'),
(70, 1, NULL, '{\"undangan\":\"2\",\"harga\":\"2000\",\"img\":\"images\\/produk\\/70.jpg\"}'),
(71, 1, NULL, '{\"undangan\":\"2\",\"harga\":\"3000\",\"img\":\"images\\/produk\\/71.jpg\"}'),
(72, 1, NULL, '{\"undangan\":\"2\",\"harga\":\"3000\",\"img\":\"images\\/produk\\/72.jpg\"}'),
(73, 1, NULL, '{\"undangan\":\"2\",\"harga\":\"3000\",\"img\":\"images\\/produk\\/73.jpg\"}'),
(74, 1, NULL, '{\"undangan\":\"2\",\"harga\":\"2000\",\"img\":\"images\\/produk\\/74.jpg\"}'),
(75, 1, NULL, '{\"undangan\":\"1\",\"harga\":\"2000\",\"img\":\"images\\/produk\\/75.jpg\"}'),
(76, 1, NULL, '{\"undangan\":\"1\",\"harga\":\"1500\",\"img\":\"images\\/produk\\/76.jpg\"}'),
(77, 1, NULL, '{\"undangan\":\"1\",\"harga\":\"2000\",\"img\":\"images\\/produk\\/77.jpg\"}'),
(78, 1, NULL, '{\"undangan\":\"1\",\"harga\":\"2500\",\"img\":\"images\\/produk\\/78.jpg\"}'),
(79, 1, NULL, '{\"undangan\":\"1\",\"harga\":\"2000\",\"img\":\"images\\/produk\\/79.jpg\"}'),
(80, 1, NULL, '{\"undangan\":\"1\",\"harga\":\"2000\",\"img\":\"images\\/produk\\/80.jpg\"}'),
(81, 1, NULL, '{\"undangan\":\"1\",\"harga\":\"1500\",\"img\":\"images\\/produk\\/81.jpg\"}'),
(82, 1, NULL, '{\"undangan\":\"1\",\"harga\":\"1500\",\"img\":\"images\\/produk\\/82.jpg\"}'),
(83, 2, NULL, '{\"harga\":\"1000\",\"img\":\"images\\/produk\\/83.jpg\"}'),
(84, 2, NULL, '{\"harga\":\"1500\",\"img\":\"images\\/produk\\/84.jpg\"}'),
(85, 2, NULL, '{\"harga\":\"1500\",\"img\":\"images\\/produk\\/85.jpg\"}'),
(86, 2, NULL, '{\"harga\":\"1500\",\"img\":\"images\\/produk\\/86.jpg\"}'),
(87, 2, NULL, '{\"harga\":\"1500\",\"img\":\"images\\/produk\\/87.jpg\"}'),
(88, 2, NULL, '{\"harga\":\"1000\",\"img\":\"images\\/produk\\/88.jpg\"}'),
(89, 2, NULL, '{\"harga\":\"1500\",\"img\":\"images\\/produk\\/89.jpg\"}'),
(90, 2, NULL, '{\"harga\":\"1500\",\"img\":\"images\\/produk\\/90.jpg\"}'),
(91, 2, NULL, '{\"harga\":\"1000\",\"img\":\"images\\/produk\\/91.jpg\"}');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rekening`
--

CREATE TABLE `tb_rekening` (
  `no` int NOT NULL,
  `jenis_bank` varchar(50) NOT NULL,
  `nama_bank` varchar(255) NOT NULL,
  `nomor_bank` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_rekening`
--

INSERT INTO `tb_rekening` (`no`, `jenis_bank`, `nama_bank`, `nomor_bank`) VALUES
(1, 'BNI', 'Ida bagus yudha surya', '0453488897'),
(2, 'BRI', 'Ida bagus yudha surya', '001701011645531'),
(3, 'Bank Mandiri', 'Ida bagus yudha surya', '9000007396360'),
(4, 'BCA', 'Ida bagus yudha surya', '0402495829');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `no` int NOT NULL,
  `ket_user` varchar(100) NOT NULL,
  `ket_admin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`no`, `ket_user`, `ket_admin`) VALUES
(1, 'Belum Mengirim Bukti Pembayaran', 'Belum Mengirim Bukti Pembayaran'),
(2, 'Proses Pengesahan Bukti Pembayaran', 'Bukti Pembayaran Telah Dikirim / Menunggu Proses Pengesahan'),
(3, 'Pembayaran Disahkan / Sedang Dalam Proses Pembuatan Desain', 'Pembayaran Disahkan / Dalam Proses Pembuatan Desain'),
(4, 'Desain Selesai / Menunggu Pengesahan Dari Anda', 'Desain Selesai / Menunggu Pengesahan Dari Pembeli'),
(5, 'Desain Diterima / Menunggu Pencetakan Pesanan Desain Dari Tim Desain', 'Desain Diterima / Menunggu Pencetakan Pesanan Desain'),
(6, 'Cetakan Selesai / Pesanan Dapat Diambil', 'Pesanan Cetakan Akan Diambil / Menunggu Pengesahan Penerimaan Dari Pembeli'),
(7, 'Pesanan Diterima', 'Pesanan Diterima Pembeli'),
(8, 'Pesanan Diterima / Pengembalian Dalam Pengesahan', 'Pesanan Diterima / Pengesahan Detail Pengembalian Pembeli'),
(9, 'Pengesahan Pengembalian Diterima / Pesanan Gantian Sedang Dicetak', 'Pengesahan Pengembalian Diterima / Mencetak Pesanan Gantian'),
(10, 'Pesanan Gantian Dapat Diambil', 'Pesanan Gantian Diambil / Menunggu Pengesahan Penerimaan Dari Pembeli'),
(11, 'Pesanan Gantian Telah Diterima', 'Pesanan Gantian Telah Diterima Pembeli'),
(12, 'Desain Selesai / Menunggu Pelunasan Pengesahan Dari Pembeli', 'Desain Selesai / Menunggu Pelunasan Pengesahan Dari Admin'),
(13, 'Proses Pengesahan Bukti Pelunasan', 'Bukti Pembayaran Telah Dikirim / Menunggu Proses Pengesahan Bukti Pelunasan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `no` int NOT NULL,
  `id_user` int DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`no`, `id_user`, `username`, `password`, `level`) VALUES
(1, NULL, 'admin', 'admin', 1),
(2, 2, 'Kicap65832', 'Kicap65832', 2),
(4, 3, 'yuni36673', 'yuni36673', 2),
(5, 4, 'royyan', 'royyan', 2),
(6, 5, 'mia64', 'mia64', 2),
(7, 6, 'chica65', 'chica65', 2),
(8, 7, 'ip33', 'ip33', 2),
(9, 8, 'dilla84578', 'dilla84578', 2),
(10, 9, 'al65', 'al65', 2),
(11, 10, 'lina66', 'lina66', 2),
(12, 1, 'Aran65831', 'Aran65831', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_messages`
--

CREATE TABLE `user_messages` (
  `time` datetime(6) NOT NULL,
  `sender_message_id` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `receiver_message_id` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `message` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `user_messages`
--

INSERT INTO `user_messages` (`time`, `sender_message_id`, `receiver_message_id`, `message`) VALUES
('2024-06-26 20:38:04.000000', '6323eb', 'bdee72', 'asd'),
('2024-06-26 20:40:15.000000', '6323eb', 'bdee72', 'asd'),
('2024-06-26 20:40:21.000000', 'bdee72', '6323eb', 'Yoi'),
('2024-06-26 20:46:16.000000', 'bdee72', '6323eb', 'ajsdklajskdl'),
('2024-06-26 20:47:03.000000', '6323eb', 'bdee72', 'ashdjakhs'),
('2024-06-26 20:47:06.000000', 'bdee72', '6323eb', 'sdf'),
('2024-06-27 00:54:28.000000', 'bdee72', '2bc812', 'asd'),
('2024-06-27 00:54:37.000000', 'bdee72', '2bc812', 'asndjaskdhakjshdjkahsdkjahsjk'),
('2024-06-27 00:54:44.000000', 'bdee72', '2bc812', 'asd'),
('2024-06-27 00:54:47.000000', 'bdee72', '2bc812', 'asd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_chat`
--
ALTER TABLE `tb_chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_foto_pembelian`
--
ALTER TABLE `tb_foto_pembelian`
  ADD PRIMARY KEY (`no`),
  ADD KEY `no` (`no`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `tb_komen`
--
ALTER TABLE `tb_komen`
  ADD PRIMARY KEY (`no`),
  ADD KEY `no` (`no`);

--
-- Indexes for table `tb_komen_desain_sendiri`
--
ALTER TABLE `tb_komen_desain_sendiri`
  ADD PRIMARY KEY (`no`),
  ADD KEY `no` (`no`);

--
-- Indexes for table `tb_pembeli`
--
ALTER TABLE `tb_pembeli`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  ADD PRIMARY KEY (`no`),
  ADD KEY `id_pembeli` (`id_pembeli`),
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `kategori` (`kategori`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`no`),
  ADD KEY `kategori` (`kategori`);

--
-- Indexes for table `tb_rekening`
--
ALTER TABLE `tb_rekening`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`no`),
  ADD KEY `no_user` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_chat`
--
ALTER TABLE `tb_chat`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `no` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_pembeli`
--
ALTER TABLE `tb_pembeli`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  MODIFY `no` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `no` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `tb_rekening`
--
ALTER TABLE `tb_rekening`
  MODIFY `no` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `no` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `no` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_foto_pembelian`
--
ALTER TABLE `tb_foto_pembelian`
  ADD CONSTRAINT `tb_foto_pembelian_ibfk_1` FOREIGN KEY (`no`) REFERENCES `tb_pembelian` (`no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_komen`
--
ALTER TABLE `tb_komen`
  ADD CONSTRAINT `tb_komen_ibfk_1` FOREIGN KEY (`no`) REFERENCES `tb_produk` (`no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_komen_desain_sendiri`
--
ALTER TABLE `tb_komen_desain_sendiri`
  ADD CONSTRAINT `tb_komen_desain_sendiri_ibfk_1` FOREIGN KEY (`no`) REFERENCES `tb_pembelian` (`no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  ADD CONSTRAINT `tb_pembelian_ibfk_1` FOREIGN KEY (`id_pembeli`) REFERENCES `tb_pembeli` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_pembelian_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `tb_produk` (`no`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_pembelian_ibfk_3` FOREIGN KEY (`id_transaksi`) REFERENCES `tb_transaksi` (`no`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_pembelian_ibfk_4` FOREIGN KEY (`kategori`) REFERENCES `tb_kategori` (`no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD CONSTRAINT `tb_produk_ibfk_1` FOREIGN KEY (`kategori`) REFERENCES `tb_kategori` (`no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_pembeli` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
